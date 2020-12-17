<!-- <?php
	// session_start();
	// header('Content-Type: text/html; charset=utf-8');
	// include('config.php'); 

 ?> -->
<!-- <html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
</head>
<body> -->
	<?php
	// include('config.php'); 
	// require_once("PhpMailer/class.phpmailer.php");
	?> 
<?php
	// session_start();
	// include('config.php'); 
	require_once("PhpMailer/class.phpmailer.php");
   // function use for create connection
	PaymentSuccesspaypal();
	$orgIdForReferral=0;
	$amountToSend=0;
	function PaymentSuccesspaypal(){
		  
	//echo  $endate=isset($_REQUEST["endate"])?$_REQUEST["endate"]:'0';
//	return false;

	
	 $productinfo=isset($_REQUEST["productinfo"])?json_decode($_REQUEST["productinfo"], true):'0';
	 $payutxndid=isset($_REQUEST["txnid"])?($_REQUEST["txnid"]):'0';
	 $ind_name=isset($productinfo[0]['companyname'])?$productinfo[0]['companyname']:'0';
	 $amount=isset($_REQUEST["amount"])?($_REQUEST["amount"]):'0';
	 $discount=isset($productinfo[0]['discount'])?($productinfo[0]['discount']):'0';
	 $duration=isset($productinfo[0]["duration"])?($productinfo[0]["duration"]):'0';
	
	  // var_dump($duration);
	
	
	 $plan=isset($productinfo[0]["plan"])?$productinfo[0]["plan"]:'0';
	 $action=isset($productinfo[0]["action"])?$productinfo[0]["action"]:'0';
	 $bulk_attsts=isset($productinfo[0]["bulk_attsts"])?$productinfo[0]["bulk_attsts"]:'0';
	 // var_dump($bulk_attsts);
	 
	 $visit_punchsts=isset($productinfo[0]["visit_punchsts"])?$productinfo[0]["visit_punchsts"]:'0';
	 $geo_fencests=isset($productinfo[0]["geo_fencests"])?$productinfo[0]["geo_fencests"]:'0';
	 $timeoffsts=isset($productinfo[0]["timeoffsts"])?$productinfo[0]["timeoffsts"]:'0';
	 $payrollsts=isset($productinfo[0]["payrollsts"])?$productinfo[0]["payrollsts"]:'0';
	$facests=isset($productinfo[0]["facests"])?$productinfo[0]["facests"]:'0';
	 $devicests=isset($productinfo[0]["devicests"])?$productinfo[0]["devicests"]:'0';

	 // var_dump($facests);
	 // var_dump("ho");
	 // var_dump($devicests);
	 // var_dump("hppk");
	 // var_dump($timeoffsts);
	 // var_dump("la");
	 // die;
	 // var_dump($plan);
	 // var_dump($action);
// if($bulk_attsts == true){

// 	 	$bulk_attsts = 1;

// 	 }
// 	 if($visit_punchsts == true){

// 	 	$visit_punchsts = 1;

// 	 }
// 	 if($geo_fencests == true){

// 	 	$geo_fencests = 1;

// 	 }
// 	  var_dump($timeoffsts);
// 	 if($timeoffsts == true){

// 	 	$timeoffsts = 1;

// 	 }
// 	 var_dump($timeoffsts);
// 	 // die;
// 	 if($payrollsts == true){

// 	 	$payrollsts = 1;

// 	 }
// 	 if($devicests == true){

// 	 	$devicests = 1;

// 	 }
// 	 if($facests == true){

// 	 	$facests = 1;

// 	 }





	 $plan = strtoupper($plan);
	 $country=isset($_REQUEST["country"])?($_REQUEST["country"]):'0';
	 $street=isset($_REQUEST["street"])?($_REQUEST["street"]):'0';
	 $city=isset($_REQUEST["city"])?$_REQUEST["city"]:'0';
	 $zip= isset($_REQUEST["zipcode"])?$_REQUEST["zipcode"]:'0';
	 
	 $nofuser=isset($productinfo[0]["noofusers"])?$productinfo[0]["noofusers"]:'0'; 
	 $contact= isset($_REQUEST["phone"])?$_REQUEST["phone"]:'0';
	 $currency= isset($productinfo[0]["currency"])?$productinfo[0]["currency"]:'0';
	 $tax= isset($productinfo[0]["taxforinr"])?($productinfo[0]["taxforinr"]):'0';
	 
	 
	$msg='Payment recieved via auto mode-payUMoney (admin)';
	 $paymentmthd = 'Payumoney';
	 // var_dump($action);
	 // var_dump($nofuser);
	 
	 $gstin= isset($productinfo[0]["gstin"])?$productinfo[0]["gstin"]:'0';
	 $org_id= isset($productinfo[0]['orgid'])?($productinfo[0]['orgid']):'0';
	 $orgIdForReferral=$org_id;
	 $amountToSend=$amount;

	 //echo $orgIdForReferral;die;
	// $ind_name='no name';
	 $state=isset($productinfo[0]["state"])?$productinfo[0]["state"]:'0';
	 
	$bulk_attprice=isset($productinfo[0]["bulk_attprice"])?$productinfo[0]["bulk_attprice"]:'false';

	 
	 $geo_fenceprice=isset($productinfo[0]["geo_fenceprice"])?$productinfo[0]["geo_fenceprice"]:'false';
	 $location_traceprice=isset($productinfo[0]["location_traceprice"])?$productinfo[0]["location_traceprice"]:'false';
	 $payroll_price=isset($productinfo[0]["payroll_price"])?$productinfo[0]["payroll_price"]:'false';
	 $visit_punchprice=isset($productinfo[0]["visit_punchprice"])?$productinfo[0]["visit_punchprice"]:'false';
	 $timeoff_price=isset($productinfo[0]["timeoff_price"])?$productinfo[0]["timeoff_price"]:'false';
	 $face_price=isset($productinfo[0]["face_price"])?$productinfo[0]["face_price"]:'false';
	 $device_price=isset($productinfo[0]["device_price"])?$productinfo[0]["device_price"]:'false';
	 // echo $org_id;exit;
	 if($org_id==0){
		 echo "Page not found...";
		 return false;
	 }
	 
	 $Company=getOrgName($org_id);
	 $zone=getTimeZone($org_id);
	 date_default_timezone_set($zone);
	 $today=date('Y-m-d');	
	 $amount=$amount-$tax;
	 $data		=	array();
	 $email=getAdminEmail($org_id);
	 $txnid=$org_id.''.'';
	 $id=0;
	 $plan_enddate='';
	 $userlimit='';
	 $ulimit = getName('Organization', 'NoOfEmp', 'Id', $org_id);
	$ulimit = $nofuser+$ulimit;
	 $bulk_attprice_status = 0;
	 $location_traceprice_status=0;
	 $visit_punchprice_status=0;
		$timeoff_price_status=0;
		$payroll_price_status=0;
		$geo_fenceprice_status=0;
		$visit_punchprice_status=0;
		$loc_tracests=0;
	 // $cn = Fcon();                       
	 
			if($bulk_attprice > 0)
		{
			$bulk_attsts=1;
		}
		if($location_traceprice > 0)
		{
			$loc_tracests=1;
			    
		}
		if($visit_punchprice > 0)
		{
			$visit_punchsts=1;
		}

		if($geo_fenceprice > 0)
		{
			$geo_fencests=1;
		}
		// var_dump( $payroll_price);
		// die;
		if($payroll_price > 0)
		{
			
			$payrollsts=1;

		}
	// 	else{
	// 		if($payrollsts == true || $payrollsts == 1 ){

	// 			$payrollsts=1;
	// 			echo "he";
	// 		}
	// 		else{

	// 			echo "she";
	// 			$payrollsts=0;
	// 	}
	// }
		
		
		
		if($timeoff_price > 0)
		{
			$timeoffsts=1;
		}
		if($face_price > 0)
		{
			$facests=1;
		}
		if($device_price > 0)
		{
			$devicests=1;
		}
	   



	 if(!isset($_SESSION['txnd'])){

	 	// var_dump("payments_invoice");
	 	$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT max(id)as id FROM `payments_invoice`");
		 // $query->execute();
		
			if( $row = $query->result())
			$id=$row[0]->id;
			$txnid=$org_id.''.$id;	
			$_SESSION['txnd']=$txnid;
								 }
	 else
	 {
		 $txnid=$_SESSION['txnd'];
		 // var_dump($txnid);
	 }
	 // var_dump($txnid);
	 // die;

	  $ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT id FROM `payments_invoice` WHERE `payutxnd_id`='$payutxndid'");
	  // $query->execute();
	 // $row = $query->result();
	 if( $row = $query->result())
	 {
			 echo "plan already purchased";
			 return false;
	 }

	 if($plan=='YEARLY')
		 $duration=$duration * 12; // if plan is yearly, it should be convert in months



$ci =& get_instance();
		$ci->load->database();
		$query121 = $ci->db->query("SELECT `NoOfEmp`  FROM `Organization` WHERE `Id`='$org_id'");

 if( $row = $query121->result())
		$userlimit= $row[0]->NoOfEmp;


	$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT `end_date`  FROM `licence_ubiattendance` WHERE `OrganizationId`='$org_id' limit 1");
	 // $query->execute();
	  // $query->execute();
	
	 if( $row = $query->result())
		$plan_enddate= $row[0]->end_date;
	if($plan_enddate < $today)
			 $plan_enddate=$today;
		$plan_stdate1 = $plan_enddate;
	  $plan_enddate = date('Y-m-d', strtotime("+".$duration." months", strtotime($plan_enddate)));
/////////////////////////////////////////////////////////////////////////////////////
	 		$data['email']=$email; 
			$data['txnid']=$txnid; 
			$data['status']='SUCCESS'; // true
			$data['amount']=$amount; 
			$data['firstname']=$ind_name;
			$data['country']=$country;
			$data['state']=$state;
			$data['street']=str_replace("'","",$street);
			$data['city']=str_replace("'","",$city);
			$data['zip']=str_replace("'","",$zip);
			$data['contact']=str_replace("'","",$contact);
			$data['tax']=$tax;
			$data['discount_amt']=$discount;
		    $data['cur']=$currency;
///////////////////////////////////////////////////////////////////////////////////////////
		    // echo $data['email'];
		    // echo $data['txnid'];
		    // echo $data['discount_amt'];


// echo "SELECT id FROM `payments_invoice` WHERE `txnid`='$txnid'";

	 
		$query = $ci->db->query("SELECT id FROM `payments_invoice` WHERE `txnid`='$txnid'");

	  // $query->execute();
	 // $row = $query->result();
		// var_dump("hello");
	 if( $query->num_rows()>0)
	 {
	 	echo "please login again to proceed.";
			return $data;
			return false; ///// transaction information already inserted
			
	 }
	   
	$plan_stdate1 = date('d M, Y',strtotime($plan_stdate1));
	$plan_enddate1 = date('d M, Y',strtotime($plan_enddate));
	$ragisteruser = countRegisteredEmployee1($org_id);
		
			$due_amount = 0;
			// if($nofuser != 0){
			// if($ragisteruser > $nofuser)
			if($ragisteruser > $userlimit)
			{
				// echo "hello";
				// $due_amount =  ((int)$amount/(int)$nofuser)*($ragisteruser - $nofuser);
				$due_amount =  ((int)$amount/(int)$ragisteruser)*($ragisteruser-$userlimit);
			}

			// $amount = $amount+$due_amount;
			// var_dump($amount);
			// var_dump($due_amount);
			// var_dump($amount);
			// var_dump($nofuser);
			// var_dump($ragisteruser);

		// }

		// var_dump($due_amount);

		// $amount= $amount-$due_amount;

		// var_dump($due_amount);
		// die;

	// var_dump($action);
	  
	// $query = $ci->db->query("INSERT INTO `payments_invoice`(`txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`,`payment_method`, `remark`,`narration`, `action`, Addon_BulkAttn , Addon_LocationTracking , Addon_VisitPunch , Addon_GeoFence , Addon_Payroll , Addon_TimeOff ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",(array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Payumoney','Payment recieved via auto mode-payumoney','Plan Period: '.$plan_stdate1.' - '.$plan_enddate1.'<br/>No. of Users: '.$nofuser,'BUY',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice, $payroll_price,$timeoff_price )));
$ci =& get_instance();
$ci->load->database();
	if($action=='duration'){

		// echo "duration";
		// die;
		$ci =& get_instance();
$ci->load->database();
		// var_dump("hiiii");
		 $query = $ci->db->query("INSERT INTO `payments_invoice`( `txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`,`payment_method`, `remark`, `narration`, `action`,`Addon_BulkAttn`, `Addon_LocationTracking`, `Addon_VisitPunch`, `Addon_GeoFence`, `Addon_Payroll`, `Addon_TimeOff`,`Addon_DeviceVerification`,`Addon_FaceRecognition`,due_payment,payutxnd_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,$paymentmthd,'extend plan period for: ' .$duration. ' months. ', 'Plan Period: '.date('d/m/Y',strtotime($plan_stdate1)).' - '.date('d/m/Y',strtotime($plan_enddate)).' <br/>','UPGRADE - Renew',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice,$payroll_price,$timeoff_price,$device_price,$face_price,$due_amount,$payutxndid));
				// updating licence_ubiattendance


		$query = $ci->db->query("update licence_ubiattendance set `end_date` = '$plan_enddate',extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."',Addon_DeviceVerification='".$devicests."',Addon_FaceRecognition='".$facests."', due_amount = (due_amount-".$due_amount.")  where OrganizationId = $org_id");

		// $query->execute();

		// echo "update licence_ubiattendance set `end_date` = '$plan_enddate',extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."',due_amount = (due_amount-".$due_amount.")  where OrganizationId = $org_id" ;
				
		}else if($action=='userlimit'){
		// echo "duration1"; 
		// die;
			$ci =& get_instance();
$ci->load->database();
			$query = $ci->db->query("INSERT INTO `payments_invoice`( `txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`,`payment_method`, `remark`, `narration`, `action`,`Addon_BulkAttn`, `Addon_LocationTracking`, `Addon_VisitPunch`, `Addon_GeoFence`, `Addon_Payroll`, `Addon_TimeOff`,`Addon_DeviceVerification`,`Addon_FaceRecognition`,due_payment,payutxnd_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,$paymentmthd,'Update user limit for: ' .$nofuser.' users. ','Plan Period: '.date('d/m/Y',strtotime($today)).' - '.date('d/m/Y',strtotime($plan_enddate)).' <br/>No. of Users: '.$nofuser,'UPGRADE - Userlimit',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice,$payroll_price,$timeoff_price,$device_price,$face_price,$due_amount,$payutxndid));
				// updating licence_ubiattendance
		$query = $ci->db->query("update licence_ubiattendance set user_limit = user_limit + $nofuser ,extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."' ,Addon_DeviceVerification='".$devicests."',Addon_FaceRecognition='".$facests."',due_amount = (due_amount-".$due_amount.") where OrganizationId = $org_id");
		$query3 = $ci->db->query("update Organization set NoOfEmp = NoOfEmp + $nofuser  where Id = $org_id");
		}
		else if($action=='bothud'){ 
			// echo "duration3";
			// die;
			$ci =& get_instance();
$ci->load->database();
			$query = $ci->db->query("INSERT INTO `payments_invoice`( `txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`,`payment_method`, `remark`, `narration`, `action`,`Addon_BulkAttn`, `Addon_LocationTracking`, `Addon_VisitPunch`, `Addon_GeoFence`, `Addon_Payroll`, `Addon_TimeOff`,`Addon_DeviceVerification`,`Addon_FaceRecognition`,due_payment,payutxnd_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,$paymentmthd,'Update user limit for: ' .$nofuser. ' users. and extend plan period for: ' .$duration. ' months. ' ,'Plan Period: '.date('d/m/Y',strtotime($plan_stdate1)).' - '.date('d/m/Y',strtotime($plan_enddate)).' <br/>No. of Users: '.$nofuser,'UPGRADE - Both',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice,$payroll_price,$timeoff_price,$device_price,$face_price,$due_amount,$payutxndid));
			// var_dump($this->db->last_query());
		// updating licence_ubiattendance
			$ci =& get_instance();
$ci->load->database();
		$query = $ci->db->query("update licence_ubiattendance set `end_date` = '$plan_enddate', user_limit = user_limit + $nofuser ,extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."' ,Addon_DeviceVerification='".$devicests."',Addon_FaceRecognition='".$facests."',due_amount = (due_amount-".$due_amount.")  where OrganizationId = $org_id");
$ci =& get_instance();
$ci->load->database();
		$query3 = $ci->db->query("update Organization set NoOfEmp = NoOfEmp + $nofuser  where Id = $org_id");
		}
		

		echo '<div>
			<p>Greetings from ubiAttendance Team…!</p>
			<h3>Thank You... '.$Company.', you just completed the payment process.</h3>
			<p>Congratulations! Your payment  from '.$Company.' has been successfully received. 
			Your transaction details are:</p>
			<ul>
				<li><b>Transaction status:</b> SUCCESS</li>
				<li><b>Transaction Id:</b> '.$txnid.'</li>
				<li><b>Transaction Date:</b> '.date('d M, Y',strtotime($today)).'</li>
				<li><b>Payment Amount:</b> '.$currency.' '.$amount.'</li>
			</ul>
			<p>Please save your transaction details for any query related to payment.</p><p>Please add our email address ubiattendance@ubitechsolutions.com to your address book so that you don’t miss any of our mails.</p>
			<p><a href="https://ubiattendance.ubihrm.com/index.php/cron/generateInvoice?id='.base64_encode($txnid).'" target="_blank"> Click here</a> to generate the invoice.</p>
		</div>'; 

			


		$subject = $Company." -ubiAttendance Payment.";
			$txt = "<html><body>Dear super admin<br/>,
				". $Company." has paid amount ".$currency." ".$amount." for upgradation of its ubiAttendance premium plan. <br/><br/>
				<b>Payment summary:</b> <br/><br/>
				Email ID: 	".$email." <br/>
				Transaction Id: ".$txnid." <br/>
				Amount paid: ".$currency." ".($amount+$tax)." (tax included) <br/>
				Tax paid:    ".$currency." ".$tax." <br/>
				Discount:    ".$currency." ".$discount." <br/>
				No. of users extended: ".$nofuser." <br/>
				Plan periods extends: ".$duration." month(s) <br/><br/>
				Thanks for buy ubiAttendance services.<br/><br/>
				TO generate the Invoice <a href='".URL."cron/generateInvoice?id=".base64_encode($txnid)."' target='_blank'> Click here</a>.<br/><br/>
				Regards<br/>
				Team ubiAttendance</body></html>";
			$txtuser = "<html><body>Dear ".$Company."<br/><br/>
				You have paid amount ".$currency." ".$amount." for upgradation of ubiAttendance Premium Plan. <br/><br/>
				<b>Payment summary:</b> <br/><br/>
				Email ID: 	".$email." <br/>
				Transaction Id: ".$txnid." <br/>
				Amount paid: ".$currency." ".($amount+$tax)." (tax included) <br/>
				Tax paid:    ".$currency." ".$tax." <br/>
				Discount:    ".$currency." ".$discount." <br/>
				No. of users extended: ".$nofuser." <br/>
				Plan periods extends: ".$duration." month(s) <br/><br/>
				Thanks for buy ubiAttendance services.<br/><br/>
				To generate the Invoice <a href='".URL."cron/generateInvoice?id=".base64_encode($txnid)."' target='_blank'> Click here</a>.<br/><br/>
				Regards<br/>
				Team ubiAttendance</body></html>";
			$headers = "From: sales@ubitechsolutions.com" . "\r\n" .
			 "CC: pragati@ubitechsolutions.com";
			sendEmail_new("pulkit@ubitechsolutions.com",$subject,$txt,$headers);
			sendEmail_new("ubiattendance@ubitechsolutions.com",$subject,$txt,$headers);
			sendEmail_new("accounts@ubitechsolutions.com",$subject,$txt,$headers);
			sendEmail_new($email,$subject,$txtuser,'');


		    return $data; 

		    // unset($_SESSION["txnd"]);
		// }
	
	
	  
	// if($bulk_attprice)
	// 	{
	// 	   $bulk_attprice_status=1;
	// 	}
	// 	if($location_traceprice)
	// 	{
	// 		$location_traceprice_status=1;
	// 	}
	// 	if($visit_punchprice)
	// 	{
	// 		$visit_punchprice_status=1;
	// 	}
	// 	if($geo_fenceprice)
	// 	{
	// 		$geo_fenceprice_status=1;
	// 	}
	// 	if($payroll_price)
	// 	{
	// 		$payroll_price_status=1;
	// 	}
	// 	if($timeoff_price)
	// 	{
	// 		$timeoff_price_status=1;
	// 	}
		
		
		
	 //     $ragisteruser = countRegisteredEmployee($org_id);
		
		// 	$due_amount = 0;
		// 	if($nofuser != 0  ){

		// 		// var_dump("hiiiiiii");
				
		// 	if($ragisteruser > $nofuser)
		// 	{
		// 		$due_amount =  ((int)$amount/(int)$nofuser)*($ragisteruser - $nofuser);
		// 	}
		// }
		// 			$ci =& get_instance();
		// $ci->load->database();
		// $query = $ci->db->query("update licence_ubiattendance set user_limit = $nofuser , `end_date` = '$plan_enddate',extended =extended +1,transaction_id='".$txnid."' ,status=1,due_amount = 
		// '$due_amount',Addon_BulkAttn='$bulk_attprice_status' , Addon_LocationTracking='$location_traceprice_status' , Addon_VisitPunch='$visit_punchprice_status' , Addon_GeoFence='$geo_fenceprice_status' , Addon_Payroll='$payroll_price_status' , Addon_TimeOff='$timeoff_price_status' where OrganizationId = $org_id");
		
		
		// 	 // $query->execute();
		// 		$ci =& get_instance();
		// $ci->load->database();
		// 	$query3 = $ci->db->query("update Organization set NoOfEmp = $nofuser  where Id = $org_id");
		// 	// $query3->execute();
		// 	/* $query4 = $cn->prepare("update admin_login set web_admin_login_sts = 1  where OrganizationId = $org_id");
		// 	$query4->execute(); */
	
		// 	$totamount = $amount + $tax;
			//echo $totamount;
			 
		


		// $subject = $Company." - ubiAttendance Payment.";
		// $txtuser = "<html><body>Greetings from ubiAttendance Team…!<br/><br/>
		// 					You have paid amount ".$currency." ".$totamount." for ubiAttendance Premium Plan for ".$Company.". <br/><br/>
		// 					<b>Payment Summary:</b> <br/><br/>
		// 					Email: 	".$email." <br/>
		// 					Transaction Id: ".$txnid." <br/>
		// 					Amount paid: ".$currency." ".($amount+$tax)." (tax included) <br/>
		// 					Tax paid:    ".$currency." ".$tax." <br/>
		// 					Discount:    ".$currency." ".$discount." <br/>
		// 					No. of users: ".$nofuser." <br/>
		// 					Plan Duration: ".$duration." month(s) <br/><br/>
		// 					Thanks for buying ubiAttendance Premium Plan.<br/><br/>
		// 					To generate the Invoice <a href='https://ubiattendance.ubihrm.com/index.php/cron/generateInvoice?id=".base64_encode($txnid)."' target='_blank'> Click here</a>.<br/><br/>
		// 					Cheers<br/>
		// 					Team ubiAttendance</body></html>";
		// $headers = "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";					
		// $headers .= "From: sales@ubitechsolutions.com" . "\r\n";
		//  mail("accounts@ubitechsolutions.com",$subject,$txtuser,$headers);
		// mail("ubiattendance@ubitechsolutions.com",$subject,$txtuser,$headers);
		// mail("deeksha@ubitechsolutions.com",$subject,$txtuser,$headers);
		// mail($email,$subject,$txtuser,$headers); 
		// sendEmail_new($email,$subject,$txtuser,$headers);
		// sendEmail_new("ubiattendance@ubitechsolutions.com",$subject,$txtuser,$headers);
		// sendEmail_new("accounts@ubitechsolutions.com",$subject,$txtuser,$headers);
		//sendMailJS("deeksha@ubitechsolutions.com",$subject,$txtuser,$headers);

		/*start web panel details mail*/
			// $username='';
			// $password='';
			// $aname='';
			// $query = $this->db->query("SELECT username,password,substring_index(name, ' ', 1) as aname FROM `admin_login` WHERE OrganizationId=$org_id");
			// // $query->execute();
			// $row = $query->result();
			// if($row)
			// {
			// 	$username=$row['username'];
			// 	$password=decrypt($row['password']);
			// 	$aname=$row['aname'];
			// }
			
			// $subject = "Login Details for Web Admin Panel";
			// $message = "<html><body>
			// 			Dear ".$aname."<br/><br/>
			// 			Greetings from ubiAttendance Team…!<br/><br/>
			// 			<b>Login details for Web Admin Panel (for use on laptop or desktop computers)</b><br/><br/>
			// 			<b>URL</b> - <a href='https://ubiattendance.ubihrm.com/'>https://ubiattendance.ubihrm.com</a><br/>
			// 			<b>Username:</b>  ".$username."<br/>
			// 			Password: ".$password."<br/><br/>
			// 			If you find any difficulty while using our admin panel can contact us.<br/><br/><br/>
			// 			Cheers,<br/>
			// 			Team ubiAttendance <br/>
			// 			<a href='http://www.ubiattendance.com'>www.ubiattendance.com</a><br/>
			// 			Tel/ Whatsapp: +91 70240 77050 <br/>
			// 			Email: ubiattendance@ubitechsolutions.com <br/>
			// 			Skype: ubitech.solutions <br/>
			// 			</body></html>";
			/* mail("deeksha@ubitechsolutions.com",$subject,$message,$headers);
			mail("ubiattendance@ubitechsolutions.com",$subject,$message,$headers);
			mail($email,$subject,$message,$headers); */
			// sendEmail_new($email,$subject,$message,$headers);
		/*end web panel details mail*/
		
		/*start user guide mail*/
			
			// $subject1 = "Wondering - How to add Employees?";
			// $message1 = "<html><body>
			// 			Greetings from ubiAttendance Team…!<br/><br/>
			// 			I hope your experience with the best Attendance App[2018] was pleasant. Wondering -  How to add Employees?<br/>
			// 			<a href='http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiattendance%20mobile%20and%20web%20admin%20panel%20nov%2017%202018%20new.pdf'>http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiattendance%20mobile%20and%20web%20admin%20panel%20nov%2017%202018%20new.pdf</a><br/><br/> Here’s the Employee’s Guide - <br/>
			// 			<a href='http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiAttendance%20(attendance%20app%20for%20employees)%20new.pdf'>http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiAttendance%20(attendance%20app%20for%20employees)%20new.pdf</a><br/><br/>
			// 			Add Employees through App<br/>
			// 			<a href='https://www.youtube.com/watch?v=84FQr8aopT8'>https://www.youtube.com/watch?v=84FQr8aopT8</a><br/><br/>
			// 			To add Bulk Employees & detailed overview of the Web Panel<br/>
			// 			<a href='https://www.youtube.com/watch?v=9UuLKjwSZcI'>https://www.youtube.com/watch?v=9UuLKjwSZcI</a><br/><br/>
			// 			Start tracking Employee Time Records with 100% accuracy. Please contact support@ubitechsolutions.com for any queries.<br/><br/>
			// 			Cheers,<br/>
			// 			Team ubiAttendance <br/>
			// 			<a href='http://www.ubiattendance.com'>www.ubiattendance.com</a><br/>
			// 			Tel/ Whatsapp: +91 70240 77050 <br/>
			// 			Email: ubiattendance@ubitechsolution	s.com <br/>
			// 			Skype: ubitech.solutions <br/>
			// 			</body></html>";
			/* mail("deeksha@ubitechsolutions.com",$subject1,$message1,$headers);
			//mail("ubiattendance@ubitechsolutions.com",$subject1,$message1,$headers);
			// mail($email,$subject1,$message1,$headers); */
			// sendEmail_new($email,$subject1,$message1,$headers);
		/*end user guide mail*/
	}
	// function getOrgName($id){
	// 	$cn = Fcon();
	// 	$query = $cn->prepare("SELECT Name FROM `Organization` WHERE Id=$id");
	// 		$query->execute();
			
	// 		if($row = $query->fetch())
	// 			return $row['Name'];
	// 		else
	// 			return "not found";
			
	// }
	// 	function getTimeZone($orgid=10){
	// 	       $cn = Fcon();
	// 	//////////////-------getting time zone
	// 		   $st=$cn->prepare("SELECT name
	// 			FROM ZoneMaster
	// 			WHERE id = ( 
	// 			SELECT  `TimeZone` 
	// 			FROM  `Organization` 
	// 			WHERE id =$orgid
	// 			LIMIT 1)");
	// 			$zone='Asia/Kolkata';
	// 			$st->execute();
	// 			$row = $st->fetch();
	// 			if($row)
	// 	         return $zone=$row['name'];
	// 		     else
	// 			return $zone;
	// 		//////////////-------/getting time zone
	// }
	
	// function getAdminEmail($id){
	// 	$cn = Fcon();
	// 	$query = $cn->prepare("SELECT Email FROM `Organization` WHERE Id=$id");
	// 	    $query->execute();
	// 			$row = $query->fetch();
	// 			if($row)
	// 	         return $row['Email'];
	// 		    else
	// 				return "";
	// }
	// function countRegisteredEmployee($orgid)
	// {
	// 	$count=0;
	// 	$cn = Fcon();
	// 	$query = $cn->prepare("SELECT count(Id) as total FROM `EmployeeMaster` where OrganizationId=$orgid");
	// 	$query->execute();
	// 	while($row=$query->fetch())
	// 	{
	// 		$count=$row->total;
	// 	}		
	// 	return $count;	
				
	// 	// foreach ($query->result() as $row)
	// 			// {
	// 			// $count=$row->total;
	// 			// }
				
	// 			// return $count;
		
	// }
	
	// function decrypt($string, $key="ubitech") {
	//   $result = '';
	//   $string = base64_decode($string);
	//   for($i=0; $i<strlen($string); $i++) {
	//     $char = substr($string, $i, 1);
	//     $keychar = substr($key, ($i % strlen($key))-1, 1);
	//     $char = chr(ord($char)-ord($keychar));
	//     $result.=$char;
	//   }
	//   return $result;
	// }
	
	// function sendMailJS($to,$subject,$msg,$headers='',$file="") {
		
	// 	$fname='ubiAttendance';
	// 	$userName = 'ubiattendance@ubitechsolutions.com';
	// 	// Instantiate a new PHPMailer 
	// 	$mail = new PHPMailer;
	// 	// Tell PHPMailer to use SMTP
	// 	$mail->isSMTP();
	// 	// Replace sender@example.com with your "From" address. 
	// 	// This address must be verified with Amazon SES.
	// 	$mail->setFrom($userName, $fname);

	// 	// Replace recipient@example.com with a "To" address. If your account 
	// 	// is still in the sandbox, this address must be verified.
	// 	// Also note that you can include several addAddress() lines to send
	// 	// email to multiple recipients.
	// 	$mail->addAddress($to);

	// 	// Replace smtp_username with your Amazon SES SMTP user name.
	// 	$mail->Username = 'AKIAINHTNV5UDYHKLUHA';

	// 	// Replace smtp_password with your Amazon SES SMTP password.
	// 	$mail->Password = 'Aj3bqCkDsPYRWH6impKmMeRXbyspo0yP3/MC1F8j1b4K';

	// 	// Specify a configuration set. If you do not want to use a configuration
	// 	// set, comment or remove the next line.
	// 	//$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');

	// 	// If you're using Amazon SES in a region other than US West (Oregon), 
	// 	// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
	// 	// endpoint in the appropriate region.
	// 	$mail->Host = 'email-smtp.us-west-2.amazonaws.com';

	// 	// The subject line of the email
	// 	$mail->Subject = $subject;

	// 	// The HTML-formatted body of the email
	// 	$mail->Body = $msg;

	// 	// Tells PHPMailer to use SMTP authentication
	// 	$mail->SMTPAuth = true;

	// 	// Enable TLS encryption over port 587
	// 	$mail->SMTPSecure = 'tls';
	// 	$mail->Port = 587;

	// 	// Tells PHPMailer to send HTML-formatted email
	// 	$mail->isHTML(true);
		
	// 	if($file!="")
	// 	$mail->AddAttachment($file);
	// 	// The alternative email body; this is only displayed when a recipient
	// 	// opens the email in a non-HTML email client. The \r\n represents a 
	// 	// line break.
	// 	//$mail->AltBody = "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";
	// 	if(!$mail->send()){ 
	// 		//$err=$mail->ErrorInfo;
	// 		return false;
	// 	/* //echo 'aa';
	// 	echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
	// 	$err=$mail->ErrorInfo;
	// 	echo "Email not sent!" , PHP_EOL;
	// 	//Trace($err);
	// 	return false; */
	// 	}else{
	// 		//echo "Message has been sent successfully";
	// 		return true;
	// 	/* echo "Email sent!" , PHP_EOL;
	// 	 */
	// 	}
	// }
?>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


<script>

$(function(){
	
	$.ajax({
		url:"http://192.168.0.200/ubiattendance/index.php/Att_services/updateReferralDiscountStatus?orgId=<?php echo $orgIdForReferral?>&amountPaid=<?php echo $amountToSend?>",
		success:function(data){
			console.log(data);
		},
		error:function(e){
			console.log("Error updating referral status");
		}
		
	});
	
	
});

</script>



<!-- </body>
</html> -->
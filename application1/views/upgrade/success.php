<!-- <?php
	// session_start();
	// header('Content-Type: text/html; charset=utf-8');
	// include('config.php'); 
	// require_once("PhpMailer/class.phpmailer.php");
 ?> -->
<!-- <html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

</head>
<body> -->
<?php
require_once("PhpMailer/class.phpmailer.php");

	PaymentSuccesspaypal($orderid);
	$orgIdForReferral=0;
	$amountToSend=0;

	function PaymentSuccesspaypal($orderid){
	$handle = curl_init(); 
		$url = "https://api.razorpay.com/v1/orders/".$orderid."/payments";
		curl_setopt_array($handle,
		array(
		  CURLOPT_URL            => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HTTPAUTH => CURLAUTH_ANY,
		  // CURLOPT_USERPWD  => "rzp_test_BgImr1BHLjaJet:5Va6po0QhSaZ3r8SxKPWx18I", // test key
		  CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",  // live key
		  //CURLOPT_POSTFIELDS => $postData,
		 // CURLOPT_HTTPHEADER => $header,
		)
		);
		$output = curl_exec($handle);
		
		curl_close($handle);
		$obj= json_decode($output);
		$data1=(array)$obj;
		
		$data2=(array)$data1['items']['0'];
		
		$data3=(array)$data2['notes'];
		
		$data4=$data3['multiple'];

		$datamultiple=explode(',',$data4);
		$nouser = rtrim($datamultiple[6], ")");
		 $geofence = substr($datamultiple[0], 6);
 
		$payment_id=$data2['id'];
		$order_id=$data2['order_id']; 
		$amt=($data2['amount'])/100;
		$ind_name=isset($data3["ind_name"])?$data3["ind_name"]:'0';		
		$amount=isset($amt)?$amt:'0';
		
		$discount=isset($data3['discount'])?$data3['discount']:'0';
		$plan=isset($data3['plan'])?$data3['plan']:'0';
		 $duration=isset($datamultiple[1])?$datamultiple[1]:'0';

		$country=isset($data3['country'])?$data3['country']:'0';

		$state=isset($data3['state'])?$data3['state']:'0';
		$city=isset($data3['city'])?$data3['city']:'0';
		$currency=isset($data2['currency'])?$data2['currency']:'0';
		$gstin=isset($data3['gstin'])?$data3['gstin']:'0';
		$zip=isset($data3['zip'])?$data3['zip']:'0';
		$contact=isset($data3['contact'])?$data3['contact']:'0';
		$street=isset($data3['street'])?$data3['street']:'0';
		$org_id= isset($data3["OrganizationId"])?base64_decode($data3["OrganizationId"]):'0';
		$orgIdForReferral=$org_id;
		$amountToSend=$amount;
		$bulk_attprice=isset($data3['bulk_attprice'])?$data3['bulk_attprice']:'0';
		// $face_price=isset($data3['face_price'])?$data3['face_price']:'0';
		// $device_price=isset($data3['device_price'])?$data3['device_price']:'0';

		// $face_price=isset($datamultiple[6])?$datamultiple[6]:'0';
		// $device_price=isset($datamultiple[7])?$datamultiple[7]:'0';
		$geo_fenceprice=isset($geofence)?$geofence:'0';
		//$geo_fenceprice=isset($datamultiple[0])?$datamultiple[0]:'0';
		//echo $geo_fenceprice;exit;
		$location_traceprice=isset($datamultiple[2])?$datamultiple[2]:'0';
		$payroll_price=isset($datamultiple[3])?$datamultiple[3]:'0';
		$visit_punchprice=isset($datamultiple[4])?$datamultiple[4]:'0';
		$timeoff_price=isset($datamultiple[5])?$datamultiple[5]:'0';
		$device_price=isset($datamultiple[7])?$datamultiple[7]:'0';
		$face_price=isset($datamultiple[8])?$datamultiple[8]:'0';
		
		$nofuser=isset($nouser)?$nouser:'0';
		$tax= isset($data3["taxforinr"])?base64_decode($data3["taxforinr"]):'0';
		 $payment_id=$data2['id'];
		$order_id=$data2['order_id'];	   
	//echo  $endate=isset($_REQUEST["endate"])?$_REQUEST["endate"]:'0';
//	return false;
	 /* $ind_name=isset($_REQUEST["ind_name"])?$_REQUEST["ind_name"]:'0';
	 $amount=isset($_REQUEST["total"])?base64_decode($_REQUEST["total"]):'0';
	 $discount=isset($_REQUEST["discount"])?base64_decode($_REQUEST["discount"]):'0';
	 $duration=isset($_REQUEST["duration"])?base64_decode($_REQUEST["duration"]):'0';
	 $plan=isset($_REQUEST["plan"])?$_REQUEST["plan"]:'0';
	 $plan = strtoupper($plan);
	 $country=isset($_REQUEST["country"])?base64_decode($_REQUEST["country"]):'0';
	 $street=isset($_REQUEST["street"])?base64_decode($_REQUEST["street"]):'0';
	 $city=isset($_REQUEST["city"])?$_REQUEST["city"]:'0';
	 $zip= isset($_REQUEST["zip"])?$_REQUEST["zip"]:'0';
	 $nofuser=isset($_REQUEST["noofusers"])?$_REQUEST["noofusers"]:'0'; 
	 $contact= isset($_REQUEST["contact"])?$_REQUEST["contact"]:'0';
	 $currency= isset($_REQUEST["currency"])?$_REQUEST["currency"]:'0';
	 $tax= isset($_REQUEST["taxforinr"])?base64_decode($_REQUEST["taxforinr"]):'0';
	 $gstin= isset($_REQUEST["gstin"])?$_REQUEST["gstin"]:'0';
	 $org_id= isset($_REQUEST["OrganizationId"])?base64_decode($_REQUEST["OrganizationId"]):'0';
	 $orgIdForReferral=$org_id;
	 $amountToSend=$amount;
	  $bulk_attprice=isset($_REQUEST["bulk_attprice"])?$_REQUEST["bulk_attprice"]:'0';
	  $geo_fenceprice=isset($_REQUEST["geo_fenceprice"])?$_REQUEST["geo_fenceprice"]:'0';
	  $location_traceprice=isset($_REQUEST["location_traceprice"])?$_REQUEST["location_traceprice"]:'0';
	  $payroll_price=isset($_REQUEST["payroll_price"])?$_REQUEST["payroll_price"]:'0';
	  $visit_punchprice=isset($_REQUEST["visit_punchprice"])?$_REQUEST["visit_punchprice"]:'0';
	  $timeoff_price=isset($_REQUEST["timeoff_price"])?$_REQUEST["timeoff_price"]:'0';
	 
	// $ind_name='no name';
	 $state=isset($_REQUEST["state"])?$_REQUEST["state"]:'0'; */

$ulimit = getName('Organization', 'NoOfEmp', 'Id', $org_id);
$ulimit = $nofuser+$ulimit;

// var_dump($duration);

// var_dump($ulimit);
// var_dump($nofuser);
// die;

	 if($org_id==0){
		 echo "Page not found...";
		 return false;
	 }
	 
	 
	 $Company=getOrgName($org_id);
	 $zone=getTimeZone($org_id);
	 date_default_timezone_set($zone);
	 $today=date('Y-m-d');	
	 $amount=$amount-$tax;
	 // var_dump($amount);
	 $data		=	array();
	 $email=getAdminEmail($org_id);
	 $txnid=$org_id.''.'';
	 $id=0;
	 $plan_enddate='';
	 // $cn = Fcon();
	 $bulk_attsts = 0;
	 $loc_tracests=0;
	 // $visit_punchprice_status=0;
		$timeoffsts=0;
		$payrollsts=0;
		$geo_fencests=0;
		$visit_punchsts=0;
		$facests=0;
		$devicests=0;
	 
// var_dump($payment_id);
// die;
	
	// 	$ci =& get_instance();
	// 	$ci->load->database();
	// // 	$query = $ci->db->query("SELECT payment_id as eid FROM `payments_invoice` where payment_id = '$payment_id' ");

	// // 	$count =$ci->db->affected_rows();
	// // if( $count > 0)
 // //        {
	// //  echo "Plan already purchased";
	// //  return false;
	// // }
	

	// 	$ci =& get_instance();
	// 	$ci->load->database();
	// 	$query = $ci->db->query("SELECT max(id) as id FROM `payments_invoice`");
	// 	// var_dump($query);
	// 	 // $query->execute();
	// 	 // $row = $query->fetch();
	// 	if( $row = $query->result())
 //        {
	// 		$id=$row[0]->id;
	// 	 $txnid=$org_id.''.$id;	
	// 	 $_SESSION['txnd']=$txnid;
 //         // var_dump($_SESSION['txnd']);
 //         // var_dump($txnid);
 //         // var_dump($id);
 //         // var_dump("if condition");
 //        }
	 

	
	 
	 if(!isset($_SESSION['txnd'])){
		$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT max(id) as id FROM `payments_invoice`");
		// var_dump($query);
		 // $query->execute();
		 // $row = $query->fetch();
		if( $row = $query->result())
        {
			$id=$row[0]->id;
		 $txnid=$org_id.''.$id;	
		 $_SESSION['txnd']=$txnid;
         // var_dump($_SESSION['txnd']);
         // var_dump($txnid);
         // var_dump($id);
         // var_dump("if condition");
        }
	 }
	 else
	 {
         // var_dump("else condition");
		 $txnid=$_SESSION['txnd'];
		 // var_dump($txnid);
		
	 }
	  //var_dump($_SESSION['txnd']);
		 // var_dump($_SESSION['txnd']+1);
	 // var_dump($plan);
	 if($plan=='Yearly')
		 $duration=$duration * 12; // if plan is yearly, it should be convert in months
		// var_dump("hum mei hai dum");
		// var_dump($duration);
		// die;
		$action = '';
		if($duration == '' || $duration == 0  ){

			$action = 'User';
		}
		elseif($nofuser == '' || $nofuser == 0){

			$action = 'Duration';
		}
		else{

			$action = 'Both';
		}
		// var_dump($action);
		// die;

		if($bulk_attprice)
		{
			$bulk_attsts=1;
		}
		if($location_traceprice)
		{
			$loc_tracests=1;
			    
		}
		if($visit_punchprice)
		{
			$visit_punchsts=1;
		}

		if($geo_fenceprice)
		{
			$geo_fencests=1;
		}
		if($payroll_price)
		{
			$payrollsts=1;
		}
		if($timeoff_price)
		{
			$timeoffsts=1;
		}
		if($face_price)
		{
			$facests=1;
		}
		if($device_price)
		{
			$devicests=1;
		}
	   
	 $ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT `end_date`  FROM `licence_ubiattendance` WHERE `OrganizationId`='$org_id' limit 1");
	 // $query->execute();
	 // $row = $query->fetch();
	 if($row = $query->result())
		$plan_enddate= $row[0]->end_date;
	if($plan_enddate < $today)
			 $plan_enddate=$today;
		$plan_stdate1 = $plan_enddate;
		
	  $plan_enddate = date('Y-m-d', strtotime("+".$duration." months", strtotime($plan_enddate)));

	 $ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT id FROM `payments_invoice` WHERE `txnid`='$txnid'");
	  // $query->execute();
	 // $row = $query->fetch();
		// var_dump($txnid);
	 // if($row = $query->result())
	 // {
		// 	 echo "plan already buy";
		// 	 // return false;
	 // }
	 
	$plan_stdate1 = date('d M, Y',strtotime($plan_stdate1));
	$plan_enddate1 = date('d M, Y',strtotime($plan_enddate));

	$msg = 'Payment recieved via auto mode-razorPay (My Plan)';

	// var_dump($plan_enddate);
	// var_dump($plan_enddate1);
	// die;


	if($action == 'Duration'){

			$query = $ci->db->query("INSERT INTO `payments_invoice`( `txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`, `remark`, `narration`, `action`,`Addon_BulkAttn`, `Addon_LocationTracking`, `Addon_VisitPunch`, `Addon_GeoFence`, `Addon_Payroll`, `Addon_TimeOff`,`Addon_DeviceVerification`,`Addon_FaceRecognition`,payment_id,order_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Update Plan duration for '.$duration.' months. '.$msg, 'Plan Period: '.date('d/m/Y',strtotime($plan_stdate1)).' - '.date('d/m/Y',strtotime($plan_enddate)).' <br/>','UPGRADE',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice,$payroll_price,$timeoff_price,$device_price,$face_price,$payment_id,$order_id));

				// updating licence_ubiattendance
		$query = $ci->db->query("update licence_ubiattendance set `end_date` = '$plan_enddate',extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."',Addon_DeviceVerification='".$devicests."',Addon_FaceRecognition='".$facests."'  where OrganizationId = $org_id");




	}
	elseif($action == 'User'){

			 $query = $ci->db->query("INSERT INTO `payments_invoice`( `txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`, `remark`, `narration`, `action`,`Addon_BulkAttn`, `Addon_LocationTracking`, `Addon_VisitPunch`, `Addon_GeoFence`, `Addon_Payroll`, `Addon_TimeOff`,`Addon_DeviceVerification`,`Addon_FaceRecognition`,payment_id,order_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Update user limit for '.$ulimit.' users. '.$msg,'Plan Period: '.date('d/m/Y',strtotime($today)).' - '.date('d/m/Y',strtotime($plan_enddate)).' <br/>No. of Users: '.$nofuser,'UPGRADE',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice,$payroll_price,$timeoff_price,$device_price,$face_price,$payment_id,$order_id));

			// var_dump($ci->db->last_query());
			// exit;
				// updating licence_ubiattendance
			$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("update licence_ubiattendance set user_limit = user_limit + $nofuser ,extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."',Addon_DeviceVerification='".$devicests."',Addon_FaceRecognition='".$facests."'  where OrganizationId = $org_id");
		$ci =& get_instance();
		$ci->load->database();
		$query3 = $ci->db->query("update Organization set NoOfEmp = NoOfEmp + $nofuser  where Id = $org_id");

	}

	else if($action=='Both'){ 
			$query = $ci->db->query("INSERT INTO `payments_invoice`( `txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`, `remark`, `narration`, `action`,`Addon_BulkAttn`, `Addon_LocationTracking`, `Addon_VisitPunch`, `Addon_GeoFence`, `Addon_Payroll`, `Addon_TimeOff`,`Addon_DeviceVerification`,`Addon_FaceRecognition`,payment_id,order_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Update user limit for '.$nofuser.' users. and extend plan period for '.$duration.' months. '.$msg,'Plan Period: '.date('d/m/Y',strtotime($plan_stdate1)).' - '.date('d/m/Y',strtotime($plan_enddate)).' <br/>No. of Users: '.$ulimit,'UPGRADE',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice,$payroll_price,$timeoff_price,$device_price,$face_price,$payment_id,$order_id));
		// updating licence_ubiattendance
		$query = $ci->db->query("update licence_ubiattendance set `end_date` = '$plan_enddate', user_limit = user_limit + $nofuser ,extended =extended +1,transaction_id='".$txnid."' ,status=1 ,Addon_BulkAttn='".$bulk_attsts."', Addon_LocationTracking='".$loc_tracests."', Addon_VisitPunch='".$visit_punchsts."', Addon_GeoFence='".$geo_fencests."', Addon_Payroll='".$payrollsts."', Addon_TimeOff='".$timeoffsts."' ,Addon_DeviceVerification='".$devicests."',Addon_FaceRecognition='".$facests."'  where OrganizationId = $org_id");
		$query3 = $ci->db->query("update Organization set NoOfEmp = NoOfEmp + $nofuser  where Id = $org_id");
		}

	 // $query = $ci->db->query("INSERT INTO `payments_invoice`(`txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`,`payment_method`, `remark`,`narration`, `action`, Addon_BulkAttn , Addon_LocationTracking , Addon_VisitPunch , Addon_GeoFence , Addon_Payroll , Addon_TimeOff,payment_id,order_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",(array($txnid,$org_id,$Company,$email,$amount,'SUCCESS',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Razor Pay','Payment recieved via auto mode-Razor Pay','Plan Period: '.$plan_stdate1.' - '.$plan_enddate1.'<br/>No. of Users: '.$nofuser,'UPGRADE',$bulk_attprice,$location_traceprice,$visit_punchprice,$geo_fenceprice, $payroll_price,$timeoff_price,$payment_id,$order_id)));
	 // // echo $bulk_attprice;
  //    // echo $bulk_attprice_status;
		
	
		// $ci =& get_instance();
		// $ci->load->database();
		// $query = $ci->db->query("update licence_ubiattendance set user_limit = $nofuser , `end_date` = '$plan_enddate',extended =extended +1,transaction_id='".$txnid."' ,status=1,Addon_BulkAttn='$bulk_attprice_status' , Addon_LocationTracking='$location_traceprice_status' , Addon_VisitPunch='$visit_punchprice_status' , Addon_GeoFence='$geo_fenceprice_status' , Addon_Payroll='$payroll_price_status' , Addon_TimeOff='$timeoff_price_status' where OrganizationId = $org_id");
		
		// // $query->execute();
		// 		$ci =& get_instance();
		// $ci->load->database();
		// $query3 = $ci->db->query("update Organization set NoOfEmp = $nofuser  where Id = $org_id");
		// $query3->execute();
			/* $query4 = $cn->prepare("update admin_login set web_admin_login_sts = 1  where OrganizationId = $org_id");
			$query4->execute(); */
	        
			$totamount = $amount + $tax;
		echo '<div>
		<p>Greetings from ubiAttendance Team…!</p>
		
		<p>Congratulations! Your payment  from '.$Company.' has been successfully received.
		Your transaction details are:</p>
		<ul>
			<li><b>Transaction status:</b> SUCCESS</li>
			<li><b>Transaction Id:</b> '.$txnid.'</li>
			<li><b>Transaction Date:</b> '.date('d M, Y',strtotime($today)).'</li>
			<li><b>Payment Amount:</b> '.$currency.' '.$totamount.'</li>
		</ul>
		<p>
		Please save your transaction details for any query related to payment.</p>
		<p>Please add our email address ubiattendance@ubitechsolutions.com to your address book so that you don’t miss any of our mails. 
		</p>
		<p>
		<a href="https://ubiattendance.ubihrm.com/index.php/cron/generateInvoice?id='.base64_encode($txnid).'" target="_blank"> Click here</a> to generate the invoice.
		</p>
		</div>'; 
		
		$subject = $Company." - ubiAttendance Payment.";
		$txtuser = "<html><body>Greetings from ubiAttendance Team…!<br/><br/>
							You have paid amount ".$currency." ".$totamount." for ubiAttendance Premium Plan for ".$Company.". <br/><br/>
							<b>Payment Summary:</b> <br/><br/>
							Email: 	".$email." <br/>
							Transaction Id: ".$txnid." <br/>
							Amount paid: ".$currency." ".($amount+$tax)." (tax included) <br/>
							Tax paid:    ".$currency." ".$tax." <br/>
							Discount:    ".$currency." ".$discount." <br/>
							No. of users: ".$nofuser." <br/>
							Plan Duration: ".$duration." month(s) <br/><br/>
							Thanks for buying ubiAttendance Premium Plan.<br/><br/>
							To generate the Invoice <a href='https://192.168.0.200/ubiattendance/index.php/cron/generateInvoice?id=".base64_encode($txnid)."' target='_blank'> Click here</a>.<br/><br/>
							Cheers<br/>
							Team ubiAttendance</body></html>";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";					
		$headers .= "From: sales@ubitechsolutions.com" . "\r\n";
		/* mail("accounts@ubitechsolutions.com",$subject,$txtuser,$headers);
		mail("ubiattendance@ubitechsolutions.com",$subject,$txtuser,$headers);
		mail("deeksha@ubitechsolutions.com",$subject,$txtuser,$headers);
		mail($email,$subject,$txtuser,$headers); */
		sendEmail_new($email,$subject,$txtuser,$org_id);
		sendEmail_new("ubiattendance@ubitechsolutions.com",$subject,$txtuser,$org_id);
		sendEmail_new("accounts@ubitechsolutions.com",$subject,$txtuser,$org_id);
		sendEmail_new("deeksha@ubitechsolutions.com",$subject,$txtuser,$org_id);
	//	echo $txtuser;
		/*start web panel details mail*/
			$username='';
			$password='';
			$query = $ci->db->query("SELECT username,password FROM `admin_login` WHERE OrganizationId=$org_id");
			// $query->execute();
			// $row = $query->fetch();
			if($row =$query->result())
			{
				$username=$row[0]->username;
				$password=decrypt($row[0]->password);
			}
			
			$subject = "Login Details for Web Admin Panel";
			$message = "<html><body>
						Greetings from ubiAttendance Team…!<br/><br/>
						<b>Login details for Web Admin Panel (for use on laptop or desktop computers)</b><br/><br/>
						<b>URL</b> - <a href='https://ubiattendance.ubihrm.com/'>https://ubiattendance.ubihrm.com</a><br/>
						<b>Username:</b>  ".$username."<br/>
						Password: ".$password."<br/><br/>
						If you find any difficulty while using our admin panel can contact us.<br/><br/><br/>
						Cheers,<br/>
						Team ubiAttendance <br/>
						<a href='http://www.ubiattendance.com'>www.ubiattendance.com</a><br/>
						Tel/ Whatsapp: +91 70240 77050 <br/>
						Email: ubiattendance@ubitechsolutions.com <br/>
						Skype: ubitech.solutions <br/>
						</body></html>";
	
			/* mail("deeksha@ubitechsolutions.com",$subject,$message,$headers);
			mail("ubiattendance@ubitechsolutions.com",$subject,$message,$headers);
			mail($email,$subject,$message,$headers);*/
			sendEmail_new($email,$subject,$message,$org_id); 
		/*end web panel details mail*/
		
		/*start user guide mail*/
			
			$subject1 = "Wondering - How to add Employees?";
			$message1 = "<html><body>
						Greetings from ubiAttendance Team…!<br/><br/>
						I hope your experience with the best Attendance App[2018] was pleasant. Wondering -  How to add Employees?<br/>
						<a href='http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiattendance%20mobile%20and%20web%20admin%20panel%20nov%2017%202018%20new.pdf'>http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiattendance%20mobile%20and%20web%20admin%20panel%20nov%2017%202018%20new.pdf</a><br/><br/> Here’s the Employee’s Guide - <br/>
						<a href='http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiAttendance%20(attendance%20app%20for%20employees)%20new.pdf'>http://www.ubitechsolutions.com/images/Get%20started%20with%20ubiAttendance%20(attendance%20app%20for%20employees)%20new.pdf</a><br/><br/>
						Add Employees through App<br/>
						<a href='https://www.youtube.com/watch?v=84FQr8aopT8'>https://www.youtube.com/watch?v=84FQr8aopT8</a><br/><br/>
						To add Bulk Employees & detailed overview of the Web Panel<br/>
						<a href='https://www.youtube.com/watch?v=9UuLKjwSZcI'>https://www.youtube.com/watch?v=9UuLKjwSZcI</a><br/><br/>
						Start tracking Employee Time Records with 100% accuracy. Please contact support@ubitechsolutions.com for any queries.<br/><br/>
						Cheers,<br/>
						Team ubiAttendance <br/>
						<a href='http://www.ubiattendance.com'>www.ubiattendance.com</a><br/>
						Tel/ Whatsapp: +91 70240 77050 <br/>
						Email: ubiattendance@ubitechsolutions.com <br/>
						Skype: ubitech.solutions <br/>
						</body></html>";
			/* mail("deeksha@ubitechsolutions.com",$subject1,$message1,$headers);
			mail("ubiattendance@ubitechsolutions.com",$subject1,$message1,$headers);
			mail($email,$subject1,$message1,$headers); */
			sendEmail_new($email,$subject1,$message1,$org_id);


			// unset($_SESSION['txnd']);
			// $ci->session->unset_userdata('txnd');
			// $ci->session->sess_destroy();
		/*end user guide mail*/
	}
	// function getOrgName($id)
	// {
	// 	$cn = Fcon();
	// 	$query = $cn->prepare("SELECT Name FROM `Organization` WHERE Id=$id");
	// 	   $query->execute();
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
	
	function sendMailJS($to,$subject,$msg,$headers='',$file="") {
		
		$fname='ubiAttendance';
		$userName = 'ubiattendance@ubitechsolutions.com';
		// Instantiate a new PHPMailer 
		$mail = new PHPMailer;
		// Tell PHPMailer to use SMTP
		$mail->isSMTP();
		// Replace sender@example.com with your "From" address. 
		// This address must be verified with Amazon SES.
		$mail->setFrom($userName, $fname);

		// Replace recipient@example.com with a "To" address. If your account 
		// is still in the sandbox, this address must be verified.
		// Also note that you can include several addAddress() lines to send
		// email to multiple recipients.
		$mail->addAddress($to);

		// Replace smtp_username with your Amazon SES SMTP user name.
		$mail->Username = 'AKIAINHTNV5UDYHKLUHA';

		// Replace smtp_password with your Amazon SES SMTP password.
		$mail->Password = 'Aj3bqCkDsPYRWH6impKmMeRXbyspo0yP3/MC1F8j1b4K';

		// Specify a configuration set. If you do not want to use a configuration
		// set, comment or remove the next line.
		//$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');

		// If you're using Amazon SES in a region other than US West (Oregon), 
		// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
		// endpoint in the appropriate region.
		$mail->Host = 'email-smtp.us-west-2.amazonaws.com';

		// The subject line of the email
		$mail->Subject = $subject;

		// The HTML-formatted body of the email
		$mail->Body = $msg;

		// Tells PHPMailer to use SMTP authentication
		$mail->SMTPAuth = true;

		// Enable TLS encryption over port 587
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		// Tells PHPMailer to send HTML-formatted email
		$mail->isHTML(true);
		
		if($file!="")
		$mail->AddAttachment($file);
		// The alternative email body; this is only displayed when a recipient
		// opens the email in a non-HTML email client. The \r\n represents a 
		// line break.
		//$mail->AltBody = "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";
		if(!$mail->send()){ 
			//$err=$mail->ErrorInfo;
			return false;
		/* //echo 'aa';
		echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
		$err=$mail->ErrorInfo;
		echo "Email not sent!" , PHP_EOL;
		//Trace($err);
		return false; */
		}else{
			//echo "Message has been sent successfully";
			return true;
		/* echo "Email sent!" , PHP_EOL;
		 */
		}
	}
?>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


<script>

$(function(){
	
	$.ajax({
		url:"http://ubiattendance.zentylpro.com/index.php/Att_services/updateReferralDiscountStatus?orgId=<?php echo $orgIdForReferral?>&amountPaid=<?php echo $amountToSend?>",
		success:function(data){
			console.log(data);
		},
		error:function(e){
			// alert("Error updating referral status");
		}
		
	});
	
	
});

</script>
<!-- </body>
</html> -->
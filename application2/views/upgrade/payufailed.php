<?php
// session_start();
// 	header('Content-Type: text/html; charset=utf-8');
// 	include('config.php'); 
 ?>
<!-- <html>
<head>
 <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

</head> -->
<body>
<?php
echo '<h2>Transaction Failed</h2><a href="https://buy.ubiattendance.com">Try to pay again</a>'; 
   // function use for create connection
	//PaymentFailedpayu();
	function PaymentFailedpayu(){
	
	 $productinfo=isset($_REQUEST["productinfo"])?json_decode($_REQUEST["productinfo"], true):'0';
	 $ind_name=isset($productinfo[0]['companyname'])?$productinfo[0]['companyname']:'0';
	 $amount=isset($_REQUEST["amount"])?($_REQUEST["amount"]):'0';
	 $discount=isset($productinfo[0]['discount'])?($productinfo[0]['discount']):'0';
	 $duration=isset($productinfo[0]["duration"])?($productinfo[0]["duration"]):'0';
	 $plan=isset($productinfo[0]["plan"])?$productinfo[0]["plan"]:'0';
	 $plan = strtoupper($plan);
	 $country=isset($_REQUEST["country"])?($_REQUEST["country"]):'0';
	 $street=isset($_REQUEST["street"])?($_REQUEST["street"]):'0';
	 $city=isset($_REQUEST["city"])?$_REQUEST["city"]:'0';
	 $zip= isset($_REQUEST["zipcode"])?$_REQUEST["zipcode"]:'0';
	 $nofuser=isset($productinfo[0]["noofusers"])?$productinfo[0]["noofusers"]:'0'; 
	 $contact= isset($_REQUEST["phone"])?$_REQUEST["phone"]:'0';
	 $currency= isset($productinfo[0]["currency"])?$productinfo[0]["currency"]:'0';
	 $tax= isset($productinfo[0]["taxforinr"])?($productinfo[0]["taxforinr"]):'0';
	 $gstin= isset($productinfo[0]["gstin"])?$productinfo[0]["gstin"]:'0';
	 $org_id= isset($productinfo[0]['orgid'])?($productinfo[0]['orgid']):'0';
	// $ind_name='no name';
	 $state=isset($productinfo[0]["state"])?$productinfo[0]["state"]:'0';
	 
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
	 $cn = Fcon();
	 
	 
	 if(!isset($_SESSION['txnd'])){
		 $query = $cn->prepare("SELECT max(id)as id FROM `payments_invoice`");
		 $query->execute();
		 $row = $query->fetch();
		 if($row)
			$id=$row['id'];
		 $txnid=$org_id.''.$id;	
		 $_SESSION['txnd']=$txnid;
	 }else{
		 $txnid=$_SESSION['txnd'];
	 }
	 if($plan=='YEARLY')
		 $duration=$duration * 12; // if plan is yearly, it should be convert in months
	   
	 $query = $cn->prepare("SELECT `end_date`  FROM `licence_ubiattendance` WHERE `OrganizationId`='$org_id' limit 1");
	 $query->execute();
	 $row = $query->fetch();
	 if($row)
		$plan_enddate= $row['end_date'];
	if($plan_enddate < $today)
			 $plan_enddate=$today;
		
	  $plan_enddate = date('Y-m-d', strtotime("+".$duration." months", strtotime($plan_enddate)));

	 $query = $cn->prepare("SELECT id FROM `payments_invoice` WHERE `txnid`='$txnid'");
	  $query->execute();
	 $row = $query->fetch();
	 if($row)
	 {
			 echo '<h2>Transaction Failed</h2><a href="https://buy.ubiattendance.com">Try to pay again</a>';
			 return false;
	 }
	$plan_enddate1 = date('d M, Y',strtotime($plan_enddate));
	$query = $cn->prepare("INSERT INTO `payments_invoice`(`txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`, `remark`,`narration`, `action`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$query->execute(array($txnid,$org_id,$Company,$email,$amount,'FAILED',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Payment recieved via auto mode-payumoney','Subscription Period: Your Subscription will end on '.$plan_enddate1.'<br/>Administrator Login (1 Admin)<br/>User Logins ('.$nofuser.' Users)','BUY'));
		echo '<h2>Transaction Failed</h2><a href="https://buy.ubiattendance.com">Try to pay again</a>'; 
		
	}
	// function getOrgName($id){

	// 	$cn = Fcon();
				
	// 	$query = $cn->prepare("SELECT Name FROM `Organization` WHERE Id=$id");
	// 	       $query->execute();
				
	// 			if($row = $query->fetch())
	// 	         return $row['Name'];
	// 		    else
	// 				return "not found";
				
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
?>
<!-- </body>
</html> -->
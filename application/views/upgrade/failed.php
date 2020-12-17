<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	include('config.php'); 
 ?>
<html>
<head>
 <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

</head>
<body>
<?php
	PaymentFailedpaypal();
	function PaymentFailedpaypal(){
		   
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
	// $ind_name='no name';
	 $state=isset($_REQUEST["state"])?$_REQUEST["state"]:'0';
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
	 $query->execute(array($txnid,$org_id,$Company,$email,$amount,'FAILED',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,'Payment recieved via auto mode-paypal','Subscription Period: Your Subscription will end on '.$plan_enddate1.'<br/>Administrator Login (1 Admin)<br/>User Logins ('.$nofuser.' Users)','BUY'));*/
	
		echo '<h2>Transaction Failed</h2><a href="https://buy.ubiattendance.com">Try to pay again</a>';
		
	}
	function getOrgName($id){

		$cn = Fcon();
				
		$query = $cn->prepare("SELECT Name FROM `Organization` WHERE Id=$id");
		       $query->execute();
				
				if($row = $query->fetch())
		         return $row['Name'];
			    else
					return "not found";
				
	}
		function getTimeZone($orgid=10){
		       $cn = Fcon();
		//////////////-------getting time zone
			   $st=$cn->prepare("SELECT name
				FROM ZoneMaster
				WHERE id = ( 
				SELECT  `TimeZone` 
				FROM  `Organization` 
				WHERE id =$orgid
				LIMIT 1)");
				$zone='Asia/Kolkata';
				$st->execute();
				$row = $st->fetch();
				if($row)
		         return $zone=$row['name'];
			     else
				return $zone;
			//////////////-------/getting time zone
	}
	
	function getAdminEmail($id){
		$cn = Fcon();
		$query = $cn->prepare("SELECT Email FROM `Organization` WHERE Id=$id");
		    $query->execute();
				$row = $query->fetch();
				if($row)
		         return $row['Email'];
			    else
					return "";
	}

	
?>
</body>
</html>

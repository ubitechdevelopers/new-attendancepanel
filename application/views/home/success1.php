

<?php
// require_once("PhpMailer/class.phpmailer.php");
	Addonpay($orderid);
	$orgIdForReferral=0;
	$amountToSend=0;

	function Addonpay($orderid)
	{
		
		$handle = curl_init(); 
		$url = "https://api.razorpay.com/v1/orders/".$orderid."/payments";
		curl_setopt_array($handle,
		array(
		  CURLOPT_URL            => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HTTPAUTH => CURLAUTH_ANY,
		  //CURLOPT_USERPWD  => "rzp_test_BgImr1BHLjaJet:5Va6po0QhSaZ3r8SxKPWx18I",// test key
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
		
		// $data4=$data3['multiple'];

		// $datamultiple=explode(',',$data4);
		// $nouser = rtrim($datamultiple[6], ")");
		//  $geofence = substr($datamultiple[0], 6);
 
		$payment_id=$data2['id'];
		$order_id=$data2['order_id']; 
		$amt=($data2['amount'])/100;


		$addonname=isset($data3["addonname"])?$data3["addonname"]:'0';		
		$amount=isset($amt)?$amt:'0';
		
		$orgid=isset($data3['orgid'])?$data3['orgid']:'0';
		$createddate=isset($data3['createddate'])?$data3['createddate']:'0';
		//echo $createddate;
		$AddonEnddate=isset($data3['AddonEnddate'])?$data3['AddonEnddate']:'0';
		
		
		
		
		

	 if($orgid==0){
		 echo "Page not found...";
		 return false;
	 }
	 
	 
	
	 $ci =& get_instance();
		$ci->load->database();
		
		$query = $ci->db->query("SELECT `Order_id`  FROM `addons_master` WHERE  Order_id ='$order_id' ");
			if($ci->db->affected_rows() > 0){


				echo "Addon Already Purchased  ";

				return false;
			}
	

	 $query = $ci->db->query("INSERT INTO `addons_master`(Addon_name,OrganizationId,created_date,AddonEnd_date,Order_id,Payment_id,addon_amount) VALUES (?,?,?,?,?,?,?)",(array($addonname,$orgid,$createddate,$AddonEnddate,$order_id,$payment_id,$amt)));
	 // echo $bulk_attprice;
     // echo $bulk_attprice_status;
  //    $ci =& get_instance();
		// $ci->load->database();
		// $query = $ci->db->query("SELECT `addon_livelocationtracking`  FROM `licence_ubiattendance` WHERE `OrganizationId`='$orgid'");
		
	 // if($row = $query->result())
	 // $addonlivet=  $row[0]->addon_livelocationtracking;

		// if($addonlivet)
		// {
		// 	$addon_livelocationtracking=1;
	 if($ci->db->affected_rows() > 0){
		
		
	
		$ci =& get_instance();
		$ci->load->database();
		if($addonname=="addon_livelocationtracking")
		{
		$query = $ci->db->query("update licence_ubiattendance set addon_livelocationtracking = 1  where OrganizationId = $orgid");
		}
		else if($addonname=="addon_GeoFence")
		{
			$query = $ci->db->query("update licence_ubiattendance set addon_GeoFence = 1  where OrganizationId = $orgid");
		}
		else if($addonname=="addon_BasicLeave")
		{
			$query = $ci->db->query("update licence_ubiattendance set addon_BasicLeave = 1  where OrganizationId = $orgid");
		}
		else if($addonname=="Addon_FaceRecognition")
		{
			$query = $ci->db->query("update licence_ubiattendance set Addon_FaceRecognition = 1  where OrganizationId = $orgid");
		}
		else if($addonname=="Addon_advancevisit")
		{
			$query = $ci->db->query("update licence_ubiattendance set Addon_advancevisit = 1  where OrganizationId = $orgid");
		}
		else if($addonname=="Addon_ShiftPlanner")
		{
			$query = $ci->db->query("update licence_ubiattendance set Addon_ShiftPlanner = 1  where OrganizationId = $orgid");
		}
		// var_dump($ci->db->last_query());
		//alert("Addon Added Successfully");
		

	}
		// }
		
}
		

?>

<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> -->




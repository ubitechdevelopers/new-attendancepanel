<?php
class Orgdetailsupgrade extends CI_Model {
	function __construct()
    {
        parent::__construct();
		
    }
    // include('config.php');
	// this if return orgnization details 
    public function orgdetails(){
    		$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:0;

    		// if($sts==0){

    		// 	echo "hello ubitech";
    		// }
    		// var_dump($sts);
    		// die;
	if($sts==1)
	{
	$data = array();
	/* $num = sqrt((int)$_REQUEST['name']-99);  */
	   $num = $this->getOrgId(isset($_REQUEST['name'])?$_REQUEST['name']:0); 
	 
		  // $cn = Fcon();
		  $st = $this->db->query("SELECT O.Name,O.PhoneNumber, O.Country, L.start_date,L.end_date, L.status, O.cleaned_up,(SELECT count(*) FROM EmployeeMaster WHERE OrganizationId='$num'and Is_delete !=2) as noemp,(SELECT username FROM admin_login WHERE OrganizationId='$num' limit 1)as username,O.NoOfEmp as userlimit, L.Addon_BulkAttn,L.Addon_VisitPunch,L.Addon_FaceRecognition,L.Addon_DeviceVerification,L.Addon_GeoFence,L.Addon_Payroll,L.Addon_TimeOff  from Organization O , licence_ubiattendance L where O.Id='$num' AND L.OrganizationId='$num' and cleaned_up=0");
		  // var_dump($this->db->last_query());
		   // $st->execute();
		   foreach($st->result() as $row)
		   {
		   	if($sts==1){
				$data['status'] = true;
				$data['orgname'] =$row->Name;
				$data['startdate'] =$row->start_date;
				$data['startdate1'] =date('d-M-Y',strtotime($row->start_date));
				$data['enddate'] =$row->end_date;
				$data['enddate1'] =date('d-M-Y',strtotime($row->end_date));
				$data['noemp'] =$row->noemp;
				$data['userlimit'] =$row->userlimit;
				$data['PhoneNumber'] =$row->PhoneNumber;
				$data['Country'] =$row->Country;
				$data['planStatus'] =$row->status;
				$data['cleaned_up'] =$row->cleaned_up;
				$data['OrganizationId'] =$num;
				$data['username'] =$row->username;
				$data['bulkatt'] =$row->Addon_BulkAttn;
				$data['visitpunch'] =$row->Addon_VisitPunch;
				$data['geofence'] =$row->Addon_GeoFence;
				$data['hourlypay'] =$row->Addon_Payroll;
				$data['timeoff'] =$row->Addon_TimeOff;
				$data['device'] =$row->Addon_DeviceVerification;
				$data['face1'] =$row->Addon_FaceRecognition;
				// var_dump($this->db->last_query());
				
		   }
		   else
			{
				$data['status'] = false;
				
			}
			// print_r($data);
			echo json_encode($data);
		}

		    

	}
	// this if return plan details 
	else if($sts==2)
	{
		 // $cn = Fcon();
		 $st = $this->db->query("SELECT * FROM Attendance_plan_master ");
		 // $st->execute();
		 $row = $st->result();
		 echo json_encode($row);
	}
	 // this if return return discount 
	else if($sts==3)
	{
		$plan = isset($_REQUEST['plan'])?$_REQUEST['plan']:'0';
		$currency = isset($_REQUEST['currency'])?$_REQUEST['currency']:'0';
		$q = "";
		$today = date("Y-m-d");
		if($plan=='Month' && $currency=='USD')
		{
			$q = "plan='MONTHLY' AND currency='USD' ";
		}
		else if($plan=='Month' && $currency=='INR')
		{
			$q = "plan='MONTHLY' AND currency='INR'";
		}
		else if($plan=='Year' && $currency=='INR')
		{
			$q = "plan='YEARLY' AND currency='INR'";
		}
		else if($plan=='Year' && $currency=='USD')
		{
			$q = "plan='YEARLY' AND currency='USD'";
		}
		if($q != "")
		{
		  // $cn = Fcon();
		  $st = $this->db->query("SELECT discount FROM attendance_discount_master WHERE status=1 AND start_date <= '$today' AND end_date >= '$today' AND $q ");
		    // $c = $st->execute();
			// $row = $st->result();
			// if($c)
		 //      echo (json_encode($row));
		 //    else
			// 	echo false;
		 //  if($row= $st->result()){

		 //  		 echo (json_encode($row));
			// }
			// else{

			// 	echo false;
			// }
		  $row = $st->result();
		 echo json_encode($row);
		}
		else
		{
		  echo false;	
		}
	}
	else if($sts==4)
	{
		// $x = "dsfndsmjk";
		// var_dump($x);
		    // $cn = Fcon();
		 //    $st = $this->db->query("SELECT * FROM `CountryMaster` order by Name");
		 //    var_dump($this->db->last_query());
		 //    // $c = $st->execute();
			// $row = $st->result();
			
			// $st1 = $this->db->query("SELECT * FROM `state_gst`  order by name");
		 //    // $c1 = $st1->execute();
			// $row1 = $st1->result();
			// $data = array();
			// $data['state'] = $row1;
			// $data['country'] = $row;
			// echo json_encode($data);

			 $st = $this->db->query("SELECT * FROM `CountryMaster` order by Name");
		    // var_dump($this->db->last_query());
		    // $c = $st->execute();
			// $row = $st->result();
			$d=array();
			$res=array();
			foreach($st->result() as $row){
					$data=array();
					$data['id']=$row->Id;
					$data['code']=$row->countrycode;
					$data['name'] = $row->Name;

						$res[]=$data;
			}
			// $d['data']=$res; 
			// $data['country'] = $d['data'];
			//  $this->db->close();
			// echo json_encode($d);
			// return false;
			 $st1 = $this->db->query("SELECT * FROM `state_gst`  order by name");
		    // var_dump($this->db->last_query());
		    // $c = $st->execute();
			// $row = $st->result();
			
			$res1=array();
			foreach($st1->result() as $row){
					$data=array();
					$data['id']=$row->id;
					$data['code']=$row->code;
					$data['name'] = $row->name;

						$res1[]=$data;
			}
			// $d['data']=$res; 
			// $d1['data']=$res1; 
			$d['country']=$res;
			$d['state'] = $res1;
			 $this->db->close();
			echo json_encode($d);
			return false;




	}
	else if($sts==5)
	{
		 $ind_name=isset($_REQUEST["ind_name"])?$_REQUEST["ind_name"]:'0';
		 $amount=isset($_REQUEST["total"])?$_REQUEST["total"]:'0';
		 $discount=isset($_REQUEST["discount"])?$_REQUEST["discount"]:'0';
		 $duration=isset($_REQUEST["duration"])?$_REQUEST["duration"]:'0';
		 $plan=isset($_REQUEST["plan"])?$_REQUEST["plan"]:'0';
		 $plan = strtoupper($plan);
		 $country=isset($_REQUEST["country"])?$_REQUEST["country"]:'0';
		 $street=isset($_REQUEST["street"])?$_REQUEST["street"]:'0';
		 $city=isset($_REQUEST["city"])?$_REQUEST["city"]:'0';
		 $zip= isset($_REQUEST["zip"])?$_REQUEST["zip"]:'0';
		 $nofuser=isset($_REQUEST["noofusers"])?$_REQUEST["noofusers"]:'0'; 
		 $contact= isset($_REQUEST["contact"])?$_REQUEST["contact"]:'0';
		 $currency= isset($_REQUEST["currency"])?$_REQUEST["currency"]:'0';
		 $tax= isset($_REQUEST["taxforinr"])?$_REQUEST["taxforinr"]:'0';
		 // echo $tax."hello ubitech";
		 // echo $tax;
		 // die;
		 $gstin= isset($_REQUEST["gstin"])?$_REQUEST["gstin"]:'0';
		 $org_id= isset($_REQUEST["OrganizationId"])?$_REQUEST["OrganizationId"]:'0';
		// $ind_name='no name';
		 $state=isset($_REQUEST["state"])?$_REQUEST["state"]:'0';
		 $Company=$this->getOrgName($org_id);
		 $zone=$this->getTimeZone($org_id);
		 date_default_timezone_set($zone);
		 $today=date('Y-m-d');	
		 $amount=$amount-$tax;

		 
		 $data		=	array();
		 $email=$this->getAdminEmail($org_id);
		 $txnid=$org_id.''.'';
		 $id=0;
		 $plan_enddate='';
		 // $cn = Fcon();
		 
		 $query = $this->db->query("SELECT max(id)as id FROM `payments_invoice`");
		 // $query->execute();
		 if($row=$query->result())
		 
			$id=$row[0]->id;
		 $txnid=$org_id.''.$id;	
		
		if($plan=='YEARLY')
		 $duration=$duration * 12; 
		$query = $this->db->query("SELECT `end_date`  FROM `licence_ubiattendance` WHERE `OrganizationId`='$org_id' limit 1");
		 // $query->execute();
		 if($row=$query->result())
		 
			$plan_enddate= $row[0]->end_date;
		if($plan_enddate < $today)
			$plan_enddate=$today;
			
		  $plan_enddate = date('Y-m-d', strtotime("+".$duration." months", strtotime($plan_enddate)));
		  $plan_enddate1 = date('d M, Y',strtotime($plan_enddate));
		 $query = $this->db->query("INSERT INTO `temp_payment`(`txnid`, `OrganizationId`, `name`, `email`, `payment_amount`, `payment_status`, `createDate`, `tax`, `discount`, `currency`, `country`, `state`, `city`, `street`, `contact`, `zip`, `indivisual_name`, `gstin`,`noofusers`, `duration`, `remark`,`narration`, `action`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",(array($txnid,$org_id,$Company,$email,$amount,'SUBMIT',$today,$tax,$discount,$currency,$country,$state,$city,$street,$contact,$zip,$ind_name,$gstin,$nofuser,$duration,'Payment submitted via payment module','Plan Period: Your Plan will end on '.$plan_enddate1.'<br/>Administrator Login (1 Admin)<br/>User Logins ('.$nofuser.' Users)','BUY')));
		 // var_dump($this->db->last_query());
		 // die;
		 echo true;

		 

	}
}
	
	 public function getOrgId($name)
	{
	// $cn = Fcon();
	$query = $this->db->query("SELECT Id FROM `Organization` WHERE Email='$name'");
		// $query->execute();
			
			if($r=$query->result())
			 return $r[0]->Id;
			else
				return "";
	}
	public function getOrgName($id){
		// $cn = Fcon();
				
		$query = $this->db->query("SELECT Name FROM `Organization` WHERE Id=$id");
		       // $query->execute();
				if($row = $query->row())
		            return $row->Name;
			    else
					return "not found";
	}
		public function getTimeZone($orgid=10){
		       // $cn = Fcon();
		//////////////-------getting time zone
			   $st=$this->db->query("SELECT name
				FROM ZoneMaster
				WHERE id = ( 
				SELECT  `TimeZone` 
				FROM  `Organization` 
				WHERE id =$orgid
				LIMIT 1)");
				$zone='Asia/Kolkata';
				// $st->execute();
				if($r=$st->result()){
				 
		         return $zone=$r[0]->name;
		         }
			     else
				return $zone;
			//////////////-------/getting time zone
	}
	
	public function getAdminEmail($id){
		// $cn = Fcon();
		$query = $this->db->query("SELECT Email FROM `Organization` WHERE Id=$id");
		    // $query->execute();
				if($r=$query->result())
		         return $r[0]->Email;
			    else
					return "";
	}


}
?>
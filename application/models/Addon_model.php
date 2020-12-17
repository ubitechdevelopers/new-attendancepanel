<?php

class Addon_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //include(APPPATH."PhpMailer/class.phpmailer.php");
    }

public function updateaddonedit($id)
	{	
	
	$edit=$_REQUEST['edit'];
	// var_dump($advancevisit);
	// die();
$query = $this->db->query("update licence_ubiattendance set Addon_Edit= '$edit' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	}
		
		

public function updateaddonshiftplanner($id)
		{	
	
	$shiftplanner=$_REQUEST['shiftplanner'];
	$query = $this->db->query("update licence_ubiattendance set Addon_ShiftPlanner='$shiftplanner' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	}


public function updateaddonautotimeout($id)
		{	
	
	
	$autotimeout=$_REQUEST['autotimeout'];
	$query = $this->db->query("update licence_ubiattendance set Addon_AutoTimeOut= '$autotimeout' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	 }

public function updateaddondelete($id)
		{	
	
	
	$delete123=$_REQUEST['delete123'];
	$query = $this->db->query("update licence_ubiattendance set Addon_Delete= '$delete123' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	}	
		

public function updateaddonoffline($id)
		{	
	
	
	$offline=$_REQUEST['offline'];
	$query = $this->db->query("update licence_ubiattendance set Addon_offline_mode='$offline' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	}


public function updateaddoselfie($id)
		{	
	
	
	$selfie=$_REQUEST['selfie'];
	$query = $this->db->query("update licence_ubiattendance set image_status='$selfie' where OrganizationId = '$id' ");
	$query1 = $this->db->query("update `admin_login` set AttnImageStatus = ' $selfie', visitImageStatus = '$selfie' where OrganizationId = '$id' ");
			//var_dump($this->db->last_query());
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
			  
		}


public function updateaddoncovid($id)
		{	
	
	
	$covid=$_REQUEST['covid'];
	$query = $this->db->query("update licence_ubiattendance set addon_COVID19='$covid' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	}


public function updateaddonadvisit($id)
		{	
	

	$advancevisit=$_REQUEST['advancevisit'];
	$query = $this->db->query("update licence_ubiattendance set Addon_advancevisit='$advancevisit' where OrganizationId = '$id' ");
	$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;

	}


public function updateaddonleave($id)
		{	
	
	
	$basicleave=$_REQUEST['basicleave'];
	$query = $this->db->query("update licence_ubiattendance set Addon_BasicLeave='$basicleave' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return;
	 }
	 
	 public function updateaddonadminatt($id)
	 {
		$adminatt=$_REQUEST['attendanceadon'];
	$query = $this->db->query("update licence_ubiattendance set Addon_BulkAttn='$adminatt' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return; 
	 }
	 
	 
	  public function updateaddonvisitpunch($id)
	 {
		$visitpunch=$_REQUEST['visitpunch'];
	$query = $this->db->query("update licence_ubiattendance set Addon_VisitPunch='$visitpunch' where OrganizationId = '$id' ");
$res=$this->db->affected_rows();
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return; 
	 }
	 
	  public function updateaddonmobileid($id)
	 {
		$mobileid=$_REQUEST['mobileid'];
		
	$query = $this->db->query("update licence_ubiattendance set Addon_DeviceVerification='$mobileid' where OrganizationId = '$id' ");
	/*  echo "update licence_ubiattendance set addon_mobileId='$mobileid' where OrganizationId = '$id' ";
	exit;
	die;  */
$res=$this->db->affected_rows();
/* echo $res;
exit; */
	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return; 
	 }
	 
	   public function updateaddontimeoff($id)
	 {
		$timeoff=$_REQUEST['timeoff'];
		/* var_dump($timeoff);
		die(); */
	$query = $this->db->query("update licence_ubiattendance set Addon_TimeOff='$timeoff' where OrganizationId = '$id' ");
	
$res=$this->db->affected_rows();

	 if($res)
	 {
	 	echo 1;
	 }
	 else
	 {
	 	echo 0;
	 }
	 return; 
	 }

		public function getallState(){
			$query = $this->db->query("SELECT * FROM state_gst ORDER BY name");
			$states=array();
			$codes=array();
			foreach ($query->result() as $row)
				{
					$states['name'][]=$row->name;
					$codes['code'][]=$row->code;
					
				}$data['states']=$states;
				$data['codes']=$codes;
				
				return $data;
		}

			public function editOrganizationData($id){
				// var_dump($id);
				// die();
			    $res=array();		
			    $result=array();		
				
				$query = $this->db->query("select * from Organization where Id = $id");
				// var_dump($this->db->last_query());
				// die;
				foreach ($query->result_array() as $row)
				{
					$res['id'] = $row['Id'];
					// var_dump($res['id']);
					// die();
					$res['Name'] = $row['Name'];
					$res['PhoneNumber'] = $row['PhoneNumber'];
					$res['Email'] = $row['Email'];
					$res['Address'] = $row['Address'];
					$res['remarks'] = $row['org_remark'];
					$res['orgtype'] = $row['customize_org'];
					$res['country_id'] = $row['Country'];
					$res['userLimit'] = $row['NoOfEmp'];
					$res['timezone'] = $row['TimeZone'];
					$tme=$res['timezone'];
					$res['fiscal_start'] = $row['fiscal_start'];
					$res['fiscal_end'] = $row['fiscal_end'];
					$res['entitled_leave'] = $row['entitled_leave'];
					
					
					$tme2=$this->db->query("SELECT Id FROM ZoneMaster WHERE Id=$tme");
				
					if($row1=$tme2->row()){
					$res['code1']= $row1->Id;
				
					}

					
					$res['rating'] = $row['rating'];
					$res['lead_id'] =  $row['leadowner_id'];
					$res['Country']="";
					$country =  $row['Country'];
					//var_dump($country);
					//die;
					$this->db->where('Id', $country);
					$q = $this->db->get('CountryMaster');
					$data = $q->result_array();
					//var_dump($data);
					//die;
					$res['Country'] = $data[0]['Name'];
					
					
					$res['leadowner_id']="";
					$leadowner_id =  $row['leadowner_id'];
					$this->db->where('Id', $leadowner_id);
					$q1 = $this->db->get('lead_owner');
					$data1 = $q1->result_array();
					
					
					if($this->db->affected_rows()>0)
					{
					$res['leadowner_id'] = $data1[0]['name'];
					}
					else
					$res['leadowner_id'] ="";
					
					
					$res['activeUsers']=0;
					$query = $this->db->query("select count(id) as activeUsers from UserMaster where OrganizationId = $id");
					if($row =$query->result_array())
						$res['activeUsers']=$row[0]['activeUsers'];
					
					
					
					$qry = $this->db->query("SELECT * from payments_invoice where OrganizationId='$id' order by Id DESC limit 1");
					    $res['city'] = "";
						$res['state'] = "";
						$res['gst'] = "";
						$res['tax'] = "";
						$res['currency'] = "";
						$res['discount'] = "";
						$res['paymentamount'] = "";
						$res['txnid'] = "";
						$res['paymentmethod'] = "";
						
					foreach($qry->result() as $rw)
					{
						$res['city'] = $rw->city;
						$res['state'] = $rw->state;
						$res['gst'] = $rw->gstin;
						$res['tax'] = $rw->tax;
						$res['currency'] = $rw->currency;
						$res['discount'] = $rw->discount;
						$res['paymentamount'] = $rw->payment_amount+$res['tax'];
						$res['txnid'] = $rw->txnid;
						$res['paymentmethod'] = $rw->payment_method;
						// var_dump($res['paymentmethod']);
						
					}
				}
				$query = $this->db->query("select due_amount,image_status,Addon_BulkAttn,Addon_LocationTracking,Addon_VisitPunch,Addon_GeoFence,Addon_Payroll,Addon_TimeOff,Addon_flexi_shif,Addon_offline_mode ,Addon_Edit, Addon_Delete, Addon_AutoTimeOut,Addon_FaceRecognition,Addon_DeviceVerification,addon_COVID19,addon_livelocationtracking,Addon_BasicLeave,Addon_advancevisit,Addon_ShiftPlanner from licence_ubiattendance where OrganizationId = $id");
				//var_dump($this->db->last_query());
				//exit();

				if($row = $query->result()){
					$res['due']= $row[0]->due_amount;
				
				    $res['attendanceadon'] = $row[0]->Addon_BulkAttn;
					
				    $res['locationtracking'] = $row[0]->Addon_LocationTracking;
				    $res['visitpunch'] = $row[0]->Addon_VisitPunch;
				    $res['geofence'] = $row[0]->Addon_GeoFence;
				    $res['payroll'] = $row[0]->Addon_Payroll;
				    $res['timeoff'] = $row[0]->Addon_TimeOff;
				    $res['flexi'] = $row[0]->Addon_flexi_shif;
				     $res['offline'] = $row[0]->Addon_offline_mode;
				     $res['edit123'] = $row[0]->Addon_Edit;
				     $res['delete123'] = $row[0]->Addon_Delete;
				     $res['autotimeout'] = $row[0]->Addon_AutoTimeOut;
				     $res['image_status'] = $row[0]->image_status;
				     $res['facerecog'] = $row[0]->Addon_FaceRecognition;
					 $res['mobileid'] = $row[0]->Addon_DeviceVerification;
				     $res['covid19'] = $row[0]->addon_COVID19;
				     $res['livelocationtracking'] = $row[0]->addon_livelocationtracking;
				     $res['basicleave'] = $row[0]->Addon_BasicLeave;
				     $res['advancevisit'] = $row[0]->Addon_advancevisit;
				     $res['shiftplanner'] = $row[0]->Addon_ShiftPlanner;
				}
					 //print_r($res['edit123'] );
					//print_r($res['image_status'] );
					//exit();

				
				$query = $this->db->query("select name from admin_login where OrganizationId = $id");
				if($row = $query->result())
					$res['contectperson']=$row[0]->name;
				
				return $res;		  		
		}

		public function getCountries()
		{
			$query = $this->db->query("SELECT `Id`, `Name` FROM `CountryMaster` order by Name");
			return $query;
		}

		public function getTrialData($id){
		        $res1=array();			
				$query1 = $this->db->query("SELECT * FROM licence_ubiattendance WHERE OrganizationId = $id");
				foreach ($query1->result_array() as $row1)
				{
					$res1['id'] = $row1['id'];
					$res1['org_id'] = $row1['OrganizationId'];
					$res1['start_date'] = $row1['start_date'];
					$res1['end_date'] = $row1['end_date'];
					$res1['extended'] = $row1['extended'];
					$res1['status'] = $row1['status'];
					$res1['archive'] = $row1['archive'];
				}
				return $res1;	
		}

		public function getextendeddata($id){
		        $res1=array();			
				$query1 = $this->db->query("SELECT * FROM licence_ubiattendance WHERE OrganizationId = $id");
				foreach ($query1->result_array() as $row1)
				{
					$res1['id'] = $row1['id'];
					$res1['org_id'] = $row1['OrganizationId'];
					$res1['end_date'] = $row1['end_date'];
					
				}
				return $res1;	
		}

		public function getAllLeadData()
		{
			$query = $this->db->query("SELECT `id`, `name` FROM `lead_owner`");
			return $query;
		}
			public function trackLocationsvisit($eid,$date,$timein,$timeout)
	{
		//var_dump($timeout);
		header('Access-Control-Allow-Origin: *'); 
		$orgid=isset($_SESSION['orgid'])?$_SESSION['orgid']:'0';
	 
		$timeoutss = strtotime($timeout);
		$timeout1 = date("H:i:s",strtotime('+1 minutes',$timeoutss));
		
		//var_dump($timeout=='00:00' && $timeoutdate=='0000-00-00' );
	
		//if($timeout=='00:00' && $timeoutdate=='0000-00-00' ){
			
			
		
		$query = $this->db->query("SELECT EMP.Id,EMP.EmployeeCode,CONCAT(FirstName,' ',LastName) as name, CM.FakeVisitOutTimeStatus, CM.FakeVisitInTimeStatus ,CM.location,CM.checkin_img,CM.checkout_img, CM.`latit`,CM.`FakeLocationStatusVisitIn`,CM.`FakeLocationStatusVisitOut`, CM.`longi`,CM.`latit_out`, CM.`longi_out`,CASE WHEN(CM.time_out > CM.time) THEN (TIMEDIFF(CM.time_out,CM.time)) ELSE('-') END as total,CM.`time_out`, CM.`time`, CM.`date`, CM.`client_name`,CM.location_out, CM.`description` FROM `checkin_master` CM,EmployeeMaster EMP  WHERE CM.OrganizationId=$orgid and EMP.Id=? AND CM.EmployeeId=? AND CM.date='$date'  AND EMP.Is_Delete = '0'   order by date(date) Desc, CM.time asc ",array($eid,$eid));
		
		//var_dump($this->db->last_query());
		//}
		 
		$res = array();
		foreach($query->result() as $row)
		{
			// if($row->time_out !='00:00:00' && $row->time_out =='00:00:00'){
			$data = array();
			//$chid=$row->Id;
			$data['client_name'] = $row->client_name;
			$data['location'] = $row->location;
			$data['latit'] = $row->latit;
			$data['longi'] = $row->longi;
			
			
		
			
			$data['time'] = $row->time;
			$data['location_out'] = $row->location_out==''?'-':$row->location_out;
			$data['latit_out'] = $row->latit_out;
			$data['longi_out'] = $row->longi_out;
			$data['time_out'] = $row->time_out=='00:00:00'?'-':$row->time_out;
			$data['description'] =  $row->description;
			$data['total'] =  substr($row->total,0,5);
			//$data['descriptionIn'] =  $row->descriptionIn;
			//$data['workhour'] =$row->workhour;
			
			$data['entryimage'] =$row->checkin_img;
			 if($data['entryimage']== ''){
				$data['entryimage']='-';
			}else{
				$data['entryimage'] =$row->checkin_img;
			} 
			
			$data['exitimage'] =$row->checkout_img;
			
			 if($data['exitimage']== ''){
				$data['exitimage']='-';
			}else{
				$data['exitimage'] =$row->checkout_img;
			} 
			
			
		
			
			$res[] = $data;
		}
	// }
		return ($res);
   }
      public function livetrack($dateSelected){
	$orgid=$_SESSION['orgid'];
	//var_dump($dateSelected);
	$query=$this->db->query("SELECT E.* FROM `EmployeeMaster` E,AttendanceMaster A WHERE E.`OrganizationId` = $orgid AND E.`livelocationtrack` = 1 AND E.archive=1 and E.Is_Delete = 0 AND A.EmployeeId=E.Id AND A.AttendanceStatus=1 AND A.AttendanceDate='$dateSelected' order by E.FirstName Asc
");
	$data=array();
	$res=array();
	foreach($query->result() as $row){
		//$data['name']=$row->FirstName;
		$data['name']='<a  style="color:#000;" href="'.URL.'location/livetrack/'.$row->Id.'/'.$dateSelected.'">'.$row->FirstName.'</a>';
		$data['empname']=$row->FirstName;
		$data['empid']=$row->Id;
		
		$data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.IMGURL3."avatars/female.png".'"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
		
		
		if($row->ImageName!="" || $row->ImageName!=0)
          {

           $imglength=strlen($row->ImageName); 
           $imghttps=substr($row->ImageName,0,5);
           $imghttp=substr($row->ImageName,0,4);

               if($imglength > 30)
               {
                 if($imghttps == 'https' || $imghttp == 'http')
                 {

                    $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%;object-fit:cover;"  /></i>'; 

                    $imgname = $row->ImageName;

                 }
                 else
                 {
                    $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.IMGURL3."avatars/female.png".'"    style="width:50px!important;height:50px!important;border-radius:50%;object-fit:cover;"  /></i>';
                 }
               } 
               else
               {
                
                    $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.IMGURL3."uploads/$orgid/".$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%;object-fit:cover;"  /></i>';  

                    $imgname = IMGURL3."uploads/$orgid/".$row->ImageName;

               }
           
         

          }
		
		
		$res[]=$data;
		
		
	}
	
	return ($res);
	
   }

    public function orgdetails($id){
    		
			 $st = $this->db->query("SELECT L.end_date,O.NoOfEmp as userlimit,O.Country,O.Name,O.PhoneNumber  from Organization O , licence_ubiattendance L where O.Id=$id AND L.OrganizationId=$id and cleaned_up=0")->result();
		  
		   

			

			return  $st;

			}


			public function attdplan(){

				$st1 = $this->db->query("SELECT  `range`, `monthly`, `yearly`, `bulk_attendance`,`location_tracing`,`visit_punch`,`geo_fence`,`payroll`,`time_off`,Addon_livetracking FROM `Attendance_plan_master` WHERE currency='USD'")->result();

				return $st1;

			}

			public function attdplan1(){

				$st2 = $this->db->query("SELECT  `range`, `monthly`, `yearly`, `bulk_attendance`,`location_tracing`,`visit_punch`,`geo_fence`,`payroll`,`time_off`,Addon_livetracking FROM `Attendance_plan_master` WHERE currency='INR'")->result();
				// var_dump($this->db->last_query());

				return $st2;

			}
			public function attdplan2(){

				$st3 = $this->db->query("SELECT * FROM `Attendance_plan_master`")->result();
				// var_dump($this->db->last_query());

				return $st3;

			}
		
			public function getaddoninfo(){
				$count='';
				$today = date('Y-m-d');
				$orgid = $_SESSION['orgid'];
				$addon =isset($_REQUEST['addonname'])?$_REQUEST['addonname']:'0';
				// var_dump($addon);
				// die;
			
$query = $this->db->query("SELECT AM.id,LU.$addon,AddonEnd_date FROM `addons_master` AM , `licence_ubiattendance` LU where AM.OrganizationId=LU.OrganizationId and (`AddonEnd_date` < '$today' OR `AddonEnd_date` >= '$today' )and AM.OrganizationId = $orgid  and AM.Addon_name = '$addon' order by AddonEnd_date DESC Limit 1");

foreach ($query->result() as $row)
            {
				$today = date('Y-m-d');
               $count = $row->AddonEnd_date;
                /* echo $today;
                echo $count;
                echo($today < $count); */
                
            }
			




return $count;





		
		
		
		
	 }
	 
	 	
				

		 
				

	



}

?>
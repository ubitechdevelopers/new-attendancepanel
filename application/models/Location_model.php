<?php
class Location_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
		//include(APPPATH."PhpMailer/class.phpmailer.php");
		//include(APPPATH . "s3.php");
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
   function getemppic(){
		$orgid=$_SESSION['orgid'];
        $empids=isset($_REQUEST['empid'])?$_REQUEST['empid']:0;
		//var_dump( $empids);
		if($empids==""){
			echo 5;
			
		}else{
		
		$query=$this->db->query("SELECT E.Id,E.ImageName,E.FirstName,A.latit_in,A.longi_in From EmployeeMaster E,AttendanceMaster A Where E.Id=$empids AND E.OrganizationId=$orgid AND A.EmployeeId=E.Id ");
		
			echo json_encode($query->result());
		  return json_encode($query->result());
		}
	}
}
?>
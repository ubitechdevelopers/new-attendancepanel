<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('Attendance_model');
		handleLogin();
    } 

     public function index() {
        $this->load->view('home/attendances');
    }

     public function allattendance() {
        $this->load->view('home/allattendance');
    }
	public function viewattendance() {
		
		 $data['latitin']=$this->Attendance_model->getlattitude();
		 
			
        $this->load->view('home/geofencemap',$data);
    }
    public function viewattendance1() {
		
		 $data['latitin']=$this->Attendance_model->getlattitude1();
		 
			
        $this->load->view('home/geofencemap1',$data);
    }
    public function creategeofence($latit,$longi,$checkinloc)
	{
	
	$data = array();	
	$data['latit'] =$latit;	
	$data['longi'] =$longi;
	$data['checkinloc'] =$checkinloc;
	//$data['status'] =$id;
	
	$this->load->view('home/creategeofence',$data);
		
	}
	public function saveGeolocation()
	{
		 $data = $this->Attendance_model->saveGeolocation();
		 echo json_encode($data);
		}
     public function notreport() {
        $this->load->view('home/notreported');
    }
     public function disapproved() {
        $this->load->view('home/disapproved');
    }
     public function latecomer() {
        $this->load->view('home/latecomer');
    }

     public function earlyleaver() {
        $this->load->view('home/earlyleaver');
    }
     public function overtime() {
        $this->load->view('home/overtime');
    }
     public function undertime() {
        $this->load->view('home/undertime');
    }
     public function notsynced() {
        $this->load->view('home/notsynced');
    }
     public function ontimeoff() {
        $this->load->view('home/ontimeoff');
    }
     public function onleave() {
        $this->load->view('home/onleave');
    }
     public function attregister() {
        $this->load->view('home/attregister');
    }
     public function deptsummary() {
        $this->load->view('home/deptsummary');
    }
     public function customizedrept() {
        $this->load->view('home/customizedrept');
    }

    public function getAttendances__new()
    {
    
     $this->Attendance_model->getAttendances__new();

    }
    public function editimg(){
		$this->Attendance_model->editimg();	
	}
    public function getAttendances__both()   
    {
      $this->Attendance_model->getAttendances__both();   
    }
    public function getAbsent__new()
    {
      $this->Attendance_model->getAbsent__new(); 
    }
     public function getNotReportedEmp()
    {
		$postData = $this->input->post();
        $this->load->model('Attendance_model');
		$data=$this->Attendance_model->getNotReportedEmp($postData); 
		echo json_encode($data);
    }
    public function getabsapprove()   
      {
        $postData=$this->input->post();
        $data=$this->Attendance_model->getabsapprove($postData); 
        echo json_encode($data);
      }
       public function getLatereport(){

        $postData=$this->input->post();
        $data=$this->Attendance_model->getLatereport($postData);
        echo json_encode($data);
    }
    public function getearlyreport()
{
   $postData=$this->input->post();
   $data = $this->Attendance_model->getearlyreport($postData);
   echo JSON_encode($data);
}
public function getovertimereport()
{
    $postData=$this->input->post();
    $data = $this->Attendance_model->getovertimereport($postData);
    echo JSON_encode($data);
}
public function getundertimereport()
{
$postData=$this->input->post();
$data = $this->Attendance_model->getundertimereport($postData);
echo JSON_encode($data);
}

public function getnotsyncdata()
    {
	  $postData=$this->input->post();
      $data=$this->Attendance_model->getnotsyncdata($postData);
      echo JSON_encode($data);
    }
    public function Timeoffreport()
    {  
        $postData=$this->input->post();
        $data=$this->Attendance_model->Timeoffreport($postData);
        echo json_encode($data);
    }
     public function getregister()
      { 

       $Data=$this->input->post();
        $data1=$this->Attendance_model->getregister($Data);
        //$data1=$this->Attendance_model->getregister($Data);
        echo json_encode($data1);
        // var_dump($this->db->last_query());

      } 
      public function Onleavereport(){
        $postData=$this->input->post();
        $data=$this->Attendance_model->Onleavereport($postData);
        echo Json_encode($data);
    }
public function getCustomizedReport()
    {
       $this->Attendance_model->getCustomizedReport();  
    }
    public function departmentreport()
    {
        $this->Attendance_model->departmentreport();
    }
    public function Attask(){

		$shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
                //var_dump($shifttype);
		$aname=isset($_REQUEST['aname'])?$_REQUEST['aname']:'';
		$timein=isset($_REQUEST['tin'])?$_REQUEST['tin']:'';
	                       $timeout =  isset($_REQUEST['tout'])?$_REQUEST['tout']:'';
	                       $timeindate  =  isset($_REQUEST['datein'])?$_REQUEST['datein']:0;
		$timeoutdate  =  isset($_REQUEST['dateout'])?$_REQUEST['dateout']:0;
		$orgId = $_SESSION['orgid'];
		$zname=getTimeZone($orgId);
		date_default_timezone_set ($zname);
		$today = date("Y-m-d");
		$yes = date('Y-m-d',strtotime("-1 days"));date('Y-m-d');
		$yes1 = date('Y-m-d',strtotime("-2 days"));date('Y-m-d');
		$ti = $timeindate." ".$timein;
		$to = $timeoutdate." ".$timeout;
		//$timestamp=date("h:i A");
		$timestamp=date("H:i");
		
		 

		$format_timestamp=date("H:i:s", strtotime($timestamp));
		$format_timestamp2=date("Y/m/d H:i:s", strtotime($timestamp));

		 
		if($shifttype==1 && $timeindate == $today){
		$timestamp=date("h:i A");
		// var_dump($timestamp);
		
		$format_timestamp=date("H:i:s", strtotime($timestamp));
		// var_dump($format_timestamp);

		// $format_timestamp2=date("Y/m/d H:i:s", strtotime($timestamp));
		// var_dump($format_timestamp2);
		$timein  =  date("H:i:s",strtotime(isset($_REQUEST['tin'])?$_REQUEST['tin']:''));
		$timeout  =  date("H:i:s",strtotime(isset($_REQUEST['tout'])?$_REQUEST['tout']:''));
		// var_dump($timein);
			if($timeout == '00:00:00'){
		if($timein > $format_timestamp )
					{
						echo 110;
					}
					else{
		$this->Attendance_model->Attask();
		}		
				}

		elseif($timeout != '00:00:00' ){

			if($timein > $timeout){

						echo 22;
					}
					elseif($timein > $format_timestamp ){ 
						echo 114;

					}
					elseif($timeout > $format_timestamp ){ 
						echo 111;

					}
					
					elseif($timeindate > $today ){ 
						echo 112;

					}
					elseif($timeoutdate > $today ){ 
						echo 113;

					}
					else{
						$this->Attendance_model->Attask();
						// var_dump($this->db->last_query());
						// die();
					}
		}
		
				
	}

	else if($shifttype==1  && $timeout='00:00:00' && ($yes==$timeindate || $yes1==$timeindate || $today==$timeindate))
			{
		$timein  =  date("H:i:s",strtotime(isset($_REQUEST['tin'])?$_REQUEST['tin']:''));
			$timeout = date("H:i:s",strtotime(isset($_REQUEST['tout'])?$_REQUEST['tout']:''));
			if($timein > $timeout )
					{
						echo 22;
					}

					elseif($timein = '00:00:00' )
					{
						$timein ='00:00:01';
						// var_dump($timein);
						$this->Attendance_model->Attask();
					}
					
					else{
		$this->Attendance_model->Attask();
		}	


					}

					elseif($shifttype==2 && $timeindate == $today){

		$timein  =  date("H:i:s",strtotime(isset($_REQUEST['tin'])?$_REQUEST['tin']:''));
		// var_dump($timein);
		// var_dump($format_timestamp2);
		$timeout  =  date("H:i:s",strtotime(isset($_REQUEST['tout'])?$_REQUEST['tout']:''));
		$timeindate  =  isset($_REQUEST['dateIn'])?$_REQUEST['dateIn']:0;
		$timeoutdate  =  isset($_REQUEST['dateOut'])?$_REQUEST['dateOut']:0;

		$ti = $timeindate." ".$timein;
		$to = $timeoutdate." ".$timeout;


			if($timeout == '00:00:00'){
		if($timein > $format_timestamp )
					{
						echo 110;
					}

					


					else{
		$this->Attendance_model->Attask();
		}		
	}

	elseif($timeout != '00:00:00' ){

			      

			      if($ti > $to){

						echo 22;
					}
					elseif($timein > $format_timestamp ){ 
						echo 114;

					}
					elseif($timeout > $format_timestamp ){ 
						echo 111;

					}
					
					elseif($timeindate > $today ){ 
						echo 112;

					}
					elseif($timeoutdate > $today ){ 
						echo 113;

					}

					else{
		$this->Attendance_model->Attask();
		}		




	}
}
	}
	
		public function editAtt(){

$orgId=$_SESSION['orgid'];
$shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
$timeout=isset($_REQUEST['to'])?$_REQUEST['to']:0;
$timein=isset($_REQUEST['ti'])?$_REQUEST['ti']:0;
$timeindate  =  isset($_REQUEST['dateIn'])?$_REQUEST['dateIn']:0;
$timeoutdate  =  isset($_REQUEST['dateOut'])?$_REQUEST['dateOut']:0;

$timeindate1 = new DateTime($timeindate);
$timeoutdate1 = new DateTime($timeoutdate);
//var_dump($timeindate1);
//var_dump($timeoutdate1);
$diff=date_diff($timeindate1,$timeoutdate1);
$diff1 = $diff->format("%R%a days");
//var_dump($diff1);

$zname=getTimeZone($orgId);
date_default_timezone_set ($zname);

$today = date("Y-m-d");
$yes = date('Y-m-d',strtotime("-1 days"));date('Y-m-d');
$yes1 = date('Y-m-d',strtotime("-2 days"));date('Y-m-d');
$ti = $timeindate." ".$timein;
$to = $timeoutdate." ".$timeout;
$timestamp=date("h:i A");
$format_timestamp=date("H:i:s", strtotime($timestamp));
$format_timestamp2=date("Y/m/d H:i:s", strtotime($timestamp));



$x = date('Y-m-d h:i A', time());

$date = date('Y-m-d H:i:s',strtotime($x));
$y = $timeoutdate.' '.$timeout;
$toutdate = date('Y-m-d H:i:s', strtotime($y));
//var_dump($toutdate);
/*var_dump($toutdate);
var_dump($date); */


// var_dump($yes);
// var_dump($yes1);
// var_dump($to > $date);

/* && $timeindate == $today */

if($shifttype==1 ){
$timestamp=date("h:i A");
$format_timestamp=date("H:i:s", strtotime($timestamp));
// var_dump($format_timestamp);

// $format_timestamp2=date("Y/m/d H:i:s", strtotime($timestamp));
// var_dump($format_timestamp2);

$timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
$timeout  =  date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));

$timein =date("Y-m-d H:i:s",strtotime(isset($_REQUEST['ti'])?'2019-06-25'.' '.$_REQUEST['ti']:''));
$timeout = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['to'])?'2019-06-26'.' '.$_REQUEST['to']:''));

if($timeindate == $timeoutdate){

$timein  =  date("Y-m-d H:i:s",strtotime(isset($_REQUEST['ti'])?'2019-06-25'.' '.$_REQUEST['ti']:''));
$timeout  =  date("Y-m-d H:i:s",strtotime(isset($_REQUEST['to'])?'2019-06-25'.' '.$_REQUEST['to']:''));

}
if($timeindate < $timeoutdate){

$timein =date("Y-m-d H:i:s",strtotime(isset($_REQUEST['ti'])?'2019-06-25'.' '.$_REQUEST['ti']:''));
$timeout = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['to'])?'2019-06-26'.' '.$_REQUEST['to']:''));
}

/* var_dump($timein);
var_dump($timeout); */
if($timeout == '00:00:00'){
if($timein > $format_timestamp )
{
echo 110;
}
else{
$this->Attendance_model->editAtt();
}

}

elseif($timeout != '00:00:00' ){
/*
if($toutdate > $date){

echo 22;

} */
/* elseif($timein > $format_timestamp ){


echo 114;
} */

if($timein > $timeout){
echo 22;
}

else if($timeoutdate > $today){
echo 90;
}

 elseif($toutdate  > $date ){
 
echo 89;

}

/* elseif($timeout > $format_timestamp ){

echo 111;
} */

elseif($timeindate > $today ){
echo 112;

}
elseif($timeoutdate > $today ){
echo 113;

}
elseif($diff1 > 1 ){
echo 1947;

}
else{
$this->Attendance_model->editAtt();
}
}


}
else if($shifttype==1  && $timeout='00:00:00' && ($yes==$timeindate || $yes1==$timeindate || $today==$timeindate))
{
$timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
$timeout = date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
if($timein > $timeout )
{
echo 22;
}

elseif($timein = '00:00:00' )
{
$timein ='00:00:01';
// var_dump($timein);
$this->Attendance_model->editAtt();
}

elseif($toutdate  > $date ){
echo 89;

}

else{
$this->Attendance_model->editAtt();
}


}

// ===================shift type 2================

 //&& $timeindate == $today

elseif($shifttype==2){

$orgId=$_SESSION['orgid'];

$timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
// var_dump($timein);
// var_dump($format_timestamp2);
$timeout  =  date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
$timeindate  =  isset($_REQUEST['dateIn'])?$_REQUEST['dateIn']:0;
$timeoutdate  =  isset($_REQUEST['dateOut'])?$_REQUEST['dateOut']:0;

$x = date('Y-m-d h:i A', time());

$date = date('Y-m-d H:i:s',strtotime($x));
$y = $timeoutdate.' '.$timeout;
$toutdate = date('Y-m-d H:i:s', strtotime($y));







$zname=getTimeZone($orgId);
date_default_timezone_set ($zname);

$ti = $timeindate." ".$timein;
$to = $timeoutdate." ".$timeout;



if($timeout == '00:00:00'){
if($timein > $format_timestamp )
{
echo 110;
}

else{
$this->Attendance_model->editAtt();
}
}

elseif($timeout != '00:00:00' ){

if($ti > $to){

echo 22;
}
//elseif($timein > $format_timestamp )
else if($ti > $to)

{

echo 114;


}
/* elseif($timeout > $format_timestamp ){
echo 111;
var_dump($timeout);
var_dump($format_timestamp);


} */

elseif($timeindate > $today ){
echo 112;

}
elseif($timeoutdate > $today ){
echo 113;

}

elseif($date < $toutdate){
echo 89;
}

else{
$this->Attendance_model->editAtt();
}




}

}

else if($shifttype==2  && $timeout='00:00:00' && ($yes==$timeindate || $yes1==$timeindate || $today==$timeindate))
{
$timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
// var_dump($timein);
// var_dump($format_timestamp2);
$timeout  =  date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
$timeindate  =  isset($_REQUEST['dateIn'])?$_REQUEST['dateIn']:0;
$timeoutdate  =  isset($_REQUEST['dateOut'])?$_REQUEST['dateOut']:0;
$ti = $timeindate." ".$timein;
$to = $timeoutdate." ".$timeout;



if($ti > $to )
{
echo 22;
}




}

else{
$this->Attendance_model->editAtt();
}

}

	public function disapproveatt()
	  {
	    $this->Attendance_model->disapproveatt();
	  }
	public function updatetime(){
		
	$result=$this->Attendance_model->updatetime();
	echo $result;
	}
	
	public function deleteAtt(){
	 $result = $this->Attendance_model->deleteAtt();	
	
	}
	
	 public function approveattendance()
	  {
	  	$this->Attendance_model->approveattendance(); 
	  }
	   public function viewflexiattendance($empid,$aid)
 {
       //echo $aid;
       //exit();
        //$empname = getEmpName($empid);
        //echo $empname;
        //exit();
        //$loghrs = $this->test_model->getloggedhours($aid);
        $adata = $this->Attendance_model->viewflexiattendance($aid);
		//var_dump($aid);
		//die;

        $data = array('empid'=>$empid,'adata'=>$adata);

        $this->load->view("home/viewflexireport",$data);
}
	

		public function editAttUBI(){
		$this->Attendance_model->editAttUBI();	
	}
        
        
        public function updatestatusnew(){
		$this->Attendance_model->updatestatusnew();
	}
	public function updatestatus(){
		$this->Attendance_model->updatestatus();
	}
	public function trackLocations($eid,$date,$timein,$timeout,$logdhours)
	{
		// var_dump($timein);
		// echo $timein;
		// echo $timeout;
		// echo $logdhours;
		$detail=$this->Attendance_model->trackLocations($eid,$date);	
		// print_r($detail);
		$arr=array('name'=>getEmpName($eid),'date'=>$date,'ti'=>$timein,'to'=>$timeout,'wh'=>$logdhours,'detail'=>$detail);
		

		// $arr['wh']=$logdhours;
		$this->load->view('home/tracklocations',$arr);	
	}
  }
  ?>
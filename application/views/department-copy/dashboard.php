<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Dashboard extends CI_Controller {
	 public function __construct()
    {
	    parent::__construct();
        $this->load->model('login_model');
		handleLogin();
    } 
	public function index()	
	{ 
	    if($_SESSION['expirydate'] == 0)
		{
		    $data['presentE'] = $this->login_model->getPresentEmployee();
		   //$data['LateEmployee'] = $this->login_model->getLateEmployee();
		    $data['LateEmployee'] = $this->login_model->Count_LateEmployee();
		   // $data['earlyEmployee'] = $this->login_model->getEarlyEmploy();
		    $data['earlyEmployee'] = $this->login_model->Count_EarlyLeaverEmp();
		   $data['absent'] = $this->login_model->getAbsentEmployee();
		   //$data['DailyabsentAttendance'] = $this->login_model->DailyAbsentEmployee();
		  $data['DailyabsentAttendance'] = $this->login_model->DailyAbsentEmployee_new();
		   //print_r($data['DailyabsentAttendance']);
		   //$data['dailyAttendance'] = $this->login_model->DailyPresentEmployee();
		   //$data['monthlyAttendance'] = $this->login_model->MonthlyPresentEmployee();
		  // $data['LateAttendance'] = $this->login_model->DailyLateEmployee();
		   $data['LateAttendance'] = $this->login_model->DailyLateEmployee_New();
		  // $data['earlyAttendance'] = $this->login_model->EarlyleaveEmployee();
		   $data['earlyAttendance'] = $this->login_model->EarlyleaveEmployee_New();
		  // print_r($data['earlyAttendance']);
		   $data['thirtydays'] = $this->login_model->thirtydays();
		  //print_r(  $data['thirtydays'] );
		  $data['MonthlyLateEmployee'] = $this->login_model->MonthlyLateEmployee(); 
		   $data['res'] = $this->login_model->getloggedEmp();
		   $this->load->view('home/dashboard',$data);
		  
		}
		  else
		  {
			redirect(URL.'Myplan');
		  }		  
	}
	
	
	public function alertSetting()
	{
		$data = $this->login_model->getactiveStatus();
		$datavisit= $this->login_model->getactiveVisitStatus();
		$attvisit= $this->login_model->getactiveAttStatus();
		$this->load->view('home/alertSetting',array("data"=>$data,"datavisit"=>$datavisit,"attvisit"=>$attvisit));
	}
	
	
	public function notificationsetting()
	{
		$data = $this->login_model->getnotificationsts();
				
		$td=$this->load->view('home/notificationsetting',array("data"=>$data));
	}
	public function selfie()
	{
		$data = $this->login_model->getactiveStatus();
		$datavisit= $this->login_model->getactiveVisitStatus();
		$attvisit= $this->login_model->getactiveAttStatus();
		$outfence= $this->login_model->getoutsidefenceStatus();
		$imgstatus= $this->login_model->image_status();
		$addonvisitpunch= $this->login_model->Addon_VisitPunch();
		//var_dump($imgstatus);
		$offlinests= $this->login_model->offline_status();
		$offline= $this->login_model->offline_update();
		$ssdisappsts= $this->login_model->ssdisapprove_status();
		//var_dump($image_status);
		
		$td=$this->load->view('home/selfie',array("addonvisitpunch"=>$addonvisitpunch,"data"=>$data,"datavisit"=>$datavisit,"attvisit"=>$attvisit,"outfence"=>$outfence,"imgstatus"=>$imgstatus,"offlinests"=>$offlinests,"offline"=>$offline,"ssdisappsts"=>$ssdisappsts));
		
	}

     public function offlinemode()
	{
		$data = $this->login_model->getactiveStatus();
		
		$datavisit= $this->login_model->getactiveVisitStatus();
		$attvisit= $this->login_model->getactiveAttStatus();
		$outfence= $this->login_model->getoutsidefenceStatus();
		$imgstatus= $this->login_model->image_status();
		//var_dump($imgstatus);
		$offlinests= $this->login_model->offline_status();
		$offline= $this->login_model->offline_update();
		//var_dump($image_status);
		
		$td=$this->load->view('home/offlinemode',array("data"=>$data,"datavisit"=>$datavisit,"attvisit"=>$attvisit,"outfence"=>$outfence,"imgstatus"=>$imgstatus,"offlinests"=>$offlinests,"offline"=>$offline));
		
	}

	public function alertsubmission()
		{
		$this->login_model->addAlert();
		}
	public function visitstatus()
		{
		$this->login_model->visitstatus();
		}

		public function fencestatus()
		{
		$this->login_model->fencestatus();
		}
		
		public function offline_sts_update()  
		{
		$this->login_model->offline_sts_update();
		
		}
		
		public function mailtrigger_sts_update()  
		{
		$this->login_model->mailtrigger_sts_update();
		
		}
		
		
		public function notification_sts_update()  
		{
		$this->login_model->notification_sts_update();
		
		}
		
		public function undertimests()  
		{
		$this->login_model->undertimests();
		
		}
		
		public function visitsts()  
		{
		$this->login_model->visitsts();
		
		}
		
		
		public function outsidegeofencests()  
		{
		$this->login_model->outsidegeofencests();
		
		}
		
		public function fakelocsts()  
		{
		$this->login_model->fakelocsts();
		
		}
		
		public function faceregsts()  
		{
		$this->login_model->faceregsts();
		
		}
		
		public function faceiddissapp()  
		{
		$this->login_model->faceiddissapp();
		
		}
		
		public function sussefiests()  
		{
		$this->login_model->sussefiests();
		
		}
		
		public function susdevicests()  
		{
		$this->login_model->susdevicests();
		
		}
		
		public function dissappattsts()  
		{
		$this->login_model->dissappattsts();
		
		}
		
		public function atteditsts()  
		{
		$this->login_model->atteditsts();
		
		}
		
		public function chngpwdsts()  
		{
		$this->login_model->chngpwdsts();
		
		}
		
		
	public function attstatus(){
		$this->login_model->attstatus();
		}	

    public function ssstatus(){
		$this->login_model->ssstatus();
	}

	public function loggeddepart()
	{
		$data['res'] = $this->login_model->getloggedEmp();
		$this->load->view('home/loggeddepartment',$data);
	}
	
	public function depart()
	{
		//$data['res1'] = $this->login_model->loggedEmp();
		//$this->load->view('home/departmentlogged',$data);
		$this->load->view('home/departmentlogged');
	}
	public function mailtriggers()
	{
		//$data['res1'] = $this->login_model->loggedEmp();
		//$data['res']= $this->login_model->getSendMailStatus();
		$data= $this->login_model->getSendMailStatus();
		
		
		$this->load->view('home/mailtriggers',array('data'=>$data));
	}
	
	public function getDashboadAttendance($data)
	{
		$this->load->model('login_model');
		$this->login_model->getDashboadAttendance($data);
	}
	public function getMonthlyAttChart()
	{
		$this->load->model('login_model');
		$this->login_model->getMonthlyAttChart();
	}
	public function profile()
	{
		  $data['r'] = $this->login_model->getCompanydetail();	
		  $data['p'] = $this->login_model->getCompanyprofile();	
		  $this->load->view('login/profile',$data);
	}
	public function updateProfile()
	{
		$this->login_model->updateProfile();
	}
	public function updateCProfile(){
		$this->login_model->updateCProfile();
	}
	public function changePassword()
	{
		$this->load->view('login/changePassword');
		
	}
	public function updatePassword(){
		$this->login_model->updatePassword();
		
	}
	public function getAbsentEmployee(){
	 $data['absent'] = $this->login_model->getAbsentEmployee();
	 
	}
	public function gatAbsentEmployee()
	{
		$deprt['id']=isset($_REQUEST['id'])?$_REQUEST['id']:0;
		$this->load->view('home/presentEmployee',$deprt);
	}
	
	// public function gatAbsentEmployee1()
	// {
		// $deprt['id']=isset($_REQUEST['id'])?$_REQUEST['id']:0;
	// $this->load->view('home/presentEmployee1',$deprt);
	// }
	
	public function getLateEmployee()
	{
		//$data['LateEmployee'] = $this->login_model->getLateEmployee();
		// late commerse
		//$ids=isset($_REQUEST['id'])?$_REQUEST['id']:0;
		$deprtid=isset($_REQUEST['id'])?$_REQUEST['id']:0;
		$data['id']=isset($_REQUEST['id'])?$_REQUEST['id']:0;
		$data['LateEmployee'] = $this->login_model->getLateEmployee__new($deprtid);
		$this->load->view('home/lateEmployee',$data);
	}
	public function getearlyEmployee()
	{
		//$data['earlyEmployee'] = $this->login_model->getEarlyEmploy();
		// early leaver by sohan patel
		$deprtid=isset($_REQUEST['id'])?$_REQUEST['id']:0;
		$data['id']=isset($_REQUEST['id'])?$_REQUEST['id']:0;
	    $data['earlyEmployee'] = $this->login_model->getEarlyEmploy__new($deprtid);
		$this->load->view('home/Earlydash',$data);
	}
	public function geoLocations()
	{
		$outfence= $this->login_model->getoutsidefenceStatus();
		$this->load->view('home/GeoLocations',array("outfence"=>$outfence));
	}
	
	public function geoSettings($id="")
	{
		
		$data = array();
		if($id != "" )
		{
		$data = $this->login_model->getLocationById($id);
		}
		$this->load->view('home/GeoSettings',$data);
	}
	public function creategeofence($latit,$longi,$checkinloc)
	{
	
	$data = array();	
	$data['latit'] =$latit;	
	$data['longi'] =$longi;
	$data['checkinloc'] =$checkinloc;
	//$data['status'] =$id;
	
	$this->load->view('home/creategeofence2',$data);
		
	}
	public function editLocation()
	{
		 $this->login_model->editLocation();
	}
	public function saveGeolocation()
	{
		 $data = $this->login_model->saveGeolocation();
		 echo json_encode($data);
		/*if($data != "")
		$data = array('success_sms'=>"Your location set successfull.");
		$this->load->view('home/GeoLocations',$data);

		redirect(URL . 'dashboard/geoLocations');*/
	}
	public function getGeolocation()
	{
		$data = $this->login_model->getGeolocation();		
	}
	
	public function deleteLocation()
	{
		$data = $this->login_model->deleteLocation();
	}
	function getemployeebygeolocation()
	{
	$employeearray = $this->login_model->getemployeebygeolocation();
	echo json_encode($employeearray);
	}
	function SaveEmpGeoList()
	{		
	$employeearray = $this->login_model->SaveEmpGeoList();
	echo json_encode($employeearray);
	}
	public function hourlypaySetting()
	{
		$this->load->view('home/hourlyrate');
	}
	
	public function getSummaryData($type) //1 for today,2 for yesterday
	{
		$data = $this->login_model->getSummaryData($type);
		// var_dump($this->db->last_query());
	}
	public function test()
	{
		echo $this->login_model->test();
	}
	
	
}

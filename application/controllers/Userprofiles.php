<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofiles extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('userprofiles_model');
		handleLogin();
    } 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function addemployee(){
		$this->load->view("home/addemployee");
	}
                  
	public function employeelist(){
		$this->load->view("home/employeelist");

	}
  public function updatelivetracking()
  {
  $this->userprofiles_model->updatelivetracking();
  }

	public function insertmanadata()
	{
		if($this->input->post('type')==1)
		{
			$Shiftname=$this->input->post('Shiftname');
			$shifttyp=$this->input->post('shifttyp');
			$timeduration=$this->input->post('timeduration');
			$timeduration1=$this->input->post('timeduration');
			$this->Userprofiles_model->saverecords($Shiftname,$shifttyp,$timeduration,$timeduration1);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
        }
	public function inactiveemployee(){
		$this->load->view("home/inactiveemployee");

	}
	public function getinactiveEmployeesData(){
		$this->userprofiles_model->getInactiveEmpData();

	}
	public function getArchiveEmp()
	{
	  $this->userprofiles_model->getArchiveEmp();
	}
	public function archiveemployee()
	{
		$this->load->view('home/archiveemp');
	}
	public function employeelist_demo(){
		$this->load->view("home/employeelist_demo");

	}
	
	public function getEmployeesData(){
		$this->userprofiles_model->getEmployeesData();
	}
	public function insertemployeedetails(){		
		$this->userprofiles_model->insertemployeedetails();

	}
	public function datatablefile(){		
		$this->load->view("home/datatablefile");


	}
        
                      public function insertUsermaster() {
                                             $this->load->model('Userprofiles_model');
                                             $this->Userprofiles_model->insertUsermaster(); 
                      }
                       public function timezone() {
                                             $this->userprofiles_model->timezone();
                       }
                      public function deleteUser() {
                                             $this->userprofiles_model->deleteUser__New();
                       }
                       public function updateUserStatus() {
                                              $this->userprofiles_model->updateUserStatus();
                       }
                       public function UnarchiveUser() {
                                              $this->userprofiles_model->UnarchiveUser();
                       }
                       public function deleteUserpermanent__New() {
                                              $this->userprofiles_model->deleteUserpermanent__New();
                       }
                       public function emportUploads() {
                                             $orgid = $_SESSION['orgid'];
                                             $inputFileName = isset($_FILES["proposalfile"]["tmp_name"]) ? $_FILES["proposalfile"]["tmp_name"] : "";
                                             //$ext = end((explode(".", $inputFileName))); 
                                             $storage_name = "newjoining.csv";
                                             //unlink("uploads/employee/$orgid"); 

                                             if (file_exists("uploads/employee/$orgid/$storage_name")) {
                                             unlink("uploads/employee/$orgid/$storage_name");
                                             }
                                             if (!file_exists("uploads/employee/$orgid/")) {
                                             mkdir("uploads/employee/$orgid/", 0755, true);
                                             }
                                             $location = "uploads/employee/$orgid/";
                                             $config['upload_path'] = $location;
                                             $config['allowed_types'] = 'csv';
                                             $config['file_name'] = $storage_name;
                                             $this->load->library('upload', $config);

                                              if (!$this->upload->do_upload('proposalfile')) {
                                              echo ($this->upload->display_errors());
                                             //$this->load->view('home/import', $error);
                                             } else {
                                             echo json_encode($this->upload->data());
                                             // $this->load->view('home/import', $data);
                       }
                      }
                                             
public function emportEmp() {
			 $arr = array();
			 $arr[0] = isset($_REQUEST['fname']) ? ($_REQUEST['fname']) : 0;
			 //$arr[1]= isset($_REQUEST['lname'])?($_REQUEST['lname']):0;
			 $arr[1] = isset($_REQUEST['email']) ? ($_REQUEST['email']) : 0;
			 $arr[2] = isset($_REQUEST['cont']) ? ($_REQUEST['cont']) : 0;
			 $arr[3] = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
			 $arr[4] = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
			 $arr[5] = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
			 //$arr[7]=isset($_REQUEST['cont'])?($_REQUEST['cont']):0;
			 $arr[6] = isset($_REQUEST['ecode']) ? $_REQUEST['ecode'] : 0;
			 $arr[7] = isset($_REQUEST['country']) ? $_REQUEST['country'] : 0;
			 $arr[8] = isset($_REQUEST['doj']) ? $_REQUEST['doj'] : 0;
			 //print_r($arr);
			 //echo $arr[0];
			 // echo $arr[1];
			 // echo $arr[2];
			 // echo $arr[3];
			 // echo $arr[4];
			 // echo $arr[5];
			 // echo $arr[6];
			 // echo $arr[7];
			 // exit();
			 $result = $this->userprofiles_model->emportEmp($arr);
			 echo json_encode($result);
}
                       
                       public function deleteTmp() {
                                             $this->userprofiles_model->deleteTmp();
                                             // var_dump($this->db->last_query());
                       }
                       public function getEmpotTmp(){
		$data=$this->userprofiles_model->getEmpotTmp();
		//print_r($data);
	}
    public function showTMP() {
        $this->load->view('home/showTMP');
    }
    public function editimg(){
		$this->userprofiles_model->editimg();	
	}
	public function editdepartment()
	{
	$this->userprofiles_model->editdepartment();
	}
	public function editdesignation()
	{
	$this->userprofiles_model->editdesignation();
	}
	public function editshifts()
	{
	$this->userprofiles_model->editshifts();
	//echo json_encode($res);
	}
	public function updateUserStatusinact()
	{
		$this->userprofiles_model->updateUserStatusinact();
	}
	public function QRcode()
	{
		$Id = isset($_REQUEST['favorite'])?$_REQUEST['favorite']:'';
		$tempides = isset($_REQUEST['tempides'])?$_REQUEST['tempides']:'0';
		if($tempides==1)
		{
			$_SESSION['ides']=$Id;
		}

		// echo $Id;
		// die();
		$adata=$this->userprofiles_model->QRcode($_SESSION['ides']);
		$data = array('adata'=>$adata);
		$this->load->view("home/qrcode",$data);
	}
                      public function resetPassword() {
                                             $this->userprofiles_model->resetPassword();
                       }
                       
                       public function editUsermaster() {
   
        $this->userprofiles_model->editUsermaster();
					   }
    
    public function getCity() {
        $this->userprofiles_model->getCity();
    }
    
//    public function showedituser() {
//
//        $eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : '';
////var_dump($eid);
//        //die;		
//        $this->load->model('userprofiles_model');
//
//
//        $data['empdata'] = $this->userprofiles_model->getEmployeesDatausernew($eid);
//        //var_dump($data['empdata']);
//        //$data['empdata']=$this->userprofiles_model->getEmployeesDatauser($eid);
//        //$this->load->view('home/usereditmodal',$data);
//        $this->load->view('home/usereditmodalone', $data);
//    }
//    
      public function editemployee(){
          
            $eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : '';	
            $this->load->model('userprofiles_model');
            $data['empdata'] = $this->userprofiles_model->getEmployeesDatausernew($eid);
            
            $this->load->view("home/editemployee",$data);
      }
       
         public function getgeoname() {
        $this->userprofiles_model->getgeoname();
    }
    
    
      public function empactivitylog($id) {
        $data = array('id' => $id);
        $this->load->view("home/empactivitylog", $data);
    }
    
      public function empwisecalendar() {
        $this->load->view('home/empwisecalendar');
    }
    
    public function emplpresentcal()
 {

  $event_data = $this->userprofiles_model->emplpresentcal();
  $data = array();
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['EmployeeId'],
    'title' => $row['event'],
    'start' => $row['eventdate'],
   );
  }
  echo json_encode($data);
 }

public function emplabsentcal()
 {

  $event_data = $this->userprofiles_model->emplabsentcal();
  $data = array();
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['EmployeeId'],
    'title' => $row['event'],
    'start' => $row['eventdate'],
   );
  }
  echo json_encode($data);
 }
 
 public function emplweekoffcal()
 {

  $this->userprofiles_model->emplweekoffcal();

 }
 
 public function empholidaycal()
 {

  $this->userprofiles_model->empholidaycal();

 }

public function empleavecal()
 {

  $event_data = $this->userprofiles_model->empleavecal();
  $data = array();
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['EmployeeId'],
    'title' => $row['event'],
    'start' => $row['eventdate'],
   );
  }
  echo json_encode($data);
 }

 
 public function empshiftplannercal()
 {
  $event_data = $this->userprofiles_model->empshiftplannercal();
  $data = array();
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['EmployeeId'],
    'title' => $row['event'],
    'start' => $row['eventdate'],
   );
  }
  echo json_encode($data);
 }

  public function emptimeoffcal()
 {
  $event_data = $this->userprofiles_model->emptimeoffcal();
  $data = array();
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['EmployeeId'],
    'title' => $row['event'],
    'start' => $row['eventdate'],
   );
  }
  echo json_encode($data);
 }

 public function geteventdetails()
 {
     $this->userprofiles_model->geteventdetails();
 }

 public function emplcountcal()
 {
     $this->userprofiles_model->emplcountcal();
 }
public function editgeolocation() {
        $this->userprofiles_model->editgeolocation();
    }
    
    public function empactivitylog1($id) {
        $this->userprofiles_model->ActivityData($id);
    }
    public function sendInvitation(){
		$this->userprofiles_model->sendInvitation_new();
	}
        
        public function regInvEmp(){
		$this->load->view('open/registerEmp');
	}
        
        public function registerEmp(){
		header('Access-Control-Allow-Origin: *');
		$this->userprofiles_model->registerEmp();
	}
	
	public function uploaddocument($id) {
		 $data = array('id' => $id);
		
		$this->load->view("home/uploaddocument",$data);
	
	 //$this->Userprofiles_model->uploaddocument(); 
                      }

}

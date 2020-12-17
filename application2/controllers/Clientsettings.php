<?php

defined('BASEPATH') OR exit('direct script access allowed');

class Clientsettings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Clientmodel');
    }


    public function index() {
        //$this->load->view('home/clientlist');
         $this->load->view('home/clientlist');
    }
    public function visit() {
        //$this->load->view('home/clientlist');
         $this->load->view('home/visits');
    }
     public function assignedclient() {
        //$this->load->view('home/clientlist');
         $this->load->view('home/assignedclient');
    }

  public function insertclient()
	{		
		$this->Clientmodel->insertclient();
		
	}
    public function punchedLocations()
      { 
        $postData = $this->input->post();
        $this->load->model('Clientmodel');
       $data = $this->Clientmodel->punchedLocations($postData); 
       echo json_encode($data);
      } 

      public function getClientData()
	  
    {   
$postdata=$this->input->post();
    $this->load->model('Clientmodel');
        $data = $this->Clientmodel->getClientData($postdata);
         echo json_encode($data);
    } 
    public function deleteclient()
  {   
   $this->load->model('Clientmodel');
        $this->Clientmodel->deleteclient();
    
  }
  public function updateClientStatus(){
    $this->load->model('Clientmodel');
    $this->Clientmodel->updateClientStatus();
  }
  public function getClientlist(){
    $postData= $this->input->post();
    $this->load->model('Clientmodel');
    $data=$this->Clientmodel->getClientlist($postData);
    echo json_encode($data);
}
public function updateclient(){ 
  $this->load->model('Clientmodel');
 
  $this->Clientmodel->updateclient();
}

public function showselectedclient(){
  $this->load->model('Clientmodel');
  $data['name']=$this->Clientmodel->showselectedclient();
  $this->load->view("home/showclientmodal",$data);
 
}
public function assignclientforemp(){

 $this->load->model('Clientmodel');
$data['name']=$this->Clientmodel->assignclientforemp();
$data['empid']= isset($_REQUEST['empid'])?$_REQUEST['empid']:'';


  $this->load->view("home/assignclientmodel",$data);
   
}
public function unassignclient(){
   $this->load->model('Clientmodel');

  $this->Clientmodel->unassignclient();
   
}
	public function editClient()
	{		
		$this->Clientmodel->editClient();
		
	}
  public function emportclient($id)
  {
    $data = array('pageid'=>$id);
    $this->load->view('home/importclient',$data);
  } 
  
    public function clientlist()
  {   
    $this->load->view('home/clientlist'); 
    
  }
	 public function clientUploads()
	{
		$orgid =$_SESSION['orgid'];
        $inputFileName=isset($_FILES["proposalfile"]["tmp_name"])?$_FILES["proposalfile"]["tmp_name"]:""; 
		$storage_name="newclient.csv";
		
		if (file_exists("uploads/employee/$orgid/$storage_name"))
			{ 
			unlink("uploads/employee/$orgid/$storage_name"); 
			}
		if (!file_exists("uploads/employee/$orgid/")) {
				mkdir("uploads/employee/$orgid/", 0755, true);
			}
		 $location="uploads/employee/$orgid/";
		 $config['upload_path'] = $location;
         $config['allowed_types'] = 'csv';    
		 $config['file_name'] = $storage_name; 
         $this->load->library('upload', $config);
         
        if (! $this->upload->do_upload('proposalfile'))
        {
          echo ($this->upload->display_errors());
        }
        else
        {
            echo json_encode($this->upload->data());
        } 
	}
    public function emportCli()
  {
    // var_dump("hsdfsdfj");
 $arr = array();  
	$arr[0] =isset($_REQUEST['comp'])?($_REQUEST['comp']):0;
	//$arr[1]= isset($_REQUEST['lname'])?($_REQUEST['lname']):0;
	$arr[1]= isset($_REQUEST['name'])?($_REQUEST['name']):0;
	$arr[2]=isset($_REQUEST['email'])? ($_REQUEST['email']):0;
	$arr[3]= isset($_REQUEST['city'])?$_REQUEST['city']:0;
	$arr[4]= isset($_REQUEST['cont'])?$_REQUEST['cont']:0;
	$arr[5]= isset($_REQUEST['addr'])?$_REQUEST['addr']:0;
	//$arr[7]=isset($_REQUEST['cont'])?($_REQUEST['cont']):0;
	$arr[6]=isset($_REQUEST['desc'])?$_REQUEST['desc']:0;
	$arr[7]=isset($_REQUEST['zonecity'])?$_REQUEST['zonecity']:0;
	
	

  $result=$this->Clientmodel->emportCli($arr);
  
  echo json_encode($result);
  }
  
  public function emportUploads(){
    $orgid =$_SESSION['orgid']; 
        $inputFileName=isset($_FILES["proposalfile"]["tmp_name"])?$_FILES["proposalfile"]["tmp_name"]:"";
    //$ext = end((explode(".", $inputFileName))); 
    $storage_name="newjoining.csv";
    //unlink("uploads/employee/$orgid"); 
    
    if (file_exists("uploads/employee/$orgid/$storage_name"))
      { 
      unlink("uploads/employee/$orgid/$storage_name"); 
      }
    if (!file_exists("uploads/employee/$orgid/")) 
    {
        mkdir("uploads/employee/$orgid/",0755, true);
      }
     $location="uploads/employee/$orgid/";
     $config['upload_path'] = $location;
         $config['allowed_types'] = 'csv';    
     $config['file_name'] = $storage_name; 
         $this->load->library('upload', $config);
         
        if (!$this->upload->do_upload('proposalfile'))
        {
          echo ($this->upload->display_errors());
            //$this->load->view('home/import', $error);
        }
        else
        {
            echo json_encode($this->upload->data());
           // $this->load->view('home/import', $data);
        } 
        
    }
    public function emportEmp()
  {


    $arr = array();  
    $arr[0] =isset($_REQUEST['fname'])?($_REQUEST['fname']):0;
    //$arr[1]= isset($_REQUEST['lname'])?($_REQUEST['lname']):0;
    $arr[1]= isset($_REQUEST['email'])?($_REQUEST['email']):0;
    $arr[2]=isset($_REQUEST['cont'])? ($_REQUEST['cont']):0;
    $arr[3]= isset($_REQUEST['shift'])?$_REQUEST['shift']:0;
    $arr[4]= isset($_REQUEST['dept'])?$_REQUEST['dept']:0;
    $arr[5]= isset($_REQUEST['desg'])?$_REQUEST['desg']:0;
    //$arr[7]=isset($_REQUEST['cont'])?($_REQUEST['cont']):0;
    $arr[6]=isset($_REQUEST['ecode'])?$_REQUEST['ecode']:0;
    $arr[7]=isset($_REQUEST['country'])?$_REQUEST['country']:0;
    $arr[8]=isset($_REQUEST['doj'])?$_REQUEST['doj']:0;
    /*print_r($arr);
    echo $arr[0];
    echo $arr[1];
    echo $arr[2];
    echo $arr[3];
    echo $arr[4];
    echo $arr[5];
    echo $arr[6];
    echo $arr[7];
    exit();*/
    $result=$this->Clientmodel->emportEmp($arr);
    echo json_encode($result);
  }

  function trackempvisit($eid,$date,$timein,$timeout,$workhour){
   
    $arr=array();
    
    $arr['detail']=$this->Clientmodel->trackLocationsvisit($eid,$date,$timein,$timeout);
    //var_dump($arr['detail']);
    
    $arr['name']=getEmpName($eid);
    $arr['date']=$date;
    $arr['timein']=$timein;
    $arr['workhour']=$workhour;
    $arr['timeout']=$timeout;
    $arr['orgid']=$_SESSION['orgid'];
    $arr['eid']=$eid;
    $this->load->view('home/trackempvisit',$arr); 
    
    
    }
  
    public function timezone()
    {
		$this->Clientmodel->timezone();      
    }

    public function getCity(){
      $this->Clientmodel->getCity();
      
    }
	
	

}
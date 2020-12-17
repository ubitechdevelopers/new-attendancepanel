<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addon extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('Addon_model');
		handleLogin();
    } 
	public function editorg($id,$pageid='')
	{
		//handleLoginAdmin();
		$result['res'] = $this->Addon_model->getallState();
		$result['data'] = $this->Addon_model->editOrganizationData($id);
		$result['h'] = $this->Addon_model->getCountries();
		$result['t'] = $this->Addon_model->getTrialData($id);
		$result['e'] = $this->Addon_model->getextendeddata($id);
		$result['l'] = $this->Addon_model->getAllLeadData($id);
		$result['orgid'] =$id;
		$result['pageid'] =$pageid;
		$result['add']=$this->Addon_model->orgdetails($id);
		$result['attplan']=$this->Addon_model->attdplan();
		$result['attplan1']=$this->Addon_model->attdplan1();
		$result['attplan2']=$this->Addon_model->attdplan2();
		//var_dump($result['add']);		 
			
 // die;      


		$this->load->view('home/addons',$result);
		
	}

	/* public function editOrganizationData($id,$pageid=''){

		
		
	} */

public function livelocationtrack($eid='',$dateSelected='',$accuracy='',$favr=''){
		 $date=date("Y-m-d");
	 
	// echo $eid;die;


	 
	 if($dateSelected=='')
	 $dateSelected=$date;
	 
	 $filterdate=isset($_REQUEST['date'])?$_REQUEST['date']:0;
	 //var_dump($filterdate);
	  $arr['detail']=$this->Addon_model->trackLocationsvisit($eid,$dateSelected,'00:00:00','00:00:00');
	 
	  $arr['livetrackemp']=$this->Addon_model->livetrack($dateSelected);

	$arr['eid']=$eid;
	$arr['empname']=getEmpName($eid);
	$arr['date']=$dateSelected;

	$arr['acc']=$accuracy;
	$arr['fav']=$favr;


	$arr['orgid']=$_SESSION['orgid'];
	$this->load->view('home/livelocationtracking',$arr);
}
// public function updateaddonspermission($id)
// 	{
// 		$this->Addon_model->updateaddonspermission($id);
//         redirect(URL."Addon/editorg/".$id);
//         exit();
// 	}

public function updateaddonedit($id)
	{
		$this->Addon_model->updateaddonedit($id);
        
	}

public function updateaddonshiftplanner($id)
	{
		$this->Addon_model->updateaddonshiftplanner($id);
       
	}

public function updateaddonautotimeout($id)
	{
		$this->Addon_model->updateaddonautotimeout($id);
        
	}

public function updateaddondelete($id)
	{
		$this->Addon_model->updateaddondelete($id);
        
	}
public function updateaddonoffline($id)
	{
		$this->Addon_model->updateaddonoffline($id);
       
	}

public function updateaddoselfie($id)
	{
		$this->Addon_model->updateaddoselfie($id);
        
	}

public function updateaddoncovid($id)
	{
		$this->Addon_model->updateaddoncovid($id);
       
	}

public function updateaddonadvisit($id)
	{
		$this->Addon_model->updateaddonadvisit($id);
        
	}

public function updateaddonleave($id)
	{
		$this->Addon_model->updateaddonleave($id);
       
	}

public function updateaddonadminatt($id)
	{
		$this->Addon_model->updateaddonadminatt($id);
       
	}
	
	public function updateaddonmobileid($id)
	{
		$this->Addon_model->updateaddonmobileid($id);
       
	}
	
	public function updateaddonvisitpunch($id)
	{
		$this->Addon_model->updateaddonvisitpunch($id);
       
	}
	
	public function updateaddontimeoff($id)
	{
		$this->Addon_model->updateaddontimeoff($id);
       
	}


function currentlocation($eid='',$dateSelected='',$accuracy='',$favr=''){
	 $date=date("Y-m-d");
	 
	// echo $eid;die;


	 
	 if($dateSelected=='')
	 $dateSelected=$date;
	 
	 $filterdate=isset($_REQUEST['date'])?$_REQUEST['date']:0;
	 //var_dump($filterdate);
	  $arr['detail']=$this->location_model->trackLocationsvisit($eid,$dateSelected,'00:00:00','00:00:00');
 
    $arr['livetrackemp']=$this->location_model->livetrack($dateSelected);
 
	$arr['eid']=$eid;
	$arr['empname']=getEmpName($eid);
	$arr['date']=$dateSelected;

	$arr['acc']=$accuracy;
	$arr['fav']=$favr;


	$arr['orgid']=$_SESSION['orgid'];

 
 
 $this->load->view('home/currentlocation',$arr);
  }

  public function curl(){
  	// echo "string";
  	// die();
	$this->Addon_model->getaddoninfo();
	
	$today = date('Y-m-d');
	 /* echo $data['AddonEnd_date'] = $this->session->userdata('AddonEnd_date'); */
	    $AddonEnd_date = $this->Addon_model->getaddoninfo();
	  /* $result = $this->Addon_model->getaddoninfo(); */
	  /* var_dump($result);
	  var_dump($today > $data['AddonEnd_date']);
	  var_dump($today);
	  var_dump($data['AddonEnd_date']);
	  exit; */
if($today > $AddonEnd_date ){
	
	
	$this->load->view('home/curl.php');
	
}
else{
	
	
	
/*  '<p  style="display:none;"><?=echo 1;?></p>'; */
 
echo ''	;
}
	 
	 /* if($count==2){
		
		$this->load->view('home/curl.php');
	}   
	 */	
		
	}
	 // public function curl1(){
		 
		//  $this->load->view('home/curl.php');
	 // }
	public function success($orderid){
	
		$data['orderid'] = $orderid;
//echo $data['orderid'];exit;
		$this->load->view('home/success1',$data);
	}
}
?>
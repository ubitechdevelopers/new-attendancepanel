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
public function updateaddonspermission($id)
	{
		handleLoginAdmin(); 

        echo  $this->Addon_model->updateaddonspermission($id);
        
		redirect(URL."Addon/editorg/".$id);
        exit();
	}


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
?>
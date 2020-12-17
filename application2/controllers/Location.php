<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller {
	 public function __construct()
    {
	 parent::__construct();
	 if($_SESSION['expirydate'] == 1)
	 {
	   if($_SESSION['p_status'] == 0 && $_SESSION['expirydate'] = 1){
		   
	         redirect('http://ubiattendance.zentylpro.com/ubiattnew1/index.php/buy');

	   }else{
		   
		   redirect('http://ubiattendance.zentylpro.com/ubiattnew1/index.php/Upgrade');
	   }
	}else{
        $this->load->model('location_model');
		handleLogin();
	}
    } 
	function livetrack($eid='',$dateSelected='',$accuracy='',$favr=''){
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

	 
	 
	 $this->load->view('home/livetrack',$arr);
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
  
 function getdistance($eid='',$dateSelected=''){
 $date=date("Y-m-d");
 
 
 $arr['strdate']=$this->input->get('start');
 $arr['enddate']=$this->input->get('end');
 $strdate=$this->input->get('start');
 $enddate=$this->input->get('end');
 
 
// echo $eid;die;
 
 if($dateSelected=='')
 $dateSelected=$date;
 
 $filterdate=isset($_REQUEST['date'])?$_REQUEST['date']:0;
 //var_dump($filterdate);
  $arr['detail']=$this->location_model->trackLocationsvisit($eid,$dateSelected,'00:00:00','00:00:00');
 
  $arr['livetrackemp']=$this->location_model->livetrack($dateSelected);
  /* $arr['empids']=$this->location_model->datewiseallempid($strdate,$enddate); */
  
	$arr['eid']=$eid;
	$arr['empname']=getEmpName($eid);
	$arr['date']=$dateSelected;

	$arr['orgid']=$_SESSION['orgid'];
	
	/*  for($i=0; $i<count($arr['livetrackemp']); $i++){
	$arr1['test']= $arr['livetrackemp'][$i]['empid'];
	//print_r($arr['datats']);
	// $this->load->view('home/distance',$arr);
	 
  } */
//print_r($arr1);  
$var=array();
 foreach ($arr['livetrackemp'] as $test) {
    $var[] = $test['empid'];
	$arr['test1']=$var;
}
//print_r($var); 
$this->load->view('home/distance',$arr);
 
 

 }
 
	 public function getemppic(){

	   $this->location_model->getemppic();
	  } 
	  
	   function cumulative($eid='',$dateSelected='',$accuracy='',$favr=''){
	$date=date("Y-m-d");
	if($dateSelected=='')
	$dateSelected=$date;
	$filterdate=isset($_REQUEST['date'])?$_REQUEST['date']:0;
	$arr['detail']=$this->location_model->trackLocationsvisit($eid,$dateSelected,'00:00:00','00:00:00');
	$arr['livetrackemp']=$this->location_model->livetrack($dateSelected);
	$arr['eid']=$eid;
	$arr['empname']=getEmpName($eid);
	$arr['date']=$dateSelected;
	$arr['acc']=$accuracy;
	$arr['fav']=$favr;
	$arr['orgid']=$_SESSION['orgid'];
	$this->load->view('home/cumulativelocation',$arr);
	}
}
?>
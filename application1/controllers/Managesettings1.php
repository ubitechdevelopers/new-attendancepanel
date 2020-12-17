<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ManageSettings extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('manage_model');
}
public function index() {
$this->load->view('home/manageshift');
}


public function insertdata() {
$this->manage_model->saverecords();
}

public function deleteShift(){
		$this->manage_model->deleteShift();	
	}

// if($this->input->post('type')==1)
// {    
//     $shifttype=$this->input->post('shifttype');
//     $shiftname=$this->input->post('shiftname');
//     $timeinduration=$this->input->post('timeinduration');
//     $timeoutduration=$this->input->post('timeoutduration');
//     $breakinduration=$this->input->post('breakinduration');
//     $breakoutduration=$this->input->post('breakoutduration');
//      // var_dump($shifttype);
//      // die;
//     $this->Manage_model->saverecords($shifttype,$shiftname,$timeinduration,$timeoutduration,$breakinduration,$breakoutduration);  
//     echo json_encode(array(
//         "statusCode"=>200
//     ));
public function department() {
$html = $this->load->view('home/managedepartment');
$response['html'] = $html;
echo json_encode($response);
}
public function designation() {
$this->load->view('home/managedesignation');
}
public function holidays() {
$this->load->view('home/manageholiday');
}
public function hourlyrate() {
$this->load->view('home/managehourlyrate');
}
public function geofence() {
$this->load->view('home/managegeofence');
}
public function sidebar() {
$this->load->view('menubar/sidebar');
}
public function add_department() {
//echo "string";
$this->load->model('manage_model');
$result=$this->manage_model->createdpt();
}
public function add_designation() {
$this->load->model('manage_model');
$this->manage_model->createdsg();
}
public function add_holiday() {
$this->load->model('manage_model');
$this->manage_model->createholiday();
}
public function add_hourlyrate() {
$this->load->model('manage_model');
$this->manage_model->createhourlyrate();
}
public function getAllDept1(){
$this->load->model('manage_model');
$this->manage_model->getAllDept();  
// echo "string"; 
}
public function getAllDesg1(){
$this->load->model('manage_model');
$this->manage_model->getAllDesg();    
}
public function getAllHolidays(){
$this->load->model('manage_model');
$this->manage_model->getAllHolidays();    
}
public function getAllrates(){
$this->load->model('manage_model');
$this->manage_model->getAllrates();   
}
public function getGeolocation()
{$this->load->model('manage_model');
$postData=$this->input->post();
$data = $this->manage_model->getGeolocation($postData);   
echo json_encode($data);    
}
public function getAllShift(){
$this->load->model('manage_model');
$this->manage_model->getAllShift();   
}
function getemployeebydept()
	{
		$this->load->model('manage_model');
		$employeearray = $this->manage_model->getemployeebydept();
		echo json_encode($employeearray);
	}
	public function editDept()
	{
		$this->load->model('manage_model');
		$this->manage_model->editDept();	
	}
	
	public function deleteDept()
	{
		$this->load->model('manage_model');
		$this->manage_model->deleteDept();
	}

function SaveEmpdeptList()
	{		$this->load->model('manage_model');
		$employeearray = $this->manage_model->SaveEmpdeptList();
		echo json_encode($employeearray);
	}

}
?>
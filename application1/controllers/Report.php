<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('Report_model');
		handleLogin();
    } 

     public function index() {
        $this->load->view('home/reports');
    }
     public function monthlyreports() {
        $this->load->view('home/monthlyreport');
    }
	
	
	

	public function getattRoastermonthly_count()
	{
	  $this->Report_model->getattRoastermonthly_count();

	}
	public function getattRoastermonthly1()
	{ 
	$data = $this->Report_model->getattRoastermonthly1();
	echo json_encode($data);
	}
	public function getattRoastermonthly()
	{
	$data = $this->Report_model->getattRoastermonthly();
	echo json_encode($data);
	}

	
	public function getattRoaster()
	{
		// echo 'hiii';
	$data = $this->Report_model->getattRoaster();
	// var_dump($this->db->last_query());
	echo json_encode($data);
	}
	
	public function getMonthlyAverageSummary($type) 
	{
	 $this->Report_model->getMonthlyAverageSummary($type);
	}
	
	public function getSummaryData($type) //1 for today,2 for yesterday
	{
		$data = $this->Report_model->getSummaryData($type);
		
	}
	public function getWeeklyAverageSummary($type) 
	{
	 $this->Report_model->getWeeklyAverageSummary($type);
	}
	public function attendanceOutsideThefencedArea()
	{
		$this->Report_model->attendanceOutsideThefencedArea();
	}
	
	
}
?>
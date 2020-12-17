<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('Dashboard_model');
    }


    public function index() {
       
		$data['presentE'] = $this->Dashboard_model->getPresentEmployee();
		$data['absent'] = $this->Dashboard_model->getAbsentEmployee();
		$data['LateEmployee'] = $this->Dashboard_model->Count_LateEmployee();
        $data['earlyEmployee'] = $this->Dashboard_model->Count_EarlyLeaverEmp();
		 $data['thirtydays'] = $this->Dashboard_model->thirtydays();
		 $data['DailyabsentAttendance'] = $this->Dashboard_model->DailyAbsentEmployee_new();
		
         $this->load->view('home/dash',$data);
    }
    public function changePassword()
	{
		$this->load->view('login/ChangePassword');
		
	}
	public function updatePassword(){
		$this->Dashboard_model->updatePassword();
		/*alert("hello");*/
		
	}
}
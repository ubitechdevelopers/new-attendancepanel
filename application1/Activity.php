<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('Activity_model');
		handleLogin();
    } 

    public function index()
    {
    	  $this->load->view('home/activitylog');
    }

/*public function activitylog($id) {
        $data = array('id' => $id);
        $this->load->view("home/activitylog", $data);
    }*/

public function getAllActivity() {
        $this->Activity_model->getAllActivity();
    }  
}
?>
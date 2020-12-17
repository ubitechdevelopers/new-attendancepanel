<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('Payroll_model');
		handleLogin();
    } 

     public function index() {
        $this->load->view('home/payroll');
    }

}
?>
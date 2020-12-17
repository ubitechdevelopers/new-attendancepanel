<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	 public function __construct()
    {
	    parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');



    }
    public function index()
	{
		$this->load->view('login/loginpage');
	}
	public function login(){
	
		    $res[]=array();
			$val=$this->login_model->login();
			// print_r($res);
			// var_dump($this->db->last_query());
			echo $val;
	}
	public function forgotpswd(){
		$this->load->view('login/forgotpswd');
		
	} 
}
?>
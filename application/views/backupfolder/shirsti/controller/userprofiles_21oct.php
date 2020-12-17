<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofiles extends CI_Controller {
	public function __construct()
    {
	    parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('userprofiles_model');
		handleLogin();
    } 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function addemployee(){
		$this->load->view("home/addemployee");
	}
	public function employeelist(){
		$this->load->view("home/employeelist");

	}
	
	public function inactiveemployee(){
		$this->load->view("home/inactiveemployee");

	}
	public function getinactiveEmployeesData(){
		$this->userprofiles_model->getInactiveEmpData();

	}
	public function getArchiveEmp()
	{
	  $this->userprofiles_model->getArchiveEmp();
	}
	public function archiveemployee()
	{
		$this->load->view('home/archiveemp');
	}
	public function employeelist_demo(){
		$this->load->view("home/employeelist_demo");

	}
	public function getEmployeesData(){
		$this->userprofiles_model->getEmployeesData();
	}
	public function insertemployeedetails(){		
		$this->userprofiles_model->insertemployeedetails();

	}
	public function datatablefile(){		
		$this->load->view("home/datatablefile");


	}
        
                       }

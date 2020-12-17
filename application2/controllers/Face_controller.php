<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Face_controller extends CI_Controller {
	 public function __construct()
    {
	    parent::__construct();
        $this->load->model('face_model');
		handleLogin();
    } 
	
	public function faceid()
	{
		$this->load->view('home/face_view');
	}
	 public function getFaceIDs()
	{
		$data = $this->face_model->getFaceIDs();
	}
	public function disapprove1()
	{
		$data = $this->face_model->disapprove1();

	}
	public function suspicious_selfie()
	{
		$this->load->view('home/suspicious');
	}
	public function getSuspiciousSelfie()
	{
		$data = $this->face_model->getSuspiciousSelfie();
	}
	
	public function disapprove()
	{
		$data = $this->face_model->disapprove();

	} 
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('upgrade/index.php');
	}

	public function orgdetails(){

		$this->load->model('Orgdetailsupgrade');
		$this->Orgdetailsupgrade->orgdetails();
	}

	public function payumoney(){

		$this->load->view('upgrade/payumoney.php');
	}

 	public function curl1(){
 		unset($_SESSION['txnd']);
		$this->load->view('upgrade/payusuccess.php');
	} 

	public function curl(){

		$this->load->view('upgrade/curl.php');
	}
	public function payufailed(){

		$this->load->view('upgrade/payufailed.php');
	}
		public function success($orderid){
unset($_SESSION['txnd']);
		$data['orderid'] = $orderid;
//echo $data['orderid'];exit;
		
		$this->load->view('upgrade/success.php',$data);
	}
}

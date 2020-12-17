<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leave extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('login_model');
        $this->load->model('Leave_model');
        handleLogin();
    }

    /* public function index() {
        $this->load->view('home/leaves');
    }*/
    public function index()
    {
        $this->load->view('home/leave');
    }
    public function Onleavereport()
    {
        $postData = $this->input->post();
        $data = $this->Leave_model->Onleavereport($postData);
        echo Json_encode($data);
    }
    public function leavereport()
    {
        $postData = $this->input->post();
        $data = $this->Leave_model->leavereport($postData);
        echo json_encode($data);
    }
    public function approveleave()
    {


        $this->Leave_model->approveleave();
    }
    public function rejectleave()
    {

        $this->Leave_model->rejectleave();
    }
}
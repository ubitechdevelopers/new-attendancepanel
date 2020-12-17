<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        handleLogin();
    }
    
    public function importUploadsDep() {
        $orgid = $_SESSION['orgid'];
        $inputFileName = isset($_FILES["proposalfile"]["tmp_name"]) ? $_FILES["proposalfile"]["tmp_name"] : "";
        //$ext = end((explode(".", $inputFileName))); 
        $storage_name = "newdepartment.csv";

        if (file_exists("uploads/employee/$orgid/$storage_name")) {
            unlink("uploads/employee/$orgid/$storage_name");
        }
        if (!file_exists("uploads/employee/$orgid/")) {
            mkdir("uploads/employee/$orgid/", 0755, true);
        }
        $location = "uploads/employee/$orgid/";
        $config['upload_path'] = $location;
        $config['allowed_types'] = 'csv';
        $config['file_name'] = $storage_name;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('proposalfile')) {
            echo ($this->upload->display_errors());
            //$this->load->view('home/import', $error);
        } else {
            echo json_encode($this->upload->data());
            // $this->load->view('home/import', $data);
        }
    }
    
   public function emportDep() {
        $result = $this->admin_model->emportDep();
        echo json_encode($result);
    }
    
     public function showTMPDes($id) {
        $data = array('id' => $id);

        $this->load->view('home/showTMPDes', $data);
    }
    
    public function importUploadsDeg() {
        $orgid = $_SESSION['orgid'];
        $inputFileName = isset($_FILES["proposalfile"]["tmp_name"]) ? $_FILES["proposalfile"]["tmp_name"] : "";
        //$ext = end((explode(".", $inputFileName))); 
        $storage_name = "newdesignation.csv";

        if (file_exists("uploads/employee/$orgid/$storage_name")) {
            unlink("uploads/employee/$orgid/$storage_name");
        }
        if (!file_exists("uploads/employee/$orgid/")) {
            mkdir("uploads/employee/$orgid/", 0755, true);
        }
        $location = "uploads/employee/$orgid/";
        $config['upload_path'] = $location;
        $config['allowed_types'] = 'csv';
        $config['file_name'] = $storage_name;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('proposalfile')) {
            echo ($this->upload->display_errors());
            //$this->load->view('home/import', $error);
        } else {
            echo json_encode($this->upload->data());
            // $this->load->view('home/import', $data);
        }
    }
    
    public function emportDeg() {
        $result = $this->admin_model->emportDeg();

        echo json_encode($result);
    }
}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

         $this->load->model("Setting_model");
        $data = $this->Setting_model->getnotificationsts();
                
        $td=$this->load->view('home/settings',array("data"=>$data));
        
    }
     public function activity() {

       
        // $data = $this->Setting_model->getnotificationsts();
                
        $td=$this->load->view('home/activitylog');
        
    }
     public function getAllActivity() {
        $postData = $this->input->post();
        $this->load->model("Setting_model");
        $data = $this->Setting_model->getAllActivity($postData);
        echo json_encode($data);      
       
        
    }


     public function alertsettings() {
         $this->load->model("Setting_model");
         $data1= $this->Setting_model->getSendMailStatus();
        $data = $this->Setting_model->getactiveStatus();
   
        $datavisit= $this->Setting_model->getactiveVisitStatus();
        
        $attvisit= $this->Setting_model->getactiveAttStatus();
       
        $this->load->view('home/alertsettings',array("data"=>$data,"data1"=>$data1,"datavisit"=>$datavisit,"attvisit"=>$attvisit));
    }

public function notification_sts_update()  
        { 
            $this->load->model("Setting_model");
        $this->Setting_model->notification_sts_update();
        
        }

        public function alertsubmission()
        {
            $this->load->model("Setting_model");
        $this->Setting_model->addAlert();
        }

        public function mailtrigger_sts_update()  
    {
        $this->load->model("Setting_model");
    $this->Setting_model->mailtrigger_sts_update();

    }
    


}

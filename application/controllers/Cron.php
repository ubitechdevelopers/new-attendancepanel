<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cron_model');
		//include(APPPATH . "s3.php");
	}
	 public function clean_expired_org_data(){
	 	$this->cron_model->clean_expired_org_data();
	 	//$this->cron_model->sendTrialOrgMail();
	 }
	 
	 public function check_expired_org_data(){
	 	$this->cron_model->check_expired_org_data();
	 	//$this->cron_model->sendTrialOrgMail();
	 }
	 public function getalertOrg(){
		 
	 	$this->cron_model->getdetailAlertOrg();
	 } 

	 public function checkaddon(){

$this->cron_model->checkaddon();

	 }
	 
	 public function monthllyAttAlert()
	 {
		 
		$this->cron_model->monthllyAttAlert(); 
	 }
	  public function weekllyAttAlert()
	 {
		$this->cron_model->weekllyAttAlert(); 
	 }
	
	public function getOrgListAboutToExpire() // vijay
	{
		$val=$this->cron_model->getOrgListAboutToExpire();
	}
	
	
	
	public function sendRoutineMail()//vijay
	{
		$val=$this->cron_model->sendRoutineMail();
	}
	public function ijlprapfcb()
	{
		$arr=array();
		$arr['email']=isset($_REQUEST['ui'])?$_REQUEST['ui']:'0';
		$arr['ctr']=isset($_REQUEST['ctr'])?$_REQUEST['ctr']:'';
		$arr['orgid']=isset($_REQUEST['orgid'])?$_REQUEST['orgid']:'';
		$arr['isvalid_link']=checkLinkValidity_admin(decode5t($arr['email']),$arr['orgid'],$arr['ctr']);
		$this->load->view('home/resetPasswordLinkPageAdmin',$arr);	
	}
	public function setAdminPassword(){
		header('Access-Control-Allow-Origin: *');
		$this->cron_model->setAdminPassword();  
	}
	public function varify_mail_account($orgid){
		header('Access-Control-Allow-Origin: *');
		if($this->cron_model->varify_mail_account($orgid))
			echo '<center><h3 style="color:green">Account verified<br/> Thanks </h3></center>';
		else
			echo '<center><h3 style="color:red">Account already verified<br/> Thanks</h3></center>';
	}
	public function org_user_snap(){
		header('Access-Control-Allow-Origin: *');
		$this->cron_model->org_user_snap();
	}
	
	public function sendTrialOrgMail(){
	 	$this->cron_model->sendTrialOrgMail();
	 	$this->cron_model->sendPremiumExpMail();
	 	$this->cron_model->sendMailAfterExpiry();
	 	$this->cron_model->sendVerificationMails();
	}
	public function sendPremiumExpMail(){
	 	$this->cron_model->sendPremiumExpMail();
	}
	
	public function sendMailAfterExpiry(){
	 	$this->cron_model->sendMailAfterExpiry();
	}
	
	public function sendVerificationMails(){
	 	$this->cron_model->sendVerificationMails();
	}
	public function exceedUserAlert(){
	 	$this->cron_model->exceedUserAlert();
	}
	
	 public function generateInvoice(){
		// $this->load->library('pdf');
		// $html = $this->cron_model->generateHtml();
		// $pdf=new Pdf();
		// $pdf->loadHtml($html);
		// $pdf->render();
		// if (ob_get_contents()) ob_end_clean();
		// $output = $pdf->stream('Invoice.pdf');
		// echo 'Invoice generated successfully';

		 $this->load->library('Pdf11');
	$html = $this->cron_model->generateHtml();
	//var_dump($html);
	 $pdf = new TCPDF();
// 	 $pdf->AddPage('P', 'A4');
// 	 $pdf->SetFont('helvetica', '', '10px');
	 

// // $x = $pdf->pixelsToUnits('30');
// // $y = $pdf->pixelsToUnits('30');
// // $font_size = $pdf->pixelsToUnits('30');


// // $pdf->SetFont ('helvetica', '', $font_size , '', 'default', true );

// 	 $pdf->writeHTML($html, true, false, true, false, '');
// 	 $pdf->Output('Invoice.pdf', 'I');

	 $pdf->SetFont('times', '', 12, '', 'false');
	 $pdf->AddPage('P', 'A4');
	 $pdf->setPrintHeader(false);
	 $pdf->setPrintFooter(false);
	 
	 
	 $pdf->writeHTML($html, true, false, true, false, '');
	 
	 
	 
	 $pdf->Output('Invoice.pdf', 'I');


	 } 
	
	public function unsubscribeOrgMails($orgid){
		if($this->cron_model->unsubscribeOrgMails($orgid))
			echo '<center><h3 style="color:green">Account Unsubscribed...<br/>Thanks</h3> </center>';
		else
			echo '<center><h3 style="color:red">Account already unsubscribed...<br/> Thanks</h3></center>';
	}
	public function getOutsideLocations() // deeksha
	{
		$val=$this->cron_model->getOutsideLocations();
	} 
	public function sendMailAWS() // deeksha
	{
		$senmailsuccess = $this->cron_model->sendMailAWS();
		echo json_encode($senmailsuccess);
	} 
	public function sendAutoMailAWS() // deeksha
	{
		$senmailsuccess = $this->cron_model->sendAutoMailAWS();
		echo json_encode($senmailsuccess);
	} 
	public function getMonthlyAverageSummary($type) //sohan
	{
	 $this->cron_model->getMonthlyAverageSummary($type);
	}
	public function getdetailAlertOrg__new()
	 {  
		 $this->cron_model->getdetailAlertOrg__new();
	 }
	 public function getdetailAlertOrg__new1()
	 {  
		 $this->cron_model->getdetailAlertOrg__new1();
	 }
	 public function getdetailAlertOrg__test()
	 {  
		 $this->cron_model->getdetailAlertOrg__test();
	 }
	 
	public function getOrgListAboutToExpire__new() //sohan
	{
		$this->cron_model->getOrgListAboutToExpire__new();
	}
	/*public function testorientation()
	{
	$this->cron_model->testorientation();
		
	}*/
	
	/*Cron Function to delete attendances before 3 months and save into archivedattendance table 
	by Deeksha on 6 july 2019*/
	public function archiveattendances() 
	{
	$this->cron_model->archiveattendances();
	}
	
	public function  sendMailBeforeCleanedup()
	{
		$this->cron_model->sendMailBeforeCleanedup();
	}
	public function  deleteimages()
	{
		$this->cron_model->deleteimages();
	}
	public function  moveimage()
	{
		$this->cron_model->moveimage();
	}
	public function testlog()
	{  
	    echo "Sohan patel";
		/*$query = $this->db->query("SELECT Id,`TimeZone`, Country FROM `Organization` WHERE `TimeZone` = 0");
		foreach($query->result() as $row){
			
			$query1 = $this->db->query("select id from  ZoneMaster where CountryId = $row->Country limit 1");
			if($row1 = $query1->row())
			{
				echo $row1->id;
				echo "<br>";
				$this->db->query("Update Organization set TimeZone = $row1->id where Id = $row->Id AND `TimeZone` = 0 ");
			}
			
		}*/
	}
 public function image($image)
	{
		
			/*// open the file in a binary mode
       $name = './tempimage/pic1.jpg';
       //$fp = fopen($name, 'rb');
       $copyfile='attendance_images/TimeIn_7978739_4252_22042020.jpg';
      // send the right headers
	   $fp =  S3::getObject('ubiattendanceimages', $copyfile);
	   $fp = fopen($fp, 'rb');
       header("Content-Type: image/png");
       //header("Content-Length: " . filesize($name));

      // dump the picture and stop the script
     // fpassthru($fp);
      exit;*/
	   header("Content-Type: image/png");
	  $bucket = 'ubiattendanceimages';
      $filename = 'attendance_images/'.$image;
      $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://s3-ap-south-1.amazonaws.com/' . $bucket . '/' . $filename);
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		$data = curl_exec($ch);
		curl_close($ch);
		header("Content-Length: " . strlen($data));
		echo $data;
	}
	 public function visitimage($image)
	{
	   header("Content-Type: image/png");
	  $bucket = 'ubiattendanceimages';
      $filename = 'visits/'.$image;
      $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://s3-ap-south-1.amazonaws.com/' . $bucket . '/' . $filename);
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		$data = curl_exec($ch);
		curl_close($ch);
		header("Content-Length: " . strlen($data));
		echo $data;
	}
	
}

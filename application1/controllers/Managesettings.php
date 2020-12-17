<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ManageSettings extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('manage_model');
}
public function index() {
$this->load->view('home/manageshift');
}


public function insertdata()
{

		$shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
		$orgid = $_SESSION['orgid'];

		if ($shifttype == 1)
		{
				$timein = date("H:i:s", strtotime(isset($_REQUEST['ti']) ? $_REQUEST['ti'] : ''));
				$timeout = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ''));
				$timein_break = date("H:i:s", strtotime(isset($_REQUEST['tib']) ? $_REQUEST['tib'] : ''));
				$timeout_break = date("H:i:s", strtotime(isset($_REQUEST['tob']) ? $_REQUEST['tob'] : ''));
				$timegrace = date("H:i:s", strtotime(isset($_REQUEST['tig']) ? $_REQUEST['tig'] : ''));
				$timegraceout = date("H:i:s", strtotime(isset($_REQUEST['gto']) ? $_REQUEST['gto'] : ''));
				//var_dump($timein);
				//var_dump($timegrace);
				$query = $this
						->db
						->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");
				if ($orgid == "35171" || $orgid == "10")
				{
						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000) echo 66;
								else if ($timein > $timeout)
								{
										echo 22;
								}
								/*else if($timein_break > $timeout_break)
								{
								echo 33;
								}*/
								else if ($timein > $timegrace)
								{
										echo 50;
								}
								else if ($timegrace > $timeout)
								{
										echo 52;
								}
								/*else if($timein > $timegraceout)
								{
								echo 51;
								}*/
								/*else if($timeout < $timegraceout)
								{
								echo 60;
								}*/
								/*else if($timein_break <= $timein)
								{
								echo 44;
								}*/
								/*else if($timeout_break >= $timeout)
								{
								echo  55;
								}*/
								else
								{
										$this->manage_model->registerShift();
								}
						}

				}
				else
				{

						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000) echo 66;
								else if ($timein > $timeout)
								{
										echo 22;
								}
								/*else if($timein_break > $timeout_break)
								{
								echo 33;
								}*/
								/* else if($timein > $timegrace)
								{
								echo 50;
								} */
								/* else if($timegrace > $timeout)
								{
								echo 52;
								} */
								/*else if($timein > $timegraceout)
								{
								echo 51;
								}*/
								/* else if($timeout < $timegraceout)
								{
								echo 60;
								} */
								/*else if($timein_break <= $timein)
								{
								echo 44;
								}*/
								/*else if($timeout_break >= $timeout)
								{
								echo  55;
								}*/
								else
								{
										$this
												->manage_model
												->registerShift();
								}
						}

				}
				/* else
				{
				echo 0;
				} */

		}

		elseif ($shifttype == 3)
		{
				$this
						->manage_model
						->registerShift();
		}
		else
		{

				$timein = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['ti']) ? '2019-06-25' . ' ' . $_REQUEST['ti'] : ''));
				// $timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
				$timeout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['to']) ? '2019-06-26' . ' ' . $_REQUEST['to'] : ''));
				$timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-25' . ' ' . $_REQUEST['tib'] : ''));
				$timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-25' . ' ' . $_REQUEST['tob'] : ''));
				$timegrace = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tig']) ? '2019-06-25' . ' ' . $_REQUEST['tig'] : ''));
				$timegraceout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['gto']) ? '2019-06-26' . ' ' . $_REQUEST['gto'] : ''));
				/*var_dump($timegrace);
				var_dump($timein);
				die;*/

				if ($timein_break > $timeout_break)
				{
						$timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-25' . ' ' . $_REQUEST['tib'] : ''));
						$timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-26' . ' ' . $_REQUEST['tob'] : ''));
				}
				else if ($timein > $timein_break || $timein > $timeout_break)
				{
						$timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-26' . ' ' . $_REQUEST['tib'] : ''));
						$timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-26' . ' ' . $_REQUEST['tob'] : ''));
				}

				$query = $this
						->db
						->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");

				if ($orgid == "35171" || $orgid == "10")
				{
						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000)
								{
										echo 66;
								}

								else if ($timein > $timeout)
								{
										echo 22;
								}
								/*else if($timein_break > $timeout_break)
								{
								echo 33;
								}*/
								else if ($timein > $timegrace)
								{
										echo 50;
								}
								else if ($timeout < $timegraceout)
								{
										echo 60;
								}
								/*else if($timein_break <= $timein)
								{
								echo 44;
								}*/
								/*else if($timeout_break >= $timeout)
								{
								echo 55;
								} */
								// else if(ti > gto){
								// 	echo 51;
								// }
								else
								{
										$this
												->manage_model
												->registerShift();
								}
						}

				}
				else
				{

						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000)
								{
										echo 66;
								}

								else if ($timein > $timeout)
								{
										echo 22;
								}
								/*else if($timein_break > $timeout_break)
								{
								echo 33;
								}*/
								/* else if($timein > $timegrace)
								{
								echo 50;
								} */
								/* else if($timeout < $timegraceout)
								{
								echo 60;
								} */
								/*else if($timein_break <= $timein)
								{
								echo 44;
								}
								else if($timeout_break >= $timeout)
								{
								echo 55;
								} */
								// else if(ti > gto){
								// 	echo 51;
								// }
								else
								{
										$this
												->manage_model
												->registerShift();
								}
						}

				}
				/* else
				{
				echo 0;
				} */

		}

		//$this->shift_model->saverecords();
		
}

public function shiftdelete()
{

		$this
				->manage_model
				->delshiftsss();
}

public function getAllShift()
{
	 $postData = $this->input->post();
		$this->load->model('manage_model');
		$data = $this->manage_model->getAllShift($postData);
		echo json_encode($data);
}
public function viewshift()
{
		$sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';

		$data['orgid'] = $_SESSION['orgid'];

		$data['editdata'] = $this
				->manage_model
				->getEditShift($sid);
		$data['getweekdays'] = $this
				->manage_model
				->fetchWeeklyOff($sid);

		$this
				->load
				->view('home/editviewshift', $data);
}

public function editShift()
{
		$postData = $this
				->input
				->post();
		$orgid = $_SESSION['orgid'];
		$shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
		//var_dump($shifttype);
		if ($shifttype == 1)
		{
				$timein_break = date("H:i:s", strtotime(isset($_REQUEST['tib']) ? $_REQUEST['tib'] : ''));
				$timein = date("H:i:s", strtotime(isset($_REQUEST['ti']) ? $_REQUEST['ti'] : ' '));
				$timeout = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ' '));

				//$timein_break =date("H:i:s",strtotime(isset($_REQUEST['tib'])?$_REQUEST['tib']:''));
				//$timeout_break=date("H:i:s",strtotime(isset($_REQUEST['tob'])?$_REQUEST['tob']:''));
				$timegrace = date("H:i:s", strtotime(isset($_REQUEST['tig']) ? $_REQUEST['tig'] : ''));
				$timegraceout = date("H:i:s", strtotime(isset($_REQUEST['tog']) ? $_REQUEST['tog'] : ''));

				$query = $this
						->db
						->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");
				if ($orgid == "35171")
				{
						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000) echo 66;

								/* 	else if($timein > $timein_break )
								{
								echo 67;
								// return false;
								} */
								else if ($timein > $timeout)
								{
										echo 22;
								}
								/* else if($timein_break > $timeout_break)
								{
								echo 33;
								} */
								else if ($timein > $timegrace)
								{
										//var_dump($timein);
										//var_dump($timegrace);
										echo 50;

								}
								else if ($timegrace > $timeout)
								{
										echo 52;
								}
								/*else if($timein > $timegraceout)
								{
								echo 51;
								}*/
								else if ($timeout < $timegraceout)
								{
										echo 60;
								}
								/* else if($timein_break <= $timein)
								{
								echo 44;
								} */
								/* else if($timeout_break >= $timeout)
								{
								echo  55;
								} */

								else
								{
										$this
												->manage_model

												->editShift();
								}
						}

				}
				else
				{

						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000) echo 66;

								/* 	else if($timein > $timein_break )
								{
								echo 67;
								// return false;
								} */
								else if ($timein > $timeout)
								{
										echo 22;
								}
								/* else if($timein_break > $timeout_break)
								{
								echo 33;
								} */
								/* else if($timein > $timegrace)
								{
								
								echo 50;
								
								}
								else if($timegrace > $timeout)
								{
								echo 52;
								} */
								/*else if($timein > $timegraceout)
								{
								echo 51;
								}*/
								else if ($timeout < $timegraceout)
								{
										echo 60;
								}
								/* else if($timein_break <= $timein)
								{
								echo 44;
								}
								else if($timeout_break >= $timeout)
								{
								echo  55;
								} */

								else
								{
										$this
												->manage_model
												->editShift();
								}
						}
				}
		}

		elseif ($shifttype == 3)
		{
				$this
						->manage_model
						->editShift();
		}
		else
		{

				$timein = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['ti']) ? '2019-06-25' . ' ' . $_REQUEST['ti'] : ''));
				// $timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
				$timeout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['to']) ? '2019-06-26' . ' ' . $_REQUEST['to'] : ''));
				$timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-25' . ' ' . $_REQUEST['tib'] : ''));
				$timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-25' . ' ' . $_REQUEST['tob'] : ''));
				$timegrace = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tig']) ? '2019-06-25' . ' ' . $_REQUEST['tig'] : ''));
				$timegraceout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tog']) ? '2019-06-26' . ' ' . $_REQUEST['tog'] : ''));

				/* if($timein_break > $timeout_break)
				{
				$timein_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tib'])?'2019-06-25'.' '.$_REQUEST['tib']:''));
				$timeout_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tob'])?'2019-06-26'.' '.$_REQUEST['tob']:''));
				} */
				/* else if($timein > $timein_break || $timein > $timeout_break)
				{
				$timein_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tib'])?'2019-06-26'.' '.$_REQUEST['tib']:''));
				$timeout_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tob'])?'2019-06-26'.' '.$_REQUEST['tob']:''));
				} */

				$query = $this
						->db
						->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");

				// var_dump($row = $query->row());
				if ($orgid == "35171")
				{
						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000)
								{
										echo 66;
								}
								else if ($timein > $timeout)
								{
										echo 22;
								}
								/* else if($timein_break > $timeout_break)
								{
								echo 33;
								} */

								else if ($timein > $timegrace)
								{
										echo 50;

								}
								else if ($timeout < $timegraceout)
								{
										echo 60;
								}
								/* else if($timein_break <= $timein)
								{
								echo 44;
								} */
								/* else if($timeout_break >= $timeout)
								{
								echo 55;
								}  */
								else
								{

										$this
												->manage_model
												->editShift();
								}
						}
				}
				else
				{

						if ($row = $query->row())
						{
								$shifthour = $row->shifthour;

								if ((int)$shifthour > 72000)
								{
										echo 66;
								}
								else if ($timein > $timeout)
								{
										echo 22;
								}
								/* else if($timein_break > $timeout_break)
								{
								echo 33;
								} */

								else if ($timeout < $timegraceout)
								{
										echo 60;
								}
								/* else if($timein_break <= $timein)
								{
								
								echo 44;
								} */
								/* else if($timeout_break >= $timeout)
								{
								echo 55;
								}  */
								else
								{

										$this
												->manage_model
												->editShift();
								}
						}

				}
		}

}

// public function department()
// {

// 		$response['html'] = $html;
// 		echo json_encode($response);
// }

// function SaveEmpdeptList()
// {
// 		$this
// 				->load
// 				->model('shift_model');
// 		$employeearray = $this
// 				->shift_model
// 				->SaveEmpdeptList();
// 		echo json_encode($employeearray);

// }

function getemployebyshift()
{
		$this
				->load
				->model('manage_model');
		$employeearray = $this
				->manage_model
				->getemployebyshift();
		echo json_encode($employeearray);
}

// if($this->input->post('type')==1)
// {    
//     $shifttype=$this->input->post('shifttype');
//     $shiftname=$this->input->post('shiftname');
//     $timeinduration=$this->input->post('timeinduration');
//     $timeoutduration=$this->input->post('timeoutduration');
//     $breakinduration=$this->input->post('breakinduration');
//     $breakoutduration=$this->input->post('breakoutduration');
//      // var_dump($shifttype);
//      // die;
//     $this->Manage_model->saverecords($shifttype,$shiftname,$timeinduration,$timeoutduration,$breakinduration,$breakoutduration);  
//     echo json_encode(array(
//         "statusCode"=>200
//     ));
public function department() {
$this->load->view('home/managedepartment');
// $response['html'] = $html;
// echo json_encode($response);
}
public function designation() {
$this->load->view('home/managedesignation');
}
public function holidays() {
$this->load->view('home/manageholiday');
}
public function hourlyrate() {
$this->load->view('home/managehourlyrate');
}
public function geofence() {
	
	$this->load->model('manage_model');
	$data['outfence']= $this->manage_model->getoutsidefenceStatus();
	$this->load->view('home/managegeofence',$data);
}
public function sidebar() {
$this->load->view('menubar/sidebar');
}
public function add_department() {
//echo "string";
$this->load->model('manage_model');
$result=$this->manage_model->createdpt();
}
public function add_designation() {
$this->load->model('manage_model');
$this->manage_model->createdsg();
}
public function add_holiday() {
$this->load->model('manage_model');
$this->manage_model->createholiday();
}
public function add_hourlyrate() {
$this->load->model('manage_model');
$this->manage_model->createhourlyrate();
}
public function getAllDept1(){
$postData = $this->input->post();
$this->load->model('manage_model');
$data=$this->manage_model->getAllDept($postData); 
echo json_encode($data); 
// echo "string"; 
}
public function getAllDesg1(){
$postData = $this->input->post();
$this->load->model('manage_model');
$data=$this->manage_model->getAllDesg($postData);    
echo json_encode($data); 
}
public function getAllHolidays(){
$postData = $this->input->post();
$this->load->model('manage_model');
$data = $this->manage_model->getAllHolidays($postData);    
echo json_encode($data); 
}
public function getAllrates(){
$postData = $this->input->post();
$this->load->model('manage_model');
$data= $this->manage_model->getAllrates($postData);   
echo json_encode($data); 
}
public function getGeolocation()
{$this->load->model('manage_model');
$postData=$this->input->post();
$data = $this->manage_model->getGeolocation($postData);   
echo json_encode($data);    
}
// public function getAllShift(){
// $this->load->model('manage_model');
// $this->manage_model->getAllShift();   
// }

public function editDept()
	{
		$this->load->model('manage_model');
		$this->manage_model->editDept();	
	}
	
	public function deleteDept()
	{
		$this->load->model('manage_model');
		$this->manage_model->deleteDept();
	}

function SaveEmpdeptList()
	{		$this->load->model('manage_model');
		$employeearray = $this->manage_model->SaveEmpdeptList();
		echo json_encode($employeearray);
	}
	function getemployeebydept()
	{
		$this->load->model('manage_model');
		$employeearray = $this->manage_model->getemployeebydept();
		echo json_encode($employeearray);
	}
	function SaveEmpdesgList()
	{		$this->load->model('manage_model');
		$employeearray = $this->manage_model->SaveEmpdesgList();
		echo json_encode($employeearray);
	}
	function getemployeebydesg()
	{$this->load->model('manage_model');
		$employeearray = $this->manage_model->getemployeebydesg();
		echo json_encode($employeearray);
		
	}
	public function editDesg()
	{	$this->load->model('manage_model');
		$this->manage_model->editDesg();	
	}
	public function deleteDesg()
	{
		$this->load->model('manage_model');
		$this->manage_model->deleteDesg();	
	}
	public function editHoliday(){
		$this->load->model('manage_model');
		$this->manage_model->editHoliday();	
	}
public function deleteHoliday()
	{$this->load->model('manage_model');
		$this->manage_model->deleteHoliday();	
	}


	public function editRate()
	{
		$this->load->model('manage_model');
		$this->manage_model->editRate();	
	}
	
	public function deleteRate()
	{
		$this->load->model('manage_model');
		$this->manage_model->deleteRate();	
	}
	public function editLocation()
	{
		$this->load->model('manage_model');
		 $this->manage_model->editLocation();
	}
	public function deleteLocation()
	{
		$this->load->model('manage_model');
		 $this->manage_model->deleteLocation();
	}

	function getemployeebygeolocation()
	{
		$this->load->model('manage_model');
	$employeearray = $this->manage_model->getemployeebygeolocation();
	echo json_encode($employeearray);
	}

	function SaveEmpGeoList()
	{		
		$this->load->model('manage_model');
	$employeearray = $this->manage_model->SaveEmpGeoList();
	echo json_encode($employeearray);
	}
	public function saveGeolocation()
	{
		$this->load->model('manage_model');
		 $data = $this->manage_model->saveGeolocation();
		 echo json_encode($data);
		/*if($data != "")
		$data = array('success_sms'=>"Your location set successfull.");
		$this->load->view('home/GeoLocations',$data);

		redirect(URL . 'dashboard/geoLocations');*/
	}
	/* public function geoLocations()
	{
		$this->load->model('manage_model');
		$data['outfence']= $this->manage_model->getoutsidefenceStatus();
		//$outfence= $this->manage_model->getoutsidefenceStatus();
		 
		$this->load->view('home/managegeofence',$data);
	} */
	public function fencestatus()
		{
			$this->load->model('manage_model');
		$this->manage_model->fencestatus();
		}
		public function addRate(){
		$this->manage_model->addRate();	
	}

}
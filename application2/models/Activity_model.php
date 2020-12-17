<?php

class Activity_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //include(APPPATH."PhpMailer/class.phpmailer.php");
    }
     public function getAllActivity(){
			$orgid=$_SESSION['orgid'];
			$adminid=$_SESSION['id'];
			///==========
			$q='';
			
			$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';

			// var_dump($date);
			// die;
			

			// if($date == ''){
			// 		$enddate=date("Y-m-d");
		 //         $startdate=date('Y-m-d',(strtotime ( '-7 day',strtotime(date('Y-m-d'))) ));
				 
			//      $q.=" AND  `LastModifiedDate` BETWEEN  '$startdate' AND '$enddate' ";
			// }
			// else{
			// 		// $enddate = date('Y-m-d');
			// 		// $startdate = date('Y-m-d');
			
			// 	$arr=explode('-', trim($date));
			// 	$end= date('Y-m-d',strtotime($arr[1]));
			// 	$strt= date('Y-m-d',strtotime(substr($arr[0],2,strlen($arr[0])-3))); 
			// $q.=" AND `LastModifiedDate` BETWEEN  '$strt' AND '$end' ";
			// // echo $date;
			// // echo $end;
			// // echo $strt;

			// }
			 if($date == '')
				{
					$datestatus = isset($_REQUEST['datestatus'])?$_REQUEST['datestatus']:0;
					$range = "";
					if($datestatus == 7)
					{   
				        $enddate=date("Y-m-d");
				        $startdate=date('Y-m-d', strtotime('-7 day', strtotime($enddate)));
						$begin = new DateTime($startdate);
					$interval = new DateInterval('P1D'); // 1 Day
					$realEnd = new DateTime($enddate);
					$realEnd->add($interval);
					$dateRange = new DatePeriod($begin,$interval,$realEnd);
					foreach ($dateRange as $date) 
					 {
						$dt= $date->format('Y-m-d');
						if($range == "")
						   $range = "'".$date->format('Y-m-d')."'";
						else
						   $range .= ",'".$date->format('Y-m-d')."'";
					 }
						
					}
				   else
				   {
					  $enddate=date("Y-m-d");
					   $range = "'".date('Y-m-d')."'"; 
					   // $enddate=date("Y-m-d");
						//$startdate=date("Y-m-d");
				   }


		
			
			
		 $query = $this->db->query("SELECT  Id ,LastModifiedDate AS LastModifiedDate, Module, LastModifiedById,ActionPerformed, OrganizationId , ActivityBY, adminid FROM  ActivityHistoryMaster where OrganizationId = ? AND ActivityBy = 1 AND DATE(LastModifiedDate ) IN ( ".$range." )   ORDER BY DATE(LastModifiedDate ) DESC  ",array($orgid));
		}
		 // var_dump($this->db->last_query());
		else{
				$arr=explode('-',trim($date));
				$end= date('Y-m-d',strtotime($arr[1]));
				$strt= date('Y-m-d',strtotime(substr($arr[0],2,strlen($arr[0])-3))); 
				
				$begin = new DateTime($strt);
				$interval = new DateInterval('P1D'); // 1 Day
	            $realEnd = new DateTime($end);           
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin,$interval,$realEnd);
                $range = "";
			   foreach ($dateRange as $date) 
	             {
				$dt= $date->format('Y-m-d');
				if($range=="")
					$range = "'".$date->format('Y-m-d')."'";
		    	else
					$range .= ",'".$date->format('Y-m-d')."'";
				 }
				//echo $range;
			 $rangedate = $range;
			 // var_dump($rangedate)
			 
			
			 if($rangedate == "")
				{
			   $rangedate = 1;
				} 

				 $query = $this->db->query("SELECT  Id ,LastModifiedDate AS LastModifiedDate, Module, LastModifiedById,ActionPerformed, OrganizationId , ActivityBY, adminid FROM  ActivityHistoryMaster where OrganizationId = ? AND ActivityBy = 1 AND DATE(LastModifiedDate ) IN ( ".$range." )  ORDER BY DATE(LastModifiedDate ) DESC  ",array($orgid));
		}

			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
			  {
				$data=array();
				$data['ActionPerformed'] = $row->ActionPerformed;
				$data['Module'] = $row->Module;
				

				// print_r($data['LastModifiedDate']);
				// die;
				$data['LastModifiedById'] = "";
				if(strtolower(trim($row->Module))=='attendance app'){

					if($row->adminid != 0){

					$data['LastModifiedById'] = ucwords(getEmpName($row->adminid));
				}
				else{

					$data['LastModifiedById'] = ucwords(getEmpName($row->ActivityBY));

				}

				}
				else{
				if($row->adminid != 0){
				$data['LastModifiedById'] = ucwords(getAdminNameforactivitylog($row->adminid));
			}
			else{
				$data['LastModifiedById'] = ucwords(getAdminNameforactivitylog($row->ActivityBY));
			}
		}
			$data['LastModifiedDate'] = date("d-m-Y H:i",strtotime($row->LastModifiedDate));
				$res[]=$data;
			
			}  	
			$d['data']=$res; 
			 $this->db->close();
			echo json_encode($d); return false;
		}






}
?>
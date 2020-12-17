<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

// Count present Employee by sohan
		public function getPresentEmployee()
		{
			$org_id = $_SESSION['orgid'];
			$zone=getTimeZone($org_id);
            date_default_timezone_set($zone);
            $date = date("Y-m-d");
			$query = $this->db->query("select A.Id as presentEmp from AttendanceMaster A,EmployeeMaster E where A.OrganizationId = '$org_id' and A.AttendanceDate='$date' and A.TimeIn != '00:00:00' AND E.OrganizationId = A.OrganizationId AND A.EmployeeId = E.Id 	AND E.Is_Delete = 0  AND A.AttendanceStatus IN (1,8,4)");
			 return $this->db->affected_rows();
		}
		
		// count abset  employee today by sohan 
		public function getAbsentEmployee()
		{	
			$data = array();
			$res  = array();
			$org_id = $_SESSION['orgid'];
			$zone=getTimeZone($org_id);
            date_default_timezone_set($zone);
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$query1 = $this->db->query("SELECT E.Id FROM  `EmployeeMaster` E, ShiftMaster S WHERE E.OrganizationId =".$org_id." AND E.archive=1 and E.Id NOT IN (SELECT A.EmployeeId FROM `AttendanceMaster` A  WHERE  `AttendanceDate` IN ( '".$date."') AND A.OrganizationId =".$org_id." AND `AttendanceStatus` IN (1,8,4,11,12)) And E.Id NOT IN (select L.EmployeeId From AppliedLeave L where L.Date IN ('".$date."') AND L.OrganizationId=".$org_id." AND ApprovalStatus = 2) AND E.Shift = S.Id AND S.TimeIn < '$time' AND E.Is_Delete = 0 ORDER BY E.Id");
					
			$count=$query1->num_rows();
			return $count;
		}
		///////////
		// Count Late Comming Employee 
		public function Count_LateEmployee()
		{
			$res = array();
			$org_id = $_SESSION['orgid'];
			$zone=getTimeZone($org_id);
            date_default_timezone_set($zone);
			$date = date("Y-m-d");
			$query = $this->db->query("SELECT A.Id FROM  AttendanceMaster  A ,ShiftMaster S,EmployeeMaster E  WHERE A.ShiftId = S.Id AND A.OrganizationId = S.OrganizationId AND A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) AND A.AttendanceDate = '$date' AND A.OrganizationId = '$org_id' AND  A.TimeIn != '00:00:00' AND  E.Id = A.EmployeeId AND E.OrganizationId = A.OrganizationId AND E.Is_Delete = 0 And S.shifttype!=3  order by A.TimeIn");
			return $this->db->affected_rows();
		}
		






		// leavers of today start
		public function getLeaves()
		{	
			
			$org_id = $_SESSION['orgid'];
			$zone=getTimeZone($org_id);
            date_default_timezone_set($zone);
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$query = $this->db->query("SELECT COUNT(LeaveId)  as tcount FROM AppliedLeave WHERE Date IN ( '".$date."') AND `ApprovalStatus` = 2 AND OrganizationId = '$org_id'");

				if ($row = $query->result())
      		 	return $row[0]->tcount;
  			 	return 0;
		}



		//leavers of today end






		// Count Early Leavers 
		//  public function Count_EarlyLeaverEmp()
		//  {
		// 	$org_id = $_SESSION['orgid'];
		// 	$zone=getTimeZone($org_id);
        //     date_default_timezone_set($zone);
		// 	$date = date("Y-m-d");
		// 	$query = $this->db->query("SELECT A.AttendanceDate FROM  AttendanceMaster  A ,ShiftMaster S,EmployeeMaster E  WHERE A.ShiftId=S.Id AND A.OrganizationId = S.OrganizationId AND (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) AND A.AttendanceDate = '$date' AND A.OrganizationId = '$org_id'  AND  A.TimeOut != '00:00:00' AND  A.OrganizationId = E.OrganizationId AND A.EmployeeId = E.Id AND E.Is_Delete =0 And S.shifttype!=3");
		// 	return $this->db->affected_rows();
		//  }
		 
		 
		 public function thirtydays()
		{
			 $res=array();
			 $data = array();
			 $org_id = $_SESSION['orgid'];
			 $enddate=date("Y-m-d");
			 $startdate=date('Y-m-d', strtotime('-29 day', strtotime($enddate)));
			
			 $query = $this->db->query("Select A.Id FROM AttendanceMaster A,EmployeeMaster E, ShiftMaster C where A.AttendanceDate between '$startdate' and '$enddate' and A.AttendanceStatus in (1,8,4) And C.Id = A.ShiftId AND E.Id=A.EmployeeId And A.TimeIn != '00:00:00' and A.OrganizationId = ".$org_id );
			 
			  $count=$query->num_rows();
			   $data['label'] = 'Present:'.$count;
			  $data ['presentee'] = $count;
			  
			
			 
			$begin = new DateTime($startdate);
			$interval = new DateInterval('P1D'); // 1 Day
			$realEnd = new DateTime($enddate);
			$realEnd->add($interval);
			$dateRange = new DatePeriod($begin,$interval,$realEnd);	
			$range = "";
		     	$zname=getTimeZone($org_id);
				date_default_timezone_set ($zname);
				$todate = date('Y-m-d');
				$time = date("H:i:s");
				$i = 0;
				$count1=0;
		 foreach ($dateRange as $date) 
		  {
		        $range = $date->format('Y-m-d');
				$query = "";
				$count=0;
			if(strtotime($range)==strtotime($todate))
			{
			$query = $this->db->query("Select  E.Id as EmployeeId,'".$todate."' as AttendanceDate FROM EmployeeMaster E,ShiftMaster S Where  E.Id NOT IN (select A.EmployeeId From AttendanceMaster A where A.AttendanceDate= '".$todate."'  AND  A.OrganizationId= ".$org_id." AND AttendanceStatus  IN (1,8,4)) AND E.Id NOT IN (select L.EmployeeId From AppliedLeave L where L.Date = '".$todate."' AND L.OrganizationId=".$org_id." AND ApprovalStatus = 2) AND E.OrganizationId = ".$org_id ." AND E.Shift = S.Id AND S.TimeIn < '$time'  AND E.archive = 1   group By EmployeeId");
			$count=$query->num_rows();
			}
			else
			{
			$query = $this->db->query("Select A.Id FROM AttendanceMaster A,EmployeeMaster E where A.AttendanceDate = '".$range."' And A.AttendanceStatus in (2,7) AND E.Id=A.EmployeeId AND E.archive = 1 and A.OrganizationId = ".$org_id );
			$count=$query->num_rows();
			}
			
			$count1=$count+$count1;
		  }	
		  
			$data ['absentee'] = $count1;
			$data['label1'] = 'Absent:'.$count1;
			 
			$query = $this->db->query("SELECT A.Id FROM  AttendanceMaster  A ,ShiftMaster S,EmployeeMaster E  WHERE A.ShiftId = S.Id AND A.OrganizationId = S.OrganizationId AND A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) AND A.AttendanceDate between '$startdate' and '$enddate' AND A.OrganizationId = '$org_id' AND  A.TimeIn != '00:00:00' AND  E.Id = A.EmployeeId AND E.OrganizationId = A.OrganizationId AND E.Is_Delete = 0 And S.shifttype!=3 order by A.TimeIn");
			 
			  $count=$query->num_rows();
			   $data['label2'] = 'Latecomers:'.$count;
			  $data ['latecomer'] = $count;



			 $query = $this->db->query("SELECT A.Id FROM  AttendanceMaster  A ,ShiftMaster S,EmployeeMaster E  WHERE A.ShiftId=S.Id AND A.OrganizationId = S.OrganizationId AND (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) AND A.AttendanceDate between '$startdate' and '$enddate' AND A.OrganizationId = '$org_id'  AND  A.TimeOut != '00:00:00' AND  A.OrganizationId = E.OrganizationId AND A.EmployeeId = E.Id AND E.Is_Delete =0 And S.shifttype!=3");
			// ECHO $this->db->last_query();
			 
			  $count=$query->num_rows();
			   $data['label3'] = 'Earlyleaver:'.$count;
			  $data ['earlyleaver'] = $count;
			  $res[] = $data;
			 return json_encode($res);
		}
		
		
				// get last 7 days Absent by sohan
	  public function DailyAbsentEmployee_new()
	  {
		   
			$res  = array();
			$org_id = $_SESSION['orgid'];
			$zone=getTimeZone($org_id);
            date_default_timezone_set($zone);
            $date = date("Y-m-d");			
			//$query = $this->db->query("select DISTINCT(A.AttendanceDate) from AttendanceMaster A ,EmployeeMaster E where  A.OrganizationId = '$org_id' AND  E.Id = A.EmployeeId AND A.OrganizationId = E.OrganizationId and archive=1 AND E.Is_Delete = 0  ORDER BY A.AttendanceDate Desc LIMIT 8");

            $query = $this->db->query("SELECT `AttendanceDate` FROM AttendanceMaster WHERE `OrganizationId`='$org_id' GROUP BY `AttendanceDate` ORDER BY `AttendanceDate` DESC LIMIT 30");
			/* var_dump($this->db->last_query());
			die; */

			foreach($query->result() as $row)
			{ 
			    $data = array();
				$date1 = $row->AttendanceDate;
				$data['label'] = date('M d', strtotime($date1));
				 
				$query1 = $this->db->query("SELECT Id as absentemp from AttendanceMaster where AttendanceDate = '$date1' AND OrganizationId = '$org_id' AND  AttendanceStatus in (2,7)");
				$data['y'] = $this->db->affected_rows();
				//var_dump($data['y']);
				$res[] = $data;	
			}
			return json_encode($res);
	  }
	  public function updatePassword(){
			 $id = $_SESSION['id'];
			 $cpassword = encrypt(isset($_REQUEST['cpassword'])?$_REQUEST['cpassword'] : '');
			/* var_dump('cpassword');
			 die();*/
			 $npassword = encrypt(isset($_REQUEST['npassword'])?$_REQUEST['npassword'] : '');
			 $newpass = isset($_REQUEST['npassword'])?$_REQUEST['npassword'] : '';
			 $rtpassword =encrypt(isset($_REQUEST['rtpassword'])?$_REQUEST['rtpassword']: '');
			$query = $this->db->query("select * from admin_login where password='$cpassword' and id = $id");
			$result = $query->num_rows();
			if($result>0){
				$query1 = $this->db->query("update admin_login set password='$rtpassword' where id = $id");
				if($query1>0){
				$message = '<p>Dear '.$_SESSION['name'].'</p>
                     <p>Your Password for ubiAttendance Web Admin Panel has been changed successfully. ubiAttendance Team</p>
					 <p><b>Your New Pawword : '.$newpass.'</b></p>';
                 // $_SESSION['Email'] 
                 sendEmail_new($_SESSION['Email'],'New Password',$message,'');				 
				sendEmail_new('sohan@ubitechsolutions.com','New Password',$message,'');	
				// sohan
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $sesid =$_SESSION['id'];
           // $sesname =$_SESSION['name'];
            
            
            
           $module = "Settings";
           $actionperformed = " <b>Web Admin Panel password </b> has been <b>Changed</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$sesid));


					
				
				echo 1;
				}
			}else{
				echo 0;
			}
			
		}
        

}

?>
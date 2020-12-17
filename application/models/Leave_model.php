<?php

class Leave_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    //include(APPPATH."PhpMailer/class.phpmailer.php");
  }


  public function Onleavereport($postData = Null)
  {
    $orgid = $_SESSION['orgid'];
    $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
    $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
    $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
    $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
    $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
    $res = array();
    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    $today = date('Y-m-d');
    $time = date("H:i:s");
    //$today='2019-02-28';
    $q1 = '';
    if ($shiftid != 0) {
      $q1 .= " AND A.ShiftId='$shiftid' ";
    }
    if ($desgid != 0) {
      $q1 .= " AND  A.Desg_id = '$desgid'";
    }
    if ($deprtid != 0) {
      $q1 .= " AND A.Dept_id='$deprtid' ";
    }
    if ($emplid != 0) {
      $q1 .= " AND A.EmployeeId = '$emplid'";
    }


    $startdate = "";
    $enddate = "";
    $res = array();
    $response = array();
    if ($date == '') {
      $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
      //echo $datestatus;
      if ($datestatus == 1) {
        // $enddate=date('Y-m-d');//,(strtotime ( "-1 day",strtotime(date('Y-m-d'))) ));
        $enddate = date('Y-m-d');
        //echo  $enddate;
        $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
        // echo  $startdate;
        // echo $startdate.'-'.$enddate;
        // exit();
      } else {
        $enddate = date("Y-m-d");
        $startdate = date("Y-m-d");
      }
    }


    if ($date != '') {
      $arr = explode('-', trim($date));
      $enddate = date('Y-m-d', strtotime($arr[1]));
      $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
    }
    $begin = new DateTime($startdate);
    $interval = new DateInterval('P1D'); // 1 Day
    $realEnd = new DateTime($enddate);
    $realEnd->add($interval);
    $dateRange = new DatePeriod($begin, $interval, $realEnd);
    $range = "";
    //set time zone
    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    $todate = date('Y-m-d');
    //date_default_timezone_set ($zname);
    $time = date("H:i:s");
    $i = 0;


    //$range = $date->format('Y-m-d');
    $query = "";
    //print_r($range);
    //var_dump($range);
    if ($date == '') {
      $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
      $range = "";
      //$datestatus = '';
      if ($datestatus == 1) {

        $enddate = date("Y-m-d");
        $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
        $begin = new DateTime($startdate);
        $interval = new DateInterval('P1D'); // 1 Day
        $realEnd = new DateTime($enddate);
        $realEnd->add($interval);
        $dateRange = new DatePeriod($begin, $interval, $realEnd);
        foreach ($dateRange as $date) {
          $dt = $date->format('Y-m-d');
          if ($range == "")
            $range = "'" . $date->format('Y-m-d') . "'";
          else
            $range .= ",'" . $date->format('Y-m-d') . "'";
        }
      } else {
        $enddate = date("Y-m-d");
        $range = "'" . date('Y-m-d') . "'";
      }


      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $searchValue = $postData['search']['value'];
      // $searchByName = $postData['searchByName'];

      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; //asc or desc



      $searchQuery = "";

      if ($searchValue != '') {
        $searchQuery = "  And (E.FirstName like '%" . $searchValue . "%') ";
      }

      $query = $this->db->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `EmployeeMaster` E,AppliedLeave L WHERE E.id = L.EmployeeId and L.ApprovalStatus=2 and L.Date = '$today' and L.`OrganizationId`='$orgid'")->result();
      $totalRecords = $query[0]->allcount;

      //var_dump($this->db->last_query());
      if ($searchQuery != '')
        $query = $this->db->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `EmployeeMaster` E,AppliedLeave L WHERE E.id = L.EmployeeId and L.ApprovalStatus=2 and L.Date = '$today' and L.`OrganizationId`='$orgid' $searchQuery")->result();
      $totalRecordwithFilter = $query[0]->allcount;


      $query = $this->db->query("SELECT E.`Id`,E.`Shift` as ShiftId,E.`Department`as Dept_id,E.`Designation` as Desg_id,L.Reason,L.Date as Date1,L.EmployeeId FROM `EmployeeMaster` E,AppliedLeave L WHERE E.id = L.EmployeeId and L.ApprovalStatus=2 and L.Date = '$today' and L.`OrganizationId`='$orgid' $searchQuery Limit $start,$rowperpage");
    } else {
      $arr = explode('-', trim($date));
      $end = date('Y-m-d', strtotime($arr[1]));
      $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));


      $begin = new DateTime($strt);
      $interval = new DateInterval('P1D'); // 1 Day
      $realEnd = new DateTime($end);
      $realEnd->add($interval);
      $dateRange = new DatePeriod($begin, $interval, $realEnd);
      $range = "";
      foreach ($dateRange as $date) {
        $dt = $date->format('Y-m-d');
        if ($range == "")
          $range = "'" . $date->format('Y-m-d') . "'";
        else
          $range .= ",'" . $date->format('Y-m-d') . "'";
      }

      $rangedate = $range;


      if ($rangedate == "") {
        $rangedate = 1;
      }

      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $searchValue = $postData['search']['value'];
      // $searchByName = $postData['searchByName'];

      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; //asc or desc



      $searchQuery = "";

      if ($searchValue != '') {
        $searchQuery = "  And (E.FirstName like '%" . $searchValue . "%') ";
      }

      $query = $this->db->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `AttendanceMaster` A, AppliedLeave L WHERE L.EmployeeId=A.EmployeeId and A.`OrganizationId`= $orgid and  A.`AttendanceStatus`= 6 And  A.AttendanceDate IN( " . $range . ") $q1  Order by A.`AttendanceDate` desc ")->result();
      $totalRecords = $query[0]->allcount;


      if ($searchQuery != '')
        $query = $this->db->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `AttendanceMaster` A, AppliedLeave L,EmployeeMaster E WHERE E.Id=A.EmployeeId AND L.EmployeeId=A.EmployeeId and A.`OrganizationId`= $orgid and  A.`AttendanceStatus`= 6 And  A.AttendanceDate IN( " . $range . ") $q1 $searchQuery ")->result();
      $totalRecordwithFilter = $query[0]->allcount;

      //var_dump($this->db->last_query());

      $query = $this->db->query("SELECT A.`EmployeeId`,A.`AttendanceStatus`,A.`ShiftId`,A.`Dept_id`,A.`Desg_id`,A.`AttendanceDate` as Date1,L.Reason FROM `AttendanceMaster` A, AppliedLeave L,EmployeeMaster E WHERE E.Id=A.EmployeeId AND L.EmployeeId=A.EmployeeId and A.`OrganizationId`= $orgid and  A.`AttendanceStatus`= 6 And  A.AttendanceDate IN( " . $range . ") $q1 $searchQuery GROUP by L.`LeaveId` Order by A.`AttendanceDate` desc Limit $start,$rowperpage ");

      //var_dump($this->db->last_query());

    }
    foreach ($query->result() as $row) {
      $data = array();
      $name  = ucwords(getEmpName($row->EmployeeId));
      $data['Name'] = $name;
      //$data['date']= date('M d,Y',strtotime($row->AttendanceDate));
      $data['desg'] = ucwords(getDesignation($row->Desg_id));
      $Tio = getShiftTimes($row->ShiftId);
      $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
      $data['depart'] = ucwords(getDepartment($row->Dept_id));
      $data['date'] = $row->Date1;
      $data['reason'] = $row->Reason;
      $res[] = $data;
    }




    //$d['data']=$res; 
    $this->db->close();     //$query->result();
    //echo json_encode($d);
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $res
    );
    return $response;
  }

  public function leavereport($postData = Null)
  {

    $orgid = $_SESSION['orgid'];
    $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
    $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : '';
    $currentDate = date('Y-m-d');
    //$date='';

    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; // Rows display per page
    $searchValue = $postData['search']['value'];
    $columnIndex = $postData['order'][0]['column']; // Column index
    $columnName = $postData['columns'][$columnIndex]['data']; // 
    $columnSortOrder = $postData['order'][0]['dir']; //asc or desc	


    $q = "";


    if ($date == '') {
      $enddate = date("Y-m-d");
      $startdate = date('Y-m-d', (strtotime('0 day', strtotime(date('Y-m-d')))));

      $q = " AND  `Date` BETWEEN  '$startdate' AND '$enddate' ";
    } else {
      $enddate = date('Y-m-d');
      $startdate = date('Y-m-d');
    }
    if ($status != 0) {

      $q .= " AND `ApprovalStatus`='$status' ";
    }

    if ($emplid != 0) {
      $q .= " AND `EmployeeId`='$emplid' ";
    }
    if ($date != '') {
      $arr = explode('-', trim($date));
      $end = date('Y-m-d', strtotime($arr[1]));
      $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
      $q .= " AND `Date` BETWEEN  '$strt' AND '$end' ";
    }

    //for utilized count for a using a fiscal start AND End
    $f_start = '';
    $f_end = '';
    $sql = $this->db->query("SELECT fiscal_start, fiscal_end FROM Organization WHERE Id='$orgid'");
    if ($row = $sql->row()) {
      $f_start = date("m/d", strtotime($row->fiscal_start));
      $f_end = date("m/d", strtotime($row->fiscal_end));
    }

    ////fiscal start/////
    $dateofjoin = date("m/d/Y", strtotime($currentDate));
    $fiscalstart = date("m/d", strtotime($f_start));
    $fiscalstartmon = substr($fiscalstart, 0, 2);
    $dateofjoinmon = substr($dateofjoin, 0, 2);
    $fiscalstartdate = substr($fiscalstart, 3, 2);
    $joindate = substr($dateofjoin, 3, 2);


    if ($dateofjoinmon < $fiscalstartmon) {
      $doj = date("Y", strtotime($dateofjoin)) - 1;
      $fiscalstartdate = $fiscalstart . "/" . $doj;
    } elseif ($dateofjoinmon == $fiscalstartmon && $joindate < $fiscalstartdate) {
      $doj = date("Y", strtotime($dateofjoin)) - 1;
      $fiscalstartdate = $fiscalstart . "/" . $doj;
    } elseif ($dateofjoinmon == $fiscalstartmon && $joindate == $fiscalstartdate) {
      $doj = date("Y", strtotime($dateofjoin));
      $fiscalstartdate = $fiscalstart . "/" . $doj;
    } else {
      $doj = date("Y", strtotime($dateofjoin));
      $fiscalstartdate = $fiscalstart . "/" . $doj;
    }
    ////fiscal start////


    ////fiscal end////
    $dateofjoin = date("m/d/Y", strtotime($currentDate));
    $fiscalend = date("m/d", strtotime($f_end));
    $fiscalendmon = substr($fiscalend, 0, 2);
    $dateofjoinmon = substr($dateofjoin, 0, 2);
    $fiscalenddate = substr($fiscalend, 3, 2);
    $joindate = substr($dateofjoin, 3, 2);

    if ($dateofjoinmon > $fiscalendmon) {
      $doj = date("Y", strtotime($dateofjoin)) + 1;
      $fiscalenddate = $fiscalend . "/" . $doj;
    } elseif ($dateofjoinmon == $fiscalendmon && $joindate > $fiscalenddate) {
      $doj = date("Y", strtotime($dateofjoin)) + 1;
      $fiscalenddate = $fiscalend . "/" . $doj;
    } elseif ($dateofjoinmon == $fiscalendmon && $joindate == $fiscalenddate) {
      $doj = date("Y", strtotime($dateofjoin));
      $fiscalenddate = $fiscalend . "/" . $doj;
    } else {
      $doj = date("Y", strtotime($dateofjoin));
      $fiscalenddate = $fiscalend . "/" . $doj;
    }
    ////fiscal end////

    $startdate = date('Y-m-d', strtotime($fiscalstartdate));
    $enddate = date('Y-m-d', strtotime($fiscalenddate));



    //for utilized count for a using a fiscal start AND End
    $searchQuery = "";

    if ($searchValue != '') {
      $searchQuery = "  And (EM.FirstName like '%" . $searchValue . "%') ";
    }

    $query = $this->db->query("SELECT COUNT(LeaveId) as allcount, MIN(`Date`) as fromdate,MAX(`Date`) as todate, `ApprovalStatus`, `Remarks`, ApproverName, `OrganizationId`, `CreatedDate`, `HalfDayStatus`, `LeaveId` from AppliedLeave   where  OrganizationId ='$orgid' $q Group By LeaveId");
    $totalRecords = $query->num_rows();

    if ($searchQuery != '')
      $query = $this->db->query("SELECT COUNT(LeaveId) as allcount, MIN(`Date`) as fromdate,MAX(`Date`) as todate,EM.FirstName from AppliedLeave, EmployeeMaster EM   where AppliedLeave.OrganizationId ='$orgid' $q and AppliedLeave.EmployeeId=EM.Id $searchQuery Group By LeaveId");
    $totalRecordwithFilter = $query->num_rows();
    /*  var_dump($totalRecordwithFilter);
				 die(); */


    $sql = "SELECT `EmployeeId`, count(LeaveId) as NoofLeaves,Reason, MIN(`Date`) as fromdate,MAX(`Date`) as todate,ApprovalStatus, Remarks, ApproverName,AppliedLeave.OrganizationId, AppliedLeave.CreatedDate,  HalfDayStatus, LeaveId from AppliedLeave,EmployeeMaster EM   where AppliedLeave.EmployeeId=EM.Id And AppliedLeave.OrganizationId ='$orgid' $q $searchQuery Group By LeaveId Desc Limit $start,$rowperpage";
       // var_dump($this->db->last_query());
      // 	 die(); 
     //echo $sql;


    $query = $this->db->query($sql);

    $d = array();
    $res = array();
    foreach ($query->result() as $row) {
      $data = array();
      $data['LeaveId'] = $row->LeaveId;
      $name = ucwords(getEmpName($row->EmployeeId));

      $data['test'] = '<td></td>';


      $data['Name'] =  $name;


      // } 

      $data['date'] = date('M d,Y', strtotime($row->CreatedDate));

      // $data['to']=$row->locationin;
      $data['status'] = $row->ApprovalStatus;

      //echo $row->ApproverName;

      if ($row->ApproverName != '') {
        $data['ApproverId'] = $row->ApproverName;
      } else {
        $data['ApproverId'] = '-';
      }

      //$data['reason']=$row->Reason;
      if ($row->Reason == '') {
        $data['reason'] = "Not given";
      } else {
        $data['reason'] = $row->Reason;
      }
      $data['status'] = $row->ApprovalStatus;


      if ($data['status'] == 1) {
        $data['status'] = '<button type="button" style="background-color:#F2994A ; color:white; cursor: not-allowed;border-radius:100px;font-size: 13px;padding:1px;width:110px;
        pointer-events: none;" class="btn" >&nbsp&nbspApplied&nbsp&nbsp</button>';
      } elseif ($data['status'] == 2) {
        $data['status'] = '<button type="button"  style="background-color:#27AE60; color:white;border-radius:100px;font-size: 13px;padding:1px;width:110px;" class="btn" disabled>Approved</button>';
      } elseif ($data['status'] == 3) {
        $data['status'] = '<button type="button"  style="background-color:red; color:white;border-radius:100px;font-size: 13px;padding:1px;width:110px;" class="btn" disabled>Reject</button>';
      } elseif ($data['status'] == 4) {
        $data['status'] = '<button type="button"  style="background-color:red; color:white;border-radius:100px;font-size: 13px;padding:1px;width:110px;" class="btn" disabled>Withdraw</button>';
      }
      $data['from'] = $row->fromdate;
      $leaveday = $row->HalfDayStatus;
      if ($leaveday == 1) {
        $data['leaveday'] = 0.5;
      } else {
        $data['leaveday'] = 1;
      }
      $data['remarks'] = $row->Remarks;

      $data['ToDate'] = $row->todate;

      // $date1=date_create($data['from']);
      // $dateadd = date_add($date1,date_interval_create_from_date_string($NoofLeaves." days"));
      // $date3 = $dateadd->format('Y-m-d');                      
      // $data['ToDate']= $date3;


      // // var_dump($data['ToDate']);
      // // var_dump($data['from']);
      // // var_dump($row->LeaveId);
      // die;
      // action
      $data['ApprovalStatus'] = '';
      if ($row->ApprovalStatus == 1) {
        $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;"><i class="leaveapprove" data-toggle="modal" data-target="#ApproveLeave"   data-id="' . $row->LeaveId . '"
                    data-leavename="' . $row->EmployeeId . '"  data-leavedate="' . $row->fromdate . '"  title="Approve Leave" >

                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5556 3.00031C17.8182 2.73766 18.13 2.52932 18.4732 2.38718C18.8164 2.24503 19.1842 2.17188 19.5556 2.17188C19.927 2.17187 20.2948 2.24503 20.638 2.38718C20.9812 2.52932 21.293 2.73766 21.5556 3.00031C21.8183 3.26296 22.0266 3.57476 22.1688 3.91793C22.3109 4.26109 22.3841 4.62889 22.3841 5.00033C22.3841 5.37177 22.3109 5.73957 22.1688 6.08273C22.0266 6.42589 21.8183 6.7377 21.5556 7.00035L8.0555 20.5005L2.55545 22.0005L4.05546 16.5004L17.5556 3.00031Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></i>
</svg>


                    </a>';
        //echo "hello";
        //$data['action']='hii';

      } elseif ($row->ApprovalStatus == 3) {
        $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
      } elseif ($row->ApprovalStatus == 4) {
        $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-ccw"><polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path></svg>';
      } else {
        $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
      }



 
     



      $query11 = $this->db->query("SELECT O.entitled_leave,EM.Id,EM.DOJ,EM.entitledleave,EM.FirstName FROM `Organization` O,EmployeeMaster EM WHERE O.Id='$orgid' AND EM.OrganizationId='$orgid' AND EM.Is_delete=0 AND EM.DOJ!='0000-00-00' AND  EM.archive=1 AND EM.Id=$row->EmployeeId $searchQuery GROUP BY EM.FirstName $columnSortOrder Limit $start,$rowperpage");
      //var_dump($this->db->last_query());


      foreach ($query11->result() as $row) {

        $query32 = $this->db->query("select SUM(CASE WHEN(`HalfDayStatus`=1) THEN 0.5 ELSE 1 END) as balcount from AppliedLeave where EmployeeId = $row->Id  and (ApprovalStatus = 2 OR ApprovalStatus = 1) And Date BETWEEN '$startdate' And '$enddate'")->result();
        //$count = $this->db->affected_rows();
        foreach($query32 as $row32)
        {

        
       
        if($row32->balcount=='')
        {
        $count=0;
        }
        else
        {
        $count=$row32->balcount;          
        }
       
   }

        $data['doj'] = date('d M,Y', strtotime($row->DOJ));
        //var_dump($data['doj']);	
        //die;		  
        	
			$data['name']=$row->FirstName;
			$data['org_entitledleave']=$row->entitled_leave;
      $data['emp_entitledleave']=$row->entitledleave;
      


			
			if($data['org_entitledleave']==$data['emp_entitledleave']){
				
				$data['entitledleave']=$row->entitled_leave;
				
      }
      if($data['emp_entitledleave']==""){
				
				$data['entitledleave']=$row->entitled_leave;
				
			}else{
				$data['entitledleave']=$row->entitledleave;
			}

			$data['utilized'] = $count;
			// $data['balanceleave'] = $data['entitledleave'] - $data['utilized'];

			// var_dump($data['utilized']);


			
			$data['entitledleave']=$row->entitledleave;
			//var_dump($data['entitledleave']);

			// $data['balanceleave']=getBalanceLeaveCount($orgid,$row->Id);
			// var_dump($data['balanceleave']);
			// die;
			$data['allocated']=intval(getBalanceLeave($orgid,$row->Id,$date));
			if($data['allocated']==""){
				$data['allocated']='0';
			}else{
				$data['allocated']=intval(getBalanceLeave($orgid, $row->Id));
			}
			
			if($data['allocated']-$data['utilized']==""){
				$data['balanceleave']="0";
			}else{
				$data['balanceleave']=$data['allocated']-$data['utilized'];
			}
      }


      $res[] = $data;
    }
    //$d['data']=$res;
    $this->db->close();
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $res
    );
    //echo json_encode($d);
    return $response;
  }
  public function approveleave()
  {

    $orgid = $_SESSION['orgid'];
    $approverName = $_SESSION['name'];
    //echo $approverName;
    //exit();
    $lid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    // $name="dev";
    // die();
    $name = isset($_REQUEST['leavename']) ? $_REQUEST['leavename'] : 0;
    $leave_date = isset($_REQUEST['leavedate']) ? $_REQUEST['leavedate'] : 0;
    $leave_remark = isset($_REQUEST['leaveremark']) ? $_REQUEST['leaveremark'] : 0;

    //echo $leave_remark;
    // die();
    $newname = getEmpName($name);
    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    $del_att = date("M d,Y", strtotime($leave_date));
    $ModifiedDate = date("y-m-d H:i:s");


    $sql = "UPDATE `AppliedLeave` set ModifiedDate=?, ApprovalStatus=2,
           Remarks='$leave_remark', ApproverName='$approverName' where ApprovalStatus=1 and  LeaveId=? and OrganizationId=?";
    $query = $this->db->query($sql, array($ModifiedDate, $lid, $orgid));
    $result =  $this->db->affected_rows();
    //var_dump($this->db->last_query());
    //die();
    if ($result > 0) {
      $date = date("y-m-d H:i:s");
      $orgid = $_SESSION['orgid'];
      $id = $_SESSION['id'];
      $module = "Attendance";
      $actionperformed = "Leave has been <b>approved</b> for <b>" . $newname . "</b> of <b>" . $del_att . "</b>";
      $activityby = 1;
      $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));

      $check = $this->db->affected_rows();
      if ($check > 0) {
        echo 1;
      }
    } else {
      echo 2;
    }
    //var_dump($this->db->last_query());



  }
public function getBalanceLeave($orgid,$empid){
		// $ci =& get_instance();
		// $ci->load->database();

		// echo $orgid;
		// echo $empid;
		// exit();

		$query = $this->db->query("SELECT E.FirstName,E.entitledleave,E.DOJ,O.fiscal_end,O.entitled_leave FROM `EmployeeMaster` E, Organization O where E.OrganizationId=O.Id And E.Id='$empid' And E.OrganizationId='$orgid'");
		$res=array();
	    foreach ($query->result() as $row)
		{
			if($row->entitledleave == '' || $row->entitledleave == '0')
			{
			$entitledleave=$row->entitled_leave;	
			}
			else
			{
			$entitledleave=$row->entitledleave;	
			}

            $dateofjoin=date("m/d/Y", strtotime($row->DOJ));
            $fiscalend=date("m/d", strtotime($row->fiscal_end));
            $fiscalendmon=substr($fiscalend, 0,2);
            $dateofjoinmon=substr($dateofjoin, 0,2);
            $fiscalenddate=substr($fiscalend, 3,2);
            $joindate=substr($dateofjoin, 3,2);

            // echo $dateofjoinmon;

            // echo $fiscalendmon;
            //    die;
            // echo $fiscalenddate;
            // echo $joindate;
            // die;

            $cur_date=$dateofjoin;
            if($dateofjoinmon > $fiscalendmon)
            {
            	// echo "hello1";
            	$doj=date("Y", strtotime($dateofjoin)) + 1;
            	$fiscalenddata = $fiscalend."/".$doj;
            }
            elseif($dateofjoinmon == $fiscalendmon && $joindate > $fiscalenddate)
            {
            	// echo "hello";
            	
            	$doj=date("Y", strtotime($dateofjoin)) + 1;
            	$fiscalenddata = $fiscalend."/".$doj;
            }
            elseif($dateofjoinmon == $fiscalendmon && $joindate == $fiscalenddate)
            {
            	// echo "hiii";
            	

            	$doj=date("Y", strtotime($dateofjoin));
            	$fiscalenddata = $fiscalend."/".$doj;
            }
            else
            {
            	// echo "hialo";
            	
            	$doj=date("Y", strtotime($dateofjoin));
            	$fiscalenddata = $fiscalend."/".$doj;
            }

            // die;
		    // Calculating the difference in timestamps 
		    $diff = strtotime($fiscalenddata) - strtotime($cur_date); 
		      
		      // echo $fiscalenddata;
		      // echo "<br>";
		      // echo $cur_date;
		      //   echo "<br>";
		      // echo $diff;
		      // die;
		    // 1 day = 24 hours 
		    // 24 * 60 * 60 = 86400 seconds 
		    $Difference_In_Days=abs(round($diff / 86400)); 
		    //echo $Difference_In_Days;
		    $bal1=(intval($entitledleave)/12);
		    $bal2=($Difference_In_Days/30.4167);

		    //  echo $bal1;
		    //  echo  "<br>";
		    // echo $bal2;
		    // die;
		    $balanceleave=$bal1*$bal2;
		    // echo $balanceleave;
		    // die;
            return strstr($balanceleave,'.',true);
	    }
    }

  public function rejectleave()
  {

    $orgid = $_SESSION['orgid'];
    $approverName = $_SESSION['name'];
    $lid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    // echo $lid;
    // die();
    $name = isset($_REQUEST['leavename']) ? $_REQUEST['leavename'] : 0;
    $newname = getEmpName($name);
    $leave_date = isset($_REQUEST['leavedate']) ? $_REQUEST['leavedate'] : 0;
    $leave_remark = isset($_REQUEST['leaveremark']) ? $_REQUEST['leaveremark'] : 0;

    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    $del_att = date("M d,Y", strtotime($leave_date));
    $ModifiedDate = date("y-m-d H:i:s");


    $sql = "UPDATE `AppliedLeave` set ModifiedDate=?, ApprovalStatus=3, Remarks='$leave_remark', ApproverName='$approverName' where ApprovalStatus=1 and  LeaveId=? and OrganizationId=?";
    $query = $this->db->query($sql, array($ModifiedDate, $lid, $orgid));
    $result =  $this->db->affected_rows();
    // var_dump($result);
    // die();
    if ($result > 0) {
      $date = date("y-m-d H:i:s");
      $orgid = $_SESSION['orgid'];
      $id = $_SESSION['id'];
      $module = "Attendance";
      $actionperformed = "Leave has been <b>rejected</b> for <b>" . $newname . "</b> of <b>" . $del_att . "</b>";
      $activityby = 1;
      $query = $this->db->query("INSERT INTO ActivityHistoryMaster(LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));

      $check = $this->db->affected_rows();
      if ($check > 0) {
        echo 1;
      }
    } else {
      echo 2;
    }
  }
}

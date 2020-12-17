<?php

class Face_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getFaceIDs() {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;


        $query = $this->db->query("SELECT E.FirstName,E.Id,P.profileimage,P.PersistedFaceId,P.PersonId,L.PersonGroupId  FROM EmployeeMaster E , Persisted_Face P,licence_ubiattendance L WHERE E.OrganizationId=? And P.PersistedFaceId !='0' AND E.Id=P.EmployeeId AND L.OrganizationId = ?", array($orgid, $orgid));


        $d = array();
        $res = array();

        foreach ($query->result() as $row) {
            $data = array();

            $name = ucwords(getEmpName($row->Id));
            if ($name != "") {
                $data['name'] = $name;

                $data['faceid'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->Id . '" data-enimage="' . $row->profileimage . '"><img src="' . $row->profileimage . '" style="width:60px!important;height:80px;object-fit:cover;" /> </i>';

                $status = $row->PersistedFaceId;
                $data['action'] = "-";
                //$data['status'] = "-";
                if ($status != '0') {
                    $data['action'] = /*  '<u><a href="#" ><span class="sts123" data-toggle="modal" title=""
                              data-absent ="'.$row->Id.'"
                              data-aname="'.$name.'"
                              data-pfid="'.$row->PersistedFaceId.'"
                              data-perid="'.$row->PersonId.'"
                              data-pergroupid="'.$row->PersonGroupId.'"
                              data-target="#disapprove">Disapprove</span></a></u>'; */


                            '<div class="dropdown">
                                 
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:2.5rem; border-radius:5px;   margin-left:-25%">
                                  
								  <li style="font-size:0.8rem; margin-top:-6%; padding-top:6%; height:37px;" class="sts123 hover" data-toggle="modal" title=""
             data-absent ="' . $row->Id . '"
             data-aname="' . $name . '" 
             data-pfid="' . $row->PersistedFaceId . '"
             data-perid="' . $row->PersonId . '"
             data-pergroupid="' . $row->PersonGroupId . '"
             data-target="#disapprove"><i class="fa fa-thumbs-down" style="font-size:16px; margin-left:12px;" data-toggle="modal" title=""
             data-absent ="' . $row->Id . '"
             data-aname="' . $name . '" 
             data-pfid="' . $row->PersistedFaceId . '"
             data-perid="' . $row->PersonId . '"
             data-pergroupid="' . $row->PersonGroupId . '"
             data-target="#disapprove" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Disapprove</a></li>
                                   
                                  </ul>
                                </div>';
                }

                $res[] = $data;
            }
        }

        $d['data'] = $res;
        //print_r($d['data']);
        $this->db->close();   //$query->result();
        echo json_encode($d);
        return false;
    }

    public function disapprove1() {
        $orgid = $_SESSION['orgid'];
        $absent = isset($_REQUEST['absent']) ? $_REQUEST['absent'] : "";
        $perfaceid = isset($_REQUEST['perfaceid']) ? $_REQUEST['perfaceid'] : "";
        $pergroupid = isset($_REQUEST['pergroupid']) ? $_REQUEST['pergroupid'] : "";
        $perid = isset($_REQUEST['perid']) ? $_REQUEST['perid'] : "";

        $empid = $absent;

        /////// Push Notifications and Mail ////////////////

        $FaceIdDisapprovedPerm = getNotificationPermission($orgid, 'FaceIdDisapproved');
        $orgname = "";

        $sql = "SELECT  *  FROM `Organization` WHERE `Id`=" . $orgid;

        $query1 = $this->db->query($sql);
        if ($row = $query1->result()) {
            $orgname = $row[0]->Name;
        }
        $orgTopic = ucwords($orgname);
        $orgTopic = preg_replace("/[^a-zA-Z]+/", "", $orgTopic);
        $orgTopic = str_replace(".", "", $orgTopic . $orgid);

        $sql2 = "SELECT  *  FROM `EmployeeMaster` WHERE `Id`=" . $empid;

        $query2 = $this->db->query($sql2);
        if ($row2 = $query2->result()) {
            $name = $row2[0]->FirstName;
        }

        $string1 = $name;
        $string1 = ucwords($string1);

        $string1 = str_replace('', '-', $string1); // Replaces all spaces with hyphens.

        $string1 = preg_replace('/[^A-Za-z0-9\-]/', '', $string1);

        $EmployeeTopic = $string1 . $empid;

        /////// Push Notifications and Mail ////////////////
        // echo $perfaceid;
        // echo $pergroupid;
        // echo $perid;
        // exit();

        face_delete($perfaceid, $perid, $pergroupid);
        persongrouptrain($pergroupid);

        $query = $this->db->query("UPDATE Persisted_Face SET profileimage = '0' ,PersistedFaceId = '0' where EmployeeId=? ", array($absent));
        /////// Push Notifications and Mail ////////////////

        if ($FaceIdDisapprovedPerm == 9 || $FaceIdDisapprovedPerm == 11 || $FaceIdDisapprovedPerm == 13 || $FaceIdDisapprovedPerm == 15) {
            sendManualPushNotification("('$orgTopic' in topics) && ('admin' in topics)", "$name Face ID has been Disapproved", "");
        }
        if ($FaceIdDisapprovedPerm == 10 || $FaceIdDisapprovedPerm == 11 || $FaceIdDisapprovedPerm == 14 || $FaceIdDisapprovedPerm == 15) {
            sendManualPushNotification("('$EmployeeTopic' in topics)", "Your Face ID has been Disapproved", "");
        }
        if ($FaceIdDisapprovedPerm == 5 || $FaceIdDisapprovedPerm == 13 || $FaceIdDisapprovedPerm == 7 || $FaceIdDisapprovedPerm == 7) {

            $message = '<html>
					<head>
					<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
					<meta name=Generator content="Microsoft Word 12 (filtered)">
					<style>
					</style>

					</head>

					<body lang=EN-US link=blue vlink=purple>

					<hr>
					<br>
					' . $name . ' Face ID has been Disapproved
					</br>
					</hr>


					</body>

					</html>
                    ';
            $headers = '';
            $subject = "Face ID Disapproved";
            //Trace(" empid-".$emp_id." orgid-".$orgid." email=".$email."  Message body- ".$message);
            //sendEmail_new($email, $subject, $message, $headers);
            sendEmail_new('nitin@ubitechsolutions.com', $subject, $message, $headers);
            sendEmail_new('shashank@ubitechsolutions.com', $subject, $message, $headers);
        }
        /////// Push Notifications and Mail ////////////////
        //var_dump($this->db->last_query()); 

        $res = $this->db->affected_rows();
        $this->db->close();
        echo $res;
    }

    public function getSuspiciousSelfie() {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
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
        if ($deptId != 0) {
            $q1 .= " AND A.Dept_id='$deptId' ";
        }
        if ($emplid != 0) {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }
        if ($date == '') {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            if ($datestatus == 7) {
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('-6 day', strtotime($enddate)));
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
                // $enddate=date("Y-m-d");
                //$startdate=date("Y-m-d");
            }

            $query = $this->db->query("SELECT A.Id , A.EmployeeId, A.AttendanceDate ,E.FirstName, A.AttendanceStatus,A.EntryImage,A.ExitImage,E.EmployeeCode,A.PersistedFaceTimeIn,A.PersistedFaceTimeOut,A.timeindate,A.timeoutdate,A.TimeIn,A.TimeOut,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.TimeInConfidence,A.TimeOutConfidence FROM AttendanceMaster A ,EmployeeMaster E,Persisted_Face P WHERE A.OrganizationId=? And A.AttendanceDate IN ( " . $range . " ) And A.AttendanceStatus = 1 and P.EmployeeId= E.Id and A.EmployeeId=E.Id ", array($orgid));
            //var_dump($this->db->last_query());
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
            //echo $range;
            $rangedate = $range;

            //var_dump($rangedate);


            if ($rangedate == "") {
                $rangedate = 1;
            }
            $query = $this->db->query("SELECT A.Id as Id, A.EmployeeId, A.AttendanceDate ,E.FirstName, A.AttendanceStatus,A.EntryImage,A.ExitImage,E.EmployeeCode,A.PersistedFaceTimeIn,A.PersistedFaceTimeOut,A.timeindate,A.timeoutdate,A.TimeIn,A.TimeOut,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.TimeInConfidence,A.TimeOutConfidence FROM AttendanceMaster A ,EmployeeMaster E, Persisted_Face P WHERE A.OrganizationId=? And A.AttendanceDate IN ( " . $range . " ) And A.AttendanceStatus = 1 and P.EmployeeId= E.Id and A.EmployeeId=E.Id ", array($orgid));
            //var_dump($this->db->last_query());
        }

        $d = array();
        $res = array();
        //$currentdatestatus = 0;
        foreach ($query->result() as $row) {
            $data = array();
            if ($row->SuspiciousTimeInStatus == 1) {

                $data = array();

                $name = ucwords(getEmpName($row->EmployeeId));
                if ($name != "") {
                    $data['name'] = $name;
                    if ($row->PersistedFaceTimeIn) {
                        $data['faceid'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->PersistedFaceTimeIn . '"><img src="' . $row->PersistedFaceTimeIn . '" style="width:60px!important;height:80px;object-fit:cover;" /> </i>';
                    } else {
                        $data['faceid'] = '<img src="http://ubiattendance.ubihrm.com/assets/img/avatar.png" style="width:60px!important;height:80px;object-fit:cover;" />';
                    }



                    $data['suspicious'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->EntryImage . '"><img src="' . $row->EntryImage . '"  style="width:60px!important;height:80px;object-fit:cover; "  /></i>';
                    $data['match'] = round(($row->TimeInConfidence) * 100);

                    if ($row->timeindate == '0000-00-00') {
                        $data['event'] = '-';
                    } else {

                        $data['event'] = date("\\T\\i\\m\\e \\I\\n \\o\\n  d-m-Y", strtotime($row->timeindate));
                    }


                    $status = $row->AttendanceStatus;
                    $data['action'] = "-";
                    //$data['status'] = "-";
                    if ($status == 1) {
                        $data['action'] =    '<div class="dropdown">
                                 
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:2.5rem; border-radius:5px;   margin-left:-25%">
                                  <li style="font-size:0.8rem; margin-top:-6%; padding-top:6%; height:37px;" class="sts123 hover" data-toggle="modal" title=""
      data-absent ="' . $row->Id . '" 
       data-empname="' . $data['name'] . '"
         data-sts="' . $status . '"
           data-attdate="' . $row->AttendanceDate . '"
             data-target="#disapprove" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Disapprove</a></li>
                                   
                                  </ul>
                                </div>';
                                
//                                '<u><a href="#" ><span class="sts123" data-toggle="modal" title=""
//           data-absent ="' . $row->Id . '" 
//           data-empname="' . $data['name'] . '"
//           data-sts="' . $status . '"
//           data-attdate="' . $row->AttendanceDate . '"
//           
//          data-target="#disapprove">Disapprove</span></a></u>';
                    }


                    $res[] = $data;
                }
            }

            if ($row->SuspiciousTimeOutStatus == 1) {

                $data = array();

                $name = ucwords(getEmpName($row->EmployeeId));
                if ($name != "") {
                    $data['name'] = $name;
                    if ($row->PersistedFaceTimeOut) {
                        $data['faceid'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->PersistedFaceTimeOut . '"><img src="' . $row->PersistedFaceTimeOut . '" style="width:60px!important;height:80px;object-fit:cover;" /> </i>';
                    } else {
                        $data['faceid'] = '<img src="http://ubiattendance.ubihrm.com/assets/img/avatar.png" style="width:60px!important;height:80px;object-fit:cover;" />';
                    }


                    $data['suspicious'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->ExitImage . '"><img src="' . $row->ExitImage . '"  style="width:60px!important;height:80px;object-fit:cover; "  /></i>';
                    $data['match'] = round(($row->TimeOutConfidence) * 100);

                    if ($row->timeoutdate == '0000-00-00') {
                        $data['event'] = '-';
                    } else {
                        $data['event'] = date("\\T\\i\\m\\e \\o\\u\\t \\o\\n  d-m-Y", strtotime($row->timeoutdate));
                    }


                    $status = $row->AttendanceStatus;
                    $data['action'] = "-";
                    //$data['status'] = "-";
                    if ($status == 1) {
                        $data['action'] = '<div class="dropdown">
                                 
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:2.5rem; border-radius:5px;   margin-left:-25%">
                                  <li style="font-size:0.8rem; margin-top:-6%; padding-top:6%; height:37px;" class="sts123 hover" data-toggle="modal" title=""
      data-absent ="' . $row->Id . '" 
       data-empname="' . $data['name'] . '"
         data-sts="' . $status . '"
           data-attdate="' . $row->AttendanceDate . '"
             data-target="#disapprove" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Disapprove</a></li>
                                   
                                  </ul>
                                </div>';

                                
//                                '<u><a href="#" ><span class="sts123" data-toggle="modal" title=""
//           data-absent ="' . $row->Id . '" 
//           data-empname="' . $data['name'] . '"
//           data-sts="' . $status . '"
//           data-attdate="' . $row->AttendanceDate . '"
//           
//          data-target="#disapprove">Disapprove</span></a></u>';
                    }
                    /* else if($status == 2)
                      {
                      $data['action'] =  "<span style='color:green' >Approved</span>";
                      } */


                    $res[] = $data;
                }
            }
        }
        $d['data'] = $res;
        // print_r($d['data']);
        $this->db->close();   //$query->result();
        echo json_encode($d);
        return false;
    }

    public function disapprove() {
        $orgid = $_SESSION['orgid'];
        //$emplid=isset($_REQUEST['empl'])?$_REQUEST['empl']:0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        //var_dump($date);
        $absent = isset($_REQUEST['absent']) ? $_REQUEST['absent'] : "";
        $sts = isset($_REQUEST['sts']) ? $_REQUEST['sts'] : "";
        $device = 'Suspicious Selfie';
        //var_dump($absent);

        $query = $this->db->query("UPDATE AttendanceMaster SET AttendanceStatus = 2,device=? where Id=? ", array($device, $absent));
        //var_dump($this->db->last_query()); 

        $res = $this->db->affected_rows();
        $this->db->close();
        echo $res;
    }

}

?>
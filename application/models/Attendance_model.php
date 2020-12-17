<?php
class Attendance_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //include(APPPATH."PhpMailer/class.phpmailer.php");
        include(APPPATH . "s3.php");
    }

    public function getAttendances__new()
    {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $attendanceid = isset($_REQUEST['attendance']) ? $_REQUEST['attendance'] : 0;

        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        $time = date("H:i:s");
        //$today='2019-02-28';
        $q1 = '';
        if ($shiftid != 0)
        {
            $q1 .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deptId != 0)
        {
            $q1 .= " AND A.Dept_id='$deptId' ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }
        if ($attendanceid == 1)
        {
            $q1 .= " AND A.AttendanceStatus = '1'";
        }
        else if ($attendanceid == 2)
        {
            $q1 .= " AND A.AttendanceStatus =='2'";
        }
        $currentdatestatus = 0;
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            // echo $datestatus;
            // exit();
            $range = "";
            if ($datestatus == 1)
            {
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                // echo $startdate.'-'.$enddate;
                // exit();
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                //$realEnd = new DateTime($enddate); //current and yester date data fetch
                $realEnd = new DateTime($startdate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }

            }
            else
            {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
                // $enddate=date("Y-m-d");
                //$startdate=date("Y-m-d");
                
            }

            $query = $this
                ->db
                ->query("SELECT C.TimeInGrace,A.TimeInGeoFence,A.TimeOutGeoFence,A.FakeTimeOutTimeStatus,A.timeincity,A.timeoutcity, A.FakeTimeInTimeStatus, A.FakeLocationStatusTimeIn,A.FakeLocationStatusTimeOut,A.Id ,A.timeoutdate as timeoutdate, A.EmployeeId,C.TimeIn as ctin ,A.TimeInEditStatus,A.TimeOutEditStatus ,C.TimeOut as ctout, A.AttendanceDate  , A.AttendanceStatus,A.Wo_H_Hd, A.TimeIn, A.TimeOut, A.ShiftId,C.shifttype, (CASE WHEN (C.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,C.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (C.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as Overtime,SUBSTRING_INDEX(EntryImage, '.com/', -1) as EntryImage, SUBSTRING_INDEX(ExitImage, '.com/', -1) as ExitImage,A.device,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.SuspiciousDeviceTimeInStatus,A.SuspiciousDeviceTimeOutStatus,E.EmployeeCode,E.MultipletimeStatus,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId,E.ImageName,E.Gender,A.timeindate,A.timeoutdate,A.TimeInAppVersion,A.TimeOutAppVersion,A.Platform,(select disapp_sts from Disapprove_approve where Disapprove_approve.AttendanceId=A.Id And Disapprove_approve.disapp_sts=1 AND Disapprove_approve.AttendanceDate IN (" . $range . ") limit 1) as Disapprove_status, TIME_FORMAT(SEC_TO_TIME((ROUND(TIME_TO_SEC(A.TotalLoggedHours)/60)) * 60), '%H:%i:%s') AS loggedhours FROM AttendanceMaster A, ShiftMaster C ,EmployeeMaster E WHERE A.OrganizationId=?   And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN ( " . $range . " ) and A.EmployeeId=E.Id  And E.Is_Delete=0", array(
                $orgid,
                $orgid
            ));
            //var_dump($this->db->last_query());
            
        }
        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }

            $rangedate = $range;

            if ($rangedate == "")
            {
                $rangedate = 1;
            }

            if (strpos($rangedate, $today) !== false)
            {
                $currentdatestatus = 1;
            }
            //between '$strt' and '$end'
            // echo  $rangedate;
            //, TIMEDIFF(CONCAT(A.timeoutdate,'   ',A.TimeOut) , CONCAT(A.AttendanceDate,'  ',A.TimeIn)) as Officehours
            $query = $this
                ->db
                ->query("SELECT C.TimeInGrace,A.TimeInGeoFence,A.TimeOutGeoFence,A.FakeTimeOutTimeStatus,A.FakeTimeInTimeStatus,A.timeincity,A.timeoutcity, A.FakeLocationStatusTimeIn,A.FakeLocationStatusTimeOut,A.Id,A.EmployeeId,C.TimeIn as ctin ,C.TimeOut as ctout, A.AttendanceDate ,A.TimeInEditStatus,A.TimeOutEditStatus,A.timeoutdate as timeoutdate , A.AttendanceStatus,A.Wo_H_Hd, A.TimeIn, A.TimeOut, A.ShiftId, (CASE WHEN (C.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,C.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (C.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as Overtime,SUBSTRING_INDEX(EntryImage, '.com/', -1) as EntryImage, SUBSTRING_INDEX(ExitImage, '.com/', -1) as ExitImage,A.device,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.SuspiciousDeviceTimeInStatus,A.SuspiciousDeviceTimeOutStatus,E.EmployeeCode,E.MultipletimeStatus,C.shifttype,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId,E.ImageName,E.Gender,A.timeindate,A.timeoutdate,A.TimeInAppVersion,A.TimeOutAppVersion,A.Platform,(select disapp_sts from Disapprove_approve where Disapprove_approve.AttendanceId=A.Id And Disapprove_approve.disapp_sts=1 AND Disapprove_approve.AttendanceDate IN (" . $rangedate . ") limit 1) as Disapprove_status, TIME_FORMAT(SEC_TO_TIME((ROUND(TIME_TO_SEC(A.TotalLoggedHours)/60)) * 60), '%H:%i:%s') AS loggedhours  FROM AttendanceMaster A, ShiftMaster C,EmployeeMaster E  WHERE A.OrganizationId=?   And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN ( " . $rangedate . " )  and A.EmployeeId=E.Id  And E.Is_Delete=0", array(
                $orgid,
                $orgid
            ));
            // var_dump($this->db->last_query());
            //die;
            
        }
        $d = array();
        $res = array();
        $empid = '';
        $attdate = '';
        $eid = '';
        $checkindate = '';
        foreach ($query->result() as $row)
        {
            $data = array();
            $empid = $row->EmployeeId;
            $attdate = $row->AttendanceDate;

            $query1 = $this
                ->db
                ->query("SELECT * FROM `checkin_master` WHERE `EmployeeId`=? And `OrganizationId`=? And `date`=?", array(
                $empid,
                $orgid,
                $attdate
            ));
            if ($row1 = $query1->row())
            {
                $eid = $row1->EmployeeId;
                $checkindate = $row1->date;
            }

            $name = ucwords(getEmpName($row->EmployeeId));

            if ($row->AttendanceDate == $today) //fetch data today
            
            {
                $currentdatestatus = 1;

            }

           $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

            if ($name != "")
            {
                $data['name'] = '<span style="color:#000000;">'.$name.'</span>' . '<br>' . $data['shift'];

                if ($row->ImageName)
                {
                    $data['proimage'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->ImageName . '"><img src="' . IMGURL3 . "uploads/$orgid/" . $row->ImageName . '" style="width:42px!important;height:42px!important;border-radius:50%" /> </i>';
                }
                else
                {
                    if ($row->Gender == 1)
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/male.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                    else
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/female.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                }

                $data['code'] = $row->EmployeeCode;
                $data['date'] = date("M d,Y", strtotime($row->AttendanceDate));
                $timeinstas = '';
                $timeoutstas = '';
                if ($row->TimeInEditStatus == 1) $timeinstas = ' Edited';
                if ($row->TimeOutEditStatus == 1) $timeoutstas = ' Edited';

                if ($row->FakeTimeInTimeStatus == 1)
                {
                    $data['fti'] = '<div title="TimeIn recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
                }
                else
                {
                    $data['fti'] = "";
                }

                $data['tif'] = "";

                if ($row->FakeTimeInTimeStatus == 0)
                {
                    $data['tif'] = substr($row->TimeIn, 0, 5) . "<br><small style='color:red' >$timeinstas</small>";
                }
                else
                {
                    $data['tif'] = substr($row->TimeIn, 0, 5) . ' ' . $data['fti'];
                }

                if ($row->FakeTimeOutTimeStatus == 1)
                {

                    $data['fto'] = '<div title="TimeOut recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
                }

                else
                {
                    $data['fto'] = "";
                }

                $data['tof'] = "";

                if ($row->FakeTimeOutTimeStatus == 0)
                {
                    $data['tof'] = substr($row->TimeOut, 0, 5) . "<br><small style='color:red' >$timeoutstas</small>";
                }
                else
                {
                    $data['tof'] = substr($row->TimeOut, 0, 5) . ' ' . $data['fto'];
                }

                if ($row->TimeInAppVersion != '')
                {
                    $data['TimeInAppVersion'] = $row->TimeInAppVersion;
                    //echo $data['TimeInAppVersion']."hello";
                    
                }
                else
                {
                    $data['TimeInAppVersion'] = '--';
                }
                if ($row->TimeOutAppVersion != '')
                {
                    $data['TimeOutAppVersion'] = $row->TimeOutAppVersion;
                    //echo $data['TimeOutAppVersion']."hii";
                    
                }
                else
                {
                    $data['TimeOutAppVersion'] = '--';
                }
                if ($row->Platform != '')
                {
                    $data['Platform'] = $row->Platform;
                }
                else
                {
                    $data['Platform'] = '--';
                }
                if ($row->timeindate == '0000-00-00')
                {
                    $data['timeindate'] = '-';
                }
                else
                {
                    $data['timeindate'] = date("d-m-Y", strtotime($row->timeindate));
                }

                if ($row->timeoutdate == '0000-00-00')
                {
                    $data['timeoutdate'] = '-';
                }
                else
                {
                    $data['timeoutdate'] = date("d-m-Y", strtotime($row->timeoutdate));
                }
                $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                $data['ot'] = $row->Overtime;
                if ($row->EntryImage == '')
                {
                    $data['entryimg'] = '<img src="' . URL . "../assets/image/user_png.png" . '"  style="width:70px!important;height:90px!important;object-fit: cover; "  />';
                }
                else
                {
                    $data['entryimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage=""><img src="' . getPresignedURL(ATTENDANCEBUCKET, $row->EntryImage) . '"  style="width:70px!important;height:90px!important;object-fit: cover; "  /></i>';
                }

                if ($row->ExitImage == '')
                {
                    $data['exitimg'] ='<img src="' . URL . "../assets/image/user_png.png" . '"  style="width:70px!important;height:90px!important;object-fit: cover; "  />';;
                }
                else
                {
                    $data['exitimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-eximage=""><img src="' . getPresignedURL(ATTENDANCEBUCKET, $row->ExitImage) . '" style="width:70px!important;height:90px;object-fit:cover; "/></i>';
                }

             //  $data['test'] = '<i class="fa fa-map-marker fa-2x" style="margin-left:0.5rem;color:#80CF7F;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->checkInLoc . '" data-toggle="tooltip" data-placement="top"></i>';
                $data['test'] = '<img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;" data-target="#locationmodal" data-toggle="modal" title="' . $row->checkInLoc . '" data-toggle="tooltip" data-placement="top" />';


                $data['ti'] = substr($row->TimeIn, 0, 5) . '<br>' . $data['test'];

               // $data['test1'] = '<i class="fa fa-map-marker fa-2x" style="margin-left:0.5rem;color:#FF0000;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->CheckOutLoc . '" data-toggle="tooltip" data-placement="top"></i></button>';
                  $data['test1'] = '<img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;" data-target="#locationmodal" data-toggle="modal" title="' . $row->CheckOutLoc . '"  data-toggle="tooltip" data-placement="top" />';

                $data['to'] = substr($row->TimeOut, 0, 5) . '<br>' . $data['test1'];
                $data['positionlin'] = "";
                $data['positionout'] = "";
                $osl = "";
                $outsideloc = "";
                $fakeloc = "";

                if ($row->areaId != 0 && ($row->latit_in != 0.0 && $row->longi_in != 0.0 && $row->latit_out != 0.0 && $row->longi_out != 0.0) || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }

                        if ($row->FakeLocationStatusTimeOut == 1)
                        {
                            $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }
                        else
                        {
                            if ($d2 <= $radius)
                            {
                                $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && ($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out == 0.0 && $row->longi_out == 0.0) && $row->device != 'Auto Time Out' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'mobile offline')
                {

                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if (($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out != 0.0 && $row->longi_out != 0.0))
                        {
                            if ($row->FakeLocationStatusTimeIn == 1)
                            {
                                $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d1 <= $radius)
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";

                                }
                            }

                            if ($row->FakeLocationStatusTimeOut == 1)
                            {
                                $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d2 <= $radius)
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";
                                }
                            }
                        }

                        elseif (($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out == 0.0 && $row->longi_out == 0.0))
                        {
                            if ($row->FakeLocationStatusTimeIn == 1)
                            {
                                $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d1 <= $radius)
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";

                                }
                            }
                        }
                        elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0) && ($row->latit_out != 0.0 && $row->longi_out != 0.0))
                        {
                            if ($row->FakeLocationStatusTimeOut == 1)
                            {
                                $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d2 <= $radius)
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";
                                }
                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'Auto Time Out' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'TimeOut marked by Admin' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }
                    }

                }

                if ($row->areaId != 0 && $row->device == 'Auto Time Out')
                {
                    if ($row->FakeLocationStatusTimeIn == 1)
                    {
                        $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeInGeoFence != 'Not Calculated.' && $row->TimeInGeoFence != '')
                        {
                            if ($row->TimeInGeoFence == 'Within Geofence' || $row->TimeInGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                            }
                            else
                            {
                                // $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }

                }

                elseif ($row->areaId != 0)
                {

                    if ($row->FakeLocationStatusTimeIn == 1)
                    {
                        $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeInGeoFence != 'Not Calculated.' && $row->TimeInGeoFence != '')
                        {
                            if ($row->TimeInGeoFence == 'Within Geofence' || $row->TimeInGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                            }
                            else
                            {
                                // $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }

                    if ($row->FakeLocationStatusTimeOut == 1)
                    {
                        $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeOutGeoFence != 'Not Calculated.' && $row->TimeOutGeoFence != '')
                        {
                            if ($row->TimeOutGeoFence == 'Within Geofence' || $row->TimeOutGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeOutGeoFence.'</div>';
                                $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {

                                // $data['positionout']= '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeOutGeoFence.'</div>';
                                $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }
                }

                if ($row->latit_in == '0.0')
                {
                    // $data['chiloc']=$row->checkInLoc != ''?'<span style="font-size:11px;" title="'.$row->checkInLoc.'"><a href="#">'.$row->checkInLoc.'</a></span>':'-';
                    $data['chiloc'] = $row->checkInLoc != '' ? '<span style="font-size:11px;" title="Location permissions were denied."><a href="#">Location permissions were denied.</a></span>' : '-';
                }
                else
                {

                    if ($row->checkInLoc != "" && $row->checkInLoc == "Location not fetched.")
                    {
                        $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . encode5t($row->checkInLoc) . '"><a style="font-size:11px;" title="' . $row->latit_in . ' , ' . $row->longi_in . '">' . $row->latit_in . ' , ' . $row->longi_in . $data['positionlin'] . '</a></span>';
                    }

                    else
                    {
                        if ($row->checkInLoc == "" || $row->checkInLoc == "Location not fetched.")
                        {
                            $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" ><a style="font-size:11px;"  title="' . $row->latit_in . ' , ' . $row->longi_in . '">' . $row->latit_in . ' , ' . $row->longi_in . $data['positionlin'] . '</a></span>';
                        }
                        else
                        {
                            $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . encode5t($row->checkInLoc) . '"><a style="font-size:11px;"  title="' . $row->checkInLoc . '">' . $row->checkInLoc . $data['positionlin'] . '</a></span>';
                        }
                    }
                }

                if ($row->longi_out == '0.0')
                {
                    // $data['choloc']=$row->CheckOutLoc!=''?'<span style="font-size:11px;" title="'.$row->CheckOutLoc.'"><a href="#">'.$row->CheckOutLoc.'</a></span>':'-';
                    $data['choloc'] = $row->CheckOutLoc != '' ? '<span style="font-size:11px;" title="Location permissions were denied."><a href="#">Location permissions were denied.</a></span>' : '-';
                }
                else
                {
                    if ($row->CheckOutLoc == "" || $row->CheckOutLoc == "Location not fetched.")
                    {
                        $data['choloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" ><a style="font-size:11px;" title="' . $row->latit_out . ' , ' . $row->longi_out . '">' . $row->latit_out . ' , ' . $row->longi_out . $data['positionout'] . '</a>';
                    }
                    else
                    {
                        $data['choloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="' . encode5t($row->CheckOutLoc) . '">
<a style="font-size:11px;"  title="' . $row->CheckOutLoc . '">' . $row->CheckOutLoc . $data['positionout'] . '</a></span>';
                    }
                }

                // if($row->latit_in =='0.0')
                // $data['chiloc']=$row->checkInLoc != ''?'<span style="font-size:11px;" title="'.$row->checkInLoc.'"><a href="#">'.$row->checkInLoc.'</a></span>':'-';
                // else
                // if($row->checkInLoc != "" && $row->checkInLoc =="Location not fetched.")
                // $data['chiloc']='<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="'.encode5t($row->checkInLoc).'"><a style="font-size:11px;" title="'.$row->checkInLoc.'">'.$row->checkInLoc .$data['positionlin'].'</a></span>';
                

                // else
                // if($row->checkInLoc =="" || $row->checkInLoc =="Location not fetched.")
                // {
                // $data['chiloc']='<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" ><a style="font-size:11px;"  title="'.$row->latit_in.' , '.$row->longi_in.'">'.$row->latit_in.' , '.$row->longi_in .$data['positionlin'].'</a></span>';
                // }
                //    else
                // $data['chiloc']='<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="'.encode5t($row->checkInLoc).'"><a style="font-size:11px;"  title="'.$row->checkInLoc.'">'.$row->checkInLoc.$data['positionlin'].'</a></span>';
                // if($row->longi_out=='0.0')
                // $data['choloc']=$row->CheckOutLoc!=''?'<span style="font-size:11px;" title="'.$row->CheckOutLoc.'"><a href="#">'.$row->CheckOutLoc.'</a></span>':'-';
                // else
                // if($row->CheckOutLoc == "" || $row->CheckOutLoc =="Location not fetched.")
                // $data['choloc']='<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'" >
                // <a style="font-size:11px;" title="'.$row->latit_out.' , '.$row->longi_out.'">'.$row->latit_out.' , '.$row->longi_out .$data['positionout'].'</a>';
                // else
                // $data['choloc']='<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'" data-checkinloc="'.encode5t($row->CheckOutLoc).'">
                // <a style="font-size:11px;"  title="'.$row->CheckOutLoc.'">'.$row->CheckOutLoc .$data['positionout'].'</a></span>';
                $data['wh'] = '-';
                if ($row->AttendanceStatus == 4)
                {
                    $attn = '<div style="background-color:green;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px; width:90%;font-size:13px;" title="Halfday">Halfday</div>';
                }
                elseif ($row->Wo_H_Hd == 13 and $row->AttendanceStatus == 1)
                {
                    $attn = '<div style="background-color:#F2C94C;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="Half Present">Half Present</div>';
                }

                else
                {
                    $attn = $row->AttendanceStatus != 2 ? '<div style="padding: 5px 20px 5px 20px;background-color: #219653;text-align:center;color:white; border-radius:100px;width:90%;font-size:13px;" title="Present">present</div>' : '<div style=" background-color:#f15353;text-align:center;color:white;padding-left:6px;
padding-right:6px;border-radius:100px;width:90%;font-size:13px;" title="Absent">Absent</div>';
                }

                if ($row->AttendanceStatus == 7 && $row->Wo_H_Hd == 11)
                {
                    $attn = '<div style="background-color:#FFAC33;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="WeekOff">WeekOff</div>';
                }
                else if ($row->AttendanceStatus == 7 && $row->Wo_H_Hd == 12)
                {
                    $attn = '<div style="background-color:#FFAC33;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="Holiday">Holiday</div>';
                }

                $goings = '';
                $overtime = '';
                $coming = '';

                if ($row->AttendanceStatus != 2 && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 11 || $row->Wo_H_Hd != 12))
                {
                    $tm = comings($row->ShiftId, $row->TimeIn, $row->timeindate, $row->AttendanceDate, $row->TimeInGrace);
                    //echo $tm;
                    if (substr($tm, 0, 5) != '00:00') $coming = strpos($tm, '-') !== 0 ? '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Late Coming By ' . substr($tm, 0, 5) . ' Hr">LC</span>' : '<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Early Coming By ' . substr(str_replace("-", "", $tm) , 0, 5) . ' Hr">EC</span>';

                    if ($row->TimeOut != '00:00:00')
                    {
                        //$data['wh'] = substr($row->Officehours,0,5);
                        $tm = goings1($row->ShiftId, $row->shifttype, $row->TimeOut, $row->AttendanceStatus, $row->timeindate, $row->timeoutdate, $row->AttendanceDate);
                        if (substr($tm, 0, 5) != '00:00') $goings = strpos($tm, '-') !== 0 ? '<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Late Leaving By ' . substr($tm, 0, 5) . ' Hr">LL</span>' : '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Early Leaving By ' . substr(str_replace("-", "", $tm) , 0, 5) . ' Hr">EL</span>';

                        //calculate work hours
                        if (strtotime($row->ctin) < strtotime($row->ctout))
                        {
                            if (strtotime($row->TimeIn) < strtotime($row->TimeOut))
                            {

                                // $a = new DateTime($row->TimeIn);
                                // $b = new DateTime($row->TimeOut);
                                //  //echo  $a;
                                // // echo  $b;
                                // $interval1 = $a->diff($b);
                                // $a = new DateTime($interval1->format("%H:%I"));
                                //$data['wh']= substr($row->loggedhours,0,5);
                                //$newloggedhours=decimal_to_time(round(time_to_decimal($row->loggedhours)));
                                $data['wh'] = substr($row->loggedhours, 0, 5);
                                // print_r($data['wh']);
                                // echo $name;
                                // echo "<br/>";
                                
                            }
                            else
                            {
                                $time = "24:00:00";
                                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                                $data['wh'] = date("H:i", strtotime($time) - $secs);
                            }
                        }
                        else
                        {

                            $a = new DateTime($row->TimeIn);
                            $b = new DateTime($row->TimeOut);
                            if (strtotime($row->TimeIn) <= strtotime($row->TimeOut))
                            {
                                // $interval1 = $a->diff($b);
                                // $a = new DateTime($interval1->format("%H:%I"));
                                // $data['wh']=$interval1->format("%H:%I");
                                $data['wh'] = substr($row->loggedhours, 0, 5);
                            }
                            else
                            {
                                $time = "24:00:00";
                                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                                $data['wh'] = date("H:i", strtotime($time) - $secs);
                            }
                        }

                    }

                    if ($row->AttendanceStatus == 4)
                    {
                        $overtime = '';
                    }
                    elseif ($row->AttendanceStatus == 1 && $row->TimeOut == '00:00:00')
                    {
                        $overtime = '';
                    }
                    else
                    {
                        if ($row->Overtime != '00:00:00')
                        {

                            $overtime = strpos($row->Overtime, '-') !== 0 ? '<span style="background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Over Time By ' . substr($row->Overtime, 0, 5) . ' Hr">OT</span>' : '<span style=" background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Under Time By ' . substr(str_replace("-", "", $row->Overtime) , 0, 5) . ' Hr">UT</span>';
                        }
                    }

                }

                $Suspiciousdevice = "";
                $Suspiciousselfie = "";

                if ($row->SuspiciousDeviceTimeInStatus == 1 || $row->SuspiciousDeviceTimeOutStatus == 1)
                {
                    $sd = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Suspicious Device">SD</span>';

                    $Suspiciousdevice = "Suspicious Device";

                    // from here
                    //     $dis_icon = '<a href="#"><i class="sts123 fa fa-ban" style="font-size:20px;color:purple;" data-toggle="modal" title="Disapprove" data-target="#disapprove"
                    

                    // data-absent ="'.$row->Id.'"
                    //  data-empname="'.$data['name'].'"
                    //                  data-sts="'.$status.'"
                    //      data-attdate="'.$row->AttendanceDate.'";
                    // ></i></a>';
                    
                }
                else
                {
                    $sd = '';
                    $Suspiciousdevice = "";
                    //$dis_icon='';
                    
                }
                if ($row->SuspiciousTimeInStatus == 1 || $row->SuspiciousTimeOutStatus == 1)
                {
                    $ss = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Suspicious Selfie">SS</span>';

                    $Suspiciousselfie = "Suspicious Selfie";

                    // from here
                    //     $dis_icon = '<a href="#"><i class="sts123 fa fa-ban" style="font-size:20px;color:purple;" data-toggle="modal" title="Disapprove" data-target="#disapprove"
                    

                    // data-absent ="'.$row->Id.'"
                    //  data-empname="'.$data['name'].'"
                    //                  data-sts="'.$status.'"
                    //      data-attdate="'.$row->AttendanceDate.'";
                    // ></i></a>';
                    
                }
                else
                {
                    $ss = '';
                    $Suspiciousselfie = "";
                    //$dis_icon='';
                    
                }
                $data['tymincity'] = $row->timeincity;
                /* if($data['tymincity']==""){
                $data['tymincity']="-";
                }else{
                $data['tymincity']=$row->timeincity;
                } */
                $data['tymoutcity'] = $row->timeoutcity;
                /* if($data['tymoutcity']==""){
                $data['tymoutcity']="-";
                }else{
                $data['tymoutcity']=$row->timeoutcity;
                } */

                // $ofti=$data['positionlin'];
                // $ofto=$data['positionlin'];
                // $osl="";
                // if($ofti=="Within the Location" || $ofto=="Within the Location")
                // {
                // $osl='';
                // }
                // else
                // {
                // $osl='<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside the location">OL</span>';
                // }
                // echo $ofti;
                // echo $ofto;
                // die();
                // exit();
                

                if ($row->Disapprove_status == '')
                {
                    $app = '';
                }
                elseif ($row->Disapprove_status == 0 && $row->AttendanceStatus == 2)
                {
                    $app = '';
                }
                else
                {
                    $app = '<span style="background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Approved">AP</span>';
                }

                $data['device'] = $row->device;

                $data['shifttype'] = "";
                if ($row->shifttype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($row->shifttype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                if ($row->shifttype == 3)
                {
                    $data['shift'] = '<span title="Shift Hours: ' . getFlexiShift($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

                }
                else
                {
                    $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                }

                $outsidegeo = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                $withingeo = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                if ($data['positionlin'] == $withingeo && ($row->latit_out == 0.0 && $row->longi_out == 0.0))
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0 && $row->latit_out == 0.0 && $row->longi_out == 0.0) && ($row->TimeInGeoFence == '' && $row->TimeOutGeoFence == ''))
                {

                    $osl = '';

                    $outsideloc = "";

                }

                elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0) && $data['positionout'] == $withingeo)
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif ($data['positionlin'] == $withingeo && $data['positionout'] == $withingeo)
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif ($data['positionlin'] == $withingeo && $data['positionout'] == $outsidegeo)
                {
                    //echo "hello";
                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                    $outsideloc = "Outside Geofence";
                }

                // $data['status']=$attn.' '.$coming.' '.$goings.' '.$overtime.' '.$sd.' '.$ss.' '.$osl.' '.$app;
                if ($row->shifttype == 3)
                {
                    $data['status'] = $attn;
                }
                else
                {
                    $data['status'] = $attn;
                }
                $data['timeoff'] = $this->calculatetimeoff($row->EmployeeId, $row->AttendanceDate);

                if ($data['timeoff'] != "00:00" and $data['wh'] != "-")
                {
                    $a = new DateTime($data['timeoff']);
                    $b = new DateTime($data['wh']);
                    $interval = $a->diff($b);
                    $a = new DateTime($interval->format("%H:%I"));
                    $data['wh'] = $interval->format("%H:%I");
                }

                $permis = getAddonPermission($_SESSION['orgid'], 'Addon_Delete');
                $permis1 = getAddonPermission($_SESSION['orgid'], 'Addon_Edit');

                //// flexi According to permission "$permis == 1 && $permis1 == 1" case todays ////
                if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 1 && $row->shifttype == 3 or ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="track_loc fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q3" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                        }

                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                           
                    

          <li class="t3 delete" style="height:30px;" data-toggle="modal" data-target="#delAttnew" data-aid="' . $row->Id . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" ><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;" data-aid="' . $row->Id . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" title="Delete"></i> <a href"#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

 <li class="q4" style="height:30px;"><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"    title="view"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">view</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q5" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                           

                    

          <li class="q6" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                }

                //// flexi According to permission "$permis == 1 && $permis1 == 1" case todays ////
                

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate = '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q7" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            

                    

          <li class="q8" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q9" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                           

                    

          <li class="q10" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }

                    }
                }
                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                

                //// flexi According to permission "$permis == 1 && $permis1 == 0" case todays
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 0 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q11" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                           
                    

          <li class="q12" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q13" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                          

                    

          <li class="q14" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                }

                //// flexi According to permission "$permis == 1 && $permis1 == 0" case todays ////
                

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                    

          <li class="q15" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                    

          <li class="q16" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                    }

                }

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                

                // flexi According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') == $row->AttendanceDate && $permis1 == 0 && $permis == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        //$shiftype=getShiftType($row->ShiftId);
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q17" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }

                    else
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            

                    

          <li class="q18" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }
                }

                // flexi According to permission "$permis == 1 && $permis1 == 0" case last 7 days ///
                

                //flexi According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1 && $permis == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q1" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        // }
                        
                    }
                    else
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                           

                    

          <li class="q2" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                    }
                }

                // flexi According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                

                // Condition 1 According to permission "$permis == 0 && $permis1 == 1" case last 7 days//
                

                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                             <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

                    

         

             
             </ul>
             </div> ';

                    }
                    else

                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                           

                             <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

                    

         

             
             </ul>
             </div> ';

                    }

                }

                // Condition 1 According to permission "$permis == 0 && $permis1 == 1" case last 7 days //
                

                // Condition 2 According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0 && $permis == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        //$shiftype=getShiftType($row->ShiftId);
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                              <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"  title="Disapprove"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

                    

         

             
             </ul>
             </div> ';

                    }

                    else
                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                              <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

                    

         

             
             </ul>
             </div> ';

                    }
                }

                // Condition 2 According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                // Condition 3 According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1 && $permis == 1 && $row->AttendanceStatus != 2 && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 11 || $row->Wo_H_Hd != 12))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>



                                 <li class="edit test" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


         <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

            
             </ul>
             </div> ';

                        // }
                        
                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  


                                 <li class="edit test" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


         <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

            
             </ul>
             </div> ';
                    }
                }

                // Condition 3 According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                

                // Condition 4 According to permission "$permis == 0 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0 && $permis == 0 && $row->AttendanceStatus != 2)
                {
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>
                                  </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  
                                  </ul>
             </div> ';
                    }
                }

                // Condition 4 According to permission "$permis == 0 && $permis1 == 0" case last 7 days //
                

                // Condition 5 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                elseif ($row->AttendanceStatus == 2 && $row->AttendanceDate > date('Y-m-d', strtotime('-6 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0)
                {

                    $data['action'] = '';
                }

                // Condition 5 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                // Condition 6 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 7 days //
                elseif ($row->AttendanceStatus == 2 && $row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->shifttype == 3 && $row->AttendanceDate > date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1)
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-55%">

                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttEsts"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


                                  </ul>
             </div> ';

                    }
                    else
                    {
                        if ($row->AttendanceStatus == 2 && $row->TimeIn == '00:00:00' && $row->timeindate == '0000-00-00' && $row->AttendanceDate > date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate)
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10rem; height:3rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-125%">

                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttENew"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10rem; height:3rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-125%">

                                  <li class="test track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>
                                  </ul>
             </div> ';

                        }
                    }
                }

                // Condition 6 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                // Condition 7 According to permission "$permis == 0 && $permis1 == 1" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate = '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                        data-id="' . $row->Id . '"
                                        data-aname="' . getEmpName($row->EmployeeId) . '"
                                        data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

                                        data-tidate="' . $row->timeindate . '";

                                        data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                 

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                        data-id="' . $row->Id . '"
                                        data-aname="' . getEmpName($row->EmployeeId) . '"
                                        data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

                                        data-tidate="' . $row->timeindate . '";

                                        data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                       data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
 data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                 

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                       data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
 data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }

                    }
                }
                // Condition 7 According to permission "$permis == 0 && $permis1 == 1" case todays //
                // Condition 7 According to permission "$permis == 1 && $permis1 == 0" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 0)
                {
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t7 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"   title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                 

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t8 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="1test delete" style="height:30px;" data-toggle="modal" data-target="#delAtt"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';
                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                 
                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="2test delete" style="height:30px;" data-toggle="modal" data-target="#delAtt"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';
                        }
                    }
                }

                // Condition 7 According to permission "$permis == 1 && $permis1 == 0" case todays //
                

                // Condition 8 According to permission "$permis == 1 && $permis1 == 0" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 1 && $permis1 == 0)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                   <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                  

                }

                // Condition 8 According to permission "$permis == 1 && $permis1 == 0" Attendance disapproved //
                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 1 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                   <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    

                }

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 0 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                   <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                   

                }

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                

                // Condition 10 According to permission "$permis == 1 && $permis1 == 1" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 12 || $row->Wo_H_Hd != 11) && $permis == 1 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:8.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

data-tidate="' . $row->timeindate . '";

data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t9 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

data-tidate="' . $row->timeindate . '";

data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t1 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"   title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:8.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="3test delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                 

                                  
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="4test delete" style="height:30px;" data-toggle="modal" data-target="#delAtt"   data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                }

                else
                {
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  




                                  </ul>
             </div> ';

                    }
                    else
                    {

                        if (($row->AttendanceStatus == 7 && ($row->Wo_H_Hd == 11 || $row->Wo_H_Hd == 12)) && ($attdate != date("Y-m-d")))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                                  




                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                 


                                  <li class="5test delete" style="height:30px;" data-toggle="modal" data-target="#delAttnew"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

                                  




                                  </ul>
             </div> ';

                        }
                    }
                }

                //// Condition 12 else cases ////
                $res[] = $data;
            }
        }

        $d['data'] = $res;
        //print_r($d['data']);
        $this
            ->db
            ->close(); //$query->result();
        echo json_encode($d);
        return false;
    }
    public function getAttendances__both()
    {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $attendanceid = isset($_REQUEST['attendance']) ? $_REQUEST['attendance'] : 0;

        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        $time = date("H:i:s");
        //$today='2019-02-28';
        $q1 = '';
        if ($shiftid != 0)
        {
            $q1 .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deptId != 0)
        {
            $q1 .= " AND A.Dept_id='$deptId' ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }
        if ($attendanceid == 1)
        {
            $q1 .= " AND A.AttendanceStatus = '1'";
        }
        else if ($attendanceid == 2)
        {
            $q1 .= " AND A.AttendanceStatus = '2'";
        }
        $currentdatestatus = 0;
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            if ($datestatus == 1)
            {
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                $realEnd = new DateTime($startdate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }

            }
            else
            {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
            }
            ////////to give result for all status except today's absent/////////
            $query = $this
                ->db
                ->query("SELECT A.Id,C.TimeInGrace,A.TimeInGeoFence,A.TimeOutGeoFence,A.FakeTimeOutTimeStatus,A.timeincity,A.timeoutcity, A.FakeTimeInTimeStatus, A.FakeLocationStatusTimeIn,A.FakeLocationStatusTimeOut,A.Id ,A.timeoutdate as timeoutdate, A.EmployeeId,C.TimeIn as ctin ,A.TimeInEditStatus,A.TimeOutEditStatus ,C.TimeOut as ctout, A.AttendanceDate  , A.AttendanceStatus,A.Wo_H_Hd, A.TimeIn, A.TimeOut, A.ShiftId,C.shifttype,SUBSTRING_INDEX(EntryImage, '.com/', -1) as EntryImage, SUBSTRING_INDEX(ExitImage, '.com/', -1) as ExitImage,A.device,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.SuspiciousDeviceTimeInStatus,A.SuspiciousDeviceTimeOutStatus,E.EmployeeCode,E.MultipletimeStatus,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId,E.ImageName,E.Gender,A.timeindate,A.timeoutdate,A.TimeInAppVersion,A.TimeOutAppVersion,A.Platform,(select disapp_sts from Disapprove_approve where Disapprove_approve.AttendanceId=A.Id And Disapprove_approve.disapp_sts=1 AND Disapprove_approve.AttendanceDate IN (" . $range . ") limit 1) as Disapprove_status, TIME_FORMAT(SEC_TO_TIME((ROUND(TIME_TO_SEC(A.TotalLoggedHours)/60)) * 60), '%H:%i:%s') AS loggedhours FROM AttendanceMaster A, ShiftMaster C ,EmployeeMaster E WHERE A.OrganizationId=?   And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN ( " . $range . " ) and A.EmployeeId=E.Id  And E.Is_Delete=0", array(
                $orgid,
                $orgid
            ));

        }
        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }

            $rangedate = $range;

            if ($rangedate == "")
            {
                $rangedate = 1;
            }

            if (strpos($rangedate, $today) !== false)
            {
                $currentdatestatus = 1;
            }

            /////when only at least one present show then all status show otherwise not////
            $query = $this
                ->db
                ->query("SELECT A.Id,C.TimeInGrace,A.TimeInGeoFence,A.TimeOutGeoFence,A.FakeTimeOutTimeStatus,A.FakeTimeInTimeStatus,A.timeincity,A.timeoutcity, A.FakeLocationStatusTimeIn,A.FakeLocationStatusTimeOut,A.Id,A.EmployeeId,C.TimeIn as ctin ,C.TimeOut as ctout, A.AttendanceDate ,A.TimeInEditStatus,A.TimeOutEditStatus,A.timeoutdate as timeoutdate , A.AttendanceStatus,A.Wo_H_Hd, A.TimeIn, A.TimeOut, A.ShiftId,SUBSTRING_INDEX(EntryImage, '.com/', -1) as EntryImage, SUBSTRING_INDEX(ExitImage, '.com/', -1) as ExitImage,A.device,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.SuspiciousDeviceTimeInStatus,A.SuspiciousDeviceTimeOutStatus,E.EmployeeCode,E.MultipletimeStatus,C.shifttype,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId,E.ImageName,E.Gender,A.timeindate,A.timeoutdate,A.TimeInAppVersion,A.TimeOutAppVersion,A.Platform,(select disapp_sts from Disapprove_approve where Disapprove_approve.AttendanceId=A.Id And Disapprove_approve.disapp_sts=1 AND Disapprove_approve.AttendanceDate IN (" . $rangedate . ") limit 1) as Disapprove_status, TIME_FORMAT(SEC_TO_TIME((ROUND(TIME_TO_SEC(A.TotalLoggedHours)/60)) * 60), '%H:%i:%s') AS loggedhours  FROM AttendanceMaster A, ShiftMaster C,EmployeeMaster E  WHERE A.OrganizationId=?   And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN ( " . $rangedate . " )  and A.EmployeeId=E.Id  And E.Is_Delete=0", array(
                $orgid,
                $orgid
            ));

        }
        $d = array();
        $res = array();
        $empid = '';
        $attdate = '';
        $eid = '';
        $checkindate = '';
        foreach ($query->result() as $row)
        {
            $data = array();
            $empid = $row->EmployeeId;
            $attdate = $row->AttendanceDate;

            $query1 = $this
                ->db
                ->query("SELECT * FROM `checkin_master` WHERE `EmployeeId`=? And `OrganizationId`=? And `date`=?", array(
                $empid,
                $orgid,
                $attdate
            ));
            if ($row1 = $query1->row())
            {
                $eid = $row1->EmployeeId;
                $checkindate = $row1->date;
            }
            $emp_name = getEmpName($row->EmployeeId);
            $name = ucwords($emp_name);
            $checkInLoc = encode5t($row->checkInLoc);
            $checkOutLoc = encode5t($row->CheckOutLoc);
			
            $name = ucwords($emp_name);
           
            if ($row->AttendanceDate == $today) //fetch data today
            
            {
                $currentdatestatus = 1;

            }
            $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

            if ($name != "")
            {
                $data['name'] = '<span style="color:#000000;">'.$name.'</span>' . '<br>' . $data['shift'];

                if ($row->ImageName)
                {
                    $data['proimage'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->ImageName . '"><img src="' . IMGURL3 . "uploads/$orgid/" . $row->ImageName . '" style="width:42px!important;height:42px!important;border-radius:50%" /> </i>';
                }
                else
                {
                    if ($row->Gender == 1)
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/male.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                    else
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/female.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                }

                $data['code'] = $row->EmployeeCode;
                $data['date'] = date("M d,Y", strtotime($row->AttendanceDate));
                $timeinstas = '';
                $timeoutstas = '';
                if ($row->TimeInEditStatus == 1) $timeinstas = ' Edited';
                if ($row->TimeOutEditStatus == 1) $timeoutstas = ' Edited';

                if ($row->FakeTimeInTimeStatus == 1)
                {
                    $data['fti'] = '<div title="TimeIn recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
                }
                else
                {
                    $data['fti'] = "";
                }

                $data['tif'] = "";

                if ($row->FakeTimeInTimeStatus == 0)
                {
                    $data['tif'] = substr($row->TimeIn, 0, 5) . "<br><small style='color:red' >$timeinstas</small>";
                }
                else
                {
                    $data['tif'] = substr($row->TimeIn, 0, 5) . ' ' . $data['fti'];
                }

                if ($row->FakeTimeOutTimeStatus == 1)
                {

                    $data['fto'] = '<div title="TimeOut recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
                }

                else
                {
                    $data['fto'] = "";
                }

                $data['tof'] = "";

                if ($row->FakeTimeOutTimeStatus == 0)
                {
                    $data['tof'] = substr($row->TimeOut, 0, 5) . "<br><small style='color:red' >$timeoutstas</small>";
                }
                else
                {
                    $data['tof'] = substr($row->TimeOut, 0, 5) . ' ' . $data['fto'];
                }

                if ($row->TimeInAppVersion != '')
                {
                    $data['TimeInAppVersion'] = $row->TimeInAppVersion;
                    //echo $data['TimeInAppVersion']."hello";
                    
                }
                else
                {
                    $data['TimeInAppVersion'] = '--';
                }
                if ($row->TimeOutAppVersion != '')
                {
                    $data['TimeOutAppVersion'] = $row->TimeOutAppVersion;
                    //echo $data['TimeOutAppVersion']."hii";
                    
                }
                else
                {
                    $data['TimeOutAppVersion'] = '--';
                }
                if ($row->Platform != '')
                {
                    $data['Platform'] = $row->Platform;
                }
                else
                {
                    $data['Platform'] = '--';
                }
                if ($row->timeindate == '0000-00-00')
                {
                    $data['timeindate'] = '-';
                }
                else
                {
                    $data['timeindate'] = date("d-m-Y", strtotime($row->timeindate));
                }

                if ($row->timeoutdate == '0000-00-00')
                {
                    $data['timeoutdate'] = '-';
                }
                else
                {
                    $data['timeoutdate'] = date("d-m-Y", strtotime($row->timeoutdate));
                }
                // $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                //$data['ot'] = $row->Overtime;
                if ($row->EntryImage == '')
                {
                    $data['entryimg'] = '<img src="' . URL . "../assets/image/user_png.png" . '"  style="width:70px!important;height:90px!important;object-fit: cover; "  />';
                }
                else
                {
                    $data['entryimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage=""><img src="' . getPresignedURL(ATTENDANCEBUCKET, $row->EntryImage) . '"  style="width:70px!important;height:90px!important;object-fit: cover; "  /></i>';
                }

                if ($row->ExitImage == '')
                {
                    $data['exitimg'] = '<img src="' . URL . "../assets/image/user_png.png" . '"  style="width:70px!important;height:90px!important;object-fit: cover; "  />';;
                }
                else
                {
                    $data['exitimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-eximage=""><img src="' . getPresignedURL(ATTENDANCEBUCKET, $row->ExitImage) . '" style="width:70px!important;height:90px;object-fit:cover; "/></i>';
                }

            

                $data['positionlin'] = "";
                $data['positionout'] = "";
                $osl = "";
                $outsideloc = "";
                $fakeloc = "";

                if ($row->areaId != 0 && ($row->latit_in != 0.0 && $row->longi_in != 0.0 && $row->latit_out != 0.0 && $row->longi_out != 0.0) || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';
                            }
                            else
                            {
                                $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;" title="' . $row->checkInLoc . '"/></span>';
                             

                            }
                        }

                        if ($row->FakeLocationStatusTimeOut == 1)
                        {
                            $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }
                        else
                        {
                            if ($d2 <= $radius)
                            {
                                $data['positionout'] = '<span  class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="'.$checkOutLoc.'"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->CheckOutLoc . '"/></span>';
                            }
                            else
                            {
								$data['positionout']='-';
                                //$data['positionout'] = '<span class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'" >y<img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->CheckOutLoc . '"/></span>';

                               
                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && ($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out == 0.0 && $row->longi_out == 0.0) && $row->device != 'Auto Time Out' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';
                            }
                            else
                            {
                                $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;" title="' . $row->checkInLoc . '"/></span>';

                                

                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'mobile offline')
                {

                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if (($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out != 0.0 && $row->longi_out != 0.0))
                        {
                            if ($row->FakeLocationStatusTimeIn == 1)
                            {
                                $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d1 <= $radius)
                                {
                                    $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';
                                }
                                else
                                {
                                    $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->checkInLoc . '"/></span>';

                                    

                                }
                            }

                            if ($row->FakeLocationStatusTimeOut == 1)
                            {
                                $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d2 <= $radius)
                                {
                                    $data['positionout'] = '<span  class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="'.$checkOutLoc.'"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkOutLoc . '"/></span>';
                                }
                                else
                                {
                                    $data['positionout'] = '<span class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'" data-checkinloc="'.$checkOutLoc.'"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->CheckOutLoc . '"/></span>';

                                    
                                }
                            }
                        }

                        elseif (($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out == 0.0 && $row->longi_out == 0.0))
                        {
                            if ($row->FakeLocationStatusTimeIn == 1)
                            {
                                $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d1 <= $radius)
                                {
                                    $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';
                                }
                                else
                                {
                                    $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;" title="' . $row->checkInLoc . '"/></span>';

                                 

                                }
                            }
                        }
                        elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0) && ($row->latit_out != 0.0 && $row->longi_out != 0.0))
                        {
                            if ($row->FakeLocationStatusTimeOut == 1)
                            {
                                $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d2 <= $radius)
                                {
                                    $data['positionout'] = '<span  class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="' . $checkOutLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkOutLoc . '"/></span>';
                                }
                                else
                                {
                                    $data['positionout'] = '<span class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'" data-checkinloc="'.$checkOutLoc.'"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->checkOutLoc . '"/></span>';

                                    
                                }
                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'Auto Time Out' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="'.$checkInLoc.'"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';
                            }
                            else
                            {
                                $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="'.$checkInLoc.'"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->checkInLoc . '"/></span>';

                           

                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'TimeOut marked by Admin' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';
                            }
                            else
                            {
                                $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->checkInLoc . '"/></span>';
                               

                            }
                        }
                    }

                }

                if ($row->areaId != 0 && $row->device == 'Auto Time Out')
                {
                    if ($row->FakeLocationStatusTimeIn == 1)
                    {
                        $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeInGeoFence != 'Not Calculated.' && $row->TimeInGeoFence != '')
                        {
                            if ($row->TimeInGeoFence == 'Within Geofence' || $row->TimeInGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';

                            }
                            else
                            {
                                // $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->checkInLoc . '"/></span>';

                              
                            }
                        }
                    }

                }

                elseif ($row->areaId != 0)
                {

                    if ($row->FakeLocationStatusTimeIn == 1)
                    {
                        $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeInGeoFence != 'Not Calculated.' && $row->TimeInGeoFence != '')
                        {
                            if ($row->TimeInGeoFence == 'Within Geofence' || $row->TimeInGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '"data-checkinloc="' . $checkInLoc . '" ><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';

                            }
                            else
                            {
                                // $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<span class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_in.','.$row->longi_in.'" data-latitin="'.$row->latit_in.'" data-longiin="'.$row->longi_in.'" data-checkinloc="' . $checkInLoc . '"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->checkInLoc . '"/></span>';

                             
                            }
                        }
                    }

                    if ($row->FakeLocationStatusTimeOut == 1)
                    {
                        $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeOutGeoFence != 'Not Calculated.' && $row->TimeOutGeoFence != '')
                        {
                            if ($row->TimeOutGeoFence == 'Within Geofence' || $row->TimeOutGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeOutGeoFence.'</div>';
                                $data['positionout'] = '<span  class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="' . $checkOutLoc . '"><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->CheckOutLoc . '"/></span>';
                            }
                            else
                            {

                                // $data['positionout']= '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeOutGeoFence.'</div>';
                                $data['positionout'] = '<span class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'"data-checkinloc="'.$checkOutLoc.'" ><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->CheckOutLoc . '"/></span>';
                               
                            }
                        }
                    }
                }
                 //  $data['test'] = '<i class="fa fa-map-marker fa-2x" style="margin-left:0.5rem;color:#80CF7F;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->checkInLoc . '" data-toggle="tooltip" data-placement="top"></i>';
                $data['test'] = '<img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;" data-target="#locationmodal" data-toggle="modal" title="' . $row->checkInLoc . '" data-toggle="tooltip" data-placement="top" />
                ';

                $data['truh'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '"  data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '"data-checkinloc="'.$row->checkInLoc.'" ><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->checkInLoc . '"/></span>';


                $data['ti'] = substr($row->TimeIn, 0, 5) . '<br>' .  $data['positionlin'];

               // $data['test1'] = '<i class="fa fa-map-marker fa-2x" style="margin-left:0.5rem;color:#FF0000;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->CheckOutLoc . '" data-toggle="tooltip" data-placement="top"></i></button>';
                  $data['test1'] = '<span class="test1"  data-attid="' . $row->Id . '" data-id="' . $row->EmployeeId . '" data-latit="'.$row->latit_out.','.$row->longi_out.'" data-latitin="'.$row->latit_out.'" data-longiin="'.$row->longi_out.'" data-checkinloc="'.$row->checkInLoc.'"><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;"  title="' . $row->CheckOutLoc . '"/></span>';

                $data['to'] = substr($row->TimeOut, 0, 5) . '<br>' . $data['positionout'];

                if ($row->latit_in == '0.0')
                {
                    // $data['chiloc']=$row->checkInLoc != ''?'<span style="font-size:11px;" title="'.$row->checkInLoc.'"><a href="#">'.$row->checkInLoc.'</a></span>':'-';
                    $data['chiloc'] = $row->checkInLoc != '' ? '<span style="font-size:11px;" title="Location permissions were denied."><a href="#">Location permissions were denied.</a></span>' : '-';
                }
                else
                {

                    if ($row->checkInLoc != "" && $row->checkInLoc == "Location not fetched.")
                    {
                        $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . encode5t($row->checkInLoc) . '"><a style="font-size:11px;" title="' . $row->latit_in . ' , ' . $row->longi_in . '">' . $row->latit_in . ' , ' . $row->longi_in . $data['positionlin'] . '</a></span>';
                    }

                    else
                    {
                        if ($row->checkInLoc == "" || $row->checkInLoc == "Location not fetched.")
                        {
                            $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" ><a style="font-size:11px;"  title="' . $row->latit_in . ' , ' . $row->longi_in . '">' . $row->latit_in . ' , ' . $row->longi_in . $data['positionlin'] . '</a></span>';
                        }
                        else
                        {
                            $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . encode5t($row->checkInLoc) . '"><a style="font-size:11px;"  title="' . $row->checkInLoc . '">' . $row->checkInLoc . $data['positionlin'] . '</a></span>';
                        }
                    }
                }

                if ($row->longi_out == '0.0')
                {
                    // $data['choloc']=$row->CheckOutLoc!=''?'<span style="font-size:11px;" title="'.$row->CheckOutLoc.'"><a href="#">'.$row->CheckOutLoc.'</a></span>':'-';
                    $data['choloc'] = $row->CheckOutLoc != '' ? '<span style="font-size:11px;" title="Location permissions were denied."><a href="#">Location permissions were denied.</a></span>' : '-';
                }
                else
                {
                    if ($row->CheckOutLoc == "" || $row->CheckOutLoc == "Location not fetched.")
                    {
                        $data['choloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" ><a style="font-size:11px;" title="' . $row->latit_out . ' , ' . $row->longi_out . '">' . $row->latit_out . ' , ' . $row->longi_out . $data['positionout'] . '</a>';
                    }
                    else
                    {
                        $data['choloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="' . encode5t($row->CheckOutLoc) . '">
						<a style="font-size:11px;"  title="' . $row->CheckOutLoc . '">' . $row->CheckOutLoc . $data['positionout'] . '</a></span>';
                    }
                }
                $data['wh'] = '-';
                if ($row->AttendanceStatus == 4)
                {
                    $attn = '<div style="background-color:green;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Halfday">Halfday</div>';
                }
                elseif ($row->Wo_H_Hd == 13 and $row->AttendanceStatus == 1)
                {
                    $attn = '<div style="background-color:#F2C94C;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Half Present">Half Present</div>';
                }

                else
                {

                    $attn = $row->AttendanceStatus != 2 ? '<div style="text-align:center;color:white;padding: 5px 20px 5px 20px;background-color: #219653; border-radius:100px;width:90%;font-size:13px;" title="Present">present</div>' : '<div style=" background-color:#f15353;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="Absent">Absent</div>';
                }

                if ($row->AttendanceStatus == 7 && $row->Wo_H_Hd == 11)
                {
                    $attn = '<div style="background-color:#3cdcdc;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="WeekOff">WeekOff</div>';
                }
                else if ($row->AttendanceStatus == 7 && $row->Wo_H_Hd == 12)
                {
                    $attn = '<div style="background-color:#b168d0;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="Holiday">Holiday</div>';
                }
				if($row->AttendanceStatus != 2 && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 11 || $row->Wo_H_Hd != 12))
				{
				$tm = comings($row->ShiftId,$row->TimeIn,$row->timeindate,$row->AttendanceDate,$row->TimeInGrace);  
				//echo $tm;
				if(substr($tm,0,5) != '00:00')
				$coming=strpos($tm,'-')!==0?'<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;" title="Late Coming By '.substr($tm,0,5).' Hr">LC</span>':'<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;" title="Early Coming By '.substr(str_replace("-","",$tm),0,5).' Hr">EC</span>';

				if($row->TimeOut!='00:00:00')
				{
				//$data['wh'] = substr($row->Officehours,0,5);
				$tm = goings1($row->ShiftId,$row->shifttype,$row->TimeOut,$row->AttendanceStatus,$row->timeindate,$row->timeoutdate,$row->AttendanceDate);
				if(substr($tm,0,5) != '00:00')
				$goings=strpos($tm,'-') !== 0 ?'<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;" title="Late Leaving By '.substr($tm,0,5).' Hr">LL</span>':'<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;" title="Early Leaving By '.substr(str_replace("-","",$tm),0,5).' Hr">EL</span>';

				//calculate work hours

				if(strtotime($row->ctin) < strtotime($row->ctout))
				{
				 if(strtotime($row->TimeIn) < strtotime($row->TimeOut))
				 {


				$data['wh']= substr($row->loggedhours,0,5);

				 }
				 else
				 {
				$time = "24:00:00";
				$secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
				$data['wh'] = date("H:i",strtotime($time)-$secs);
				 }
				}
				else
				{

				$a = new DateTime($row->TimeIn);
				$b = new DateTime($row->TimeOut);
				if(strtotime($row->TimeIn) <= strtotime($row->TimeOut))
				{

				$data['wh']= substr($row->loggedhours,0,5);
				}
				else
				{
				$time = "24:00:00";
				$secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
				$data['wh'] = date("H:i",strtotime($time)-$secs);
				}
				}
				   
				}




				}
                $Suspiciousdevice = "";
                $Suspiciousselfie = "";

                if ($row->SuspiciousDeviceTimeInStatus == 1 || $row->SuspiciousDeviceTimeOutStatus == 1)
                {
                    $sd = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Suspicious Device">SD</span>';

                    $Suspiciousdevice = "Suspicious Device";
                }
                else
                {
                    $sd = '';
                    $Suspiciousdevice = "";
                    //$dis_icon='';
                    
                }
                if ($row->SuspiciousTimeInStatus == 1 || $row->SuspiciousTimeOutStatus == 1)
                {
                    $ss = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Suspicious Selfie">SS</span>';

                    $Suspiciousselfie = "Suspicious Selfie";
                }
                else
                {
                    $ss = '';
                    $Suspiciousselfie = "";
                    //$dis_icon='';
                    
                }
                $data['tymincity'] = $row->timeincity;
                /* if($data['tymincity']==""){
                $data['tymincity']="-";
                }else{
                $data['tymincity']=$row->timeincity;
                } */
                $data['tymoutcity'] = $row->timeoutcity;
                if ($row->Disapprove_status == '')
                {
                    $app = '';
                }
                elseif ($row->Disapprove_status == 0 && $row->AttendanceStatus == 2)
                {
                    $app = '';
                }
                else
                {
                    $app = '<span style="background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Approved">AP</span>';
                }

                $data['device'] = $row->device;

                $data['shifttype'] = "";
                if ($row->shifttype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($row->shifttype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                if ($row->shifttype == 3)
                {
                    $data['shift'] = '<span title="Shift Hours: ' . getFlexiShift($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

                }
                else
                {
                    $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                }

                $outsidegeo = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                $withingeo = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                if ($data['positionlin'] == $withingeo && ($row->latit_out == 0.0 && $row->longi_out == 0.0))
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0 && $row->latit_out == 0.0 && $row->longi_out == 0.0) && ($row->TimeInGeoFence == '' && $row->TimeOutGeoFence == ''))
                {

                    $osl = '';

                    $outsideloc = "";

                }

                elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0) && $data['positionout'] == $withingeo)
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif ($data['positionlin'] == $withingeo && $data['positionout'] == $withingeo)
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif ($data['positionlin'] == $withingeo && $data['positionout'] == $outsidegeo)
                {
                    //echo "hello";
                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Outside Geofence">OG</span>';

                    $outsideloc = "Outside Geofence";
                }
				


$checkleavestatus=Checkemplonleave($orgid,$row->EmployeeId);
// echo $checkleavestatus."-";
// echo $row->EmployeeId;

if($checkleavestatus == $row->EmployeeId)
{

$attn = '<span style=" background-color:#4ddbff;text-align:center;color:white;padding-left:6px;
padding-right:6px;" title="Leave">L</span>';
}
else
{
if($row->ctin > $time && $row->AttendanceDate==$today)
{
$attn = '<span style=" background-color:red;text-align:center;color:white;padding-left:6px;
padding-right:6px;" title="Absent">Absent</span>';
}
}

               
                if ($row->shifttype == 3)
                {
                    $data['status'] = $attn;
                }
                else
                {
                    $data['status'] = $attn;
                }
                $data['timeoff'] = $this->calculatetimeoff($row->EmployeeId, $row->AttendanceDate);

                if ($data['timeoff'] != "00:00" and $data['wh'] != "-")
                {
                    $a = new DateTime($data['timeoff']);
                    $b = new DateTime($data['wh']);
                    $interval = $a->diff($b);
                    $a = new DateTime($interval->format("%H:%I"));
                    $data['wh'] = $interval->format("%H:%I");
                }

                $permis = getAddonPermission($_SESSION['orgid'], 'Addon_Delete');
                $permis1 = getAddonPermission($_SESSION['orgid'], 'Addon_Edit');

                //// flexi According to permission "$permis == 1 && $permis1 == 1" case todays ////
                if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 1 && $row->shifttype == 3 or ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"><a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                    

          <li class="q3 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                        }

                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:4px; margin-left:-120% margin-top:-8%;">

                           

                    

          <li class="t3 delete hover" style="height:30px;" data-toggle="modal" data-target="#delAttnew" data-aid="' . $row->Id . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" ><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;" data-aid="' . $row->Id . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" title="Delete"></i> <a href"#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

 <li class="q4 hover" style="height:30px;"><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"    title="view"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">view</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                    

          <li class="q5 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                           
                    

          <li class="q6 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                }

                //// flexi According to permission "$permis == 1 && $permis1 == 1" case todays ////
                

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate = '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                    

          <li class="q7 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                        
                    

          <li class="q8 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched
							visits</a></li>

                    

          <li class="q9 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                           
                    

          <li class="q10 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }

                    }
                }
                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                

                //// flexi According to permission "$permis == 1 && $permis1 == 0" case todays
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 0 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                    

          <li class="q11 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                           

                    

          <li class="q12 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visit</a></li>

                    

          <li class="q13 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                         
                    

          <li class="q14 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                }

                //// flexi According to permission "$permis == 1 && $permis1 == 0" case todays ////
                

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                    

          <li class="q15 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                    

          <li class="q16 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                    }

                }

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                

                // flexi According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') == $row->AttendanceDate && $permis1 == 0 && $permis == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        //$shiftype=getShiftType($row->ShiftId);
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visit</a></li>

                    

          <li class="q17 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }

                    else
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                           
                    

          <li class="q18 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }
                }

                // flexi According to permission "$permis == 1 && $permis1 == 0" case last 7 days ///
                

                //flexi According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1 && $permis == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                    

          <li class="q1 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        // }
                        
                    }
                    else
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                       
                    

          <li class="q2 hover" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                    }
                }

                // flexi According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                

                // Condition 1 According to permission "$permis == 0 && $permis1 == 1" case last 7 days//
                

                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                             <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

                    

         

             
             </ul>
             </div> ';

                    }
                    else

                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                           

                             <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

                    

         

             
             </ul>
             </div> ';

                    }

                }

                // Condition 1 According to permission "$permis == 0 && $permis1 == 1" case last 7 days //
                

                // Condition 2 According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0 && $permis == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        //$shiftype=getShiftType($row->ShiftId);
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"><a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                              <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"  title="Disapprove"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

                    

         

             
             </ul>
             </div> ';

                    }

                    else
                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width:8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                            <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                              <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

                    

         

             
             </ul>
             </div> ';

                    }
                }

                // Condition 2 According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                // Condition 3 According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1 && $permis == 1 && $row->AttendanceStatus != 2 && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 11 || $row->Wo_H_Hd != 12))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>



                                 <li class="edit test hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


         <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

            
             </ul>
             </div> ';

                        // }
                        
                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                 


                                 <li class="edit test hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


         <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

            
             </ul>
             </div> ';
                    }
                }

                // Condition 3 According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                

                // Condition 4 According to permission "$permis == 0 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0 && $permis == 0 && $row->AttendanceStatus != 2)
                {
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>
                                  </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                                 
                                  </ul>
             </div> ';
                    }
                }

                // Condition 4 According to permission "$permis == 0 && $permis1 == 0" case last 7 days //
                

                // Condition 5 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                elseif ($row->AttendanceStatus == 2 && $row->AttendanceDate > date('Y-m-d', strtotime('-6 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0)
                {

                    $data['action'] = '';
                }

                // Condition 5 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                // Condition 6 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 7 days //
                elseif ($row->AttendanceStatus == 2 && $row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->shifttype == 3 && $row->AttendanceDate > date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1)
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3rem; border-radius:5px;margin-left:-55% margin-top:-8%;">

                                  <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttEsts"  
             data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


                                  </ul>
             </div> ';

                    }
                    else
                    {
                        if ($row->AttendanceStatus == 2 && $row->TimeIn == '00:00:00' && $row->timeindate == '0000-00-00' && $row->AttendanceDate > date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate)
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:2.5rem; border-radius:5px; margin-top:-8%; margin-left:-125%">

                                  <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttENew"  
             data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;margin-left:-125% margin-top:-8%;">

                                  <li class="test track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"><a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>
                                  </ul>
             </div> ';

                        }
                    }
                }

                // Condition 6 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                // Condition 7 According to permission "$permis == 0 && $permis1 == 1" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate = '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                        data-id="' . $row->Id . '"
                                        data-aname="' . $emp_name . '"
                                        data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

                                        data-tidate="' . $row->timeindate . '";

                                        data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                                

                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                        data-id="' . $row->Id . '"
                                        data-aname="' . $emp_name . '"
                                        data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

                                        data-tidate="' . $row->timeindate . '";

                                        data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                       data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
 data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                 

                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                       data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
 data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }

                    }
                }
                // Condition 7 According to permission "$permis == 0 && $permis1 == 1" case todays //
                // Condition 7 According to permission "$permis == 1 && $permis1 == 0" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 0)
                {
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:6rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t7 delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"   title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                 
                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t8 delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:5rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="1test delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtt"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';
                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="2test delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtt"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';
                        }
                    }
                }

                // Condition 7 According to permission "$permis == 1 && $permis1 == 0" case todays //
                

                // Condition 8 According to permission "$permis == 1 && $permis1 == 0" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 1 && $permis1 == 0)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                   <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:3rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                                
                                        </ul>
             </div> ';
                    }

                }

                // Condition 8 According to permission "$permis == 1 && $permis1 == 0" Attendance disapproved //
                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 1 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                   <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"><a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                
                                        </ul>
             </div> ';
                    }

                }

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 0 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                   <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:3rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                                 
                                        </ul>
             </div> ';
                    }

                }

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                

                // Condition 10 According to permission "$permis == 1 && $permis1 == 1" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 12 || $row->Wo_H_Hd != 11) && $permis == 1 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px; margin-left:-120% margin-top:-8%;">

                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"><a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>
                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                      data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

data-tidate="' . $row->timeindate . '";

data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t9 delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px;margin-left:-120% margin-top:-8%;">

                               
                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                      data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

data-tidate="' . $row->timeindate . '";

data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t1 delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"   title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem;    border-radius:5px; margin-left:-120% margin-top:-8%;">
                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li>

                                  
                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                      data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="3test delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li></ul></div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 9rem; height:6rem; border-radius:5px;margin-left:-120% margin-top:-8%;">
                                  

                                  
                                   <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                      data-id="' . $row->Id . '"
data-aname="' . $emp_name . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

  <li class="4test delete hover" style="height:30px;" data-toggle="modal" data-target="#delAtt"   data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li></ul>
             </div> ';

                        }
                    }
                }

                else
                {
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px; margin-left:-120% margin-top:-8%;">
                                  <li class="track_loc hover" style="height:30px;"><img src="' . URL . "../assets/img/user-plus.svg" . '" class="  material-icons " style="font-size:16px; margin-left:8px;"  title="punched visit"> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:8px;">Punched visits</a></li></ul></div> ';

                    }
                    else
                    {

                        if (($row->AttendanceStatus == 7 && ($row->Wo_H_Hd == 11 || $row->Wo_H_Hd == 12)) && ($attdate != date("Y-m-d")))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <!--<span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px; margin-left:-120% margin-top:-8%;">
                                  </ul></div>--> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:3rem; border-radius:5px;  margin-top:-8%; margin-left:-120%">
                                 


                                  <li class="5test delete hover" style="height:30px;" data-toggle="modal" data-target="#delAttnew"  data-aid="' . $row->Id . '" data-aname="' . $emp_name . '" data-attdate="' . $row->AttendanceDate . '"
								data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li></ul></div> ';
                        }
                    }
                }

                //// Condition 12 else cases ////
                $res[] = $data;
            }
        }


        $d['data'] = $res;
        //print_r($d['data']);
        $this
            ->db
            ->close(); //$query->result();
        echo json_encode($d);
        return false;
    }

    public function getAttendances__bothold()
    {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $attendanceid = isset($_REQUEST['attendance']) ? $_REQUEST['attendance'] : 0;

        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        $time = date("H:i:s");
        //$today='2019-02-28';
        $q1 = '';
        if ($shiftid != 0)
        {
            $q1 .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deptId != 0)
        {
            $q1 .= " AND A.Dept_id='$deptId' ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }
        if ($attendanceid == 1)
        {
            $q1 .= " AND A.AttendanceStatus = '1'";
        }
        else if ($attendanceid == 2)
        {
            $q1 .= " AND A.AttendanceStatus =='2'";
        }
        $currentdatestatus = 0;
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            // echo $datestatus;
            // exit();
            $range = "";
            if ($datestatus == 1)
            {
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                // echo $startdate.'-'.$enddate;
                // exit();
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                //$realEnd = new DateTime($enddate); //current and yester date data fetch
                $realEnd = new DateTime($startdate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }

            }
            else
            {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
                // $enddate=date("Y-m-d");
                //$startdate=date("Y-m-d");
                
            }

            $query = $this
                ->db
                ->query("SELECT C.TimeInGrace,A.TimeInGeoFence,A.TimeOutGeoFence,A.FakeTimeOutTimeStatus,A.timeincity,A.timeoutcity, A.FakeTimeInTimeStatus, A.FakeLocationStatusTimeIn,A.FakeLocationStatusTimeOut,A.Id ,A.timeoutdate as timeoutdate, A.EmployeeId,C.TimeIn as ctin ,A.TimeInEditStatus,A.TimeOutEditStatus ,C.TimeOut as ctout, A.AttendanceDate  , A.AttendanceStatus,A.Wo_H_Hd, A.TimeIn, A.TimeOut, A.ShiftId,C.shifttype, (CASE WHEN (C.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,C.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (C.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as Overtime,A.EntryImage,A.device,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.SuspiciousDeviceTimeInStatus,A.SuspiciousDeviceTimeOutStatus,E.EmployeeCode,E.MultipletimeStatus, A.ExitImage,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId,E.ImageName,E.Gender,A.timeindate,A.timeoutdate,A.TimeInAppVersion,A.TimeOutAppVersion,A.Platform,(select disapp_sts from Disapprove_approve where Disapprove_approve.AttendanceId=A.Id And Disapprove_approve.disapp_sts=1 AND Disapprove_approve.AttendanceDate IN (" . $range . ") limit 1) as Disapprove_status, TIME_FORMAT(SEC_TO_TIME((ROUND(TIME_TO_SEC(A.TotalLoggedHours)/60)) * 60), '%H:%i:%s') AS loggedhours FROM AttendanceMaster A, ShiftMaster C ,EmployeeMaster E WHERE A.OrganizationId=?   And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN ( " . $range . " ) and A.EmployeeId=E.Id  And E.Is_Delete=0", array(
                $orgid,
                $orgid
            ));
            //var_dump($this->db->last_query());
            
        }
        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }

            $rangedate = $range;

            if ($rangedate == "")
            {
                $rangedate = 1;
            }

            if (strpos($rangedate, $today) !== false)
            {
                $currentdatestatus = 1;
            }
            //between '$strt' and '$end'
            // echo  $rangedate;
            //, TIMEDIFF(CONCAT(A.timeoutdate,'   ',A.TimeOut) , CONCAT(A.AttendanceDate,'  ',A.TimeIn)) as Officehours
            $query = $this
                ->db
                ->query("SELECT C.TimeInGrace,A.TimeInGeoFence,A.TimeOutGeoFence,A.FakeTimeOutTimeStatus,A.FakeTimeInTimeStatus,A.timeincity,A.timeoutcity, A.FakeLocationStatusTimeIn,A.FakeLocationStatusTimeOut,A.Id,A.EmployeeId,C.TimeIn as ctin ,C.TimeOut as ctout, A.AttendanceDate ,A.TimeInEditStatus,A.TimeOutEditStatus,A.timeoutdate as timeoutdate , A.AttendanceStatus,A.Wo_H_Hd, A.TimeIn, A.TimeOut, A.ShiftId, (CASE WHEN (C.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,C.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (C.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',C.TimeOut),CONCAT(A.`AttendanceDate`,' ',C.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as Overtime,A.EntryImage,A.device,A.SuspiciousTimeInStatus,A.SuspiciousTimeOutStatus,A.SuspiciousDeviceTimeInStatus,A.SuspiciousDeviceTimeOutStatus,E.EmployeeCode,E.MultipletimeStatus,C.shifttype, A.ExitImage,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId,E.ImageName,E.Gender,A.timeindate,A.timeoutdate,A.TimeInAppVersion,A.TimeOutAppVersion,A.Platform,(select disapp_sts from Disapprove_approve where Disapprove_approve.AttendanceId=A.Id And Disapprove_approve.disapp_sts=1 AND Disapprove_approve.AttendanceDate IN (" . $rangedate . ") limit 1) as Disapprove_status, TIME_FORMAT(SEC_TO_TIME((ROUND(TIME_TO_SEC(A.TotalLoggedHours)/60)) * 60), '%H:%i:%s') AS loggedhours  FROM AttendanceMaster A, ShiftMaster C,EmployeeMaster E  WHERE A.OrganizationId=?   And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN ( " . $rangedate . " )  and A.EmployeeId=E.Id  And E.Is_Delete=0", array(
                $orgid,
                $orgid
            ));
            // var_dump($this->db->last_query());
            //die;
            
        }
        $d = array();
        $res = array();
        $empid = '';
        $attdate = '';
        $eid = '';
        $checkindate = '';
        foreach ($query->result() as $row)
        {
            $data = array();
            $empid = $row->EmployeeId;
            $attdate = $row->AttendanceDate;

            $query1 = $this
                ->db
                ->query("SELECT * FROM `checkin_master` WHERE `EmployeeId`=? And `OrganizationId`=? And `date`=?", array(
                $empid,
                $orgid,
                $attdate
            ));
            if ($row1 = $query1->row())
            {
                $eid = $row1->EmployeeId;
                $checkindate = $row1->date;
            }

            $name = ucwords(getEmpName($row->EmployeeId));

            if ($row->AttendanceDate == $today) //fetch data today
            
            {
                $currentdatestatus = 1;

            }

            if ($name != "")
            {
                $data['name'] = $name;

                if ($row->ImageName)
                {
                    $data['proimage'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->ImageName . '"><img src="' . IMGURL3 . "uploads/$orgid/" . $row->ImageName . '" style="width:42px!important;height:42px!important;border-radius:50%" /> </i>';
                }
                else
                {
                    if ($row->Gender == 1)
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/male.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                    else
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/female.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                }

                $data['code'] = $row->EmployeeCode;
                $data['date'] = date("M d,Y", strtotime($row->AttendanceDate));
                $timeinstas = '';
                $timeoutstas = '';
                if ($row->TimeInEditStatus == 1) $timeinstas = ' Edited';
                if ($row->TimeOutEditStatus == 1) $timeoutstas = ' Edited';

                if ($row->FakeTimeInTimeStatus == 1)
                {
                    $data['fti'] = '<div title="TimeIn recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
                }
                else
                {
                    $data['fti'] = "";
                }

                $data['tif'] = "";

                if ($row->FakeTimeInTimeStatus == 0)
                {
                    $data['tif'] = substr($row->TimeIn, 0, 5) . "<br><small style='color:red' >$timeinstas</small>";
                }
                else
                {
                    $data['tif'] = substr($row->TimeIn, 0, 5) . ' ' . $data['fti'];
                }

                if ($row->FakeTimeOutTimeStatus == 1)
                {

                    $data['fto'] = '<div title="TimeOut recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
                }

                else
                {
                    $data['fto'] = "";
                }

                $data['tof'] = "";

                if ($row->FakeTimeOutTimeStatus == 0)
                {
                    $data['tof'] = substr($row->TimeOut, 0, 5) . "<br><small style='color:red' >$timeoutstas</small>";
                }
                else
                {
                    $data['tof'] = substr($row->TimeOut, 0, 5) . ' ' . $data['fto'];
                }

                if ($row->TimeInAppVersion != '')
                {
                    $data['TimeInAppVersion'] = $row->TimeInAppVersion;
                    //echo $data['TimeInAppVersion']."hello";
                    
                }
                else
                {
                    $data['TimeInAppVersion'] = '--';
                }
                if ($row->TimeOutAppVersion != '')
                {
                    $data['TimeOutAppVersion'] = $row->TimeOutAppVersion;
                    //echo $data['TimeOutAppVersion']."hii";
                    
                }
                else
                {
                    $data['TimeOutAppVersion'] = '--';
                }
                if ($row->Platform != '')
                {
                    $data['Platform'] = $row->Platform;
                }
                else
                {
                    $data['Platform'] = '--';
                }
                if ($row->timeindate == '0000-00-00')
                {
                    $data['timeindate'] = '-';
                }
                else
                {
                    $data['timeindate'] = date("d-m-Y", strtotime($row->timeindate));
                }

                if ($row->timeoutdate == '0000-00-00')
                {
                    $data['timeoutdate'] = '-';
                }
                else
                {
                    $data['timeoutdate'] = date("d-m-Y", strtotime($row->timeoutdate));
                }
                $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                $data['ot'] = $row->Overtime;
                // var_dump($data['ot']);
                $data['entryimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->EntryImage . '"><img src="' . $row->EntryImage . '" class="rounded" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover; "  /></i>';

                $data['exitimg'] = /*'<img src="'.$row->ExitImage.'"  style="width:60px!important; "/>';*/
                '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-eximage="' . $row->ExitImage . '"><img src="' . $row->ExitImage . '" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover;"/></i>';
                $check = $row->ExitImage;
                if ($check == "")
                {
                    $data['exitimg'] = '-';
                }
                else
                {
                    $data['exitimg'] = /*'<img src="'.$row->ExitImage.'"  style="width:60px!important; "/>';*/
                    '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-eximage="' . $row->ExitImage . '"><img src="' . $row->ExitImage . '" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover; "/></i>';
                }
                $data['positionlin'] = "";
                $data['positionout'] = "";
                $osl = "";
                $outsideloc = "";
                $fakeloc = "";

                if ($row->areaId != 0 && ($row->latit_in != 0.0 && $row->longi_in != 0.0 && $row->latit_out != 0.0 && $row->longi_out != 0.0) || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }

                        if ($row->FakeLocationStatusTimeOut == 1)
                        {
                            $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }
                        else
                        {
                            if ($d2 <= $radius)
                            {
                                $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && ($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out == 0.0 && $row->longi_out == 0.0) && $row->device != 'Auto Time Out' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'mobile offline')
                {

                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if (($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out != 0.0 && $row->longi_out != 0.0))
                        {
                            if ($row->FakeLocationStatusTimeIn == 1)
                            {
                                $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d1 <= $radius)
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";

                                }
                            }

                            if ($row->FakeLocationStatusTimeOut == 1)
                            {
                                $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d2 <= $radius)
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";
                                }
                            }
                        }

                        elseif (($row->latit_in != 0.0 && $row->longi_in != 0.0) && ($row->latit_out == 0.0 && $row->longi_out == 0.0))
                        {
                            if ($row->FakeLocationStatusTimeIn == 1)
                            {
                                $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d1 <= $radius)
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";

                                }
                            }
                        }
                        elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0) && ($row->latit_out != 0.0 && $row->longi_out != 0.0))
                        {
                            if ($row->FakeLocationStatusTimeOut == 1)
                            {
                                $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                            }
                            else
                            {
                                if ($d2 <= $radius)
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                                }
                                else
                                {
                                    $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                    $outsideloc = "Outside Geofence";
                                }
                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'Auto Time Out' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }
                    }
                }

                elseif ($row->areaId != 0 && $row->device == 'TimeOut marked by Admin' || ($row->TimeInGeoFence == '' || $row->TimeOutGeoFence == ''))
                {
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");

                        if ($row->FakeLocationStatusTimeIn == 1)
                        {
                            $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                        }

                        else
                        {
                            if ($d1 <= $radius)
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {
                                $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";

                            }
                        }
                    }

                }

                if ($row->areaId != 0 && $row->device == 'Auto Time Out')
                {
                    if ($row->FakeLocationStatusTimeIn == 1)
                    {
                        $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeInGeoFence != 'Not Calculated.' && $row->TimeInGeoFence != '')
                        {
                            if ($row->TimeInGeoFence == 'Within Geofence' || $row->TimeInGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                            }
                            else
                            {
                                // $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }

                }

                elseif ($row->areaId != 0)
                {

                    if ($row->FakeLocationStatusTimeIn == 1)
                    {
                        $data['positionlin'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeInGeoFence != 'Not Calculated.' && $row->TimeInGeoFence != '')
                        {
                            if ($row->TimeInGeoFence == 'Within Geofence' || $row->TimeInGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                            }
                            else
                            {
                                // $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeInGeoFence.'</div>';
                                $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }

                    if ($row->FakeLocationStatusTimeOut == 1)
                    {
                        $data['positionout'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else
                    {
                        if ($row->TimeOutGeoFence != 'Not Calculated.' && $row->TimeOutGeoFence != '')
                        {
                            if ($row->TimeOutGeoFence == 'Within Geofence' || $row->TimeOutGeoFence == 'Within Fenced Area')
                            {

                                // $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">'.$row->TimeOutGeoFence.'</div>';
                                $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';
                            }
                            else
                            {

                                // $data['positionout']= '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">'.$row->TimeOutGeoFence.'</div>';
                                $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                                $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                                $outsideloc = "Outside Geofence";
                            }
                        }
                    }
                }

                if ($row->latit_in == '0.0')
                {
                    // $data['chiloc']=$row->checkInLoc != ''?'<span style="font-size:11px;" title="'.$row->checkInLoc.'"><a href="#">'.$row->checkInLoc.'</a></span>':'-';
                    $data['chiloc'] = $row->checkInLoc != '' ? '<span style="font-size:11px;" title="Location permissions were denied."><a href="#">Location permissions were denied.</a></span>' : '-';
                }
                else
                {

                    if ($row->checkInLoc != "" && $row->checkInLoc == "Location not fetched.")
                    {
                        $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . encode5t($row->checkInLoc) . '"><a style="font-size:11px;" title="' . $row->latit_in . ' , ' . $row->longi_in . '">' . $row->latit_in . ' , ' . $row->longi_in . $data['positionlin'] . '</a></span>';
                    }

                    else
                    {
                        if ($row->checkInLoc == "" || $row->checkInLoc == "Location not fetched.")
                        {
                            $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" ><a style="font-size:11px;"  title="' . $row->latit_in . ' , ' . $row->longi_in . '">' . $row->latit_in . ' , ' . $row->longi_in . $data['positionlin'] . '</a></span>';
                        }
                        else
                        {
                            $data['chiloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_in . ',' . $row->longi_in . '" data-latitin="' . $row->latit_in . '" data-longiin="' . $row->longi_in . '" data-checkinloc="' . encode5t($row->checkInLoc) . '"><a style="font-size:11px;"  title="' . $row->checkInLoc . '">' . $row->checkInLoc . $data['positionlin'] . '</a></span>';
                        }
                    }
                }

                $data['test'] = '
  
<i class="fa fa-location-arrow fa-2x" style="margin-left:0.5rem;color:#3190E8;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->checkInLoc . '" data-toggle="tooltip" data-placement="top"></i></button>';

                $data['ti'] = substr($row->TimeIn, 0, 5) . "<br><small style='color:red'>$timeinstas</small>" . '<br><i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->EntryImage . '"><img src="' . $row->EntryImage . '" class="rounded-circle" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover; "  /></i>' . '<br>' . $data['test'];

                $data['test1'] = '<i class="fa fa-location-arrow fa-2x" style="margin-left:0.5rem;color:#FF0000;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->CheckOutLoc . '" data-toggle="tooltip" data-placement="top"></i></button>';

                $data['to'] = substr($row->TimeOut, 0, 5) . "<br><small style='color:red' >$timeoutstas</small>" . '<br><i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->EntryImage . '"><img src="' . $row->EntryImage . '" class="rounded-circle" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover; "  /></i>' . '<br>' . $data['test1'];

                if ($row->longi_out == '0.0')
                {
                    // $data['choloc']=$row->CheckOutLoc!=''?'<span style="font-size:11px;" title="'.$row->CheckOutLoc.'"><a href="#">'.$row->CheckOutLoc.'</a></span>':'-';
                    $data['choloc'] = $row->CheckOutLoc != '' ? '<span style="font-size:11px;" title="Location permissions were denied."><a href="#">Location permissions were denied.</a></span>' : '-';
                }
                else
                {
                    if ($row->CheckOutLoc == "" || $row->CheckOutLoc == "Location not fetched.")
                    {
                        $data['choloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" ><a style="font-size:11px;" title="' . $row->latit_out . ' , ' . $row->longi_out . '">' . $row->latit_out . ' , ' . $row->longi_out . $data['positionout'] . '</a>';
                    }
                    else
                    {
                        $data['choloc'] = '<span class="loc" data-toggle="modal" data-target="#locationmodal" data-latit="' . $row->latit_out . ',' . $row->longi_out . '" data-latitin="' . $row->latit_out . '" data-longiin="' . $row->longi_out . '" data-checkinloc="' . encode5t($row->CheckOutLoc) . '">
<a style="font-size:11px;"  title="' . $row->CheckOutLoc . '">' . $row->CheckOutLoc . $data['positionout'] . '</a></span>';
                    }
                }

                $data['wh'] = '-';
                if ($row->AttendanceStatus == 4)
                {
                    $attn = '<div style="background-color:green;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Halfday">Halfday</div>';
                }
                elseif ($row->Wo_H_Hd == 13 and $row->AttendanceStatus == 1)
                {
                    $attn = '<div style="text-align:center;color:white;padding: 5px 20px 5px 20px;background-color: #F2C94C; border-radius:100px;width:90%;font-size:13px;" title="Half Present">Half Present</div>';
                }

                else
                {
                    $attn = $row->AttendanceStatus != 2 ? '<div style="padding: 5px 20px 5px 20px;background-color: #219653;text-align:center;color:white;border-radius:100px;width:90%;font-size:13px;" title="Present">present</div>' : '<div style=" background-color:#f15353;text-align:center;color:white;border-radius:100px;width:90%;font-size:13px;" title="Absent">Absent</div>';
                }

                if ($row->AttendanceStatus == 7 && $row->Wo_H_Hd == 11)
                {
                    $attn = '<div style="background-color:#3cdcdc;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="WeekOff">WeekOff</div>';
                }
                else if ($row->AttendanceStatus == 7 && $row->Wo_H_Hd == 12)
                {
                    $attn = '<div style="background-color:#b168d0;text-align:center;color:white;padding: 5px 20px 5px 20px; border-radius:100px;width:90%;font-size:13px;" title="Holiday">Holiday</div>';
                }

                $goings = '';
                $overtime = '';
                $coming = '';

                if ($row->AttendanceStatus != 2 && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 11 || $row->Wo_H_Hd != 12))
                {
                    $tm = comings($row->ShiftId, $row->TimeIn, $row->timeindate, $row->AttendanceDate, $row->TimeInGrace);
                    //echo $tm;
                    if (substr($tm, 0, 5) != '00:00') $coming = strpos($tm, '-') !== 0 ? '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Late Coming By ' . substr($tm, 0, 5) . ' Hr">LC</span>' : '<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Early Coming By ' . substr(str_replace("-", "", $tm) , 0, 5) . ' Hr">EC</span>';

                    if ($row->TimeOut != '00:00:00')
                    {
                        //$data['wh'] = substr($row->Officehours,0,5);
                        $tm = goings1($row->ShiftId, $row->shifttype, $row->TimeOut, $row->AttendanceStatus, $row->timeindate, $row->timeoutdate, $row->AttendanceDate);
                        if (substr($tm, 0, 5) != '00:00') $goings = strpos($tm, '-') !== 0 ? '<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Late Leaving By ' . substr($tm, 0, 5) . ' Hr">LL</span>' : '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Early Leaving By ' . substr(str_replace("-", "", $tm) , 0, 5) . ' Hr">EL</span>';

                        //calculate work hours
                        if (strtotime($row->ctin) < strtotime($row->ctout))
                        {
                            if (strtotime($row->TimeIn) < strtotime($row->TimeOut))
                            {

                                $data['wh'] = substr($row->loggedhours, 0, 5);

                            }
                            else
                            {
                                $time = "24:00:00";
                                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                                $data['wh'] = date("H:i", strtotime($time) - $secs);
                            }
                        }
                        else
                        {

                            $a = new DateTime($row->TimeIn);
                            $b = new DateTime($row->TimeOut);
                            if (strtotime($row->TimeIn) <= strtotime($row->TimeOut))
                            {
                                // $interval1 = $a->diff($b);
                                // $a = new DateTime($interval1->format("%H:%I"));
                                // $data['wh']=$interval1->format("%H:%I");
                                $data['wh'] = substr($row->loggedhours, 0, 5);
                            }
                            else
                            {
                                $time = "24:00:00";
                                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                                $data['wh'] = date("H:i", strtotime($time) - $secs);
                            }
                        }

                    }

                    if ($row->AttendanceStatus == 4)
                    {
                        $overtime = '';
                    }
                    elseif ($row->AttendanceStatus == 1 && $row->TimeOut == '00:00:00')
                    {
                        $overtime = '';
                    }
                    else
                    {
                        if ($row->Overtime != '00:00:00')
                        {

                            $overtime = strpos($row->Overtime, '-') !== 0 ? '<span style="background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Over Time By ' . substr($row->Overtime, 0, 5) . ' Hr">OT</span>' : '<span style=" background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Under Time By ' . substr(str_replace("-", "", $row->Overtime) , 0, 5) . ' Hr">UT</span>';
                        }
                    }

                }

                $Suspiciousdevice = "";
                $Suspiciousselfie = "";

                if ($row->SuspiciousDeviceTimeInStatus == 1 || $row->SuspiciousDeviceTimeOutStatus == 1)
                {
                    $sd = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Suspicious Device">SD</span>';

                    $Suspiciousdevice = "Suspicious Device";
                }
                else
                {
                    $sd = '';
                    $Suspiciousdevice = "";
                    //$dis_icon='';
                    
                }
                if ($row->SuspiciousTimeInStatus == 1 || $row->SuspiciousTimeOutStatus == 1)
                {
                    $ss = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Suspicious Selfie">SS</span>';

                    $Suspiciousselfie = "Suspicious Selfie";
                }
                else
                {
                    $ss = '';
                    $Suspiciousselfie = "";
                    //$dis_icon='';
                    
                }
                $data['tymincity'] = $row->timeincity;

                $data['tymoutcity'] = $row->timeoutcity;

                if ($row->Disapprove_status == '')
                {
                    $app = '';
                }
                elseif ($row->Disapprove_status == 0 && $row->AttendanceStatus == 2)
                {
                    $app = '';
                }
                else
                {
                    $app = '<span style="background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Approved">AP</span>';
                }

                $data['device'] = $row->device;

                $data['shifttype'] = "";
                if ($row->shifttype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($row->shifttype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                if ($row->shifttype == 3)
                {
                    $data['shift'] = '<span title="Shift Hours: ' . getFlexiShift($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

                }
                else
                {
                    $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                }

                $outsidegeo = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geofence</div>';

                $withingeo = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geofence</div>';

                if ($data['positionlin'] == $withingeo && ($row->latit_out == 0.0 && $row->longi_out == 0.0))
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0 && $row->latit_out == 0.0 && $row->longi_out == 0.0) && ($row->TimeInGeoFence == '' && $row->TimeOutGeoFence == ''))
                {

                    $osl = '';

                    $outsideloc = "";

                }

                elseif (($row->latit_in == 0.0 && $row->longi_in == 0.0) && $data['positionout'] == $withingeo)
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif ($data['positionlin'] == $withingeo && $data['positionout'] == $withingeo)
                {

                    $osl = '';

                    $outsideloc = "";
                }

                elseif ($data['positionlin'] == $withingeo && $data['positionout'] == $outsidegeo)
                {
                    //echo "hello";
                    $osl = '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Outside Geofence">OG</span>';

                    $outsideloc = "Outside Geofence";
                }

                // $data['status']=$attn.' '.$coming.' '.$goings.' '.$overtime.' '.$sd.' '.$ss.' '.$osl.' '.$app;
                if ($row->shifttype == 3)
                {
                    $data['status'] = $attn;
                }
                else
                {
                    $data['status'] = $attn;
                }
                $data['timeoff'] = $this->calculatetimeoff($row->EmployeeId, $row->AttendanceDate);

                if ($data['timeoff'] != "00:00" and $data['wh'] != "-")
                {
                    $a = new DateTime($data['timeoff']);
                    $b = new DateTime($data['wh']);
                    $interval = $a->diff($b);
                    $a = new DateTime($interval->format("%H:%I"));
                    $data['wh'] = $interval->format("%H:%I");
                }

                $permis = getAddonPermission($_SESSION['orgid'], 'Addon_Delete');
                $permis1 = getAddonPermission($_SESSION['orgid'], 'Addon_Edit');

                //// flexi According to permission "$permis == 1 && $permis1 == 1" case todays ////
                if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 1 && $row->shifttype == 3 or ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="track_loc fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q3" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                        }

                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="track_loc fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No 
							
							s"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="t3 delete" style="height:30px;" data-toggle="modal" data-target="#delAttnew" data-aid="' . $row->Id . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" ><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;" data-aid="' . $row->Id . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" title="Delete"></i> <a href"#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

 <li class="q4" style="height:30px;"><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"    title="view"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">view</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q5" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="q6" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                }

                //// flexi According to permission "$permis == 1 && $permis1 == 1" case todays ////
                

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate = '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q7" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="q8" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q9" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="q10" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }

                    }
                }
                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                

                //// flexi According to permission "$permis == 1 && $permis1 == 0" case todays
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 0 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q11" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="q12" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q13" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="q14" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        }
                    }
                }

                //// flexi According to permission "$permis == 1 && $permis1 == 0" case todays ////
                

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                    

          <li class="q15" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                    

          <li class="q16" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                    }

                }

                //// flexi According to permission "$permis == 0 && $permis1 == 1" case todays ////
                

                // flexi According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') == $row->AttendanceDate && $permis1 == 0 && $permis == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        //$shiftype=getShiftType($row->ShiftId);
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q17" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }

                    else
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                    

          <li class="q18" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                    }
                }

                // flexi According to permission "$permis == 1 && $permis1 == 0" case last 7 days ///
                

                //flexi According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1 && $permis == 1 && $row->AttendanceStatus != 2 && $row->shifttype == 3 || ($row->shifttype == 1 && $row->MultipletimeStatus == 1))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                    

          <li class="q1" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';

                        // }
                        
                    }
                    else
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">


                    

          <li class="q2" style="height:30px;" ><i class="fa fa-clock-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="View"></i> <a href="' . URL . 'attendance/viewflexiattendance/' . $row->EmployeeId . '/' . $row->Id . '" style="color:black; font-size:13px; margin-left:5px;">View</a></li>

             
             </ul>
             </div> ';
                    }
                }

                // flexi According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                

                // Condition 1 According to permission "$permis == 0 && $permis1 == 1" case last 7 days//
                

                elseif ($row->AttendanceDate < date('Y-m-d') && date('Y-m-d') != $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                             <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

                    

         

             
             </ul>
             </div> ';

                    }
                    else

                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                             <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

                    

         

             
             </ul>
             </div> ';

                    }

                }

                // Condition 1 According to permission "$permis == 0 && $permis1 == 1" case last 7 days //
                

                // Condition 2 According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0 && $permis == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        //$shiftype=getShiftType($row->ShiftId);
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                              <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"  title="Disapprove"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

                    

         

             
             </ul>
             </div> ';

                    }

                    else
                    {
                        $data['action'] = '<div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                            <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                              <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

                    

         

             
             </ul>
             </div> ';

                    }
                }

                // Condition 2 According to permission "$permis == 1 && $permis1 == 0" case last 7 days //
                // Condition 3 According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1 && $permis == 1 && $row->AttendanceStatus != 2 && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 11 || $row->Wo_H_Hd != 12))
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>



                                 <li class="edit test" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


         <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

            
             </ul>
             </div> ';

                        // }
                        
                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="javascript:;" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>



                                 <li class="edit test" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


         <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>

            
             </ul>
             </div> ';
                    }
                }

                // Condition 3 According to permission "$permis == 1 && $permis1 == 1" case last 7 days //
                

                // Condition 4 According to permission "$permis == 0 && $permis1 == 0" case last 7 days //
                elseif ($row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0 && $permis == 0 && $row->AttendanceStatus != 2)
                {
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>
                                  </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>
                                  </ul>
             </div> ';
                    }
                }

                // Condition 4 According to permission "$permis == 0 && $permis1 == 0" case last 7 days //
                

                // Condition 5 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                elseif ($row->AttendanceStatus == 2 && $row->AttendanceDate > date('Y-m-d', strtotime('-6 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 0)
                {

                    $data['action'] = '';
                }

                // Condition 5 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                // Condition 6 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 7 days //
                elseif ($row->AttendanceStatus == 2 && $row->AttendanceDate > date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->shifttype == 3 && $row->AttendanceDate > date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate && $permis1 == 1)
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-55%">

                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttEsts"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


                                  </ul>
             </div> ';

                    }
                    else
                    {
                        if ($row->AttendanceStatus == 2 && $row->TimeIn == '00:00:00' && $row->timeindate == '0000-00-00' && $row->AttendanceDate > date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) && date('Y-m-d') != $row->AttendanceDate)
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10rem; height:3rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-125%">

                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttENew"  
             data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>


                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10rem; height:3rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-125%">

                                  <li class="test track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>
                                  </ul>
             </div> ';

                        }
                    }
                }

                // Condition 6 According to permission "$permis1 == 1 && $row->AttendanceStatus == 2" case last 6 days //
                // Condition 7 According to permission "$permis == 0 && $permis1 == 1" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 0 && $permis1 == 1 && $row->AttendanceStatus != 2)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate = '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                        data-id="' . $row->Id . '"
                                        data-aname="' . getEmpName($row->EmployeeId) . '"
                                        data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

                                        data-tidate="' . $row->timeindate . '";

                                        data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                        data-id="' . $row->Id . '"
                                        data-aname="' . getEmpName($row->EmployeeId) . '"
                                        data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

                                        data-tidate="' . $row->timeindate . '";

                                        data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                       data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
 data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                       data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
 data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>
                                  </ul>
             </div> ';

                        }

                    }
                }
                // Condition 7 According to permission "$permis == 0 && $permis1 == 1" case todays //
                // Condition 7 According to permission "$permis == 1 && $permis1 == 0" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $permis == 1 && $permis1 == 0)
                {
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t7 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"   title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#">No Punched visits</a></li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t8 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="1test delete" style="height:30px;" data-toggle="modal" data-target="#delAtt"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';
                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="t#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="2test delete" style="height:30px;" data-toggle="modal" data-target="#delAtt"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';
                        }
                    }
                }

                // Condition 7 According to permission "$permis == 1 && $permis1 == 0" case todays //
                

                // Condition 8 According to permission "$permis == 1 && $permis1 == 0" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 1 && $permis1 == 0)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                   <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="t#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>
                                        </ul>
             </div> ';
                    }

                }

                // Condition 8 According to permission "$permis == 1 && $permis1 == 0" Attendance disapproved //
                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 1 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                   <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="t#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>
                                        </ul>
             </div> ';
                    }

                }

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                elseif ($row->AttendanceStatus == 2 && $permis == 0 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);

                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                   <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                        </ul>
             </div> ';

                    }
                    else
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="t#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>
                                        </ul>
             </div> ';
                    }

                }

                // Condition 9 According to permission "$permis == 1 && $permis1 == 1" Attendance disapproved //
                

                // Condition 10 According to permission "$permis == 1 && $permis1 == 1" case todays //
                else if (date('Y-m-d') == $row->AttendanceDate && $row->AttendanceStatus != 7 && ($row->Wo_H_Hd != 12 || $row->Wo_H_Hd != 11) && $permis == 1 && $permis1 == 1)
                {
                    $shiftype = getShiftType($row->ShiftId);
                    if ($row->TimeOut == '00:00:00' && $row->timeoutdate == '0000-00-00')
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:8.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

data-tidate="' . $row->timeindate . '";

data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t9 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:8.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">

                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttc"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"

data-tidate="' . $row->timeindate . '";

data-shifttype="' . $shiftype . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="t1 delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"   title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                    else
                    {
                        if (($eid == $empid) && ($attdate == $checkindate))
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:8.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="3test delete" style="height:30px;" data-toggle="modal" data-target="#delAtttimein"  
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:8.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="#" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                                  
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttE"  
                                      data-id="' . $row->Id . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"
data-timeout="' . date("H:i", strtotime($row->TimeOut)) . '";
data-tidate="' . $row->timeindate . '";
data-todate="' . $row->timeoutdate . '";
data-shifttype="' . $shiftype . '";
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                  <li class="delete" style="height:30px;" data-toggle="modal" data-target="#disAtt"  
            data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '"><i class="fa fa-thumbs-o-down" style="font-size:16px; margin:0px 8px 0px 6px;"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" data-loca="' . $outsideloc . '" data-fake="' . $fakeloc . '" data-sd="' . $Suspiciousdevice . '" data-ss="' . $Suspiciousselfie . '" title="Disapprove"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Disapprove</a></li>





  <li class="4test delete" style="height:30px;" data-toggle="modal" data-target="#delAtt"   data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '" 
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>




                                  </ul>
             </div> ';

                        }
                    }
                }

                else
                {
                    if (($eid == $empid) && ($attdate == $checkindate))
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Punched visits"></i> <a href="trackLocations/' . $row->EmployeeId . '/' . $row->AttendanceDate . '/' . substr($row->TimeIn, 0, 5) . '/' . substr($row->TimeOut, 0, 5) . '/' . $data['wh'] . '" target="_self" style="color:black; font-size:13px; margin-left:5px;">Punched visits</a></li>

                                  




                                  </ul>
             </div> ';

                    }
                    else
                    {

                        if (($row->AttendanceStatus == 7 && ($row->Wo_H_Hd == 11 || $row->Wo_H_Hd == 12)) && ($attdate != date("Y-m-d")))
                        {

                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>

                                  </ul>
                                </div> ';

                        }
                        else
                        {
                            $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-120%">
                                  <li class="tests track_loc" style="height:30px;"><i class="fas fa-walking" style="font-size:16px; margin:0px 8px 0px 6px;"    title="No Punched visits"></i> <a href="" target="_self" style="color:black; font-size:13px; margin-left:5px;">No Punched visits</a></li>


                                  <li class="5test delete" style="height:30px;" data-toggle="modal" data-target="#delAttnew"  data-aid="' . $row->Id . '" data-aname="' . getEmpName($row->EmployeeId) . '" data-attdate="' . $row->AttendanceDate . '"
             data-timein="' . date("H:i", strtotime($row->TimeIn)) . '"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"    title="Delete"></i> <a href="javascript:;" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

                                  




                                  </ul>
             </div> ';

                        }
                    }
                }

                //// Condition 12 else cases ////
                $res[] = $data;
            }
        }

        if ($currentdatestatus == 1)
        {

            $q2 = '';
            if ($shiftid != 0)
            {
                $q2 .= " AND E.Shift='$shiftid' ";
            }
            if ($desgid != 0)
            {
                $q2 .= " AND  E.Designation = '$desgid'";
            }
            if ($deptId != 0)
            {
                $q2 .= " AND E.Department='$deptId' ";
            }
            if ($emplid != 0)
            {
                $q2 .= " AND E.Id = '$emplid'";
            }

            $query = $this
                ->db
                ->query("Select '-' as device,'-' as TimeOutAppVersion,'-' as TimeInAppVersion,'-' as Platform, E.Id as EmployeeId,E.ImageName,E.Gender,E.EmployeeCode,E.Shift as ShiftId ,E.area_assigned as area,E.Designation as desg,E.Department as dept,'" . $today . "' as AttendanceDate,S.TimeIn as ctin,S.shifttype FROM EmployeeMaster E,ShiftMaster S Where  E.Id NOT IN (select A.EmployeeId From AttendanceMaster A where A.AttendanceDate= '" . $today . "'  AND  A.OrganizationId= " . $orgid . " AND AttendanceStatus  IN (1,2,8,4,7) ) AND E.OrganizationId = " . $orgid . "  AND E.Shift = S.Id AND S.TimeIn < '$time'  AND E.archive = 1 $q2 AND E.Is_Delete = 0 group By EmployeeId");
            // var_dump($this->db->last_query());
            foreach ($query->result() as $row)
            {
                $data = array();
                $data['name'] = ucwords(getEmpName($row->EmployeeId));
                if ($data['name'] == "") continue;
                if ($row->ImageName)
                {
                    $data['proimage'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->ImageName . '"><img src="' . IMGURL3 . "uploads/$orgid/" . $row->ImageName . '" style="object-fit:cover;width:42px!important;height:42px!important;border-radius:50%;" /> </i>';
                }
                else
                {
                    if ($row->Gender == 1)
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/male.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                    else
                    {
                        $data['proimage'] = '<img src="' . IMGURL3 . "avatars/female.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                    }
                }
                $data['shifttype'] = "";
                if ($row->shifttype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($row->shifttype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                $data['code'] = "";
                $data['date'] = date("M d,Y", strtotime($today));
                $data['ti'] = "-";
                $data['fti'] = "-";
                $data['to'] = "-";
                $data['fto'] = "-";
                $data['tof'] = "-";
                $data['timeindate'] = "-";
                $data['timeoutdate'] = "-";
                $data['ot'] = "-";
                $data['entryimg'] = "-";
                $data['exitimg'] = "-";
                $data['positionlin'] = "-";
                $data['positionout'] = "-";
                $data['chiloc'] = "-";
                $data['choloc'] = "-";
                $data['wh'] = "-";
                $data['timeoff'] = "-";
                $data['tymincity'] = "-";
                $data['tymoutcity'] = "-";
                $data['TimeOutAppVersion'] = "-";
                $data['TimeInAppVersion'] = "-";
                $data['Platform'] = "-";

                $attn = '';

                $checkleavestatus = Checkemplonleave($orgid, $row->EmployeeId);
                // echo $checkleavestatus."-";
                // echo $row->EmployeeId;
                if ($checkleavestatus == $row->EmployeeId)
                {

                    $attn = '<div style=" background-color:#4ddbff;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Leave">Leave</div>';
                }
                else
                {
                    if ($row->ctin < $time && $row->AttendanceDate == $today)
                    {
                        $attn = '<div style=" background-color:#f15353;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Absent">Absent</div>';
                    }
                }

                $data['status'] = $attn;
                $data['device'] = "-";

                if (Checkemplonleave($orgid, $row->EmployeeId) == $row->EmployeeId)
                {
                    $data['action'] = '-';
                }
                else
                {
                    if ($row->shifttype == 3 /* || $row->shifttype==1 */)
                    {
                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-60%">
                                  

                                  
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttsts"  
                                       data-id="' . $row->EmployeeId . '"
data-sid="' . $row->ShiftId . '"
data-areaid="' . $row->area . '"
data-desgid="' . $row->desg . '"
data-deptid="' . $row->dept . '"
data-shifttype="' . $row->shifttype . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                                 </ul>
             </div> ';

                    }
                    else
                    {

                        $data['action'] = '  <div class="dropdown">
                                 
                                   <!-- three dots -->
                                   <ul data-toggle="dropdown"
                                         aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       <li></li>
                                       <li></li>
                                       <li></li>
                                   </ul>
                                   <span class="caret"></span>
                                 
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-55%">
                                  

                                  
                                   <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttsk"  
                                       data-id="' . $row->EmployeeId . '"
data-sid="' . $row->ShiftId . '"
data-areaid="' . $row->area . '"
data-desgid="' . $row->desg . '"
data-deptid="' . $row->dept . '"
data-shifttype="' . $row->shifttype . '"
data-aname="' . getEmpName($row->EmployeeId) . '"
data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                        </li>

                              </ul>
             </div> ';

                    }
                }
                if ($row->shifttype == 3)
                {
                    $data['shift'] = '<span title="Shift Hours: ' . getFlexiShift($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

                }
                else
                {
                    $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                }
                $data['tif'] = "-";
                $res[] = $data;
            }

        }

        $d['data'] = $res;
        //print_r($d['data']);
        $this
            ->db
            ->close(); //$query->result();
        echo json_encode($d);
        return false;
    }

    public function getAbsent__new()
    {
        $org_id = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : 0;
        // echo $deprtid;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $res = array();
        $startdate = "";
        $enddate = "";
        $s = '';
        $s1 = '';
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            //echo $datestatus;
            if ($datestatus == 1)
            {
                // $enddate=date('Y-m-d');//,(strtotime ( "-1 day",strtotime(date('Y-m-d'))) ));
                $enddate = date('Y-m-d');
                //echo  $enddate;
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                
                
            }
            else
            {
                $enddate = date("Y-m-d");
                $startdate = date("Y-m-d");
            }
        }
        if ($shiftid != 0)
        {
            $s = " AND ShiftId='$shiftid' ";
            $s1 = " AND Shift='$shiftid' ";
        }
        if ($deprtid != 0)
        {
            $s .= " AND `Dept_id` = '$deprtid' ";
            $s1 .= " AND `Department`='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $s1 .= " AND E.Id='$emplid' ";
            $s .= "AND EmployeeId = '$emplid'";
        }
        if ($desgid != 0)
        {
            $s .= " AND `Desg_id`='$desgid' ";
            $s1 .= " AND `Designation`='$desgid' ";
        }
        if ($date != '')
        {
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
        $zname = getTimeZone($org_id);
        date_default_timezone_set($zname);
        $todate = date('Y-m-d');
        //date_default_timezone_set ($zname);
        $time = date("H:i:s");
        $i = 0;

        foreach ($dateRange as $date)
        {
            $range = $date->format('Y-m-d');
            $query = "";
            //print_r($range);
            //var_dump($range);
            if (strtotime($range) == strtotime($todate))
            {
				
                $query = $this
                    ->db
                    ->query("Select '-' as device, E.Id as EmployeeId,E.EmployeeCode,(CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='".$todate."' And ShiftPlanner.orgid=".$org_id." And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='".$todate."' And ShiftPlanner.orgid=".$org_id." And ShiftPlanner.empid=E.Id) ELSE E.Shift END) as newshift ,E.Shift as ShiftId ,'".$todate."' as AttendanceDate,(select disapp_sts from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='".$todate."' limit 1) as DisapproveStatus, (select disapp_reason from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='".$todate."' limit 1) as DisapproveReason, (select disapp_remark from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id AND Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='".$todate."' limit 1) as DisapproveRemark,E.ImageName,S.shifttype,S.TimeIn as ctin,E.area_assigned as area,E.Designation as desg,E.Department as dept,E.Gender FROM EmployeeMaster E,ShiftMaster S Where E.Id NOT IN (select A.EmployeeId From AttendanceMaster A where A.AttendanceDate= '".$todate."' AND A.OrganizationId= ".$org_id." AND AttendanceStatus IN (1,8,4)) And E.Id NOT IN (select L.EmployeeId From AppliedLeave L where L.Date = '".$todate."' AND L.OrganizationId=".$org_id." AND ApprovalStatus = 2) AND E.OrganizationId = ".$org_id." AND (CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='".$todate."' And ShiftPlanner.orgid=".$org_id." And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='".$todate."' And ShiftPlanner.orgid=".$org_id." And ShiftPlanner.empid=E.Id) ELSE E.Shift END) = S.Id AND S.TimeIn < '$time' $s1 AND E.archive = 1 And Is_Delete=0 group By EmployeeId");
               
                
            }
            else
            {

              

                $query = $this
                    ->db
                    ->query("Select A.device,E.Id,E.EmployeeCode,A.EmployeeId,A.AttendanceDate,A.ShiftId,(CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='".$todate."' And ShiftPlanner.orgid=".$org_id." And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='".$todate."' And ShiftPlanner.orgid=".$org_id." And ShiftPlanner.empid=E.Id) ELSE E.Shift END) as newshift ,(select disapp_sts from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='".$range."' limit 1) as DisapproveStatus, (select disapp_reason from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='".$range."' limit 1) as DisapproveReason, (select disapp_remark from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id AND Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='".$range."' limit 1) as DisapproveRemark,E.ImageName,S.shifttype,S.TimeIn as ctin,E.area_assigned as area,E.Designation as desg,E.Department as dept,E.Gender FROM AttendanceMaster A,EmployeeMaster E where A.AttendanceDate = '".$range."'  $s and A.AttendanceStatus in (2,7) AND E.Id=A.EmployeeId AND E.Is_Delete = 0  AND  A.OrganizationId = ".$org_id);

                //var_dump($this->db->last_query());
                // exit();
                
            }
            foreach ($query->result() as $row)
            {
                $data = array();
                $empid = $row->EmployeeId;
                $attdate = $row->AttendanceDate;

               
                $name = ucwords(getEmpName($row->EmployeeId));
                if ($name != "")
                {
                    $data['name'] = $name;

                    if ($row->ImageName)
                    {
                        $data['proimage'] = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1" data-id="' . $row->EmployeeId . '" data-enimage="' . $row->ImageName . '"><img src="' . IMGURL3 . "uploads/$org_id/" . $row->ImageName . '" style="object-fit:cover;width:42px!important;height:42px!important;border-radius:50%;" /> </i>';
                    }
                    else
                    {
                        if ($row->Gender == 1)
                        {
                            $data['proimage'] = '<img src="' . IMGURL3 . "avatars/male.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                        }
                        else
                        {
                            $data['proimage'] = '<img src="' . IMGURL3 . "avatars/female.png" . '" style="width:42px!important;height:42px!important;border-radius:50%" />';
                        }
                    }

                    $data['shifttype'] = "";
                    if ($row->shifttype == 1)
                    {
                        $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                    }
                    elseif ($row->shifttype == 2)
                    {
                        $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                    }
                    else
                    {
                        $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                    }

                    $data['code'] = "";
                    $data['date'] = date("M d,Y", strtotime($row->AttendanceDate));
                    $data['ti'] = "-";
                    $data['fti'] = "-";
                    $data['to'] = "-";
                    $data['fto'] = "-";
                    $data['tof'] = "-";
                    $data['timeindate'] = "-";
                    $data['timeoutdate'] = "-";
                    $data['ot'] = "-";
                    $data['entryimg'] = "-";
                    $data['exitimg'] = "-";
                    $data['positionlin'] = "-";
                    $data['positionout'] = "-";
                    $data['chiloc'] = "-";
                    $data['choloc'] = "-";
                    $data['wh'] = "-";
                    $data['timeoff'] = "-";
                    $data['tymincity'] = "-";
                    $data['tymoutcity'] = "-";
                    $data['TimeOutAppVersion'] = "-";
                    $data['TimeInAppVersion'] = "-";
                    $data['Platform'] = "-";

                    $attn = '';

                    $checkleavestatus = Checkemplonleave($org_id, $row->EmployeeId);
                    // echo $checkleavestatus."-";
                    // echo $row->EmployeeId;
                    if ($checkleavestatus == $row->EmployeeId)
                    {

                        $attn = '<div style=" background-color:#4ddbff;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Leave">Leave</div>';
                    }
                    else
                    {
                        if ($row->ctin < $time && $row->AttendanceDate == $todate)
                        {
                            $attn = '<div style=" background-color:#f15353;text-align:center;color:white;padding: 5px 20px 5px 20px;border-radius:100px;width:90%;font-size:13px;" title="Absent">Absent</div>';
                        }
                    }

                    $data['status'] = $attn;
                    $data['device'] = "-";

                    if (Checkemplonleave($org_id, $row->EmployeeId) == $row->EmployeeId)
                    {
                        $data['action'] = '-';
                    }
                    else
                    {
                        if ($row->shifttype == 3 /* || $row->shifttype==1 */)
                        {
                            $data['action'] = '  <div class="dropdown">
                                                     
                                                       <!-- three dots -->
                                                       <ul data-toggle="dropdown"
                                                             aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                                           <li></li>
                                                           <li></li>
                                                           <li></li>
                                                       </ul>
                                                       <span class="caret"></span>
                                                     
                                                     <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-60%">
                                                      

                                                      
                                                       <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttsts"  
                                                           data-id="' . $row->EmployeeId . '"
                    data-sid="' . $row->ShiftId . '"
                    data-areaid="' . $row->area . '"
                    data-desgid="' . $row->desg . '"
                    data-deptid="' . $row->dept . '"
                    data-shifttype="' . $row->shifttype . '"
                    data-aname="' . $empid . '"
                    data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                                            </li>

                                                     </ul>
                                 </div> ';

                        }
                        else
                        {

                            $data['action'] = '  <div class="dropdown">
                                                     
                                                       <!-- three dots -->
                                                       <ul data-toggle="dropdown"
                                                             aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                                           <li></li>
                                                           <li></li>
                                                           <li></li>
                                                       </ul>
                                                       <span class="caret"></span>
                                                     
                                                     <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem; height:3.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-55%">
                                                       <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addAttsk"  
                                                           data-id="' . $row->EmployeeId . '"
                    data-sid="' . $row->ShiftId . '"
                    data-areaid="' . $row->area . '"
                    data-desgid="' . $row->desg . '"
                    data-deptid="' . $row->dept . '"
                    data-shifttype="' . $row->shifttype . '"
                    data-aname="' . $empid . '"
                    data-attendancedate="' . $row->AttendanceDate . '";><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a>
                                                            </li>

                                                  </ul>
                                 </div> ';

                        }
                    }
                    if ($row->shifttype == 3)
                    {
                        $data['shift'] = '<span title="Shift Hours: ' . getFlexiShift($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';

                    }
                    else
                    {
                        $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                    }
                    $data['tif'] = "-";
                    $res[] = $data;
                }
            }
        }

        $d['data'] = $res; //$query->result();
        //print_r($d['data']);
        //die();
        $this
            ->db
            ->close();
        echo json_encode($d);
        return false;
    }

    public function getabsapprove($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $county = isset($_REQUEST['county']) ? $_REQUEST['county'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $dis1 = isset($_REQUEST['dis1']) ? $_REQUEST['dis1'] : 0;
        //echo $dis1;
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        //$today='2019-02-28';
        $q1 = '';
        if ($shiftid != 0)
        {
            $q1 .= " AND ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  desgid = '$desgid'";
        }
        if ($deptId != 0)
        {
            $q1 .= " AND deptid='$deptId' ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND EmployeeId = '$emplid'";
        }
        if ($county != 0)
        {
            $q1 .= " AND E.CurrentCountry = '$county'";
        }

        // if($dis1 != '')
        // {
        //   $q1.=" AND disapp_sts = '$dis1'";
        // }
        else if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            if ($datestatus == 1)
            {
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                $realEnd = new DateTime($enddate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }
            }
            else
            {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
                // $enddate=date("Y-m-d");
                //$startdate=date("Y-m-d");
                
            }

            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $searchValue = $postData['search']['value'];
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
            

            $searchQuery = "";
            if ($searchValue != '')
            {
                $searchQuery = " And (EmployeeName like '%" . $searchValue . "%' or EmployeeCode like '%" . $searchValue . "%') ";
            }

            $query = $this
                ->db
                ->query("SELECT count(*) as allcount FROM `Disapprove_approve` WHERE `OrganizationId`=$orgid And `AttendanceDate`In (" . $range . ")")->result();
            $totalRecords = $query[0]->allcount;

            if ($searchQuery != '') $query = $this
                ->db
                ->query("SELECT count(*) as allcount FROM  `Disapprove_approve` WHERE `OrganizationId`=$orgid And `AttendanceDate`In (" . $range . ") $searchQuery ")->result();
            $totalRecordwithFilter = $query[0]->allcount;

            if ($columnName == "name")
            {
                $columnName = "EmployeeName";
            }
            elseif ($columnName == "shift")
            {
                $columnName = "EmployeeName";
            }
            elseif ($columnName == "timeindate ")
            {
                $columnName = "TimeInDate";
            }
            elseif ($columnName == "ti ")
            {
                $columnName = "TimeIn";
            }
            elseif ($columnName == "to ")
            {
                $columnName = "TimeOut";
            }
            elseif ($columnName == "date ")
            {
                $columnName = "AttendanceDate";
            }
            else
            {
                $columnName = "EmployeeName";
            }

            $query = $this
                ->db
                ->query("SELECT `AttendanceId`,`EmployeeId`,`EmployeeCode`,`EmployeeName`,`ShiftId`,`AttendanceDate`,`TimeIn`,`TimeOut`,`TimeInDate`,`TimeOutDate`,`disapprove_datetime`,`approve_datetime`,`disapp_sts`,`disapp_reason`,`disapp_remark`,`approve_remark` FROM `Disapprove_approve` WHERE `OrganizationId`=? And `AttendanceDate`In (" . $range . ") $searchQuery ORDER BY $columnName $columnSortOrder Limit $start,$rowperpage", array(
                $orgid
            ));
            //var_dump($this->db->last_query());
            
        }
        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));

            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }
            //echo $range;
            $rangedate = $range;
            // var_dump($rangedate)
            

            if ($rangedate == "")
            {
                $rangedate = 1;
            }
            $searchQuery = "";
            $searchValue = "";

            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $searchValue = $postData['search']['value'];
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir'];

            if ($searchValue != '')
            {

                $searchQuery = "And (EmployeeName like '%" . $searchValue . "%' or EmployeeCode like '%" . $searchValue . "%')";
            }

            $query = $this
                ->db
                ->query("SELECT count(*) as allcount FROM `Disapprove_approve` WHERE `OrganizationId`=$orgid And `AttendanceDate`In (" . $range . ")")->result();
            $totalRecords = $query[0]->allcount;

            if ($searchQuery != '') $query = $this
                ->db
                ->query("SELECT count(*) as allcount FROM  `Disapprove_approve` WHERE `OrganizationId`=$orgid And `AttendanceDate`In (" . $range . ") $searchQuery ")->result();
            $totalRecordwithFilter = $query[0]->allcount;

            if ($columnName == "name")
            {
                $columnName = "EmployeeName";
            }
            elseif ($columnName == "shift")
            {
                $columnName = "EmployeeName";
            }
            elseif ($columnName == "timeindate ")
            {
                $columnName = "TimeInDate";
            }
            elseif ($columnName == "ti ")
            {
                $columnName = "TimeIn";
            }
            elseif ($columnName == "to ")
            {
                $columnName = "TimeOut";
            }
            elseif ($columnName == "date ")
            {
                $columnName = "AttendanceDate";
            }
            else
            {
                $columnName = "EmployeeName";
            }

            //between '$strt' and '$end'
            // echo  $rangedate;
            //, TIMEDIFF(CONCAT(A.timeoutdate,'   ',A.TimeOut) , CONCAT(A.AttendanceDate,'  ',A.TimeIn)) as Officehours
            $query = $this
                ->db
                ->query("SELECT `AttendanceId`,`EmployeeId`,`EmployeeCode`,`EmployeeName`,`ShiftId`,`AttendanceDate`,`TimeIn`,`TimeOut`,`TimeInDate`,`TimeOutDate`,`disapprove_datetime`,`approve_datetime`,`disapp_sts`,`disapp_reason`,`disapp_remark`,`approve_remark` FROM `Disapprove_approve` WHERE `OrganizationId`=? And `AttendanceDate`In (" . $rangedate . ") And disapp_sts IN (" . $dis1 . ") $q1 $searchQuery  ORDER BY $columnName $columnSortOrder,AttendanceDate DESC Limit $start,$rowperpage", array(
                $orgid
            ));
            //var_dump($this->db->last_query());
            
        }

        $d = array();
        $res = array();
        $response = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $data['ecode'] = $row->EmployeeCode;
            $data['name'] = $row->EmployeeName;
            $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours:' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
            $data['date'] = date("M d,Y", strtotime($row->AttendanceDate));

            $data['ti'] = substr($row->TimeIn, 0, 5);
            $data['to'] = substr($row->TimeOut, 0, 5);

            if ($row->TimeInDate == '0000-00-00')
            {
                $data['timeindate'] = '-';
            }
            else
            {
                $data['timeindate'] = date("d-m-Y", strtotime($row->TimeInDate));
            }

            if ($row->TimeOutDate == '0000-00-00')
            {
                $data['timeoutdate'] = '-';
            }
            else
            {
                $data['timeoutdate'] = date("d-m-Y", strtotime($row->TimeOutDate));
            }

            if ($row->disapprove_datetime == '0000-00-00 00:00:00')
            {
                $data['disapprovedatetime'] = "--";
            }
            else
            {
                $diappdate = date_create($row->disapprove_datetime);
                $data['disapprovedatetime'] = date_format($diappdate, "d-m-Y H:i:s");
            }

            if ($row->approve_datetime == '0000-00-00 00:00:00')
            {
                $data['approvedatetime'] = "--";
            }
            else
            {
                $appdate = date_create($row->approve_datetime);
                $data['approvedatetime'] = date_format($appdate, "d-m-Y H:i:s");
            }

            if ($row->disapp_reason != '')
            {
                $data['disapprovereason'] = $row->disapp_reason;
            }
            else
            {
                $data['disapprovereason'] = "--";
            }

            $data['disapproveremark'] = $row->disapp_remark;

            if ($row->approve_remark == '')
            {
                $data['approvedremark'] = "--";
            }
            else
            {
                $data['approvedremark'] = $row->approve_remark;
            }

            if ($row->disapp_sts == 0)
            {
                $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;"><i class="disapprove" data-toggle="modal" data-target="#ApproveAtt"  data-aid="' . $row->AttendanceId . '" data-aname="' . $row->EmployeeName . '" data-attdate="' . $row->AttendanceDate . '"  title="Approve Attendance" >
                
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5556 3.00031C17.8182 2.73766 18.13 2.52932 18.4732 2.38718C18.8164 2.24503 19.1842 2.17188 19.5556 2.17188C19.927 2.17187 20.2948 2.24503 20.638 2.38718C20.9812 2.52932 21.293 2.73766 21.5556 3.00031C21.8183 3.26296 22.0266 3.57476 22.1688 3.91793C22.3109 4.26109 22.3841 4.62889 22.3841 5.00033C22.3841 5.37177 22.3109 5.73957 22.1688 6.08273C22.0266 6.42589 21.8183 6.7377 21.5556 7.00035L8.0555 20.5005L2.55545 22.0005L4.05546 16.5004L17.5556 3.00031Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></i>
                    </svg></a>';
            }
            elseif ($row->disapp_sts == 2)
            {
                $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            }
            else
            {
                $data['action'] = '&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
            }

            $res[] = $data;
        }

        /* $d['data']=$res;
          //print_r($d['data']);
          $this->db->close();     //$query->result();
          echo json_encode($d);
          return false; */

        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );

        return $response;
    }

    public function getLatereport($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
		
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
        $q = '';
        if ($date == "")
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            /* var_dump($datestatus);
             die; */
            if ($datestatus == 1)
            {
                $date = date('Y-m-d');
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($date)));
                $q .= " AND A.AttendanceDate BETWEEN '$startdate' AND '$enddate'";
            }
        }
        else
        {
            $arr = explode('-', trim($date));
            $enddate = date('Y-m-d', strtotime($arr[1]));
            $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $q .= " AND A.AttendanceDate BETWEEN  '$startdate' AND '$enddate'";
        }

        if ($shiftid != 0)
        {
            $q .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deprtid != 0)
        {
            $q .= " AND A.Dept_id='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $q .= " AND A.EmployeeId = '$emplid'";
        }
        // if($county !=0)
        // {
        //  $q.=" AND E.CurrentCountry = '$county'";
        // }
        

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
        

        $searchQuery = "";
        if ($searchValue != '')
        {
            $searchQuery = " And (E.FirstName like '%" . $searchValue . "%' or D.Name like '%" . $searchValue . "%' or S.Name like '%" . $searchValue . "%' or DE.Name like '%" . $searchValue . "%') ";
        }

        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) $q And E.Is_Delete=0 And S.shifttype!=3 ")->result();
        $totalRecords = $query[0]->allcount;

        if ($searchQuery != '') $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) $q And E.Is_Delete=0 $searchQuery And S.shifttype!=3 AND A.Desg_id=D.Id AND A.Dept_id = DE.Id ")->result();
        $totalRecordwithFilter = $query[0]->allcount;
        //var_dump($this->db->last_query());
        

        if ($columnName == "Name")
        {
            $columnName = "A.AttendanceDate";
        }
        elseif ($columnName == "date")
        {
            $columnName = "A.AttendanceDate";
        }
        elseif ($columnName == "desg ")
        {
            $columnName = "D.Name";
        }
        elseif ($columnName == "depart ")
        {
            $columnName = "DE.Name";
        }
        else
        {
            $columnName = "A.AttendanceDate";
        }

        $query = $this
            ->db
            ->query("SELECT E.FirstName,E.EmployeeCode,A.`EmployeeId`,A.`AttendanceDate`,S.TimeInGrace as stimeingrace,A.TimeIn as atimein,A.TimeOut as atimeout,S.TimeIn as stimein,S.TimeOut as stimeout,A.device,TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) as latehours,A.`ShiftId`,A.`Dept_id`,A.`Desg_id` FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE E.Id=A.EmployeeId $searchQuery And S.Id=A.`ShiftId` And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) $q And E.Is_Delete=0 And S.shifttype!=3 AND A.Desg_id=D.Id AND A.Dept_id = DE.Id ORDER BY $columnName $columnSortOrder,E.FirstName ASC Limit $start,$rowperpage");

        //var_dump($this->db->last_query());
        //die();
        $d = array();
        $res = array();
        $response = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords(getEmpName($row->EmployeeId));
            if ($name != "")
            {
                $data['Name'] = $name;
                $data['code'] = $row->EmployeeCode;
                $data['date'] = date('M d,Y', strtotime($row->AttendanceDate));
                $data['TimeIn'] = substr(($row->atimein) , 0, 5);
                $data['TimeOut'] = substr(($row->atimeout) , 0, 5);

                //$data['Totaltime']=substr(($row->latehours),0,5);
                //$a = new DateTime(substr (getShiftTimes($row->ShiftId),0,5));
                //$c = new DateTime($row->stimeingrace);
                //$b = new DateTime($row->atimein);
                //$interval = "";
                //if($row->stimeingrace = "00:00:00")
                //{
                //$interval =$b->diff($c);
                //}
                //else
                //{
                //$interval =$c->diff($a);
                //}
                $data['LateHours'] = substr(($row->latehours) , 0, 5);
                // $Tio=getShiftTimes($row->ShiftId);
                $data['desg'] = ucwords(getDesignation($row->Desg_id));
                $Tio = getShiftTimes($row->ShiftId);
                $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                $data['depart'] = ucwords(getDepartment($row->Dept_id));
                $data['device'] = $row->device;
                $res[] = $data;
            }
        }

        $d['data'] = $res;

        $this
            ->db
            ->close(); //$query->result();
        //echo json_encode($d); return false;
        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );

        return $response;
    }

    public function getearlyreport($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';

        $q = '';
        if ($date == "")
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            if ($datestatus == 1)
            {
                $date = date('Y-m-d');
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($date)));
                $q .= " AND A.AttendanceDate BETWEEN '$startdate' AND '$enddate'";
            }
        }
        else
        {
            $arr = explode('-', trim($date));
            $enddate = date('Y-m-d', strtotime($arr[1]));
            $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $q .= " AND A.AttendanceDate BETWEEN  '$startdate' AND '$enddate'";
        }

        if ($shiftid != 0)
        {
            $q .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deprtid != 0)
        {
            $q .= " AND A.Dept_id='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $q .= " AND A.EmployeeId = '$emplid'";
        }
        // if($county !=0)
        // {
        //  $q.=" AND E.CurrentCountry = '$county'";
        // }
        

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        // $searchByName = $postData['searchByName'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
        

        $searchQuery = "";

        if ($searchValue != '')
        {
            $searchQuery = "  And (FirstName like '%" . $searchValue . "%' or D.Name like '%" . $searchValue . "%' or S.Name like '%" . $searchValue . "%' or DE.Name like '%" . $searchValue . "%') ";
        }

        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=$orgid And E.Is_Delete=0 $q And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.TimeOut!='00:00:00' And S.shifttype!=3  ")->result();
        $totalRecords = $query[0]->allcount;

        if ($searchQuery != '') $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=$orgid And E.Is_Delete=0 $q And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.TimeOut!='00:00:00' AND A.Desg_id=D.Id AND A.Dept_id=DE.Id $searchQuery And S.shifttype!=3    ")->result();
        $totalRecordwithFilter = $query[0]->allcount;

        if ($columnName == "Name")
        {
            $columnName = "A.AttendanceDate";
        }
        elseif ($columnName == "date")
        {
            $columnName = "A.AttendanceDate";
        }
        elseif ($columnName == "desg ")
        {
            $columnName = "D.Name";
        }
        elseif ($columnName == "depart ")
        {
            $columnName = "DE.Name";
        }
        else
        {
            $columnName = "A.AttendanceDate";
        }
        $query = $this
            ->db
            ->query("SELECT E.EmployeeCode,D.Name,A.device,A.`EmployeeId`,A.`AttendanceDate`,A.`ShiftId`,A.`Dept_id`,A.`Desg_id`,S.shifttype,A.`timeindate`,A.`timeoutdate`,S.TimeOutGrace,S.TimeIn as stimein,A.`TimeIn` as atimein,S.TimeOut as stimeout,A.`TimeOut` as atimeout, (CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END) as earlyleaver FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=$orgid And E.Is_Delete=0 $q And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.TimeOut!='00:00:00' AND A.Desg_id=D.Id AND A.Dept_id=DE.Id $searchQuery And S.shifttype!=3 ORDER BY $columnName $columnSortOrder,E.FirstName ASC  Limit $start,$rowperpage");

        //var_dump($this->db->last_query());
        //die();
        $d = array();
        $res = array();
        $response = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords(getEmpName($row->EmployeeId));
            if ($name != "")
            {
                $data['Name'] = $name;
                $data['code'] = $row->EmployeeCode;
                $data['date'] = date('M d,Y', strtotime($row->AttendanceDate));
                //$data['TimeIn']=substr(($row->atimein),0,5);
                $data['TimeOut'] = substr(($row->atimeout) , 0, 5);
                if ($row->shifttype == 2)
                {
                    $data['EarlyHours'] = substr(($row->earlyleaver) , 0, 5);
                }
                else
                {
                    $data['EarlyHours'] = substr(($row->earlyleaver) , 0, 5);
                }
                $Tio = getShiftTimes($row->ShiftId);
                $data['desg'] = ucwords(getDesignation($row->Desg_id));
                $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                $data['depart'] = ucwords(getDepartment($row->Dept_id));
                $data['device'] = $row->device;
                $res[] = $data;
            }
        }

        $d['data'] = $res;
        $this
            ->db
            ->close(); //$query->result();
        //echo json_encode($d); return false;
        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        return $response;
    }

    public function getovertimereport($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
        $q = '';
        if ($date == "")
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            if ($datestatus == 1)
            {
                $date = date('Y-m-d');
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($date)));
                $q .= " AND A.AttendanceDate BETWEEN '$startdate' AND '$enddate'";
            }
        }
        else
        {
            $arr = explode('-', trim($date));
            $enddate = date('Y-m-d', strtotime($arr[1]));
            $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $q .= " AND A.AttendanceDate BETWEEN  '$startdate' AND '$enddate'";
        }

        if ($shiftid != 0)
        {
            $q .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deprtid != 0)
        {
            $q .= " AND A.Dept_id='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $q .= " AND A.EmployeeId = '$emplid'";
        }
        // if($county !=0)
        // {
        //  $q.=" AND E.CurrentCountry = '$county'";
        // }
        // $query=$this->db->query("SELECT A.`EmployeeId`,A.Id,E.EmployeeCode,E.FirstName,A.`ShiftId`,A.`Dept_id`,A.`Desg_id`,A.`AttendanceDate`,A.`timeindate`,A.`timeoutdate`,A.TimeIn,A.TimeOut,TIMEDIFF(A.`TimeOut`,A.`TimeIn`) adiff, TIMEDIFF(S.TimeOut,S.TimeIn) as sdiff, (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN ((CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN SUBTIME(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(S.TimeOut,S.TimeIn)) ELSE SUBTIME(TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`),CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`)),TIMEDIFF(S.TimeOut,S.TimeIn)) END)) ELSE ('00:00:00') END) END) as overtime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`=10 And E.Is_Delete=0 And A.`AttendanceDate` BETWEEN "2020-08-01" And "2020-08-28" And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And (CASE WHEN(S.shifttype=3) THEN ((TIME_TO_SEC(A.TotalLoggedHours)) > (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(S.TimeOut,S.TimeIn)))  ELSE (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(S.TimeOut,S.TimeIn))) END) END) Order By A.AttendanceDate desc");
        

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
        

        $searchQuery = "";
        if ($searchValue != '')
        {
            $searchQuery = " And (E.FirstName like '%" . $searchValue . "%' or D.Name like '%" . $searchValue . "%' or S.Name like '%" . $searchValue . "%' or DE.Name like '%" . $searchValue . "%' or E.EmployeeCode like '%" . $searchValue . "%') ";
        }

        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 $q And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) > (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END)")->result();
        $totalRecords = $query[0]->allcount;

        if ($searchQuery != '') $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.Desg_id=D.Id AND A.Dept_id=DE.Id AND  E.Id=A.`EmployeeId` $searchQuery And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 $q And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) > (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END) ")->result();
        $totalRecordwithFilter = $query[0]->allcount;

        if ($columnName == 'date')
        {

            $columnName = 'A.AttendanceDate';
        }
        elseif ($columnName = 'Name')
        {
            $columnName = 'A.AttendanceDate';
        }
        else
        {
            $columnName = 'A.AttendanceDate';
        }

        $query = $this
            ->db
            ->query("SELECT A.`TotalLoggedHours`,A.`EmployeeId`,A.Id,E.EmployeeCode,if(E.LastName!='',CONCAT(E.FirstName,' ',E.LastName),E.FirstName) as Name,A.`ShiftId`,A.`Dept_id`,A.`Desg_id`,A.`AttendanceDate`,A.`timeindate`,A.`timeoutdate`,A.TimeIn,A.TimeOut, (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as overtime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.Desg_id=D.Id AND A.Dept_id=DE.Id AND E.Id=A.`EmployeeId` $searchQuery And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 $q And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) > (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END) ORDER By $columnName $columnSortOrder,E.FirstName ASC Limit $start,$rowperpage");

        //var_dump($this->db->last_query());
        //die();
        $d = array();
        $res = array();
        $response = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords($row->Name);
            if ($name != "")
            {
                $data['Name'] = $name;
                $data['code'] = $row->EmployeeCode;
                $data['date'] = date('M d,Y', strtotime($row->AttendanceDate));
                //$data['TimeIn']=substr(($row->atimein),0,5);
                //$data['TimeOut']=substr(($row->atimeout),0,5);
                $data['Overtime'] = substr(($row->overtime) , 0, 5);

                $data['desg'] = ucwords(getDesignation($row->Desg_id));
                $data['shifttype'] = "";
                $shiftype = getShiftType($row->ShiftId);
                // echo $shiftype;
                //  die();
                if ($shiftype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($shiftype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                if ($shiftype == 3)
                {
                    $Tio = getFlexiShift($row->ShiftId);
                    $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                }
                else
                {
                    $Tio = getShiftTimes($row->ShiftId);
                    $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                }

                $data['depart'] = ucwords(getDepartment($row->Dept_id));
                //$data['device']=$row->device;
                $res[] = $data;
            }
        }

        $d['data'] = $res;

        $this
            ->db
            ->close(); //$query->result();
        //echo json_encode($d); return false;
        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );

        return $response;
    }

    public function getundertimereport($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
        $q = '';
        if ($date == "")
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            if ($datestatus == 1)
            {
                $date = date('Y-m-d');
                $enddate = date('Y-m-d');
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($date)));
                $q .= " AND A.AttendanceDate BETWEEN '$startdate' AND '$enddate'";
            }
        }
        else
        {
            $arr = explode('-', trim($date));
            $enddate = date('Y-m-d', strtotime($arr[1]));
            $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $q .= " AND A.AttendanceDate BETWEEN  '$startdate' AND '$enddate'";
        }

        if ($shiftid != 0)
        {
            $q .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deprtid != 0)
        {
            $q .= " AND A.Dept_id='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $q .= " AND A.EmployeeId = '$emplid'";
        }
        // if($county !=0)
        // {
        //  $q.=" AND E.CurrentCountry = '$county'";
        // }
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
        

        $searchQuery = "";
        if ($searchValue != '')
        {
            $searchQuery = " And (E.FirstName like '%" . $searchValue . "%' or D.Name like '%" . $searchValue . "%' or S.Name like '%" . $searchValue . "%' or DE.Name like '%" . $searchValue . "%' or E.EmployeeCode like '%" . $searchValue . "%') ";
        }

        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 $q And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) < (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END)")->result();
        $totalRecords = $query[0]->allcount;

        if ($searchQuery != '') $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.Dept_id=DE.Id AND A.Desg_id=D.Id AND E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' $searchQuery And E.Is_Delete=0 $q And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) < (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END) ")->result();
        $totalRecordwithFilter = $query[0]->allcount;

        if ($columnName == 'date')
        {
            $columnName = 'A.AttendanceDate';
        }
        elseif ($columnName == 'FirstName')
        {
            $columnName = 'A.AttendanceDate';
        }
        else
        {
            $columnName = 'A.AttendanceDate';
        }

        $query = $this
            ->db
            ->query("SELECT A.`TotalLoggedHours`,A.`EmployeeId`,A.Id,E.EmployeeCode,if(E.LastName!='',CONCAT(E.FirstName,' ',E.LastName),E.FirstName) as Name,A.`ShiftId`,A.`Dept_id`,A.`Desg_id`,A.`AttendanceDate`,A.`timeindate`,A.`timeoutdate`,A.TimeIn,A.TimeOut, (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as undertime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.Dept_id=DE.Id  AND A.Desg_id=D.Id AND E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' $searchQuery And E.Is_Delete=0 $q And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) < (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END) ORDER By $columnName $columnSortOrder,E.FirstName ASC limit $start,$rowperpage");

        //var_dump($this->db->last_query());
        //die();
        $d = array();
        $res = array();
        $response = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords($row->Name);
            if ($name != "")
            {
                $data['FirstName'] = $name;
                $data['code'] = $row->EmployeeCode;
                $data['date'] = date('M d,Y', strtotime($row->AttendanceDate));
                //$data['TimeIn']=substr(($row->atimein),0,5);
                //$data['TimeOut']=substr(($row->atimeout),0,5);
                $data['Undertime'] = substr(($row->undertime) , 1, 5);

                $data['desg'] = ucwords(getDesignation($row->Desg_id));
                $data['shifttype'] = "";
                $shiftype = getShiftType($row->ShiftId);
                // echo $shiftype;
                //  die();
                if ($shiftype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($shiftype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                if ($shiftype == 3)
                {
                    $Tio = getFlexiShift($row->ShiftId);
                    $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                }
                else
                {
                    $Tio = getShiftTimes($row->ShiftId);
                    $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                }
                $data['depart'] = ucwords(getDepartment($row->Dept_id));
                //$data['device']=$row->device;
                $res[] = $data;
            }
        }

        $d['data'] = $res;

        $this
            ->db
            ->close(); //$query->result();
        //echo json_encode($d); return false;
        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        return $response;
    }

    public function getnotsyncdata($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;


        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // 
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc

        

        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        //$today='2019-02-28';
        $q1 = '';
        if ($shiftid != 0)
        {
            $q1 .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deptId != 0)
        {
            $q1 .= " AND A.Dept_id='$deptId' ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }

        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            //$datestatus = '';
            if ($datestatus == 1)
            {
                //$datestatus = isset($_REQUEST['datestatus'])?$_REQUEST['datestatus']:0;
                // echo $datestatus;
                // exit();
                //$range = "";
                $enddate = date("Y-m-d");
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                //echo $startdate.''.$enddate;
                //exit();
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                $realEnd = new DateTime($enddate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }

            }
            else
            {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
                // $enddate=date("Y-m-d");
                //$startdate=date("Y-m-d");
                
            }


            $searchQuery = "";
				 	
            if($searchValue != ''){
            $searchQuery = "  And (e.FirstName like '%".$searchValue."%') ";
            
            }
            
            $query = $this->db->query("select a.Id, a.EmployeeId,DATE(a.OfflineMarkedDate) as atd,a.OrganizationId, DATE(a.SyncDate) AS synd,a.Time,a.image,a.Action,a.Latitude,a.Longitude,a.ReasonForFailure,a.FakeLocationStatus,c.Addon_offline_mode,e.area_assigned  from  OfflineAttendanceNotSynced a, licence_ubiattendance c, EmployeeMaster e where a.OrganizationId=? and  a.EmployeeId = e.Id and c.Addon_offline_mode = 1 AND e.Is_Delete = '0' And DATE(a.SyncDate) IN ( " . $range . " ) and e.OrganizationId = ? $q1 GROUP BY Id  ", array($orgid,$orgid));
            $totalRecords = $query->num_rows();
            
            if($searchQuery != '')
            $query = $this->db->query("select a.Id, a.EmployeeId,DATE(a.OfflineMarkedDate) as atd,a.OrganizationId, DATE(a.SyncDate) AS synd,a.Time,a.image,a.Action,a.Latitude,a.Longitude,a.ReasonForFailure,a.FakeLocationStatus,c.Addon_offline_mode,e.area_assigned  from  OfflineAttendanceNotSynced a, licence_ubiattendance c, EmployeeMaster e where a.OrganizationId=? and  a.EmployeeId = e.Id and c.Addon_offline_mode = 1 AND e.Is_Delete = '0' And DATE(a.SyncDate) IN ( " . $range . " ) and e.OrganizationId = ? $q1 GROUP BY Id  ", array($orgid,$orgid));
            $totalRecordwithFilter = $query->num_rows();
           // var_dump($totalRecordwithFilter);
           // die()
            
            
            $query = $this->db->query("select a.Id, a.EmployeeId,DATE(a.OfflineMarkedDate) as atd,a.OrganizationId, DATE(a.SyncDate) AS synd,a.Time,a.image,a.Action,a.Latitude,a.Longitude,a.ReasonForFailure,a.FakeLocationStatus,c.Addon_offline_mode,e.area_assigned  from  OfflineAttendanceNotSynced a, licence_ubiattendance c, EmployeeMaster e where a.OrganizationId=? and  a.EmployeeId = e.Id and c.Addon_offline_mode = 1 AND e.Is_Delete = '0' And DATE(a.SyncDate) IN ( " . $range . " ) and e.OrganizationId = ? $q1 GROUP BY Id  ", array($orgid,$orgid));
            
    

           

            // var_dump($this->db->last_query());
            
        }

        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));

            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }
            //echo $range;
            //exit();
            $rangedate = $range;
            // var_dump($rangedate)
            

            if ($rangedate == "")
            {
                $rangedate = 1;
            }


            $searchQuery = "";
				 	
        if($searchValue != ''){
        $searchQuery = "  And (S.Name like '%".$searchValue."%') ";
        
        }
        
        $query = $this->db->query("select a.Id,a.EmployeeId,DATE(a.OfflineMarkedDate) as atd,a.image,a.OrganizationId, DATE(a.SyncDate) AS synd,a.Time,a.Action,a.Latitude,a.Longitude,a.ReasonForFailure,a.FakeLocationStatus,c.Addon_offline_mode,e.area_assigned  from  OfflineAttendanceNotSynced a, licence_ubiattendance c, EmployeeMaster e where a.OrganizationId=? and a.EmployeeId = e.Id and c.Addon_offline_mode = 1 And DATE(a.SyncDate) IN ( " . $range . " ) and e.OrganizationId = ? $q1 GROUP BY Id  ", array($orgid,$orgid));
        $totalRecords = $query->num_rows();
        
        if($searchQuery != '')
        $query = $this->db->query("select a.Id,a.EmployeeId,DATE(a.OfflineMarkedDate) as atd,a.image,a.OrganizationId, DATE(a.SyncDate) AS synd,a.Time,a.Action,a.Latitude,a.Longitude,a.ReasonForFailure,a.FakeLocationStatus,c.Addon_offline_mode,e.area_assigned  from  OfflineAttendanceNotSynced a, licence_ubiattendance c, EmployeeMaster e where a.OrganizationId=? and a.EmployeeId = e.Id and c.Addon_offline_mode = 1 And DATE(a.SyncDate) IN ( " . $range . " ) and e.OrganizationId = ? $q1 GROUP BY Id  ", array($orgid,$orgid));
        $totalRecordwithFilter = $query->num_rows(); 
       // var_dump($totalRecordwithFilter);
       // die()
		
		
        $query = $this->db->query("select a.Id,a.EmployeeId,DATE(a.OfflineMarkedDate) as atd,a.image,a.OrganizationId, DATE(a.SyncDate) AS synd,a.Time,a.Action,a.Latitude,a.Longitude,a.ReasonForFailure,a.FakeLocationStatus,c.Addon_offline_mode,e.area_assigned  from  OfflineAttendanceNotSynced a, licence_ubiattendance c, EmployeeMaster e where a.OrganizationId=? and a.EmployeeId = e.Id and c.Addon_offline_mode = 1 And DATE(a.SyncDate) IN ( " . $range . " ) and e.OrganizationId = ? $q1 GROUP BY Id  ", array($orgid,$orgid));
        }


        //var_dump($this->db->last_query());
		//die;
        $d = array();
        $res = array();

        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords(getEmpName($row->EmployeeId));

            if ($name != "")
            {
                //$ff=$this->fetchWeeklyOff($row->ShiftId);
                //print_r($ff);
                $data['name'] = $name;
            }
            $data['syncdate'] = date("M d,Y", strtotime($row->synd));
            $data['Attendancedate'] = date("M d,Y", strtotime($row->atd));
            $data['time'] = substr($row->Time, 0, 5);
            $data['image'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="' . $row->EmployeeId . '" data-eximage="' . $row->image . '"><img src="' . $row->image . '" style="width:60px!important;height:80px;object-fit:cover; "/></i>';
            $data['location'] = "";
            $data['chiloc'] = "";
            if ($row->area_assigned != 0)
            {
                $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->area_assigned);
                $radius = getName('Geo_Settings', 'Radius', 'Id', $row->area_assigned);
                $arr1 = explode(",", $lat_lang);
                //echo '----------'.count($arr1);
                if (count($arr1) > 1)
                {
                    $a = floatval($arr1[0]);
                    $b = floatval($arr1[1]);
                    $d1 = $this->distance($a, $b, $row->Latitude, $row->Longitude, "K");
                    // $d2 = $this->distance($a,$b, $row->latit_out, $row->longi_out, "K");
                    if ($row->FakeLocationStatus == 1)
                    {
                        $data['location'] = '<div title="Location recorded maliciously" class="text-center"  data-background-color="red">Fake Location</div>';
                    }
                    else if ($d1 <= $radius)
                    {
                        $data['location'] = '<div title="Attendance marked from assigned area" class="text-center"  data-background-color="green">Within the Location</div>';
                    }
                    else
                    {
                        $data['location'] = '<div title="Attendance marked from Outside the assigned area" class="text-center"  data-background-color="red"> Outside the Location</div>';
                    }
                }
            }
            if ($row->FakeLocationStatus == 1)
            {
                $data['chiloc'] = '<a style="font-size:11px;" href="http://maps.google.com/?q=' . $row->Latitude . ',' . $row->Longitude . '" target="_blank" title="' . $row->Latitude . ' , ' . $row->Longitude . '">' . $row->Latitude . ' , ' . $row->Longitude . $data['location'] . '</a>';
            }

            else
            {
                $data['chiloc'] = '<a style="font-size:11px;" href="http://maps.google.com/?q=' . $row->Latitude . ',' . $row->Longitude . '" target="_blank" title="' . $row->Latitude . ' , ' . $row->Longitude . '">' . $row->Latitude . ' , ' . $row->Longitude . $data['location'] . '</a>';
            }
            // if($d1 <= $radius)
            // {
            // $data['chiloc'] = '<a style="font-size:11px;" href="http://maps.google.com/?q='.$row->Latitude.','.$row->Longitude.'" target="_blank" title="'.$row->Latitude.' , '.$row->Longitude.'">'.$row->Latitude.' , '.$row->Longitude .$data['location'].'</a>';
            // }
            // else
            // {
            // $data['chiloc'] = '<a style="font-size:11px;" href="http://maps.google.com/?q='.$row->Latitude.','.$row->Longitude.'" target="_blank" title="'.$row->Latitude.' , '.$row->Longitude.'">'.$row->Latitude.' , '.$row->Longitude .$data['location'].'</a>';
            // }
            //}
            //}
            // $data['action']="";
            if ($row->Action == 0)
            {
                $data['action'] = '<div title="Time In"class="text-center"  data-background-color="green"> Time In </div>';
            }
            else
            {
                $data['action'] = '<div title="Time In"class="text-center"  data-background-color="red"> Time Out </div>';
            }

            $data['failure_reason'] = $row->ReasonForFailure;

            // var_dump($data);
            

            $res[] = $data;

        }

        $d['data'] = $res;
		//return $d;
        $this->db->close();
	    $response = array(
        "draw" => intval($draw) ,
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $res
    );
        //echo json_encode($d);
        return $response;

    }

    public function Timeoffreport($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
        $q = "";
        if ($date == '')
        {
            $enddate = date("Y-m-d");
            $startdate = date('Y-m-d', (strtotime('0 day', strtotime(date('Y-m-d')))));

            $q = " AND  `TimeofDate` BETWEEN  '$startdate' AND '$enddate' ";
        }
        else
        {
            $enddate = date('Y-m-d');
            $startdate = date('Y-m-d');
        }
        if ($deprtid != 0)
        {

            $q .= " AND  EmployeeId IN( SELECT `Id` FROM `EmployeeMaster` 
        WHERE `Department` = '$deprtid' ) ";
        }
        if ($shiftid != 0)
        {

            $q .= " AND  EmployeeId IN( SELECT `Id` FROM `EmployeeMaster` 
        WHERE `Shift` = '$shiftid' ) ";
        }

        if ($desgid != 0)
        {
            $q .= " AND  EmployeeId IN( SELECT `Id` FROM `EmployeeMaster` 
        WHERE `Designation` = '$desgid' ) ";
        }

        if ($emplid != 0)
        {
            $q .= " AND `EmployeeId`='$emplid' ";
        }
        if ($date != '')
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));

            $q .= " AND `TimeofDate` BETWEEN  '$strt' AND '$end' ";
        }

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        /* $columnIndex = $postData['order'][0]['column']; // Column index
          $columnName = $postData['columns'][$columnIndex]['data']; // Column name
          $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
        */

        $searchQuery = "";
        if ($searchValue != '')
        {
            $searchQuery = " And (E.FirstName like '%" . $searchValue . "%' or T.Reason like '%" . $searchValue . "%' or T.locationin like '%" . $searchValue . "%' or T.locationout like '%" . $searchValue . "%') ";
        }

        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `Timeoff` T,EmployeeMaster E  WHERE T.OrganizationId =$orgid AND  E.Id=T.EmployeeId $q  AND E.Is_Delete = '0'")->result();
        $totalRecords = $query[0]->allcount;

        if ($searchQuery != '') $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `Timeoff` T,EmployeeMaster E  WHERE T.OrganizationId =$orgid AND  E.Id=T.EmployeeId $q $searchQuery AND E.Is_Delete = '0' ")->result();
        $totalRecordwithFilter = $query[0]->allcount;

        if ($deprtid == 0 && $shiftid == 0 && $desgid == 0 && $emplid == 0)
        {
            $sql = "SELECT E.EmployeeCode,T.EmployeeId,T.ApprovalSts,T.TimeofDate,T.TimeFrom,T.TimeTo,T.Reason,T.locationin,T.locationout FROM `Timeoff` T,EmployeeMaster E  WHERE T.OrganizationId =? AND  E.Id=T.EmployeeId   AND $searchQuery E.Is_Delete = '0'  limit $start,$rowperpage  ";
        }

        $sql = "SELECT   E.EmployeeCode, E.Shift,T.EmployeeId,T.ApprovalSts,T.TimeofDate,T.TimeFrom,T.TimeTo, T.Reason  ,TIMEDIFF(T.`TimeTo`,T.`TimeFrom`) AS stype,T.locationin,T.locationout FROM `Timeoff` T,EmployeeMaster E WHERE T.OrganizationId =?  AND E.Id=T.EmployeeId $q $searchQuery AND E.Is_Delete = '0' limit $start,$rowperpage  ";

        $query = $this
            ->db
            ->query($sql, array(
            $orgid
        ));

        //echo $sql;
        $d = array();
        $res = array();
        $response = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords(getEmpName($row->EmployeeId));
            if ($name != "")
            {
                $data['Name'] = $name;
                $data['code'] = $row->EmployeeCode;
                //  $data['device']=   $row->device;
                $data['date'] = date('M d,Y', strtotime($row->TimeofDate));
                $data['TimeFrom'] = substr(($row->TimeFrom) , 0, 5);
                $data['locationin'] = $row->locationin;
                $data['locationout'] = $row->locationout;
                $data['TimeTo'] = substr(($row->TimeTo) , 0, 5);

                //if(strtotime($row->TimeTo) > strtotime($row->TimeFrom))
                // $data['Totaltime']="";
                if ($row->TimeTo == '00:00:00')
                {
                    $data['Totaltime'] = "00:00";
                }
                else
                {
                    $data['Totaltime'] = substr(($row->stype) , 0, 5);
                }
                $data['Reason'] = $row->Reason;
                if ($data['Reason'] == '')
                {
                    $data['Reason'] = "Not given";
                }
                $sts = $row->ApprovalSts;
                $type = "LeaveStatus";
                $sql1 = $this
                    ->db
                    ->query("select DisplayName FROM OtherMaster WHERE OtherType=? AND ActualValue=?", array(
                    $type,
                    $sts
                ));
                foreach ($sql1->result() as $row1)
                {
                    $data['approsts'] = $row1->DisplayName;
                }

                //$a = new DateTime(substr (getShiftTimes($row->ShiftId),0,5));
                // $b = new DateTime($row->TimeIn);
                // $interval = $a->diff($b);
                //  $data['LateHours']=$interval->format("%H:%I");
                $data['desg'] = ucwords(getDesignationByEmpID($row->EmployeeId));
                $data['shifttype'] = "";
                $ShiftId = $row->Shift;
                // echo $ShiftId;
                // die();
                $shiftype = getShiftType($ShiftId);
                // echo $shiftype;
                //  die();
                if ($shiftype == 1)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
                }
                elseif ($shiftype == 2)
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
                }
                else
                {
                    $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
                }
                if ($shiftype == 3)
                {
                    $Tio = getFlexiShift($ShiftId);
                    $data['shift'] = getShift($ShiftId) . " (" . $Tio . ")";
                }
                else
                {
                    $Tio = getShiftTimeByEmpID($row->EmployeeId);
                    $data['shift'] = ucwords(getShiftByEmpID($row->EmployeeId)) . " (" . $Tio . ")";
                }

                $data['depart'] = ucwords(getDepartmentByEmpID($row->EmployeeId));
                $res[] = $data;
            }
        }
        $d['data'] = $res;
        $this
            ->db
            ->close();
        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        return $response;
        //$query->result();
        //echo json_encode($d); return false;
        
    }

    public function getregister($Data = Null)
    {
        $orgid = $_SESSION['orgid'];

        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : "";
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $desg = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
        $dept = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : '';

        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $area = isset($_REQUEST['area']) ? $_REQUEST['area'] : '';

        // var_dump($emplid);
        // var_dump($date);
        // var_dump($orgid);
        //$desgid=isset($_REQUEST['desg'])?$_REQUEST['desg']:'';
        // $zname=getTimeZone($orgid);
        // date_default_timezone_set ($zname);
        $q = "";
        $startdate = '';
        $enddate = '';
        $res = array();
        //$res = [];
        //new
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        $time = date("H:i:s");
        //new
        ///define array you can also define by "array();"
        // var_dump($startdate);
        $response = [];
        if ($date != '')
        {
            $arr = explode('-', trim($date));

            $enddate = date('Y-m-d', strtotime($arr[1]));
            $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $q = "and A.AttendanceDate BETWEEN  '$startdate' AND '$enddate' ";
        }
        else
        {
            $zname = getTimeZone($orgid);
            date_default_timezone_set($zname);
            $today = date("Y-m-d");
            $q = " AND  A.`AttendanceDate` =  '$today' ";
        }
        if ($emplid != 0)
        {

            $q .= " AND  A.EmployeeId = '$emplid' ";
        }

        if ($desg != 0)
        {

            $q .= " AND  A.Desg_id = '$desg' ";
        }
		 if ($dept != 0)
        {

            $q .= " AND  A.Dept_id = '$dept' ";
        }

        if ($area != 0)
        {

            $q .= " AND  A.areaId = '$area' ";
        }

        if ($shiftid != 0)
        {
            $q .= " AND A.ShiftId='$shiftid' ";
        }

        $draw = $Data['draw'];
        $start = $Data['start'];
        $rowperpage = $Data['length'];
        $searchValue = $Data['search']['value'];

        $columnIndex = $Data['order'][0]['column'];
        $columnName = $Data['columns'][$columnIndex]['data'];
        $columnSortOrder = $Data['order'][0]['dir'];
        // $totalRecords='';
        

        $searchQuery = "";
        if ($searchValue != '')
        {
            //$searchQuery = "select Id, CONCAT(FirstName,' ',LastName)AS name,Designation, Shift FROM EmployeeMaster WHERE OrganizationId =? $q1 AND DOL='0000-00-00' ORDER BY Designation";
            // $searchQuery = "  And (E.FirstName like '%".$searchValue."%' or D.Name like '%".$searchValue."%' or S.Name like '%".$searchValue."%') ";
            $searchQuery = "  And (E.FirstName like '%" . $searchValue . "%' or D.Name like '%" . $searchValue . "%' or S.Name like '%" . $searchValue . "%' or A.areaId like '%" . $searchValue . "%') ";
        }
        //A.areaId FROM AttendanceMaster A
        // new
        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=$orgid And E.Is_Delete=0 $q And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.TimeOut!='00:00:00' And S.shifttype!=3  ")->result();
        $totalRecords = $query[0]->allcount;

        if ($searchQuery != '')
        // $query = $this->db->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE  WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=$orgid And E.Is_Delete=0 $q And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.TimeOut!='00:00:00' AND A.Desg_id=D.Id AND A.Dept_id=DE.Id $searchQuery And S.shifttype!=3    ")->result();
        $query = $this
            ->db
            ->query("SELECT count(*) as allcount FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S,DesignationMaster D,DepartmentMaster DE WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=$orgid And E.Is_Delete=0 $q And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.TimeOut!='00:00:00' AND A.Desg_id=D.Id AND A.Dept_id=DE.Id $searchQuery And S.shifttype!=3    ")->result();
        //$totalRecordwithFilter = $query[0]->allcount;
        $totalRecords = $query[0]->allcount;

        //var_dump($this->db->last_query());
        // new
        $query = $this
            ->db
            ->query("SELECT E.Id as empid,E.EmployeeCode as code, E.area_assigned as location,S.shifttype, if(E.LastName!='NULL',concat(E.FirstName, ' ' ,E.LastName),E.FirstName) as name,E.Id,E.Designation as desg,E.Department as dept,E.PersonalNo, (select COUNT(A.AttendanceStatus) FROM AttendanceMaster A where A.AttendanceStatus IN(1,4,8) AND   A.EmployeeId=E.Id $q) as present, (SELECT COUNT(A.AttendanceStatus) FROM AttendanceMaster A where A.AttendanceStatus in (2,5,7) AND A.EmployeeId=E.Id  $q) as absent , (SELECT COUNT(A.Id) FROM AttendanceMaster A, ShiftMaster S where  A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) and A.AttendanceStatus = 1 AND A.EmployeeId=E.Id AND S.Id=A.`ShiftId` $q  ) as latecoming from  EmployeeMaster E, ShiftMaster S,AttendanceMaster A where A.EmployeeId =  E.Id and S.Id=A.`ShiftId` And E.Is_Delete=0 $q  AND A.OrganizationId = $orgid AND E.OrganizationId = $orgid GROUP BY A.EmployeeId ORDER BY $columnName $columnSortOrder,E.FirstName ASC  Limit $start,$rowperpage");

        //new
        $d = array();
        // $res=array();
        $response = array();
        //new
        //shubhi
        //shubhi
        //var_dump($this->db->last_query());
        //die();
        //var_dump($query->result());
        // $res=array();
        //var_dump($res);
        foreach ($query->result() as $row)
        {
            $data = array();
            $data['name'] = $row->name;
            $data['code'] = $row->code;
            // print_r($data['name']);
            $data['contect'] = decode5t($row->PersonalNo);
            // var_dump($data['contect']);
            $data['Presentcount'] = $row->present;

            $data['Absentcont'] = $row->absent;
            if ($row->shifttype == 3)
            {
                $data['latecoming'] = "-";
            }
            else
            {
                $data['latecoming'] = $row->latecoming;
            }
            $data['shiftT'] = $row->shifttype;
            if ($data['shiftT'] == 1)
            {
                $data['shiftT'] = 'Single Date';
            }
            elseif ($data['shiftT'] == 2)
            {
                $data['shiftT'] = 'Multi Date';
            }
            else
            {
                $data['shiftT'] = 'Flexi';
            }
            $data['desg'] = getDesignation($row->desg);
			$data['dept'] = getDepartment($row->dept);
            if ($date == '') $data['weekoff'] = 0;
            else $data['weekoff'] = $this->gettotalweekoff($startdate, $enddate, $row->empid);
            // var_dump($data['weekoff']);
            if ($row->location != 0) $data['location'] = getName('Geo_Settings', 'Name', 'Id', $row->location);
            else $data['location'] = '--';
            $res[] = $data;

            //$res[]=$data;
            //}
            //$d['data']=$res;
            //echo json_encode($d); return false;
            //}
            // add new
            $d['data'] = $res;
        }

        $response = array(
            "draw" => intval($draw) ,
            "recordsTotal" => intval($totalRecords) ,
            "recordsFiltered" => intval($totalRecords) ,
            "data" => $res
        );
        //echo json_encode($d);
        return $response;
    }
    public function gettotalweekoff($startdate, $enddate, $emplid)
    {

        $totalweekoff = 0;
        $shiftid = getShiftIdByEmpID($emplid);
        $status = $this->checkempjoiningdate($startdate);
        while ($startdate <= $enddate)
        {
            if (!$status)
            {
                $status = $this->checkempjoiningdate($startdate);
            }
            else
            {
                $query = $this
                    ->db
                    ->query("select ShiftId , AttendanceDate , AttendanceStatus from AttendanceMaster where AttendanceDate = date('$startdate')  and EmployeeId = $emplid ");
                // var_dump($this->db->last_query());
                if ($row = $query->row())
                {
                    if ($row->ShiftId != 0) $shiftid = $row->ShiftId;
                    if ($row->AttendanceStatus == 3) $totalweekoff++;
                }
                else
                {
                    $t = $this->getweeklyoff($startdate, $shiftid, $emplid);

                    if ($t == "WO")
                    {
                        $totalweekoff++;
                    }
                }
            }

            $startdate = date('Y-m-d', strtotime($startdate . ' +1 days'));

        }
        return $totalweekoff;

    }
    public function checkempjoiningdate($startdate)
    {
        $query = $this
            ->db
            ->query("Select CreatedDate from EmployeeMaster WHERE CreatedDate <= date('$startdate)') ");
        if ($this
            ->db
            ->affected_rows()) return 1;
        else return 0;
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
        if ($shiftid != 0)
        {
            $q1 .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  A.Desg_id = '$desgid'";
        }
        if ($deprtid != 0)
        {
            $q1 .= " AND A.Dept_id='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }

        $startdate = "";
        $enddate = "";
        $res = array();
        $response = array();
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            //echo $datestatus;
            if ($datestatus == 1)
            {
                // $enddate=date('Y-m-d');//,(strtotime ( "-1 day",strtotime(date('Y-m-d'))) ));
                $enddate = date('Y-m-d');
                //echo  $enddate;
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                // echo  $startdate;
                // echo $startdate.'-'.$enddate;
                // exit();
                
            }
            else
            {
                $enddate = date("Y-m-d");
                $startdate = date("Y-m-d");
            }
        }

        if ($date != '')
        {
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
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            //$datestatus = '';
            if ($datestatus == 1)
            {

                $enddate = date("Y-m-d");
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                $realEnd = new DateTime($enddate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }
            }
            else
            {
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

            if ($searchValue != '')
            {
                $searchQuery = "  And (E.FirstName like '%" . $searchValue . "%') ";
            }

            $query = $this
                ->db
                ->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `EmployeeMaster` E,AppliedLeave L WHERE E.id = L.EmployeeId and L.ApprovalStatus=2 and L.Date = '$today' and L.`OrganizationId`='$orgid'")->result();
            $totalRecords = $query[0]->allcount;

            //var_dump($this->db->last_query());
            if ($searchQuery != '') $query = $this
                ->db
                ->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `EmployeeMaster` E,AppliedLeave L WHERE E.id = L.EmployeeId and L.ApprovalStatus=2 and L.Date = '$today' and L.`OrganizationId`='$orgid' $searchQuery")->result();
            $totalRecordwithFilter = $query[0]->allcount;

            $query = $this
                ->db
                ->query("SELECT E.`Id`,E.`Shift` as ShiftId,E.`Department`as Dept_id,E.`Designation` as Desg_id,L.Reason,L.Date as Date1,L.EmployeeId FROM `EmployeeMaster` E,AppliedLeave L WHERE E.id = L.EmployeeId and L.ApprovalStatus=2 and L.Date = '$today' and L.`OrganizationId`='$orgid' $searchQuery Limit $start,$rowperpage");
        }
        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));

            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }

            $rangedate = $range;

            if ($rangedate == "")
            {
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

            if ($searchValue != '')
            {
                $searchQuery = "  And (E.FirstName like '%" . $searchValue . "%') ";
            }

            $query = $this
                ->db
                ->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `AttendanceMaster` A, AppliedLeave L WHERE L.EmployeeId=A.EmployeeId and A.`OrganizationId`= $orgid and  A.`AttendanceStatus`= 6 And  A.AttendanceDate IN( " . $range . ") $q1  Order by A.`AttendanceDate` desc ")->result();
            $totalRecords = $query[0]->allcount;

            if ($searchQuery != '') $query = $this
                ->db
                ->query("SELECT COUNT(DISTINCT(L.LeaveId)) as allcount FROM `AttendanceMaster` A, AppliedLeave L,EmployeeMaster E WHERE E.Id=A.EmployeeId AND L.EmployeeId=A.EmployeeId and A.`OrganizationId`= $orgid and  A.`AttendanceStatus`= 6 And  A.AttendanceDate IN( " . $range . ") $q1 $searchQuery ")->result();
            $totalRecordwithFilter = $query[0]->allcount;

            //var_dump($this->db->last_query());
            $query = $this
                ->db
                ->query("SELECT A.`EmployeeId`,A.`AttendanceStatus`,A.`ShiftId`,A.`Dept_id`,A.`Desg_id`,A.`AttendanceDate` as Date1,L.Reason FROM `AttendanceMaster` A, AppliedLeave L,EmployeeMaster E WHERE E.Id=A.EmployeeId AND L.EmployeeId=A.EmployeeId and A.`OrganizationId`= $orgid and  A.`AttendanceStatus`= 6 And  A.AttendanceDate IN( " . $range . ") $q1 $searchQuery GROUP by L.`LeaveId` Order by A.`AttendanceDate` desc Limit $start,$rowperpage ");

            //var_dump($this->db->last_query());
            
        }
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords(getEmpName($row->EmployeeId));
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
        $this
            ->db
            ->close(); //$query->result();
        //echo json_encode($d);
        $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        return $response;
    }

    public function getCustomizedReport()
    {
        $orgid = $_SESSION['orgid'];
        $deptId = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $areaId = isset($_REQUEST['area']) ? $_REQUEST['area'] : 0;
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);

        $today = date('Y-m-d');
        $today = date('Y-m-d');
        $q1 = '';
        if ($shiftid != 0)
        {
            $q1 .= " AND A.ShiftId='$shiftid' ";
        }
        if ($desgid != 0)
        {
            $q1 .= " AND  A.Desg_id IN ($desgid)  ";
        }
        if ($deptId != 0)
        {
            $q1 .= " AND A.Dept_id IN ($deptId) ";
        }
        if ($emplid != 0)
        {
            $q1 .= " AND A.EmployeeId = '$emplid'";
        }
        if ($areaId != 0)
        {
            $q1 .= " AND A.areaId IN ($areaId)";
        }
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            if ($datestatus == 7)
            {
                $enddate = date("Y-m-d");
                $startdate = date('Y-m-d', strtotime('-8 day', strtotime($enddate)));
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                $realEnd = new DateTime($enddate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date)
                {
                    $dt = $date->format('Y-m-d');
                    if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                    else $range .= ",'" . $date->format('Y-m-d') . "'";
                }
            }
            else
            {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
            }
            //TIMEDIFF(CONCAT(A.timeoutdate,'   ',A.TimeOut) , CONCAT(A.AttendanceDate,'  ',A.TimeIn)) as Officehours
            $query = $this
                ->db
                ->query("SELECT A.Id ,A.timeoutdate as timeoutdate, A.EmployeeId,C.TimeIn as ctin ,C.TimeOut as ctout, A.AttendanceDate as date , A.AttendanceStatus, A.TimeIn, A.TimeOut, A.ShiftId, A.Overtime,A.EntryImage,A.device,E.EmployeeCode, A.ExitImage,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId, SC.WeekOff FROM ShiftMasterChild SC, AttendanceMaster A, ShiftMaster C ,EmployeeMaster E WHERE A.OrganizationId=? And A.TimeIn != '00:00:00' And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN (" . $range . ") And A.EmployeeId=E.Id And C.Id=SC.ShiftId group by A.EmployeeId", array(
                $orgid,
                $orgid
            ));
        }
        else
        {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));

            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);

            $range = "";
            foreach ($dateRange as $date)
            {
                $dt = $date->format('Y-m-d');
                if ($range == "") $range = "'" . $date->format('Y-m-d') . "'";
                else $range .= ",'" . $date->format('Y-m-d') . "'";
            }
            $rangedate = $range;
            if ($rangedate == "")
            {
                $rangedate = 1;
            }
            //, TIMEDIFF(CONCAT(A.timeoutdate,'   ',A.TimeOut) , CONCAT(A.AttendanceDate,'  ',A.TimeIn) ) as Officehours
            //SELECT A.Id ,A.timeoutdate as timeoutdate, A.EmployeeId,C.TimeIn as ctin ,C.TimeOut as ctout, A.AttendanceDate as date , A.AttendanceStatus, A.TimeIn, A.TimeOut, A.ShiftId, A.Overtime,A.EntryImage,A.device,E.EmployeeCode, A.ExitImage,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId, SC.WeekOff FROM ShiftMasterChild SC, AttendanceMaster A, ShiftMaster C ,EmployeeMaster E WHERE A.OrganizationId=? And A.TimeIn != '00:00:00' And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN (".$rangedate.") And A.EmployeeId=E.Id And C.Id=SC.ShiftId group by A.EmployeeId
            $query = $this
                ->db
                ->query("SELECT A.Id ,A.timeoutdate as timeoutdate, A.EmployeeId,C.TimeIn as ctin ,C.TimeOut as ctout, A.AttendanceDate as date , A.AttendanceStatus, A.TimeIn, A.TimeOut, A.ShiftId, A.Overtime,A.EntryImage,A.device,E.EmployeeCode, A.ExitImage,A.latit_in,A.longi_in,A.longi_out,A.latit_out,A.checkInLoc, A.CheckOutLoc,A.areaId, SC.WeekOff FROM ShiftMasterChild SC, AttendanceMaster A, ShiftMaster C ,EmployeeMaster E WHERE A.OrganizationId=? And A.TimeIn != '00:00:00' And C.Id = A.ShiftId and C.OrganizationId = ? $q1 And A.AttendanceDate IN (" . $rangedate . ") And A.EmployeeId=E.Id And C.Id=SC.ShiftId group by A.EmployeeId", array(
                $orgid,
                $orgid
            ));
        }
        $d = array();
        $res = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            $name = ucwords(getEmpName($row->EmployeeId));
            if ($name != "")
            {
                $data['name'] = $name;
                $data['code'] = $row->EmployeeCode;
                $data['date'] = date("d/m/Y", strtotime($row->date));
                $data['ti'] = substr($row->TimeIn, 0, 5);
                $data['to'] = substr($row->TimeOut, 0, 5);
                $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->ShiftId) . ', Break Hours: ' . getShiftBreaks($row->ShiftId) . '">' . getShift($row->ShiftId) . '</span>';
                //$data['shift']=getShiftTimes($row->ShiftId);
                $data['ot'] = $row->Overtime;

                $data['entryimg'] = '<img src="' . $row->EntryImage . '"  style="width:42px!important;height:42px!important;border-radius:50%; "/>';

                $data['exitimg'] = '<img src="' . $row->ExitImage . '"  style="width:42px!important;height:42px!important;border-radius:50%; "/>';

                $data['positionlin'] = "";
                $data['positionout'] = "";
                $data['chiloc'] = "";
                $data['choloc'] = "";
                //echo $row->areaId;
                $geoName = '';
                if ($row->areaId != 0)
                {
                    $geoName = getName('Geo_Settings', 'Name', 'Id', $row->areaId);
                    $lat_lang = getName('Geo_Settings', 'Lat_Long', 'Id', $row->areaId);
                    $radius = getName('Geo_Settings', 'Radius', 'Id', $row->areaId);
                    $arr1 = explode(",", $lat_lang);
                    //echo '----------'.count($arr1);
                    if (count($arr1) > 1)
                    {
                        $a = floatval($arr1[0]);
                        $b = floatval($arr1[1]);
                        $d1 = $this->distance($a, $b, $row->latit_in, $row->longi_in, "K");
                        $d2 = $this->distance($a, $b, $row->latit_out, $row->longi_out, "K");
                        $positionout = "";
                        $positionlin = "";
                        //chiloc
                        //echo $d1;
                        //echo $radius;
                        if ($d1 <= $radius)
                        {
                            $data['positionlin'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geo-fence</div>';
                            $positionlin = "Within Geo-fence";
                            $data['chiloc'] = $row->checkInLoc != '' ? '<span style="color:green" title="' . $positionlin . '">' . $geoName . '</span>' . '' . '<span></span>' : '-';
                        }
                        else
                        {
                            $data['positionlin'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geo-fence</div>';
                            $positionlin = "Outside Geo-fence";
                            $data['chiloc'] = $row->checkInLoc != '' ? '<span style="color:red" title="' . $positionlin . '">' . $geoName . '</span>' . '' . '<span></span>' : '-';
                        }
                        //choloc
                        if ($d2 <= $radius)
                        {
                            $data['positionout'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green">Within Geo-fence</div>';
                            $positionout = "Within Geo-fence";
                            $data['choloc'] = $row->CheckOutLoc != '' ? '<span style="color:green" title="' . $positionout . '">' . $geoName . '</span>' . '' . '<span></span>' : '-';
                        }
                        else
                        {
                            $data['positionout'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red">Outside Geo-fence</div>';
                            $positionout = "Outside Geo-fence";
                            $data['choloc'] = $row->CheckOutLoc != '' ? '<span style="color:red" title="' . $positionout . '">' . $geoName . '</span>' . '' . '<span></span>' : '-';
                        }
                    }
                }
                /* if($row->latit_in=='0.0')
                  $data['chiloc']=$row->checkInLoc!=''?'<span title="'.$row->checkInLoc.'">'.$row->checkInLoc.'</span>':'-';
                  else
                  $data['chiloc']='<a style="font-size:11px;" href="http://maps.google.com/?q='.$row->latit_in.','.$row->longi_in.'" target="_blank" title="'.$row->checkInLoc.'">'.$row->checkInLoc .$data['positionlin'].'</a>'; */

                /* if($row->longi_out=='0.0')
                  $data['choloc']=$row->CheckOutLoc!=''?'<span title="'.$row->CheckOutLoc.'">'.$row->CheckOutLoc.'</span>':'-';
                  else
                  $data['choloc']='<a style="font-size:11px;" href="http://maps.google.com/?q='.$row->latit_out.','.$row->longi_out.'" target="_blank" title="'.$row->CheckOutLoc.'">'.$row->CheckOutLoc .$data['positionout'].'</a>'; */

                $data['wh'] = '-';
                $attn = $row->AttendanceStatus != 2 ? '<div style="padding: 5px 20px 5px 20px;background-color: #219653;text-align:center;color:white;border-radius:100px;width:90%;font-size:13px;" title="Present">present</div>' : '<div style=" background-color:#f15353;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;width:90%;font-size:13px;" title="Absent">Absent</div>';
                $goings = '';
                $overtime = '';
                $coming = '';
                if ($row->AttendanceStatus != 2)
                {
                    $tm = getcomings($row->ShiftId, $row->TimeIn);
                    if (substr($tm, 0, 5) != '00:00') $coming = strpos($tm, '-') !== 0 ? '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Late Coming By ' . substr($tm, 0, 5) . ' Hr">LC</span>' : '<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Early Coming By ' . substr(str_replace("-", "", $tm) , 0, 5) . ' Hr">EC</span>';

                    if ($row->TimeOut != '00:00:00')
                    {
                        //$data['wh'] = substr($row->Officehours,0,5);
                        $tm = getgoings($row->ShiftId, $row->TimeOut);
                        if (substr($tm, 0, 5) != '00:00') $goings = strpos($tm, '-') !== 0 ? '<span style=" background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Late Leaving By ' . substr($tm, 0, 5) . ' Hr">LL</span>' : '<span style="background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px; border-radius:100px;" title="Early Leaving By ' . substr(str_replace("-", "", $tm) , 0, 5) . ' Hr">EL</span>';
                        //calculate work hours
                        if (strtotime($row->ctin) < strtotime($row->ctout))
                        {
                            if (strtotime($row->TimeIn) < strtotime($row->TimeOut))
                            {
                                $a = new DateTime($row->TimeIn);
                                $b = new DateTime($row->TimeOut);
                                $interval1 = $a->diff($b);
                                $a = new DateTime($interval1->format("%H:%I"));
                                $data['wh'] = $interval1->format("%H:%I");
                            }
                            else
                            {
                                $time = "24:00:00";
                                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                                $data['wh'] = date("H:i", strtotime($time) - $secs);
                            }
                        }
                        else
                        {
                            $a = new DateTime($row->TimeIn);
                            $b = new DateTime($row->TimeOut);
                            if (strtotime($row->TimeIn) <= strtotime($row->TimeOut))
                            {
                                $interval1 = $a->diff($b);
                                $a = new DateTime($interval1->format("%H:%I"));
                                $data['wh'] = $interval1->format("%H:%I");
                            }
                            else
                            {
                                $time = "24:00:00";
                                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                                $data['wh'] = date("H:i", strtotime($time) - $secs);
                            }
                        }
                    }
                    if ($row->Overtime != '00:00:00')
                    {
                        $overtime = strpos($row->Overtime, '-') !== 0 ? '<span style="background-color:green;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Over Time By ' . substr($row->Overtime, 0, 5) . ' Hr">OT</span>' : '<span style=" background-color:red;text-align:center;color:white;padding-left:6px;padding-right:6px;border-radius:100px;" title="Under Time By ' . substr(str_replace("-", "", $row->Overtime) , 0, 5) . ' Hr">UT</span>';
                    }
                }
                $data['device'] = $row->device;
                //$data['status']=$attn.' '.$coming.' '.$goings.' '.$overtime;
                $data['timeoff'] = $this->calculatetimeoff($row->EmployeeId, $row->date);

                if ($data['timeoff'] != "00:00" and $data['wh'] != "-")
                {
                    $a = new DateTime($data['timeoff']);
                    $b = new DateTime($data['wh']);
                    $interval = $a->diff($b);
                    $a = new DateTime($interval->format("%H:%I"));
                    $data['wh'] = $interval->format("%H:%I");
                }

                //$data['action']='&nbsp;<a href="trackLocations/'.$row->EmployeeId.'/'.$row->date.'" target="_self"><i class="track_loc fa fa-map-marker"style="font-size:24px; color:purple;" title="Track punched location(s)"></i>';
                /// calculate  hourly type
                $data['hourtype'] = "-";
                if ($data['wh'] != "-" and $data['wh'] != "00:00")
                {
                    $shifthours = getShiftHoursforubishift($row->ShiftId);
                    //echo $shifthours;
                    $sta = $this->getweeklyoff($row->date, $row->ShiftId, $row->EmployeeId);
                    //echo $sta;
                    if ($sta != "N/A") $data['hourtype'] = "HOT";

                    else if (strtotime($data['wh']) > strtotime($shifthours)) $data['hourtype'] = "NOT";
                    else $data['hourtype'] = "NT";
                }

                /*                 * **********Attendance Type************* */
                if ($row->areaId == 0)
                {
                    $data['atttype'] = 'Regular';
                }
                else
                {
                    $data['atttype'] = 'Project';
                }
                /*                 * **********Attendance Type************* */

                /*                 * **************Working day type**************** */
                if ($row->AttendanceStatus == 3)
                {
                    $data['workdaytype'] = '<div style="background-color: blue; text-align: center;color: white;border-radius: 15px;height: 1.5rem; padding-top: 2.5px; width:90px;">Friday</div>';
                }
                elseif ($row->AttendanceStatus == 5)
                {
                    $data['workdaytype'] = '<div style="background-color: white; text-align: center;color: white;border-radius: 15px;height: 1.5rem; padding-top: 2.5px; width:90px;">PublicHoliday</div>';
                }
                else
                {
                    $data['workdaytype'] = '<div style="background-color: green; text-align: center;color: white;border-radius: 15px;height: 1.4rem; padding-top: 1.5px; width:90px;">NormalDay</div>';
                }
                /*                 * **************Working day type**************** */

                /*                 * **************Overtime**************** */
                //echo $row->overt;
                // if (substr($row->overt,0,1) == "-" || strstr($row->overt,".",true) == '00:00:00')
                // {
                // $data['overtime']="-";
                // }
                // else
                // {
                // $data['overtime']=substr(strstr($row->overt,".",true),0,5);
                //    }
                //var_dump($data['wh']);
                if ($row->AttendanceStatus == 3)
                {
                    if ($row->TimeOut == "" || $row->TimeOut == "00:00:00")
                    {
                        $data['overtime'] = "-";
                    }
                    else
                    {
                        $workhrs = $data['wh'];

                        $time = $workhrs;
                        $seconds = strtotime("1970-01-01 $workhrs UTC");
                        //echo $seconds;
                        // same with objects (for php5.3+)
                        $time = $workhrs;
                        $dt = new DateTime("1970-01-01 $time", new DateTimeZone('UTC'));
                        $seconds = (int)$dt->getTimestamp();
                        $workhrs1 = $seconds * 1.50;
                        $data['overtime'] = gmdate("H:i", $workhrs1);
                        //echo gmdate("H:i:s", $workhrs1);
                        //die();
                        
                    }
                }
                elseif ($row->AttendanceStatus == 5)
                {
                    if ($row->TimeOut == "" || $row->TimeOut == "00:00:00")
                    {
                        $data['overtime'] = "-";
                    }
                    else
                    {
                        $workhrs = $data['wh'];

                        $time = $workhrs;
                        $seconds = strtotime("1970-01-01 $workhrs UTC");
                        //echo $seconds;
                        // same with objects (for php5.3+)
                        $time = $workhrs;
                        $dt = new DateTime("1970-01-01 $time", new DateTimeZone('UTC'));
                        $seconds = (int)$dt->getTimestamp();
                        $workhrs1 = $seconds * 2.0;
                        $data['overtime'] = gmdate("H:i", $workhrs1);
                        //echo gmdate("H:i:s", $workhrs1);
                        //die();
                        
                    }
                }
                else
                {
                    if ($row->Overtime == "" || $row->Overtime == "00:00:00")
                    {
                        $data['overtime'] = "-";
                    }
                    else
                    {
                        $workhrs = $row->Overtime;

                        $time = $workhrs;
                        $seconds = strtotime("1970-01-01 $workhrs UTC");
                        //echo $seconds;
                        // same with objects (for php5.3+)
                        // $time = $workhrs;
                        //$dt = new DateTime("1970-01-01 $time", new DateTimeZone('UTC'));
                        //$seconds = (int)$dt->getTimestamp();
                        $workhrs1 = $seconds * 1.25;
                        $data['overtime'] = gmdate("H:i", $workhrs1);
                        //echo gmdate("H:i:s", $workhrs1);
                        //die();
                        
                    }
                }
                /*                 * **************Overtime**************** */

                $res[] = $data;
            }
        }

        $d['data'] = $res;

        $this
            ->db
            ->close(); //$query->result();
        echo json_encode($d);
        return false;
    }

    public function departmentreport()
    {
        $orgid = $_SESSION['orgid'];
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $todate = date('Y-m-d'); //'2018-07-09';
        //$todate ='2019-02-28';
        $time = date("H:i:s");
        // echo $time;
        $res = array();
        $query = $this
            ->db
            ->query("SELECT Id,Name FROM DepartmentMaster WHERE OrganizationId=? AND archive = 1 ", array(
            $orgid
        ));
        foreach ($query->result() as $row)
        {
            $data = array();
            $data['id'] = $row->Id;
            $id = $row->Id;
            $data['departname'] = $row->Name;
            $sql1 = $this
                ->db
                ->query("SELECT count(Id)as preEmp FROM AttendanceMaster WHERE AttendanceDate='$todate' and AttendanceStatus=1 and EmployeeId IN (SELECT Id FROM EmployeeMaster WHERE OrganizationId=$orgid AND Department=$id AND Is_Delete = 0 and archive=1)");

            if ($row = $sql1->result())
            {
                $data['present'] = '<div style="padding-left:10px;cursor:pointer">' . $row[0]->preEmp . '</div>';
            }

            // $sql3 = $this->db->query("SELECT count(Id) as absEmp FROM AttendanceMaster WHERE AttendanceDate='$todate'  AND AttendanceStatus =2 and  EmployeeId IN (SELECT Id FROM EmployeeMaster WHERE OrganizationId=$orgid AND Department=$id AND DOL = '0000-00-00' AND Is_Delete = 0 ) ");
            // if($row =  $sql3->result())
            // {
            // $data['absent'] = $row[0]->absEmp;
            // }
            //$sql3 = $this->db->query("SELECT count(A.Id) as absEmp FROM AttendanceMaster A,ShiftMaster S WHERE A.AttendanceDate='$todate'  and AttendanceStatus  IN (1,8,4) AND S.TimeIn < '$time' and A.EmployeeId IN (SELECT Id FROM EmployeeMaster WHERE OrganizationId=$orgid AND Department=$id AND DOL = '0000-00-00' AND Is_Delete = 0 ) AND S.Id=A.ShiftId ");
            $time = date("H:i:s");

            $sql3 = $this
                ->db
                ->query("SELECT count(Id) as absEmp
            FROM  `EmployeeMaster` 
            WHERE  `OrganizationId` =$orgid
            AND ARCHIVE =1 and Department=$id  AND Is_Delete = 0
            AND Id NOT 
            IN (
            SELECT EmployeeId
            FROM AttendanceMaster
            WHERE AttendanceDate = '$todate'
            AND  `OrganizationId`= $orgid AND AttendanceStatus  IN (1,8,4)
                )
            AND 
            (
            SELECT  `TimeIn` 
            FROM  `ShiftMaster` 
            WHERE  `Id` = Shift
            AND TimeIn <  '$time'
            ) ");

            if ($row = $sql3->result())
            {
                $data['absent'] = '<div style="padding-left:10px;cursor:pointer">' . $row[0]->absEmp . '</div>';
            }

            $sql4 = $this
                ->db
                ->query("SELECT count(A.Id) as lateEmp FROM AttendanceMaster A,ShiftMaster S WHERE A.AttendanceDate='$todate'  and A.`TimeIn`>S.`TimeIn` and A.EmployeeId IN (SELECT Id FROM EmployeeMaster WHERE OrganizationId=$orgid AND Department=$id AND Is_Delete = 0 ) AND S.Id=A.ShiftId ");

            if ($row = $sql4->result())
            {
                $data['latecomers'] = '<div style="padding-left:10px;cursor:pointer">' . $row[0]->lateEmp . '</div>';
            }

            $sql5 = $this
                ->db
                ->query("SELECT count(A.Id) as earlyEmp  FROM AttendanceMaster A,ShiftMaster S WHERE A.AttendanceDate='$todate'  and S.`TimeOut`> A.`TimeOut` and A.EmployeeId IN (SELECT Id FROM EmployeeMaster WHERE OrganizationId=$orgid AND Department=$id AND Is_Delete = 0 ) AND S.Id=A.ShiftId and A.`TimeOut`!='00:00:00' ");

            if ($row = $sql5->result())
            {
                $data['earlyleavers'] = '<div style="padding-left:10px;cursor:pointer">' . $row[0]->earlyEmp . '</div>';
            }

            $sql2 = $this
                ->db
                ->query("SELECT count(Id) as allEmp FROM EmployeeMaster WHERE OrganizationId=$orgid AND Department=$id AND Is_Delete = '0' and archive=1");
            // var_dump($this->db->last_query());
            // die;
            if ($row1 = $sql2->result())
            {
                $data['total'] = '<div style="padding-left:10px;cursor:pointer">' . $row1[0]->allEmp . '</div>';
            }
            //$data['action']='<a href="'.URL.'admin/attendances/'.$id.'" target="_blank"><i class="fa fa-eye" style="font-size:24px; color:purple;" title="View"></i></a>';
            $res[] = $data;
        }
        $result['data'] = $res;
        echo json_encode($result);
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad((float)$lat1)) * sin(deg2rad((float)$lat2)) + cos(deg2rad((float)$lat1)) * cos(deg2rad((float)$lat2)) * cos(deg2rad((float)$theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K")
        {
            return ($miles * 1.609344);
        }
        else if ($unit == "N")
        {
            return ($miles * 0.8684);
        }
        else
        {
            return $miles;
        }
    }

    public function calculatetimeoff($empid, $date)
    {
        $org_id = $_SESSION['orgid'];
        $query = $this
            ->db
            ->query("SELECT ( TIMEDIFF(T.TimeTo,T.TimeFrom) )as time FROM Timeoff T,AttendanceMaster A WHERE T.EmployeeId = ($empid) AND T.OrganizationId= '$org_id' AND TimeofDate= '$date'  AND T.TimeFrom < T.TimeTo AND T.TimeFrom != '00:00:00' AND T.TimeTo != '00:00:00' AND A.AttendanceDate='$date' AND A.EmployeeId='$empid' AND A.OrganizationId='$org_id' AND A.TimeIn <= T.TimeFrom AND A.TimeOut >= T.TimeTo AND  A.TimeIn != '00:00:00' AND A.TimeOut != '00:00:00' ");
        if ($row = $query->result_array())
        {
            if ($row[0]["time"] == null)
            {
                return "00:00";
            }
            else
            {
                return (substr($row[0]["time"], 0, 5));
            }
        }
        else
        {
            return "00:00";
        }
    }

    public function Attask()
    {

        $orgid = $_SESSION['orgid'];
        $tin = isset($_REQUEST['tin']) ? $_REQUEST['tin'] : '';
        $aname = isset($_REQUEST['aname']) ? $_REQUEST['aname'] : '';
        $tout = isset($_REQUEST['tout']) ? $_REQUEST['tout'] : '';
        $emp_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $datein = isset($_REQUEST['datein']) ? $_REQUEST['datein'] : 0;
        $dateatt = date("M d,Y", strtotime($datein));
        $dateout = isset($_REQUEST['dateout']) ? $_REQUEST['dateout'] : 0;
        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : 0;
        $desgid = isset($_REQUEST['desgid']) ? $_REQUEST['desgid'] : 0;
        $areaid = isset($_REQUEST['areaid']) ? $_REQUEST['areaid'] : 0;
        $deptid = isset($_REQUEST['deptid']) ? $_REQUEST['deptid'] : 0;
        $ts = isset($_REQUEST['tin']) ? date("H:i", strtotime($_REQUEST['tin'])) : '';
        $ts1 = isset($_REQUEST['tout']) ? date("H:i", strtotime($_REQUEST['tout'])) : '';
        $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
        $device = 'Web Admin';
        $timeoutimage = 'https://ubiattendance.ubihrm.com/assets/img/managerdevice.png';
        $timeinimage = 'https://ubiattendance.ubihrm.com/assets/img/managerdevice.png';
        $diff = '';

        $checkdate = date("Y-m-d", strtotime($datein));
        $status = 1;
        $today2 = Date('Y-m-d');
        $t2date = date('Y-m-d', (strtotime('-1 day', strtotime($dateout))));
        $today1 = Date('Y-m-d h:i:s');
        $dti = $datein . " " . $ts;
        $dto = $dateout . " " . $ts1;
        $dto1 = $t2date . " " . $ts1;

        if ($shifttype == 1)
        {
            $sql = $this
                ->db
                ->query("SELECT TIMEDIFF('$dto','$dti') as diff FROM  ShiftMaster  WHERE   id=? ", array(
                $sid
            ));
        }
        else
        {
            if ($shifttype == 2)
            {
                if ($datein == $dateout)
                {
                    $sql = $this
                        ->db
                        ->query("SELECT TIMEDIFF('$dto1','$dti') as diff FROM  ShiftMaster  WHERE   id=? ", array(
                        $sid
                    ));
                }
                else
                {

                    $sql = $this
                        ->db
                        ->query("SELECT TIMEDIFF('$dto','$dti') as diff FROM  ShiftMaster  WHERE   id=? ", array(
                        $sid
                    ));
                }
            }
        }

        if ($sk = $sql->row())
        {
            $diff = $sk->diff;
            $query = $this
                ->db
                ->query("INSERT INTO AttendanceMaster(EmployeeId,AttendanceStatus,AttendanceDate,TimeIn,TimeOut,ShiftId,Dept_id,Desg_id,areaId,OrganizationId,CreatedDate,LastModifiedDate,Overtime,timeindate,timeoutdate,device,EntryImage,ExitImage,TotalLoggedHours)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
                $emp_id,
                $status,
                $today2,
                $ts,
                $ts1,
                $sid,
                $deptid,
                $desgid,
                $areaid,
                $orgid,
                $today1,
                $today1,
                $diff,
                $datein,
                $dateout,
                $device,
                $timeinimage,
                $timeoutimage,
                $diff
            ));

            $res = $this
                ->db
                ->affected_rows();
            if ($res)
            {

                $date = date("y-m-d H:i:s");
                $orgid = $_SESSION['orgid'];
                $id = $_SESSION['id'];
                $module = " All Attendance";
                $actionperformed = " Attendance has been <b>updated</b> for <b>" . $aname . "</b>, status changed from <b>Absent</b> To <b>Present</b> of<b> " . $dateatt . "</b> Time In <b>" . $ts . "</b> Time Out <b>" . $ts1 . "</b>";
                $activityby = 1;

                $query = $this
                    ->db
                    ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
                    $date,
                    $id,
                    $module,
                    $actionperformed,
                    $orgid,
                    $activityby,
                    $id
                ));
            }
            else
            {

            }

            if ($res > 0)
            {

                echo 1;
            }
            else
            {
                echo 0;
            }

            $this
                ->db
                ->close();
        }
    }

    public function editAtt()
    {

        
        $orgid = $_SESSION['orgid'];
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);

        $res = 0;
        $aid = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

        $aname = isset($_REQUEST['aname']) ? $_REQUEST['aname'] : '';
        // var_dump($aname);
        $dateIn = isset($_REQUEST['dateIn']) ? $_REQUEST['dateIn'] : '';
        $dateatt = date("M d,Y", strtotime($dateIn));
        $dateOut = isset($_REQUEST['dateOut']) ? $_REQUEST['dateOut'] : '';
        $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : '';
        $to = isset($_REQUEST['to']) ? date("H:i", strtotime($_REQUEST['to'])) : '';
        $adminimage = 'https://ubiattendance.ubihrm.com/assets/img/managerdevice.png';
        // var_dump($to);
        // die;
        $ti = isset($_REQUEST['ti']) ? date("H:i", strtotime($_REQUEST['ti'])) : '';
        $ts = isset($_REQUEST['ts']) ? date("H:i", strtotime($_REQUEST['ts'])) : '';
        $ts1 = isset($_REQUEST['ts1']) ? date("H:i", strtotime($_REQUEST['ts1'])) : '';
        $mdate = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        $device = 'TimeOut marked by Admin';
        $timeoutimage = '';
        $t2date = date('Y-m-d', (strtotime('-1 day', strtotime($dateOut))));
        $dti = $dateIn . " " . $ti;
        $dto = $dateOut . " " . $to;
        $dto1 = $t2date . " " . $to;

        ///////// Push Notifications by Nitin
        $AttEditedPerm = getNotificationPermission($orgid, 'AttEdited');

        $empid = getEmpIDbyAttendanceId($aid, $orgid);

        $name = getEmpName($empid);

        $string1 = $name;
        $string1 = ucwords($string1);

        $string1 = str_replace('', '-', $string1); // Replaces all spaces with hyphens.
        $string1 = preg_replace('/[^A-Za-z0-9\-]/', '', $string1);

        $EmployeeTopic = $string1 . $empid;

        ///////// Push Notifications by Nitin
        ///////// Push Notifications by Nitin
        if ($AttEditedPerm == 10 || $AttEditedPerm == 11 || $AttEditedPerm == 14 || $AttEditedPerm == 15) sendManualPushNotification("('$EmployeeTopic' in topics)", "Your Attendance has been edited by the Admin.", "");
        ///////// Push Notifications by Nitin
        // $Fquery = $this->db->query(" Select  timediff(TimeDiff('$dto','$dti'),(S.TimeOut,S.TimeIn)) as diff  from AttendanceMaster A , ShiftMaster S where A.Id=? and A.OrganizationId=? and S.Id=A.ShiftId ", array($aid,$orgid));
        //       if($Frow = $Fquery->row())
        //       {
        //        $diff  = $Frow->diff;
        //$timeinimage='https://ubiattendance.ubihrm.com/assets/img/managerdevice.png';
        $att = $this
            ->db
            ->query("SELECT * FROM AttendanceMaster WHERE Id = '$aid' and OrganizationId = '$orgid' ");
        if ($r1 = $att->result())
        {

            $attendancedate = $r1[0]->AttendanceDate;
            $attendancestatus = $r1[0]->AttendanceStatus;
            $entryimage = $r1[0]->EntryImage;
            $exitimage = $r1[0]->ExitImage;
            $timein_temp = date("H:i", strtotime($r1[0]->TimeIn));
            $timeout_temp = date("H:i", strtotime($r1[0]->TimeOut));
            $timeinsts = $r1[0]->TimeInEditStatus;
            $timeoutsts = $r1[0]->TimeOutEditStatus;

            if ($timein_temp != $ti)
            {
                $timeinsts = 1;
            }
            if ($timeout_temp != $to)
            {
                $timeoutsts = 1;
            }

            // echo $attendancedate;
            // echo $attendancestatus;
            // echo $entryimage;
            // echo $exitimage;
            // exit();
            $status1 = '';

            if ($attendancestatus == 2)
            {

                $status1 = 1;
            }
            else
            {

                $status1 = $attendancestatus;
            }

            // var_dump($attendancedate);
            // die;
            if ($shifttype == 1)
            {
                $sql = $this
                    ->db
                    ->query("SELECT timediff(TIMEDIFF('$dto','$dti'),timediff(S.TimeOut,S.TimeIn)) as diff,TIMEDIFF('$dto','$dti') as LH ,S.Id,A.ShiftId  from AttendanceMaster A , ShiftMaster S where A.Id=? and A.OrganizationId=? and S.Id=A.ShiftId ", array(
                    $aid,
                    $orgid
                ));
            }
            else
            {
                if ($shifttype == 2)
                {
                    if ($dateIn == $dateOut)
                    {
                        $sql = $this
                            ->db
                            ->query("SELECT timediff(TIMEDIFF('$dto1','$dti'),timediff(S.TimeOut,S.TimeIn)) as diff,TIMEDIFF('$dto','$dti') as LH, S.Id,A.ShiftId  from AttendanceMaster A , ShiftMaster S where A.Id=? and A.OrganizationId=? and S.Id=A.ShiftId ", array(
                            $aid,
                            $orgid
                        ));
                    }
                    else
                    {
                        $sql = $this
                            ->db
                            ->query("SELECT timediff(TIMEDIFF('$dto','$dti'),timediff(S.TimeOut,S.TimeIn)) as diff ,TIMEDIFF('$dto','$dti') as LH, S.Id,A.ShiftId  from AttendanceMaster A , ShiftMaster S where A.Id=? and A.OrganizationId=? and S.Id=A.ShiftId ", array(
                            $aid,
                            $orgid
                        ));
                    }
                }
            }

            // var_dump($this->db->last_query());
            if ($r = $sql->result())
            {
                $diff = $r[0]->diff;
                $LH = $r[0]->LH;
                if ($entryimage != '' || $exitimage != '')
                {
                    $timeoutimage = $exitimage;
                }
                else
                {
                    $timeoutimage = 'https://ubiattendance.ubihrm.com/assets/img/managerdevice.png';
                }

                if ($dateIn != '0000-00-00' && $dateOut != '0000-00-00')
                {
                    //echo 'check1';
                    //echo $dateOut;
                    // if($to = '00:00' && $attendancedate = $today){
                    //  $query = $this->db->query("UPDATE `AttendanceMaster` SET TimeIn=?,timeindate=?,LastModifiedDate=? where Id=? and OrganizationId=?",array($ti,$dateIn,$mdate,$aid,$orgid));
                    //   $date = date("y-m-d H:i:s");
                    //   $orgid =$_SESSION['orgid'];
                    //   $id =$_SESSION['id'];
                    //   $module = "Attendance";
                    //  $actionperformed = "Attendance Updated of <b>".$aname." </b> of <b> ".$dateatt." </b>  and Old TimeIn: ".$ts.",<b> New TimeIn: ".$ti.", </b> ";
                    //   $activityby = 1;
                    //   // $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy) VALUES (?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby));
                    //   $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
                    // $res= $this->db->affected_rows();
                    // echo $res;
                    // }
                    // else{
                    if ($exitimage != '')
                    {
                        $query = $this
                            ->db
                            ->query("UPDATE `AttendanceMaster` SET TimeIn=?,`TimeOut`=?, TimeInEditStatus = $timeinsts,TimeOutEditStatus = $timeoutsts ,device=? , ExitImage=? , timeindate=? , timeoutdate=? , LastModifiedDate=? , Overtime=?, AttendanceStatus=?, TotalLoggedHours=? where Id=? and OrganizationId=?", array(
                            $ti,
                            $to,
                            $device,
                            $timeoutimage,
                            $dateIn,
                            $dateOut,
                            $mdate,
                            $diff,
                            $status1,
                            $LH,
                            $aid,
                            $orgid
                        ));
                        //var_dump($this->db->last_query());
                        
                    }
                    else
                    {
                        $query = $this
                            ->db
                            ->query("UPDATE `AttendanceMaster` SET TimeIn=?,`TimeOut`=?, TimeInEditStatus = $timeinsts,TimeOutEditStatus = $timeoutsts , device=? ,ExitImage=?, timeindate=?, timeoutdate=?, LastModifiedDate=?,  Overtime=?, AttendanceStatus=?, TotalLoggedHours=? where Id=? and OrganizationId=?", array(
                            $ti,
                            $to,
                            $device,
                            $adminimage,
                            $dateIn,
                            $dateOut,
                            $mdate,
                            $diff,
                            $status1,
                            $LH,
                            $aid,
                            $orgid
                        ));
                        //var_dump($this->db->last_query());
                        
                    }

                    $date = date("y-m-d H:i:s");
                    $orgid = $_SESSION['orgid'];
                    $id = $_SESSION['id'];
                    $module = "Attendance";

                    $actionperformed = "Attendance Updated of <b>" . $aname . " </b> of <b> " . $dateatt . " </b>  and Old Time In: " . $ts . ",<b> New Time In: " . $ti . ", </b> Old Time Out: " . $ts1 . ", <b> New Time Out: " . $to . " </b>";

                    $activityby = 1;
                    // $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy) VALUES (?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby));
                    $query = $this
                        ->db
                        ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
                        $date,
                        $id,
                        $module,
                        $actionperformed,
                        $orgid,
                        $activityby,
                        $id
                    ));
                    $res = $this
                        ->db
                        ->affected_rows();
                    $this
                        ->db
                        ->close();
                    echo $res;
                    // }
                    
                }
                else
                {

                    if ($to == '00:00' && $attendancedate == $today)
                    {
                        //echo 'check3';
                        $query = $this
                            ->db
                            ->query("UPDATE `AttendanceMaster` SET TimeIn=?, timeindate=?,TimeInEditStatus = $timeinsts,TimeOutEditStatus = $timeoutsts , LastModifiedDate=?,TotalLoggedHours=? where Id=? and OrganizationId=?", array(
                            $ti,
                            $dateIn,
                            $mdate,
                            $LH,
                            $aid,
                            $orgid
                        ));
                        //var_dump($this->db->last_query());
                        $date = date("y-m-d H:i:s");
                        $orgid = $_SESSION['orgid'];
                        $id = $_SESSION['id'];
                        $module = "Employees";
                        $actionperformed = "Update Attendance of <b>" . $aname . " of " . $dateatt . " and Old TimeIn is " . $ts . " New TimeIn is " . $ti . "";
                        $activityby = 1;
                        $query = $this
                            ->db
                            ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy) VALUES (?,?,?,?,?,?)", array(
                            $date,
                            $id,
                            $module,
                            $actionperformed,
                            $orgid,
                            $activityby
                        ));
                        $res = $this
                            ->db
                            ->affected_rows();

                        echo $res;
                    }
                    else
                    {

                        $query = $this
                            ->db
                            ->query("UPDATE `AttendanceMaster` SET TimeIn=?,`TimeOut`=?, TimeInEditStatus = $timeinsts,TimeOutEditStatus = $timeoutsts , device=?,ExitImage=?,LastModifiedDate=?, Overtime=?,AttendanceStatus=?,TotalLoggedHours=? where Id=? and OrganizationId=?", array(
                            $ti,
                            $to,
                            $device,
                            $timeoutimage,
                            $mdate,
                            $diff,
                            $status1,
                            $LH,
                            $aid,
                            $orgid
                        ));

                        $date = date("y-m-d H:i:s");
                        $orgid = $_SESSION['orgid'];
                        $id = $_SESSION['id'];
                        $module = "Employees";
                        $actionperformed = "Update Attendance of <b>" . $aname . " of " . $dateatt . " and Old TimeIn is " . $ts . " New TimeIn is " . $ti . " and Old TimeOut is " . $ts1 . " New TimeOut is " . $to;
                        $activityby = 1;
                        $query = $this
                            ->db
                            ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy) VALUES (?,?,?,?,?,?)", array(
                            $date,
                            $id,
                            $module,
                            $actionperformed,
                            $orgid,
                            $activityby
                        ));
                        $res = $this
                            ->db
                            ->affected_rows();
                    }

                    $this
                        ->db
                        ->close();
                    //echo $res;
                    
                }
            }
        }
    }

    public function disapproveatt()
    {

        $orgid = $_SESSION['orgid'];
        $disattid = isset($_REQUEST['disattid']) ? $_REQUEST['disattid'] : 0;
        $disattdate = isset($_REQUEST['disattdate']) ? $_REQUEST['disattdate'] : 0;
        $disattreason = isset($_REQUEST['disattreason']) ? $_REQUEST['disattreason'] : 0;
        $remarkfordisapprove = isset($_REQUEST['remarkfordisapprove']) ? $_REQUEST['remarkfordisapprove'] : 0;
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $del_att = date("M d,Y", strtotime($disattdate));
        $disapprove_datetime = date("y-m-d H:i:s");

        $empcode = "";
        $name = "";
        $shiftid = "";
        $deptid = "";
        $desgid = "";
        $timein = "";
        $timeout = "";
        $timeindate = "";
        $timeoutdate = "";
        $disappstatus = 0;

        //var_dump($disattid);
        //var_dump($disattreason);
        $query = $this
            ->db
            ->query("SELECT (Select EmployeeCode from EmployeeMaster where EmployeeMaster.`Id` = AttendanceMaster.`EmployeeId` Limit 1) as empcode,`EmployeeId`,`ShiftId`,`Dept_Id`,`Desg_Id`,`AttendanceDate`,`TimeIn`,`TimeOut`,`timeindate`,`timeoutdate` FROM AttendanceMaster where Id=? AND OrganizationId=?", array(
            $disattid,
            $orgid
        ));
        if ($row = $query->row())
        {
            $empid = $row->EmployeeId;
            $empcode = $row->empcode;
            $name = getEmpName($row->EmployeeId);
            $shiftid = $row->ShiftId;
            $deptid = $row->Dept_Id;
            $desgid = $row->Desg_Id;
            $timein = $row->TimeIn;
            $timeout = $row->TimeOut;
            $timeindate = $row->timeindate;
            $timeoutdate = $row->timeoutdate;
        }

        $sql = "INSERT INTO Disapprove_approve (AttendanceId,EmployeeId,EmployeeCode,EmployeeName,ShiftId,deptid,desgid,AttendanceDate,OrganizationId,TimeIn,TimeOut,TimeInDate,TimeOutDate,disapprove_datetime,disapp_sts,disapp_reason,disapp_remark) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this
            ->db
            ->query($sql, array(
            $disattid,
            $empid,
            $empcode,
            $name,
            $shiftid,
            $deptid,
            $desgid,
            $disattdate,
            $orgid,
            $timein,
            $timeout,
            $timeindate,
            $timeoutdate,
            $disapprove_datetime,
            $disappstatus,
            $disattreason,
            $remarkfordisapprove
        ));
        $result = $this
            ->db
            ->affected_rows();
        if ($result > 0)
        {
            $query = $this
                ->db
                ->query("UPDATE `AttendanceMaster` set AttendanceStatus=2, disapprove_sts=1  where id=? and OrganizationId=?", array(
                $disattid,
                $orgid
            ));
        }

        $date = date("y-m-d H:i:s");
        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];
        $module = "Attendance";
        $actionperformed = "Attendance has been <b>Disapprove</b> for <b>" . $name . " of " . $del_att . "</b>";
        $activityby = 1;
        $query = $this
            ->db
            ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
            $date,
            $id,
            $module,
            $actionperformed,
            $orgid,
            $activityby,
            $id
        ));

        echo $this
            ->db
            ->affected_rows();
    }
public function getlattitude(){
	$orgid = $_SESSION['orgid'];
	$attid=isset($_REQUEST['aid'])?$_REQUEST['aid']:0;
	
	$query=$this->db->query("SELECT longi_out,latit_out,latit_in,longi_in,TimeIn,TimeOut,checkInLoc,checkOutLoc,TimeInGeoFence,TimeOutGeoFence,EmployeeId,FakeLocationStatusTimeIn,FakeLocationStatusTimeOut,areaId,device FROM AttendanceMaster Where Id=$attid AND OrganizationId=$orgid")->result();
	
	
	
	return $query;
	
}
public function getlattitude1(){
    $orgid = $_SESSION['orgid'];
    $attid=isset($_REQUEST['aid'])?$_REQUEST['aid']:0;
    
    $query=$this->db->query("SELECT longi_out,latit_out,latit_in,longi_in,TimeIn,TimeOut,checkInLoc,checkOutLoc,TimeInGeoFence,TimeOutGeoFence,EmployeeId,FakeLocationStatusTimeIn,FakeLocationStatusTimeOut,areaId,device FROM AttendanceMaster Where Id=$attid AND OrganizationId=$orgid")->result();
    
    
    
    return $query;
    
}
    public function updatetime()
    {

        $orgid = $_SESSION['orgid'];
        $id = isset($_REQUEST['aid']) ? $_REQUEST['aid'] : 0;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);

        $query = $this
            ->db
            ->query("UPDATE  AttendanceMaster SET TimeOut='00:00:00',Overtime='00:00:00',timeoutdate='0000-00-00',latit_out='0.0',longi_out='0.0',ExitImage='',CheckOutLoc='' Where OrganizationId=$orgid AND Id=$id");

        echo $this
            ->db
            ->affected_rows();
    }

    public function deleteAtt()
    {
        $orgid = $_SESSION['orgid'];
        $aid = isset($_REQUEST['aid']) ? $_REQUEST['aid'] : 0;
        $name1 = isset($_REQUEST['ana']) ? $_REQUEST['ana'] : 0;
        $deli_att = isset($_REQUEST['del_att']) ? $_REQUEST['del_att'] : 0;
        //$del_att= date("M d,Y",strtotime($del_att));
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $del_att = date("M d,Y", strtotime($deli_att));
        $del_datetime = date("y-m-d H:i:s");

        // echo $name;
        // die();
        $name = "";
        $empcode = "";
        $shiftid = "";
        $deptid = "";
        $desgid = "";
        $timein = "";
        $timeout = "";
        $timeindate = "";
        $timeoutdate = "";
        $del_reason = "";
        $remarkfordelete = "Deleted By Admin";
        $disappstatus = 2;

        //var_dump($disattid);
        //var_dump($disattreason);
        $query = $this
            ->db
            ->query("SELECT (Select EmployeeCode from EmployeeMaster where EmployeeMaster.`Id` = AttendanceMaster.`EmployeeId` Limit 1) as empcode,`EmployeeId`,`ShiftId`,`Dept_Id`,`Desg_Id`,`AttendanceDate`,`TimeIn`,`TimeOut`,`timeindate`,`timeoutdate` FROM AttendanceMaster where Id=? AND OrganizationId=?", array(
            $aid,
            $orgid
        ));
        if ($row = $query->row())
        {
            $empid = $row->EmployeeId;
            $name = getEmpName($row->EmployeeId);
            $empcode = $row->empcode;
            $shiftid = $row->ShiftId;
            $deptid = $row->Dept_Id;
            $desgid = $row->Desg_Id;
            $timein = $row->TimeIn;
            $timeout = $row->TimeOut;
            $timeindate = $row->timeindate;
            $timeoutdate = $row->timeoutdate;
        }

        $sql = "INSERT INTO Disapprove_approve (AttendanceId,EmployeeId,EmployeeCode,EmployeeName,ShiftId,deptid,desgid,AttendanceDate,OrganizationId,TimeIn,TimeOut,TimeInDate,TimeOutDate,disapprove_datetime,disapp_sts,disapp_reason,disapp_remark) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this
            ->db
            ->query($sql, array(
            $aid,
            $empid,
            $empcode,
            $name,
            $shiftid,
            $deptid,
            $desgid,
            $deli_att,
            $orgid,
            $timein,
            $timeout,
            $timeindate,
            $timeoutdate,
            $del_datetime,
            $disappstatus,
            $del_reason,
            $remarkfordelete
        ));
        $result = $this
            ->db
            ->affected_rows();
        if ($result > 0)
        {
            // $query = $this->db->query("UPDATE `AttendanceMaster` set AttendanceStatus=2, disapprove_sts=1  where id=? and OrganizationId=?",array($disattid,$orgid));
            $query = $this
                ->db
                ->query("DELETE FROM `AttendanceMaster` where Id=? and OrganizationId=?", array(
                $aid,
                $orgid
            ));
        }

        $date = date("y-m-d H:i:s");
        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];
        $module = "Attendance";
        $actionperformed = "Attendance has been <b>Deleted</b> for <b>" . $name . " of " . $del_att . "</b>";
        $activityby = 1;
        $query = $this
            ->db
            ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
            $date,
            $id,
            $module,
            $actionperformed,
            $orgid,
            $activityby,
            $id
        ));

        echo $this
            ->db
            ->affected_rows();
    }

    public function approveattendance()
    {

        $orgid = $_SESSION['orgid'];
        $aid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $name = isset($_REQUEST['disapp_aname']) ? $_REQUEST['disapp_aname'] : 0;
        $disapp_date = isset($_REQUEST['disapp_date']) ? $_REQUEST['disapp_date'] : 0;

        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $del_att = date("M d,Y", strtotime($disapp_date));
        $approve_datetime = date("y-m-d H:i:s");

        $sql = "UPDATE `Disapprove_approve` set approve_datetime=?, disapp_sts=1, approve_remark='Approved by Admin'  where disapp_sts=0 And  AttendanceId=? and OrganizationId=?";
        $query = $this
            ->db
            ->query($sql, array(
            $approve_datetime,
            $aid,
            $orgid
        ));
        $result = $this
            ->db
            ->affected_rows();
        if ($result > 0)
        {
            $query = $this
                ->db
                ->query("UPDATE `AttendanceMaster` set AttendanceStatus=1, disapprove_sts=0  where Id=? and OrganizationId=?", array(
                $aid,
                $orgid
            ));
        }
        // var_dump($this->db->last_query());
        $date = date("y-m-d H:i:s");
        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];
        $module = "Attendance";
        $actionperformed = "Attendance has been <b>Disapprove</b> for <b>" . $name . " of " . $del_att . "</b>";
        $activityby = 1;
        $query = $this
            ->db
            ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
            $date,
            $id,
            $module,
            $actionperformed,
            $orgid,
            $activityby,
            $id
        ));

        echo $this
            ->db
            ->affected_rows();
    }

    public function viewflexiattendance($aid)
    {
        $orgid = $_SESSION['orgid'];

        //echo $aid;
        //die();
        $query = $this
            ->db
            ->query("SELECT A.EmployeeId,A.AttendanceDate,A.ShiftId,SUBSTRING(I.`TimeIn`, 1, 5) as timein,I.`TimeInImage`,I.`TimeInLocation`,I.`TimeInCity`,I.`TimeInAppVersion`,I.`TimeInGeofence`,SUBSTRING(I.`TimeOut`, 1, 5) as timeout,I.`TimeOutImage`,I.`TimeOutLocation`,I.`TimeOutCity`,I.`TimeOutAppVersion`,I.`TimeOutGeofence`,I.`Device`,I.`Platform`,SUBSTRING(I.`LoggedHours`, 1, 5) as loggedhours,SUBSTRING(A.TotalLoggedHours, 1, 5) as totalloggedhours,SUBSTRING(S.HoursPerDay, 1, 5) as hoursperday,A.Overtime FROM `InterimAttendances` I, AttendanceMaster A, ShiftMaster S WHERE A.Id=I.AttendanceMasterId AND S.Id=A.`ShiftId` And I.`AttendanceMasterId`=?", array(
            $aid
        ));

        /* var_dump($this->db->last_query());
         die; */

        $res = array();
        $result = array();
        $TotalLoggedHours = '';
        $attdate = '';
        $hrsperday = '';
        $underover = '';
        foreach ($query->result() as $row)
        {
            $data = array();
            $attdate = $row->AttendanceDate;
            //$data['EmployeeId']=$row->EmployeeId;
            $data['AttendanceDate'] = $row->AttendanceDate;
            $data['ShiftId'] = getShift($row->ShiftId);

            //$data['TimeInImage'] = $row->TimeInImage;
            $data['TimeInImage'] = '<img src="' . $row->TimeInImage . '" class="rounded-circle" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover;"/>';

            $data['TimeOutImage'] = '<img src="' . $row->TimeOutImage . '" class="rounded-circle" style="width:42px!important;height:42px!important;border-radius:50%;object-fit:cover;"/>';

            $data['TimeInGeofence'] = '';
            $data['TimeOutGeofence'] = '';

            if ($row->TimeInGeofence == 'Within Geofence' && $row->TimeOutGeofence != '')
            {
                $data['TimeInGeofence'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green" style="font-size:12px">' . $row->TimeInGeofence . '</div>';
            }
            elseif ($row->TimeInGeofence == '')
            {
                $data['TimeInGeofence'] = '<center><span style="text-align:center;color:black;"></span></center>';
            }
            else
            {
                $data['TimeInGeofence'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red" style="font-size:12px">' . $row->TimeInGeofence . '</div>';
            }

            if ($row->TimeOutGeofence == 'Within Geofence' && $row->TimeOutGeofence != '')
            {
                $data['TimeOutGeofence'] = '<div title="Attendance marked from the assigned area" class="text-center"  data-background-color="green" style="font-size:12px">' . $row->TimeOutGeofence . '</div>';
            }
            elseif ($row->TimeOutGeofence == '')
            {
                $data['TimeOutGeofence'] = '<center><span style="text-align:center;color:black;"></span></center>';
            }
            else
            {
                $data['TimeOutGeofence'] = '<div title="Attendance marked from the out side of assigned area" class="text-center" data-background-color="red" style="font-size:12px">' . $row->TimeOutGeofence . '</div>';
            }

            $data['TimeInLocation'] = '<i class="fa fa-location-arrow fa-2x" style="margin-left:0.5rem;color:#3190E8;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->TimeInLocation . '" data-toggle="tooltip" data-placement="top"></i>';

            $data['TimeOutLocation'] = '<i class="fa fa-location-arrow fa-2x" style="margin-left:0.5rem;color:red;" data-target="#locationmodal"  data-toggle="modal"  title="' . $row->TimeOutLocation . '" data-toggle="tooltip" data-placement="top"></i>';

            $data['TimeIn'] = $row->timein . '<br>' . $data['TimeInImage'] . '<br>' . $data['TimeInLocation'];
            $data['TimeOut'] = $row->timeout . '<br>' . $data['TimeOutImage'] . '<br>' . $data['TimeOutLocation'];

            $data['TimeInCity'] = $row->TimeInCity;
            $data['TimeOutCity'] = $row->TimeOutCity;
            $data['TimeInAppVersion'] = $row->TimeInAppVersion;
            $data['TimeOutAppVersion'] = $row->TimeOutAppVersion;

            $data['Device'] = $row->Device;
            $data['Platform'] = $row->Platform;
            $data['LoggedHours'] = $row->loggedhours;
            if ($TotalLoggedHours != '00:00:00')
            {
                $TotalLoggedHours = $row->totalloggedhours;
            }
            else
            {
                $TotalLoggedHours = "00:00";
            }
            $hrsperday = $row->hoursperday;
            //substr($row->Overtime,0,6);
            $underover = substr($row->Overtime, 0, 6);
            $res[] = $data;
        }
        $result['data'] = $res;
        $result['totalloghrs'] = $TotalLoggedHours;
        $result['AttendanceDate1'] = $attdate;
        $result['HoursPerDay'] = $hrsperday;
        $result['UnderOver'] = $underover;
        return $result;
    }

    public function editAttUBI()
    {
        $orgid = $_SESSION['orgid'];
        $res = 0;
        $aid = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : '';
        //$tomorrow=date('Y-m-d', strtotime('+1 day', strtotime($date)));
        $to = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ''));
        $device = 'TimeOut marked by Admin';
        ///////// Push Notifications by Nitin
        $AttEditedPerm = getNotificationPermission($orgid, 'AttEdited');

        $empid = getEmpIDbyAttendanceId($aid, $orgid);

        $name = getEmpName($empid);

        $string1 = $name;
        $string1 = ucwords($string1);

        $string1 = str_replace('', '-', $string1); // Replaces all spaces with hyphens.
        $string1 = preg_replace('/[^A-Za-z0-9\-]/', '', $string1);

        $EmployeeTopic = $string1 . $empid;

        ///////// Push Notifications by Nitin
        ///////// Push Notifications by Nitin
        if ($AttEditedPerm == 10 || $AttEditedPerm == 11 || $AttEditedPerm == 14 || $AttEditedPerm == 15) sendManualPushNotification("('$EmployeeTopic' in topics)", "Your Attendance has been edited by the Admin.", "");
        ///////// Push Notifications by Nitin
        //$timeoutimage="https://ubitech.ubihrm.com/public/avatars/male.png";
        //$timeoutimage=IMGURL."uploads/male.png";
        $timeoutimage = 'https://ubiattendance.ubihrm.com/assets/img/managerdevice.png';
        if ($date)
        {

            $query = $this
                ->db
                ->query("UPDATE `AttendanceMaster` SET `TimeOut`=?,TimeOutEditStatus = 1,device=?,ExitImage=?,timeoutdate=? where Id=? and OrganizationId=?", array(
                $to,
                $device,
                $timeoutimage,
                $date,
                $aid,
                $orgid
            ));
            $res = $this
                ->db
                ->affected_rows();
            $this
                ->db
                ->close();
            echo $res;
        }
        else
        {
            $query = $this
                ->db
                ->query("UPDATE `AttendanceMaster` SET `TimeOut`=?,TimeOutEditStatus = 1,device=?,ExitImage=?  where Id=? and OrganizationId=?", array(
                $to,
                $device,
                $timeoutimage,
                $aid,
                $orgid
            ));
            $res = $this
                ->db
                ->affected_rows();
            $this
                ->db
                ->close();
            echo $res;

        }
    }

    function getweeklyoff($date, $shiftid, $emplid)
    {
        // echo $date;
        $orgid = $_SESSION['orgid'];
        $dt = $date;

        $dayOfWeek = 1 + date('w', strtotime($dt));
        $weekOfMonth = weekOfMonth($dt);
        $week = '';
        $query = $this
            ->db
            ->query("Select ShiftId from AttendanceMaster where AttendanceDate < '$date' AND EmployeeId = '$emplid' ORDER BY AttendanceDate DESC LIMIT 1");

        if ($row = $query->result())
        {
            $shiftid = $row[0]->ShiftId;
        }
        else
        {
            return "N/A";
        }

        $query = $this
            ->db
            ->query("SELECT `WeekOff` FROM  `ShiftMasterChild` WHERE  `OrganizationId` =? AND  `Day` =  ? AND ShiftId=? ", array(
            $orgid,
            $dayOfWeek,
            $shiftid
        ));
        $flage = false;
        if ($row = $query->result())
        {
            $week = explode(",", $row[0]->WeekOff);
            $flage = true;
        }
        if ($flage && $week[$weekOfMonth - 1] == 1)
        {
            return "WO";
        }
        else
        {
            // echo $dt;
            // echo "<br/>";
            $query = $this
                ->db
                ->query("SELECT `DateFrom`, `DateTo` FROM `HolidayMaster` WHERE OrganizationId=? and (? between `DateFrom` and `DateTo`) ", array(
                $orgid,
                $dt
            ));
            if ($query->num_rows() > 0)
            {
                return "H";
            }
            else
            {
                return "N/A";
            }
        }
    }

    public function updatestatusnew()
    {
        $orgid = $_SESSION['orgid'];
        $aid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
        $Asts = 7;

        $query = $this
            ->db
            ->query("UPDATE AttendanceMaster SET AttendanceStatus=$Asts, Wo_H_Hd = $status WHERE Id=$aid and OrganizationId=$orgid ");
        //var_dump($this->db->last_query());
        //die;
        $res = $this
            ->db
            ->affected_rows();
        $this
            ->db
            ->close();
        echo $res;
    }
    // function make_query()
    //     {
    //          $this->db->select($this->select_column);
    //          $this->db->from($this->table);
    //          if(isset($_POST["search"]["value"]))
    //          {
    //               $this->db->like("FIRST_NAME", $_POST["search"]["value"]);
    //               $this->db->or_like("LAST_NAME", $_POST["search"]["value"]);
    //          }
    //          if(isset($_POST["order"]))
    //          {
    //               $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //          }
    //          else
    //          {
    //               $this->db->order_by('WORKER_ID', 'ASC');
    //          }
    //     }
    

    public function updatestatus()
    {
        $orgid = $_SESSION['orgid'];
        $aid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
        $shiftid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : 0;
        $Dept_id = isset($_REQUEST['deptid']) ? $_REQUEST['deptid'] : 0;
        $Desg_id = isset($_REQUEST['desgid']) ? $_REQUEST['desgid'] : 0;
        $dateby = date("Y-m-d");

        /* $query=$this->db->query("SELECT * FROM `AttendanceMaster` WHERE `EmployeeId` = 4902 AND AttendanceDate='2020-10-15'"); */

        $query = $this
            ->db
            ->query("INSERT INTO AttendanceMaster(EmployeeId, AttendanceDate,Wo_H_Hd, AttendanceStatus, TimeIn,ShiftId, OrganizationId, CreatedDate, CreatedById, LastModifiedDate, LastModifiedById, OwnerId, Overtime, EntryImage, checkInLoc, device,TimeinIp,Dept_id,Desg_id) VALUES ($aid,'$dateby','$status',7,'00:00:00',$shiftid,$orgid,'$dateby',0,'$dateby',0,0,'00:00:00','','','Absentee Cron','0',$Dept_id,$Desg_id)");

        //var_dump($query);
        //  die();
        /* $query=$this->db->query("UPDATE AttendanceMaster SET AttendanceStatus=$status WHERE Id=$aid and OrganizationId=$orgid "); */

        $res = $this
            ->db
            ->affected_rows();
        $this
            ->db
            ->close();
        echo $res;

    }

    public function getNotReportedEmp($postData = Null)
    {
        $org_id = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : 0;
        // echo $deprtid;
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : 0;
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $res = array();
        $startdate = "";
        $enddate = "";
        $s = '';
        $s1 = '';
        if ($date == '')
        {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            //echo $datestatus;
            if ($datestatus == 1)
            {
                // $enddate=date('Y-m-d');//,(strtotime ( "-1 day",strtotime(date('Y-m-d'))) ));
                $enddate = date('Y-m-d');
                //echo  $enddate;
                $startdate = date('Y-m-d', strtotime('0 day', strtotime($enddate)));
                // echo  $startdate;
                // echo $startdate.'-'.$enddate;
                // exit();
                
            }

            else
            {
                $enddate = date("Y-m-d");
                $startdate = date("Y-m-d");
            }
        }
        if ($shiftid != 0)
        {
            $s = " AND ShiftId='$shiftid' ";
            $s1 = " AND Shift='$shiftid' ";

        }
        if ($deprtid != 0)
        {
            $s .= " AND `Dept_id` = '$deprtid' ";
            $s1 .= " AND `Department`='$deprtid' ";
        }
        if ($emplid != 0)
        {
            $s1 .= " AND E.Id='$emplid' ";
            $s .= "AND EmployeeId = '$emplid'";
        }
        if ($desgid != 0)
        {
            $s .= " AND `Desg_id`='$desgid' ";
            $s1 .= " AND `Designation`='$desgid' ";
        }
        if ($date != '')
        {
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
        $zname = getTimeZone($org_id);
        date_default_timezone_set($zname);
        $todate = date('Y-m-d');
        //date_default_timezone_set ($zname);
        $time = date("H:i:s");
        //var_dump($time);
        $i = 0;



     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value
       

     $searchQuery = "";
				 	
		         if($searchValue != ''){
		            $searchQuery = "  And ( E.EmployeeCode like '%".$searchValue."%' || E.FirstName like '%".$searchValue."%' )";
					
		         }
				 
				 $query = $this->db->query("Select '-' as device, E.Id as EmployeeId,E.EmployeeCode,(CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) as newshift ,E.Shift as ShiftId ,'" . $todate . "' as AttendanceDate,(select disapp_sts from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveStatus, (select disapp_reason from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveReason,(SELECT A.TimeIn from AttendanceMaster A where A.EmployeeId=E.Id and A.AttendanceDate='" . $todate . "' limit 1) as TimeIn, (select disapp_remark from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id AND Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveRemark FROM EmployeeMaster E,ShiftMaster S Where E.Id NOT IN (select A.EmployeeId From AttendanceMaster A where A.AttendanceDate= '" . $todate . "' AND A.OrganizationId= " . $org_id . " AND AttendanceStatus IN (1,8,4,7) and A.Wo_H_Hd NOT IN (11,12) ) And E.Id NOT IN (select L.EmployeeId From AppliedLeave L where L.Date = '" . $todate . "' AND L.OrganizationId=" . $org_id . " AND ApprovalStatus = 2) AND E.OrganizationId = " . $org_id . " AND (CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) = S.Id AND S.TimeIn <'$time' $s1 AND E.archive = 1 And Is_Delete=0 group By EmployeeId");
		         $totalRecords = $query->num_rows();
				 
				 if($searchQuery != '')
		         $query = $this->db->query("Select '-' as device, E.Id as EmployeeId,E.EmployeeCode,(CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) as newshift ,E.Shift as ShiftId ,'" . $todate . "' as AttendanceDate,(select disapp_sts from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveStatus, (select disapp_reason from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveReason,(SELECT A.TimeIn from AttendanceMaster A where A.EmployeeId=E.Id and A.AttendanceDate='" . $todate . "' limit 1) as TimeIn, (select disapp_remark from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id AND Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveRemark FROM EmployeeMaster E,ShiftMaster S Where E.Id NOT IN (select A.EmployeeId From AttendanceMaster A where A.AttendanceDate= '" . $todate . "' AND A.OrganizationId= " . $org_id . " AND AttendanceStatus IN (1,8,4,7) and A.Wo_H_Hd NOT IN (11,12) ) And E.Id NOT IN (select L.EmployeeId From AppliedLeave L where L.Date = '" . $todate . "' AND L.OrganizationId=" . $org_id . " AND ApprovalStatus = 2) AND E.OrganizationId = " . $org_id . " AND (CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And  ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) = S.Id $searchQuery AND S.TimeIn <'$time' $s1 AND E.archive = 1 And Is_Delete=0 group By EmployeeId");
		         $totalRecordwithFilter = $query->num_rows(); 
		        // var_dump($totalRecordwithFilter);
				// die()
		
		
       
        $d = array();

        foreach ($dateRange as $date)
        {
            $range = $date->format('Y-m-d');
            $query = "";
            //print_r($range);
            //var_dump($range);
            if (strtotime($range) == strtotime($todate)) //fetch data today
            
            {
                $query = $this->db->query("Select '-' as device, E.Id as EmployeeId,E.EmployeeCode,(CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) as newshift ,E.Shift as ShiftId ,'" . $todate . "' as AttendanceDate,(select disapp_sts from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveStatus, (select disapp_reason from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveReason,(SELECT A.TimeIn from AttendanceMaster A where A.EmployeeId=E.Id and A.AttendanceDate='" . $todate . "' limit 1) as TimeIn, (select disapp_remark from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id AND Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $todate . "' limit 1) as DisapproveRemark FROM EmployeeMaster E,ShiftMaster S Where E.Id NOT IN (select A.EmployeeId From AttendanceMaster A where A.AttendanceDate= '" . $todate . "' AND A.OrganizationId= " . $org_id . " AND AttendanceStatus IN (1,8,4,7) and A.Wo_H_Hd NOT IN (11,12) ) And E.Id NOT IN (select L.EmployeeId From AppliedLeave L where L.Date = '" . $todate . "' AND L.OrganizationId=" . $org_id . " AND ApprovalStatus = 2) AND E.OrganizationId = " . $org_id . " AND (CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) = S.Id $searchQuery AND S.TimeIn <'$time' $s1  AND E.archive = 1 And Is_Delete=0  group By EmployeeId $columnSortOrder Limit $start,$rowperpage");
                //var_dump($this->db->last_query());
              
                
            }
            else
            {
             $query = $this->db->query("Select A.device,E.Id,E.EmployeeCode,A.EmployeeId,A.AttendanceDate,A.ShiftId,(CASE WHEN (E.Id IN (SELECT empid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id)) THEN (SELECT shiftid FROM ShiftPlanner WHERE ShiftPlanner.ShiftDate='" . $todate . "' And ShiftPlanner.orgid=" . $org_id . " And ShiftPlanner.empid=E.Id) ELSE E.Shift END) as newshift ,(select disapp_sts from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $range . "' limit 1) as DisapproveStatus, (select disapp_reason from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id And Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $range . "' limit 1) as DisapproveReason, (select disapp_remark from Disapprove_approve where Disapprove_approve.EmployeeId=E.Id AND Disapprove_approve.disapp_sts=0 AND Disapprove_approve.AttendanceDate='" . $range . "' limit 1) as DisapproveRemark FROM AttendanceMaster A,EmployeeMaster E where A.AttendanceDate = '" . $range . "'  $s and A.AttendanceStatus in (2,7) And A.Wo_H_Hd NOT IN(11,12) AND E.Id=A.EmployeeId AND E.Is_Delete = 0  AND  A.OrganizationId = " . $org_id);

                
                
            }
            foreach ($query->result() as $row)
            {
                $data = array();
                $empid = $row->EmployeeId;
                $attdate = $row->AttendanceDate;

         
                $name = ucwords(getEmpName($row->EmployeeId));
                if ($name != "")
                {
                    $data['FirstName'] = $name;
                    $data['code'] = $row->EmployeeCode;
                    $data['absentdate'] = date('M d,Y', strtotime($row->AttendanceDate));

                    $Tio = getShiftTimes($row->ShiftId);
                    $data['shift'] = getShift($row->ShiftId) . " (" . $Tio . ")";
                    if (strtotime($range) == strtotime($todate))
                    {
                        $data['device'] = ' - ';
                    }
                    else
                    {
                        $data['device'] = $row->device;
                    }

                    if ($row->DisapproveReason == '' && $row->DisapproveStatus == '0')
                    {
                        $data['disreason'] = '--';
                    }
                    elseif ($row->DisapproveReason == '')
                    {
                        $data['disreason'] = 'Not Reported';
                    }
                    else
                    {
                        $data['disreason'] = $row->DisapproveReason;
                    }

                    if ($row->DisapproveRemark == '')
                    {
                        $data['disremark'] = '--';
                    }
                    elseif ($row->DisapproveRemark == '' && $row->DisapproveStatus == 0)
                    {
                        $data['disremark'] = '--';
                    }
                    else
                    {
                        $data['disremark'] = $row->DisapproveRemark;
                    }

                    $data['desg'] = ucwords(getDesignationByEmpID($row->EmployeeId));
                    $data['deprt'] = ucwords(getDepartmentByEmpID($row->EmployeeId));
                    $res[] = $data;
                }

            }

        }
       
        $this->db->close();
        $response = array(
                "draw" => intval($draw) ,
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordwithFilter,
                "aaData" => $res
            );
            //echo json_encode($d);
            return $response;

    }



      public function editimg()
          {  
             $orgid =$_SESSION['orgid'];
             $empid =  isset($_REQUEST['id'])?$_REQUEST['id']:'';
             $locProfile=IMGURL2."uploads/$orgid/";
             $profileE=isset($_REQUEST["profimg"])?$_REQUEST["profimg"]:"";
             $name = substr($profileE, strrpos($profileE, '/') + 1);
             $title = explode('_', $name);
             $copyfile='attendance_images/'.$name;
             $new_name = $empid.".jpg";
             
             //$destination='attendance/'.$orgid.'/'.$new_name;
             //echo $profileE;
             //die(); 
             $path=$new_name;
             if (!file_exists($locProfile))
             {
             mkdir($locProfile ,0777,true);
             }
              if(LOCATION=='online')
              {
                $file = file_get_contents($profileE);
                //echo $file;
                //exec("aws s3 mv $file s3://ubihrmimages/attendance_images/");
                S3::putObjectString($file,'ubihrmimages',''.$orgid.'/'.$new_name);
                $updSts=0;
                $sql = "update EmployeeMaster set ImageName=? where OrganizationId = ? and id =? ";
                $query = $this->db->query($sql,array($path,$orgid,$empid));
                $updSts+=$this->db->affected_rows();
                echo $query;
              }
               
          }

          function saveGeolocation()
    {
      $radius =  isset($_REQUEST['radius'])?$_REQUEST['radius']:0;
      $location =  isset($_REQUEST['location'])?$_REQUEST['location']:'';
      $latlong =  isset($_REQUEST['latlong'])?$_REQUEST['latlong']:'';
      $name =  isset($_REQUEST['name'])?$_REQUEST['name']:'';
      $id =  isset($_REQUEST['id'])?$_REQUEST['id']:0;
      $orgid = $_SESSION['orgid'];
      $data = array();

    
      $zone=getTimeZone($orgid);
      date_default_timezone_set($zone);


      if($id != 0)
      {
        $query = $this->db->query("UPDATE Geo_Settings SET Lat_Long=?,Location=?,Radius=?,Name=? WHERE Id = ? AND OrganizationId= ? " ,array($latlong,$location,$radius,$name,$id,$orgid));
         $res= $this->db->affected_rows();
             if($res)
             {
             $data['status']= true; 
             $data['sms']= "Location update successfull"; 
              
             }
             else
             {
               $data['status']= false; 
               $data['sms']= "There is some problem when update a location"; 
             }
         return $data;
      }
      else
      {
            $res=0;
            $query=$this->db->query("select Id from Geo_Settings where Name=? and OrganizationId=?",array($name,$orgid));
            if($query->num_rows()>0)
            {
             $res=2;    
             
            if($res==2)
                 {  
                 $data['status']= false; 
                 $data['sms']= "Geo Center Name Already exist"; 
                 }
                 else
                 {
                   $data['status']= 'ok'; 
                   $data['sms']= "There is some problem when insert a location"; 
                 }
                return $data;
            }
            else
            {
              $query=$this->db->query("INSERT INTO  Geo_Settings (`OrganizationId`,`Lat_Long`,`Location`,`Radius`,`Name`) VALUES (?,?,?,?,?)",array($orgid,$latlong,$location,$radius,$name));
              $res= $this->db->affected_rows() ;
                 if($res)
                 { 
                 $data['status']= true; 
                 $data['sms']= "Geo center added successfully";

                  $date = date("y-m-d H:i:s");
                   $orgid =$_SESSION['orgid'];
                   $id =$_SESSION['id'];
                   $module = "Settings";
                   $actionperformed = " <b>".$name." Geo Location</b> is added from <b> Geo Fence.</b>";
                   $activityby = 1;
                   
                    $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module,ActivityBy, ActionPerformed,adminid, OrganizationId) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module, $activityby,$actionperformed,$id,$orgid)); 

                    // var_dump($this->db->last_query());
                 }
                 else
                 {
                   $data['status']= false; 
                   $data['sms']= "There is some problem while creating geo fence"; 
                 }
                 return $data;
              }
             
        }
    
    }
	  public function trackLocations($eid,$date){
   			header('Access-Control-Allow-Origin: *'); 
   			$res=array();
   			// $d=array();
   			$orgid=isset($_SESSION['orgid'])?$_SESSION['orgid']:'0';
   			//$eid=isset($_SESSION['eid'])?$_SESSION['eid']:'0';
   			//$date=isset($_SESSION['date'])?$_SESSION['date']:'0';
   			$query = $this->db->query("SELECT FakeVisitOutTimeStatus, FakeVisitInTimeStatus , FakeVisitOutTimeStatus,`EmployeeId`,`location`, `latit`, `longi`, `time`,`time_out`, `location_out`,`checkin_img`,`latit_out`,`longi_out`,`checkout_img`, `date`, `client_name`, `description`,CASE WHEN(time_out>=time && time_out !='00:00:00' && time!='00:00:00') THEN TimeDiff( concat(date, ' ' ,time_out) , concat(date, ' ', time)) WHEN(time_out !='00:00:00' && time!='00:00:00') THEN (timediff('24:00:00',TimeDiff( concat(date, ' ' ,time) , concat(date, ' ', time_out)) )) ELSE('00:00') END as workhour,(SELECT  sec_to_time( sum(time_to_sec(timediff(`time_out`,`time`)))) as abc FROM `checkin_master` WHERE EmployeeId=$eid and  date ='$date' and time_out != '00:00:00') as twh FROM checkin_master  where EmployeeId=? and date =?  and OrganizationId=? order by time asc ",array($eid,$date,$orgid));
  
   			
   			$i=1;
   			 foreach ($query->result() as $row)
   			 	{	
   					$dat=array();
   
   					$dat['sno'] = $i++;
   					$dat['client'] = $row->client_name;
   					$dat['inimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="'.$row->EmployeeId.'" data-enimage="'.$row->checkin_img.'"><img src="'.$row->checkin_img.'"  style="width:60px!important; "  /></i>';
					
					


                $dat['tin'] = substr($row->time,0,5) ;
				 
   					
   					if($row->FakeVisitInTimeStatus == 1){
   
   						$dat['fti']='<div title="TimeIn recorded maliciously" class="text-center"  data-background-color="red">Fake</div>';
   
   					}
   					else{
   						$dat['fti']="";
   					}
					
   
   					$dat['tif']="";
					$data['test'] = '<a href="http://maps.google.com/?q='.$row->latit.','.$row->longi.'" target="_blank" title="Click here to point location on google map" ><img src="' . URL . "../assets/icons/withgeo.svg" . '"  style="width:28.33px!important;height:28.33px!important;" data-target="#locationmodal" data-toggle="modal" title="'.$row->location.'" data-toggle="tooltip" data-placement="top" /></a>';
					
   					if($row->FakeVisitInTimeStatus == 0){
   						$dat['tif'] =  substr($row->time,0,5). '<br>' . $data['test'];
   					}
					
   					else{
   						$dat['tif']=substr($row->time,0,5).' ' .$dat['fti'] ;
   					}
					
   
   					$dat['inloc'] = '<a href="http://maps.google.com/?q='.$row->latit.','.$row->longi.'" target="_blank" title="Click here to point location on google map" >'.$row->location.'</a>';
					
   
   					$dat['otimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal" data-id="'.$row->EmployeeId.'" data-enimage="'.$row->checkout_img.'"><img src="'.$row->checkout_img.'"  style="width:60px!important; "  /></i>';
   
   					$dat['to']=substr($row->time_out,0,5);
					
   
   					if($row->FakeVisitOutTimeStatus == 1){
   
   						$dat['fto']='<div title="TimeOut recorded maliciously" class="text-center"  data-background-color="red">Fake</div>';
   
   					}
   					else{
   						$dat['fto']="";
   					}
   
   					$dat['tof']="";
					 $data['test1'] = '<a href="http://maps.google.com/?q='.$row->latit.','.$row->longi.'" target="_blank" title="Click here to point location on google map" ><img src="' . URL . "../assets/icons/without.svg" . '"  style="width:28.33px!important;height:28.33px!important;" data-target="#locationmodal" data-toggle="modal" title="' .$row->location_out. '"  data-toggle="tooltip" data-placement="top" /></a>';
   					if($row->FakeVisitOutTimeStatus == 0){
   						$dat['tof'] =  substr($row->time_out,0,5) . '<br>' . $data['test1'];
   					}
   					else{
   						$dat['tof']=substr($row->time_out,0,5).' ' .$dat['fto'];
   					}
   
   					$dat['outloc'] = '<a href="http://maps.google.com/?q='.$row->latit.','.$row->longi.'" target="_blank" title="Click here to point location on google map" >'.$row->location_out.'</a>';
   
   					$dat['workhr'] = substr($row->workhour,0,5);
				/* var_dump ($dat['workhr']);
				exit; */
 
   					$dat['desc'] = $row->description ;
   					$dat['latit'] = $row->latit ;
   					$dat['longi'] = $row->longi ;
   					$dat['latit_out'] = $row->latit_out ;
   					$dat['longi_out'] = $row->longi_out ;
   		
   		$res[]=$dat;
   			    }
   		     	
   		    	 	
   			return  $res;
   		}	

}

?>





<?php

require(APPPATH . "vendor/autoload.php");
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//require_once("s3.php");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function encode_vt5($num) {
    return (($num * $num) + 99);
}

function decode_vt5($num) {
    $num = $num - 99;
    return (sqrt($num));
}
    function getInterimAttAvailableSts($aid)
    {
      		$ci =& get_instance();
		    $ci->load->database();
		    $query = $ci->db->query("SELECT id FROM `InterimAttendances` WHERE `AttendanceMasterId`=$aid");
			if($ci->db->affected_rows())
			{
              return true;
			}
			else
			{
		      return false;
			}   
    }
function encrypt($string, $key = "ubitech") {
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function decrypt($string, $key = "ubitech") {
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

function encode5t($str) {
    for ($i = 0; $i < 5; $i++) {
        $str = strrev(base64_encode($str)); //apply base64 first and then reverse the string
    }
    return $str;
}

function decode5t($str) {
    for ($i = 0; $i < 5; $i++) {
        $str = base64_decode(strrev($str)); //apply base64 first and then reverse the string}
    }
    return $str;
}

    function getPresignedURL($BUCKET_NAME,$ImageName){

      //$BUCKET_NAME = 'virtualityobjects';
      // $IAM_KEY = IAMKEY;
      // $IAM_SECRET = IAMSECRET;



      //S3 connection 
      $s3 = S3Client::factory(
          array(
            'credentials' => array(
              'key' => IAMKEY,
              'secret' => IAMSECRET
            ),
            'version' => 'latest',
            'region'  => 'ap-south-1'
          )
        );
        $keyPath = $ImageName;
        //$keyPath = 'upload/'.$ImageName; // file name(can also include the folder name and the file name. eg."member1/IoT-Arduino-Monitor-circuit.png")
          //S3 connection 
        $fileName = 'profile_image.jpg';
        $command = $s3->getCommand('GetObject', array(
                    'Bucket'      => $BUCKET_NAME,
                    'Key'         => $keyPath,
                    'ContentType' => 'image/jpg',
                    'ResponseContentDisposition' => 'attachment; filename="'.$fileName.'"'
                ));
        $signedUrl = $s3->createPresignedRequest($command, "+10 minutes"); 

        $presignedUrl = (string)$signedUrl->getUri();   

     // echo IAMKEY.'<br>';
     // echo IAMSECRET; 
     // exit();

        return $presignedUrl;
 }  

function time_to_decimal($time) {
    $timeArr = explode(':', $time);
    $decTime = ($timeArr[0] * 60) + ($timeArr[1]) + ($timeArr[2] / 60);

    return $decTime;
}

function decimal_to_time($decimal) {
    $hours = floor($decimal / 60);
    $minutes = floor($decimal % 60);
    $seconds = $decimal - (int) $decimal;
    $seconds = round($seconds * 60);

    return str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
}

function make_rand_pass() {
    $rand_id = "";
    for ($i = 1; $i < 10; $i++) {
        mt_srand((double) microtime() * 1000000);
        $num = mt_rand(1, 36);
        $rand_id .= assign_rand_value($num);
    }
    return $rand_id;
}

function getFlexiShift($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT HoursPerDay FROM `ShiftMaster` where id='$id'");
    $res = array();
    foreach ($query->result() as $row) {
        return substr(($row->HoursPerDay), 0, 5);
    }
}

function assign_rand_value($num) {
// accepts 1 - 36
    switch ($num) {
        case "1":
            $rand_value = "A";
            break;
        case "2":
            $rand_value = "B";
            break;
        case "3":
            $rand_value = "C";
            break;
        case "4":
            $rand_value = "D";
            break;
        case "5":
            $rand_value = "E";
            break;
        case "6":
            $rand_value = "F";
            break;
        case "7":
            $rand_value = "G";
            break;
        case "8":
            $rand_value = "H";
            break;
        case "9":
            $rand_value = "I";
            break;
        case "10":
            $rand_value = "J";
            break;
        case "11":
            $rand_value = "K";
            break;
        case "12":
            $rand_value = "L";
            break;
        case "13":
            $rand_value = "M";
            break;
        case "14":
            $rand_value = "N";
            break;
        case "15":
            $rand_value = "O";
            break;
        case "16":
            $rand_value = "P";
            break;
        case "17":
            $rand_value = "Q";
            break;
        case "18":
            $rand_value = "R";
            break;
        case "19":
            $rand_value = "S";
            break;
        case "20":
            $rand_value = "T";
            break;
        case "21":
            $rand_value = "U";
            break;
        case "22":
            $rand_value = "V";
            break;
        case "23":
            $rand_value = "W";
            break;
        case "24":
            $rand_value = "X";
            break;
        case "25":
            $rand_value = "Y";
            break;
        case "26":
            $rand_value = "Z";
            break;
        case "27":
            $rand_value = "0";
            break;
        case "28":
            $rand_value = "1";
            break;
        case "29":
            $rand_value = "2";
            break;
        case "30":
            $rand_value = "3";
            break;
        case "31":
            $rand_value = "4";
            break;
        case "32":
            $rand_value = "5";
            break;
        case "33":
            $rand_value = "6";
            break;
        case "34":
            $rand_value = "7";
            break;
        case "35":
            $rand_value = "8";
            break;
        case "36":
            $rand_value = "9";
            break;
    }
    return $rand_value;
}

function handleLogin() {
    if ($_SESSION['attendanceAdmin'] == false) {
        unset($_SESSION["attendanceAdmin"]);
        redirect(URL);
        exit();
    }

    /* else if($_SESSION['attendanceAdmin'] !=false)
      {
      $status = getpenaladminstatus($_SESSION['id']);
      if($status==0)
      {
      unset($_SESSION["attendanceAdmin"]);
      redirect(URL);
      exit();
      }

      } */

    // if(isset($_SESSION['datadelsts']))
    // {
    // if($_SESSION['datadelsts']==0 )
    // {
    // redirect(URL.'login/keepattendance');
    // }
    // }
    // else
    // {
    // redirect(URL.'login/keepattendance');
    // }
}

function getAdminNameforactivitylog($id) {

    $ci = & get_instance();
    $ci->load->database();
    $orgid = $_SESSION['orgid'];
    //var_dump($id);

    $query = $ci->db->query("SELECT name FROM `admin_login` WHERE Id=$id and OrganizationId = $orgid");

    if ($ci->db->affected_rows()) {
        $res = array();
        foreach ($query->result() as $row) {
            return $row->name;
        }
    } else {
        $query = $ci->db->query("SELECT CONCAT(FirstName,' ',LastName) as name FROM `EmployeeMaster` where id= '$id' And OrganizationId = $orgid AND Is_Delete = '0' ");

        $res = array();
        foreach ($query->result() as $row) {
            return $row->name;
        }
    }
}

function Checkemplonleave($orgid, $emp_id) {
    $ci = & get_instance();
    $ci->load->database();

    /*     * *****get time zone******** */
    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    /*     * *****get time zone******** */

    $today = date('Y-m-d');
    $query = $ci->db->query("SELECT EmployeeId FROM `AppliedLeave` where OrganizationId='$orgid' And EmployeeId='$emp_id' And Date='$today' And ApprovalStatus=2");
    //var_dump($ci->db->last_query());
    if ($row = $query->row()) {
        return $row->EmployeeId;
    }
}

function getpenaladminstatus($id) {
    $ci = & get_instance();
    $ci->load->database();
    $data = 1;
    $query = $ci->db->query("SELECT status FROM `admin_login` where id=$id");
    if ($row = $query->row()) {
        $data = $row->status;
    }
    return $data;
}

function getDeptEmpName($departid) {
    $ci = & get_instance();
    $ci->load->database();
    $orgid = $_SESSION['orgid'];
    $query = $ci->db->query("SELECT id,FirstName ,LastName FROM `EmployeeMaster` where OrganizationId=$orgid AND Department=$departid AND archive = '1' AND Is_Delete = '0'  order by FirstName");
    return json_encode($query->result());
}

function handleLoginAdmin() {
    if ($_SESSION['attendanceSuperAdmin'] == false) {
        unset($_SESSION["attendanceSuperAdmin"]);
        redirect(URL . "ubitech");
        exit();
    }
}

function getShift($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT name FROM `ShiftMaster` where id='$id'");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

function getShiftTimes($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeIn,TimeOut FROM `ShiftMaster` where id='$id'");
    $res = array();
    foreach ($query->result() as $row) {
        return substr($row->TimeIn, 0, 5) . ' - ' . substr($row->TimeOut, 0, 5);
    }
}

function getShiftdata($sid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT * FROM `ShiftMaster` where id=$sid");
    foreach ($query->result() as $row) {
        return $row;
        break;
    }
}

function AutoTimeOffEnd($empid, $orgid, $time, $date, $mdate, $location, $lat, $long) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("select max(id) as id from Timeoff WHERE  EmployeeId =  '$empid' AND OrganizationId = $orgid ");

    if ($row = $query->result()) {
        $id = $row[0]->id;
        $query = $ci->db->query("update Timeoff set TimeTo=?,TimeoffEndDate=?,ModifiedDate=?,LocationOut=?,LatOut=?,LongOut=? where id ='$id' AND TimeTo = '00:00:00'", array($time, $date, $mdate, $location, $lat, $long));
    }
}

function AutoTimeOffEndWL($empid, $orgid, $time, $date, $stamp) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("select max(id) as id from Timeoff WHERE  EmployeeId =  '$empid' AND OrganizationId = $orgid  ");

    if ($row = $query->result()) {
        $id = $row[0]->id;
        $query = $ci->db->query("update Timeoff set TimeTo = ?,TimeoffEndDate = ?,ModifiedDate=? where id ='$id' AND TimeTo = '00:00:00' ", array($time, $date, $stamp));
    }
}

function getShiftTimeso($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeIn,TimeOut FROM `ShiftMaster` where id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return substr($row->TimeOut, 0, 5) . ' - ' . substr($row->TimeIn, 0, 5);
    }
}

function checkmail($orgid, $email) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id from Organization where Email = '$email' and id = '$orgid'");
    $res = 0;
    foreach ($query->result() as $row) {
        $res = 1;
    }
    return $res;
}

function getShiftBreak($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeInBreak,TimeOutBreak, TIMEDIFF(`TimeOutBreak`,TimeInBreak)as breakHour FROM `ShiftMaster` where id=$id");
    $res = array();
    if ($row = $query->result()) {
        // return substr($row[0]->breakHour,0,5);
        if (strtotime($row[0]->TimeInBreak) < strtotime($row[0]->TimeOutBreak)) {
            return substr($row[0]->breakHour, 0, 5);
        } else {
            //return substr($row[0]->breakHour,0,5);
            $time = "24:00:00";
            $secs = strtotime($row[0]->TimeInBreak) - strtotime($row[0]->TimeOutBreak);
            return date("H:i", strtotime($time) - $secs);
        }
    }
}

function getShiftBreaks($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `TimeOutBreak`,TimeInBreak FROM `ShiftMaster` where id=$id");
    $res = array();
    if ($row = $query->result())
        return substr($row[0]->TimeInBreak, 0, 5) . ' - ' . substr($row[0]->TimeOutBreak, 0, 5);
}

function getShiftBreaksHalfday($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeInBreak FROM `ShiftMaster` where id=$id");
    $res = array();
    if ($row = $query->result())
        return substr($row[0]->TimeInBreak, 0, 5);
}

function getAllListclient($ids) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT Company FROM `ClientMaster` where OrganizationId=10 and `status`='1' AND `DisapproveSts`='0' AND id=$ids");

    $res = array();
    if ($row = $query->row()) {
        return $row->Company;
    } else {
        return "";
    }
}

function getAllzonecity($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Zone FROM `ClientMaster` WHERE OrganizationId=$orgid AND status=1 AND Zone !='' group by Zone");
    return json_encode($query->result());
}

function getAllactiveclient($orgid, $empid, $cid) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT id,Company FROM `ClientMaster` where OrganizationId=$orgid and `status`='1' AND `DisapproveSts`='0' AND id NOT IN(SELECT `clientid` FROM `clientlist` WHERE `organizationid`=$orgid AND employeeid=$empid and clientid=$cid ) order by Company");

    return json_encode($query->result());
//return $query->result();
}

function getAllShift($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name,TimeIn,TimeOut FROM `ShiftMaster` where OrganizationId=$orgid and archive=1 order by name");
    //if($row=$query->result())
    //return substr($row[0]->TimeIn,0,5).' - '.substr($row[0]->TimeOut,0,5);
    return json_encode($query->result());
}

function getAllBloodGroup() {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `BloodGroupMaster`  order by name");
    return json_encode($query->result());
}

function getAllNationality() {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `NationalityMaster`  order by name");
    return json_encode($query->result());
}

function getAllOther($otherType) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT ActualValue as id,DisplayName as name FROM `OtherMaster` where OtherType=? order by ActualValue ", array($otherType));
    return json_encode($query->result());
}

function getAllReligion() {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `ReligionMaster` order by name");
    return json_encode($query->result());
}

function getEmpName($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT FirstName,LastName FROM `EmployeeMaster` where id= '$id' AND Is_Delete = '0' ");
    $res = array();
    if ($row = $query->row()) {
        if ($row->LastName != "")
            return $row->FirstName . ' ' . $row->LastName;
        else
            return $row->FirstName;
    } else {
        return "";
    }
}

function getdeletepermanentEmpName($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT FirstName,LastName FROM `EmployeeMaster` where id= '$id' AND Is_Delete = '2' ");
    $res = array();
    if ($row = $query->row()) {
        return $row->FirstName . ' ' . $row->LastName;
    } else {
        return "";
    }
}

function getDeleteEmpName($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT FirstName, LastName FROM `EmployeeMaster` where id=$id AND Is_Delete = '1' ");
    $res = array();
    if ($row = $query->row()) {
        return $row->FirstName . ' ' . $row->LastName;
    } else {
        return "";
    }
}

function getAllemp($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,FirstName ,LastName FROM `EmployeeMaster` where OrganizationId=$orgid AND archive = '1' AND Is_Delete = '0'  order by FirstName");
    return json_encode($query->result());
}

function getAllemp1($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,if(Lastname!='NULL',CONCAT(Firstname,' ',Lastname),Firstname) as name FROM `EmployeeMaster` where OrganizationId=$orgid AND archive = '1' AND Is_Delete = '0'  group by FirstName");

    // foreach ($query->result() as $row) {
    //  echo $row->id."<br>";
    // }

    return json_encode($query->result());
}

	function shiftAssign($shiftid)
	{
		$ci =& get_instance();
		$ci->load->database();
		$orgid=$_SESSION['orgid'];
		$query = $ci->db->query("SELECT count(id) as emp FROM `EmployeeMaster` where Shift=$shiftid AND archive = '1' AND Is_Delete = '0' And OrganizationId = $orgid ");
		return json_encode($query->result());
	}

function assignShiftOfEmployee($sid) {
    $ci = & get_instance();
    $ci->load->database();
    // $query = $ci->db->query("select count(Id) as id from `AttendanceMaster` where  ShiftId=? ", array($sid));
    $query = $ci->db->query("select count(id) as id from `EmployeeMaster` where  Shift=$sid ");
    if ($query->num_rows() > 0) {
        return json_encode($query->result());
    } else {
        return 0;
    }
}

function designationAssign($desgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT count(id) as emp FROM `EmployeeMaster` where Designation=$desgid AND archive = '1' AND Is_Delete = '0' ");
    if ($row = $query->row())
        return $row->emp;
}

function departmentAssign($deparid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT count(id) as emp FROM `EmployeeMaster` where Department=$deparid AND archive = '1' AND Is_Delete = '0' ");
    if ($row = $query->row())
        return $row->emp;
}

function departmentAssignAll($deparid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT count(id) as emp FROM `EmployeeMaster` where Department=$deparid AND  Is_Delete != '2' ");
    if ($row = $query->row())
        return $row->emp;
}

function getDesignation($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT name FROM `DesignationMaster` where id=$id ");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

function getAllDesg($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `DesignationMaster` where OrganizationId=$orgid and archive=1 order by name");
    return json_encode($query->result());
}

/* function getAllDesghourlyrate($orgid)
  {
  $ci =& get_instance();
  $ci->load->database();
  $query = $ci->db->query("SELECT id,name FROM `DesignationMaster` where OrganizationId=$orgid and  id not in (select Name from HourlyRateMaster where `OrganizationId`=$orgid) and archive=1  order by name");
  return json_encode($query->result());
  } */

function getAllRate($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id,Name,Rate FROM `HourlyRateMaster` where OrganizationId=$orgid and status=1 order by Rate");
    return json_encode($query->result());
}

function getAllArea($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,Name FROM `Geo_Settings` where OrganizationId=$orgid and archive='1' AND Status='1' order by name");
    return json_encode($query->result());
}

function getFirstShiftDeptDesg($org_id) {
    $ci = & get_instance();
    $ci->load->database();
    $data = array();
    $data['shift'] = 0;
    $data['dept'] = 0;
    $data['desg'] = 0;
    $qry = $ci->db->query("select Id as shift from ShiftMaster where  OrganizationId=" . $org_id . " order by id limit 1");
    if ($r = $qry->result())
        $data['shift'] = $r[0]->shift;

    $qry = $ci->db->query("select Id as dept from DepartmentMaster where  OrganizationId=" . $org_id . " order by id limit 1");
    if ($r = $qry->result())
        $data['dept'] = $r[0]->dept;

    $qry = $ci->db->query("select Id as desg from DesignationMaster where  OrganizationId=" . $org_id . " order by id limit 1");
    if ($r = $qry->result())
        $data['desg'] = $r[0]->desg;
    return json_encode($data);
}

function getDepartment($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT name FROM `DepartmentMaster` where id=$id ");
    $res = array();

    if ($row = $query->row()) {
        return $row->name;
    } else {
        return "";
    }
}

function getDepartmentId($name, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM DepartmentMaster WHERE  Name='$name' AND OrganizationId=$orgid");
    $res = array();
    if ($row = $query->result()) {
        return $row[0]->Id;
    } else {
        return 0;
    }
}

function getDesignationId($name, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM DesignationMaster WHERE Name=? AND OrganizationId=? ", array($name, $orgid));
    $res = array();
    if ($row = $query->result()) {
        return $row[0]->Id;
    } else {
        return 0;
    }
}

// for creating department if not created while importing

function getDepartmentId_create($name, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $date = Date("Y-m-d");
    $query = $ci->db->query("SELECT Id FROM DepartmentMaster WHERE  Name=? AND OrganizationId=?", array($name, $orgid));
    $res = array();
    if ($row = $query->result()) {
        return $row[0]->Id;
    } else {
        $query = $ci->db->query("INSERT INTO DepartmentMaster(`Name`, `OrganizationId`, `CreatedDate`, `LastModifiedDate`,`archive`) VALUES (?,?,?,?,?)", array($name, $orgid, $date, $date, 1));
        return $ci->db->insert_id();
    }
}

// for creating designation if not created while importing 

function getDesignationId_create($name, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $date = Date("Y-m-d");
    $query = $ci->db->query("SELECT Id FROM DesignationMaster WHERE Name=? AND OrganizationId=? ", array($name, $orgid));
    $res = array();
    if ($row = $query->result()) {
        return $row[0]->Id;
    } else {
        $query = $ci->db->query("INSERT INTO DesignationMaster(`Name`, `OrganizationId`, `CreatedDate`, `LastModifiedDate`,`archive`) VALUES (?,?,?,?,?)", array($name, $orgid, $date, $date, 1));
        return $ci->db->insert_id();
    }
}

function getShiftType($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT shifttype FROM ShiftMaster WHERE Id='$id' ");

    if ($row = $query->result()) {
        return $row[0]->shifttype;
    } else {
        return 0;
    }
}

function getshiftId($name, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM ShiftMaster WHERE Name='$name' AND OrganizationId = $orgid");

    if ($row = $query->result()) {
        return $row[0]->Id;
    } else {
        return 0;
    }
}

function getAreaId($user) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT area_assigned FROM EmployeeMaster WHERE Id=$user");

    foreach ($query->result() as $row) {
        return $row->area_assigned;
    }
}

function getAreaInfo($Id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT  `Lat_Long`, `Radius` FROM `Geo_Settings` WHERE Id in ($Id) and Lat_Long != '' limit 1 ");

    if ($row = $query->result()) {
        $arr = array();
        $arr1 = explode(",", $row[0]->Lat_Long);

        $arr['lat'] = isset($arr1[0]) ? floatval($arr1[0]) : 0.0;
        $arr['long'] = isset($arr1[1]) ? floatval($arr1[1]) : 0.0;
        $arr['radius'] = $row[0]->Radius;
        return json_encode($arr);
        return;
    }
    return 0;
}

function calDistance($lat1, $lon1, $lat2, $lon2, $unit) {
    // to calculat the distance between two co-ordinates
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad((float) $lat1)) * sin(deg2rad((float) $lat2)) + cos(deg2rad((float) $lat1)) * cos(deg2rad((float) $lat2)) * cos(deg2rad((float) $theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

function getVisitImageStatus($orgid) { // to get the infor weather image uploading is enable or not in orgn for visit
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `visitImageStatus` FROM `admin_login` WHERE OrganizationId=$orgid");
    if ($row = $query->result())
        return $row[0]->visitImageStatus;
    return 0;
}

function getAttImageStatus($orgid) { // to get the infor weather image uploading is enable or not in orgn for attn
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `AttnImageStatus` FROM `admin_login` WHERE OrganizationId=$orgid");
    if ($row = $query->result())
        return $row[0]->AttnImageStatus;
    return 0;
}

function ableToMarkAttendance($orgid, $empid) { // get status able to mark attendance if emp have outside the fence
    $ci = & get_instance();
    $ci->load->database();
    $fencestatus = "0";
    $query = $ci->db->query("SELECT `fencearea` FROM `admin_login` WHERE OrganizationId = $orgid");
    if ($row = $query->result()) {
        $query = $ci->db->query("SELECT area_assigned FROM `EmployeeMaster` WHERE `Id` = $empid and  area_assigned != 0 ");
        if ($row1 = $query->result())
            $fencestatus = $row[0]->fencearea;
    }
    return $fencestatus;
}

/////////////////////shifttime////////////////////////////////////////////////////
function getShiftTime($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT name FROM `DepartmentMaster` where id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

///////////////////////////////////////////////
function getAllDept($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `DepartmentMaster` where OrganizationId=$orgid AND archive=1  order by name");
    return json_encode($query->result());
	 //$query = $ci->db->query("SELECT id,name FROM `DesignationMaster` where OrganizationId=$orgid and archive=1 order by name");
    //return json_encode($query->result());
}

function getAllCountries() {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `CountryMaster` order by name");
    return json_encode($query->result());
}

function getAllStates() {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT code,name FROM `state_gst` order by name");
    return json_encode($query->result());
}

function getAllCities() {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `CityMaster` order by name");
    return json_encode($query->result());
}

function getDepartmentByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT name FROM `DepartmentMaster` where id=(SELECT Department FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

function getDepartmentIdByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM `DepartmentMaster` where id=(SELECT Department FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Id;
    }
    return 0;
}

function getShiftByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Name FROM `ShiftMaster` where id=(SELECT Shift FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Name;
    }
}

function getshiftId_random($name, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM ShiftMaster WHERE Name='$name' AND OrganizationId = $orgid");

    if ($row = $query->result()) {
        return $row[0]->Id;
    } else {
        $query = $ci->db->query("SELECT Id FROM ShiftMaster WHERE  OrganizationId = $orgid AND archive = 1 AND TimeIn != '00:00:00' and TimeOut != '00:00:00'  Order by Id ASC limit 1 ");
        if ($row = $query->result()) {
            return $row[0]->Id;
        }
    }
}

function getShiftIdByEmpID($empid) {
   
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM `ShiftMaster` where id=(SELECT Shift FROM `EmployeeMaster` where id=?)", array($empid));
    //var_dump($ci->db->last_query());
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Id;
    }
}

function getShiftTimeByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeIn,TimeOut FROM `ShiftMaster` where id=(SELECT Shift FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        return substr($row->TimeIn, 0, 5) . ' - ' . substr($row->TimeOut, 0, 5);
    }
}

function getShiftTimeInByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeIn FROM `ShiftMaster` where id=(SELECT Shift FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        //return substr($row->TimeIn,0,5).' - '. substr($row->TimeOut,0,5);
        return $row->TimeIn;
    }
}

function getShiftTimeOutByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TimeOut FROM `ShiftMaster` where id=(SELECT Shift FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        //return substr($row->TimeIn,0,5).' - '. substr($row->TimeOut,0,5);
        return $row->TimeOut;
    }
}

function getDesignationByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT name FROM `DesignationMaster` where id=(SELECT Designation FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

function getDesignationIdByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Id FROM `DesignationMaster` where id=(SELECT Designation FROM `EmployeeMaster` where id=?)", array($empid));
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Id;
    }

    return 0;
}

function getHourlyRateIdByEmpID($empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT hourly_rate FROM `EmployeeMaster` where id=?", array($empid));
    $res = array();
    if ($row = $query->result()) {
        return $row[0]->hourly_rate;
    }

    return 0;
}

function getCityById($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `CityMaster` where Id=$id");
    return json_encode($query->result());
    /* $res=array();
      foreach ($query->result() as $row)
      {
      return $row->name;
      } */
}

function getCityById1($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM `CityMaster` where Id=$id");
    //return json_encode($query->result());
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

function getCountryById1($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM CountryMaster where Id=$id");

    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
    return '';
}

function getLeave($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT entitled_leave FROM `Organization` where id='$orgid'");
    $res = array();

    if ($row = $query->row()) {
        return $row->entitled_leave;
    } else {
        return "";
    }
}

function getLeadById1($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id,name FROM lead_owner where id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
    return '';
}

function getCountryCodeById1($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT countrycode FROM CountryMaster where Id='$id'");
    //return json_encode($query->result());
    $res = array();
    foreach ($query->result() as $row) {
        return $row->countrycode;
    }
    return 0;
}

function getCountryIdByOrg($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Country FROM Organization where Id=$id");
    //return json_encode($query->result());
    $res = array();
    if ($row = $query->result())
        return $row[0]->Country;
    return 0;
}

function getUserName($id) {
	$orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT username FROM `UserMaster` where EmployeeId=$id and OrganizationId=$orgid");
        if ($row = $query->row()) {
        return $row->username;
    } else {
        return "";
    }
}

function getRecentComers() {
    $orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $zid = 0;
    $zname = '';
    /////////////get time zone
    $query = $ci->db->query("SELECT timezone FROM `Organization` where id=?", array($orgid));
    foreach ($query->result() as $row)
        $zid = $row->timezone;
    $query = $ci->db->query("SELECT name FROM `ZoneMaster` where id=?", array($zid));
    foreach ($query->result() as $row)
        $zname = $row->name;
    date_default_timezone_set($zname);
    /////////////--/get time zone
    $today = date('Y-m-d');

    $query = $ci->db->query("SELECT EmployeeId,TimeIn,ShiftId FROM `AttendanceMaster` where AttendanceDate=? and TimeOut='00:00:00' and OrganizationId=? order by TimeIn desc limit 6", array($today, $orgid));
    if ($query->num_rows()) {
        $i = 1;
        foreach ($query->result() as $row) {
            echo '<tr style="width:105%">
							
							<td>' . getEmpName($row->EmployeeId) . '</td>
							<td><span title="' . getDesignationByEmpID($row->EmployeeId) . '">' . substr(getDesignationByEmpID($row->EmployeeId), 0, 10) . '..</span></td></span>
							<td><span title="' . getDepartmentByEmpID($row->EmployeeId) . '">' . substr(getDepartmentByEmpID($row->EmployeeId), 0, 10) . '..</td>
							<td>' . getShiftTimes($row->ShiftId) . '</td>
							<td>' . substr(($row->TimeIn), 0, 5) . '</td>
						  </tr>';
        }
    } else
        echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
}

function getOnTimeBreak1() {
    $orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $zid = 0;
    $zname = '';
    /////////////get time zone
    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    /////////////--/get time zone
    $today = date('Y-m-d');
    //$query = $ci->db->query("SELECT BreakOn,(select EmployeeMaster.Id from EmployeeMaster where EmployeeMaster .id=BreakMaster.EmployeeId )as EmployeeId FROM `BreakMaster` where Date=? and BreakOff ='00:00:00'  and OrganizationId=?",array($today,$orgid));
    /* $query = $ci->db->query("SELECT TimeFrom ,(select EmployeeMaster.Id from EmployeeMaster where EmployeeMaster .id=Timeoff.EmployeeId )as EmployeeId FROM `Timeoff` where TimeofDate=? and TimeTo ='00:00:00'  and OrganizationId=?",array($today,$orgid)); */
    $query = $ci->db->query("SELECT TimeFrom,TimeTo,TIMEDIFF( TimeTo,TimeFrom) as Totaltime ,(select EmployeeMaster.Id from EmployeeMaster where EmployeeMaster .id=Timeoff.EmployeeId )as EmployeeId FROM `Timeoff` where TimeofDate=?  and OrganizationId=?", array($today, $orgid));
    if ($query->num_rows()) {
        $i = 1;
        foreach ($query->result() as $row) {
            echo '<tr style="width:100%">
	
							<td>' . getEmpName($row->EmployeeId) . '</td>
							<td>' . getDepartmentByEmpID($row->EmployeeId) . '</td>
							<td>' . $row->TimeFrom . '</td>
							<td>' . $row->TimeTo . '</td>
							<td>' . $row->Totaltime . '</td>
						  </tr>';
            /* <tr>
              <td>1</td>
              <td>Dakota Rice </td>
              <td>$36,738</td>
              <td>Niger</td>
              <td>Niger</td>
              </tr> */
        }
    } else
        echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
}

function countOnTimeBreak() {
    $orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $zid = 0;
    $zname = '';
    /////////////get time zone
    $zname = getTimeZone($orgid);
    date_default_timezone_set($zname);
    /////////////--/get time zone
    $today = date('Y-m-d');
    $query = $ci->db->query("SELECT count(BreakOn) as total FROM `BreakMaster` where Date=? and BreakOff ='00:00:00'  and OrganizationId=?", array($today, $orgid));
    if ($row = $query->result())
        echo $row[0]->total;
}

function getPresentEmployees() {
    $orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $zid = 0;
    $zid = 0;
    $zname = '';
    /////////////get time zone
    $query = $ci->db->query("SELECT timezone FROM `Organization` where id=?", array($orgid));
    foreach ($query->result() as $row)
        $zid = $row->timezone;
    $query = $ci->db->query("SELECT name FROM `ZoneMaster` where id=?", array($zid));
    foreach ($query->result() as $row)
        $zname = $row->name;
    date_default_timezone_set($zname);
    /////////////--/get time zone
    $today = date('Y-m-d');

    $query = $ci->db->query("SELECT EmployeeId,TimeIn,EntryImage,ShiftId FROM `AttendanceMaster` where AttendanceDate=? and TimeOut='00:00:00' and OrganizationId=? order by TimeIn ", array($today, $orgid));
    if ($query->num_rows()) {
        $i = 1;
        foreach ($query->result() as $row) {
            echo '<tr style="width:105%">
							<td>' . getEmpName($row->EmployeeId) . '</td>
							<td><span title="' . getDesignationByEmpID($row->EmployeeId) . '">' . substr(getDesignationByEmpID($row->EmployeeId), 0, 8) . '..</span></td></span>
							<td><span title="' . getDepartmentByEmpID($row->EmployeeId) . '">' . substr(getDepartmentByEmpID($row->EmployeeId), 0, 8) . '..</td>
							<td>' . getShiftTimes($row->ShiftId) . '</span></td>
							<td>' . substr(($row->TimeIn), 0, 5) . '</td>
							
						</tr>';
        }
    } else
        echo '<tr style="width:100%"><td colspan="6">No Employees Found</td></tr>';
}

function getAbsentees() {
    $orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $zid = 0;
    $zname = '';
    /////////////get time zone
    $query = $ci->db->query("SELECT timezone FROM `Organization` where id=?", array($orgid));
    foreach ($query->result() as $row)
        $zid = $row->timezone;
    $query = $ci->db->query("SELECT name FROM `ZoneMaster` where id=?", array($zid));
    foreach ($query->result() as $row)
        $zname = $row->name;
    date_default_timezone_set($zname);
    /////////////--/get time zone
    $today = date('Y-m-d');

    $query = $ci->db->query("SELECT EmployeeId,TimeIn FROM `AttendanceMaster` where 1=2");
    if ($query->num_rows()) {
        $i = 1;
        foreach ($query->result() as $row) {
            echo '<tr style="width:100%">
							<td>' . $i++ . '.</td>
							<td>' . getEmpName($row->EmployeeId) . '</td>
							<td><span title="' . getDesignationByEmpID($row->EmployeeId) . '">' . substr(getDesignationByEmpID($row->EmployeeId), 0, 10) . '..</span></td></span>
							<td><span title="' . getDepartmentByEmpID($row->EmployeeId) . '">' . substr(getDepartmentByEmpID($row->EmployeeId), 0, 10) . '..</td>
							<td>' . substr(($row->TimeIn), 0, 5) . '</td>
						  </tr>';
        }
    } else
        echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
}

function countRegisteredEmployee() {
    $count = 0;
    $orgid = $_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT count(id) as total FROM `EmployeeMaster` where OrganizationId=?", array($orgid));
    foreach ($query->result() as $row) {
        $count = $row->total;
    }
    return $count;
}

function countRegisteredEmployee1($orgid) {
    $count = 0;

    // $orgid=$_SESSION['orgid'];
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT count(id) as total FROM `EmployeeMaster` where OrganizationId=? and Is_Delete!=2", array($orgid));
    foreach ($query->result() as $row) {
        $count = $row->total;
    }
    return $count;
}

function countPresentEmployee() {
    $count = 0;
    $orgid = $_SESSION['orgid'];
    $zid = 0;
    $zname = 'Asia/Kolkata';
    $ci = & get_instance();
    $ci->load->database();
    /////////////get time zone
    $query = $ci->db->query("SELECT timezone FROM `Organization` where id=?", array($orgid));
    foreach ($query->result() as $row)
        $zid = $row->timezone;
    $query = $ci->db->query("SELECT name FROM `ZoneMaster` where id=?", array($zid));
    foreach ($query->result() as $row)
        $zname = $row->name;
    date_default_timezone_set($zname);
    /////////////--/get time zone
    $today = date('Y-m-d');

    $query = $ci->db->query("SELECT count(id) as total FROM `AttendanceMaster` where AttendanceDate=? and TimeOut='00:00:00' and OrganizationId=? order by TimeIn ", array($today, $orgid));
    foreach ($query->result() as $row) {
        $count = $row->total;
    }
    return $count;
}

function Trace($content) {
    try {
        $log_path = "uploads/logs/"; // directory name here like /var/www/html/myfolder/logs/
        if (!file_exists($log_path)) {
            mkdir($log_path, 0777, true);
        }
        $today_date = date("d-M-Y");
        $current_time = date("d-M-Y H:i");
        $filename = $log_path . str_replace('-', '_', $today_date) . "_log.log"; //this is a file name
        $fp = fopen($filename, "a+"); // Open the data file, file points at the end of file
        $fw = fwrite($fp, $current_time . " : " . $content . "\r\n");
        fclose($fp);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function Trace123($content) {
    try {
        $log_path = "uploads/logs/"; // directory name here like /var/www/html/myfolder/logs/
        if (!file_exists($log_path)) {
            mkdir($log_path, 0777, true);
        }
        $today_date = date("d-M-Y");
        $current_time = date("d-M-Y H:i");
        $filename = $log_path . str_replace('-', '_', $today_date) . "_log.log"; //this is a file name
        $fp = fopen($filename, "a+"); // Open the data file, file points at the end of file
        $fw = fwrite($fp, $current_time . " : " . $content . "\r\n");
        fclose($fp);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getTimeZone($orgid = 10) {

    $ci = & get_instance();
    $ci->load->database();
    //////////////-------getting time zone
    $sql = "SELECT name
				FROM ZoneMaster
				WHERE id = ( 
				SELECT  `TimeZone` 
				FROM  `Organization` 
				WHERE id =$orgid
				LIMIT 1)";
    $zone = 'Asia/Kolkata';
    $result1 = $query = $ci->db->query($sql);
    if ($row = $result1->row())
        return $zone = $row->name;
    return $zone;
    //////////////-------/getting time zone
}

function getEmpTimeZone($userid, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $country = "";
    $assigntimezon = 0;
    $sqlcoun = "SELECT CurrentCountry,timezone from EmployeeMaster where Id = $userid Limit 1";
    $resultcoun = $querycoun = $ci->db->query($sqlcoun);
    if ($rowcoun = $resultcoun->row()) {
        $country = $rowcoun->CurrentCountry;
        $assigntimezon = $rowcoun->timezone;
    }
    //////////////-------getting time zone
    $sql = "";
    if ($assigntimezon != 0) {
        $sql = "SELECT name	FROM ZoneMaster	WHERE id = $assigntimezon";
    } else if ($country == 0 || $country == "") {
        $country = getCountryIdByOrg($orgid);
        $sql = "SELECT name
				FROM ZoneMaster
				WHERE id = ( 
				SELECT  `TimeZone` 
				FROM  `Organization` 
				WHERE id =$orgid
				LIMIT 1)";
    } else {
        $sql = "SELECT name
				FROM ZoneMaster
				WHERE CountryId = $country";
    }
    $zone = 'Asia/Kolkata';
    $result1 = $query = $ci->db->query($sql);
    if ($row = $result1->row())
        return $zone = $row->name;
    else {
        $sql = "SELECT name	FROM ZoneMaster WHERE CountryId = $country";
        $result1 = $query = $ci->db->query($sql);
        if ($row = $result1->row())
            return $zone = $row->name;
        return $zone;
    }
    //////////////-------/getting time zone
}

////TIMEDIFF(CONCAT(FX.timeout_date,'   ',FX.time_out) , CONCAT(FX.date,'  ',FX.time))///
function comings($shiftId, $TimeIn, $timeindate, $attendancedate, $TimeInGrace) {  // Late or early
    $ci = & get_instance();
    $ci->load->database();

    if ($TimeInGrace == "00:00:00") {
        if ($timeindate != '0000-00-00') {
            $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeIn`)) as timecoming FROM `ShiftMaster` where id=$shiftId");
        } else {
            $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$attendancedate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeIn`)) as timecoming FROM `ShiftMaster` where id=$shiftId");
        }
    } else {
        if ($timeindate != '0000-00-00') {
            //$query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeInGrace`)) as timecoming FROM `ShiftMaster` where id=$shiftId");
            //$query = $ci->db->query("SELECT case when ('$TimeIn' < `TimeInGrace` && '$TimeIn' < `TimeIn`) then CONCAT('$attendancedate','  ',`TimeInGrace`),TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn')) WHEN (`TimeInGrace` > '$TimeIn' ) then TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn'),CONCAT('$timeindate','  ',`TimeInGrace`)) else('00:00') end as timecoming FROM `ShiftMaster` where id=$shiftId");

            $query = $ci->db->query("SELECT CASE WHEN (TimeInGrace > '$TimeIn' && TimeIn > '$TimeIn') THEN TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeIn`))
			WHEN (`TimeInGrace` < '$TimeIn' ) THEN TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeInGrace`))
			ELSE ('00:00')  
			END AS timecoming
			FROM ShiftMaster WHERE id=$shiftId");
            //var_dump($ci->db->last_query());   
        } else {
            $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$attendancedate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeInGrace`)) as timecoming FROM `ShiftMaster` where id=$shiftId");
        }
    }





    $res = array();
    if ($row = $query->result())
    //var_dump($row[0]->timecoming);
    // die;
        return $row[0]->timecoming;
    return 0;
}

/* function comings($shiftId,$TimeIn,$timeindate,$attendancedate)
  {	 // Late or early
  $ci =& get_instance();
  $ci->load->database();
  if($timeindate!='0000-00-00')
  {
  $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeindate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeIn`)) as timecoming FROM `ShiftMaster` where id=$shiftId");
  }
  else
  {
  $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$attendancedate','   ','$TimeIn'),CONCAT('$attendancedate','  ',`TimeIn`)) as timecoming FROM `ShiftMaster` where id=$shiftId");
  }
  $res=array();
  if ($row= $query->result())
  return $row[0]->timecoming;
  return 0;
  } */

function earlyhalfday($BreaksHalfday, $TimeOut) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT TIMEDIFF('$BreaksHalfday','$TimeOut') as earlyleavee FROM `ShiftMaster` ");
    $res = array();
    if ($row = $query->result())
        return $row[0]->earlyleavee;
    return 0;
}

// function goings($shiftId,$TimeOut,$AttendanceStatus,$timeoutdate,$attendancedate)
function goings($shiftId, $TimeOut, $AttendanceStatus, $timeoutdate, $attendancedate) {
    $ci = & get_instance();
    $ci->load->database();
    $newdate = "2013/05/29 " + $attendancedate;

    // $tax="2013-05-29";
    // $ndate= number_format($tax,2);
    // echo $ndate;
    // $adate=number_format($attendancedate,2);
    // $newdate=$ndate+$adate;
    // echo $newdate;
    // $view_tax = number_format($tax,2);
    // $grand_total = $tax + $sub_total;
    //$new_date = date_format(date_create($old_date), 'Y-m-d');
    // date("d", strtotime($_GET['start_date']));
    // $format = number_format((float)0, 2);

    $stop_date = $attendancedate;

    $stop_date = date('Y-m-d', strtotime($stop_date . ' +1 day'));
// var_dump($stop_date);


    if ($AttendanceStatus == 4) {
        $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeoutdate',' ','$TimeOut'),CONCAT('$attendancedate','  ',`TimeInBreak`)) as timeGoming FROM `ShiftMaster` where id=$shiftId");
    } else {
        $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeoutdate',' ','$TimeOut'),CONCAT('$attendancedate','  ',`TimeOut`)) as timeGoming FROM `ShiftMaster` where id=$shiftId  ");
        // var_dump($TimeOut);
    }


    $res = array();
    if ($row = $query->result())
        return $row[0]->timeGoming;
    return 0;
}

function goings1($shiftId, $shifttype, $TimeOut, $AttendanceStatus, $timeindate, $timeoutdate, $attendancedate) {
    $ci = & get_instance();
    $ci->load->database();
    // $newdate="2013/05/29 "+$attendancedate;

    $stop_date = $attendancedate;

    $stop_date = date('Y-m-d', strtotime($stop_date . ' +1 day'));
// var_dump($stop_date);


    if ($AttendanceStatus == 4) {
        $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeoutdate',' ','$TimeOut'),CONCAT('$attendancedate','  ',`TimeInBreak`)) as timeGoming FROM `ShiftMaster` where id=$shiftId");
    } else {
        $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$timeoutdate',' ','$TimeOut'),CONCAT('$attendancedate','  ',`TimeOut`)) as timeGoming FROM `ShiftMaster` where id=$shiftId  ");
        // var_dump($TimeOut);
    }
    if ($shifttype == 2) {
        if ($timeindate == $timeoutdate) {

            $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$attendancedate','  ','$TimeOut'),CONCAT('$stop_date',' ',`TimeOut`)) as timeGoming FROM `ShiftMaster` where id=$shiftId  ");
        } else {

            $query = $ci->db->query("SELECT TIMEDIFF(CONCAT('$attendancedate','  ','$TimeOut'),CONCAT('$attendancedate',' ',`TimeOut`)) as timeGoming FROM `ShiftMaster` where id=$shiftId  ");
        }
    }

    $res = array();
    if ($row = $query->result())
        return $row[0]->timeGoming;
    return 0;
}

///// THIS HELPER MADE BY PALASH (START) ////
function getAbsentEmployees($org_id = 0) {
    $ci = & get_instance();
    $ci->load->database();
    $i = 1;
    $org_id = $_SESSION['orgid'];
    $zone = getTimeZone($org_id);
    date_default_timezone_set($zone);
    $date = date("Y-m-d");
    $query = $ci->db->query("select Shift,Id  from EmployeeMaster where archive =1 and OrganizationId = $org_id and Id NOT IN (select EmployeeId from AttendanceMaster where OrganizationId = $org_id and AttendanceDate='$date' and TimeIn != '00:00:00')");
    if ($query->num_rows()) {
        foreach ($query->result() as $row) {
            $ct = date('H:i:s');
            $shiftid = $row->Shift;
            $query1 = $ci->db->query("SELECT `DateFrom`, `DateTo` FROM `HolidayMaster` WHERE OrganizationId=? and (? between `DateFrom` and `DateTo`) ", array($org_id, $date));
            if ($query1->num_rows() > 0)
                continue;
            $dayOfWeek = 1 + date('w', strtotime($date));
            $weekOfMonth = weekOfMonth($date);
            $week = '';
            $query555 = $ci->db->query("SELECT `WeekOff` FROM  `ShiftMasterChild` WHERE  `OrganizationId` =? AND  `Day` =  ? AND ShiftId = ? ", array($org_id, $dayOfWeek, $shiftid));
            if ($row555 = $query555->result()) {
                $week = explode(",", $row555[0]->WeekOff);
            }
            if ($week[$weekOfMonth - 1] == 1)
                continue;
            $ShiftId = $row->Shift;
            $EId = $row->Id;
            $query = $ci->db->query("SELECT A.TimeIn ,B.Id ,B.FirstName ,B.LastName , C.Name as designation , D.Name as department FROM ShiftMaster A, DesignationMaster C ,EmployeeMaster B, DepartmentMaster D WHERE A.archive =1 and  A.Id  = $ShiftId AND B.OrganizationId = $org_id AND '$ct' > A.TimeIn AND B.Id = $EId AND C.Id = B.Designation AND D.Id = B.Department AND D.OrganizationId = $org_id AND A.OrganizationId = $org_id");
            if ($data123 = $query->row()) {
                echo '<tr style="width:100%">
								
								<td>' . $data123->FirstName . " " . $data123->LastName . '</td>
								<td><span title="' . $data123->designation . '">' . substr(($data123->designation), 0, 10) . '..</span></td>
								<td><span title="' . $data123->department . '">' . substr(($data123->department), 0, 10) . '..</span></td>
								<td>' . getShiftTimes($ShiftId) . '</td>
								
							  </tr>';
            }
        }
    } else {
        echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
    }
}

function getLateEmployee() {
    $ci = & get_instance();
    $ci->load->database();
    $i = 1;
    $org_id = $_SESSION['orgid'];
    $zone = getTimeZone($org_id);
    date_default_timezone_set($zone);
    $date = date("Y-m-d");
    $query = $ci->db->query("select Shift,Id  from EmployeeMaster where OrganizationId = $org_id and Id IN (select EmployeeId from AttendanceMaster where OrganizationId = $org_id and AttendanceDate='$date' and TimeIn != '00:00:00')");
    if ($query->num_rows()) {
        foreach ($query->result() as $row) {
            $ShiftId = $row->Shift;
            $EId = $row->Id;
            //$shiftin =  $data123->TimeIn;
            $ct = date('H:i:s');
            $query111 = $ci->db->query("SELECT A.TimeIn as shift ,B.Id ,B.FirstName ,B.LastName , C.Name as designation , D.Name as department, E.TimeIn  FROM ShiftMaster A, DesignationMaster C ,EmployeeMaster B, DepartmentMaster D, AttendanceMaster E WHERE A.Id  = $ShiftId AND B.OrganizationId = $org_id AND '$ct' > A.TimeIn AND B.Id = $EId AND C.Id = B.Designation AND D.Id = B.Department AND D.OrganizationId = $org_id AND E.OrganizationId = $org_id AND E.EmployeeId =$EId AND E.TimeIn > A.TimeIn AND E.AttendanceDate='$date' AND A.OrganizationId = $org_id");
            if ($result = $query111->row()) {
                echo '<tr style="width:105%">
							
								<td>' . $result->FirstName . " " . $result->LastName . '</td>
								<td><span title="' . $result->designation . '">' . substr($result->designation, 0, 10) . '..</span></td>
								<td><span title="' . $result->department . '">' . $result->department . '..</span></td>
							    <td>' . getShiftTimes($ShiftId) . '</td>
								<td>' . substr(($result->TimeIn), 0, 5) . '</td>
							  </tr>';
            }
        }
    } else {
        echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
    }
    //return $res;
}

function getEarlyEmployee() {
    $data = array();
    $res = array();
    $ci = & get_instance();
    $ci->load->database();
    $i = 1;
    $org_id = $_SESSION['orgid'];
    $zone = getTimeZone($org_id);
    date_default_timezone_set($zone);
    $date = date("Y-m-d");
    $query = $ci->db->query("select Shift,Id,Designation,Department,FirstName,LastName from EmployeeMaster where OrganizationId = $org_id and Id IN (select EmployeeId from AttendanceMaster where OrganizationId = $org_id and AttendanceDate='$date' and TimeIn != '00:00:00')");
    if ($query->num_rows()) {
        foreach ($query->result() as $row) {
            $ShiftId = $row->Shift;
            $EId = $row->Id;
            $Department = $row->Department;
            $Designation = $row->Designation;
            $query222 = $ci->db->query("SELECT A.TimeOut,B.Name as department,C.Name as designation,D.TimeOut as timeout FROM ShiftMaster A,DepartmentMaster B,DesignationMaster C,AttendanceMaster D WHERE A.Id = $ShiftId AND A.OrganizationId = $org_id AND B.Id = $Department AND C.Id = $Designation AND D.EmployeeId = $EId AND D.TimeOut < A.TimeOut AND D.OrganizationId = $org_id AND D.TimeOut != '00:00:00' AND D.AttendanceDate='$date'");
            if ($result222 = $query222->row()) {
                //$timeout = $result222->TimeOut;
                //$ct =  date('H:i:s'); 
                //$query111 = $ci->db->query("select TimeOut from AttendanceMaster where EmployeeId = $EId and TimeOut < '$timeout' and OrganizationId = $org_id and TimeOut != '00:00:00' and AttendanceDate='$date'");
                //if($query111->num_rows() != 0){
                //if($result = $query111->row()){
                echo $data['EarlyEmployee'] = '<tr style="width:105%">
										
										<td>' . $row->FirstName . " " . $row->LastName . '</td>
										<td><span title="' . $result222->designation . '">' . substr(($result222->designation), 0, 10) . '..</span></td>
										<td><span title="' . $result222->department . '">' . $result222->department . '..</span></td>
										  <td>' . getShiftTimes($ShiftId) . '</td>
										<td>' . substr(($result222->timeout), 0, 5) . '</td>
									  </tr>';
                //}
                $res[] = $data;
                // }
            }
        }
        if (count($res) == 0) {
            echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
        }
    } else {
        echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
    }
}

function getMonthlyEmployee() {
    $data = array();
    $res = array();
    $ci = & get_instance();
    $ci->load->database();
    $i = 1;
    $org_id = $_SESSION['orgid'];
    $zone = getTimeZone($org_id);

    date_default_timezone_set($zone);
    $date = date("Y-m-d");
    $query = $ci->db->query("select Id,FirstName,LastName,Shift from EmployeeMaster where OrganizationId = ?", array($org_id));
    if ($query->num_rows() != 0) {
        foreach ($query->result() as $row) {
            $month = date("m", strtotime("-1 months"));
            $year = date("Y", strtotime("-1 months"));

            $Eid = $row->Id;
            $Shift = $row->Shift;
            // get Earlyleaving Start///
            $query2 = $ci->db->query("select SEC_TO_TIME( SUM( LEFT( TIMEDIFF( C.TimeOut, A.TimeOut ) , 2 ) *3600 + SUBSTRING( TIMEDIFF( C.TimeOut, A.TimeOut ) , 4, 2 ) *60 + SUBSTRING( TIMEDIFF( C.TimeOut, A.TimeOut ) , 7, 2 ) ) ) AS EarlyLeaving from AttendanceMaster A,ShiftMaster C where A.EmployeeId =$Eid and A.OrganizationId = $org_id and MONTH(A.AttendanceDate) = '$month' and YEAR(A.AttendanceDate) = '$year' and C.OrganizationId = $org_id and C.Id =$Shift and A.TimeOut !='00:00:00' and A.TimeOut < C.TimeOut");
            $result2 = $query2->row();
            $EarlyLeaving = $result2->EarlyLeaving;
            if ($EarlyLeaving == "")
                $EarlyLeaving = '00:00:00';
            $EarlyLeaving = date('H :i', strtotime($EarlyLeaving));
            // get Earlyleaving end///
            // get LateComing Start///				
            $query1 = $ci->db->query("select SEC_TO_TIME(SUM( LEFT( TIMEDIFF( A.TimeIn, C.TimeIn ) , 2 ) *3600 + SUBSTRING( TIMEDIFF( A.TimeIn, C.TimeIn ) , 4, 2 ) *60 + SUBSTRING( TIMEDIFF( A.TimeIn, C.TimeIn ) , 7, 2 ) ) ) AS LateComing from AttendanceMaster A,ShiftMaster C where A.EmployeeId =$Eid and A.OrganizationId = $org_id and MONTH(A.AttendanceDate) = '$month' and YEAR(A.AttendanceDate) = '$year' and A.TimeIn >C.TimeIn and C.OrganizationId = $org_id and C.Id =$Shift");
            $result3 = $query1->row();
            $LateComing = $result3->LateComing;
            // get LateComing End///	
            if ($LateComing == "")
                $LateComing = '00:00:00';
            $LateComing = date('H :i', strtotime($LateComing));

            // get overtime start//
            $query4 = $ci->db->query("SELECT TIMEDIFF(SEC_TO_TIME( SUM( LEFT( TIMEDIFF( A.TimeOut, A.TimeIn ) , 2 ) *3600 + SUBSTRING( TIMEDIFF( A.TimeOut, A.TimeIn ) , 4, 2 ) *60 + SUBSTRING( TIMEDIFF( A.TimeOut, A.TimeIn ) , 7, 2 ) ) ),SEC_TO_TIME( SUM( LEFT( TIMEDIFF( C.TimeOut, C.TimeIn ) , 2 ) *3600 + SUBSTRING( TIMEDIFF( C.TimeOut, C.TimeIn ) , 4, 2 ) *60 + SUBSTRING( TIMEDIFF( C.TimeOut, C.TimeIn ) , 7, 2 ) ) )) as overtime FROM AttendanceMaster A, ShiftMaster C WHERE A.EmployeeId =$Eid AND A.OrganizationId =$org_id AND MONTH( A.AttendanceDate ) =  '$month' AND YEAR( A.AttendanceDate ) =  '$year' AND C.OrganizationId =$org_id AND C.Id =$Shift");
            $result4 = $query4->row();
            $overtime = $result4->overtime;
            //$overtime =  date('H :i', strtotime($overtime));
            if ($overtime < '00:00:00') {
                $undertime = $overtime;
                $overtime = 0;
            } else {
                $overtime = $overtime;
                $undertime = 0;
            }
            // get overtime end//
            echo '<tr style="width:100%">
										<td>' . $row->FirstName . " " . $row->LastName . '</td>
										<td>' . $LateComing . '</td>
										<td>' . $EarlyLeaving . '</td>
										<td>' . substr(($overtime), 0, 5) . '</td>
										<td>' . substr(trim($undertime, "-!"), 0, 5) . '</td>
									  </tr>';
        }
    }
}

FUNCTION getTimeDiff($dtime, $atime) {

    $nextDay = $dtime > $atime ? 1 : 0;
    $dep = EXPLODE(':', $dtime);
    $arr = EXPLODE(':', $atime);
    $diff = ABS(MKTIME($dep[0], $dep[1], 0, DATE('n'), DATE('j'), DATE('y')) - MKTIME($arr[0], $arr[1], 0, DATE('n'), DATE('j') + $nextDay, DATE('y')));
    $hours = FLOOR($diff / (60 * 60));
    $mins = FLOOR(($diff - ($hours * 60 * 60)) / (60));
    $secs = FLOOR(($diff - (($hours * 60 * 60) + ($mins * 60))));
    IF (STRLEN($hours) < 2) {
        $hours = "0" . $hours;
    }
    IF (STRLEN($mins) < 2) {
        $mins = "0" . $mins;
    }
    IF (STRLEN($secs) < 2) {
        $secs = "0" . $secs;
    }
    RETURN $hours . ':' . $mins . ':' . $secs;
}

///// THIS HELPER MADE BY PALASH (END) ////	

function check_in_range($start_date, $end_date, $date_from_user) {
    // Convert to timestamp
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $user_ts = strtotime($date_from_user);

    // Check that user date is between start & end
    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

function weekOfMonth($date) {
    return ceil(date('j', strtotime($date)) / 7);
    /*
      $firstOfMonth = date("Y-m-01", strtotime($date));
      return intval(date("W", strtotime($date))) - intval(date("W", strtotime($firstOfMonth))) +1; */
}

function MonthlyLateComing() {
    $data = array();
    $res = array();
    $ci = & get_instance();
    $ci->load->database();
    $org_id = $_SESSION['orgid'];
    $query = $ci->db->query("select Id,FirstName,LastName,Shift,Designation,Department from EmployeeMaster where archive = 1 and OrganizationId = ? order by FirstName ", array($org_id));
    if ($query->num_rows() != 0) {
        foreach ($query->result() as $row) {
            $month = date("m", strtotime("-1 months"));
            //echo $month;
            $year = date("Y", strtotime("-1 months"));
            //echo $year;
            $Eid = $row->Id;
            $Shift = $row->Shift;
            $Shift1 = getShiftTimes($row->Shift);
            $desg = getDesignation($row->Designation);
            $deprt = getDepartment($row->Department);
            $FirstName = $row->FirstName;
            $LastName = $row->LastName;
            $Name = $FirstName . " " . $LastName;

            $query1 = $ci->db->query("select SEC_TO_TIME(SUM(TIME_TO_SEC(LEFT(TIMEDIFF( A.TimeIn, C.TimeIn ),5)))) AS LateComing from AttendanceMaster A,ShiftMaster C where A.EmployeeId =$Eid and A.OrganizationId = $org_id and MONTH(A.AttendanceDate) = '$month' and YEAR(A.AttendanceDate) = '$year' and A.TimeIn >C.TimeIn and C.OrganizationId = $org_id and C.Id =A.ShiftId order by LateComing");
            $result3 = $query1->row();

            $LateComing = substr($result3->LateComing, 0, 5);

            //$TimeIn = substr(($result3->TimeIn),0,5);
            if ($query->num_rows()) {
                $i = 1;
                //if($result3 = $query1->row()){
                if ($LateComing != '') {
                    echo '<tr style="width:105%">
								    <td style="">' . $Name . '</td>
								    <td><span title="' . $desg . '">' . substr($desg, 0, 10) . '..</span></td>
									<td><span title="' . $deprt . '">' . substr($deprt, 0, 10) . '..</span></td>
								    <td>' . $Shift1 . '</td>
								    <td>' . $LateComing . '</td>
							    </tr>';
                }
            } else {
                echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
            }
        }
    }
}

function MonthlyEarlyGoing() {

    $ci = & get_instance();
    $ci->load->database();
    $org_id = $_SESSION['orgid'];
    $query = $ci->db->query("select Id,FirstName,LastName,Shift,Designation from EmployeeMaster where archive = 1 and OrganizationId = ? order by FirstName", array($org_id));
    if ($query->num_rows() != 0) {
        foreach ($query->result() as $row) {
            $month = date("m", strtotime("-1 months"));
            $year = date("Y", strtotime("-1 months"));
            $Eid = $row->Id;
            $Shift = $row->Shift;
            $FirstName = $row->FirstName;
            $LastName = $row->LastName;
            $Shift1 = getShiftTimes($row->Shift);
            $desg = getDesignation($row->Designation);
            $deprt = getDepartmentByEmpID($row->Id);
            $Name = $FirstName . " " . $LastName;

            $query2 = $ci->db->query("select SEC_TO_TIME( SUM( TIME_TO_SEC(TIMEDIFF( C.TimeOut, A.TimeOut )))) AS EarlyLeaving from AttendanceMaster A,ShiftMaster C where A.EmployeeId=$Eid and A.OrganizationId = $org_id and MONTH(A.AttendanceDate) = '$month' and YEAR(A.AttendanceDate) = '$year' and C.OrganizationId = $org_id and C.Id =A.ShiftId and A.TimeOut !='00:00:00' and A.TimeOut < C.TimeOut order by EarlyLeaving");

            $result2 = $query2->row();
            $EarlyLeaving = $result2->EarlyLeaving;
            if ($EarlyLeaving == "")
                $EarlyLeaving = '00:00:00';
            $EarlyLeaving = date('H:i', strtotime($EarlyLeaving));
            if ($query->num_rows()) {
                // $i=1;
                //if($result3 = $query1->row()){
                if ($EarlyLeaving > 0) {
                    echo '<tr style="width:105%">
								
								<td>' . $Name . '</td>
								<td><span title="' . $deprt . '">' . substr($deprt, 0, 10) . '..</span></td>
								<td><span title="' . $desg . '">' . substr($desg, 0, 10) . '..</span></td>
								
								<td>' . $Shift1 . '</td>
								<td>' . $EarlyLeaving . '</td>
								
							  </tr>';
                }
            } else {
                echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
            }
        }
    }
}

function MonthlyOverTime() {
    $ci = & get_instance();
    $ci->load->database();
    $org_id = $_SESSION['orgid'];
    $query = $ci->db->query("select Id,FirstName,LastName,Shift,Designation from EmployeeMaster where archive = 1 and OrganizationId = ? order by FirstName", array($org_id));
    if ($query->num_rows() != 0) {
        foreach ($query->result() as $row) {
            $month = date("m", strtotime("-1 months"));
            $year = date("Y", strtotime("-1 months"));
            $Eid = $row->Id;
            $Shift = $row->Shift;
            $FirstName = $row->FirstName;
            $LastName = $row->LastName;
            $Shift1 = getShiftTimes($row->Shift);
            $desg = getDesignation($row->Designation);
            $deprt = getDepartmentByEmpID($row->Id);
            $Name = $FirstName . " " . $LastName;
            $query4 = $ci->db->query("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC(LEFT(TIMEDIFF( A.TimeOut,A.TimeIn ),5)) - TIME_TO_SEC(TIMEDIFF( C.TimeOut, C.TimeIn)))) as overtime FROM AttendanceMaster A, ShiftMaster C WHERE A.EmployeeId =$Eid AND A.OrganizationId =$org_id AND MONTH( A.AttendanceDate ) =  '$month' AND YEAR( A.AttendanceDate ) =  '$year' AND C.OrganizationId =$org_id AND C.Id = A.ShiftId AND A.TimeOut != '00:00:00' AND A.TimeIn != '00:00:00'");
            $result4 = $query4->row();
            $overtime = $result4->overtime;

            $overtime = substr($overtime, 0, 5);
            if ($query->num_rows()) {
                if ($overtime > '00:00:00') {

                    // $i=1;
                    //if($result3 = $query1->row()){
                    echo '<tr style="width:105%">
								<td>' . $Name . '</td>
								<td><span title="' . $desg . '">' . substr($desg, 0, 10) . '..</span></td>
								<td><span title="' . $deprt . '">' . substr($deprt, 0, 10) . '..</span></td>
								<td>' . $Shift1 . '</td>
								<td>' . $overtime . '</td>
							 </tr>';
                } else {
                    //echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
                }
            }
        }
    }
}

function MonthlyUnderTime() {
    $ci = & get_instance();
    $ci->load->database();
    $org_id = $_SESSION['orgid'];
    $query = $ci->db->query("select Id,FirstName,LastName,Shift,Designation from EmployeeMaster where archive = 1 and OrganizationId = ? order by FirstName", array($org_id));
    if ($query->num_rows() != 0) {
        foreach ($query->result() as $row) {
            $month = date("m", strtotime("-1 months"));
            $year = date("Y", strtotime("-1 months"));
            $Eid = $row->Id;
            $Shift = $row->Shift;
            $FirstName = $row->FirstName;
            $LastName = $row->LastName;
            $Shift1 = getShiftTimes($row->Shift);
            $desg = getDesignation($row->Designation);
            $deprt = getDepartmentByEmpID($row->Id);
            $Name = $FirstName . " " . $LastName;
            $query4 = $ci->db->query("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC(LEFT(TIMEDIFF( A.TimeOut,A.TimeIn ),5)) - IF(AttendanceStatus = 4,TIME_TO_SEC(TIMEDIFF( C.TimeOut, C.TimeIn)-5), TIME_TO_SEC(TIMEDIFF( C.TimeOut, C.TimeIn))))) as overtime FROM AttendanceMaster A, ShiftMaster C WHERE A.EmployeeId =$Eid AND A.OrganizationId =$org_id AND MONTH( A.AttendanceDate ) =  '$month' AND YEAR( A.AttendanceDate ) =  '$year' AND C.OrganizationId =$org_id AND C.Id = A.ShiftId AND A.TimeOut != '00:00:00' ");
            $result4 = $query4->row();
            $overtime = $result4->overtime;
            // $overtime =  date('H :i', strtotime($overtime));
            if ($query->num_rows()) {
                if ($overtime < '00:00:00') {
                    $undertime = $overtime;
                    // $i=1;
                    if ($undertime != '') {
                        echo '<tr style="width:105%;">
				<td>' . $Name . '</td>
			    <td><span title="' . $desg . '">' . substr($desg, 0, 10) . '..</span></td>
				<td><span title="' . $deprt . '">' . substr($deprt, 0, 10) . '..</span></td>
				<td>' . $Shift1 . '</td>
				<td>' . substr($undertime, 1, 6) . '</td>
				</tr>';
                    }
                }
            } else {
                echo '<tr style="width:100%"><td colspan="5">No Employees Found</td></tr>';
            }
        }
    }
}

function MonthlyAbsent() {
    $data = array();
    $res = array();
    $ci = & get_instance();
    $ci->load->database();
    $org_id = $_SESSION['orgid'];
    $month = date("m", strtotime("-1 months"));
    $year = date("Y", strtotime("-1 months"));
    $query5 = $ci->db->query("select Id from EmployeeMaster where OrganizationId = $org_id and archive = 1");
    foreach ($query5->result() as $row5) {
        $EmployeeId = $row5->Id;
        $query4 = $ci->db->query("select DISTINCT AttendanceDate from AttendanceMaster where MONTH(AttendanceDate) = '$month' AND YEAR(AttendanceDate) = '$year'");
        foreach ($query4->result() as $row4) {
            $date = $row4->AttendanceDate;
            $query1 = $ci->db->query("SELECT `DateFrom`, `DateTo` FROM `HolidayMaster` WHERE OrganizationId=? and (? between `DateFrom` and `DateTo`) ", array($org_id, $date));
            if ($query1->num_rows() > 0)
                continue;
            $dayOfWeek = 1 + date('w', strtotime($date));
            $weekOfMonth = weekOfMonth($date);
            $week = '';
            $query555 = $ci->db->query("SELECT `WeekOff` FROM  `WeekOffMaster` WHERE  `OrganizationId` =? AND  `Day` =  ?", array($org_id, $dayOfWeek));
            if ($row555 = $query555->result()) {
                $week = explode(",", $row555[0]->WeekOff);
            }
            if ($week[$weekOfMonth - 1] == 1)
                continue;
            $query = $ci->db->query("select EmployeeId from AttendanceMaster where EmployeeId = $EmployeeId and AttendanceDate = '$date' and OrganizationId = ?", array($org_id));
            if ($query->num_rows() != 0) {
                $row = $query->row();
                $data[] = $row->EmployeeId;
            }
        }
        $res[] = count($data);
    }
    print_r($res);
}

function getOrgName($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Name FROM `Organization` WHERE Id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Name;
    }
}

function getOrgEmail($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Email FROM `Organization` WHERE Id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Email;
    }
}

function getEmpIDbyEmail($emailid, $orgid) { // orgid 502 for RAK properties
    $ci = & get_instance();
    $ci->load->database();

    Trace("SELECT id FROM `EmployeeMaster` WHERE  CompanyEmail='$emailid' and OrganizationId=$orgid");
    $query = $ci->db->query("SELECT id FROM `EmployeeMaster` WHERE  CompanyEmail='$emailid' and OrganizationId=$orgid"); //
    if ($row = $query->result())
        return $row[0]->id;

    return 0;
}

function getOrgIdByEmpUsername($uname) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `OrganizationId` FROM `UserMaster` WHERE `Username`='$uname'");
    $res = array();
    if ($row = $query->result())
        return $row[0]->OrganizationId;
    return 0;
}

function getOrgIdByEmpId($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `OrganizationId` FROM `UserMaster` WHERE `EmployeeId`='$id'");
    $res = array();
    if ($row = $query->result())
        return $row[0]->OrganizationId;
    return 0;
}

function getOrgLimit($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT NoOfEmp FROM `Organization` WHERE Id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->NoOfEmp;
    }
}

function getAdminEmail($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Email FROM `Organization` WHERE Id=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Email;
    }
}

function getAdminName($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT name FROM `admin_login` WHERE Id=$id");

    $res = array();
    foreach ($query->result() as $row) {
        return $row->name;
    }
}

function getAdminUsername($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT username FROM `admin_login` WHERE OrganizationId=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->username;
    }
}

function getAdminStatus($id) {
    $ci = & get_instance();
    $ci->load->database();
    $status = 0;
    $query = $ci->db->query("SELECT appSuperviserSts FROM `UserMaster` WHERE EmployeeId='$id'");
    $res = array();
    foreach ($query->result() as $row) {
        $status = $row->appSuperviserSts;
    }
    return $status;
}

function getQRLoginDetailByEmpID($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `username_mobile`,`Password` FROM `UserMaster` WHERE `EmployeeId`=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return decode5t($row->username_mobile) . "ykks==" . ($row->Password);
    }
}

function getPhone($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `username_mobile` FROM `UserMaster` WHERE `EmployeeId`=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return decode5t($row->username_mobile);
    }
}

function getPassword($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `Password` FROM `UserMaster` WHERE `EmployeeId`=$id");
    $res = array();
    foreach ($query->result() as $row) {
        return decode5t($row->Password);
    }
}

function getQRLink($id) {
    return 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" title="Link to Google.com';
}

function convert_number($number) {

    if (($number < 0) || ($number > 999999999)) {
        throw new Exception("Number is out of range");
    }
    $Gn = floor($number / 1000000);
    /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000);
    /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);
    /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);
    /* Tens (deca) */
    $n = $number % 10;
    /* Ones */
    $res = "";
    if ($Gn) {
        $res .= convert_number($Gn) . "Million";
    }
    if ($n) {
        $res .= (empty($res) ? "" : " ") . convert_number($kn) . " Thousand";
    }
    if ($Hn) {
        $res .= (empty($res) ? "" : " ") . convert_number($Hn) . " Hundred";
    }
    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
    if ($Dn || $n) {
        if (!empty($res)) {
            $res .= " and ";
        }
        if ($Dn < 2) {
            $res .= $ones[$Dn * 10 + $n];
        } else {
            $res .= $tens[$Dn];
            if ($n) {
                $res .= "-" . $ones[$n];
            }
        }
    }
    if (empty($res)) {
        $res = "zero";
    }
    $fixed = ltrim($res, '0');
    return $fixed;
}

function sum_the_time($time1, $time2) {
    $times = array($time1, $time2);
    $seconds = 0;
    foreach ($times as $time) {
        list($hour, $minute, $second) = explode(':', $time);
        $seconds += $hour * 3600;
        $seconds += $minute * 60;
        $seconds += $second;
    }
    $hours = floor($seconds / 3600);
    $seconds -= $hours * 3600;
    $minutes = floor($seconds / 60);
    $seconds -= $minutes * 60;
    if ($seconds < 9) {
        $seconds = "0" . $seconds;
    }
    if ($minutes < 9) {
        $minutes = "0" . $minutes;
    }
    if ($hours < 9) {
        $hours = "0" . $hours;
    }
    return "$hours:$minutes:$seconds";
}

function getEmpIDbyEmpNo($empno, $orgid) { // orgid 502 for RAK properties
    $ci = & get_instance();
    $ci->load->database();
    if ($empno != 'NUll' && $empno != 0) {
        $query = $ci->db->query("SELECT id FROM `EmployeeMaster` WHERE  EmployeeCode='$empno' and OrganizationId=$orgid"); //
        if ($row = $query->result())
            return $row[0]->id;
    }
    return 0;
}

function checkLinkValidity_admin($email, $orgid, $counter) {
    //	return "SELECT id  FROM `admin_login` WHERE  email='$email' and OrganizationId=$orgid and resetPassCounter=$counter";
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT id  FROM `admin_login` WHERE  email=? and OrganizationId=? and resetPassCounter=?", array($email, $orgid, $counter));
    return $query->num_rows();
}

function getStateName($state) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT  name  FROM `state_gst` WHERE  code=?", array($state));
    if ($row = $query->result())
        return $row[0]->name;
    return '';
}

/*     /// this mail fun is wrkin fine- mail r sending by ubicrm@ubipublication.com mail id
  function sendEmail($email,$subject,$message,$headers=""){
  $orgid			= 	isset($_SESSION['ubicrm_org_id'])	?	$_SESSION['ubicrm_org_id']	:"0";
  $mid			= 	isset($_SESSION['ubicrm_user_id'])	?	$_SESSION['ubicrm_user_id']	:"0";
  $mdate = date('Y-m-d H:i:s');
  $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.ubipublication.com',
  'smtp_port' => '25',
  'smtp_user' => 'ubicrm@ubipublication.com',
  'smtp_pass' => 'Ubipass@2017#',
  'mailtype' => 'html',
  'charset' => 'UTF-8',
  'wordwrap' => TRUE
  );
  $ci =& get_instance();
  $ci->load->library('email', $config);
  $ci->email->set_newline("\r\n");
  $ci->email->from('ubicrm@ubipublication.com');
  $ci->email->to($email);
  $ci->email->subject($subject);
  $ci->email->message($message);
  if(isset($_FILES)){
  $con=count($_FILES);
  for($i=0;$i<$con;$i++){
  if(isset($_FILES['file'.$i])){
  $errors= array();
  $file_name = $_FILES['file'.$i]['name'];
  $file_name=$file_name.$mdate;
  if (!file_exists("public/uploads/$orgid/")) {
  mkdir("public/uploads/$orgid/", 0777, true);
  }
  if (!file_exists("public/uploads/$orgid/$mid/")) {
  mkdir("public/uploads/$orgid/$mid/", 0777, true);
  }
  if (file_exists("public/uploads/$orgid/$mid/$file_name")){
  unlink("public/uploads/$orgid/$mid/$file_name");
  }
  $file_size =$_FILES['file'.$i]['size'];
  $file_tmp =$_FILES['file'.$i]['tmp_name'];
  $file_type=$_FILES['file'.$i]['type'];
  $location="public/uploads/$orgid/$mid/";
  if(empty($errors)==true){
  $sts=move_uploaded_file($file_tmp, $location.$file_name );
  if($sts){
  $ci->email->attach($location.$file_name);
  }
  }
  }
  }
  }
  if($ci->email->send()){
  return true;
  }else{
  show_error($ci->email->print_debugger());
  }
  } */

function sendEmail_new1($to, $subject, $msg, $header = '', $file = "", $fname = 'ubiAttendance', $orgid = '') {
    $msg .= "<br/><br/><b>This is an auto-generated mail. Kindly do not reply to this mail.</b>";
    Trace($msg);
    $userName = 'ubiattendance@ubitechsolutions.com';
    if ($orgid != '') {
        $em = getName("Organization", "smtpuser", "Id", $orgid);
        if ($em != '')
            $userName = $em;
    }
    // Instantiate a new PHPMailer 
    $mail = new PHPMailer;

    // Tell PHPMailer to use SMTP
    $mail->isSMTP();

    // Replace sender@example.com with your "From" address. 
    // This address must be verified with Amazon SES.
    $mail->setFrom($userName, $fname);

    // Replace recipient@example.com with a "To" address. If your account 
    // is still in the sandbox, this address must be verified.
    // Also note that you can include several addAddress() lines to send
    // email to multiple recipients.
    $mail->addAddress($to);

    // Replace smtp_username with your Amazon SES SMTP user name.
    //$mail->Username = 'AKIAINHTNV5UDYHKLUHA';
    $mail->Username = 'AKIAXILXCVAK6LZ2UKGE';

    // Replace smtp_password with your Amazon SES SMTP password.
    //$mail->Password = 'Aj3bqCkDsPYRWH6impKmMeRXbyspo0yP3/MC1F8j1b4K';


    $mail->Password = 'BLCSjcuA3C/7CKRU8b/1DSSwF2mpo6l72jjJ2uMarjjs';

    // Specify a configuration set. If you do not want to use a configuration
    // set, comment or remove the next line.
    //$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
    // If you're using Amazon SES in a region other than US West (Oregon), 
    // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
    // endpoint in the appropriate region.
    $mail->Host = 'email-smtp.us-west-2.amazonaws.com';

    // The subject line of the email
    $mail->Subject = $subject;

    // The HTML-formatted body of the email
    $mail->Body = $msg;

    // Tells PHPMailer to use SMTP authentication
    $mail->SMTPAuth = true;

    // Enable TLS encryption over port 587
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    // Tells PHPMailer to send HTML-formatted email
    $mail->isHTML(true);
    if ($file != "")
        $mail->AddAttachment($file);
    // The alternative email body; this is only displayed when a recipient
    // opens the email in a non-HTML email client. The \r\n represents a 
    // line break.
    //$mail->AltBody = "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";

    if (!$mail->send()) {
        //echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
        $err = $mail->ErrorInfo;
        Trace($err);
        return false;
    } else {
        //echo "Email sent!" , PHP_EOL;
        return true;
    }
}

function sendEmail_new($to, $subject, $msg, $header = '', $file = "", $fname = 'ubiAttendance', $orgid = '') {
    $handle = curl_init();

    $url = "http://ubiattendance.zentylpro.com/index.php/Att_services/sendEmailReal";

    // Set the url
    //curl_setopt($handle, CURLOPT_URL, $url);
    // Set the result output to be a string.
    //curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //$header = array(
    //'content-type':'application/json',
    //);
    $postData = array(
        'email' => $to,
        'subject' => $subject,
        'message' => $msg
    );


    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_TIMEOUT_MS => 200,
                CURLOPT_NOSIGNAL => 1,
                CURLOPT_POSTFIELDS => $postData,
            )
    );
    session_write_close();
    $output = curl_exec($handle);
    //echo "done";
    curl_close($handle);
}

function sendEmail_new_old27nov($to, $subject, $msg, $header = '', $file = "", $fname = 'ubiAttendance') {
    $url = "https://ubipublication.com/ubiattendance/index.php/cron/
		AWS";
    $ch = curl_init($url);
    $arr = array(
        'to' => $to,
        'subject' => $subject,
        'msg' => $msg
    );

    $payload = json_encode($arr);

    //$arrval = str_replace("\\","",$arrval);
    Trace($payload);
    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type:application/json'
    ));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);

    //close cURL resource
    curl_close($ch);
    return true;

    /* $userName = "noreply@ubiattendance.com";
      $hostName = "ubiattendance.com";
      $portName = "465";
      $fromName = $fname;
      $smtpAuth = 'true';
      $mail = new PHPMailer;
      //Enable SMTP debugging.
      $mail->SMTPDebug = 0;
      //Set PHPMailer to use SMTP.
      $mail->isSMTP();
      //Set SMTP host name
      $mail->Host = $hostName;
      //Set this to true if SMTP host requires authentication to send email
      $mail->SMTPAuth = true;
      //Provide username and password
      $mail->Username = $userName;
      $mail->Password = '<6A$Sg[+uhp';
      //If SMTP requires TLS encryption then set it
      $mail->SMTPSecure = "ssl";
      //Set TCP port to connect to
      $mail->Port = 465;
      $mail->From = $userName;
      //	$mail->FromName = $fromName;
      $mail->addAddress($to);
      $mail->isHTML(true);
      if($file!="")
      $mail->AddAttachment($file);
      $mail->Subject = $subject;
      $mail->Body = $msg;
      $mail->AltBody = "This is the plain text version of the email content";
      if(!$mail->Send())
      {
      $err="mail not send";
      $err=$mail->ErrorInfo;
      Trace($err);
      if($file!="")
      {
      //$file_size = filesize($file);

      $content = file_get_contents( $file);
      $content = chunk_split(base64_encode($content));
      $uid = md5(uniqid(time()));
      $name = basename($file);
      Trace($file);
      // header
      $header = "From: ".$fromName;
      $header .= "Reply-To: ".$to."\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

      // message & attachment
      $nmessage = "--".$uid."\r\n";
      $nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
      $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
      $nmessage .= $msg."\r\n\r\n";
      $nmessage .= "--".$uid."\r\n";
      $nmessage .= "Content-Type: application/octet-stream; name=\"$subject.pdf\"\r\n";
      $nmessage .= "Content-Transfer-Encoding: base64\r\n";
      $nmessage .= "Content-Disposition: attachment; filename=\"$subject.pdf\"\r\n\r\n";
      $nmessage .= $content."\r\n\r\n";
      $nmessage .= "--".$uid."--";


      $sts1=mail($to,$subject,$nmessage,$header);
      //mail('monika@ubitechsolutions.com',$subject,$msg,$headers);
      if($sts1)
      {
      Trace("send through mail function with file");
      return true;
      }
      else
      {
      Trace("not send through mail function with file");
      return false;
      }
      }
      else
      {
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: $fromName" . "\r\n";

      $sts1=mail($to,$subject,$msg,$headers);
      //mail('monika@ubitechsolutions.com',$subject,$msg,$headers);
      if($sts1)
      {
      Trace("send through mail function");
      return true;
      }
      else
      {
      Trace("not send through mail function");
      return false;
      }
      }
      }
      else
      {
      //Trace("send through PHPMAILER");
      return true;
      } */
}

function sendEmail($email, $subject, $message, $headers = "") {
    $orgid = isset($_SESSION['ubicrm_org_id']) ? $_SESSION['ubicrm_org_id'] : "0";
    $mid = isset($_SESSION['ubicrm_user_id']) ? $_SESSION['ubicrm_user_id'] : "0";
    $mdate = date('Y-m-d H:i:s');
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ubiattendance.com',
        'smtp_port' => '25',
        'smtp_user' => 'noreply@ubiattendance.com',
        'smtp_pass' => '<6A$Sg[+uhp',
        'mailtype' => 'html',
        'charset' => 'UTF-8',
        'wordwrap' => TRUE
    );
    $ci = & get_instance();
    $ci->load->library('email', $config);
    $ci->email->set_newline("\r\n");
    $ci->email->from('noreply@ubiattendance.com');
    $ci->email->to($email);
    $ci->email->subject($subject);
    $ci->email->message($message);
    if (isset($_FILES)) {
        $con = count($_FILES);
        for ($i = 0; $i < $con; $i++) {
            if (isset($_FILES['file' . $i])) {
                $errors = array();
                $file_name = $_FILES['file' . $i]['name'];
                $file_name = $file_name . $mdate;
                if (!file_exists("public/uploads/$orgid/")) {
                    mkdir("public/uploads/$orgid/", 0777, true);
                }
                if (!file_exists("public/uploads/$orgid/$mid/")) {
                    mkdir("public/uploads/$orgid/$mid/", 0777, true);
                }
                if (file_exists("public/uploads/$orgid/$mid/$file_name")) {
                    unlink("public/uploads/$orgid/$mid/$file_name");
                }
                $file_size = $_FILES['file' . $i]['size'];
                $file_tmp = $_FILES['file' . $i]['tmp_name'];
                $file_type = $_FILES['file' . $i]['type'];
                $location = "public/uploads/$orgid/$mid/";
                if (empty($errors) == true) {
                    $sts = move_uploaded_file($file_tmp, $location . $file_name);
                    if ($sts) {
                        $ci->email->attach($location . $file_name);
                    }
                }
            }
        }
    }
    if ($ci->email->send()) {
        return true;
    } else {
        show_error($ci->email->print_debugger());
    }
}

function getName($tablename, $getcol, $wherecol, $id) {
    $ci = & get_instance();
    $ci->load->database();
    $name = "";
    $result = array();
    //$conname='';
    $ci->db->select($getcol);
    $whereCondition = $array = array($wherecol => $id);
    $ci->db->where($whereCondition);
    $ci->db->from($tablename);
    $query = $ci->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        $status = true;
        $successMsg = $count . " record found";
        foreach ($query->result() as $row) {
            $name = $row->$getcol;
        }
    }
    return $name;
}

/* function sendmail(){
  $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'vijay@ubitechsolutions.com',
  'smtp_pass' => 'vijaysinghvijay#',
  'mailtype'  => 'html',
  'charset'   => 'iso-8859-1'
  );
  $this->load->library('email', $config);
  $this->email->set_newline("\r\n");

  // Set to, from, message, etc.
  $this->email->from('noreply@ubitechsolutions', 'UBITECH');
  $this->email->to('vijay@ubitechsolutions.com');

  $this->email->subject('Email Test');
  $this->email->message('Testing the email class.');
  $result = $this->email->send();
  } */

function sendAutoMail($to, $subject, $msg, $file = "", $userName = "") {
    $userName = 'ubiattendance@ubitechsolutions.com';
    // Instantiate a new PHPMailer 
    $mail = new PHPMailer;

    // Tell PHPMailer to use SMTP
    $mail->isSMTP();

    // Replace sender@example.com with your "From" address. 
    // This address must be verified with Amazon SES.
    $mail->setFrom($userName, $fname);

    // Replace recipient@example.com with a "To" address. If your account 
    // is still in the sandbox, this address must be verified.
    // Also note that you can include several addAddress() lines to send
    // email to multiple recipients.
    $mail->addAddress($to);

    // Replace smtp_username with your Amazon SES SMTP user name.
    $mail->Username = 'AKIAINHTNV5UDYHKLUHA';

    // Replace smtp_password with your Amazon SES SMTP password.
    $mail->Password = 'Aj3bqCkDsPYRWH6impKmMeRXbyspo0yP3/MC1F8j1b4K';

    // Specify a configuration set. If you do not want to use a configuration
    // set, comment or remove the next line.
    //$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
    // If you're using Amazon SES in a region other than US West (Oregon), 
    // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
    // endpoint in the appropriate region.
    $mail->Host = 'email-smtp.us-west-2.amazonaws.com';

    // The subject line of the email
    $mail->Subject = $subject;

    // The HTML-formatted body of the email
    $mail->Body = $msg;

    // Tells PHPMailer to use SMTP authentication
    $mail->SMTPAuth = true;

    // Enable TLS encryption over port 587
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Tells PHPMailer to send HTML-formatted email
    $mail->isHTML(true);

    if ($file != "")
        $mail->AddAttachment($file);
    // The alternative email body; this is only displayed when a recipient
    // opens the email in a non-HTML email client. The \r\n represents a 
    // line break.
    //$mail->AltBody = "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";

    if (!$mail->send()) {
        //echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
        $err = $mail->ErrorInfo;
        Trace($err);
        return false;
    } else {
        //echo "Email sent!" , PHP_EOL;
        return true;
    }

    /* $url = "https://ubipublication.com/ubiattendance/index.php/cron/sendAutoMailAWS";
      $ch  = curl_init($url);
      $arr = array(
      'to' => $to,
      'subject' => $subject,
      'msg' => $msg,
      'userName' => $userName
      );

      $payload = json_encode($arr);

      //$arrval = str_replace("\\","",$arrval);
      Trace($payload);
      //attach encoded JSON string to the POST fields
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

      //set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type:application/json'
      ));

      //return response instead of outputting
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      //execute the POST request
      $result = curl_exec($ch);

      //close cURL resource
      curl_close($ch);
      return true; */

    /* $hostName = "ubiattendance.com";
      $portName = "465";
      if($userName==""){
      $userName = "noreply2@ubiattendance.com";
      }
      $fromName = 'ubiAttendance';
      $smtpAuth = 'true';
      $mail = new PHPMailer;
      //Enable SMTP debugging.
      $mail->SMTPDebug = 0;
      //Set PHPMailer to use SMTP.
      $mail->isSMTP();
      //Set SMTP host name
      $mail->Host = $hostName;
      //Set this to true if SMTP host requires authentication to send email
      $mail->SMTPAuth = true;
      //Provide username and password
      $mail->Username = $userName;
      $mail->Password = 'n@gp,?_*21Q%O';
      //If SMTP requires TLS encryption then set it
      $mail->SMTPSecure = "ssl";
      //Set TCP port to connect to
      $mail->Port = 465;
      $mail->From = $userName;
      $mail->FromName = $fromName;
      $mail->addAddress($to);
      $mail->isHTML(true);
      if($file!="")
      $mail->AddAttachment($file);
      $mail->Subject = $subject;
      $mail->Body = $msg;
      $mail->AltBody = "This is the plain text version of the email content";
      if(!$mail->Send())
      {
      $err="mail not send";
      $err=$mail->ErrorInfo;
      Trace($err);
      if($file!="")
      {
      //$file_size = filesize($file);

      $content = file_get_contents( $file);
      $content = chunk_split(base64_encode($content));
      $uid = md5(uniqid(time()));
      $name = basename($file);
      Trace($file);
      // header
      $header = "From: ".$fromName." <noreply@ubiattendance.com>\r\n";
      $header .= "Reply-To: ".$to."\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

      // message & attachment
      $nmessage = "--".$uid."\r\n";
      $nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
      $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
      $nmessage .= $msg."\r\n\r\n";
      $nmessage .= "--".$uid."\r\n";
      $nmessage .= "Content-Type: application/octet-stream; name=\"$subject.pdf\"\r\n";
      $nmessage .= "Content-Transfer-Encoding: base64\r\n";
      $nmessage .= "Content-Disposition: attachment; filename=\"$subject.pdf\"\r\n\r\n";
      $nmessage .= $content."\r\n\r\n";
      $nmessage .= "--".$uid."--";


      $sts1=mail($to,$subject,$nmessage,$header);
      //mail('monika@ubitechsolutions.com',$subject,$msg,$headers);
      if($sts1)
      {
      Trace("send through mail function with file");
      return true;
      }
      else
      {
      Trace("not send through mail function with file");
      return false;
      }
      }
      else
      {
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: $fromName<noreply@ubiattendance.com>" . "\r\n";

      $sts1=mail($to,$subject,$msg,$headers);
      //mail('monika@ubitechsolutions.com',$subject,$msg,$headers);
      if($sts1)
      {
      Trace("send through mail function");
      return true;
      }
      else
      {
      Trace("not send through mail function");
      return false;
      }
      }
      }
      else
      {
      //Trace("send through auto trial PHPMAILER");
      return true;
      }
     */
}

//get weekly offfunction 

function getpermission($did, $orgid) {
    $result = array();
    $count = 0;
    $data = array();
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $whereCondition = "(AttendanceAppSts=1)";
    $ci->db->where($whereCondition);
    $ci->db->from('ModuleMaster');
    $query1 = $ci->db->get();
    $count = $query1->num_rows();
    if ($count >= 1) {
        $status = true;
        //$successMsg=$count." record found";			
        foreach ($query1->result() as $row) {
            $res = array();
            //$res['rolename'] = $id;
            // $res['roles'] = getName('DesignationMaster','Name','Id',$id);
            $res['moduleid'] = $row->Id;
            $res['name'] = $row->ModuleName;
            $res['label'] = $row->ModuleLabel;
            $res['vsts'] = (int) getModulePermission($did, $row->Id, "ViewPermission", $orgid);
            $data[] = $res;
        }
    }
    $result = $data;
    return $result;
}

function getModulePermission($roleid, $moduleid, $sts, $orgid) {

    $ci = & get_instance();
    $ci->load->database();
    $per = "0";
    $result = array();
    //$conname='';
    $ci->db->select($sts);
    $whereCondition = "(RoleId = $roleid AND OrganizationId = $orgid AND ModuleId = $moduleid)";
    $ci->db->where($whereCondition);
    $ci->db->from("UserPermission");
    $query = $ci->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        $status = true;
        $successMsg = $count . " record found";
        foreach ($query->result() as $row) {
            $per = $row->$sts;
        }
    } else {
        $zname = getTimeZone($orgid);
        date_default_timezone_set($zname);
        $today = date('Y-m-d');
        $adminid = $_SESSION['id'];
        $query = $ci->db->query("insert into UserPermission(RoleId,ModuleId,ViewPermission,OrganizationId,CreatedDate,CreatedById,LastModifiedDate,LastModifiedById) values('$roleid','$moduleid','0','$orgid','$today','$adminid','$today','$adminid') ");
    }
    return $per;
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad((float) $lat1)) * sin(deg2rad((float) $lat2)) + cos(deg2rad((float) $lat1)) * cos(deg2rad((float) $lat2)) * cos(deg2rad((float) $theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

function getAddonPermission($orgid, $addon) {

    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT $addon as addon FROM licence_ubiattendance WHERE OrganizationId = $orgid ");
    $res = array();
    if ($row = $query->row()) {
        return $row->addon;
    } else {
        return 0;
    }
}

function Day_cal($months) {
    $date = date("Y-m-d");
    $date = strtotime(date("Y-m-d", strtotime($date)) . "+" . $months . " months");
    $nextdate = date("Y-m-d", $date);
    $diff = strtotime($nextdate) - strtotime(date("Y-m-d"));
    return abs(round($diff / 86400));
}

function getShiftTimeInSeconde($shift) {
    $type = getShiftType($shift);
    $ShiftTimeInSeconde = 0;
    $ci = & get_instance();
    $ci->load->database();

    if ($type == 1) {
        $query = $ci->db->query(" SELECT  TIME_TO_SEC( TIMEDIFF( TimeOut, TimeIn ) ) AS seconds,TimeIn,TimeOut,Name FROM  `ShiftMaster`  WHERE  `shifttype` =1 AND  Id = $shift ");
        if ($row = $query->row()) {
            $ShiftTimeInSeconde = $row->seconds . "**" . $type . "**" . $row->TimeIn . "**" . $row->TimeOut . "**" . $row->Name;
        }
    } else if ($type == 2) {
        $query = $ci->db->query("SELECT  TIME_TO_SEC(TIMEDIFF(CONCAT(DATE('2019-04-15'),' ',TimeOut),CONCAT(DATE('2019-04-14'),' ',TimeIn))) as seconds ,TimeIn,TimeOut,Name  FROM  `ShiftMaster`  WHERE  `shifttype` = 2 AND  Id = $shift");
        if ($row = $query->row()) {
            $ShiftTimeInSeconde = $row->seconds . "**" . $type . "**" . $row->TimeIn . "**" . $row->TimeOut . "**" . $row->Name;
        }
    }
    return $ShiftTimeInSeconde;
}

function getNearLocation($lat2, $lon2, $orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $locationid = 0;
    $mindistance = 0;
    $query = $ci->db->query("SELECT  Id , Lat_Long  FROM  Geo_Settings WHERE OrganizationId = $orgid ");
    foreach ($query->result() as $row) {
        $arr = explode(",", $row->Lat_Long);
        if (count($arr) > 1) {
            $lat1 = floatval($arr[0]);
            $lon1 = floatval($arr[1]);
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad((float) $lat1)) * sin(deg2rad((float) $lat2)) + cos(deg2rad((float) $lat1)) * cos(deg2rad((float) $lat2)) * cos(deg2rad((float) $theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

            $mindistance_temp = ($miles * 1.609344);
            if ($lat1 == $lat2 AND $lon1 == $lon2) {
                $mindistance = 0;
                $locationid = $row->Id;
                break;
            } else if ($mindistance > $mindistance_temp OR $mindistance == 0) {
                $mindistance = $mindistance_temp;
                $locationid = $row->Id;
            }
        }
    }
    return $locationid;
}

function getNearLocationOfEmp($lat2, $lon2, $empid) {
    $ci = & get_instance();
    $ci->load->database();
    $locationid = 0;
    $mindistance = 0;

    $Empquery = $ci->db->query("SELECT  area_assigned  FROM  EmployeeMaster  WHERE id = $empid AND area_assigned != '' AND area_assigned != '0' ");
    if ($emprow = $Empquery->row()) {
        //print_r( $emprow->area_assigned);
        $ides = explode(",", $emprow->area_assigned);

        for ($i = 0; $i < count($ides); $i++) {
            $query = $ci->db->query("SELECT  Id , Lat_Long  FROM  Geo_Settings WHERE  Id = '$ides[$i]' ");
            foreach ($query->result() as $row) {
                $arr = explode(",", $row->Lat_Long);
                if (count($arr) > 1) {
                    $lat1 = floatval($arr[0]);
                    $lon1 = floatval($arr[1]);
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad((float) $lat1)) * sin(deg2rad((float) $lat2)) + cos(deg2rad((float) $lat1)) * cos(deg2rad((float) $lat2)) * cos(deg2rad((float) $theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;

                    $mindistance_temp = ($miles * 1.609344);
                    if ($lat1 == $lat2 AND $lon1 == $lon2) {
                        $mindistance = 0;
                        $locationid = $row->Id;
                        break;
                    } else if ($mindistance > $mindistance_temp OR $mindistance == 0) {
                        $mindistance = $mindistance_temp;
                        $locationid = $row->Id;
                    }
                }
            }
        }
    }
    return $locationid;
}

function getDataDeleteSts($orgid) { // to get the infor weather image uploading is enable or not in orgn for visit
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT `DataDeleteSts` FROM `Organization` WHERE Id=$orgid");
    if ($row = $query->result())
        return $row[0]->DataDeleteSts;
    return 0;
}

function correctImageOrientation($filename) {
    if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename);
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            if ($orientation != 1) {
                $img = imagecreatefromjpeg($filename);
                $deg = 0;
                switch ($orientation) {
                    case 3:
                        $deg = 180;
                        break;
                    case 6:
                        $deg = 270;
                        break;
                    case 8:
                        $deg = 90;
                        break;
                }
                if ($deg) {
                    $img = imagerotate($img, $deg, 0);
                }
                // then rewrite the rotated image back to the disk as $filename 
                imagejpeg($img, $filename, 95);
            } // if there is some rotation necessary
        } // if have the exif orientation info
    } // if function exists      
}

/* --------------------- By Shashank for offline mode */

function checkIfAttendanceAlreadyMarked($orgid, $userId, $date, $action) {

    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT * FROM AttendanceMaster WHERE AttendanceDate =  '$date' AND EmployeeId =$userId AND OrganizationId =$orgid");
    if ($query->num_rows()) {
        $row = $query->row();

        return $row;
    } else {
        return false;
    }
}

function getEmployeeForOffline($EmployeeId) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT Shift,Department,Designation,area_assigned,hourly_rate,OwnerId FROM EmployeeMaster WHERE Id=$EmployeeId");
    if ($row = $query->row()) {
        return $row;
    } else {

        return false;
    }
}

function validateTime($timeIn, $timeOut) {
    if ($timeOut == '00:00:00') {
        return true;
    }
    $timeInTime = new DateTime("2018-03-25 " . $timeIn);
    $timeOutTime = new DateTime("2018-03-25 " . $timeOut);

    if ($timeInTime > $timeOutTime) {
        return false;
    } else {
        return true;
    }
}

function validateTimeMultiDateShift($timeInDateTime, $timeOutDateTime) {
    // if time out is punched automatically then we should not compare time

    if (strtotime(date("H:i:s", strtotime($timeOutDateTime))) == strtotime("00:00:00")) {

        return true;
    }
    if (strtotime($timeInDateTime) < strtotime($timeOutDateTime)) {
        return true;
    } else {

        return false;
    }
}

function getOfflineAddonForOrg($org_id) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT Addon_offline_mode FROM licence_ubiattendance WHERE OrganizationId=$org_id");
    if ($row = $query->row()) {

        return $row->Addon_offline_mode;
    } else {

        return false;
    }
}

function GetPlanStatus($org_id) {
    $ci = & get_instance();
    $ci->load->database();
    $status = 0;
    $query = $ci->db->query("SELECT status FROM licence_ubiattendance WHERE OrganizationId=$org_id");
    if ($row = $query->row()) {
        $status = $row->status;
    }
    return $status;
}

function isNextDayAWorkingDay($shift_id, $date) {
    $ci = & get_instance();
    $ci->load->database();

    $firstday = strtolower(date('l', strtotime('01-m-Y')));
    $firstdaynumeric = strtolower(date('N', strtotime('01-m-Y')));
    $currentDate = date('d', strtotime($date));

    $a = strtotime("last $firstday", strtotime($date));




    $a = date('w', $a) == date('w') ? $a + 7 * 86400 : $a;


    $currentWeekIndexOfNextDay = floor(date('d', $a) / 7);


    $lastDayOfMonth = date('N', strtotime('last day of this month'));
    $lastDateOfMonth = date('d', strtotime('last day of this month'));
    $currentDay = date("N", strtotime($date));

    if ($currentDay <= $firstdaynumeric)
        $currentWeekIndexOfNextDay++;

//echo $currentWeekIndexOfNextDay;

    switch ($currentDay) {
        case 1:
            $currentDayIndex = 2;
            $nextDayIndex = 3;

            break;
        case 2:
            $currentDayIndex = 3;
            $nextDayIndex = 4;
            break;
        case 3:
            $currentDayIndex = 4;
            $nextDayIndex = 5;
            break;
        case 4:
            $currentDayIndex = 5;
            $nextDayIndex = 6;
            break;
        case 5:
            $currentDayIndex = 6;
            $nextDayIndex = 7;
            break;
        case 6:
            $currentDayIndex = 7;
            $nextDayIndex = 1;
            $currentWeekIndexOfNextDay++;
            break;
        case 7:
            $currentDayIndex = 1;
            $nextDayIndex = 2;
            $currentWeekIndexOfNextDay++;
            break;
    }
    if ($currentWeekIndexOfNextDay > 4) {
        $currentWeekIndexOfNextDay = 0;
    }

    if ($lastDateOfMonth == 31) {
        if (($currentDay + 7) > 31)
            $currentWeekIndexOfNextDay = 0;
    } else if ($lastDateOfMonth == 30) {
        if (($currentDate + 7) > 30)
            $currentWeekIndexOfNextDay = 0;
    } else if ($lastDateOfMonth == 28) {
        if (($currentDate + 7) > 28)
            $currentWeekIndexOfNextDay = 0;
    }
    if ($currentDate == 1) {
        if ($currentDay == 6)
            $currentWeekIndexOfNextDay = 1;
        else
            $currentWeekIndexOfNextDay = 0;
    }


//echo $currentWeekIndexOfNextDay;
//echo $nextDayIndex;

    $query = $ci->db->query("SELECT Day,WeekOff FROM ShiftMasterChild WHERE ShiftId=$shift_id and Day=$nextDayIndex");
    if ($row = $query->row()) {

        $nextDayWeekOffArray = explode(",", $row->WeekOff);

        $nextDayHolidaystatus = $nextDayWeekOffArray[$currentWeekIndexOfNextDay];

        if ($nextDayHolidaystatus == 0) {
            return true;
        } else
            return false;
    } else {

        return false;
    }
}

function nextWorkingDayAfterToday($shift_id, $date = null) {


    if (is_null($date))
        $date = date("d-m-Y");

    for ($i = 0; $i < 7; $i++) {

        //echo "$i    $date    ".isNextDayAWorkingDay($shift_id,$date);


        if (isNextDayAWorkingDay($shift_id, $date))
            return date("d-m-Y", strtotime($date . " +1 day"));

        $date = date("d-m-Y", strtotime($date . " +1 day"));
    }
}

/* * **************************Ash Tech************************************************** */

function getEmpDataFromTicketNo($TicketNo, $OrganizationId) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT Id,Shift,Department,Designation,area_assigned,hourly_rate,OwnerId FROM EmployeeMaster WHERE ticket_no='$TicketNo' and OrganizationId='$OrganizationId'");
    if ($row = $query->row()) {
        return $row;
    } else {

        return false;
    }
}

function getCurrentOrgStatus($orgid) {

    $todaydate = date("Y-m-d");

    $ci = & get_instance();
    $ci->load->database();
    $customize_org = 0;
    $status = 0;
    $end_date = '0000-00-00';
    $delete_sts = 0;
    $extended = 0;


    $query = $ci->db->query("select Organization.customize_org as customize_org,licence_ubiattendance.status as status,licence_ubiattendance.end_date as end_date,Organization.delete_sts as delete_sts,licence_ubiattendance.extended as extended from Organization inner join licence_ubiattendance where Organization.Id=$orgid and Organization.Id=licence_ubiattendance.OrganizationId");
    if ($row = $query->row()) {
        $customize_org = $row->customize_org;
        $status = $row->status;
        $end_date = $row->end_date;
        $delete_sts = $row->delete_sts;
        $extended = $row->extended;
    }



    if ($status == 0 && $extended == 1 && $todaydate <= $end_date && $customize_org == 0 && $delete_sts == 0) {
        return "TrialOrg";
    }
    /* paid user */ else if ($status == 1 && $todaydate <= $end_date && $delete_sts == 0 && $customize_org == 0) {
        return 'PremiumStandardOrg';
    }
    /*     * ****** customized */ else if ($customize_org == 1 && $delete_sts == 0) {
        return 'PremiumCustomizedOrg';
    }
    /* Expired user tril */ else if ($status == 0 && $todaydate > $end_date && $delete_sts == 0 && $customize_org == 0) {
        return 'ExpiredTrialOrg';
    }
    /* Extended trial user */ else if ($status == 0 && $extended > 1 && $end_date >= $todaydate && $delete_sts == 0 && $customize_org == 0) {
        return 'ExtendedTrialOrg';
    }
    /* not renew user */

    /* Expired Subscription */ else if ($status == 0 && $todaydate > $end_date && $delete_sts == 0 && $customize_org == 0) {
        return 'PremiumExpiredOrg';
    }
}

function sendManualPushNotification($condition, $title, $body) {
    //echo "updateReferralDiscountStatus";

    /*
      $condition=isset($_REQUEST['condition'])?$_REQUEST['condition']:'';
      $title=isset($_REQUEST['title'])?$_REQUEST['title']:'';
      $body=isset($_REQUEST['body'])?$_REQUEST['body']:'';
     */

    //	echo $condition; die;
    $handle = curl_init();

    $url = "https://fcm.googleapis.com/fcm/send";

    //$json=array('condition'=>$condition,'priority'=>'high','notification'=>array('body'=>$body,'title'=>$title));
    $json = array('condition' => $condition, 'priority' => 'high', 'notification' => array('body' => $body, 'title' => $title, 'click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'sound' => 'default'));
    $json = json_encode($json);
    //echo $json;die;




    $header = array('Authorization: key=AAAAsVdW418:APA91bH-KAyzItecPhs8jP95ZlFNOzDKjmzmeMd2iH1HyUpO_T-_Baed-uIkuyYlosgLStcJZBqQFZuu7UdepvKX6lJcHjU__7FV19LLGn0nbveDBcTBJRJulb5fj_iOlsVRURzsu1Ch',
        'Content-Type: application/json'
    );


    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_POSTFIELDS => $json,
            )
    );
    $output = curl_exec($handle);
    curl_close($handle);
    //echo $output.$condition;
    //die;
}

function getCountryNameById($id) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Name FROM CountryMaster where Id='$id'");
    //return json_encode($query->result());
    $res = array();
    foreach ($query->result() as $row) {
        return $row->Name;
    }
    return 0;
}

function gettimezonebyid($zoneid) {
    $ci = & get_instance();
    $ci->load->database();
    $zone = 'Asia/Kolkata';
    $query = "SELECT Name FROM `ZoneMaster` WHERE `Id` = $zoneid";
    $result1 = $query = $ci->db->query($query);
    if ($row = $result1->row())
        return $zone = $row->Name;
    return $zone;
}

function getAllRate1($orgid, $hourlyrateid) {
// $orgid=$_SESSION['orgid'];

    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT Rate FROM `HourlyRateMaster` where OrganizationId = $orgid and Id=$hourlyrateid and status=1");
    if ($row = $query->row()) {
        return $row->Rate;
    } else {
        return "";
    }
}

function getaid($shiftId, $Addon_AutoTimeOut, $uid) {

    $ci = & get_instance();
    $ci->load->database();

    $date = date('Y-m-d');
    $time = date('H:i:s');
    $aid = "";

    $sql1 = "SELECT TIMEDIFF(  `TimeIn` ,  `TimeOut` ) AS stypeD,shifttype AS stype,TimeIn as startShiftTime FROM ShiftMaster where id=" . $shiftId;
    $stype = 1;
    $stypeD = 0;
    $startShiftTime = '00:00:00';
    try {
        $result1 = $ci->db->query($sql1);
        if ($row1 = $result1->result()) {
            $stypeD = $row1[0]->stypeD;
            $stype = $row1[0]->stype;
            $startShiftTime = $row1[0]->startShiftTime;
        }
    } catch (Exception $e) {
        
    }

    if ($stype <= 1) { //// if shift is end whthin same date
        if ($Addon_AutoTimeOut == 0) { // This orgainzation have a auto timeout
            $sql1 = "SELECT Id as aid,TimeOut FROM `AttendanceMaster` WHERE employeeid=$uid and `AttendanceDate`='$date'";
            try {
                $result1 = $ci->db->query($sql1);
                if ($row1 = $result1->row()) {
                    $act = 'TimeOut';
                    $timeoutdate = 'curdate';
                    $aid = $row1->aid;
                    if ($row1->TimeOut != '00:00:00')
                        $act = 'Imposed';
                } else
                    $act = 'TimeIn';


                // check last date timeout marked or not ,   if not marked then autotimeout
                $lastday = date('Y-m-d', strtotime('-1 days'));
                $query = $ci->db->query("UPDATE AttendanceMaster set TimeOut=TimeIn ,device= 'Auto Time Out' ,timeoutdate = '$lastday' where TimeIn!='00:00:00' and TimeOut='00:00:00' and AttendanceDate='$lastday' and AttendanceDate!=CURDATE()   and employeeid=$uid ");

                //	$query3 = $this->db->prepare($sql3);
                ////	$query3->execute(array('Auto Time Out'));
            } catch (Exception $e) {
                
            }
        } else {   //  this organization not have a auto timeout
            $nextday = date('Y-m-d', strtotime('+1 days'));
            $sql1 = "SELECT Id as aid,AttendanceDate,TimeOut FROM `AttendanceMaster` WHERE employeeid=$uid and  Id = (select MAX(Id) from AttendanceMaster WHERE EmployeeId=$uid)  AND AttendanceStatus in (1,4,8) AND TimeOut =  '00:00:00'   ";
            $result1 = $ci->db->query($sql1);
            if ($ci->db->affected_rows() > 0) {
                try {
                    if ($row1 = $result1->row()) {
                        $act = 'TimeOut';
                        if ($row1->AttendanceDate < $date)
                            $timeoutdate = 'nextdate';
                        $aid = $row1->aid;
                        if ($row1->TimeOut != '00:00:00')
                            $act = 'Imposed';
                    } else
                        $act = 'TimeIn';
                } catch (Exception $e) {
                    
                }
            } else {
                $sql1 = "SELECT Id as aid,TimeOut FROM `AttendanceMaster` WHERE employeeid=$uid and `AttendanceDate`='$date'";
                try {
                    $result1 = $ci->db->query($sql1);
                    if ($row1 = $result1->row()) {
                        $act = 'TimeOut';
                        $timeoutdate = 'curdate';
                        $aid = $row1->aid;
                        if ($row1->TimeOut != '00:00:00')
                            $act = 'Imposed';
                    } else
                        $act = 'TimeIn';
                } catch (Exception $e) {
                    
                }
            }
        }
    } else {  /////// if shift is start and end in two diff dates
        //$sql1="SELECT id as aid,TimeOut,AttendanceDate FROM `AttendanceMaster` WHERE employeeid=$uid and TimeIn !='00:00:00' and TimeOut='00:00:00' and `AttendanceDate`=DATE_SUB('$date', INTERVAL 1 DAY)";
        $sql1 = "SELECT Id as aid,TimeOut,AttendanceDate FROM `AttendanceMaster` WHERE employeeid=$uid and TimeIn !='00:00:00' and TimeOut='00:00:00' and  (`AttendanceDate`>=DATE_SUB('$date', INTERVAL 1 DAY) or `AttendanceDate`='$date') and Id = (select MAX(Id) from AttendanceMaster WHERE EmployeeId=$uid) order by Id desc limit 1";
        try {
            $result1 = $ci->db->query($sql1);
            if ($row1 = $result1->row()) {
                if ($row1->AttendanceDate != $date) { // yes att
                    if ($time >= $startShiftTime) {
                        $act = 'TimeIn';
                        $aid = 0;
                    } else {
                        $act = 'TimeOut';
                        $aid = $row1->aid;
                    }
                } else { // today att
                    $act = 'TimeOut';
                    $aid = $row1->aid;
                }
                if ($row1->TimeOut != '00:00:00')
                    $act = 'Imposed';
            } else {
                $sql1 = "SELECT id as aid,TimeOut FROM `AttendanceMaster` WHERE employeeid=$uid and `AttendanceDate`='$date'";
                try {
                    $result1 = $ci->db->query($sql1);
                    if ($row1 = $result1->row()) {
                        $act = 'TimeOut';
                        $aid = $row1->aid;
                        if ($row1->TimeOut != '00:00:00')
                            $act = 'Imposed';
                    } else
                        $act = 'TimeIn';
                } catch (Exception $e) {
                    
                }
            }
        } catch (Exception $e) {
            
        }
    }
    return $aid;
}

function getaction($shiftId, $Addon_AutoTimeOut, $uid, $orgid) {

    $ci = & get_instance();
    $ci->load->database();
    $zone = getEmpTimeZone($uid, $orgid); // to set the timezone by employee country.
    date_default_timezone_set($zone);

    $date = date('Y-m-d');
    $time = date('H:i:s');


    $sql1 = "SELECT TIMEDIFF(  `TimeIn` ,  `TimeOut` ) AS stypeD,shifttype AS stype,TimeIn as startShiftTime FROM ShiftMaster where id=" . $shiftId;
    $stype = 1;
    $stypeD = 0;
    $startShiftTime = '00:00:00';
    try {
        $result1 = $ci->db->query($sql1);
        if ($row1 = $result1->result()) {
            $stypeD = $row1[0]->stypeD;
            $stype = $row1[0]->stype;
            $startShiftTime = $row1[0]->startShiftTime;
        }
    } catch (Exception $e) {
        
    }

    if ($stype <= 1) { //// if shift is end whthin same date
        if ($Addon_AutoTimeOut == 0) { // This orgainzation have a auto timeout
            $sql1 = "SELECT Id as aid,TimeOut,TIMEDIFF(  '$time' ,  `TimeIn` ) AS t FROM `AttendanceMaster` WHERE employeeid=$uid and `AttendanceDate`='$date'";
            try {
                $result1 = $ci->db->query($sql1);
                if ($row1 = $result1->row()) {
                    $act = 'TimeOut';
                    $timeoutdate = 'curdate';
                    $aid = $row1->aid;
                    $t = $row1->t;
                    if ($row1->TimeOut != '00:00:00')
                        $act = 'Imposed';
                    if ($t < '00:15:00')
                        $act = 'RecentlyMarked';
                } else
                    $act = 'TimeIn';


                // check last date timeout marked or not ,   if not marked then autotimeout
                $lastday = date('Y-m-d', strtotime('-1 days'));
                $query = $ci->db->query("UPDATE AttendanceMaster set TimeOut=TimeIn ,device= 'Auto Time Out' ,timeoutdate = '$lastday' where TimeIn!='00:00:00' and TimeOut='00:00:00' and AttendanceDate='$lastday' and AttendanceDate!=CURDATE()   and employeeid=$uid ");

                //	$query3 = $this->db->prepare($sql3);
                ////	$query3->execute(array('Auto Time Out'));
            } catch (Exception $e) {
                
            }
        } else {   //  this organization not have a auto timeout
            $nextday = date('Y-m-d', strtotime('+1 days'));
            $sql1 = "SELECT Id as aid,AttendanceDate,TimeOut,TIMEDIFF(  '$time' ,  `TimeIn` ) AS t FROM `AttendanceMaster` WHERE employeeid=$uid and  Id = (select MAX(Id) from AttendanceMaster WHERE EmployeeId=$uid)  AND AttendanceStatus in (1,4,8) AND TimeOut =  '00:00:00'   ";
            $result1 = $ci->db->query($sql1);
            if ($ci->db->affected_rows() > 0) {
                try {
                    if ($row1 = $result1->row()) {
                        $act = 'TimeOut';
                        if ($row1->AttendanceDate < $date)
                            $timeoutdate = 'nextdate';
                        $aid = $row1->aid;
                        $t = $row1->t;
                        // print_r($t);
                        // die();
                        if ($row1->TimeOut != '00:00:00')
                            $act = 'Imposed';
                        if ($t < '00:15:00')
                            $act = 'RecentlyMarked';
                    } else
                        $act = 'TimeIn';
                } catch (Exception $e) {
                    
                }
            } else {
                $sql1 = "SELECT Id as aid,TimeOut,TIMEDIFF(  '$time' ,  `TimeIn` ) AS t FROM `AttendanceMaster` WHERE employeeid=$uid and `AttendanceDate`='$date'";
                try {
                    $result1 = $ci->db->query($sql1);
                    if ($row1 = $result1->row()) {
                        $act = 'TimeOut';
                        $timeoutdate = 'curdate';
                        $aid = $row1->aid;
                        $t = $row1->t;
                        if ($row1->TimeOut != '00:00:00')
                            $act = 'Imposed';
                        if ($t < '00:15:00')
                            $act = 'RecentlyMarked';
                    } else
                        $act = 'TimeIn';
                } catch (Exception $e) {
                    
                }
            }
        }
    } else {  /////// if shift is start and end in two diff dates
        //$sql1="SELECT id as aid,TimeOut,AttendanceDate FROM `AttendanceMaster` WHERE employeeid=$uid and TimeIn !='00:00:00' and TimeOut='00:00:00' and `AttendanceDate`=DATE_SUB('$date', INTERVAL 1 DAY)";
        $sql1 = "SELECT Id as aid,TimeOut,TIMEDIFF(  '$time' ,  `TimeIn` ) AS t,AttendanceDate FROM `AttendanceMaster` WHERE employeeid=$uid and TimeIn !='00:00:00' and TimeOut='00:00:00' and  (`AttendanceDate`>=DATE_SUB('$date', INTERVAL 1 DAY) or `AttendanceDate`='$date') and Id = (select MAX(Id) from AttendanceMaster WHERE EmployeeId=$uid) order by Id desc limit 1";
        try {
            $result1 = $ci->db->query($sql1);
            if ($row1 = $result1->row()) {
                if ($row1->AttendanceDate != $date) { // yes att
                    if ($time >= $startShiftTime) {
                        $act = 'TimeIn';
                        $aid = 0;
                    } else {
                        $act = 'TimeOut';
                        $aid = $row1->aid;
                    }
                } else { // today att
                    $act = 'TimeOut';
                    $aid = $row1->aid;
                }
                if ($row1->TimeOut != '00:00:00')
                    $act = 'Imposed';
                if ($t < '00:15:00')
                    $act = 'RecentlyMarked';
            } else {
                $sql1 = "SELECT id as aid,TimeOut,TIMEDIFF(  '$time' ,  `TimeIn` ) AS t FROM `AttendanceMaster` WHERE employeeid=$uid and `AttendanceDate`='$date'";
                try {
                    $result1 = $ci->db->query($sql1);
                    if ($row1 = $result1->row()) {
                        $act = 'TimeOut';
                        $aid = $row1->aid;
                        if ($row1->TimeOut != '00:00:00')
                            $act = 'Imposed';
                        if ($t < '00:15:00')
                            $act = 'RecentlyMarked';
                    } else
                        $act = 'TimeIn';
                } catch (Exception $e) {
                    
                }
            }
        } catch (Exception $e) {
            
        }
    }
    return $act;
}

function getfaceid($image) {

    $handle = curl_init();
    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/detect?returnFaceId=true&returnFaceLandmarks=false&recognitionModel=recognition_02&returnRecognitionModel=false&detectionModel=detection_01";
    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe"
    );
    $postData = array(
        "url" => "$image"
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);
    //print_r($output);
    //$data = json_decode($output);
    //$obj= json_decode($output);
    $obj = json_decode($output);
    //echo $obj[0]->faceId;
    //print_r($obj[0]->faceId);
    if ($obj) {
        return $obj[0]->faceId;
    } else
        return 0;
    //print_r($obj);
    //exit;
}

function create_persongroup($persongroup_name, $persongroup_id) {

    $handle = curl_init();

    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/persongroups/$persongroup_id";

    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe",
    );
    $postData = array(
        "name" => $persongroup_name,
        // "userData" => "user-provided data attached to the person group",
        "recognitionModel" => "recognition_02"
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                CURLOPT_POST => true,
                CURLOPT_CUSTOMREQUEST => "PUT",
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);
    //$data = json_decode($output);
    //$obj= json_decode($output);
    //echo $output;exit;
    //print_r($obj);
}

function create_person($persongroup_id, $name) {

    $handle = curl_init();
    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/persongroups/$persongroup_id/persons";
    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe"
    );
    $postData = array(
        "name" => $name
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);

//$data = json_decode($output);
    $obj = json_decode($output);
//echo $output;exit;
//print_r($obj);

    return $obj->personId;
}

function add_face($persongroup_id, $personid, $image) {

    $handle = curl_init();
    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/persongroups/$persongroup_id/persons/$personid/persistedFaces?detectionModel=detection_01";
    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe"
    );
//$image='https://ubiattendanceimages.s3.ap-south-1.amazonaws.com/attendance_images/71036_23042020_133525.jpg';
    $postData = array(
        "url" => $image
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);

//$data = json_decode($output);
    $obj = json_decode($output);
//print_r($obj);
//die();

    if (property_exists($obj, 'error')) {
        return 0;
    } else {
        return $obj->persistedFaceId;
    }
}

function face_verify($faceid, $personid, $persongroup_id) {


    $handle = curl_init();
    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/verify";
    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe"
    );
    $postData = array(
        "faceId" => $faceid,
        "personId" => $personid,
        "personGroupId" => $persongroup_id
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);

//$data = json_decode($output);
    $obj = json_decode($output);
//echo $output;exit;
//print_r($obj);
//exit();
    return $obj->confidence;
}

function face_delete($persistedfaceid, $personid, $persongroup_id) {


    $handle = curl_init();
    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/persongroups/$persongroup_id/persons/$personid/persistedFaces/$persistedfaceid";
    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe"
    );
    $postData = array(
        "persistedFaceId" => $persistedfaceid,
        "personId" => $personid,
        "personGroupId" => $persongroup_id
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);

//$data = json_decode($output);
    $obj = json_decode($output);


//echo $output;exit;
//print_r($obj);
//exit();
}

function face_identify($faceid, $persongroup_id) {


    $handle = curl_init();
    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/identify";
    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe"
    );
    $postData = array(
        "faceIds" => [$faceid],
        "personGroupId" => $persongroup_id,
        "maxNumOfCandidatesReturned" => 1,
        "confidenceThreshold" => 0.7
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);

//$data = json_decode($output);
//print_r($obj);
//exit();
    $obj = json_decode($output);
//print_r($obj);die;
    if ((gettype($obj) == 'object')) {
        return 0;
    } else if (count($obj[0]->candidates) > 0) {



//echo $output;exit;
        //return $obj[0]->candidates[0]->personId; 
        return $obj;
    } else
        return 0;
}

function persongrouptrain($persongroup_id) {

    $handle = curl_init();

    $url = "https://ubiattendancefacerecognization.cognitiveservices.azure.com/face/v1.0/persongroups/$persongroup_id/train";

    $header = array(
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: df776104179a4f84a6922ae904cc53fe",
    );
    $postData = array(
    );
    curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                CURLOPT_POST => true,
                //CURLOPT_CUSTOMREQUEST => "PUT",
                //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => $header
            )
    );
    $output = curl_exec($handle);

    curl_close($handle);
    //$data = json_decode($output);
    //$obj= json_decode($output);
    //echo $output;exit;
    //print_r($obj);
}

function getNotificationPermission($orgid, $notification) { // For Push Notifications by Nitin
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT $notification as notification FROM NotificationStatus WHERE OrganizationId = $orgid ");
    $res = array();
    if ($row = $query->row()) {
        return $row->notification;
    } else {
        return 0;
    }
}

function getEmpIDbyAttendanceId($attendanceId, $orgid) { // For Push Notifications by Nitin
    $ci = & get_instance();
    $ci->load->database();

    Trace("SELECT EmployeeId FROM `AttendanceMaster` WHERE  Id='$attendanceId' and OrganizationId=$orgid");
    $query = $ci->db->query("SELECT EmployeeId FROM `AttendanceMaster` WHERE  Id='$attendanceId' and OrganizationId=$orgid"); //
    if ($row = $query->result())
        return $row[0]->EmployeeId;

    return 0;
}

function getNotificationMessage($notification) {

    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT $notification as notification FROM NotificationMessage WHERE id = 1 ");
    $res = array();
    if ($row = $query->row()) {
        return $row->notification;
    } else {
        return 0;
    }
}

/* * ********************* For Leave ************************* */

function getFiscalStartDate($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT fiscal_start FROM `Organization` where Id='$orgid'");
    $res = array();
    foreach ($query->result() as $row) {
        $newDate = date("m/d", strtotime($row->fiscal_start));
        return $newDate;
    }
}

function getFiscalEndDate($orgid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT fiscal_end FROM `Organization` where Id='$orgid'");
    $res = array();
    foreach ($query->result() as $row) {
        $newDate = date("m/d", strtotime($row->fiscal_end));
        return $newDate;
    }
}

function getBalanceLeave($orgid, $empid, $date = '') {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT E.FirstName,E.entitledleave,E.DOJ,O.fiscal_start,O.fiscal_end,O.entitled_leave FROM `EmployeeMaster` E, Organization O where E.OrganizationId=O.Id And E.Id='$empid' And E.OrganizationId='$orgid'");
    $res = array();
    $balanceleave = 0;
    $entitledleave = 0;
    foreach ($query->result() as $row) {

        if ($row->entitledleave == '') { // Do not compare 0 over here if some one wants to entitle a person 0 organization leaves will be considered which is wrong
            $entitledleave = $row->entitled_leave;
        } else {
            $entitledleave = $row->entitledleave;
        }


        ////fiscal start/////
        $dateofjoin = date("m/d/Y", strtotime($row->DOJ));
        $fiscalstart = date("m/d", strtotime($row->fiscal_start));
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
        $dateofjoin = date("m/d/Y", strtotime($row->DOJ));
        $fiscalend = date("m/d", strtotime($row->fiscal_end));
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

        if ($date == '') {
            $currentDate = date('Y-m-d');
        } else {
            $currentDate = $date;
        }
        $currentDate = date('Y-m-d', strtotime($currentDate));
        $startDate = date('Y-m-d', strtotime($fiscalstartdate));
        $endDate = date('Y-m-d', strtotime($fiscalenddate));

        if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
            //echo "Current date is between two dates";
            //Calculating the difference in timestamps 
            $diff = strtotime($fiscalenddate) - strtotime($dateofjoin);

            //1 day = 24 hours 
            //24 * 60 * 60 = 86400 seconds 
            $Difference_In_Days = abs(round($diff / 86400));
            //echo $Difference_In_Days;
            $bal1 = (intval($entitledleave) / 12);
            $bal2 = ($Difference_In_Days / 30.4167);

            $balanceleave = $bal1 * $bal2;
            return strstr($balanceleave, '.', true);
        } else {
            //echo "Current date is not between two dates"; 
            $balanceleave = $entitledleave;
            return $balanceleave;
        }
    }
}

function getOrgFiscal($orgid, $leavedate) {


    $ci = & get_instance();
    $ci->load->database();
    $sql = $ci->db->query("SELECT fiscal_start, fiscal_end FROM Organization WHERE Id='$orgid'");
    $f_start = '';
    $f_end = '';
    if ($row = $sql->row()) {
        $f_start = date("m/d", strtotime($row->fiscal_start));
        $f_end = date("m/d", strtotime($row->fiscal_end));

        if ($leavedate == '') {
            $leavedate = date('Y-m-d');
        } else {
            $leavedate = $leavedate;
        }
        ////fiscal start/////
        $dateofjoin = date("m/d/Y", strtotime($leavedate));
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
        $dateofjoin = date("m/d/Y", strtotime($leavedate));
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


        return $startdate . " And " . $enddate;
    }
}

function getBalanceLeaveold($orgid, $empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT E.FirstName,E.entitledleave,E.DOJ,O.fiscal_end,O.entitled_leave FROM `EmployeeMaster` E, Organization O where E.OrganizationId=O.Id And E.Id='$empid' And E.OrganizationId='$orgid'");
    $res = array();
    foreach ($query->result() as $row) {
        if ($row->entitledleave == '' || $row->entitledleave == '0') {
            $entitledleave = $row->entitled_leave;
        } else {
            $entitledleave = $row->entitledleave;
        }

        $dateofjoin = date("m/d/Y", strtotime($row->DOJ));
        $fiscalend = date("m/d", strtotime($row->fiscal_end));
        $fiscalendmon = substr($fiscalend, 0, 2);
        $dateofjoinmon = substr($dateofjoin, 0, 2);
        $fiscalenddate = substr($fiscalend, 3, 2);
        $joindate = substr($dateofjoin, 3, 2);

        // echo $dateofjoinmon;
        // echo $fiscalendmon;
        // echo $fiscalenddate;
        // echo $joindate;

        $cur_date = $dateofjoin;
        if ($dateofjoinmon > $fiscalendmon) {
            $doj = date("Y", strtotime($dateofjoin)) + 1;
            $fiscalenddata = $fiscalend . "/" . $doj;
        } elseif ($dateofjoinmon == $fiscalendmon && $joindate > $fiscalenddate) {
            //echo "hello";
            //die();
            $doj = date("Y", strtotime($dateofjoin)) + 1;
            $fiscalenddata = $fiscalend . "/" . $doj;
        } elseif ($dateofjoinmon == $fiscalendmon && $joindate == $fiscalenddate) {
            $doj = date("Y", strtotime($dateofjoin));
            $fiscalenddata = $fiscalend . "/" . $doj;
        } else {
            $doj = date("Y", strtotime($dateofjoin));
            $fiscalenddata = $fiscalend . "/" . $doj;
        }
        // Calculating the difference in timestamps 
        $diff = strtotime($fiscalenddata) - strtotime($cur_date);

        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        $Difference_In_Days = abs(round($diff / 86400));
        //echo $Difference_In_Days;
        $bal1 = (intval($entitledleave) / 12);
        $bal2 = ($Difference_In_Days / 30.4167);

        $balanceleave = $bal1 * $bal2;
        return strstr($balanceleave, '.', true);
    }
}

/* * ************************ Leave Ends ******************************** */

function getassignedShiftTimes($empid, $shiftDate) {
    $ci = & get_instance();
    $ci->load->database();

    $query = $ci->db->query("SELECT shiftid from ShiftPlanner where empid = $empid and `ShiftDate`= '$shiftDate' ");
    if ($row = $query->result()) {
        return $row[0]->shiftid;
    } else {
        $query = $ci->db->query("SELECT Id FROM `ShiftMaster` where id=(SELECT Shift FROM `EmployeeMaster` where id=?)", array($empid));
        foreach ($query->result() as $row) {
            return $row->Id;
        }
    }
}

function checkRemoteFile($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (curl_exec($ch) !== FALSE) {
        return true;
    } else {
        return false;
    }
}

function sendMailtoPanelAdmin($subject, $orgid, $message) {


    $headers = '';
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("Select email from admin_login where OrganizationId=$orgid");
    foreach ($query->result() as $row) {
        $email = $row->email;

        $this->sendEmail_new($email, $subject, $message, $headers);
    }
}

function getLeaveCount($orgid, $empid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT COUNT(LeaveId)as lcount FROM AppliedLeave WHERE EmployeeId=$empid AND (ApprovalStatus=2 OR ApprovalStatus=1) AND OrganizationId=$orgid");
    $res = array();
    foreach ($query->result() as $row) {
        return ($row->lcount);
    }
}

function getLeaveCountApp($orgid, $empid, $leavedate) {
    $ci = & get_instance();
    $ci->load->database();

    // $orgid = isset($_REQUEST['refno']) ? $_REQUEST['refno'] : 0;
    //   $leavedate = isset($_REQUEST['leavedate']) ? $_REQUEST['leavedate'] : 0;
    //   $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : 71036;
    $fiscaldate = getOrgFiscal($orgid, $leavedate);
    $fiscal = explode(" ", $fiscaldate);
    $fiscalstart = $fiscal[0];
    $fiscalend = $fiscal[2];
    // echo $fiscaldate;
    //exit();
    $query = $ci->db->query("SELECT COUNT(Id)as noofleave FROM `AppliedLeave` WHERE EmployeeId=$empid and (ApprovalStatus=1 OR ApprovalStatus=2)  And Date BETWEEN '$fiscalstart' and '$fiscalend'");
    // var_dump($this->db->last_query());
    // exit();
    if ($row = $query->row()) {
        //$data=array();
        return $row->noofleave;
    } else
        return 0;
}

function getBalanceLeaveCount($orgid, $empid) {
    $ci = & get_instance();
    $ci->load->database();
    return (getBalanceLeave($orgid, $empid) - getLeaveCount($orgid, $empid));
}

function getweeklyoff($date, $ShiftId, $emplid, $orgid) {

    $ci = & get_instance();
    $ci->load->database();
// echo $date;
// echo $shiftid;
// echo $emplid;
// echo $orgid;
// exit();

    $dt = $date;

    $dayOfWeek = 1 + date('w', strtotime($dt));
    $weekOfMonth = weekOfMonth($dt);
    $week = '';
    /*
      $query = $ci->db->query("Select ShiftId from AttendanceMaster where AttendanceDate < '$date' AND EmployeeId = '$emplid' ORDER BY AttendanceDate DESC LIMIT 1");

      if($row=$query->result())
      {
      $shiftid = $row[0]->ShiftId;
      }
      else
      {
      return "N/A";

      }
     */

    $query = $ci->db->query("SELECT `WeekOff` FROM  `ShiftMasterChild` WHERE  `OrganizationId` =? AND  `Day` =  ? AND ShiftId=? ", array($orgid, $dayOfWeek, $ShiftId));
    //var_dump($ci->db->last_query());
    $flage = false;
    if ($row = $query->result()) {
        $week = explode(",", $row[0]->WeekOff);
        $flage = true;
    }
    if ($flage && $week[$weekOfMonth - 1] == 1) {
        return "WO";
    } else {
        // echo $dt;
        // echo "<br/>";
        $query = $ci->db->query("SELECT `DateFrom`, `DateTo` FROM `HolidayMaster` WHERE OrganizationId=? and (? between `DateFrom` and `DateTo`) ", array($orgid, $dt));
        if ($query->num_rows() > 0) {
            return "H";
        } else {
            return "N/A";
        }
    }
}

function getCreatedDatebyshiftid($shiftid) {
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT CreatedDate FROM `ShiftMaster` where Id='$shiftid'");
    $res = array();
    foreach ($query->result() as $row) {
        return $row->CreatedDate;
    }
}

function getweeklyoffnew($date, $shiftid, $emplid, $orgid) {

    $ci = & get_instance();
    $ci->load->database();
    $dt = $date;

    $dayOfWeek = 1 + date('w', strtotime($dt));
    $weekOfMonth = weekOfMonth($dt);
    $week = '';
    $query = $ci->db->query("SELECT `WeekOff` FROM  `ShiftMasterChild` WHERE  `OrganizationId` =? AND  `Day` =  ? AND ShiftId=? ", array($orgid, $dayOfWeek, $shiftid));
    //var_dump($ci->db->last_query());
    $flage = false;
    if ($row = $query->result()) {
        $week = explode(",", $row[0]->WeekOff);
        $flage = true;
    }
    if ($flage && $week[$weekOfMonth - 1] == 1) {
        return "Week Off";
    }
	
	
}


	function getcomings($shiftId,$TimeIn){ // Late or early
		$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT TIMEDIFF('$TimeIn',`TimeIn`) as timecoming FROM `ShiftMaster` where id=$shiftId");
		$res=array();
		if ($row= $query->result())
		return $row[0]->timecoming;
		return 0;
	}
	
	
	function getgoings($shiftId,$TimeOut){ // Late or early Leaving
		$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT TIMEDIFF('$TimeOut',`TimeOut`) as timeGoming FROM `ShiftMaster` where id=$shiftId");
		$res=array();
		if ($row= $query->result())
		return $row[0]->timeGoming;
		return 0;
	}
	
		function getShiftHoursforubishift($id){
		$type = getShiftType($id);
		if($type==1)
		{
		$ci = & get_instance();
		   $ci->load->database();
		    $query = $ci->db->query("SELECT TIMEDIFF(TimeOut,TimeIn) as time from ShiftMaster where Id = $id ");
		if($row = $query->row())
		return $row->time;

		}
		else{
		$ci = & get_instance();
		   $ci->load->database();
		    $query = $ci->db->query("SELECT TIMEDIFF( CONCAT(  '2019-03-11',  '  ', Timeout ) , CONCAT(  '2019-03-10',  '  ', Timein)) as time  FROM ShiftMaster WHERE Id = $id ");
		if($row = $query->row())
		return $row->time;
		}
	}
	
	

?>

<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
       // include(APPPATH . "PhpMailer/class.phpmailer.php");
        //include(APPPATH . "s3.php");
    }

    public function emportDep() {
        //$result1 = array();
        $errormsg = "";
        $count = "";
        $success = "";
        $user_id = $_SESSION['id'];
        $orgid = $_SESSION['orgid'];
        $check = true;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $date = date('Y-m-d');
        $file_name = "newdepartment.csv";
        $location = IMGURL . "employee/$orgid/";
        $fp = $location . $file_name;
        $remark = "data insufficient";
        $sts = 0;
        $i = 0;
        $count = 0;
        $totalcount = 0;
        if (($file = fopen($fp, 'r')) !== FALSE) {//select file //
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {//get the data of file//
                $check = true;
                if ($i > 0) {
                    $totalcount = $totalcount + 1;
                    if ($data[0] == "" || $data[0] == " " || $data[0] == "'" || $data[0] == "''" || $data[0] == '""' || $data[0] == "'" || $data[0] == '"') {
                        $data[0] = " " . $data[0];
                        $sql1 = $this->db->query("INSERT INTO Temp_user_csv(Department,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)", array($data[0], $orgid, $date, $sts, $user_id, $remark));

                        $result = $this->db->affected_rows();

                        if ($result > 0) {
                            $check = false;
                        }
                    }

                    if ($data[0] != '') {
                        $query = $this->db->query("select Id FROM DepartmentMaster WHERE Name =? AND OrganizationId = ? ", array($data[0], $orgid));
                        if ($query->num_rows() > 0) {
                            $check = false;
                            $remark1 = "Department already exist.";
                            $sql2 = $this->db->query("INSERT INTO Temp_user_csv(Department,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)", array($data[0], $orgid, $date, $sts, $user_id, $remark1));
                        }
                    }


                    if ($check) {
                        $query = $this->db->query("INSERT INTO DepartmentMaster(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`,`archive`) VALUES (?,?,?,?,?,?,?)", array($data[0], $orgid, $date, $user_id, $date, $user_id, 1));
                        $count++;
                    }
                }
                $i++;
            }
        }

        $result1 = array("repeatemp" => $totalcount, "importemp" => $count, "sts" => "true");
        $check = true;
        return $result1;
    }
    
    
    public function emportDeg() {
        //$result1 = array();
        $errormsg = "";
        $count = "";
        $success = "";
        $user_id = $_SESSION['id'];
        $orgid = $_SESSION['orgid'];
        $check = true;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $date = date('Y-m-d');
        $file_name = "newdesignation.csv";
        $location = IMGURL . "employee/$orgid/";
        $fp = $location . $file_name;
        $remark = "data insufficient";
        $sts = 0;
        $i = 0;
        $count = 0;
        $totalcount = 0;
        if (($file = fopen($fp, 'r')) !== FALSE) {//select file //
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {//get the data of file//
                $check = true;
                if ($i > 0) {
                    $totalcount = $totalcount + 1;
                    if ($data[0] == "" || $data[0] == " " || $data[0] == "'" || $data[0] == "''" || $data[0] == '""' || $data[0] == "'" || $data[0] == '"') {
                        $data[0] = " " . $data[0];
                        $sql2 = $this->db->query("INSERT INTO Temp_user_csv(Designation,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)", array($data[0], $orgid, $date, $sts, $user_id, $remark));

                        $result = $this->db->affected_rows();

                        if ($result > 0) {
                            $check = false;
                        }
                    }

                    if ($data[0] != '') {
                        $query = $this->db->query("select Id FROM DesignationMaster WHERE Name =? AND OrganizationId = ? ", array(trim($data[0]), $orgid));
                        if ($query->num_rows() > 0) {
                            $check = false;
                            $remark1 = "Designation already exist.";
                            $sql2 = $this->db->query("INSERT INTO Temp_user_csv(Designation,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)", array($data[0], $orgid, $date, $sts, $user_id, $remark1));
                        }
                    }


                    if ($check) {
                        $query = $this->db->query("INSERT INTO DesignationMaster(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`,`archive`) VALUES (?,?,?,?,?,?,?)", array($data[0], $orgid, $date, $user_id, $date, $user_id, 1));
                        $count++;
                    }
                }
                $i++;
            }
        }

        $result1 = array("repeatemp" => $totalcount, "importemp" => $count, "sts" => "true");
        $check = true;
        return $result1;
        //print_r($result1);
    }

}

?>
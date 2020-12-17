<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Manage_model extends CI_Model {
   
       ///insert department name in db////
       public function createdpt() {
           
           $dna = isset($_REQUEST['deptnm']) ? $_REQUEST['deptnm'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM DepartmentMaster WHERE name='$dna' ");
   
   if($dup->num_rows()>0){
       
       }else{
       $q = $this->db->query("INSERT INTO DepartmentMaster(Name,OrganizationId) VALUES ('$dna','$orgid')");
              
           return $q;
           
       }
       }
     
   
       public function createdsg() {
          $dna = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM DesignationMaster WHERE name='$dna' ");
   
   if($dup->num_rows()>0){
       
           return false;
       }else{
           $q = $this->db->query("INSERT INTO DesignationMaster(Name,OrganizationId) VALUES ('$dna','$orgid')");
   
           return $q;
   
       }
       }
       
       public function createholiday() {
          $name = isset($_REQUEST['name1']) ? $_REQUEST['name1'] : '';
        
          $from = isset($_REQUEST['from']) ? $_REQUEST['from'] : '';
          $to = isset($_REQUEST['to']) ? $_REQUEST['to'] : '';
          $desc = isset($_REQUEST['desc']) ? $_REQUEST['desc'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM HolidayMaster WHERE name='$name'");
   
   if($dup->num_rows()>0){
       
           return false;
       }else{
           $q = $this->db->query("INSERT INTO HolidayMaster(Name,Description,DateFrom,DateTo,OrganizationId) VALUES ('$name','$desc','$from','$to','$orgid')");
   
           return $q;
       }
       }
       
       public function createhourlyrate() {
          $dna = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM HourlyRateMaster WHERE name='$dna' ");
   
   if($dup->num_rows()>0){
       
           return false;
       }else{
           $q = $this->db->query("INSERT INTO HourlyRateMaster(Name,OrganizationId) VALUES ('$dna','$orgid')");
   
           return $q;
       }
       }
       // public function getAllDept(){
       //         $orgid=$_SESSION['orgid'];
       //          $query = $this->db->query("SELECT `Id`, `Name`,`CreatedDate`, `LastModifiedDate`, `archive` FROM `DepartmentMaster` WHERE OrganizationId=? order by name",array($orgid));
       //         $d=array();
       //         $res=array();
       //          foreach ($query->result() as $row)
       //         {
       //             $data=array();
       //                 $data['name']=$row->Name;
       //                 $data['cdate']=$row->CreatedDate;
       //                 $data['mdate']=$row->LastModifiedDate;
       //                 $data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
       //                 Inactive</div>';
       //                 // if($row->Name == 'Trial Department')
       //                 // {
       //                 // $data['action']='<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="upDept fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateDept" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
       //                 // data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign" ></i> ';
       //                 // }
       //                 // else
       //                 // {
       //                 $data['action']='<div class="dropdown">
                                     
       //                                 <!-- three dots -->
       //                                 <ul data-toggle="dropdown" 
       //                                       aria-haspopup="true" aria-expanded="false" style="    font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
       //                                     <li></li>
       //                                     <li></li>
       //                                     <li></li>
       //                                 </ul>
       //                                 <span class="caret"></span>
                                     
       //                               <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem;    padding: 0.5rem 0rem 0.5rem 0.5rem;">
       //                                 <li style="font-size:0.8rem; "><a href="#" style="color:#808080;">Action</a></li>
       //                                 <li style="font-size:0.8rem; "><a href="#" style="color:#808080;">Another action</a></li>
       //                               </ul>
       //                             </div>';  
       //                 // }
       //                 $res[]=$data;
       //         }   
       //         $d['data']=$res;
       //          $this->db->close();
       //         echo json_encode($d); return false;
       //     }
           
   
            public function getAllDept() {
           $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
           $orgid = $_SESSION['orgid'];
           $query = $this->db->query(" SELECT `Id`, `Name`, `archive` FROM `DepartmentMaster` WHERE OrganizationId=? order by name", array($orgid));
           //  var_dump($this->db->last_query());
           // die(); 
           $d = array();
           $res = array();
           $depname = "";
           foreach ($query->result() as $row) {
   
   
               $data = array();
   
               $sql1 = $this->db->query("SELECT GROUP_CONCAT(E.FirstName SEPARATOR ', ') as `EmpName`,GROUP_CONCAT(U.EmployeeId SEPARATOR ', ') as `Empid`, E.Department from UserMaster U ,EmployeeMaster E where Department = $row->Id and E.Id = U.EmployeeId AND U.appSuperviserSts = 2 and U.EmployeeId in  (select Id from EmployeeMaster where OrganizationId = $orgid and Is_Delete = 0) Group by E.Department");
               // var_dump($this->db->last_query());
               // die;
               // $count = $this->db->affected_rows();
   
               $data['depname'] = "";
   
               if ($this->db->affected_rows() > 0) {
                   if ($row1 = $sql1->row()) {
                       // $data['dname'] = $row1[0]->EmployeeId;
                       // print_r($data['dname']);
   
   
                       $data['depname'] = $row1->EmpName;
                   }
               } else {
   
                   $data['depname'] = '--';
               }
               $data['change'] = '<input type="checkbox" name="chk"  Id="' . $row->Id . '" class="checkbox"  value="' . $row->Id . '" >';
   
   
   
               $data['name'] = $row->Name;
   
               $data['status'] = $row->archive == 1 ? '<div style="background-color:#219653;text-align:center;color:white; border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px;">
             Inactive</div>';
             if($row->Name == 'Trial Department')
          {
          $data['action']='
          <div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">
                                  <li class="upDept style="height:30px;" data-toggle="modal" data-target="#updateDept" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')"  
             data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li> 
             </ul>
             </div>';
            }
            elseif($row->archive==0)
            {
            $data['action']='<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">
                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addDeptE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

           <li class="delete" style="height:30px;" data-toggle="modal" data-target="#delDept"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 

              <li class="upDept" style="height:30px;" data-toggle="modal" data-target="#updateDept1"  
              data-did="'.$row->Id.'" data-name="'.$row->Name.'"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  data-did="'.$row->Id.'" data-name="'.$row->Name.'"  title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
              </ul>
              </div>  '; 
            }
            else
            {
            $data['action']='<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">
                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addDeptE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

           <li class="delete" style="height:30px;" data-toggle="modal" data-target="#delDept"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 

               <li class="upDept" style="height:30px;" data-toggle="modal" data-target="#updateDept"
               onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"

              ><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>

                  </ul>
                  </div> '; 
            }
   
               
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();
           echo json_encode($d);
           return false;
       }
   
       public function getAllDesg() {
           $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
           $query = $this->db->query("SELECT `Id`, `Name`,Description, `CreatedDate`,  `LastModifiedDate`,`archive` FROM `DesignationMaster`  WHERE OrganizationId=? order by name", array($orgid));
           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
               $data['name'] = $row->Name;
   
               // var_dump($attsts);
               $data['desc'] = $row->Description;
               $data['cdate'] = date('Y-m-d', strtotime($row->CreatedDate));
               $data['mdate'] = date('Y-m-d', strtotime($row->LastModifiedDate));
               $data['status'] = $row->archive == 1 ? '<div style="background-color:#219653;text-align:center;color:white;
   border-radius: 100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white;border-radius: 100px;">
             Inactive</div>';


              if($row->Name == 'Trial Designation')
                    {
          $data['action']='<a href="#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="upDesg fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateDesg" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign" ></i>';
            }
              else
              {
             $data['action']='<a href="#" ><i class="material-icons edit"style="font-size:26px;" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-desc="'.$row->Description.'"
           data-assign="'.designationAssign($row->Id).'"
          data-target="#addDesgE">edit</i></a>
           <i class="delete fa fa-trash" style="font-size:24px; color:purple;" data-toggle="modal" data-target="#delDesg" 
           data-did="'.$row->Id.'" 
           data-dname="'.$row->Name.'" title="Delete" ></i>
           <i class="upDesg fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateDesg" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign" ></i>';
              }



  if($row->Name == 'Trial Designation')
                    {
 $data['action']='
          <div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">
                                  <li class="upDept style="height:30px;" data-toggle="modal" data-target="#updateDesg" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')"  
             data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li> 
             </ul>
             </div>';
            }
   
          
              elseif($row->archive==0)
            {
            $data['action']='<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">
                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addDesgE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

           <li class="delete" style="height:30px;" data-toggle="modal" data-target="#delDesg"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 

              <li class="upDesg" style="height:30px;" data-toggle="modal" data-target="#updateDesg1"  
              data-did="'.$row->Id.'" data-name="'.$row->Name.'"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  data-did="'.$row->Id.'" data-name="'.$row->Name.'"  title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
              </ul>
              </div>  '; 
            }
            else
            {
            $data['action']='<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">
                                  <li class="edit" style="height:30px;" data-toggle="modal" data-target="#addDesgE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>

           <li class="delete" style="height:30px;" data-toggle="modal" data-target="#delDesg"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 

               <li class="upDesg" style="height:30px;" data-toggle="modal" data-target="#updateDesg"
               onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"

              ><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>

                  </ul>
                  </div> '; 
            }
   

               // }
               // }
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();      //$query->result();
           echo json_encode($d);
           return false;
       }
   
       public function getAllHolidays() {
           $orgid = $_SESSION['orgid'];
           $q = "";
           $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
           //,DATEDIFF('DateTo','fromDate') AS DiffDate
           /*  if($date=='')
             {
             $enddate=date("Y-m-d");
             $startdate=date('Y-m-d',(strtotime('-30 day',strtotime(date('Y-m-d'))) ));
   
             $q=" AND `DateFrom` BETWEEN '$startdate' AND '$enddate' ";
             }
             if($date!='')
             {
             $arr=explode('-', trim($date));
             $end= date('Y-m-d',strtotime($arr[1]));
             $strt= date('Y-m-d',strtotime(substr($arr[0],2,strlen($arr[0])-3)));
             $q.=" AND `DateFrom` BETWEEN  '$strt' AND '$end' ";
   
             }
            */
   
           $query = $this->db->query("SELECT `Id`, `Name`, `Description`, DATE(DateFrom) AS fromDate, `DateTo`, DATEDIFF(DATE(DateTo),DATE(DateFrom)) + 1  AS DiffDate FROM `HolidayMaster` WHERE OrganizationId=?  order by fromDate DESC", array($orgid));
           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
               $data['name'] = $row->Name;
               $data['from'] = date("d-M-Y", strtotime($row->fromDate));
               //$from=date($row->fromDate);
               $data['to'] = date("d-M-Y", strtotime($row->DateTo));
               //$to=date($row->DateTo);
               $data['days'] = $row->DiffDate;
               /* if($data['days']=='0'){
                 $data['days']=='1';
                 } */
               $data['description'] = $row->Description;
               // if($row->fromDate > date("Y-m-d"))
               // {
               // $data['action']='<a href="#"><i class="material-icons edit" style="font-size:26px" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
               //  data-sid="'.$row->Id.'" 
               //  data-name="'.$row->Name.'" 
               //  data-from="'.date("m/d/Y", strtotime($row->fromDate)).'" 
               //  data-to="'.date("m/d/Y", strtotime($row->DateTo)).'" 
               //  data-description="'.$row->Description.'"
               //  data-target="#edit">edit</i></a>
               //  <i class="delete fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delete" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>';
               // }
               // else
               // {
               $data['action'] = '<div class="dropdown">
                                     
                                       <!-- three dots -->
                                       <ul data-toggle="dropdown" 
                                             aria-haspopup="true" aria-expanded="false" style="    font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                       </ul>
                                       <span class="caret"></span>
                                     
                                   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6rem;    padding: 0.5rem 0rem 0.5rem 0.5rem;">
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#editShift" style="color:black; font-size:100%" class="fas fa-pen">&nbsp&nbspEdit</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#delShift" style="color:black; font-size:100%" class="fas fa-trash-alt">&nbsp&nbspDelete</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#assignShift" style="color:black; font-size:100%" class="fas fa-user-check">&nbsp&nbspAssign</i></a></li>
                                     </ul>
                                   </div>';
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();
           echo json_encode($d);
           return false;
       }
   
       public function getAllrates() {
           $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
           $query = $this->db->query("SELECT `Id`,`Name`,Rate, `CreatedDate`,`LastModifiedDate`,`status` FROM `HourlyRateMaster`  WHERE OrganizationId = ? order by name", array($orgid));
           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
               // $data['name']=$row->Name;/*getName('DesignationMaster','Name','Id',$row->Name);*/
               $data['rate'] = $row->Rate;
               $attsts = $this->getAttendanceStatusBYHourlyRateId($row->Id);
               $data['cdate'] = date('Y-m-d', strtotime($row->CreatedDate));
               $data['mdate'] = date('Y-m-d', strtotime($row->LastModifiedDate));
               $data['status'] = $row->status == 1 ? '<div style="background-color:#219653;text-align:center;color:white; border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px;">
             Inactive</div>';
               $data['action'] = '<div class="dropdown">
                                     
                                       <!-- three dots -->
                                       <ul data-toggle="dropdown" 
                                             aria-haspopup="true" aria-expanded="false" style="    font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                       </ul>
                                       <span class="caret"></span>
                                     
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6rem;    padding: 0.5rem 0rem 0.5rem 0.5rem;">
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#editShift" style="color:black; font-size:100%" class="fas fa-pen">&nbsp&nbspEdit</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#delShift" style="color:black; font-size:100%" class="fas fa-trash-alt">&nbsp&nbspDelete</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#assignShift" style="color:black; font-size:100%" class="fas fa-user-check">&nbsp&nbspAssign</i></a></li>
                                     </ul>
                                   </div>';
               // }
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();      //$query->result();
           echo json_encode($d);
           return false;
       }
   
       public function getAttendanceStatusBYHourlyRateId($HourlyRateId) {
           $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
   
           $query = $this->db->query("SELECT count(Id) as count from AttendanceMaster WHERE HourlyRateId=$HourlyRateId AND OrganizationId = $orgid");
           // var_dump($this->db->last_query());
           $data = 0;
           if ($row = $query->row()) {
               $data = $row->count;
           }
           return $data;
       }
   
       public function getAllShift() {
           $orgid = $_SESSION['orgid'];
           $query = $this->db->query("SELECT  HoursPerDay,`Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `BreakInGrace`, `BreakOutGrace`,`archive`,TIMEDIFF(`TimeOut`,`TimeIn`) AS shifthpurs, TIMEDIFF(TIMEDIFF(`TimeOut`,`TimeIn`),TIMEDIFF(`TimeOutBreak`,`TimeInBreak`)) AS workhours,TIMEDIFF(`TimeOutBreak`,`TimeInBreak`) as breakhours,shifttype FROM `ShiftMaster` WHERE OrganizationId=? order by TimeIn", array($orgid));
           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
   
               if ($row->shifttype == 3) {
                   $data['name'] = $row->Name;
                   $data['timein'] = '-';
                   $data['timeout'] = '-';
                   $data['timeingrace'] = '-';
                   $data['timeoutgrace'] = '-';
                   $data['timeinbreak'] = '-';
                   $data['timeoutbreak'] = '-';
               } else {
                   $data['name'] = $row->Name;
                   $data['timein'] = substr($row->TimeIn, 0, 5);
                   $data['timeout'] = substr($row->TimeOut, 0, 5);
                   $data['timeingrace'] = $row->TimeInGrace;
                   $data['timeoutgrace'] = $row->TimeOutGrace;
                   $data['timeinbreak'] = substr($row->TimeInBreak, 0, 5);
                   $data['timeoutbreak'] = substr($row->TimeOutBreak, 0, 5);
               }
   
               if ($row->shifttype == 1) {
                   if (strtotime($row->TimeIn) < strtotime($row->TimeOut)) {
                       $a = new DateTime($row->TimeIn);
                       $b = new DateTime($row->TimeOut);
                       $interval1 = $a->diff($b);
                       $data['shifthpurs'] = $interval1->format("%H:%I");
                       $a = new DateTime($interval1->format("%H:%I"));
                       $b = new DateTime(getShiftBreak($row->Id));
                       $interval = $a->diff($b);
                       $data['workhours'] = $interval->format("%H:%I");
                       //$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
                       //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
                   } else {
                       $time = "24:00:00";
                       $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                       $data['shifthpurs'] = date("H:i", strtotime($time) - $secs);
                       $a = new DateTime($data['shifthpurs']);
                       $b = new DateTime(getShiftBreak($row->Id));
                       $interval = $b->diff($a);
                       $data['workhours'] = $interval->format("%H:%I");
                   }
                   //$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
                   //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
               } elseif ($row->shifttype == 3) {
                   //var_dump($row->HoursPerDay);
                   $data['shifthpurs'] = date("H:i", strtotime($row->HoursPerDay));
                   $data['workhours'] = date("H:i", strtotime($row->HoursPerDay));
               } else {
                   /* $timearr=array();
                     $timearr=explode(':',substr(substr($row->shifthpurs,1),0,5));
                     $data['shifthpurs']=(23-$timearr[0]) .':'. (60-$timearr[1]);
                     $time = $data['shifthpurs'];
                     $time2 = $row->breakhours;
                     $secs = strtotime("00:00:00")-strtotime($time2);
                     $result = date("H:i:s",strtotime($time)+$secs);
                     $data['workhours']=substr(trim($result,'-'),0,5); */
                   $time = "24:00:00";
                   $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                   $data['shifthpurs'] = date("H:i", strtotime($time) - $secs);
                   $a = new DateTime($data['shifthpurs']);
                   $b = new DateTime(getShiftBreak($row->Id));
                   $interval = $b->diff($a);
                   $data['workhours'] = $interval->format("%H:%I");
               }
               //substr(trim($row->Overtime,"-!"),0,5);
               $data['shifttype'] = $row->shifttype == 1 ? '<div style="background-color:green;text-align:center;color:white; border-radius:100px;">Single Date</div>' : '<div style="background-color:orange;text-align:center;color:white; border-radius:100px;">
             Multi Date</div>';
   
               if ($row->shifttype == 3) {
                   $data['shifttype'] = '<div style="background-color:#a523ac;text-align:center;color:white; border-radius:100px;">Flexi</div>';
               }
               //substr(trim($row->Overtime,"-!"),0,5);
               $data['status'] = $row->archive == 1 ? '<div style="background-color:#219653;text-align:center;color:white; border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px;">
             Inactive</div>';
               /*
                 $data['action']='<a href="#"><i class="material-icons editShift" style="font-size:26px" data-toggle="modal" title="Edit/View" data-sid="'.$row->Id.'"
                 data-sid="'.$row->Id.'"
                 data-name="'.$row->Name.'"
                 data-ti="'.date("g:i A", strtotime($row->TimeIn)).'"
                 data-to="'.date("g:i A", strtotime($row->TimeOut)).'"
                 data-tig="'.date("g:i A", strtotime($row->TimeInGrace)).'"
                 data-tog="'.date("g:i A", strtotime($row->TimeOutGrace)).'"
                 data-tib="'.date("g:i A", strtotime($row->TimeInBreak)).'"
                 data-tob="'.date("g:i A", strtotime($row->TimeOutBreak)).'"
                 data-big="'.date("g:i A", strtotime($row->BreakInGrace)).'"
                 data-bog="'.date("g:i A", strtotime($row->BreakOutGrace)).'"
                 data-sts="'.$row->archive.'"
                 data-target="#addShiftE">edit</i></a>
                 <i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>
                 '; */
               // if($row->Name == 'Trial Shift')
               // {
               //  $data['action'] = '<a href = "#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="upShift fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
               // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
               //   }
               //   elseif($row->archive==0)
               //   {
               //     $data['action'] = '<a href = "'.URL .'Admin/viewshift/'.$row->Id .'" ><i class="material-icons" style="font-size:26px" title="Edit" >edit</i> </a> <i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>
               // <i class="upShift fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift1" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
               // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
               //   }
               //   else
               //   {
               $data['action'] = '<div class="dropdown">
                                     
                                       <!-- three dots -->
                                       <ul data-toggle="dropdown" 
                                             aria-haspopup="true" aria-expanded="false" style="    font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                       </ul>
                                       <span class="caret"></span>
                                     
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6rem;    padding: 0.5rem 0rem 0.5rem 0.5rem;">
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#editShift" style="color:black; font-size:100%" class="fas fa-pen">&nbsp&nbspEdit</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#delShift" style="color:black; font-size:100%" class="fas fa-trash-alt">&nbsp&nbspDelete</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i data-toggle="modal" data-target="#assignShift" style="color:black; font-size:100%" class="fas fa-user-check">&nbsp&nbspAssign</i></a></li>
                                     </ul>
                                   </div>';

               // }
               // }
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();
           echo json_encode($d);
           return false;
       }
   
         public function saverecords(){
         
        $orgid=$_SESSION['orgid'];
               $id=$_SESSION['id'];
   
           $shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
           $shiftname=isset($_REQUEST['shiftname'])?$_REQUEST['shiftname']:0;
   
               
               $timeinduration  =  date("H:i:s",strtotime(isset($_REQUEST['timeinduration'])?$_REQUEST['timeinduration']:''));
   
               $timeoutduration = date("H:i:s",strtotime(isset($_REQUEST['timeoutduration'])?$_REQUEST['timeoutduration']:''));
               $timeingrace =date("H:i:s",strtotime(isset($_REQUEST['timeingrace'])?$_REQUEST['timeingrace']:''));
               $timeoutgrace =date("H:i:s",strtotime(isset($_REQUEST['timeoutgrace'])?$_REQUEST['timeoutgrace']:''));

   
               // var_dump($shiftname);
               // var_dump($timeinduration);
               // var_dump($timeoutduration);
               // var_dump($breakinduration);
               // var_dump($breakoutduration);
               //             die;
               
               $query = $this->db->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`,shifttype,`OrganizationId`) VALUES (?,?,?,?,?,?,?)",array($shiftname,$timeinduration,$timeoutduration,$timeingrace,$timeoutgrace,$shifttype,$orgid));
                     //var_dump($this->db->last_query());
                     //
                     //
               
               echo 1;
               return false;
         } 
   // Delete function 
   //
   //
      public function deleteShift(){
            $orgid=$_SESSION['orgid'];
           $sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
           $data=array();
           $data['afft']=0;
           $query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE  Id = '$sid' ");
          $query = $this->db->query("select id as totattn from AttendanceMaster where AttendanceMaster.shiftid=? and OrganizationId=?",array($sid,$orgid));
          $data['attn']=$query->num_rows();
          
          $query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.shift=? and OrganizationId=? and Is_Delete != 2",array($sid,$orgid));
          $data['emp']=$query->num_rows();

          $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.ShiftId=? and OrganizationId=?",array($sid,$orgid));
          $data['arc']=$query->num_rows();

          $query = $this->db->query("select Id as totspid from ShiftPlanner where ShiftPlanner.shiftid=? and ShiftPlanner.orgid=?",array($sid,$orgid));
          $data['shiftp']=$query->num_rows();

          if($data['attn']==0 and $data['emp']==0 and $data['arc']==0 and $data['shiftp']==0)
          {
            $query = $this->db->query("DELETE FROM `ShiftMaster` where id=? and OrganizationId=?",array($sid,$orgid));
            $data['afft']=$this->db->affected_rows();
            if($data['afft']>0)
            {
              $query = $this->db->query("DELETE FROM `ShiftMasterChild` where ShiftId=? and OrganizationId=?",array($sid,$orgid));

             /* $count1 = $this->db->affected_rows();*/
            }
      }
    }
     
   
       public function getshiftdata($sid) {
           $res = array();
           $orgid = $_SESSION['orgid'];
           $query = $this->db->query("Select * from ShiftMaster where Id = '$sid' AND OrganizationId = '$orgid' ");
           foreach ($query->result() as $row) {
               $data = array();
               $data['sti'] = $row->TimeIn;
               $data['sto'] = $row->TimeOut;
               $data['bsti'] = $row->TimeInBreak;
               $data['bsto'] = $row->TimeOutBreak;
               if ($row->TimeInGrace == '00:00:00') {
                   $data['tig'] = '-:-';
               } else {
                   $data['tig'] = date('h:i A', strtotime($row->TimeInGrace));
               }
               if ($row->TimeOutGrace == '00:00:00') {
                   $data['tog'] = '-:-';
               } else {
                   $data['tog'] = date('h:i A', strtotime($row->TimeOutGrace));
               }
               $data['status'] = $row->archive;
               $data['stype'] = $row->shifttype;
               $data['sname'] = $row->Name;
               $data['HoursPerDay'] = $row->HoursPerDay;
               $res[] = $data;
               break;
           }
           return $res;
       }
   
       function getGeolocation($postData = Null) {
           $orgid = $_SESSION['orgid'];
   
   
   
           $draw = $postData['draw'];
           $start = $postData['start'];
           $rowperpage = $postData['length']; // Rows display per page
           $searchValue = $postData['search']['value'];
           $columnIndex = $postData['order'][0]['column']; // Column index
           $columnName = $postData['columns'][$columnIndex]['data']; // Column name
           $columnSortOrder = $postData['order'][0]['dir']; //asc or desc 
           //echo  $searchValue;
   
   
           if ($columnName == "name") {
               $columnName = "Name";
           } elseif ($columnName == "Lat_Long") {
               $columnName = "Lat_Long";
           } elseif ($columnName == "radius") {
               $columnName = "Radius";
           } elseif ($columnName == "location") {
               $columnName = "Location";
           } else {
               $columnName = "Status";
           }
   
           $searchQuery = "";
           if ($searchValue != '') {
               $searchQuery = " And (Name like '%" . $searchValue . "%' or Lat_Long like '%" . $searchValue . "%' or Radius like '%" . $searchValue . "%' or Location like '%" . $searchValue . "%' or Status like '%" . $searchValue . "%')";
           }
   
           $query = $this->db->query("SELECT count(*) as allcount FROM `Geo_Settings` WHERE OrganizationId='$orgid'")->result();
           $totalRecords = $query[0]->allcount;
   
   
           if ($searchQuery != '')
               $query = $this->db->query("SELECT count(*) as allcount FROM `Geo_Settings` WHERE OrganizationId='$orgid' $searchQuery")->result();
           $totalRecordwithFilter = $query[0]->allcount;
   
   
   
           $query = $this->db->query("SELECT Id,Name,Lat_Long,Radius,Status,Location FROM `Geo_Settings` WHERE OrganizationId='$orgid' $searchQuery ORDER BY $columnName $columnSortOrder,Name ASC Limit $start,$rowperpage");
   
           $d = array();
           $res = array();
           $response = array();
           foreach ($query->result() as $row) {
               $data = array();
               $id = encode5t($row->Id);
               $data['name'] = $row->Name;
               $attsts = $this->getAttendanceStatusBYAreaId($row->Id);
               $data['latlong'] = $row->Lat_Long;
               $data['location'] = "<a href='http://maps.google.com/?q=$row->Lat_Long' target='_blank' title='Click to see location on map'>$row->Location;</a>";
               $data['radius'] = number_format((float) $row->Radius, 2, '.', '');
               $data['status'] = $row->Status == 1 ? '<div style="background-color:#219653;text-align:center;color:white; border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px;">
             Inactive</div>';
               $data['action'] = '<div class="dropdown">
                                     
                                       <!-- three dots -->
                                       <ul data-toggle="dropdown" 
                                             aria-haspopup="true" aria-expanded="false" style="    font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                       </ul>
                                       <span class="caret"></span>
                                     
                                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6rem;    padding: 0.5rem 0rem 0.5rem 0.5rem;">
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i style="  color:black; font-size:100%" class="fas fa-pen">&nbsp&nbspEdit</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i style=" color:black; font-size:100%" class="fas fa-trash-alt">&nbsp&nbspDelete</i></a></li>
                                       <li style="font-color:black;"><a href="#" style="color:#808080;"><i style=" color:black; font-size:100%" class="fas fa-user-check">&nbsp&nbspAssign</i></a></li>
                                     </ul>
                                   </div>';
               // }
               // 
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();
   
           $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $res
           );
   
           return $response;
       }
   
       public function getAttendanceStatusBYAreaId($areaid) {
           $orgid = $_SESSION['orgid'];
           $query = $this->db->query("Select count(Id) as count from AttendanceMaster where areaId= $areaid and OrganizationId = $orgid");
           // var_dump($this->db->last_query());
           // die;
           $data = 0;
           if ($row = $query->row()) {
               $data = $row->count;
           }
           return $data;
       }

        public function getemployeebydept() {
    $result = array();
    
    $data = array();
     $orgid=$_SESSION['orgid'];
     $deptid=isset($_REQUEST['deptid'])?$_REQUEST['deptid']:'';

   
    
    $sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and Department!=? and archive=1 and Is_Delete=0 order by FirstName";
     // var_dump($sql);
    $query = $this->db->query($sql,array($orgid,$deptid ));
    
      foreach($query->result() as $row)
      {
        $res = array();
        $res['id'] = $row->Id;
        $res['name'] = $row->EmployeeCode." - ". ucwords(strtolower($row->FirstName." ".$row->LastName));
        $res['empfname'] = $row->FirstName;
        $res['emplname'] = $row->LastName;
        
        $res['sts']=0;
        $data[] = $res;
      }
    $result["data"] =$data;
    return $result;
    } 
    public function editDept(){
      $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $dna=isset($_REQUEST['dna'])?$_REQUEST['dna']:'';
      $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
      $sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
      $date=date('Y-m-d');
      $res=0;
      $query = $this->db->query("select Id from `DepartmentMaster` where Name=? and OrganizationId=? and Id != ? ",array($dna,$orgid,$did));
      if($query->num_rows()>0)
        $res=2; // Dept Name already exist already exist
      else{
      $query = $this->db->query("UPDATE `DepartmentMaster` SET `Name`=?,`LastModifiedDate`=?,`LastModifiedById`=?,`archive`=? where id=? ",array($dna,$date,$id,$sts,$did));
      $res= $this->db->affected_rows(); 
      // $this->db->close();
      if($res > 0){
        $query121 = $this->db->query("SELECT `Id`, `Name`, `ParentId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `OrganizationId`, `Code`, `archive` FROM `DepartmentMaster` WHERE Name='$dna' and OrganizationId='$orgid' ");
            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
       $zone=getTimeZone($orgid);
          date_default_timezone_set($zone);
       $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> department has been <b>updated</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

          }
      }
      }
      echo $res;
    }
    public function deleteDept(){
      $orgid=$_SESSION['orgid'];
      $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
      $data=array();
      $data['afft']=0;


      $query121 = $this->db->query("SELECT `Id`, `Name`, `ParentId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `OrganizationId`, `Code`, `archive` FROM `DepartmentMaster` WHERE Id='$did' and OrganizationId='$orgid' ");
      $query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.department=? and OrganizationId=? and Is_Delete != 2 ",array($did,$orgid));
      $data['emp']=$query->num_rows();
      
      $query = $this->db->query("select id as totemp from AttendanceMaster where Dept_id=? and OrganizationId=?",array($did,$orgid));
      $data['A_emp']=$query->num_rows();

      $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.Dept_id=? and OrganizationId=?",array($did,$orgid));
      $data['aarc']=$query->num_rows();
      
       if($data['emp']==0 && $data['A_emp']==0 && $data['aarc']==0){
        $query = $this->db->query("DELETE FROM `DepartmentMaster` where id=? and OrganizationId=?",array($did,$orgid));
        $data['afft']=$this->db->affected_rows();

        if($data['afft'] > 0){

            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
          $zone=getTimeZone($orgid);
              date_default_timezone_set($zone);
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> department has been <b>deleted</b> ";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

          }
        }
      } 
    //}
       $this->db->close();
      echo json_encode($data);  
    }

     public function SaveEmpdeptList() {
        $result = array();
        $data = array();
    $orgid=$_SESSION['orgid'];
     $deptid=isset($_REQUEST['deptid'])?$_REQUEST['deptid']:'';
        
        
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 ){  
          //print_r($emplistarr);
          $empid = $emplistarr[$i]['id'];
          $sql = "update EmployeeMaster set Department=? where OrganizationId =? and Id=?";
          
          $query = $this->db->query($sql,array($deptid ,$orgid,$empid));
          //$count=$query->rowCount();
          
                }
            }
          
        $result["data"] =$data;
        return $result;
    }
   
   
   }
   
   ?>
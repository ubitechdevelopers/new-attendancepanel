<?php
class Setting_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
		//include(APPPATH."PhpMailer/class.phpmailer.php");
		//include(APPPATH . "s3.php");
    }
	public function getCompanydetail(){
			$result=array();
			$res=array();
			$id = $_SESSION['orgid'];
			$query = $this->db->query("SELECT * FROM Organization where id =$id");
			foreach ($query->result_array() as $row)
			{
				$res['Name'] =   $row['Name'];
				$res['Website'] = 	 $row['Website'];
				$res['PhoneNumber'] =$row['PhoneNumber'];
				$res['Email'] = 	 $row['Email'];
				$res['Address'] = 	 $row['Address'];
				$res['City'] = 	    getCityById1($row['City']);
				$res['Country'] = 	 getCountryById1($row['Country']);
			}
			
			$result = $res;
			return $result;
		}
	public function getCompanyprofile(){
			$result1=array();
			$res1=array();
			$id = $_SESSION['orgid'];
			$sname= $_SESSION['name'];
			$query = $this->db->query("SELECT * FROM admin_login where OrganizationId =$id and name ='$sname'" );
			foreach ($query->result_array() as $row)
			{
				$res1['username'] =   $row['username'];
				$res1['email'] = 	 $row['email'];
				$res1['name'] = 	 $row['name'];
			}
			
			$result1 = $res1;
			return $result1;
		}
    public function updateProfile(){
			$id = $_SESSION['orgid'];
			$pname = $_REQUEST['pname'];
			$puname = $_REQUEST['puname'];
			$pemail = $_REQUEST['pemail'];
			$query = $this->db->query("update admin_login set username='$puname', email='$pemail', name='$pname' where OrganizationId =$id");
			if($query>0){
				$_SESSION['name']=$pname;
				echo 1;
			}else{
				echo 0;
			}
			
			
		}
    public function updateCProfile()
		{
			$id = $_SESSION['orgid'];

			// $sname= $_SESSION['name'];
			$cpname = isset($_REQUEST['cpname'])?$_REQUEST['cpname']:'';
			$cpwebsite = isset($_REQUEST['cpwebsite'])?$_REQUEST['cpwebsite']:'';
			$pname = isset($_REQUEST['pname'])?$_REQUEST['pname']:''; // contact person
			$puname = isset($_REQUEST['puname'])?$_REQUEST['puname']:'';
			$cppnumber = isset($_REQUEST['cppnumber'])?$_REQUEST['cppnumber']:'';
			$cpemail = isset($_REQUEST['cpemail'])?$_REQUEST['cpemail']:'';
			$cpaddress = isset($_REQUEST['cpaddress'])?$_REQUEST['cpaddress']:'';

			// $zone=getTimeZone($id);
   //          date_default_timezone_set($zone);

            
			$query = $this->db->query("update Organization set Name='$cpname', Website='$cpwebsite', Address='$cpaddress',Email='$cpemail' where Id = $id ");
			if($query>0){
				// $_SESSION['name']=$pname;
				$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $sesid =$_SESSION['id'];
           $sesname =$_SESSION['name'];
            
           $zone=getTimeZone($orgid);
            date_default_timezone_set($zone); 
            
           $module = "Settings";
           $actionperformed = " <b>Company</b> details has been <b>Updated</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$sesid));

				echo 1;
			}else{
				echo 0;
			}
			
			
		} 
    public function updatePassword(){
			 $id = $_SESSION['id'];
			 $cpassword = encrypt(isset($_REQUEST['cpassword'])?$_REQUEST['cpassword'] : '');
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
    public function getAllHolidays(){
			$orgid=$_SESSION['orgid'];
			$q="";
			$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';
			//,DATEDIFF('DateTo','fromDate') AS DiffDate
	/*	if($date=='')
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
			
		 $query = $this->db->query("SELECT `Id`, `Name`, `Description`, DATE(DateFrom) AS fromDate, `DateTo`, DATEDIFF(DATE(DateTo),DATE(DateFrom)) + 1  AS DiffDate FROM `HolidayMaster` WHERE OrganizationId=?  order by fromDate DESC",array($orgid));
			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
			  {
				    $data=array();
					$data['name']=$row->Name;
					$data['from']=date("d-M-Y", strtotime($row->fromDate));
					//$from=date($row->fromDate);
					$data['to']=date("d-M-Y", strtotime($row->DateTo));
					//$to=date($row->DateTo);
					$data['days']=$row->DiffDate;
					/* if($data['days']=='0'){
						$data['days']=='1';
					} */
					$data['description']=$row->Description;
					if($row->fromDate > date("Y-m-d"))
					{
					$data['action']='<a href="#"><i class="material-icons edit" style="font-size:26px" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
					 data-sid="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-from="'.date("m/d/Y", strtotime($row->fromDate)).'" 
					 data-to="'.date("m/d/Y", strtotime($row->DateTo)).'" 
					 data-description="'.$row->Description.'"
					 data-target="#edit">edit</i></a>
					 <i class="delete fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delete" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>';
					}
					else
					{
					  $data['action']='<a href="#"><i class=" cant12 material-icons edit" style="font-size:26px" title="Cannot be edited" data-sid="'.$row->Id.'"
					 data-sid="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-from="'.date("d-m-Y", strtotime($row->fromDate)).'" 
					 data-to="'.date("d-m-Y", strtotime($row->DateTo)).'" 
					 data-description="'.$row->Description.'"
					 >edit</i></a>
					 <i class="cant23 delete fa fa-trash" style="font-size:24px; color:purple" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Cannot be deleted" ></i>';	
					}
					 $res[]=$data;
			}  	
			$d['data']=$res; 
			 $this->db->close();
			echo json_encode($d); return false;
		}
    public function addHoliday()
		{
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$sna=isset($_REQUEST['name'])?$_REQUEST['name']:'';
			$fromdate=date("Y-m-d", strtotime(isset($_REQUEST['from'])?$_REQUEST['from']:''));
			$todate=date("Y-m-d", strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
			$data['afft']=0;
			$desc=isset($_REQUEST['desc'])?$_REQUEST['desc']:'';
			$date=date('Y-m-d');
			$query1 = $this->db->query("SELECT Name FROM HolidayMaster WHERE Name='$sna' and OrganizationId='$orgid' ");
			$data['name']=$query1->num_rows();
			
			$query2 = $this->db->query("SELECT DateFrom FROM HolidayMaster WHERE DateFrom='$fromdate'  and OrganizationId='$orgid' ");
			$data['datefrom']=$query2->num_rows();
			
             if($data['name']==0 and $data['datefrom']==0)
				{				 
				$query = $this->db->query("INSERT INTO `HolidayMaster`(`Name`, `Description`, `DateFrom`, `DateTo`, `DivisionId`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `FiscalId`) VALUES (?,?,?,?,'0',?,?,?,?,?,1)",array($sna,$desc,$fromdate,$todate,$orgid,$date,$id,$date,$id));
				$data['afft']=$this->db->affected_rows();
				// echo $data['afft'];
				if($data['afft'] > 0){
                  // echo $data['afft'];
					$query121 = $this->db->query("SELECT Name FROM HolidayMaster WHERE Name='$sna' and OrganizationId='$orgid' ");
						if ($r=$query121->result()){
							$hname  = $r[0]->Name;
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> holiday has been added  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
				}
				}
			$this->db->close();
			echo json_encode($data);
		}
    public function editHoliday(){
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
			$sna=isset($_REQUEST['name'])?$_REQUEST['name']:'';
			$fromdate=date("Y-m-d", strtotime(isset($_REQUEST['from'])?$_REQUEST['from']:''));
			$todate=date("Y-m-d", strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
			$desc=isset($_REQUEST['desc'])?$_REQUEST['desc']:'';
			$date=date('Y-m-d');
			$query = $this->db->query("update HolidayMaster set Name=?, `Description`=?, `DateFrom`=?, `DateTo`=?,`LastModifiedDate`=?, `LastModifiedById`=? where Id=?",array($sna,$desc,$fromdate,$todate,$date,$id,$sid));
			 // $this->db->close();
			echo $this->db->affected_rows();
			if($this->db->affected_rows() > 0){

				$query1211 = $this->db->query("SELECT `Id`, `Name`, `Description`, `DateFrom`, `DateTo`, `DivisionId`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `FiscalId` FROM `HolidayMaster` WHERE Id=$sid");
				if ($r=$query1211->result()){
							$hname  = $r[0]->Name;
							
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> holiday has been Updated.  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}


			}
		}
		public function deleteHoliday(){
			$did=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
			$query12112 = $this->db->query("SELECT `Id`, `Name`, `Description`, `DateFrom`, `DateTo`, `DivisionId`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `FiscalId` FROM `HolidayMaster` WHERE Id=$did");
			$query = $this->db->query("delete from HolidayMaster where Id=?",array($did));
			 // $this->db->close();
			echo $this->db->affected_rows();
			if($this->db->affected_rows() > 0){
				if ($r=$query12112->result()){
							$hname  = $r[0]->Name;
							
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> Holiday has been deleted</b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			}
		}

    public function getAllShift()
		{
			 $orgid=$_SESSION['orgid'];
			 $query = $this->db->query("SELECT  HoursPerDay,`Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `BreakInGrace`, `BreakOutGrace`,`archive`,TIMEDIFF(`TimeOut`,`TimeIn`) AS shifthpurs, TIMEDIFF(TIMEDIFF(`TimeOut`,`TimeIn`),TIMEDIFF(`TimeOutBreak`,`TimeInBreak`)) AS workhours,TIMEDIFF(`TimeOutBreak`,`TimeInBreak`) as breakhours,shifttype FROM `ShiftMaster` WHERE OrganizationId=? order by TimeIn",array($orgid));
			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
			{
					$data=array();

					if($row->shifttype==3){
					$data['name']=$row->Name;
					$data['timein']='-';
					$data['timeout']='-';
					$data['timeingrace']='-';
					$data['timeoutgrace']='-';
					$data['timeinbreak']='-';
					$data['timeoutbreak']='-';
					}else{
					$data['name']=$row->Name;
					$data['timein']=substr($row->TimeIn,0,5);
					$data['timeout']=substr($row->TimeOut,0,5);
					$data['timeingrace']=$row->TimeInGrace;
					$data['timeoutgrace']=$row->TimeOutGrace;
					$data['timeinbreak']=substr($row->TimeInBreak,0,5);
					$data['timeoutbreak']=substr($row->TimeOutBreak,0,5);
				}
					
					if($row->shifttype==1)
					{
						if(strtotime($row->TimeIn) < strtotime($row->TimeOut))
						  {
							$a = new DateTime($row->TimeIn);
							$b = new DateTime($row->TimeOut);
							$interval1 = $a->diff($b);
							$data['shifthpurs']= $interval1->format("%H:%I");
							$a = new DateTime($interval1->format("%H:%I"));
						    $b = new DateTime(getShiftBreak($row->Id));
							$interval = $a->diff($b);
							$data['workhours']= $interval->format("%H:%I");
							//$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
						    //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
						  }
						  else
						  {
							    $time = "24:00:00";
								$secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
								$data['shifthpurs'] = date("H:i",strtotime($time)-$secs);
								$a = new DateTime($data['shifthpurs']);
								$b = new DateTime(getShiftBreak($row->Id));
								$interval = $b->diff($a);
								$data['workhours']= $interval->format("%H:%I");
						 }
						//$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
						//$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
					}elseif($row->shifttype == 3){
						//var_dump($row->HoursPerDay);
						$data['shifthpurs'] = date("H:i",strtotime($row->HoursPerDay));
						$data['workhours']=  date("H:i",strtotime($row->HoursPerDay));

					}
					else
					{
						/*$timearr=array();
						$timearr=explode(':',substr(substr($row->shifthpurs,1),0,5));
						$data['shifthpurs']=(23-$timearr[0]) .':'. (60-$timearr[1]);
						$time = $data['shifthpurs'];
						$time2 = $row->breakhours;
						$secs = strtotime("00:00:00")-strtotime($time2);
						$result = date("H:i:s",strtotime($time)+$secs);
						$data['workhours']=substr(trim($result,'-'),0,5);*/
					        	$time = "24:00:00";
								$secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
								$data['shifthpurs'] = date("H:i",strtotime($time)-$secs);
								$a = new DateTime($data['shifthpurs']);
								$b = new DateTime(getShiftBreak($row->Id));
								$interval = $b->diff($a);
								$data['workhours']= $interval->format("%H:%I");
					}
					//substr(trim($row->Overtime,"-!"),0,5);
					$data['shifttype']=$row->shifttype==1?'<div style="background-color:green;text-align:center;color:white;">Single Date</div>':'<div style="background-color:orange;text-align:center;color:white;">
					Multi Date</div>';

					if($row->shifttype==3){
						$data['shifttype']='<div style="background-color:#a523ac;text-align:center;color:white;">Flexi</div>';
					}
					//substr(trim($row->Overtime,"-!"),0,5);
					$data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
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
					if($row->Name == 'Trial Shift')
					{
				   $data['action'] = '<a href = "#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="upShift fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
					data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
				    }
				    elseif($row->archive==0)
				    {
				    	$data['action'] = '<a href = "'.URL .'setting/viewshift/'.$row->Id .'" ><i class="material-icons" style="font-size:26px" title="Edit" >edit</i> </a> <i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>
					<i class="upShift fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift1" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
					data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
				   	}
				    else
				    {
				   $data['action'] = '<a href = "'.URL .'setting/viewshift/'.$row->Id .'" ><i class="material-icons" style="font-size:26px" title="Edit" >edit</i> </a> <i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>
					<i class="upShift fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
					data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
				    }
					$res[]=$data;
			}  	
			$d['data']=$res; 
			 $this->db->close();
			echo json_encode($d);
			return false;
		}

    public function registerShift()
		 {
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$sna=isset($_REQUEST['sna'])?$_REQUEST['sna']:'';
			$thours=isset($_REQUEST['thours'])?$_REQUEST['thours']:'';
			$autotimeout_sts=isset($_REQUEST['autotimeout_sts'])?$_REQUEST['autotimeout_sts']:'';
			$timeInfs=isset($_REQUEST['timeInfs'])?$_REQUEST['timeInfs']:'';

			//echo "pravesh";
			 //echo $timeInfs;
			// echo $autotimeout_sts;
			 //die();
			$res=0;
			$query = $this->db->query("select Id from `ShiftMaster` where Name=? and OrganizationId=?  ",array($sna,$orgid));
			if($query->num_rows()>0)
				$res=2; // Shift Name already exist 
			else
			{
			$ti=date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
			$to=date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
			$tib=date("H:i:s",strtotime(isset($_REQUEST['tib'])?$_REQUEST['tib']:''));
			$tob=date("H:i:s",strtotime(isset($_REQUEST['tob'])?$_REQUEST['tob']:''));
			$tig=date("H:i:s",strtotime(isset($_REQUEST['tig'])?$_REQUEST['tig']:''));
			$gto=date("H:i:s",strtotime(isset($_REQUEST['gto'])?$_REQUEST['gto']:''));
			// $tog=date("H:i:s",strtotime(isset($_REQUEST['tog'])?$_REQUEST['tog']:''));
			$bog=date("H:i:s",strtotime(isset($_REQUEST['bog'])?$_REQUEST['bog']:''));
			$big=date("H:i:s",strtotime(isset($_REQUEST['big'])?$_REQUEST['big']:''));
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:1;
			$shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
			$date=date('Y-m-d');

			// echo $shifttype;
			// die();
			if($shifttype==3)
			{
                 $ti="";
                 $to="";
                 $tib="";
                 $tob="";
                 $tig="";
                 $gto="";
			}


			$query = $this->db->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`,`TimeOutGrace`,`TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`,`CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`,`BreakOutGrace`, `archive`,shifttype,AutoTimeoutHours,AutoTimeoutLoggedHoursStatus,HoursPerDay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($sna,$ti,$to,$tig,$gto,$tib,$tob,$orgid,$date,$id,$date,$id,$id,$big,$bog,$sts,$shifttype,$thours,$autotimeout_sts,$timeInfs));
			//$res= $this->db->affected_rows($query);
			$lsid = $this->db->insert_id();
			// var_dump($this->db->last_query());
		  //insert weekoff in this shift
		    if($this->db->affected_rows($query)>0)
			{
          	$sun=isset($_REQUEST['sun'])?$_REQUEST['sun']:'0,0,0,0,0';
			$mon=isset($_REQUEST['mon'])?$_REQUEST['mon']:'0,0,0,0,0';
			$tue=isset($_REQUEST['tue'])?$_REQUEST['tue']:'0,0,0,0,0';
			$wed=isset($_REQUEST['wed'])?$_REQUEST['wed']:'0,0,0,0,0';
			$thus=isset($_REQUEST['thus'])?$_REQUEST['thus']:'0,0,0,0,0';
			$fri=isset($_REQUEST['fri'])?$_REQUEST['fri']:'0,0,0,0,0';
			$sat=isset($_REQUEST['sat'])?$_REQUEST['sat']:'0,0,0,0,0';
			$user=0;
			$orgId=isset($_SESSION['orgid'])?$_SESSION['orgid']:$_REQUEST['refId']; 
			// ref id if fun called by mobile when not set session
			$zname='Asia/Kolkata';
			/////////////get time zone
				$zname=getTimeZone($orgId);
				date_default_timezone_set ($zname);
			//////////////get time zone///////////
			$today=date('Y-m-d');
			
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,1,?,?,?,?,'1')",array($sun,$orgId,$user,$today));
			
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,2,?,?,?,?,'1')",array($mon,$orgId,$user,$today));
			
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,3,?,?,?,?,'1')",array($tue,$orgId,$user,$today));
			
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,4,?,?,?,?,'1')",array($wed,$orgId,$user,$today));
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,5,?,?,?,?,'1')",array($thus,$orgId,$user,$today));
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,6,?,?,?,?,'1')",array($fri,$orgId,$user,$today));
			$query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,7,?,?,?,?,'1')",array($sat,$orgId,$user,$today));

				


			$res= $this->db->affected_rows($query);	

			if($res > 0){
				$query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE Name = '$sna' ");
			if ($r=$query12112->result()){
							$sname  = $r[0]->Name;
							
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been <b>added</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			}


		   }			
		}
			$this->db->close();
		    echo $res;
			
		}


        public function editShift()
		{
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$sna=isset($_REQUEST['sna'])?$_REQUEST['sna']:'';
			$sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
			$shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$timeInfs=isset($_REQUEST['timeInfs'])?$_REQUEST['timeInfs']:'';
			$date=date('Y-m-d');
			$res=0;

			
			$query = $this->db->query("select Id from `ShiftMaster` where Name=? and OrganizationId=? and Id !=? ",array($sna,$orgid,$sid));
			
			if($query->num_rows()>0)
				{
					$res= 2;// Shift Name already exist 
				} 
			
		 	// $query = $this->db->query("select Id from `AttendanceMaster` where OrganizationId=? and ShiftId=? ",array($orgid,$sid));
		 	
	  		// if($query->num_rows()>0)
				// {
				// $res= 3; // Shift  already exist in AttendanceMaster
				// }
			else
			{
			$ti=date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
			$to=date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
			$tib=date("H:i:s",strtotime(isset($_REQUEST['tib'])?$_REQUEST['tib']:''));
			$tob=date("H:i:s",strtotime(isset($_REQUEST['tob'])?$_REQUEST['tob']:''));

			// var_dump($tob);
			// die;
			$tig=date("H:i:s",strtotime(isset($_REQUEST['tig'])?$_REQUEST['tig']:''));
			$tog=date("H:i:s",strtotime(isset($_REQUEST['tog'])?$_REQUEST['tog']:''));

			if($shifttype==3)
			{
                 $ti="";
                 $to="";
                 $tib="";
                 $tob="";
                 $tig="";
                 $tog="";
			}

			
			$query = $this->db->query("UPDATE `ShiftMaster` SET `Name`=?,`LastModifiedDate`=?, `LastModifiedById`=?,`TimeInGrace`=?,`TimeOutGrace`=?,  `archive`=?, `TimeIn`=?, `TimeOut`=?,`TimeInBreak`=?, `TimeOutBreak`=?,shifttype=?,HoursPerDay=? where id=? and OrganizationId=?",array($sna,$date,$id,$tig,$tog,$sts,$ti,$to,$tib,$tob,$shifttype,$timeInfs,$sid,$orgid));

			// var_dump($this->db->last_query());
			// die;
			  $res1=$this->db->affected_rows($query);

			  if($res1>0)
			  {
			  	$query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE Name = '$sna' ");
			if ($r=$query12112->result()){
							$sname  = $r[0]->Name;
							
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been <b>updated</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			  	$res=1;
			  }
			  else
			  {
				$sun=isset($_REQUEST['sun'])?$_REQUEST['sun']:'0,0,0,0,0';
				$mon=isset($_REQUEST['mon'])?$_REQUEST['mon']:'0,0,0,0,0';
				$tue=isset($_REQUEST['tue'])?$_REQUEST['tue']:'0,0,0,0,0';
				$wed=isset($_REQUEST['wed'])?$_REQUEST['wed']:'0,0,0,0,0';
				$thus=isset($_REQUEST['thus'])?$_REQUEST['thus']:'0,0,0,0,0';
				$fri=isset($_REQUEST['fri'])?$_REQUEST['fri']:'0,0,0,0,0';
				$sat=isset($_REQUEST['sat'])?$_REQUEST['sat']:'0,0,0,0,0';
				//var_dump($sun);
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=1",array($sun));
				$res2=$this->db->affected_rows($query);
				if($res2>0)
				{
				$res=1;
				}

				
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=2",array($mon));
				$res3=$this->db->affected_rows($query);
				if($res3>0)
				{

					$res=1;
				}
				
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=3",array($tue));
				$res4=$this->db->affected_rows($query);
				if($res4>0)
				{
					$res=1;
				}

				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=4",array($wed));
				$res5=$this->db->affected_rows($query);
				if($res5>0 )
				{
					$res=1;
				}

				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=5",array($thus));
				$res6=$this->db->affected_rows($query);
				if($res6>0 )
				{
					$res=1;
				}

				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=6",array($fri));
				$res7=$this->db->affected_rows($query);
				if($res7>0 )
				{
					$res=1;
				}
				
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=7",array($sat));
				$res8=$this->db->affected_rows($query);
				if($res8>0 )
				{
					

					$res=1;
				}
				
			}
			
			}
			 $this->db->close();
			 echo $res;


		}
    public function deleteShift()
		{
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
			 // $this->db->close();
			echo json_encode($data);

			if($data['afft'] > 0){



			if ($r=$query12112->result()){
							$sname  = $r[0]->Name;
						$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been <b> Deleted.  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
				}

		}	
    public function getshiftdata($sid)
		{
			$res = array();
			$orgid = $_SESSION['orgid'];
			$query= $this->db->query("Select * from ShiftMaster where Id = '$sid' AND OrganizationId = '$orgid' ");
			foreach($query->result() as $row)
			{
				$data = array();
				$data['sti'] = $row->TimeIn;
				$data['sto'] = $row->TimeOut;
				$data['bsti'] = $row->TimeInBreak;
				$data['bsto'] = $row->TimeOutBreak;
				if($row->TimeInGrace == '00:00:00'){
					$data['tig']='-:-';
				}else{
				$data['tig'] = date('h:i A', strtotime($row->TimeInGrace));
			    }
			    if($row->TimeOutGrace == '00:00:00'){
			    	$data['tog']='-:-';
			    }
			    else{
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

    ////////fetch weekoff
		
		public function fetchWeeklyOff($sid){
			
         $shiftid = $sid;			
		
		 $orgId=isset($_SESSION['orgid'])?$_SESSION['orgid']:0;
			$data=array();
			$res=array();
			$query = $this->db->query("select * from ShiftMasterChild WHERE `OrganizationId`=? AND ShiftId = ?",array($orgId,$shiftid));
			if($this->db->affected_rows()>0)
			foreach($query->result() as $row)
			{
				$data['week']=$row->WeekOff;
				$data['day']=$row->Day ;
				$res[]=$data;
			}
			
			// else
			// {
			// $query = $this->db->query("select * from WeekOffMaster WHERE `OrganizationId`=?",array($orgId));
			 // foreach ($query->result() as $row)
				// {
				// $data['week']=$row->WeekOff;
				// $data['day']=$row->Day ;
				// $res[]=$data;
			  // }
			// }
			$d['data']=$res;  
            $this->db->close();			//$query->result();
			echo json_encode($d);
			return false;
			/* $weekday=explode (",",$data['week']);
						for($i=0;$i<count($weekday);$i++)
						{
						if($weekday[$i]==0){
							//echo "Sun ";
						}   
							else if($weekday[$i]==1){
								//echo "Mon ";
							}
			} */
		}

    public function getemployeebyshift() {
		$result = array();
		
		$data = array();
		 $orgid=$_SESSION['orgid'];
		  $shiftid=isset($_REQUEST['shiftid'])?$_REQUEST['shiftid']:'';
		
		$sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and Shift!=? and archive=1 and Is_Delete=0 order by FirstName";
		
		$query = $this->db->query($sql,array($orgid,$shiftid ));
		
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
   public function SaveEmpShiftList() {
        $result = array();
        $data = array();
        $date=date('Y-m-d');
		$orgid=$_SESSION['orgid'];
		$shiftid=isset($_REQUEST['shiftid'])?$_REQUEST['shiftid']:'';
		$query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE  Id = '$shiftid' ");
		//var_dump($this->db->last_query());
        
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 )
				{
					//print_r($emplistarr);
					$empid = $emplistarr[$i]['id'];
					$sql = "update EmployeeMaster set Shift=? where OrganizationId =? and Id=?";
					
					$query = $this->db->query($sql,array($shiftid ,$orgid,$empid));
					//$count=$query->rowCount();
					if ($r=$query12112->result()){
							$sname  = $r[0]->Name;
					$id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been assigned to <b>".ucwords(getEmpName($empid))." </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
           //var_dump($this->db->last_query());
					}
                }
            }
          
        $result["data"] =$data;
       
        
        return $result;
    } 
   public function getAllDept(){
			$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';
			$orgid=$_SESSION['orgid'];
			 $query = $this->db->query(" SELECT `Id`, `Name`, `archive` FROM `DepartmentMaster` WHERE OrganizationId=? order by name",array($orgid));
			//  var_dump($this->db->last_query());
			// die();	
			$d=array();
			$res=array();
			$depname="";
			 foreach ($query->result() as $row)
			{


				$data=array();

				$sql1 = $this->db->query("SELECT GROUP_CONCAT(E.FirstName SEPARATOR ', ') as `EmpName`,GROUP_CONCAT(U.EmployeeId SEPARATOR ', ') as `Empid`, E.Department from UserMaster U ,EmployeeMaster E where Department = $row->Id and E.Id = U.EmployeeId AND U.appSuperviserSts = 2 and U.EmployeeId in  (select Id from EmployeeMaster where OrganizationId = $orgid and Is_Delete = 0) Group by E.Department");
				// var_dump($this->db->last_query());
				// die;
				// $count = $this->db->affected_rows();
				
				$data['depname']="";
				if($this->db->affected_rows()>0)
				{
				if($row1=$sql1->row())
				{
					// $data['dname'] = $row1[0]->EmployeeId;
					// print_r($data['dname']);
					

					$data['depname']=$row1->EmpName;
				}

			    }
				else
				{

					$data['depname']='--';


				}
				$data['change']='<input type="checkbox" name="chk"  Id="'.$row->Id.'" class="checkbox"  value="'.$row->Id.'" >';


			 //    $sql2 = $this->db->query("SELECT `UserName`,`Password`,CreatedDate FROM `DepartmentLogin` where `department`=$row->Id And OrganizationId = $orgid");
                   
    //            $data['username'] = "";
			 //   $data['pwd'] = "";
			 //   $data['date']="";
				// if($this->db->affected_rows()>0)
				// {
				// if($row2=$sql2->row())
				// {
				// 	// $data['dname'] = $row1[0]->EmployeeId;
				// 	// print_r($data['dname']);
					
				// 	$data['username'] = decode5t($row2->UserName);
				// 	$data['pwd'] = decode5t($row2->Password);
				// 	$data['date']=$row2->CreatedDate;
					
				// }

			 //    }
				// else
				// {

				// 	$data['username'] ='--' ;
				// 	$data['pwd'] = '--';
				// 	$data['date']='--';


				// }
				   

					// $data['username'] = decode5t($row->UserName);
					// $data['pwd'] = decode5t($row->Password);
					// $data['date']=$row->CreatedDate;
					$data['name']=$row->Name;
					// $data['dname']=$row->FirstName;
					//$data['cdate']=$row->CreatedDate;
					//$data['mdate']=$row->LastModifiedDate;
					$data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
					Inactive</div>';
					if($row->Name == 'Trial Department')
					{
					$data['action']='<center><a href="#"><i class="upDept fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateDept" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
					data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign" ></i> </center>';
				    }
				    elseif($row->archive==0)
				    {
				    $data['action']='<center><a href="#" ><i class="material-icons edit" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
					 data-did="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-sts="'.$row->archive.'"
					 data-assign="'.departmentAssignAll($row->Id).'"
					data-target="#addDeptE">edit</i></a>
					
				   <i class="delete fa fa-trash" style="font-size:24px; color:purple;" data-toggle="modal" data-target="#delDept" data-did="'.$row->Id.'" data-dname="'.$row->Name.'" title="Delete" ></i>

				   <i class="upDept fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateDept1" data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign" ></i></center> ';	
				    }
				    else
				    {
				    $data['action']='<center><a href="#" ><i class="material-icons edit" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
					 data-did="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-sts="'.$row->archive.'"
					 data-assign="'.departmentAssignAll($row->Id).'"
					data-target="#addDeptE">edit</i></a>
					
				   <i class="delete fa fa-trash" style="font-size:24px; color:purple;" data-toggle="modal" data-target="#delDept" data-did="'.$row->Id.'" data-dname="'.$row->Name.'" title="Delete" ></i>
				   <i class="upDept fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateDept" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
					data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign" ></i></center> ';	
				    }
					$res[]=$data;
			}  	
			$d['data']=$res;
			 $this->db->close();
			echo json_encode($d); return false;
		}

    public function registerDept(){
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$dna=isset($_REQUEST['dna'])?$_REQUEST['dna']:'';
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$date=date('Y-m-d');
			$res=0;
			$query = $this->db->query("select Id from `DepartmentMaster` where Name LIKE ? and OrganizationId=?  ",array($dna,$orgid));
			if($query->num_rows()>0)
				$res=2; // Dept Name already exist already exist
			else{
			$query = $this->db->query("INSERT INTO `DepartmentMaster`(`Name`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `OrganizationId`,`archive`) VALUES (?,?,?,?,?,?,?,?)",array($dna,$date,$id,$date,$id,$id,$orgid,$sts));
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
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> department has been <b> added</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			 
			}
			}
			echo $res;
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

            //$getdeptname=getDepartment($did);

            // if($getdeptname == 'Trial Department')
            // {
            // 	echo 6;
            // 	return false;
            // }


           //else
            //{

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
    public function getemployeebydept() {
		$result = array();
		
		$data = array();
		 $orgid=$_SESSION['orgid'];
		 $deptid=isset($_REQUEST['deptid'])?$_REQUEST['deptid']:'';

		// $query = $this->db->query("SELECT Id From DepartmentMaster WHERE OrganizationId='$orgid' And archive='0' And Id=?",array($deptid));

		// if($this->db->affected_rows() > 0)
		// {
  //           echo '2';
  //           exit();
		// }
		
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
    /////////////////////designations
		public function getAllDesg(){
			$orgid=isset($_SESSION['orgid'])?$_SESSION['orgid']:0;
			 $query = $this->db->query("SELECT `Id`, `Name`,Description, `CreatedDate`,  `LastModifiedDate`,`archive` FROM `DesignationMaster`  WHERE OrganizationId=? order by name",array($orgid));
			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
			{
				    $data=array();
					$data['name']=$row->Name;
			
					// var_dump($attsts);
					$data['desc']=$row->Description;
					$data['cdate']=date('Y-m-d',strtotime($row->CreatedDate));
					$data['mdate']=date('Y-m-d',strtotime($row->LastModifiedDate));
					$data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
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
					$res[]=$data;
			}  	
			$d['data']=$res; 
           $this->db->close();			//$query->result();
			echo json_encode($d); return false;
		}	
	public function registerDesg(){
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$dna=isset($_REQUEST['dna'])?$_REQUEST['dna']:'';
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$desc=isset($_REQUEST['desc'])?$_REQUEST['desc']:0;
			$date=date('Y-m-d');
			$res=0;
			$query = $this->db->query("select Id from `DesignationMaster` where Name=? and OrganizationId=? ",array($dna,$orgid));
			if($query->num_rows()>0)
				$res=2; // Dept Name already exist already exist
			else{
			$query = $this->db->query("INSERT INTO `DesignationMaster`(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`,`Description`, `archive`) VALUES (?,?,?,?,?,?,?,?,?)",array($dna,$orgid,$date,$id,$date,$id,$id,$desc,$sts));
			$res= $this->db->affected_rows();
			 // $this->db->close();
			if($res>0){
				$query121 = $this->db->query("SELECT `Id`, `Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `Code`, `RoleId`, `HRSts`, `Description`, `archive`, `daysofnotice` FROM `DesignationMaster` WHERE Name='$dna' and OrganizationId='$orgid' ");
						if ($r=$query121->result()){
							$hname  = $r[0]->Name;
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> designation has been <b> added  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			}   
			}
			echo $res;
		}
    public function editDesg()
		{
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$dna=isset($_REQUEST['dna'])?$_REQUEST['dna']:'';
			$did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$desc=isset($_REQUEST['desc'])?$_REQUEST['desc']:0;
			$date=date('Y-m-d');
			$res=0;
			$query = $this->db->query("select Id from `DesignationMaster` where Name=? and OrganizationId=? and Id != ?",array($dna,$orgid,$did));
			if($query->num_rows()>0)
				$res=2; // Dept Name already exist already exist
			else{
			$query = $this->db->query("UPDATE `DesignationMaster` SET `Name`=?,Description=?,`LastModifiedDate`=?,`LastModifiedById`=?,`archive`=? where id=? ",array($dna,$desc,$date,$id,$sts,$did));
			$res=$this->db->affected_rows();	
			 // $this->db->close();
			if($res>0){

				$query121 = $this->db->query("SELECT `Id`, `Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `Code`, `RoleId`, `HRSts`, `Description`, `archive`, `daysofnotice` FROM `DesignationMaster` WHERE Name='$dna' and OrganizationId='$orgid' ");
						if ($r=$query121->result()){
							$hname  = $r[0]->Name;
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> designation has been <b> Updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
				}
			}
			echo $res;
		}
    public function deleteDesg()
		{
			$orgid=$_SESSION['orgid'];
			$did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
			$data=array();
			$data['afft']=0;

            // $getdesgname=getDesignation($did);
            // if($getdesgname == 'Trial Designation')
            // {
            //  echo 6;
            //  return false;
            // } 
            // else
            // {

           $query121 = $this->db->query("SELECT `Id`, `Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `Code`, `RoleId`, `HRSts`, `Description`, `archive`, `daysofnotice` FROM `DesignationMaster` WHERE Id='$did' and OrganizationId='$orgid' ");

			$query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.Designation=? and OrganizationId=? and Is_Delete != 2",array($did,$orgid));
			$data['emp']=$query->num_rows();

			// $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.Desg_id=? and OrganizationId=?",array($sid,$orgid));
			// $data['atarc']=$query->num_rows();
			
			 if($data['emp']==0){
				$query = $this->db->query("DELETE FROM `DesignationMaster` where id=? and OrganizationId=?",array($did,$orgid));
				$data['afft']=$this->db->affected_rows();

				if($data['afft']>0){


						if ($r=$query121->result()){
							$hname  = $r[0]->Name;
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> designation has been <b> Deleted  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
				}
			  } 

            //}

			 $this->db->close();
			echo json_encode($data);	
		}
     public function getemployeebydesg() {
		$result = array();
		
		$data = array();
		 $orgid=$_SESSION['orgid'];
		  $desgid=isset($_REQUEST['desgid'])?$_REQUEST['desgid']:'';
	    
		$sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and Designation!=? and archive=1 and Is_Delete=0 order by FirstName";
		// var_dump($sql);
		$query = $this->db->query($sql,array($orgid,$desgid ));
		
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

    public function SaveEmpdesgList() {
        $result = array();
        $data = array();
		$orgid=$_SESSION['orgid'];
		 $desgid=isset($_REQUEST['desgid'])?$_REQUEST['desgid']:'';
        
        
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 ){
					//print_r($emplistarr);
					$empid = $emplistarr[$i]['id'];
					$sql = "update EmployeeMaster set Designation=? where OrganizationId =? and Id=?";
					
					$query = $this->db->query($sql,array($desgid ,$orgid,$empid));
					//$count=$query->rowCount();
					
                }
            }
          
        $result["data"] =$data;
        return $result;
    } 
   public function getactiveStatus(){
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM Alert_Settings WHERE OrganizationId='$orgid'");
 	 return $sql->result();
   }
   public function getactiveVisitStatus()
   {
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM admin_login WHERE OrganizationId='$orgid'");
 	 return $sql->result();
   }
   
    public function getactiveAttStatus()
   {
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM admin_login WHERE OrganizationId='$orgid'");
 	 return $sql->result();
   }
   public function getoutsidefenceStatus(){
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM admin_login WHERE OrganizationId='$orgid'");
 	 return $sql->result();

 	}

 	public function image_status(){
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM licence_ubiattendance WHERE OrganizationId='$orgid' AND image_status ='1'");
 	// var_dump($this->db->last_query());
 	 return $sql->result();

 	}
	
	public function offline_status(){
		$orgid=$_SESSION['orgid'];
		$sql=$this->db->query("select * from admin_login WHERE OrganizationId='$orgid'");
		
		return $sql->result();
		
	}
	public function offline_update(){
		$orgid=$_SESSION['orgid'];
		$sql=$this->db->query("select * from licence_ubiattendance WHERE OrganizationId='$orgid'");
		
		return $sql->result();
		
	}
	public function ssdisapprove_status(){
		$orgid=$_SESSION['orgid'];
		$sql=$this->db->query("select * from admin_login WHERE OrganizationId='$orgid'");
		
		return $sql->result();
		
	}
 	public function attstatus()
   {
 	$orgid = $_SESSION['orgid'];
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    ///// getTimeZone /////
    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);
    ///// getTimeZone /////

	$this->db->query("update admin_login set AttnImageStatus='$sts' where OrganizationId=$orgid");

	if($this->db->affected_rows() > 0){


						
						
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Attendance Image Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					

	}
 }
  public function ssstatus()
 {
 	$orgid = $_SESSION['orgid'];
	$sts = isset($_REQUEST['ssatt'])?$_REQUEST['ssatt']:'';

    ///// getTimeZone /////
    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);
    ///// getTimeZone /////

	$this->db->query("update admin_login set ssdisapp_sts='$sts' where OrganizationId=$orgid");

	if($this->db->affected_rows() > 0){


						
						
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Attendance disapprove Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					

	}
 }
 public function visitstatus()
 {
 	$orgid = $_SESSION['orgid'];
 	$id = $_SESSION['id'];
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);

	$this->db->query("update admin_login set visitImageStatus='$sts' where OrganizationId=$orgid")
	;

	if($this->db->affected_rows() > 0){


						
						
			$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Visit Image Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

	   }
    }
 public function Addon_VisitPunch(){
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM licence_ubiattendance WHERE OrganizationId='$orgid' AND Addon_VisitPunch ='1'");
 	 //var_dump($this->db->last_query());
 	 return $sql->result();

 	}
	public function fencestatus(){

 	$orgid = $_SESSION['orgid'];
 	$id = $_SESSION['id'];
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);

	$this->db->query("update admin_login set fencearea='$sts' where OrganizationId=$orgid")
	;

	if($this->db->affected_rows() > 0){


						
						
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Fence Area Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
       }
   }
   
   public function offline_sts_update(){

 	$orgid = $_SESSION['orgid'];
 	$id = $_SESSION['id'];
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);

	$this->db->query("update licence_ubiattendance set Addon_offline_mode='$sts' where OrganizationId=$orgid")
	;

	if($this->db->affected_rows() > 0){


						
						
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Offline</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					

	}
 }
 public function frtstatus()
 {
 	$orgid = $_SESSION['orgid'];

 	

 	
	$frt = isset($_REQUEST['frt'])?$_REQUEST['frt']:'';
 // var_dump($frt);
	// die();
	$sts1 = isset($_REQUEST['frtatt1'])?$_REQUEST['frtatt1']:'';
	$dec = (float) "0.$sts1";
	// $sts2= number_format($sts1/100);
 //   var_dump($sts2) ;
  // die;
  
    ///// getTimeZone /////
    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);
    ///// getTimeZone /////

	$this->db->query("UPDATE Organization set FaceRecognitionRestriction='$frt' where Id=$orgid");
// var_dump($this->db->last_query());
// 	die();
	$this->db->query("UPDATE Organization set FaceRecognitionThrashhold='$dec' where Id=$orgid");
var_dump($this->db->last_query());
 //die();
	if($this->db->affected_rows() > 0){


						
						
			$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Face Recognition Setting</b>  has been <b>updated </b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
       }
 
    }
	
	public function FaceRecognitionRestriction(){
		$orgid=$_SESSION['orgid'];
		$sql=$this->db->query("SELECT FaceRecognitionRestriction from Organization WHERE Id='$orgid'");
		
		return $sql->result();
		
	}
	public function FaceR(){
		$orgid=$_SESSION['orgid'];
		$sql=$this->db->query("SELECT FaceRecognitionThrashhold from Organization where Id=$orgid");
		
		
		return $sql->result();
		
	}
	
	public function qrcodeselector(){
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$sna=isset($_REQUEST['sna'])?$_REQUEST['sna']:'';
			$res=0;
			$query = $this->db->query("select id from `admin_login` where Name=? and id =? and OrganizationId=?  ",array($sna,$id,$orgid));
			if($query->num_rows()>0)
				$res=2; // QR template already selected
			else
			{
			$qrselect=isset($_REQUEST['home'])?$_REQUEST['home']:'0';
			// echo $qrselect;

			$query = $this->db->query("update `admin_login` set qrselector = $qrselect  WHERE id=$id;");
			// var_dump($this->db->last_query());
			//$res= $this->db->affected_rows($query);
			$lsid = $this->db->insert_id();

			$res= $this->db->affected_rows($query);
		}
		$this->db->close();
		    echo $res;

		}
	public function getAllrates()
		{
			$orgid=isset($_SESSION['orgid'])?$_SESSION['orgid']:0;
			 $query = $this->db->query("SELECT `Id`,`Name`,Rate, `CreatedDate`,`LastModifiedDate`,`status` FROM `HourlyRateMaster`  WHERE OrganizationId = ? order by name",array($orgid));
			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
			{
				$data=array();
					// $data['name']=$row->Name;/*getName('DesignationMaster','Name','Id',$row->Name);*/
					$data['rate']=$row->Rate;
					$attsts = $this->getAttendanceStatusBYHourlyRateId($row->Id);
					$data['cdate']=date('Y-m-d',strtotime($row->CreatedDate));
					$data['mdate']=date('Y-m-d',strtotime($row->LastModifiedDate));
					$data['status']=$row->status==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
					Inactive</div>';
					$data['action']='<a href="#" ><i class="material-icons edit "style="font-size:26px;" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
					 data-did="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-sts="'.$row->status.'"
					 data-rate="'.$row->Rate.'"
					 data-attsts="'.$attsts.'"
					data-target="#addDesgE">edit</i></a>
					 <i class="delete fa fa-trash" style="font-size:24px; color:purple;" data-toggle="modal"
					 data-target="#delDesg" 
					 data-did="'.$row->Id.'" 
					 data-na="'.$row->Name.'"
					 data-rate="'.$row->Rate.'"
					  title="Delete" ></i>
					';
					$res[]=$data;
			}  	
			$d['data']=$res; 
           $this->db->close();			//$query->result();
			echo json_encode($d); return false;
		}

    public function addRate(){
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$rna=isset($_REQUEST['rna'])?$_REQUEST['rna']:'';
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$rate=isset($_REQUEST['rate'])?$_REQUEST['rate']:0;
			$date=date('Y-m-d');
			$res=0;
			$query = $this->db->query("select Id from `HourlyRateMaster` where Rate=? and OrganizationId=? ",array($rate,$orgid));
			if($query->num_rows()>0)
				$res=2; // Rate already exist already exist
			else{
			$query = $this->db->query("INSERT INTO `HourlyRateMaster`(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`,`Rate`, `status`) VALUES (?,?,?,?,?,?,?,?)",array($rna,$orgid,$date,$id,$date,$id,$rate,$sts));
			$res= $this->db->affected_rows();

			if($res > 0 ){
			 // $this->db->close();
			
			$query121 = $this->db->query("SELECT `Id`, `Name`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OrganizationId`, `Rate`, `status` FROM `HourlyRateMaster` WHERE Rate='$rate' and OrganizationId='$orgid' ");
						if ($r=$query121->result()){
							$hname  = $r[0]->Name;
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " New Hourly Rate <b>".$hname."</b>  has been <b> Added  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			}
		}
			echo $res;
		}
		
		
		public function editRate()
		{
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$rna=isset($_REQUEST['rna'])?$_REQUEST['rna']:'';
			$rid=isset($_REQUEST['rid'])?$_REQUEST['rid']:'';
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$rate=isset($_REQUEST['rate'])?$_REQUEST['rate']:0;
			$attensts=isset($_REQUEST['attsts'])?$_REQUEST['attsts']:0;
			// var_dump($attensts);
			$date=date('Y-m-d');
			$res=0;
			$query = $this->db->query("select Id from `HourlyRateMaster` where Rate=? and OrganizationId=? and Id !=?",array($rate,$orgid,$rid));
			if($query->num_rows()>0)
				$res=2; // Dept Name already exist already exist
			else{
			$query = $this->db->query("UPDATE `HourlyRateMaster` SET `Name`=?,Rate=?,`LastModifiedDate`=?,`LastModifiedById`=?,`status`=? where id=? ",array($rna,$rate,$date,$id,$sts,$rid));
			// var_dump($this->db->last_query());
			// die;
			$res=$this->db->affected_rows();	
			 // $this->db->close();
			if($res > 0){
				$query121 = $this->db->query("SELECT `Id`, `Name`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OrganizationId`, `Rate`, `status` FROM `HourlyRateMaster` WHERE Rate='$rate' and OrganizationId='$orgid' ");
						if ($r=$query121->result()){
							$hname  = $r[0]->Rate;
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           // echo $hname;
            // var_dump($hname);
           $actionperformed = "New Hourly Rate <b>".$hname."</b>  has been <b> Updated  </b>.";
           // var_dump($actionperformed);
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			}
			}
			echo $res;
		}
		
		
		public function deleteRate(){
			$orgid=$_SESSION['orgid'];
			$rid=isset($_REQUEST['rid'])?$_REQUEST['rid']:'';
			$data=array();
			$data['afft']=0;
			$query = $this->db->query("select id  from EmployeeMaster where EmployeeMaster.hourly_rate=? and OrganizationId=? and Is_Delete != 2",array($rid,$orgid));
			$data['emp']= $query->num_rows();
			 if($data['emp']==0){
			 $query1 = $this->db->query("select Id  from AttendanceMaster where AttendanceMaster.HourlyRateId=? and OrganizationId=?",array($rid,$orgid));
			 $data['emp']= $query1->num_rows();
				 
				 if($data['emp']==0)
				 {
				$query = $this->db->query("DELETE FROM `HourlyRateMaster` where id=? and OrganizationId=?",array($rid,$orgid));
				$data['afft']=$this->db->affected_rows();
				 }
			} 
			 $this->db->close();
			echo json_encode($data);	
		}
		
     
	public function getAttendanceStatusBYHourlyRateId($HourlyRateId){
	$orgid=isset($_SESSION['orgid'])?$_SESSION['orgid']:0;

	$query=$this->db->query("SELECT count(Id) as count from AttendanceMaster WHERE HourlyRateId=$HourlyRateId AND OrganizationId = $orgid");
	// var_dump($this->db->last_query());
	$data=0;
	if($row = $query->row()){
		$data = $row->count;
	}
	return $data;

    }
    public function deleteLocation()
  {
		$orgid=$_SESSION['orgid'];
		$did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
		$data=array();
		$zone=getTimeZone($orgid);
        date_default_timezone_set($zone);
		$data['afft']=0;
		$query121 = $this->db->query("SELECT `Id`, `Name`, `Lat_Long`, `Location`, `Radius`, `archive`, `OrganizationId`, `Status`, `LastModifiedById`, `LastModifiedDate` FROM `Geo_Settings` WHERE Id=$did ");
		$query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.area_assigned=? and OrganizationId=? and Is_Delete != 2",array($did,$orgid));
		$data['emp']=$query->num_rows();

		// $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.areaId=? and OrganizationId=?",array($sid,$orgid));
		// 	$data['ararc']=$query->num_rows();
		if($data['emp']==0)
		{
		$query = $this->db->query("DELETE FROM `Geo_Settings` where id=? and OrganizationId=?",array($did,$orgid));
		$data['afft']=$this->db->affected_rows();
		if($data['afft'] > 0){
			       if ($r=$query121->result()){
				   $name  = $r[0]->Name;
                   $date = date("y-m-d H:i:s");
				   $orgid =$_SESSION['orgid'];
				   $id =$_SESSION['id'];
				   $module = "Settings";
				   $actionperformed = " <b>".$name." Geo Location</b> has been <b>Deleted</b> from <b> Geo Fence</b> ";
				   $activityby = 1;
				   
				    $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module,ActivityBy, ActionPerformed,adminid, OrganizationId) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$activityby,$actionperformed,$id,$orgid));
				}
		}
		}
		$this->db->close();
		echo json_encode($data);
  }	
    public function editLocation()
  {
	    $orgid = $_SESSION['orgid'];
		$did = isset($_REQUEST['did'])?$_REQUEST['did']:'';  
		$name = isset($_REQUEST['dna'])?$_REQUEST['dna']:''; 
		$radius = isset($_REQUEST['dra'])?$_REQUEST['dra']:''; 
		$status = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';
		$attstatus = isset($_REQUEST['attsts'])?$_REQUEST['attsts']:'';

        $zone=getTimeZone($orgid);
        date_default_timezone_set($zone);

        // echo $orgid;
        // echo $did;
        // echo $name;
        // echo $radius;
        // echo $status;
        // echo $attstatus;
	/*	$query1 = $this->db->query("select AttendanceStatus  from AttendanceMaster A where A.areaId=? and OrganizationId=? AND A.AttendanceStatus in (2,6,7)  ",array($did,$orgid));

        $count = $this->db->affected_rows();
        var_dump($this->db->last_query());
        die;

        foreach ($query1->result() as $key) {
        	$data=array();
        	 $data['att']=$key->AttendanceStatus;
        	 var_dump($data['att']);
        }*/

       
         $query = $this->db->query("UPDATE Geo_Settings set Name = '$name',Radius= '$radius',Status = '$status' where Id = '$did' AND OrganizationId = '$orgid' ");
       echo $this->db->affected_rows();
       if($this->db->affected_rows() > 0){
        
				 // if ($r=$query1->result()){
					//echo "hello";		
				 
				 	$date = date("y-m-d H:i:s");
				   $orgid =$_SESSION['orgid'];
				   $id =$_SESSION['id'];
				   $module = "Settings";
				   $actionperformed = "<b>Details</b> has been <b>Updated </b> for <b>".$name." Geo Location</b> ";
				   $activityby = 1;
				   
				 $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
				 //var_dump($this->db->last_query());
				 //die();
       }
       
  
			   
  }
  function getGeolocation()
  {
	  	      $orgid=$_SESSION['orgid'];
			 $query = $this->db->query("SELECT * FROM `Geo_Settings` WHERE OrganizationId=? ",array($orgid));
			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
				{
				$data=array();
				  $id = encode5t($row->Id);
					$data['name']= $row->Name;
					$attsts= $this->getAttendanceStatusBYAreaId($row->Id);
					$data['latlong']=$row->Lat_Long;
					$data['location']="<a href='http://maps.google.com/?q=$row->Lat_Long' target='_blank' title='Click to see location on map'>$row->Location;</a>";
					$data['radius']=number_format((float)$row->Radius, 2, '.', '');
					$data['status']=$row->Status==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
					Inactive</div>';
					$data['action']='<a href="#"><i class="material-icons edit" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
					 data-did="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-attsts="'.$attsts.'" 
					 data-radius="'.number_format((float)$row->Radius, 2, '.', '').'" 
					 data-sts="'.$row->Status.'"
					 
					data-target="#addDeptE">edit</i>
					</a>
				   <i class="delete fa fa-trash" style="font-size:24px; color:purple;" data-toggle="modal" data-target="#delDept" data-did="'.$row->Id.'" data-dname="'.$row->Name.'" title="Delete" ></i>
					<i class="upGeolocation fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateGeolocation" onclick="angular.element(this).scope().GetEmpList1(\''.$row->Id.'\')" 
					data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" 
					title="Assign" ></i>				   
					';
					$res[]=$data;
			}  	
			$d['data']=$res;
			 $this->db->close();
			echo json_encode($d); 
			return false;
  }
  public function getAttendanceStatusBYAreaId($areaid){
  	 $orgid=$_SESSION['orgid'];
  	 $query = $this->db->query("Select count(Id) as count from AttendanceMaster where areaId= $areaid and OrganizationId = $orgid");
  	 // var_dump($this->db->last_query());
  	 // die;
       $data = 0;
       if($row = $query->row())
       {
          $data = $row->count;
       }
       return $data;
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
	
	public function getemployeebygeolocation() {
		 
		$result = array();
		$data = array();
		 $orgid=$_SESSION['orgid'];
		  $geoid=isset($_REQUEST['geoid'])?$_REQUEST['geoid']:'';
		   //echo $geoid;

		    $sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and area_assigned!= ? and archive=1 and Is_Delete=0 order by FirstName";
		
		$query = $this->db->query($sql,array($orgid,$geoid));
		
			foreach($query->result() as $row)
			{
				$res = array();
				$res['id'] = $row->Id;
				$res['name'] = $row->EmployeeCode." - ".ucwords(strtolower($row->FirstName." ".$row->LastName));
				$res['empfname'] = $row->FirstName;
				$res['emplname'] = $row->LastName;
				$res['sts']=0;
				$data[] = $res;
			}
		$result["data"] =$data;
		return $result;
    }
	
	
	
	public function SaveEmpGeoList() {
        $result = array();
        $data = array();
		$orgid=$_SESSION['orgid'];
		 $geoid=isset($_REQUEST['geoid'])?$_REQUEST['geoid']:'';

		 $zone=getTimeZone($orgid);
         date_default_timezone_set($zone);
		 $today = date('Y-m-d');
         
        $query12112 = $this->db->query("SELECT `Id`, `OrganizationId`,`Lat_Long`,`Location`,`Radius`,`Name` FROM `Geo_Settings` WHERE  Id = '$geoid' ");
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 ){
					
					$empid = $emplistarr[$i]['id'];
					
					$sql = "update EmployeeMaster set area_assigned=? where OrganizationId =? and Id=?";
					
					$query = $this->db->query($sql,array($geoid,$orgid,$empid));

					if ($r=$query12112->result()){
					$sname  = $r[0]->Name;
					$id =$_SESSION['id'];
           
           $module = "Settings";
		   $date = date("y-m-d H:i:s");
           $actionperformed = " <b>".$sname."</b> geo location has been assigned to <b>".ucwords(getEmpName($empid))." </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
           //var_dump($this->db->last_query());
					}
                }
            }
          
        $result["data"] =$data;
        return $result;
    } 
	
	public function getnotificationsts(){
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM NotificationStatus WHERE OrganizationId='$orgid'");
 	 return $sql->result();
 }
 
 public function notification_sts_update(){
	$orgid = $_SESSION['orgid'];
 	$id = $_SESSION['id'];
 	//$payduenotificationsts=isset($_REQUEST['paydue'])?$_REQUEST['paydue']:'';
 	//$absentnotication=isset($_REQUEST['absent1'])?$_REQUEST['absent1']:'';
 	//$latenotification=isset($_REQUEST['late1'])?$_REQUEST['late1']:'';
 	$undertimenotification=isset($_REQUEST['undertime1'])?$_REQUEST['undertime1']:'';
 	$visitpunchnotification=isset($_REQUEST['visit1'])?$_REQUEST['visit1']:'';
 	$outsidefencenotification=isset($_REQUEST['outsidefence1'])?$_REQUEST['outsidefence1']:'';
 	$fakelocationnotification=isset($_REQUEST['fakelocation'])?$_REQUEST['fakelocation']:'';
 	$faceidregnotification=isset($_REQUEST['faceidreg1'])?$_REQUEST['faceidreg1']:'';
 	$faceiddissnotification=isset($_REQUEST['faceiddissapp1'])?$_REQUEST['faceiddissapp1']:'';
 	$suspiciousselfienotification=isset($_REQUEST['suspiciousselfie'])?$_REQUEST['suspiciousselfie']:'';
 	$suspiciousdevicenotification=isset($_REQUEST['suspiciousdevice1'])?$_REQUEST['suspiciousdevice1']:'';
 	$dissapprovedattnotification=isset($_REQUEST['dissapprovedatt'])?$_REQUEST['dissapprovedatt']:'';
 	$atteditnotification=isset($_REQUEST['attedit1'])?$_REQUEST['attedit1']:'';
 	$chagpwdnotification=isset($_REQUEST['changedpwd1'])?$_REQUEST['changedpwd1']:'';
 	$timeoffstartnotification=isset($_REQUEST['timeoffstart1'])?$_REQUEST['timeoffstart1']:'';
 	$timeoffendnotification=isset($_REQUEST['timeoffend1'])?$_REQUEST['timeoffend1']:'';

 	//$earlyleavnotification=isset($_REQUEST['earlyleav'])?$_REQUEST['earlyleav']:'';
 	//$misstimeoutnotification=isset($_REQUEST['misstimeout1'])?$_REQUEST['misstimeout1']:'';
 	//$timeoffbeyondnotification=isset($_REQUEST['timeoff1'])?$_REQUEST['timeoff1']:'';
 	

 	$undertimenotification1=bindec($undertimenotification);
 	$visitpunchnotification1=bindec($visitpunchnotification);
 	$outsidefencenotification1=bindec($outsidefencenotification);
 	$fakelocationnotification1=bindec($fakelocationnotification);
 	$faceidregnotification1=bindec($faceidregnotification);
 	//var_dump($faceidregnotification);
 	//var_dump($faceidregnotification1);
 	$faceiddissnotification1=bindec($faceiddissnotification);
 	//var_dump($faceiddissnotification);
 	//var_dump($faceiddissnotification1);
 	$suspiciousselfienotification1=bindec($suspiciousselfienotification);
 	$suspiciousdevicenotification1=bindec($suspiciousdevicenotification);
 	//var_dump($suspiciousdevicenotification);
 	//var_dump($suspiciousdevicenotification1);
 	$dissapprovedattnotification1=bindec($dissapprovedattnotification);
 	$atteditnotification1=bindec($atteditnotification);
 	$chagpwdnotification1=bindec($chagpwdnotification);
 	$timeoffstartnotification1=bindec($timeoffstartnotification);
 	$timeoffendnotification1=bindec($timeoffendnotification);
 	
 	//var_dump(bindec($absentnotication));
 	//var_dump(bindec($latenotification));


$query=$this->db->query("UPDATE `NotificationStatus` SET  `UnderTime` = $undertimenotification1, `Visit` = $visitpunchnotification1, `OutsideGeofence` = $outsidefencenotification1, `FakeLocation` = $fakelocationnotification1, `FaceIdReg` = $faceidregnotification1, `FaceIdDisapproved` = $faceiddissnotification1, `SuspiciousSelfie` = $suspiciousselfienotification1, `SuspiciousDevice` =               $suspiciousdevicenotification1, `DisapprovedAtt` = $dissapprovedattnotification1, `AttEdited` = $atteditnotification1, `ChangedPassword` = $chagpwdnotification1, `TimeOffStart` = $timeoffstartnotification1, `TimeOffEnd` = $timeoffendnotification1 WHERE OrganizationId = $orgid;");
//var_dump($this->db->last_query());
 	if($this->db->affected_rows() > 0){


						
						
			/* $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Mail Trigger Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id)); */
		}

  }
  public function addAlert()
 {
 	$orgid = $_SESSION['orgid'];
	$todate = date('Y-m-d');
	$time = isset($_REQUEST['time'])?$_REQUEST['time']:'';
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);

	$this->db->query("INSERT INTO `Alert_Settings`(`OrganizationId`,`Status`,`Time`,`Created_Date`) VALUES ('$orgid','$sts','$time','$todate') ON DUPLICATE KEY UPDATE Status='$sts',Time='$time'");
	if($this->db->affected_rows() > 0){


						
						
		   $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Daily Attendance Summary</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					

	}
 }
 
   public function getSendMailStatus()
   {
 	$orgid = $_SESSION['orgid'];
 	$sql = $this->db->query("select * FROM admin_login WHERE OrganizationId='$orgid'");
 	 return $sql->result();
   }
   public function mailtrigger_sts_update(){

 	$orgid = $_SESSION['orgid'];
 	$id = $_SESSION['id'];
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);

	$this->db->query("update admin_login set employee_mail_trigger='$sts' where OrganizationId=$orgid")
	
	;
/* var_dump($this->last_query());
die; */
	if($this->db->affected_rows() > 0){


						
						
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Mail Trigger Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					

	}
 }
 
   public function getAllActivity($postData = Null){

			$orgid=$_SESSION['orgid'];
			$adminid=$_SESSION['id'];
			///==========
			$q='';
			
			$draw = $postData['draw'];
			$start = $postData['start'];
			$rowperpage = $postData['length']; // Rows display per page
			$searchValue = $postData['search']['value'];
			$columnIndex = $postData['order'][0]['column']; // Column index
			$columnName = $postData['columns'][$columnIndex]['data']; // 
			$columnSortOrder = $postData['order'][0]['dir']; //asc or desc
			$range = "'".date('Y-m-d')."'"; 
		    $searchQuery = "";
				 	
		         if($searchValue != ''){
					$searchQuery = "  And (ActionPerformed like '%".$searchValue."%') ";}

				$query = $this->db->query("SELECT  Id ,LastModifiedDate AS LastModifiedDate, Module, LastModifiedById,ActionPerformed, OrganizationId , ActivityBY, adminid FROM  ActivityHistoryMaster where OrganizationId = ?  AND ActivityBy = 1 AND DATE(LastModifiedDate ) IN ( ".$range." )   ORDER BY LastModifiedDate DESC  ",array($orgid));
				$totalRecords = $query->num_rows();
			
				if ($searchQuery != '')
					$query = $this->db->query("SELECT  Id ,LastModifiedDate AS LastModifiedDate, Module, LastModifiedById,ActionPerformed, OrganizationId , ActivityBY, adminid FROM  ActivityHistoryMaster where OrganizationId = ? $searchQuery AND ActivityBy = 1 AND DATE(LastModifiedDate ) IN ( ".$range." )   ORDER BY LastModifiedDate DESC  ",array($orgid));
				$totalRecordwithFilter = $query->num_rows();
/* 					  var_dump($totalRecordwithFilter);
								 die();  */

				
					
				 
				 
				 
			$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';

			
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


		
			
			
				   $query = $this->db->query("SELECT  Id ,LastModifiedDate AS LastModifiedDate, Module, LastModifiedById,ActionPerformed, OrganizationId , ActivityBY, adminid FROM  ActivityHistoryMaster where  OrganizationId = ? $searchQuery  AND ActivityBy = 1  AND DATE(LastModifiedDate ) IN ( ".$range." )   ORDER BY LastModifiedDate  DESC  Limit $start,$rowperpage ",array($orgid));
                   
     				   
				}
		 
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

				 $query = $this->db->query("SELECT  Id ,LastModifiedDate AS LastModifiedDate, Module, LastModifiedById,ActionPerformed, OrganizationId , ActivityBY, adminid FROM  ActivityHistoryMaster where  OrganizationId = ? $searchQuery  AND ActivityBy = 1  AND DATE(LastModifiedDate ) IN ( ".$range." )   ORDER BY LastModifiedDate  DESC  Limit $start,$rowperpage ",array($orgid));
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
	  
	  public function emportDeg()
	{
		  //$result1 = array();
  			$errormsg = ""; $count = ""; $success = "";
  			$user_id = $_SESSION['id'];
  			$orgid = $_SESSION['orgid'];
  			$check=true;
  			$zone=getTimeZone($orgid);
  			date_default_timezone_set($zone);
  			$date=date('Y-m-d');
  			$file_name = "newdesignation.csv";
  			//$location = IMGURL."employee/$orgid/";
  			$location = "http://ubiattendance.zentylpro.com/ubiattnew1/uploads/employee/10/";
			
  			$fp = $location.$file_name;
  			$remark = "data insufficient";
  			$sts = 0;
  			$i = 0;
  			$count = 0;
  			$totalcount = 0;
  			if(($file = fopen($fp,'r')) !== FALSE)//select file //
  			 { 
  			 while(($data = fgetcsv($file,1000,",")) !== FALSE)//get the data of file//
  				{
			  $check=true;
  			  if($i>0)
  				{ 
  				$totalcount = $totalcount+1;
  				if($data[0] == "" || $data[0] == " "|| $data[0] == "'"|| $data[0] == "''"|| $data[0] == '""'|| $data[0] == "'"|| $data[0] == '"')	
  					{   
				    $data[0] = " ".$data[0];
					$sql2 = $this->db->query("INSERT INTO Temp_user_csv(Designation,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)",array($data[0],$orgid,$date,$sts,$user_id,$remark));
					
					$result = $this->db->affected_rows();
				
					if($result >0)
						{
						$check=false;
						}
					} 
  			
  			 if($data[0] != '')
  				{ 	
  	            $query = $this->db->query("select Id FROM DesignationMaster WHERE Name =? AND OrganizationId = ? ",array(trim($data[0]),$orgid));
  				if($query->num_rows() > 0){
  				 $check=false;
  				$remark1 = "Designation already exist.";
  				$sql2 = $this->db->query("INSERT INTO Temp_user_csv(Designation,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)",array($data[0],$orgid,$date,$sts,$user_id,$remark1));	
  			    }
  			}
 
  				
  				 if($check)
  				 {
					 $query= $this->db->query("INSERT INTO DesignationMaster(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`,`archive`) VALUES (?,?,?,?,?,?,?)",array($data[0],$orgid,$date,$user_id,$date,$user_id,1));
  				    $count++;
					
  			     }
			  }
			   $i++;
  		  }
  		  }

		$result1 = array("repeatemp"=>$totalcount, "importemp"=>$count, "sts"=>"true");
		$check=true;
		return $result1;
		//print_r($result1);
	}
	
	public function emportDep()
	 {
		   //$result1 = array();
  			$errormsg = ""; $count = ""; $success = "";
  			$user_id = $_SESSION['id'];
  			$orgid = $_SESSION['orgid'];
  			$check=true;
  			 $zone=getTimeZone($orgid);
  			date_default_timezone_set($zone);
  			$date=date('Y-m-d');
  			$file_name = "newdepartment.csv";
  			//$location = IMGURL."/ubiattnew1/employee/$orgid/";
  			$location = "http://ubiattendance.zentylpro.com/ubiattnew1/uploads/employee/10/";
			//var_dump($location);
			//die;
  			$fp = $location.$file_name;
  			$remark = "data insufficient";
  			$sts = 0;
  			$i = 0;
  			$count = 0;
  			$totalcount = 0;
  			if(($file = fopen($fp,'r')) !== FALSE)//select file //
  			 {
  			 while(($data = fgetcsv($file,1000,",")) !== FALSE)//get the data of file//
  				{ 
				  $check=true;
  			  if($i>0)
  				{ 
  				   $totalcount = $totalcount+1;
  					if($data[0] == "" || $data[0] == " "|| $data[0] == "'"|| $data[0] == "''"|| $data[0] == '""'|| $data[0] == "'"|| $data[0] == '"')	
  					{   
				        $data[0] = " ".$data[0];
						$sql1 = $this->db->query("INSERT INTO Temp_user_csv(Department,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)",array($data[0],$orgid,$date,$sts,$user_id,$remark));
						
						$result = $this->db->affected_rows();
					
						if($result >0)
						{
							$check=false;
						}
  			       } 
  			
  			 if($data[0] != '')
  				{ 	
  	            $query = $this->db->query("select Id FROM DepartmentMaster WHERE Name =? AND OrganizationId = ? ",array($data[0],$orgid));
  				if($query->num_rows() > 0){
  					 $check=false;
  					$remark1 = "Department already exist.";
  				$sql2 = $this->db->query("INSERT INTO Temp_user_csv(Department,OrganizationId,CreatedDate,Archive,createdBy,remark) VALUES (?,?,?,?,?,?)",array($data[0],$orgid,$date,$sts,$user_id,$remark1));	
  			
  			     }
  			  }
 
  				
  				 if($check)
  				 {
  				   $query = $this->db->query("INSERT INTO DepartmentMaster(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`,`archive`) VALUES (?,?,?,?,?,?,?)",array($data[0],$orgid,$date,$user_id,$date,$user_id,1));
				   $count++;
  			     }
			  }
			   $i++;
  		  }
  		  }

		$result1 = array("repeatemp"=>$totalcount, "importemp"=>$count, "sts"=>"true");
		$check=true;
		return $result1;
	}
	public function getEmpotTmpDes(){
   	
			$orgid = $_SESSION['orgid'];
			$date = date('y-m-d');
			$res = array();
			$d = array();
		$query	=$this->db->query("select CreatedDate,Designation,Department,remark FROM Temp_user_csv WHERE CreatedDate='$date' AND OrganizationId='$orgid' ");
		foreach($query->result() as $row)
		{	$data = array();
			
			$data['desg'] = $row->Designation;
			
			$data['deprt'] = $row->Department;
					
			$data['Date'] = date('d-m-Y',strtotime($row->CreatedDate));
			$data['remark'] = $row->remark;
			$res[] = $data;
		}
			$d['data'] = $res;
			echo json_encode($d);
			
		}
		public function getEmpotTmp(){
      $orgid = $_SESSION['orgid'];
      $date = date('y-m-d');
      $res = array();
      $d = array();
    $query  =$this->db->query("select FirstName,CreatedDate,Designation,Department,Shift,PersonalNo,email,EmployeeCode,remark FROM Temp_user_csv WHERE CreatedDate='$date' AND OrganizationId='$orgid' ");
    
    foreach($query->result() as $row)
    { $data = array();
      $data['fname'] = $row->FirstName;
      //$data['lname'] = $row->LastName;
      $data['desg'] = $row->Designation;
      $data['deprt'] = $row->Department;
      $data['shift'] = $row->Shift;
      // var_dump( $data['shift']);
      $data['cont'] = $row->PersonalNo;
      $data['email'] = $row->email;
      $data['ecode'] = $row->EmployeeCode;      
      $data['Date'] = $row->CreatedDate;
      $data['remark'] = $row->remark;
      $res[] = $data;
    }
      $d['data'] = $res;
      
      echo json_encode($d);
    }

 public function deleteTmp()
    {
        $orgid = $_SESSION['orgid'];
      $query=$this->db->query("DELETE FROM Temp_user_csv WHERE OrganizationId ='$orgid'");
      if($query >0)
      {
        return TRUE;
      }
    } 

   public function getmultiplestatus()
 {
 	$orgid = $_SESSION['orgid'];
	$todate = date('Y-m-d');
	$time = isset($_REQUEST['time'])?$_REQUEST['time']:'';
	$sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';

    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);

	$this->db->query("UPDATE ShiftMaster set MultipletimeStatus = $sts where OrganizationId = $orgid");
	
	
	if($this->db->affected_rows() > 0){
          
   		   $date = date("y-m-d H:i:s"); 
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
		   if($sts == 1){
           $actionperformed = " <b>Multiple time in/out </b>status has been <b>Enabled </b>";
		   }else{
			$actionperformed = " <b>Multiple time in/out </b>status has been <b>Disabled</b>";  
		   }
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					

	}
 }	
 
}
?>
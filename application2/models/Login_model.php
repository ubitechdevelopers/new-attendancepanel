<?php
class Login_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
		//include(APPPATH."PhpMailer/class.phpmailer.php");
    }
    public function login()
		{
			$data1=array(); 
			$username=isset($_REQUEST['username'])?$_REQUEST['username']:'';
			$remmberme=isset($_REQUEST['remmberme'])?$_REQUEST['remmberme']:'';
			$password=encrypt(isset($_REQUEST['password'])?$_REQUEST['password']:'');
			$query = $this->db->query("SELECT A.id,A.name ,A.OrganizationId,end_date,L.status,O.delete_sts,O.mail_varified FROM admin_login A,licence_ubiattendance L, Organization O WHERE A.username= '$username' and A.password='$password' and A.archive='1' and A.status = 1 and A.OrganizationId=L.OrganizationId and A.OrganizationId=O.Id and O.delete_sts='0' ");
			if($row=$query->result())
			{
				$_SESSION['p_status'] = $row[0]->status;// lic master 0 trial/ 1 paid
				$_SESSION['orgName']=getOrgName($row[0]->OrganizationId);	
				$_SESSION['Email']=getAdminEmail($row[0]->OrganizationId);
				//echo $_SESSION['Email'];
				$_SESSION['attendanceAdmin']=true;
				$_SESSION['orgid']=$row[0]->OrganizationId;
				$_SESSION['id']=$row[0]->id;
				$_SESSION['name']=ucfirst($row[0]->name);
				$_SESSION['specialCase']=$row[0]->OrganizationId==502?'RAKP':'common';
				$today = date('Y-m-d');
				$last_date = $row[0]->end_date;// lic master
				$mail_varified = $row[0]->mail_varified;// lic master
				if($mail_varified == 1){	
				if($today > $last_date)
				{   
					// $_SESSION['expirydate'] = 1;//admin out of expiry date
					// return 1;

					if($_SESSION['p_status'] == 0)
					{
					$_SESSION['expirydate'] = 1;//admin out of expiry date
					return 11;
				    }
				    elseif($_SESSION['p_status'] == 1)
					{
					$_SESSION['expirydate'] = 1;//admin out of expiry date
					return 12;
				    }
				  //  return 13;

				}
				else 
				{
					$_SESSION['expirydate'] = 0; //admin with in expiry date-- valid case
					 echo json_encode($query->result_array());
				}
			 }else{
				 
				 return 35;
			 }
			}
			else 
				return 0;
				
			
		}
				public function forgotpswd()
       {
			$org_id = $_SESSION['orgid'];
			$email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
			
			//$zone=getTimeZone($org_id);
            //   date_default_timezone_set($zone);
			if($email!='')
			{
            $query = $this->db->query("SELECT * FROM admin_login WHERE email= ? ", array($email));
			 if ($query->num_rows()>0){
				 if($row=$query->result()){	
				   $message="<html>
						<head>
						<title>ubiAttendance</title>
						</head>
						<body>
						<p>
						Your password reset link for ubiAttendance Web Admin Panel is <a href='".URL."cron/ijlprapfcb?ui=".encode5t($row[0]->email)."&ctr=".$row[0]->resetPassCounter."&orgid=".$row[0]->OrganizationId."'> here  </a>
					   </p>
					   <h5>Cheers</h5>
					   <h5> Team ubiAttendance </h5>
					   </body>
					   </html>
					   ";
				    $headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					// More  headers
					$headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
					//$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
					$subject ="ubiAttendance- password reset link.";
					sendEmail_new($email,$subject,$message);
					sendEmail_new('shivani@ubitechsolutions.com',$subject,$message);	
					echo 2;
				 }
			 }
			 else
				 echo 0;
			}
					else
				 echo 1;			
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
}
?>
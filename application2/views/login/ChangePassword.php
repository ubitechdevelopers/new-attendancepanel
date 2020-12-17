<!doctype html>
<html lang="en">
<head>
	
<?php 
         $this->load->view('menubar/allnewcss');
         ?>
      <style type="text/css">
	<title>ubiAttendance</title>
	<style>
		.red{
			color:red;
			font-weight:'bold';
			font-size:16px;
		}
		.form-control{
			width: 100%;
			


		}
	</style>
</head>
<body>
	
		 <?php 
		$data['pageid']=1.1;
  $this->load->view('menubar/sidebar',$data);
     $this->load->view('menubar/navbar',$data);
   ?>
 
   <main class="main">
			<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                       <!--  <div class="card"> -->
	                           
								  
	                           <!--  </div> -->
	                            <div class="card-content">
									<div id="typography">
										
										<div class="row">
										<div class="col-md-3" ></div>
										<div class="col-md-6" style="top: 40px;">
										  <div class="tab-pane active" id="profile">
											<div class="form-group label-floating">
											  <label class="control-label" for="inputsm">Current Password</label>
											  <input class="form-control input-sm" id="cpassword"  type="password"  >
											  <span id="cpassword_error" class="error_form"></span>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label" for="inputsm">New Password</label>
											  <input class="form-control input-sm" id="npassword"  type="password"  >
											  <span id="npassword_error" class="error_form"></span>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label" for="inputsm">Confirm password</label>
											  <input class="form-control input-sm" id="rtpassword"   type="password"  >
											  <span id="rpassword_error" class="error_form"></span>
											</div>
											
                                            <center>
                                            <button class="btn btn-md btn-success"  id="ChangePassword" type="button" style="width: 100%; height: 40px;">Change Password</button></center>	

										</div>
										</div>
										<div class="col-md-3" ></div>
										
											<!--<table id="example" class="display table" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>Name</th>
													<th>UserName</th>
													<th>Designation</th>
													<th>Shift</th>
													<th>Department</th>
													<th>Contact</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
										</table>-->
										</div>
									</div>
	                            </div>
	                      <!--   </div> -->
	                    </div>
	                </div>
	            </div>
	        </div>

	       
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						
					</nav>
					<!--<p class="copyright pull-right" style="padding-right:25px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a></p>-->
			 <!--  <a href="http://www.ubitechsolutions.com/" target="_blank" >
					<p class="copyright pull-right" style="padding-right:25px;" >
					Copyright &copy;<script>document.write(new Date().getFullYear())</script>
					Ubitech Solutions. All rights reserved.
					</p>
				</a> -->
				</div>
			</footer>
		</main>
	<!-- 	</div> -->
	</div>

</body>
<?php 
         $this->load->view('menubar/allnewjs');
         ?>
  

	<script>
  $("#ChangePassword").click(function () {
           var cpassword = $('#cpassword').val();
		var npassword =  $('#npassword').val().trim();
		var rtpassword =  $('#rtpassword').val().trim();
            //alert(npassword);
           if(cpassword == ""){
			 $('#cpassword').focus();
			 $("#cpassword_error").html("Please enter Current password");
                $("#cpassword_error").css("color", "#F90A0A");
                $("#cpassword_error").show();
                $("#cpassword").css("border", "2px solid #F90A0A");
                return false;
			//doNotify('top','center',3,'Please enter Current password.');
			
			//return false;
		}
		if(npassword.length < 6){
			$('#npassword').focus();
			$('#npassword').val(npassword);
			 $("#npassword_error").html("Password must contains at least 6 characters");
                $("#npassword_error").css("color", "#F90A0A");
                $("#npassword_error").show();
                $("#npassword").css("border", "2px solid #F90A0A");
			//doNotify('top','center',3,'Password must contains at least 6 characters');

			return false;
		}
		if(rtpassword == ""){
			$('#rtpassword').focus();
			$('#rtpassword').val(rtpassword);
			 $("#rpassword_error").html("Please Enter Confirm Password");
                $("#rpassword_error").css("color", "#F90A0A");
                $("#rpassword_error").show();
                $("#rpassword").css("border", "2px solid #F90A0A");
			//doNotify('top','center',3,'Please Enter Confirm Password');
			return false;
		}
		
		if(npassword != rtpassword){
			$('#npassword').focus();
			$('#rtpassword').focus();
			$("#rpassword_error").html("New password and re-type password should be same.");
                $("#rpassword_error").css("color", "#F90A0A");
                $("#rpassword_error").show();
                $("#rpassword").css("border", "2px solid #F90A0A");
			//doNotify('top','center',4,'New password and re-type password should be same.');
			return false;
		}
		

          $.ajax({url: "<?php echo URL;?>Dashboard/updatePassword",
						data: {"cpassword":cpassword,"npassword":npassword,"rtpassword":rtpassword},
						success: function(result){
							
							if(result == 1){
								doNotify('top','center',2,'Password changed successfully.');
								//alert("successfully changed password");
			                    setTimeout(location.reload.bind(location), 1000);
							}else{
								//doNotify('top','center',4,'Please enter valid current password.');
								//alert("Please enter valid current password");
			                    //setTimeout(location.reload.bind(location), 1000);
			                     $('#cpassword').focus();
			 $("#cpassword_error").html("Please enter valid current password ");
                $("#cpassword_error").css("color", "#F90A0A");
                $("#cpassword_error").show();
                $("#cpassword").css("border", "2px solid #F90A0A");
                return false;
							} 								
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
							//alert("unable to  connect api");
						 }
				   });
			
		 
	  })
    </script>
</html>

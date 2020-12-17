<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ubiattendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    	
</head>
<style>
body{
	    font-family: "Poppins", sans-serif;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    background-color: white;
}
.input-field{
margin-top: 20px;
    width: 100%;
    height: 50px;

  
    border-radius: 7px;
    font-size: 14px;
padding: 8px 20p}
.logo{
	width:130px;
	/*height: 103px;*/
	margin-left:10%;
}
#login{
	    width: 100%;
    background-color: #3fae3e;
    border: #3fae3e;
    padding: 12px 0px 12px 0px; 
    background-color: #;
   
}
#sign-up{
	font-size:14px;
}
.illustration{
	/*margin-left:20%;*/

}
</style>
<body style="height: 100vh;">

<div class="container-fluid">
  <div class="row">
          <div class="col-lg-2 col-md-2">
            
          </div>
		  <div class="col-lg-4 col-md-4 mt-3">
            <div class="logo-container">
              <img class="logo" src="<?=URL;?>../assets/image/logo.png" alt="">
          </div>
          </div>
           <div class="col-lg-6 col-md-6">
           </div>
        </div>
        <br>
        <br>
  <div class="row">
  <div class="col-lg-1 col-md-1"></div>
  <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
  <h3 style="font-weight: 700;line-height: 1.2;">Login</h3>
  
			 	<?php
			 	$d = $this->input->get('username');
			 	$p=decrypt($this->input->get('pwd'));

			 	?>
  <form id="form">
  <?php if($d == NULL) {?>
    <div class="form-group">
      
	  <input type="text" class="form-control input-field" placeholder="Enter Username" id="uname" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>" required>
    </div>
   <!--  <div class="form-group">
     <input type="password" class="form-control input-field" placeholder="Enter Password" id="psw" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>" required><span id="eyeBtn" ><i style=" position: relative;left: 380px;top: -40px;" id="eye" class="fa fa-eye-slash"></i></span></span>
     
    </div> -->
    <div class="input-group mb-3">
                          <input type="password" class="form-control"  name="password"  id="psw" placeholder="Enter Password"value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>" required style="margin-top: 20px;height: 50px;border-radius: 7px 0px 0px 7px;font-size: 14px; border-right: none;">
                          <div class="input-group-append">
                            <span class="input-group-text" id="eyeBtn" style="border-radius: 0px 7px 7px 0px;margin-top: 20px;height: 50px; border-left: none;background-color: white;"><i  id="eye" class="fa fa-eye-slash"></i></span>
                          </div>
                        </div>
	<?php } else {  ?>
	<div class="form-group">
      
	  <input type="text" class="form-control input-field" placeholder="Enter Username" id="uname" value="<?php echo $d ?>" required>
    </div>
 
    					<div class="input-group mb-3">
                          <input type="password" class="form-control input-field" placeholder="Enter Password" id="psw" value="<?php echo $p ?>" required>
                          <div class="input-group-append">
                            <span id="eyeBtn" ><i id="eye" class="fa fa-eye-slash"></i></span>
                          </div>
                        </div>


	<?php } ?>
    <div id="remember-me" class="form-check ">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1" >
                    Remember Me
                  </label>
                  <a class="forget-password" style="float: right;font-weight: 600;color: #3FAE3E;" href="login/forgotpswd">Forget Password</a>
                </div><br><br>
    <button class="btn btn-primary" id="login">Login</button>
  </form>
  <form id="form1" style="display:none;" >
  <div class="imgcontainer">
    <img src="<?=URL?>../assets/img/newlogo.png" alt="Ubitech" height="110px" width="110px"/>
  </div>
  <div class="container">
    <!-- <label><b>Enter your registered email id.  </b></label> -->
    <input type="text" placeholder="Enter email Id" id="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" required >

    <div class="col-sm-6">
    <button id="submit1" style="background-color: transparent!important;color: orange!important;border: 1px solid orange!important;border-radius: 3px;position: relative;
    padding: 10px 20px ;
    margin: 10px 1px;
    font-size: 12px;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: 0;
    will-change: box-shadow, transform;
    transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);" >Back</button>
</div>
<div class="col-sm-6">
    <button id="submit" style="border: none;height:38px;
    border-radius: 3px !important;
    position: relative !important;
    padding: 10px 20px !important;
    margin: 10px 1px !important;
    font-size: 12px !important;
    font-weight: 400 !important;
    text-transform: uppercase !important;
    letter-spacing: 0 !important;
    will-change: box-shadow, transform !important;
    transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;">Submit</button>
</div>
	  
	  <!--onclick="history.go(-1)"-->
    <!--<input type="checkbox" checked="checked"> Remember me-->
  </div>
  <div class="container" style="background-color:#f1f1f1;">
    <span> 
		<p>
			&copy; <?php echo date('Y');?>, Ubitech Solutions Pvt Ltd, All Rights Reserved
		</p>
	</span>
  </div>
</form>
  <br>
  <center><p id="sign-up" style="color: rgba(0, 0, 0, 0.32);">Don't have an account? <a href="https://ubiattendance.com/signup.php"><span style="color:#3fae3e"><b>Sign up!</b></span></a></p></center>
  
  </div>
  
 <!--  <div class="col-lg-1 col-md-1">
  </div> -->
  <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
  <div class="illustration text-center" >
                    <img src="<?=URL?>../assets/image/attendance_illustration.svg" alt=""style="width: 29.2rem;" >
                </div>
             
               
  </div>
  
  </div>
 

   

</div>


</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
        

	<script>
	$(function(){
	  
		$('#login').click(function(){
			
			     var remmberme = 0	;
				if($("#remmberme"). prop("checked") == true)
				{
					remmberme = 1;
				}
				// alert("as");
			    var username=$('#uname').val();
			    var password=$('#psw').val();
				var expsts = '<?php isset($_SESSION['expirydate'])?$_SESSION['expirydate']:0;?>';
				var data = {username: username,password:password,remmberme:remmberme};
				$.ajax({
					url: '<?=URL?>login/login',
					type: 'post',
					data: data,
					dataType: 'json',
					success: function (data) {
						if(data == 0)
						{
							// $('#fMessage').fadeIn(2000);
							// alert("hello");
							
							doNotify('top','left',4,'Invalid Credentials');

							// alert("hello132");
						// if(data==3)
						}
						else if(data == 11)
						{
							location.replace("<?=URL?>buy");
						}
						else if(data == 12)
						{
							location.replace("<?=URL?>Upgrade");
						}
						else
						{
							console.log(JSON.stringify(data));

								if(data==35){
									//alert("hii");
									location.replace("<?=URL?>login/mailvarified");
								}
								else{
								location.replace("<?=URL?>Userprofiles/employeelist");
								}
							
						}
					},
					error: function(data){
					
					}
					
				});
			
			return false;
		});
		
		$('#submit').click(function(){
			  alert("as");
			    var email=$('#email').val();
			   
				
				var data = {email: email};
				$.ajax({
					url: '<?=URL?>login/forgotpswd',
					type: 'post',
					data: data,
					
					dataType: 'json',
				
					success: function (data) {
						//alert(data);
						 if(data == 0){
							 // alert("0");
							$('#fMessage1').fadeIn(1000);
							setTimeout(function() { $("#fMessage1").hide(); }, 4000);
						}
							else if(data == 2){
								// alert("2");
							$('#fMessage2').fadeIn(1000);
							setTimeout(function() { $("#fMessage2").hide(); }, 4000);
							 $("#submit").attr("disabled", true);
							
						}
						else if(data == 1)
							
							{
								
							$('#fMessage3').show();	

							setTimeout(function() { $("#fMessage3").hide(); }, 4000);
							}
							
						else{
							// alert("3");
							
						$('#fMessage1').fadeIn();
						setTimeout(function() { $("#fMessage1").hide(); }, 4000);
					
						}
							//location.replace("<?=URL?>dashboard"); 
					},
					error: function(data){
					//alert("3");
					}
					
				});
			
			return false;
		});
		$('.close').click(function(){
			$('.alert').fadeOut(1000);
			
		});
		$('#close1').click(function(){
			$('#alert1').fadeOut(1000);
			//$('#cont').fadeOut(1000);
		
		});
		$('#close2').click(function(){
			//$('.buyclose').fadeOut(1000);
		$('#cont').fadeOut(1000);
			
		});	
		$('#to-recover').click(function(){
			//$('.form1').fadeOut(1000); 
			 $(form1).show();
			  $(form).hide();
			  return false;
		});	
		
		$('#submit1').click(function(){
			  $(form).show();
			  $(form1).hide();
			  return false;
		});

		$('#eyeBtn').click(function(){
		
					view();
				});


	});

	function view() {
				var x = document.getElementById("psw");
				if (x.type === "password") {
					x.type = "text";
					$('#eye').removeClass('fa-eye-slash');
					$('#eye').addClass('fa-eye');
				} else {
					x.type = "password";
					$('#eye').removeClass('fa-eye');
					$('#eye').addClass('fa-eye-slash');
				}
			}

	
	</script>
</html>
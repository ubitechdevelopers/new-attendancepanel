<?php //echo $empid?><!DOCTYPE html>
<html>
<head>
<!-- Bootstrap core CSS     -->
    <link href="<?=URL?>../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

form {
       border: 3px solid #f1f1f1;
    }

@media only screen and (min-width: 501px) {
		form{
			margin-top:4%;
			width:400px!important;
		}
		.container{
			width:400px!important;
		}
		.alert{
	width:400px;
	}
}
input[type=text], input[type=password] 
{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #008067;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
button:disabled {
  color: #C0C0C0;
  background-color: grey;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px){
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
.alert{
	display:none;	
}
.alert1{
	display:none;	
}

.border-button {
  //border: solid 3px #d1a0ff;
  border: solid 3px red;
  transition: border-width 0.4s linear ;
}

.border-button:hover { border-width: 8px; }
#remmbermediv
{
	float:left;
}
.modal-header .close {
    margin-top: -2px;
    text-align: end;
}
.bttn{
margin-left: 178px;
}
.nav-s{
	padding-right:50px!important;
	padding-left:50px!important;
}

.acc {
    text-align: center;
    background-color: #40d89f;
    color: #d07272;
    padding: 4px 2px;
    border-radius: 40px;
    font-size: 20px;
    box-shadow: 1px 1px 5px #868686;
	margin-top: 12%;
	}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


<center>
		<!---------------------alert start--------------->
			 <div  class="alert alert-danger alert-dismissable fade in" id="fMessage">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Login Failed !  </strong> Invalid username or password.
			 </div>
			 <div  class="alert alert-danger alert-dismissable fade in" id="alert1">
				<a href="#" class="close" id="close1" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Login Failed !</strong> your subscription expired
				
			 </div>
			 
			 <div  class="alert alert-danger alert-dismissable fade in" id="fMessage1">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong> Failed !  </strong> Email id not registered.
			 </div>
			  <div  class="alert alert-success alert-dismissable fade in" id="fMessage2">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong> Success ! </strong> Password reset link sent successfully on your email.
			 </div>
			 <div  class="alert alert-danger alert-dismissable fade in" id="fMessage3">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong></strong> Please enter Email id.
			 </div>

			 	<?php
			 	$d = $this->input->get('username');
			 	$p=decrypt($this->input->get('pwd'));
			 	//$p=decode5t($this->input->get('pwd'));
			 	//var_dump($p);
				
				
				
			 

			 	?>
		<!---------------------alert end--------------->
<form id="form">
  <div class="imgcontainer">
    <img src="<?=URL?>../assets/img/newlogo.png" alt="Ubitech" height="110px" width="110px"/>
  </div>
   <div class="container">

  <?php if($d == NULL) {?>

 
    <label><b>Username</b></label> 
    <input type="text" placeholder="Enter Username" id="uname" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>" required>
	<p></p>
	<div></div>
	<label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>" required><span id="eyeBtn" ><i style=" position: relative;left: 152px;top: -40px;" id="eye" class="fa fa-eye-slash"></i></span></span>

	<?php } else {  ?>

		<label><b>Username</b></label> 
    <input type="text" placeholder="Enter Username" id="uname" value="<?php echo $d ?>" required>
	<p></p>
	<div></div>

	<label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" value="<?php echo $p ?>" id="psw" required><span id="eyeBtn" ><i style=" position: relative;left: 152px;top: -40px;" id="eye" class="fa fa-eye-slash"></i></span></span>

	<?php } ?>
    
	<!--<div id="remmbermediv" >
	<input type="checkbox" id= "remmberme"  name="remmberme" />
	<label>Remember me</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>-->

    <button id="login">Login</button> 	
	&nbsp;<a href="" id="to-recover" class="pointer pull-left " >Forgot password ? </a>
	<a href="https://www.ubihrm.com/attendance-app/sign-up" class="pointer pull-right" >Sign up </a>
    <!--<input type="checkbox" checked="checked"> Remember me-->
  </div>
  <div class="container" style="background-color:#f1f1f1;">
    <span> 
		<!--<p class="copyright pull-right" style="" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a>
            </p>-->
		<a href="http://www.ubitechsolutions.com/" target="_blank" >
			<p class="copyright pull-right" style="padding-right:25px;" >
			Copyright &copy;<script>document.write(new Date().getFullYear())</script>
			Ubitech Solutions. All rights reserved.
			</p>
		</a>
			
	</span>
  </div>
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

</br>
<div class="container border-button alert1 " id="cont" style="background-image:url(<?=URL?>../assets/img/bg10.jpg); font-size:20px; height:260px;
 font-family: Helvetica;">

<a href="#" class="close" id="close2" data-dismiss="buyclose" aria-label="close">&times;</a>
<div class="imgcontainer">
    <!--<img src="<?=URL?>../assets/img/logo.png" alt="Ubitech" height="60px" width="100px"/>-->
  </div>
<b Style="color:purple;">Continue your Attendance application </b></br>
</br>
    <p id="buy1"> If you want to increase your trial period..<a> Click here</a></p>
	<p id="buy2"> If you want to purchase this product..<a> Click here</a></p>
</div>



</center>

 <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> -->
    
      <!-- Modal content-->
     <!--  <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Account Verify</h4>
        </div>
        <div class="modal-body">
          <div class="row">
		  <div class="col-sm-4"><img src="<?=URL?>../assets/img/newlogo.png" style="margin-top:15%!important;" alt="Ubitech" height="120px" width="150px"/></div>
		  <div class="col-sm-8">  
		  <ul class="nav nav-tabs">
    <li class="active">
	<a data-toggle="tab" class="nav-s" href="#home">Verified Link</a></li>
    <li>
	<a data-toggle="tab" class="nav-s" href="#menu1">Update Email</a></li>
  </ul>

  <div class="tab-content" style="margin-top:15px">
    <div id="home" class="tab-pane fade in active">
	<div class="acc">
      <a href="#"style="color:white;text-decoration:none;" id="verifiyacc">Verify Your Account</a>
	  </div>
    </div>
    <div id="menu1" class="tab-pane fade">
	  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" placeholder="Enter Email Id" id="emailid"  required style="margin:0px!important;padding:10px 20px 10px 4px!important">
		
    </div> -->
      <!-- <input type="text" placeholder="Enter Email Id" id="emailid"  required>-->
	  <!-- <div class="row" style="text-align:right;margin-right:auto">
	  <div class="">
	  <button type="button" id="update" style="width:inherit;padding: 8px 50px" class="btn btn-success">Update</button>  -->
	  <!--<button type="button" id="update" style="width:inherit" class="btn btn-default">Cancel</button>-->
	 <!--  </div>
	 
	  </div>
	  
	  
    </div>
  </div></div> -->
		  <!-- </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="width:auto" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> -->
</body>
	<script src="<?=URL?>../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?=URL?>../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script>
	
	$(function(){
	  
		$('#login').click(function(){
			
			     var remmberme = 0	;
				if($("#remmberme"). prop("checked") == true)
				{
					remmberme = 1;
				}
				//alert("as");
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
						//alert(data);
						
						
						//alert(data);
						//return false;
						if(data == 0)
						{
							$('#fMessage').fadeIn(2000);
						}
						else if(data == 11)
						{
							location.replace("<?=URL?>buy");
							//$('#alert1').fadeIn(2000);
							//$('#cont').fadeIn(2000);
						}
						else if(data == 12)
						{
							location.replace("<?=URL?>Upgrade");
							//$('#alert1').fadeIn(2000);
							//$('#cont').fadeIn(2000);
						}
						else
						{
							console.log(JSON.stringify(data));
/* 							var data1=JSON.parse(JSON.stringify(data));
							if(data1[0]['mail_varified']==0){
								//alert("Please verifiy organization");
								$("#myModal").modal();
								
								$('#update').click(function(){
			 var id=data1[0]['id'];
			 var email=$('#emailid').val();
			 var data = {id: id,email: email};
			 $.ajax({
					url: '<?=URL?>login/updateemailid',
					type: 'post',
					data: data,
					
					dataType: 'json',
				
					success: function (data) {
						//doNotify('top','center',2,'Email Id updated successfully');
						if(data==3)
						alert("Email Id updated successfully");
						
					},
					error: function(data){
					alert("3");
					}
					
				});
			
			return false;
			 
		});
		$('#verifiyacc').click(function(){
			var id=data1[0]['id'];
			//alert(id);
			 var email=$('#emailid').val();
			 var data = {id: id,email: email};
			 $.ajax({
					url: '<?=URL?>login/verifyaccount',
					type: 'post',
					data: data,
					
					//dataType: 'json',
				
					success: function (data) {
						//alert(data);
						window.location.href="<?php echo URL?>services/activateAccount?iuser="+data;
						
						
					},
					error: function(data){
					//alert("3");
					}
					
				});
			
			//return false;
								});
							} */
							//else{
								if(data==35){
									//alert("hii");
									location.replace("<?=URL?>login/mailvarified");
								}
								else{
								location.replace("<?=URL?>Userprofiles/employeelist");
								}
							//}
						}
					},
					error: function(data){
					
					}
					
				});
			
			return false;
		});
		
		$('#submit').click(function(){
			  //alert("as");
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
	<script>
		
			
			
	</script>
</html>
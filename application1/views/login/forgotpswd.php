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
  <h3 style="font-weight: 700;line-height: 1.2;">Forget Password</h3>
  
			 
  <form id="form">

    <div class="form-group">
      
	 <input type="text" class="form-control input-field" placeholder="Enter email Id" id="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" required >
    </div>
    <button class="btn btn-primary" id="login">Submit</button>
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
  <center><p id="sign-up" style="color: rgba(0, 0, 0, 0.32);">Don't have an account? <a href="https://www.ubihrm.com/attendance-app/sign-up"><span style="color:#3fae3e"><b>Sign up!</b></span></a></p></center>
  
  </div>
  
 <!--  <div class="col-lg-1 col-md-1">
  </div> -->
  <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
  <div class="illustration text-center" >
                    <img src="<?=URL?>../assets/image/attendance_illustration.svg" alt=""style="width: 29.2rem;" >
                </div>
             
               
  </div>
  
  </div>
 

   <footer style="font-size: 14px;  font-family: 'Poppins', sans-serif; font-weight: 500;font-style: normal; text-align: center;bottom: 0; padding: 15px;color: #696969;">Copyright ©2020 Ubitech Solutions.</footer>

</div>

</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
						if(data == 0)
						{
							$('#fMessage').fadeIn(2000);
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

	
	</script>
</html>
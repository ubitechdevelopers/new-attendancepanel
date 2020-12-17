<!DOCTYPE html>
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
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
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
@media screen and (max-width: 300px) {
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

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<center>
		<!--alert start-->
			 <div  class="alert alert-danger alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Login Failed !  </strong> Invalid username or password.
			 </div>
		<!--alert end-->
  <?php
  //$orgid = $_SESSION['orgid'];
  //echo $orgid;
  $link =  $_SERVER['HTTP_HOST']; 
  
        //echo $link;
		$q1 = $this->db->query("SELECT * From WhiteLabeling where website='$link'  ");
		//var_dump($this->db->last_query());
		$data =array();
		foreach($q1->result() as $row){
			
			$website = $row->website;
			$loginbtn = $row->loginbtn;
			$logo = $row->logo;
			//echo $loginbtn;
			
			if($logo == ""){
				$logo ='../assets/img/newlogo.png';
						
			}
			else{
				$logo = $row->logo;
			}
			//echo $logo;
		}
		
		if($link == $website){
			 
  ?>	
		
<form>
<?php if( $website == "ubisales.zentylpro.com" ){?>
	<h3 style="color:#55aaff">Supervisor Portal</h3>
  <div class="imgcontainer">
    <img src="<?=URL?><?php echo $logo ?>" alt="Ubitech" style ="width : 20rem;"/>
  <?php }else{ ?>
  <h3 style="color:green">Supervisor Login</h3>
  <div class="imgcontainer">
   <img src="<?=URL?><?php echo $logo ?>" alt="Ubitech" height="110px" width="110px"/>
  <?php } ?>
 
  </div>
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username/Phone" id="uname" required>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" required><span id="eyeBtn" style="position: relative;left: 160px;right: 0;top: -40px;"><i id="eye" class="fa fa-eye-slash"></i></span>
	
    <button id="login" style="background-color :<?php echo $loginbtn ?>">Login</button>
    <!--<input type="checkbox" checked="checked"> Remember me-->
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <span> 
		<p>
			&copy; <?php echo date('Y');?>, Ubitech Solutions Pvt Ltd, All Rights Reserved
		</p>
	</span>
  </div>
</form>
<?php }else { ?>
<form>

  <h3 style="color:green">Supervisor Login</h3>
  <div class="imgcontainer">
   <img src="<?=URL?><?php echo $logo ?>" alt="Ubitech" height="110px" width="110px"/>
 
  </div>
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username/Phone" id="uname" required>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" required><span id="eyeBtn" style="position: relative;left: 160px;right: 0;top: -40px;"><i id="eye" class="fa fa-eye-slash"></i></span>
    <button id="login" style="background-color :#008067">Login</button>
    <!--<input type="checkbox" checked="checked"> Remember me-->
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <span> 
		<p>
			&copy; <?php echo date('Y');?>, Ubitech Solutions Pvt Ltd, All Rights Reserved
		</p>
	</span>
  </div>
</form>
<?php } ?>

</center>
</body>
	<script src="<?=URL?>../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?=URL?>../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script>
	$(function(){
		$('#login').click(function(){
		
			var username=$('#uname').val();
			var password=$('#psw').val();
				var data = {username: username,password:password};
				$.ajax({
					url: '<?=URL?>departmenthead/login123',
					type: 'post',
					data: data,
					dataType: 'json',
					success: function (data) {
					   
						if(!data){
							$('.alert').fadeIn(2000);
						}else
							location.replace("<?=URL?>departmenthead/present");
					},
					error: function(data){
						
					}
					
				});
			
			return false;
			
		});

		

		$('.close').click(function(){
			$('.alert').fadeOut(1000);
		});
	});
	</script>
	<script>

		$('#eyeBtn').click(function(){
			view();

			// alert();
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
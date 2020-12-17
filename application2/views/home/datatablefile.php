<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="author" content="colorlib.com">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Font Icon -->
        <link rel="stylesheet" href="<?= URL ?>../assets/fonts/themify-icons/themify-icons.css">
        <!-- custom css -->
        <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
        <!-- Main css -->
        <link rel="stylesheet" href="<?= URL ?>../assets/css/styleform.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
       <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/bootstrap-select/css/bootstrap-select.css" />
		
        
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/jquery.multiselect.css" />
        <link href="<?= URL ?>../assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>../assets/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/datepicker/datepicker3.css" />
		<style>
		         a:hover {
         color: black;
         text-decoration: none;
         }
         .a{
         text-decoration: none;
         color: black;
         font-size: 1rem;
         font-family: 'Poppins',sans-serif;
         font-weight: 600;
         }
         .subhead
         {font-size: 1.1rem;
         color: #828282;
         display: flex;
         cursor: pointer;
         text-decoration: none;
         font-weight: 600!important;
         font-family: 'Poppins',sans-serif;
         }
         
         body
         {
         font-family: 'Poppins',sans-serif;
         font-size: 14px;
         }
		</style>
		
    </head>

    <body>
	<?php 
	$this->load->view('menubar/sidebar');
	$this->load->view('menubar/navbar');
	?>
    <!-- /navbar -->

    <div class="main">

        <div class="row " id="addhead">
            <div class="col-6 col-sm-6 col-md-9 col-lg-10" ><a href="<?php echo URL; ?>Userprofiles/employeelist" ><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/l-arrow.png" class="mb-1"><b class="addemp1 ml-3">Employee List</b></i></a></div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-2" ><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/user.png"><b id="self" class="ml-2">Self Registration</b></i></div>
        </div><hr>
        <div class="container1">


            <form method="" id="signup-form" class="signup-form">
                <h3>

                    <span class="title_text">Personal Details</span>
                </h3>
                <fieldset>
                    <div class="row">
                        <div class="col-2 col-sm-4 col-md-4 col-lg-4"></div>
                        <div class="col-10  col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/profile.png" class="rounded-circle circle ml-3" alt="Cinque Terre"><br>
                                <span id="pencil" class="btn1"> <img  src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/pencil.png">&nbsp;&nbsp;Edit
                                    <input type="file"  name="profile" id="profile"  onchange="changeImgUpload1(this)" file-upload accept="image/*">
                                </span>
                            </div></div>
                        <div class="col-0 col-sm-4 col-md-4 col-lg-4"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label required">First Name</label>
                                <input type="text" name="first_name" id="first_name" />

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label">Employee ID (Optional)</label>
                                <input type="text" name="emp_id" id="first_name" />
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="phone" class="form-label required">Phone Number</label>
                                <input type="number" name="phone" id="phone" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email(Optional)</label>
                                <input type="email" name="email" id="email" />
                            </div>

                        </div>
                    </div><br>

                    <div class="form-group">
                        <label for="country" class="form-label required">Country</label>
                        <select name="country" id="user_name">
                            <option value="0">-Select-</option>
                            <?php
                            $data = json_decode(getAllCountries());
                            for ($i = 0; $i < count($data); $i++)
                                echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                            ?>
                        </select><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/b-arrow.png" id="b-arrow">
                    </div><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="password" class="form-label required ">Password</label>
                                <input type="password" name="password" id="password" class="active"><i class="fa fa-eye-slash" id="pswrd"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="password" class="form-label required">Confirm Password</label>
                                <input type="password" name="cpassword" id="cpassword" class="active"><i class="fa fa-eye-slash" id="cpswrd"></i>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>

                    <span class="title_text mb-4">Company Details</span>
                </h3>
                <fieldset>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="email" class="form-label required">Department</label>
                                <select name="department" id="department" value="0">
                                    <option value="0">-Select-</option>
                                    <?php
                                    $data = json_decode(getAllDept($_SESSION['orgid']));
                                    for ($i = 0; $i < count($data); $i++)
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    ?>
                                </select><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/b-arrow.png" id="b-arrow">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="phone" class="form-label required">Designation</label>
                                <select name="designation" id="designation">
                                    <option value="0">-Select-</option>
                                    <?php
                                    $data = json_decode(getAllDesg($_SESSION['orgid']));
                                    for ($i = 0; $i < count($data); $i++)
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    ?>
                                </select><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/b-arrow.png" id="b-arrow">
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="shift" class="form-label required">Shift</label>
                                <select name="shift" id="shift">
                                    <option value="0">-Select-</option>
                                    <?php
                                    $data = json_decode(getAllShift($_SESSION['orgid']));
                                    for ($i = 0; $i < count($data); $i++)
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    ?>
                                </select><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/b-arrow.png" id="b-arrow">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="date" class="form-label required">Date of Joining</label>
                                <input type="text" name="date" id="date" >
                            </div>
                        </div></div><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="Eleavepery" class="form-label required">Entitled Leave/Year</label>
                                <input type="number" name="Eleavepery" id="Eleaveperty" />
                            </div></div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="Eleavety" class="form-label required">Entitled Leave This Year</label>
                                <input type="number" name="Eleavety" id="Eleavety" />
                            </div></div></div><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="hourlyrate" class="form-label">Hourly rate(Optional)</label>
                                <input type="text" name="hourlyrate" id="hourlyrate" />
                            </div></div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="permission" class="form-label ">Permission</label>
                                <select name="permission" id="permission" >
                                    <option value='1' >Admin - <small>for App only</small>    </option>

                                    <option value='2' >Dept. Head
                                    </option>
                                    <option value='0' selected>User</option>
                                </select><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/b-arrow.png" id="b-arrow">

                            </div></div></div>


                </fieldset>

                <h3>

                    <span class="title_text">Geo Center</span>
                </h3>

                <fieldset>
                    <div class="row">

                        <div class=" col-md-8 col-lg-8 mt-3" style=""><b id="geo1">Restrict users to punch attendance within the Geo fence only?</b></div>
                        <div class=" col-md-4 col-lg-4 mt-3"> <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label></div>
                    </div><br>
                    <div class="row">
                        
                        <div class=" col-md-12 col-lg-12">
                            <div class="form-group">
                             
                                <select id="areaAssign" title="Please fill the required field" class="form-control selectpicker">
                                    <option value="0">-Select-</option>
                                    <?php
                                    $data = json_decode(getAllCountries());
                                    for ($i = 0; $i < count($data); $i++)
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    ?>
                                </select>
                                

                            </div></div>


                    </div>
                </fieldset>


            </form>
        </div>

    </div>
    <div class="footer">

    </div>

    <!-- JS -->
     <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>../assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= URL ?>../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?= URL ?>../assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?= URL ?>../assets/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="<?= URL ?>../assets/vendor/minimalist-picker/dobpicker.js"></script>
    <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.lwMultiSelect.js"></script>
    <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multiselect.js"></script>
    <script type="text/javascript" src="<?= URL ?>../assets/datepicker/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="<?= URL ?>../assets/js/main.js"></script>
    <script>
                                        $(document).ready(function () {
                                            $("#date").datepicker({dateFormat: 'yy-mm-dd'});

                                        });
    </script>

    <script type="text/javascript">
        // run pre selected options
        /*$('#areaAssign').multiSelect({
         
         });*/


        $(document).ready(function () {

            $('#areaAssign').lwMultiSelect({

                maxSelect: 10, //0 = no restrictions
                maxText: 'Available Geo-fence'
            });
        }); 
    </script>

    <script>
        var inputPass1 = document.getElementById('password'),
                icon = document.getElementById('pswrd');

        icon.onclick = function () {

            if (inputPass1.className == 'active') {
                inputPass1.setAttribute('type', 'text');
                icon.className = 'fa fa-eye';
                inputPass1.className = '';

            } else {
                inputPass1.setAttribute('type', 'password');
                icon.className = 'fa fa-eye-slash';
                inputPass1.className = 'active';
            }

        }
        var inputPass2 = document.getElementById('cpassword'),
                icon1 = document.getElementById('cpswrd');

        icon1.onclick = function () {

            if (inputPass2.className == 'active') {
                inputPass2.setAttribute('type', 'text');
                icon1.className = 'fa fa-eye';
                inputPass2.className = '';

            } else {
                inputPass2.setAttribute('type', 'password');
                icon1.className = 'fa fa-eye-slash';
                inputPass2.className = 'active';
            }

        }
    </script>
		 <script>
	  function changeImgUpload1(input)
		{
			if (input.files && input.files[0]) 
			{
			var reader = new FileReader();

			reader.onload = function (e) 
			{
				$('#imageAdd')
					.attr('src', e.target.result);
			};
		reader.readAsDataURL(input.files[0]);
	      }
		}
	  </script>
	   <script>
	  $(".pencil").click(function () 
	    {
			$("input[type='file']").trigger('click');
		});
		
	  </script>
</body>
</html>
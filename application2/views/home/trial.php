<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Sign Up Form</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="<?= URL ?>../assets/fonts/themify-icons/themify-icons.css">
<!-- custom css -->
        <link rel="stylesheet" href="<?=URL;?>../assets/scss/style.css">
        <!-- Main css -->
        <link rel="stylesheet" href="<?= URL ?>../assets/css/styleform.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
         <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/jquery.multiselect.css" />
         <link href="<?= URL ?>../assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>../assets/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/datepicker/datepicker3.css" />
    </head>
    <body>
    <!-- sideBar -->
        <div class="sidebar">
            <div class="logo-container">
                <img class="logo" src="<?=URL?>../assets/image/logo.png" alt="">
            </div>
            <a href="#contact">
            <div  class="side-item-container">
              <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/dashboard_icon.svg" alt=""> </span>  Dashboard
            </div>
        </a>
        <a href="<?=URL?>/Userprofiles/employeelist">
            <div id="active" class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/employee_icon.svg" alt=""> </span>    Employees
            </div>
        </a>
        <a href="#clients">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/attendance_icon.svg" alt=""> </span>   Attendances
            </div>
        </a>
        <a href="#clients">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/report_icon.svg" alt=""> </span> Reports
            </div>
        </a>
        <a href="#clients">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/client_icon.svg" alt=""> </span> Clients
            </div>
        </a>
        <a href="#clients">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/visits_icon.svg" alt=""> </span>  Visits
            </div>
        </a>
        <a href="#clients">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/leave_icon.svg" alt=""> </span> Leaves
            </div>
        </a>
        <a href="#clients">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets//icons/payroll_icon.svg" alt=""> </span> Payroll
            </div>
        </a>
        <a href="<?=URL?>/Managesettings">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets//icons/manage_icon.svg" alt=""> </span>   Manage
            </div>
        </a>
        <a href="<?=URL?>/Settings">
            <div class="side-item-container">
                <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/settings_icon.svg" alt=""> </span>   Settings
            </div>
        </a>


        </div>    
        
    <!-- /sideBar -->

    
    <!-- NavBar -->
      <nav class="navbar navbar-expand-md fixed-top justify-content-between">
            <div class="navbar-collapse dual-nav w-50 order-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a href="#">
                        <div style="position: static; text-align: center;" class="user">
                            <img src="<?=URL?>../assets/image/user_png.png" alt="" id="user-image" class="float-left-center">
                            <span id="username">Dayitava</span>
                        </div>
                    </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
  <!-- /navbar -->
        <div class="main">

            <div class="container">

                <form method="" id="signup-form" class="signup-form">
                    <h3>

                        <span class="title_text">Personal Details</span>
                    </h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-3">
                                <div class="form-group"></div>
                                <img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/profile.png" class="rounded-circle" alt="Cinque Terre"><br>
                                 <span class="btn1 fa fa-pencil ml-5 mt-3" style="color:purple;">
                                            <!--<input type="file"  name="profile" id="profile"  onchange="changeImgUpload1(this)" file-upload accept="image/*">-->
                                        </span>
                            </div>
                            <div class="col-4"></div>
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
                            $data = json_decode(getAllDesg($_SESSION['orgid']));
                            for ($i = 0; $i < count($data); $i++)
                                echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                            ?>
                            </select>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="password" class="form-label required">Password</label>
                                    <input type="password" name="password" id="password" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="password" class="form-label required">Confirm Password</label>
                                    <input type="password" name="cpassword" id="cpassword">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <h3>
                        
                        <span class="title_text">Company Details</span>
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
                                    </select>
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
                                    </select>
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
                                    </select>
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
                                    </select>

                                </div></div></div>


                    </fieldset>

                    <h3>

                        <span class="title_text">Geo Center</span>
                    </h3>
                    <fieldset>

                        <div class="form-group">
                            Geo Center<br>
                            <select id="areaAssign" title="Please fill the required field" class="form-control">
                                <option value="0">-Select-</option>
                                <?php
                                $data = json_decode(getAllCountries());
                                for ($i = 0; $i < count($data); $i++)
                                    echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                ?>
                            </select></option>
                            </select>

                        </div>
                    </fieldset>


                </form>
            </div>

        </div>
        <div class="footer">

        </div>

        <!-- JS -->
        
        <script src="<?= URL ?>../assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= URL ?>../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="<?= URL ?>../assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="<?= URL ?>../assets/vendor/jquery-steps/jquery.steps.min.js"></script>
        <script src="<?= URL ?>../assets/vendor/minimalist-picker/dobpicker.js"></script>
                <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.lwMultiSelect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multiselect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/datepicker/bootstrap-datepicker.js"></script>
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
    </body>
</html>
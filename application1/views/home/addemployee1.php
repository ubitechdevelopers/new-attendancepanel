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
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/bootstrap-select/css/bootstrap-select.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/jquery.multiselect.css" />
        <link href="<?= URL ?>../assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>../assets/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/datepicker/datepicker3.css" />

        <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
        <!--<link rel="stylesheet" type="text/css" media="all" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>-->


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

            .tab {
                display: none;
            }

            button {
                background-color: #4CAF50;
                color: #ffffff;
                height:2.5rem;
                width:6rem;
                border-radius: 4px;
                font-size: 13px;
                font-size:13px;
                cursor: pointer;
            }

            button:hover {
                opacity: 0.8;
            }

            #prevBtn {
                background-color: #bbbbbb;
            }
            .stepform{
                font-size:15px;
                font-family:poppins;
                font-weight:700px;
                color:black;
                display:block;
                padding: 14px 0px 12px 17px;
            }

        </style>

    </head>

    <body>
        <?php
        $this->load->view('menubar/sidebar');
        $this->load->view('menubar/navbar');
        $orgid = $_SESSION['orgid'];
        ?>

        <!-- /navbar -->

        <div class="main">

            <div class="row " id="addhead">
                <div class="col-6 col-sm-6 col-md-9 col-lg-10" ><a href="<?php echo URL; ?>Userprofiles/employeelist" ><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/l-arrow.png" class="mb-1"><b class="addemp1 ml-3">Add Employee</b></i></a></div>

                <div class="col-6 col-sm-6 col-md-3 col-lg-2" ><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/user.png"><b id="self" class="ml-2">Self Registration</b></i></div>
            </div><hr>
            <div class="container1">


                <form method=""  class="signup-form">
                    <div class="row mb-4 mt-3 ">
                        <div class="col-4">
                            <span class="activenew step1"  onclick="fieldset1()"><a href="#" class="stepform " ><b>Personal Details</b></a></span>
                        </div>
                        <div class="col-4">
                            <span class="step2" onclick="fieldset2()"><a href="#"class="stepform" ><b>Company Details</b></a></span>
                        </div>
                        <div class="col-4">
                            <span class="step3"onclick="fieldset3()"><a href="#"class="stepform" ><b>Geo Fence</b></a></span>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="row">
                            <div class="col-2 col-sm-4 col-md-4 col-lg-4"></div>
                            <div class="col-10  col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <img id="imageAdd" src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/profile.png" style="height:120px;width:120px; " class="rounded-circle circle ml-3" alt="Cinque Terre"><br>
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
                                    <input type="text" name="firstName" id="firstName"  class="alpha"/>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">Employee ID (Optional)</label>
                                    <input type="text" name="ecode" id="ecode" />
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label required">Phone Number</label>
                                    <input type="number" name="cont" id="cont" />
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
                            <select name="country" id="country">
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
                                    <label for="timezone" class="form-label required">Time Zone</label>
                                    <select id="timezone" name="timezone" class="form-control" >
                                        <option value="0" >-Select-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="password" class="form-label required">Password</label>
                                    <input type="password" name="password" id="password" class="active" value="123456" title="Password is initially set. It can be changed later on by the Admin or the Employee"><i class="fa fa-eye-slash" id="pswrd"></i>
                                </div>
                            </div>
                        </div>
                        <!--                        <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: 76%;">
                                                          <button type="button" name="submitbtn" class="form-group btn btn-success" id="submitbtn" style="width: 7rem;">Next</button>
                                                    </div>
                                                </div>-->
                    </div>


                    <div class="tab">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="dept" class="form-label required">Department</label>
                                    <select name="dept" id="dept">
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
                                    <label for="desg" class="form-label required">Designation</label>
                                    <select name="desg" id="desg">
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
                                    <label for="doj" class="form-label">Date of Joining</label>
                                    <input type="text" name="doj" id="doj" class="datepicker"  style="padding: 8px;">
                                </div>
                            </div></div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="entitledleave" class="form-label required">Entitled Leave/Year</label>
                                    <input type="number" name="entitledleave" id="entitledleave" value="<?php echo getLeave($orgid); ?>" onkeypress="if (this.value.length == 2)
                                                return false;" max="120" min='0'/>
                                </div></div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="balanceleave" class="form-label required">Entitled Leave This Year</label>
                                    <input type="text" name="balanceleave" id="balanceleave" disabled/>
                                </div></div></div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="hourlyrate" class="form-label">Hourly rate(Optional)</label>

                                    <select name="hourlyrate" id="hourlyrate" >
                                        <?php
                                        $data = json_decode(getAllRate($_SESSION['orgid']));
                                        for ($i = 0; $i < count($data); $i++)
                                            echo '<option value=' . $data[$i]->Id . '>' . $data[$i]->Rate . '</option>';
                                        ?>
                                    </select>
                                </div></div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="sstatus" class="form-label ">Permission</label>
                                    <select name="sstatus" id="sstatus" >
                                        <option value='1' >Admin - <small>for App only</small>    </option>

                                        <option value='2' >Dept. Head
                                        </option>
                                        <option value='0' selected>User</option>
                                    </select><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/b-arrow.png" id="b-arrow">

                                </div></div></div>
                        <!--  <div class="row">
                                                    
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 58%;">
                                                          <button type="button" name="submitbtn" class="form-group btn btn-success" id="submitbtn" style="width: 7rem;">Back</button>
                                                          <button type="button" name="submitbtn" class="form-group btn btn-success" id="submitbtn" style="width: 7rem;">Next</button>
                                                    </div>
                                                </div>-->

                    </div>



                    <div class="tab">
                        <div class="row">

                            <div class=" col-md-8 col-lg-8 mt-3" style=""><b id="geo1">Restrict users to punch attendance within the Geo fence only?</b></div>
                            <div class=" col-md-4 col-lg-4 mt-3"> <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label></div>
                        </div><br>
                        <div class="row">
                            <div class="col-xs-3 col-sm-2"></div>
                            <div class="col-xs-6 col-sm-8 col-md-12 col-lg-12">
                                <div class="form-group">

                                    <select id="areaAssign" title="Please fill the required field" class="form-control">
                                        <option value="0">-Select-</option>
                                        <?php
                                        $data = json_decode(getAllArea($_SESSION['orgid']));
                                        for ($i = 0; $i < count($data); $i++) {

                                            echo "<option value='" . $data[$i]->id . " selected'>" . $data[$i]->Name . "</option>";
                                        }
                                        ?>
                                    </select>


                                </div></div>
                            <div class="col-xs-3 col-sm-2"></div>

                        </div>
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="save" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="footer">

        </div>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript" src="<?= URL ?>../assets/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.lwMultiSelect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multiselect.js"></script>

        <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
        <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function nextPrev(n) {
  // alert('previous');
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1)
      // Hide the current tab:
      x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
      // ... the form gets submitted:
//      document.getElementById("signup-form").submit();
//      return false;
//save data//
alert('shakir');


            //alert ('<?php echo URL; ?>Userprofiles/insertUsermaster');
            var firstName = $('#firstName').val();
                    
                    var ecode = $('#ecode').val();
                    var cont = $('#cont').val();
                    var email = $('#email').val();
                    var country = $('#country').val();
                    var doj = $('#doj').val();
                    var doc = $('#doc').val();
                    var timezone = $('#timezone').val();
                    var password = $('#password').val();
                    var dept = $('#dept').val();
                    var desg = $('#desg').val();
                    var shift = $('#shift').val();
                    var entitledleave = $('#entitledleave').val();
                    var balanceleave = $('#balanceleave').val();
                    var hourlyrate = $('#hourlyrate').val();
                    var sts = 1;
                    // alert (sts);
                    var sts1 = $('#sstatus').val();
                    var areaAssign = $('#areaAssign').val();
                  alert (areaAssign);
                    var formdata = new FormData();
                    formdata.append('prof', $('#profile').prop("files")[0]);
                    formdata.append('firstName', firstName);
                    formdata.append('areaAssign', areaAssign);
                    formdata.append('doc', doc);
                    formdata.append('dept', dept);
                    formdata.append('desg', desg);
                    formdata.append('shift', shift);
                    formdata.append('sts', sts);
                    formdata.append('sts1', sts1);
                    formdata.append('country', country);
                    formdata.append('timezone', timezone);
                    //formdata.append('city', city);
                    formdata.append('email', email);
                    formdata.append('password', password);
                    //formdata.append('addr', addr);
                    formdata.append('PersonalNo', cont);
                    //formdata.append('ecode', ecode);
                    formdata.append('ecode', ecode);
                    formdata.append('hourlyrate', hourlyrate);
                    formdata.append('doj', doj);
                    formdata.append('entitledleave', entitledleave);
                    formdata.append('balanceleave', balanceleave);
                    $.ajax({
                    url: "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/insertUsermaster1",
                            // url: "<?php //echo URL;  ?>userprofilesnew/insertUsermasternew1",
                            processData: false,
                            contentType: false,
                            data:formdata,
                            //data: {"firstName": firstName,"ecode":ecode,"cont":cont,"email":email,"country":country,"dept":dept,"desg":desg,"shift":shift,
                            //"entitledleave":entitledleave,"hourlyrate":hourlyrate,"areaAssign":areaAssign},
                            datatype: "json",
                            type: "post",
                            success: function (result){
                            doNotify('top', 'right', 2, 'Employee added successfully');
                                    //window.location.reload();
                                    //$('#hourlyrate')[0].reset();
                                    if (result == 4) {
                            alert('Employee added successfully');
                                    // document.getElementById('signup-from').reset();
                            }
                            //  else if (result == 1) {
                            //  alert('Mail ID already exists');

                            //} else if (result == 2) {
                            //alert( 'Duplicate phone no. found');

                            //} else if (result == 3) {
                            //alert('Employee code is already exists');
                            //}
                            // else if(result == 5){
                            // 	alert('top','center',4,'dept head alrdy assign to this department');
                            // }
                            },
                            error:function(result){
                            alert('error');
                            }
                    });


  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}



function showTab(n) {
  //alert('button');
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  alert(x.length+'without if condition');
  alert(x.length - 1+'using -1')
  if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      alert(x.length);
  } else {
      document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
      
      document.getElementById("save").innerHTML = "Submit";
  } else {
      document.getElementById("save").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:

}
        </script>

        <script>
            $(document).ready(function () {
                var entitledleave = $('#entitledleave').val();
                //alert(entitledleave);
                var fiscalend = "<?php echo getFiscalEndDate($orgid) ?>";
                var doj = $('#doj').val();

                if (doj == '00/00/0000')
                {
<?php
$permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
if ($permis == 1) {
    ?>
                        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                        document.getElementById('balanceleave').value = "N/A";
                        // $("#MyElement").addClass("form group label-floating is-empty is-focused");
                        // $('#balanceleave').val(parseInt(balanceleave));
    <?php
}
?>
                } else
                {
                    var fiscalendmonth = fiscalend.substring(0, 2);
                    var joinmonth = doj.substring(0, 2);
                    var fiscalenddate = fiscalend.substring(3, 5);
                    var joindate = doj.substring(3, 5);
                    // alert(fiscalendmonth);
                    //alert(joinmonth); 

                    if (joinmonth > fiscalendmonth)
                    {
                        var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else if (joinmonth == fiscalendmonth && joindate > fiscalenddate)
                    {
                        var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else if (joinmonth == fiscalendmonth && joindate == fiscalenddate)
                    {
                        var newdoj = Number(doj.substr(doj.length - 4));
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else
                    {
                        var newdoj = Number(doj.substr(doj.length - 4));
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    }
                    var date1 = new Date(doj);
                    var date2 = new Date(fiscalenddata);
                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                    var bal1 = (entitledleave / 12);
                    var bal2 = (Difference_In_Days / 30.4167);
                    var balanceleave = bal1 * bal2;



<?php
$permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
if ($permis == 1) {
    ?>

                        // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                        document.getElementById('balanceleave').value = parseInt(balanceleave);
                        // $("#MyElement").addClass("form group label-floating is-empty is-focused");
                        $('#balanceleave').val(parseInt(balanceleave));

    <?php
}
?>
                }

            });


            $(document).on("change", "#entitledleave", function () {

                var entitledleave = $('#entitledleave').val();
                //alert(entitledleave);
                var fiscalend = "<?php echo getFiscalEndDate($orgid) ?>";
                var doj = $('#doj').val();

                if (doj == '00/00/0000')
                {
<?php
$permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
if ($permis == 1) {
    ?>
                        doNotify('top', 'center', 3, 'Please first select date of joining');
                        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                        document.getElementById('balanceleave').value = "N/A";
                        return false;
    <?php
}
?>
                } else
                {
                    var fiscalendmonth = fiscalend.substring(0, 2);
                    var joinmonth = doj.substring(0, 2);
                    var fiscalenddate = fiscalend.substring(3, 5);
                    var joindate = doj.substring(3, 5);
                    // alert(fiscalendmonth);
                    // alert(joinmonth); 

                    if (joinmonth > fiscalendmonth)
                    {
                        var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else if (joinmonth == fiscalendmonth && joindate > fiscalenddate)
                    {
                        var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else if (joinmonth == fiscalendmonth && joindate == fiscalenddate)
                    {
                        var newdoj = Number(doj.substr(doj.length - 4));
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else
                    {
                        var newdoj = Number(doj.substr(doj.length - 4));
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    }
                    var date1 = new Date(doj);
                    var date2 = new Date(fiscalenddata);
                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                    var bal1 = (entitledleave / 12);
                    var bal2 = (Difference_In_Days / 30.4167);
                    var balanceleave = bal1 * bal2;

                    //alert(balanceleave);

                    // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
                    // document.getElementById('balanceleave').value = parseInt(balanceleave);

<?php
$permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
if ($permis == 1) {
    ?>
                        // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                        document.getElementById('balanceleave').value = parseInt(balanceleave);
                        // $("#MyElement").addClass("form group label-floating is-empty is-focused");
                        $('#balanceleave').val(parseInt(balanceleave));
    <?php
}
?>
                }

            });


            //$(".datepicker").datepicker({
            // format: 'mm/dd/yyyy',
            // changeMonth: true,
            // changeYear: true,
            // yearRange: "-100:+100",
            // });

            $('.datepicker').datepicker().on('changeDate', function (e) {
                var entitledleave = $('#entitledleave').val();
                var fiscalend = '<?php echo getFiscalEndDate($orgid) ?>';
                var doj = $('#doj').val();
                var fiscalendmonth = fiscalend.substring(0, 2);
                var joinmonth = doj.substring(0, 2);
                var fiscalenddate = fiscalend.substring(3, 5);
                var joindate = doj.substring(3, 5);
                //alert(fiscalenddate);
                // alert(joindate);

                if (joinmonth > fiscalendmonth)
                {
                    var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                    var fiscalenddata = fiscalend + "/" + newdoj;
                } else if (joinmonth == fiscalendmonth && joindate > fiscalenddate)
                {
                    var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                    var fiscalenddata = fiscalend + "/" + newdoj;
                } else if (joinmonth == fiscalendmonth && joindate == fiscalenddate)
                {
                    var newdoj = Number(doj.substr(doj.length - 4));
                    var fiscalenddata = fiscalend + "/" + newdoj;
                } else
                {
                    var newdoj = Number(doj.substr(doj.length - 4));
                    var fiscalenddata = fiscalend + "/" + newdoj;
                }
                var date1 = new Date(doj);
                var date2 = new Date(fiscalenddata);
                // alert(date1);
                // alert(date2);
                var Difference_In_Time = date2.getTime() - date1.getTime();
                //alert(Difference_In_Time);
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                //alert(Difference_In_Days);
                var bal1 = (entitledleave / 12);
                var bal2 = (Difference_In_Days / 30.4167);
                var balanceleave = bal1 * bal2;
                //alert(balanceleave+'hi');
<?php
$permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
if ($permis == 1) {
    ?>
                    // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                    document.getElementById('balanceleave').value = parseInt(balanceleave);
                    // $("#MyElement").addClass("fo rm group label-floating is-empty is-focused");
                    $('#balanceleave').val(parseInt(balanceleave));
    <?php
}
?>
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


            $(document).on("change", "#country", function () {

                var country = $(this).val();
                //alert(country);
                $.ajax({url: "<?php echo URL; ?>userprofiles/timezone",
                    data: {"country": country},
                    success: function (result) {
                        result = JSON.parse(result);



                        var options = "";

                        for (var i = 0; i < result.data.length; i++) {

                            options += "<option value='" + result.data[i].timezone_id + "'>" + result.data[i].timezone + "</option>";

                        }


                        var temp = "";

                        temp = temp + options;

                        $("#timezone").html(temp);


                    },
                    error: function (result) {
                        doNotify('top', 'center', 4, 'Unable to connect API');
                    }
                });

            })
        </script>

        <script>
            var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function () {
                $(".alpha").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 97 && keyCode <= 122) || specialKeys.indexOf(keyCode) != -1 || (keyCode === 32));
                    // $(".error").css("display", ret ? "none" : "inline");
                    return ret;
                });
                $(".alpha").bind("paste", function (e) {
                    return false;
                });
                $(".alpha").bind("drop", function (e) {
                    return false;
                });
            });
        </script>
<!--        <script>
            $('#save').click(function  ()  {
                    });
        </script>-->
    </body>
</html>
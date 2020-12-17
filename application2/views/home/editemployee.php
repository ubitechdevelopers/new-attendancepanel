
<?php
//print_r($empdata);
foreach ($empdata as $row) {
   // var_dump($row);
    //var_dump($row[0]['timezoneids']);
    //var_dump($row[0]['photo']);
    ?>

    <div class="container1">

        <form id="empFromE" class="empFromE" method="POST" enctype="multipart/form-data" name="myformE">
		<input type="hidden"  id="id" value='<?php echo $row[0]['change']; ?>' />

            
            
          
            <div class="row mb-4 mt-3 ">
                <div class="col-4">
                    <span class="activenew step1"  onclick="fieldset1()" ><a href="#" class="stepform " style="padding: 14px 10px 12px 10px;"><b>Personal Details</b></a></span>
                </div>
                <div class="col-4">
                    <span class="step2" onclick="fieldset2()" ><a href="#"class="stepform"  style="padding: 14px 10px 12px 10px;"><b >Company Details</b></a></span>
                </div>
                <div class="col-4">
                    <span class="step3"onclick="fieldset3()" ><a href="#"class="stepform" style="padding: 14px 10px 12px 10px;"><b  id ="butter" class="ml-4">Geo Fence</b></a></span>
                </div>
            </div>

            <!-- <form method="" id="signup-form" class="signup-form">-->

            <div class="fieldset1">
                <div class="row">
                    <div class="col-2 col-sm-4 col-md-4 col-lg-4"></div>
                    <div class="col-10  col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            
                            <?php
                        
                      //  if ($row[0]['imgpic'] == "") { ?>
                           <!-- <img id="imageE" src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/profile.png" style="height:120px;width:120px; " class="rounded-circle circle ml-3" alt="Cinque Terre"><br>
                            
                        <?php// } else { ?>

                            <img id="imageE"  src="<?php //echo $row[0]['imgpic']; ?>" style="height:120px;width:120px; " class="rounded-circle circle ml-3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                   
                        <?php //} ?>
                            
                          <img id="imageE" src="<?php echo $row[0]['imgpic'];?>" style="height:120px;width:120px; " class="rounded-circle circle ml-3" alt="Not Found" ><br>
                            
                             
                            <span id="pencil" class="btn12"> <img  src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/pencil.png">&nbsp;&nbsp;Edit
                                <input type="file"  name="profile" id="profileE"  onchange="changeImgUpload1(this)" file-upload accept="image/*">
                            </span>
                        </div></div>
                    <div class="col-0 col-sm-4 col-md-4 col-lg-4"></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="first_name" id="FNLableE" class="form-label required ">First Name</label>
                            <input type="text" name="firstName" id="firstNameE" class="alpha" style="display:block; width:100%;"  value="<?php echo $row[0]['name'] ?>"/>
                            <span id="firstName_error" class="error_form"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="ecode" class="form-label">Employee ID (Optional)</label>
                            <input type="text" name="ecode" id="ecodeE" style="display:block; width:100%;" value="<?php echo $row[0]['code'] ?>" />
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="phone" class="form-label required">Phone Number</label>
                            <input type="number" class="form-control" id="contE" style="display:block; width:100%;" value="<?php echo $row[0]['contact'] ?>" >
                            <span id="cont_error" class="error_form"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email(Optional)</label>
                            <input type="email" name="email" id="emailEE1"style="display:block; width:100%;" value="<?php echo $row[0]['username'] ?>" />
                            <span id="email_error" class="error_form"></span>
                        </div>

                    </div>
                </div><br>

                 <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label for="country" class="form-label required">Country</label>
                   <select id="countryE" class="form-control">
                        <option value="0">-Select-</option>
                        <?php
                        $data = json_decode(getAllCountries());
                        for ($i = 0; $i < count($data); $i++)
                            if ($data[$i]->id == $row[0]['countryids']) {
                                echo '<option selected="selected" value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                            } else {
                                echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                            }
                        ?>
                    </select>
                    <span id="country_error" class="error_form"></span>
                </div>  </div>
                        
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label class="control-label">Employment Status<span class="red">*</span>
                    </label>
                    <select class="form-control" id="statusE" >
                        <option value='1' selected >Active</option>
                        <option value='0'>Inactive</option>
                    </select>
                </div>
            </div>
                  </div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label class="form-label required">Time Zone</label>
                              <select id="timezoneE" class="form-control">
                                  
                        <?php
                        
                        if ($row[0]['timezoneids'] == "") { ?>
                            <option value="">-Select-</option>
                        <?php } else { ?>

                            <option selected="selected" value="<?php echo $row[0]['timezoneids'] ?>"><?php echo $row[0]['timezone'] ?></option>
                        <?php } ?>
                              </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="passwordE" class="form-label required">Password</label>
                            <input type="password" name="passwordE" value="<?php echo $row[0]['pass'] ?>" id="passwordE" class="active" style="display:block; width:100%;"   
                                   title="Password is initially set. It can be changed later on by the Admin or the Employee"><i class="fa fa-eye-slash" id="pswrd"></i>
                            <span id="password_error" class="error_form"></span>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="fieldset2">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="dept" class="form-label required">Department</label>
                            <select id="deptE" class="form-control ">
                                <option value="0">-Select-</option>
                                <?php
                                $data = json_decode(getAllDept($_SESSION['orgid']));
                                for ($i = 0; $i < count($data); $i++)
                                    if ($data[$i]->id == $row[0]['departmentids']) {

                                        echo '<option selected="selected" value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    } else {
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    }
                                ?>
                            </select>
                            <span id="dept_error" class="error_form"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="desg" class="form-label required">Designation</label>
                            <select id="desgE" class="form-control ">
                                <option value="0">-Select-</option>
                                <?php
                                $data = json_decode(getAllDesg($_SESSION['orgid']));
                                for ($i = 0; $i < count($data); $i++)
                                    if ($data[$i]->id == $row[0]['designationids']) {
                                        echo '<option selected="selected" value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    } else {
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    }
                                ?>
                            </select>
                            <span id="desg_error" class="error_form"></span>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="shift" class="form-label required">Shift</label>
                            <select id="shiftE" class="form-control ">
                                <option value="0">-Select-</option>
                                <?php
                                $data = json_decode(getAllShift($_SESSION['orgid']));
                                for ($i = 0; $i < count($data); $i++)
                                    if ($data[$i]->id == $row[0]['shiftids']) {
                                        echo '<option selected="selected" value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    } else {
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    }
                                ?>
                            </select>
                            <span id="shift_error" class="error_form"></span>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="doj" class="form-label required">Date of Joining</label>
                            <input type="text" name="doj"  id="dojE"   class="form-control datepicker"  value="<?php echo $row[0]['doj'] ?>">
                            <span id="doj_error" class="error_form"></span>
                        </div>
                    </div></div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="entitledleave" class="form-label required">Entitled Leave/Year</label>
                                                   <input type="text" name="entitledleaveE" id="entitledleaveE" title="Please fill the required field" class="form-control numeric " value="<?php echo $row[0]['entitledleaveids'] ?>" onkeypress="if (this.value.length == 2)  return false;" max="120" min="0">

                            <span id="entitledleave_error" class="error_form"></span>
                        </div></div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="balanceleave" class="form-label required">Entitled Leave This Year</label>
                           <input type="text" value="<?php echo $row[0]['balleave'] ?>" id="balanceleaveE" title="Please fill the required field" class="form-control" disabled>
                 
                            <span id="balanceleave_error" class="error_form"></span>
                        </div></div></div><br>
                        
                        
                         
                        
                        
                         
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="hourlyrate" class="form-label">Hourly rate(Optional)</label>
                             <select id="hourlyrateE" class="form-control" >
                            <option value="0">-Select-</option>
                            <?php
                            $data = json_decode(getAllRate($_SESSION['orgid']));
                            for ($i = 0; $i < count($data); $i++)
                                if ($data[$i]->Id == $row[0]['hourlyrateids']) {
                                    echo '<option selected="selected" value=' . $data[$i]->Id . '> ' . $data[$i]->Rate . ' </option>';
                                } else {
                                    echo '<option value=' . $data[$i]->Id . '> ' . $data[$i]->Rate . ' </option>';
                                }
            
                            ?>
                            <span id="hourlyrate_error" class="error_form"></span>
                        </select>
                    </div>
                </div>
  

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="sstatus" class="form-label ">Permission</label>
                            <select class="form-control" id="sstatusE" >
                                <?php
                                $data = array("0" => "User", "2" => "Dept. Head", "1" => "Admin-for app only");
                                foreach ($data as $key => $value) {
                                    if ($key == $row[0]['pemissionsids']) {
                                        echo '<option selected="selected" value=' . $key . '>' . $value . '</option>';
                                    } else {
                                        echo '<option value=' . $key . '>' . $value . '</option>';
                                    }
                                }
                                ?>
                            </select>

                        </div></div></div>


            </div>



            <div class="fieldset3">
                <div class="row">

                    <div class=" col-md-10 col-lg-10 mt-3" style=""><b id="geo1">Restrict users to punch attendance within the Geo fence only?</b></div>
                    <div class=" col-md-1 col-lg-1 mt-2 skmd"> <label class="switch">
                        <input  type="checkbox"  name="fenceopt" value="1" id="ena" <?php echo $row[0]['fencearea']==1 ? "checked" : "";?>>
					
                            <span class="slider round"></span>
                        </label></div>
                </div><br>
                <div class="row">
                    <div class="col-xs-3 col-sm-2"></div>
                    <div class="col-xs-6 col-sm-8 col-md-12 col-lg-12">
                        <div class="form-group">

                            <select id="areaAssinE" name="selValue" class="form-control "  multiple data-hide-disabled="true" data-live-search="true" data-actions-box="true">


                                <?php
                                //var_dump($data);
                                $data = json_decode(getAllArea($_SESSION['orgid']));
                               
                                $d = $row[0]['area'];
                                $selected = explode(",", $d);
                                
                                
                              



                                for ($i = 0; $i < count($data); $i++) {
                                    //
                                    //var_dump($data[$i]->id);
                                
                                    print_r($selected);
                                     print_r($data[$i]->id);
                                    if (in_array($data[$i]->id, $selected)) {
                                        echo "<option selected='true' value='" . $data[$i]->id . "'>" . $data[$i]->Name . "</option>";
//                                        echo $data[$i]->Name ;
                                    } else {
                                        echo "<option value='" . $data[$i]->id . "'>" . $data[$i]->Name . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div></div>
                    <div class="col-xs-3 col-sm-2"></div>

                </div>
            </div>


        </form>

    </div>
<?php } ?>
<script type="text/javascript">
    // run pre selected options
    /*$('#areaAssign').multiSelect({
     
     });*/


    $(document).ready(function () {
        //alert();
        $('#areaAssinE').lwMultiSelect({

            maxSelect: 10, //0 = no restrictions
            maxText: 'Available Geo-fence'
        });
    });
</script>

<script>
    function fieldset1() {
  
        $('.fieldset1').show();
        $('.fieldset2').hide();
        $('.fieldset3').hide();
    }

    function fieldset2() {
        $('.fieldset1').hide();
        $('.fieldset2').show();
        $('.fieldset3').hide();
    }

    function fieldset3() {
        $('.fieldset1').hide();
        $('.fieldset2').hide();
        $('.fieldset3').show();
    }
</script>
        <script type="text/javascript">
            $('#empFromE').on('click', 'span', function () {
                $('#empFromE span.activenew').removeClass('activenew');
                $(this).addClass('activenew');
            });




        </script>


 <script>
              var inputPass1 = document.getElementById('passwordE'),
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


var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function () {
                $(".alpha").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 97 && keyCode <= 122) || specialKeys.indexOf(keyCode) != -1);
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
        <script type="text/javascript">
            var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function () {
                $(".numeric").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                    // $(".error").css("display", ret ? "none" : "inline");
                    return ret;
                });
                $(".numeric").bind("paste", function (e) {
                    return false;
                });
                $(".numeric").bind("drop", function (e) {
                    return false;
                });
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
                        $('#imageE')
                                .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        
<!--         <script>
    $(document).ready(function () {
    var entitledleaveE = $('#entitledleaveE').val();
    var fiscalend = "<?php //echo getFiscalEndDate($orgid) ?>";
    var doj = $('#doj').val();
      
          if (doj == '00/00/0000')
          {
      <?php
         //$permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
         //if ($permis == 1) {
             ?>
                  document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                  document.getElementById('balanceleaveE').value = "N/A";
                  // $("#MyElement").addClass("form group label-floating is-empty is-focused");
                  // $('#balanceleave').val(parseInt(balanceleave));
      <?php
         //}
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
              var bal1 = (entitledleaveE / 12);
              var bal2 = (Difference_In_Days / 30.4167);
              var balanceleaveE = bal1 * bal2;
      
      
      
      <?php
 //        $permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
 //        if ($permis == 1) {
             ?>
                  // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                  document.getElementById('balanceleaveE').value = parseInt(balanceleaveE);
                  // $("#MyElement").addClass("form group label-floating is-empty is-focused");
                  // $('#balanceleave').val(parseInt(balanceleave));
      <?php
     //    }
         ?>
          }
      
      });  
      </script>-->

      
      <script>
      $(".skmd").change(function(){
     $('#butter').css({' all': 'none','background-color' : '#e4fee3','padding-top' : '14px','padding-bottom' : '12px','padding-left' : '13px','padding-right' : '18px','border':'2px solid white','color': 'rgba(63, 174, 62, 1)', 'border-radius':'8px'});
     
      });
      </script>

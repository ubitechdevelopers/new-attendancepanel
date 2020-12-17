<?php 

foreach($editdata as $row){

 $assignsid = $row[0]['sid']; 
 $assignshiftofemployee = json_decode(assignShiftOfEmployee($assignsid));
                             $aa =  $assignshiftofemployee[0]->id;
                           //var_dump($aa);
                            
                          
					
                            
 if($aa!=0) {  ?>
<form >

<div class="form-group row">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Status</label>
      <div class="col-sm-4">
      <?php $assignid = $row[0]['sid']; 
      $assignshift = json_decode(shiftAssign($assignid));
      $num =  $assignshift[0]->emp;
     // var_dump($num);
      
       ?>
        <select style="cursor: not-allowed;" disabled class="form-control" 
                        <?php if($row[0]['status']==1 && $num>0 )  echo 'disabled'; ?> id="statusE">
                           <option value='1' <?php if($row[0]['archive']==1) echo 'selected'; ?> >Active</option>
                           <option value='0' <?php if($row[0]['archive']==0) echo 'selected'; ?> >Inactive</option>
                        </select>
      <small style="color:green" >Shift assigned to <?php echo $num; ?> employee(s)</small>
      </div>
      <div class="col-sm-3">
      </div>
      </div>

<div class="container">
      <form  id="main1" method="post">
      <div class="form-group row">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Type</label>
      <div class="col-sm-4">
      <select style="cursor: not-allowed;" disabled  class="form-control form-control-sm" id="shifttypeE"  value="<?php echo $row[0]['shifttype'] ;?>"  name="shifttype" onchange="myFunction2()">  
      
      
      	<?php $data = array("1"=>"Single Shift","2"=>"Multi Shift","3"=>"Flexi"); 
      foreach($data as $key=>$value){
          if($key==$row[0]['shifttype']){
              echo '<option  selected="selected" value='.$key.'>'.$value.'</option>';
          }else{
          echo '<option value='.$key.'>'.$value.'</option>';
          }
      }
      ?>
      
      </select>
      </div>
      <div class="col-sm-3">
      </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Name</label>
      <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" id="shiftname" value="<?php echo $row[0]['name'] ;?>"  name="shiftname" placeholder="Shift Name">
      </div>
      <div class="col-sm-3">
      </div>
      </div>
      

          <!-- ##############################Update condition 1###################### -->
     
         <!-- ##############################Update condition 2###################### -->
        <div class="form-group row" id="timerow3">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm"  class="col-sm-2 col-form-label col-form-label-sm">Shift Time</label>
      <div class="col-sm-2">
      <div class="input-group mb-3 clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="timein2" >
      <input style="cursor: not-allowed;" type="text"  class="form-control" value="<?php echo $row[0]['timein'] ;?>"  name="timeduration" ng-model="timeduration" id="timeInE" readonly >
      
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="timeout2"  >
      <input style="cursor: not-allowed;" type="text"  class="form-control " value="<?php echo $row[0]['timeout'] ;?>" name="timeduration" ng-model="timeduration" id="timeOutE" readonly  >
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      </div>
      </div>
   

      <!-- ##############################Update Time ###################### -->
      <?php if($orgid=="35171" || $orgid=="70799" || $orgid=='10'){?>
      <div class="form-group row" style="margin-top: -2rem;" id="gracerow1">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Grace Time </label>
      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="gtiE1">
      <input style="cursor: not-allowed;" type="text"  class="form-control" value="<?php echo $row[0]['timeingrace'] ;?>"  name="breakin" ng-model="breakin" id="gracetimeE"  readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>


      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="gto1">
      <input style="cursor: not-allowed;" type="text"  class="form-control " value="<?php echo $row[0]['timeoutgrace'] ;?>"  name="timeduration" ng-model="timeduration" id="gracetimeoutE" readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      </div>
      </div>


 <!-- ##############################Update GRACE###################### -->
      <div class="form-group row" style="margin-top: -2rem;" id="totalgracerow1">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm" >Total Grace  </label>
      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="tgti1">
      <input type="text" class="form-control " style="cursor: not-allowed;" name="breakin" ng-model="breakin" id="tgracetimeinE" readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true" >
      <div class="input-group mb-3" id="tgto1">
      <input type="text" class="form-control " style="cursor: not-allowed;"  name="timeduration" ng-model="timeduration" id="tgracetimeoutE" readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      </div>
      <?php } ?>
      </div>
       

      <center><div class="row" id="flexihoursE" style="display: none;">
            <div class="col-md-1" ></div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
            <div class="col-md-1" ></div>
            <div class="col-md-1"></div>
            <div class="col-md-1" ></div>
               <div class="col-md-8" style="margin-left:13%;">
                  <div class="form-group label-floating">
                     <div id="flexihours23" style="float:    left;margin-left:0%;padding: 10px;color: #bebebe;"><b>Minimum Working Hours</b></div>
                        <div class="demoE" id="fhE">
                           <div class="divTimeSetterContainer">
                              <div class="timeValueBorder">
                              <input id="txtHours" type="text" class="timePart hours" data-unit="hours" autocomplete="off"  readonly="" value="<?php echo substr($row[0]['shifthpurs'], 0,2); ?>">
                              <span class="hourSymbol">hrs</span>
                              <span class="timeDelimiter">:</span>
                              <input id="txtMinutes" type="text" class="timePart minutes" data-unit="minutes" autocomplete="off" readonly="" value="<?php echo substr($row[0]['shifthpurs'], 3,2); ?>">
                              <span class="minuteSymbol">mins</span>
                              <div class="button-time-control">
                              <div id="btnUp" type="button" data-direction="increment" class="updownButton"><i class="fa fa-sort-asc" style="font-size:16px;"></i></div>
                              <div id="btnDown" type="button" data-direction="decrement" class="updownButton"><i class="fa fa-sort-desc" style="font-size:16px;position:relative;top:-4px;"></i></div>
                              </div>
                              </div>
                              <label class="postfix-position"></label>
                           </div>
                        </div>
                  </div>
               </div>

      </div>
    </center>

    <div class="form-group" style="text-align:center;margin-top: 5rem;"><b style="font-size: 20px;">Shift Calendar</b></div>
      <!-----------------shakir div---------------------->  
      <div class="container-fluid" style="padding: 0px; margin-top: -1rem;">
      <table class="table" id="popuptable">
      <thead>
      <tr>
      <th>Days</th>
      <th >Week 1st</th>
      <th>Week 2nd</th>
      <th>Week 3rd</th>
      <th>Week 4th</th>
      <th>Week 5th</th>
      </tr>
      </thead>
     
      <tbody>
      <tr>
	  
	  <?php 
	  
		$day1=$getweekdays['data'][0]['week']; 
		$str_arr = preg_split ("/\,/", $day1);
		$day2=$getweekdays['data'][1]['week'];
		$days2 = preg_split ("/\,/", $day2);
		
		$day3=$getweekdays['data'][2]['week'];
		$days3 = preg_split ("/\,/", $day3);
		
		$day4=$getweekdays['data'][3]['week'];
		$days4 = preg_split ("/\,/", $day4);
		
		$day5=$getweekdays['data'][4]['week'];
		$days5 = preg_split ("/\,/", $day5);
		
		$day6=$getweekdays['data'][5]['week'];
		$days6 = preg_split ("/\,/", $day6);
		
		$day7=$getweekdays['data'][6]['week'];
		$days7 = preg_split ("/\,/", $day7);
		//print_r($days7);
		
			
		?>
      <td id="day" class="tabled">Sun</td>
      <td >
        
      <select class="form-control form-control-sm selectedsun1" id="sunE1"
    style="background-color: #ffdede; color:black;cursor: not-allowed; " disabled >
      <option  value="1"<?=$str_arr[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
      </td>
      <td >
      <select style="background-color: #ffdede; color:black; cursor: not-allowed; " disabled class="form-control form-control-sm selectedsun2" id="sunE2">
      <option value="1"<?=$str_arr[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
      </td>
      <td >
      <select disabled style="background-color: #ffdede; color:black; cursor: not-allowed;" class="form-control form-control-sm selectedsun3" id="sunE3">
      <option value="1"<?=$str_arr[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
      </td>
      <td >
      <select disabled style="background-color: #ffdede; color:black;cursor: not-allowed;" class="form-control form-control-sm selectedsun4" id="sunE4" >
      <option value="1"<?=$str_arr[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
      </td>
      <td >
      <select style="background-color: #ffdede; color:black; cursor: not-allowed;" disabled class="form-control form-control-sm selectedsun5" id="sunE5">
      <option value="1"<?=$str_arr[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
      </td>
      </tr>
      <tr><td id="day">Mon</td>
      <td>
      <select style="background-color: #e7ffe1; color:black;cursor: not-allowed;"class="form-control form-control-sm selectedmon1" id="monE1" disabled  >
      <option  value="0"<?=$days2[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select  style="background-color:#e7ffe1; color:black;cursor: not-allowed;" class="form-control form-control-sm selectedmon2" id="monE2" disabled  >
      <option  value="0"<?=$days2[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" class="form-control form-control-sm selectedmon3" id="monE3" disabled  >
      <option  value="0"<?=$days2[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select  style="background-color: #e7ffe1; color:black;cursor: not-allowed;"class="form-control form-control-sm selectedmon4" id="monE4" disabled  >
      <option  value="0"<?=$days2[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select  style="background-color: #e7ffe1; color:black;cursor: not-allowed;"class="form-control form-control-sm selectedmon5" id="monE5" disabled  >
      <option  value="0"<?=$days2[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Tues</td>
      <td>
      <select class="form-control form-control-sm selectedtues1" id="tuesE1"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days3[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues2" id="tuesE2" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
       <option  value="0"<?=$days3[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues3" id="tuesE3" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days3[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues4" id="tuesE4" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days3[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days3[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues5" id="tuesE5"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;"disabled >
      <option  value="0"<?=$days3[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Wed</td>
      <td>
      <select class="form-control form-control-sm selectedwed1" id="wedE1" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days4[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days4[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed2" id="wedE2" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days4[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed3" id="wedE3" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days4[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed4" id="wedE4"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;"disabled >
      <option  value="0"<?=$days4[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed5" id="wedE5" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days4[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      </tr>
      <tr>
      <td  id="day">Thrus</td>
      <td>
      <select class="form-control form-control-sm selectedthrus1" id="thrusE1" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days5[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus2" id="thrusE2" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days5[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus3" id="thrusE3" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days5[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus4" id="thrusE4" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days5[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus5" id="thrusE5" style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days5[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Fri</td>
      <td>
      <select class="form-control form-control-sm selectedfri1" id="friE1"   style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days6[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri2" id="friE2"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days6[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri3" id="friE3"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;"disabled >
      <option  value="0"<?=$days6[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri4" id="friE4"   style="background-color: #e7ffe1; color:black;cursor: not-allowed;"disabled >
       <option  value="0"<?=$days6[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri5" id="friE5"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
       <option  value="0"<?=$days6[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days6[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Sat</td>
      <td>
      <select class="form-control form-control-sm selectedsat1" id="satE1" style="background-color:#e7ffe1; color:black; cursor: not-allowed;" disabled >
      <option  value="0"<?=$days7[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days7[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat2" id="satE2"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days7[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat3" id="satE3"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days7[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat4" id="satE4" style="background-color:#e7ffe1; color:black; cursor: not-allowed;" disabled >
      <option  value="0"<?=$days7[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat5" id="satE5"  style="background-color: #e7ffe1; color:black;cursor: not-allowed;" disabled >
      <option  value="0"<?=$days7[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      </td>
      </tr>
      </tbody>
      </table>
      </div>  










<?php } else { ?>
<div class="form-group row">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Status</label>
      <div class="col-sm-4">
      <?php $assignid = $row[0]['sid']; 
      $assignshift = json_decode(shiftAssign($assignid));
      $num =  $assignshift[0]->emp;
      //var_dump($num);
     
       ?>
        <select class="form-control" 
                        <?php if($row[0]['status']==1 && $num>0 ); ?> id="statusE">
                           <option value='1' <?php if($row[0]['archive']==1) echo 'selected'; ?> >Active</option>
                           <option value='0' <?php if($row[0]['archive']==0) echo 'selected'; ?> >Inactive</option>
                        </select>
      <small style="color:green" >Shift assigned to <?php echo $num; ?> employee(s)</small>
      </div>
      <div class="col-sm-3">
      </div>
      </div>

       <!--################################---> 
       <div class="container">
      <form  id="main1" method="post">
      <div class="form-group row">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Type</label>
      <div class="col-sm-4">
      <select   class="form-control form-control-sm" id="shifttypeE"  value="<?php echo $row[0]['shifttype'] ;?>"  name="shifttype" onchange="myFunction2()">  
      
      
      	<?php $data = array("1"=>"Single Shift","2"=>"Multi Shift","3"=>"Flexi"); 
      foreach($data as $key=>$value){
          if($key==$row[0]['shifttype']){
              echo '<option  selected="selected" value='.$key.'>'.$value.'</option>';
          }else{
          echo '<option value='.$key.'>'.$value.'</option>';
          }
      }
      ?>
      
      </select>
      </div>
      <div class="col-sm-3">
      </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Name</label>
      <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" id="shiftname" value="<?php echo $row[0]['name'] ;?>"  name="shiftname" placeholder="Shift Name">
      </div>
      <div class="col-sm-3">
      </div>
      </div>
      

          <!-- ##############################Update condition 1###################### -->
     
         <!-- ##############################Update condition 2###################### -->
        <div class="form-group row" id="timerow3">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm"  class="col-sm-2 col-form-label col-form-label-sm">Shift Time</label>
      <div class="col-sm-2">
      <div class="input-group mb-3 clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="timein2" >
      <input type="text"  class="form-control" value="<?php echo $row[0]['timein'] ;?>"  name="timeduration" ng-model="timeduration" id="timeInE" readonly >
      
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-2">
      <div class="input-group clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="timeout2"  >
      <input type="text"  class="form-control " value="<?php echo $row[0]['timeout'] ;?>" name="timeduration" ng-model="timeduration" id="timeOutE" readonly  >
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      </div>
      </div>
   

      <!-- ##############################Update Time ###################### -->
      <?php if($orgid=="35171" || $orgid=="70799" || $orgid=='10'){?>
      <div class="form-group row" style="margin-top: -2rem;" id="gracerow1">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Grace Time </label>
      <div class="col-sm-2">
      <div class="input-group clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="gtiE1">
      <input type="text"  class="form-control" value="<?php echo $row[0]['timeingrace'] ;?>"  name="breakin" ng-model="breakin" id="gracetimeE"  readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>


      <div class="col-sm-2">
      <div class="input-group clockpicker form-group clk" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="gto1">
      <input type="text"  class="form-control " value="<?php echo $row[0]['timeoutgrace'] ;?>"  name="timeduration" ng-model="timeduration" id="gracetimeoutE" readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      </div>
      </div>


 <!-- ##############################Update GRACE###################### -->
      <div class="form-group row" style="margin-top: -2rem;" id="totalgracerow1">
      <div class="col-sm-3">
      </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm" >Total Grace  </label>
      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group mb-3" id="tgti1">
      <input type="text" class="form-control "  name="breakin" ng-model="breakin" id="tgracetimeinE" readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-2">
      <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true" >
      <div class="input-group mb-3" id="tgto1">
      <input type="text" class="form-control "   name="timeduration" ng-model="timeduration" id="tgracetimeoutE" readonly>
      <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
      </div>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      </div>
      <?php } ?>
      </div>
      
      <center><div class="row" id="flexihoursE" style="display: none;">
            <div class="col-md-1" ></div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
            <div class="col-md-1" ></div>
            <div class="col-md-1"></div>
            <div class="col-md-1" ></div>
               <div class="col-md-8" style="margin-left:13%;">
                  <div class="form-group label-floating">
                     <div id="flexihours23" style="float:    left;margin-left:0%;padding: 10px;color: #bebebe;"><b>Minimum Working Hours</b></div>
                        <div class="demoE" id="fhE">
                           <div class="divTimeSetterContainer">
                              <div class="timeValueBorder">
                              <input id="txtHours" type="text" class="timePart hours" data-unit="hours" autocomplete="off"  readonly="" value="<?php echo substr($row[0]['shifthpurs'], 0,2); ?>">
                              <span class="hourSymbol">hrs</span>
                              <span class="timeDelimiter">:</span>
                              <input id="txtMinutes" type="text" class="timePart minutes" data-unit="minutes" autocomplete="off" readonly="" value="<?php echo substr($row[0]['shifthpurs'], 3,2); ?>">
                              <span class="minuteSymbol">mins</span>
                              <div class="button-time-control">
                              <div id="btnUp" type="button" data-direction="increment" class="updownButton"><i class="fa fa-sort-asc" style="font-size:16px;"></i></div>
                              <div id="btnDown" type="button" data-direction="decrement" class="updownButton"><i class="fa fa-sort-desc" style="font-size:16px;position:relative;top:-4px;"></i></div>
                              </div>
                              </div>
                              <label class="postfix-position"></label>
                           </div>
                        </div>
                  </div>
               </div>

      </div>
    </center>
      
      
      <div class="form-group" style="text-align:center;margin-top: 5rem;"><b style="font-size: 20px;">Shift Calendar</b></div>
       <!--################################---> 
        <div class="container-fluid" style="padding: 0px; margin-top: -1rem;">
      <table class="table" id="popuptable">
      <thead>
      <tr>
      <th>Days</th>
      <th >Week 1st</th>
      <th>Week 2nd</th>
      <th>Week 3rd</th>
      <th>Week 4th</th>
      <th>Week 5th</th>
      </tr>
      </thead>
     
      <tbody>
      <tr>
	  
	  <?php 
	  
		$day1=$getweekdays['data'][0]['week']; 
		$str_arr = preg_split ("/\,/", $day1);
		$day2=$getweekdays['data'][1]['week'];
		$days2 = preg_split ("/\,/", $day2);
		
		$day3=$getweekdays['data'][2]['week'];
		$days3 = preg_split ("/\,/", $day3);
		
		$day4=$getweekdays['data'][3]['week'];
		$days4 = preg_split ("/\,/", $day4);
		
		$day5=$getweekdays['data'][4]['week'];
		$days5 = preg_split ("/\,/", $day5);
		
		$day6=$getweekdays['data'][5]['week'];
		$days6 = preg_split ("/\,/", $day6);
		
		$day7=$getweekdays['data'][6]['week'];
		$days7 = preg_split ("/\,/", $day7);
		//print_r($days7);
		
			
		?>
      <td id="day" class="tabled">Sun</td>
      <td >
       <?php if($str_arr[0] == '1'){?> 
      <select class="form-control form-control-sm selectedsun1" id="sunE1"
    style="background-color: #ffdede; color:black;" >
      <option  value="1"<?=$str_arr[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	   <?php } else{ ?>
		   <select class="form-control form-control-sm selectedsun1" id="sunE1"
    style="background-color: #e7ffe1; color:black;" >
      <option  value="1"<?=$str_arr[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	 <?php  }?>
      </td>
      <td >
	   <?php if($str_arr[1] == '1'){?>
      <select style="background-color: #ffdede; color:black;"  class="form-control form-control-sm selectedsun2" id="sunE2">
      <option value="1"<?=$str_arr[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	  <?php } else{ ?>
	  <select style="background-color: #e7ffe1; color:black;"  class="form-control form-control-sm selectedsun2" id="sunE2">
      <option value="1"<?=$str_arr[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	   <?php  }?>
      </td>
      <td >
	  <?php if($str_arr[2] == '1'){?>
      <select  style="background-color: #ffdede; color:black;" class="form-control form-control-sm selectedsun3" id="sunE3">
      <option value="1"<?=$str_arr[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	  <?php } else{ ?>
	  <select  style="background-color: #e7ffe1; color:black;" class="form-control form-control-sm selectedsun3" id="sunE3">
      <option value="1"<?=$str_arr[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	  <?php  }?>
	  
      </td>
      <td >
	  <?php if($str_arr[3] == '1'){?>
      <select  style="background-color: #ffdede; color:black;" class="form-control form-control-sm selectedsun4" id="sunE4">
      <option value="1"<?=$str_arr[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	   <?php } else{ ?>
	   <select  style="background-color: #e7ffe1; color:black;" class="form-control form-control-sm selectedsun4" id="sunE4">
      <option value="1"<?=$str_arr[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	  <?php  }?>
      </td>
      <td >
	  <?php if($str_arr[4] == '1'){?>
      <select style="background-color: #ffdede; color:black;"  class="form-control form-control-sm selectedsun5" id="sunE5" >
      <option value="1"<?=$str_arr[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	  <?php } else{ ?>
	  <select style="background-color: #e7ffe1; color:black;"  class="form-control form-control-sm selectedsun5" id="sunE5" >
      <option value="1"<?=$str_arr[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      <option  value="0"<?=$str_arr[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      </select>
	   <?php  }?>
      </td>
      </tr>
      <tr><td id="day">Mon</td>
      <td>
	  <?php if($days2[0] == '1'){?>
      <select  style="background-color: #ffdede; color:black;"class="form-control form-control-sm selectedmon1" id="monE1"   >
      <option  value="0"<?=$days2[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
	   </select>
       <?php } else{ ?>
	   <select  style="background-color: #e7ffe1; color:black;"class="form-control form-control-sm selectedmon1" id="monE1"   >
      <option  value="0"<?=$days2[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
	   </select>
	   <?php } ?>
	   
     
      </td>
      <td>
	  <?php if($days2[1] == '1'){?>
      <select  style="background-color:#ffdede; color:black;" class="form-control form-control-sm selectedmon2" id="monE2"   >
      <option  value="0"<?=$days2[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
       </select>
	   <?php } else{ ?>
	    <select  style="background-color:#e7ffe1; color:black;" class="form-control form-control-sm selectedmon2" id="monE2"   >
      <option  value="0"<?=$days2[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
       </select>
	   <?php }?>
      </td>
      <td>
	   <?php if($days2[2] == '1'){?>
      <select  style="background-color: #ffdede; color:black;" class="form-control form-control-sm selectedmon3" id="monE3"   >
      <option  value="0"<?=$days2[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	  <?php } else{ ?>
	  <select  style="background-color: #e7ffe1; color:black;" class="form-control form-control-sm selectedmon3" id="monE3"   >
      <option  value="0"<?=$days2[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	  <?php }?>
      </td>
      <td>
	   <?php if($days2[3] == '1'){?>
      <select  style="background-color: #ffdede; color:black;"class="form-control form-control-sm selectedmon4" id="monE4"   >
      <option  value="0"<?=$days2[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	   <?php } else{ ?>
	  <select  style="background-color: #e7ffe1; color:black;"class="form-control form-control-sm selectedmon4" id="monE4"   >
      <option  value="0"<?=$days2[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	   <?php }?>
      </td>
      <td>
	  <?php if($days2[4] == '1'){?>
      <select  style="background-color: #ffdede; color:black;"class="form-control form-control-sm selectedmon5" id="monE5"   >
      <option  value="0"<?=$days2[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	  <?php } else{ ?>
	  <select  style="background-color: #e7ffe1; color:black;"class="form-control form-control-sm selectedmon5" id="monE5"   >
      <option  value="0"<?=$days2[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days2[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	  <?php } ?>
      </td>
      </tr>
      <tr>
      <td id="day">Tues</td>
      <td>
	  <?php if($days3[0] == '1'){?>
      <select class="form-control form-control-sm selectedtues1" id="tuesE1"  style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days3[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
	  </select>
      <?php } else{ ?>
	  <select class="form-control form-control-sm selectedtues1" id="tuesE1"  style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days3[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
	  </select>
	  <?php } ?>
      
      </td>
      <td>
      <?php if($days3[1] == '1'){?>
      <select class="form-control form-control-sm selectedtues2" id="tuesE2" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days3[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     </select>
	 <?php } else{ ?>
	 <select class="form-control form-control-sm selectedtues2" id="tuesE2" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days3[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     </select>
	 <?php }?>
      </td>
      <td>
	  <?php if($days3[2] == '1'){?>
      <select class="form-control form-control-sm selectedtues3" id="tuesE3" style="background-color: #ffdede; color:black;"  >
       <option  value="0"<?=$days3[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
    </select>
	  <?php }else{?>
	  <select class="form-control form-control-sm selectedtues3" id="tuesE3" style="background-color: #e7ffe1; color:black;"  >
       <option  value="0"<?=$days3[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
    </select>
	  
	  <?php }?>
      </td>
      <td>
	  <?php if($days3[3] == '1'){?>
      <select class="form-control form-control-sm selectedtues4" id="tuesE4" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days3[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days3[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	   <?php }else{?>
	   <select class="form-control form-control-sm selectedtues4" id="tuesE4" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days3[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days3[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	    <?php }?>
	   
      </td>
      <td>
	  <?php if($days3[4] == '1'){?>
      <select class="form-control form-control-sm selectedtues5" id="tuesE5"  style="background-color: #ffdede; color:black;" >
      <option  value="0"<?=$days3[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	  <?php }else{?>
	  <select class="form-control form-control-sm selectedtues5" id="tuesE5"  style="background-color: #e7ffe1; color:black;" >
      <option  value="0"<?=$days3[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days3[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	  <?php }?>
      </td>
      </tr>
      <tr>
      <td id="day">Wed</td>
      <td>
	   <?php if($days4[0] == '1'){?>
      <select class="form-control form-control-sm selectedwed1" id="wedE1" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days4[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days4[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	   <?php }else{?>
	   <select class="form-control form-control-sm selectedwed1" id="wedE1" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days4[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days4[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
	   <?php }?>
	   
      </td>
      <td>
	  <?php if($days4[1] == '1'){?>
      <select class="form-control form-control-sm selectedwed2" id="wedE2" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days4[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
       </select>
	    <?php }else{?>
		<select class="form-control form-control-sm selectedwed2" id="wedE2" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days4[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
       </select>
	   <?php }?>
      </td>
      <td>
      <?php if($days4[2] == '1'){?>
       <select class="form-control form-control-sm selectedwed3" id="wedE3" style="background-color: #ffdede; color:black;">
       <option  value="0"<?=$days4[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
     <?php }else{?>
     	<select class="form-control form-control-sm selectedwed3" id="wedE3" style="background-color: #e7ffe1; color:black;">
       <option  value="0"<?=$days4[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>
      </td>
      <td>
      	 <?php if($days4[3] == '1'){?>
      <select class="form-control form-control-sm selectedwed4" id="wedE4"  style="background-color: #ffdede; color:black;" >
      <option  value="0"<?=$days4[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
       <?php }else{?>
       	 <select class="form-control form-control-sm selectedwed4" id="wedE4"  style="background-color: #e7ffe1; color:black;" >
      <option  value="0"<?=$days4[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days4[4] == '1'){?>
      <select class="form-control form-control-sm selectedwed5" id="wedE5" style="background-color: #ffdede; color:black;"  >
       <option  value="0"<?=$days4[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedwed5" id="wedE5" style="background-color: #e7ffe1; color:black;"  >
       <option  value="0"<?=$days4[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
       <option value="1"<?=$days4[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>
      </td>
      </tr>
      <tr>
      <td  id="day">Thrus</td>
      <td>
      	<?php if($days5[0] == '1'){?>
      <select class="form-control form-control-sm selectedthrus1" id="thrusE1" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days5[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedthrus1" id="thrusE1" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days5[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>
      </td>
      <td>
       <?php if($days5[1] == '1'){?>
      <select class="form-control form-control-sm selectedthrus2" id="thrusE2" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days5[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
       <?php }else{?>
       <select class="form-control form-control-sm selectedthrus2" id="thrusE2" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days5[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>
      </td>
      <td>
      <?php if($days5[2] == '1'){?>
      <select class="form-control form-control-sm selectedthrus3" id="thrusE3" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days5[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
       <?php }else{?>
       <select class="form-control form-control-sm selectedthrus3" id="thrusE3" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days5[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>

      </td>
      <td>
      	<?php if($days5[3] == '1'){?>
      <select class="form-control form-control-sm selectedthrus4" id="thrusE4" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days5[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }else{?>
      <select class="form-control form-control-sm selectedthrus4" id="thrusE4" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days5[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days5[4] == '1'){?>
      <select class="form-control form-control-sm selectedthrus5" id="thrusE5" style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days5[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
       <?php }else{?>
       	<select class="form-control form-control-sm selectedthrus5" id="thrusE5" style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days5[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days5[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      </select>
      <?php }?>

      </td>
      </tr>
      <tr>
      <td id="day">Fri</td>
      <td>
      	<?php if($days6[0] == '1'){?>
      <select class="form-control form-control-sm selectedfri1" id="friE1"   style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days6[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedfri1" id="friE1"   style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days6[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days6[1] == '1'){?>
      <select class="form-control form-control-sm selectedfri2" id="friE2"  style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days6[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
      	 <select class="form-control form-control-sm selectedfri2" id="friE2"  style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days6[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      	<?php }?>
      </td>
      <td>
      	<?php if($days6[2] == '1'){?>
      <select class="form-control form-control-sm selectedfri3" id="friE3"  style="background-color: #ffdede; color:black;" >
      <option  value="0"<?=$days6[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
         <select class="form-control form-control-sm selectedfri3" id="friE3"  style="background-color: #e7ffe1; color:black;" >
      <option  value="0"<?=$days6[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      	<?php }?>
      </td>
      <td>
      	<?php if($days6[3] == '1'){?>
      <select class="form-control form-control-sm selectedfri4" id="friE4"   style="background-color: #ffdede; color:black;" >
      <option  value="0"<?=$days6[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
      	 <select class="form-control form-control-sm selectedfri4" id="friE4"   style="background-color: #e7ffe1; color:black;" >
      <option  value="0"<?=$days6[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days6[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days6[4] == '1'){?>
      <select class="form-control form-control-sm selectedfri5" id="friE5"  style="background-color: #ffdede; color:black;" >
      <option  value="0"<?=$days6[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days6[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedfri5" id="friE5"  style="background-color: #e7ffe1; color:black;" >
      <option  value="0"<?=$days6[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days6[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }?>
      </td>
      </tr>
      <tr>
      <td id="day">Sat</td>
      <td>
      	<?php if($days7[0] == '1'){?>
      <select class="form-control form-control-sm selectedsat1" id="satE1" style="background-color:#ffdede; color:black;"  >
      <option  value="0"<?=$days7[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days7[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedsat1" id="satE1" style="background-color:#e7ffe1; color:black;"  >
      <option  value="0"<?=$days7[0] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
     <option value="1"<?=$days7[0] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days7[1] == '1'){?>
      <select class="form-control form-control-sm selectedsat2" id="satE2"  style="background-color: #ffdede; color:black;"  >
       <option  value="0"<?=$days7[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      <?php }else{?>
      	 <select class="form-control form-control-sm selectedsat2" id="satE2"  style="background-color: #e7ffe1; color:black;"  >
       <option  value="0"<?=$days7[1] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[1] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      <?php }?>

      </td>
      <td>
      	<?php if($days7[2] == '1'){?>
      <select class="form-control form-control-sm selectedsat3" id="satE3"  style="background-color: #ffdede; color:black;"  >
      <option  value="0"<?=$days7[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedsat3" id="satE3"  style="background-color: #e7ffe1; color:black;"  >
      <option  value="0"<?=$days7[2] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[2] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
      
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days7[3] == '1'){?>
      <select class="form-control form-control-sm selectedsat4" id="satE4" style="background-color:#ffdede; color:black;"  >
       <option  value="0"<?=$days7[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedsat4" id="satE4" style="background-color:#e7ffe1; color:black;"  >
       <option  value="0"<?=$days7[3] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[3] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      <?php }?>
      </td>
      <td>
      	<?php if($days7[4] == '1'){?>
      <select class="form-control form-control-sm selectedsat5" id="satE5"  style="background-color: #ffdede; color:black;" >
       <option  value="0"<?=$days7[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      <?php }else{?>
      	<select class="form-control form-control-sm selectedsat5" id="satE5"  style="background-color: #e7ffe1; color:black;" >
       <option  value="0"<?=$days7[4] == '0' ? ' selected="selected"' : '';?>>WeekOn</option>
      <option value="1"<?=$days7[4] == '1' ? ' selected="selected"' : '';?>>Weekoff</option>
     
      </select>
      <?php }?>
      </td>
      </tr>
      </tbody>
      </table>
      </div> 
       <!--################################---> 
 <?php  } } ?>



     

    
  
	  
	  </div>  
	</form>


	

	

<!-- <script type="text/javascript" src="<?=URL?>../assets/js/jquery.timesetter.js"></script>-->
<script>
$('.clk').clockpicker({
          autoclose: true,
          afterDone: function() {
       
          }
      });
</script>
<script>
      $('#timeInE').on('change', function() {
      
      $('#gracetimeE').val(this.value);
      });
        $('#timeOutE').on('change', function() {
      
      $('#gracetimeoutE').val(this.value);
      });
       </script>
  <script>
      var shifttimein='';
      var totalgracetimein='';
      
      
      
      $("#gracetimeE").on('change', function(){
        var timeIn = $("#timeInE").val();
        var grace = $("#gracetimeE").val();
      
        let valuestart = moment.duration(timeIn, "HH:mm");
        let valuestop = moment.duration(grace, "HH:mm");
        let difference = valuestop.subtract(valuestart);
        var diff=(('0' + difference.hours()).slice(-2) + ":" + ('0' + difference.minutes()).slice(-2));
       
        $('#tgracetimeinE').val(diff);
      })
   </script>
   <script type="text/javascript">

  var shifttimein='';
    var totalgracetimeout='';

    
    $("#gracetimeoutE").on('change', function(){
      var timeIn = $("#timeOutE").val();
      var grace = $("#gracetimeoutE").val();

      let valuestart = moment.duration(timeIn, "HH:mm");
      let valuestop = moment.duration(grace, "HH:mm");
      let difference = valuestop.subtract(valuestart);
      var diff=(('0' + difference.hours()).slice(-2) + ":" + ('0' + difference.minutes()).slice(-2));
     
      $('#tgracetimeoutE').val(diff);
    })
 </script>
 
<script>

$( document ).ready(function() {
    var stype=$('#shifttypeE').val();
   
    if(stype==2){         
    document.getElementById("flexihoursE").style.display = "none";
    $('#timerow2').show("slow");
    $('#timerow3').show("slow");
    $('#breakrow1').show("slow");
    $('#gracerow1').show("slow");
    $('#totalgracerow1').show("slow");
          
      }else if(stype==3){
          //alert('flexi');
    document.getElementById("flexihoursE").style.display = "block";
    $('#timerow2').hide("slow");
    $('#timerow3').hide("slow");
    
    $('#gracerow1').hide("slow");
    $('#totalgracerow1').hide("slow");
          
      }else{
    document.getElementById("flexihoursE").style.display = "none";
    $('#timerow2').show("slow");
    $('#timerow3').show("slow");
    $('#breakrow1').show("slow");
    $('#gracerow1').show("slow");
    $('#totalgracerow1').show("slow");
      }
});


  $('#timeIn').on('change', function() {
  
  $('#gracetime').val(this.value);
});
    $('#timeOut').on('change', function() {
  
  $('#gracetimeout').val(this.value);
});
</script>
<script>
function myFunction2(){
    
    
    
      var sd=$('#shifttypeE').val();
     // alert(sd);
     // alert(sd);
      if(sd==2){
         // alert('shift2')
          
    document.getElementById("flexihoursE").style.display = "none";
    $('#timerow2').show("slow");
    $('#timerow3').show("slow");
    $('#breakrow1').show("slow");
    $('#gracerow1').show("slow");
    $('#totalgracerow1').show("slow");
          
      }else if(sd==3){
          //alert('flexi');
    document.getElementById("flexihoursE").style.display = "block";
    $('#timerow2').hide("slow");
    $('#timerow3').hide("slow");
    
    $('#gracerow1').hide("slow");
    $('#totalgracerow1').hide("slow");
          
      }else{
    document.getElementById("flexihoursE").style.display = "none";
    $('#timerow2').show("slow");
    $('#timerow3').show("slow");
    $('#breakrow1').show("slow");
    $('#gracerow1').show("slow");
    $('#totalgracerow1').show("slow");
      }
}

$(".demoE").timesetter({

  hour: {
    value: 0,
    min: 0,
    max: 18,
    step: 1,
    symbol: "hrs"
  },
  minute: {
    value: 0,
    min: 0,
    max: 60,
    step: 15,
    symbol: "mins"
  },

  // increment or decrement
  direction: "increment", 

  // hour textbox
  inputHourTextbox: null, 

  // minutes textbox
  inputMinuteTextbox: null, 

  // text to display after the input fields
  postfixText: "", 

  // number left padding character ex: 00052
  numberPaddingChar: '0' 

});

</script>

<script>
 
  

   

    
    var shifttimein='<?php echo $row[0]['timein'] ;?>';
    var totalgracetimein='<?php echo $row[0]['timeingrace'] ;?>';

  

    $("#gracetimeE").ready(function(){
      var timeInE = shifttimein
      var graceE = totalgracetimein

      let valuestart = moment.duration(timeInE, "HH:mm");
      let valuestop = moment.duration(graceE, "HH:mm");
      let difference = valuestop.subtract(valuestart);
      var diff=(('0' + difference.hours()).slice(-2) + ":" + ('0' + difference.minutes()).slice(-2));
     
      $('#tgracetimeinE').val(diff);
    })
 </script>


<!-- ######################################################TimeOut Grace###################################################### -->
 

<script type="text/javascript">

  

   

    
    var shifttimeout='<?php echo $row[0]['timeout'] ;?>';
    var totalgracetimeout='<?php echo $row[0]['timeoutgrace'] ;?>';
    
    $("#gracetimeoutE").ready(function(){
      var timeout = shifttimeout
      var grace = totalgracetimeout
    
      let valuestart = moment.duration(timeout, "HH:mm");
      let valuestop = moment.duration(grace, "HH:mm");
      let difference = valuestop.subtract(valuestart);
      var diff=(('0' + difference.hours()).slice(-2) + ":" + ('0' + difference.minutes()).slice(-2));
     
      $('#tgracetimeoutE').val(diff);
      //alert(diff);
    })
 </script>






<!-- ############################Comparing time########################################### -->


  <script>

function compareTime(str1, str2){
    if(str1 === str2){
        return 0;
    }
    var time1 = str1.split(':');
    var time2 = str2.split(':');

    // alert(time1);
    // alert(time2);

    if(eval(time1[0]) > eval(time2[0])){
        return 1;
    } else if(eval(time1[0]) == eval(time2[0]) && eval(time1[1]) > eval(time2[1])) {
        return 2;
    } else {
        return 3;
    }
}
</script>




<!--###########################################################################->
<script type="text/javascript">
  

    $('#gracetime').clockpicker({
        autoclose: true,
        afterDone: function() {
     
        }
    });

    
    var shifttimein='';
    var totalgracetimein='';

  

    $("#gracetime").on('change', function(){
      var timeIn = $("#timeIn").val();
      var grace = $("#gracetime").val();

      let valuestart = moment.duration(timeIn, "HH:mm");
      let valuestop = moment.duration(grace, "HH:mm");
      let difference = valuestop.subtract(valuestart);
      var diff=(('0' + difference.hours()).slice(-2) + ":" + ('0' + difference.minutes()).slice(-2));
     
      $('#tgracetimein').val(diff);
    })
 </script>


 ######################################################TimeOut Grace###################################################### -->
 




   <script>
      $('.selectedsun1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sunE1").css('background-color', '#ffdede');
        $("#sunE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sunE1").css('background-color', '#e7ffe1');
        $("#sunE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sunE2").css('background-color', '#ffdede');
        $("#sunE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sunE2").css('background-color', '#e7ffe1');
        $("#sunE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sunE3").css('background-color', '#ffdede');
        $("#sunE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sunE3").css('background-color', '#e7ffe1');
        $("#sunE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sunE4").css('background-color', '#ffdede');
        $("#sunE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sunE4").css('background-color', '#e7ffe1');
        $("#sunE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sunE5").css('background-color', '#ffdede');
        $("#sunE5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sunE5").css('background-color', '#e7ffe1');
        $("#sunE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Mon ##########################-->
   <script>
      $('.selectedmon1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#monE1").css('background-color', '#ffdede');
        $("#monE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#monE1").css('background-color', '#e7ffe1');
        $("#monE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedmon2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#monE2").css('background-color', '#ffdede');
        $("#monE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#monE2").css('background-color', '#e7ffe1');
        $("#monE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedmon3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#monE3").css('background-color', '#ffdede');
        $("#monE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#monE3").css('background-color', '#e7ffe1');
        $("#monE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedmon4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#monE4").css('background-color', '#ffdede');
        $("#monE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#monE4").css('background-color', '#e7ffe1');
        $("#monE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedmon5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#monE5").css('background-color', '#ffdede');
        $("#monE5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#monE5").css('background-color', '#e7ffe1');
        $("#monE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Tuesday ##########################-->
   <script>
      $('.selectedtues1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tuesE1").css('background-color', '#ffdede');
        $("#tuesE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tuesE1").css('background-color', '#e7ffe1');
        $("#tuesE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedtues2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tuesE2").css('background-color', '#ffdede');
        $("#tuesE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tuesE2").css('background-color', '#e7ffe1');
        $("#tuesE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedtues3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tuesE3").css('background-color', '#ffdede');
        $("#tuesE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tuesE3").css('background-color', '#e7ffe1');
        $("#tuesE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedtues4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tuesE4").css('background-color', '#ffdede');
        $("#tuesE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tuesE4").css('background-color', '#e7ffe1');
        $("#tuesE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedtues5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tuesE5").css('background-color', '#ffdede');
        $("#tuesE5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tuesE5").css('background-color', '#e7ffe1');
        $("#tuesE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Wednesday ##########################-->
   <script>
      $('.selectedwed1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wedE1").css('background-color', '#ffdede');
        $("#wedE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wedE1").css('background-color', '#e7ffe1');
        $("#wedE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedwed2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wedE2").css('background-color', '#ffdede');
        $("#wedE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wedE2").css('background-color', '#e7ffe1');
        $("#wedE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedwed3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wedE3").css('background-color', '#ffdede');
        $("#wedE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wedE3").css('background-color', '#e7ffe1');
        $("#wedE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedwed4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wedE4").css('background-color', '#ffdede');
        $("#wedE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wedE4").css('background-color', '#e7ffe1');
        $("#wedE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedwed5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wedE5").css('background-color', '#ffdede');
        $("#wedE5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wedE5").css('background-color', '#e7ffe1');
        $("#wedE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Thrusday ##########################-->
   <script>
      $('.selectedthrus1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrusE1").css('background-color', '#ffdede');
        $("#thrusE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrusE1").css('background-color', '#e7ffe1');
        $("#thrusE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedthrus2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrusE2").css('background-color', '#ffdede');
        $("#thrusE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrusE2").css('background-color', '#e7ffe1');
        $("#thrusE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedthrus3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrusE3").css('background-color', '#ffdede');
        $("#thrusE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrusE3").css('background-color', '#e7ffe1');
        $("#thrusE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedthrus4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrusE4").css('background-color', '#ffdede');
        $("#thrusE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrusE4").css('background-color', '#e7ffe1');
        $("#thrusE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedthrus5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrusE5").css('background-color', '#ffdede');
        $("#thrusE5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrusE5").css('background-color', '#e7ffe1');
        $("#thrusE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Friday ##########################-->
   <script>
      $('.selectedfri1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#friE1").css('background-color', '#ffdede');
        $("#friE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#friE1").css('background-color', '#e7ffe1');
        $("#friE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedfri2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#friE2").css('background-color', '#ffdede');
        $("#friE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#friE2").css('background-color', '#e7ffe1');
        $("#friE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedfri3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#friE3").css('background-color', '#ffdede');
        $("#friE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#friE3").css('background-color', '#e7ffe1');
        $("#friE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedfri4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#friE4").css('background-color', '#ffdede');
        $("#friE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#friE4").css('background-color', '#e7ffe1');
        $("#friE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedfri5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#friE5").css('background-color', '#ffdede');
        $("#friE5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#friE5").css('background-color', '#e7ffe1');
        $("#friE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Saturday ##########################-->
   <script>
      $('.selectedsat1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#satE1").css('background-color', '#ffdede');
        $("#satE1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#satE1").css('background-color', '#e7ffe1');
        $("#satE1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsat2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#satE2").css('background-color', '#ffdede');
        $("#satE2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#satE2").css('background-color', '#e7ffe1');
        $("#satE2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedsat3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#satE3").css('background-color', '#ffdede');
        $("#satE3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#satE3").css('background-color', '#e7ffe1');
        $("#satE3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedsat4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#satE4").css('background-color', '#ffdede');
        $("#satE4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#satE4").css('background-color', '#e7ffe1');
        $("#satE4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedsat5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#satE5").css('background-color', '#ffdede');
        $("#satE5").css('border', '1px solid #ff4949;');
       
      }
        if($(this).val() == '0'){
        $("#satE5").css('background-color','#e7ffe1');
        $("#satE5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   </html>







	   
	   
	   
	   
	   
	   
	   
	   
	  
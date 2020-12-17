<!DOCTYPE html>
<html>
   <head>
      <title></title>

       <?php 
        $this->load->view('menubar/allnewcss');
       ?>
      
     
      <style type="text/css">
         div.sticky {
  position: -webkit-sticky!important;
  position: sticky!important;
  top: 1rem!important;
 
 z-index: 2000;
  
}

div.sticky.active {
         background: white;
        /* box-shadow: 0px 5px 10px -5px #acacac;*/


          transition: ease-in-out .5s;
          position: -webkit-sticky!important;
 position: sticky!important;
  top: 2.9rem!important;
  z-index: 2000;
  
  }
         div.dataTables_wrapper div.dataTables_filter input {
         /* margin-left: 0.5em; */
         /* display: inline-block; */
         /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
         box-sizing: border-box;
         width: 25rem;
         border:none;
         border-radius: 4px;
         font-size: 16px;
         background-color: #e9f1e8;
         background-image: url('<?=URL?>../assets/icons/u_search.svg');
         background-position: 10px 12px;
         background-repeat: no-repeat;
         padding: 21px 20px 23px 40px;
         -webkit-transition: width 0.4s ease-in-out;
         transition: width 0.4s ease-in-out;
         }
         div.dataTables_wrapper div.dataTables_filter
         /* text-align: right; */
         margin-left: -104%!important;
         }
         input[class="checkbox"]{
         width: 1.2rem!important;
         height: 1.2rem!important;
         }
         #select_all{
         width: 1.2rem!important;
         height: 1.2rem!important;
         }
         table.dataTable>thead .sorting:after{
         display: none;
         }
         table.dataTable>thead .sorting:before{
         display: none;
         }
         table.dataTable>thead .sorting:before, table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:before, table.dataTable>thead .sorting_desc_disabled:after {
         display: none;
         }
         element.style {
         }
         .page-item.active .page-link {
         z-index: 3;
         color: #000;
         background-color: #e1ffe0;
         border-color: #e1ffe0;}
         table.dataTable thead th {
         border-top: none;
         color: #9FA2B4;
         font-size: 0.85rem;
         font-style: 'Poppins';
         }
         table.dataTable tbody {
         font-size: 0.85rem;
         font-family: 'Poppins',sans-serif;
         font-weight: 600;
         color: #3f424c;
         }
         .dot-button{
         width: 30px;
         height: 30px;
         border-radius: 50%;
         background-color: black;
         box-shadow: 0px 40px 0px black, 0px 80px 0px black;
         }
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
         {font-size: 18px;
         color: #828282;
         display: flex;
         cursor: pointer;
         text-decoration: none;
         font-weight: 500!important;
         font-family: 'Poppins',sans-serif;
         }
         .right{
         float: right;
         margin-right: 5px;
         margin-bottom: 5px;
         }
         .bttn
         {
         width: 9rem;
         font-weight: 500;
         font-size: 14px;
         height: 2.5rem;
         }
         .filtr
         {
         font-size: 0.8rem;
         font-weight: 500;
         }
         /*b{
         font-weight: 700!important;
         }*/
         body
         {
         font-family: 'Poppins',sans-serif;
         font-size: 14px;
         }
         #heading2 .active5 a{
         border-bottom: 3.5px solid green;
         /*border-radius: 3%;*/
         width: 100%;
         text-decoration: none;
         height: auto;
         font-weight: 700!important;
         color: black;
         }
         .checkbox
         {
         width: 1.2rem!important;
         height: 1.2rem!important;
         }
         .mobview{
         display: none;
         }
         @media only screen and (max-width: 600px) 
         {
         /*.uu1{
         display: none;
         }*/
         .mobview{
         display:unset!important;
         } 
         div.dataTables_wrapper div.dataTables_filter input{
         /*display: none;*/
         width: 13.5rem;
         }
         #columnv
         {
         display: none;}
         }
         table.dataTable tbody td:nth-child(1) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(2) {
         padding-top: 2.1rem!important;
         } 
         table.dataTable tbody td:nth-child(3) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(4) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(5) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(6) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(7) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(8) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(9) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(10) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(11) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(12) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(13) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(14) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(15) {
         padding-top: 1.8rem!important;
         } 
         @media only screen and (max-width: 568px) 
         {
         #myModal{
         padding-left: 76px!important;
         width: 22.4rem!important;
         }
         }
         .buttons-collection{
         border: none;
         position: relative;
         top: -3.3rem;
         left: 23rem;
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }
         div.dataTables_wrapper div.dataTables_filter {
         text-align: left!important;
         }
         div.dt-button-collection div.dropdown-menu {
         margin-left: 1.5rem;
         }
         .tertiary-button {
         padding: 5px 10px 5px 20px!important;
         }
         .text-muted{
         font-weight: 600;
         font-size: 15px;
         }
         .border {
         border:2px solid #E5E5E5;
         padding-left: 1rem;
         width: 6rem;
         height: 2.5rem;
         border-radius: 5px;
         }
         button, input, optgroup, select, textarea {
         font-weight: 600;
         font-size: 15px;
         }
         input[type=radio] {
         width: 35%;
         height: 75%; 
         }
         b.thicker {
         font-weight: 900;
         font-size: 90%;
         margin-left: 2%;
         }
         b.thick {
         font-weight: 800;
         font-size: 80%;
         }
         @media screen and (max-width: 480px) {
         b.thicker{
         margin-left:3%;
         }
         @media screen and (max-width:768px) {
         #can{width:px;
         padding-right:10rem; }
         }
         @media screen and (max-width: 768px) {
         #sav{width:-20px;
         padding-right:6rem;}
         }
         /*input[type=radio]{
         transform:scale(1.5)!important;
         }*/
      </style>
   </head>
   <body>
     <?php 
         $data['pageid']=8.1;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
       
            
            
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
              
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="row" style="margin-left: 0px;">
                        <span > <a href="<?= URL; ?>Settings" class="subhead">Notifications</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <span class="active5"><a href="<?= URL; ?>Settings/alertsettings" class="subhead">Alerts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <span ><a href="<?= URL; ?>Settings/activity" class="subhead">Activity</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                     </div>
                  </div>
               </div>
            </div>
            
            <hr style="width: 100%;">
            <br>
            <br>
            <br>
            <!-- Alert Setting -->
            <div class="row">
               <div class="col-lg-4">
                  <h6 class="text-secondary">Mail daily attendance summary?</h6>
               </div>
               <div class="col-lg-8">
                  <form id='test' method="post">
                     <?php 
                        foreach(@$data as $dat)
                        {
                           $time=@$dat->Time;
                          // echo @$dat->Status ;
                                     ?>  
                     <div class="row">
                        <div class="col-lg-2">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="opt" id="exampleRadios1" value="0"<?php echo @$dat->Status == 0 ? "checked" : "";?>>
                              <label class="form-check-label" for="exampleRadios1">
                              &nbsp&nbspNo
                              </label>
                           </div>
                        </div>
                        <div class="col-lg-2">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="opt" id="ena" value="1" <?php echo @$dat->Status == 1 ? "checked" : "";?>>
                              <label class="form-check-label" for="exampleRadios2">
                              &nbsp&nbspYes
                              </label>
                           </div>
                        </div>
                        <div class="col-lg-3">
                          <!--  <label for="inputSuccess2" style="padding-left: 2rem;"></label> -->
                           <div class="form-group has-success has-feedback" style="margin:0px;">
                              <select type="text" class="form-control" name="time" id="time" value="<?php echo @$dat->Time;?>">
                                 <option value="value"selected="selected">Select Time</option>
                                 <option value="00:00:00">00:00 - 01:00</option>
                                 <option value="01:00:00">01:00 - 02:00</option>
                                 <option value="02:00:00">02:00 - 03:00</option>
                                 <option value="03:00:00">03:00 - 04:00</option>
                                 <option value="04:00:00">04:00 - 05:00</option>
                                 <option value="05:00:00">05:00 - 06:00</option>
                                 <option value="06:00:00">06:00 - 07:00</option>
                                 <option value="07:00:00">07:00 - 08:00</option>
                                 <option value="08:00:00">08:00 - 09:00</option>
                                 <option value="09:00:00">09:00 - 10:00</option>
                                 <option value="10:00:00">10:00 - 11:00</option>
                                 <option value="11:00:00">11:00 - 12:00</option>
                                 <option value="12:00:00">12:00 - 13:00</option>
                                 <option value="13:00:00">13:00 - 14:00</option>
                                 <option value="14:00:00">14:00 - 15:00</option>
                                 <option value="15:00:00">15:00 - 16:00</option>
                                 <option value="16:00:00">16:00 - 17:00</option>
                                 <option value="17:00:00">17:00 - 18:00</option>
                                 <option value="18:00:00">18:00 - 19:00</option>
                                 <option value="19:00:00">19:00 - 20:00</option>
                                 <option value="20:00:00">20:00 - 21:00</option>
                                 <option value="21:00:00">21:00 - 22:00</option>
                                 <option value="22:00:00">22:00 - 23:00</option>
                                 <option value="23:00:00">23:00 - 24:00</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-5" style="text-align: end;">
                           <div> 
                              <button type="button" id="btnset" class="btn btn-success bttn">Update</button>
                           </div>
                        </div>
                     </div>
                  </form>
                  <?php
                     break;  
                        }
                      ?>
               </div>
            </div>
            <!-- Alert Setting End -->
            <br><br><br>
            <!-- Mail Triggers -->
            <div class="row">
               <div class="col-lg-4">
                  <h6  class="text-secondary">Send me Email notification whenever an Employee is added?</h6>
               </div>
               <br><br>
               <div class="col-lg-8">
                  <form id='test1' method="post">
                     <?php foreach($data1 as $row2){
                        ?> 
                     <div class="row">
                        <div class="col-lg-2">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="mailtrigger" id="exampleRadios1" value="0" <?php echo @$row2->employee_mail_trigger == 0 ? "checked" : "";?>>
                              <label class="form-check-label" for="exampleRadios3">
                              &nbsp&nbspNo
                              </label>
                           </div>
                        </div>
                        <div class="col-lg-2">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="mailtrigger" id="ena" value="1" <?php echo @$row2->employee_mail_trigger == 1 ? "checked" : "";?>>
                              <label class="form-check-label" for="exampleRadios4">
                              &nbsp&nbspYes
                              </label>
                           </div>
                        </div>
                        <div class="col-lg-8" style="text-align: end;">
                           <button type="button" id="btnoffline" class="btn btn-success bttn">Update</button>
                        </div>
                     </div>
                  </form>
                  <?php
                     break;  
                        }
                      ?>
               </div>
            </div>
            <!-- Mail Triggers -->
            <br>
            <br>
            <br>
            <br>
         </div>
         <!-- Container-Fluid End -->
         <?php  $this->load->view('menubar/footer');?>
      </main>
   </body>


 <?php 
        $this->load->view('menubar/allnewjs');
       ?>
      


  
 
   <script>
      var a='<?php echo @$dat->Status; ?>';
      if(a==0)
      {
        $('#time').val('');
        document.getElementById('time').disabled=true;
      }
      else
      {
      document.getElementById('time').disabled=false;
      }
   </script>
   <!--  <script>
      function openNav() 
      {
        document.getElementById("mySidenav").style.width = "360PX";
        $('#sidenavData').load('<?=URL?>help/helpNav',{'pageid' :'alert'});  
      }
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
      
      </script> -->
   <script type="text/javascript">
      $(document).ready(function() {  
      $('#time').val('<?=$time;?>');
      $('#btnset').click(function(){
      var time = $('#time').val();
      //alert(time);
      var enable = $('input[name=opt]:checked').val();
      //alert(enable);
      $.ajax({
      url: "<?php echo URL;?>Settings/alertsubmission",
      data:{"sts":enable,"time":time},
      success:function(result){
      if(result == "true"){
        doNotify('top','center',2,'Added successfully');
      }else{
        doNotify('top','center',2,'Alert updated successfully');
      }
      },
      error: function(result){
          doNotify('top','center',4,'Unable to connect API');
         }
      });
      });
      
      // $('.clockpicker').clockpicker({
      
      // placement: 'bottom',  // clock popover placement
      // align: 'left',        // popover arrow align
      // donetext: 'Done',     // done button text
      // autoclose: false,    // auto close when minute is selected
      // vibrate: true        // vibrate the device when dragging clock hand
      
      // });
      
      
      });
   </script>
   <script>
      $(document).ready(function() {  
        $('#btnvisitset').click(function()
      {
        var enablevisit = $('input[name=visitopt]:checked').val();
        $.ajax({
        url: "<?php echo URL;?>dashboard/visitstatus",
        data:{"sts":enablevisit},
        success:function(result){
        if(result == "true"){
          doNotify('top','center',2,'Added successfully');
        }else
      {
          doNotify('top','center',2,'Visit added successfully');
        }
        },
        error: function(result){
            doNotify('top','center',4,'Unable to connect API');
           }
        });
        });
        
        });   
          
   </script>
   <script>
      $(document).ready(function() {  
        $('#btnattset').click(function(){
        var enableatt = $('input[name=attopt]:checked').val();
        $.ajax({
        url: "<?php echo URL;?>dashboard/attstatus",
        data:{"sts":enableatt},
      
        success:function(result){
        if(result == "true")
          {
            doNotify('top','center',2,' Added successfully.');
          }
        else
          {
            doNotify('top','center',2,'Attendance image status added successfully');
          }
        },
        error: function(result)
          {
            doNotify('top','center',4,'Unable to connect API');
          }
        });
        });
        
        });   
          
   </script>
   <script>
      $(function(){
      $('input[type="radio"]').click(function(){
        {
         if($(this).val()==0)
      {
      document.getElementById('time').disabled=true;
      }
      else
      {
      document.getElementById('time').disabled=false;
      }
        }
      });
      });
   </script>
   <script>
      $(document).ready(function() {  
        $('#btnoffline').click(function()
      {
        var mailtrigger_sts = $('input[name=mailtrigger]:checked').val();
       // alert(mailtrigger_sts);
        $.ajax({
        url: "<?php echo URL;?>Settings/mailtrigger_sts_update",
        data:{"sts":mailtrigger_sts},
        success:function(result){
        if(result == "true"){
          doNotify('top','center',2,'Added successfully');
        }else
      {
          doNotify('top','center',2,'Updated successfully');
         
        }
        },
        error: function(result){
            doNotify('top','center',4,'Unable to connect API');
           }
        });
        });
        
        });   
          
   </script>
     <script type="text/javascript">
         $(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.sticky').addClass('active');
        } else {
            $('.sticky').removeClass('active');
        }
    });
});
      </script> 
</html>
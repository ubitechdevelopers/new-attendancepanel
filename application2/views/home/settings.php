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
          top: 3.3rem!important;
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
    
width: 8%;
height: 35%;   

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


      </style>
   </head>
   <body>
       <?php 
         $data['pageid']=8;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
         
             
         
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
             
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="row" style="margin-left: 0px;">
                        <span class="active5"> <a href="<?= URL; ?>Settings" class="subhead">Notifications</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <span ><a href="<?= URL; ?>Settings/alertsettings" class="subhead">Alerts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span ><a href="<?= URL; ?>Settings/activity" class="subhead">Activity</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
                        
                     </div>
                  </div>
                   
               </div>
            </div>
            <!--  -->
           
            <?php foreach ($data as  $row1) {
        // var_dump($row1); 
     ?>
      

           <table class="table table-borderless">
    <thead>
       
      <tr>
      
       <th><h4 ><b class="thick"></b></h4></th>

     
        <th  class="text-muted" style="padding-left: 2.7rem;">App</th>
        <th   class="text-muted" style="padding-left: 2.7rem;">Mail</th>
        <th   class="text-muted" style="padding-left: 1.2rem;"> Employee</th>
        <th  class="text-muted" style="padding-left: 2rem;">Admin</th>


       
      </tr>

    </thead>
     
  


    <tbody>


      <tr>

        <td><b>On Time off Start</b><br><h6 class="text-secondary" style="font-size: 13px;">Every time for every<br> Employee</h6></td>
        <td ><select class="border" id='timeoffstartapp'>
                                        <option name="timeoffstartapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffstartapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border" id='timeoffstartmail'>
                                        <option name="timeoffstartmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffstartmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border" id='timeoffstartemp'>
                                         <option name="timeoffstartemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffstartemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id='timeoffstartadmin'>
                                       <option name="timeoffstartadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffstartadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffStart),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>

      <tr>

        <td><b>On Time off End</b><br><h6 class="text-secondary" style="font-size: 13px;">Every time for every<br> Employee</h6></td>
        <td ><select class="border" id='timeoffendapp'>
                                       <option name="timeoffendapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffendapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border" id="timeoffendmail">
                                        <option name="timeoffendmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffendmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border" id="timeoffendemp">
                                        <option name="timeoffendemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffendemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border"  id="timeoffendadmin">
                                        <option name="timeoffendadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="timeoffendadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->TimeOffEnd),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>

      <tr>

        <td><b>Visit punch</b><br><h6 class="text-secondary" style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select class="border"  id="visitapp">
                                        <option name="visitapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="visitapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border" id="visitmail">
                                        <option name="visitmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="visitmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border" id="visitemp">
                                        <option name="visitemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="visitemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border"  id="visitadmin">
                                        <option name="visitadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="visitadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->Visit),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>

      <tr>

        <td><b>Outside Geofence</b><br><h6 class="text-secondary" style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select class="border" id="outsidefenceapp" >
                                        <option name="outsidefenceapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="outsidefenceapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border"id="outsidefencemail" >
                                        <option name="outsidefencemail" value="1" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="outsidefencemail" value="0" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border"id="outsidefenceemp" >
                                        <option name="outsidefenceemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="outsidefenceemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="outsidefenceadmin" >
                                        <option name="outsidefenceadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="outsidefenceadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->OutsideGeofence),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>

      <tr>

        <td><b>Fake Location</b><br><h6 class="text-secondary" style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select class="border" id="fakelocapp">
                                        <option name="fakelocapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="fakelocapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border"id="fakelocmail">
                                        <option name="fakelocmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="fakelocmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border"id="fakelocemp">
                                        <option name="fakelocemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="fakelocemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="fakelocadmin">
                                        <option name="fakelocadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="fakelocadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->FakeLocation),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>

      <tr>

        <td><b>Face ID registration</b><br><h6 class="text-secondary" style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select class="border" id="faceregapp">
                                        <option name="faceregapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="faceregapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border"id="faceregmail">
                                        <option name="faceregmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="faceregmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border"id="faceregemp">
                                        <option name="faceregemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="faceregemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="faceregadmin">
                                        <option name="faceregadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="faceregadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdReg),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>


      <tr>

        <td><b>Face ID disapproved</b><br><h6 class="text-secondary" style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select class="border" id="facedissapp">
                                        <option name="facedissapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="facedissapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
                                    
        <td ><select  class="border"id="facedissmail">
                                        <option name="facedissmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="facedissmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border"id="facedissemp">
                                        <option name="facedissemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="facedissemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="facedissadmin">
                                        <option name="facedissadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="facedissadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->FaceIdDisapproved),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>
      <tr>
        <td><b>Suspicious Selfie</b><br><h6 class="text-secondary"  style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select  class="border" id="susselfieapp">
                                        <option name="susselfieapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susselfieapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="susselfiemail">
                                        <option name="susselfiemail" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susselfiemail" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border" id="susselfieemp">
                                        <option name="susselfieemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susselfieemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td><select  class="border" id="susselfieadmin">
                                        <option name="susselfieadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susselfieadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousSelfie),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>
     
      <tr>
        <td><b>Suspicious Device</b><br><h6 class="text-secondary"  style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select  class="border" id="susdeviceapp">
                                        <option name="susdeviceapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susdeviceapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="susdevicemail">
                                        <option name="susdevicemail" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susdevicemail" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border" id="susdeviceemp">
                                        <option name="susdeviceemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susdeviceemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="susdeviceadmin">
                                        <option name="susdeviceadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="susdeviceadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->SuspiciousDevice),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>
       <tr>
        <td><b>Disapproved Attendance</b><br><h6 class="text-secondary"  style="font-size: 13px;">
Every Instance</h6></td>
        <td><select  class="border" id="dissappattapp">
                                        <option name="dissappattapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="dissappattapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td><select  class="border" id="dissappattmail">
                                        <option name="dissappattmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="dissappattmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td><select  class="border" id="dissappattemp">
                                        <option name="dissappattemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="dissappattemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="dissappattadmin">
                                        <option name="dissappattadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="dissappattadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->DisapprovedAtt),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>
       <tr>
        <td><b>Attendance edited</b><br><h6 class="text-secondary"  style="font-size: 13px;">
Every Instance</h6></td>
        <td ><select  class="border" id="atteditapp">
                                        <option name="atteditapp" value="1" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="atteditapp" value="0" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[0] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
        <td ><select  class="border" id="atteditmail">
                                        <option name="atteditmail" value="1" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="atteditmail" value="0" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[1] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
         <td ><select  class="border " id="atteditemp">
                                        <option name="atteditemp" value="1" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="atteditemp" value="0" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[2] == 0 ? "selected" : "";?>>Deny</option>                     
                                         </select></td>
        <td ><select  class="border" id="atteditadmin">
                                        <option name="atteditadmin" value="1" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Allow</option>
                                        <option name="atteditadmin" value="0" id="ena" <?php echo @str_pad(decbin($row1->AttEdited),4,"0",STR_PAD_LEFT)[3] == 0 ? "selected" : "";?>>Deny</option>
                                    </select></td>
      </tr>
    </tbody>

  </table>
  <?php
Break;}
?>


           <div class="row">
                                  <div class="col-lg-5">
                                  </div>
                                    <div class="col-lg-7" style="padding-left: 15.25rem;">
                                   
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="btnoffline" class="btn btn-success bttn">Save</button>
                      </div>
                    </div> 

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
            </div>
            <?php  $this->load->view('menubar/footer');?>
      </main>
     
    

     
   </body>
  
   
   
      <?php 
        $this->load->view('menubar/allnewjs');
       ?>
  
 
  <script>
   $(document).ready(function() {  
    $('#btnoffline').click(function()
  {
    var payapp=$('input[name=paymentapp]:checked').val();
    var paymail=$('input[name=paymentmail]:checked').val();
    var payemp=$('input[name=paymentemp]:checked').val();
     if(payemp==undefined){
      var payemp=0;
    }
    var payadmin=$('input[name=paymentadmin]:checked').val();
    if(payadmin==undefined){
      var payadmin=0;
    }
    //alert(payrec);
    var paydue=payapp+paymail+payemp+payadmin;  
    //alert(paydue);

    var absentapp = $('input[name=absentapp]:checked').val();
    var absentmail = $('input[name=absentmail]:checked').val();
    var absentemp = $('input[name=absentemp]:checked').val();
    if(absentemp==undefined){
      absentemp=0;
    }
    var absentadmin = $('input[name=absentadmin]:checked').val();
    if(absentadmin==undefined){
      absentadmin=0;
    }
    var absent1=absentapp+absentmail+absentemp+absentadmin;

    var lateapp = $('input[name=lateapp]:checked').val();
    var latemail = $('input[name=latemail]:checked').val();
    var lateemp = $('input[name=lateemp]:checked').val();
    if(lateemp==undefined){
      lateemp=0;
    }
    var lateadmin = $('input[name=lateadmin]:checked').val();
    if(lateadmin==undefined){
      lateadmin=0;
    }
    var late1=lateapp+latemail+lateemp+lateadmin;


    var undertimeapp = $('input[name=undertimeapp]:checked').val();
     if(undertimeapp==undefined){
      undertimeapp=0;
    }
    var undertimemail = $('input[name=undertimemail]:checked').val();
     if(undertimemail==undefined){
      undertimemail=0;
    }
    var undertimeemp = $('input[name=undertimeemp]:checked').val(); 
    if(undertimeemp==undefined){
      undertimeemp=0;
    }
    var undertimeadmin = $('input[name=undertimeadmin]:checked').val();
    if(undertimeadmin==undefined){
      undertimeadmin=0;
    }
    var undertime1=undertimeapp+undertimemail+undertimeemp+undertimeadmin;

    var earlyapp = $('input[name=earlyapp]:checked').val();
    var earlymail = $('input[name=earlymail]:checked').val();
    var earlyemp = $('input[name=earlyemp]:checked').val();
    if(earlyemp==undefined){
      earlyemp=0;
    }
    var earlyadmin = $('input[name=earlyadmin]:checked').val();
    if(earlyadmin==undefined){
      earlyadmin=0;
    }

    var earlyleav=earlyapp+earlymail+earlyemp+earlyadmin;

    /*var timeoffstartapp = $('input[name=timeoffstartapp]:checked').val();
     if(timeoffstartapp==undefined){
      timeoffstartapp=0;
    }*/
    var timeoffstartapp=$('#timeoffstartapp').val();
    var timeoffstartmail=$('#timeoffstartmail').val();
    var timeoffstartemp=$('#timeoffstartemp').val();
    var timeoffstartadmin=$('#timeoffstartadmin').val();

    /*var timeoffstartmail = $('input[name=timeoffstartmail]:checked').val();
     if(timeoffstartmail==undefined){
      timeoffstartmail=0;
    }*/
    /*var timeoffstartemp = $('input[name=timeoffstartemp]:checked').val(); 
     if(timeoffstartemp==undefined){
      timeoffstartemp=0;
    }*/
    /*var timeoffstartadmin = $('input[name=timeoffstartadmin]:checked').val();

    if(timeoffstartadmin==undefined){
      timeoffstartadmin=0;
    }*/
    var timeoffstart1=timeoffstartapp+timeoffstartmail+timeoffstartemp+timeoffstartadmin;
   // alert(timeoffstart1);


    var timeoffendapp=$('#timeoffendapp').val();
    var timeoffendmail=$('#timeoffendmail').val();
    var timeoffendemp=$('#timeoffendemp').val();
    var timeoffendadmin=$('#timeoffendadmin').val();
    // var timeoffendapp = $('input[name=timeoffendapp]:checked').val();
    //  if(timeoffendapp==undefined){
    //   timeoffendapp=0;
    // }
    // var timeoffendmail = $('input[name=timeoffendmail]:checked').val();
    //  if(timeoffendmail==undefined){
    //   timeoffendmail=0;
    // }
    // var timeoffendemp = $('input[name=timeoffendemp]:checked').val();
    // if(timeoffendemp==undefined){
    //   timeoffendemp=0;
    // }
    // var timeoffendadmin = $('input[name=timeoffendadmin]:checked').val();
    // if(timeoffendadmin==undefined){
    //   timeoffendadmin=0;
    // }

    var timeoffend1=timeoffendapp+timeoffendmail+timeoffendemp+timeoffendadmin;


    // var visitapp = $('input[name=visitapp]:checked').val();
    //  if(visitapp==undefined){
    //   visitapp=0;
    // }
    // var visitmail = $('input[name=visitmail]:checked').val();
    // if(visitmail==undefined){
    //   visitmail=0;
    // }
    // var visitemp = $('input[name=visitemp]:checked').val();
    // if(visitemp==undefined){
    //   visitemp=0;
    // } 
    // var visitadmin = $('input[name=visitadmin]:checked').val();
    // if(visitadmin==undefined){
    //   visitadmin=0;
    // }
    var visitapp=$('#visitapp').val();
    var visitmail=$('#visitmail').val();
    var visitemp=$('#visitemp').val();
    var visitadmin=$('#visitadmin').val();

    var visit1=visitapp+visitmail+visitemp+visitadmin;
    //alert(visit1);


    // var outsidefenceapp = $('input[name=outsidefenceapp]:checked').val();
    // if(outsidefenceapp==undefined){
    //   outsidefenceapp=0;
    // }
    // var outsidefencemail = $('input[name=outsidefencemail]:checked').val();
    // if(outsidefencemail==undefined){
    //   outsidefencemail=0;
    // }
    // var outsidefenceemp = $('input[name=outsidefenceemp]:checked').val();
    // if(outsidefenceemp==undefined){
    //   outsidefenceemp=0;
    // }
    // var outsidefenceadmin = $('input[name=outsidefenceadmin]:checked').val();
    // if(outsidefenceadmin==undefined){
    //   outsidefenceadmin=0;
    // }
    var outsidefenceapp=$('#outsidefenceapp').val();
    var outsidefencemail=$('#outsidefencemail').val();
    var outsidefenceemp=$('#outsidefenceemp').val();
    var outsidefenceadmin=$('#outsidefenceadmin').val();
    var outsidefence1=outsidefenceapp+outsidefencemail+outsidefenceemp+outsidefenceadmin;


    // var fakelocapp = $('input[name=fakelocapp]:checked').val();
    // if(fakelocapp==undefined){
    //   fakelocapp=0;
    // }
    // var fakelocmail = $('input[name=fakelocmail]:checked').val();
    // if(fakelocmail==undefined){
    //   fakelocmail=0;
    // }
    // var fakelocemp = $('input[name=fakelocemp]:checked').val();
    // if(fakelocemp==undefined){
    //   fakelocemp=0;
    // }
    // var fakelocadmin = $('input[name=fakelocadmin]:checked').val();
    // if(fakelocadmin==undefined){
    //   fakelocadmin=0;
    // }
    var fakelocapp=$('#fakelocapp').val();
    var fakelocmail=$('#fakelocmail').val();
    var fakelocemp=$('#fakelocemp').val();
    var fakelocadmin=$('#fakelocadmin').val();

    var fakelocation=fakelocapp+fakelocmail+fakelocemp+fakelocadmin;


    // var faceregapp = $('input[name=faceregapp]:checked').val();
    // if(faceregapp==undefined){
    //   faceregapp=0;
    // }
    // var faceregmail = $('input[name=faceregmail]:checked').val();
    // if(faceregmail==undefined){
    //   faceregmail=0;
    // }
    // var faceregemp = $('input[name=faceregemp]:checked').val();
    //  if(faceregemp==undefined){
    //   faceregemp=0;
    // }
    // var faceregadmin = $('input[name=faceregadmin]:checked').val();
    // if(faceregadmin==undefined){
    //   faceregadmin=0;
    // }
    var faceregapp=$('#faceregapp').val();
    var faceregmail=$('#faceregmail').val();
    var faceregemp=$('#faceregemp').val();
    var faceregadmin=$('#faceregadmin').val();
    var faceidreg1=faceregapp+faceregmail+faceregemp+faceregadmin;
    //alert(faceidreg1);


    // var facedissapp = $('input[name=facedissapp]:checked').val(); 
    // if(facedissapp==undefined){
    //   facedissapp=0;
    // }
    // var facedissmail = $('input[name=facedissmail]:checked').val();
    // if(facedissmail==undefined){
    //   facedissmail=0;
    // }
    // var facedissemp = $('input[name=facedissemp]:checked').val();
    // if(facedissemp==undefined){
    //   facedissemp=0;
    // }
    // var facedissadmin = $('input[name=facedissadmin]:checked').val();
    // if(facedissadmin==undefined){
    //   facedissadmin=0;
    // }
    var facedissapp=$('#facedissapp').val();
    var facedissmail=$('#facedissmail').val();
    var facedissemp=$('#facedissemp').val();
    var facedissadmin=$('#facedissadmin').val();
    var faceiddissapp1=facedissapp+facedissmail+facedissemp+facedissadmin;


    // var susselfieapp = $('input[name=susselfieapp]:checked').val();
    // if(susselfieapp==undefined){
    //   susselfieapp=0;
    // }
    // var susselfiemail = $('input[name=susselfiemail]:checked').val();
    // if(susselfiemail==undefined){
    //   susselfiemail=0;
    // }
    // var susselfieemp = $('input[name=susselfieemp]:checked').val();
    // if(susselfieemp==undefined){
    //   susselfieemp=0;
    // }
    // var susselfieadmin = $('input[name=susselfieadmin]:checked').val();
    // if(susselfieadmin==undefined){
    //   susselfieadmin=0;
    // }
     var susselfieapp=$('#susselfieapp').val();
    var susselfiemail=$('#susselfiemail').val();
    var susselfieemp=$('#susselfieemp').val();
    var susselfieadmin=$('#susselfieadmin').val();
    var suspiciousselfie=susselfieapp+susselfiemail+susselfieemp+susselfieadmin;


    // var susdeviceapp = $('input[name=susdeviceapp]:checked').val();
    // if(susdeviceapp==undefined){
    //   susdeviceapp=0;
    // }
    // var susdevicemail = $('input[name=susdevicemail]:checked').val();
    // if(susdevicemail==undefined){
    //   susdevicemail=0;
    // }
    // var susdeviceemp = $('input[name=susdeviceemp]:checked').val();
    // if(susdeviceemp==undefined){
    //   susdeviceemp=0;
    // }
    // var susdeviceadmin = $('input[name=susdeviceadmin]:checked').val();
    // if(susdeviceadmin==undefined){
    //   susdeviceadmin=0;
    // }
     var susdeviceapp=$('#susdeviceapp').val();
    var susdevicemail=$('#susdevicemail').val();
    var susdeviceemp=$('#susdeviceemp').val();
    var susdeviceadmin=$('#susdeviceadmin').val();
    var suspiciousdevice1=susdeviceapp+susdevicemail+susdeviceemp+susdeviceadmin;
    //alert(suspiciousdevice1);


    // var dissappattapp = $('input[name=dissappattapp]:checked').val();
    // if(dissappattapp==undefined){
    //   dissappattapp=0;
    // }
    // var dissappattmail = $('input[name=dissappattmail]:checked').val();
    // if(dissappattmail==undefined){
    //   dissappattmail=0;
    // }
    // var dissappattemp = $('input[name=dissappattemp]:checked').val();
    // if(dissappattemp==undefined){
    //   dissappattemp=0;
    // }
    // var dissappattadmin = $('input[name=dissappattadmin]:checked').val();
    // if(dissappattadmin==undefined){
    //   dissappattadmin=0;
    // }
    var dissappattapp=$('#dissappattapp').val();
    var dissappattmail=$('#dissappattmail').val();
    var dissappattemp=$('#dissappattemp').val();
    var dissappattadmin=$('#dissappattadmin').val();
    var dissapprovedatt=dissappattapp+dissappattmail+dissappattemp+dissappattadmin;


    // var atteditapp = $('input[name=atteditapp]:checked').val();
    //  if(atteditapp==undefined){
    //   atteditapp=0;
    // }
    // var atteditmail = $('input[name=atteditmail]:checked').val();
    //  if(atteditmail==undefined){
    //   atteditmail=0;
    // }
    // var atteditemp = $('input[name=atteditemp]:checked').val();
    //  if(atteditemp==undefined){
    //   atteditemp=0;
    // }
    // var atteditadmin = $('input[name=atteditadmin]:checked').val();
    // if(atteditadmin==undefined){
    //   atteditadmin=0;
    // }
    var atteditapp=$('#atteditapp').val();
    var atteditmail=$('#atteditmail').val();
    var atteditemp=$('#atteditemp').val();
    var atteditadmin=$('#atteditadmin').val();
    var attedit1=atteditapp+atteditmail+atteditemp+atteditadmin;
     //alert(attedit1);


    var misstimeoutapp = $('input[name=misstimeoutapp]:checked').val();
    var misstimeoutmail = $('input[name=misstimeoutmail]:checked').val();
    var misstimeoutemp = $('input[name=misstimeoutemp]:checked').val();
    if(misstimeoutemp==undefined){
      misstimeoutemp=0;
    }
    var misstimeoutadmin = $('input[name=misstimeoutadmin]:checked').val();
    if(misstimeoutadmin==undefined){
      misstimeoutadmin=0;
    }
    var misstimeout1=misstimeoutapp+misstimeoutmail+misstimeoutemp+misstimeoutadmin;



    var timeoffapp = $('input[name=ChangedPassword]:checked').val();
    var timeoffmail = $('input[name=ChangedPassword]:checked').val();
    var timeoffemp = $('input[name=ChangedPassword]:checked').val();
    if(timeoffemp==undefined){
      timeoffemp=0;
    }
    var timeoffadmin = $('input[name=ChangedPassword]:checked').val();
    if(timeoffadmin==undefined){
      timeoffadmin=0;
    }
    var timeoff1=timeoffapp+timeoffmail+timeoffemp+timeoffadmin;


    var chngpwdapp = $('input[name=chngpwdapp]:checked').val();
    if(chngpwdapp==undefined){
      chngpwdapp=0;
    }
    var chngpwdmail = $('input[name=chngpwdmail]:checked').val();
    if(chngpwdmail==undefined){
      chngpwdmail=0;
    }
    var chngpwdemp = $('input[name=chngpwdemp]:checked').val();
     if(chngpwdemp==undefined){
      chngpwdemp=0;
    }
    var chngpwdadmin = $('input[name=chngpwdadmin]:checked').val();
    if(chngpwdadmin==undefined){
      chngpwdadmin=0;
    }
    var changedpwd1=chngpwdapp+chngpwdmail+chngpwdemp+chngpwdadmin;
   
   
  
    $.ajax({
    url: "<?php echo URL;?>settings/notification_sts_update",
    //data:{"undertime":undertime,"visit":visit,"outsidefence":outsidefence,"fakeloc":fakeloc,"facereg":facereg,"faceiddiss":faceiddiss,"sussefie":sussefie,"susdevice":susdevice,"dissappatt":dissappatt,"attedit":attedit,"chngpwd":chngpwd},
   // data:{"paydue":paydue,"absent1":absent1,"late1":late1,"undertime1":undertime1,"earlyleav":earlyleav,"timeoffstart1":timeoffstart1,"timeoffend1":timeoffend1,"visit1":visit1,"outsidefence1":outsidefence1,"fakelocation":fakelocation,"faceidreg1":faceidreg1,"faceiddissapp1":faceiddissapp1,"suspiciousselfie":suspiciousselfie,"suspiciousdevice":suspiciousdevice,"dissapprovedatt":dissapprovedatt,"attedit1":attedit1,"misstimeout1":misstimeout1,"timeoff1":timeoff1,"changedpwd1":changedpwd1},
    data:{"timeoffstart1":timeoffstart1,"timeoffend1":timeoffend1,"visit1":visit1,"outsidefence1":outsidefence1,"fakelocation":fakelocation,"faceidreg1":faceidreg1,"faceiddissapp1":faceiddissapp1,"suspiciousselfie":suspiciousselfie,"suspiciousdevice1":suspiciousdevice1,"dissapprovedatt":dissapprovedatt,"attedit1":attedit1,"changedpwd1":changedpwd1},

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
      
      
 
  <script>
    $(document).ready(function(){
    $('.toggle-sidebar').click(function(){
    $("#sidebar").toggleClass("collapsed t2");
    $("#content").toggleClass("col-md-9");
    //$("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'selfie'}); 
    });
    
    });
  </script>
  
  <script>
 function undertime12() {
    
     var undertime = $('input[name=undertime]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/undertimests",
    data:{"undertime":undertime},
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
  }
  
   function visit12() {
    
     var visit = $('input[name=visit]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/visitsts",
    data:{"visit":visit},
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
  }
  
  
  function OutsideGeofenca12() {
    
    var outsidefence = $('input[name=OutsideGeofenca]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/outsidegeofencests",
    data:{"outsidefence":outsidefence},
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
  }
  
  function FakeLocation12() {
    
    var fakeloc = $('input[name=FakeLocation]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/fakelocsts",
    data:{"fakeloc":fakeloc},
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
  }
  
  function FaceIdReg12() {
    
    var facereg = $('input[name=FaceIdReg]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/faceregsts",
    data:{"facereg":facereg},
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
  }
  
  function FaceIdDisapproved12() {
    
    var faceiddiss = $('input[name=FaceIdDisapproved]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/faceiddissapp",
    data:{"faceiddiss":faceiddiss},
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
  }
  
  
  function SuspiciousSelfie12() {
    
    var sussefie = $('input[name=SuspiciousSelfie]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/sussefiests",
    data:{"sussefie":sussefie},
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
  } 
  
  
  function SuspiciousDevice12() {
    
    var susdevice = $('input[name=SuspiciousDevice]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/susdevicests",
    data:{"susdevice":susdevice},
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
  } 
  
  function DisapprovedAtt12() {
    
    var dissappatt = $('input[name=DisapprovedAtt]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/dissappattsts",
    data:{"dissappatt":dissappatt},
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
  }
  
  
  function AttEdited12() {
    
    var attedit = $('input[name=AttEdited]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/atteditsts",
    data:{"attedit":attedit},
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
  }
  
  function ChangedPassword12() {
    
    var chngpwd = $('input[name=ChangedPassword]:checked').val();
     
    $.ajax({
    url: "<?php echo URL;?>dashboard/chngpwdsts",
    data:{"chngpwd":chngpwd},
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
  }
  
  
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
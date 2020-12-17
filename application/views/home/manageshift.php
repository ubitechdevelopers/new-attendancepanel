
<!DOCTYPE html>
<html>
   <head>
      <title></title>
  
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/css.css">
	  
   
	   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/css.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/bootstrap-select.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/bootstrap-select.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/bootstrap.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/bootstrap.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/buttons.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/css2.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/datepicker.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/daterangepicker.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/font-awesome.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/gijgo.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/jquery-ui-timepicker-addon.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/owl.carousel.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/owl.theme.default.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/swiper.min.css">
      <link rel="stylesheet" href="<?=URL?>../assets/css/jquery.timesetter.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?=URL?>../assets/clockpicker/bootstrap-clockpicker.min.css">
      <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
      <link href="<?= URL ?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
     
      
   
     

    
      
	  
     
      <style type="text/css">        
         div.dataTables_wrapper div.dataTables_filter input {
         /* margin-left: 0.5em; */
         /* display: inline-block; */
         /* width: auto;
         width: 130px;
         border: 2px solid #ccc;*/
         margin-top: -1rem;
         position: absolute;
         box-sizing: border-box;
         width: 3rem;
         border:none;
         border-radius: 4px;
         font-size: 16px;
         background-image: url('<?=URL?>../assets/icons/u_search.svg');
         background-position: 10px 12px;
         background-repeat: no-repeat;
         padding: 21px 20px 23px 40px;
         -webkit-transition: width 0.4s ease-in-out;
         transition: width 0.4s ease-in-out;
         }
         div.dataTables_wrapper div.dataTables_filter input:focus{
         width: 20rem;
         background-color: #e9f1e8;
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
font-weight:500;
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
         font-weight: bold;
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
         width: 28.4rem!important;
         }
         }
         .buttons-collection{
         border: none;
         position: relative;
         /* top: -4.6rem;
         left: 44rem;*/
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 500;
         color: #4B506D!important;
         font-size: 14px!important;
         margin-right: -13px!important;
         }
         .dt-buttons {
            float : right ;
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
         .red{
         background-color: red;
         }
         .green{
         background-color: green;
         }
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
         top: 3.5rem!important;
         z-index: 2000;
         }
		 #undefinedchecked
		 {
			 display:none;
		 }
		 .fa, .fas {
    font-weight: 500!important;
}
.list-group-item:last-child {
   
    padding: 10px 20px 10px 20px;
}
.row {
   
	margin-left:-8px;
}


.hover:hover{
   background-color:  #ECECEC;

}
.table-loader{
   visibility:hidden;
}
.table-loader:before {
    visibility:visible;
    display:table-caption;
    content: " ";
    width: 100%;
		height: 600px;
		background-image:
		linear-gradient( rgba(235, 235, 235, 1) 1px, transparent 0 ),
      linear-gradient(90deg, rgba(235, 235, 235, 1) 1px, transparent 0 ),
      linear-gradient( 90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5) 15%, rgba(255, 255, 255, 0) 30% ),
      linear-gradient( rgba(240, 240, 242, 1) 35px, transparent 0 )
			;

		background-repeat: repeat;

		background-size:
			1px 35px,
			calc(100% * 0.1666666666) 1px,
      30% 100%,
      2px 70px;

		background-position:
			0 0,
      0 0,
      0 0,
			0 0;

		animation: shine 0.5s infinite;
	}

	@keyframes shine {
		to {
			background-position:
				0 0,
        0 0,
        40% 0,
				0 0;
		}
	}

         .dt-buttons a:nth-child(n):hover{
          background: #ECECEC;
	     } 
         .dt-button-collection .dropdown-menu{
	      padding:0;
         }
		 .popshow a div{display:none;

}
		
.popshow a:hover div {
		display:block;
		text-decoration:none;
		position:fixed;
		width:auto;
		padding:20px 23px 20px 20px;
		margin-right: 5%;
    margin-left: -11%;
  
    background: #FFFFFF;  
	 transition: height 1s;
   padding: 10px 10px 10px 10px;
  transition: height 1s;
	text-align:justify;
	font-size:13.5px;
}
   

      </style>
      <!--  <?php
         $orgid=$_SESSION['orgid'];
         if($orgid=="35171" || $orgid=="70799 " || $orgid=='10'||  $orgid=="92289" || $orgid=="92291"){?> -->
      <!--  <script>
         function myFunction(gettime){
             document.getElementById("gracetime").value = gettime;
         
         }  
         
         $( document ).ready(function() {
         $('#').clockpicker({
         });
         
         });  
         
         function getdiff1() {
            setTimeout(function(){
           var timeFrom = $('#gracetime').data('clockpicker');
           var timeTO = $('#timein').data('clockpicker');
          
         // debugger;
           var timeFromHH = (timeFrom.hour == 12 && timeFrom.meridian == "AM") ? 0 :
             (timeFrom.hour != 12 && timeFrom.meridian == "PM") ? timeFrom.hour + 12 :
             timeFrom.hour;
           var timeTOHH = (timeTO.hour == 12 && timeTO.meridian == "AM") ? 0 :
             (timeTO.hour != 12 && timeTO.meridian == "PM") ? timeTO.hour + 12 :
             timeTO.hour;
         
           var timeFromMM = timeFromHH * 60 + timeFrom.minute;
           var timeTOMM = timeTOHH * 60 + timeTO.minute;
         
           var diffMM = Math.abs(timeTOMM - timeFromMM);
           var diff = Math.floor(diffMM / 60) + "hrs " + (diffMM % 60) + "mins";
           // alert(diff);
         
          
           $("#tgracetime").val(diff);
           }, 1000);
         }
         
         </script>
          -->
      <!-- <script type="text/javascript">
         function myfunc(gettimeout){
          document.getElementById("gracetimeout").value = gettimeout;
         
         }
         
         $( document ).ready(function() {
         $('.timerow').clockpicker({
           
         });
         });
         function getDifference(){
         setTimeout(function(){
         var timeoutFrom = $('#gracetimeout').data('clockpicker');
         var timeoutTO = $('#timeOut').data('clockpicker');
         console.log(timeoutFrom);
         var timeoutFromHH = (timeoutFrom.hour == 12 && timeoutFrom.meridian == "AM") ? 0 :
          (timeoutFrom.hour != 12 && timeoutFrom.meridian == "PM") ? timeoutFrom.hour + 12 :
          timeoutFrom.hour;
         var timeoutTOHH = (timeoutTO.hour == 12 && timeToutO.meridian == "AM") ? 0 :
          (timeoutTO.hour != 12 && timeoutTO.meridian == "PM") ? timeoutTO.hour + 12 :
          timeoutTO.hour;
         
         var timeoutFromMM = timeoutFromHH * 60 + timeoutFrom.minute;
         var timeoutTOMM = timeoutTOHH * 60 + timeoutTO.minute;
         
         var diffMM = Math.abs(timeoutTOMM - timeoutFromMM);
         var difference = Math.floor(diffMM / 60) + "hrs " + (diffMM % 60) + "mins";
         // alert(diff);
         
         
         $("#tgracetimeout").val(difference);
         }, 1000);
         }
         
         </script>  -->
      <!-- 
         <?php } ?> -->
   </head>
   <body ng-app ="adminapp"  ng-controller="attroasterCtrl">
      <?php 
      
         $data['pageid']=7;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         
         ?>
      <main class="main">
         <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
           
           
           
            <div class="row">
               <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                  <div class="row">
                     <span class="active5"> <a href="<?= URL; ?>Managesettings/index" class="subhead">Shifts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                     <span ><a href="<?= URL; ?>Managesettings/department" class="subhead">Department</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                     <span><a href="<?= URL; ?>Managesettings/designation"  class="subhead">Designation</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <span><a href="<?= URL; ?>Managesettings/holidays" class="subhead">Holidays</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <span><a href="<?= URL; ?>Managesettings/geofence"  class="subhead">Geo Fence</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <span><a href="<?= URL; ?>Managesettings/hourlyrate" class="subhead">Hourly Rate</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
               </div>
			    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			    <button class="primary-button" data-toggle="modal" style = "float:right;" data-target="#myModal">
                     <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span>Add Shift</div>
                  </button>
				  </div>
            </div>
         </div>
		 </div>
         <!--  -->
        
         <table id="example" class="table dataTable display" style="width:100%;">
            <thead>
               <tr>
                  <th>Shifts</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Shift Type</th>
                  <th>Shift Hours</th>
                  <th>Status</th>
                  <th>Break Start Time</th>
                  <th>Break  End Time</th>
                  <th>Time In Grace</th>
                  <th>Time Out Grace</th>
                  <th>Work Hours</th>
                  <th>Action</th>
               </tr>
            </thead>
            </thead>
         </table>
         <?php  $this->load->view('menubar/footer');?>
      </main>
      <!--column Visibility-->
      <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="<?= URL; ?>Attendance/allattendance"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>&Columns Visibility</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form role="form1" >
                  <div class="modal-body">
                     <div class="form-group" >
                        <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label><br>  -->
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Shifts</label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled >&nbsp;TimeIn</label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;TimeOut </label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp;Shift Type</label><br>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" disabled >&nbsp;Shift hours    </label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" disabled>&nbsp;Status   </label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" >&nbsp;  break Start Time  </label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk7" >&nbsp;  break End Time </label><br>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk8" >&nbsp;Time In grace  </label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk9" >&nbsp; Time out Grace</label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk10" >&nbsp;Work Hours </label><br>
                           </div>
                        </div>
                     </div>
                     <div class="right">
                        <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
                        <button type="submit" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!--################################UpdateShift############################### -->
      <div class="modal fade" id="viewshift" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>Update Shift</a></h5>
                  <input type="hidden" id="shiftIds">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
               </div>
               <div class="modal-footer">
                  <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color: #808080">Cancel</button>
                  &nbsp;&nbsp;
                  <button type="submit"  class="btn btn-success bttn" id="updtshift" data-dismiss="modal" style="color: white">Update</button>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <!--#################################Delete Shift############################# -->
      <div class="modal fade" id="delShift" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="<?= URL; ?>Attendance/allattendance"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>Delete Shift</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="del_sid" />
                     <div class="row">
                        <div class="col-md-12">
                           <h6>Delete the "<span id="sna"></span>" shift?</h6>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </form>
               </div>
               <div class="modal-footer">
                  
                  
                  <button type="submit" id="delete"  class="btn btn-success bttn">Delete</button>
                  <button type="submit" class="btn btn-light bttn  bttn mx-2" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!--#################################Delete Shift End############################# -->
      <!---######################Assign model###################-->
      <!-- assign Shift -->
      <div class="modal fade" id="assign" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>Assign Shift</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="uid" />
                     <p> Select the employee(s) to assign this shift </p>
                     <div class="panel">
                        <div class="panel-body" >
                           <div class="row">
                              <div class="well" style="max-height: 300px;overflow: auto; width: 31rem;">
                                 <ul  class="list-group checked-list-box" id="check-list-box">
                                    <div ng-if="emparray!=''">
                                       <div ng-repeat="c in emparray" >
                                          <li class=" list-group-item" data-color="success" id="{{c.id}}" ng-click="getchecklistid($index)">
                                             <label >{{$index+1}}.  {{c.name}} </label>
                                          </li>
                                       </div>
                                    </div>
                                    <div ng-if="emparray==''">
                                       <p>This Shift has already been assigned to all employees</p>
                                    </div>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </form>
                  <br>
                  <div class="row">
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-9" style="text-align: end;">
                        <div ng-if="emparray!=''">
                           <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Close</button>
                           <button type="button"  class="btn btn-success  bttn fit" ng-click="SaveEmpList(1)">Assign</button>
                        </div>
                        <div ng-if="emparray==''">
                           <!-- <button type="button"  class="btn btn-success" ng-click="SaveEmpList(1)">Assign</button> -->
                           <button type="button" class="btn btn-secondary bttn" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>



      
      <!--end assign SHIFT -->
      <!-- assign SHIFT -->
      <div class="modal fade" id="assign1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>Assign Shift</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="uid" />
                     <p> Select the employee(s) to assign this shift </p>
                     <div>This Shift is inactive. Change the status to Active to assign it to employees.</div>
                     <div class="clearfix"></div>
                  </form>
                  <br>
                  <div class="row">
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-9" style="text-align: end;">
                        <div ng-if="emparray!=''">
                           <button type="button" class="btn btn-light bttn" data-dismiss="modal">Close</button>
                           <button type="button"  class="btn btn-success  bttn" ng-click="SaveEmpList(1)">Assign</button>
                        </div>
                        <div ng-if="emparray==''">
                           <!-- <button type="button"  class="btn btn-success" ng-click="SaveEmpList(1)">Assign</button> -->
                           <button type="button" class="btn btn-light bttn" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <!--end assign Shift -->
      <!--########################## Assign Model end here###################### -->
      <!-- Inserting main Data Modal -->
      <form  id="main1" method="post">
         <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" style="margin-left:-10px;" ><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>Shift List</a></h5>
					  <img src="<?= URL ?>../assets/img/help-circle.svg" style="margin-left:38rem;">
					 <div class="popshow " >
    <a href=""><p style="color:black;">Help</p>
        
						<div class="shadow-lg" style=" z-index:9999;">
						   
						        

                               &nbsp;&nbsp;<b>* Single Date-</b>
						        <ul> 
								 <li>Shift which starts & ends on the same date.</li>
								  <li>Enter <b>‘Shift Name’</b></li>
								  <li>Select shift start & end timings</li>
								  <li>Select break start & end timings</li>
								  <li>Select working days & week offs</li>
								  <li>Click on <b>‘Save’</b> Button</li>
								</ul>  

								&nbsp;&nbsp;<b>* Multi Date-</b>
						        <ul> 
								 <li>Shift ends on the consecutive day & crosses(12:00 AM).</li>
								  <li>Enter <b>‘Shift Name’</b></li>
								  <li>Select shift start & end timings</li>
								  <li>Select break start & end timings</li>
								  <li>Select working days & week offs</li>
								  <li>Click on <b>‘Save’</b> Button</li>
								</ul> 

								<?php
								$permis = getAddonPermission($_SESSION['orgid'],'Addon_BulkAttn');
								if($permis != 1)
								{
								?>

								&nbsp;&nbsp;<b>* Flexi Shift-</b>
						        <ul> 
								<li> Shift which is hourly based.</li>
								  <li>Enter <b>‘Shift Name’</b></li>
								  <li>Select total working hours</li>
								  <li>Select working days and week offs</li>
								  <li>Click on <b>‘Save’</b> Button</li>
								</ul> 

								<?php
							    }
								?>

						  
						</div>
						
    </a>
</div>
                    
                  </div>
                  <div class="modal-body">
                     <div class="container">
                        <div class="form-group row">
                           <div class="col-sm-3">
                           </div>
                           <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Shift Type</label>
                           <div class="col-sm-4">
                              <select class="form-control form-control-sm" id="shifttype"  name="shifttype" value="" onchange="myFunction()">
                                 <option value="1">Single Shift</option>
                                 <option value="2">Multi Shift</option>
                                 <option id="fs" value="3" >Flexi</option>
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
                              <input type="text" class="form-control form-control-sm" id="shiftname" name="shiftname" placeholder="Shift Name"> <span id="shiftname_error" class="error_form"></span>
                           </div>
                           <div class="col-sm-3">
                           </div>
                        </div>
                        <!-- ##############################Shift Time condition 1###################### -->
                       
                        <!-- <div class="form-group row" id="timerow">
                           <div class="col-sm-3">
                           </div>
                           <label for="colFormLabelSm"  class="col-sm-2 col-form-label col-form-label-sm">Shift Time</label>
                           <div class="col-sm-2">
                              <div class="input-group mb-3 clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true" >
                                 <div class="input-group mb-3" id="timein1" >
                                    <input type="text" class="form-control"  name="timeduration" ng-model="timeduration" id="timeIn" readonly>
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="input-group clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                 <div class="input-group mb-3" id="timeout1">
                                    <input type="text" class="form-control "  name="timeduration" ng-model="timeduration" id="timeOut" readonly >
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                           </div>
                        </div> -->
                        
                        <!-- ##############################Shift Time condition 2###################### -->
                        <div class="form-group row" id="timerow1">
                           <div class="col-sm-3">
                           </div>
                           <label for="colFormLabelSm"  class="col-sm-2 col-form-label col-form-label-sm">Shift Time</label>
                           <div class="col-sm-2">
                              <div class="input-group mb-3 clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                 <div class="input-group mb-3" id="timein2" >
                                    <input type="text" class="form-control"  name="timeduration" ng-model="timeduration" id="timeIn" readonly >
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="input-group clockpicker clk form-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                 <div class="input-group mb-3" id="timeout2">
                                    <input type="text" class="form-control "  name="timeduration" ng-model="timeduration" id="timeOut" readonly >
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                           </div>
                        </div>
                       
                        <!-- ##############################Grace Time ###################### -->

                        <button style="margin-left:42%; font-weight:600; margin-top: -2rem; color:#6892FF;" type="button" class="btn btn" data-toggle="collapse" data-target="#demo1">Add Grace Time?</button>
                       <div id="demo1" class="collapse"> 
                        <div class="form-group row" style="margin-top: 1rem;" id="gracerow">
                           <div class="col-sm-3">
                           </div>
                           <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Grace Time </label>
                           <div class="col-sm-2">
                              <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                 <div class="input-group mb-3" id="gti1">
                                    <input type="text" class="form-control"  name="breakin" ng-model="breakin" id="gracetime"  readonly>
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                 <div class="input-group mb-3" id="gto1">
                                    <input type="text" class="form-control "   name="timeduration" ng-model="timeduration" id="gracetimeout" readonly>
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                           </div>
                        </div>
                        <!-- ##############################TOTAL GRACE###################### -->
                        <div class="form-group row" style="margin-top: -2rem;" id="totalgracerow">
                           <div class="col-sm-3">
                           </div>
                           <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm" >Total Grace  </label>
                           <div class="col-sm-2">
                              <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                 <div class="input-group mb-3" id="tgti1">
                                    <input type="text" class="form-control "  name="breakin" ng-model="breakin" id="tgracetimein" readonly>
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="input-group clockpicker form-group" data-placement="bottom" data-align="top" data-autoclose="true" >
                                 <div class="input-group mb-3" id="tgto1">
                                    <input type="text" class="form-control "  name="timeduration" ng-model="timeduration" id="tgracetimeout" readonly>
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                           </div>
                          
                        </div>
                        </div>
                        <center>
                           <div class="form-group row" id="flexihours" style="display: none;">
                              <div class="col-md-1" ></div>
                              <div class="col-md-1"></div>
                              <div class="col-md-1"></div>
                              <div class="col-md-1" ></div>
                              <div class="col-md-1"></div>
                              <div class="col-md-1" ></div>
                              <div class="col-md-1" ></div> 
                              <div class="col-md-8" style="margin-left:19%;">
                                 <div class="form-group label-floating">
                                    <div id="flexihours" style="float: left;margin-left:-3%;padding: 10px;color: #bebebe;"><b>Minimum Working Hours</b></div>
                                    <div class="demo" id='fh'></div>
                                 </div>
                              </div>
                              <div class="col-md-1"></div>
                              <div class="col-md-1" ></div>
                           </div>
                           
                        </center>

                        
      </form>
      </div>    
      <div class="container-fluid" style="padding: 0px; margin-top: 4.6rem;">
         <div class="form-group" style="text-align:center; "><b style="font-size: 20px;">Shift Calendar</b></div>
                        <br>
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
      <td id="day" class="tabled">Sun</td>
      <td >
      <select class="form-control form-control-sm selectedsun1" style="background-color: #ffdede; color:black; border: 1px solid #ff4949;" id="sun1"   >
      <option  value="1">Weekoff</option>
      <option value="0">WeekOn</option>
      </select>
      </td>
      <td >
      <select class="form-control form-control-sm selectedsun2" style="background-color: #ffdede; color:black; border: 1px solid #ff4949;" id="sun2">
      <option value="1" >Weekoff</option>
      <option value="0" >WeekOn</option>
      </select>
      </td>
      <td >
      <select class="form-control form-control-sm selectedsun3" style="background-color: #ffdede; color:black; border: 1px solid #ff4949;" id="sun3">
      <option value="1" >Weekoff</option>
      <option value="0" >WeekOn</option>
      </select>
      </td>
      <td >
      <select class="form-control form-control-sm selectedsun4" style="background-color: #ffdede; color:black; border: 1px solid #ff4949;" id="sun4">
      <option value="1" >Weekoff</option>
      <option value="0" >WeekOn</option>
      </select>
      </td>
      <td >
      <select class="form-control form-control-sm selectedsun5" style="background-color: #ffdede; color:black; border: 1px solid #ff4949;" id="sun5" >
      <option value="1" >Weekoff</option>
      <option value="0" >WeekOn</option>
      </select>
      </td>
      </tr>
      <tr><td id="day">Mon</td>
      <td>
      <select class="form-control form-control-sm selectedmon1" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;" id="mon1">
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedmon2" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;" id="mon2">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedmon3" id="mon3" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedmon4" id="mon4" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedmon5" id="mon5" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Tues</td>
      <td>
      <select class="form-control form-control-sm selectedtues1" id="tues1"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;" >
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues2" id="tues2" style="background-color: #e7ffe1; color:black;  border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues3" id="tues3" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues4" id="tues4"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedtues5" id="tues5" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Wed</td>
      <td>
      <select class="form-control form-control-sm selectedwed1" id="wed1" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed2" id="wed2" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1"  >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed3" id="wed3" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed4" id="wed4" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedwed5" id="wed5" style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0" >WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      </tr>
      <tr>
      <td  id="day">Thrus</td>
      <td>
      <select class="form-control form-control-sm selectedthrus1" id="thrus1"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus2" id="thrus2"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus3" id="thrus3"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus4" id="thrus4"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedthrus5" id="thrus5"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Fri</td>
      <td>
      <select class="form-control form-control-sm selectedfri1" id="fri1"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri2" id="fri2"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1">Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri3" id="fri3"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri4" id="fri4"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedfri5" id="fri5"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      </tr>
      <tr>
      <td id="day">Sat</td>
      <td>
      <select class="form-control form-control-sm selectedsat1" id="sat1"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat2" id="sat2"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat3" id="sat3"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat4" id="sat4"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      <td>
      <select class="form-control form-control-sm selectedsat5" id="sat5"style="background-color: #e7ffe1; color:black; border: 1px solid #507d45;">
      <option value="0">WeekOn</option>
      <option value="1" >Weekoff</option>
      </select>
      </td>
      </tr>
      </tbody>
      </table>
      </div>  
      <br>
       <div class="row">
         <div class="col-lg-3">
         </div>
           <div class="col-lg-9" style="text-align:end;">
      
      <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color: #808080">Cancel</button>
      &nbsp;&nbsp;
      <button type="submit"  class="btn btn-success bttn" id="test" data-dismiss="modal" style="color: white;">Submit</button>
      </div>
      </div>
     
      <br>
      </div>
      </div>
      <div id="response"></div>
      </div>
      </div>
      </form>
      </div>

      <!--#############################################################-->
      <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--   <form role="form1" > -->
                <div class="modal-body">
                    <form>
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-center">Status</label>
                            <div class="col-sm-9">
                                <select id="statusfilter" name="statusfilter" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            <button type="button" data-dismiss="modal" id="getAtt" class="btn btn-success bttn fit"
                                style="">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

      <!--#############################################################-->
   </body>
   <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/angular.min.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/angular-datatables.min.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
   <script src="<?= URL ?>../assets/js/navbar.js"></script>
   <!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!--<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>-->
   <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
   
   <script src="<?= URL ?>../assets/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   

   <script type="text/javascript" src="<?= URL ?>../assets/js/repeatheadeerprint.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
   <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
   <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/jquery.timesetter.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
   <script src="<?php echo URL;?>../assets/clockpicker/bootstrap-clockpicker.min.js"></script>
   <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
   <script src="<?= URL ?>../assets/js/demo.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>
   <!-- #########################################################Time In ###################################################### -->
   <script>
      $('#timeIn').on('change', function() {
      
      $('#gracetime').val(this.value);
      });
        $('#timeOut').on('change', function() {
      
      $('#gracetimeout').val(this.value);
      });
   </script>
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
   <!-- ######################################################TimeOut Grace###################################################### -->
   <script type="text/javascript">
      $('#gracetimeout').clockpicker({
          autoclose: true,
          afterDone: function() {
         
          }
      });
      
      
      var shifttimein='';
      var totalgracetimeout='';
      
      
      $("#gracetimeout").on('change', function(){
        var timeIn = $("#timeOut").val();
        var grace = $("#gracetimeout").val();
      
        let valuestart = moment.duration(timeIn, "HH:mm");
        let valuestop = moment.duration(grace, "HH:mm");
        let difference = valuestop.subtract(valuestart);
        var diff=(('0' + difference.hours()).slice(-2) + ":" + ('0' + difference.minutes()).slice(-2));
       
        $('#tgracetimeout').val(diff);
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
   
   
   <script>
      $(document).ready(function() {
		
      var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
      var datestring="&date=";
      var date = new Date();
      date.setMinutes(0);
      date.setSeconds(0);
      date.setMilliseconds(0);
      var isoDateString = date.toISOString().substring(0,10);
	  
	  
	  //////////////////datatable start///////////////
	  
      var table = $('#example').DataTable({
         columnDefs: [
    { orderable: false, targets: 11 }
  ],
      buttons: [
         {
                text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;    ">Filter</span>',
                className: "btn btn-light ",
                action: () => {
                    $('#filtermodal').modal('show');
               
                } 
            
         },


      {
      extend:'colvis',
      action: function myexcel() {

         $('#column_modal').modal('show');
                }
      },
      {
      extend:'collection',
      text:'<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
      buttons: [{
                        extend: 'csv',

                        text: 'csv',
                        extension: '.csv',
                        exportOptions:

                        {

                            columns: [0,1,2,3,4,5, 6, 7, 8, 9,10],
                        },
                        title: 'Shift'
                    },

                        // {
                        //     extend: 'excelHtml5',
                        //     exportOptions: {
                        //         columns: [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        //     }
                        // },
                        {
                            extend: 'pdf',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                
                            exportOptions: {
                                columns: [0,1,2,3,4,5, 6, 7, 8, 9,10],
                               
                            },
                            alignment: 'center',
                        }, {
                            extend: 'print',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                            // autoPrint: false,
                            title: '',
                            
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0,1,2,3,4,5, 6, 7, 8, 9,10],
                                
                                stripHtml: false,
                            },
      repeatingHead:{
      
      logo: '<?=URL?>../assets/image/logo.png',
      logoPosition: 'center',
      logoStyle: 'height:100px;width:130px;',
      title: 'Shifts of '+org+' Dated '+isoDateString+'',
      
      },
      // text: '<i class="fa fa-print"></i> Print',
      text: 'Print',
      
      customize: function (win) {
      $(win.document.body)
      .css('font-size', '10px')
      
      
      $(win.document.body).find('table')
      .addClass('compact')
      .css('font-size', 'inherit');
      }
      }]
      }],
      //"dom": 'Bfrtip',    
      // "scrollX": true,  
      "bDestroy":true,
      "scrollX": true, 
      "serverSide":true,
      "serverMethod":"post",                          
      "dom": '<"pull-left"l>B<"pull-left"f>rtip',   
      
         
         
                 language: {
                     search: "",
                     searchPlaceholder: "Search",
                     sLengthMenu: "Row   _MENU_"
                 },
       "contentType": "application/json",
              "ajax": "<?=  URL;?>Managesettings/getAllShift",
              "columns": [
             { "data": "name" },
          { "data": "timein" },
          { "data": "timeout" },
          { "data": "shifttype" },
          { "data": "shifthpurs" },
           { "data": "status" },
          
          { "data": "timeinbreak" },
          { "data": "timeoutbreak" },
          { "data": "timeingrace" },
          { "data": "timeoutgrace" },
          
          { "data": "workhours" },
         
          { "data": "action" }
      ]
      });
       var total=table.columns().visible().length-1;
              //alert(total);
              setTimeout(function() {
             
              var checkbox = 0;
              //var total=9;
              for(var i=0; i< total; i++) {
             
              if( table.column(i).visible()) {
              checkbox++;
              $("#chk"+i).iCheck("check");
              }          
              }
              if(checkbox ==total ){
             
              for(var i=0; i< total; i++) {        
              if(i<6){      
              table.column(i).visible(true);
              $("#chk"+i).iCheck("check");
              }else{
              table.column(i).visible(false);
              $("#chk"+i).iCheck("uncheck");
              }        
              }        
              }          
              },500);
             
             
              $('input[type="checkbox"]').on('ifChecked', function(){
              var checkbox = $("input[type='checkbox']:checked ").length;
              for(var i=0; i< checkbox; i++) {
              var ischecked = $("#chk"+i).is(":checked");
              if(checkbox >6){
             
              if(ischecked == true) {
              $("#chk"+i).iCheck(":checked");
              }
              else{
              $("#chk"+i).iCheck(":unchecked");
              }    
              }
              }  
              });    
             
              $("#button1").click(function(){
              var checkbox = $(".modal_checkbox");
              //alert(checkbox.length);
              for(var i=0; i< checkbox.length; i++) {
              var column = table.column(i);
              var ischecked = $("#chk"+i).is(":checked");
       // alert(ischecked);
              if(ischecked == true)
              {
              column.visible(true);}
              else{
             
              column.visible(false);}
             
              }
            
              });
      } );
   </script>
   <script type="text/javascript">    
      $(document).ready(function() {
      $(document).on("click", ".checkbox", function ()
      {
      
      if($('.checkbox:checked').length == $('.checkbox').length)
      {
      $('#select_all').prop('checked',true);
      }
      else
      {
      $('#select_all').prop('checked',false);
      }
      //var flag = boxes.filter(':checked').length > 0;
      if($('.checkbox:checked').length >0){
      $('#next-container').show();
      }
      
      else{
      $('#next-container').hide();
      }
      });
      
      });
   </script>
   <!-- #######################Condition  Time End###################### -->
   <script>
      $(document).ready(function()  
         {
             $('#select_all').click();
             $('#select_all').on('click',function()
             {
               if(this.checked)
               {
                 $('.checkbox').each(function()
                 {
                   this.checked = true;
                   $('#next-container').show();
                 });
                }
               else{
                 $('.checkbox').each(function()
                 {
                   this.checked = false;
                   $('#next-container').hide();
                 });
                   }
       
         
                 $('input[name="select_all"]').attr('click',function(){
                       
                         if(this.checked){
      
                          $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
                       
                           
             
                             } else {
                               $('#example tbody input[type="checkbox"]:checked').trigger('click');
                           }
      
         
                         //   e.stopPropagation();
                              });
                    });
           
                      $('#select_all').click();
      
           
                   });
      
   </script>
   <script>
      function changeLanguage(language) {
          var element = document.getElementById("url");
          element.value = language;
          element.innerHTML = language;
      }
      
      function showDropdown() {
          document.getElementById("myDropdown").classList.toggle("show");
      }
      
      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        //  alert();
          if (!event.target.matches('.dropbtn')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                      openDropdown.classList.remove('show');
                  }
              }
          }
      }
   </script>
   <script type="text/javascript">
      $('.clk').clockpicker();
   </script>
   <!-- Inserting data to database -->
   <script>
      /* $(document).ready(function() {
      $('#test').on('click', function() {
        var shifttype = $('#shifttype').val();
        var shiftname = $('#shiftname').val();
        var timein = $('#timein').val();
        var timeOut = $('#timeOut').val();
        var gracetime= $('#gracetime').val();
        var gracetimeout = $('#gracetimeout').val();
      
       
        $.ajax({
            url: "<?php echo URL;?>Managesettings/insertdata",
            //$.ajax({url: "<?php echo URL;?>Managesettings/insertdata",
            data: {
              "shifttype": shifttype,
              "shiftname": shiftname,
              "timein": timein,
              "timeOut": timeOut,
              "gracetime": gracetime,
              "gracetimeout": gracetimeout
      
            },
           
            success: function(result){
              if(result == 1){
                    doNotify('top','center',2,'Shift added successfully');
                    $('#addShift').modal('hide');
                    document.getElementById('main1').reset();
                     setTimeout(function(){
                      window.location.replace("<?php echo URL;?>Managesettings/");
                     }, 6000);
             
            }
          },
          error: function(result){
                  doNotify('top','center',4,'Unable to connect API');
                 }
        });
       
        });
      
       
      }); */     
   </script> 
   <script>
      $('#test').click(function(){
      //alert('hello');
         
           /* var shifttype=$("#shifttypeE").val();  */
                  
          if($('#shiftname').val().trim() == ''){
           $('#shiftname').focus();
           doNotify('top','center',4,'Please enter the shift name');
         return false;
         }
          var shifttype = $('#shifttype').val();
           var sna=$('#shiftname').val().trim();
           var sts = $("#status").val();
          
           if(shifttype!=3){
             
           
          /* alert(shifttype); */
        
          var ti=$('#timeIn').val();
      
          var tig=$('#gracetime').val();
          var gto=$('#gracetimeout').val();
          // var tgracetime=$('#tgracetime').val();
          // alert(tgracetime);
           if(ti == "12:00 AM")
           {
           ti ="12:01 AM";  
           }
           
          
           
           else if(ti == "")
           {
             doNotify('top','center',4,'Please enter the time in');
             return false;
           }
           
          var to=$('#timeOut').val();
            if(to == "12:00 AM")
           {
           to = "11:59 PM";  
           }
           if(to== "")
           {
             doNotify('top','center',4,'Please enter the time out');
             return false;
           }
            var sts = $("#status").val();
                 
       
       
          var fromdt="2013/05/29 "+ti;
          // alert(fromdt);
         var todt="2013/05/29 "+to;
         //var tibdt="2013/05/29 "+tib;
        
         
         //var tobdt="2013/05/29 "+tob;
         var tot="2013/05/29 24:00:00";
         
         var frm = new Date(Date.parse(fromdt));
         // alert(frm);
         var frmout = new Date(Date.parse(todt));
         var timilli=Date.parse(fromdt);
         var tomilli=Date.parse(todt);
         var frm1 = frm.setHours(frm.getHours()+ 3); //for adding 3 hour 
         var frm2 = frmout.setHours(frmout.getHours()- 3);  
       
         var to1 = new Date(Date.parse(todt));
         var ti1 = new Date(Date.parse(fromdt));
        
         
         
         var tot1 = new Date(Date.parse(todt));
         var diff = (tomilli- timilli) / 60000; //dividing by seconds and milliseconds
         var minutes = (diff % 60).toString();
         var hours = (((diff - minutes) / 60).toString()).replace('-','');
         var shiftHours='';
         if(minutes=='0'){
         minutes='00'
       }
           
          var sht='';
         
          if(shifttype==1)
          {
            sht='Same Date';
            
             if(ti == to){
               doNotify('top','center',4,'Time in and time out cannot be same');   
             return false;
            }
          
             
              if (timilli > tomilli)
      
            {
      
             doNotify('top','center',4,'Time in cannot be greater than time out');
             // alert(" ");   
             return false;
            }
            
          }
          if(shifttype==2)
          {
           
           sht='Multi Date';
           
           if(ti == to)
           {
             doNotify('top','center',4,'Shift cannot be greater than 20 hour');
               // alert("Shift cannot be greater than 20 hours");   
             return false;
            }
         
             if(!(TimeComparison()==undefined))
           {
             return false;
           }
           
             hours = 24-hours;
      
           
          }
          
          }
          
          
          
           var flexi_hours = $(".hours").val()+":"+$(".minutes").val();
      
         if(document.getElementById('fs').checked) { 
                  var flexi_hours = $(".hours").val()+":"+$(".minutes").val();
                  //alert(flexi_hours);
                 if(flexi_hours > '18:00')
                 {
                    doNotify('top','center',4,'Shift Hours cannot be greater than 18 hrs');  
                   // return false;
                 }
                 else if(flexi_hours == '00:00')
                 {
                    doNotify('top','center',4,"Shift hours cannot be equal to 0 hrs ");  
                    //return false;
                 }
      
                 //return false;
                  }
          shiftHours = hours+":"+minutes;
           
         if(!confirm("You are going to register a new shift "+sna+" , which will start/end within "+sht+" \n Do you want to create this shift?"))
          return false;
       
         ///////////////Start weekoff functionality /////////////////
         
         var weekOne=$("#sun1").val();
         var weekTwo=$("#sun2").val();
         var weekThree=$("#sun3").val();
         var weekFour=$("#sun4").val();
         var weekFive=$("#sun5").val();
         
         
         
         var sunday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
           var weekOne=$("#mon1").val();
         var weekTwo=$("#mon2").val();
         var weekThree=$("#mon3").val();
         var weekFour=$("#mon4").val();
         var weekFive=$("#mon5").val();
         var monday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
           var weekOne=$("#tues1").val();
         var weekTwo=$("#tues2").val();
         var weekThree=$("#tues3").val();
         var weekFour=$("#tues4").val();
         var weekFive=$("#tues5").val();
         var tuesday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
        var weekOne=$("#wed1").val();
         var weekTwo=$("#wed2").val();
         var weekThree=$("#wed3").val();
         var weekFour=$("#wed4").val();
         var weekFive=$("#wed5").val();
         var wednesday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
          var weekOne=$("#thrus1").val();
         var weekTwo=$("#thrus2").val();
         var weekThree=$("#thrus3").val();
         var weekFour=$("#thrus4").val();
         var weekFive=$("#thrus5").val();
         var thusday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
          var weekOne=$("#fri1").val();
         var weekTwo=$("#fri2").val();
         var weekThree=$("#fri3").val();
         var weekFour=$("#fri4").val();
         var weekFive=$("#fri5").val();
         var friday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
         var weekOne=$("#sat1").val();
         var weekTwo=$("#sat2").val();
         var weekThree=$("#sat3").val();
         var weekFour=$("#sat4").val();
         var weekFive=$("#sat5").val();
         var saturday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
       //  alert(shifttype);
         ///////////////End  weekoff functionality /////////////////
          $.ajax({url: "<?php echo URL;?>Managesettings/insertdata",
           //data: {"sna":sna,"ti":ti,"to":to,"sts":sts,"timeInfs":flexi_hours,"shifttype":shifttype,"sun":sunday,"mon":monday,"tue":tuesday,"wed":wednesday,"thus":thusday,"fri":friday,"sat":saturday},
           //
           //data: {"sna":sna,"ti":ti,"to":to,"tib":tib,"tob":tob,"tig":tig,"bog":bog,"big":big,"sts":sts,"shifttype":shifttype,"sun":sunday,"mon":monday,"tue":tuesday,"wed":wednesday,"thus":thusday,"fri":friday,"sat":saturday,"gto":gto},
         
           data: {"sna":sna,"ti":ti,"to":to,"sts":sts,"tig":tig,"gto":gto,"timeInfs":flexi_hours,"shifttype":shifttype,"sun":sunday,"mon":monday,"tue":tuesday,"wed":wednesday,"thus":thusday,"fri":friday,"sat":saturday},
           success: function(result){
              //alert(result);
             
             if(result == 1){
               doNotify('top','center',2,'Shift added successfully');
              location.reload();
               //$('#example').DataTable().ajax.reload();
             }else if(result== 2){
               doNotify('top','center',3,'Shift '+sna+'  already exist');  
                  $('#addShift').modal('show');                
             }
            
             else if(result== 66)
             {
               doNotify('top','center',3,'Shift hours should be lesser than 20 hours');  
                  $('#addShift').modal('show');                  
             }
             else if(result== 22)
             {
               doNotify('top','center',3,'Time in should be lesser than time out ');
                        $('#addShift').modal('show');                  
             }
             else if(result== 33 || result== 44 || result== 55 )
             {
               doNotify('top','center',3,'Invalid break time');  
             }
            
             else{
               doNotify('top','center',4,'There may error(s) in creating shift, try later');
               //document.getElementById('shifrFrom').reset();
               $('#addShift').modal('show');
             }
            },
           error: function(result){
             doNotify('top','center',4,'Unable to connect API');
             $('#addShift').modal('show');  
            }
          });
      });
      
   </script>
   <!-- #################################DELETE QUERY#################################-->   
   <script type="text/javascript">
     $(document).on("click", "#delete", function () 
            {
                var id=$('#del_sid').val();
               // alert(id);
                $.ajax({url: "<?php echo URL;?>Managesettings/shiftdelete",
                        data: {"sid":id},
                        success: function(result){
                            result=JSON.parse(result);
                            if(result.afft){
                               
                                doNotify('top','center',2,'Shift deleted successfully');
                                setTimeout("location.reload(true);",2000);
                                 $('#delShift').modal('hide');
                                location.reload();
                                 table.ajax.reload(null, false);
                            }
                            else if(result.emp){
                                
                                doNotify('top','center',4,'This Shift cannot be deleted, it is currently assigned to '+result.emp+' employee(s)');
                                
                                $('#delShift').modal('hide');

                            }
                            else if(result.aarc){
                                
                                doNotify('top','center',4,'This Shift cannot be deleted, some employee punched attendance from this Shift');
                                setTimeout("location.reload(true);",2000);
                                $('#delShift').modal('hide');
                            }
                            // else if(result == 6){
                            //  $('#delShift').modal('hide');
                            //  doNotify('top','center',4,'Trial Shift cannot be deleted');
                            // }
                            else
                            {
                               
                                doNotify('top','center',4,'Shift cannot be deleted, some employee punched attendance from this Shift  ');
                                setTimeout("location.reload(true);",2000);
                                 $('#delShift').modal('hide');
                            }
                        
                         },
                        error: function(result){
                            doNotify('top','center',4,'Unable to connect API');
                         }
                   });
            });
             $(document).on("click", ".deleteShift", function () {
            $('#del_sid').val($(this).data('sid'));
            //alert($(this).data('sid'));
            $('#sna').text($(this).data('sname'));
          });
          
        
            $(document).on("click", ".editShift", function () {
            $('#shiftNameLableE').text('');;
            $('#shiftNameE').attr('placeholder',"");
           $('#sid').val($(this).data('sid'));
           $('#shiftIds').val($(this).data('sid'));
            $('#shiftNameE').val($(this).data('name'));
            $('#timeInE').val($(this).data('ti'));
            $('#timeOutE').val($(this).data('to'));
           $('#timeInBreakE').val($(this).data('tib'));
            $('#timeOutBreakE').val($(this).data('tob'));
            $('#gracetimeE').val($(this).data('tig'));
            $('#gracetimeoutE').val($(this).data('tog'));
           $('#breakInGraceE').val($(this).data('big'));
            $('#breakOutGraceE').val($(this).data('bog'));
            $('#statusE').val($(this).data('sts')); 
          });
       
        
   </script>
   <script>
      $(document).on('click','.test',function(){
         var sid=$(this).data('sid');
        // alert(sid+'shakir');
         
                $.ajax({
      
          
          type:"post",
          datatype:"html",
          url: "<?php echo URL;?>Managesettings/viewshift",
                    data: {"sid":sid},
             success: function(result)
      
             {
      
            $("#viewshift .modal-body").empty();        
            $("#viewshift .modal-body").html(result);        
            $("#viewshift").modal('show');
            
            }
      
        });
      });
   </script>
   <script>
      $('#updtshift').click(function(){
          var fHour= $('#txtHours').val();
          var fmint=$('#txtMinutes').val();
       var flexi_hoursE=fHour+':'+fmint+':'+'00';
      
       
        if($("#shifttypeE").val()==3) { 
       
                       var flexi_hoursE = $(".hours").val()+":"+$(".minutes").val();
                       //alert(flexi_hours);
                     if(flexi_hoursE > '18:00')
                     {
                        doNotify('top','center',4,'Shift Hours cannot be greater than 18 hrs');  
                        return false;
                     }
                     else if(flexi_hoursE == '00:00')
                     {
                        doNotify('top','center',4,'Shift hours cannot be equal to 0 hrs');  
                        return false;
                     }
                       }
       
      
          
                
                       
            if($(shiftname).val()==''){
              $('#shiftname').focus();
              doNotify('top','center',4,'Please enter the shift name');
              return false;
            }
             var sid=$('#shiftIds').val();
                       
             var sna=$('#shiftname').val();
             var ti=$('#timeInE').val();
             var to=$('#timeOutE').val();
             var tigr=$('#gracetimeE').val();
             var togr=$('#gracetimeoutE').val();
             var tig=$('#tgracetimeinE').val();
             var tog=$('#tgracetimeoutE').val();
             var sts=$('#statusE').val();
             //var sts=1;
              var shifttype='';
             shifttype=$("#shifttypeE").val();
            // alert(ti);
             // alert(to);
             // alert(tigr);
             // alert(togr);
             // alert(tig);
             // alert(tog);
             // die;
             
            var fromdt="2013/05/29 "+ti;
            var todt="2013/05/29 "+to;
            var tot="2013/05/29 24:00:00";
            var frm = new Date(Date.parse(fromdt));
            var to1 = new Date(Date.parse(todt));
            var tot1 = new Date(Date.parse(todt));
            
            var diff = (frm - to1) / 60000; //dividing by seconds and milliseconds
            var minutes = (diff % 60).toString();
            var hours = (((diff - minutes) / 60).toString()).replace('-','');
            var shiftHours='';
             var sht='';
            if(minutes=='60')
              {
                hours=(parseInt(hours)+1).toString();
                minutes='00';
              }
              
                       
                      else if(shifttype==1){
               sht='Same Day';
               
                if(ti == to){
                  doNotify('top','center',4,'Time in and time out can not be same');   
                return false;
               }
               
               if (frm > to1){
              doNotify('top','center',4,'Time in cannot be greater than Time out');   
                return false;
               }
                      }
              else if(shifttype==2){
              sht='Two Days';
              
              if(ti == to)
              {
                  doNotify('top','center',4,'Time in and time out cannot be same');   
                return false;
                }
              if (frm < to1){
              doNotify('top','center',4,'Time out cannot be greater than time in');   
                return false;
               }
                      } 
      
                      
              var weekOne=$("#sunE1").val();
              var weekTwo=$("#sunE2").val();
              var weekThree=$("#sunE3").val();
              var weekFour=$("#sunE4").val();
              var weekFive=$("#sunE5").val();
              var sunday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
              
              var weekOne=$("#monE1").val();
              var weekTwo=$("#monE2").val();
              var weekThree=$("#monE3").val();
              var weekFour=$("#monE4").val();
              var weekFive=$("#monE5").val();
              var monday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
              
              var weekOne=$("#tuesE1").val();
              var weekTwo=$("#tuesE2").val();
              var weekThree=$("#tuesE3").val();
              var weekFour=$("#tuesE4").val();
              var weekFive=$("#tuesE5").val();
              var tuesday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
              
              var weekOne=$("#wedE1").val();
              var weekTwo=$("#wedE2").val();
              var weekThree=$("#wedE3").val();
              var weekFour=$("#wedE4").val();
              var weekFive=$("#wedE5").val();
              
              var wednesday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
              
               var weekOne=$("#thrusE1").val();
              var weekTwo=$("#thrusE2").val();
              var weekThree=$("#thrusE3").val();
              var weekFour=$("#thrusE4").val();
              var weekFive=$("#thrusE5").val();
              
              var thusday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
              
               var weekOne=$("#friE1").val();
              var weekTwo=$("#friE2").val();
              var weekThree=$("#friE3").val();
              var weekFour=$("#friE4").val();
              var weekFive=$("#friE5").val();
              
              var friday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
              var weekOne=$("#satE1").val();
              var weekTwo=$("#satE2").val();
              var weekThree=$("#satE3").val();
              var weekFour=$("#satE4").val();
              var weekFive=$("#satE5").val();
              
              var saturday=weekOne+','+weekTwo+','+weekThree+','+weekFour+','+weekFive;
        //alert(sunday);
              
              
             $.ajax({url: "<?php echo URL;?>Managesettings/editShift",  
             
              data: {"sid":sid,"sna":sna,"ti":ti,"to":to,"tig":tig,"tog":tog,"tigr":tigr,"togr":togr,"sts":sts,"shifttype":shifttype,"sun":sunday,"mon":monday,"tue":tuesday,"wed":wednesday,"thus":thusday,"fri":friday,"sat":saturday,"timeInfs":flexi_hoursE},
              
              success: function(result){
      
                          
                if(result==1)
                {
                  doNotify('top','center',2,'Shift updated successfully');
                   setTimeout(function(){
                    window.location.replace("<?php echo URL;?>shift");
                   }, 2000);
                }else if(result==2){
                  doNotify('top','center',4,"Shift "+sna+" already exist ");
                }
                else if(result==66){
                  doNotify('top','center',4,"Shift hours should be lesser than 20 hours");
                }
      
                else if(result==67){
                  doNotify('top','center',4,"Time in Break should be greater than time in");
                }
                else if(result==50){
                  doNotify('top','center',3,'Grace time in should be greater than time in');
                }
                else if(result==60){
                  doNotify('top','center',3,'Grace time out should be lesser than time out');
                }
                // else if(result==44 || result==55){
                //  doNotify('top','center',3,'Invalid break time')
                // }
                
                else if(result== 22)
                {
                  doNotify('top','center',3,'Time in should be lesser than time out '); 
                }
                else if(result== 33 || result== 44 || result== 55 )
                {
                  doNotify('top','center',3,'Invalid break time');  
                }
                // else if(result == 51){
                //  doNotify('top','center',3,'Grace time out cannot be less than time In for Single Date shift.');
              //    return false;
                // }
                else if(result == 52){
                  doNotify('top','center',3,'Grace time in cannot be greater than time out ');
                  return false;
                }
                else if(result==3)
                {
                  doNotify('top','center',4,"Shift "+sna+" already assign by employee");
                }
                             
                                
                else
                {
                  doNotify('top','center',4,"No changes found");
                  document.getElementById('shifrFrom').reset();
                  $('#addShiftE').modal('show');
                }
               },
              error: function(result){
                doNotify('top','center',4,'Unable to connect API');
               }
             });
        }); 
                 
   </script>
   <script>
      $(".demo").timesetter({
      
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
      
      
      $("#fhE").timesetter({
      
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
          function myFunction() {
           var sd=$('#shifttype').val();
        
           if(sd==2){
               
         document.getElementById("flexihours").style.display = "none";
         $('#timerow').show("slow");
         $('#timerow1').show("slow");
         $('#breakrow').show("slow");
         $('#gracerow').show("slow");
         $('#totalgracerow').show("slow");
               
           }else if(sd==3){
               //alert('flexi');
         document.getElementById("flexihours").style.display = "block";
         $('#timerow').hide("slow");
         $('#timerow1').hide("slow");
         
         $('#gracerow').hide("slow");
         $('#totalgracerow').hide("slow");
               
           }else{
         document.getElementById("flexihours").style.display = "none";
         $('#timerow').show("slow");
         $('#timerow1').show("slow");
         $('#breakrow').show("slow");
         $('#gracerow').show("slow");
         $('#totalgracerow').show("slow");
           }
               
           }
         
   </script>
   <script>
      function TimeComparison()
      {
        var ti=$('#timeIn').val();
        
              if(ti == "12:00 AM")
              {
              ti ="12:01 AM";  
              }
        var fromdt="2013/05/29 "+ti;  
        var frm = new Date(Date.parse(fromdt));       
        var slicetimein=ti.slice(-2);
        
        var to=$('#timeOut').val();
               if(to == "12:00 AM")
              {
              to = "11:59 PM";  
              }
        var todt="2013/05/29 "+to;
        // alert(todt);
        var to1 = new Date(Date.parse(todt));
        // alert(to1);
        var slicetimeout=to.slice(-2);
        
      
            
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
   <!--##########################Shift assign saving ###################################### -->
   <script>
      var app = angular.module('adminapp', []);
      
      app.controller('attroasterCtrl', function($scope, $http, $timeout) {
        //alert("aaaa");
          $scope.hastrue=false;
          $scope.GetEmpList = function($shifttid)
            {
              //alert();
              $scope.emparray=[];
              $scope.shifttid=$shifttid;
              $scope.hastrue=true;
              var xsrf = $.param({shifttid: $scope.shifttid});
              $http({
                  url: '<?= URL;?>Managesettings/getemployebyshift',
                  method: "POST",
                  data: xsrf,
                  headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
              }).success(function (data, status, headers, config){
                  
                      
                      $scope.emparray=data.data;
                      console.log(data.data);
                      setTimeout(function(){
                          $timeout(function(){    $scope.getrow();}, 500); 
                      }, 1000);
                  
                  $scope.hastrue=false;
              }).error(function (data, status, headers, config) {
                  errorMessage("error: "+$scope.status);//$scope.status = status + ' ' + headers;
                  $scope.hastrue=false;
              });
          }
      ////////////List group item function ///////////////
      $scope.getrow= function ($index) {
      //alert($index);
       $('.list-group.checked-list-box .list-group-item').each(function () {
          
          // Settings
          var $widget = $(this),
              $checkbox = $('<input type="checkbox" class="hidden" value="'+$index+'" id="'+$index+ 'checked"/>'),
              color = ($widget.data('color') ? $widget.data('color') : "primary"),
              style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
              settings = {
                  on: {
					  icon: 'fa fa-check-square'
                     
                  },
                  off: {
                       icon: 'fa fa-square'
                  }
              };
              
          $widget.css('cursor', 'pointer')
          $widget.append($checkbox);
      
          // Event Handlers
          $widget.on('click', function () {
              $checkbox.prop('checked', !$checkbox.is(':checked'));
              $checkbox.triggerHandler('change');
              updateDisplay();
          });
          $checkbox.on('change', function () {
              updateDisplay();
          });
          // Actions
          function updateDisplay() {
              var isChecked = $checkbox.is(':checked');
      //console.log(isChecked);
              // Set the button's state
              $widget.data('state', (isChecked) ? "on" : "off");
                  
              // Set the button's icon
              $widget.find('.state-icon')
                  .removeClass()
                  .addClass('state-icon ' + settings[$widget.data('state')].icon);
      
              // Update the button's color
              if (isChecked) {
                  $widget.addClass(style + color + ' active');
              } else {
                  $widget.removeClass(style + color + ' active');
              }
          }
          // Initialization
          function init() {
              
              if ($widget.data('checked') == true) {
                  $checkbox.prop('checked', !$checkbox.is(':checked'));
              }
              
              updateDisplay();
      
              // Inject the icon if applicable
              if ($widget.find('.state-icon').length == 0) {
                  $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
              }
          }
          init();
      });
      };
      
      
      $scope.getchecklistid=function($index){
      //alert($index);
      //var st = $scope.emparray[$index]['sts'];
      if($scope.emparray[$index]['sts'] == 0)
      {
          $scope.emparray[$index]['sts'] = 1;
      }
      else{
          $scope.emparray[$index]['sts'] = 0;
      }
      
      }
      
      
      $scope.SaveEmpList=function($id){
         // alert($id);
          var total= $("#check-list-box li").length;
         // alert(total);
          var selectcheck= $(".list-group-item.list-group-item-success.active").length;
          
          if(selectcheck!=0){
              var json=angular.toJson($scope.emparray);           
              //console.log(json);
             //alert("json"+json);
              //alert("shift"+$scope.shiftid);
              var xsrf = $.param({ shifttid:$scope.shifttid,emplist:json});
              $http({
                  url: '<?= URL;?>Managesettings/SaveEmpshiftList',
                  method: "POST",
                  data: xsrf,
                  headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
              }).success(function(data, status, headers, config){
                  $scope.hastrue = false;
                  
                  // location.reload();
                  
          doNotify('top','center',2,' Shift assigned successfully');
          setTimeout("location.reload(true);",2000);
          $('#updateDept').modal('hide');
                  
              }).error(function(data, status, headers, config){
                  $scope.hastrue=false;
              });
          } else {
              
              doNotify('top','center',4,'Please select at least one employee');
              return false;
        }
      }
      
          
      });
   </script>
   <!--##########################shift assigning script end###################################### -->
   <!--##########################Loader of main page###################################### -->
   <script>
      /* $("#example").on('processing.dt', function (e, settings, processing) {
      $('#processingIndicator').css('display', 'none');
      if (processing) {
      //$(e.currentTarget).LoadingOverlay("show");
      //alert('hello');
      $.LoadingOverlay("show");
      } else {
      $(e.currentTarget).LoadingOverlay("hide", true);
      $.LoadingOverlay("hide", true);
      }
      }) */
      
   </script>
   <script>
      $('.selectedsun1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sun1").css('background-color', '#ffdede');
        $("#sun1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sun1").css('background-color', '#e7ffe1');
        $("#sun1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sun2").css('background-color', '#ffdede');
        $("#sun2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sun2").css('background-color', '#e7ffe1');
        $("#sun2").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sun3").css('background-color', '#ffdede');
        $("#sun3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sun3").css('background-color', '#e7ffe1');
        $("#sun3").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sun4").css('background-color', '#ffdede');
        $("#sun4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sun4").css('background-color', '#e7ffe1');
        $("#sun4").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsun5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sun5").css('background-color', '#ffdede');
        $("#sun5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sun5").css('background-color', '#e7ffe1');
        $("#sun5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Mon ##########################-->
   <script>
      $('.selectedmon1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#mon1").css('background-color', '#ffdede');
        $("#mon1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#mon1").css('background-color', '#e7ffe1');
        $("#mon1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedmon2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#mon2").css('background-color', '#ffdede');
        $("#mon2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#mon2").css('background-color', '#e7ffe1');
        $("#mon2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedmon3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#mon3").css('background-color', '#ffdede');
        $("#mon3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#mon3").css('background-color', '#e7ffe1');
        $("#mon3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedmon4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#mon4").css('background-color', '#ffdede');
        $("#mon4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#mon4").css('background-color', '#e7ffe1');
        $("#mon4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedmon5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#mon5").css('background-color', '#ffdede');
        $("#mon5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#mon5").css('background-color', '#e7ffe1');
        $("#mon5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Tuesday ##########################-->
   <script>
      $('.selectedtues1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tues1").css('background-color', '#ffdede');
        $("#tues1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tues1").css('background-color', '#e7ffe1');
        $("#tues1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedtues2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tues2").css('background-color', '#ffdede');
        $("#tues2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tues2").css('background-color', '#e7ffe1');
        $("#tues2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedtues3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tues3").css('background-color', '#ffdede');
        $("#tues3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tues3").css('background-color', '#e7ffe1');
        $("#tues3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedtues4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tues4").css('background-color', '#ffdede');
        $("#tues4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tues4").css('background-color', '#e7ffe1');
        $("#tues4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedtues5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#tues5").css('background-color', '#ffdede');
        $("#tues5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#tues5").css('background-color', '#e7ffe1');
        $("#tues5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Wednesday ##########################-->
   <script>
      $('.selectedwed1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wed1").css('background-color', '#ffdede');
        $("#wed1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wed1").css('background-color', '#e7ffe1');
        $("#wed1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedwed2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wed2").css('background-color', '#ffdede');
        $("#wed2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wed2").css('background-color', '#e7ffe1');
        $("#wed2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedwed3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wed3").css('background-color', '#ffdede');
        $("#wed3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wed3").css('background-color', '#e7ffe1');
        $("#wed3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedwed4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wed4").css('background-color', '#ffdede');
        $("#wed4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wed4").css('background-color', '#e7ffe1');
        $("#wed4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedwed5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#wed5").css('background-color', '#ffdede');
        $("#wed5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#wed5").css('background-color', '#e7ffe1');
        $("#wed5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Thrusday ##########################-->
   <script>
      $('.selectedthrus1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrus1").css('background-color', '#ffdede');
        $("#thrus1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrus1").css('background-color', '#e7ffe1');
        $("#thrus1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedthrus2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrus2").css('background-color', '#ffdede');
        $("#thrus2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrus2").css('background-color', '#e7ffe1');
        $("#thrus2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedthrus3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrus3").css('background-color', '#ffdede');
        $("#thrus3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrus3").css('background-color', '#e7ffe1');
        $("#thrus3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedthrus4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrus4").css('background-color', '#ffdede');
        $("#thrus4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrus4").css('background-color', '#e7ffe1');
        $("#thrus4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedthrus5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#thrus5").css('background-color', '#ffdede');
        $("#thrus5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#thrus5").css('background-color', '#e7ffe1');
        $("#thrus5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Friday ##########################-->
   <script>
      $('.selectedfri1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#fri1").css('background-color', '#ffdede');
        $("#fri1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#fri1").css('background-color', '#e7ffe1');
        $("#fri1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedfri2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#fri2").css('background-color', '#ffdede');
        $("#fri2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#fri2").css('background-color', '#e7ffe1');
        $("#fri2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedfri3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#fri3").css('background-color', '#ffdede');
        $("#fri3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#fri3").css('background-color', '#e7ffe1');
        $("#fri3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedfri4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#fri4").css('background-color', '#ffdede');
        $("#fri4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#fri4").css('background-color', '#e7ffe1');
        $("#fri4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedfri5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#fri5").css('background-color', '#ffdede');
        $("#fri5").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#fri5").css('background-color', '#e7ffe1');
        $("#fri5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <!--##################################################### Saturday ##########################-->
   <script>
      $('.selectedsat1').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sat1").css('background-color', '#ffdede');
        $("#sat1").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sat1").css('background-color', '#e7ffe1');
        $("#sat1").css('border', '1px solid #507d45;');
      }
      });
       
   </script>
   <script>
      $('.selectedsat2').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sat2").css('background-color', '#ffdede');
        $("#sat2").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sat2").css('background-color', '#e7ffe1');
        $("#sat2").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedsat3').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sat3").css('background-color', '#ffdede');
        $("#sat3").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sat3").css('background-color', '#e7ffe1');
        $("#sat3").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedsat4').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sat4").css('background-color', '#ffdede');
        $("#sat4").css('border', '1px solid #ff4949;');
      }
        if($(this).val() == '0'){
        $("#sat4").css('background-color', '#e7ffe1');
        $("#sat4").css('border', '1px solid #507d45;');
      }
      });
       
   </script><script>
      $('.selectedsat5').change(function(){
      
      if($(this).val() == '1'){ 
        $("#sat5").css('background-color', '#ffdede');
        $("#sat5").css('border', '1px solid #ff4949;');
       
      }
        if($(this).val() == '0'){
        $("#sat5").css('background-color','#e7ffe1');
        $("#sat5").css('border', '1px solid #507d45;');
      }
      });
       
   </script>



<script>
  $("#example").on('processing.dt', function (e, settings, processing) {
    $('#processingIndicator').css('display', 'none');
         if (processing) {
        $("#example").addClass("table-loader");
      
     } else {
         $(e.currentTarget).LoadingOverlay("hide", true);
         $("#example").removeClass('table-loader');
     }
})
  </script> 

<script>
      $("#example").on('loder', function (e, settings, processing) {
      $('#processingIndicator').css('display', 'none');
      if (processing) {
      //$(e.currentTarget).LoadingOverlay("show");
      //alert('hello');
      $.LoadingOverlay("show");
      } else {
      $(e.currentTarget).LoadingOverlay("hide", true);
      $.LoadingOverlay("hide", true);
      }
      })
      
   </script>
   <script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>


   <script>
      $('#getAtt').click(function() {
      var statusfilter = $('#statusfilter').val();
		
      var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
      var datestring="&date=";
      var date = new Date();
      date.setMinutes(0);
      date.setSeconds(0);
      date.setMilliseconds(0);
      var isoDateString = date.toISOString().substring(0,10);
	  
	  
	  //////////////////datatable start///////////////
	  
      var table = $('#example').DataTable({
         columnDefs: [
    { orderable: false, targets: 11 }
  ],
      buttons: [
         {
                text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                className: "btn btn-light",
                action: () => {
                    $('#filtermodal').modal('show');
               
                } 
            
         },


      {
      extend:'colvis',
      action: function myexcel() {

         $('#column_modal').modal('show');
                }
      },
      {
      extend:'collection',
      text:'<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
      buttons: [{
                        extend: 'csv',

                        text: 'csv',
                        extension: '.csv',
                        exportOptions:

                        {

                            columns: [0,1,2,3,4,5, 6, 7, 8, 9,10],
                        },
                        title: 'Shift'
                    },

                        // {
                        //     extend: 'excelHtml5',
                        //     exportOptions: {
                        //         columns: [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        //     }
                        // },
                        {
                            extend: 'pdf',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                
                            exportOptions: {
                                columns: [0,1,2,3,4,5, 6, 7, 8, 9,10],
                               
                            },
                            alignment: 'center',
                        }, {
                            extend: 'print',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                            // autoPrint: false,
                            title: '',
                            
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0,1,2,3,4,5, 6, 7, 8, 9,10],
                                
                                stripHtml: false,
                            },
      repeatingHead:{
      
      logo: '<?=URL?>../assets/image/logo.png',
      logoPosition: 'center',
      logoStyle: 'height:100px;width:130px;',
      title: 'Shifts of '+org+' Dated '+isoDateString+'',
      
      },
      // text: '<i class="fa fa-print"></i> Print',
      text: 'Print',
      
      customize: function (win) {
      $(win.document.body)
      .css('font-size', '10px')
      
      
      $(win.document.body).find('table')
      .addClass('compact')
      .css('font-size', 'inherit');
      }
      }]
      }],
      //"dom": 'Bfrtip',    
      // "scrollX": true,  
      "bDestroy":true,
      "scrollX": true, 
      "serverSide":true,
      "serverMethod":"post",                          
      "dom": '<"pull-left"l>B<"pull-left"f>rtip',   
      
         
         
                 language: {
                     search: "",
                     searchPlaceholder: "Search",
                     sLengthMenu: "Row   _MENU_"
                 },
       "contentType": "application/json",
              "ajax": "<?=  URL;?>Managesettings/getAllShift?statusfilter=" +statusfilter,
              "columns": [
             { "data": "name" },
          { "data": "timein" },
          { "data": "timeout" },
          { "data": "shifttype" },
          { "data": "shifthpurs" },
           { "data": "status" },
          
          { "data": "timeinbreak" },
          { "data": "timeoutbreak" },
          { "data": "timeingrace" },
          { "data": "timeoutgrace" },
          
          { "data": "workhours" },
         
          { "data": "action" }
      ]
      });
       var total=table.columns().visible().length-1;
              //alert(total);
              setTimeout(function() {
             
              var checkbox = 0;
              //var total=9;
              for(var i=0; i< total; i++) {
             
              if( table.column(i).visible()) {
              checkbox++;
              $("#chk"+i).iCheck("check");
              }          
              }
              if(checkbox ==total ){
             
              for(var i=0; i< total; i++) {        
              if(i<6){      
              table.column(i).visible(true);
              $("#chk"+i).iCheck("check");
              }else{
              table.column(i).visible(false);
              $("#chk"+i).iCheck("uncheck");
              }        
              }        
              }          
              },500);
             
             
              $('input[type="checkbox"]').on('ifChecked', function(){
              var checkbox = $("input[type='checkbox']:checked ").length;
              for(var i=0; i< checkbox; i++) {
              var ischecked = $("#chk"+i).is(":checked");
              if(checkbox >6){
             
              if(ischecked == true) {
              $("#chk"+i).iCheck(":checked");
              }
              else{
              $("#chk"+i).iCheck(":unchecked");
              }    
              }
              }  
              });    
             
              $("#button1").click(function(){
              var checkbox = $(".modal_checkbox");
              //alert(checkbox.length);
              for(var i=0; i< checkbox.length; i++) {
              var column = table.column(i);
              var ischecked = $("#chk"+i).is(":checked");
       // alert(ischecked);
              if(ischecked == true)
              {
              column.visible(true);}
              else{
             
              column.visible(false);}
             
              }
            
              });
      } );
   </script>
   
</html>

<!DOCTYPE html>
<html>
   <head>
      <title></title>
       <?php 
        $this->load->view('menubar/allnewcss');
       ?>
      
      
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

         
      /*  margin-left: 14rem;*/
          margin-bottom: 5px;
         }
         .rig{
      margin-left: 14rem;
          margin-bottom: 5px;
         }
         .bttn
         {
         width: 8rem;
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
       /*  top: -3.3rem;*/
         left: 43rem;
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


      </style>
   </head>
   <body>
       <?php 
         $data['pageid']=7.5;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
        
            
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">

            
               <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                     <div class="row" style="margin-left: 0px;">
                        <span> <a href="<?= URL; ?>Managesettings/index" class="subhead">Shifts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <span ><a href="<?= URL; ?>Managesettings/department" class="subhead">Department</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                        <span ><a href="<?= URL; ?>Managesettings/designation"  class="subhead">Designation</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span ><a href="<?= URL; ?>Managesettings/holidays" class="subhead">Holidays</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><a href="<?= URL; ?>Managesettings/geofence"  class="subhead">Geo Fence</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="active5"><a href="<?= URL; ?>Managesettings/hourlyrate" class="subhead">Hourly Rate</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </div>
                  </div>
				  
				   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				   <button class="primary-button" data-toggle="modal" data-target="#addDesg">
                                <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span>Add Hourly Rate</div> 
                                </button>
								</div>
                   
               </div>
            </div>
            <!--  -->
           
            
         
       
         <table id="example" class="table" style="width:100%;">
            <thead>
                        <tr >
                          <!-- <th width='30%'>Designation</th> -->
                          <th width="50%">Rates</th>
                          <th width="60%">Status</th>
                          <th  width="40%" >Action</th>
                        </tr>
                      </thead>
           
         </table>
      </main>
      <!--column Visibility-->

       <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="<?= URL; ?>Attendance/allattendance"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form1" >
                        <div class="modal-body">
                            <div class="form-group" >
                                <div class="row">


                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                      <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label><br>-->
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp; Rates</label><br>
                                      
                                        


                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled >&nbsp; status </label><br>
                                       
                                      

                                    </div>
                                


                                    </div>
                                 

                                </div>
                            </div>
                            </form>
                             
                           <div class="rig">
                                <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                            </div>
                            
                        </div>


                    
                    
                </div>
              </div>
            

      <!-- Modal -->


      <!--Edit Designations modal start-->



<div class="modal fade" id="addDesgE" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update Rate</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form id="desgFromE">
         <div class="modal-body">
      <input type="hidden" id="rid" />
      <input type="hidden" id="attsts" />
      <div class="row">
        <div class="col-md-12">
       

          <div  class="form-group label-floating ">
            <label >Rate<span  class="red">*</span></label>
            
            <input type="number" id="rateE" class="form-control" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
          </div>
          
        </div>
      </div>      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group label-floating">
            <label class="control-label">Status  <span class="red"> </span></label>
            <select class="form-control" id="statusE" >
              <option value='1'>Active</option>
              <option value='0'>Inactive</option>
            </select>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      </div>
      
    </form>        
                            <br>
                          
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                              
                     <button type="button" id="saveE" class="btn btn-success btnn" style="width: 126px;">Save</button>
                   </div>
                   <!--   </div> -->
                  <!--   </div>  -->
                                 </div>
                
               </div>
               <div id="response"></div>
            </div>
         </div>


<!------Edit desg modal close------------>


<!-----delete desg start--->




   <div class="modal fade" id="delDesg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete Rate</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                   <form>
      <input type="hidden" id="del_did" />
      <div class="row">
        <div class="col-md-12">
          <h6>Delete the "<span id="ratep"></span>" rate?</h6>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>        
                            <br>
                            <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="delete" class="btn btn-success bttn">Save</button>
                   </div>
                     </div>
                    </div> 
                                 </div>
                  <!-- <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" id="saverate" class="btn btn-success">Save</button>
                  </div> -->
               </div>
               <div id="response"></div>
            </div>
         </div>

<!-----delete desg close--->









      
        
               <div class="modal fade" id="addDesg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Add a Rate</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                    <form id="desgFrom">
                     <div class="row">
        <div class="col-lg-12">
         
          <div class="form-group label-floating">
            <label class="control-label" id="desgNameLable">Rate<span  class="red">*</span></label>
            <input type="number" min="0" id="rate" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group label-floating" style="display:none">
            <label class="control-label">Status  <span class="red"> *</span></label>
            <select class="form-control" id="status" >
              <option value='1' selected>Active</option>
              <option value='0'>Inactive</option>
            </select>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>   
                            <br>
                            <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal" >Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="save" class="btn btn-success bttn">Save</button>
                   </div>
                     </div>
                    </div> 
                  </form>
                                 </div>
                  
               </div>
               <div id="response"></div>
            </div>
         </div>
    






     
   </body>
     <?php 
        $this->load->view('menubar/allnewjs');
       ?>

   <script>
      $(document).ready(function() {
                 var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
      var datestring="&date=";
      var date = new Date();
      date.setMinutes(0);
      date.setSeconds(0);
      date.setMilliseconds(0);
      
      var isoDateString = date.toISOString().substring(0,10);
          var table = $('#example').DataTable({
      //"dom": '<"pull-left"f><"pull-right"l>tip',   
      
      
      buttons: [
      {
      extend:'colvis',
      action: function myexcel() {
        //alert('shakir');

         
         $('#column_modal').modal('show');

                    
    
                }
   },

      {
      extend:'collection',
      text:'<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
      buttons:['csv', 'excel', 'pdf',  {
      extend: 'print',
      // autoPrint: false,
      title: '',
      exportOptions: {
      // columns: ':visible',
      columns: [ 0,1,2],
      stripHtml: false,
      },
      repeatingHead:{
      
      logo: '<?=URL?>../assets/image/logo.png',
      logoPosition: 'center',
      logoStyle: 'height:100px;width:130px;',
      title: 'Rate of '+org+' Dated '+isoDateString+'',
      
      },
      // text: '<i class="fa fa-print"></i> Print',
      text: 'Print',
      
      customize: function (win) {
      $(win.document.body)
      .css('font-size', '10px')
      
      // .prepend(
      //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
      // );
      
      $(win.document.body).find('table')
      .addClass('compact')
      .css('font-size', 'inherit');
      }
      }]
      }],
      //"dom": 'Bfrtip',    
      //"scrollX": true,
         'serverSide': true,
         'serverMethod': 'post',                  
         "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: " Search",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
           "contentType": "application/json",
                 "ajax": "<?=  URL;?>Managesettings/getAllrates",
                 "columns": [
                 // { "data": "name" },
                 { "data": "rate" },
        //  { "data": "desc" },
          //{ "data": "cdate" },
          //{ "data": "mdate" },
          { "data": "status" },
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
                 if(i<7){       
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
                 } else{ 
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
                 //$('#column_modal').hide();
                 //$('#example').DataTable().ajax.reload(null, false);
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
        $('#save').click(function(){
          // if($('#rateName').val()==''){
           //  $('#rateName').focus();
            // doNotify('top','center',4,'Please enter the rate name.');
           //  return false;
          // }
          if($('#rate').val()==''){
            $('#rate').focus();
            doNotify('top','center',4,'Please enter the rate');
            return false;
          }
           var rna=$('#rateName').val();
           var rate=$('#rate').val();

           var sts=$('#status').val();
           $.ajax({url: "<?php echo URL;?>Managesettings/addRate",
            data: {"rna":rna,"sts":sts,"rate":rate},
            success: function(result){
              if(result==1){
                doNotify('top','center',2,'Rate added successfully');
                $('#addDesg').modal('hide');
                document.getElementById('desgFrom').reset();
                setTimeout("location.reload(true);",2000);
                 table.ajax.reload();
              }else if(result==2){
                doNotify('top','center',3,'Rate '+rate+' already exist');
              }
              else{
                doNotify('top','center',4,'There may error(s) in creating Rate, try later');
                document.getElementById('desgFrom').reset();
                $('#addDesg').modal('hide');
              }
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });
        </script>

   <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
      })
   </script>
   <script type="text/javascript">
     $('#saveE').click(function(){
          // if($('#rateNameE').val()==''){
           //  $('#rateNameE').focus();
            // doNotify('top','center',4,'Please enter the Rate name.');
           //  return false;
          // }
          if($('#rateE').val()==''){
            $('#rateE').focus();
            doNotify('top','center',4,'Please enter the rate');
            return false;
          }
           var rid=$('#rid').val();
      
           var rna=$('#rateNameE').val();
           var sts=$('#statusE').val();
           var rate=$('#rateE').val();
           var attsts=$('#attsts').val();






           $.ajax({url: "<?php echo URL;?>managesettings/editRate",
            data: {"rid":rid,"rna":rna,"sts":sts,"rate":rate},
            success: function(result){
              //alert(result);
              if(result==1){
                doNotify('top','center',2,'Rate updated successfully');
                $('#addDesgE').modal('hide');
                document.getElementById('desgFromE').reset();
                setTimeout("location.reload(true);",2000);
                 table.ajax.reload();
              }else if(result==2){
                doNotify('top','center',3,'Designation '+rate+' already exist');
                $('#addDesgE').modal('hide');
              }
              else{
                doNotify('top','center',4,'No changes found');
                document.getElementById('desgFromE').reset();
                $('#addDesgE').modal('hide');
              }
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });
      $(document).on("click", "#delete", function (){
        var id=$('#del_did').val();
        
        $.ajax({url: "<?php echo URL;?>managesettings/deleteRate",
            data: {"rid":id},
            success: function(result){
              result=JSON.parse(result);
              if(result.afft){
                $('#delDesg').modal('hide');
                doNotify('top','center',2,'Rate deleted successfully');
                setTimeout("location.reload(true);",2000);
                 table.ajax.reload();
              }else{
                $('#delDesg').modal('hide');
                doNotify('top','center',4,'Rate connot be deleted as it contains data');
              }
            
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });
      $(document).on("click", ".edit", function () {
        
        $('#rateNameE').attr('placeholder',"");
        $('#rateE').attr('placeholder',"");
        $('#rid').val($(this).data('did'));
        $('#rateE').val($(this).data('rate'));
        $('#rateNameE').val($(this).data('name'));
          
        $('#statusE').val($(this).data('sts'));
        $('#attsts').val($(this).data('attsts'));
           

    
      
        
        if($(this).data('attsts') > 0){


          $('#rateE').prop("disabled", true,);
          $('#rateE').attr('title', 'Rate connot be editable as it contains data');
        }
        else{
          $('#rateE').prop("disabled", false);
          $('#rateE').attr('title', '');

        } 

      });
      $(document).on("click", ".delete", function () {
        $('#del_did').val($(this).data('did'));
        $('#rna').text($(this).data('dname'));
        $('#ratep').text($(this).data('rate'));
        //alert($(this).data('rate'));
      }); 

       $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // alert();  
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
<script>
$("#example").on('processing.dt', function (e, settings, processing) {
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
</html>
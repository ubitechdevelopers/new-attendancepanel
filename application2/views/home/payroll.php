<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="<?=URL;?>../assets/scss/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link href="<?=URL?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
      <style type="text/css">
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
         .bttn
         {
         width: 8rem;
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
 padding-top: 1.8rem!important;
} 
table.dataTable tbody td:nth-child(3) {
 padding-top: 2.1rem!important;
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
         /*padding-left: 76px!important;*/
    width: 22.4rem!important;
  }
}

      </style>
   </head>
   <body>
       <?php 
   $this->load->view('menubar/sidebar');
   $this->load->view('menubar/navbar');
   ?>
      <main class="main">
         <div class="container-fluid" style="padding: 0px;">
            <div class="row">
               
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                 <div class="primary-text">Payroll</div>
               
                  
               </div>
           
           
          
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;padding-left: 18.3rem;">
                        <div class="row">
                           
                           <button class="tertiary-button">
                             <div> <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/printer.svg" alt=""> </span> Print </div>   
                            </button>
                            <button class="tertiary-button">
                              <div> <span class="side-item-icon"> <img src="<?=URL?>../assets/icons/download.svg" alt=""> </span> Download </div> 
                            </button>
                            <button class="tertiary-button">
                           <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/filter.svg" alt=""> </span> Filter </div> 
                            </button>
                            
                             <!-- Button trigger modal -->
                             <!--  <button class="primary-button" data-toggle="modal" data-target="#myModal">
                                <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span>Add Department</div> 
                                </button> -->
                              
                           </div>
                        </div>
                    
            </div>
          </div>
         
         <br>
         <br>
               <table id="example" class="table" style="width:100%;">
            <thead>
               <tr style="">
                  <!-- <th style="background-image:none"!important><input type="checkbox" id="select_all" name="select_all" value=""/></th> -->
                  <th width="20%">Departments</th>
                          <th width="70%">Department Head</th>
                          
                          <th width="10%" >Status</th>
                          <th width="20%"  >Action</th>
               </tr>
            </thead>
            <!--<tbody>
               <tr>
                   <td>Tiger Nixon</td>
                   <td>System Architect</td>
                   <td>Edinburgh</td>
                   <td>61</td>
                   <td>2011/04/25</td>
                   <td>$320,800</td>
               </tr>
               <tr>
                   <td>Garrett Winters</td>
                   <td>Accountant</td>
                   <td>Tokyo</td>
                   <td>63</td>
                   <td>2011/07/25</td>
                   <td>$170,750</td>
               </tr>
               <tr>
                   <td>Ashton Cox</td>
                   <td>Junior Technical Author</td>
                   <td>San Francisco</td>
                   <td>66</td>
                   <td>2009/01/12</td>
                   <td>$86,000</td>
               </tr>
               </tbody>-->
         </table>
      </main>
      <!-- Modal -->
      <form  id="add_dept" method="post">
         <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Department List</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     Department<br>
                     <input type="text" class="form-control" id="deptName" value="" name="Name" placeholder="Enter Department Name">
                     <span id="deptName_error" class="error_form"></span>
                     <br>
                     <div class="row">
                                  <div class="col-lg-4">
                                  </div>
                                    <div class="col-lg-8">
                                   
                                 <button type="button"  class="btn btn-secondary bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="save12" class="btn btn-success bttn">Save</button>
                      </div>
                    </div> 
                  </div>
                 <!--  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
               </div>
               <div id="response"></div>
            </div>
         </div>
      </form>
      </div>
   </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
      <script src="<?=URL?>../assets/js/navbar.js"></script>
      <!--<script src="<?=URL?>../assets/js/tabbar.js"></script>-->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script src="<?=URL?>../assets/js/dataTables.bootstrap4.min.js"></script>
      <script src="<?=URL?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
      <script src='<?=URL?>../assets/plugins/table_pdf/excellentexport.js'></script>


      <script>
         $(document).ready(function() {
            var table=$('#example').DataTable({

              // "scrollX": true,
            "dom": 'ftipr',

              "dom": '<"pull-left"f><"pull-right"l>tip',
               language: { 
                    search: "",
                    searchPlaceholder: "Search Employee",
                },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>userprofiles/getAllDept",
                 "columns": [
                 { "data": "name" },
              { "data": "depname" },
              ///{ "data": "cdate" },
              //{ "data": "mdate" },
              // { "data": "username"},
              // { "data": "pwd"},
             //    { "data": "date"},
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
                 if(i<3){       
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
   <script>
      $("#save12").click(function () {
          var deptnm = $('#deptName').val();
          alert(deptnm);
          if ($.trim($('#deptName').val()).length == 0)
          {
              $("#deptName_error").html("Please enter Department");
              $("#deptName_error").css("color", "#F90A0A");
              $("#deptName_error").show();
              $("#deptName").css("border", "2px solid #F90A0A");
              return false;
          } else
          {
              $("#deptName_error").hide();
              $("#deptName").css("border", "2px solid #34F458");
              $("#deptName_error").hide();
          }
      
          $.ajax({
              url: "<?php echo URL; ?>managesettings/add_department",
              data: {"deptnm": deptnm},
              type: "post",
              success: function (response) {
      
                  $('#myModal').modal('hide');
                  $('#add_dept')[0].reset();
                  $("#deptName").css("border", "1px solid #E5E5E5 ");
                  
                  // alert('Successfully inserted');
              },
              error: function ()
              {
                  alert("error");
              }
          });
      
      });
      
   </script>
   <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
      })
   </script>
</html>
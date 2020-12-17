<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
	<link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/bootstrap-select/css/bootstrap-select.css" />
	<title>Assigned Clients</title>
	<style>



	
		.btn1>input[type='file']
		{
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
		}
		
		.red
		{
			color:red;
			font-weight:'bold';
			font-size:16px;
		}
			
			.delete{
			cursor:pointer;
					}
					
			div.dt-buttons
			{
			position:relative;
			float:left;
			margin-left:15px;
			}
		
				  #example thead tr th.headerSortUp  
				  {
				   background-image: url('<?=URL?>../assets/img/up_arrow.png');
				  }
              #example thead tr th.headerSortDown  {
              background-image: url('<?=URL?>../assets/img/down_arrow.png');
													}
			 #example tbody tr td.lalign 
					{
             text-align: left;
                   }
				   .id
				   {
					   color:grey;
				   }
				 .empname
				 {
					font-Size:18px; 
				 }
	.t2{display:none;}
	</style>
	<style type="text/css" media="print" >
		
		 .print {
			  margin-left:40px;
			 align:center;
			 border:2px #666 solid; padding:5px;  
				}

          .nonPrintable
					{
						display:none;
					} /*class for the element we don’t want to print*/
		  
		  
	#cart_cancel
	{
		background-color: transparent!important;
        border: none;
        float: right;
	}	
	
     </style>
	 <!-- pre loader -->
	 <style>
	  /* Preloader */
	  #preloader {
	  position: fixed;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #fff;
	  /* change if the mask should have another color then white */
	   z-index: 99;
	  /* makes sure it stays on top */
	}
		#status {
		  width: 200px;
		  height: 200px;
		  position: absolute;
		  left: 60%;
		  /* centers the loading animation horizontally one the screen */
		  top: 50%;
		  /* centers the loading animation vertically one the screen */
		  background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
		  background-repeat: no-repeat;
		  background-position: center;
		  margin: -100px 0 0 -100px;
		  /* is width and height divided by two */
		}
	#addEmp{
       overflow: scroll;
   }
	 </style>
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 
</head>

      <div class="modal fade" id="loadmodel" role="dialog" data-backdrop="static" data-keyboard="false" style="z-index:11111111;" >
			<div class="modal-dialog">
				<center>
					<img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" height="20%" width="20%" />
				</center>
			</div>
       </div> 
<body style="" >
         
	<div class="wrapper">
	
		<?php
			$data['pageid']=5.1;
			$this->load->view('department/sidebar',$data);
		?>
	    <div class="main-panel">
			<?php
				$this->load->view('department/navbar');
			?>
			
			<div class="content" id="content">
			  <!-- loader area 
			   <div id = "loader" hidden >
					<center>
					 <img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" height="20%" width="20%" />
					</center>
					 
		       </div>-->
		       <?php 
		       $orgid =$_SESSION['orgid'];
		       $query1 = $this->db->query("SELECT `user_limit` as userlimit,status ,(SELECT COUNT(*)
    FROM EmployeeMaster where`OrganizationId` = $orgid and Is_Delete != 2) as registeredusers from licence_ubiattendance where `OrganizationId`=$orgid"); 

		       if ($r=$query1->result()){
							$userlimit  = $r[0]->userlimit;
							$reguser  = $r[0]->registeredusers;
							$status  = $r[0]->status;

						}




		       ?>
		       <!-- <?php echo $status; ?>  -->

		       <!-- <?php echo $userlimit ; ?> -->
		       <!-- <?php echo $data['userlimit'];?> -->
			   
	            <div class="container-fluid" id="maincontainerdiv" >
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green"> 
	                              <p class="category" style="color:#ffffff;font-size:17px;" > List of Assigned Clients</p>
								  <a rel="tooltip"  data-placement="bottom" title="Help" class="btn btn-success btn-sm toggle-sidebar pull-right " style="position:relative;margin-top:-30px; display: none;" >
								  <i class="fa fa-question"></i></a>
	                            </div>
	                            <div class="card-content">
									<div id="typography">
										<!-- <div class="title">
											<div class="row">
												
												<div class="col-md-12 text-left" >
												<button title="Add" class="btn btn-sm btn-success addemp" data-toggle="modal" data-target="#addClient" type="button" style="">	
												 <i class="fa fa-plus"> Add Client</i>
											   </button>
												
                                               <a href="<?=URL?>userprofiles/emportclient/3" class="btn btn-sm btn-success addemp" title="Add clients through import" style="padding:5px 8px;" style=""><i class="fa fa-file-excel-o">&nbsp;IMPORT CLIENT </i></a>

                                               <button  title="Select employees to assign" class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" style="" onclick="updateClient();">
														<i class="fa fa-tasks"> 
															Assign Employee</i>
												</button>
												</div>

					
					<div class="col-sm-2">
              <select id="zonecityfilter" name="zonecityfilter" style="width:158px;height:35px;position:relative;right:0px;" class="">
                <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--All Zone--</option>
                <?php
                $data= json_decode(getAllzonecity($_SESSION['orgid']));
                for($i=0;$i<count($data);$i++)
                echo '<option value='.$data[$i]->Zone.'>'.$data[$i]->Zone.'</option>';
                ?>
                </select> 
            </div>

                <div class="col-sm-1">
                 <button class="btn btn-success pull-left" style="position:relative;margin-top:-3px;margin-left:5px;" id="getAtt" ><i class="fa fa-search"></i></button>
                 </div>   
              

													
												
													<div class="col-md-4 text-right" style="float:right;">	
													</div>
													
											</div>
										</div> -->
										<div class="row" style="overflow-x:scroll;">
											<table id="example" class="display table" cellspacing="0" width="100%">
											<thead>
												<tr style="background-color:#008067;color:#ffffff;">
													
													
													<th>Employee</th>
													<th>Company</th>
													
												   	<th class="text-left" width="15%" 
													style="background-image:none"!important>Action</th>
												</tr>
											</thead>
										</table>
										</div>
									</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
			<div class="col-md-3 t2" id="sidebar" style="margin-top:100px;"></div>
	       
			<footer class="footer">
				<div class="container-fluid">	
				</div>
			</footer>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						
					</nav>
					<!--<p class="copyright pull-right" style="padding-right:25px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a></p>-->
			  <a href="http://www.ubitechsolutions.com/" target="_blank" >
					<p class="copyright pull-right" style="padding-right:25px;" >
					Copyright &copy;<script>document.write(new Date().getFullYear())</script>
					Ubitech Solutions. All rights reserved.
					</p>
				</a>
				</div>
			</footer>
		 </div>
     </div>
<!-- Modal open add Client-->


<div id="addClient" class="modal fade" role="dialog" style="z-index:10000000;" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Add Client</h4>
      </div>
      <div class="modal-body">
		<form id="clientFrom">
			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" id="FNLable">Company Name<span class="red">*</span></label>
						<input type="varchar" id="company" class="form-control alpha" required>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" id="FNLable">Contact Person<span class="red">*</span></label>
						<input type="varchar" id="firstName" class="form-control alpha" required>
					</div>
				</div>
				
			</div>
			
			
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Email<span class="red">*</span></label>
						<input type="email" id="email" class="form-control " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Contact No.<span class="red">*</span></label>
						<input type="text" maxlength="10" pattern="[0-9]{1}[0-9]{9}" class="form-control numeric" id="cont" required>
					</div>
				</div>
			</div>
		
			
		<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Address<span class="red">*</span></label>
						<input type="text" class="form-control " id="addr">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" >City<span class="red">*</span> </label>
						<input type="text" class="form-control alpha" id="city">
					</div>
				</div>
		</div>		
		
			
			
			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group label-floating ">
						   <label class="control-label">Country</label>
						   <select id="country" title="Please fill the required field" class="form-control">
							<option value="0">-Select-</option>
							<?php
							$data= json_decode(getAllCountries());
							for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
							?>
						</select>
					</div>
				</div>

               <div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" >Zone<span class="red">*</span> </label>
						<input type="text" class="form-control alpha" id="zonecity">
					</div>
				</div>	


			</div>
			
			
			
			
			
			<div class="row" >
			   <div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Description </label>
						<textarea class="form-control" id="description"></textarea>
					</div>
				</div>

				 <div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" >Status </label>
						<select id="sts" class="form-control">
							<option value="1">-Active-</option>
							<option value="0">-Inactive-</option>
						</select>
					</div>
				</div>	
			</div>
			

			
			
				
			
								
			<div class="clearfix"></div>
		
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" id="save"  class="btn btn-success">Save</button>
    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <button type="button" id="resetAdd" class="btn btn-default">Reset</button>
      </div>
	  </form>
    </div>
  </div>
  </div>
 



<div id="delClient" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Delete Client</h4>
      </div>
      <div class="modal-body">		
		<form>
			<input type="hidden" id="del_id" />
			
			
			<div class="row">
				<div class="col-md-12">
					<h4>Delete "<span id="ena"></span>"?</h4>
				</div>
			</div>
						
			<div class="clearfix"></div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="delete"  class="btn btn-warning" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div id="showeditclient" class="modal fade" role="dialog" style="z-index:10000000"  >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Assigned clients for <span id="empname"></span></h4>
      </div>
      <div class="modal-body">
		
    </div>
  </div>
</div>
</div>


<!-- unassign client start  -->
<div id="unassign" class="modal fade" role="dialog" style="z-index: 99999999">
			 <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Unassign Client</h4>
			  </div>
			  <div class="modal-body">		
				<form>
					<input type="hidden" id="clienid" />
					<div class="row">
						<div class="col-md-12">
							<h4>Unassign "<span id="clientname"></span>"?</h4>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" id="unassignclient"  class="btn btn-success" data-dismiss="modal">Unassign</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>

<!-- assign client end  -->

<div id="getassignclientlist" class="modal fade" role="dialog" style="z-index:10000000"  >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Assign clients for <span id="empnameclient"></span></h4>
      </div>
      <div class="modal-body">
		
    </div>
  </div>
</div>
</div>












		
<!-----Request for reset password close--->
</body>

       <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/bootstrap-select/js/bootstrap-select.js"></script>
       <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
	   <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
	   <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
	  
       <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
	   <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>


	   <!--  <script>
	var table=$('#example').DataTable(); 
$('#select_all').on('click',function(){

		$('#example').DataTable().ajax.reload(null, false);
}
// 

</script> -->

	    <!-- dayitava script start -->




	    <!-- dayitava script end -->
	
	<script>
	
		
						
			var specialKeys = new Array();
			specialKeys.push(8); //Backspace
			$(function () 
			{
				$(".numeric").bind("keypress", function (e) 
				{
					var keyCode = e.which ? e.which : e.keyCode
					var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
					$(".error").css("display", ret ? "none" : "inline");
					return ret;
				});
				
				$(".numeric").bind("drop", function (e) {
					return false;
				});
			});
			
			
			
			$(".alpha").keydown(function(e)
			{
				if ($.inArray(e.keyCode, [46, 8, 9]) !== -1 ||
				// Allow: Ctrl+A, Command+A
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				(e.keyCode >= 35 && e.keyCode <= 40)) 
				{
				return;
				}// Ensure that it is a number and stop the keypress
				if ((e.keyCode < 65 || e.keyCode > 90) && (e.keyCode !=95 || e.keyCode > 123) && e.keyCode != 32)
				{
				e.preventDefault();
				}
			});
						</script>
						<script>
						




			
	</script>

		
	






	<script type="text/javascript">
	  
    	//$(document).ready(function() { 
		$(".datepicker" ).datepicker({
				dateFormat: "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
                yearRange: "1900:2050"				
			}); 
			
			
	
		
				

    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
		var datestring="&date=";
  var date = new Date();
date.setMinutes(0);
date.setSeconds(0);
date.setMilliseconds(0);

var isoDateString = date.toISOString().substring(0,10);

   
		var ts;
		var ts1;
		var ss;
		
		
		
		var table=$('#example').DataTable( {
					//"bProcessing": true,
					"StateSave":true,
					"printable": true,
					"paging": true,
					//order: [[ 0, 'asc' ]],
					"orderable": true,
					dom: 'Bfrtip',
				    //order: [[ 5, 'asc' ]],
					//"paging": true,
					 // "processing": true,
					/*  language: {
							'loadingRecords': '&nbsp;',
							//'emptyTable':     'Loading...',
							'processing': 'Loading...'
						}, */ 
					  //"ServerSide": true,
					  //"Filter": true,
					   //"bSortable": true,
					   //"bSort": false,  
					   //"ordering": false,           
						
						//"searching": true,   
						
						 
						//"bRetrieve": true,
					
			 		
					//dom: 'Bfrtip',
					"bDestroy": true,// destroy data table before reinitializing
				   //"scrollX": true,
				    //"contentType": "application/json",
					
					
					"columnDefs": [
                  { "className": "dt-center", "visible": false, "targets": [] },
				  
				  
                  ],
					
					
					buttons: [

				    'pageLength',
					{
						title: ' Assigned Clients', 
		                extend: 'csvHtml5',
		                exportOptions: {
		                columns: [ 0,1 ]
		                }
		            },

		            {
						title: ' Assigned Clients',
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [  0,1 ]
		                }
		            },
							   
					{
		                extend: 'copyHtml5',
		                exportOptions: {
		                    columns: [  0,1,2, ':visible' ]
		                }
		            },
					  {
			            extend: 'print',
			            // autoPrint: false,
			            title: ' Assigned Clients',
			            exportOptions: {
			                // columns: ':visible',
			               columns: [  0,1 ],
			                stripHtml: false,
			            },
			            repeatingHead:{
			               logo: '<?=URL?>../assets/img/newlogo.png',
			               logoPosition: 'center',
			                logoStyle: 'height:100px;width:130px;',
			                title: 'Assigned clients of '+org+' Dated '+isoDateString+'',
			                
			            },
			            text: '<i class="fa fa-print"></i> Print',
			             
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
			        },
		            
		            'colvis'

					
				],
				
				
				
				
				 // columnDefs: [ { orderable: false, targets: [0]}],
	            
				
				//"targets"  : 'no-sort'
				"contentType": "application/json",
				"ajax": "<?php echo URL;?>departmenthead/getClientlist",
				//"dom": 'T<"clear">lfrtpi<"clear">',	
				"columns": [
					
					{ "data": "empname" },
					{ "data": "Name" },
					
					{ "data": "action"}
				]
				/*"drawCallback": function ( settings ) {
					var api = this.api();
					var rows = api.rows( {page:'current'} ).nodes();
					var last=null;
		 
					api.column(0, {page:'current'} ).data().each( function ( group, i ) {
						if ( last !== group ) {
							$(rows).eq( i ).before(
								'<tr class="group"><td bgcolor="#d59ff2" colspan=12><b>'+group+'</b> <b> &nbsp; &nbsp; </b></td></tr>'
							);
							last = group;
						}
					} );
				}*/
			});
			

		
			
		  
		
		
		//});

           

		
			


			 $('#save').click(function(){
		
		    	var len = $("#cont").val().length;
				
				
			    var email = $('#email').val();
				//alert($('#cont').val().length);
				  var check=1;
				  
				   if($('#company').val().trim()==''){
					  $('#company').focus();
						doNotify('top','center',4,'Please enter  company name');
						return false;
				  }

				  if($('#zonecity').val().trim()==''){
					  $('#zonecity').focus();
						doNotify('top','center',4,'Please enter  zone name');
						return false;
				  }
				  if($('#firstName').val().trim()==''){
					  $('#firstName').focus();
						doNotify('top','center',4,'Please enter contact person');
						return false;
				  }
				 
				  
				
				  		 
				if($('#email').val()==''){						 
					$('#email').focus();
					doNotify('top','center',4,'Please enter email ');
						return false;
						
				}
				
				if(!$('#email').val().trim()==''){						 
					if (!validate_Email(email)) {
					doNotify('top','center',4,'Please enter valid email');
						return false;
						e.preventDefault();
						}
				}
				function validate_Email(email) 
				{
						var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
						if (expression.test(email))
							{
								return true;
							}
						else {
							return false;
							}
					}

				
				   if($('#cont').val().trim()==''){
					  $('#cont').focus();
						doNotify('top','center',4,'Please enter contact no');
						return false;
				  }
				  
				     if(len < 8){
					  $('#cont').focus();
						doNotify('top','center',4,'Please enter valid contact no');
						return false;
				  }	
				  
				   
				  
				  
				  if(isNaN($('#cont').val())){
					 // alert('ok');
					  $('#cont').focus();
						doNotify('top','center',4,'Contact no. can contains digits only');
						return false;
				  }	 
				 


				 
				  if($('#addr').val().trim()==''){
					  $('#addr').focus();
						doNotify('top','center',4,'Please enter address');
						check=0;
						 return false;
				  }
				  
				  
				   if($('#city').val().trim()==''){
					  $('#city').focus();
						doNotify('top','center',4,'Please enter the city');
						check=0;
						 return false;
				  }
				  if(check==0)
					  return false;
				  
				   var company=$('#company').val().trim();
				   var zonecity=$('#zonecity').val().trim();
				   var fname=$('#firstName').val().trim();
				   var sts= 1;//$('#status').val();
				   var country=$('#country').val();
				   var city=$('#city').val().trim();
				   var email=$('#email').val().trim();
				   var addr=$('#addr').val().trim();
				   var cont=$('#cont').val().trim();
				   var desc=$('#description').val();
				
				
			       
			   
				 
				 var  formdata = new FormData();
				
				 
        		  formdata.append('company',company);
        		  formdata.append('zonecity',zonecity);
				  formdata.append('fname',fname);
				  formdata.append('sts',sts);
				  formdata.append('country',country);
				  formdata.append('city',city);
				  formdata.append('email',email);
				  formdata.append('addr',addr);
				  formdata.append('cont',cont);
				  formdata.append('desc',desc);
				  
				
				 
				 
					///// pre loader////
					
					
				   $("#loadmodel").modal('show'); 
				   
				   $.ajax({
					    processData: false,
						contentType: false,
					     url: "<?php echo URL;?>departmenthead/insertclient",
						 data: formdata,
						 datatype:"json",
						 type:"post",
				
					 
						success: function(result){
							 $("#loadmodel").modal('hide'); 
							if(result == 1){
								//$('#addEmp').modal('hide');
								doNotify('top','center',2,'Client added successfully');
								//table.ajax.reload();
								document.getElementById('clientFrom').reset();
								$('#addClient').modal('hide');
								var table = $('#example').DataTable();   
								table.ajax.reload();
						 // 	setInterval(function() {
							// 	 location.reload();
							// }, 1200);
								
								
							}else if(result == 2){
								doNotify('top','center',4,'Duplicate email id found');
							
							}else if(result == 3){
								doNotify('top','center',4,'Duplicate phone no. found');
							
							}
							else if(result == 5){
								
								doNotify('top','center',4,'Duplicate company found');
							
							}

						 },
						error: function(result){
							$("#loadmodel").modal('hide');
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
			});
			 var emailV = 0; 

      


			$('#saveE').click(function(){
				var len = $("#contE").val().length;
			    var email = $('#emailE').val();
				//alert($('#cont').val().length);
				  var check=1;
				  
				   if($('#companyE').val().trim()==''){
					  $('#companyE').focus();
						doNotify('top','center',4,'Please enter the company name');
						return false;
				  }
				  if($('#firstNameE').val().trim()==''){
					  $('#firstNameE').focus();
						doNotify('top','center',4,'Please enter contact person');
						return false;
				  }
				 
				  
				
				  		 
				if($('#emailE').val()==''){						 
					$('#emailE').focus();
					doNotify('top','center',4,'Please enter  email');
						return false;
						
				}
				
				if(!$('#emailE').val().trim()==''){						 
					if (!validate_Email(email)) {
					doNotify('top','center',4,'Please enter valid email');
						return false;
						e.preventDefault();
						}
				}
				function validate_Email(emailE) 
				{
						var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
						if (expression.test(email))
							{
								return true;
							}
						else {
							return false;
							}
					}

				
				   if($('#contE').val().trim()==''){
					  $('#contE').focus();
						doNotify('top','center',4,'Please enter  contact no');
						return false;
				  }
				     if(len < 8){
					  $('#contE').focus();
						doNotify('top','center',4,'Please enter the valid contact no');
						return false;
				  }	
				  if(isNaN($('#contE').val())){
					 // alert('ok');
					  $('#cont').focus();
						doNotify('top','center',4,'Contact no. can contains digits only');
						return false;
				  }	 
				 


				 
				  if($('#addrE').val().trim()==''){
					  $('#addrE').focus();
						doNotify('top','center',4,'Please enter the corresponding address');
						check=0;
						 return false;
				  }
				  
				  
				   if($('#cityE').val().trim()==''){
					  $('#cityE').focus();
						doNotify('top','center',4,'Please enter the city');
						check=0;
						 return false;
				  }
				
			  if(check==0)
					  return false;
				  
				   var id=$('#id').val();
				   var comp=$('#companyE').val().trim();
				   var name=$('#firstNameE').val().trim();
				   var email=$('#emailE').val();
				   var cont=$('#contE').val();
				   var addr=$('#addrE').val().trim();
				   var city=$('#cityE').val().trim();
				   var countr=$('#countryE').val();
				   var sts=$('#stsE').val();
				   
				   var desc=$('#descriptionE').val();
				   
				   
				  
				   
				  
			   
			   
			   
			   
			 var  formdata = new FormData();
				
				  formdata.append('id',id);
				  formdata.append('comp',comp);
				  formdata.append('name',name);
				  formdata.append('email',email);
				  formdata.append('cont',cont);
				  formdata.append('addr',addr);
				  formdata.append('city',city);
				  formdata.append('countr',countr);
				  formdata.append('sts',sts);
				  formdata.append('desc',desc);
				  
				
			
				   
				   $.ajax({
					   processData: false,
					contentType: false,
					url: "<?php echo URL;?>userprofiles/editClient",
					data: formdata,
					datatype:"json",
					 type:"post",
                   
				   success: function(result)
				   {
					   
					  if(result==3)
					  {
						   doNotify('top','center',3,'Email already exist'); 
					  }else if(result==4){
						   doNotify('top','center',3,'Phone no. already exist'); 
					  }
					  else if(result==2)
					  {
						 doNotify('top','center',3,'Company already exist');  
					  }else if(result==0)
					  {
						 doNotify('top','center',3,'No changes found');  
					  }
					  else if(result == 1){
						
						 doNotify('top','center',2,'Client details updated successfully'); 
						 $('#addClientE').modal('hide');
						var table=$('#example').DataTable();
								table.ajax.reload(null, false);
						
					  }
					  else
						doNotify('top','center',3,'Error occured, try later'); 
					}
					});
			});
             
            var zone="";

			$(document).on("click", ".edit", function (){
		
				$('#id').val($(this).data('id'));
				$('#companyE').val($(this).data('comp'));
				$('#firstNameE').val($(this).data('name'));
				$('#addrE').val($(this).data('addr'));	
				$('#cityE').val($(this).data('city'));	
				$('#contE').val($(this).data('contact'));	
				$('#emailE').val($(this).data('email'));	
				$('#countryE').val($(this).data('country'));	
				$('#stsE').val($(this).data('sts'));	
				$('#descriptionE').val($(this).data('desc'));
					
				
			
				
			});





			var sid = 0;
			var ssts =  "";
			$(document).on("click", ".status", function (){
				//alert($(this).data('id'));
				    
				   $("#sname").text("Make '"+$(this).data('ena')+"' Inactive?");
				   //$("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
				   $("#changestatus").modal("show");
				   sid = $(this).data('id');
				   
				   ssts = $(this).data('sts');;
				});
			$("#savestatus").click(function(){
				 id=sid;
				 sts=ssts;
				$.ajax({url: "<?php echo URL;?>userprofiles/updateClientStatus",
				
						data: {"id":id,"sts":sts},
						success: function(result){
							if(result == 1){	
								 doNotify('top','center',2,'Client status updated successfully');
								var table=$('#example').DataTable();
								 table.ajax.reload(null, false);  
								 $("#changestatus").modal("hide"); 
											}    
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
			});
			
			$(document).on("click", ".qr1", function ()
			{
				
					doNotify('top','center',3,'Mobile no. is mandatory to generate QR Code');
			});
			
			
		/*start*/
		
		
   
			$(document).on("click", ".delete", function () {
				
				
				$('#del_id').val($(this).data('id'));
				$('#ena').text($(this).data('ena').trim());
			});
			$(document).on("click", "#delete", function (){
						$("#maincontainerdiv").css("opacity","0.08");
						//$("#addClient").css("opacity","0.02");
						$("#loader").show("slow");
					  
				var id=$('#del_id').val(); 
				// alert(id);
				$.ajax({url: "<?php echo URL;?>userprofiles/deleteclient",
						data: {"clientid":id},
						success: function(result){
							
							if(result == 1){
								 $('#delclient').modal('hide');
								 doNotify('top','center',2,'Client deleted successfully'); 
								 var table= $('#example').DataTable();
								 table.ajax.reload();  
					        }
                            if(result == 2)
							{
								doNotify('top','center',4,"Employee with admin permission can't be deleted"); 
							}
                             $("#maincontainerdiv").css("opacity","1");
				             $("#addEmp").css("opacity","1");
				             $("#loader").hide("slow");							
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
							 $("#maincontainerdiv").css("opacity","1");
				             $("#addEmp").css("opacity","1");
				             $("#loader").hide("slow");
						 }
				   });
			});
			
		
      

		$(document).on("change", "#country", function () {
			
				var country = $(this).val();
				//alert(country);
				$.ajax({url: "<?php echo URL;?>userprofiles/timezone",
						data: {"country":country},
					success: function(result){
					result=JSON.parse(result);

					
					var options="";
					
					for(var i=0;i<result.data.length;i++){
						
						options+="<option value='"+result.data[i].timezone_id+"'>"+result.data[i].timezone+"</option>";
						
					}
					
					
                   var temp="";
				   
				   temp=temp+options;
				   
				   $("#timezone").html(temp);
				   

				   
					},
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})

		 /*This code for get the time zone according to country (end)


		This code for when add the country (start)*/
			$(document).on("change", "#country", function () {
					var country = $(this).val();
					$.ajax({url: "<?php echo URL;?>userprofiles/getCity",
							data: {"country":country},
							success: function(result){
								var result=JSON.parse(result);
								 var i = 0;
								for(i=0; i<result.length; i++){
									$('#city').append('<option value="' + result[i].Id + '">' + result[i].Name + '</option>');	
								}		   				
							 },
							error: function(result){
								doNotify('top','center',4,'Unable to connect API');
							 }
					   });
					
				})
			 /*This code for when add  the country (end)
			 This code for when edit  the country (start)*/
			$(document).on("change", "#countryE", function () {
				var country = $(this).val();
				$.ajax({url: "<?php echo URL;?>userprofiles/getCity",
						data: {"country":country},
						success: function(result){
							
							var result=JSON.parse(result);
							 var i = 0;
							for(i=0; i<result.length; i++){
								$('#cityE').append('<option value="' + result[i].Id + '"  >' + result[i].Name + '</option>');	
							}		   				
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})
			/*This code for when edit  the country (end)*/
			
			//////qr code///////
			
			
			$('#resetAdd').click(function(){$('#clientFrom')[0].reset();});
			
		$("#submitResetPassword").click(function(){ 
				$('#resetError').text("");
				var pwd=$('#resetPassword');
				var cpwd=$('#confirmResetPassword');
				var id=$('#idResetPassword');
				//alert(id);
				
				if(pwd.val().trim().length<6)
				{
					$('#resetError').text('Password must contains at least 6 characters');
					pwd.val(pwd.val().trim());
					pwd.focus();
					return false;
				}
			if(pwd.val().trim() != cpwd.val().trim())
				{
					$('#resetError').text("Confirm password didn't match");
					cpwd.focus();
					return false;
				}
			$.ajax({
				url: "<?php echo URL;?>userprofiles/resetPassword",
						data: {"pass":pwd.val(),"id":id.val()},
						type: 'post',
						success: function(result)
						{
							result=JSON.parse(result);
							if(result)
							{
								  
								doNotify('top','center',2,'Password is reset successfully');
								document.getElementById('resetpwdform').reset();
								$('#resetpwd').modal('hide');
								var table = $('#example').DataTable();
								table.ajax.reload(null, false);
							}
							else
								doNotify('top','center',3,'You cannot use your current password as new password, try again');
						 },
						error: function(result)
					     {
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
			
			});
			
		
	</script>

	
	<script>
		
			
			function validateEmail(email) 
			{
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
			}
		</script>
	
	
       
	  <script>
	  $(".pencil").click(function () 
	    {
			$("input[type='file']").trigger('click');
		});
		
	  </script>
	 


<script type="text/javascript">
	var favorite = [];
function updateClient(){

if($('.checkbox:checked').length > 0)
	{
		$('#deptS').val('0');
		$('#assignemp').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"),function(){            
				favorite.push($(this).val());

			});
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 client to assign employee');
		//$('#shifts').modal('hide');
		return false;
	}
}
</script>

<script type="text/javascript">
	$(document).on("click","#assignemployee",function(){
		//alert('hello');
		var clienid = favorite;
		//alert(clienid);
		var empid = $("#assignemptoclent").val();
		//alert(empid);
		
		$.ajax({

			url: "<?php echo URL;?>departmenthead/updateclient",
					//data: formdata, //,"email":email
					datatype:"json",
					 type:"post",
                   data: {"clientid":clienid,"empid":empid},
				   success: function(result)
				   {
					  if(result == 1){
						$('#getclient').modal('hide');
						 doNotify('top','center',2,'Client assigned Successfully'); 
						 //var table=$('#example').DataTable();
						// location.reload();
					  }
					  else
						doNotify('top','center',3,'Error occured, Try later.'); 
					},

		});
	});
</script>

<script type="text/javascript">

 	$(document).on("click","#showclientlist",function(){
 		var eid = $(this).data('eid')


 		$.ajax({

 			
				type:"post",
				datatype:"html",
				url: "<?php echo URL;?>departmenthead/showselectedclient",
                data: {"eid":eid},
				   success: function(result)

				   {

					$("#showeditclient .modal-body").empty();        
					$("#showeditclient .modal-body").html(result);        
					$("#showeditclient").modal('show');
					}

 		});


 	});
	
	$(document).on("click",".tst",function(){
		$('#empname').text($(this).data('name').trim());
		
	});
 	

 </script>


 <script type="text/javascript">
 	$(document).on("click",".getassignclient",function(){
 		var empid = $(this).data('empid');
 		var cid = $(this).data('clientid');
 		//alert(empid);
 		//alert(cid);
 		
 		
 		$.ajax({
 			type:"post",
				datatype:"html",
				url: "<?php echo URL;?>departmenthead/assignclientforemp",
                data: {"empid":empid,"cid":cid},
				   success: function(result)

				   {
				   	//alert(result);
					$("#getassignclientlist .modal-body").empty();        
					$("#getassignclientlist .modal-body").html(result);        
					$("#getassignclientlist").modal('show');
					}
 		});

 	});
 </script>


<script type="text/javascript">
 	var clientid ;
 	var emplid ;
 

 	function openmodal($clientid,$emplid,$cname){
 		 clientid = $clientid;
 		 emplid = $emplid;
 		 cname = $cname;
 		
 		 //alert(clientid);
 		 //alert(emplid);
 		 //alert(cname);
 		 document.getElementById('clientname').innerHTML = cname;

 		
 		 $("#unassign").modal('show');
 	}

 $("#unassignclient").click(function(){


 	$.ajax({ 			
				type:"post",
				datatype:"json",
				url: "<?php echo URL;?>departmenthead/unassignclient",
                data: {"clientid":clientid,"emplid":emplid},
				   success: function(result)
				   {
					if(result == 1){
						$('#unassign').modal('hide');
						$('#showeditclient').modal('hide');
						var table=$('#example').DataTable();
						table.ajax.reload();

						 doNotify('top','center',2,'Unassigned successfully'); 
						
					  }
					  else
						doNotify('top','center',3,'Error occured, Try later.'); 
					},

 		});
 	
 });	

 
 

 </script>
 <script type="text/javascript">
 	$(document).on("click","#getempnameforclient",function(){
 	$('#empnameclient').text($(this).data('empname'));
 	//alert($(this).data('empname'));
 	});
 	
 </script>

 <script>
$(document).on("click","#updateclientforemp",function(){
//var empnid = $("#ide1").val();
		var empnid = $("#empid12").val();
		var clid = $("#clientlist12").val();
		if(clid==""){
			doNotify('top','center',3,'Select at least 1 client to assign employee');
			return false;
		}
		//alert(empnid);
		//alert(clid);
		$.ajax({

			url: "<?php echo URL;?>departmenthead/updateclient",
					//data: formdata, //,"email":email
					 datatype:"json",
					 type:"post",
                     data: {"clientid":clid,"empid":empnid},
				   success: function(result)
				   {
					  if(result == 1){
						$('#getassignclientlist').modal('hide');
						 doNotify('top','center',2,'Assigned Successfully'); 
						 var table=$('#example').DataTable();
						 table.ajax.reload();
						 //location.reload();
					  }else if(result >= 1){
					  	$('#getassignclientlist').modal('hide');
					  	doNotify('top','center',2,'Assigned Successfully'); 
					  	var table=$('#example').DataTable();
					  	table.ajax.reload();
					  }
					  else
						doNotify('top','center',3,'Error occured, Try later.'); 
					},

			});


		});
</script>
</html>
			

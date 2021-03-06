<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
	<link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
	<link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.css" />
	<link rel="stylesheet" href="<?=URL?>../assets/css/dataTables.tableTools.css" />
	 <link href="<?=URL?>../assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet"/>
 <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<title>Employees Wise</title>
     <style>
    
      .red{
      color:red;
      font-weight:'bold';
      font-size:16px;
      }
      .delete{
      cursor:pointer;
      }
    .bargraph{
         display:inline-block;
         margin-top:-8px;
         margin-left:-17px;
       }
      div.dt-buttons{
      position:relative;
      float:left;
      margin-left:15px;
      }
      .t2{display:none;}
     .modal-footer .btn+.btn 
    {
      margin-bottom: 10px!important;
    }
    a
    {
      cursor:pointer;
      
    }
    @media print {
   a[href]:after {
      display: none;
      visibility: hidden;
   }
}
    </style>
</head>
<body>
   <div class="wrapper">
		<?php
			$data['pageid']='5.2';
			$this->load->view('department/sidebar',$data);
		?>
	    <div class="main-panel">
			<?php
				$this->load->view('department/navbar');
			?>
			</br>
        <div class="content" id="content" style="" >
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="green" >
                  <!--  <h4 class="title">Attendance</h4> -->
                   <p class="category" style="color:#ffffff;font-size:17px;" >Employee Wise</p>
                    <!-- <p class="category" style="color:#ffffff;font-size:17px;" >Helppage </p> -->
                    <a rel="tooltip" style="position:relative;margin-top:-30px;"  data-placement="bottom" title="Help" class="btn btn-success btn-sm pull-right toggle-sidebar ">
                    <i class="fa fa-question"></i></a>
                  </div>
                <div class="card-content">
				<div class="row container-fluid" style="margin-top:0px;" >
								
				<div class="col-sm-3 bargraph" style="margin-top:0px;" >				
				    <div id="reportrange" class="pull-left" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 102%">
						 <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
						 <span></span> <b class="caret"></b>
					</div>
				</div>


				<div class="col-sm-2 ">
				<select id="desg" style="width:158px;height:35px;position:relative;right:10px;" class="">
				           <option value="0">--All Designations--</option>
							<?php
							$data= json_decode(getAllDesg($_SESSION['orgid']));
							for($i=0;$i<count($data);$i++){
								echo '<option  value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
							}?>
				</select>
				</div>


				<!--<div class="col-sm-2">
				<select id="deprt" style=" width:158px;height:35px;position:relative; right:10px;" class="">
							    <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--All Departments--</option>
								<?php
								$data= json_decode(getAllDept($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++){
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								}?>
				</select> 
				</div>-->


				<div class="col-sm-2">
                <select id="shift" style=" width:158px;height:35px;position:relative; right:10px;" class="">
							     <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All Shifts--</option>
								<?php
								$data= json_decode(getAllShift($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.' ('.substr(($data[$i]->TimeIn),0,5).' - '.substr(($data[$i]->
								TimeOut),0,5).')</option>';
								?>
				</select>
				</div>


				<div class="col-sm-2">			
				<!-- <select id="empl" style="width:158px;height:35px;position:relative; right:7px;" class="">
							   <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All Employees--</option>
								<?php
								$data= json_decode(getAllemp($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++){
									echo '<option  value='.$data[$i]->id.'>'.$data[$i]->FirstName.'  '.$data[$i]->LastName.'</option>';
								}?>
				</select> -->
				<select id="empl" style="width:158px;height:35px;position:relative; right:7px;" class="">
							   <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All Employees--</option>
								<?php
								$data= json_decode(getDeptEmpName($_SESSION['departid']));
								for($i=0;$i<count($data);$i++){
								echo '<option  value='.$data[$i]->id.'>'.$data[$i]->FirstName.'  '.$data[$i]->LastName.'</option>';}
								?>
				</select>
				</div>


				<div class="col-sm-1">
						<button class="btn btn-success pull-left" style="position:relative;margin-top:-3px;margin-left:5px;" id="getAtt" ><i class="fa fa-search"></i></button>
				</div>

				</div>
								 <div id="typography">
									<div class="title">
											<div class="row">
												<div class="col-md-4">
												</div>
											
												</div>
											
									</div><br>
									
										<div class="row" style="overflow-x:scroll;">
										<!--<h3 class="text-center"> Employee  Overtime Report</h3>-->
											<table id="example" class="display table" cellspacing="0" width="100%">
											<thead>
												<tr style="background-color:#008067;color:#ffffff;">
													<th >Employee Code</th>
													<th >Employee</th>
													<th >Date</th>
													<th>Visited Client</th>
												     <th>Visit In Image</th>
													<th >Visit In</th>
													<th>Location In</th>
													<th>Visit Out Image</th>
													<th >Visit Out</th>
													<th>Location Out</th>
													<th >Visit Hours</th> 
													<th >Remarks</th>
													<?php foreach($addonlive as $row){
													if($row->addon_livelocationtracking==1){?>
													<th >Action</th>
													<?php }else{?>
													<th ></th>
													<?php } } ?>
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
   <div class="col-md-3 t2" id="sidebar" style=" margin-top:100px;"></div>
        <footer class="footer">
          <div class="container-fluid" style="" >
            <nav class="pull-left">
            </nav>
           <!-- <p class="copyright pull-right" style="padding-right:35px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a>
            </p>-->
      <a href="http://www.ubitechsolutions.com/" target="_blank" >
          <p class="copyright pull-right" style="padding-right:25px;padding-top:0px;" >
          Copyright &copy;<script>document.write(new Date().getFullYear())</script>
          Ubitech Solutions. All rights reserved.
          </p>
        </a>
          </div>


</div>
</div>
<!---modal close edit employee--->



<!------image modal----->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview"  style="width:550px!important;height:500px!important;" >
      </div>
    </div>
  </div>
</div>
		<!----------->










<!-----delete employee start--->
<div id="delEmp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Delete Employee</h4>
      </div>
      <div class="modal-body">		
		<form>
			<input type="hidden" id="del_id" />
			<div class="row">
				<div class="col-md-12">
					<h4><span id="na"></span> Will no longer be available, are you sure want to delete this Record ?</h4>
				</div>
			</div>
			<div class="clearfix"></div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="delete"  class="btn btn-warning">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-----delete employee close--->
 <!--<div class="modal-footer">-->
           <!-- <button type="button" id="showgoogle"  class="btn btn-danger">Show Google Map</button>-->
      <!--<a href="#"  class="btn btn-success" id="showgoogle" >Open In Google Maps</a>
      <a href="#"  id="creategeo" class="btn btn-success"  >Create GeoFence</a>-->
            <!--<button type="button" class="btn btn-danger" >Create GeoFence</button>-->
    <!--</div>-->

</body>
  <div id="mySidenav" class="pull-right sidenav" style="background-image:url(<?=URL?>../assets/img/bg7.jpg);background-repeat:no-repeat;">
            <div class="helpHeader"><span >Help</span><a style="color:black;" href="javascript:void(0)" class="closebtn text-right" onclick="closeNav()">x </a></div>
            <div id="sidenavData" class="sidenavData">
            </div>
          </div>

            <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
   <script src="<?=URL?>../assets/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>

  

  <script>
            function openNav() 
            {
              document.getElementById("mySidenav").style.width = "360PX";
              $('#sidenavData').load('<?=URL?>help/helpNav',{'pageid' :'Punchvisit'});  
            }
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
  
  </script>
  <script type="text/javascript">
	
    	$(document).ready(function(){
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
			var table= $('#example').DataTable({
				
				
				
				 	order: [[ 2, 'desc' ],[1,'asc']],
				//"scrollX": true,
				 dom: 'Bfrtip',
				  "bSort": false,
		       buttons: [
						
						'pageLength',
						{
						extend:'csv',
						exportOptions: {
                // columns: ':visible',
                        columns: [ 0, 1, 2, 3, 5, 6, 8, 9, 10, 11 ],
                // stripHtml: false,
                        }
						},

						{
							
						extend:'excel',
						exportOptions: {
                // columns: ':visible',
                        columns: [ 0, 1, 2, 3, 5, 6, 8, 9, 10, 11 ],
                // stripHtml: false,
                        }
						},

						'copy',

						{
                        extend: 'print',
            // autoPrint: false,
                         title: '',
                         exportOptions: {
                // columns: ':visible',
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ],
                        stripHtml: false,
                        },
                     repeatingHead:{
                     logo: '<?=URL?>../assets/img/newlogo.png ',
                     logoPosition: 'center',
                     logoStyle: 'height:100px;width:130px;',
                     title: 'Punched Visit Report of '+org+' Dated '+isoDateString+'',
                
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
        'colvis',
					],
					
				"bDestroy": false, // destroy data table before  
				
				"contentType": "application/json",
				"ajax": "<?php echo URL;?>departmenthead/punchedLocations",
				"columnDefs": [
					{ "className":'dt-center', "visible": false, "targets":[ 0 ]}
					,
					
				],
				 
				"columns": [
					{ "data": "code" },
					{ "data": "name" },
					{ "data": "date" },
					{ "data": "client" },
					{ "data": "entryimg" },
					{ "data": "tif" },
					{ "data": "locationin" },
					{ "data": "exitimg" },
					{ "data": "tof" },
				    { "data": "locationout" },
					{ "data": "total" },
					{ "data": "comments"},
					{ "data": "action"},
					],
					"drawCallback": function ( settings ) {
					var api = this.api();
					var rows = api.rows( {page:'current'} ).nodes();
					var last=null;
		 
					api.column(1, {page:'current'} ).data().each( function ( group, i ){
						if ( last !== group ) {
							$(rows).eq( i ).before(
								'<tr class="group"><td bgcolor="#d59ff2" colspan=12><b>'+group+'</b> <b> &nbsp; &nbsp; </b></td></tr>'
							);
							last = group;
						}
					});
				}
			}); 
	
		

////---------date picker
			var minDate = moment();
			var start = moment();
			var end = moment();
			function cb(start, end) {
				$('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
			}
			$('#reportrange').daterangepicker({
				maxDate:minDate,
				//minDate:'-4M',
				minDate : moment().subtract(4 , 'month').startOf('month'),
				startDate: start,
				endDate: end,
				ranges: {
				   'Today': [moment(), moment()],
				   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				   'Last 7 Days': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
      			   'Last 30 Days': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
				   'This Month': [moment().startOf('month'), moment().endOf('month')],
				   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, cb);
			cb(start, end);
////---------/date picker






		//$('#reportrange','#shift').on('DOMNodeInserted',function(){ //alert();
		$('#getAtt').click(function(){
			var range=$('#reportrange').text();
			var shift=$('#shift').val();
			var deprt=$('#deprt').val();
			var empl=$('#empl').val();
			var desg=$('#desg').val();
			$('#example').DataTable( {
						order: [[ 2, 'desc' ],[1,'asc']],
					//"scrollX": true,
					 dom: 'Bfrtip',
					 "bSort": false,
					buttons: [
						
						'pageLength',{
							extend:'csv',
							exportOptions: {
                // columns: ':visible',
                columns: [ 0, 1, 2, 3, 5, 6, 8, 9, 10, 11 ],
                // stripHtml: false,
            }

						},{
							extend:'excel',
							exportOptions: {
                // columns: ':visible',
                columns: [ 0, 1, 2, 3, 5, 6, 8, 9, 10, 11 ],
                // stripHtml: false,
            }

						},'copy',

						{
            extend: 'print',
            // autoPrint: false,
            title: '',
            exportOptions: {
                // columns: ':visible',
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ],
                stripHtml: false,
            },
            repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
                logoStyle: 'height:100px;width:130px;',
                title: 'Punch Visit Report of '+org+' Between '+range+' ',

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
        'colvis',

						
					],
					 "bDestroy": true,// destroy data table before reinitializing
					
					"contentType": "application/json",
					"ajax": "<?php echo URL;?>departmenthead/punchedLocations?date="+range+"&shift="+shift+"&deprt="+deprt+"&empl="+empl+"&desg="+desg,
					"columnDefs": [
					{ "className":'dt-center', "visible": false, "targets": [ 0 ]},
			
				],
				
					
					"columns": 
					[	
						{ "data": "code" },
						{ "data": "name" },
						{ "data": "date" },
						{ "data": "client" },
						{ "data": "entryimg" },
						{ "data": "tif" },
						{ "data": "locationin" },
						{ "data": "exitimg" },
						{ "data": "tof" },
						{ "data": "locationout" },
						{ "data": "total" },
						//{ "data": "device" },
						{ "data": "comments"},
						{ "data": "action"},
					],
					"drawCallback": function (settings) {
					var api = this.api();
					var rows = api.rows( {page:'current'} ).nodes();
					var last=null;
		 
					api.column(1, {page:'current'} ).data().each( function ( group, i ) {
						if ( last !== group ) {
							$(rows).eq( i ).before(
								'<tr class="group"><td bgcolor="#d59ff2" colspan=12><b>'+group+'</b></td> <b> &nbsp; &nbsp; </b></tr>'
							);
							last = group;
						}
					} );
				}
				} );
			});
			
				
			
			function createpdf()
		  {
		 // console.log($val)
		 
			var pdf = new jsPDF('p', 'pt', 'a3');
			var options = {
					 pagesplit: true,
					 background:'#fff'
				};
			
			pdf.addHTML($("#printsection")[0], options, function()
			{
				//console.log(pdf)	
				pdf.save("absent_report.pdf");
			});
		  }
			
			
			
			$(document).on("click", ".delete", function () {
				
				$('#del_id').val($(this).data('id'));
				$('#na').text($(this).data('name'));
			});
			$(document).on("click", "#delete", function () {
				var id=$('#del_id').val(); 
				$.ajax({url: "<?php echo URL;?>userprofiles/deleteUser",
						data: {"sid":id},
						success: function(result){
							if(result == 1){
								$('#delEmp').modal('hide');
								 doNotify('top','center',2,'User deleted Successfully.'); 
								 table.ajax.reload();  
					        }    
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
			});
			
		
		
		////image pop up//////////////
		$(document).on("click", ".pop", function ()
			{
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
			});	
		
		
		
		
		
		
		
		
		<!-- This code for when add the country (start)-->
		$(document).on("change", "#country", function () {
				var country = $(this).val();
				$.ajax({url: "<?php echo URL;?>userprofiles/getCity",
						data: {"country":country},
						success: function(result)
						{
							var result=JSON.parse(result);
							 var i = 0;
							for(i=0; i<result.length; i++){
								$('#city').append('<option value="' + result[i].Id + '">' + result[i].Name + '</option>');	
							}		   				
						 },
						error: function(result)
						 {
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})
			<!-- This code for when add  the country (end)-->
			
			
			
			<!-- This code for when edit  the country (start)-->
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
			<!-- This code for when edit  the country (end)-->
			
	$('#create_pdf').on('click',function(){
	$('body').scrollTop(0);
	createPDF();
});
	$(document).on("change", "#divi", function () {
				var divi = $(this).val();
				$.ajax({url: "<?php echo URL;?>admin/getAlldiv",
						data: {"divi":division},
						success: function(result){
							var result=JSON.parse(result);
							 var i = 0;
							for(i=0; i<result.length; i++){
								$('#divi').append('<option value="' + result[i].Id + '"  >' + result[i].Name + '</option>');	
							}		   				
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})
	
	
	});		
	
	</script>
	<script>
		 $('#showgoogle').click(function(){
       var latitid=$('#latitid').val();
       window.open("http://maps.google.com/?q="+latitid);
       //$("a").attr("href", "http://maps.google.com/?q="+latitid);
       //$("a").attr("target", "_blank");
       $('#locationmodal').modal('hide');  
       
    });
	</script>
  <script>
    $(document).ready(function(){
    $('.toggle-sidebar').click(function(){
    $("#sidebar").toggleClass("collapsed t2");
    $("#content").toggleClass("col-md-9");
    $("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'Punchvisit'}); 
    });
    
    });
  </script>

</html>
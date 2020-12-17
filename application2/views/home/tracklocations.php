<!doctype html>
<html lang="en">
<head>
	 <?php   $this->load->view('menubar/allnewcss');
	  ?>
	<style>
		

       
		
		
		#content {
			
			-webkit-transition: width 0.3s ease;
			-moz-transition: width 0.3s ease;
			-o-transition: width 0.3s ease;
			transition: width 0.3s ease;
		}
		#content .btn-group {
			margin-bottom: 10px;
		}
		.col-md-9 .width-12,
		.col-md-12 .width-9 {
			display: none; /* just hiding labels for demo purposes */
		}
		
		.collapsed {
			display: none; /* hide it for small displays */
		}
		@media (min-width: 992px) {
			.collapsed {
				display: block;
				margin-right: -25%; /* same width as sidebar */
			}
		}
		.t2{display:none;}
		
		table.dataTable thead th {
        border-top: none;
            color: #9FA2B4;
        font-size: 15px;
        font-style: 'Poppins';
		font-weight:300;
		
    }
	 table.dataTable tbody {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        color: #3f424c;
		
    }
	 body {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }
	table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
    padding-right: 50px;
	}
	
	</style>
</head>
<body>
	
		 <?php 
	   $data['pageid']=3.15;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         ?>
	    <main class="main">
			
			
			<div class="content" id="content">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-12">
	                      
	                          
	                             
									
	                         
	                            <div class="card-content">
									<div id="typography">
										<div class="title">
											<div class="row">
												<div class="col-md-8">
												<h6>
												 <a href="<?php echo URL; ?>Attendance/allattendance" >
			   <img src="<?= URL ?>../assets/img/l-arrow.png" class="mb-1"></a><?php echo ' Visits by <b>'.$name.'</b> on <b>' .date("d-m-Y", strtotime($date)).'</b>'; ?></h6>
												</div>
												<div class="col-md-4">
											
											</div>
											
										</div>
							<?php //print_r($detail);?>			
										<div class="row">
											<table id="example" class="display table"  width="100%">
											  <thead>
                                             <tr>
                                                <th><b>S.No</b></th>
                                                
												
                                                <th><b>Client</b></th>
                                                
                                                <th><b>Visit In image</b></th>
                                                <th><b>Visit In</b></th>
                                                
                                               <!--<th><b>Visit In Location</b></th> -->
                                                <th><b>Visit Out image</b></th>
                                               
                                                
                                                <th><b>visit Out</b></th>
												
                                                
                                                <th><b>Visit Hours</b></th>
                                                <th><b>Remarks</b></th>
                                               
                                                
                                               
                                             </tr>
                                          </thead>
											<tbody>
												     
												
													<?php 
													
													 foreach ($detail as $details) { ?> 
													 	 
														  
													 <tr>

													
													
											
													 <td><?=  $details['sno']; ?></td>
													 <td> <?=  $details['client'];?> </td>

													  <td> <?= $details['inimg'];?> </td>

													    <td><?= $details['tif'];?></td>

													

													  <td><?= $details['otimg'];?></td>

													  <td><?= $details['tof'];?></td>

													


													<td>
														<?= $details['workhr'];?>
														 </td>
														
														 <td><?= $details['desc'];?></td>
														 </tr>
														<?php } ?> 
												

												
											</tbody>

											<tfoot style="display:none">
												<tr>
													
													<td>Name  <?php echo $name; ?></td>
													
													<td>Time In:  <?php echo $ti; ?></td>
											
													<td>Time Out:    <?php echo $to; ?> </td>
												
													<td>Total  Worked Hours:<?php echo $wh; ?> </td>

													

													
													
													
											
													
												</tr>
											</tfoot>
<tfoot>
												<tr>
													
													<td colspan="3"><b>Name:&nbsp&nbsp</b><?php echo $name;?></td>
													
													<td colspan="2"><b>Time In:&nbsp&nbsp</b><?php echo $ti;?></td>
											
													<td colspan="2" ><b>Time Out:&nbsp&nbsp</b><?php echo $to;?></td>
												
													<td colspan="3"><b>Total  Worked Hours:&nbsp&nbsp</b><?php echo $wh;?></td> 

													
													
												</tr>
											</tfoot>
										</table>
										</div>
										
										 
										<!-- ===== -->
									</div>

	                            </div>

	                        </div>
	                        <h5 style="text-align:left;padding-left: 8px;margin-top:0px"> Location Visited </h5>
							<div id="map" style="height:450px !important;margin-top:10px;"></div>
	                    
	                </div>

	            </div>
	        </div>
	        </div>

			
		</main>
	

<!------image modal ----->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style="height: 50%;width: 55%;margin-left: 140px;"> 
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<form id="imgE" method="POST" enctype="multipart/form-data" name="myformE">
		<input type="hidden" id="imgid">
        <img src="" class="imagepreview" style="width:100%!important;" id="profileimg" >
      </div>
	
	   </form>
    </div>
  </div>
</div>
		<!----------->
</body>

	 <?php   $this->load->view('menubar/allnewjs');
	  ?>

	<script>
		$(document).ready(function(){
			$('#example').DataTable({
				 dom: 'Bfrtip',
				 bFilter: false,
				 buttons: [
				              
						  ],
					  	  
			
		"language": {"emptyTable":"No record found"},
                                     });
	
		$('.toggle-sidebar').click(function(){
		$("#sidebar").toggleClass("collapsed t2");
		$("#content").toggleClass("col-md-9");
		$("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'attendanceH'});	
		});
	
		});
	</script>
	<script>
              var data = <?php echo json_encode($detail);  ?>;
              // console.log(data);
              // alert(data);
              

          function initMap() {
  if(data.length <= 0)
  {
  $("#map").hide();
  return false;
  }


			var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: new google.maps.LatLng(data[0]['latit_out'], data[0]['longi_out']),
			// center : {lat:26.196817 , lng:78.1970886},
			mapTypeId: google.maps.MapTypeId.ROADMAP
			});


				
			var infowindow = new google.maps.InfoWindow({});

			var marker, i;

			for (i = 0; i < data.length; i++) {
				// console.log(data[i].inloc);
			// for timein location
			marker = new google.maps.Marker({
			position: new google.maps.LatLng(data[i]['latit'], data[i]['longi']),
			// position : {lat:26.196817 , lng:78.1970886},
			map: map,
			icon: {
			url:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+(i+1)+'|FF0000|000000',
			scaledSize: new google.maps.Size(40, 40),
			}
			//icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+(i+1)+"
			// (in)|FF0000|000000",
			});
		google.maps.event.addListener(marker, 'click', (function (marker, i) {
		return function ()
		{
		infowindow.setContent(data[i]['location']);
		infowindow.open(map, marker);
		}
				})(marker, i));
//alert(data[i]['latit'], data[i]['longi']);
// for timeout location
		/*marker = new google.maps.Marker({
		position: new google.maps.LatLng(data[i]['latit_out'], data[i]['longi_out']),
		map: map,
		icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+(i+1)+'|FE6256|000000'
//icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+(i+1)+"
// (out)|FF0000|000000",
		});
		google.maps.event.addListener(marker, 'click', (function (marker, i) {
		return function () {
		infowindow.setContent(data[i]['location_out']);
		infowindow.open(map, marker);
		}
		})(marker, i));*/
}
}
</script>
   
   
    <script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&libraries=places&callback=initMap"
         >
         	
         </script>

         <script>
         	$(document).on("click", ".pop",function ()
			{
				
				$('#imgid').val($(this).data('id'));
			//	$('#profileimg').val($(this).data('enimage'));
			//	alert($(this).data('enimage'));
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
				$('#imagemodal').modal('show');   
			});
	
	$('#setprofile').click(function(){
      var id=$('#imgid').val();
	 // alert($('#profileimg').prop("files")[0]);
	 var imgg=$('#profileimg').attr('src');
	
		var  formdata = new FormData();
		  formdata.append('profimg',imgg);
		  formdata.append('id',id);
    
      $.ajax({
		processData: false,
		contentType: false,
		url: "<?php echo URL;?>admin/editimg",
    	data: formdata,
		datatype:"json",
		type:"post",
    	success: function(result){
    		if(result==1)
			{
    			datestring='&date='+$('#reportrange').text();
    			doNotify('top','center',2,'Set as Profile Picture');
				$('#imagemodal').modal('hide');  
    			 $('#example').DataTable().ajax.reload();
    		}
			else
			{
    			doNotify('top','center',4,'can not be updated');
    		}
    		
    	 },
    	error: function(result)
			{
				doNotify('top','center',4,'Unable to connect API');
			}
      });
    }); 
	</script>
</html>

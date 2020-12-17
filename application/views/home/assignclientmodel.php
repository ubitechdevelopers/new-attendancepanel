<form id="geolocationF">
			<input type="hidden" value="<?php echo $empid; ?>" id="empid12">
			<span id="ideclient"></span>
			 <div class="row">
                            <div class="col-md-7">
					<div class="form-group label-floating">
						<label class="control-label" style="font-size:14px;">Client<span class="red">*</span></label>
						 <?php $empid2 ?>
						
								<select id="clientlist12" class="form-control selectpicker" multiple data-live-search="true" style="width:100%;" data-hide-disabled="true" data-actions-box="true" > 

								<?php

								foreach ($name as $row )
									{
										echo "<option value='".$row['id']."'>".$row['Company']."</option>";
									}
								?>
							
							  
							  	  </select>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		
		</form>
     
     <div class="mt-4" style="float:right;">
      	<button type="button" id="updateclientforemp" style="width:8rem;" class="btn btn-success">Assign</button>
        <button type="button" class="btn btn-light" style="width:8rem;" data-dismiss="modal">Close</button>
     </div>
		



<script type="text/javascript">
	$('#clientlist12').selectpicker();
</script>


	
       <!-- <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Geo Location</a>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="geolocationF">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group label-floating">
                                    <label class="control-label">Geo Center<span class="red">*</span></label>
                                    <select id="geolocationS" class="form-control selectpicker" style="width:100%;"
                                        multiple data-hide-disabled="true" data-live-search="true"
                                        data-actions-box="true">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="right mt-4">
                        <button type="button" id="resetgeolocation" class="btn btn-light bttn" data-dismiss="modal"
                            style="color: grey;">Close</button>
                        &nbsp;&nbsp;
                        <button type="button" id="savegeolocation" class="btn btn-success bttn">Save</button>
                        <!-- </div>
                        </div> -->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" id="savegeolocation" class="btn btn-success">Save</button>
                  <button type="button" id="resetgeolocation" data-dismiss="modal" class="btn btn-default">Close</button>
                  </div>-->
            </div>
        </div>
    </div>	

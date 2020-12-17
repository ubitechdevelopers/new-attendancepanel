<form id="geolocationF">
			<input type="hidden" value="<?php echo $empid; ?>" id="empid12">
			<span id="ideclient"></span>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" style="font-size:14px;">Client<span class="red">*</span></label>
						 <?php $empid2 ?>
						
								<select id="clientlist12" class="form-control selectpicker" multiple data-live-search="true" data-hide-disabled="true" data-actions-box="true" > 

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
		
		
     
      <div class="modal-footer">
      	<button type="button" id="updateclientforemp" class="btn btn-success">Assign</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
		</form>



<script type="text/javascript">
	$('#clientlist12').selectpicker();
</script>


		

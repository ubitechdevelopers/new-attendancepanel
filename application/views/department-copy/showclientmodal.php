<form id="FromE" >
		<input type="hidden" id="ide" />
			<div class="row">
				<table class="table table-border table-striped">

					 <tr>
					    <th>Client</th>
					    <th>Action</th>
					 </tr>
					 <?php foreach($name as $row){?>
					 <tr>
						<td><?php echo $row['Name']; ?></td>
					    <td><?php echo $row['action']; ?></td>
					 </tr>
					 <?php } ?>
					 

					
				</table>
			</div>
			
			<div class="clearfix"></div>
		
		
     
      <div class="modal-footer">
        <!--<button type="button" id="saveE"  class="btn btn-success">Update</button>-->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
<!--   Core JS Files   -->

<?php  $check = $this->uri->segment(1); 
	if($check=="Upgrade" || $check=="buy"){?>
	
	<script src="<?=URL?>../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	
	
	<!--add by sohan some special case --->
	<script src="<?=URL?>../assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?=URL?>../assets/js/datatables/dataTables.responsive.min.js" type="text/javascript"></script>
	<script src="<?=URL?>../assets/js/material.min.js" type="text/javascript"></script>	
	<!--  Charts Plugin -->
	<script src="<?=URL?>../assets/js/chartist.min.js"></script>
    <script src="<?=URL?>../assets/js/canvasjs.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="<?=URL?>../assets/js/bootstrap-notify.js"></script>
	<!--Google Maps Plugin-->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
	<!-- Material Dashboard javascript methods -->
	<script src="<?=URL?>../assets/js/material-dashboard.js"></script>
	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?=URL?>../assets/js/demo.js"></script>
	<!--my js-->
	<script src="<?=URL?>../assets/js/custom.js" type="text/javascript"></script>
	<!---date picker-->
	<script src="<?=URL?>../assets/js/jquery-ui.js"></script>
	
	
	
	<?php }else{ ?>
	<script src="<?=URL?>../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	
	<script src="<?=URL?>../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--add by sohan some special case --->
	<script src="<?=URL?>../assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?=URL?>../assets/js/datatables/dataTables.responsive.min.js" type="text/javascript"></script>
	<script src="<?=URL?>../assets/js/material.min.js" type="text/javascript"></script>	
	<!--  Charts Plugin -->
	<script src="<?=URL?>../assets/js/chartist.min.js"></script>
    <script src="<?=URL?>../assets/js/canvasjs.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="<?=URL?>../assets/js/bootstrap-notify.js"></script>
	<!--Google Maps Plugin-->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
	<!-- Material Dashboard javascript methods -->
	<script src="<?=URL?>../assets/js/material-dashboard.js"></script>
	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?=URL?>../assets/js/demo.js"></script>
	<!--my js-->
	<script src="<?=URL?>../assets/js/custom.js" type="text/javascript"></script>
	<!---date picker-->
	<script src="<?=URL?>../assets/js/jquery-ui.js"></script>
	
	<?php } ?>
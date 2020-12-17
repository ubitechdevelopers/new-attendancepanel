<?php
		$this->load->view('department/loadcss');			
		$this->load->view('department/loadjs');
		?>
<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
				<?php 
				 $link =  $_SERVER['HTTP_HOST']; 
				  $orgid = $_SESSION['orgid'];
				  $q1 = $this->db->query("SELECT * From WhiteLabeling where website = '$link' And OrganizationId = '$orgid' ");
				//var_dump($this->db->last_query());
				//$data =array();
				foreach($q1->result() as $row){
			
					$website = $row->website;
					
					
				}
				if($orgid != '' && $website == "ubisales.zentylpro.com"){
				?>
				<a class="navbar-brand" href="#"><strong>Supervisor Portal</strong></a>
				<?php }elseif($orgid != ''){?>
				<a class="navbar-brand" href="#"><strong>Supervisor Panel</strong></a>
				<?php }else{?>
				<a class="navbar-brand" href="#"><strong>Supervisor Panel</strong></a>
				<?php } ?>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<!-- <li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>-->
								<!-- </a>
							</li>  -->
					<!--		<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
							</li>
					-->		<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
								   <?php if(isset($_SESSION['deptname']))echo $_SESSION['deptname']; else redirect(URL."departmenthead/dashboard");?>
		 						</a>
								<ul class="dropdown-menu">
									<!-- <li><a href="#">My Profile</a></li> -->
									<li><a href="<?= URL ?>departmenthead/changePassword">Change Password</a></li>
									<li><a href="<?=URL?>departmenthead/logout">Logout</a></li>
								</ul>
							</li>
						</ul>

						
					</div>
				</div>
			</nav>
	<script>		
			</script>
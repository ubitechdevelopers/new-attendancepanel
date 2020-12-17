	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?=URL?>../assets/css/bootstrap.min.css" rel="stylesheet" />
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--  Material Dashboard CSS    -->
    <link href="<?=URL?>../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=URL?>../assets/css/demo.css" rel="stylesheet" />
    <link href="<?=URL?>../assets/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?=URL?>../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=URL?>../assets/css/css.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?=URL?>../assets/css/jquery-ui.css">
    <!--     Fonts and icons     
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>-->
	
	
	
	<?php 
	$orgid = $_SESSION['orgid'];
	 
    $link =  $_SERVER['HTTP_HOST']; 
        //echo $link;
		$q1 = $this->db->query("SELECT * From WhiteLabeling where website = '$link' And OrganizationId = '$orgid' ");
		//var_dump($this->db->last_query());
		//$data =array();
		foreach($q1->result() as $row){
			
			$color = $row->colorSidebar;
			$color1 = $row->colorTitle;
			$color2 = $row->colorTableth;
			$color3 = $row->colorBtn;
			$color4 = $row->colormodal;
			$color5 = $row->modalshadow;
			//$color6 = $row->colorCP;
			//var_dump($color3);
		}
		
	if($orgid != ''){
	?>
	<link href="<?=URL?>../assets/css/material-dashboard.css" rel="stylesheet"/>
	<style>
	.sidebar[data-color="green"] .nav li.active a,
    .off-canvas-sidebar[data-color="green"] .nav li.active a {
    background-color: <?php echo $color ?>;
    box-shadow: 0 12px 20px -10px rgba(76, 175, 80, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(76, 175, 80, 0.2);
    }
	.card [data-background-color="green"] {
	  background: linear-gradient(60deg, <?php echo $color1 ?> );
	  box-shadow: 0 12px 20px -10px rgba(76, 175, 80, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(76, 175, 80, 0.2);
	}
	table tr:first-child th {
		background-color:<?php echo $color2 ?>!important;
		color:#ffffff;
	}
	.btn.btn-danger,
	.navbar .navbar-nav > li > a.btn.btn-danger {
	  box-shadow: 0 2px 2px 0 rgba(244, 67, 54, 0.14), 0 3px 1px -2px rgba(244, 67, 54, 0.2), 0 1px 5px 0 rgba(244, 67, 54, 0.12);
	}
	.btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger:focus, .btn.btn-danger:active, .btn.btn-danger.active, .btn.btn-danger:active:focus, .btn.btn-danger:active:hover, .btn.btn-danger.active:focus, .btn.btn-danger.active:hover, .open > .btn.btn-danger.dropdown-toggle, .open > .btn.btn-danger.dropdown-toggle:focus, .open > .btn.btn-danger.dropdown-toggle:hover,
	.navbar .navbar-nav > li > a.btn.btn-danger,
	.navbar .navbar-nav > li > a.btn.btn-danger:hover,
	.navbar .navbar-nav > li > a.btn.btn-danger:focus,
	.navbar .navbar-nav > li > a.btn.btn-danger:active,
	.navbar .navbar-nav > li > a.btn.btn-danger.active,
	.navbar .navbar-nav > li > a.btn.btn-danger:active:focus,
	.navbar .navbar-nav > li > a.btn.btn-danger:active:hover,
	.navbar .navbar-nav > li > a.btn.btn-danger.active:focus,
	.navbar .navbar-nav > li > a.btn.btn-danger.active:hover, .open >
	.navbar .navbar-nav > li > a.btn.btn-danger.dropdown-toggle, .open >
	.navbar .navbar-nav > li > a.btn.btn-danger.dropdown-toggle:focus, .open >
	.navbar .navbar-nav > li > a.btn.btn-danger.dropdown-toggle:hover {
	  background-color: <?php echo $color3 ?>;
	  color: #FFFFFF;
	
		  
	}
	.btn.btn-success,
	.navbar .navbar-nav > li > a.btn.btn-success {
	  box-shadow: 0 2px 2px 0 rgba(244, 67, 54, 0.14), 0 3px 1px -2px rgba(244, 67, 54, 0.2), 0 1px 5px 0 rgba(244, 67, 54, 0.12);
	}
	.btn.btn-success, .btn.btn-success:hover, .btn.btn-success:focus, .btn.btn-success:active, .btn.btn-success.active, .btn.btn-success:active:focus, .btn.btn-success:active:hover, .btn.btn-success.active:focus, .btn.btn-success.active:hover, .open > .btn.btn-success.dropdown-toggle, .open > .btn.btn-success.dropdown-toggle:focus, .open > .btn.btn-success.dropdown-toggle:hover,
	.navbar .navbar-nav > li > a.btn.btn-success,
	.navbar .navbar-nav > li > a.btn.btn-success:hover,
	.navbar .navbar-nav > li > a.btn.btn-success:focus,
	.navbar .navbar-nav > li > a.btn.btn-success:active,
	.navbar .navbar-nav > li > a.btn.btn-success.active,
	.navbar .navbar-nav > li > a.btn.btn-success:active:focus,
	.navbar .navbar-nav > li > a.btn.btn-success:active:hover,
	.navbar .navbar-nav > li > a.btn.btn-success.active:focus,
	.navbar .navbar-nav > li > a.btn.btn-success.active:hover, .open >
	.navbar .navbar-nav > li > a.btn.btn-success.dropdown-toggle, .open >
	.navbar .navbar-nav > li > a.btn.btn-success.dropdown-toggle:focus, .open >
	.navbar .navbar-nav > li > a.btn.btn-success.dropdown-toggle:hover {
	  background-color: <?php echo $color3 ?> !important;
	  color: #FFFFFF;
	
		  
	}
	.modal-content .modal-header {
    background-color: <?php echo $color4 ?>;
    box-shadow: inset -2px -2px 20px 0px <?php echo $color5 ?>;
    color: white;
    }
	/* .card [data-background-color="orange"] {
	  background: linear-gradient(60deg, <?php echo $color6 ?>);
	  box-shadow: 0 12px 20px -10px rgba(255, 152, 0, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(255, 152, 0, 0.2);
	} */
	</style>
	
	<?php }else{?>
		
	<link href="<?=URL?>../assets/css/material-dashboard.css" rel="stylesheet"/>
	<style>
	.sidebar[data-color="green"] .nav li.active a,
    .off-canvas-sidebar[data-color="green"] .nav li.active a {
    background-color: #008067;
    box-shadow: 0 12px 20px -10px rgba(76, 175, 80, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(76, 175, 80, 0.2);
    }
	.card [data-background-color="green"] {
	  background: linear-gradient(60deg, #008067,#43a047 );
	  box-shadow: 0 12px 20px -10px rgba(76, 175, 80, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(76, 175, 80, 0.2);
	}
	table tr:first-child th {
		background-color: #008067;color:#ffffff;
	}
	.btn.btn-danger,
	.navbar .navbar-nav > li > a.btn.btn-danger {
	  box-shadow: 0 2px 2px 0 rgba(244, 67, 54, 0.14), 0 3px 1px -2px rgba(244, 67, 54, 0.2), 0 1px 5px 0 rgba(244, 67, 54, 0.12);
	}
	.btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger:focus, .btn.btn-danger:active, .btn.btn-danger.active, .btn.btn-danger:active:focus, .btn.btn-danger:active:hover, .btn.btn-danger.active:focus, .btn.btn-danger.active:hover, .open > .btn.btn-danger.dropdown-toggle, .open > .btn.btn-danger.dropdown-toggle:focus, .open > .btn.btn-danger.dropdown-toggle:hover,
	.navbar .navbar-nav > li > a.btn.btn-danger,
	.navbar .navbar-nav > li > a.btn.btn-danger:hover,
	.navbar .navbar-nav > li > a.btn.btn-danger:focus,
	.navbar .navbar-nav > li > a.btn.btn-danger:active,
	.navbar .navbar-nav > li > a.btn.btn-danger.active,
	.navbar .navbar-nav > li > a.btn.btn-danger:active:focus,
	.navbar .navbar-nav > li > a.btn.btn-danger:active:hover,
	.navbar .navbar-nav > li > a.btn.btn-danger.active:focus,
	.navbar .navbar-nav > li > a.btn.btn-danger.active:hover, .open >
	.navbar .navbar-nav > li > a.btn.btn-danger.dropdown-toggle, .open >
	.navbar .navbar-nav > li > a.btn.btn-danger.dropdown-toggle:focus, .open >
	.navbar .navbar-nav > li > a.btn.btn-danger.dropdown-toggle:hover {
	  background-color: orange;
	  color: #FFFFFF;
	}
	.modal-content .modal-header {
    background-color: #4caf50;
    box-shadow: inset -4px -17px 20px 0px #14730dde;
    color: white;
    }
	/* .card [data-background-color="orange"] {
	  background: linear-gradient(60deg, #0e0080, #72b0c7);
	  box-shadow: 0 12px 20px -10px rgba(255, 152, 0, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(255, 152, 0, 0.2);
	} */
	
	</style>
	<?php } ?>
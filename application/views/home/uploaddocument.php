<!doctype html>
<html lang="en">

<head>
  <?php 
         $this->load->view('menubar/allnewcss');
         ?>
    <title>Upload Document</title><style>
	.tertiary-button {

        padding: 5px 10px 5px 20px !important;
    }

    input[type=radio] {
        width: 1.2em;
        height: 1.2em;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        /* margin-left: 0.5em; */
        /* display: inline-block; */
        /* width: auto; 
                width: 130px;
                border: 2px solid #ccc;*/
        margin-top: -1rem;
        position: absolute;
        box-sizing: border-box;
        width: 3rem;
        border: none;
        border-radius: 4px;
        font-size: 16px;

        background-image: url('<?= URL ?>../assets/icons/u_search.svg');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        padding: 21px 20px 23px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    div.dataTables_wrapper div.dataTables_filter input:focus {
        width: 20rem;
        background-color: #e9f1e8;

    }

    div.dataTables_wrapper div.dataTables_filter
    /* text-align: right; */
    margin-left: -104% !important;
    }

    input[class="checkbox"] {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    #select_all {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    table.dataTable>thead .sorting:after {
        display: none;
    }

    table.dataTable>thead .sorting:before {
        display: none;
    }

    table.dataTable>thead .sorting:before,
    table.dataTable>thead .sorting:after,
    table.dataTable>thead .sorting_asc:before,
    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:before,
    table.dataTable>thead .sorting_desc:after,
    table.dataTable>thead .sorting_asc_disabled:before,
    table.dataTable>thead .sorting_asc_disabled:after,
    table.dataTable>thead .sorting_desc_disabled:before,
    table.dataTable>thead .sorting_desc_disabled:after {
        display: none;
    }

    element.style {}

    .page-item.active .page-link {
        z-index: 3;
        color: #000;
        background-color: #e1ffe0;
        border-color: #e1ffe0;
    }

    table.dataTable thead th {
        border-top: none;
        color: #9FA2B4;
        font-size: 0.85rem;
        font-style: 'Poppins';
		 font-weight:500;
    }

    table.dataTable tbody {
        font-size: 0.85rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #3f424c;
    }

    .dot-button {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: black;
        box-shadow: 0px 40px 0px black, 0px 80px 0px black;
    }

    a:hover {
        color: black !important;
        text-decoration: none !important;
    }

    .a {
        text-decoration: none;
        color: black;
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .subhead {
        font-size: 18px;
        color: #828282;
        display: flex;
        cursor: pointer;
        text-decoration: none;
        font-weight: 500 !important;
        font-family: 'Poppins', sans-serif;
    }

    .bttn {
        width: 9rem;
        font-weight: 500;
        font-size: 14px;
        height: 2.5rem;
    }

    .fit {
        width: 9rem;
        font-weight: 500;
        font-size: 14px;
        height: 2.5rem;
        margin-bottom: 5px;

    }

    .filtr {
        font-size: 0.8rem;
        font-weight: 500;
    }

    .btn1 {
        background-color: #D3D3D3;
        border: 1px solid;
    }

    /*b{
            font-weight: 700!important;
            }*/
    .right {
        float: right;
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    #heading2 .active5 a {
        border-bottom: 3.5px solid green;
        /*border-radius: 3%;*/
        width: 100%;
        text-decoration: none;
        height: auto;
        font-weight: bold;
        color: black;
    }

    .checkbox {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    .mobview {
        display: none;
    }

    @media only screen and (max-width: 600px) {

        /*.uu1{
                    display: none;
                }*/
        .mobview {
            display: unset !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            /*display: none;*/
            width: 13.5rem;
        }

        #columnv {
            display: none;
        }
    }

    table.dataTable tbody td:nth-child(1) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(2) {
        padding-top: 1.8rem !important;
    }
	
	table.dataTable tbody td:nth-child(3) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(5) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(6) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(7) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(8) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(9) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(10) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(11) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(12) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(13) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(14) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(15) {
        padding-top: 1.8rem !important;
    }

    .dataTables_length {
        margin-top: 10px;
    }

    .buttons-collection {
        border: none;
        position: fixed;
        /* top: -4rem;*/
        /* left: 44rem !important; */
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';

        font-weight: 600;

        color: #4B506D !important;
        font-size: 14px !important;
    }

    /*@media screen and (max-width: 1350px) {
               .buttons-collection{  left:31rem!important;}
            }*/
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {

        margin-left: 1.5rem;
    }

    .tertiary-button {

        padding: 5px 10px 5px 20px !important;
    }

    .adbtn {
        color: black !important;
    }

    /* .table th,
    .table td {
        padding: 1.75rem;
    } */
	
	.btn {
        margin-top: -1.9rem;
    }

    .btn1 {
        border: 1px solid;
        background-color: #D3D3D3;
        ;
    }

    .form-control {
        font-size: 0.9rem !important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin-top: -1rem !important;
    }

    div.sticky {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 1rem !important;
        z-index: 2000;
    }
.dt-buttons {
	float:right;
}
    div.sticky.active {
        background: white;
        /* box-shadow: 0px 5px 10px -5px #acacac;*/
        transition: ease-in-out .5s;
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 2.9rem !important;
        z-index: 2000;
    }
	
	.flex-wrap {
        /* top: 2rem; */
        /* margin-left: 38rem !important; */
		float:right;
    }
    

    
    .nohover:hover {
        background: white !important;
        border-color: white !important;
    }

    .nohover {
        background: white !important;
        border-color: white !important;
    }
  
     .dt-buttons a:nth-child(n):hover{
     background: #ECECEC;
	 
} 

.dt-button-collection .dropdown-menu{
	padding:0;
}
    </style>
</head>

<body>
    <?php
    $data['pageid']=1.3;
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar',$data);
        ?>
    <div class="main" style="width: 83.7%;">
	 <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 col-lg-10">
                <p style="margin-bottom: -10px; font-size:17px; font-family: poppins;" class="category"  ><a href="<?php echo URL; ?>Userprofiles/employeelist" ><img src="<?= URL ?>../assets/img/l-arrow.png" class="mb-1"></a>&nbsp<b>Upload Documnt
                        of</b> <?= getEmpName($id) ?><?php ?></p>
            </div>
            <div class="col-0 col-sm-6 col-md-3 col-lg-2"></div>
        </div>
		</div>
     <br>
	 
	 
		 <form action="/action_page.php">
		 <div class='row'>
			 <div class='col-md-9'>
			 <input type="file" id="myFile" name="filename">
			 
			 </div>
		 </div>
		  <div class='row'>
			 <div class='col-md-9'>
			 <input type="file" id="myFile" name="filename">
			 
			 </div>
		 </div>
		  <div class='row'>
			 <div class='col-md-9'>
			 <input type="file" id="myFile" name="filename">
			 
			 </div>
		 </div>
			  
			  
			  <input type="submit">
		</form>
	 
	 
	 



 <?php $this->load->view('menubar/footer'); ?>

    </div>


   
	

	
  <?php 
      $this->load->view('menubar/allnewjs');
   ?>

 
  
  
    
</body>

</html>
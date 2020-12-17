<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php 
         $this->load->view('menubar/allnewcss');
         ?>
    <style type="text/css">
    div.dataTables_wrapper div.dataTables_filter input {
        /* margin-left: 0.5em; */
        /* display: inline-block; */
        /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
        position: absolute;
        box-sizing: border-box;
        width: 3rem;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        background-image: url('<?=URL?>../assets/icons/u_search.svg');
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
        color: black;
        text-decoration: none;
    }

    .right {
        float: right;
        margin-top: 10px;
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
        width: 8rem;
    }

    .filtr {
        font-size: 0.8rem;
        font-weight: 500;
    }

    /*b{
         font-weight: 700!important;
         }*/
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
        font-weight: 700 !important;
        color: #0F0F0F;
        font-family: 'Poppins';
        font-style: normal;
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
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(2) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(3) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(5) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(6) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(7) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(8) {
        padding-top: 1.4rem !important;
    }

    @media (min-width:1900px) and (max-width:1550px) {
        table.dataTable tbody td:nth-child(8){
        text-align:center!important;
		
        }
    }

    table.dataTable tbody td:nth-child(9) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(10) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(11) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(12) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(13) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(14) {
        padding-top: 1.4rem !important;
    }

    table.dataTable tbody td:nth-child(15) {
        padding-top: 1.4rem !important;
    }

    @media only screen and (max-width: 568px) {
        #myModal {
            /*padding-left: 76px!important;*/
            width: 22.4rem !important;
        }
    }

    .dataTables_length {
        margin-top: 10px;
    }

    .buttons-collection {
        border: none;
        position: relative;
        /* top: -4.6rem;*/
        /* top: 20px; */
        /* left: 44rem; */
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';
        font-weight: 600;
        color: #4B506D !important;
        font-size: 14px !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {
        margin-left: 1.5rem;
        margin-top: -2rem !important;
    }

    .tertiary-button {
        padding: 5px 10px 5px 20px !important;
    }

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
        top: 2rem;
        /* margin-left: 38rem !important; */
		float:right;
    }
    /*@media (min-width:1010px) and (max-width:1260px)  {
    .flex-wrap{
        margin-left: 21.5rem !important;
		right:1rem!important;
        }
    }
    @media (min-width:1270px) and (max-width:1300px)  {
    .flex-wrap{
        margin-left: 30rem !important;
        }
    }
    @media (min-width:1420px) and (max-width:1460px)  {
    .flex-wrap{
        margin-left: 38rem !important;
        }
    }
 @media (min-width:1900px) and (max-width:1930px)  {
    .flex-wrap{
        margin-left: 66.5rem !important;
        }
    }
 @media (min-width:1520px) and (max-width:1550px) {
    .flex-wrap{
        margin-left: 46.5rem !important;
		
        }
    }
    @media (min-width:1580px) and (max-width:1610px)  {
    .flex-wrap{
        margin-left: 47rem !important;
        }
    }
    @media (min-width:1900px) and (max-width:1940px)  {
    .flex-wrap{
        margin-left: 65.5rem !important;
        }
    }*/

    
    .nohover:hover {
        background: white !important;
        border-color: white !important;
    }

    .nohover {
        background: white !important;
        border-color: white !important;
    }

    #row2{
        padding-left:15.5rem;
        float:right;		 
        position:absolute;
        right:0;
      
    }

    
  /*  @media (min-width:1010px) and (max-width:1100px)  {
        #row2{
        padding-left: 7.8rem !important;
		right:0.5rem!important;
        }
    }
    @media (min-width:1270px) and (max-width:1310px)  {
        #row2{
        padding-left: 13.8rem !important;
		right:0.5rem!important;
        }
		
    }
    @media (min-width:1420px) and (max-width:1460px)  {
        #row2{
        padding-left: 16.5rem !important;
		right:1rem!important;
        }
    }
 @media (min-width:1900px) and (max-width:1930px)  {
    #row2{
        padding-left: 25.5rem !important;
        }
    }
 @media (min-width:1520px) and (max-width:1550px) {
    #row2{
        padding-left: 17.5rem !important;
        }
    }
    @media (min-width:1580px) and (max-width:1610px)  {
        #row2{
        padding-left: 20rem !important;
        }
    }
    @media (min-width:1900px) and (max-width:1940px)  {
        #row2{
        padding-left: 25rem !important;
        }
    }*/

   
 .hover:hover {
        background-color:#ECECEC;"
        text-decoration: none;
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
	     $data['pageid']=5;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         ?>
    <main class="main" style="width: 83.7%;">
        <!-- <div class="container-fluid" style="padding: 0px;"> -->
        <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 5px;">


            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-7">
                    <div class="row" style="margin-left: 0px;">
                        <span class="active5"> <a href="<?= URL; ?>Clientsettings/index"
                                class="subhead">Client</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><a href="<?= URL; ?>Clientsettings/assignedclient" class="subhead">Assigned
                                Client</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><a href="<?=URL;?>Clientsettings/visit" class="subhead">Client
                                Visit</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
				 <div id="button-container" class="col-lg-7 col-md-7 col-xs-12">
                    <button class="tertiary-button" data-toggle="modal" data-target="#printemp">
                        <div> <span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt="">
                            </span> Import Client </div>
                    </button>
                    <button class="primary-button" data-toggle="modal" data-target="#myModal">
                            <div> <span class="side-item-icon"><img src="<?=URL?>../assets/icons/plus.svg" alt="">
                                </span>Add Client</div>
                        </button>
                </div>
                
            </div>


            <div class="container-fluid" style="padding: 0px; margin: 0px; margin-top: 2rem;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" id="next-container" style="display:none;">
                        <button class="btn btn1" data-toggle="modal" data-target="#assignemp"
                            onclick="updateClient();">ASSIGN EMPLOYEE</button>
                    </div>
                </div>
            </div>









        </div>

        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <!--  <th style="background-image:none"!important><input type="checkbox" id="select_all" name="select_all" value=""/></th>-->
                    <th style="background-image:none" !important><input type="checkbox" id="select_all"
                            name="select_all" value="" /></th>
                    <th>Company</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Zone</th>
                    <th style="text-align: center; ">Address</th>
                    <th style="text-align: center;">Description</th>
                    <!-- <th class="text-left" width="15%" 
                     style="background-image:none"!important>Action</th> -->
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
        </table>
        <?php  $this->load->view('menubar/footer');?>
    </main>
    <div class="modal fade" id="assignemp" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?= URL; ?>Clientsettings"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Assign Employee</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="geolocationF">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-center">Employee</label>
                            <div class="col-sm-9">
                                <select id="assignemptoclent" title="" class="form-control">
                                    <option value="0">-Employee-</option>
                                    <?php
                                 $data= json_decode(getAllemp1($_SESSION['orgid']));
                                 for($i=0;$i<count($data);$i++)
                                   echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                 ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="right">
                            <button type="button" id="resetgeolocation" data-dismiss="modal"
                                class="btn btn-light bttn fit">Close</button>
                            <button type="button" id="assignemployee" class="btn btn-success bttn fit">Save</button>
                        </div>
                    </form>
                    <!-- <div class="modal-footer">
                     </div> -->
                    <!--  <div class="clearfix"></div>
                     -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form id="add_dept" method="post">
        <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                                aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Add
                                Client</a></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                Company Name<span style="color:red">*</span><br>
                                <input type="text" class="form-control alpha" id="companyname" value="" name="Name"
                                    placeholder="Enter company Name" autocomplete="off">
                                <span id="companyname_error" class="error_form"></span>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                Contact Person<span style="color:red">*</span><br>
                                <input type="text" class="form-control alpha" id="contactperson" value="" name="Name"
                                    placeholder="Enter contact person" autocomplete="off">
                                <span id="contactperson_error" class="error_form"></span>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                Email<span style="color:red">*</span><br>
                                <input type="text" class="form-control" id="email" value="" placeholder="Enter Email " autocomplete="off">
                                <span id="email_error" class="error_form"></span>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                Contact Number<span style="color:red">*</span><br>
                                <input type="text" class="form-control numeric" id="contactnumber" value="" name="Name"
                                    placeholder="Enter contact no." autocomplete="off">
                                <span id="contactnumber_error" class="error_form"></span>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                Address<span style="color:red">*</span><br>
                                <input type="text" class="form-control alpha" id="address" value="" name="Name"
                                    placeholder="Enter Address " autocomplete="off">
                                <span id="address_error" class="error_form"></span>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                City<span style="color:red">*</span><br>
                                <input type="text" class="form-control alpha" id="city" value="" name="Name"
                                    placeholder="Enter city " autocomplete="off">
                                <span id="city_error" class="error_form"></span>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                Country<br>
                                <!--<input type="text" class="form-control" id="contry" value="" name="Name" placeholder="Enter country ">-->
                                <select id="country" title="" class="form-control " name="Name">
                                    <option value="0">-Select-</option>
                                    <?php
                                 $data= json_decode(getAllCountries());
                                 for($i=0;$i<count($data);$i++)
                                   echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                 ?>
                                </select>
                                <span id="country_error" class="error_form"></span>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                Zone<span style="color:red">*</span><br>
                                <input type="text" class="form-control alpha" id="zone" value="" name="Name"
                                    placeholder="Enter zone" autocomplete="off">
                                <span id="zone_error" class="error_form"></span>
                                <br>
                            </div>
                        </div>
                        Description<br>
                        <input type="text" class="form-control" id="description" value="" name="Name"
                            placeholder="Enter Description" autocomplete="off">
                        <span id="description_error" class="error_form"></span>
                        <br>
                        <br>
                        <div class="right">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;
                            <button type="button" id="save12" class="btn btn-success bttn fit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="response"></div>
        </div>
        </div>
    </form>
    <!-- asign employee-->
    <!--  <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         <button type="button" id="save12" class="btn btn-success">Save</button>
         </div> -->
    </div>
    <div id="response"></div>
    </div>
    </div>
    <!-- Delete client -->
    <div class="modal fade" id="delClient" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete
                            Client</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="del_id" />
                        <input type="hidden" id="count" />
                        <input type="hidden" id="count12" />
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Delete "<span id="ena"></span>"?</h6>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <br>
                    <br>
                    
                        <div class="btnnew" style="float:right;">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;
                            <button type="button" id="delete" class="btn btn-success bttn fit">Delete</button>
                        </div>
                    
                </div>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!-- end delete client -->
    <!-- change status -->
    <div class="modal fade" id="changestatus" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Change
                            Status</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 id="sname">
                    </h6>
                    <!--  <h6>Make </span>Inactive</h6> -->
                    <input type="hidden" id="count" />
                    <div class="clearfix"></div>
                    <br>
                    <div class="btnnew" style="float:right;">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;
                            <button type="button" id="savestatus" data-dismiss="modal"  class="btn btn-success bttn fit">Save</button>

                        </div>
                    
                </div>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!--status  -->
    <div class="modal fade" id="changestatusactive" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Change
                            Status</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 id="snameactive">
                    </h6>
                    <!--  <input type="hidden" id="count"/> -->
                    <div class="clearfix"></div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;
                            <button type="button" id="savestatusactive" class="btn btn-success bttn fit">Save</button>
                        </div>
                    </div>
                </div>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!--#######################################import ###################################################-->
    
    <!-- ##################################################################################################-->

    <div class="modal fade" id="printemp" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;Import Client</a></h5>
                    <!--<button type="button" class="close" style="color:rgba(54, 54, 54, 1);">
                     <img src="<?= URL ?>../assets/img/help.png" alt=""><a href="#" style="font-size:14px; font-family:poppins; color:black;">&nbsp;&nbsp;Help</a>
                     </button>-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="upload_csv" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-6 mt-3 mb-3">
                                <img src="<?= URL ?>../assets/icons/import_svg.svg" alt="">
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 mt-2 ml-4 mb-3">
                                <p style="font-size:20px; color: rgba(215, 215, 215, 1);">Drag or Upload CSV file to
                                    import Employee</p>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4 mt-3 mb-4">
                                <input type="file" id="fileUpload" accept=".csv" name="fileUpload"
                                    accept=".csv,text/csv" /><br>
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4 mt-3 ml-3 mb-3">
                                <button type="button" class="btn"
                                    style="width:12rem; font-weight: 700px;  color:rgba(122, 122, 122, 1);   border-color: #E5E5E5;"><a
                                        href="<?php echo IMGURL5; ?>../assets/Newjoinclient.csv"
                                        style="color:rgba(122, 122, 122, 1); ">Download Sample</a></button>
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4 mt-3 ml-5 mb-3 mb-3">
                                <button type="submit" id="btn1" class="btn btn-success btnfile call" style="width:8rem;"
                                    data-toggle="modal" data-dismiss="modal" data-target="#register-form"
                                    disabled>Import</button>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="response"></div>
        </div>
    </div>



    <!-- ##################################################################################################-->
    <div class="modal fade" id="register-form" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;Import Client</a></h5>
                    <!--<button type="button" class="close" style="color:rgba(54, 54, 54, 1);">
                     <img src="<?= URL ?>../assets/img/help.png" alt=""><a href="#" style="font-size:14px; font-family:poppins; color:black;">&nbsp;&nbsp;Help</a>
                     </button>-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="" action="" id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class=" form-label" for="name">Company</label>
                                    <select class="form-control services_list services0" id="company">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">Contact person</label>
                                    <select class="form-control services_list services1" id="cperson" name="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="address">Email</label>
                                    <select class="form-control services_list services2" id="email1" name="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="phone">City</label>
                                    <select class="form-control services_list services3" id="city1" name="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="phone">phone</label>
                                    <select class="form-control services_list services4" id="phone">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="department">Address</label>
                                    <select class="form-control services_list services5" id="address1">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label " for="zonecity">Zone</label>
                                    <select class="form-control services_list services6" id="zonecity">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label " for="date">Description</label>
                                    <select class="form-control services_list" id="desc">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="height:10rem;">
                   <button type="button" class="btn btn-light" data-dismiss="modal" style="width:8rem;"><a
                            href="<?= URL; ?>clientsettings/index">Cancel</a></button>
                    <button type="submit" class="btn btn-success" id="registers" style="width:8rem;">Save</button>
                </div>
            </div>
          
        </div>
    </div>
    <!--############################################import end###########################################-->



    <!--edit modal-->
    <div class="modal fade" id="addClientE" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns
                            Visibility</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="clientFrome" method="POST">
                        <input type="hidden" id="sid" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label" id="FNLable"> Company Name<span
                                            style="color:red">*</span></label>
                                    <input type="varchar" id="companyE" class="form-control alpha" required autocomplete="off">
                                    <span id="companyE_error" class="error_form"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label" id="FNLable"> Contact Person<span
                                            style="color:red">*</span></label>
                                    <input type="varchar" id="firstNameE" class="form-control alpha" required autocomplete="off">
                                    <span id="firstNameE_error" class="error_form"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label">Email<span style="color:red">*</span></label>
                                    <input type="email" id="emailE" class="form-control "
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off">
                                    <span id="emailE_error" class="error_form"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label">Contact No.<span style="color:red">*</span></label>
                                    <input type="text" pattern="[0-9]{1}[0-9]{9}" class="form-control numeric"
                                        id="contE" required autocomplete="off">
                                    <span id="contE_error" class="error_form"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label">Address<span style="color:red">*</span></label>
                                    <input type="text" class="form-control alpha" id="addrE" autocomplete="off">
                                    <span id="addrE_error" class="error_form"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label">City<span style="color:red">*</span></label>
                                    <input type="text" class="form-control alpha" id="cityE" autocomplete="off">
                                    <span id="cityE_error" class="error_form"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label ">
                                    <label class="control-label">Country</label>
                                    <select id="countryE" title="" class="form-control">
                                        <option value="0">-Select-</option>
                                        <?php
                                    $data= json_decode(getAllCountries());
                                    for($i=0;$i<count($data);$i++)
                                      echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                    ?>
                                    </select>
                                    <span id="countryE_error" class="error_form"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label">
                                    <label class="control-label">Zone<span style="color:red">*</span> </label>
                                    <input type="text" class="form-control alpha" id="zonecityE" autocomplete="off">
                                    <span id="zonecityE_error" class="error_form"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label">
                                    <label class="control-label">Description </label>
                                    <textarea class="form-control" id="descriptionE"></textarea>
                                    <span id="descriptionE_error" class="error_form"></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                            <button type="button" data-dismiss="modal" class="btn btn-light bttn fit">Cancel</button>
                            <button type="button" id="saveE" class="btn btn-success bttn fit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--edit modal-->
    <!--column Visibility-->
    <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?= URL; ?>Clientsettings"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form1">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0"
                                            disabled>&nbsp;Checkbox</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1"
                                            disabled>&nbsp;Company</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2"
                                            disabled>&nbsp; Contact Person</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3"
                                            disabled>&nbsp;Email</label><br>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4"
                                            disabled>&nbsp;Phone </label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5"
                                            disabled>&nbsp;City</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6"
                                            disabled>&nbsp;Status</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk7">&nbsp;Zone</label><br>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk8">&nbsp;Address </label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk9">&nbsp;Description</label><br>
                                    <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk10">&nbsp;Country</label><br> -->

                                    <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk10" >&nbsp;Action</label><br> -->
                                </div>
                                <!--  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk18" >&nbsp; Logged Hours</label>
                              <br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk19" >&nbsp;Device</label>
                              <br>
                               <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk20" >&nbsp;Status</label><br>
                               <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk21" >&nbsp;Action</label>
                              <br>
                              </div>-->
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-9" style="text-align: end;">
                                <div class="right">
                                    <button type="button" class="btn btn-light bttn fit "
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" id="button1" class="btn btn-success bttn fit "
                                        data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
        </div>
        <!-- end -->
    </div>
    <!--------Attendance date range filter modal start----------->
    <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--   <form role="form1" > -->
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-center">All Zones</label>
                            <div class="col-sm-9">
                                <select id="zonecityfilter" name="zonecityfilter" class="form-control">
                                    <option value="0">-All Zones-</option>
                                    <?php
                                 $data= json_decode(getAllzonecity($_SESSION['orgid']));
                                 for($i=0;$i<count($data);$i++)
                                 echo '<option value="'.$data[$i]->Zone.'">'.$data[$i]->Zone.'</option>';
                                 ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-center">Status</label>
                            <div class="col-sm-9">
                                <select id="statusfilter" name="statusfilter" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            <button type="button" data-dismiss="modal" id="getAtt" class="btn btn-success bttn fit"
                                style="">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--------Attendance date range filter modal End----------->
</body>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<!-- Latest compiled JavaScript -->
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<?php 
      $this->load->view('menubar/allnewjs');
      ?>
<script>
$(document).ready(function() {
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
    var datestring = "&date=";
    var date = new Date();
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);

    var isoDateString = date.toISOString().substring(0, 10);

    var table = $('#example').DataTable({
        "bDestroy": true,
        "serverSide": true,
        "serverMethod": "post",


        buttons: [{
                extend: 'colvis',
                action: function myexcel() {
                    //alert('shakir');
                    $('#column_modal').modal('show');

                }
            },

            {

                text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                className: "btn btn-light nohover",
                action: function() {

                    $('#filtermodal').modal('show');

                }
            },


            {
                extend: 'collection',
                text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                buttons: [{
                        extend: 'csv',

                        text: 'csv',
                        extension: '.csv',
                        exportOptions:

                        {

                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                        },
                        title: 'client'
                    },

                    // {
                    //     extend: 'excelHtml5',
                    //     exportOptions: {
                    //         columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                    //     }
                    // },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                        }
                    }, {
                        extend: 'print',
                        // autoPrint: false,
                        title: '',
                        exportOptions: {
                            // columns: ':visible',
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                            stripHtml: false,
                        },
                        repeatingHead: {

                            logo: '<?=URL?>../assets/image/logo.png',
                            logoPosition: 'center',
                            logoStyle: 'height:100px;width:130px;',
                            title: 'Client of ' + org + ' Dated ' + isoDateString + '',

                        },

                        text: 'Print',

                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10px')
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }
        ],
        scrollX: true,

        //"dom": 'Bfrtip',                      
        "dom": '<"pull-left"l>B<"pull-left"f>rtip',



        language: {
            search: "",
            searchPlaceholder: " Search",
            sLengthMenu: "Row   _MENU_"
        },

        "contentType": "application/json",
        "ajax": "<?=  URL;?>Clientsettings/getClientData",
        "columns": [{
                "data": "change"
            },
            {
                "data": "company"
            },
            {
                "data": "name"
            },
            {
                "data": "email"
            },
            {
                "data": "contact"
            },
            {
                "data": "city"
            },
            // {
            //     "data": "country"
            // },

            {
                "data": "sts"
            },
            {
                "data": "zone"
            },
            {
                "data": "addr"
            },
            {
                "data": "desc"
            },
            {
                "data": "action"
            }

        ]
    });

    table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


    table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

    var total = table.columns().visible().length - 1;
    //alert(total);
    setTimeout(function() {

        var checkbox = 0;
        //var total=9;
        for (var i = 0; i < total; i++) {

            if (table.column(i).visible()) {
                checkbox++;
                $("#chk" + i).iCheck("check");
            }
        }
        if (checkbox == total) {

            for (var i = 0; i < total; i++) {
                if (i < 7) {
                    table.column(i).visible(true);
                    $("#chk" + i).iCheck("check");
                } else {
                    table.column(i).visible(false);
                    $("#chk" + i).iCheck("uncheck");
                }
            }
        }
    }, 500);


    $('input[type="checkbox"]').on('ifChecked', function() {
        var checkbox = $("input[type='checkbox']:checked ").length;
        for (var i = 0; i < checkbox; i++) {
            var ischecked = $("#chk" + i).is(":checked");
            if (checkbox > 10) {

                if (ischecked == true) {
                    $("#chk" + i).iCheck(":checked");
                } else {
                    $("#chk" + i).iCheck(":unchecked");
                }
            }
        }
    });

    $("#button1").click(function() {
        var checkbox = $(".modal_checkbox");
        //alert(checkbox.length);
        for (var i = 0; i < checkbox.length; i++) {
            var column = table.column(i);
            var ischecked = $("#chk" + i).is(":checked");
            console.log(ischecked);
            // alert(ischecked);
            if (ischecked == true) {
                column.visible(true);
            } else {

                column.visible(false);
            }

        }

    });
    $('#getAtt').click(function() {
        //alert();
        var zonecityfilter = $('#zonecityfilter').val();
        //alert(zonecityfilter);
        var statusfilter = $('#statusfilter').val();
         // alert(statusfilter);
        var table = $('#example').DataTable({
            //"dom": '<"pull-left"f><"pull-right"l>tip',
            // "bDestroy": true,

            "bDestroy": true,
            "serverSide": true,
            "serverMethod": "post",

            buttons: [{
                    extend: 'colvis',
                    action: function myexcel() {
                        //alert('shakir');


                        $('#column_modal').modal('show');



                    }
                },
                {

                    text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                    className: "btn btn-light nohover",
                    action: function() {

                        $('#filtermodal').modal('show');

                    }
                },

                {
                    extend: 'collection',
                    text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                    buttons: [{
                            extend: 'csv',

                            text: 'csv',
                            extension: '.csv',
                            exportOptions:

                            {

                                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                            },
                            title: 'client'
                        },

                        // {
                        //     extend: 'excelHtml5',
                        //     exportOptions: {
                        //         columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                        //     }
                        // },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }
                        }, {
                            extend: 'print',
                            // autoPrint: false,
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?=URL?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'Client of ' + org + ' Dated ' + isoDateString +
                                    '',

                            },

                            text: 'Print',

                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '10px')

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]
                }
            ],
            scrollX: true,
            //"dom": 'Bfrtip',   

            "dom": '<"pull-left"l>B<"pull-left"f>rtip',



            language: {
                search: "",
                searchPlaceholder: "",
                sLengthMenu: "Row   _MENU_"
            },

            "contentType": "application/json",
            "ajax": "<?=  URL;?>Clientsettings/getClientData?zonecityfilter=" + zonecityfilter +
                '&statusfilter=' + statusfilter,
            "columns": [{
                    "data": "change"
                },
                {
                    "data": "company"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "contact"
                },
                {
                    "data": "city"
                },
                // {
                //     "data": "country"
                // },
                {
                    "data": "sts"
                },
                {
                    "data": "zone"
                },
                {
                    "data": "addr"
                },
                {
                    "data": "desc"
                },
                {
                    "data": "action"
                }

            ]
        });

        table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

        var total = table.columns().visible().length - 1;
        //alert(total);
        setTimeout(function() {

            var checkbox = 0;
            //var total=9;
            for (var i = 0; i < total; i++) {

                if (table.column(i).visible()) {
                    checkbox++;
                    $("#chk" + i).iCheck("check");
                }
            }
            if (checkbox == total) {

                for (var i = 0; i < total; i++) {
                    if (i < 7) {
                        table.column(i).visible(true);
                        $("#chk" + i).iCheck("check");
                    } else {
                        table.column(i).visible(false);
                        $("#chk" + i).iCheck("uncheck");
                    }
                }
            }
        }, 500);


        $('input[type="checkbox"]').on('ifChecked', function() {
            var checkbox = $("input[type='checkbox']:checked ").length;
            for (var i = 0; i < checkbox; i++) {
                var ischecked = $("#chk" + i).is(":checked");
                if (checkbox > 10) {

                    if (ischecked == true) {
                        $("#chk" + i).iCheck(":checked");
                    } else {
                        $("#chk" + i).iCheck(":unchecked");
                    }
                }
            }
        });

        $("#button1").click(function() {
            var checkbox = $(".modal_checkbox");
            //alert(checkbox.length);
            for (var i = 0; i < checkbox.length; i++) {
                var column = table.column(i);
                var ischecked = $("#chk" + i).is(":checked");
                console.log(ischecked);
                // alert(ischecked);
                if (ischecked == true) {
                    column.visible(true);
                } else {

                    column.visible(false);
                }

            }

        });
    });
});
</script>
<!-- checkbox -->
<script type="text/javascript">
$(document).ready(function() {

    $('#select_all').click();

    $('#select_all').on('click', function() {



        $('thead input[name="select_all"]').on('click', function(e) {
            if (this.checked) {
                $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');

            } else {
                $('#example tbody input[type="checkbox"]:checked').trigger('click');
                //alert('hello');
            }


            e.stopPropagation();
        });
    });

    $('#select_all').click();


});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(document).on("click", ".checkbox", function() {

        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        //var flag = boxes.filter(':checked').length > 0;
        if ($('.checkbox:checked').length > 0) {
            $('#next-container').show();
        } else {
            $('#next-container').hide();
        }
    });
});
</script>
<script></script>
<script type="text/javascript">
$(document).on("click", "#assignemployee", function() {

    var clienid = favorite;
    //alert(clienid);
    var empid = $("#assignemptoclent").val();
    //alert(empid);

    $.ajax({

        url: "<?php echo URL;?>clientsettings/updateclient",
        //data: formdata, //,"email":email
        datatype: "json",
        type: "post",
        data: {
            "clientid": clienid,
            "empid": empid
        },
        success: function(result) {
            if (result == 1) {
                $('#assignemp').modal('hide');
                doNotify('top', 'center', 2, 'Client assigned Successfully');
                var table = $('#example').DataTable();
                setTimeout("location.reload(true);", 2000);
                table.ajax.reload();
                //location.reload();
            } else if (result >= 1) {
                $('#assignemp').modal('hide');
                doNotify('top', 'center', 2, 'Client assigned Successfully');
                var table = $('#example').DataTable();
                setTimeout("location.reload(true);", 2000);
                table.ajax.reload();
            } else
                doNotify('top', 'center', 3, 'Error occured, Try later.');
        },

    });
});
</script>
<!--checkbox-->
<script type="text/javascript">
$(document).ready(function() {
    $(document).on("click", ".checkbox", function() {

        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        //var flag = boxes.filter(':checked').length > 0;
        if ($('.checkbox:checked').length > 0) {
            $('#next-container').show();
        } else {
            $('#next-container').hide();
        }
    });

});
</script>
<script></script>
<!--import-->
<script>
$(document).ready(
    function() {
        $('#fileUpload').change(function() {
            if ($(this).val()) {
                $('#btn1').attr('disabled', false);
            }
        });
    });
</script>
<script>
$(document).ready(function() {
    $("#btn1").click(function() {
        $("#login-form").css('display', 'none');
        $("#register-form").css('display', 'block');

    });
});
</script>
<script>
///////csv file read/////////////////////
$(function() {
    $("#btn1").bind("click", function() {
        var regex = /^([a-zA-Z0-9(0-9)\s_\\.\-:])+(.csv|.txt)$/;
        if (regex.test($("#fileUpload").val().toLowerCase())) {
            if (typeof(FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var line = [];
                    var rows = e.target.result.split("\n");
                    var row = [];
                    var cells = rows[0].split(",");
                if (cells.length != 8) {
                        $("#registers").attr("disabled", true);
                        alert(
                            " Missing column(s) in the import file. Please refer the sample file."
                        );
                    } else {
                        for (var j = 0; j < cells.length; j++) {
                            var cell = [];
                            cell.push(cells[j]);
                            row.push(cell);
                        }
                        line.push(row);

                        console.log('hello' + line[0]);
                        drawOutput(line[0]);
                    }
                }
                reader.readAsText($("#fileUpload")[0].files[0]);
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid CSV file.");
        }
    });
    ///////////maping column///////////
    function drawOutput(line) {
        for (i = 0; i < line.length; i++)

            $('.services_list').append('<option value="' + i + '">' + line[i] + '</option>');
        $('#company>option:eq(1)').prop('selected', true);
        $('#cperson>option:eq(2)').prop('selected', true);
        $('#email1>option:eq(3)').prop('selected', true);

        $('#city1>option:eq(4)').prop('selected', true);
        $('#phone>option:eq(5)').prop('selected', true);
        $('#address1>option:eq(6)').prop('selected', true);
        $('#zonecity>option:eq(7)').prop('selected', true);
        $('#desc>option:eq(8)').prop('selected', true);
        //$('#ecode>option:eq(8)').prop('selected', true);

    }


});
</script>
<script>
$("#upload_csv").on("click",'.call', function(event) {
	//alert();

    event.preventDefault();
    var demofile = $("#fileUpload").prop("files")[0];
    console.log(demofile);
    var form_data = new FormData();
    form_data.append("proposalfile", demofile);

    $.ajax({
        url: "<?php echo URL;?>clientsettings/clientUploads",
        method: "POST",
        contentType: 'multipart/form-data',
        contentType: false, // The content type used when sending data to the server.  
        cache: false, // To unable request pages to be cached  
        processData: false,
        data: form_data,
        success: function(text) {
            console.log(text);

            if (text == "success") {
                alert("Your file uploaded successfully");
            }
        },
        error: function() {
            alert("An error occured.");
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $("#registers").click(function(event) {

        $("#maincontainerdiv").hide("slow");
        $("#loader").show("slow");
        event.preventDefault();

        var company = $('#company').val();
        var cperson = $('#cperson').val();
        var email = $('#email1').val();
        var city = $('#city1').val();
        var phone = $('#phone').val();
        var address = $('#address1').val();

        var zonecity = $('#zonecity').val();
        var desc = $('#desc').val();

        //alert(company);
        //alert(cperson);
        // alert(address);
        

        var ecode = 0;
        if ($('#ecode').val() != undefined)
            ecode = $('#ecode').val();

        $.ajax({
            url: "<?php echo URL;?>clientsettings/emportCli",
            method: "POST",
            // dataType: "json",
            data: {

                "comp": company,
                "name": cperson,
                "email": email,
                "city": city,
                "cont": phone,
                "addr": address,
                "zonecity": zonecity,
                "desc": desc
            },
            success: function(result) {
				//alert(result);
                var obj = JSON.parse(result);
				//alert(result);
                //alert(obj);
                // alert(obj["status"]);
                if (obj["status"] == '1') {
                    //alert("user added");
                    $("#contactForm").trigger("reset");
                    //alert("user added");
                    doNotify('top', 'center', 2, obj["count"] +
                        ' User Added Successfully.');
                    setTimeout("location.reload(true);", 2000);
                    setTimeout(function() {
                        window.location.replace(
                            "<?php echo URL; ?>clientsettings/clientlist");
                    }, 3000);
                } else {
                    doNotify('top', 'center', 3, 'Record not inserted.');
                    //alert(obj["status"]);
                }

                $("#maincontainerdiv").show("slow");
                $("#loader").hide("slow");


            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
                $("#maincontainerdiv").show("slow");
                $("#loader").hide("slow");
            }
        });
    });

});
</script>
<script>
function changeLanguage(language) {
    var element = document.getElementById("url");
    element.value = language;
    element.innerHTML = language;
}

function showDropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    //  alert();
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>
<script>
$('#save12').click(function() {
    var companyname = $('#companyname').val();
    var contactperson = $('#contactperson').val();
    var email = $('#email').val();
    var contactnumber = $('#contactnumber').val();
    var address = $('#address').val();
    var city = $('#city').val();
    var contry = $('#contry').val();
    var zone = $('#zone').val();
    var description = $('#description').val();
    var len;
    var check = 1;
    var email_p = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var cont_p = /^[0-9-+]+$/;
    if ($.trim($('#companyname').val()).length == 0) {
        $("#companyname_error").html("Please enter Company Name");
        $("#companyname_error").css("color", "#F90A0A");
        $("#companyname_error").show();
        $("#companyname").css("border", "2px solid #F90A0A");
        return false;
    } else

    {
        companyname_error = '';

        $("#companyname_error").hide();
        $("#companyname").css("border", "2px solid #34F458");
        $('#companyname_error').text(companyname_error);
        $('#companyname').removeClass('has-error');

    }



    if ($.trim($('#contactperson').val()).length == 0) {
        $("#contactperson_error").html("Please enter Contact Person");
        $("#contactperson_error").css("color", "#F90A0A");
        $("#contactperson_error").show();
        $("#contactperson").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#contactperson_error").hide();
        $("#contactperson").css("border", "2px solid #34F458");
        $('#contactperson').removeClass('has-error');
    }



    if ($.trim($('#email').val()).length == 0) {
        $("#email_error").html("Please enter email");
        $("#email_error").css("color", "#F90A0A");
        $("#email_error").show();
        $("#email").css("border", "2px solid #F90A0A");
        return false;
    } else {
        if (!email_p.test($('#email').val())) {
            $("#email_error").html("Please enter valid Email");
            $("#email_error").css("color", "#F90A0A");
            $("#email_error").show();
            $("#email").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#email_error").hide();
            $("#email").css("border", "2px solid #34F458");
            $('#email_error').removeClass('has-error');
        }
    }


    if ($.trim($('#contactnumber').val()).length < 10 || $.trim($('#contactnumber').val()).length > 15) {
        $("#contactnumber_error").html("Please enter atleast 10 Integer");
        $("#contactnumber_error").css("color", "#F90A0A");
        $("#contactnumber_error").show();
        $("#contactnumber").css("border", "2px solid #F90A0A");
        return false;
    } else {
        if (!cont_p.test($('#contactnumber').val())) {
            $("#contactnumber_error").html("Please valid format of Phone Number");
            $("#contactnumber_error").css("color", "#F90A0A");
            $("#contactnumber_error").show();
            $("#contactnumber").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#contactnumber_error").hide();
            $("#contactnumber").css("border", "2px solid #34F458");
            $('#contactnumber_error').removeClass('has-error');
        }
    }




    if ($.trim($('#address').val()).length == 0) {
        $("#address_error").html("Please enter Address");
        $("#address_error").css("color", "#F90A0A");
        $("#address_error").show();
        $("#address").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#address_error").hide();
        $("#address").css("border", "2px solid #34F458");
        $('#address').removeClass('has-error');
    }

    if ($.trim($('#city').val()).length == 0) {
        $("#city_error").html("Please enter City");
        $("#city_error").css("color", "#F90A0A");
        $("#city_error").show();
        $("#city").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#city_error").hide();
        $("#city").css("border", "2px solid #34F458");
        $('#city').removeClass('has-error');
    }
    if ($.trim($('#zone').val()).length == 0) {
        $("#zone_error").html("Please enter Zone");
        $("#zone_error").css("color", "#F90A0A");
        $("#zone_error").show();
        $("#zone").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#zone_error").hide();
        $("#zone").css("border", "2px solid #34F458");
        $('#zone').removeClass('has-error');
    }
    if (check == 0)
        return false;

    var companyname = $('#companyname').val().trim();
    var zone = $('#zone').val().trim();
    var contactperson = $('#contactperson').val().trim();
    var sts = 1; //$('#status').val();
    var country = $('#country').val();
    var city = $('#city').val().trim();
    var email = $('#email').val().trim();
    var address = $('#address').val().trim();
    var contactnumber = $('#contactnumber').val().trim();
    var description = $('#description').val();

    var formdata = new FormData();


    formdata.append('companyname', companyname);
    //alert(companyname);
    formdata.append('zone', zone);
    formdata.append('contactperson', contactperson);
    formdata.append('sts', sts);
    formdata.append('country', country);
    formdata.append('city', city);
    formdata.append('email', email);
    formdata.append('address', address);
    formdata.append('contactnumber', contactnumber);
    formdata.append('description', description);
    $.ajax({
        url: "<?php echo URL; ?>Clientsettings/insertclient",
        data: formdata,
        datatype: "json",
        type: "post",
        processData: false,
        contentType: false,
        cache: false,


        success: function(result) {
            $("#myModal").modal('hide');
            if (result == 1) {
                //$('#addEmp').modal('hide');
                doNotify('top', 'center', 2, 'Client added successfully');
                //table.ajax.reload();
                //document.getElementById('clientFrom').reset();
                $('#myModal').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload();
                setInterval(function() {
                    location.reload();
                }, 2000);


            } else if (result == 2) {
                doNotify('top', 'center', 4, 'Duplicate email id found');

            } else if (result == 3) {
                doNotify('top', 'center', 4, 'Duplicate phone no. found');

            } else if (result == 5) {

                doNotify('top', 'center', 4, 'Duplicate company found');

            }

        },
        error: function(result) {
            $("#myModal").modal('hide');
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});
var emailV = 0;


$('#saveE').click(function() {
	//alert("sdad");
    var check = 1;
    var email_p = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var cont_p = /^[0-9-+]+$/;
    if ($.trim($('#companyE').val()).length == 0) {
        $("#companyE_error").html("Please enter Company Name");
        $("#companyE_error").css("color", "#F90A0A");
        $("#companyE_error").show();
        $("#companyE").css("border", "2px solid #F90A0A");
        return false;
    } else

    {
        companyE_error = '';

        $("#companyE_error").hide();
        $("#companyE").css("border", "2px solid #34F458");
        $('#companyE_error').text(companyE_error);
        $('#companyE').removeClass('has-error');

    }



    if ($.trim($('#firstNameE').val()).length == 0) {
        $("#firstNameE_error").html("Please enter Contact Person");
        $("#firstNameE_error").css("color", "#F90A0A");
        $("#firstNameE_error").show();
        $("#firstNameE").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#firstNameE_error").hide();
        $("#firstNameE").css("border", "2px solid #34F458");
        $('#firstNameE').removeClass('has-error');
    }



    if ($.trim($('#emailE').val()).length == 0) {
        $("#emailE_error").html("Please enter email");
        $("#emailE_error").css("color", "#F90A0A");
        $("#emailE_error").show();
        $("#emailE").css("border", "2px solid #F90A0A");
        return false;
    } else {
        if (!email_p.test($('#emailE').val())) {
            $("#emailE_error").html("Please enter valid Email");
            $("#emailE_error").css("color", "#F90A0A");
            $("#emailE_error").show();
            $("#emailE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#emailE_error").hide();
            $("#emailE").css("border", "2px solid #34F458");
            $('#emailE_error').removeClass('has-error');
        }
    }
    if ($.trim($('#contE').val()).length < 10 || $.trim($('#contE').val()).length > 15) {
        $("#contE_error").html("Please enter atleast 10 Integer");
        $("#contE_error").css("color", "#F90A0A");
        $("#contE_error").show();
        $("#contE").css("border", "2px solid #F90A0A");
        return false;
    } else {
        if (!cont_p.test($('#contE').val())) {
            $("#contE_error").html("Please valid format of Phone Number");
            $("#contE_error").css("color", "#F90A0A");
            $("#contE_error").show();
            $("#contE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#contE_error").hide();
            $("#contE").css("border", "2px solid #34F458");
            $('#contE_error').removeClass('has-error');
        }
    }




    if ($.trim($('#addrE').val()).length == 0) {
        $("#addrE_error").html("Please enter Address");
        $("#addrE_error").css("color", "#F90A0A");
        $("#addrE_error").show();
        $("#addrE").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#addrE_error").hide();
        $("#addrE").css("border", "2px solid #34F458");
        $('#addrE').removeClass('has-error');
    }

    if ($.trim($('#cityE').val()).length == 0) {
        $("#cityE_error").html("Please enter City");
        $("#cityE_error").css("color", "#F90A0A");
        $("#cityE_error").show();
        $("#cityE").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#cityE_error").hide();
        $("#cityE").css("border", "2px solid #34F458");
        $('#cityE').removeClass('has-error');
    }
    if ($.trim($('#zonecityE').val()).length == 0) {
        $("#zonecityE_error").html("Please enter Zone");
        $("#zonecityE_error").css("color", "#F90A0A");
        $("#zonecityE_error").show();
        $("#zonecityE").css("border", "2px solid #F90A0A");
        return false;
    } else {
        $("#zonecityE_error").hide();
        $("#zonecityE").css("border", "2px solid #34F458");
        $('#zonecityE').removeClass('has-error');
    }

    if (check == 0)
        return false;

    var sid = $('#sid').val();
	//alert(sid);
    var comp = $('#companyE').val().trim();
  
    var name = $('#firstNameE').val().trim();
  
    var email = $('#emailE').val();
   
    var cont = $('#contE').val();
   
    var addr = $('#addrE').val().trim();
   
    var city = $('#cityE').val().trim();
   
    var zonecitye = $('#zonecityE').val().trim();
   
    var countr = $('#countryE').val();

    var sts = $('#stsE').val();
    
    var desc = $('#descriptionE').val();


 var formdata = new FormData();

    formdata.append('sid', sid);
	
    formdata.append('comp', comp);
	
    formdata.append('name', name);
    
    formdata.append('email', email);
    formdata.append('cont', cont);
    formdata.append('addr', addr);
    formdata.append('city', city);
    formdata.append('countr', countr);
    // alert(formdata.get('countr'));
    formdata.append('sts', sts);
    formdata.append('zonecitye', zonecitye);
    formdata.append('desc', desc);




    $.ajax({
        processData: false,
        contentType: false,
        url: "<?php echo URL;?>Clientsettings/editClient",
        data: formdata,
        datatype: "json",
        type: "post",

        success: function(result) {

            if (result == 3) {
                doNotify('top', 'center', 3, 'Email already exist');
                $('#addClientE').modal('hide');
            } else if (result == 4) {
                doNotify('top', 'center', 3, 'Phone no. already exist');
                $('#addClientE').modal('hide');
            } else if (result == 2) {
                doNotify('top', 'center', 3, 'Company already exist');
                $('#addClientE').modal('hide');
            } else if (result == 0) {
                doNotify('top', 'center', 3, 'No changes found');
                $('#addClientE').modal('hide');
            } else if (result == 1) {

                doNotify('top', 'center', 2, 'Client details updated successfully');
                setTimeout("location.reload(true);", 2000);
                $('#addClientE').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
                location.reload();

            } else
                doNotify('top', 'center', 3, 'Error occured, try later');
        }
    });
});

var zone = "";

$(document).on("click", ".edit", function() {
// alert("giiii");
    $('#id').val($(this).data('id'));
    
    
  
    $('#companyE').val($(this).data('comp'));
    // alert($(this).data('comp'));
    //alert(JSON.stringify($('#companyE').val($(this).data('comp'))));
    $('#sid').val($(this).data('id'));
    $('#firstNameE').val($(this).data('name'));
    $('#addrE').val($(this).data('addr'));
    $('#cityE').val($(this).data('city'));
    $('#contE').val($(this).data('contact'));
    $('#emailE').val($(this).data('email'));
    $('#countryE').val($(this).data('country'));
    //alert($(this).data('country'))
    $('#stsE').val($(this).data('sts'));
    $('#descriptionE').val($(this).data('desc'));
    $('#zonecityE').val($(this).data('zone'));

    // alert($(this).data('zone'));
	
	
	
	




});












$("#savestatusactive").click(function() {
    id = sid;
    sts = ssts;


    $.ajax({
        url: "<?php echo URL;?>Clientsettings/updateClientStatus",

        data: {
            "id": id,
            "sts": sts
        },
        success: function(result) {
            if (result == 1) {
              
               
                doNotify('top', 'center', 2, 'Client status updated successfully');
                //location.reload();
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
                setTimeout("location.reload(true);", 2000);
                $("#changestatusactive").modal("hide");
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});


$("#savestatus").click(function() {
    id = sid;
    //alert(id);
    sts = ssts;
    // alert(sts);
    var count = $("#count").val();
    if (count > 0) {
        // doNotify('top','center',4,'This client is assigned to ' +count+ ' employee(s) cannot be inactivated');
        //return false;
    }
    $.ajax({
        url: "<?php echo URL;?>Clientsettings/updateClientStatus",

        data: {
            "id": id,
            "sts": sts
        },
        success: function(result) {
            if (result == 1) {
                // alert("successfully");
                
                doNotify('top','center',2,'Client status updated successfully');
                return false; 
                // var table = $('#example').DataTable();
                // table.ajax.reload(null, false);
                // setTimeout("location.reload(true);", 2000);
                // $("#changestatus").modal("hide");
            }
        },
        error: function(result) {
            // doNotify('top','center',4,'Unable to connect API');
        }
    });
});

$(document).on("click", ".qr1", function() {

    // doNotify('top','center',3,'Mobile no. is mandatory to generate QR Code');
});


/*start*/



$(document).on("click", ".delete", function() {

alert($(this).data('id'));
    $('#del_id').val($(this).data('id'));
    $('#ena').text($(this).data('ena').trim());
    $('#count12').val($(this).data('countsts'));
    //alert($(this).data('countsts'));
});
$(document).on("click", "#delete", function() {
    //$("#maincontainerdiv").css("opacity","0.08");
    //$("#addClient").css("opacity","0.02");
    $("#loader").show("slow");

    var id = $('#del_id').val();
    var count = $('#count12').val();

    if (count > 0) {
        $('#delclient').modal('hide');
        doNotify('top', 'center', 4, 'This client is assigned to ' + count + ' employee(s) cannot be deleted');
        location.reload();
        return false;
    }

    // alert(id);
    $.ajax({
        url: "<?php echo URL;?>Clientsettings/deleteclient",
        data: {
            "clientid": id
        },
        success: function(result) {

            if (result == 1) {
                $('#delclient').modal('hide');
                alert("Deleted successfully.");
                doNotify('top', 'center', 2, 'Client deleted successfully');
                location.reload();
                // var table= $('#example').DataTable();
                // setTimeout("location.reload(true);",2000);
                // table.ajax.reload();

            }



            if (result == 2) {
                // doNotify('top','center',4,"Employee with admin permission can't be deleted"); 
                alert("problem deleting client");
            }
            $("#maincontainerdiv").css("opacity", "1");
            $("#addEmp").css("opacity", "1");
            $("#loader").hide("slow");
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
            $("#maincontainerdiv").css("opacity", "1");
            $("#addEmp").css("opacity", "1");
            $("#loader").hide("slow");
        }
    });
});




$(document).on("change", "#country", function() {

    var country = $(this).val();
    //alert(country);
    $.ajax({
        url: "<?php echo URL;?>Clientsettings/timezone",
        data: {
            "country": country
        },
        success: function(result) {
            result = JSON.parse(result);


            var options = "";

            for (var i = 0; i < result.data.length; i++) {

                options += "<option value='" + result.data[i].timezone_id + "'>" + result.data[i]
                    .timezone + "</option>";

            }


            var temp = "";

            temp = temp + options;

            $("#timezone").html(temp);



        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });

})

/*This code for get the time zone according to country (end)
      
      
          This code for when add the country (start)*/
$(document).on("change", "#country", function() {
    var country = $(this).val();
    $.ajax({
        url: "<?php echo URL;?>Clientsettings/getCity",
        data: {
            "country": country
        },
        success: function(result) {
            var result = JSON.parse(result);
            var i = 0;
            for (i = 0; i < result.length; i++) {
                $('#city').append('<option value="' + result[i].Id + '">' + result[i].Name +
                    '</option>');
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });

})
/*This code for when add  the country (end)
This code for when edit  the country (start)*/
$(document).on("change", "#countryE", function() {
    var country = $(this).val();
    $.ajax({
        url: "<?php echo URL;?>Clientsettings/getCity",
        data: {
            "country": country
        },
        success: function(result) {

            var result = JSON.parse(result);
            var i = 0;
            for (i = 0; i < result.length; i++) {
                $('#cityE').append('<option value="' + result[i].Id + '"  >' + result[i].Name +
                    '</option>');
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });

})
</script>
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})
</script>
<script type="text/javascript">

// var sid = 0;
//     var ssts = "";
//     $(document).on("click", ".dropdown .dropdown-menu .status", function() {
//         //alert($(this).data('ena'));
//         sid = $(this).data('id');
//         ssts = $(this).data('sts');
//         $('.checkbox').each(function() {
//             this.checked = false;
//         });
//         $('#select_all').each(function() {
//             this.checked = false;
//         });
//         // $("#sname").text("Do you want to change '"+$(this).data('ena')+"' status as Inactive?");
//         $("#sname").text('Make "' + $(this).data('ena').trim() + '" Inactive?');
//         // $("#changestatus").modal("show");


//     });

var sid = 0;
var ssts = "";
$(document).on("click", " .dropdown .dropdown-menu .statusinactive", function() {
    //alert($(this).data('id'));
    sid = $(this).data('id');
        ssts = $(this).data('sts');
    $("#sname").text("Make '" + $(this).data('ena') + "' Inactive?");
    //alert($(this).data('ena'));
    $("#count").val($(this).data('countsts'));
    //alert($(this).data('countsts'));
    //$("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
    jQuery.noConflict();
    // $("#changestatus").modal("show");
    sid = $(this).data('id');

    ssts = $(this).data('sts');;
});

$(document).on("click", ".dropdown .dropdown-menu .statusactive", function() {
    //alert($(this).data('id'));

    $("#snameactive").text("Make '" + $(this).data('ena') + "' Active?");
    //$("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
    $("#changestatusactive").modal("show");
    sid = $(this).data('id');

    ssts = $(this).data('sts');;
});
// $(document).on("click", ".statusactive", function() {
//     //alert($(this).data('id'));


//     $("#snameactive").text("Make '" + $(this).data('ena') + "' Active?");
//     //$("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
//     //$("#changestatusactive").modal("show");
//     sid = $(this).data('id');

//     ssts = $(this).data('sts');;
// });

$("#savestatusactive").click(function() {
    id = sid;
    // alert(id);
    sts = ssts;
    //alert(sts);


    $.ajax({
        url: "<?php echo URL;?>Clientsettings/updateClientStatus",

        data: {
            "id": id,
            "sts": sts
        },
        success: function(result) {
            if (result == 1) {
                
                
                doNotify('top', 'center', 2, 'Client status updated successfully');
                
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
                setTimeout("location.reload(true);", 2000);
                $("#changestatusactive").modal("hide");
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});
</script>
<script type="text/javascript">
var favorite = [];

function updateClient() {


    //$('#deptS').val('0');
    //$('#assignemp').modal('show');
    favorite = [];
    $.each($("input[name='chk']:checked"), function() {
        favorite.push($(this).val());

    });





}
</script>
<script type="text/javascript">
$(function() {
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 10) {
            $('.sticky').addClass('active');
        } else {
            $('.sticky').removeClass('active');
        }
    });
});
</script>
<script>
$("#example").on('processing.dt', function(e, settings, processing) {
    $('#processingIndicator').css('display', 'none');
    if (processing) {
        //$(e.currentTarget).LoadingOverlay("show");
        //alert('hello');
        $.LoadingOverlay("show");
    } else {
        $(e.currentTarget).LoadingOverlay("hide", true);
        $.LoadingOverlay("hide", true);
    }
})
</script>
<script>
var specialKeys = new Array();
specialKeys.push(8); //Backspace
$(function() {
    $(".alpha").bind("keypress", function(e) {
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 97 && keyCode <= 122) || specialKeys.indexOf(keyCode) != -1 || (keyCode === 32));
        // $(".error").css("display", ret ? "none" : "inline");
        return ret;
    });
    $(".alpha").bind("paste", function(e) {
        return false;
    });
    $(".alpha").bind("drop", function(e) {
        return false;
    });
});
</script>
<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
$(function() {
    $(".numeric").bind("keypress", function(e) {
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
        // $(".error").css("display", ret ? "none" : "inline");
        return ret;
    });
    $(".numeric").bind("paste", function(e) {
        return false;
    });
    $(".numeric").bind("drop", function(e) {
        return false;
    });
});
</script>
<script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>

</html>
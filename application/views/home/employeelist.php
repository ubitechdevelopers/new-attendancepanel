<!doctype html>
<html lang="en">

<head>
      <?php 
         $this->load->view('menubar/allnewcss');
         ?>
 
       







    <title>UbiAttendance Panel</title>
    <style type="text/css">
    input[type=radio] {
        width: 1.2em;
        height: 1.2em;
    }

    .dataTables_length {
        margin-top: 10px;
    }

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
        font-size: 14px;
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
        color:#9FA2B4;
        font-size: 14px;
       
		font-weight:500;
		
    }

    table.dataTable tbody {
        font-size: 14px;
       
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
        color: black !important;
        /*font-size: 1rem;*/
       
        font-weight: 600;
		margin-top:3px;
    }

    .subhead {
        font-size: 18px;
        color: #828282;
        display: flex;
        cursor: pointer;
        text-decoration: none;
        font-weight: 500 !important;
      
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
        font-weight: 700 !important;
        color: #0F0F0F;
       
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
        padding-top: 2rem !important;
    }

    table.dataTable tbody td:nth-child(2) {
        padding-top: 1.35rem !important;
        

    }

    table.dataTable tbody td:nth-child(3) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.35rem !important;
        word-wrap: break-word !important;
        max-width: 2rem !important;

    }

    table.dataTable tbody td:nth-child(5) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(6) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(7) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(8) {
        padding-top: 1.35rem !important;
		
    }

    table.dataTable tbody td:nth-child(9) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(10) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(11) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(12) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(13) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(14) {
        padding-top: 1.35rem !important;
    }

    table.dataTable tbody td:nth-child(15) {
        padding-top: 1.35rem !important;
    }

    .buttons-collection {
        border: none;
        position: fixed;
        /* top: -5.5rem;
        left: 44rem !important;*/
        background-color: white !important;
        color: black !important;
      
        font-weight: 600;
        color: #4B506D !important;
        font-size: 14px !important;
    }
	

   
    .dt-buttons{
	  float:right;
  }
    
   


   
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {
        margin-left: 1.5rem;
    }

    .tertiary-button {
        padding: 5px 10px 5px 20px !important;
    }

    a:focus,
    a:active {
        text-decoration: none;
        outline: none;
        transition: all 300ms ease 0s;
        -moz-transition: all 300ms ease 0s;
        -webkit-transition: all 300ms ease 0s;
        -o-transition: all 300ms ease 0s;
        -ms-transition: all 300ms ease 0s;
    }

    input,
    select,
    textarea {
        outline: none;
        appearance: unset !important;
        -moz-appearance: unset !important;
        -webkit-appearance: unset !important;
        -o-appearance: unset !important;
        -ms-appearance: unset !important;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        appearance: none !important;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        -o-appearance: none !important;
        -ms-appearance: none !important;
        margin: 0;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        box-shadow: none !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        -o-box-shadow: none !important;
        -ms-box-shadow: none !important;
    }

    input[type=checkbox] {
        appearance: checkbox !important;
        -moz-appearance: checkbox !important;
        -webkit-appearance: checkbox !important;
        -o-appearance: checkbox !important;
        -ms-appearance: checkbox !important;
    }

    input[type=radio] {
        appearance: radio !important;
        -moz-appearance: radio !important;
        -webkit-appearance: radio !important;
        -o-appearance: radio !important;
        -ms-appearance: radio !important;
    }

    .clear {
        clear: both;
    }

    h2 {
        font-size: 20px;
        color: #222;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        margin: 0px;
        padding-top: 35px;
    }

    body {
        font-size: 13px;
        line-height: 1.6;
        color: #222;
        font-weight: 400;
        margin: 0px;
        background: white;
      
    }

    @media screen and (max-width: 430px) {
        body {
            overflow-y: scroll;
        }
    }

    .container1 {
        width: 70%;
        position: relative;
        margin: 0 auto;
        background: #fff;
        /*  box-shadow: 0px 3px 9.5px 0.5px rgba(0, 0, 0, 0.1);
         -moz-box-shadow: 0px 3px 9.5px 0.5px rgba(0, 0, 0, 0.1);
         -webkit-box-shadow: 0px 3px 9.5px 0.5px rgba(0, 0, 0, 0.1);
         -o-box-shadow: 0px 3px 9.5px 0.5px rgba(0, 0, 0, 0.1);
         -ms-box-shadow: 0px 3px 9.5px 0.5px rgba(0, 0, 0, 0.1); */
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        -o-border-radius: 10px;
        -ms-border-radius: 10px;
    }

    /* .signup-form {
         padding: 32px 90px 40px 90px; }*/
    input,
    select {
        box-sizing: border-box;
        /*  display: block;
         width: 100%;*/
        border: 2px solid #D8D8D8;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        font-size: 13px;
        padding: 8px 20px;
    }

    @media screen and (max-width: 430px) {

        input,
        select {
            padding: 7px 12px;
        }
    }

    input:focus {
        border: 2px solid #666;
    }

    input.valid {
        border: 2px solid #3FAE3E;
    }

    select.valid {
        border: 2px solid #3FAE3E;
    }

    .form-group,
    .form-select,
    .form-date {
        margin-bottom: 15px;
        position: relative;
    }

    .form-row {
        justify-content: space-between;
        -moz-justify-content: space-between;
        -webkit-justify-content: space-between;
        -o-justify-content: space-between;
        -ms-justify-content: space-between;
    }

    .form-row .form-select {
        width: 160px;
    }

    .form-row .form-date {
        width: 266px;
    }

    label {
        display: block;
        width: 100%;
        font-weight: 400;
        margin-bottom: 5px;
     
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 21px;
        letter-spacing: 0px;
        text-align: left;
    }

    label.required {
        position: relative;
    }

    label.required:after {
        content: '*';
        margin-left: 2px;
        color: #b90000;
    }

    .steps {
        margin-bottom: 23px;
    }

    .steps ul {
        justify-content: space-between;
        -moz-justify-content: space-between;
        -webkit-justify-content: space-between;
        -o-justify-content: space-between;
        -ms-justify-content: space-between;
    }

    a {
        text-decoration: none;
    }

    .icon {
        font-size: 29px;
    }

    .title1 {
        background: none;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        flex-direction: column;
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        -o-flex-direction: column;
        -ms-flex-direction: column;
        text-decoration: none;
        font-size: 15px;
       
        font-weight: 500;
        color: rgba(118, 118, 118, 1);
    }

    .title_text {
        margin-top: -5px;
        cursor: not-allowed;
        text-decoration: none;
       
        font-size: 15px;
        font-style: normal;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
    }

    .current .title1 {
        font-size: 15px;
        background: none;
        color: black;
        font-weight: bold;
        text-decoration: none;
    }

    .content h3 {
        display: none;
    }

    .fieldset {
        border: none;
        margin: 0px;
        padding: 0px;
        /*display:none;*/
    }

    .actions {
        margin-top: 25px;
    }

    .actions .disabled {
        display: none;
    }

    .actions ul {
        justify-content: flex-end;
        -moz-justify-content: flex-end;
        -webkit-justify-content: flex-end;
        -o-justify-content: flex-end;
        -ms-justify-content: flex-end;
    }

    .actions ul li {
        margin-left: 10px;
    }

    .actions ul li:first-child a {
        background: #adadad;
    }

    .actions ul li a {
        background: #3FAE3E;
        width: 120px;
        height: 40px;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
    }

    .actions ul li a:hover {
        background-color: #3FAE3E;
    }

    @media screen and (max-width: 430px) {
        .actions ul li a {
            width: 70px;
            height: 35px;
        }
    }

    label.error {
        display: block;
        position: absolute;
        top: 74px;
        right: 0;
        
    }

    @media screen and (max-width:430px) {
        label.error {
            visibility: hidden;
        }
    }

    label.error:after {
        font-family: 'themify';
        position: absolute;
        content: '\e717';
        right: 20px;
        top: -35px;
        font-size: 13px;
        color: #EA8585;
    }

    @media screen and (max-width:430px) {
        label.error:after {
            visibility: hidden;
        }
    }

    input.error {
        border: 2px solid #EA8585;
    }

    ul.list-item {
        z-index: 9;
        border: 1px solid #ebebeb;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        display: block;
    }

    ul.list-item li {
        padding: 13px 20px;
        z-index: 2;
        color: #222;
        font-size: 16px;
    }

    ul.list-item li:not(.init) {
        display: none;
        background: #fff;
        color: #222;
        padding: 5px 20px;
    }

    ul.list-item li:not(.init):hover,
    ul.list-item li.selected:not(.init) {
        background: #fa5e5b;
        color: #fff;
    }

    li.init {
        cursor: pointer;
        position: relative;
    }

    li.init:after {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        font-size: 10px;
        color: #222;
        font-family: 'themify';
        content: '\e64b';
    }

    legend {
        width: 100%;
        margin: 0px;
        padding: 0px;
        font-size: 17px;
        margin-bottom: 20px;
    }

    legend span {
        display: inline-block;
    }

    .step-heading {
        color: #fa5e5b;
        float: left;
    }

    .step-number {
        float: right;
    }

    .form-date-item {
        position: relative;
        overflow: hidden;
    }

    .form-date-item:after {
        position: absolute;
        content: '';
        width: 1px;
        height: 30px;
        background: #ebebeb;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
    }

    .form-date-item:last-child:after {
        width: 0px;
    }

    .form-date-item .select-icon {
        z-index: 0;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
    }

    .form-date-item .select-icon i {
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        width: 30px;
        height: 20px;
        font-size: 10px;
        color: #222;
    }

    .ui-datepicker-trigger {
        position: absolute;
        right: 10px;
        top: 20px;
        color: #222;
        font-size: 10px;
        background: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .form-date-group {
        justify-content: space-between;
        -moz-justify-content: space-between;
        -webkit-justify-content: space-between;
        -o-justify-content: space-between;
        -ms-justify-content: space-between;
        border: 1px solid #ebebeb;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
    }

    .form-date-group select {
        border: none;
        width: 90px;
        box-sizing: border-box;
        appearance: none !important;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        -o-appearance: none !important;
        -ms-appearance: none !important;
        position: relative;
        background: 0 0;
        z-index: 10;
        cursor: pointer;
    }

    .select-list {
        position: relative;
        display: inline-block;
        width: 100%;
        margin-bottom: 47px;
    }

    .list-item {
        position: absolute;
        width: 100%;
        z-index: 99;
    }
	.popshow a div{display:none;

}

	.popshow a:hover div {
		display:block;
		text-decoration:none;
		position:fixed;
		 border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
    background: #FFFFFF;  
    width:auto;
	padding:20px 23px 20px 20px;
	text-align:justify;
	font-size:13.5px;
	 
	   
	   margin-right: 5%;
    margin-left: -11%;
    margin-top: 2%;

    
   transition: height 1s;
   padding: 10px 10px 10px 10px;
   
   
		
	}

	
    @media screen and (max-width: 768px) {
        .container1 {
            width: calc(100% - 40px);
            max-width: 100%;
        }
		

        .steps ul,
        .form-row {
            flex-direction: column;
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
            -o-flex-direction: column;
            -ms-flex-direction: column;
        }

        .title1 {
            width: 150px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            text-decoration: none;
        }

        @media screen and (max-width: 320px) {
            .title1 {
                margin-left: -15px;
            }
        }

        .form-row .form-date,
        .form-row .form-select {
            width: 100%;
        }
    }

    @media screen and (max-width: 480px) {
        .empFromE {
            padding-left: 30px;
            padding-right: 30px;
        }
    }

    /*# sourceMappingURL=style.css.map */
    .error {
        color: #EA8585;
    }

    select.error {
        color: red;
        border: 2px solid #EA8585;
    }

    #b-arrow {
        position: absolute;
        right: 5px;
        top: 45px;
        font-size: 15px;
        cursor: pointer;
    }

    #pswrd {
        position: absolute;
        right: 5px;
        top: 42px;
        font-size: 15px;
        cursor: pointer;
    }

    @media screen and (max-width:320px) {
        #pswrd {
            visibility: hidden;
        }
    }

    #cpswrd {
        position: absolute;
        right: 5px;
        top: 42px;
        font-size: 15px;
        cursor: pointer;
    }

    @media screen and (max-width:320px) {
        #cpswrd {
            visibility: hidden;
        }
    }

    .addemp1 {
       
        font-size: 20px;
        font-style: normal;
        /*font-weight: 700;*/
        line-height: 30px;
        letter-spacing: 0em;
        text-align: left;
        color: rgba(0, 0, 0, 1);
    }

    #l-arrow {
        line-height: 30px;
    }

    @media screen and (max-width:420px) {
        .addemp1 {
            display: block;
            font-size: 13px;
            font-weight: 500px;
        }
    }

    #self {
      
        font-size: 13px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
        letter-spacing: 0em;
        text-align: left;
    }

    #pencil {
        margin-left: 25%;
        color: #0769C5;
       
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
    }

    .btn12 input[type='file'] {
        opacity: 0;
        position: absolute;
        border-radius: 100%;
        outline: none;
        display: block;
        height: 100%;
        width: 55%;
        left: 12%;
        bottom: 2%;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    /* #geo1{
         font-weight: 13px;
       
         } */
    .stepform {
        font-size: 15px;
       
        font-weight: 700px;
        color: black;
        display: block;
        padding: 14px 0px 12px 17px;
    }

    .stepform:hover {
        display: block;
        background: rgba(242, 242, 242, 1);
        border-radius: 5px;
    }

     .skmd:hover {
        display: block;
        background: rgba(242, 242, 242, 1);
        border-radius: 5px;
    }     
 

    .activenew a {
        display: block;
        background: rgba(228, 254, 227, 1);
        color: rgba(63, 174, 62, 1);
        border-radius: 5px;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin-top: -2rem !important;
    }

    div.sticky {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 1rem !important;
        z-index: 2000;
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

    .impcancel {
        color: black !important;
    }

    .btn btn-link {
        margin-right: 262px;
    }

    
        
    #fileUpload {
        border: 0px solid #D8D8D8;
        font-size: 14px;
    }
    .hover:hover {
        background: #ECECEC;
       

    }
     .dt-buttons a:nth-child(n):hover{
     background: #ECECEC;
	 
} 

.dt-button-collection .dropdown-menu{
	padding:0;
}
.hide {
  display: none;
}
    
.myDIV:hover + .hide {
  display: block;
  color: red;
}
   
    </style>
</head>

<body>
    <?php
         $data['pageid']=2;
         $orgid = $_SESSION['orgid'];
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar',$data);
         ?>
		 
    <main class="main" style="width: 83.7%;">
        <!-- Tab Bar -->
        <!-- Nav tabs -->
        <div id="heading2" class="sticky" style="z-index: 500;padding-bottom: 30px;">

            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-7">
                    <nav class="main-nav">
                        <ul>
                            <li class="active5"><a href="<?= URL; ?>Userprofiles/employeelist" class="subhead">Active
                                </a></li>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <li><a href="<?= URL; ?>Userprofiles/inactiveemployee" class="subhead">InActive</a></li>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <li><a href="<?= URL; ?>Userprofiles/archiveemployee" class="subhead">Archive</a></li>
                        </ul>
                    </nav>
                </div>
                <div id="button-container" class="col-lg-7 col-md-7 col-xs-12">
                    <button class="tertiary-button" data-toggle="modal" data-target="#printemp">
                        <div> <span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt="">
                            </span> Import Employee </div>
                    </button>
                    <button class="primary-button">
                        <div> <a href="<?= URL ?>/Userprofiles/addemployee" class="adbtn"><span
                                    class="side-item-icon"><img src="<?= URL ?>../assets/icons/plus.svg" alt=""
                                        class="adbtn" style="width: 1rem;"> </span><span style="color: #3366A2;"> Add
                                    Employee </span></a></div>
                    </button>
                </div>
            </div>
            <div class="container-fluid" style="padding: 0px; margin: 0px; margin-top: 0.4rem;">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12" id="next-container" style="display:none;">
                        <button class="btn btn1" data-toggle="modal" data-target="#departments"
                            onclick="updateDepartment();">Department</button>
                        <button class="btn btn1" data-toggle="modal" data-target="#shifts"
                            onclick="updateshift();">Shift</button>
                        <button class="btn btn1" data-toggle="modal" data-target="#designations"
                            onclick="updateDesignation();">Designation</button>
                        <button class="btn btn1" data-toggle="modal" data-target="#qrcodes" onclick="QRcode();">QR
                            Code</button>
                        <button class="btn btn1" data-toggle="modal" data-target="#tracklivelocation" onclick="updatelivelocationtracking();">Track
                            Location</button>
                        <button class="btn btn1" data-toggle="modal" data-target="#inactives"
                            onclick="allinactive();">Inactive</button>
                        <button class="btn btn1" data-toggle="modal" data-target="#geolocation"
                            onclick="updateGeolocation();">Geo Center</button>
                    </div>
                </div>
            </div>
        </div>

        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr style="">
                    <th style="background-image:none" !important><input type="checkbox" id="select_all"
                            name="select_all" value="" /></th>
                   
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
					
                    <th>Phone</th>
                    <th>Permissions</th>
                    <th>Username / Email </th>
                    <th>Shift Type</th>
                    <th>Country</th>
                    <th>Timezone</th>
                    <th>Hourly Rate</th>
                    <th>Status</th>
                    <th>Track Location</th>
                    <th>Geo Center</th>
					 <th>Employee Code</th>
                    <th>Shift</th>
					  <th>DOJ</th>
                    <!--<th>Password</th>-->
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <?php  $this->load->view('menubar/footer');?>
    </main>
    <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?= URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a>
                    </h5>
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
                                            disabled>&nbsp;Checkbox</label>
                                   
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1"
                                            disabled>&nbsp;Profile</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2"
                                            disabled>&nbsp;Name</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3"
                                            disabled>&nbsp;Department</label>
											 <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4"
                                            disabled>&nbsp;Designation</label>
                                             <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5"
                                            disabled>&nbsp;Phone</label>
											
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   
											 
                                   
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6"
                                            disabled>&nbsp;Permissions</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk7">&nbsp;Username / Email </label>
											<label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk12">&nbsp;Status</label>
                                             <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk8">&nbsp;Shift Type</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk9">&nbsp;Country</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk10">&nbsp;Timezone</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk11">&nbsp;Hourly Rate</label>
                                              <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk13">&nbsp;Track Location</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk14">&nbsp;Geo Center</label>
											<label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk15"
                                            >&nbsp;Employee Code</label>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk16"
                                           >&nbsp;Shift</label>
										   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk17"
                                           >&nbsp;DOJ</label>
                                    
                                </div>
                             
                            </div>
                        </div>
                        <!-- <div class="row">
                        <div class="col-lg-7">
                        </div>
                          <div class="col-lg-5"  style="text-align: end;">-->
                        <div class="right">
                            <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
                            <button type="button" id="button1" class="btn btn-success bttn fit "
                                data-dismiss="modal">Save</button>
                        </div>
                        <!--  </div>
                        </div> -->
                    </div>
                </form>
               
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!--  Assign shift-->
    <div class="modal fade" id="shifts" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Shift</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                    <select id="shiftEE" class="form-control ">
                        <option value="0">-Select-</option>
                        <?php
                        $data = json_decode(getAllShift($_SESSION['orgid']));
                        for ($i = 0; $i < count($data); $i++)
                            echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                        ?>
                    </select>
                    <!-- <span id="deptName_error" class="error_form"></span> -->
                    <br>
                    
                    <div class="right">
                        <button type="button" class="btn btn-light bttn" data-dismiss="modal"
                            style="color: grey;">Cancel</button>
                        &nbsp;&nbsp;
                        <button type="button" id="saveshift" class="btn btn-success bttn">Save</button>
                    </div>
                    <!--  </div>
                     </div> -->
                </div>
               
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!--  Assign Department-->
    <div class="modal fade" id="departments" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Department</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                    <select id="deptS" class="form-control ">
                        <option value="0">-Select-</option>
                        <?php
                        $data = json_decode(getAllDept($_SESSION['orgid']));
                        for ($i = 0; $i < count($data); $i++)
                            echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                        ?>
                    </select>
                    <!-- <span id="deptName_error" class="error_form"></span> -->
                    <br>
                    <!--  <div class="row">
                     <div class="col-lg-4">
                     </div>
                       <div class="col-lg-8">-->
                    <div class="right">
                        <button type="button" class="btn btn-light bttn" data-dismiss="modal"
                            style="color: grey">Cancel</button>
                        &nbsp;&nbsp;
                        <button type="button" id="savedepartment" class="btn btn-success bttn">Save</button>
                    </div>
                    <!--  </div>
                     </div>-->
                </div>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!--  Assign Designation-->
    <div class="modal fade" id="designations" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Designation</a>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                    <select id="desgS" class="form-control ">
                        <option value="0">-Select-</option>
                        <?php
                        $data = json_decode(getAllDesg($_SESSION['orgid']));
                        for ($i = 0; $i < count($data); $i++)
                            echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                        ?>
                    </select>
                    <!-- <span id="deptName_error" class="error_form"></span> -->
                    <br>
                    <!--  <div class="row">
                     <div class="col-lg-4">
                     </div>
                       <div class="col-lg-8">-->
                    <div class="right">
                        <button type="button" class="btn btn-light bttn" data-dismiss="modal"
                            style="color: grey;">Cancel</button>
                        &nbsp;&nbsp;
                        <button type="button" id="savedesignation" class="btn btn-success bttn">Save</button>
                    </div>
                    <!--  </div>
                     </div> -->
                </div>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
            <div id="response"></div>
        </div>
    </div>
    <!-- Track Location-->
    <div class="modal fade" id="tracklivelocation" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Track Location</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="trackloc">
                        <br>
                        <div class="radio input-group">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <div class="row">
                                <div class="col-lg- col-md- ">
                                    <label class="radio-inline" style="color: #000000;">
                                        <input type="radio" name="track" value="1">&nbsp&nbsp
                                        <c style="font-size: 15px;">ON</c>
                                    </label>
                                </div>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <div class="col-lg- col-md- ">
                                    <label class="radio-inline" style="color:#000000">
                                        <input type="radio" name="track" value="0">&nbsp&nbsp
                                        <c style="font-size: 15px;">OFF</c>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="right">
                            <button type="button" class="btn btn-light bttn" data-dismiss="modal"
                                style="color: grey;">Cancel</button>
                            &nbsp;&nbsp;
                            <button type="button" id="btntrack" class="btn btn-success bttn">Save</button>
                        </div>
                    </form>

                </div>

            </div>
            <div id="response"></div>
        </div>
    </div>
    <!--  Assign geolocation -->
    <div class="modal fade" id="geolocation" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
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
                                        <?php
                                 $data = json_decode(getAllArea($_SESSION['orgid']));
                                 for ($i = 0; $i < count($data); $i++) {
                                 
                                     echo "<option value='" . $data[$i]->id . "'>" . $data[$i]->Name . "</option>";
                                 }
                                 ?>
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
    <!-- Inactive Employee-->
    <div class="modal fade" id="inactives" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Inactive Employees</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                    <form>
                        <input type="hidden" id="emp_id" />
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="font-size: 17px; font-weight: 500;">Inactive Employee(s)?</h4>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                   
                    <br>
                   
                    <div class="right">
                        <button type="button" class="btn btn-light bttn" data-dismiss="modal"
                            style="color: grey;">Close</button>
                        &nbsp;&nbsp;
                        <button type="button" id="allinactiveE" class="btn btn-success bttn">Save</button>
                    
                    </div>
                
                </div>
                <div id="response"></div>
            </div>
        </div>
    </div>
    <!--  Assign Designation-->
    <div class="modal fade" id="designations" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Designation</a>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                    <select id="desgS" class="form-control ">
                        <option value="0">-Select-</option>
                        <?php
                        $data = json_decode(getAllDesg($_SESSION['orgid']));
                        for ($i = 0; $i < count($data); $i++)
                            echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                        ?>
                    </select>
                    <!-- <span id="deptName_error" class="error_form"></span> -->
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-secondary bttn" data-dismiss="modal">Cancel</button>
                            &nbsp;&nbsp;
                            <button type="button" id="inact" class="btn btn-success bttn">Save</button>
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
    <!--////edit///-->
    <div class="modal fade" id="addEmpE" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<div class="col-6 col-sm-6 col-md-9 col-lg-10" ><a href="<?php echo URL; ?>Userprofiles/employeelist" ><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/l-arrow.png" class="mb-1"><b class="addemp1 ml-3">Employee List</b></i></a></div>-->
                    <h5 class="modal-title" id="title"><a class="a"
                            href="<?php echo URL; ?>Userprofiles/employeelist"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp; Update Employee</a></h5>
                    <div>
                        <button type="button" id="" class="btn btn-light" data-dismiss="modal"
                            style="width:9rem;">Close</button>
                        <button type="button" id="saveE" class="btn btn-success" style="width:9rem;">Save</button>
                    </div>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!--////inactive///-->
    <div class="modal fade" id="changestatus" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"><a class="a"
                            href="<?php echo URL; ?>Userprofiles/employeelist"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp; Change Status</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="sname" style="font-size:16px;"></p>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" style="width:9rem;">No</button>
                    <button type="button" id="savestatus" class="btn btn-success" style="width:9rem;">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!--////archive///-->
    <div class="modal fade" id="delEmp" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp; Archive Employee</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="del_id" />
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Move "<span id="na"></span>" to the archive employees?</h5>
                                <p><b>Note:</b> Archived employees will still be counted in registered employees. To
                                    reduce the no. of registered employees, delete the employee from the archived
                                    employees also.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" style="width:9rem;">Cancel</button>
                    <button type="button" id="delete" class="btn btn-success" style="width:9rem;">Archive</button>
                </div>
            </div>
        </div>
    </div>
    <!--qrcode-->
    <div id="genQR" class="modal fade " data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content print">
                <div class="modal-header  ">
                    <h6 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"
                            class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp; Employee Identity Card</a></h6>
                 <button  type="button"  class="close" data-dismiss="modal" aria-label="Close"><a href="<?php echo URL; ?>Userprofiles/employeelist" style="color:black;">
                        <span aria-hidden="true">&times;</span></a>
                    </button>

                    </button>
                    <!--<button type="button" class="close nonPrintable" data-dismiss="modal"><i class="material-icons">close</i></button>-->
                </div>
                <div class="modal-body">
                    <div>
                        <div class="ml-5 mb-2">
                            <strong> <?php echo isset($_SESSION['orgName']) ? $_SESSION['orgName'] : ''; ?></strong>
                        </div>
                        <center>
                            <div><span class="id" id="empName"></span></div>
                            <div><span class="id" id="desgName"></span></div>
                            <div><span class="id" id="deptName"></span></div>
                        </center>
                        <center class="mt-3">
                            <img width="150px" id="qrCode"
                                src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=testing data found &choe=UTF-8" />
                            <button class="btn btn-warning nonPrintable mt-4 mb-4" onclick="printDiv('genQR')"
                                value="print a div!" style="width:12rem;">Print</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--image modal -->




		
    <!--////reset password///-->
    <div class="modal fade" id="resetpwd" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp; Reset Password</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form id='resetpwdform'>
                            <input type='hidden' id="idResetPassword" />
                            Set new password for <b><span id="nameResetPassword"></span></b>
                            <div class="form-group label-floating mt-3">
                                <label class="control-label">New Password<span style="color:red;">*</span></label>
                                <input class="form-control" type="password" id="resetPassword" />
                                <span id='resetError' style="color:red"></span>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Confirm Password<span style="color:red;">*</span></label>
                                <input class="form-control" type="password" id="confirmResetPassword" />
                                <span id='confirmresetError' style="color:red"></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button " data-dismiss="modal" class="btn btn-light"
                        style="width:9rem;">Cancel</button>
                    <button type="button" id="submitResetPassword" class="btn btn-success"
                        style="width:9rem;">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="printemp" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;Import
                            Employee</a></h5>
                    <img src="<?= URL ?>../assets/img/help-circle.svg" style="margin-left:31rem;">
				<div class="popshow " >
    <a href=""><p style="color:black;">Help</p>
        
						<div class="shadow-lg">
						<ol>
						<li>The format of the data in the import file should be same as the sample file. </li>
							<li>Ensure that your file size does not exceed 5 MB. </li>
							<li>Departments, Designations & Shifts should be added in the panel before importing. </li>
							<li>First row of the given file will be treated as field names. </li>
							<li>Importing should be first tried with single employee.</li>
							<li>You must fill all mandatory fields ( Full Name, Contact No., Shift, Department & Designation).
							</li>
							
			                <li>There should be no duplicate Email or Contact Number.</li>
                            <li>Unexpected errors may occur if the CSV file contains special controls like filters or images embedded within.</li>
                            <li>The date of joining format should be (DD/MM/YYYY).</li>
						</ol>
						</div>
						
    </a>
</div>
                 <div class="hide"> I am shown when someone hovers over the div above.</br>
</div>
				  
                       
                   
                </div>
                <div class="modal-body">
                    <form id="upload_csv" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-6 mt-3">
                                <img src="<?= URL ?>../assets/icons/import_svg.svg" alt="">
                            </div>
                            <div class="col-2"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4 mt-3">
                                <input type="file" id="fileUpload" accept=".csv" name="fileUpload"
                                    accept=".csv,text/csv" /><br>
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4 mt-3 ml-3">
                               <button type="button" class="btn " style="border-color: #E5E5E5;"><a
                                        href="<?php echo IMGURL5; ?>../assets/newjoiningfile.CSV"
                                        style="color:rgba(122, 122, 122, 1); "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Download Sample</a></button>
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4 mt-3 ml-5 mb-3">
                                <button type="submit" id="btn1" class="btn btn-success btnfile call" style="width:8rem;"
                                    data-toggle="modal" data-target="#register-form" disabled>Import</button>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="response"></div>
        </div>
    </div>
    <div class="modal fade" id="register-form" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?php echo URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;Import
                            Employee</a></h5>
                  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="" action="" id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class=" form-label" for="name">Enter Full Name</label>
                                    <select class="form-control services_list services0" id="firstName">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="form-label" for="dept">Email Id</label>
                                    <select class="form-control services_list services2" id="email" name="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="shift">Contact Number</label>
                                    <select class="form-control services_list services3" id="cont" name="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="shift">Shift</label>
                                    <select class="form-control services_list services4" id="shift">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="department">Department</label>
                                    <select class="form-control services_list services5" id="dept">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="date">Designation</label>
                                    <select class="form-control services_list" id="desg">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label " for="pass">Employee Code</label>
                                    <select class="form-control services_list" id="ecode">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label " for="date">Country</label>
                                    <select class="form-control services_list" id="country">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label " for="date">DOJ</label>
                                    <select class="form-control services_list" id="doj">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="height:10rem;">
                    <div class="showresult" style="display:none; margin-right: 262px;">
                        <p>Total records : <span id="repeatemp"></span></p>
                        <p>Total inserted records : <span id="importemp"></span></p>
                        <a href="<?php echo URL; ?>Userprofiles/showTMP" class="btn btn-link">show insuffiecient
                            record</a>
                    </div>
                    <button type="button" onClick="window.location.reload();"class="btn btn-light" data-dismiss="modal"
                        style="width:8rem; color: black!important;" id="impcancel"><a
                            href="<?= URL; ?>Userprofiles/employeelist">Cancel</a></button>
                    <button type="submit"  class="btn btn-success" id="registers" style="width:8rem;">import</button>
                    <!--<button type="submit"  class="btn btn-success" id="registers" data-target="#showdata" data-toggle="modal">import</button>
                     <button type="button" class="btn btn-default" onclick="window.location = '<?= URL . $pagename ?>'">Cancel</button>-->
                </div>
            </div>
            <div id="response"></div>
        </div>
    </div>
	    <div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 20%;width: 55%;margin-left: 150px;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" style="color:black"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <form id="imgE1" method="POST" enctype="multipart/form-data" name="myformE1">
                        <input type="hidden" id="imgid1">
                        <img src="" class="imagepreview1" style="width:100%!important;" id="profileimg1">
                    </form>
                </div>
                <div class="modal-footer">
                   
                </div>

            </div>
        </div>
    </div>
    <form id="myFormid" method="post" action="<?php echo URL; ?>userprofiles/QRcode" target="_blank">
        <input type="hidden" id="favorite" name="favorite" />
        <input type="hidden" id="tempides" name="tempides" value="1" />
    </form>
	   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
        <script src="<?= URL ?>../assets/js/navbar.js"></script>
        <!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="<?= URL ?>../assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"
        ></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/repeatheadeerprint.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
        <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
        <!-- Latest compiled and minified JavaScript -->
            <!--<script type="text/javascript" src="<?= URL ?>../assets/bootstrap-select/js/bootstrap-select.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multi-select.js"></script>
    
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.lwMultiSelect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/datepicker/bootstrap-datepicker.js"></script>

        <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>

         <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>

      
		
   
       
		
       
    
       

    <script>
	$(".datepicker" ).datepicker({
				dateFormat: "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
                yearRange: "1995:2021"				
			}); 
    $(document).ready(function() {
        var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
        var datestring = "&date=";
        var date = new Date();
        date.setMinutes(0);
        date.setSeconds(0);
        date.setMilliseconds(0);
        var isoDateString = date.toISOString().substring(0, 10);
        var table = $('#example').DataTable({
			
			

            buttons: [{

                    extend: 'colvis',
                    action: function myexcel() {

                        //alert('shakir');


                        $('#column_modal').modal('show');

                    }
                },

                {
                    extend: 'collection',
                    text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt="">  Download</span>',
                    buttons: [{
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,17]
                            }
                        },

                        // {
                        //     extend: 'excelHtml5',
                        //     exportOptions: {
                        //         columns: [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        //     }
                        // },
                        {
                            extend: 'pdf',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,17],
                               
                            },
                            alignment: 'center',
                        }, {
                            extend: 'print',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                            // autoPrint: false,
                            title: '',
                            
                            exportOptions: {
                                // columns: ':visible',
                                columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,17],
                                
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?= URL ?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'Active employees of ' + org + ' Dated ' +
                                    isoDateString + '',
                            },
                            // text: '<i class="fa fa-print"></i> Print',
                            text: 'Print',
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '10px')

                                // .prepend(
                                //     '<img src="<?= URL ?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                                // );

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]
                }
            ],
            //"dom": 'Bfrtip',  
            "autoWidth": false,
           
            //'serverSide': true,
            //'serverMethod': 'post',
            "dom": '<"pull-left"l>B<"pull-left"f>rtip',
            language: {
                search: "",
                searchPlaceholder: "Search ",
                sLengthMenu: "Row   _MENU_"
            },
            "contentType": "application/json",

            "ajax": "<?= URL; ?>userprofiles/getEmployeesData",
            "columns": [{
                    "data": "change"
                },
               
                // { "data": "photo"},
                {
                    "data": "profile"
                },
                {
                    "data": "name"
                },
                {
                    "data": "department"
                },
                {
                    "data": "designation"
                },
				
                {
                    "data": "contact"
                },
                {
                    "data": "pemissions"
                },
                {
                    "data": "username"
                },
                {
                    "data": "shifttype"
                },

                {
                    "data": "country"
                },
                {
                    "data": "timezone"
                },
                {
                    "data": "hourlyrate"
                },
                {
                    "data": "status"
                },
                {
                    "data": "livetrack"
                },
                {
                    "data": "area"
					
                },
				 {
                    "data": "code"
                },
                {
                    "data": "shift"
                },
				  {
                    "data": "doj"
                },
              

                {
                    "data": "action"
                }

            ]
        });
        var total = table.columns().visible().length - 1;

        setTimeout(function() {

            var checkbox = 0;
            //var total=9;
            // alert(total);
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
                // alert(ischecked);
                if (ischecked == true) {
                    column.visible(true);
                } else {

                    column.visible(false);
                }

            }
            //$('#column_modal').hide();
            //$('#example').DataTable().ajax.reload(null, false);
        });
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

    <script type="text/javascript">
    $(document).ready(function() {

        $('#select_all').click();

        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                    $('#next-container').show();
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                    $('#next-container').hide();
                });
            }


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
    var favorite = [];

    function updateGeolocation() {
        //alert();
        $('#geolocationS').selectpicker("deselectAll", true).selectpicker("refresh");
        if ($('.checkbox:checked').length > 0) {
            $('#geolocationS').selectpicker("deselectAll", true).selectpicker("refresh");
            $('#geolocationS').val('0');
            $('#geolocation').modal('show');
            favorite = [];
            $.each($("input[name='chk']:checked"), function() {
                favorite.push($(this).val());
            });
        } else {
            //alert('select atleast 1 record to update');
            doNotify('top', 'center', 3, 'Select at least 1 employee to assign geo center');
            //$('#shifts').modal('hide');
            return false;
        }
    }


    $(document).on("click", "#savegeolocation", function() {
        //alert(geolocation);
        if ($("#geolocationS").val().length > 10) {
            doNotify('top', 'center', 4, 'Select  atmost 10 geolocation.');
            return false;
        }

        if ($('#geolocationS').val() == 0) {
            $('#geolocationS').focus();
            doNotify('top', 'center', 4, 'Please select the geo location');
            return false;
        }
        var geolocation = $('#geolocationS').val();

        $.ajax({
            url: "<?php echo URL; ?>userprofiles/editgeolocation",
            data: {
                "geolocation": geolocation,
                "favorite": favorite
            },
            success: function(result) {
                //alert(result);
                if (result == 1) {
                    $('#geolocation').modal('hide');
                    doNotify('top', 'center', 2, 'Geo location assigned successfully');
                    var table = $('#example').DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload();
                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            },
            error: function(result) {

                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
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
            $("#printemp").css('display', 'none');
            $("#register-form").css('display', 'block');
        });
    });
    </script>
    <script>
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
                        if (cells.length != 9) {
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
                            console.log('---' + line[0]);
                            drawOutput(line[0]);
                        }
                    }
                    reader.readAsText($("#fileUpload")[0].files[0]);
                } else {
                    alert("This browser does not support HTML5");
                }
            } else {
                alert("Please upload a valid CSV file");
            }
        });

        function drawOutput(line) {
            for (i = 0; i < line.length; i++)
                $('.services_list').append('<option value="' + i + '">' + line[i] + '</option>');
            $('#firstName>option:eq(1)').prop('selected', true);
            //$('#lastName>option:eq(2)').prop('selected', true);
            $('#email>option:eq(2)').prop('selected', true);
            $('#cont>option:eq(3)').prop('selected', true);
            $('#shift>option:eq(4)').prop('selected', true);
            $('#dept>option:eq(5)').prop('selected', true);
            $('#desg>option:eq(6)').prop('selected', true);
            $('#ecode>option:eq(7)').prop('selected', true);
            $('#country>option:eq(8)').prop('selected', true);
            $('#doj>option:eq(9)').prop('selected', true);
        }


    });
    </script>
    <script>
    $("#upload_csv").on("submit", function(event) {

        event.preventDefault();
        var demofile = $("#fileUpload").prop("files")[0];
        console.log(demofile);
        var form_data = new FormData();
        form_data.append("proposalfile", demofile);
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/emportUploads",
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
            //$("#maincontainerdiv").hide("slow");
            //$("#loader").show("slow");
            event.preventDefault();
            var fname = $('#firstName').val();
            //var lname=$('#lastName').val();
            var dept = $('#dept').val();
            var desg = $('#desg').val();
            var shift = $('#shift').val();
            var email = $('#email').val();
            var country = $('#country').val();
            //alert(email);
            var password = $('#pass').val();
            var cont = $('#cont').val();
            var doj = $('#doj').val();
            var ecode = 0;
            if ($('#ecode').val() != undefined)
                ecode = $('#ecode').val();
            $.ajax({
                url: "<?php echo URL; ?>userprofiles/emportEmp",
                method: "POST",
                data: {
                    "fname": fname,
                    "dept": dept,
                    "desg": desg,
                    "shift": shift,
                    "email": email,
                    "password": password,
                    "cont": cont,
                    "ecode": ecode,
                    "country": country,
                    "doj": doj
                },
                success: function(result) {
                    //alert(result);
                    var obj = JSON.parse(result);
                    var totlemp = obj["importemp"];
                    //$(".importemp").text(totalemp);
                    var totalrecod = obj["repeatemp"];
                    if (obj["sts"] == "true") {
                        $("#contactForm").trigger("reset");
                        doNotify('top', 'center', 2, 'User added successfully');
                        $(".showresult").css('display', 'block');
                        $("#repeatemp").text(totalrecod);
                        $("#importemp").text(totlemp);
                    } else if (result == "false1") {
                        doNotify('top', 'center', 4, 'Mail id is already exist');
                    } else if (result == "false2") {
                        doNotify('top', 'center', 4, 'Phone number is already exist');
                    } else if (result == "false3") {
                        doNotify('top', 'center', 4, 'Department is not valid')
                    }
                    
                },
                error: function(result) {
                    doNotify('top', 'center', 4, 'Unable to connect API');
                     var table = $("#example").DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload();
                }
            });
        });
        $(".call").click(function() {

            $.ajax({
                type: "GET",
                url: "<?php echo URL; ?>Userprofiles/deleteTmp",
                success: function(response) {

                    if (response == "Success") {
                        //$(btn).closest('tr').fadeOut("slow");
                    } else {
                        //alert("Error");
                    }

                }
            });
        });
    });
    </script>
    <script>
    var favorite = [];

    function updateDepartment() {

        if ($('.checkbox:checked').length > 0) {

            $('#deptS').val('0');
            //$('#department').modal('show');
            favorite = [];
            $.each($("input[name='chk']:checked"), function() {

                favorite.push($(this).val());
            });
        } else {
            //alert('select atleast 1 record to update');
            doNotify('top', 'center', 3, 'Select at least 1 employee to assign department');
            //$('#shifts').modal('hide');
            return false;
        }
    }

    $(document).on("click", "#savedepartment", function() {
        //alert(favorite);

        if ($('#deptS').val() == 0) {
            $('#deptS').focus();
            doNotify('top', 'center', 4, 'Please select the department');
            return false;
        }

        var deptS = $('#deptS').val();
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/editdepartment",
            data: {
                "deptS": deptS,
                "favorite": favorite
            },
            success: function(result) {
                //alert(result);
                if (result == 1) {
                    //$('#department').modal('hide');
                    doNotify('top', 'center', 2, 'Department assigned successfully');
                    var table = $("#example").DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload();
                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            },
            error: function(result) {

                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    var favorite = [];

    function updateDesignation() {
        if ($('.checkbox:checked').length > 0) {
            $('#desgS').val('0');
            //$('#designation').modal('show');
            favorite = [];
            $.each($("input[name='chk']:checked"), function() {
                favorite.push($(this).val());
            });
        } else {
            //alert('select atleast 1 record to update');
            doNotify('top', 'center', 3, 'Select at least 1 employee to assign designation');
            //$('#shifts').modal('hide');
            return false;
        }
    }

    $(document).on("click", "#savedesignation", function() {
        if ($('#desgS').val() == 0) {
            $('#desgS').focus();
            doNotify('top', 'center', 4, 'Please select the designation');
            return false;
        }

        var desgS = $('#desgS').val();
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/editdesignation",
            data: {
                "desgS": desgS,
                "favorite": favorite
            },
            success: function(result) {
                //alert(result);
                if (result == 1) {
                    var table = $("#example").DataTable();

                    //$('#designation').modal('hide');
                    doNotify('top', 'center', 2, 'Designation assigned successfully');
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload();
                    // var table= $("#example").DataTable();
                    // table.ajax.reload();
                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    var favorite = [];

    function allinactive() {
        if ($('.checkbox:checked').length > 0) {
            //$('#inactiveallemp').modal('show');
            favorite = [];
            $.each($("input[name='chk']:checked"), function() {
                favorite.push($(this).val());
            });
        } else {
            //alert('select atleast 1 record to update');
            doNotify('top', 'center', 3, 'Select at least 1 record to delete');
            return false;
        }
    }
    $(document).on("click", "#allinactiveE", function(e) {
    	
       //alert(favorite);
       
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/updateUserStatusinact",
            data: {
                "favorite": favorite

                
               
            },
              
            success: function(result) {
            	
                
                if (result == 1) {


                    //$('#inactiveallemp').modal('hide');
                    doNotify('top', 'center', 2, 'Employee(s) inactivated  successfully');
                    var table = $("#example").DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload();
                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            },
            error: function(result) {
                //alert("error");
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    var favorite;

    function updateshift() {
        if ($('.checkbox:checked').length > 0) {

            $('#shiftEE').val('0');
            //$('#shifts').modal('show');
            favorite = [];
            $.each($("input[name='chk']:checked"), function() {
                favorite.push($(this).val());
                // $('input[name="chk"]:checked').each(function(i, e) {
                // favorite[i] = $(this).val();
            });
        } else {
            //alert('select atleast 1 record to update');
            doNotify('top', 'center', 3, 'Select at least 1 employee to assign shift');
            return false;
        }
    }
    $(document).on("click", "#saveshift", function() {
        if ($('#shiftEE').val() == 0) {
            $('#shiftEE').focus();
            doNotify('top', 'center', 4, 'Please select the shift');
            return false;
        }

        var shift = $('#shiftEE').val();
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/editshifts",
            data: {
                "shift": shift,
                "favorite": favorite
            },
            dataType: "json",
            success: function(result) {

                if (result == 1) {
                    //$('#shifts').modal('hide');
                    doNotify('top', 'center', 2, 'Shift assigned successfully ');
                    var table = $('#example').DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload();
                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            },
            error: function(result) {
                //
                // 
                // alert("error");
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    var favorite = [];

    function QRcode() {
        if ($('.checkbox:checked').length > 0) {
            //alert($('.checkbox:checked').length);
            favorite = [];
            $.each($("input[name='chk']:checked"), function(e) {

                favorite.push($(this).val());
                //alert(favorite);

            });
            $("#favorite").val(favorite);
            document.getElementById("myFormid").submit();
        } else {
            doNotify('top', 'center', 3, 'Select at least 1 employee to generate QR code');
            return false;
        }

    }
    </script>
    <script>
    $(document).on("click", ".dropdown .dropdown-menu .delete", function() {

        $('.checkbox').each(function() {
            this.checked = false;
        });
        $('#select_all').each(function() {
            this.checked = false;
        });
        $('#del_id').val($(this).data('id'));
        $('#na').text($(this).data('name').trim());
    });
    $(document).on("click", " #delete", function() {
        //$("#maincontainerdiv").css("opacity","0.08");
        //$("#addEmp").css("opacity","0.02");
        //$("#loader").show("slow");

        var id = $('#del_id').val();
        // alert(id);
        // return;
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/deleteUser",
            data: {
                "sid": id
            },
            success: function(result) {

                if (result == 1) {
                    $('#delEmp').modal('hide');
                    doNotify('top', 'center', 2, 'Employee archived successfully');
                    var table = $('#example').DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload(null, false);
                }
                if (result == 2) {
                    doNotify('top', 'center', 4, "Employee with admin permission can't be deleted");
                }
                //$("#maincontainerdiv").css("opacity","1");
                //$("#addEmp").css("opacity","1");
                //$("#loader").hide("slow");                    
            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
                // $("#maincontainerdiv").css("opacity","1");
                //$("#addEmp").css("opacity","1");
                //$("#loader").hide("slow");
            }
        });
    });
    var sid = 0;
    var ssts = "";
    $(document).on("click", ".dropdown .dropdown-menu .status", function() {
        //alert($(this).data('ena'));
        sid = $(this).data('id');
        ssts = $(this).data('sts');
        $('.checkbox').each(function() {
            this.checked = false;
        });
        $('#select_all').each(function() {
            this.checked = false;
        });
        // $("#sname").text("Do you want to change '"+$(this).data('ena')+"' status as Inactive?");
        $("#sname").text('Make "' + $(this).data('ena').trim() + '" Inactive?');
        // $("#changestatus").modal("show");


    });
    $("#savestatus").click(function() {
        id = sid;
        sts = ssts;
        // alert (sts);
        // return;
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/updateUserStatus",
            data: {
                "id": id,
                "sts": 1
            },
            success: function(result) {
                if (result == 1) {
                    doNotify('top', 'center', 2, 'Employee status updated successfully');
                    var table = $('#example').DataTable();
                    setTimeout("location.reload(true);", 2000);
                    table.ajax.reload(null, false);
                    //$("#changestatus").modal("hide");
                }
            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });


    $(document).on("click", ".dropdown .dropdown-menu .resetpwd", function() {
        $('#idResetPassword').val($(this).data('id'));
        $('#nameResetPassword').text($(this).data('name'));
        //      alert($(this).data('name'));
    });
    $('#resetAdd').click(function() {
        $('#empFrom')[0].reset();
    });
    $("#submitResetPassword").click(function() {
        $('#resetError').text("");
        $('#confirmresetError').text("");
        var resetError = '';
        var confirmresetError = '';
        var pwd = $('#resetPassword');
        var cpwd = $('#confirmResetPassword');
        var id = $('#idResetPassword');
        //alert(id);
        if ($.trim($('#resetPassword').val()).length < 6) {
            $("#resetError").html("Password must contains at least 6 characters");
            $("#resetError").css("color", "#F90A0A");
            $("#resetError").show();
            $("#resetPassword").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#resetError").hide();
            $("#resetPassword").css("border", "2px solid #34F458");
            $('#resetPassword').removeClass('has-error');
        }

        if ($.trim($('#confirmResetPassword').val()).length == 0) {
            $("#confirmresetError").html("Password must contains at least 6 characters");
            $("#confirmresetError").css("color", "#F90A0A");
            $("#confirmresetError").show();
            $("#confirmResetPassword").css("border", "2px solid #F90A0A");
            return false;
        } else {
            if ($('#resetPassword').val() !== $('#confirmResetPassword').val()) {
                $("#confirmresetError").html("Confirm password didn't match");
                $("#confirmresetError").css("color", "#F90A0A");
                $("#confirmresetError").show();
                $("#confirmResetPassword").css("border", "2px solid #F90A0A");
                return false;
            } else {
                $("#confirmresetError").hide();
                $("#confirmResetPassword").css("border", "2px solid #34F458");
                $('#confirmResetPassword').removeClass('has-error');
            }
        }
        //if (pwd.val().trim().length < 6)
        // {
        // $('#resetError').text('Password must contains at least 6 characters');
        //pwd.val(pwd.val().trim());
        //pwd.focus();
        //return false;
        //$("#resetError").html("Password must contains at least 6 characters");
        //$("#resetError").css("color", "#F90A0A");
        //$("#resetError").show();
        // $("#resetPassword").css("border", "2px solid #F90A0A");
        // return false;
        // }
        //if (pwd.val().trim() != cpwd.val().trim())
        //{
        //$('#resetError').text("Confirm password didn't match");
        // cpwd.focus();
        //return false;
        //}
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/resetPassword",
            data: {
                "pass": pwd.val(),
                "id": id.val()
            },
            type: 'post',
            success: function(result) {
                result = JSON.parse(result);
                if (result) {

                    doNotify('top', 'center', 2, 'Password is reset successfully');
                    document.getElementById('resetpwdform').reset();
                    $('#resetpwd').modal('hide');
                    $('#resetpwd')[0].reset();
                    var table = $('#example').DataTable();
                    table.ajax.reload(null, false);
                } else
                    doNotify('top', 'center', 3,
                        'You cannot use your current password as new password, try again');
            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    function printDiv(genQR) {


        var printContents = document.getElementById(genQR).innerHTML;

        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;


        window.print();


        document.body.innerHTML = originalContents;
        /*  var popupWin = window.open('', '', 'width=300,height=300,align=center');
         popupWin.document.open();
         popupWin.document.write('<html><body onload="window.print()">' + genQR.innerHTML + '</html>');  */
    }


    $(document).on("click", ".dropdown .dropdown-menu .qr", function() {
        $('#empName').text($(this).data('name'));
        $('#desgName').text($(this).data('desg'));
        $('#deptName').text($(this).data('dept'));
        $('#qrCode').attr('src', "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" + $(this).data(
            'una') + "" + $(this).data('upa') + "&choe=UTF-8");
    });
    </script>
    <script type="text/javascript">
    // run pre selected options
    /*$('#areaAssign').multiSelect({
     
     });*/


    $(document).ready(function() {
        //alert();
        $('#areaAssinE').lwMultiSelect({

            maxSelect: 10, //0 = no restrictions
            maxText: 'Available Geo-fence'
        });
    });
    </script>
    <script>
    function changeImgUpload1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageE')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script>
    $(".pencil").click(function() {
        $("input[type='file']").trigger('click');
    });
    </script>
    <script>
    var favorite = [];

    function updatelivelocationtracking() {
		
        if ($('.checkbox:checked').length > 0) {
            // $('#geolocationS').val('0');
            $('#tracklivelocation').modal('show');
            favorite = [];
            $.each($("input[name='chk']:checked"), function() {
                favorite.push($(this).val());
            });


        }
       
    }
    $(document).on("click", "#btntrack", function() {
        //alert(favorite);
        if (!$("input[name='track']:checked").val()) {
            //alert("hii");
            // $('input[name=track]'.focus());
            doNotify('top', 'center', 4, 'Please select an option');
            return false;
        }
        var enable = $('input[name=track]:checked').val();
        $.ajax({
            url: "<?php echo URL;?>userprofiles/updatelivetracking",
            data: {
                "favorite": favorite,
                "enable": enable
            },
            success: function(result) {
                //alert(result);
                if (result == 1) {
                    document.getElementById('trackloc').reset();
                    $('#tracklivelocation').modal('hide');
                    doNotify('top', 'center', 2, 'Location tracking updated successfully');
                    var table = $('#example').DataTable();
 setTimeout("location.reload(true);", 4000);
                    table.ajax.reload();

                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            },
            error: function(result) {

                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });
    });
    </script>
    <script>
    $('#saveE').click(function() {

// alert("gfg"); 
        var firstName_error = '';
        var cont_error = '';
        var country_error = '';
        var email_error = '';

        var dept_error = '';
        var desg_error = '';
        var shift_error = '';
        var entitledleave_error = '';
        var balanceleave_error = '';
        //var entitledleave_p = /^[0-9-+]+$/;
        var balanceleave_p = /^[0-9-+]+$/;
        var firstName_p = /^[A-Za-z.]*$/;
        var cont_p = /^[0-9-+]+$/;
        var email_p = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          // alert($.trim($('#passwordE').val()).length);  
        if ($.trim($('#firstNameE').val()).length == 0) {
            $("#firstName_error").html("Please enter Full Name");
            $("#firstName_error").css("color", "#F90A0A");
            $("#firstName_error").show();
            $("#firstNameE").css("border", "2px solid #F90A0A");
            return false;
        }
		
        //else
        //{
        // if (!firstName_p.test($('#firstNameE').val()))
        //  {
        //    $("#firstName_error").html("Please valid format of Full Name");
        // $("#firstName_error").css("color", "#F90A0A");
        //  $("#firstName_error").show();
        //  $("#firstNameE").css("border", "2px solid #F90A0A");
        // return false;
        //} 
        else {
            firstName_error = '';

            $("#firstName_error").hide();
            $("#firstENameE").css("border", "2px solid #34F458");
            $('#firstName_error').text(firstName_error);
            $('#firstNameE').removeClass('has-error');

        }


        if ($.trim($('#contE').val()).length < 8 || $.trim($('#contE').val()).length > 15) {
            $("#cont_error").html("Please enter integer between 8 to 15");
            $("#cont_error").css("color", "#F90A0A");
            $("#cont_error").show();
            $("#contE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            if (!cont_p.test($('#contE').val())) {
                $("#cont_error").html("Please valid format of Phone Number");
                $("#cont_error").css("color", "#F90A0A");
                $("#cont_error").show();
                $("#contE").css("border", "2px solid #F90A0A");
                return false;
            } else {
                $("#cont_error").hide();
                $("#contE").css("border", "2px solid #34F458");
                $('#cont_error').removeClass('has-error');
            }
        }




        if ($('#emailEE1').val() == 0) {


        } else {
            if (!email_p.test($('#emailEE1').val())) {
                $("#email_error").html("Please enter valid format for Email Address");
                $("#email_error").css("color", "#F90A0A");
                $("#email_error").show();
                $("#emailEE1").css("border", "2px solid #F90A0A");
                return false;
            } else {
                $("#email_error").hide();
                $("#emailEE1").css("border", "2px solid #34F458");
                $('#email_error').removeClass('has-error');
            }
        }



        if ($.trim($('#countryE').val()) == 0) {
            $("#country_error").html("Please select the Country");
            $("#country_error").css("color", "#F90A0A");
            $("#country_error").show();
            $("#countryE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#country_error").hide();
            $("#countryE").css("border", "2px solid #34F458");
            $('#countryE').removeClass('has-error');
        }

        if ($.trim($('#deptE').val()) == 0) {
            $("#dept_error").html("Please select Department");
            $("#dept_error").css("color", "#F90A0A");
            $("#dept_error").show();
            $("#deptE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#dept_error").hide();
            $("#deptE").css("border", "2px solid #34F458");
            $('#deptE').removeClass('has-error');
        }

        if ($.trim($('#desgE').val()) == 0) {
            $("#desg_error").html("Please select Designation");
            $("#desg_error").css("color", "#F90A0A");
            $("#desg_error").show();
            $("#desgE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#desg_error").hide();
            $("#desgE").css("border", "2px solid #34F458");
            $('#desgE').removeClass('has-error');
        }

        if ($.trim($('#shiftE').val()) == 0) {
            $("#shift_error").html("Please select Shift");
            $("#shift_error").css("color", "#F90A0A");
            $("#shift_error").show();
            $("#shiftE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#shift_error").hide();
            $("#shiftE").css("border", "2px solid #34F458");
            $('#shiftE').removeClass('has-error');
        }



        if ($.trim($('#entitledleaveE').val()).length == 0) {
            $("#entitledleave_error").html("Please enter Entitled Leave/Year");
            $("#entitledleave_error").css("color", "#F90A0A");
            $("#entitledleave_error").show();
            $("#entitledleaveE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#entitledleave_error").hide();
            $("#entitledleaveE").css("border", "2px solid #34F458");
            $('#entitledleaveE').removeClass('has-error');
        }


        if ($.trim($('#balanceleaveE').val()).length == 0) {
            $("#balanceleave_error").html("Please enter Entitled Leave This Year");
            $("#balanceleave_error").css("color", "#F90A0A");
            $("#balanceleave_error").show();
            $("#balanceleaveE").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#balanceleave_error").hide();
            $("#balanceleaveE").css("border", "2px solid #34F458");
            $('#balanceleaveE').removeClass('has-error');
        }
//alert("pulkit");
        var restrictfence = $('input[name=fenceopt]:Checked').val();
        if (restrictfence == undefined) {
            restrictfence = 0;

        }
        var fname = $('#firstNameE').val();
		//alert(fname);
        
        var areaE = $('#areaAssinE').val();

        var doj = $('#dojE').val();


        var dept = $('#deptE').val();
        var desg = $('#desgE').val();
        var shift = $('#shiftE').val();
        var sts = $('#statusE').val();
        //alert(sts);
        var country = $('#countryE').val();
        //alert(country);
        var timezone = $('#timezoneE').val();

        var email = $('#emailEE1').val();
        var password = $('#passwordE').val();
        var ecode = $("#ecodeE").val();
        var cont = $('#contE').val();
        var empid = $("#id").val();

        var sstatus = $("#sstatusE").val();
        var hourlyrateE = $("#hourlyrateE").val();
        var entitledleaveE = $("#entitledleaveE").val();
        var balanceleaveE = $("#balanceleaveE").val();

        var ecode = '';
        if ($('#ecodeE').val() != undefined)
            ecode = $('#ecodeE').val().trim();
        var areaE = '';
        if ($('#areaAssinE').val() != undefined)
            areaE = $('#areaAssinE').val();
        var formdata = new FormData();
        formdata.append('profE', $('#profileE').prop("files")[0]);
        formdata.append('fname', fname);
        formdata.append('areaE', areaE);
        //formdata.append('lname',lname);
        //formdata.append('dob', dob);
        formdata.append('doj', doj);
        // formdata.append('doc', doc);

        formdata.append('dept', dept);
        formdata.append('desg', desg);
        formdata.append('shift', shift);
        formdata.append('sts', sts);
        formdata.append('sstatus', sstatus);
        formdata.append('country', country);
        formdata.append('timezone', timezone);
        // formdata.append('city', city);
        formdata.append('email', email);
        formdata.append('password', password);
        // formdata.append('addr', addr);
        formdata.append('PersonalNo', cont);
        formdata.append('ecode', ecode);
        formdata.append('hourlyrateE', hourlyrateE);
        formdata.append('empid', empid);
        formdata.append('entitledleaveE', entitledleaveE);
        formdata.append('balanceleaveE', balanceleaveE);
        formdata.append('restrictfence', restrictfence);
        // alert(formdata);

        $.ajax({
            processData: false,
            contentType: false,
            url: "<?php echo URL; ?>userprofiles/editUsermaster",
            data: formdata, //,"email":email
            datatype: "json",
            type: "post",

            success: function(result)
		{
                if (result == 3) {
                    doNotify('top', 'center', 3, 'Employee code already exist');
                     $("#ecodeE").css("color", "#F90A0A");
            $("#ecodeE").show();
            $("#ecodeE").css("border", "2px solid #F90A0A");
                    $('#addEmpE').modal('show');
                    var table = $('#example').DataTable();
                    //table.ajax.reload(null, false);
                 
                } else if (result == 4) {
                    doNotify('top', 'center', 3, 'Duplicate phone no. found');
                    $("#contE").css("color", "#F90A0A");
            $("#contE").show();
            $("#contE").css("border", "2px solid #F90A0A");
                    $('#addEmpE').modal('show');
                    var table = $('#example').DataTable();
                    //table.ajax.reload(null, false);
                   
                } else if (result == 2) {

         
                    doNotify('top', 'center', 3, 'Duplicate email id found');
                       $("#emailEE1").css("color", "#F90A0A");
            $("#emailEE1").show();
            $("#emailEE1").css("border", "2px solid #F90A0A");
                    $('#addEmpE').modal('show');
                    var table = $('#example').DataTable();


                    //table.ajax.reload(null, false);
                
                } else if (result == 1) {
                     //alert('successful');
                    doNotify('top', 'center', 2, 'Employee details updated successfully');
                    $('#addEmpE').modal('hide');
                    var table = $('#example').DataTable();
                    //table.ajax.reload(null, false);
                    setInterval(function() {
                        window.location.reload();
                    }, 2000);
                    //table.ajax.reload(); 
                    //window.location.reload();
                } else
                    doNotify('top', 'center', 3, 'Error occured, try later');
            }
        });
    });



    $(document).on("click", ".dropdown .dropdown-menu .modnew", function() {
        //alert();
        //        //$("#addEmpE").modal('show');
        //       // $("#addEmpE").modal('show');

        var eid = $(this).data('id');

        $.ajax({
            url: "<?php echo URL; ?>userprofiles/editemployee",
            type: "post",
            datatype: "html",
            data: {
                "eid": eid
            },
            success: function(result)

            {
                //alert(result);

                $("#addEmpE").modal('show');

                //$("#addEmpE .modal-body").empty();
                $("#addEmpE .modal-body").html(result);
                $('.fieldset1').show();
                $('.fieldset2').hide();
                $('.fieldset3').hide();

                $('.datepicker').datepicker().on('changeDate', function(e) {
                    var entitledleaveE = $('#entitledleaveE').val();
                    var fiscalend = '<?php echo getFiscalEndDate($orgid) ?>';
                    var doj = $('#dojE').val();
                    var fiscalendmonth = fiscalend.substring(0, 2);
                    var joinmonth = doj.substring(0, 2);
                    var fiscalenddate = fiscalend.substring(3, 5);
                    var joindate = doj.substring(3, 5);
                    // alert(fiscalenddate);
                    // alert(joindate);

                    if (joinmonth > fiscalendmonth) {
                        var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else if (joinmonth == fiscalendmonth && joindate > fiscalenddate) {
                        var newdoj = Number(doj.substr(doj.length - 4)) + Number(1);
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else if (joinmonth == fiscalendmonth && joindate == fiscalenddate) {
                        var newdoj = Number(doj.substr(doj.length - 4));
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    } else {
                        var newdoj = Number(doj.substr(doj.length - 4));
                        var fiscalenddata = fiscalend + "/" + newdoj;
                    }
                    var date1 = new Date(doj);
                    var date2 = new Date(fiscalenddata);
                    // alert(date1);
                    // alert(date2);
                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    //alert(Difference_In_Time);
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                    //alert(Difference_In_Days);
                    var bal1 = (entitledleaveE / 12);
                    var bal2 = (Difference_In_Days / 30.4167);
                    var balanceleaveE = bal1 * bal2;
                    //alert(balanceleave);
                    <?php
            $permis = getAddonPermission($_SESSION['orgid'], 'Addon_BasicLeave');
            if ($permis == 1) {
                ?>
                    // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused";
                    document.getElementById('balanceleaveE').value = parseInt(balanceleaveE);
                    // $("#MyElement").addClass("fo rm group label-floating is-empty is-focused");
                    // $('#balanceleave').val(parseInt(balanceleave));
                    <?php
            }
            ?>
                });

                //                    
            }
        });
    });




    $(document).on("change", "#countryE", function() {

        var country = $(this).val();
        //alert(country);
        $.ajax({
            url: "<?php echo URL; ?>userprofiles/timezone",
            data: {
                "country": country
            },
            success: function(result) {
                result = JSON.parse(result);


                var options = "";

                for (var i = 0; i < result.data.length; i++) {

                    options += "<option value='" + result.data[i].timezone_id + "'>" + result.data[
                        i].timezone + "</option>";

                }


                var temp = "";

                temp = temp + options;

                $("#timezoneE").html(temp);



            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });

    });
    </script>
    <script></script>
    <script type="text/javascript">
    $('#empFromE').on('click', 'span', function() {
                $('#empFromE span.activenew').removeClass('activenew ');
                    $(this).addClass('activenew');
                });
    </script>

    <script>
    function fieldset1() {

        // document.getElementsByClassName("fieldset1");
        $('.fieldset1').show();
        $('.fieldset2').hide();
        $('.fieldset3').hide();
    }

    function fieldset2() {
        $('.fieldset1').hide();
        $('.fieldset2').show();
        $('.fieldset3').hide();
    }

    function fieldset3() {
        $('.fieldset1').hide();
        $('.fieldset2').hide();
        $('.fieldset3').show();
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
//     $(document).on("click", ".pop", function() {

// $('#imgid').val($(this).data('id'));
// //  $('#profileimg').val($(this).data('enimage'));
// // alert($(this).data('enimage'));
// $('.imagepreview').attr('src', $(this).find('img').attr('src'));
// $('#imagemodal').modal('show');
// });


$(document).on("click", ".pop1", function() {

$('#imgid1').val($(this).data('id'));
//  $('#profileimg').val($(this).data('enimage'));
// alert($(this).data('id')));
$('.imagepreview1').attr('src', $(this).find('img').attr('src'));
$('#imagemodal1').modal('show');
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
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

    <script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>
</body>

</html>
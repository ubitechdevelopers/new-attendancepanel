    <!-- NavBar -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
	<style>
	[data-notify] { z-index: 9999 !important; }
/*   div.sticky {
    position: -webkit-sticky!important;
    position: sticky!important;
    top: 1rem!important;

    z-index: 2000;
     
    }

    div.sticky.active {
    background: white;
     box-shadow: 0px 5px 10px -5px #acacac;
    transition: ease-in-out .5s;
    position: -webkit-sticky!important;
    position: sticky!important;
     top: 3.3rem!important;
     z-index: 2000;
     
     }*/
	</style>
      <nav class="navbar navbar-expand-md fixed-top justify-content-between">
	   <?php 

     // echo $pageid ;
     // echo "hiiii"; 
     // die;
     // $pageid = $data['pageid'];
			   //$data['pageid']=7;
			   if( $pageid >= 7  && $pageid < 8 )
			   
			   {
				  echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Manage</div>";
			   }
          elseif( $pageid == 6)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Leaves</div>";
         }
			    elseif($pageid >=5 && $pageid < 6 )
			   
			   {
				  echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Clients</div>";
			   }
         
          elseif( $pageid==3|| $pageid==3.1 || $pageid==3.2 || $pageid==3.3 || $pageid==3.4 || $pageid==3.5|| $pageid==3.6|| $pageid==3.8 || $pageid==3.9|| $pageid==3.10|| $pageid==3.11|| $pageid==3.12|| $pageid==3.13)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Attendence</div>";
         }
		  elseif( $pageid==8|| $pageid==8.1 || $pageid==8.2)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Settings</div>";
         }
		  elseif( $pageid==4)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Reports</div>";
         }
         elseif( $pageid==2|| $pageid==2.1 || $pageid==2.2 || $pageid==2.3)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Employees</div>";
         }
         elseif( $pageid==2.4)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Import Employees Record
          </div>";
         }
         elseif( $pageid==1.1)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Change Password
          </div>";
         }
         elseif( $pageid==1.2)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Employee Month Calendar
          </div>";
         }
        
	
			  ?> 
         <div class="navbar-collapse dual-nav w-50 order-1">
		
            <ul class="nav navbar-nav ml-auto">
<!--               <li>
                <label class="switch">
                  <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                  <span class="slider round"></span>
                </label>
              </li> -->
			 
			  
			   
			  
			
			
               <li class="nav-item ">
                  <a href="#">
                     <div style="position: static; text-align: center;" class="user">
                        <img src="<?=URL?>../assets/image/user_png.png" alt="" id="user-image" class="float-left-center">
                        
                     </div>
                  </a>
               </li>
			   
               <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div style="position: static; text-align: center;" class="user">
                     
                      <span id="username"><?php echo $_SESSION['name'];?></span>
                      
                     </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 0rem;font-size: 0.65rem;">
		<a class="dropdown-item" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Upgrade" style="padding: 0.25rem 0.5rem;">My Plan</a>
          <a class="dropdown-item" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Dashboard/ChangePassword" style="padding: 0.25rem 0.5rem;">Change Password</a>
          <a class="dropdown-item" href="<?=URL;?>" style="padding: 0.25rem 0.5rem;">Logout</a>
          
          
        </div>
      </li>
            </ul>
         </div>
         </div>
      </nav>

      <!-- /navbar -->

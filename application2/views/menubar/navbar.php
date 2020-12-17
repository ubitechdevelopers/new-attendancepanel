    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0MCTJD7K5P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0MCTJD7K5P');
</script>
	<!-- NavBar -->
   
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
	 
	  @media only screen and (min-width: 1520px) and (max-width:1550px) {
  #navbarDropdown {
    margin-right:2rem;
  }
}
 @media only screen and (min-width: 1900px) and (max-width:1940px) {
  #navbarDropdown {
	 margin-right:4rem;
   
  }
}
@media only screen and (min-width: 1580px) and (max-width:1620px) {
  #navbarDropdown {
	 margin-right:2rem;
   
  }
}
@media only screen and (min-width: 1420px) and (max-width:1460px) {
  #navbarDropdown {
	 margin-right:1rem;
   
  }
}
@media only screen and (min-width: 1004px) and (max-width:1044px) {
  #navbarDropdown {
	 margin-right:3rem;
   
  }
}

.shift{
  margin-left: 233px;
}
.drop {
	font-weight:500;
	padding: 0.25rem 0.5rem;
}



	</style>
      <nav class="navbar navbar-expand-md fixed-top justify-content-between">
	   <?php 

    
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
         
          elseif( $pageid==3|| $pageid==3.1 || $pageid==3.2 || $pageid==3.3 || $pageid==3.4 || $pageid==3.5|| $pageid==3.6|| $pageid==3.8 || $pageid==3.9|| $pageid==3.10|| $pageid==3.11|| $pageid==3.12|| $pageid==3.13|| $pageid==3.14)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Attendence</div>";
         }
		  elseif( $pageid==8|| $pageid==8.1 || $pageid==8.2)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Settings</div>";
         }
		  elseif( $pageid==4 || $pageid==4.1)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700;margin-left: 233px;line-height: 30px; color: #000000;'>Reports</div>";
         }
         elseif( $pageid==2|| $pageid==2.1 || $pageid==2.2 || $pageid==2.3|| $pageid==1.3)
         
         {
          echo " <div class='shift' style='font-size: 1.5625rem; font-weight:700;line-height: 30px; color: #000000;'>Employees</div>";
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
         elseif( $pageid==1)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700; margin-left: 233px;line-height: 30px; color: #000000;'>DashBoard
          </div>";
         }


		 elseif( $pageid==9.1 || $pageid==9.2 || $pageid==9.3 )
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700; margin-left: 233px;line-height: 30px; color: #000000;'>Location
          </div>";
         }
		  elseif( $pageid==3.15 )
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700; margin-left: 233px;line-height: 30px; color: #000000;'>Punched Visits
          </div>";
         }
		  elseif( $pageid==101 || $pageid==102)
         
         {
          echo " <div style='font-size: 1.5625rem; font-weight:700; margin-left: 233px;line-height: 30px; color: #000000;'>Face
          </div>";
         }
        
	
			  ?> 
         <div class="navbar-collapse dual-nav order-1">
		
            <ul class="nav navbar-nav" style="position:absolute;right:0;padding-right:1.5%; top:7px;">

			   
			  
			
			 
               <li class="nav-item ">
                  <a href="#">
                     <div style="position: static; text-align: center;" class="user">
                        <img src="<?=URL?>../assets/image/user_png.png" alt="" id="user-image" class="float-left-center" style="margin-right:-20px;">
                        
                     </div>
                  </a>
               </li>
			   
               <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div style="position: static; text-align: center;" class="user">
                     
                      <span id="username"><?php echo $_SESSION['name'];?></span>
                      
                     </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style=" min-width: 0rem;font-size: 0.75rem; ">
		<a class="dropdown-item drop" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Upgrade">My Plan</a>
          <a class="dropdown-item drop" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Dashboard/ChangePassword">Change Password</a>
          <a class="dropdown-item drop" href="<?=URL;?>">Logout</a>
          
          
        </div>
      </li>
            </ul>
         </div>
         </div>
      </nav>

      <!-- /navbar -->

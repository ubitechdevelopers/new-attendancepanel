<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Check whether the site is offline or not.
 *
 */
class Maintenance_hook
{
    public function __construct(){
        log_message('debug','Accessing maintenance hook!');
		$this->CI =& get_instance();
    }
    
    public function offline_check(){
		//var_dump($this->CI->session->userdata['orgid']);
        if(file_exists(APPPATH.'config/config.php')){
            include(APPPATH.'config/config.php');
			
            
			
								if(isset($config['maintenance_mode']) && $config['maintenance_mode'] === TRUE) {



$current_ip_address = $_SERVER['REMOTE_ADDR'];
//var_dump($current_ip_address);
if(isset($config['maintenance_mode']) && $config['maintenance_mode'] === TRUE && strpos($config['allowed_ip_addresses'], $current_ip_address) === FALSE){
					//var_dump(APPPATH);
					//$this->CI->session->userdata
					
					include(APPPATH.'views/maintenance.php');
					exit;
					
				
				}
            
			
        }
            
			
        }  
    }
}
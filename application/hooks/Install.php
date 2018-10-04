<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Install{
		
	function __construct(){
		require_once APPPATH.'/config/database.php';
		
		$this->conn = mysqli_connect($db["default"]["hostname"], $db["default"]["username"], $db["default"]["password"], $db["default"]["database"]);
		
		if(!$this->conn) die("Connection Errors");
		
		$this->classes = array();
		$this->autoload();
		
	}	
		
	
	function autoload() {
		$dir = APPPATH.'database_models/';
 
		foreach (scandir($dir) as $file){						
			if (substr($file, 0, 2) !== '._' && preg_match( "/.php$/i" , $file)){
				include $dir.$file;
				$this->classes[] = $file;
			}
		}
	}
		
		
	function check_installation(){
		
		$error = 0;
		
		foreach($this->classes as $_class){
			
			$_classname = str_replace(".php", "", $_class);
			
			spl_autoload_register(function($_classname, $_class){
				require APPPATH."database_models/". $_class;
			});
			
			if(!class_exists($_classname,false)){
				die("Error in ".$_class." : The filename and classname should be same. System Failed to start. Change the filename or classname and try again.");
				$error += 1; 
				
			}
		}
		
		if($error == 0)return True;
		
	}	


	



	
}


?>
<?php

namespace App\Controllers;
use App\Models\AdminModel;

class ApiController extends BaseController
{
	function __construct()
	{
		helper(['form', 'url']);
		service('request');
	}



          
 public function login()
    {
        
$servername = 'localhost';
$username = 'beta123_interco';
$password = '%a$X#WqzOPU8';
$DB = 'beta123_interco';

$conn = new MySQLi($servername, $username, $password);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['username']) && isset($event_json['password']) )
		{
			$email=htmlspecialchars(strip_tags($event_json['username'] , ENT_QUOTES));
			$password=strip_tags($event_json['password']);
		
				$passwordecrpty = password_hash($password, PASSWORD_BCRYPT);
			
				
			$log_in="select * from staffs where email='".$email."' and password='".$passwordecrpty."' ";
	
	
			$log_in_rs=mysqli_query($conn,$log_in);
			
			if(mysqli_num_rows($log_in_rs))
			{
				$array_out = array();
				 $array_out[] = 
					//array("code" => "200");
					array(
						"response" => "login success"
					);
				
				$output=array( "code" => "200", "msg" => $array_out);
				print_r(json_encode($output, true));
			}	
			else
			{
			    
    			$array_out = array();
    					
        		 $array_out[] = 
        			array(
        			"response" =>"Error in login");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing19");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
	    }

	

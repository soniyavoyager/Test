<?php

namespace App\Controllers;
use App\Models\EmployeeModel;
use App\Models\Materials_request_m_Mode;
use App\Models\Jobcard_masterModel;


class Dashboard extends BaseController
{
	function __construct()
	{
	   	if (session('_admin_logged') == null) {
			header("Location: ".base_url());
			exit();
		}
		
		helper(['form', 'url']);
		service('request');
	}

	public function index()
	{
	    
// 	    	$EmployeeModel = new EmployeeModel();
// 		$Employee = $EmployeeModel->find($id);
		
	
       
       
		
		$session = session();
		return view('dashboard/index', [
			'session' => $session,
			'page_name' => 'dashboard',
			
			
		]);
	}
}

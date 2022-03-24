<?php

namespace App\Controllers;


class Work_dis extends BaseController
{
	function __construct()
	{
		if (session('_admin_logged') == null) 
		{
			header("Location: ".base_url());
			exit();
		}
        helper(['form', 'url']);
		service('request');
	}

	public function index()
	{
		
		
		$db = \Config\Database::connect();
	
        
        $builder = $db->table('daily_report');
        $query = $builder->orderBy('id', 'DESC');
        $Company = $query->get();
 $querynwe = $Company->getResult();
  
    $array = json_decode(json_encode($querynwe), true);

		return view('Description/index', [
			'page_name' => 'Description',
			'report' => $array,
		]);
	}

	
			public function view($id)
	{

	
	 require_once 'API/db.php';
	    

  $query1 = "Select *  FROM `daily_report` WHERE id='$id'";
    $daily_report = $conn->query($query1); 
	
	
		
        return view('Description/view', ['daily_report' => $daily_report,]);
	}
		
	

	
}

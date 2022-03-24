<?php

namespace App\Controllers;
use App\Models\cmpnyModel;
//use App\Models\JobModel;

class Cmpny extends BaseController
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

	public function index($position = '')
	{
		$cmpnyModel = new cmpnyModel();
		$Company = $cmpnyModel->findAll();
		
		$db = \Config\Database::connect();
	
        
        $builder = $db->table('cmpny');
        $query = $builder->orderBy('id', 'DESC');
        $Company = $query->get();
 $querynwe = $Company->getResult();
  
    $array = json_decode(json_encode($querynwe), true);
		

		return view('Cmpny/index', [
			'page_name' => 'Company',
			'cmpny' => $array,
		]);
	}

	public function add()
	{
	    
		$session = session();

	 $db = \Config\Database::connect();
		$name = $this->request->getPost('name');
        
        $builder = $db->table('cmpny');
        $builder->where('cmpny_name', $name);
        $query = $builder->get();
		
      	$unitModel = new cmpnyModel();
		$unitModel->where('cmpny_name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();

		if($query->getNumRows() > 0)
		{
		    
	
// 	$var1=($unit[0]['cmpny_name']);

// $var2=$this->request->getPost('name');
// if (strcmp($var1, $var2) !== 0) 
// {
//     	$data = [
// 			'cmpny_name' => $this->request->getPost('name'),
// 		];

// 		$cmpnyModel = new cmpnyModel();
// 		$cmpnyModel->insert($data);

// 		$message = 'Company info has been saved.';

// 		$session = session();
// 		$session->setFlashdata('flash_result', 'success');
// 		$session->setFlashdata('flash_message', $message);

// 		echo json_encode(array(
// 			'result' => 'success',
// 			'redirect_url' => base_url('/Cmpny'),
// 		));
// 		exit();
    	
// }
// 	else
// 	{
	
	
	
			$message = 'Company  info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
		
		}
//	}
    		
else
{
		$data = [
			'cmpny_name' => $this->request->getPost('name'),
		];

		$cmpnyModel = new cmpnyModel();
		$cmpnyModel->insert($data);

		$message = 'Company info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Cmpny'),
		));
		exit();
	}
	}
	
	public function edit($id)
	{
		$cmpnyModel = new cmpnyModel();
		$cmpny = $cmpnyModel->find($id);

		return view('Cmpny/edit', ['Cmpny' => $cmpny,]);
	}
	
	
	public function update($id)
	{
	   	 $db = \Config\Database::connect();
		$name = $this->request->getPost('name');
        
        $builder = $db->table('cmpny');
        $builder->where('cmpny_name', $name);
        $query = $builder->get();
		
      
	
      	$unitModel = new cmpnyModel();
		$unitModel->where('cmpny_name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();

		if($query->getNumRows() > 0)
		{
	
	$var1=($unit[0]['cmpny_name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'cmpny_name' => $this->request->getPost('name'),
		];

		$cmpnyModel = new cmpnyModel();
		$cmpnyModel->update($id, $data);

		$message = 'Company info has been updated.';


		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Cmpny'),
		));
		exit();
    	
}
	else
	{
	
			$message = 'Company  info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
		
		}
		}
else
{ 
	    
	    
	    
		$data = [
			'cmpny_name' => $this->request->getPost('name'),
		];

		$cmpnyModel = new cmpnyModel();
		$cmpnyModel->update($id, $data);

		$message = 'Company info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Cmpny'),
		));
		exit();
	}	
	}
		public function delete($id)
	{
		$cmpnyModel = new cmpnyModel();
		$cmpnyModel->delete($id);

		$message = 'Company info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Cmpny');
	}

	
	

	
}

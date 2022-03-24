<?php

namespace App\Controllers;
use App\Models\category_product_Model;
//use App\Models\unitModel;

class P_category extends BaseController
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
		$category_product_Model = new category_product_Model();
		$category = $category_product_Model->findAll();

		return view('P_category/index', [
			'page_name' => 'Product Category',
			'category' => $category,
		]);
	}

	public function add()
	{
	   
		$session = session();

		$unitModel = new category_product_Model();
		$unitModel->where('product_name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();

		if ($unit)
		{
		    
		 $var1=($unit[0]['product_name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'product_name' => $this->request->getPost('name'),
		];

		$unitModel = new category_product_Model();
		$unitModel->insert($data);

		$message = 'Product Category info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/P_category'),
		));
		exit();
    	
}
	else
	{   
		    
		    
			$message = 'Product Category  info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		}
		    
		}

		$data = [
			'product_name' => $this->request->getPost('name'),
		];

		$unitModel = new category_product_Model();
		$unitModel->insert($data);

		$message = 'Product Category info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/P_category'),
		));
		exit();
	}
	
	
	public function edit($id)
	{
		$unitModel = new category_product_Model();
		$unit = $unitModel->find($id);

		return view('P_category/edit', ['unit' => $unit,]);
	}
	
	
	public function update($id)
	{
	    
	    
	    
	    $session = session();

		$unitModel = new category_product_Model();
		$unitModel->where('product_name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();

		if ($unit)
		{
		    
		 $var1=($unit[0]['product_name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'product_name' => $this->request->getPost('name'),
		];

		$unitModel = new category_product_Model();
		$unitModel->update($id, $data);


		$message = 'Product Category info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/P_category'),
		));
		exit();
    	
}
	else
	{   
	  
			$message = 'Product Category  info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		}
		    
		}

	    
	    
	    
	    
	    
		$data = [
			'product_name' => $this->request->getPost('name'),
		];

		$unitModel = new category_product_Model();
		$unitModel->update($id, $data);

		$message = 'Product Category info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/P_category'),
		));
		exit();
	}	
	
		public function delete($id)
	{
		$unitModel = new category_product_Model();
		$unitModel->delete($id);

		$message = 'Product Category  info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/P_category');
	}

	
	

	
}

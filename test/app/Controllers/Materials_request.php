<?php

namespace App\Controllers;
use App\Models\Materials_request_Model;
use App\Models\Materials_request_m_Model;
use App\Models\Suppliermodel;
//use App\Models\unitModel;
use App\Models\unitModel;

use App\Models\PurchaseModel;
class Materials_request extends BaseController
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
		$unitModel = new unitModel();
		$Unit = $unitModel->findAll();
		
			$Materials_request_m_Model = new Materials_request_m_Model();
		$Materials_request_m = $Materials_request_m_Model->findAll();
		

		return view('Materials_request/index.php', [
			'page_name' => 'materials_request',
			'Unit' => $Materials_request_m,
			'Materials_request_m' => $Materials_request_m,
		]);
	}
	
	
		public function edit($id)
	{
	   
	    
	    	$Materials_request_Model_new = new Materials_request_m_Model();

		$Materials_request = $Materials_request_Model_new->find($id);
		
	
		
			$PurchaseModel = new PurchaseModel();
		$Purchase = $PurchaseModel->findAll();
		
			$Suppliermodel = new Suppliermodel();
		$Supplier = $Suppliermodel->findAll();
		
		

		
        return view('Materials_request/edit', ['materials_request' => $Materials_request,'Purchase' => $Purchase,
			'Supplier' => $Supplier,]);
	}
	
	
	
	
		public function view($id)
	{

	
	 require_once 'API/db.php';
	    

  $query1 = "Select *  FROM `meterial_req_details` WHERE met_d_id='$id'";
    $Materials_request = $conn->query($query1); 
	
	
		
        return view('Materials_request/view', ['materials_request' => $Materials_request,]);
	}
		
	
	

	
	public function update($id)
	{
	   
	    helper(['form', 'url']); 
	  $files = $this->request->getFile('avatar');
$name = $files->getName();


$target_dir = "attachment/";
$target_file = $target_dir . basename($name);
move_uploaded_file($files,$target_file);
	   // $path = $this->request->getFile('userfile')->store('material_img/', $name);
	    
		$data = [
			'status' => $name,
			'p_id' => $this->request->getPost('purchase'),
			's_id' => $this->request->getPost('Supplier'),
		
		];


		$Materials_request_Model = new Materials_request_m_Model();
		$Materials_request_Model->update($id, $data);

		$message = 'Material  Status has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

	 return redirect()->to('/Materials_request');
	  
	}	
	
		public function delete($id)
	{
		
	
		
		
 require_once 'API/db.php';
	    



  $query1 = "DELETE FROM `meterial_req_master` WHERE met_id='$id'";
    $stmt1 = $conn->query($query1); 
    $query = "DELETE FROM `meterial_req_details` WHERE met_d_id='$id'";
    $stmt = $conn->query($query);
		

		$message = 'Material info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Materials_request');
	}

	
	

	
}

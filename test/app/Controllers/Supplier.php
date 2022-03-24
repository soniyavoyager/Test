<?php

namespace App\Controllers;
use App\Models\Suppliermodel;


class Supplier extends BaseController
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

	public function index($position = '')
	{
		$SupplierModel = new Suppliermodel();
		$Supplier = $SupplierModel->findAll();

		return view('Supplier/index', [
			'page_name' => 'Supplier',
			'Supplier' => $Supplier,
		]);
	}

	public function add()
	{
	    $db = \Config\Database::connect();
		$Sup_id = $this->request->getPost('ID');
        
        $builder = $db->table('Supplier');
        $builder->where('sup_id', $Sup_id);
        $query = $builder->get();
		
        $SupplierModel = new Suppliermodel();
        
    

		if($query->getNumRows() > 0)
		{
		    echo json_encode(array(
     			'result' => 'error',
     			'message' => 'Supplier ID already exist.',
     			'elementID' => 'ID',
     			'csrf_field' => csrf_field(),
     		));
	    }
		else
		{
		    $data = [
    		    'sup_id' => $this->request->getPost('ID'),
    			'name' => $this->request->getPost('name'),
    			'phone' => $this->request->getPost('phone'),
    			'email' => $this->request->getPost('email'),
    			'Address' => $this->request->getPost('address'),
    			
    		];
    		

    		
    		
    	    $SupplierModel->insert($data);
    	    
    		$message = 'Supplier info has been saved.';
    
    	    $session = session();
     		$session->setFlashdata('flash_result', 'success');
    		$session->setFlashdata('flash_message', $message);
    
     		echo json_encode(array(
     			'result' => 'success',
     			'redirect_url' => base_url('/Supplier'),
     		));
	    }
	}

	public function edit($id)
	{
		$Suppliermodel = new Suppliermodel();
		$Supplier = $Suppliermodel->find($id);

		return view('Supplier/edit', [
			'supplier' => $Supplier,
		]);
	}

	public function update($id)
	{
		 $data = [
    		   
    			'name' => $this->request->getPost('name'),
    			'phone' => $this->request->getPost('phone'),
    			'email' => $this->request->getPost('email'),
    			'Address' => $this->request->getPost('address'),
    			
    		];

		$Suppliermodel = new Suppliermodel();
		$Supplier = $Suppliermodel->update($id, $data);

		$message = 'Supplier info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Supplier'),
		));
		exit();
	}

	public function delete($id)
	{
		$Suppliermodel = new Suppliermodel();
		$Suppliermodel->delete($id);

		$message = 'Supplier info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Supplier');
	}
}

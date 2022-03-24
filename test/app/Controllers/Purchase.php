<?php

namespace App\Controllers;
use App\Models\PurchaseModel;


class Purchase extends BaseController
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
		$PurchaseModel = new PurchaseModel();
		$Purchase = $PurchaseModel->findAll();

		return view('Purchase/index', [
			'page_name' => 'Purchase',
			'purchase' => $Purchase,
		]);
	}

	public function add()
	{
	    $db = \Config\Database::connect();
		$purchase_id = $this->request->getPost('ID');
        
        $builder = $db->table('purchase');
        $builder->where('purchase_id', $purchase_id);
        $query = $builder->get();
		
        $PurchaseModel = new PurchaseModel();
        
    

		if($query->getNumRows() > 0)
		{
		    echo json_encode(array(
     			'result' => 'error',
     			'message' => 'Purchase ID already exist.',
     			'elementID' => 'ID',
     			'csrf_field' => csrf_field(),
     		));
	    }
		else
		{
		    $data = ['purchase_mode' => $this->request->getPost('name'),
    		];
    		

    		
    		
    	    $PurchaseModel->insert($data);
    	    
    		$message = 'Purchase info has been saved.';
    
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
		$PurchaseModel = new PurchaseModel();
		$Purchase = $PurchaseModel->find($id);

		return view('Purchase/edit', [
			'purchase' => $Purchase,
		]);
	}

	public function update($id)
	{
		   $data = ['purchase_mode' => $this->request->getPost('name'),
    		];
    		

		$PurchaseModel = new PurchaseModel();
		$Purchase = $PurchaseModel->update($id, $data);

		$message = 'Purchase info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Purchase'),
		));
		exit();
	}

	public function delete($id)
	{
		$PurchaseModel = new PurchaseModel();
		$PurchaseModel->delete($id);

		$message = 'Purchase info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Purchase');
	}
}

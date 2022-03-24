<?php

namespace App\Controllers;
use App\Models\MaterialModel;
use App\Models\JobModel;
use App\Models\unitModel;
use App\Models\category_product_Model;
use App\Models\SegmentModel;

class Materials extends BaseController
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
		$materialModel = new MaterialModel();
		$materials = $materialModel->findAll();
		
		$db = \Config\Database::connect();
		  $builder = $db->table('materials');
        $query = $builder->orderBy('id', 'DESC');
        $materials = $query->get();
   $querynwe = $materials->getResult();
	 $array = json_decode(json_encode($querynwe), true);	
		
		$unitModel = new unitModel();
		$Unit = $unitModel->findAll();
		
		
		$category_product_Model = new category_product_Model();
		$category = $category_product_Model->findAll();
		
		$SegmentModel = new SegmentModel();
		$Segment = $SegmentModel->findAll();

		
		$unitModel = new unitModel();
		$Unit = $unitModel->findAll();
		

		return view('materials/index', [
			'page_name' => 'materials',
			'materials' => $array,
			'Unit' => $Unit,
			'Segment' => $Segment,
			'category' => $category,
		]);
	}

	public function add()
	{
		$session = session();

		$materialModel = new MaterialModel();
		$materialModel->where('code', $this->request->getPost('Code'));
		$material = $materialModel->findAll();

		if ($material)
		{
			$message = 'Material Stock code info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		}

  



		$data = [
			'name' => $this->request->getPost('name'),
			'unit' => $this->request->getPost('unit'),
			'rate' => $this->request->getPost('rate'),
			'category' => $this->request->getPost('category'),
			'Segment' => $this->request->getPost('Segment'),
			'code' => $this->request->getPost('Code'),
			'Quantity' => '',
		];
	
		$materialModel = new MaterialModel();
		$materialModel->insert($data);

		$message = 'Material info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/materials'),
		));
		exit();
	}

	public function edit($id)
	{
	    
	    $unitModel = new unitModel();
		$Unit = $unitModel->findAll();
	    
	    
		$materialModel = new MaterialModel();
		$material = $materialModel->find($id);
		
			$category_product_Model = new category_product_Model();
		$category = $category_product_Model->findAll();
		
		$SegmentModel = new SegmentModel();
		$Segment = $SegmentModel->findAll();

		
		
	
		$unut = $unitModel->find($id);
		
		return view('materials/edit', [
			'material' => $material,
			'Unit' => $Unit,
			'Uit' => $unut,
			'Segment' => $Segment,
			'category' => $category,
			
			
		]);
	}

	public function update($id)
	{
		$data = [
			'name' => $this->request->getPost('name'),
			'unit' => $this->request->getPost('unit'),
			 'rate' => $this->request->getPost('rate'),
			 
			 'category' => $this->request->getPost('Category'),
			 'Segment' => $this->request->getPost('Segment'),
			  'code' => $this->request->getPost('Code'),
			  
			 
		];

		$materialModel = new MaterialModel();
		$materialModel->update($id, $data);

		$message = 'Material info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/materials'),
		));
		exit();
	}

	public function delete($id)
	{
		$materialModel = new MaterialModel();
		$materialModel->delete($id);

		$message = 'Material info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/materials');
	}
}

<?php

namespace App\Controllers;
use App\Models\SegmentModel;
//use App\Models\unitModel;

class Segment extends BaseController
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
		$Segment = $unitModel->findAll();

		return view('Segment/index', [
			'page_name' => 'Segment',
			'Segment' => $Segment,
		]);
	}

	public function add()
	{
	    
	    
		$session = session();

		$unitModel = new unitModel();
		$unitModel->where('name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();

		if ($unit)
		{
			$message = 'Unit  info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		}

		$data = [
			'name' => $this->request->getPost('name'),
		];

		$unitModel = new unitModel();
		$unitModel->insert($data);

		$message = 'Unit info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/unit'),
		));
		exit();
	}
	
	
	public function edit($id)
	{
		$unitModel = new unitModel();
		$unit = $unitModel->find($id);

		return view('Unit/edit', ['unit' => $unit,]);
	}
	
	
	public function update($id)
	{
		$data = [
			'name' => $this->request->getPost('name'),
		];

		$unitModel = new unitModel();
		$unitModel->update($id, $data);

		$message = 'Unit info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Unit'),
		));
		exit();
	}	
	
		public function delete($id)
	{
		$unitModel = new unitModel();
		$unitModel->delete($id);

		$message = 'Unit info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Unit');
	}

	
	

	
}

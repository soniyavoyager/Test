<?php

namespace App\Controllers;
use App\Models\ToolModel;


class Tools_master extends BaseController
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
		$ToolModel = new ToolModel();
		$Tool = $ToolModel->findAll();
		
	

		return view('Tool_master/index', [
			'page_name' => 'Tool Master',
			'Tool' => $Tool,
		
		]);
	}

	public function add()
	{
		$session = session();

		$ToolModel = new ToolModel();
		$ToolModel->where('name', $this->request->getPost('name'));
		$material = $ToolModel->findAll();

		if ($material)
		{
			$message = 'Tool info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		}

  



		$data = [
			'name' => $this->request->getPost('name'),
			'qty' => $this->request->getPost('qty'),
			'rate' => $this->request->getPost('rate')];
			
	
		$ToolModel = new ToolModel();
		$ToolModel->insert($data);

		$message = 'Tool info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Tools_master'),
		));
		exit();
	}

	public function edit($id)
	{
	    
	   
	   	$ToolModel = new ToolModel();
		$job = $ToolModel->find($id);
		
		return view('Tool_master/edit', [
			'Tool' => $job]);
	}

	public function update($id)
	{
		$data = [
			'name' => $this->request->getPost('name'),
			'qty' => $this->request->getPost('qty'),	];

		$ToolModel = new ToolModel();
		$ToolModel->update($id, $data);

		$message = 'Tool info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Tools_master'),
		));
		exit();
	}

	public function delete($id)
	{
		$ToolModel = new ToolModel();
		$ToolModel->delete($id);

		$message = 'Tool info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Tools_master');
	}
}

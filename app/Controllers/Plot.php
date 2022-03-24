<?php

namespace App\Controllers;
use App\Models\PlotModel;
//use App\Models\JobModel;

class Plot extends BaseController
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
		$PlotModel = new PlotModel();
		$Plot = $PlotModel->findAll();
		
			$db = \Config\Database::connect();
		  $builder = $db->table('Plot');
        $query = $builder->orderBy('id', 'DESC');
        $Plot = $query->get();
   $querynwe = $Plot->getResult();
	 $array = json_decode(json_encode($querynwe), true);
		

		return view('Plot/index', [
			'page_name' => 'Plot',
			'Plot' => $array,
		]);
	}

	public function add()
	{
		$session = session();

		$PlotModel = new PlotModel();
		$PlotModel->where('name', 
		$this->request->getPost('name'));
		$Plot = $PlotModel->findAll();

		if ($Plot)
		{
// 		 $var1=($Plot[0]['name']);

// $var2=$this->request->getPost('name');
// if (strcmp($var1, $var2) !== 0) 
// {
//     	$data = [
// 			'name' => $this->request->getPost('name'),
// 		];

// 		$PlotModel = new PlotModel();
// 		$PlotModel->insert($data);

// 		$message = 'Plot info has been saved.';

// 		$session = session();
// 		$session->setFlashdata('flash_result', 'success');
// 		$session->setFlashdata('flash_message', $message);

// 		echo json_encode(array(
// 			'result' => 'success',
// 			'redirect_url' => base_url('/Plot'),
// 		));
// 		exit();
    	
// }
// 	else
// 	{
		    
			$message = 'Plot info already exist.';

			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
	//	}
}

		$data = [
			'name' => $this->request->getPost('name'),
		];

		$PlotModel = new PlotModel();
		$PlotModel->insert($data);

		$message = 'Plot info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Plot'),
		));
		exit();
	}

	public function edit($id)
	{
		$PlotModel = new PlotModel();
		$Plot = $PlotModel->find($id);

		return view('Plot/edit', [
			'Plot' => $Plot,
		]);
	}


	public function update($id)
	{
	    $session = session();

		$PlotModel = new PlotModel();
		$PlotModel->where('name', 
	   $this->request->getPost('name'));
		$Plot = $PlotModel->findAll();

		if ($Plot)
		{
		    
		    $var1=($Plot[0]['name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'name' => $this->request->getPost('name'),
		];

	
		$PlotModel = new PlotModel();
		$PlotModel->update($id, $data);

		$message = 'Plot info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Plot'),
		));
		exit();
    	
}
	else
	{ 
			$message = 'Plot info already exist.';

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
			'name' => $this->request->getPost('name'),
		];

		$PlotModel = new PlotModel();
		$PlotModel->update($id, $data);

		$message = 'Plot info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Plot'),
		));
		exit();
	}
}
	public function delete($id)
	{
		$PlotModel = new PlotModel();
		$PlotModel->delete($id);

		$message = 'Plot info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Plot');
	}



	
}

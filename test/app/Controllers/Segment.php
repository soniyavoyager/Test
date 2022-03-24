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
		$SegmentModel = new SegmentModel();
		$Segment = $SegmentModel->findAll();

		return view('Segment/index', [
			'page_name' => 'Segment',
			'Segment' => $Segment,
		]);
	}

	public function add()
	{
	    
	    
		$session = session();

		$SegmentModel = new SegmentModel();
		$SegmentModel->where('seg_name', 
		$this->request->getPost('name'));
		$unit = $SegmentModel->findAll();

		if ($unit)
		{
		    
		    		    
$var1=($unit[0]['seg_name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'seg_name' => $this->request->getPost('name'),
		];

		$SegmentModel = new SegmentModel();
		$SegmentModel->insert($data);

		$message = 'Segment info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Segment'),
		));
		exit();
    	
}
	else
	{
	   
	  $message='Segment info already exist.'; 
	    
	


			echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		}
		} 
		    
		

		$data = [
			'seg_name' => $this->request->getPost('name'),
		];

		$SegmentModel = new SegmentModel();
		$SegmentModel->insert($data);

		$message = 'Segment info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Segment'),
		));
		exit();
	}
	
	
	public function edit($id)
	{
		$unitModel = new SegmentModel();
		$unit = $unitModel->find($id);

		return view('Segment/edit_new', ['unit' => $unit,]);
	}
	
	
	
	public function update($id)
	{
	    
	 	$session = session();

		$SegmentModel = new SegmentModel();
		$SegmentModel->where('seg_name', 
		$this->request->getPost('name'));
		$unit = $SegmentModel->findAll();

		if ($unit)
		{
		     
	   		    		    
$var1=($unit[0]['seg_name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'seg_name' => $this->request->getPost('name'),
		];

 	$SegmentModel = new SegmentModel();
		$SegmentModel->update($id, $data);

		$message = 'Segment info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Segment'),
		));
		exit();
    	
}
	else
	{
	   
	  $message='Segment info already exist.'; 
	}
	     
	    	echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		
		} 
	    
	    
		$data = [
			'seg_name' => $this->request->getPost('name'),
		];

		$SegmentModel = new SegmentModel();
		$SegmentModel->update($id, $data);

		$message = 'Segment info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Segment'),
		));
		exit();
	}	
	
		public function delete($id)
	{
		$unitModel = new SegmentModel();
		$unitModel->delete($id);

		$message = 'Segment info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Segment');
	}

	
	

	
}

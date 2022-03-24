<?php

namespace App\Controllers;
use App\Models\JobModel;

class Jobs extends BaseController
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
		$jobModel = new JobModel();
		$jobs = $jobModel->findAll();

		return view('jobs/index', [
			'page_name' => 'jobs',
			'jobs' => $jobs,
		]);
	}

	public function add()
	{
	
	 $db = \Config\Database::connect();
		$name = $this->request->getPost('name');
        
        $builder = $db->table('job_types');
        $builder->where('name', $name);
        $query = $builder->get();
	
		$unitModel = new JobModel();
		$unitModel->where('name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();
	
        
        
        // $emp = $employeeModel->find($Emp_id);
        // print_r($emp);

		if($query->getNumRows() > 0)
		{
		    
		    $var1=($unit[0]['name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'name' => $this->request->getPost('name'),
		];

    	$jobModel = new JobModel();
		$jobModel->insert($data);


			$message = 'Category has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/jobs'),
		));
		exit();
    	
}
	else
	{
		     $message='Unit  info already exist.'; 
		    
		    echo json_encode(array(
     			'result' => 'error',
     			'message' => 'Category already exist.',
     			'elementID' => 'ID',
     			'csrf_field' => csrf_field(),
     		));
	    }
		}
		else
		{
	
	
	
		$data = [
			'name' => $this->request->getPost('name'),
		];

		$jobModel = new JobModel();
		$jobModel->insert($data);

		$message = 'Category has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/jobs'),
		));
		exit();
	}
}
	public function edit($id)
	{
		$jobModel = new JobModel();
		$job = $jobModel->find($id);

		return view('jobs/edit', [
			'job' => $job,
		]);
	}

	public function update($id)
	{
	    
	 $db = \Config\Database::connect();
		$name = $this->request->getPost('name');
        
        $builder = $db->table('job_types');
        $builder->where('name', $name);
        $query = $builder->get();
		
        
        
       	$unitModel = new JobModel();
		$unitModel->where('name', 
		$this->request->getPost('name'));
		$unit = $unitModel->findAll();
	
        
        
        // $emp = $employeeModel->find($Emp_id);
        // print_r($emp);

		if($query->getNumRows() > 0)
		{
		    
		    $var1=($unit[0]['name']);

$var2=$this->request->getPost('name');
if (strcmp($var1, $var2) !== 0) 
{
    	$data = [
			'name' => $this->request->getPost('name'),
		];

    	$jobModel = new JobModel();
		$jobModel->update($id, $data);


			$message = 'Category info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/jobs'),
		));
		exit();
    	
}

else
	{
	   
	  $message='Category  info already exist.'; 
	    
		echo json_encode(array(
				'result' => 'error',
				'message' => $message,
				'csrf_field' => csrf_field(),
			));
			exit();
		} 

}
	else
	{
		 
	
	
	
		$data = [
			'name' => $this->request->getPost('name')
		
		];

		$jobModel = new JobModel();
		$jobModel->update($id, $data);

		$message = 'Category info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/jobs'),
		));
		exit();
	}
}
	public function delete($id)
	{
		$jobModel = new JobModel();
		$jobModel->delete($id);

		$message = 'Category info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/jobs');
	}
}

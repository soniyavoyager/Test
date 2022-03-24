<?php

namespace App\Controllers;
use App\Models\EmployeeModel;



class Employees extends BaseController
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
		$employeeModel = new EmployeeModel();
		$employees = $employeeModel->findAll();
		
		$db = \Config\Database::connect();
	
        
        $builder = $db->table('employees');
        $query = $builder->orderBy('id', 'DESC');
        $employees = $query->get();
 $querynwe = $employees->getResult();
  
    $array = json_decode(json_encode($querynwe), true);
		

		return view('employees/index', [
			'page_name' => 'employees',
			'employees' => $array,
		]);
	}

	public function add()
	{
	    $db = \Config\Database::connect();
		$Emp_id = $this->request->getPost('ID');
        
        $builder = $db->table('employees');
        $builder->where('Emp_id', $Emp_id);
        $query = $builder->get();
		
        $employeeModel = new EmployeeModel();
        
        // $emp = $employeeModel->find($Emp_id);
        // print_r($emp);

		if($query->getNumRows() > 0)
		{
		    echo json_encode(array(
     			'result' => 'error',
     			'message' => 'Employee ID already exist.',
     			'elementID' => 'ID',
     			'csrf_field' => csrf_field(),
     		));
	    }
		else
		{
		  
		    
		    $data = [
    		    'Emp_id' => $this->request->getPost('ID'),
    			'name' => $this->request->getPost('name'),
    			'email' => $this->request->getPost('email'),
    			'phone' => $this->request->getPost('phone'),
    			'designation' => $this->request->getPost('Designation'),
    			'rate' => $this->request->getPost('rate'),
    				'ot1' => $this->request->getPost('ot1_rate'),
    					'ot2' => $this->request->getPost('ot2_rate'),
    		];
    		
    // 		$data = [
    // 		    'Emp_id' => $this->request->getPost('ID'),
    // 			'name' => $this->request->getPost('name'),
    // 			'email' => $this->request->getPost('email'),
    // 			'phone' => $this->request->getPost('phone'),
    // 			'designation' => $this->request->getPost('Designation'),
    // 			'rate' => $this->request->getPost('rate'),
    // 		];
    		
    		
    		
    	    $employeeModel->insert($data);
    	    
    		$message = 'Employee info has been saved.';
    
    	    $session = session();
     		$session->setFlashdata('flash_result', 'success');
    		$session->setFlashdata('flash_message', $message);
    
     		echo json_encode(array(
     			'result' => 'success',
     			'redirect_url' => base_url('/employees'),
     		));
	    }
	}

	public function edit($id)
	{
		$employeeModel = new EmployeeModel();
		$employee = $employeeModel->find($id);

		return view('employees/edit', [
			'employee' => $employee,
		]);
	}

	public function update($id)
	{
		$data = [
		    'Emp_id' => $this->request->getPost('ID'),
			'name' => $this->request->getPost('name'),
			'email' => $this->request->getPost('email'),
			'phone' => $this->request->getPost('phone'),
			'designation' => $this->request->getPost('Designation'),
			'rate' => $this->request->getPost('rate'),
				'ot1' => $this->request->getPost('ot1_rate'),
    					'ot2' => $this->request->getPost('ot2_rate'),
		];

		$employeeModel = new EmployeeModel();
		$employee = $employeeModel->update($id, $data);

		$message = 'Employee info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/employees'),
		));
		exit();
	}

	public function delete($id)
	{
	    
	    $employeeModel = new EmployeeModel();
		$employeeModel->delete($id);


		
		 $db = \Config\Database::connect();
	
	    $builder1 = $db->table('work_shedule_detail');
	    $builder1->where('worker_id', $id);
       $builder1->delete();
       
       
    
	
         $builder2 = $db->table('work_shedule_master');
	    $builder2->where('worker_id', $id);
       $builder2->delete();
	    
	    

		$message = 'Employee info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/employees');
	}
}

<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\StaffModel;

class Home extends BaseController
{
	function __construct()
	{
		helper(['form', 'url']);
		service('request');
	}

	public function index()
	{
	    
	    if(session('_admin_name'))
	    {
	     	return redirect()->to('/dashboard');
	    }
	else{
	    
	    
	    
		$session = session();
		return view('index', [
			'session' => $session,
		]);
	}
	}

	public function login()
	{
		$rules = [
			'admin_name' => 'required',
			'admin_pass' => 'required',
		];
		$errors = [
			'admin_name' => [
				'required' => 'Username required.',
			],
			'admin_pass' => [
				'required' => 'Password required',
			],
		];

		if (! $this->validate($rules, $errors))
		{
			return view('index', [
				'validation' => $this->validator,
			]);
		}
		else
		{
			$admin_name = $this->request->getPost('admin_name');
			$admin_pass = $this->request->getPost('admin_pass');

			$adminModel = new AdminModel();

			$admin = $adminModel->where('name', $admin_name)->first();
			
			
			
			
		$StaffModel = new StaffModel();
		$StaffModel->where('username', 
		$this->request->getPost('admin_name'));
		$Staff = $StaffModel->findAll();
			
	  	


			if ($admin)
			{
				if (password_verify($admin_pass, $admin['password']))
				{
				    
				    $admin1='manager';
					$session = session();
					$session->set('_admin_logged', 'YES');
					$session->set('_admin_name', $admin['name']);
					  $session->set('_admin_id', $admin['id']);
					   $session->set('_admin_role', $admin1);
     	
					return redirect()->to('/dashboard');
				}
				
				else
{
  	  
    return redirect()->to('/')->with('error', 'Invalid Username/Password.');
}
	
				
			}
			
			else if($Staff)
				{
				    
    $Staff_pass=($Staff[0]['password']);
	$password = $this->request->getPost('admin_pass');
	$passwordecrpty =  md5($password);


				if ($Staff_pass==$passwordecrpty)
				{
				    
				    
					$session = session();
					$session->set('_admin_logged', 'YES');
             	    $session->set('_admin_name', $Staff[0]['first_name']);
             	
                    $session->set('_admin_id', $Staff[0]['id']);
                     $session->set('_admin_role', $Staff[0]['position']);
             	
             			return redirect()->to('/dashboard');
				
				}
				else
				{
				  return redirect()->to('/')->with('error', 'Invalid Username/Password.');
   
				}
				
				
				
			}
else
{
  	  
    return redirect()->to('/')->with('error', 'Invalid Username/Password.');
}
		
		}
	}

	public function logout()
	{
		$session = session();
		$session->remove(['_admin_logged', '_admin_name']);
		return redirect('/');
	}
}

<?php

namespace App\Controllers;
use App\Models\siteModel;
use App\Models\cmpnyModel;
use App\Models\PlotModel;
class Site extends BaseController
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
		$siteModel = new siteModel();
		$Site = $siteModel->findAll();
		
			$cmpnyModel = new cmpnyModel();
            $cmpny = $cmpnyModel->findAll();
      
        $PlotModel = new PlotModel();
		 $Plot = $PlotModel->findAll();
		
		return view('Site/index', [
			'page_name' => 'Site',
			'Site' => $Site,
			'cmpny' => $cmpny,
			'Plot' => $Plot,
		]);
	}

	public function add()
	{
		$session = session();
require_once 'API/db.php';
	    	$Product_category="select * from  Site  where name='".$this->request->getPost('name')."' 
	    	and plot='".$this->request->getPost('plot')."' and compny='".$this->request->getPost('compny')."'";

	        $Product_category_rs=mysqli_query($conn,$Product_category);
	        
	        
// 		$siteModel = new siteModel();
// 		$siteModel->where('name', 
// 		$this->request->getPost('name'));
// 			$siteModel->where('plot', 
// 		$this->request->getPost('plot'));
// 			$siteModel->where('compny', 
// 		$this->request->getPost('compny'));
		
// 		$Plot = $siteModel->findAll();
		
 $row2 = mysqli_fetch_assoc($Product_category_rs);



	
		if ($row2) 	
		{
		    
   
 		   
 		   
 	 $var1=($row2['name']);

 $var2=$this->request->getPost('name');
 if (strcmp($var1, $var2) !== 0) 
{
    
  
     	$data = [
			'name' => $this->request->getPost('name'),
			'plot' => $this->request->getPost('plot'),
			'compny' => $this->request->getPost('compny'),
		];

		$siteModel = new siteModel();
		$siteModel->insert($data);

		$message = 'site info has been saved.';

 		$session = session();
 		$session->setFlashdata('flash_result', 'success');
 		$session->setFlashdata('flash_message', $message);

 		echo json_encode(array(
 			'result' => 'success',
 			'redirect_url' => base_url('/Site'),
		));
		exit();
    	
 }
 	else
	{
		    
		    
		    
		$message = 'site info already exist.';

 			echo json_encode(array(
 				'result' => 'error',
 				'message' => $message,
 				'csrf_field' => csrf_field(),
 			));
	exit();
	
		}
		
 }
		$data = [
			'name' => $this->request->getPost('name'),
			'plot' => $this->request->getPost('plot'),
			'compny' => $this->request->getPost('compny'),
		];

		$siteModel = new siteModel();
		$siteModel->insert($data);

		$message = 'site info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Site'),
		));
		exit();
	}
	
	
public function edit($id)
	{
		   $siteModel = new siteModel();
		    $Site = $siteModel->find($id);
		
            $cmpnyModel = new cmpnyModel();
            $cmpny = $cmpnyModel->findAll();
      
            $PlotModel = new PlotModel();
		    $Plot = $PlotModel->findAll();
		
		return view('Site/edit', [
		    'Site' => $Site,
			'cmpny' => $cmpny,
			'Plot' => $Plot,
		]);
	}
	
	
		public function update($id)
	{
	    
	    
	    require_once 'API/db.php';
	    	$Product_category="select * from  Site  where name='".$this->request->getPost('name')."' 
	    	and plot='".$this->request->getPost('plot')."' and compny='".$this->request->getPost('compny')."'";

	        $Product_category_rs=mysqli_query($conn,$Product_category);
	        

		
 $row2 = mysqli_fetch_assoc($Product_category_rs);



	
		if ($row2) 	
		{
		    
   
 		   
 		   
 	 $var1=($row2['name']);

 $var2=$this->request->getPost('name');
 if (strcmp($var1, $var2) !== 0) 
{
    
  
     	$data = [
			'name' => $this->request->getPost('name'),
			'plot' => $this->request->getPost('plot'),
			'compny' => $this->request->getPost('compny'),
		];

		$siteModel = new siteModel();
		$siteModel->update($id, $data);

      $message = 'site info has been updated.';

 		$session = session();
 		$session->setFlashdata('flash_result', 'success');
 		$session->setFlashdata('flash_message', $message);

 		echo json_encode(array(
 			'result' => 'success',
 			'redirect_url' => base_url('/Site'),
		));
		exit();
    	
 }
 	else
	{
		    
		    
		    
		$message = 'site info already exist.';

 			echo json_encode(array(
 				'result' => 'error',
 				'message' => $message,
 				'csrf_field' => csrf_field(),
 			));
	exit();
	
		}
		
 }
	    
	    
	    
	    
	    
	    
	    
		$data = [
			'name' => $this->request->getPost('name'),
			'plot' => $this->request->getPost('plot'),
			'compny' => $this->request->getPost('compny'),
		];

		$siteModel = new siteModel();
		$siteModel->update($id, $data);

		$message = 'site info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/Site'),
		));
		exit();
	}

	public function delete($id)
	{
		$siteModel = new siteModel();
		$siteModel->delete($id);

		$message = 'site info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/Site');
	}
	
	
	
	
}

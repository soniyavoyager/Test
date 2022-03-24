<?php

namespace App\Controllers;
use App\Models\StaffModel;
use App\Models\Staff_roles_Model;

class Staffs extends BaseController
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

	public function index()
	{
		$staffModel = new StaffModel();
	   $staffs = $staffModel->findAll();

		return view('staffs/index', [
			'page_name' => 'Users',
			'page_title' => 'Users & privilege',
			'staffs' => $staffs,
		]);
		
	}

	public function list($position = 'managers')
	{
		$staffModel = new StaffModel();
		$staffModel->where('position', $position);
		$staffs = $staffModel->findAll();

		return view('staffs/index', [
			'page_name' => $position,
			'page_title' => $position,
			'staffs' => $staffs,
		]);
	}

	public function add()
	{
	    
	     $db = \Config\Database::connect();
		$email = $this->request->getPost('email');
        
        $builder = $db->table('staffs');
        $builder->where('email', $email);
        $query = $builder->get();
		
       
		if($query->getNumRows() > 0)
		{
		    echo json_encode(array(
     			'result' => 'error',
     			'message' => 'Staff already exist.',
     			'elementID' => 'ID',
     			'csrf_field' => csrf_field(),
     		));
	    }
	    	else
		{
		$data = [
			'first_name' => $this->request->getPost('first_name'),
			'last_name' => $this->request->getPost('last_name'),
			'email' => $this->request->getPost('email'),
			'phone' => $this->request->getPost('phone'),
			'password' => md5($this->request->getPost('password')),
			'position' => $this->request->getPost('position'),
		];
 
$builder = $db->table('staffs');
if($builder->insert($data)) {
    $inserted_id = $db->insertID();
   	 
}


		   
		   
		   
		  if($inserted_id)
		   {
		  
		    
		      $emp_view1 = $this->request->getPost('view1');
			  if($emp_view1)
			  {
				 $emp_view=$emp_view1; 
			  }
			  else
			  {
				  $emp_view='0'; 
			  }
 
    			 $emp_edit1 =$this->request->getPost('edit1');
				  if($emp_edit1)
			  {
				 $emp_edit=$emp_edit1; 
			  }
			  else
			  {
				  $emp_edit='0'; 
			  }
				 
    			 $emp_delete1 = $this->request->getPost('delete1');
				 
				 	  if($emp_delete1)
			  {
				 $emp_delete=$emp_delete1; 
			  }
			  else
			  {
				  $emp_delete='0'; 
			  }
				 
				 
				 
    		    $cate_view1 = $this->request->getPost('view2');
				
					 	  if($cate_view1)
			  {
				 $cate_view=$cate_view1; 
			  }
			  else
			  {
				  $cate_view='0'; 
			  }
				 
				
    			 $cate_edit1 = $this->request->getPost('edit2');
				  if($cate_edit1)
			  {
				 $cate_edit=$cate_edit1; 
			  }
			  else
			  {
				  $cate_edit='0'; 
			  }
				 
				 
				 
    			 $cate_delete1 =$this->request->getPost('delete2');
				 
				 	 	  if($cate_delete1)
			  {
				 $cate_delete=$cate_delete1; 
			  }
			  else
			  {
				  $cate_delete='0'; 
			  }
				 
				 
    			
    				
    			 $Com_view1 = $this->request->getPost('view3');
				 
				 	 	 	  if($Com_view1)
			  {
				 $Com_view=$Com_view1; 
			  }
			  else
			  {
				  $Com_view='0'; 
			  }
				 
				 
    			 $Com_edit1 = $this->request->getPost('edit3');
				 	 	 	 	  if($Com_edit1)
			  {
				 $Com_edit=$Com_edit1; 
			  }
			  else
			  {
				  $Com_edit='0'; 
			  }
				 
				 
    			 $Com_delete1 = $this->request->getPost('delete3');
				 
				  	 	 	 	  if($Com_delete1)
			  {
				 $Com_delete=$Com_delete1; 
			  }
			  else
			  {
				  $Com_delete='0'; 
			  }
				 
				 
    				
    			 $plot_view1 = $this->request->getPost('view4');
				 
				 	  	 	 	 	  if($plot_view1)
			  {
				 $plot_view=$plot_view1; 
			  }
			  else
			  {
				  $plot_view='0'; 
			  }
				 
				 
    			 $plot_edit1 =$this->request->getPost('edit4');
				  	  	 	 	 	  if($plot_edit1)
			  {
				 $plot_edit=$plot_edit1; 
			  
			 } else
			  {
				  $plot_edit='0'; 
			  }
				 
				 
				 
    			 $plot_delete1 = $this->request->getPost('delete4');
				   	  	 	 	 	  if($plot_delete1)
			  {
				 $plot_delete=$plot_delete1; 
			  
			}  else
			  {
				  $plot_delete='0'; 
			  }
				 
				 
    				
    			 $Site_m_view1 =$this->request->getPost('view5');
				 
				 		   	  	 	 	 	  if($Site_m_view1)
			  {
				 $Site_m_view=$Site_m_view1; 
			  }
			  else
			  {
				  $Site_m_view='0'; 
			  }
				 
				 
    			 $Site_m_edit1 = $this->request->getPost('edit5');
				  	 	  if($Site_m_edit1)
			  {
				 $Site_m_edit=$Site_m_edit1; 
			  }
			  else
			  {
				  $Site_m_edit='0'; 
			  }
				 
				 
    			 $Site_m_delete1 = $this->request->getPost('delete5');
				 	 	  if($Site_m_delete1)
			  {
				 $Site_m_delete=$Site_m_delete1; 
			  
			 } else
			  {
				  $Site_m_delete='0'; 
			  }
				 
				 
				 
    				
    			 $unit_view1 = $this->request->getPost('view6');
				   if($unit_view1)
			  {
				 $unit_view=$unit_view1; 
			  
			  }else
			  {
				  $unit_view='0'; 
			  }
				 
				 
				 
				 
    			 $unit_edit1 = $this->request->getPost('edit6');
				 	   if($unit_edit1)
			  {
				 $unit_edit=$unit_edit1; 
			  
			  }else
			  {
				  $unit_edit='0'; 
			  }
				 
				 
				 
				 
    			 $unit_delete1 = $this->request->getPost('delete6');
				 	   if($unit_delete1)
			  {
				 $unit_delete=$unit_delete1; 
			  
			 } else
			  {
				  $unit_delete='0'; 
			  }
				 
				 
				 
    			 $Segment_view1 = $this->request->getPost('view7');
				 if($Segment_view1)
			  {
				 $Segment_view=$Segment_view1; 
			  
			 } else
			  {
				  $Segment_view='0'; 
			  }
				 
				 
    			 $Segment_edit1 = $this->request->getPost('edit7');
				 
				  if($Segment_edit1)
			  {
				 $Segment_edit=$Segment_edit1; 
			  
			 } else
			  {
				  $Segment_edit='0'; 
			  }
				 
				 
    			 $Segment_delete1 = $this->request->getPost('delete7');
				   if($Segment_delete1)
			  {
				 $Segment_delete=$Segment_delete1; 
			  
			  }else
			  {
				  $Segment_delete='0'; 
			  }
				 
				 
    				
    			 $Product_c_view1 = $this->request->getPost('view8');
				 	   if($Product_c_view1)
			  {
				 $Product_c_view=$Product_c_view1; 
			  
			  }else
			  {
				  $Product_c_view='0'; 
			  }
				
				 
    			 $Product_c_edit1 = $this->request->getPost('edit8');
				  	   if($Product_c_edit1)
			  {
				 $Product_c_edit=$Product_c_edit1; 
			  
			 } else
			  {
				  $Product_c_edit='0'; 
			  }
				 
				 
    			 $Product_c_delete1 = $this->request->getPost('delete9');
				   	   if($Product_c_delete1)
			  {
				 $Product_c_delete=$Product_c_delete1; 
			  
			  }else
			  {
				  $Product_c_delete='0'; 
			  }
				 
				 
    				
    			 $Materials_view1 = $this->request->getPost('view9');
				    	   if($Materials_view1)
			  {
				 $Materials_view=$Materials_view1; 
			  
			  }else
			  {
				  $Materials_view='0'; 
			  }
				 
				 
				 
    			 $Materials_edit1 = $this->request->getPost('edit9');
				 	    	   if($Materials_edit1)
			  {
				 $Materials_edit=$Materials_edit1; 
			  
			  }else
			  {
				  $Materials_edit='0'; 
			  }
				 
				 
				 
				 
				 
    			 $Materials_delete1 = $this->request->getPost('delete9');
				 	    	   if($Materials_delete1)
			  {
				 $Materials_delete=$Materials_delete1; 
			  
			  }else
			  {
				  $Materials_delete='0'; 
			  }
				 
				 
				 
    				
    			 $Materials_r_view1 =$this->request->getPost('view10');
				    if($Materials_r_view1)
			  {
				 $Materials_r_view=$Materials_r_view1; 
			  
			 } else
			  {
				  $Materials_r_view='0'; 
			  }
				 
				 
				 
    			 $Materials_r_edit1 = $this->request->getPost('edit10');
				 	    if($Materials_r_edit1)
			  {
				 $Materials_r_edit=$Materials_r_edit1; 
			  
			  }else
			  {
				  $Materials_r_edit='0'; 
			  }
				 
				 
    			 $Materials_r_delete1 = $this->request->getPost('delete10');
				 	    if($Materials_r_delete1)
			  {
				 $Materials_r_delete=$Materials_r_delete1; 
			  
			  }else
			  {
				  $Materials_r_delete='0'; 
			  }
				 
				 
    			 $Materials_r_approval1 = $this->request->getPost('approval10');
				 
				  	    if($Materials_r_approval1)
			  {
				 $Materials_r_approval=$Materials_r_approval1; 
			  
			 } else
			  {
				  $Materials_r_approval='0'; 
			  }
				 

    			$data1 = [
    			  's_id' => $inserted_id,
    		    'emp_view' => $emp_view,
    			'emp_edit' => $emp_edit,
    			'emp_delete' => $emp_delete,
    			'cate_view' => $cate_view,
    			'cate_edit' => $cate_edit,
    			'cate_delete' => $cate_delete,
    			
    				
    			'Com_view' => $Com_view,
    			'Com_edit' => $Com_edit,
    			'Com_delete' => $Com_delete,
    				
    			'plot_view' => $plot_view,
    			'plot_edit' => $plot_edit,
    			'plot_delete' => $plot_delete,
    				
    			'Site_m_view' => $Site_m_view,
    			'Site_m_edit' => $Site_m_edit,
    			'Site_m_delete' => $Site_m_delete,
    				
    			'unit_view' => $unit_view,
    			'unit_edit' => $unit_edit,
    			'unit_delete' => $unit_delete,
    				
    			'Segment_view' => $Segment_view,
    			'Segment_edit' => $Segment_edit,
    			'Segment_delete' => $Segment_delete,
    				
    			'Product_c_view' => $Product_c_view,
    			'Product_c_edit' => $Product_c_edit,
    			'Product_c_delete' => $Product_c_delete,
    				
    			'Materials_view' => $Materials_view,
    			'Materials_edit' => $Materials_edit,
    			'Materials_delete' => $Materials_delete,
    				
    			'Materials_r_view' => $Materials_r_view,
    			'Materials_r_edit' => $Materials_r_edit,
    			'Materials_r_delete' => $Materials_r_delete,
    			'Materials_r_approval' => $Materials_r_approval,
    		];
    		



	
		
		 $staffModel1 = new Staff_roles_Model();
		$staffModel1->insert($data1);
		
		}
		
		

		$message = 'Staff info has been saved.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/staffs'),
		));
		exit();
	}
}
	public function edit($id)
	{
		$staffModel = new StaffModel();
		$staff = $staffModel->find($id);
		
		
	$db = \Config\Database::connect();

   
      
        $builder =$db->query("SELECT * FROM `staff_roles` WHERE `s_id`='$id'");
        $staff1 = $builder->getResultArray();
   
 
		return view('staffs/edit', 
		[
			'staff' => $staff,
			'staff1' => $staff1,
		]);
	}

	public function update($id)
	{
	
	$data = [
			'first_name' => $this->request->getPost('first_name'),
			'last_name' => $this->request->getPost('last_name'),
			'email' => $this->request->getPost('email'),
			'phone' => $this->request->getPost('phone'),
			'password' => md5($this->request->getPost('password')),
			'position' => $this->request->getPost('position'),
		];



		if ($this->request->getPost('password'))
		{
			$data['password'] = md5($this->request->getPost('password'));
		}


		
		

		$staffModel = new StaffModel();
	
		
		  if($staffModel->update($id, $data))
		   {
		  $role_id=$this->request->getPost('role_id');
		    
		      $emp_view1 = $this->request->getPost('view1');
			  if($emp_view1)
			  {
				 $emp_view=$emp_view1; 
			  }
			  else
			  {
				  $emp_view='0'; 
			  }
 
    			 $emp_edit1 =$this->request->getPost('edit1');
				  if($emp_edit1)
			  {
				 $emp_edit=$emp_edit1; 
			  }
			  else
			  {
				  $emp_edit='0'; 
			  }
				 
    			 $emp_delete1 = $this->request->getPost('delete1');
				 
				 	  if($emp_delete1)
			  {
				 $emp_delete=$emp_delete1; 
			  }
			  else
			  {
				  $emp_delete='0'; 
			  }
				 
				 
				 
    		    $cate_view1 = $this->request->getPost('view2');
				
					 	  if($cate_view1)
			  {
				 $cate_view=$cate_view1; 
			  }
			  else
			  {
				  $cate_view='0'; 
			  }
				 
				
    			 $cate_edit1 = $this->request->getPost('edit2');
				  if($cate_edit1)
			  {
				 $cate_edit=$cate_edit1; 
			  }
			  else
			  {
				  $cate_edit='0'; 
			  }
				 
				 
				 
    			 $cate_delete1 =$this->request->getPost('delete2');
				 
				 	 	  if($cate_delete1)
			  {
				 $cate_delete=$cate_delete1; 
			  }
			  else
			  {
				  $cate_delete='0'; 
			  }
				 
				 
    			
    				
    			 $Com_view1 = $this->request->getPost('view3');
				 
				 	 	 	  if($Com_view1)
			  {
				 $Com_view=$Com_view1; 
			  }
			  else
			  {
				  $Com_view='0'; 
			  }
				 
				 
    			 $Com_edit1 = $this->request->getPost('edit3');
				 	 	 	 	  if($Com_edit1)
			  {
				 $Com_edit=$Com_edit1; 
			  }
			  else
			  {
				  $Com_edit='0'; 
			  }
				 
				 
    			 $Com_delete1 = $this->request->getPost('delete3');
				 
				  	 	 	 	  if($Com_delete1)
			  {
				 $Com_delete=$Com_delete1; 
			  }
			  else
			  {
				  $Com_delete='0'; 
			  }
				 
				 
    				
    			 $plot_view1 = $this->request->getPost('view4');
				 
				 	  	 	 	 	  if($plot_view1)
			  {
				 $plot_view=$plot_view1; 
			  }
			  else
			  {
				  $plot_view='0'; 
			  }
				 
				 
    			 $plot_edit1 =$this->request->getPost('edit4');
				  	  	 	 	 	  if($plot_edit1)
			  {
				 $plot_edit=$plot_edit1; 
			  
			 } else
			  {
				  $plot_edit='0'; 
			  }
				 
				 
				 
    			 $plot_delete1 = $this->request->getPost('delete4');
				   	  	 	 	 	  if($plot_delete1)
			  {
				 $plot_delete=$plot_delete1; 
			  
			}  else
			  {
				  $plot_delete='0'; 
			  }
				 
				 
    				
    			 $Site_m_view1 =$this->request->getPost('view5');
				 
				 		   	  	 	 	 	  if($Site_m_view1)
			  {
				 $Site_m_view=$Site_m_view1; 
			  }
			  else
			  {
				  $Site_m_view='0'; 
			  }
				 
				 
    			 $Site_m_edit1 = $this->request->getPost('edit5');
				  	 	  if($Site_m_edit1)
			  {
				 $Site_m_edit=$Site_m_edit1; 
			  }
			  else
			  {
				  $Site_m_edit='0'; 
			  }
				 
				 
    			 $Site_m_delete1 = $this->request->getPost('delete5');
				 	 	  if($Site_m_delete1)
			  {
				 $Site_m_delete=$Site_m_delete1; 
			  
			 } else
			  {
				  $Site_m_delete='0'; 
			  }
				 
				 
				 
    				
    			 $unit_view1 = $this->request->getPost('view6');
				   if($unit_view1)
			  {
				 $unit_view=$unit_view1; 
			  
			  }else
			  {
				  $unit_view='0'; 
			  }
				 
				 
				 
				 
    			 $unit_edit1 = $this->request->getPost('edit6');
				 	   if($unit_edit1)
			  {
				 $unit_edit=$unit_edit1; 
			  
			  }else
			  {
				  $unit_edit='0'; 
			  }
				 
				 
				 
				 
    			 $unit_delete1 = $this->request->getPost('delete6');
				 	   if($unit_delete1)
			  {
				 $unit_delete=$unit_delete1; 
			  
			 } else
			  {
				  $unit_delete='0'; 
			  }
				 
				 
				 
    			 $Segment_view1 = $this->request->getPost('view7');
				 if($Segment_view1)
			  {
				 $Segment_view=$Segment_view1; 
			  
			 } else
			  {
				  $Segment_view='0'; 
			  }
				 
				 
    			 $Segment_edit1 = $this->request->getPost('edit7');
				 
				  if($Segment_edit1)
			  {
				 $Segment_edit=$Segment_edit1; 
			  
			 } else
			  {
				  $Segment_edit='0'; 
			  }
				 
				 
    			 $Segment_delete1 = $this->request->getPost('delete7');
				   if($Segment_delete1)
			  {
				 $Segment_delete=$Segment_delete1; 
			  
			  }else
			  {
				  $Segment_delete='0'; 
			  }
				 
				 
    				
    			 $Product_c_view1 = $this->request->getPost('view8');
				 	   if($Product_c_view1)
			  {
				 $Product_c_view=$Product_c_view1; 
			  
			  }else
			  {
				  $Product_c_view='0'; 
			  }
				
				 
    			 $Product_c_edit1 = $this->request->getPost('edit8');
				  	   if($Product_c_edit1)
			  {
				 $Product_c_edit=$Product_c_edit1; 
			  
			 } else
			  {
				  $Product_c_edit='0'; 
			  }
				 
				 
    			 $Product_c_delete1 = $this->request->getPost('delete9');
				   	   if($Product_c_delete1)
			  {
				 $Product_c_delete=$Product_c_delete1; 
			  
			  }else
			  {
				  $Product_c_delete='0'; 
			  }
				 
				 
    				
    			 $Materials_view1 = $this->request->getPost('view9');
				    	   if($Materials_view1)
			  {
				 $Materials_view=$Materials_view1; 
			  
			  }else
			  {
				  $Materials_view='0'; 
			  }
				 
				 
				 
    			 $Materials_edit1 = $this->request->getPost('edit9');
				 	    	   if($Materials_edit1)
			  {
				 $Materials_edit=$Materials_edit1; 
			  
			  }else
			  {
				  $Materials_edit='0'; 
			  }
				 
				 
				 
				 
				 
    			 $Materials_delete1 = $this->request->getPost('delete9');
				 	    	   if($Materials_delete1)
			  {
				 $Materials_delete=$Materials_delete1; 
			  
			  }else
			  {
				  $Materials_delete='0'; 
			  }
				 
				 
				 
    				
    			 $Materials_r_view1 =$this->request->getPost('view10');
				    if($Materials_r_view1)
			  {
				 $Materials_r_view=$Materials_r_view1; 
			  
			 } else
			  {
				  $Materials_r_view='0'; 
			  }
				 
				 
				 
    			 $Materials_r_edit1 = $this->request->getPost('edit10');
				 	    if($Materials_r_edit1)
			  {
				 $Materials_r_edit=$Materials_r_edit1; 
			  
			  }else
			  {
				  $Materials_r_edit='0'; 
			  }
				 
				 
    			 $Materials_r_delete1 = $this->request->getPost('delete10');
				 	    if($Materials_r_delete1)
			  {
				 $Materials_r_delete=$Materials_r_delete1; 
			  
			  }else
			  {
				  $Materials_r_delete='0'; 
			  }
				 
				 
    			 $Materials_r_approval1 = $this->request->getPost('approval10');
				 
				  	    if($Materials_r_approval1)
			  {
				 $Materials_r_approval=$Materials_r_approval1; 
			  
			 } else
			  {
				  $Materials_r_approval='0'; 
			  }
				 

    			$data1 = [
    		
    		    'emp_view' => $emp_view,
    			'emp_edit' => $emp_edit,
    			'emp_delete' => $emp_delete,
    			'cate_view' => $cate_view,
    			'cate_edit' => $cate_edit,
    			'cate_delete' => $cate_delete,
    			
    				
    			'Com_view' => $Com_view,
    			'Com_edit' => $Com_edit,
    			'Com_delete' => $Com_delete,
    				
    			'plot_view' => $plot_view,
    			'plot_edit' => $plot_edit,
    			'plot_delete' => $plot_delete,
    				
    			'Site_m_view' => $Site_m_view,
    			'Site_m_edit' => $Site_m_edit,
    			'Site_m_delete' => $Site_m_delete,
    				
    			'unit_view' => $unit_view,
    			'unit_edit' => $unit_edit,
    			'unit_delete' => $unit_delete,
    				
    			'Segment_view' => $Segment_view,
    			'Segment_edit' => $Segment_edit,
    			'Segment_delete' => $Segment_delete,
    				
    			'Product_c_view' => $Product_c_view,
    			'Product_c_edit' => $Product_c_edit,
    			'Product_c_delete' => $Product_c_delete,
    				
    			'Materials_view' => $Materials_view,
    			'Materials_edit' => $Materials_edit,
    			'Materials_delete' => $Materials_delete,
    				
    			'Materials_r_view' => $Materials_r_view,
    			'Materials_r_edit' => $Materials_r_edit,
    			'Materials_r_delete' => $Materials_r_delete,
    			'Materials_r_approval' => $Materials_r_approval,
    		];
    		
    	
    		
    		
 $Staff_roles_Model = new Staff_roles_Model();
		$Staff_roles_Model->update($role_id,$data1);
		   }

		

		$message = 'Staff info has been updated.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		echo json_encode(array(
			'result' => 'success',
			'redirect_url' => base_url('/staffs'),
		));
		exit();
	}

	public function delete($id)
	{
	    
	    
		$staffModel = new StaffModel();
		$staffModel->delete($id);

		$message = 'Staff info has been deleted.';

		$session = session();
		$session->setFlashdata('flash_result', 'success');
		$session->setFlashdata('flash_message', $message);

		return redirect()->to('/staffs');
	}
}

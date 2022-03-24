<?php

namespace App\Controllers;
use App\Models\job_card_model;

class Jobcard extends BaseController
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
	    
	  
	    
		$jobModel = new job_card_model();
	
		
		$db = \Config\Database::connect();
		  $builder = $db->table('job_card_img_mst');
      
          $builder->select('jobcard_id');
          $query = $builder->distinct();
        $jobs = $query->get();
   $querynwe = $jobs->getResult();
 
    $array = json_decode(json_encode($querynwe), true);


		

		return view('jobcard/index', [
			'page_name' => 'jobcard',
			'jobs' => $array,
		]);
	}
	
	
		public function edit($id)
 	{
		$jobModel = new job_card_model();
		$job = $jobModel->find($id);
		
		$unitModel = new job_card_model();
		$unitModel->where('jobcard_id',$id);
		$unit = $unitModel->findAll();
	
	
	 $db = \Config\Database::connect();
	
        
        $builder = $db->table('job_card_img_mst');
         $builder->select('folder_name,jobcard_id,id');
          $builder->distinct();
         $builder->where('jobcard_id', $id);
         $builder->distinct();
        $query = $builder->get();
 $querynwe = $query->getResult();
 
    $array = json_decode(json_encode($querynwe), true);
    
 

		return view('jobcard/edit', [
		    'page_name' => 'jobcard Folders',
 			'job' => $array,
		]);
	}


		public function viewimages($id)
 	{
		$jobModel = new job_card_model();
		$job = $jobModel->find($id);
		
		$unitModel = new job_card_model();
		$unitModel->where('jobcard_id',$id);
		$unit = $unitModel->findAll();
	
	
	 $db = \Config\Database::connect();
	
        
        $builder = $db->table('job_card_img_mst');
        $builder->where('id', $id);
        $query = $builder->get();
 $querynwe = $query->getResult();
 
    $array = json_decode(json_encode($querynwe), true);
   

		return view('jobcard/Jobcard_Images', [
		      'page_name' => 'Jobcard Images',
 			'job' => $array,
		]);
	}

		public function report()
 	{
 	    
 		$jobModel = new job_card_model();
	
		
		$db = \Config\Database::connect();
		  $builder = $db->table('job_card_img_mst');
      
          $builder->select('jobcard_id');
          $query = $builder->distinct();
        $jobs = $query->get();
   $querynwe = $jobs->getResult();
 
    $array = json_decode(json_encode($querynwe), true);


		

		return view('jobcard/search', [
			'page_name' => 'jobcard Report',
			'jobs' => $array,
		]);    
 	}






	public function search_submit()
 	{
 	    
 	    $date1=	$this->request->getPost('date1');
 	    $date2=	$this->request->getPost('date2');
 	    
 	     $db = \Config\Database::connect();
		 $f_date=date_create($date1);
		$f_date1= date_format($f_date,"d/m/Y");
		
		 $to_date=date_create($date2);
		$to_date1= date_format($to_date,"d/m/Y");
        
        $builder = $db->table('jobcard_master');
	$builder->where("card_date BETWEEN '$f_date1' AND '$to_date1'");
    $query = $builder->get();
	

      
 $querynwe = $query->getResult();

 
    $array = json_decode(json_encode($querynwe), true);

		return view('jobcard/report', [
		    'page_name' => 'search',
 			'jobcard' => $array,
 			'date1' => $date1,
 			'date2' => $date2,
		]);
	}



	public function woker_seacrch()
 	{
 	    
 	    $date1=	$this->request->getPost('wrk');
 	  
 	    
 	     $db = \Config\Database::connect();
		
 
	
	$builder = $db->table('work_shedule_master');
$builder->select('*');
// $builder->join('work_shedule_detail', 'work_shedule_detail.w_s_m_id=work_shedule_master.id');
$builder->where('work_shedule_master.jobcard_id',$date1);
$query = $builder->get();

      
 $querynwe = $query->getResult();
 $array = json_decode(json_encode($querynwe), true);

		return view('jobcard/report_jobcard', [
		    'page_name' => 'search',
 			'jobcard' => $array,
 			
		]);
	}



}

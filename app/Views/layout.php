<?php


	use App\Models\Staff_roles_Model;
 
 
$home_collapse = $staff_collapse = $location_collapse = $Item_collapse= $material_collapse= $Employeesl_collapse=$Category_collapse= $Work_collapse='collapsed';
if (in_array($page_name, array('dashboard')))
{
	$home_collapse = '';
}

else if (in_array($page_name, array('employees')))
{
	$Employeesl_collapse = '';
}


else if (in_array($page_name, array('Users','Staff Privileges')))
{
	$staff_collapse = '';
}


else if (in_array($page_name, array('jobs')))
{
	$Category_collapse = '';
}


else if (in_array($page_name, array('Company','Plot','Site')))
{
	$location_collapse = '';
}

else if (in_array($page_name, array('Unit','Segment','Product Category','materials')))
{
	$Item_collapse = '';
}
else if (in_array($page_name, array('materials_request')))
{
	$material_collapse = '';
}

else if (in_array($page_name, array('Description')))
{
	$Work_collapse = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InterCol Admin Console</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="//getbootstrap.com/docs/5.1/examples/sidebars/sidebars.css">
	<meta name="theme-color" content="#7952b3">
	<?= csrf_meta() ?>
	<?= $this->renderSection('styles') ?>
	<style type="text/css">
	.sidebar-menu button {
		width: 100%;
	}
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #944747 !important;">
			<a class="navbar-brand" href="#"><img src="/material_img/logo-top.png" style="width:10%;"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<!--<li class="nav-item <?=($page_name == 'employees') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/employees')?>">Employees</a>-->
					<!--</li>-->
					<!--<li class="nav-item <?=($page_name == 'jobs') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/jobs')?>">Category </a>-->
					<!--</li>-->
					
					
					<!--	<li class="nav-item <?=($page_name == 'Company') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/Cmpny')?>">Company</a>-->
					<!--</li>-->
					
					<!--	<li class="nav-item <?=($page_name == 'Plot') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/Plot')?>">Plot</a>-->
					<!--</li>-->
					
					<!--	<li class="nav-item <?=($page_name == 'Site') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/Site')?>">Site Master</a>-->
					<!--</li>-->
					
					<!--	<li class="nav-item <?=($page_name == 'Unit') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/Unit')?>">Unit</a>-->
					<!--</li>-->
					<!--	<li class="nav-item <?=($page_name == 'Segment') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/Segment')?>">Segment</a>-->
					<!--</li>-->
					
					<!--	<li class="nav-item <?=($page_name == 'Product Category') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/P_category')?>">Product Category</a>-->
					<!--</li>-->
					
					
					<!--<li class="nav-item <?=($page_name == 'materials') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/materials')?>">Materials</a>-->
					<!--</li>-->
					
					<!--	<li class="nav-item <?=($page_name == 'materials_request') ? 'active':''?>">-->
					<!--	<a class="nav-link" href="<?=base_url('/materials_request')?>">Materials Request</a>-->
					<!--</li>-->
					
					
				</ul>
				<ul class="navbar-nav float-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=session('_admin_name')?></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?=base_url()?>/home/logout">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-2" style="background-color: #94474730;">
				<div class="flex-shrink-0">
					<p></p>
				    <ul class="list-unstyled ps-0 sidebar-menu">
				      <li class="mb-1">
				      	<button class="btn btn-toggle align-items-center rounded <?=$home_collapse?>" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
				          Home
				        </button>
				        <div class="collapse <?=($page_name == 'dashboard') ? 'show':''?>" id="home-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/dashboard')?>" class="<?=($page_name == 'dashboard') ? 'text-primary':'text-secondary'?>">Dashboard</a></li>
				          </ul>
				        </div>
				      </li>
				      
		<?php 
		
	
		if(session('_admin_role')!='manager')
		{
		 
	   $db = \Config\Database::connect();
		$Emp_id = session('_admin_role');
         $unitModel = new Staff_roles_Model();
	
        $builder = $db->table('staff_roles');
        $builder->where('s_id', $Emp_id);
      //	$row3 = $unitModel->findAll();
      	
      	
        $query = $builder->get();
  $querynwe = $query->getResult();
  
    $array = json_decode(json_encode($querynwe), true);
 
    foreach ($array as $row3) 
    {
    
	
		 
		 
// 		$staff_roles="select * from  staff_roles where s_id='".session('_admin_id')."' ";

// 	$staff_roles_rs=mysqli_query($conn,$staff_roles);
	        
// $row3 = mysqli_fetch_assoc($staff_roles_rs);

  
    $emp_view=$row3['emp_view'];
    
  
    
     $cate_view=$row3['cate_view'];
     
       $Com_view=$row3['Com_view'];
       
       
       $plot_view=$row3['plot_view'];
    
     $Site_m_view=$row3['Site_m_view'];
     
       $unit_view=$row3['unit_view'];
       
       
       
       $Segment_view=$row3['Segment_view'];
    
     $Product_c_view=$row3['Product_c_view'];
     
       $Materials_view=$row3['Materials_view'];
       
       
       
       $Materials_r_view=$row3['Materials_r_view'];
    
    $work_st_view=$row3['work_st_view'];
       
       
   if($emp_view=='1') 
   {
   
   ?>
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Employeesl_collapse?>" data-bs-toggle="collapse" data-bs-target="#Employees_collapse" aria-expanded="false">
				         Employees
				        </button>
				        <div class="collapse <?php if ($Employeesl_collapse == ''):?>show <?php endif;?>" id="Employees_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/employees')?>" class="<?=($page_name == 'employees') ? 'text-primary':'text-secondary'?>">Employees</a></li>
				            
				          </ul>
				        </div>
				      </li>  
				 <?php
   }
  
    	if(session('_admin_name')=='admin')
    	{
	?>
				      
				      <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$staff_collapse?>" data-bs-toggle="collapse" data-bs-target="#staffs-collapse" aria-expanded="false">
				          Users & Privileges
				        </button>
				        <div class="collapse <?php if ($staff_collapse == ''):?>show <?php endif;?>" id="staffs-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/staffs')?>" class="<?=($page_name == 'Users') ? 'text-primary':'text-secondary'?>">Users</a></li>
				          <!--  <li><a href="<?=base_url('/staffs/list/supervisor')?>" class="<?=($page_name == 'supervisor') ? 'text-primary':'text-secondary'?>">Supervisors</a></li>-->
				         </ul>
				        </div>
				      </li>
				      
				 <?php
   }
  
    	if($cate_view=='1')
    	{
	?>
		
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Category_collapse?>" data-bs-toggle="collapse" data-bs-target="#Category_collapse" aria-expanded="false">
				        Category
				        </button>
				        <div class="collapse <?php if ($Category_collapse == ''):?>show <?php endif;?>" id="Category_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/jobs')?>" class="<?=($page_name == 'jobs') ? 'text-primary':'text-secondary'?>">Category</a></li>
				            
				          </ul>
				        </div>
				      </li>  
				      
				  				 <?php
   }
  
    	if($Com_view=='1')
    	{
	?>
		    
				      
				         <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$location_collapse?>" data-bs-toggle="collapse" data-bs-target="#location-collapse" aria-expanded="false">
				         Location
				        </button>
				        <div class="collapse <?php if ($location_collapse == ''):?>show <?php endif;?>" id="location-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				              	 <?php
   
  
    	if($Com_view=='1')
    	{
	?>
				            <li><a href="<?=base_url('/Cmpny')?>" class="<?=($page_name == 'Company') ? 'text-primary':'text-secondary'?>">Company</a></li>
				            
				            
				            	 <?php
   }
  
    	if($plot_view=='1')
    	{
	?>
				            <li><a href="<?=base_url('/Plot')?>" class="<?=($page_name == 'Plot') ? 'text-primary':'text-secondary'?>">Plot</a></li>
				            	 <?php
   }
  
    	if($Site_m_view=='1')
    	{
	?>
				            
				             <li><a href="<?=base_url('/Site')?>" class="<?=($page_name == 'Site') ? 'text-primary':'text-secondary'?>">Site Master</a></li>
				             
				             	 <?php
   }
  
    
	?>
				          </ul>
				        </div>
				      </li>
				   				  				 <?php
   }
  
    	if($unit_view=='1')
    	{
	?>
		    
				      
				        
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Item_collapse?>" data-bs-toggle="collapse" data-bs-target="#Item-collapse" aria-expanded="false">
				         Item
				        </button>
				        <div class="collapse <?php if ($Item_collapse == ''):?>show <?php endif;?>" id="Item-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				             <?php
   }
  
    	if($unit_view=='1')
    	{
	?>  
				            <li><a href="<?=base_url('/Unit')?>" class="<?=($page_name == 'Unit') ? 'text-primary':'text-secondary'?>">Unit</a></li>
				            
				             <?php
   }
  
    	if($Segment_view=='1')
    	{
	?>
				            <li><a href="<?=base_url('/Segment')?>" class="<?=($page_name == 'Segment') ? 'text-primary':'text-secondary'?>">Segment</a></li>
				            <?php
   }
  
    	if($Product_c_view=='1')
    	{
	?> 
				             <li><a href="<?=base_url('/P_category')?>" class="<?=($page_name == 'Product Category') ? 'text-primary':'text-secondary'?>">Product Category</a></li>
				             
				       <?php
   }
  
    	if($Materials_view=='1')
    	{
	?>       
				              <li><a href="<?=base_url('/materials')?>" class="<?=($page_name == 'materials') ? 'text-primary':'text-secondary'?>">Materials</a></li>
				          </ul>
				        </div>
				      </li>
				       <?php
   }
  
    
    
    	if($Materials_r_view=='1')
    	{
	?>       
		
				      
				    
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$material_collapse?>" data-bs-toggle="collapse" data-bs-target="#material_collapse" aria-expanded="false">
				         Materials Request
				        </button>
				        <div class="collapse <?php if ($material_collapse == ''):?>show <?php endif;?>" id="material_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/materials_request')?>" class="<?=($page_name == 'materials_request') ? 'text-primary':'text-secondary'?>">Materials Request</a></li>
				            
				          </ul>
				        </div>
				      </li> 				       <?php
   }
   if($work_st_view=='1')
   {
  ?> 
  
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Work_collapse?>" data-bs-toggle="collapse" data-bs-target="#Work_collapse" aria-expanded="false">
				        Work Status
				        </button>
				        <div class="collapse <?php if ($Work_collapse == ''):?>show <?php endif;?>" id="Work_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/Work_dis')?>" class="<?=($page_name == 'Description') ? 'text-primary':'text-secondary'?>">Work Status</a></li>
				            
				          </ul>
				        </div>
				      </li>   
				      
  
  
         <?php
   }?>
				      
				      <li class="border-top my-3"></li>
				    </ul>
				</div>
				
				<?php
		}
		}
		else
		{
		?>
				
					
			    
  
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Employeesl_collapse?>" data-bs-toggle="collapse" data-bs-target="#Employees_collapse" aria-expanded="false">
				         Employees
				        </button>
				        <div class="collapse <?php if ($Employeesl_collapse == ''):?>show <?php endif;?>" id="Employees_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/employees')?>" class="<?=($page_name == 'employees') ? 'text-primary':'text-secondary'?>">Employees</a></li>
				            
				          </ul>
				        </div>
				      </li>  

				      
				      <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$staff_collapse?>" data-bs-toggle="collapse" data-bs-target="#staffs-collapse" aria-expanded="false">
				          Users & Privileges
				        </button>
				        <div class="collapse <?php if ($staff_collapse == ''):?>show <?php endif;?>" id="staffs-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/staffs')?>" class="<?=($page_name == 'Users') ? 'text-primary':'text-secondary'?>">Users</a></li>
				         <li><a href="<?=base_url('/Staff_roles')?>" class="<?=($page_name == 'Staff Privileges') ? 'text-primary':'text-secondary'?>">Privileges</a></li>
				         </ul>
				        </div>
				        
				        
				      </li>
				      
				      
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Category_collapse?>" data-bs-toggle="collapse" data-bs-target="#Category_collapse" aria-expanded="false">
				        Category
				        </button>
				        <div class="collapse <?php if ($Category_collapse == ''):?>show <?php endif;?>" id="Category_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/jobs')?>" class="<?=($page_name == 'jobs') ? 'text-primary':'text-secondary'?>">Category</a></li>
				            
				          </ul>
				        </div>
				      </li>  
				      
				      
				      
				         <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$location_collapse?>" data-bs-toggle="collapse" data-bs-target="#location-collapse" aria-expanded="false">
				         Location
				        </button>
				        <div class="collapse <?php if ($location_collapse == ''):?>show <?php endif;?>" id="location-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/Cmpny')?>" class="<?=($page_name == 'Company') ? 'text-primary':'text-secondary'?>">Company</a></li>
				            <li><a href="<?=base_url('/Plot')?>" class="<?=($page_name == 'Plot') ? 'text-primary':'text-secondary'?>">Plot</a></li>
				             <li><a href="<?=base_url('/Site')?>" class="<?=($page_name == 'Site') ? 'text-primary':'text-secondary'?>">Site Master</a></li>
				          </ul>
				        </div>
				      </li>
				      
				      
				        
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Item_collapse?>" data-bs-toggle="collapse" data-bs-target="#Item-collapse" aria-expanded="false">
				         Item
				        </button>
				        <div class="collapse <?php if ($Item_collapse == ''):?>show <?php endif;?>" id="Item-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/Unit')?>" class="<?=($page_name == 'Unit') ? 'text-primary':'text-secondary'?>">Unit</a></li>
				            <li><a href="<?=base_url('/Segment')?>" class="<?=($page_name == 'Segment') ? 'text-primary':'text-secondary'?>">Segment</a></li>
				             <li><a href="<?=base_url('/P_category')?>" class="<?=($page_name == 'Product Category') ? 'text-primary':'text-secondary'?>">Product Category</a></li>
				              <li><a href="<?=base_url('/materials')?>" class="<?=($page_name == 'materials') ? 'text-primary':'text-secondary'?>">Materials</a></li>
				          </ul>
				        </div>
				      </li>
				      
				      
				    
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$material_collapse?>" data-bs-toggle="collapse" data-bs-target="#material_collapse" aria-expanded="false">
				         Materials Request
				        </button>
				        <div class="collapse <?php if ($material_collapse == ''):?>show <?php endif;?>" id="material_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/materials_request')?>" class="<?=($page_name == 'materials_request') ? 'text-primary':'text-secondary'?>">Materials Request</a></li>
				            
				          </ul>
				        </div>
				      </li>  
				      
				      
				     
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded <?=$Work_collapse?>" data-bs-toggle="collapse" data-bs-target="#Work_collapse" aria-expanded="false">
				        Work Status
				        </button>
				        <div class="collapse <?php if ($Work_collapse == ''):?>show <?php endif;?>" id="Work_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="<?=base_url('/Work_dis')?>" class="<?=($page_name == 'Description') ? 'text-primary':'text-secondary'?>">Work Status</a></li>
				            
				          </ul>
				        </div>
				      </li>   
				      
				      
				      
				      <li class="border-top my-3"></li>
				    </ul>
				</div>		
					
						<?php
		}?>	
			</div>
			
			
			
			<div class="col-10">
				<p></p>
				<?php if (session('flash_result')):?>
				<div class="alert alert-<?=session('flash_result')?>">
				  <strong>Success!</strong> <?=session('flash_message')?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php endif;?>
				<?= $this->renderSection('content') ?>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
	<footer>
		<p>&nbsp;</p>
	</footer>
	<script>
	var base_url = "<?=base_url()?>";
	</script>
	<script src="<?=base_url()?>/js/jquery-3.5.1.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="<?=base_url()?>/js/bootstrap.min.js"></script>
	<script src="//getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="//getbootstrap.com/docs/5.1/examples/sidebars/sidebars.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
	<?= $this->renderSection('bootstrap_modals') ?>
	<?= $this->renderSection('scripts') ?>
	
<style>

	.text-primary 
	{
        color: #944747!important;
    }
    .btn-toggle:hover, .btn-toggle:focus 
    {
        background-color: #c9b5b5 !important;
    }
    .btn-toggle-nav a:hover, .btn-toggle-nav a:focus
    {
       background-color: #c9b5b5 !important; 
    }
    a.text-primary:focus, a.text-primary:hover 
    {
        color: #944747!important;
    }
    .btn.focus, .btn:focus 
    {
        box-shadow: 0 0 0 0.2rem rgb(148 71 71 / 29%) !important;
    }
    
</style>

</body>
</html>
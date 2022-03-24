<?php 
 require_once 'API/db.php';
use App\Models\unitModel;


?>
<?php
	use App\Models\Staff_roles_Model;
?>

 <?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="display-4 text-capitalize">
 Report
 
</h1>
<hr>

<div class="table-responsive">
	<table id="table-materials" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th>Date </th>
           
             <th>Jobcard </th>
             <th>C/R</th>
            <th>Plot</th>
             <th>site</th>
             
             
             <th>Product Category</th>
            <th>location</th>
             <th>Description</th>
             
         
              
            <th width="10%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $counter=1; 
      
      foreach ($jobcard as $material):?>
        <tr>
          <td><?=$counter?></td>
          <td><?=$material['card_date']?></td>
             <td><?=$material['job_id']?></td>
                <td><?=$material['comp_or_resi']?></td>
          
        	<?php	
	  
	    	$log_in="select * from Plot where id='".$material['plot']."' ";

	        $log_in_rs=mysqli_query($conn,$log_in);
	         while($row2 = mysqli_fetch_array($log_in_rs))
  {
    $name=$row2['name'];  
 } ?>


 <td><?php echo $name;?></td>


  	<?php	
	  
	    	$Product_category="select * from  Site where id='".$material['site']."' ";

	        $Product_category_rs=mysqli_query($conn,$Product_category);
	        
	     
	   
 while($row3 = mysqli_fetch_array($Product_category_rs))
  {
    $Site_name=$row3['name'];  
   
      
  }
			

?>
<td><?php echo $Site_name;?></td>

<td>
  	<?php	
	  
	    	$Segment1="select * from  jobcard_det where job_id='".$material['job_id']."' ";

	        $Segment_rs=mysqli_query($conn,$Segment1);
	        
	     
			  while($row4 = mysqli_fetch_array($Segment_rs))
  {
      
    $cat_name=$row4['categories']; 
    
       	$Product_category1="select * from  job_types where id='".$cat_name."' ";

	        $Product_category_rs1=mysqli_query($conn,$Product_category1);
	        
	     
	   
 while($row5 = mysqli_fetch_array($Product_category_rs1))
  {
    $cate=$row5['name'];  
   ?>
<?php echo $cate;?><br>
<?php   }
   
      
  }
			

?>
</td>
           
               <td><?=$material['location']?></td> 
               <td><?=$material['work_description']?></td> 
            
         
          <td>
              
                         	<?php 
    
	   $db = \Config\Database::connect();
		$Emp_id = session('_admin_id');
         $unitModel = new Staff_roles_Model();
	
        $builder = $db->table('staff_roles');
        $builder->where('s_id', $Emp_id);
      	$unit = $unitModel->findAll();
     
      
   if($unit[0]['Materials_edit']=='1') 
   { ?> 
              
              
            <a class="btn btn-sm text-primary" title="Edit" data-toggle="modal" data-target="#material-edit-Modal" data-name="<?=$material['name']?>" data-href="<?=base_url('/materials/edit/'.$material['id'])?>">
              <i class="far fa-edit"></i>
            </a>
            
            	 <?php } if($unit[0]['Materials_delete']=='1') { ?>
            
            <a class="btn btn-sm text-danger" title="Delete" data-toggle="modal" data-target="#material-delete-Modal" data-href="<?=base_url('/materials/delete/'.$material['id'])?>" data-name="<?=$material['name']?>">
              <i class="far fa-trash-alt"></i>
            </a>
              <?php }?>
            
            
            
            
          </td>
        </tr>
      <?php 
        $counter++;
      
      endforeach;?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles')?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<?= $this->endSection()?>

<?= $this->section('scripts')?>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
var tableMaterial;
$(document).ready(function(){
  tableMaterial = $('#table-materials').DataTable({});
  $('#material-edit-Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var action = button.data('href');
    
    var modal = $(this)
    modal.find('.modal-title').text(name);
    modal.find('.modal-body').html("Loading...").load(action);
  });
  $('#material-delete-Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var action = button.data('href');

    var modal = $(this)
    modal.find('.modal-title').text(name);
    modal.find(".btn-delete").attr("href", action);
  });
});
function materialAdd(event, form){
  event.preventDefault(0);
  var action = $(form).attr("action")
  var form_data = $(form).serialize();
  $.post(action, form_data, function(data){
    if (data.result == 'success'){
      $('#material-add-Modal').modal("hide");
      document.location.href = data.redirect_url;
    }
    else {
        $(".errors").html(data.message);
        $(form).find("#"+data.elementID).focus();
        $(form).append(data.csrf_field);
    }
    
  }, 'json');
}
function materialEdit(event, form){
  event.preventDefault(0);
  var action = $(form).attr("action")
  var form_data = $(form).serialize();
  $.post(action, form_data, function(data){
    if (data.result == 'success'){
      $('#material-edit-Modal').modal("hide");
      document.location.href = data.redirect_url;
    }
  }, 'json');
}
</script>
<?= $this->endSection()?>

<?= $this->section('bootstrap_modals')?>
<!-- Add Modal -->


<!-- Edit Modal -->
<div class="modal fade" id="material-edit-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="material-delete-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="" class="btn btn-danger btn-delete">Yes</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

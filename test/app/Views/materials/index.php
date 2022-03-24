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
  Materials
  <button class="btn btn-light text-primary" title="Add" data-toggle="modal" data-target="#material-add-Modal">
    <i class="far fa-plus-square"></i> Add
  </button>
</h1>
<hr>

<div class="table-responsive">
	<table id="table-materials" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th>Name</th>
           
             <th>Stock Code</th>
             <th>Product Category</th>
            <th>Segment</th>
             <th>Unit</th>
             
             <!--<th>Quantity</th>-->
             
            <th>Rate</th>
              
            <th width="10%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $counter=1; 
      
      foreach ($materials as $material):?>
        <tr>
          <td><?=$counter?></td>
          <td><?=$material['name']?></td>
          
        	<?php	
	  
	    	$log_in="select * from unit where id='".$material['unit']."' ";

	        $log_in_rs=mysqli_query($conn,$log_in);
	         while($row2 = mysqli_fetch_array($log_in_rs))
  {
    $name=$row2['name'];  
 } ?>


  	<?php	
	  
	    	$Product_category="select * from  Product_category where id='".$material['category']."' ";

	        $Product_category_rs=mysqli_query($conn,$Product_category);
	        
	     
	   
 while($row3 = mysqli_fetch_array($Product_category_rs))
  {
    $product_name=$row3['product_name'];  
   
      
  }
			

?>



  	<?php	
	  
	    	$Segment1="select * from  Segment where id='".$material['Segment']."' ";

	        $Segment_rs=mysqli_query($conn,$Segment1);
	        
	     
			  while($row4 = mysqli_fetch_array($Segment_rs))
  {
    $seg_name=$row4['seg_name'];  
   
      
  }
			

?>

           
               <td><?=$material['code']?></td> 
               <td><?=$product_name?></td> 
            
             <td><?=$seg_name?></td> 
            
             <td><?=$name?></td>
            
               <!--<td><?=$material['Quantity']?></td>-->
            <td><?=
            number_format($material['rate'],3)?>
            <?php if($material['rate']!='')
              {?>
               BD
           <?php  } ?>
            
            </td>
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
<div class="modal fade" id="material-add-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Material Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('/materials/add'), [
          'method' => 'post',
          'id' => 'form-material-add',
          'onsubmit' => 'materialAdd(event, this);'
        ])?>
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control required" required>
          </div>
           <div class="form-group">
             <label>Unit</label>
          
		  <select class="form-control" name="unit" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		   
		    <option value=''>Select Unit</option>
		   <?php foreach ($Unit as $Unit1):?>
		   
		    <option value='<?=$Unit1['id']?>'><?=$Unit1['name']?></option>

		   <?php endforeach;?>
		   </select>
          </div>
          
               <div class="form-group">
             <label>Product Category</label>
          
		  <select class="form-control" name="category" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		   
		    <option value=''>Select Product Category </option>
		   <?php foreach ($category as $category1):?>
		   
		    <option value='<?=$category1['id']?>'><?=$category1['product_name']?></option>

		   <?php endforeach;?>
		   </select>
          </div>
          
          
               <div class="form-group">
             <label>Segment</label>
          
		  <select class="form-control" name="Segment" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		   
		    <option value=''>Select Segment</option>
		   <?php foreach ($Segment as $Segment1):?>
		   
		    <option value='<?=$Segment1['id']?>'><?=$Segment1['seg_name']?></option>

		   <?php endforeach;?>
		   </select>
          </div>
          
          <!--  <div class="form-group">-->
          <!--  <label>Quantity</label>-->
          <!--  <input type="text" name="Quantity" id="Quantity" class="form-control required" required>-->
          <!--</div>-->
          
            <div class="form-group">
            <label>Stock Code</label>
            <input type="text" name="Code" id="Code" class="form-control required" required>
          </div>
          
          
          <div class="form-group">
            <label>Rate</label>
            <input type="number" name="rate" step=".01"  id="name" class="form-control required" required>
          </div>
          <div class="form-text text-danger small errors"></div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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

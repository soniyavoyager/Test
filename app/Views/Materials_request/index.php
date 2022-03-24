<?php
	use App\Models\Staff_roles_Model;
?>

<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="text-capitalize" style="color: #944747;">
 Materials Request
  <!--<button class="btn btn-light text-primary" title="Add" data-toggle="modal" data-target="#material-add-Modal">-->
    <!--<i class="far fa-plus-square"></i> Add-->
  <!--</button>-->
</h1>
<hr>

<div class="table-responsive">
	<table id="table-materials" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th>Materials Request ID</th>
             <th>Job card ID </th>
              <th>Materials Request Date </th>
                <th>Materials Category</th>
                  <th>Total Rate</th>
                   <th>Requested Status</th>
            <th width="20%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      <?php 
       $counter=1; 
      foreach ($Unit as $materials):
      $Category_id=$materials['Category_id'];
      
      $met_id=$materials['met_id'];
      require_once 'API/db.php';
      
      
       	$meterial_rate="SELECT sum(`met_rate`) as total FROM `meterial_req_details` WHERE `met_d_id`='".$met_id."'";
        $meterial_rate_det=mysqli_query($conn,$meterial_rate);
	
       $row2 = mysqli_fetch_assoc($meterial_rate_det);
        $rate=$row2['total'];
        
       // echo($rate);
        
      
      
    	$Product_category="select * from  job_types where id='".$Category_id."' ";
	    	
	    	
	    	
	        $Product_category1=mysqli_query($conn,$Product_category);
			 while($row5 = mysqli_fetch_assoc($Product_category1))
  {
   $product_id=$row5['id']; 
    $product_name=$row5['name']; 
 }
  
      
      ?>
        <tr>
          <td><?=$counter?></td>
          <td><?=$materials['met_id']?></td>
            <td><?=$materials['jobcard_id']?></td>
           <td><?= date("d/m/Y",strtotime($materials['m_c_date']))?></td>
           <td><?=$product_name?></td>
             <td><?=number_format($rate,3)?> BD</td>
            <td><?=$materials['status']?></td>
           
          <td>
              
                          	<?php 
    
	$db = \Config\Database::connect();
		$Emp_id = session('_admin_role');
         $unitModel = new Staff_roles_Model();
	
        $builder = $db->table('staff_roles');
        $builder->where('s_id', $Emp_id);
    //   	$unit1 = $unitModel->findAll();
    $query = $builder->get();
  $querynwe = $query->getResult();
  
    $array = json_decode(json_encode($querynwe), true);
//  
        
 
    foreach ($array as $row) {
    
     
      
   if($row['Materials_r_approval']=='1') 
   { ?> 
         
              
              
                 <a class="btn btn-sm text-primary" title="View all meterials" data-toggle="modal" data-target="#material-view-Modal" data-name="<?=$materials['met_id']?>" data-href="<?=base_url('/Materials_request/view/'.$materials['met_id'])?>">
             <i class="fas fa-eye"></i>
            </a>
            
              		 <?php } if($row['Materials_r_edit']=='1') { ?>
          <a class="btn btn-sm text-primary" title="Update Status" data-toggle="modal" data-target="#material-edit-Modal" data-name="<?=$materials['met_id']?>" data-href="<?=base_url('/Materials_request/edit/'.$materials['id'])?>">
             <i class="far fa-edit"></i>
            </a>
            		 <?php } if($row['Materials_r_delete']=='1') { ?>
            <a class="btn btn-sm text-danger" title="Delete" data-toggle="modal" data-target="#material-delete-Modal" data-href="<?=base_url('/Materials_request/delete/'.$materials['met_id'])?>" data-name="<?=$materials['met_id']?>">
              <i class="far fa-trash-alt"></i>
            </a>
            
            		 <?php } ?>
          </td>
        </tr>
      <?php 
    }
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
  
  $('#material-view-Modal').on('show.bs.modal', function (event) {
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
    } else {
      $(form).find("input#name").parent().find(".form-text").remove();
      $(form).find("input#name").parent().append('<div class="form-text small text-danger">'+data.message+'</div>');
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
        <h5 class="modal-title" id="exampleModalLabel">Add Unit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('/Unit/add'), [
          'method' => 'post',
          'id' => 'form-material-add',
          'onsubmit' => 'materialAdd(event, this);'
        ])?>
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control required" required>
          </div>
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


<!-- view Modal -->
<div class="modal fade" id="material-view-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<?php
	use App\Models\Staff_roles_Model;
?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="display-4 text-capitalize">
  Employees
  <button class="btn btn-light text-primary" title="Add" data-toggle="modal" data-target="#employee-add-Modal">
    <i class="far fa-plus-square"></i> Add
  </button>
</h1>
<hr>

<div class="table-responsive">
	<table id="table-employees" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th>Employee ID</th>
            <th>Full Name</th>
            <th>Phone No.</th>
            <th>E-Mail ID</th>
            <th>Designation</th>
             <th>Rate(per hours)</th>
               <th>Over Time1 Rate(per hours)</th>
                 <th>Over Time2 Rate(Per hours)</th>
            <th width="10%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      
$counter=1; 
      foreach ($employees as $employee):?>
        <tr>
          <td><?=$counter?></td>
         <td><?=$employee['Emp_id']?></td>
          <td><?=$employee['name']?></td>
          <td><?=$employee['phone']?></td>
          <td><?=$employee['email']?></td>
            <td><?=$employee['designation']?></td>
              <td><?=
              number_format((float)$employee['rate'], 3, '.', '') ?> <?php if($employee['rate']!='')
              {?> BD <?php  } ?>
              
              </td>
              
               <td><?=
              number_format((float)$employee['ot1'], 3, '.', '') ?> <?php if($employee['rate']!='')
              {?> BD <?php  } ?>
              
              </td>
              
              
               <td><?= number_format((float)$employee['ot2'], 3, '.', '')?> <?php if($employee['rate']!='')
              {?> BD<?php  } ?>
              
              </td>
              
          <td>
              
              	<?php 
    
	   $db = \Config\Database::connect();
		$Emp_id = session('_admin_id');
         $unitModel = new Staff_roles_Model();
	
        $builder = $db->table('staff_roles');
        $builder->where('s_id', $Emp_id);
      	$unit = $unitModel->findAll();
     
      
   if($unit[0]['emp_edit']=='1') 
   { ?>
            <a class="btn btn-sm text-primary" title="Edit" data-toggle="modal" data-target="#employee-edit-Modal" data-name="<?=$employee['name']?>" data-href="<?=base_url('/employees/edit/'.$employee['id'])?>">
              <i class="far fa-edit"></i>
            </a>
            
            			 <?php } if($unit[0]['emp_delete']=='1') { ?>
	
            
            <a class="btn btn-sm text-danger" title="Delete" data-toggle="modal" data-target="#employee-delete-Modal" data-href="<?=base_url('/employees/delete/'.$employee['id'])?>" data-name="<?=$employee['name']?>">
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
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<?= $this->endSection()?>

<?= $this->section('scripts')?>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
var tableEmployees;
$(document).ready(function(){
  tableEmployees = $('#table-employees').DataTable({});
  $('#employee-edit-Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var action = button.data('href');
    
    var modal = $(this)
    modal.find('.modal-title').text(name);
    modal.find('.modal-body').html("Loading...").load(action);
  });
  $('#employee-delete-Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var action = button.data('href');

    var modal = $(this)
    modal.find('.modal-title').text(name);
    modal.find(".btn-delete").attr("href", action);
  });
});
function employeeAdd(event, form){
  event.preventDefault(0);
  var action = $(form).attr("action")
  var form_data = $(form).serialize();
  $.post(action, form_data, function(data){
    if (data.result == 'success'){
      $('#employee-add-Modal').modal("hide");
      document.location.href = data.redirect_url;
    } else {
        $(".errors").html(data.message);
        $(form).find("#"+data.elementID).focus();
        $(form).append(data.csrf_field);
    }
    
    }, 'json');
}
function employeeEdit(event, form){
  event.preventDefault(0);
  var action = $(form).attr("action")
  var form_data = $(form).serialize();
  $.post(action, form_data, function(data){
    if (data.result == 'success'){
      $('#employee-edit-Modal').modal("hide");
      document.location.href = data.redirect_url;
    }
    else {
        $(".errors").html(data.message);
        $(form).find("#"+data.elementID).focus();
        $(form).append(data.csrf_field);
    }
    
    
  }, 'json');
}
</script>
<?= $this->endSection()?>

<?= $this->section('bootstrap_modals')?>
<!-- Add Modal -->
<div class="modal fade" id="employee-add-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('/employees/add'), [
          'method' => 'post',
          'id' => 'form-employee-add',
          'onsubmit' => 'employeeAdd(event, this);'
        ])?>
        
        <div class="form-group">
            <label>Employee ID</label>
            <input type="text" name="ID" id="ID" class="form-control required" required>
            <div class="form-text text-danger small errors"></div>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control required" required>
          </div>
          <div class="form-group">
            <label>Phone No.</label>
            <input type="number" name="phone" id="phone" class="form-control required" required>
          </div>
          <div class="form-group">
            <label>E-Mail ID</label>
            <input type="email" name="email" id="email" class="form-control required">
          </div>
          
           <div class="form-group">
            <label>Designation</label>
            <input type="text" name="Designation" id="Designation" class="form-control required">
          </div>
          <div class="form-group">
            <label>Regular(Per hours)</label>
            <!--<input type="number" name="rate" id="rate" class="form-control required">-->
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
            <input type="number"  name="rate" step=".01"  class="form-control required">
          </div>
          
            <div class="form-group">
            <label>Over Time1 Rate(Per hours)</label>
            <input type="number" name="ot1_rate" id="rate" step=".01"   class="form-control required">
          </div>
            <div class="form-group">
            <label>Over Time2 Rate(Per hours)</label>
            <input type="number" name="ot2_rate" id="rate" step=".01"   class="form-control required">
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
<div class="modal fade" id="employee-edit-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="employee-delete-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

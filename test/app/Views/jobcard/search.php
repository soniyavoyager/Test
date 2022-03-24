<?php 
 require_once 'API/db.php';
use App\Models\unitModel;


?>
<?php
	use App\Models\Staff_roles_Model;
?>

 <?= $this->extend('layout') ?>

<?= $this->section('content') ?>

	
	
<div class="container-fluid">
		<div class="row">
			
			
			<div class="col-10" style="padding-left: 116px;">
				<p></p>
								<h1 class="display-4 text-capitalize">
Jobcard Report
  <!--<button class="btn btn-light text-primary" title="Add" data-toggle="modal" data-target="#material-add-Modal">-->
    <!--<i class="far fa-plus-square"></i> Add-->
  <!--</button>-->
</h1>
<hr>
<style>
	.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>

  <?php echo form_open(base_url('/Jobcard/search_submit'), [
	'method' => 'post',
	'id' => 'form-employee-edit',
	'onsubmit' => 'employeeEdit(event, this);'
])
?>

<div class="column">
            <label>From Date</label>
            <input type="date" name="date1" id="ID" value="" class="form-control required" required>
        	</div>
<div class="column">
		<label>To Date</label>
		<input type="date" name="date2" id="date2" value="" class="form-control required" required>
</div>
  <div class="column">

	  <br> <br>
	    <button type="submit" class="btn btn-primary">Search</button>
	</div>
</form>


  <?php echo form_open(base_url('/Jobcard/woker_seacrch'), [
	'method' => 'post',
	'id' => 'form-employee-edit',
	'onsubmit' => 'employeeEdit(event, this);'
])
?>

<div class="column">
            <label>Select Jobcard Id</label>
         
            
            	  <select class="form-control" name="wrk" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		   
		    <option value=''>Select Segment</option>
		    <?php
		    	$db = \Config\Database::connect();
		  $builder = $db->table('jobcard_master');
          $builder->select('job_id');
          $query = $builder->distinct();
        $jobs = $query->get();
   $querynwe = $jobs->getResult();
 
    $array = json_decode(json_encode($querynwe), true);
?>
		 
      <?php foreach ($array as $Segment1):?>
		   
		    <option value='<?=$Segment1['job_id']?>'><?=$Segment1['job_id']?></option>

		   <?php endforeach;?>
		   </select>
            
        	</div>

  <div class="column">

	  <br> <br>
	    <button type="submit" class="btn btn-primary">Search</button>
	</div>
</form>



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

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
  working hours report
  
</h1>
<hr>

<div class="table-responsive">
	<table id="table-materials" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th>Name</th>
           
             <th>Formdate </th>
             <th>Todate</th>
            <th>Regular</th>
             <th>ot1</th>
             
             
             <th>ot2</th>
          
         
              
            <th width="10%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $counter=1; 
      
      
      
      
      foreach ($jobcard as $material):?>
      
       <?php 
      
      
      		
	  
	    	$log_in="select * from employees where id='".$material['worker_id']."' ";
	    

	        $log_in_rs=mysqli_query($conn,$log_in);
	         while($row2 = mysqli_fetch_array($log_in_rs))
  {
    $name=$row2['name'];  
 } ?>



	<?php	
	  
	    	$log_in1=("SELECT h.jobcard_id, sum(o.work_hours) AS sum1, sum(o.over_time1) AS sum2,sum(o.over_time2) 
AS sum3 FROM work_shedule_master h INNER JOIN work_shedule_detail o ON h.id =o.w_s_m_id where h.jobcard_id='".$material['jobcard_id']."' and h.worker_id='".$material['worker_id']."'");



	        $log_in_rs1=mysqli_query($conn,$log_in1);
	         while($row3 = mysqli_fetch_array($log_in_rs1))
  {
    $sum1=$row3['sum1'];  
    $sum2=$row3['sum2'];  
    $sum3=$row3['sum3'];  
 } 

      ?>
      
      
  
	   

   
      
      
      
      
      
      
      
      
        <tr>
          <td><?=$counter?></td>
          <td><?=$name?></td>
             
             <td><?=$material['from_date']?></td>
             
                <td><?=$material['to_date']?></td>
          	     <?php   
          	     
          	     
          	   	$log_in2=("SELECT h.jobcard_id, (o.work_hours) , (o.over_time1),(o.over_time2),(o.date) FROM work_shedule_master h INNER JOIN work_shedule_detail o ON h.id =o.w_s_m_id where h.jobcard_id='".$material['jobcard_id']."' and h.worker_id='".$material['worker_id']."'");

   $log_in_rs2=mysqli_query($conn,$log_in2);
   
          	     while($row4 = mysqli_fetch_array($log_in_rs2))
  {
  
  	     

    $work_hours=$row4['work_hours'];  
    $over_time1=$row4['over_time1'];  
    $over_time2=$row4['over_time2'];  
    ?><tr>
      <td></td>
          <td></td>
              <td></td>
                  <td><?=$row4['date']?></td>
               <td><?=$work_hours?> hrs</td>
             <td><?=$over_time1?> hrs</td>
             
                <td><?=$over_time2?> hrs</td></tr>
 <?php  } ?>

               <td></td>
          <td></td>
              <td></td>
                  <th> Total Hours</th>
               <td><?=$sum1?> hrs</td>
             <td><?=$sum2?> hrs</td>
             
                <td><?=$sum3?> hrs</td>
            
            
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

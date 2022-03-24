<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="display-4 text-capitalize">
  Description

</h1>
<hr>

<div class="table-responsive">
	<table id="table-staffs" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th> Date</th>
              <th> Staff Name</th>
             <th> Description</th>
            <th width="10%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        
      <?php 
      
      $counter=1; 
      foreach ($report as $key => $Report):?>
        <tr>
          <td><?=$counter?></td>
         <?php 
       
         
          require_once 'API/db.php';
      
      
       	$staffs="SELECT * from staffs where id='".$Report['supid']."'";
       	
        $staffs_det=mysqli_query($conn,$staffs);
	
       $row2 = mysqli_fetch_assoc($staffs_det);
        $first_name=$row2['first_name'];
         ?>
     <td><?=$Report['date']?> </td>
       <td><?=$first_name?> </td>
       
  <?php $news = strip_tags($Report['description']);
    $snews = substr($news,0,3);
   
          ?>
           <td><?php echo $snews;?>............ </td>
            <td>  <a class="btn btn-sm text-primary" title="View all meterials" data-toggle="modal" data-target="#material-view-Modal" data-name="Work Description" data-href="<?=base_url('/Work_dis/view/'.$Report['id'])?>">
             <i class="fas fa-eye"></i>
            </a>
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
var tableStaffs;
$(document).ready(function(){
  tableStaffs = $('#table-staffs').DataTable({});
	$('#staff-edit-Modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var name = button.data('name');
		var action = button.data('href');
		
		var modal = $(this)
		modal.find('.modal-title').text(name);
		modal.find('.modal-body').html("Loading...").load(action);
	});
  $('#staff-delete-Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var action = button.data('href');
    
    var modal = $(this)
    modal.find('.modal-title').text(name);
    modal.find(".btn-delete").attr("href", action);
  });
});

  $('#material-view-Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var action = button.data('href');
    var modal = $(this)
    modal.find('.modal-title').text(name);
    modal.find('.modal-body').html("Loading...").load(action);
  });

function staffAdd(event, form){
	event.preventDefault(0);
	var action = $(form).attr("action")
	var form_data = $(form).serialize();
  $.post(action, form_data, function(data){
    if (data.result == 'success'){
      $('#staff-add-Modal').modal("hide");
      document.location.href = data.redirect_url;
    }
    
    else {
        $(".errors").html(data.message);
        $(form).find("#"+data.elementID).focus();
        $(form).append(data.csrf_field);
    }
    
    
  }, 'json');
}
function staffEdit(event, form){
  event.preventDefault(0);
  var action = $(form).attr("action")
  var form_data = $(form).serialize();
  $.post(action, form_data, function(data){
    if (data.result == 'success'){
      $('#manager-edit-Modal').modal("hide");
      document.location.href = data.redirect_url;
    }
  }, 'json');
}
</script>
<?= $this->endSection() ?>

<?= $this->section('bootstrap_modals')?>


<SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>


<!-- Edit Modal -->
<div class="modal fade" id="staff-edit-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="staff-delete-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	
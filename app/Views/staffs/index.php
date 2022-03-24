<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="text-capitalize" style="color: #944747;">
  <?=$page_title?>
  <button class="btn btn-light text-primary" title="Add" data-toggle="modal" data-target="#staff-add-Modal">
    <i class="far fa-plus-square"></i> Add
  </button>
</h1>
<hr>

<div class="table-responsive">
	<table id="table-staffs" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th>Full Name</th>
             <th>User Name</th>
            <th>E-Mail ID</th>
            <th>Phone No.</th>
             <th>Roles</th>
            <th width="10%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        
      <?php 
      
      $counter=1; 
      foreach ($staffs as $key => $staff):?>
        <tr>
          <td><?=$counter?></td>
          <td><?=$staff['first_name']?> <?=$staff['last_name']?></td>
           <td><?=$staff['username']?></td>
          <td><?=$staff['email']?></td>
          <td><?=$staff['phone']?></td>
            <!--<td><?=$staff['position']?></td>-->
            
             <td><?php if($staff['position']=="hr") {echo("HR & Administrator");}?> 
            <?php if($staff['position']=="manager") {echo("Manager");}?>
        <?php if($staff['position']=="accounts") {echo("Purachase & Accounts");}?> 
            <?php if($staff['position']=="supervisor") {echo("Supervisor");}?> </td>
          <td>
            <a class="btn btn-sm text-primary" title="Edit" data-toggle="modal" data-target="#staff-edit-Modal" data-name="<?=$staff['first_name'].' '.$staff['last_name']?>" data-href="<?=base_url('/staffs/edit/'.$staff['id'])?>">
              <i class="far fa-edit"></i>
            </a>
            <a class="btn btn-sm text-danger" title="Delete" data-toggle="modal"
            data-target="#staff-delete-Modal" data-href="<?=base_url('/staffs/delete/'.$staff['id'])?>" 
            data-name="<?=$staff['first_name'].' '.$staff['last_name']?>">
              <i class="far fa-trash-alt"></i>
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
<!-- Add Modal -->
<div class="modal fade" id="staff-add-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 450px;overflow-y: scroll;">
        <?php echo form_open(base_url('/staffs/add'), [
          'method' => 'post',
          'id' => 'form-staff-add',
          'onsubmit' => 'staffAdd(event, this);'
        ])?>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="first_name" id="first_name" class="form-control required" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="last_name" id="last_name" class="form-control required" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>E-Mail ID *</label>
            <input type="email" name="email" id="email" class="form-control required" required>
            
          </div>
        
              <div class="form-group">
                <label>Phone No. *</label>
                <input type="text" name="phone" id="txtChar"  class="form-control required"  onkeypress="return isNumberKey(event)"  required>
                
            
              
            </div>
            
             <div class="row">
              <div class="col">
              <div class="form-group">
                <label>User name *</label>
                <input type="text" name="user_name" id="password" class="form-control" required>
              
              </div>
            </div>
          </div>
         <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Password *</label>
                <input type="password" name="password" id="password" minlength="6" class="form-control" required>
                <div class="form-text text-muted small">Min. length: 6</div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Roles *</label>
            <select name="position" id="position" class="form-control" required>
              <option value="">-- Select --</option>
              <option value="manager">Manager</option>
              
               <option value="hr">HR & Administrator</option>
           
              <option value="accounts">Purachase & Accounts</option>
              <option value="supervisor">Supervisor</option>
            </select>
            <hr>
          </div>
          <!--<div class="form-group">-->
          <!--  <label><b>Employees</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view1" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit1" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete1" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Category</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view2" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit2" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete2" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Company</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view3" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit3" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete3" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Plot</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view4" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit4" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete4" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Site Master</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view5" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit5" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete5" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Unit</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view6" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit6" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete6" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Segment</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view7" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit7" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete7" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Product Category</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view8" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit8" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete8" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Materials</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view9" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit9" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete9" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <hr>-->
          <!--</div>-->
          <!--<div class="form-group">-->
          <!--  <label><b>Materials Request</b></label><br>-->
          <!--  <input type="checkbox" id="view-check" name="view10" value="1">-->
          <!--    <label for="view1" style="margin-right:1rem;"> View</label>-->
          <!--    <input type="checkbox" id="edit-check" name="edit10" value="1">-->
          <!--    <label for="edit1" style="margin-right:1rem;"> Edit</label>-->
          <!--    <input type="checkbox" id="delete-check" name="delete10" value="1">-->
          <!--    <label for="check1" style="margin-right:1rem;"> Delete</label>-->
          <!--    <input type="checkbox" id="approval-check" name="approval10" value="1">-->
          <!--    <label for="approval1" style="margin-right:1rem;"> Approval</label>-->
          <!--</div>-->
          
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
	
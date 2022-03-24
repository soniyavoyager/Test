<?php echo form_open(base_url('/supplier/update/'.$supplier['id']), [
	'method' => 'post',
	'id' => 'form-employee-edit',
	'onsubmit' => 'employeeEdit(event, this);'
])?>

 <div class="form-group">
            <label>Supplier ID</label>
            <input type="text" name="ID" id="ID" value="<?=$supplier['sup_id']?>" class="form-control required" readonly>
          </div>
	<div class="form-group">
		<label>Supplier Name</label>
		<input type="text" name="name" id="name" value="<?=$supplier['name']?>" class="form-control required" required>
	</div>
	<div class="form-group">
		<label>Contact Number</label>
		<input type="number" name="phone" id="phone" value="<?=$supplier['phone']?>" class="form-control required" required>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" id="email" value="<?=$supplier['email']?>" class="form-control required">
	</div>supplier Address
	 <div class="form-group">
            <label></label>
             <textarea name="address" id="Designation" class="form-control required">
                <?=$supplier['Address']?>
                </textarea>
          </div>
         
        
          
	
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>

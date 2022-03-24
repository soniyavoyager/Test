<?php
use App\Models\unitModel;
 require_once 'API/db.php';
//use App\Models\cmpnyModel;

echo form_open(base_url('/Tools_master/update/'.$Tool['id']), [
	'method' => 'post',
	'id' => 'form-materials-edit',
	'onsubmit' => 'materialEdit(event, this);'
])?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" id="name" value="<?=$Tool['name']?>" class="form-control required" required>
	</div>
	
		<div class="form-group">
		<label>Stock Code</label>
		<input type="text" name="Code" id="name" value="<?=$Tool['qty']?>" class="form-control required" >
	</div>	<div class="form-group">
		<label>Per day Cost</label>
		<input type="text" name="rate" id="name" step=".01"  value="<?=$Tool['rate']?>" class="form-control required" required>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>

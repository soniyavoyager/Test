<?php echo form_open(base_url('/P_category/update/'.$unit['id']), [
	'method' => 'post',
	'id' => 'form-materials-edit',
	'onsubmit' => 'materialEdit(event, this);'
])?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" id="name" value="<?=$unit['product_name']?>" class="form-control required" required>
		 <div class="form-text text-danger small errors"></div>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>

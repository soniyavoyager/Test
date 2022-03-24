<?php


echo form_open(base_url('/Materials_request/update/'.$materials_request['id']), [
	'method' => 'post',
	'id' => 'form-materials-edit',
	'onsubmit' => 'materialEdit(event, this);'
])?>
	<div class="form-group">
		<label>Material Request ID</label>
		<input type="text" name="name1" id="name" value="<?=$materials_request['met_id']?>" class="form-control required" required>
	</div>
	
	<div class="form-group">
		<label>Status</label>
	
		   <select name="Status" id="Status" class="form-control">
		
                <option value="<?=$materials_request['status']?>"><?=$materials_request['status']?> </option>
                <option value="Approved" <?php if($materials_request['status']=='Approved'):?> selected <?php endif;?>>Approved</option>
                <option value="Cancel" <?php if($materials_request['status']=='Cancel'):?> selected <?php endif;?>>Cancel</option>
                <option value="Pending" <?php if($materials_request['status']=='Pending'):?>  selected <?php endif;?>>Pending</option>
               
              </select>
		
	</div>
	
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>

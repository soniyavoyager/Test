<?php echo form_open(base_url('/staffs/update/'.$staff['id']), [
	'method' => 'post',
	'id' => 'form-staff-edit',
	'onsubmit' => 'staffEdit(event, this);'
])?>
<div style="height: 450px;overflow-y: scroll;">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="first_name" id="first_name" value="<?=$staff['first_name']?>" class="form-control required" required>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="last_name" id="last_name" value="<?=$staff['last_name']?>" class="form-control required" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>E-Mail ID</label>
		<input type="email" name="email" id="email" value="<?=$staff['email']?>" class="form-control required" readonly>
	</div>
	
	<div class="form-group">
                <label>Phone No.</label>
                

                 <input type="text" name="phone" id="txtChar"  class="form-control required"  onkeypress="return isNumberKey(event)" value="<?=$staff['phone']?>" required>
                
                
              </div>
              
             
              <div class="form-group">
                <label>User name</label>
                <input type="text" name="user_name" id="password" class="form-control"  value="<?=$staff['username']?>" required>
              
            
          </div> 
              
              

		  <div class="form-group">
		    <label>Password</label>
		    <input type="password" name="password" id="password" minlength="6" class="form-control">
		    <div class="form-text text-muted small">Min. length: 6</div>
		 
		
		
		
	
		  <div class="form-group">
		    <label>Roles</label>
		    <select name="position" id="position" class="form-control">
		      <option value="">-- Select --</option>
		      <option value="manager" <?php if ($staff['position'] == 'manager'):?>selected <?php endif;?>>Manager</option>
		      <option value="hr" <?php if ($staff['position'] == 'hr'):?>selected <?php endif;?>>HR & Administrator</option>
		      
		        <option value="accounts" <?php if ($staff['position'] == 'accounts'):?>selected <?php endif;?>>Purachase & Accounts</option>
		      <option value="supervisor" <?php if ($staff['position'] == 'supervisor'):?>selected <?php endif;?>>Supervisor</option>
		    </select>
		
		</div>
	</div>
	<hr>

	
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
        </div>
</form>

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

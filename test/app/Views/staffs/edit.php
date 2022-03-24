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
                <input type="number" name="phone" id="phone" class="form-control required" value="<?=$staff['phone']?>" required>
              </div>
	<div class="row">
		<div class="col">
		  <div class="form-group">
		    <label>Password</label>
		    <input type="password" name="password" id="password" minlength="6" class="form-control">
		    <div class="form-text text-muted small">Min. length: 6</div>
		  </div>
		</div>
		<div class="col">
		  <div class="form-group">
		    <label>Roles</label>
		    <select name="position" id="position" class="form-control">
		      <option value="">-- Select --</option>
		      <option value="manager" <?php if ($staff['position'] == 'manager'):?>selected <?php endif;?>>Manager</option>
		      <option value="HR" <?php if ($staff['position'] == 'HR'):?>selected <?php endif;?>>HR & Administrator</option>
		      
		        <option value="accounts" <?php if ($staff['position'] == 'accounts'):?>selected <?php endif;?>>Purachase & Accounts</option>
		      <option value="supervisor" <?php if ($staff['position'] == 'supervisor'):?>selected <?php endif;?>>Supervisor</option>
		    </select>
		  </div>
		</div>
	</div>
	<hr>
	<div class="form-group">
	    
	    	<input type="text" name="role_id" id="last_name" value="<?=$staff1[0]['id']?>" class="form-control required" hidden>
            <label><b>Employees</b></label><br>
            <input type="checkbox" id="view-check" name="view1" value="1" <?php if ($staff1[0]['emp_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit1" value="1" <?php if ($staff1[0]['emp_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete1" value="1" <?php if ($staff1[0]['emp_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Category</b></label><br>
            <input type="checkbox" id="view-check" name="view2" value="1" <?php if ($staff1[0]['cate_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit2" value="1" <?php if ($staff1[0]['cate_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete2" value="1" <?php if ($staff1[0]['cate_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Company</b></label><br>
            <input type="checkbox" id="view-check" name="view3" value="1" <?php if ($staff1[0]['Com_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit3" value="1" <?php if ($staff1[0]['Com_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete3" value="1" <?php if ($staff1[0]['Com_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Plot</b></label><br>
            <input type="checkbox" id="view-check" name="view4" value="1" <?php if ($staff1[0]['plot_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit4" value="1" <?php if ($staff1[0]['plot_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete4" value="1"  <?php if ($staff1[0]['plot_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Site Master</b></label><br>
            <input type="checkbox" id="view-check" name="view5" value="1" <?php if ($staff1[0]['Site_m_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit5" value="1" <?php if ($staff1[0]['Site_m_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete5" value="1"  <?php if ($staff1[0]['Site_m_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Unit</b></label><br>
            <input type="checkbox" id="view-check" name="view6" value="1"<?php if ($staff1[0]['unit_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit6" value="1" <?php if ($staff1[0]['unit_edit'] == '1'):?>checked <?php endif;?>> 
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete6" value="1" <?php if ($staff1[0]['unit_delete'] == '1'):?>checked <?php endif;?>> 
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Segment</b></label><br>
            <input type="checkbox" id="view-check" name="view7" value="1"<?php if ($staff1[0]['Segment_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit7" value="1"<?php if ($staff1[0]['Segment_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete7" value="1"<?php if ($staff1[0]['Segment_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Product Category</b></label><br>
            <input type="checkbox" id="view-check" name="view8" value="1"<?php if ($staff1[0]['Product_c_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit8" value="1"<?php if ($staff1[0]['Product_c_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete8" value="1"<?php if ($staff1[0]['Product_c_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Materials</b></label><br>
            <input type="checkbox" id="view-check" name="view9" value="1"<?php if ($staff1[0]['Materials_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit9" value="1"<?php if ($staff1[0]['Materials_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete9" value="1"<?php if ($staff1[0]['Materials_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <hr>
          </div>
          <div class="form-group">
            <label><b>Materials Request</b></label><br>
            <input type="checkbox" id="view-check" name="view10" value="1"<?php if ($staff1[0]['Materials_r_view'] == '1'):?>checked <?php endif;?>>
              <label for="view1" style="margin-right:1rem;"> View</label>
              <input type="checkbox" id="edit-check" name="edit10" value="1"<?php if ($staff1[0]['Materials_r_edit'] == '1'):?>checked <?php endif;?>>
              <label for="edit1" style="margin-right:1rem;"> Edit</label>
              <input type="checkbox" id="delete-check" name="delete10" value="1"<?php if ($staff1[0]['Materials_r_delete'] == '1'):?>checked <?php endif;?>>
              <label for="check1" style="margin-right:1rem;"> Delete</label>
              <input type="checkbox" id="approval-check" name="approval10" value="1"<?php if ($staff1[0]['Materials_r_approval'] == '1'):?>checked <?php endif;?>>
              <label for="approval1" style="margin-right:1rem;"> Approval</label>
          </div>
	
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
        </div>
</form>

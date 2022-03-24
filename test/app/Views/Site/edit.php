
<?php 
use App\Models\PlotModel;
use App\Models\cmpnyModel;

?>

<?php echo form_open(base_url('/Site/update/'.$Site['id']), [
	'method' => 'post',
	'id' => 'form-materials-edit',
	'onsubmit' => 'materialEdit(event, this);'
])?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" id="name" value="<?=$Site['name']?>" class="form-control required" required>
		
		
		<label>Company</label>
          
		  <select class="form-control" name="compny" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		 
		     <?php
         
        $cmpnyModel = new cmpnyModel();
		$cmpnyModel->where('id',$Site['compny']);
		$compny = $cmpnyModel->findAll();
		
		?>
		 
		  <option value='<?=$Site['compny']?>'><?=$compny[0]['cmpny_name']?></option>
		 
		   <?php foreach ($cmpny as $cmpny1):?>
		   
		    <option value='<?=$cmpny1['id']?>'><?=$cmpny1['cmpny_name']?></option>

		   <?php endforeach;?>
		   </select>
		    <label>Plot</label>
		     <select class="form-control" name="plot" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		  
		     <?php
         
         $PlotModel = new PlotModel();
		$PlotModel->where('id',$Site['plot']);
		$Plotnw = $PlotModel->findAll();
		
		?>
		  
		  
		  
		     <option value='<?=$Site['plot']?>'><?=$Plotnw[0]['name']?></option>
		    
		    <?php foreach ($Plot as $Plot1):?>
		    <option value='<?=$Plot1['id']?>'><?=$Plot1['name']?></option>
		   <?php endforeach;?>
		    </select>
		
		
	</div>
		 <div class="form-text text-danger small errors"></div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>

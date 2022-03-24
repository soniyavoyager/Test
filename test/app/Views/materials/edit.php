<?php
use App\Models\unitModel;
 require_once 'API/db.php';
//use App\Models\cmpnyModel;

echo form_open(base_url('/materials/update/'.$material['id']), [
	'method' => 'post',
	'id' => 'form-materials-edit',
	'onsubmit' => 'materialEdit(event, this);'
])?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" id="name" value="<?=$material['name']?>" class="form-control required" required>
	</div>
		<div class="form-group">
		<label>Unit</label>
		
		 <select class="form-control" name="unit" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		  
	<?php	
	  	$log_in="select * from unit where id='".$material['unit']."' ";

	        $log_in_rs=mysqli_query($conn,$log_in);
	        
	     
			  while($row2 = mysqli_fetch_array($log_in_rs))
  {
    $name=$row2['name'];  
   
  }
			

?>
	<option value='<?=$material['unit']?>'><?=$name?></option>
		 
		   <?php foreach ($Unit as $Unit1):?>
		   
		    <option value='<?=$Unit1['id']?>'><?=$Unit1['name']?></option>

		   <?php endforeach;?>
		   </select>
		
	
	</div>
	
	
		<div class="form-group">
		<label>Product Category</label>
		
		 <select class="form-control" name="Category" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		  
		<?php	
	  
	    	$Product_category="select * from  Product_category where id='".$material['category']."' ";

	        $Product_category_rs=mysqli_query($conn,$Product_category);
	        
	     
	   
			  while($row3 = mysqli_fetch_array($Product_category_rs))
  {
    $product_name=$row3['product_name'];  
   
      
  }
			

?>

?>
	<option value='<?=$material['category']?>'><?=$product_name?></option>
		 
		  <?php foreach ($category as $category1):?>
		   
		    <option value='<?=$category1['id']?>'><?=$category1['product_name']?></option>

		   <?php endforeach;?>
		   </select>
		
	
	</div>
	
	
	
		<div class="form-group">
		<label>Segment</label>
		
		 <select class="form-control" name="Segment" id="exampleInputCategory" style="height: calc(2.25rem + 13px);">
		  
<?php	
	  
	    	$Segment1="select * from  Segment where id='".$material['Segment']."' ";

	        $Segment_rs=mysqli_query($conn,$Segment1);
	        
	     
			  while($row4 = mysqli_fetch_array($Segment_rs))
  {
    $seg_name=$row4['seg_name'];  
   
      
  }
			

?>
	<option value='<?=$material['Segment']?>'><?=$seg_name?></option>
		 
	 <?php foreach ($Segment as $Segment1):?>
		   
		    <option value='<?=$Segment1['id']?>'><?=$Segment1['seg_name']?></option>

		   <?php endforeach;?>
		   </select>
		
	
	</div>
	
	  <!--<div class="form-group">-->
   <!--         <label>Quantity</label>-->
   <!--         <input type="text" name="Quantity" id="Quantity"   value="<?=$material['Quantity']?>" class="form-control required" required>-->
   <!--       </div>-->
          
	
	
		<div class="form-group">
		<label>Stock Code</label>
		<input type="text" name="Code" id="name" value="<?=$material['code']?>" class="form-control required" readonly>
	</div>
	
	
		<div class="form-group">
		<label>Rate</label>
		<input type="text" name="rate" id="name" step=".01"  value="<?=$material['rate']?>" class="form-control required" required>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>

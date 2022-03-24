<div class="table-responsive">
	<table id="table-materials" class="table table-striped" style="width:100%">
    <thead>
        <tr>
        
           
        </tr>
    </thead>
    <tbody>
      <?php 
      
      foreach ($daily_report as $Daily_report):?>
        <tr>
        <center> 
      <textarea id="w3review" name="w3review" rows="4" cols="50">  <?=$Daily_report['description']?></textarea>
        </center>   
        </tr>
      <?php 
       
      
      endforeach;?>
    </tbody>
  </table>
</div>
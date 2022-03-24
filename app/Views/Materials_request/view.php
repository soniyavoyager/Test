<div class="table-responsive">
	<table id="table-materials" class="table table-striped" style="width:100%">
    <thead>
        <tr>
             <th>#</th>
            <th>Materials</th>
             <th>Unit</th>
             <th>Qty</th>
              <th>Rate</th>
        </tr>
    </thead>
    <tbody>
      <?php 
        $counter=1; 
      foreach ($materials_request as $unit):?>
        <tr>
             <td><?=$counter?></td>
          <td><?=$unit['meterial_name']?></td>
          <td><?=$unit['unit_name']?></td>
           <td><?=$unit['qty']?></td>
            <td><?=number_format(($unit['met_rate']),3);?> BD</td>
        </tr>
      <?php 
        $counter++;
      
      endforeach;?>
    </tbody>
  </table>
</div>
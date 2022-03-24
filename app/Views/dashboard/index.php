
<?php	 $db = \Config\Database::connect();
	$status='Approved';
	    $builder1 = $db->table('meterial_req_master');
	    $builder1->where('status', $status);
       $Approved = $builder1->countAllResults(); 
       
    	$status1='Cancel';
	    $builder2 = $db->table('meterial_req_master');
	    $builder2->where('status', $status1);
       $Cancel = $builder2->countAllResults();  
       
       	$status3='Pending';
	    $builder3 = $db->table('meterial_req_master');
	    $builder3->where('status', $status3);
       $Pending = $builder3->countAllResults();    
       
       
       $status4='';
	    $builder4 = $db->table('jobcard_master');
	    $builder4->where('status', $status4);
       $job_on = $builder4->countAllResults();    
       
       
         $status5='Completed';
	    $builder5 = $db->table('jobcard_master');
	    $builder5->where('status', $status5);
       $job_com = $builder5->countAllResults();    
       
           
        
	    $builder6 = $db->table('employees');
	   
       $employees = $builder6->countAllResults();  
       
        
	    $builder7 = $db->table('materials');
	   
       $materials = $builder7->countAllResults();   
       
       
?>


<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1 style="color: #944747;">Dashboard</h1>
    <hr>
    
    <div class="container">
       <div class="col-md-6 jobcard-align" style="margin:0 auto; border: 1px #ece9e9 solid;margin-bottom: 1.5rem;padding-top: 0.5rem;box-shadow: 0px 2px 14px -4px;">
          <div class="row" style="display:block;">
            <h2 style="text-align:center; margin-bottom:1rem;">Jobcard</h2>
          </div> 
          <div class="row" style="margin-bottom:2rem;">
            <div class="col-md-6" style="text-align: center;">
                <div class="counter-align" style="margin: 0 auto; border: 1px #944747 solid; border-radius: 50%; padding: 1rem; box-shadow: 7px 0 #944747;">
                  <i class="fas fa-drafting-compass" style="font-size:2rem;color: #944747;"></i>
              
                
                  <h1><span class="counter"><?php echo $job_on;?></span></h1>
                  
                
                  <h3>Ongoing</h3>
                </div>
            </div> 
            <div class="col-md-6" style="text-align: center;">
                <div class="counter-align" style="margin: 0 auto; border: 1px #944747 solid; border-radius: 50%; padding: 1rem; box-shadow: 7px 0 #944747;">
                  <i class="fas fa-toolbox" style="font-size:2rem;color: #944747;"></i>
                   <h1><span class="counter"><?php echo $job_com;?></span></h1>
                  <h3>Completed</h3>
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="container">
        <div class="col-md-6" style="margin: 0 auto;">
          <div class="row" style="padding-bottom:2rem;">
                <div class="col-md-6" style="text-align: center;">
                    <div class="counter-align" style="margin: 0 auto; border: 1px #944747 solid; border-radius: 15%; padding: 1rem; box-shadow: 1px 5px 3px 2px #944747;">
                      <i class="fas fa-user" style="font-size:2rem;color: #944747;"></i>
                      <h1><span class="counter"><?php echo  $employees;?></span></h1>
                      <h3>Employee</h3>
                    </div>
                </div> 
                <div class="col-md-6" style="text-align: center;">
                    <div class="counter-align" style="margin: 0 auto; border: 1px #944747 solid; border-radius: 15%; padding: 1rem; box-shadow: 1px 5px 3px 2px #944747;">
                      <i class="fas fa-tools" style="font-size:2rem;color: #944747;"></i>
                      <h1><span class="counter"><?php echo $materials;?></span></h1>
                      <h3>Materials</h3>
                    </div>
                </div>
          </div>
      </div>
    </div>  
    <hr>
    <div class="container">
        <!--<main>-->
        <div class="col-lg-8" style="margin: 0 auto;">
            <!--<div class="row">-->
              <section style="margin-top:3rem;box-shadow: 0px 0px 4px 0px;">
                <!--<div class="row">-->
                 <h1 style="text-align:center;padding-top: 2rem;">Material Request</h1><br>
                <!--</div>-->
                <div class="pie-align" style="text-align:center;padding-bottom: 1rem;">
                    <div class="pieID pie" style="margin-top:1rem;"></div>
                    <ul class="pieID legend" style="margin-top: 3rem; text-align: justify;">
                      <li>
                        <em>Pending</em>
                        <span><?php echo $Pending;?></span>
                      </li>
                      <li>
                        <em>Approved</em>
                        <span><?php echo $Approved;?></span>
                      </li>
                      <li>
                        <em>Cancel</em>
                        <span><?php echo $Cancel;?></span>
                      </li>
                    </ul>
                </div>
              </section>
            <!--</main>-->
            <!--</div>-->
        </div>
    </div>
    
    
<?= $this->endSection() ?>

<?= $this->section('styles')?>

<style>

.counter {
  animation-duration: 1s;
  animation-delay: 0s;
}

@keyframes bake-pie {
  from {
    transform: rotate(0deg) translate3d(0,0,0);
  }
}

/*main {*/
/*  width: 400px;*/
/*  margin: 30px auto;*/
/*}*/

.pieID {
  display: inline-block;
  vertical-align: top;
}
.pie {
  height: 200px;
  width: 200px;
  position: relative;
  margin: 0 30px 30px 0;
}
.pie::before {
  content: "";
  display: block;
  position: absolute;
  z-index: 1;
  width: 100px;
  height: 100px;
  background: #EEE;
  border-radius: 50%;
  top: 50px;
  left: 50px;
}
.pie::after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: rgba(0,0,0,0.1);
  border-radius: 50%;
  box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
  margin: 220px auto;
  
}
.slice {
  position: absolute;
  width: 200px;
  height: 200px;
  clip: rect(0px, 200px, 200px, 100px);
  animation: bake-pie 1s;
}
.slice span {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background-color: black;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  clip: rect(0px, 200px, 200px, 100px);
}
.legend {
  list-style-type: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  padding: 15px;
  font-size: 13px;
  box-shadow: 1px 1px 0 #DDD,
              2px 2px 0 #BBB;
}
.legend li {
  width: 110px;
  height: 1.25em;
  margin-bottom: 0.7em;
  padding-left: 0.5em;
  border-left: 1.25em solid black;
}
.legend em {
  font-style: normal;
}
.legend span {
  float: right;
}

</style>


<?= $this->endSection() ?>

<?= $this->section('scripts')?>


<script>
    $('.counter').counterUp({
      delay: 10,
      time: 2000
    });
    $('.counter').addClass('animated fadeInDownBig');
    $('h3').addClass('animated fadeIn');

</script>

<script>
    function sliceSize(dataNum, dataTotal) {
  return (dataNum / dataTotal) * 360;
}
function addSlice(sliceSize, pieElement, offset, sliceID, color) {
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
  var listData = [];
  $(dataElement+" span").each(function() {
    listData.push(Number($(this).html()));
  });
  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "cornflowerblue", 
    "olivedrab", 
    "orange", 
    "tomato", 
    "crimson", 
    "purple", 
    "turquoise", 
    "forestgreen", 
    "navy", 
    "gray"
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
}
createPie(".pieID.legend", ".pieID.pie");
</script>

<?= $this->endSection()?>
  <?php
 include 'DBConnection.php';
$connc=new DBConnection();
 $booat = $connc->getOne("SELECT * FROM `data` ORDER BY `id` DESC LIMIT 1 ");
            //   foreach( $tractor as $tractor)
            //   {
?>
<!--<div id="" class="chart">-->
<div class="row">
 <div class="card  col-md-4 bg-danger  m-1"   > 
 <h1 class="text-center"><?=$booat['speed']?>kpm/H</h1>
 <div class="card bg-light">
        <h3 class="text-center">Boat Speed</h3>

</div>
</div> 
<div class="card  col-4 bg-dark m-1"   >
      <h1 class="text-center text-light"> <?=substr(((($booat['water_level'])*100)/450),0,4)?>%</h1>
 <div class=" <?if(substr(((($booat['water_level'])*100)/450),0,4)<=10){ ?>
              bg-warning <?}else{?> bg-success<?}?>">
        <h3 class="text-center"> Sea Level</h3> 
</div>
</div> 
<!--SELECT `id`, `Sn`, `speed`, `due`, `lat_str`, `long_str`, `water_level`, `wter_presence` FROM `data` WHERE 1-->
 <div class="card  col-4 bg-warning  m-1">
      <h2 class="text-center">
          <?php if($booat['wter_presence']==1){ ?>
              LINKING <?php }else{?> No Linkage<?php }?>
              
      </h2>

        
 <div class="card <?php if($booat['wter_presence']==1){ ?>
              bg-danger <?php }else{?> bg-warning<?php  }?>  m-1" >
         <h3 class="text-center"> water linkage</h3>
 
</div> 
</div>
<div class="card  col-4 bg-white  m-1"   >
      <h5 class="text-center">
           <?php if($booat['emeragance']==1){ ?>
              REQUIRED <?php }else{?> NOT REQUIRED<?php }?>
          </h5>
 <div class="card bg-danger  m-1">
   </div>
 <div class="card  <?php if($booat['emeragance']==1){ ?>
              bg-warning <?php }else{?> bg-warning<?php }?>  m-1" >
     <h3 class="text-center"> EMERGANCE</h3>
</div> 
</div> 
</div>
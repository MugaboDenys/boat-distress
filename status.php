  <?php
 include 'DBConnection.php';
$connc=new DBConnection();
 $booat = $connc->getOne("SELECT * FROM `data` ORDER BY `id` DESC LIMIT 1 ");
            //   foreach( $tractor as $tractor)
            //   {
?>
<!--<div id="" class="chart">-->
<div class="row d-flex justify-content-center gap-2">
 <div class="card  col-md-5 bg-danger  m-1"   > 
 <h1 class="text-center"><?=$booat['speed']?> KPH</h1>
 <div class="card bg-light">
        <h3 class="text-center">Boat Speed</h3>

</div>
</div> 
<div class="card  col-5 bg-dark m-1"   >
      <h1 class="text-center text-light"> <?=substr(((($booat['water_level'])*100)/450),0,4)?>%</h1>
 <div class=" <?if(substr(((($booat['water_level'])*100)/450),0,4)<=10){ ?>
               <?}else{?> bg-success<?}?>">
     <div class="card bg-warning">
          <h4 class="text-center"> Water Level</h4> 
     </div>
              
</div>
</div> 
<!--SELECT `id`, `Sn`, `speed`, `due`, `lat_str`, `long_str`, `water_level`, `wter_presence` FROM `data` WHERE 1-->
 <div class="card col-5 bg-warning  m-1">
      <h3 class="text-center">
          <?php if($booat['wter_presence']==1){ ?>
              Leakage detected <?php }else{?> No Leakage<?php }?>
              
      </h3>

        
 <div class="card <?php if($booat['wter_presence']==1){ ?>
              bg-danger <?php }else{?> bg-light<?php  }?>  m-1" >
         <h4 class="text-center text-sm"> Water Leakage</h4>
 
</div> 
</div>
<div class="card  col-5 bg-white  m-1"   >
      <h5 class="text-center mt-1">
           <?php if($booat['emeragance']==1){ ?>
              Dispatch Rescue <?php }else{?> No Rescue Required<?php }?>
          </h5>
 <div class="card bg-danger  m-1">
   </div>
 <div class="card h-75 d-flex <?php if($booat['emeragance']==1){ ?>
              bg-danger <?php }else{?> bg-warning<?php }?>  m-1" >
     <h4 class="text-center ">Emergency</h4>
</div> 
</div> 
</div>



<?php
// include Function  file
include_once('function.php');
// Object creation
$userdata=new DB_con();
if(isset($_POST['submit']))
{
// Posted Values
$sn=$_POST['sn'];
$name=$_POST['name'];
$type=$_POST['type'];
$location=$_POST['location'];
$function=$_POST['function'];
$cost=$_POST['cost'];
$desc=$_POST['desc'];
//Function Calling
$sql=$userdata->registration($sn,$name,$type,$location,$function,$cost,$desc);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('saved successfull');</script>";
echo "<script>window.location.href='add-tractor.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='add-tractor.php'</script>";

}
}

?>

<?php
include('naviba.php');
?>
<script type="javascript">
    $(document).ready(function () {
    $('#rtrt').DataTable();
});
</script>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item"><a href="add-agent.php">Report</a></li>
          
          <!--<li class="breadcrumb-item"><a href="Add-tractor.php">Available-Cars</a></li>-->
        </ol>
      </nav>
    </div><!-- End Page Title -->
   
    <div class="card-body bg-light">
     <div class="text text-center text-primary">
      <h2>Tracking Records</h2>
      <hr>
    </div> 
 <?php 
    $agent=$_GET['SfsfgXa543F'];
                $i=1;
                $tractor = $connc->getAll("SELECT `id`, `Sn`, `speed`, `due`, `lat_str`, `long_str`, `water_level`, `wter_presence` FROM `data` WHERE `Sn`='".$agent."'  ORDER BY `id` DESC");
              if(!$tractor){
                  
                  ?>
                     <div class="text text-center text-light bg-warning">
                      <h2>This has never taken in Operation</h2>
                    </div> 
                <?php 
                  
              }else{
                  ?>
  <table class="table table-borderless datatable">
    <thead class="text text info" style="font-size: 9px">
      <tr>
        <th>#</th>
        <th>S/N</th>
        <!--<th>Plate Number</th>-->
        <th>Boat  Speed </th>
        <th>water_level</th>
        <th>Boat linkage</th>
       
        <th>Emerence Help</th> 
        <th>Lcation</th>
        <th>Due Time </th>
        <!-- <th>Location</th>
        <th>functionality</th>
        <th>Cost</th>
        <th>Description</th> -->
        <th class=" bg-white">Action</th>

</tr>
    </thead>
    <tbody style="font-size: 11px "class="bg-light">
 <?php
              foreach( $tractor as $tractor)
              {
       ?>
        <tr>
          <td><?=$i++?></td>        
          <td><?=$tractor['Sn']?></td>
          <!--<td><?=$tractor['possn']?></td>-->
          <td><?=$tractor['speed']?></td>
          <td> <?=substr(((($booat['water_level'])*100)/450),0,4)?> % </td>
          <td><?if($tractor['wter_presence']==1){ ?>
              LINKING <?}else{?> No LINKING<?}?></td>
          <td><?if($tractor['emeragance']==1){ ?>
              Required <?}else{?> Not required<?}?> <i class="bi bi-wave-alt"></i></td>
          <td>
            <button type="button" class="btn btn-sm-warning"  data-toggle="modal" data-target="#myModal">
            <i class="bi bi-geo-alt"></i>
            </button>
        </td>
          
          <td><?=$tractor['due']?></td>
          <td class=" bg-white">
            <!--<a href="edit_tractor.php?sn=<?=$tractor['id'];?>"><i class="bi bi-pencil size:100px" ></i></a> -->

            <a href="delete_tractor.php?sn=<?=$tractor['id']?>"class="alert-danger">  <i class="bi bi-trash3 "></i></a>
          </td>
        <tr>
      <?php }}
        
        ?>
    <tbody>
         </tfoot>
          <tr>
        <th>#</th>
        <th>S/N</th>
        <!--<th>Plate Number</th>-->
        <th>Boat  Speed </th>
        <th>water_level</th>
        <th>Boat linkage</th>
       
        <th>Emerence Help</th> 
        <th>Lcation</th>
        <th>Due Time </th>
        <!-- <th>Location</th>
        <th>functionality</th>
        <th>Cost</th>
        <th>Description</th> -->
        <th class=" bg-white">Action</th>
         </tfoot>
  <table>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Deni</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     
      Designed by <a href="#">Deni</a>
    </div>
    
     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BOAT lOCATION</h4>
        </div>
        <div class="modal-body">
         <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2151.951814268522!2d30.100001332028203!3d-1.9834421387122856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwNTknMDEuMyJTIDMwwrAwNicwNC4yIkU!5e1!3m2!1sen!2srw!4v1681819620919!5m2!1sen!2srw" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min."></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
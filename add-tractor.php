


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
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item"><a href="add-agent.php">Report</a></li>
          
          <!-- <li class="breadcrumb-item"><a href="Add-tractor.php">Available-Cars</a></li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->
   
    <section id="rent" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
        <div class="row">  
              <div class="col-md-5 form-group">
          <div class="section-title text-center">

            <h2>Add new Water Meter</h2>
          </div>
          <div class="row">
          <form action="" method="POST" >
               <div class="row">
              <div class="col-md-12 form-group">
                <input type="text" name="sn" class="form-control" id="s/n" placeholder="S/N" required>
              </div>
              </div>
              <div class="row">
              <div class="col-md-12 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="name" id="name" placeholder=" Plate Number" required>
              </div>
              </div>
              <div class="col-md-12 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="type" id="type" placeholder="Ouner Telphone" required>
              </div>
            </div>
            <!-- </div> -->
            <div class="row">
              <hr>
            <div class="text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="submit">
              </div>
              </div>
          </form>
          <br>   
       </div>
 
    <!-- End Appointment Section -->
    <div class="col-md-7 form-group bg-light">
    <div class="card-body">
     <div class="text text-center text-success">
      <h2>view all Vehicle</h2>
    </div>  <br>

  <table class="table table-bordered table-striped bg-white">
    <thead class="text text info">
      <tr>
        <th>#</th>
        <th>S/N></th>
        <th>Plate Number</th>
        <th>Telphone </th>
        <!-- <th>Location</th>
        <th>functionality</th>
        <th>Cost</th>
        <th>Description</th> -->
        <th class=" bg-white">Action</th>

</tr>
    </thead>
    <tbody style="font-size: 12px">
    <?php 
            $tractor = $userdata->displayData(); 
            $i=1;
              foreach( $tractor as $tractor)
              {
       ?>
        <tr>
          <td><?=$i++?></td>        
          <td><?=$tractor['sn']?></td>
          <td><?=$tractor['tname']?></td>
          <td><?=$tractor['t_type']?></td>
          <!-- <td><?=$tractor['location']?></td>
          <td><?=$tractor['functionality']?></td>
          <td><?=$tractor['cost']?></td>
          <td><?=$tractor['description']?></td>   -->
          
          <td class=" bg-white">
            <a href="edit_tractor.php?sn=<?=$tractor['id'];?>"><i class="bi bi-pencil size:100px" ></i></a> -----

            <a href="delete_tractor.php?sn=<?=$tractor['id']?>"class="alert-danger">  <i class="bi bi-trash3 "></i></a>
          </td>
        <tr>
      <?php }
        
        ?>
    <tbody>
  <table>
  </div>
</div>
</section class="color white">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">script>
<br>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>VRT</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">Virtual Rwanda Technology</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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
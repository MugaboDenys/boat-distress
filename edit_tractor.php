
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
          <li class="breadcrumb-item"><a href="admin-dashboard.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   
    <section id="rent" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title text-center">
            <h2>well come Mr.Isiel to add new tractor</h2>
          </div>
            <br>
            <?php
include_once('DBConnection.php');
// Object creation
$conn=new DBConnection();
if(!empty($_GET['sn']))
{
$id=$_GET['sn'];

$edit=$conn->getOne("SELECT* FROM tractor WHERE id='".$id."'");
$_SESSION['edit']=$edit;

?>
          <form action="" method="POST" >
            <div class="row">
            <div class="col-md-4 form-group">
                <input type="hidden" name="sn" class="form-control" value="<?=$edit['id']?>" id="s/n" placeholder="S/N" required>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" name="sn" class="form-control" value="<?=$edit['sn']?>" id="s/n" placeholder="S/N" required>
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="name" value=" <?=$edit['tname']?>" id="name" placeholder=" Tractor-name" required>
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="type"  value=" <?=$edit['t_type']?>" id="type" placeholder="Tractor-type" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 form-group mt-3">
                <input type="text" name="location" class="form-control"  value=" <?=$edit['location']?>"  id="location" placeholder="location" required>
              </div>
              <div class="col-md-4 form-group mt-3">
                <input type="text" name="function" class="form-control" value=" <?=$edit['functionality']?>"  id="function" placeholder="functionality" required>
              </div>
              <div class="col-md-4 form-group mt-3">
                <input type="text" name="cost" class="form-control " value=" <?=$edit['cost']?>"  id="cost" placeholder="cost" required>
              </div>
            </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="desc"  value=" "rows="4" ><?=$edit['description']?></textarea>
              </div><br>
            <div class="text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="submit">
              </div>
          </form>
          <?php }?>
          <br>   
        </div>
      </section class="color white"><!-- End Appointment Section -->
    <div class="card-body">
     <div class="text text-center text-success">
      <h2>view all records</h2>
    </div>  <br>
  </div>
</div>
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
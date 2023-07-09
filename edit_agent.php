

<?php
// include Function  file
include_once('function.php');
// Object creation
$userdata=new DB_con();
if(isset($_POST['submit']))
{
// Posted Values
$nid=$_POST['nid'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$location=$_POST['location'];
$pass=$_POST['pass'];
//Function Calling
$sql=$userdata->addagent($nid,$name,$email,$phone,$location,$pass);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Registration successfull.');</script>";
echo "<script>window.location.href='add-agent.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='add-agent.php'</script>";
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
            <h2 style="font-size 8px;">  well come</h2>
          </div>
            <br>
            <?php
include_once('DBConnection.php');
// Object creation
$conn=new DBConnection();
if(!empty($_GET['sn']))
{
$id=$_GET['sn'];

$edit=$conn->getOne("SELECT* FROM agent WHERE id='".$id."'");
$_SESSION['edit']=$edit;

?>
          <form action="update_agent.php" method="post" role="form" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-md-4 form-group">
              <input type="hidden" name="id" class="form-control" value=" <?=$edit['id']?>" id="name" placeholder="Agent name" required>
                <input type="text" name="name" class="form-control" value=" <?=$edit['names']?>" id="name" placeholder="Agent name" required>
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="email" value="<?=$edit['email']?> "id="email" placeholder="email" required>
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="tel" class="form-control" name="phone"value="<?=$edit['phone']?> " id="phone" placeholder="Your Phone" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 form-group mt-3">
                <input type="type" name="location" value=" <?=$edit['location']?>"class="form-control datepicker" id="district" placeholder="location" required>
              </div>
              <div class="col-md-4 form-group mt-3">
                <input type="hidden" name="nid"value="<?=$edit['nid']?> " class="form-control datepicker" id="sector" placeholder="NID" required>
              </div>
              <div class="col-md-4 form-group mt-3">
                <input type="type" name="pass" value=" <?=$edit['password']?>"class="form-control datepicker" id="sector" placeholder="password" required><br>
              </div>
            <div class="text-center">
                <input type="submit" name="submit" value="update" class="btn btn-primary">
              </div>
          </form>
        </div>
      </section><!-- End Appointment Section -->
 <?php   }  ?> 
    <br>
<!--    <table class="table table-bordered table-striped" style="font-size:12px bg-white text-primary">-->
<!--    <thead class="text text info">-->
<!--      <tr>-->
<!--      <th>#</th>-->
        <!--<th>NID</th>-->
<!--        <th> Serial Number</th>-->
<!--        <th>latitude</th>-->
<!--        <th>Longtude</th>-->
<!--        <th>Location</th>-->
        <!--<th>password</th>-->
<!--        <th>Action</th>-->
        
<!--</tr>-->
<!--    </thead>-->
<!--    <tbody style="font-size:11px">-->
   <?php 
// <!--            $agent = $userdata->dispalyagentdata(); -->
// <!--          $i=1;-->
// <!--              foreach( $agent as $agent)-->
// <!--              {-->
      ?>
<!--        <tr>-->
<!--        <td><?=$i++?></td>-->

          <!--<td><?=$agent['nid']?></td>-->
<!--          <td><?=$agent['names']?></td>-->
<!--          <td><?=$agent['email']?></td>-->
<!--          <td><?=$agent['phone']?></td>-->
<!--          <td><?=$agent['location']?></td>-->
<!--          <td><?=$agent['password']?></td> -->
<!--          <td>-->
<!--          <a href="edit_agent.php?sn=<?=$agent['id'];?>" ><i class="bi bi-pencil"></i></i></a> -->

<!--              <a href="delete.php?sn=<?=$agent['id']?>"class="alert-danger">  <i class="bi bi-trash3 "></i></a>-->
<!--              </td>-->
<!--        <tr>-->
  <?php 
    
// }
        
   ?>
<!--    <tbody>-->
<!--  <table>-->
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Deni</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">deni</a>
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
<?php

if (isset($_POST['submit'])) 
{
  include 'DBConnection.php';
  $connc=new DBConnection();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  // $location = $_POST['location'];
  // $pass=$_POST['pass'];
//Function Calling
  $data = $connc->getOne("SELECT * FROM  `agent` WHERE `agent`.`names` = '" . $name . "'");
  $ddddd = $data['location'] + $email;
  // $ups = $connc->execute("UPDATE `agent` SET `agent`. `email` = $ddddd , `agent`.`location` = $ddddd WHERE `agent`.`names` = '$name'");
  // if ($ups) 
  // {
  //      $message=" your Water-meter code Number is '".$name."' , thank you ";

  // } 
  // else {
    $updd = $connc->execute("INSERT INTO `agent`(`names`, `email`, `phone`, `location`)VALUES ('$name','0','$phone','0')");
    if ($updd) 
        {
         $message=" your safe-Boat code Number is '".$name."' , thank you ";
        // echo $message;
         $data=array("sender"=>'+250781832465',
         "recipients"=>'+25'+$phone,
         "message"=>$message,
         );
           $url="https://www.intouchsms.co.rw/api/sendsms/.json";
           $data=http_build_query($data);
           $username="BUTATA";
           $password="THEGREAT1";
           $ch=curl_init();
           curl_setopt($ch,CURLOPT_URL,$url);
           curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
           curl_setopt($ch,CURLOPT_POST,true);
           curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
           curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
           curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
           $result=curl_exec($ch);
           $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
           curl_close($ch);
           $result;
           $httpcode;
            //  echo "SUCCESS Affected ";
      //  exit();
  
      echo "<script>window.location.href='add-agent.php'</script>";
    } else {
    //   echo "Failed";
      echo "<script>window.location.href='add-agent.php'</script>";
    }





  }


// }
// $sql=$userdata->addagent($name,$email,$phone,$location);
// if($sql)
// {
// // Message for successfull insertion
// echo "<script>alert('Registration successfull.');</script>";
// echo "<script>window.location.href='add-agent.php'</script>";
// }
// else
// {
// // Message for unsuccessfull insertion
// echo "<script>alert('Something went wrong. Please try again');</script>";
// echo "<script>window.location.href='add-agent.php'</script>";
// }
// }
?>


<?php
include('naviba.php');
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
       <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item"><a href="add-agent.php">Report</a></li>
          <!-- <li class="breadcrumb-item"><a href="add-agent.php">Report</a></li>
          
          <li class="breadcrumb-item"><a href="Add-tractor.php">Available-Cars</a></li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section id="rent" class="appointment section">
        <div class="container-fluid" data-aos="fade-up">
        <div class="row" data-aos="fade-up">
        <div class="col-md-3   bg-warning">
          <div class="section-title text-center">
            <h2 style="font-size 8px;">new safe-Boat tracker</h2>
          </div>
            <br>
          <form action="" method="post" role="form" data-aos="fade-up" data-aos-delay="100">
            <!-- <div class="row"> -->
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="safe-Boat" required>
              </div>
              <!-- <div class="form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="email" id="email" placeholder="AMOIUNT" required>
              </div> -->
              <div class=" form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="telphone" required>
              </div>
              <div class="row">
            <div class="text-center">
                <input type="submit" name="submit" value="Register" class="btn btn-primary">
              </div>
          </form>
        </div>
        </div>  
  <div class="col-md-8">
    <h1>Historical Records</h1>
     <table class="table table-borderless datatable"style="font-size:10px">
    <thead class="text text-primary">
      <tr>
        <th>#</th>
        <th>S/NUMBER </th>
        <th>Telphone</th>
        <th>Speed</th>
        <th>water_level</th>
         <th>Linkage</th>
        <th colspan="2">Optional</th>  
      </tr>
    </thead>
    <tbody style="font-size:11px">
    <?php 
          $agent = $connc->getAll("SELECT * FROM agent"); 
          $i=1;
          foreach( $agent as $agent)
              {
            $DAF = 323 *$agent['email'];
            $tractor = $connc->getOne("SELECT * FROM `data` WHERE  `Sn`='".$agent['names']."'");
            //   foreach( $tractor as $tractor)
            //   {`id`, `Sn`, `speed`, `due`, `lat_str`, `long_str`, `water_level`, `wter_presence`
       ?>
        <tr>
        <td><?=$i++?></td>
          <td><?=$agent['names']?></td>
          <td><?=$agent['phone']?></td>
          <!--<td><?= $agent['email']?> M<sup>3</sup>  </td>-->
          <!--<td><?=$DAF = 323 *$agent['email']?> FRw</td>-->
          <td><?=$tractor['speed']?></td>
          <td> <?=substr(((($booat['water_level'])*100)/450),0,4)?></td>
           <td><?=$tractor['wter_presence']?></td>
          <td>
          <a href="edit_agent.php?sn=<?=$agent['id'];?>" ><i class="bi bi-pencil"></i></i></a> 
          <a href="delete.php?sn=<?=$agent['id']?>"class="alert-danger">  <i class="bi bi-trash3 "></i></a>
          </td>
           <td>
       
          <a href="report.php?SfsfgXa543F=<?=$agent['names']?>"class="alert-danger">  <i class="bi bi-eye "></i></a>
          </td>
        <tr>
      <?php }
        
        ?>
    <tbody>
    <table>
    </div>
    </div>
    <!-- <br><br>
  </section> -->

  

</div>
</div></div></div>
</div></div></div></div>
  <div class="footer bg-darker">
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>safe-Boat</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">safe-Boat</a>
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
  </div>
</body>

</html>
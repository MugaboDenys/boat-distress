<?php 
	ob_start();
	include('header.php');
	include_once("db_connect.php");
?>
<title></title>
<script type="text/javascript" src="script/ajax.js"></script>
<?php 
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tractor set sn='" . $_POST['sn'] . "', tname='" . $_POST['name'] . "', t_type='" . $_POST['type'] . "',  location='" . $_POST['location'] . "',  functionlity='" . $_POST['function'] . "', cost='" . $_POST['cost'] . "',  description='" . $_POST['description'] . "'");
$message = "Record Modified Successfully";
header("location:add-tractor.php");
}
$result = mysqli_query($conn,"SELECT *  FROM  WHERE ='" . $_GET['id'] . "'");
$student= mysqli_fetch_array($result);
?>
<?php
include('naviba.php');
?>
<div class="container">
<h1 class="text-success text-center">UPDATE INFO HERE</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend class="text-info">ADD PERSON INFORMATION</legend>

					<div class="form-group">
						<label for="name">serior number</label>
						<input type="text" name="id" class="txtField" value="<?php echo $tractor['sn']; ?>">
						
					</div>
					<div class="form-group">
						<label for="name"> Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?=$tractor['tname'];?>" class="form-control" />
						
					</div>
					
					<div class="form-group">
						<label for="name">type</label>
						<input type="text" name="email" placeholder="Email" required value="<?=$tractor['t_type'];?>" class="form-control" />
			
					</div>

					<div class="form-group">
						<label for="name">location</label>
						<input type="text" name="age" placeholder="Age" required class="form-control" value="<?=$tractor['location'];?>">
						
					</div>

					<div class="form-group">
						<label for="name">functionality</label>
						<input type="text" name="sex" placeholder="Sex" required class="form-control" value="<?=$tractor['functionality'];?>">
						
					</div>
          <div class="form-group">
						<label for="name">cost</label>
						<input type="text" name="sex" placeholder="Sex" required class="form-control" value="<?=$tractor['cost'];?>">
						
					</div>
          <div class="form-group">
						<label for="name">description</label>
						<input type="text" name="sex" placeholder="Sex" required class="form-control" value="<?=$tractor['description'];?>">
						
					</div>

					<div class="form-group">
						<input type="submit" name="add" value="update" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			
		</div>
	</div>
	<div class="row">
	
	</div>	
	<div style="margin:50px 0px 0px 0px;">
				
	</div>
</div>
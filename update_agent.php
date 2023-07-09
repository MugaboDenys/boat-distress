<?php
include_once('DBConnection.php');
// Object creation
$conn=new DBConnection();
// if(!empty($_GET['sn']))
// {
// $id=$_GET['sn'];

// $edit=$conn->getOne("SELECT* FROM agent WHERE nid='".$id."'");
// $_SESSION['edit']=$edit;

if(isset($_POST['submit']))
{
// Posted Values
$id=$_POST['id'];
$nid=$_POST['nid'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$location=$_POST['location'];
$pass=$_POST['pass'];
//Function Calling

//UPDATE `agent` SET `nid`='[value-1]',`names`='[value-2]',`email`='[value-3]',`phone`='[value-4]',`location`='[value-5]',`password`='[value-6]' WHERE 1


$edit=$conn->execute("UPDATE `agent` SET `nid`='$nid',`names`='$name',`email`='$email',`phone`='$phone',`location`='$location',`password`='$pass'  WHERE id='".$id."'");
// $sql=$userdata->addagent(,$name,$email,$phone,$location,$pass);
if($edit)
{
// Message for successfull insertion
echo "<script>alert('Updated successfull.');</script>";
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
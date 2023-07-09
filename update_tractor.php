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
$sn=$_POST['sn'];
$name=$_POST['name'];
$type=$_POST['type'];
$location=$_POST['location'];
$function=$_POST['function'];
$cost=$_POST['cost'];
$description=$_POST['desc'];
//Function Calling

//UPDATE `agent` SET `nid`='[value-1]',`names`='[value-2]',`email`='[value-3]',`phone`='[value-4]',`location`='[value-5]',`password`='[value-6]' WHERE 1


$edit=$conn->execute("UPDATE `tractor` SET `sn`='$sn',`tname`='$name',`t_type`='$type',`location`='$location',`location`='$location',`functionality`='$function',`cost`='$cost',`description`='$desc'  WHERE id='".$id."'");
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
<?php
include_once('DBConnection.php');
// Object creation
$conn=new DBConnection();
if(!empty($_GET['sn']))
{
$id=$_GET['sn'];
$query =$conn->execute("DELETE  from agent where id='".$id."'");        
if($query)
{
    echo "<script>alert('Deleted');</script>";
    echo "<script>window.location.href='add-agent.php'</script>";
}
else
{echo "fail";
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='add-agent.php'</script>";
    }
}
else
{echo "fail";}
?>
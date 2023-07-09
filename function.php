<?php

define('DB_HOST','localhost');
define('DB_USER','vrt_safeboat');
define('DB_PASSWORD','vrt_safeboat');
define('DB_DATABASE','vrt_safeboat');

class DB_con
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        if($conn->connect_error)
        {
            die ("<h1>Database Connection Failed</h1>");
        }
        //echo "Database Connected Successfully";
        return $this->conn = $conn;
    }
    public function registration($sn,$name,$type,$location,$function,$cost,$desc)
    {
        $ret=mysqli_query($this->conn,"insert into tractor(sn,tname,t_type,location,functionality,cost,description) values('$sn','$name','$type','$location','$function','$cost','$desc')");
        return $ret;
        }
    public function displayData()
        {
        $query = "SELECT * FROM tractor";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
        }else{
        echo "No found records";
        }
        }
 
    public function addagent($nid,$name,$email,$phone,$location,$pass)
    {
        $agent=mysqli_query($this->conn,"insert into agent(nid,names,email,phone,location,password) values('$nid','$name','$email','$phone','$location','$pass')");
        return $agent; 
    }

    public function dispalyagentdata()
        {
        $query = "SELECT * FROM agent";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
        }else{
        echo "No found records";
        }
        }
        public function deleteRecord($id)
		{
			$sql = "DELETE from $this->tractor where sn=$id";
			$query = $this->conn->query($sql);
			$data = array();
			if ($query) {
				return true;
			}else{
				return false;
			}
		}
public function getDataStatus()
{
        $goog = "SELECT * FROM `data` ";
        $resultx=$this->conn-($goog);
        $data = array();
        if($goog)
        {
            return true;

        }else{
            return false;
         }
}
     
 }



?>
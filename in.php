<?php
include 'DBConnection.php';
$connc=new DBConnection();

//  $dataSss = $connc->getAll("SELECT * FROM  `agent`");
//             foreach($dataSss as $dataSss)
//             {
//                 $recipients=$dataSss['phone'];
                
//                 echo $recipients;
                
//             }


// if (!empty($_GET['sn']))
//  {
    $Sne = $_GET['sn'];
    $water = $_GET['water'];
    
    $speed = $_GET['car_speed'];
    $limitspeed = 9;
    $due =90;
    $dsd = $connc->execute("INSERT INTO `data`( `Sn`, `possn`, `speed`, `limitspeed`)
             VALUES ('$Sne', '$water', '$speed', '$limitspeed')");
    $data = $connc->getOne("SELECT * FROM  `agent` WHERE `agent`.`names` = '" .$Sne."'");
    // echo $data['location'];
   echo $remain = $data['location'] + $_GET['water'];

if (($data['location'] <= 0)|| ($water<=0))
    {
    //    echo "OUT";
        // echo $data['location'];void
    } 
    else {
       
       if($remain==$data['location'])
       {
           
       }else{
        $ups = $connc->execute("UPDATE `agent` SET `location` = '$remain' WHERE `agent`.`names` = '$Sne'");
        if ($ups) {
            
            $dataSss = $connc->getAll("SELECT * FROM  `agent`");
            foreach($dataSss as $dataSss)
            {
            $message=" Water used '".$water."' , in Littres of water meter  with cost of ='".($water*323)."' FRW ";
            // echo $message;
             $data=array("sender"=>'+250781832465',
             "recipients"=>$dataSss['phone'],
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
            }

        } else {
            // echo "Failed";
        }
       }
    }
// }
// else{

//     echo "000";
// }
?>
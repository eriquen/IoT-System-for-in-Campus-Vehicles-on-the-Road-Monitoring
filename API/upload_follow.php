<?php 
include("../admin/includes/init.php"); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	echo $_POST['speed'];
    if($_POST['speed']){
            $follow = new Follow();
            $follow->speed = $_POST['speed'];
            date_default_timezone_set('asia/kuala_lumpur');
            $follow->date = date("Y-m-d H:i:s");
            if($follow->create()){
                $message =  "Summon upload successfully";
            }else{
                $message = join("<br>", $summon->errors);
            }
        }
    } 
?>
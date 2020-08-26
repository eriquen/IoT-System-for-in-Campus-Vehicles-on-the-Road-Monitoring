<?php 
include("../admin/includes/init.php"); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['speed']){
	
        $user = User::find_by_plate($_POST['plate_num']);
        if($user){   
            $summon = new Summon();
            $summon->plate_num_rpi = $_POST['plate_num'];
            $summon->ic_num = $user->id;
            $summon->car_speed = $_POST['speed'];
            date_default_timezone_set('asia/kuala_lumpur');
            $summon->time = date("Y-m-d H:i:s");
            $summon->set_file($_FILES['file']);
        
            if($summon->save()){
                echo $message =  "Summon upload successfully";
            }else{
                echo $message = join("<br>", $summon->errors);
            }

        }else{

            $summon = new Summon();
            $summon->user_id = 0;
            $summon->plate_num_rpi = $_POST['plate_num'];
            $summon->ic_num = "Not Found";
            $summon->car_speed = $_POST['speed'];
            date_default_timezone_set('asia/kuala_lumpur');
            $summon->time = date("Y-m-d H:i:s");
            $summon->set_file($_FILES['file']);
        
            if($summon->save()){
                echo $message =  "Summon upload successfully";
            }else{
                echo $message = join("<br>", $summon->errors);
            }

        }

    

    }
 echo $message;

}
?>
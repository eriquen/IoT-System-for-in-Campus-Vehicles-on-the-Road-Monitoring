
<?php include("includes/header.php"); ?>
<?php include("includes/init.php"); ?>
<?php $message = ""; ?>
<?php 

if(empty($_GET['id'])){
    redirect("summons.php");
}else{
    $summon = Summon::find_by_id($_GET['id']);
    $set = Setting::find_by_id(1);
    $user = User::find_by_id($summon->user_id);
    if($user){
        $owner_name = $user->first_name ." " . $user->last_name;
        $ic_num = $summon->ic_num;
    }else{
        $owner_name = "NOT FOUND";
        $ic_num= strtoupper($summon->ic_num);

    }
    
    
}

?>
<li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="teal-text text-darken-3 waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="teal-text  waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>
            <div class="col l10">
            <div class="container grey lighten-4 mt-50">
                <div class="grey lighten-4 p-2">
                <div class="row n-m">
                    <div>
                        <div class="col l4">
                            <div class="logo_u">
                                <img class="logo" src="images/logo/unimap_logo.png">
                                <p class="n-m">UniMAP Security Department </p>
                            </div>
                        </div>
                        <div class="col l4">
                            <div class="letter_title">
                                <h5>INFRINGEMENT NOTICE</h5>
                                <h6>OFFENCE DETECTED BY A ROAD SAFETY CAMERA</h6>
                            </div>
                        </div>
                        <div class="col l4">
                            <ul class="contact-detail">
                                <li>REF : <?php echo $summon->id?></li>
                                <li>CONTACT USE</li>
                                <li>04-9798181 / 04-9798571</li>
                                <li>jabatankeselamatan@unimap.edu.my</li>
                            </ul>
                          
                        </div>
                    </div>
                    
                </div>
                <div class="row head-line" ></div>
                </div>
                <div class="row n-p-t">
                    <div class="col l8">
                        <ul>
                            <li class="sum_detail">OFFENCE DETAIL         </li>
                            <li>VEHICLE REGISTRATION:&ensp;<?php echo $summon->plate_num_rpi ?></li>
                            <li>OWNER:&emsp;&emsp;&emsp;&emsp;&nbsp;&ensp;&ensp;&nbsp;&emsp;&emsp;<?php echo strtoupper($owner_name)  ?></li>
                            <li>IC NO/PASSPORT NO:&ensp;&ensp;&ensp;<?php echo $ic_num ?></li>
                            <li>OFFENCE LOCATION:&ensp;&ensp;&ensp;&ensp;UNIVERSITI MALAYSIA PERLIS, PAUH</li>
                            <li>OFFENCE DATE:&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $summon->time ?></li>
                            <li>PERMITTED SPEED:&emsp;&emsp;&nbsp;&nbsp;&nbsp;<?php echo $set->speed_limit ?> KM/H</li>
                            <li>DETECTED SPEED:&emsp;&emsp;&emsp;&nbsp;<?php echo $summon->car_speed?> KM/H</li>
                        </ul>
                    </div>
                    <div class="col l4">
                        <div class="fine-wrap">
                            <div class="head-fine grey lighten-2">
                                <i class="small material-icons">assignment</i>
                                <h6> INFRINGEMENT NOTICE</h6>
                            </div>
                            <div class="fine-content">
                                <p>INFRINGEMENT :</br>PENALTY</p>
                                <h2>RM <?php echo $set->fine ?></h2>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l1"></div>
                    <div class="col l10">
                        <img class="vehicle_image"  src="<?php echo $summon->picture_path() ?>" alt="">
                    </div>
                    <div class="col l1"></div>

                </div>
                    <footer class="page-footer grey lighten-2">
                        <div class="footer-copyright">
                            <div class="ps-2">
                            <a class="black-text right" href="https://keselamatan.unimap.edu.my/index.php/en/">https://keselamatan.unimap.edu.my/index.php/en/</a>
                            </div>
                        </div>
                    </footer>
            </div>
        </div>
           
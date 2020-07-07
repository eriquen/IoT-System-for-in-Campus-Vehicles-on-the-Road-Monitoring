<?php include("includes/header.php"); ?>
<?php $message = ""; ?>
<?php
     if(isset($_POST['create'])){
         $summon = new Summon();
         $summon->user_id = $_POST['user_id'];
         $summon->ic_num = $_POST['ic_num'];
         $summon->car_speed = $_POST['car_speed'];
         date_default_timezone_set('asia/kuala_lumpur');
         $summon->time = date("Y-m-d H:i:s");
         $summon->set_file($_FILES['file_upload']);

         if($summon->save()){
             $message =  "Summon upload successfully";
         }else{
             $message = join("<br>", $summon->errors);
         }
     }
 ?>
                    <li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="teal-text  waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>
            <div class="col l2"></div>
            <div class="col l8">
                <h3>Add Summon</h3>
                <form action="add_summon.php" class="col s8" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="user_id" name="user_id" type="text" class="validate" required>
                            <label for="user_id">User ID</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="ic_num" type="text" class="validate" name="ic_num" required>
                            <label for="ic_num">IC Number / Passport Number</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="plate_num" type="text" class="validate" name="plate_num" required>
                            <label for="plate_num">Plate Number</label>
                        </div>
                        <div class="file-field input-field col s4">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="file_upload">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <span class="msg_info red white-text"><?php echo $message; ?></span>
                        </div>
                        <div class="input-field col s6">
                            <input id="car_speed" type="text" class="validate" name="car_speed" required>
                            <label for="car_speed">Car Speed</label>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn  right" name="create">Add</button>     
                            </div>
                         </div>
                    </div>
                </div>
           
                </form>
            </div>
        </div>
    </div>
</main>

    <footer class="page-footer teal down">
                <div class="footer-copyright">
                    <div class="container">
                        Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Syed Adzha</a>
                    </div>
                </div>
            </footer>


    <!--  Scripts-->
 
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });     
    </script>

</body>

</html>
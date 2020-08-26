<?php include("includes/header.php"); ?>

<?php $message = ""; ?>
<?php 

if(empty($_GET['id'])){
    redirect("summons.php");
}else{
    $summon = Summon::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if($summon){

            $summon->user_id = $_POST['user_id'];
            $summon->plate_num_rpi = $_POST['plate_num_rpi'];
            $user = User::find_by_plate($_POST['plate_num_rpi']);
            if($user){
                $summon->user_id = $user->id;
                $summon->ic_num = $user->ic_num;
            }
            
            if(empty($_FILES['file_upload'])){
                $summon->save();
            }else{
                $summon->set_file($_FILES['file_upload']);
                $summon->save();
                redirect("edit_summon.php?id={$summon->id}");
            }
        }
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
                <h3>Update Summon</h3>
                <form class="col s8" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12">
                             <img class="materialboxed car_image"  src="<?php echo $summon->picture_path() ?>" alt="">
                        </div>
                        <div class="input-field col s6">
                            <input  id="user_id" name="user_id" type="text" class="validate" value="<?php echo $summon->user_id?>">
                            <label for="user_id">User ID</label>
                        </div>
			<div class="input-field col s6">
                            <input id="plate_num_rpi" type="text" class="validate" name="plate_num_rpi" value="<?php echo $summon->plate_num_rpi?>">
                            <label for="plate_num_rpi">Number Plate</label>
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
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn  right" name="update">Update</button>     
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
            $('.materialboxed').materialbox();
        });     
    </script>

</body>

</html>
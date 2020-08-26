<?php include("includes/header.php"); ?>
<?php 

if(empty($_GET['id'])){
    redirect("setting.php");
}else{
    $set = Setting::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if($set){
            $set->fine = $_POST['fine'];
            $set->speed_limit = $_POST['speed_limit'];
            $set->distance = $_POST['distance'];
            $set->save();  
        }
    }
}

?>
                    <li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="teal-text waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>
            <div class="col l2"></div>
            <div class="col l8">
                <h3>Edit System Setting</h3>
                <form class="col s8" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="fine" name="fine" type="text" class="validate" value="<?php echo $set->fine; ?>">
                            <label for="fine">Fine(RM)</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="speed_limit" type="text" class="validate" name="speed_limit" value="<?php echo $set->speed_limit; ?>">
                            <label for="speed_limit">Speed Limit(KM/H)</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="distance" type="text" class="validate" name="distance" value="<?php echo $set->distance; ?>">
                            <label for="distance">Distance(KM)</label>
                        </div>
                    </div>
                      <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn  right" name="update">Update</button>     
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
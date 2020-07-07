<?php include("includes/header.php"); ?>

<?php 

if(empty($_GET['id'])){
    redirect("users.php");
}else{
    $user = User::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if($user){
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->email  = $_POST['email'];
            $user->password  = $_POST['password'];
            $user->matric_num  = $_POST['matric_num'];
            $user->ic_num  = $_POST['ic'];
            $user->plate_num  = $_POST['plate_num'];
            $user->car_brand  = $_POST['car_brand'];
            $user->car_color  = $_POST['car_color'];
            $user->phone_num  = $_POST['phone_num'];
            $user->user_type  = $_POST['user_type'];   
            $user->save();  
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
                <h3>Add User</h3>
                <form class="col s8" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="first_name" name="first_name" type="text" class="validate" value="<?php echo $user->first_name; ?>">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="last_name" value="<?php echo $user->last_name; ?>">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="<?php echo $user->email; ?>">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" value="<?php echo $user->password; ?>">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="matric_num" type="text" class="validate" name="matric_num" value="<?php echo $user->matric_num; ?>">
                            <label for="matric_num">Matric Number</label>
                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                        </div>
                        <div class="input-field col s6">
                            <input id="ic" type="text" class="validate" name="ic" value="<?php echo $user->ic_num; ?>">
                            <label for="ic">IC No/Passport No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                          <input id="car_brand" type="text" class="validate" name="car_brand" value="<?php echo $user->car_brand; ?>">
                          <label for="car_brand">Car Brand</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="car_color" type="text" class="validate" name="car_color" value="<?php echo $user->car_color; ?>">
                          <label for="car_color">Car Color</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="plate_num" type="text" class="validate" name="plate_num" value="<?php echo $user->plate_num; ?>">
                          <label for="plate_num">Plate Number</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone_num" type="text" class="validate" name="phone_num" value="<?php echo $user->phone_num; ?>">
                            <label for="phone_num">Phone Number</label>
                        </div>
                        <div class = "col s6">
                            <label>User Select</label>
                            <select name="user_type" required>
                                <option value = "Staff" <?php if ($user->user_type == 'Staff') echo 'selected' ; ?>>Staff</option>
                                <option value = "Student" <?php if ($user->user_type == 'Student') echo 'selected' ; ?>>Student</option> 
                            </select>               
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
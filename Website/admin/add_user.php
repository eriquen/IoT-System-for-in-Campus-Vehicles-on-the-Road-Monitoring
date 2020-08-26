<?php include("includes/header.php"); ?>

<?php 
        $user = new User();

        if(isset($_POST['create'])){

            if($user){
                $user->first_name = $_POST['first_name'];
                $user->last_name = $_POST['last_name'];
                $user->email  = $_POST['email'];
                $user->password  = md5($_POST['password'] . $_POST['email']);
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
                            <input  id="first_name" name="first_name" type="text" class="validate" required>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="last_name" required>
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="matric_num" type="text" class="validate" name="matric_num">
                            <label for="matric_num">Matric Number</label>
                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                        </div>
                        <div class="input-field col s6">
                            <input id="ic" type="text" class="validate" name="ic" required>
                            <label for="ic">IC No/Passport No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                          <input id="car_brand" type="text" class="validate" name="car_brand">
                          <label for="car_brand">Car Brand</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="car_color" type="text" class="validate" name="car_color">
                          <label for="car_color">Car Color</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="plate_num" type="text" class="validate" name="plate_num">
                          <label for="plate_num">Plate Number</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone_num" type="text" class="validate" name="phone_num" required>
                            <label for="phone_num">Phone Number</label>
                        </div>
                        <div class = "col s6">
                            <label>User Select</label>
                            <select name="user_type" required>
                                <option value = "" disabled selected>Select User</option>
                                <option value = "Admin">Admin</option>
                                <option value = "Staff">Staff</option>
                                <option value = "Student">Student</option>
                            </select>               
                            </div>
                        </div>
                      <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn  right" name="create">Register</button>     
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
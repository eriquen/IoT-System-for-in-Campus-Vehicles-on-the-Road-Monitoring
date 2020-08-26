<?php include("includes/header.php"); ?>

<?php 
    $users = User::find_all();
?>
                    <li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="teal-text waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>

            <div class="col l10">
                <div class="mt-2 mb-2">
                <a href="add_user.php" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add User</a>
                </div>
                <table class="striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Matric Number</th>
                            <th>IC No/Password No</th>
                            <th>Car Brand</th>
                            <th>Car Color</th>
                            <th>Plate Number</th>
                            <th>User Type</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) : ?>    
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->email; ?>
                                <div class="action_links">
                                    <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                    <a href="edit_user.php?id=<?php echo $user->id;?>">Edit</a>
                                    <a href="#">View</a>
                                </div>
                            </td>
                                <td><?php echo $user->first_name; ?></td>
                                <td><?php echo $user->last_name; ?></td>
                                <td><?php echo $user->matric_num; ?></td>
                                <td><?php echo $user->ic_num; ?></td>
                                <td><?php echo $user->car_brand; ?></td>
                                <td><?php echo $user->car_color; ?></td>
                                <td><?php echo $user->plate_num; ?></td>
                                <td><?php echo $user->user_type; ?></td>
                                <td><?php echo $user->phone_num; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </main>
    <footer class="page-footer teal down">
        <div class="footer-copyright">
            <div class="container">Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Syed Adzha</a>
            </div>
        </div>
    </footer>
    </div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>
<?php include("includes/header.php"); ?>
<?php 
    $summons = Summon::find_all();
    $user = new User()
?>
                    <li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="teal-text waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>
            <div class="col l10">
                <div class="mt-2 mb-2">
                     <a href="add_summon.php" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add Summon</a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Photos</th>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Number Plate</th>
                            <th>Car Speed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($summons as $summon) : ?>        
                        <tr>
                            <td><img class="admin-photo h-64 materialboxed"  src="<?php echo $summon->picture_path(); ?>" alt="" >
                                <a href="delete_summon.php?id=<?php echo $summon->id; ?>">Delete</a>
                                <a href="edit_summon.php?id=<?php echo $summon->id;?>">Edit</a>
                                <a href="view_summon.php?id=<?php echo $summon->id;?>">View</a>
                            </td>
                            <td><?php echo $summon->id; ?></td>
                            <td><?php
                                $owner =  $user->find_by_id($summon->user_id);
                                if($owner){
                                    echo $owner->first_name;
                                }else{
                                    echo "Not Found";
                                }
                               
                                ?>
                            </td>
                            <td><?php echo $summon->plate_num_rpi; ?></td>
                            <td><?php echo $summon->car_speed;?> km/h</td>
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
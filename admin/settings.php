<?php include("includes/header.php"); ?>
<?php 
    $sets = Setting::find_all();
    $find_set = Setting::find_by_id(1);
?>
                    <li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="teal-text waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>

            <div class="col l6 s4">
                <div class="mt-2 mb-2">
                <a href="edit_setting.php?id=<?php echo $find_set->id;?>"" class="waves-effect waves-light btn"><i class="material-icons left">update</i>Edit</a>
                </div>
                <table class="striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fine(RM)</th>
                            <th>Speed Limit(KM/H)</th>
                            <th>Distance(KM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sets as $set) : ?>    
                        <tr>
                            <td><?php echo $set->id; ?></td>
                            <td><?php echo $set->fine; ?></td>
                            <td><?php echo $set->speed_limit; ?></td>
                            <td><?php echo $set->distance; ?></td>
                             
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
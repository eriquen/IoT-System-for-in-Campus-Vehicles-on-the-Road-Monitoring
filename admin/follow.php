<?php include("includes/header.php"); ?>
<?php 
    $follows = Follow::find_all();
    
  
?>
                    <li class=""><a href="index.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="teal-text waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>
            <div class="col l5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Speed</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($follows as $follow) : ?>        
                        <tr>
                            <td><?php echo $follow->id;?></td>
                            <td><?php echo $follow->speed;?></td>
                            <td><?php echo $follow->date;?></td>
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
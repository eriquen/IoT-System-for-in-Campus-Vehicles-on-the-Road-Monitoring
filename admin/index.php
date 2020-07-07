<?php 
include("includes/header.php"); 

$user = User::find_all();
$summons = Summon::find_all();
$follows = Follow::find_all();
$i = 0;
foreach ($summons as $summon){
   
    if($summon->user_id == 0){
        $i = $i + 1;
    }
}
$unk = $i;
$total_follow = count($follows);
$total_user = count($user);
$total_summon = count($summons);
?>

                    <li class=""><a href="index.php" class=" waves-effect teal-text"><i class="material-icons left">tab</i>Dashboard</a></li>
                    <li class=""><a href="users.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">face</i>User</a></li>
                    <li><a href="summons.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">attach_money</i>Summons</a></li>
                    <li><a href="follow.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">directions_car</i>Follow Limit</a></li>
                    <li><a href="settings.php" class="grey-text text-darken-3 waves-effect"><i class="material-icons left">settings</i>Setting</a></li>
                </ul>
            </div>
            <div class="col l10">
                <div class="">
                    <div class="row">

                        <div class="col s3">
                        <div class="card white-grey darken-1">
                            <div class="card-content black-text" id="p-12">
                                <span class="card-title">Total Users</span>
                                <div class="row">
                                    <h1 class="center-align col s6 "><?php echo $total_user?></h1>
                                    <i class="icon-dash material-icons large col s6 blue-text">person</i>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="users.php">See more</a>
                            </div>
                        </div>
                        </div>

                        <div class="col s3">
                        <div class="card white-grey darken-1">
                            <div class="card-content black-text" id="p-12">
                                <span class="card-title">Total Summons</span>
                                <div class="row">
                                    <h1 class="center-align col s6 "><?php echo $total_summon?></h1>
                                    <i class="icon-dash material-icons large col s6 orange-text">content_paste</i>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="summons.php">See more</a>
                            </div>
                        </div>
                        </div>

                        <div class="col s3">
                        <div class="card white-grey darken-1">
                            <div class="card-content black-text" id="p-12">
                                <span class="card-title">Total Car</span>
                                <div class="row">
                                    <h1 class="center-align col s6 ">17</h1>
                                    <i class="icon-dash material-icons large col s6 green-text">directions_car</i>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="users.php">See more</a>
                            </div>
                        </div>
                        </div>

                        <div class="col s3">
                        <div class="card white-grey darken-1">
                            <div class="card-content black-text" id="p-12">
                                <span class="card-title">Unknow Vehicle</span>
                                <div class="row">
                                    <h1 class="center-align col s6 "><?php echo $unk?></h1>
                                    <i class="icon-dash material-icons large col s6 red-text">priority_high</i>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="users.php">See more</a>
                            </div>
                        </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col s6">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    </main>
    <!-- <div class="section">
                <div class="row">
                    <div class="col l4">

                    </div>

                </div>
            </div> -->



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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Vehicle exceed speed limit ', 'Vehicle follow speed limit'],
                datasets: [{
                    label: '# of Votes',
                    data: [<?php echo $total_user?>, <?php echo $total_follow?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
</script>


</body>

</html>
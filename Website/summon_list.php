<?php include("includes/header.php");
if( ! $session->loggedIn() ){ redirect("login.php"); } 
   //if( ! $session->loggedIn() ){ redirect("login.php"); } 
    $user = new User();
    $user_detail = $user->find_by_id($_SESSION['user_id']);
    $summons = Summon::find_all_by_id($_SESSION['user_id']);

?>


<main class="grey lighten-4">
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <div class="row mt-30 white pad-20">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Photos</th>
                            <th>Owner</th>
                            <th>Number Plate</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($summons as $summon) : ?>        
                        <tr>
                            <td><img class="admin-photo h-64 materialboxed"  src="<?php echo $summon->picture_path_from_user(); ?>" alt="" >
                            </td>
                            <td><?php $owner =  $user->find_by_id($summon->user_id);
                                echo $owner->first_name; ?></td>
                            <td><?php echo $summon->plate_num_rpi; ?></td>
                            <td><?php echo $summon->time; ?></td>
                            <td><a href="summon_detail.php?id=<?php echo $summon->id;?>">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                 </table>

                </div>
            </div>
        </div>
    </div>
</main>   

  <?php include("includes/footer.php"); ?>



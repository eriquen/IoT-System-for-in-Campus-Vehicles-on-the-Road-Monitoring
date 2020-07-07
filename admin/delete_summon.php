<?php include("includes/init.php"); ?>

<?php 

    if(empty($_GET['id'])){
        redirect('summons.php');
        // redirect('google.com');
    }

    $summon = Summon::find_by_id($_GET['id']);

    if($summon){

        $summon->delete_photo();
        redirect("summons.php");
    }else{

        redirect("summons.php");
    }
?>
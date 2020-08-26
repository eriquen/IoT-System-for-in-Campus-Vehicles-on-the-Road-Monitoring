<?php include("includes/init.php"); ?>
<?php 
// if(!$session->loggedIn()){redirect("login.php");} 
?>
<?php 

    if(empty($_GET['id'])){
        redirect('users.php');
        // redirect('google.com');
    }

    $user = User::find_by_id($_GET['id']);

    if($user){

        $user->delete_user();
        redirect("users.php");
    }else{

        redirect("users.php");
    }
?>
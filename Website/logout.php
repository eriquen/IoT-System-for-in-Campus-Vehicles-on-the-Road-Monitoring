<?php 
include("admin/includes/init.php");

$session->logout();
redirect("login.php");
?>
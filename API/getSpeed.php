<?php 
include("../admin/includes/init.php"); 
$all_set = Setting::find_by_id(1);
$speed = $all_set->speed_limit;
echo $speed;
?>
<?php 
include("../admin/includes/init.php"); 
$all_set = Setting::find_by_id(1);
$distance = $all_set->distance;
echo $distance;
?>
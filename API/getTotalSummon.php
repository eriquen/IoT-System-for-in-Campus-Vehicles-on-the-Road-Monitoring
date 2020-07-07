<?php 
include("../admin/includes/init.php"); 
$summons = Summon::find_all();
$i = 0;
foreach ($summons as $summon){
        $i = $i + 1;
}
echo $i;
?>
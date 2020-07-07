<?php 


Class Setting extends Db_object{
    protected static $db_table = "system";
    protected static $db_table_field = array('fine', 'speed_limit', 'distance');
    public $id;
    public $fine;
    public $speed_limit;
    public $distance;
}
?>

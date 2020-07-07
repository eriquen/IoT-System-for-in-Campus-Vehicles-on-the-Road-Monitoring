<?php 

Class Db_object{

    public $errors = array();
    public $upload_errors_array = array(

		UPLOAD_ERR_OK  => "There is no errror",
		UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
		UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE in form",
		UPLOAD_ERR_PARTIAL => "The uploaded file was only partial uploaded",
		UPLOAD_ERR_NO_FILE => "No file was uploaded.",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
		UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
        
    );

    public static function count(){
        die("SELECT COUNT(*) FROM " . static::$db_table);
        return static::find_by_query("SELECT COUNT(*) FROM " . static::$db_table);
    
    }
    public static function find_all(){
        
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
        
    }

    public static function find_by_id($id){
        
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id= $id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_last_id(){
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " ORDER BY id DESC LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public static function find_by_plate($plate){
        // die("SELECT * FROM " . static::$db_table ." where plate_num= '" . $plate . "'");
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table ." where plate_num= '" . $plate . "'");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_by_query($sqli){

        global $database;
        $result_set = $database->query($sqli);
        $the_object_array = array();

        while($rows = mysqli_fetch_array($result_set)){

            $the_object_array[] = static::instantiation($rows);
        }

        return $the_object_array;

    }

    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public static function instantiation($the_record){

        $calling_class = get_called_class();
        $the_object = new $calling_class;

        foreach ($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        
        return $the_object;
    }

    protected function properties(){

        // return get_object_vars($this);
        $properties = array();
        
        foreach (static::$db_table_field as $db_field) {

            if(property_exists($this, $db_field)){

                $properties[$db_field] = $this->$db_field;
            }
            
        }

        return $properties;
    }

    protected function clean_properties(){
        
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }


    public function create(){

        global $database;

        $properties = $this->clean_properties();

        $sql  = "INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) ."')";

        if($database->query($sql)){

            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }
    }//create method

    public function update(){

        global $database;

        $properties = $this->clean_properties();
        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql  = "UPDATE " . static::$db_table . "  SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }//update method

    public function delete(){
        global $database;
        $sql  = "DELETE FROM " . static::$db_table . "  ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function save(){

        return isset($this->id) ? $this->update() : $this->create();
    }

    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){

            $this->errors[] = "There was no file uploaded here";
            return false;

        }elseif($file['error'] != 0){

            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        }else{

            $this->filename = date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            // $this->size     = $file['size'];
        }
    }

}


?>
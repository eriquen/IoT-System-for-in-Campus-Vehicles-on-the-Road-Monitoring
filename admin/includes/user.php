<?php 


Class User extends Db_object{
    protected static $db_table = "users";
    protected static $db_table_field = array('email', 'password', 'first_name', 'last_name', 'matric_num', 'ic_num', 'car_brand', 'car_color', 'plate_num', 'user_type', 'phone_num');
    public $id;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $matric_num;
    public $ic_num;
    public $car_brand;
    public $car_color;
    public $plate_num;
    public $user_type;
    public $phone_num;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";

    public static function verify_user($email, $password){

        global $database;
        $email = $database->escape_string($email);
        $password = $database->escape_string($password);
        $hash_password = md5($password.$email);
        $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
        $sql .= "email = '{$email}' ";
        $sql .= "AND password = '{$hash_password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = static::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }

    public function delete_user(){

        if($this->delete()){

            $target_path = SITE_ROOT.DS.'admin'.DS.$this->picture_path();
            return unlink($target_path)? true : false;

        }else{
            
            return false;
        }
    }

    public function picture_path(){

        return $this->upload_directory.DS.$this->user_image;
    }



    public function upload_photo(){

            if(!empty($this->errors)){

                return false;
            }

            if(empty($this->user_image) || empty($this->tmp_path)){

                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS .'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if(file_exists($target_path)){
                $this->errors[] = "The file {$this->user_image} already exist";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){

                    unset($this->tmp_path);
                    return true;
              
            }else{

                $this->errors[] = "The file directory probably does not have permission";
                return false;
            }
        }

        public static function find_by_user_id($id){
        
            $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE user_id= $id");
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
        }
}
   
// end User class



?>
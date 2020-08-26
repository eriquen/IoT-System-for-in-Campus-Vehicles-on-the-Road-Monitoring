<?php 

Class Summon extends Db_object{

    protected static $db_table = "summons";
    protected static $db_table_field = array('user_id', 'ic_num', 'plate_num_rpi', 'car_speed', 'time', 'filename', 'type');
    public $id;
    public $user_id;
    public $ic_num;
    public $plate_num_rpi;
    public $car_speed;
    public $time;
    public $filename;
    public $type;

    public $tmp_path;
    public $upload_directory = "images/number_plate";

    public function save(){

        if($this->id){

            $this->update();
        }else{

            if(!empty($this->errors)){

                return false;
            }

            if(empty($this->filename) || empty($this->tmp_path)){

                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS .'admin' . DS . $this->upload_directory . DS . $this->filename;
            if(file_exists($target_path)){
                $this->errors[] = "The file {$this->filename} already exist";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){

                if($this->create()){

                    unset($this->tmp_path);
                    return true;
                }
            }else{

                $this->errors[] = "The file directory probably does not have permission";
                return false;
            }
        }
    }

    public static function find_all_by_id($id){
     
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE user_id= $id");
      
    }

    public function delete_photo(){

        if($this->delete()){

            $target_path = SITE_ROOT.DS.'admin'.DS.$this->picture_path();
            return unlink($target_path)? true : false;

        }else{
            
            return false;
        }
    }


    public function picture_path(){

        return $this->upload_directory.DS.$this->filename;
    }

    public function picture_path_from_user(){

        return "admin".DS.$this->upload_directory.DS.$this->filename;
    }

}


?>
<?php // IDEA:
require_once("config/db.class.php");

class Upload
{
    public $id;
    public $title;
    public $file;

    public function __construct( $file_title, $file_path)
    {
        $this->title = $file_title;
        $this->file = $file_path;
    }
    public function save(){

        $file_temp = $this->file['tmp_name'];
        $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
        $filepath = "uploads/" . $timestamp;
        if(move_uploaded_file($file_temp, $filepath) == false){
            return false;
        }
        
        $db= new Db();
        $sql = "INSERT INTO upload (title, file) VALUES 
        ('$this->title' , '$filepath')";

        $result= $db->query_execute($sql);
        return $result;
    }
}

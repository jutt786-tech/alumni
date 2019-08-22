<?php
//require 'syestem/Database.php';

//spl_autoload_register(function($class){
//    include "syestem/{$class}.php";

//});
/**
 *
 */
class Leftimage{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
// strt upload function variable define here
    var $exts = array( ".png", ".gif", ".png", ".jpg", ".jpeg" ); //all the extensions that will be allowed to be uploaded
    var $maxSize = 9999999; //if you set to "0" (no quotes), there will be no limit
    var $uploadTarget = "../assets/images/"; //make sure you have the '/' at the end
    var  $fileName = ""; //this will be automatically set. you do not need to worry about this
    var  $tmpName = ""; //this will be automatically set. you do not need to worry about this

// Get all post
   
    public function addLeftImage($name,$leftimage) {
        $sql = 'insert into left_img(name,leftimage ) values(:name,:leftimage)';
        $this->db->query($sql);
        $this->db->bind(':name',$name);
        $this->db->bind(":leftimage",$leftimage);
        $result = $this->db->execute();
        if($result === true)
            return true;
        else
            return $this->db->getError();
    }
    // UPDATE  APPROVED  COMMENT
   
    // CLOSE UNAPPROVED COMMENT
    // UPDATE EVENTS

    
  // GET NEWS BY ID
    public function getLeftImageById($id) {
        $sql = 'select * from left_img  order by id desc';
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->resultset();
    }
    public function getLeftImagesById($id) {
        $sql = 'select id,name,leftimage from left_img where left_img.id = :id';
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->resultset();
    }
 public function CountLeftId($id) {
        $sql = 'select count(id) from left_img order by id';
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->resultset();
    }

    public function updateLeftImage($name,$id,$leftimage) {
        $sql = 'update left_img set name=:name,leftimage=:leftimage where id=:id';
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->bind(":name",$name);
        $this->db->bind(":leftimage",$leftimage);
        $result = $this->db->execute();

        if($result === true)
            return true;
        else
            return $this->db->getError();
    }
    //END UPDATE EVENTS
    public function deleteLeftImage($id) {
        $sql= 'DELETE FROM left_img where id=:id';
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $result=$this->db->execute();
        return $result;
    }


//image upload  Function
    public function startUpload()
    {
        $this->fileName = $_FILES['leftimage']['name'];
        $this->tmpName = $_FILES['leftimage']['tmp_name'];

        if( !$this->checkExt() )
        {
            die( "Sorry, you can not upload this filetype!" );
        }
        if( !$this->checkSize() )
        {
            die( "Sorry, the file you have attempted to upload is too large!" );
        }
        if( $this->fileExists() )
        {
            die( "Sorry, this file already exists on our servers!" );
        }
        if( $this->uploadIt() )
        {
            $filename =  $this->uploadTarget .$this->fileName  ;

            // $r=$this->imageInsert($filename);
            // print_r($r);
            // die();
            return $filename;
        }
        else
        {
            echo "Sorry, your file could not be uploaded for some unknown reason!";
        }
    }

    public function uploadIt()
    {
        return ( move_uploaded_file( $this->tmpName, $this->uploadTarget . $this->fileName ) ? true : false );
    }

    public function checkSize()
    {
        return ( ( filesize( $this->tmpName ) > $this->maxSize ) ? false : true );
    }

    public function getExt()
    {
        return strtolower( substr( $this->fileName, strpos( $this->fileName, "." ), strlen( $this->fileName ) - 1 ) );
    }

    public function checkExt()
    {
        return ( in_array( $this->getExt(), $this->exts ) ? true : false );
    }

    public function isWritable()
    {
        return ( is_writable( $this->uploadTarget ) );
    }

    public function fileExists()
    {
        return ( file_exists( $this->uploadTarget . time() . $this->fileName ) );
    }




}




?>


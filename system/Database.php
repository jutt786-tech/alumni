<?php

class Database {
    private $host	= 'localhost';
    private $user	= 'root';
    private $pass	= ''; // Root Password. Which you created during creation of SQL Instance.
    private $dbname	= 'newyear'; // Database Name
    private $cloud_socket = 'beamflyer-beacons:us-east4:beamflyer-sql'; // Do not past any spaces
    public static $isGoogleCloud = false;
    public static $storageBucket = "beamflyer-uploads";

    private $dbh;
    private $error;
    private $stmt;

    // $db = new Database();

    // $db->query("select * from users where email = :email and password = :password");
    // $db->bind(":email", $email);
    // $db->bind(":password", $pass);
    // $db->execute();
    // $result = $db->resultset();

    public function __construct(){
        // Set DSN
        $dsn = '';
        if(self::$isGoogleCloud)
            $dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname. ';unix_socket=/cloudsql/'.$this->cloud_socket;
        else
            $dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
        // Set Options
        $options = array(
            PDO::ATTR_PERSISTENT		=> true,
            PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
        );
        // Create new PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOEception $e){
            $this->error = $e->getMessage();
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * @return mixed
     */
    public function execute(){
        return $this->stmt->execute();
    }

    public function lastInsertId($name = null){
        return $this->dbh->lastInsertId($name);
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return string
     */
    public function getError() {
        return $this->error;
    }


}
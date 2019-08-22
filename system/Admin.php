<?php
class Admin
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @param $email string
     * @return bool|string
     *
     * This function checks if email is valid and unique
     */

    /**
     * @param $email string
     * @return bool|string
     */
    private function checkEmail($email)
    {

        if ($email == "")
            return 'Please enter Email Address';

        if (strlen($email) > 50)
            return 'Please use email with maximum 50 characters';

        $this->db->query("select email from admin where email = :email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        $result = $this->db->resultset();

        if (count($result) === 1)
            return 'Email already exits';

        return true;

    }

    /**
     * @param $password string
     * @param $confirmPassword string
     * @return bool|string
     */
    private function checkPassword($password, $confirmPassword)
    {

        if ($password == '')
            return 'Please enter password';
        if ($confirmPassword == '')
            return 'Please enter Confirm password';
        if ($password !== $confirmPassword)
            return 'Password does not match';
        if (strlen($password) < 5)
            return 'Minimum password length are 6 ';
        return true;

    }

    /**
     * @param $userName
     * @param $fullName
     * @param $email
     * @param $password
     * @param $confirmPassword
     * @return bool|string
     */
    public function admin($firstname, $lastname, $email, $password, $confirmPassword)
    {
        $msg = $this->checkEmail($email);
        if ($msg !== true)
            return $msg;

        $msg = $this->checkPassword($password, $confirmPassword);
        if ($msg !== true)
            return $msg;

        $sql = 'insert into admin (firstname, lastname, email, password) values(:firstname, :lastname, :email, :password)';
        $this->db->query($sql);
        $this->db->bind(":firstname", $firstname);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":email", $email);
        $hashedPassword = sha1($password);
        $this->db->bind(":password", $hashedPassword);
        $result = $this->db->execute();

        if ($result === true)
            return true;
        else
            return $this->db->getError();

    }

    /**
     * @param $email
     * @param $password
     * @return array|string
     */
    public function get_admin($name, $password)
    {

        $msg = $this->checkPassword($password, $password);
        if ($msg !== true)
            return $msg;

        // $hashedPassword = sha1($password);

        $sql = ('select * from admin where name =:name and password = :password');

        $this->db->query($sql);
        $this->db->bind(":name", $name);
        $this->db->bind(":password", $password);
        $this->db->execute();
        $result = $this->db->resultset();
        if (count($result) > 0) {
            if ($result[0]['status'] == 1)
                return $result;
            else
                return 'Your account is not active yet';
        }

        return  "Invalid Username or Password";

    }
    /*
      get all dat from admin table

     */
    public function  getAdmin(){
        $sql ='select * from admin where status=:status ';
        $this->db->query($sql);
        $this->db->bind(":status",0);
        $this->db->execute();
       return  $this->db->resultset();
    }
    public function  getAdminActive(){
        $sql ='select * from admin where status=:status ';
        $this->db->query($sql);
        $this->db->bind(":status",1);
        $this->db->execute();
        return  $this->db->resultset();
    }

    public function  getAdminById($id){
        $sql ='select * from admin where id=:id';
        $this->db->query($sql);
        $this->db->bind(":id",$id);
        $this->db->execute();
        return  $this->db->resultset();
    }
    public function setStatus($postID, $status) {
        $sql = 'update admin set status = :status where id = :id';
        $this->db->query($sql);
        $this->db->bind(":id", $postID);
        $this->db->bind(":status", $status);
        $result = $this->db->execute();
        if($result === true)
            return true;
        else
            return $this->db->getError();
    }
    /*
    Delete Data from admin table
     */
    public function deleteAdmin($id)
    {
        $sql = 'Delete from admin where id=:id';
        $this->db->query($sql);
        $this->db->bind(":id",$id);
        return $this->db->execute();

    }

    public function updateAdmin($id,$firstname,$lastname,$email,$password){
        $sql='update admin set firstname=:firstname,lastname=:lastname,email=:email,password=:password where id=:id';
        $this->db->query($sql);
        $this->db->bind(":id",$id);
        $this->db->bind(":firstname",$firstname);
        $this->db->bind(":lastname",$lastname);
        $this->db->bind(":email",$email);
        $this->db->bind(":password",$password);

        $result=$this->db->execute();
       if($result===true){
           return true;
       }else
          return $this->db->getError();
    }

}
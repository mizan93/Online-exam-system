<?php 

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

class Admin{
   private $db;
   private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
public function adminLogin($value){
        $username=$this->fm->validation($value['username']);
        $password=$this->fm->validation(($value['password']));
        $username=mysqli_real_escape_string($this->db->link,$username);
        $password=mysqli_real_escape_string($this->db->link, md5($password));

        $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'" ;
        $getdata=$this->db->select($sql);
        if ($getdata != false) {
           $data=$getdata->fetch_assoc();
           Session::init();
           Session::set('login',true);
           Session::set('adminId',$data['id']);
           Session::set('adminuser',$data['username']);
           header('Location:index.php');
        }else{
            $msg="<span class='error'>Username Or Password not matched !!</span>";
            return $msg;
        }
}

}

?>
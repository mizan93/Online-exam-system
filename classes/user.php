<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath .'/../lib/database.php');
include_once($filepath .'/../lib/session.php');
include_once($filepath .'/../helpers/format.php');

class User {

   private $db;
   private $fm;

   public function __construct() {
      $this->db = new Database();
      $this->fm = new Format();
   }

   public function getAllUserdata() {
      $sql = "SELECT * FROM user ORDER BY userid  DESC";
      $getdata = $this->db->select($sql);
      return $getdata;
   }

   public function RemoveUser($id) {
      $id = mysqli_real_escape_string($this->db->link, $id);
      $sql = "DELETE  FROM user WHERE userid ='$id' ";
      $deldata = $this->db->delete($sql);
      if ($deldata) {
         $msg = "<span class='error'>User Deleted.</span>";
         return $msg;
      } else {
         $msg = "<span class='error'>User not Deleted !!</span>";
         return $msg;
      }
   }

   public function disableUser($userid) {
      $userid = mysqli_real_escape_string($this->db->link, $userid);
      $sql = " UPDATE user 
      SET status='1'
       WHERE userid ='$userid'";
      $updatdata = $this->db->update($sql);
      if ($updatdata) {
         $msg = "<span class='error'>User Disabled.</span>";
         return $msg;
      } else {
         $msg = "<span class='error'>User not  Disabled!!</span>";
         return $msg;
      }
   }

   public function enableUser($userid) {
      $userid = mysqli_real_escape_string($this->db->link, $userid);
      $sql = " UPDATE user 
      SET status='0'
       WHERE userid ='$userid'";
      $updatdata = $this->db->update($sql);
      if ($updatdata) {
         $msg = "<span class='success'>User Enabled.</span>";
         return $msg;
      } else {
         $msg = "<span class='error'>User not Enabled !!</span>";
         return $msg;
      }
   }
      public function userRegistration($name, $username, $pass, $email){
      $name=$this->fm->validation($name);
      $username=$this->fm->validation($username);
      $pass = $this->fm->validation($pass);
      $email=$this->fm->validation($email);

      $name = mysqli_real_escape_string($this->db->link, $name);
      $username = mysqli_real_escape_string($this->db->link, $username);
      $pass = mysqli_real_escape_string($this->db->link, md5($pass)); 
      $email = mysqli_real_escape_string($this->db->link, $email);

      if ($name=='' || $username=='' || $pass =='' || $email =='') {
        echo " <span class='error'>Field must not be empty !!</span>";
        exit();
      
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo " <span class='error'>Invalid emial address !!</span>";
         exit();
      }else{
   $sql="SELECT email FROM user WHERE email='$email'";
   $chkemail=$this->db->select($sql);
   if ($chkemail==true) {
            echo " <span class='error'>Emial address already exist .Try agnain!!</span>";
            exit();
   }
else {
         
            $sql = "INSERT INTO  user(name,username,pass,email)VALUES('$name','$username','$pass','$email')";
            $insdata = $this->db->insert($sql);
            if ($insdata) {
               echo " <span class='success'>Success !! you have registared.</span>";
               exit();
            }else{
               echo " <span class='error'>Error !! Something went wrong.</span>";
               exit(); 
            }
         }
      }
   } 
      
     public function userLogin($email,$pass){
      
      $pass = $this->fm->validation($pass);
      $email = $this->fm->validation($email);
      $pass = mysqli_real_escape_string($this->db->link, $pass);
      $email = mysqli_real_escape_string($this->db->link, $email);
      if ( $pass == '' || $email == '') {
         echo "Fild must be empty!!!";
         exit();
      }else{
         $sql = "SELECT * FROM user WHERE  email='$email' AND pass='$pass'";
         $getdata = $this->db->select($sql);
         if ($getdata != false){
            $data=$getdata->fetch_assoc();
            if ($data['status']=='1') {
               echo 'You are disabled by admin !!';
               exit();
            }else {
               Session::init();
               Session::set('login',true);
               Session::set('userId',$data['userid']);
               Session::set('Name', $data['name']);
               Session::set('username', $data['username']);
               Session::set('userEmail', $data['email']);
            header('Location:exam.php');
            }
         }
         else {
            echo "Emaili or Passoword not match";
            exit();
         }
      }
   }
   public function getuserdata($userid){
      $sql="SELECT * FROM user WHERE userid='$userid'";
      $data=$this->db->select($sql);
      return $data;
   }
   public function updateUserdata($value,$userid){

      $name = $this->fm->validation($value['name']);
      $username = $this->fm->validation($value['username']);
      $email = $this->fm->validation($value['email']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $username = mysqli_real_escape_string($this->db->link, $username);
      $email = mysqli_real_escape_string($this->db->link, $email);
      $sql = "UPDATE  user 
      SET name='$name',
       username='$username',
       email='$email'
      WHERE userid='$userid'";
      $up_data = $this->db->update($sql);
      if ($up_data) {
         echo "<span class='success'>Data updated.</span>";
         exit();
      }else{
         echo "<span class='error'>Data not updated.</span>";
         exit();
      }
   }
}
  
?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/classes/user.php');
$user=new User();


    $name=$_POST['name'];
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    $reg = $user->userRegistration($name,$username,$pass,$email);


?>
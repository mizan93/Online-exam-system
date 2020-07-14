
<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');

include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

class Process{
   private $db;
   private $fm;

   public function __construct() {
      $this->db = new Database();
      $this->fm = new Format();
   }
   public function processUserAns($value){
      $ans = $this->fm->validation($value['ans']);
      $number = $this->fm->validation($value['number']);
      $ans = mysqli_real_escape_string($this->db->link, $ans);
      $number = mysqli_real_escape_string($this->db->link, $number);
      $next=$number+1;

      if (!isset($_SESSION['score'])) {
        $_SESSION['score']='0';
        
      }
     $total=$this->getTotalRows();
     $rightans=$this->rightAns($number);
     if ($rightans==$ans) {
      $_SESSION['score']++;
     }
     if ($number==$total) {
        header('Location:final.php');
     }else {
        header('Location:test.php?q='.$next);
     }
   }
   private function getTotalRows(){
        $sql = "SELECT * FROM question";
        $getdata = $this->db->select($sql);
        $total=$getdata->num_rows;
        return $total;
   }
   private function rightAns($number){
      $sql = "SELECT * FROM ans WHERE qunum ='$number' AND rightans='1'";
      $getdata = $this->db->select($sql)->fetch_assoc();
      $data=$getdata['quid'];
      return $data;
   }
}

?>
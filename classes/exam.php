<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

class Exam {

   private $db;
   private $fm;

   public function __construct() {
      $this->db = new Database();
      $this->fm = new Format();
   }
   public function getQuestionByNo(){
        $sql = "SELECT * FROM question ORDER BY qunum ASC";
        $getdata = $this->db->select($sql);
        return $getdata;
   }
   public function RemoveQuestion($id){
        $id = mysqli_real_escape_string($this->db->link, $id);

       $tables=array(' question', 'ans');
       foreach ($tables as $table) {
            $sql = "DELETE  FROM $table WHERE qunum ='$id' 
            ";
            $deldata = $this->db->delete($sql);
        }
        if ($deldata) {
            $msg = "<span class='error'>Question Deleted.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Question not Deleted !!</span>";
            return $msg;
        }
   }
   public function getTotalRows(){
        $sql = "SELECT * FROM question";
        $getdata = $this->db->select($sql);
        $total=$getdata->num_rows;
        return $total;
   }
   public function addQuestion($values){
        $qunum=$this->fm->validation($values['qunum']);
        $quname=$this->fm->validation($values['quname']);
        $rightans=$this->fm->validation($values['rightans']);

        $qunum = mysqli_real_escape_string($this->db->link, $qunum);
        $quname = mysqli_real_escape_string($this->db->link, $quname);
        $rightans = mysqli_real_escape_string($this->db->link, $rightans);

        $ans=array();
        $ans[1]=$values['ans1'];
        $ans[2]=$values['ans2'];
        $ans[3]=$values['ans3'];
        $ans[4]=$values['ans4'];
        $rightans=$values['rightans'];

        $sql= "INSERT INTO question(qunum,quname)VALUES('$qunum','$quname')";
        $ins_row=$this->db->insert($sql);
        if ($ins_row) {
           foreach ($ans as $key=>$ansname) {
              if ($ansname!='') {
                 if ($rightans==$key) {
                        $sql = "INSERT INTO ans(qunum,rightans,ans)VALUES('$qunum','1','$ansname')";
                 }else{
                        $sql = "INSERT INTO ans(qunum,rightans,ans)VALUES('$qunum','0','$ansname')"; 
                 }
                 $ins_row = $this->db->insert($sql);
                 if ($ins_row) {
                    continue;
                 }else{
                     die('Error...');
                 }
              }
           }
            $msg = "<span class='success'>Question added.</span>";
            return $msg;
        }

   }
   public function getAllq(){
      $sql = "SELECT * FROM question ";
      $getdata = $this->db->select($sql);
     $data=$getdata->fetch_assoc();
     return $data;
   }
   public function getQuestionByNumber($qno){
      $sql = "SELECT * FROM question WHERE qunum='$qno'";
      $getdata = $this->db->select($sql);
      $data = $getdata->fetch_assoc();
       return $data; 
   

   }
   public function getANS($qno)
   {
      $sql = "SELECT * FROM ans WHERE qunum='$qno'";
      $getdata = $this->db->select($sql);
      return $getdata; 
   }
}
?>

<?php
class Database_class  {
    public function __construct() {
       $host_name='localhost';
       $user_name='root';
       $password='';
       $conn=  mysql_connect($host_name,$user_name,$password);
       $db_name=all_university_bd;
        if(!$conn){   }
 else {
        mysql_select_db($db_name);
            mysql_query('SET CHARACTER SET utf8');
                 mysql_query("SET SESSION collation_connection='utf8_general_ci' ");
           
       }
    }
    
     public function select_all_Question_info($table_name){
      $sql="SELECT *FROM $table_name ";
      $result= mysql_query($sql);  
      return $result; ///location er address ta patay... resorce location return kore
}


     public function select_university_info($id) {
     $sql="SELECT *FROM uni_info WHERE id = $id";
     $result= mysql_query($sql);  
      return $result;///location of row
}
 
public function question_headline_info($row_name) {
     $sql="SELECT *FROM question_headline_info WHERE  table_name = '$row_name' " ;
     $result= mysql_query($sql);  
      return $result;///location of row
}
public function select_advicer() {
     $sql="SELECT pic FROM advice_for_examine " ;
     $result= mysql_query($sql);  
      return $result;///location of row
}

public function select_all_advice($id) {
     $sql="SELECT *FROM advice_for_examine WHERE id = $id";
     $result= mysql_query($sql);  
      return $result;///location of row
}

public function confirm_login($email,$password) {
     $sql="SELECT *FROM login WHERE email= '$email' ";
     $result= mysql_query($sql);  
    $row=  mysql_fetch_assoc($result);
    if($row!=NULL){
    if($row['password']==$password){
     
        return TRUE;
    }
 else {
           
            return FALSE;
    }
}
}
}
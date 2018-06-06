<?php
require('./dbConnect.php');
session_start();

/**
 * User Registration Function and Login Function
 */
class dbFunction
{

  public $db;
  function __construct()
  {
      $this->db = new dbConnect();

  }
  function __destruct(){

  }
  public function UserRegistration($name,$email,$pass){


    $query = mysqli_query($this->db->conn,"INSERT into users(name,email,password) values('$name','$email','$pass')") or die(mysql_errr());
    var_dump($query);
    echo "$query";
    return $query;
  }

  public function UserLogin($email,$pass){

    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $res = mysqli_query($this->db->conn,$query);
    $user_data = mysqli_fetch_array($res);
    $no_of_rows = mysqli_num_rows($res);

    if($no_of_rows == 1){
      $_SESSION['login'] = true;
      $_SESSION['uid']   = $user_data['id'];
      $_SESSION['user']  = $user_data['Name'];
      $_SESSION['add'] = $user_data['Email'];
      return true;
    }
    else{
      return false;
    }
  }
  public function alreadyUser($email){

    $qr = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($this->db->conn,$qr);
    $row = mysqli_num_rows($query);

    if($row > 0){
      return true;
    }
    else {
      return false;
    }
  }
}


?>

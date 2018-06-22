<?php
require('./dbConnect.php');
session_start();

/**
 * User Registration Function and Login Function
 */
class dbFunction
{

  public $db;
  public $userEmail;
  function __construct()
  {
      $this->db = new dbConnect();

  }
  function __destruct(){
     $this->db->close();
  }
  public function UserRegistration($name,$email,$pass){

    $pass = md5($pass);
    $query = mysqli_query($this->db->conn,"INSERT INTO users(name, email, password) values('$name','$email','$pass')") or die(mysql_errr());
    if($query){
      return true;
    }
    else {
      return false;
    }
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
      $_SESSION['level'] = $user_data['access_level'];
      return true;
    }
    else{
      return false;
    }
  }

  public function adminLogin($email,$pass){

    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass' AND  access_level=1";
    $res = mysqli_query($this->db->conn,$query);
    $user_data = mysqli_fetch_array($res);
    $no_of_rows = mysqli_num_rows($res);

    if($no_of_rows == 1){
      $_SESSION['login'] = true;
      $_SESSION['uid']   = $user_data['id'];
      $_SESSION['user']  = $user_data['Name'];
      $_SESSION['add'] = $user_data['Email'];
      $_SESSION['level'] = $user_data['access_level'];
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
//
/* UPDATE USER function */
//

  public function updateUser($updateName,$updateEmail,$userID){

    $qr = "UPDATE users SET Name='$updateName', email='$updateEmail' WHERE id='$userID'";
    $query = mysqli_query($this->db->conn,$qr);

    if($query){
      return true;


    }
    else {
      return false;

    }
  }
  public function getUserData($id){
    $qr = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($this->db->conn,$qr);
    $data = mysqli_fetch_array($query);
    $rows = mysqli_num_rows($query);

    if($rows == 1){
      return $data;
    }
    else {
      return false;
    }
  }
  public function getAllUsers(){
    $query = "SELECT * FROM users WHERE access_level=0";
    $qr = mysqli_query($this->db->conn,$query);


    if($qr){
      return $qr;
    }
    else {
      return $err;
    }
  }

  public function getMessageDetails(){
    $query = "SELECT id, senderName, senderEmail, emailSubject, readStatus FROM messages";
    $qr = mysqli_query($this->db->conn,$query);
    if($qr){
      return $qr;
    }
    else {
      return $err;
    }
  }
  public function getReadStatusMessage(){
    $query = "SELECT readStatus FROM messages WHERE readStatus=0";
    $qr = mysqli_query($this->db->conn,$query);
    $returnReadStatus = mysqli_num_rows($qr);

    if($qr){
      return $returnReadStatus;
    }
    else{
      return False;
    }
  }
  public function getMessageFull($messageID){
    $query = "SELECT * FROM messages WHERE id = '$messageID'";
    $qr = mysqli_query($this->db->conn,$query);
    $getData = mysqli_fetch_array($qr, MYSQLI_ASSOC);

    if($qr){
      return $getData;
    }
    else{
      return False;
    }

  }
 public function deleteUser($userID){
   $query = "DELETE FROM users where id='$userID'";
   $qr = mysqli_query($this->db->conn,$query);
   if($qr){
     return true;
   }
   else{
     return false;
   }
 }
 public function changeReadStatus($ID){
  $query = "UPDATE messages SET readStatus='1' WHERE id='$ID'";
  $qr = mysqli_query($this->db->conn,$query);
  if($qr){
    return true;
  }
  else{
    return false;
  }
 }

}
?>

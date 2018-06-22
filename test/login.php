<!DOCTYPE html>
<html>
<head>
     <title>login form</title>
</head>
<body>

<?php
   if(isset($_POST['submit'])){
     $ok=true;
      if(!isset($_POST['name']) || isset($_POST['name'])===""){
        $ok=false;
      }
      if(!isset($_POST['password']) || isset($_POST['password'])===""){
          $ok=false;
        }

      if($ok){
      $pass = $_POST['password'];
      $pass = md5($pass);
      $db=mysqli_connect('localhost','root','','php');
      $sql=sprintf("SELECT * FROM users where name='%s' AND password='%s'",mysqli_real_escape_string($db,$_POST['name']),mysqli_real_escape_string($db,$pass));
      $result=mysqli_query($db,$sql);
      $row=mysqli_fetch_assoc($result);
      if($row){
        $isadmin=$row['isadmin'];
        echo "<h3>LOgin Success</h3>";
        if($isadmin){
          echo "Welcome Admin";
        }
        else {
          echo "welcome USer";
        }

        //$hash=$row['password'];

        // if(password_verify($pass,$hash)){
        //       readfile('nav.tmpl.html');
        //       echo '<h3>login sucessful</h3>';
        // }else{
        //   echo 'login failed<br /> <br />';
        //   echo $hash;

        //}
      }else{
        echo 'user doesn\'t exist'.'<br />';
        echo 'sign in first';
      }
    }
    mysqli_close($db);
   }





 ?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
username:<input type='text' name='name' placeholder='Dibyanshu'><br /><br />
password:<input type='password' name='password'><br /><br />
        <input type='submit' name='submit' value='login' >



</form>
</body>
</html>

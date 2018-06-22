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
      $db=mysqli_connect('localhost','root','','php');
      $sql=sprintf("SELECT * FROM users where name='%s'",mysqli_real_escape_string($db,$_POST['name']));
      $result=mysqli_query($db,$sql);
      $row=mysqli_fetch_assoc($result);
      if($row){
        $hash=$row['password'];
        $isadmin=$row['isadmin'];
        $verify = password_verify($_POST['password'],$hash);

        if($verify){
              readfile('nav.tmpl.html');
              echo 'login sucessful';
        }else{
          echo 'login failed';
          echo $hash;

        }
      }else{
        echo 'user doesn\'t exist'.'<br />';
        echo 'sign in first';
      }
    }
    mysqli_close($db);
   }





 ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
username:<input type='text' name='name' placeholder='Dibyanshu'><br /><br />
password:<input type='password' name='password'><br /><br />
        <input type='submit' name='submit' value='login' >



</form>
</body>
</html>

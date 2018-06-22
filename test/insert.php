<!DOCTYPE html>
<hmtl>
<head>
    <title>form</title>
</head>
<body>
  <?php
    $name='';
    $gender='';
    $colour='';
    $password='';

    if(isset($_POST["submit"])){
      $ok=true;
         if(!isset($_POST['name']) || $_POST['name']===""){
              $ok=false;
         }else {
           $name=$_POST['name'];
         }
        if(!isset($_POST['gender']) || $_POST['gender']===""){
              $ok=false;
        }else {
          $gender=$_POST['gender'];
        }
        if(!isset($_POST['colour']) || $_POST['colour']===""){
              $ok=false;
        }else{
          $colour=$_POST['colour'];
        }
        if(!isset($_POST['password']) || $_POST['password']===""){
              $ok=false;
        }else{
          $password=$_POST['password'];
          //$hash=password_hash($password,PASSWORD_DEFAULT);
          $password = md5($password);
        }

  if($ok){
    $db=mysqli_connect("localhost","root","","php");
    $sql=sprintf("INSERT INTO users (name,gender,colour,password) values('%s','%s','%s','%s')",mysqli_real_escape_string($db,$name),
                                                                              mysqli_real_escape_string($db,$gender),
                                                                              mysqli_real_escape_string($db,$colour),
                                                                              mysqli_real_escape_string($db,$password));
            mysqli_query($db,$sql);
            mysqli_close($db);
            echo "user added";
    }
}


  ?>


  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post>
<!--use htmlspecialchars() function before echoing each variable below  !-->
Username:<input type='text' name='name' placeholder='Dibyanshu' value=<?php echo "$name"; ?>><br /><br />
Gender:<input type='radio' name='gender' value='f'<?php if($gender==="f"){ echo "checked";}  ?>>female
       <input type='radio' name='gender' value='m'<?php if($gender==="m"){ echo "checked";}  ?>>male<br />
    Password:       <input type='password' name='password' value=<?php echo "$password";  ?>><br />
Favourite colour:<select name='colour'>
                      <option value=''>select one colour</option>
                      <option value='f00'<?php if($colour==="f00"){echo "selected";} ?>>red</option>
                      <option value='0f0'<?php if($colour==="0f0"){ echo "selected"; }?>>blue</option>
                      <option value='00f'<?php if($colour==="00f"){  echo "selected";}?>>green</option>
                 </select><br /><br /><br />

    <input type='submit' name='submit' value='submit' />


  </form>
</body>
</hmtl>

<?php
include_once('dbFunction.php');
$dbFunc = new dbFunction();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <h1 align="center">Login to Site here </h1>
    <br />
    <br />

    <!-- Material form login -->
<div style="margin:auto; width:50%;" >

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>">
        <p class="h4 text-center mb-4">Sign in</p>

        <!-- Material input email -->
        <div class="md-form">
            <i class="fa fa-envelope prefix grey-text"></i>
            <input name="email" type="email" id="materialFormLoginEmailEx" class="form-control">
            <label for="materialFormLoginEmailEx">Your email</label>
        </div>

        <!-- Material input password -->
        <div class="md-form">
            <i class="fa fa-lock prefix grey-text"></i>
            <input name="password" type="password" id="materialFormLoginPasswordEx" class="form-control">
            <label for="materialFormLoginPasswordEx">Your password</label>
        </div>



        <div class="text-center mt-4">
            <button name="login" class="btn btn-default" type="submit">Login</button>  or <a href="./signup.php">Register</a>
            <br />
            <a href="#">forgotten password ?</a>
        </div>
    </form>
    <!-- Material form login -->
</div>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>

<?php

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $pass = md5($pass);
    $user = $dbFunc->UserLogin($email,$pass);
    if($user){
        header('location:./home.php');
    }
    else{
        echo "<script>alert(email/password combination wrong !)</script>";
    }
}

?>

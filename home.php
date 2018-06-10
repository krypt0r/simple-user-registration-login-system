<?php


if(!($_SESSION)){
    header("location:./login.php");
}
if($_SESSION['level']==1){
  header("location:./admin.php");
}
include_once('dbFunction.php');
$dbFunc =  new dbFunction();
$user   = $dbFunc->getUserData($_SESSION['uid']);
$name   = $user['Name'];
$email  = $user['Email'];
$id   = $user['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
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

  <nav class="navbar navbar-expand-lg navbar-dark navbar-dark danger-color">
    <a class="navbar-brand" href="./">User Panel</a>
    <!-- Links -->
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="./">Home
                  <span class="sr-only">(current)</span>
              </a>
          </li>
          <li class="nav-item">
              <a id="ProfileEdit" class="nav-link" href="" data-toggle="modal" data-target="#modalLoginForm" >Profile</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Email Support</a>
          </li>
      </ul>
      <p class=" navbar-nav nav-link mr-sm-2">
        Welcome <?php echo $name; ?>
      </p>
      <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="md-form my-0">
                <button name="logout" class="btn btn-default btn-sm" type="submit">Logout</button>
            </div>
        </form>
  </nav>



    <h1 align="center">Welcome Mr. <?php echo $name; ?> </h1>
    <br />
    <br />

    <!--Profile Box  -->

    <div class="card" style="width: 22rem; margin-right:auto; margin-left:5px;">
        <div class="card-header deep-orange lighten-1 white-text">Profile</div>
        <div class="card-body">
            <p class="card-text"><b>Name:</b> <?php echo $name;?> </p>
            <p class="card-text"><b>Email:</b>&nbsp<?php echo $email;?></p>
            <a class="btn btn-deep-orange btn-sm" href="./editProfile.php?id=<?php echo $id?>">Edit Profile</a>
        </div>
    </div>

<br />
<br />

    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Hello <?php echo $name; ?></h4>
      <p>This portal is under devlopment. Check back later. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>



    <!-- Material form login -->
<div style="margin:auto; width:50%;" >

  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <div class="text-center mt-4">
        <button name="logout" class="btn btn-default" type="submit">Logout</button>

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
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
}
if(!($_SESSION)){
    header("location:./login.php");
}

?>

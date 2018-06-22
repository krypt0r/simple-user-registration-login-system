<?php
$userID    = $_GET['id'];
include('dbFunction.php');
$dbFunc = new dbFunction();

$user = $dbFunc->getUserData($userID);
$name = $user['Name'];
$email = $user['Email'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Profile</title>
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
        Welcome <?php echo $_SESSION['user']; ?>
      </p>
      <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="md-form my-0">
                <button name="logout" class="btn btn-default btn-sm" type="submit">Logout</button>
            </div>
        </form>
  </nav>
<Br />
<br />
  <!-- Edit Details Form  -->
  <!--Profile Box  -->

  <div class="card" style="width: 30%; margin:auto;">
      <div class="card-header deep-orange lighten-1 white-text">Profile</div>
      <div class="card-body">
          <!-- Form Material  -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo $userID ?>">
              Name: <input name="updateName" type="text" value="<?php echo $name; ?>"> <Br /> <br />
              Email: <input name="updateEmail" type="text" value="<?php echo $email; ?>"> <br /> <br />
              <button type="submit" class="btn btn-warning btn-sm" name="save" >Save</button>
            </form>
          <!--/FOrm Material  -->

      </div>
  </div>



    <!-- Material form login -->

    <!-- Material form login -->

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

  if(isset($_POST['save'])){
    $updateName   = $_POST['updateName'];
    $updateEmail  = $_POST['updateEmail'];
    $update = $dbFunc->updateUser($updateName,$updateEmail,$userID);
    if($update==true){
      header("location:./totalUsers.php?alert=updated");
    }
    else {
      echo "<h3>Not Working</h3>";
    }

  //   if($update == true){
  //     header("location:./editProfile.php?alert=Profile Updated&&id=11");
  //     echo "<h2>$name <br /> $email</h2>";
  //
  //   }
  //
  //   else {
  //     header("location:./editProfile.php?update=false");
  //
  //   }
}

  if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
  }
  if(!($_SESSION)){
      header("location:./login.php");
  }
 ?>

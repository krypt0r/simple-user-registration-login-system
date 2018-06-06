<?php
include_once('dbFunction.php');

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

    <h1 align="center">Welcome Mr. <?php echo $_SESSION['user']; ?> </h1>
    <br />
    <br />


    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Hello <?php echo $_SESSION['user']; ?></h4>
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

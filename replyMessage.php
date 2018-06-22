<?php

include('dbFunction.php');
$dbFunc = new dbFunction();
$messageID = $_GET['id'];
if(isset($_POST['logout'])){
session_unset();
session_destroy();
}
if(!($_SESSION)){
header("location:./login.php");
}
$getData = $dbFunc->getMessageFull($messageID);
$dbFunc->changeReadStatus($messageID);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel</title>
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
    <a class="navbar-brand" href="./">Admin Panel</a>
    <!-- Links -->
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="./">Home
                  <span class="sr-only">(current)</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Users</a>
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
<br />
<br />

<!-- Default form contact -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $messageID; ?>" style="width:50%; margin:auto;">
    <p class="h4 text-center mb-4">Message From &nbsp; <?php echo $getData['senderName'] ?></p>

    <!-- Default input name -->
    <label for="defaultFormContactNameEx" class="grey-text">Your name</label>
    <input type="text" id="defaultFormContactNameEx" class="form-control" value="<?php echo $getData['senderName'] ?>"disabled>

    <br>

    <!-- Default input email -->
    <label for="defaultFormContactEmailEx" class="grey-text">Your email</label>
    <input type="email" id="defaultFormContactEmailEx" class="form-control" value="<?php echo $getData['senderEmail'] ?>" disabled>

    <br>

    <!-- Default input subject -->
    <label for="defaultFormContactSubjectEx" class="grey-text">Subject</label>
    <input type="text" id="defaultFormContactSubjectEx" class="form-control" value="<?php echo $getData['emailSubject'] ?>" disabled>

    <br>

    <!-- Default textarea message -->
    <label for="defaultFormContactMessageEx" class="grey-text">Your message</label>
    <textarea type="text" id="defaultFormContactMessageEx" class="form-control" rows="3" disabled><?php echo $getData['emailBody'] ?></textarea>
    <hr>
    <hr>
    <p class="h5">Reply</p>
    <!-- Replying as -->
    <label for="defaultFormContactEmailEx" class="grey-text">Replying as: </label>
    <input type="email" id="defaultFormContactEmailEx" class="form-control" value="admin@localhost" disabled>
    <!-- Modify Subject -->
    <label for="defaultFormContactSubjectEx" class="grey-text">Reply Subject</label>
    <input type="text" id="defaultFormContactSubjectEx" class="form-control" value="RE:&nbsp;<?php echo $getData['emailSubject'] ?>">

    <!-- Reply Message -->
    <label for="defaultFormContactMessageEx" class="grey-text">Reply message</label>
    <textarea type="text" id="defaultFormContactMessageEx" class="form-control" rows="3"></textarea>
    <div class="text-center mt-4">
        <button class="btn btn-outline-warning" type="submit">Reply<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
</form>
<!-- Default form contact -->


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

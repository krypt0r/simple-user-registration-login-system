<?php

include_once('dbFunction.php');
$dbFunc = new dbFunction();

if(isset($_POST['logout'])){
session_unset();
session_destroy();
}
if(!($_SESSION)){
header("location:./login.php");
}
$query = $dbFunc->getMessageDetails();
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



  <table class="table table-bordered" style="margin:auto; width:50%">
      <thead class="blue-grey lighten-4">
          <tr>
              <th>ID</th>
              <th>Sender Name</th>
              <th>Sender Email</th>
              <th>Subject</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
        <?php
          while($allMessages = mysqli_fetch_array($query,MYSQLI_ASSOC)){
        ?>
          <tr>
              <th scope="row"><?php echo $allMessages['id']; ?></th>
              <td><?php echo $allMessages['senderName']; ?></td>
              <td><?php echo $allMessages['senderEmail']; ?></td>
              <td><?php echo $allMessages['emailSubject']; ?></td>
              <td><a class="btn btn-sm btn-default" name="readReplyMessage"  title="View" href="./replyMessage.php?id=<?php echo $allMessages['id'];?>"><span class="fa fa-eye" ></a> &nbsp; <a class="btn btn-sm btn-danger" title="Delete" href="./deleteUser.php?id=<?php echo $allUsers['id']; ?>"><span class="fa fa-trash"></span></a></td>
          </tr>
        <?php
      }
        ?>
      </tbody>
  </table>



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

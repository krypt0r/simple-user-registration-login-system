<?php
if(isset($_POST['logout'])){
session_unset();
session_destroy();
}
if(!($_SESSION)){
header("location:./login.php");
}

include_once('dbFunction.php');
$dbFunc = new dbFunction();
if($_SESSION['level'] != 1){
  header("location:./home.php");
}
$query = $dbFunc->getAllUsers();
if(isset($_POST['addUser'])){
  $userName   = $_POST['userName'];
  $userEmail  = $_POST['userEmail'];
  $userPass   = $_POST['userPassword'];

  $userCheck = $dbFunc->alreadyUser($userEmail);
  if($userCheck == false){

      $userAdded  = $dbFunc->UserRegistration($userName,$userEmail,$userPass);
      if($userAdded){
          echo "<script>alert('Account Created')</script>";

      }
      else{
          echo "<script>alert('Account Creatoin Failed!')</script>";
      }


  }
  else{
      echo "<script>alert('User with this Email already Exists !')</script>";
  }
}

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
              <th>Name</th>
              <th>Email</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
        <?php
          while($allUsers = mysqli_fetch_array($query,MYSQLI_ASSOC)){
        ?>
          <tr>
              <th scope="row"><?php echo $allUsers['id']; ?></th>
              <td><?php echo $allUsers['Name']; ?></td>
              <td><?php echo $allUsers['Email']; ?></td>
              <td><a class="btn btn-sm btn-default" title="Edit" href="./editProfile.php?id=<?php echo $allUsers['id'];?>"><span class="fa fa-edit" ></a> &nbsp; <a class="btn btn-sm btn-danger" title="Delete" href="./deleteUser.php?id=<?php echo $allUsers['id']; ?>"><span class="fa fa-trash"></span></a></td>
          </tr>
        <?php
      }
        ?>
      </tbody>
  </table>

  <!--  Modal addUser form-->
  <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Add User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

              <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                      <i class="fa fa-user prefix grey-text"></i>
                      <input name="userName" type="text" id="orangeForm-name" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="orangeForm-name">User Name</label>
                  </div>
                  <div class="md-form mb-5">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <input name="userEmail" type="email" id="orangeForm-email" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="orangeForm-email">User email</label>
                  </div>

                  <div class="md-form mb-4">
                      <i class="fa fa-lock prefix grey-text"></i>
                      <input name="userPassword" type="password" id="orangeForm-pass" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="orangeForm-pass">User password</label>
                  </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button name="addUser" title="Add User" class="btn btn-deep-orange"><span class="fa fa-user-plus"></span></button>
              </div>
              </form>
          </div>
      </div>
  </div>



  <!-- Material form login -->
  <div style="margin:auto; width:50%;" >

  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

  <div class="text-center mt-4">
      <button name="logout" class="btn btn-default" type="submit">Logout</button>
      <!-- Add User Modal Link  -->
      <a href="" class="btn btn-primary mr-sm-2" data-toggle="modal" data-target="#modalAddUser"><span class="fa fa-user-plus">&nbsp;</span>Add User</a>
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

<?php
$name = $email = $confirmEmail = "";
$nameErr = $emailErr = $conEmailErr = $passError = $tncErr = "";
require_once('dbFunction.php');
$dbFunc = new dbFunction();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Signup</title>
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

<h1 align="center">Sign up for site here</h1>
<br />
<br />
<!-- Material form register -->
<div style="margin:auto; width:50%;">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="registerForm">
  <p class="h4 text-center mb-4">Sign up</p>
  <p class="p text-right">Note : All fields are required</p>
  <!-- Material input text -->
  <div class="md-form">
      <i class="fa fa-user prefix grey-text"></i>
      <input name="name" type="text" id="materialFormRegisterNameEx" class="form-control" required>
      <label for="materialFormRegisterNameEx">Your name</label>
      <span class = "error"> <?php echo $nameErr;?></span>
  </div>

  <!-- Material input email -->
  <div class="md-form">
      <i class="fa fa-envelope prefix grey-text"></i>
      <input name="email" id="email" type="email" id="materialFormRegisterEmailEx" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
      <label for="materialFormRegisterEmailEx">Your email</label>

  </div>

  <!-- Material input email -->
  <div class="md-form">
      <i class="fa fa-exclamation-triangle prefix grey-text"></i>
      <input name="confirmEmail"  id="confirmemail" type="email" id="materialFormRegisterConfirmEx" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" required>
      <label for="materialFormRegisterConfirmEx">Confirm your email</label>
  </div>

  <!-- Material input password -->
  <div class="md-form">
      <i class="fa fa-lock prefix grey-text"></i>
      <input name="password" type="password" id="materialFormRegisterPasswordEx" class="form-control" required>
      <label for="materialFormRegisterPasswordEx">Your password</label>
  </div>

  <div class="form-check mb-2 mr-sm-2">
        <input name="agreeTnC" value="agreed" class="form-check-input" type="checkbox" id="inlineFormCheckMD" required>
        <label class="form-check-label" for="inlineFormCheckMD">
           I Agree TnC of xyz (Read <a href="#exampleModal"  data-toggle="modal" >TnC</a>)
        </label>
  </div>
<!-- -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <?php require('./tnc.php');?>
            </div>
            <div class="modal-footer">
              <div style="margin:auto;">
                <buttontype="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- -->


  <div class="text-center mt-4">
      <button name="register" class="btn btn-primary" type="submit"><i class="fa fa-user-plus pr-2" aria-hidden="true"></i> Register</button> <button class="btn btn-primary" type="reset" value="Reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
      <br />
      Already registered ? <a href="./login.php">Login Now</a>
  </div>
</form>
<!-- Material form register -->
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
    <script type="text/javascript">
    $("#registerForm").on("submit",function(e) { 
        if($("#email").val() != $("#confirmemail").val())
        {
            alert("Both the emails should match :(");
            e.preventDefault();
        }
    });
    </script>
</body>

</html>
<!-- User Registration -->
<?php
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];
    $pass = $_POST['password'];
    if($confirmEmail == $email){

        if($_POST['agreeTnC'] == 'agreed'){

            $userCheck = $dbFunc->alreadyUser($email);
            if($userCheck == false){

                $userRegister = $dbFunc->UserRegistration($name,$email,$pass);
                if($userRegister){
                    echo "<script>alert('Account Created')</script>";

                }
                else{
                    echo "<script>alert('Account Creatoin Failed')</script>";
                }


            }
            else{
                echo "<script>alert('User with this Email already Exists !')</script>";
            }
        }
        else{
            echo "<script>alert('Please Agree Terms and Conditions')</script>";
        }
    }
    else {
      echo "<script>alert('Email do not match')</script>";
    }
}


?>

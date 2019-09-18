<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="login.css">
  </head>

  <body id="LoginForm">
      <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">REGISTER HERE</h5>
                <?php 
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                      echo '<p class="signuperror">Fill up all fields </p>';
                    }
                    else if ($_GET['error'] == "invalidusername"){
                      echo '<p class="signuperror">Invalid username! </p>';
                    }
                    else if ($_GET['error'] == "passwordCheck"){
                      echo '<p class="signuperror">Your passwords do not match! </p>';
                    }
                    else if ($_GET['error'] == "usernametaken"){
                      echo '<p class="signuperror">Username already exists! </p>';
                    }
                    else if ($_GET['error'] == "sqlerror"){
                      echo '<p class="signuperror">Error, please try again! </p>';
                    }
                  }
                 ?>
              <form class="form-signin" method="post" name="register" action="UserSystem/register.php" >
                <div class="form-label-group">
                  <label for="inputText">Username</label>
                  <input type="text" id="inputUser" class="form-control" name="username"     autofocus>
                </div>
                <div class="form-label-group">
                  <label for="inputEmail">Email address</label>
                  <input type="email" id="inputEmail" name="email" class="form-control"   autofocus>
                </div>
                <div class="form-label-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" name="password" class="form-control"    autofocus>
                </div>
                <div class="form-label-group">
                  <label for="inputPassword">Repeat password</label>
                  <input type="password" id="inputPassword" name="passwordRepeat" class="form-control"    autofocus>
                </div>
                <div class="form-label-group">
                  <label for="inputEmail">Name & Surname</label>
                  <input type="text" id="inputFirst" class="form-control" placeholder="name" name="name"  autofocus>
                  <input type="text" id="inputSur" class="form-control" placeholder="surname" name="surname"  autofocus>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" name="register-submit" type="register" value="register">Register</button>
                <hr class="my-4">
                <a href="loginForm.php">Already registered?</a>
                </form>
            </div>
          </div>
       </div>
     </div>
   </div>
  </body>
</html>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Login</title>
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
              <h5 href="index.php" class="card-title text-center">LOGIN</h5>
              <?php 
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "nouser") {
                      echo '<p class="signuperror">Username already exists! </p>';
                    }
                    else if ($_GET['error'] == "wrongpassword"){
                      echo '<p class="signuperror">Wrong password </p>';
                    }
                    else if ($_GET['error'] == "emptyfields"){
                      echo '<p class="signuperror">Enter your login credentials</p>';
                    }
                  }
                 ?>
              <form class="form-signin" method="post" name="login" action="UserSystem/login.php">
                <div class="form-label-group">
                  <label for="inputEmail">Username or Email</label>
                  <input type="text" id="inputUser" name="userEmail" class="form-control" autofocus>
                </div>
                <div class="form-label-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" name="password" class="form-control">
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login-submit" type="login" value="login">LOGIN</button>
                <hr class="my-4">
                <a href="registerForm.php">Don't have account?</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>

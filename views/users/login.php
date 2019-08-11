<!--<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">User Login</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<//?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" />
      </div>
      <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>-->
<!--
* DEVELOPER : JOHN NEHRY C. DEDORO
* UI DEVELOPER : JOHN NEHRY C. DEDORO
* SECTION : ICT - C
* DATE UPDATE : 12/05/2018
* VERSION : 1.0.0
-->
<!DOCTYPE html>
<head>
  <title>Anahi</title>
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/custom.css">
</head>
<body class="body-form">
  <div class="form">
    <div class="container">
      <div class="row">
        
        <div class="mx-auto">
          <div class="logo text-center">
            <img src="<?php echo ROOT_URL?>/assets/images/anhs-logo.png" class="img-responsive logo-anhs">
          </div>
          <form class="form-login box-shadow" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <h3 class="form-login-heading text-center mt-3 mb-3">Login</h3>
            <label for="inputUsername" class="sr-only">Teacher's Reference Number</label>
            <input type="text" name="trn" id="inputUsername" class="form-control login-input" placeholder="Teacher's Reference Number" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control login-input" placeholder="Password" required>
            <!-- <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div> -->
            <?php Messages::displayX(); ?>
            <button class="btn btn-lg btn-primary btn-block btn-login" type="submit" name="submit" value="submit">Log In</button>
          </form>
        </div>
        
      </div>
    </div>
    </div> <!-- /container -->
    <script type="text/javascript" src="<?php echo ROOT_PATH?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH?>/assets/js/bootstrap.min.js"></script>
  </body>
</html>
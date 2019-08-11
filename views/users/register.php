
<div class="container">
  <div class="row">
    
      <div class="mx-auto">
        <div class="logo text-center">
          <img src="<?php echo ROOT_URL?>/assets/images/anhs-logo.png" class="img-responsive logo-anhs">
        </div>
          <form class="form-login box-shadow" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
              <h3 class="form-login-heading text-center mt-3 mb-5">Register a user</h3>
              <label for="inputUsername" class="sr-only">Teacher Reference Number</label>
              <input type="text" name="trn" id="inputUsername" class="form-control login-input" placeholder="Teacher's Reference Number" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" name="password" id="inputPassword" class="form-control login-input" placeholder="Password" required>
              <label for="inputPassword" class="sr-only">Retype password</label>
              <input type="password" name="retype" id="inputPassword" class="form-control login-input" placeholder="Retype password" required>
              <select class="form-control mb-4" name="usertype">
                <option selected="true" disabled="disabled">Select user type</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
              </select>
             <!-- <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div> -->
              <?php Messages::display(); ?>
              <button class="btn btn-lg btn-primary btn-block btn-login" type="submit" name="submit" value="submit">Register</button>
            </form>
          </div>
       
        
    </div>
    <div class="row">
          <div class="col-md-4 col-lg-4 col-sm-4">
         </div>
         <div class="col-md-4 col-lg-4 col-sm-4">
         </div>
         <div class="col-md-4 col-lg-4 col-sm-4 back-bar">
            <a class="back" href="<?php echo ROOT_URL; ?>"> Back to home </a></li>
         </div>
        </div>
</div> <!-- /container -->

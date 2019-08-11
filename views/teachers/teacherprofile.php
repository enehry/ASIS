<div class="container">

<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 box-shadow pt-4" >
    <div class="header-student-profile text-center mb-4 ">
      <h3><span class="badge badge-primary">Teacher's Profile</span></h3>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        <h3 class="panel-title mb-auto"><?php echo $viewmodel['trn']; ?></h3>
        <small class="text-muted">Teacher's Reference Number</small>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-lg-12 mt-3 mb-3" align="center">
            <div class="img-cropper">
              <img alt="User Pic" class="img-fluid" id="circle" src="<?php echo ROOT_URL?>assets/images/teachers/<?php
              if($viewmodel['profileimagename']){
              echo $viewmodel['profileimagename'];}
              else {
              echo 'user.png';
              } ?>">
            </div>
            <h3 class="text-center mt-2">
            <?php echo $viewmodel['lastname'].','
            .$viewmodel['firstname'].' '.$viewmodel['middlename']; ?>
            </h3>
            
          </div>
          
          
          
          
          
        </div>
        
      </div>
      <div class="row">
        <div class=" col-md-12 col-lg-12">
          
          <div class="buttons float-right mb-4 mr-4">
            <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'admin' ): ?>
            <a href="<?php echo ROOT_URL?>teachers/editteacher/<?php echo $viewmodel['tblteacherid']; ?>">
              <i class="fa fa-edit fa-lg"></i>
            </a>
            <?php endif; ?>
          </div>
          <table class="table table-sm">
            <tbody class="pl-4">
              <tr>
                <td class="pl-md-5">Position</td>
                <td><?php echo $viewmodel['teacherposition'];?></td>
              </tr>
              <tr>
                <td class="pl-md-5">Department</td>
                <td><?php echo $viewmodel['department'];?></td>
              </tr>
              <tr>
                <td class="pl-md-5">Date of Birth</td>
                <td><?php echo $viewmodel['birthdate'];?></td>
              </tr>
              <tr>
                <td class="pl-md-5">Sex</td>
                <td><?php echo $viewmodel['sex'];?></td>
              </tr>
              <td class="pl-md-5">Contact number</td>
              <td><?php echo $viewmodel['contactnumber']; ?></td>
            </tr>
            <tr>
              <td class="text-muted pl-md-5"><small>Home Address</small></td>
              <td></td>
            </tr>
            <tr>
              <td class="pl-md-5">Street</td>
              <td><?php echo $viewmodel['homeaddress']; ?></td>
            </tr>
            <tr>
              <td class="pl-md-5">Barangay</td>
              <td><?php echo $viewmodel['barangay']; ?></td>
            </tr>
            <tr>
              <td class="pl-md-5">Municipality</td>
              <td><?php echo $viewmodel['municipality']; ?></td>
            </tr>
            <tr>
              <td class="pl-md-5">Province</td>
              <td><?php echo $viewmodel['province']; ?></td>
            </tr>
            
            <tr>
              <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'admin' ): ?>
              <td class="pl-md-5">
                
                <button class="btn btn-primary btn-sm" onclick="showPass()">
                Show Password
                </button>
                
                
              </td>
              <td >
                <p id="password" style="display: none" ><?php echo $viewmodel['password']; ?></p>
                <p id="hide" style="display: block">
                  * * * * *
                </p>
              </td>
              <?php endif; ?>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="panel-footer float-right">
  <div>
    
  </div>
</div>

</div>
<div class="col-lg-2"></div>
</div>

<script type="text/javascript">
function showPass(){
var pass = document.getElementById("password");
var hide_pass = document.getElementById("hide");
if(pass.style.display === "block"){
pass.style.display = "none";
hide_pass.style.display = "block";
} else {
pass.style.display = "block";
hide_pass.style.display = "none";
}
}
</script>



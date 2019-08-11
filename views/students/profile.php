<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 box-shadow pt-4 pb-4">
      <div class="header-student-profile text-center mb-4">
        <h3><span class="badge badge-primary">Student's Profile</span></h3>
      </div>
      <div class="panel-heading text-center">
        <h3 class="panel-title mb-auto"><?php echo $viewmodel['lrn']; ?></h3>
        <small class="text-muted">Learners Reference Number</small>
      </div>
      <div class="image-panel text-center mt-4">
        <div class="img-cropper">
          <img alt="User Pic" class="img-fluid" id="circle" src="<?php echo ROOT_URL?>assets/images/students/<?php
          if($viewmodel['profileimagename']){
          echo $viewmodel['profileimagename'];}
          else {
          echo 'user.png';
          } ?>">
        </div>
        <h3 class="text-center mt-2">
        <?php echo $viewmodel['lastname'].', '
        .$viewmodel['firstname'].' '.$viewmodel['middlename']; ?>
        </h3>
      </div>
      <div class="table table-sm">
        <table class="table align-content-center">
          <div class="buttons float-right mb-2 mr-4 pr-4">
              <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'adviser' ||
              $_SESSION['user_data']['usertype'] == 'admin'): ?>
              <a href="<?php echo ROOT_URL?>students/editstudent/<?php echo $viewmodel['tblstudentid']; ?>">
                <i class="fa fa-edit fa-lg"></i>
              </a>
              <?php endif; ?>
            </div>
          <tbody class="">
            <tr class="">
              <td class="pl-md-5">Date of Birth</td>
              <td><?php echo $viewmodel['birthdate'];?></td>
            </tr>
                <tr>
                  <td class="pl-md-5">Sex</td>
                  <td><?php echo $viewmodel['sex'];?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Religion</td>
                  <td><?php echo $viewmodel['religion']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Mother tongue</td>
                  <td><?php echo $viewmodel['mothertongue']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Ethnic group</td>
                  <td><?php echo $viewmodel['ethnicgroup']; ?></td>
                </tr>
                <tr>
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
                  <td class="text-muted pl-md-5"><small>Parents/Guardian</small></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Father's name</td>
                  <td><?php echo $viewmodel['fathername']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Father's occupation</td>
                  <td><?php echo $viewmodel['foccupation']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Father's contact number</td>
                  <td><?php echo $viewmodel['fcontact']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Mother's name</td>
                  <td><?php echo $viewmodel['mothername']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Mother's occupation</td>
                  <td><?php echo $viewmodel['moccupation']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Mother's contact number</td>
                  <td><?php echo $viewmodel['mcontact']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Guardian's name</td>
                  <td><?php echo $viewmodel['guardianname']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Guardian's relationship</td>
                  <td><?php echo $viewmodel['grelationship']; ?></td>
                </tr>
                <tr>
                  <td class="pl-md-5">Guardian's contact number</td>
                  <td><?php echo $viewmodel['gcontact']; ?></td>
                </tr>
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
</div>
<br><br><br><br>
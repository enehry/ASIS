//Insert data of Student in MySQL
				$this->query('INSERT into tblstudents(lrn,firstname,middlename,lastname,sex,birthdate,mothertongue,ethnicgroup,religion,homeaddress,barangay,municipality,province,fathername,foccupation,fcontact,mothername,moccupation,mcontact,guardianname,gcontact,grelationship,contactnumber,profileimagename)VALUES(:lrn,:firstname,:middlename,:lastname,:sex,:birthdate,:mothertongue,:ethnicgroup,:religion,:homeaddress,:barangay,:municipality,:province,:fathername,:foccupation,:fcontact,:mothername,:moccupation,:mcontact,:guardianname,:gcontact,:grelationship,:contactnumber,:profileimagename)');


							// Bind the values
							$this->bind(':lrn',$post['lrn']);
							$this->bind(':firstname',$post['firstname']);
							$this->bind(':middlename',$post['middlename']);
							$this->bind(':lastname',$post['lastname']);
							$this->bind(':sex',$post['sex']);
							$this->bind(':birthdate',$post['birthdate']);
							$this->bind(':mothertongue',$post['mothertongue']);
							$this->bind(':ethnicgroup',$post['ethnicgroup']);
							$this->bind(':religion',$post['religion']);
							$this->bind(':homeaddress',$post['homeaddress']);
							$this->bind(':barangay',$post['barangay']);
							$this->bind(':municipality',$post['municipality']);
							$this->bind(':province',$post['province']);
							$this->bind(':fathername',$post['fname']);
							$this->bind(':foccupation',$post['foccupation']);
							$this->bind(':fcontact',$post['fcontact']);
							$this->bind(':mothername',$post['mname']);
							$this->bind(':moccupation',$post['moccupation']);
							$this->bind(':mcontact',$post['mcontact']);
							$this->bind(':guardianname',$post['gname']);
							$this->bind(':gcontact',$post['gcontact']);
							$this->bind(':grelationship',$post['grelationship']);
							$this->bind(':contactnumber',$post['contactnumber']);
							$this->bind(':profileimagename',$filenameNew);

							$this->execute();

							if($this->lastInsertId()){	
								Messages::setMsg('Student Successfully added', 'successMsg');
						

							} else {
								Messages::setMsg('Error student already added', 'error');

							}

                
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" >
            <div class="header-edit text-center mb-4">
                <h3><span class="badge badge-primary">Edit Student's Profile</span></h3>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h3 class="panel-title mb-auto">
                    <?php echo $viewmodel['lrn']; ?></h3>
                    <small class="text-muted">Learners Reference Number</small>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 mb-3" align="center">
                            <img alt="User Pic" class="img-fluid" id="circle" src="<?php echo ROOT_URL?>assets/images/students/<?php
                            if($viewmodel['profileimagename']){
                            echo $viewmodel['profileimagename'];
                            }
                            else {
                            echo 'user.png';
                            } ?>">
                            <div class="form-group mb-auto m-camera">
                                <label for="image-upload"><i class="fa fa-camera fa-lg upload-camera"></i></label>
                                <input type="file" name="image-upload" id="image-upload" value="<?php echo $viewmodel['profileimagename']; ?>" form="save-form" class="form-control-file student-upload-img" >
                                <br>
                                <small class="text-muted mb-auto
                                small-text">note: you can upload image</small>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col-md-4">
                                    <label class="mb-0 mt-2">Firstname</label>
                                    <input type="text" name="firstname" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['firstname']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="mb-0 mt-2">Middlename</label>
                                    <input type="text" name="middlename" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['middlename']; ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="mb-0">Lastname</label>
                                    <input type="text" name="lastname" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['lastname']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td class="col">Date of Birth</td>
                                    <td class="col"><input type="date" name="birthdate" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['birthdate']; ?>">
                                </td>
                            </tr>
<tr>
	<td class="col">Sex</td>
	<td class="col"><select name="sex" form="save-form" class="form-control text-center">
		<option><?php echo $viewmodel['sex']; ?></option>
		<option>Male</option>
		<option>Female</option>
	</select>
</td>
</tr>
                        <tr>
                            <td class="col">Religion</td>
                            <td class="col"><input type="text" name="religion" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['religion']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col">Mother tongue</td>
                        <td class="col"><input type="text" name="mothertongue" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['mothertongue']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ethnic group</td>
                    <td><input type="text" name="ethnicgroup" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['ethnicgroup']; ?>">
                	</td>
            	</tr>
<tr>
	<td>Contact number</td>
	<td><input type="text" name="contactnumber" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['contactnumber']; ?>">
	</td>
</tr>
        <tr>
            <td class="text-muted"><small>Home Address</small></td>
            <td></td>
        </tr>
<tr>
	<td>Street</td>
	<td><input type="text" name="homeaddress" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['homeaddress']; ?>">
</td>
</td>
</tr>
<tr>
    <td>Barangay</td>
    <td><input type="text" name="barangay" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['barangay']; ?>">
</td>
</tr>
<tr>
<td>Municipality</td>
<td><input type="text" name="municipality" form="save-form" class="edit-mode" value="<?php echo $viewmodel['municipality']; ?>">
</td>
</tr>
<tr>
<td>Province</td>
<td><input type="text" name="province" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['province']; ?>"></td>
</tr>
<tr>
<td class="text-muted"><small>Parents/Guardian</small></td>
<td></td>
</tr>
<tr>
<td>Father's name</td>
<td><input type="text" name="fathername" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['fathername']; ?>"></td>
</tr>
<tr>
<td>Father's occupation</td>
<td><input type="text" name="foccupation" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['foccupation']; ?>"></td>
</tr>
<tr>
<td>Father's contact number</td>
<td><input type="text" name="fcontact" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['fcontact']; ?>"></td></td>
</tr>
<tr>
<td>Mother's name</td>
<td><input type="text" name="mothername" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['mothername']; ?>"></td>
</tr>
<tr>
<td>Mother's occupation</td>
<td><input type="text" name="moccupation" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['moccupation']; ?>"></td>
</tr>
<tr>
<td>Mother's contact number</td>
<td><input type="text" name="mcontact" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['mcontact']; ?>"></td>
</tr>
<tr>
<td>Guardian's name</td>
<td><input type="text" name="guardianname" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['guardianname']; ?>"></td>
</tr>
<tr>
<td>Guardian's relationship</td>
<td><input type="text" name="grelationship" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['grelationship']; ?>"></td>
</tr>
<tr>
<td>Guardian's contact number</td>
<td><input type="text" name="gcontact" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['gcontact']; ?>"></td>
</tr>
</tbody>
</table>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="save-form" name="save-form" enctype="multipart/form-data">
<button class="mb-4 mr-4 btn btn-primary col-md-12" name="save" value="save">Save</button>
</form>
</div>
</div>
</div>
</div>
<div class="col-lg-2"></div>
</div>
<br>
<br>
</div>

<!-- teacher edit to !!! -->
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" >
      <div class="header-edit text-center mb-4">
        <h3><span class="badge badge-primary">Edit Teacher's Profile</span></h3>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading text-center">
          <h3 class="panel-title mb-auto"><?php echo $viewmodel['trn']; ?></h3>
          <small class="text-muted">Learners Reference Number</small>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 col-lg-12 mt-3 mb-3" align="center"> <img alt="User Pic" class="img-fluid" id="circle" src="<?php echo ROOT_URL?>assets/images/teachers/<?php
              if($viewmodel['profileimagename']){
              echo $viewmodel['profileimagename'];}
              else {
              echo 'user.png';
              } ?>">
              <div class="form-group mb-auto m-camera">
                <label for="image-upload"><i class="fa fa-camera fa-lg upload-camera"></i></label>
                <input type="file" name="image-upload" id="image-upload" value="<?php echo $viewmodel['profileimagename']; ?>" form="save-form" class="form-control-file student-upload-img" >
                <br>
                <small class="text-muted mb-auto
                small-text">note: you can upload image</small>
              </div>
              <div class="form-row mt-3">
                <div class="col-md-4">
                  <label class="mb-0 mt-2">Firstname</label>
                  <input type="text" name="firstname" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['firstname']; ?>">
                </div>
                <div class="col-md-4">
                  <label class="mb-0 mt-2">Middlename</label>
                  <input type="text" name="middlename" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['middlename']; ?>">
                </div>
                <div class="col-md-4 mt-2">
                  <label class="mb-0">Lastname</label>
                  <input type="text" name="lastname" form="save-form" class="form-control text-center" value="<?php echo $viewmodel['lastname']; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class=" col-md-12 col-lg-12">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td class="col">Position</td>
                  <td class="col"><input type="text" name="position" form="save-form" class="form-control" value="<?php echo $viewmodel['teacherposition']; ?>">
                </td>
              </tr>
              <tr>
                <td>Department</td>
                <td><input type="text" name="department" form="save-form" class="form-control" value="<?php echo $viewmodel['department']; ?>">
              </td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><input type="date" name="birthdate" form="save-form" class="form-control" value="<?php echo $viewmodel['birthdate']; ?>">
            </td>
          </tr>
          <tr>
            <td>Sex</td>
            <td>
              <select class="form-control">
                <option>Male</option>
                <option>Female</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Contact number</td>
            <td><input type="text" name="contactnumber" form="save-form" class="form-control" value="<?php echo $viewmodel['contactnumber']; ?>">
          </td>
        </tr>
        <tr>
          <td class="text-muted"><small>Home Address</small></td>
          <td></td>
        </tr>
        <tr>
          <td>Street</td>
          <td><input type="text" name="homeaddress" form="save-form" class="form-control" value="<?php echo $viewmodel['homeaddress']; ?>">
        </td>
      </td>
    </tr>
    <tr>
      <td>Barangay</td>
      <td><input type="text" name="barangay" form="save-form" class="form-control" value="<?php echo $viewmodel['barangay']; ?>">
    </td>
  </tr>
  <tr>
    <td>Municipality</td>
    <td><input type="text" name="municipality" form="save-form" class="form-control" value="<?php echo $viewmodel['municipality']; ?>">
  </td>
</tr>
<tr>
  <td>Province</td>
  <td><input type="text" name="province" form="save-form" class="form-control" value="<?php echo $viewmodel['province']; ?>"></td>
</tr>
</tbody>
</table>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="save-form" name="save-form" enctype="multipart/form-data">
<button class="float-right mb-4 col  btn btn-primary" name="save" value="save">Save</button>
</form>
</div>
</div>
</div>
</div>
<div class="col-lg-2"></div>
</div>
<br>
<br>


<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 profile-box" >
      <div class="header-student-profile text-center mb-4">
        <h3><span class="badge badge-primary">Student's Profile</span></h3>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading text-center">
          <h3 class="panel-title mb-auto"><?php echo $viewmodel['lrn']; ?></h3>
          <small class="text-muted">Learners Reference Number</small>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 col-lg-12 mt-3 mb-3" align="center">
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
            
            
            
            
            
          </div>
          
        </div>
        <div class="row">
          <div class=" col-md-12 col-lg-12">
            <div class="buttons float-right mb-4 mr-4">
              <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'adviser' ||
              $_SESSION['user_data']['usertype'] == 'admin'): ?>
              <a href="<?php echo ROOT_URL?>students/editstudent/<?php echo $viewmodel['tblstudentid']; ?>">
                <i class="fa fa-edit fa-lg"></i>
              </a>
              <?php endif; ?>
            </div>
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td>Date of Birth</td>
                  <td><?php echo $viewmodel['birthdate'];?></td>
                </tr>
                <tr>
                  <td>Sex</td>
                  <td><?php echo $viewmodel['sex'];?></td>
                </tr>
                <tr>
                  <td>Religion</td>
                  <td><?php echo $viewmodel['religion']; ?></td>
                </tr>
                <tr>
                  <td>Mother tongue</td>
                  <td><?php echo $viewmodel['mothertongue']; ?></td>
                </tr>
                <tr>
                  <td>Etnic group</td>
                  <td><?php echo $viewmodel['ethnicgroup']; ?></td>
                </tr>
                <tr>
                  <td>Contact number</td>
                  <td><?php echo $viewmodel['contactnumber']; ?></td>
                </tr>
                <tr>
                  <td class="text-muted"><small>Home Address</small></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Street</td>
                  <td><?php echo $viewmodel['homeaddress']; ?></td>
                </tr>
                <tr>
                  <td>Barangay</td>
                  <td><?php echo $viewmodel['barangay']; ?></td>
                </tr>
                <tr>
                  <td>Municipality</td>
                  <td><?php echo $viewmodel['municipality']; ?></td>
                </tr>
                <tr>
                  <td>Province</td>
                  <td><?php echo $viewmodel['province']; ?></td>
                </tr>
                <tr>
                  <td class="text-muted"><small>Parents/Guardian</small></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Father's name</td>
                  <td><?php echo $viewmodel['fathername']; ?></td>
                </tr>
                <tr>
                  <td>Father's occupation</td>
                  <td><?php echo $viewmodel['foccupation']; ?></td>
                </tr>
                <tr>
                  <td>Father's contact number</td>
                  <td><?php echo $viewmodel['fcontact']; ?></td>
                </tr>
                <tr>
                  <td>Mother's name</td>
                  <td><?php echo $viewmodel['mothername']; ?></td>
                </tr>
                <tr>
                  <td>Mother's occupation</td>
                  <td><?php echo $viewmodel['moccupation']; ?></td>
                </tr>
                <tr>
                  <td>Mother's contact number</td>
                  <td><?php echo $viewmodel['mcontact']; ?></td>
                </tr>
                <tr>
                  <td>Guardian's name</td>
                  <td><?php echo $viewmodel['guardianname']; ?></td>
                </tr>
                <tr>
                  <td>Guardian's relationship</td>
                  <td><?php echo $viewmodel['grelationship']; ?></td>
                </tr>
                <tr>
                  <td>Guardian's contact number</td>
                  <td><?php echo $viewmodel['gcontact']; ?></td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer float-right">
      
    </div>
    
  </div>
  <div class="col-lg-2"></div>
</div>
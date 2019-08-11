<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 box-shadow pt-4 w3-flat-clouds">
            <div class="header-edit text-center mb-4">
                <h3><span class="badge badge-primary">Edit Student's Profile</span></h3>
            </div>
            <div class="panel-heading text-center">
                    <h3 class="panel-title mb-auto">
                    <?php echo $viewmodel['lrn']; ?></h3>
                    <small class="text-muted">Learners Reference Number</small>
            </div><!-- end of panel heading-->
            <div class="panel-image text-center mt-4">
                <img alt="User Pic" class="img-fluid" id="circle" src="<?php echo ROOT_URL?>assets/images/students/<?php
                if($viewmodel['profileimagename']){
                echo $viewmodel['profileimagename'];
                }
                else {
                echo 'user.png';
                } ?>">
                <!-- BUTTON FOR UPLOAD IMAGE -->
                <div class="form-group mb-auto m-camera">
                    <label for="image-upload"><i class="fa fa-camera fa-lg upload-camera"></i></label>
                    <input type="file" name="image-upload" id="image-upload" value="<?php echo $viewmodel['profileimagename']; ?>" form="save-form" class="form-control-file student-upload-img" >
                    <br>
                    <small class="text-muted mb-auto
                    small-text">note: you can upload image</small>
                </div>
            </div><!-- / END OF PANEL IMAGE -->
            <div class="form-row text-center mt-2">
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
            </div><!-- FORM ROW END -->
            <div class="table table-sm mt-4">
                <table class="table">
                    <tbody class="w3-flat-clouds">
                        <tr>
                            <td>Date of Birth</td>
                            <td><input type="date" name="birthdate" form="save-form" class="form-control col" value="<?php echo $viewmodel['birthdate']; ?>">
                        </td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td><select name="sex" form="save-form" class="form-control">
                                <option><?php echo $viewmodel['sex']; ?></option>
                                <option><?php if($viewmodel['sex'] ==  'Male'){
                                    echo "Female";
                                } else {echo "Male";}?></option>>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td><input type="text" name="religion" form="save-form" class="form-control" value="<?php echo $viewmodel['religion']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Mother tongue</td>
                            <td><input type="text" name="mothertongue" form="save-form" class="form-control" value="<?php echo $viewmodel['mothertongue']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Ethnic group</td>
                            <td><input type="text" name="ethnicgroup" form="save-form" class="form-control" value="<?php echo $viewmodel['ethnicgroup']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Contact number</td>
                            <td><input type="text" name="contactnumber" form="save-form" class="form-control" value="<?php echo $viewmodel['contactnumber']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-muted"><small>Home Address</small></td>
                        </tr>
                        <tr>
                            <td>Street</td>
                            <td><input type="text" name="homeaddress" form="save-form" class="form-control" value="<?php echo $viewmodel['homeaddress']; ?>">
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
                        <tr>
                            <td class="text-muted"><small>Parents/Guardian</small></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Father's name</td>
                            <td><input type="text" name="fathername" form="save-form" class="form-control" value="<?php echo $viewmodel['fathername']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Father's occupation</td>
                            <td><input type="text" name="foccupation" form="save-form" class="form-control" value="<?php echo $viewmodel['foccupation']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Father's contact number</td>
                            <td><input type="text" name="fcontact" form="save-form" class="form-control" value="<?php echo $viewmodel['fcontact']; ?>"></td></td>
                        </tr>
                        <tr>
                            <td>Mother's name</td>
                            <td><input type="text" name="mothername" form="save-form" class="form-control" value="<?php echo $viewmodel['mothername']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Mother's occupation</td>
                            <td><input type="text" name="moccupation" form="save-form" class="form-control" value="<?php echo $viewmodel['moccupation']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Mother's contact number</td>
                            <td><input type="text" name="mcontact" form="save-form" class="form-control" value="<?php echo $viewmodel['mcontact']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Guardian's name</td>
                            <td><input type="text" name="guardianname" form="save-form" class="form-control" value="<?php echo $viewmodel['guardianname']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Guardian's relationship</td>
                            <td><input type="text" name="grelationship" form="save-form" class="form-control" value="<?php echo $viewmodel['grelationship']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Guardian's contact number</td>
                            <td><input type="text" name="gcontact" form="save-form" class="form-control" value="<?php echo $viewmodel['gcontact']; ?>"></td>
                        </tr>
                    </tbody>
                </table>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="save-form" name="save-form" enctype="multipart/form-data">
                    <button class="mb-4 mr-4 btn btn-primary col-md-12" name="save" value="save">Save</button>
                </form>
            </div><!-- end table div -->
        </div><!-- end of col -->    
    </div><!-- end row --> 
</div><!-- end  container-->
<br><br><br><br><br>
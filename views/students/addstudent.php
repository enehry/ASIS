<!-- Default form register -->
<?php Messages::displayCustomMsg(); ?>
<?php Messages::displayX(); ?>
<div class="box-shadow w3-flat-clouds">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="text-center border border-light p-5">

    <p class="h4 mb-4"><span class=" badge badge-primary">Student Registration Page</span></p>
    <small class="text-primary">Note: All field with <span class="text-danger font-weight-bold">*</span> are important fields</small>
    <div class="form-row mb-4">
        <div class="col-xs-12 col-lg-4">
            <img src="../assets/images/user.png" class="img-fluid user-img">
            <div class="form-group mb-auto m-camera">
                <label for="image-upload"><i class="fa fa-camera fa-lg upload-camera"></i></label>
                <input type="file" name="image-upload" id="image-upload" class="form-control-file student-upload-img">
                <br>
                <small class="text-muted mb-auto
                small-text">note: you can upload image</small>
            </div>
        </div>
        <div class="col-lg-4 mt-auto">
            <!-- sex -->

                <label class="float-left mb-auto"><small>Sex <span class="text-danger font-weight-bold">*</span></small></label>
                <select name="sex" class="form-control" placeholder = "Sex">
                  <option>Male</option>
                  <option>Female</option>
                </select>
        </div>
        <div class="col-lg-4 mt-auto">
            <!-- LRN -->
            <label class="float-left mb-auto"><small>Learner's Reference Number <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['lrn']){
                echo 'notval';
            } ?>" name="lrn" placeholder="Learners Reference Number" maxlength="12">
        </div>
    </div>

    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- First name -->
            <label class="float-left mb-auto"><small>First name <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['fname']){
                echo 'notval';
            } ?>" placeholder="First name" name="firstname">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Middle name -->
            <label class="float-left mb-auto"><small>Middle name</small></label>
            <input type="text" class="form-control" placeholder="Middle name" name="middlename">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Last name -->
            <label class="float-left mb-auto"><small>Last name <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['lname']){
                echo 'notval';
            } ?>" placeholder="Last name" name="lastname">
        </div>
    </div>

    
    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Bday -->
            <label class="float-left mb-auto"><small>Birthdate <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="date" class="form-control <?php if($GLOBALS['bday']){
                echo 'notval';
            } ?>" placeholder="Birthdate" name="birthdate">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Mother Tongue -->
            <label class="float-left mb-auto"><small>Mother tongue</small></label>
            <input type="text" class="form-control" placeholder="Mother Tongue" name="mothertongue">
        </div> 
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- ethnic group -->
            <label class="float-left mb-auto"><small>Ethnic group</small></label>
            <input type="text" class="form-control" placeholder="Ethnic group" name="ethnicgroup">
        </div>
    </div>
    <div class="form-row">
        <div class="col-xs-12 col-lg-12 mb-1">
            <!-- Home address -->
            <label class="float-left mb-auto"><small>Home Address <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['st']){
                echo 'notval';
            } ?>" placeholder="Street" name="homeaddress">
        </div>
    </div>
    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- barangay -->
            <label class="float-left mb-auto"><small>Barangay <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control Barangay <?php if($GLOBALS['brgy']){
                echo 'notval';
            } ?>" placeholder="Barangay" name="barangay">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Municipality -->
            <label class="float-left mb-auto"><small>Municipality <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['mun']){
                echo 'notval';
            } ?>" placeholder="Municipality" name="municipality">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- email -->
            <label class="float-left mb-auto"><small>Province <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['prov']){
                echo 'notval';
            } ?>" placeholder="Province" name="province">
        </div>
    </div>
    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- religion -->
            <label class="float-left mb-auto"><small>Religion <span class="text-danger font-weight-bold">*</span></small></label>
            <input type="text" class="form-control <?php if($GLOBALS['prov']){
                echo 'notval';
            } ?>" placeholder="Religion" name="religion">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- contact number -->
            <label class="float-left mb-auto"><small>Contact number</small></label>
            <input type="text" class="form-control" placeholder="Contact number" name="contactnumber">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- email -->
            <label class="float-left mb-auto"><small>Email</small></label>
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
    </div>
    <hr>
    <!-- Fathers info -->
    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- rfather's name -->
            <label class="float-left mb-auto"><small>Father's name</small></label>
            <input type="text" class="form-control" placeholder="Father's name" name="fname">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- father Occupation -->
            <label class="float-left mb-auto"><small>Father's Occupation</small></label>
            <input type="text" class="form-control" placeholder="father's Occupation" name="foccupation">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- email -->
            <label class="float-left mb-auto"><small>Contact number</small></label>
            <input type="text" class="form-control" placeholder="Contact number" name="fcontact">
        </div>
    </div>
    <hr>
    <!-- Mothers info -->
    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Mother's name -->
            <label class="float-left mb-auto"><small>Mother's name</small></label>
            <input type="text" class="form-control" placeholder="Mother's name" name="mname">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Motehr Occupation -->
            <label class="float-left mb-auto"><small>Mother's Occupation</small></label>
            <input type="text" class="form-control" placeholder="Mother's Occupation" name="moccupation">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- email -->
            <label class="float-left mb-auto"><small>Contact number</small></label>
            <input type="text" class="form-control" placeholder="Contact number" name="mcontact">
        </div>
    </div>
    <hr>
    <!-- Guardian info -->
    <div class="form-row">
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Guardian's name -->
            <label class="float-left mb-auto"><small>Guardian's name</small></label>
            <input type="text" class="form-control" placeholder="Guardian's name" name="gname">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- Motehr Occupation -->
            <label class="float-left mb-auto"><small>Guardian's relationship</small></label>
            <input type="text" class="form-control" placeholder="Guardian's relationship" name="grelationship">
        </div>
        <div class="col-xs-12 col-md-4 mb-1">
            <!-- email -->
            <label class="float-left mb-auto"><small>Contact number</small></label>
            <input type="text" class="form-control" placeholder="Contact number" name="gcontact">
        </div>
    </div>



    
    <hr>
    <!-- Save button -->
    <button class="btn btn-primary my-4 btn-block" type="submit" name="add" value="add">Save</button>

    



</form>
</div>
<!-- Default form register -->
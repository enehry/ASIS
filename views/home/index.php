
<?php
      if($_SESSION['user_data']['usertype'] == 'adviser'){
        header('Location:'.ROOT_URL.'classlist/myclasslist');
        exit;
      }
      if($_SESSION['user_data']['usertype'] == 'teacher'){
        header('Location:'.ROOT_URL.'grading/mystudent');
        exit;
      }
      ?>
<?php $today = date('Y-M-D'); ?>
<div class="container">
  <div class="row pt-0">
    <h5 class="ml-3"><span class="badge badge-dark">Home/Dashboard</span></h5>
  </div>
  <div class="row bg-count pt-3">
    <div class="col-md-2 col-sm-4 col-xs-6">
      <a class="dashboard-link" href="<?php echo ROOT_URL ?>students/addstudent">
      <div class="card text-white bg-danger mb-3 card-count">
          <div class="card-header small text-center">Registered Students</div>
          <div class="card-body text-center pb-2 pt-2">
            <i class="big fa fa-users fa-2x float-left"></i>
            <span>
                  <?php  $dashboard = new Dashboard();
                     $dashboard->getCount('tblStudents'); ?>
            </span>
          </div>
      </div>
      </a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6">
      <a class="dashboard-link" href="<?php echo ROOT_URL ?>teachers/addteacher">
      <div class="card text-white bg-primary mb-3 card-count">
          <div class="card-header small text-center">Registered Teacher</div>
          <div class="card-body text-center pb-2 pt-2">
            <i class="big fa fa-chalkboard-teacher fa-2x float-left"></i>
            <span>
                  <?php  $dashboard = new Dashboard();
                     $dashboard->getCount('tblTeachers'); ?>
            </span>
          </div>
      </div>
      </a>    
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6">
      <a class="dashboard-link" href="<?php echo ROOT_URL ?>enrollment/enrollmentadmin">
        <div class="card text-white bg-secondary mb-3 card-count">
          <div class="card-header small text-center">Enrolled SHS</div>
          <div class="card-body text-center pb-2 pt-2">
            <i class="fa fa-user-plus fa-2x float-left big"></i>
            <span>
                  <?php  $dashboard = new Dashboard();
                     $dashboard->customCount('tblenrollmentshs'); ?>
            </span>
          </div>
      </div> 
    </a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6">
      <a class="dashboard-link" href="<?php echo ROOT_URL ?>enrollment/enrollmentadmin">
        <div class="card text-white bg-success mb-3 card-count">
          <div class="card-header small text-center">Subjects</div>
          <div class="card-body text-center pb-2 pt-2">
            <i class="big fa fa-book fa-2x float-left"></i>
            <span>
                  <?php  $dashboard = new Dashboard();
                     $dashboard->getCount('tblsubject'); ?>
            </span>
          </div>
      </div>    
      </a>  
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6">
      <a class="dashboard-link" href="<?php echo ROOT_URL ?>enrollment/setadvisoryclass">
      <div class="card text-white bg-info mb-3 card-count">
          <div class="card-header small text-center">Adviser</div>
          <div class="card-body text-center pb-2 pt-2">
            <i class="big fa fa-user fa-2x float-left"></i>
            <span>
                  <?php  $dashboard = new Dashboard();
                     $dashboard->customCount('tbladvisoryclass'); ?>
            </span>
          </div>
      </div>
    </a>
    </div>
    <div class="col-md-2 pb-2">

      <div class="time">
        <span>S.Y. <?php echo SCHOOL_YEAR; ?></span>
        <br>
        <span><?php echo strtoupper(TERM); ?> SEMESTER</span>
        <hr class="hr">
        <div class="badge badge-primary">Date</div>
        <span class=""><?php echo strtoupper(date('M')).' '.date('d').' '.date('Y'); ?></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 bg-count mt-2 p-4 ml-sm-0">
      <div class="header-student-sex text-center">Percentage of Registered Student</div>
      <hr>
      <span><i class="fa fa-male"></i> Male</span>
      <span class="float-right small">
        <?php  $dashboard = new Dashboard();
         echo  $dashboard->countStudent('Male'); ?>
      </span>
      <div class="progress mb-3">
        <div class="progress-bar bg-info" role="progressbar" style="width:<?php  $dashboard = new Dashboard();

                   if($dashboard->countBoys()!==null){echo  $dashboard->countBoys();}else{echo "0";} ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <?php  $dashboard = new Dashboard();

                   if($dashboard->countBoys()!==null){echo  $dashboard->countBoys();}else{echo "0";} ?>%</div>
      </div>
      <span><i class="fa fa-female"></i> Female</span>
      <span class="float-right small">
        <?php  $dashboard = new Dashboard();
         echo  $dashboard->countStudent('Female'); ?>
      </span>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width:<?php  $dashboard = new Dashboard();

                   if($dashboard->countGirls()!==null){echo  $dashboard->countGirls();}else{echo "0";} ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php  $dashboard = new Dashboard();

                   if($dashboard->countGirls()!==null){echo  $dashboard->countGirls();}else{echo "0";} ?>%</div>
      </div>
    </div>
    <div class="col-md-3 bg-count mt-2 ml-md-2 p-4 ml-sm-0">
      <div class="header-student-sex text-center">Percentage of Registered Teachers</div>
      <hr>
      <span><i class="fa fa-male"></i> Male</span>
      <span class="float-right small">
        <?php  $dashboard = new Dashboard();
         echo  $dashboard->countTeachers('Male'); ?>
      </span>
      <div class="progress mb-3">
        <div class="progress-bar bg-info" role="progressbar" style="width:<?php  $dashboard = new Dashboard();

                   echo  $dashboard->countBoysTeacher(); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php  $dashboard = new Dashboard();

                   if($dashboard->countBoysTeacher()!==null){echo  $dashboard->countBoysTeacher();}else{echo "0";} ?>%</div>
      </div>
      <span><i class="fa fa-female"></i>Female</span>
      <span class="float-right small">
        <?php  $dashboard = new Dashboard();
         echo  $dashboard->countTeachers('Female'); ?>
      </span>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width:<?php  $dashboard = new Dashboard();

                   if($dashboard->countGirlsTeacher()!==null){echo  $dashboard->countGirlsTeacher();}else{echo "0";} ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php  $dashboard = new Dashboard();

                   if($dashboard->countGirlsTeacher()!==null){echo  $dashboard->countGirlsTeacher();}?>%</div>
      </div>
    </div>
    <div class="col-md-5 bg-count ml-md-3 ml-sm-0 mt-2">
      <div class="text-center mt-4">Recently Enrolled</div>
        <hr>
      <div class="table-wrapper-scroll-y mt-md-4 table-sm">
        
        <table class="table table-bordered table-striped small">
          <thead id="header-fixed">
            <tr>
              <th scope="col">#</th>
              <th scope="col">LRN</th>
              <th scope="col">Name</th>
              <th scope="col" class="grsec">Grade & Section</th>
            </tr>
          </thead>
          <tbody>

            <?php 
              $dashboard = new Dashboard();
              $result = $dashboard->recentlyEnrolled();
              $count = 1;
              if(!empty($result)){
              foreach ($result as $data):
            ?>
            <tr>
              <th scope="row"><?php echo $count++; ?></th>
              <td><?php echo $data['lrn']; ?></td>
              <td><?php echo $data['lastname'].', '.$data['firstname'].' '.$data['middlename'];?></td>
              <td><?php echo $data['grade'].'  '.$data['section']; ?></td>
            </tr>
          <?php endforeach; } else { echo '<td colspan ="4" class="alert alert-warning" role="alert">
  No students enrolled yet.
</td>'; } ?>
          </tbody>
        </table>

      </div>

    </div>
  </div>

</div>







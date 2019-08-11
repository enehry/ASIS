<!--
	* DEVELOPER : JOHN NEHRY C. DEDORO
	* UI DEVELOPER : JOHN NEHRY C. DEDORO 
	* SECTION : ICT - C
  * DATE STARTED : 12/08/2018
	* DATE UPDATE : 1/29/2019
	* VERSION : 1.2.1
  * ANGONO NATIONAL HIGH SCHOOL ENROLLMENT SYSTEM
  * USING MVC FRAMEWORK
-->
<?php if(!(isset($_SESSION['is_logged_in']))){
      header('Location:'.ROOT_URL.'users/login');}
    ?>
<!DOCTYPE html>
<head>
	<title>Anahi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH?>assets/css/bootstrap.css">
  <link href="<?php echo ROOT_PATH; ?>assets/fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/custom.css">
  
</head>
<body>
  <div id="wrapper">
        <div class="back-btn mb-0 mt-0 btn-back">
    <button class="btn transparent" onclick="goBack()"><i class="fa fa-arrow-left fa-lg long"></i></button>
    </div>
    <nav class="navbar header-top fixed-top navbar-expand-lg ">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars fa-lg nav-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav">
          <?php if(isset($_SESSION['user_data'])): ?>
          <li></li>
          <li class="nav-item navprofile text-center mb-2">
            <p class="nav-link mb-1 mt-3 welcome"><?php echo ucfirst($_SESSION['user_data']['usertype']); ?></p>
           <img src="<?php echo ROOT_URL ?>assets/images/teachers/<?php
            if(!empty($_SESSION['user_data']['profileimagename'])){echo $_SESSION['user_data']['profileimagename'];}
            else {echo 'user.png';} ?>" class = "navprofilepic" >
           <a class="link-name" href="<?php echo ROOT_URL; ?>teachers/teacherprofile/<?php echo $_SESSION['user_data']['tblteacherid']; ?>">
           <p class="mt-2 name"><?php echo $_SESSION['user_data']['firstname'].' '.
                          $_SESSION['user_data']['middlename'].'<br>'.
                          $_SESSION['user_data']['lastname']; ?></p>
          </a>
        </li> 
        <?php endif; ?>
        <!----- ADMIN PANELS -->
        <?php if(isset($_SESSION['is_logged_in'])){
          if($_SESSION['user_data']['usertype'] == 'admin'){

          ?>
          <li class="nav-item<?php if($_GET['controller'] == ''){
            echo ' active-nav';
          } ?>">
            <a class="nav-link ml-3 home" href="<?php echo ROOT_URL?>">
              <i class="fa fa-home mr-2"></i>
              Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item <?php if($_GET['controller'] == 'students'){
            echo ' active-nav';
          } ?>">
            <a class="nav-link ml-3" href="<?php echo ROOT_URL?>students"><i class="fa fa-user mr-2"></i>
            Students</a>
          </li>
          <li class="nav-item <?php if($_GET['controller'] == 'teachers'){
            echo ' active-nav';
          } ?>">
            <a class="nav-link ml-3" href="<?php echo ROOT_URL?>teachers">
            <i class="fa fa-chalkboard-teacher mr-1"></i>
            Teachers</a>
          </li>
          <li class="nav-item <?php if($_GET['controller'] == 'schedules' && $_GET['action'] == 'subjectlist'){
            echo ' active-nav';
          } ?>"><a class="nav-link ml-3" href="<?php echo ROOT_URL?>schedules/subjectlist"><i class="fa fa-book mr-3"></i>Subject list</a></li>
          <?php  }
        } ?>
          <!--/ END ADMIN PANEL-->
          <!-- ADVISER PANEL -->
          <?php if(isset($_SESSION['is_logged_in'])){
            if($_SESSION['user_data']['usertype'] == 'admin' 
              || $_SESSION['user_data']['usertype'] == 'adviser'){ ?>
           <li class="nav-item dropdown <?php if($_GET['controller'] == 'enrollment'){
            echo ' active-nav';
          } ?>">
        <a class="ml-3 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-plus mr-1"></i>
          Enrollment
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'admin' ): ?>
          <a class="dropdown-item" href="<?php echo ROOT_URL?>enrollment/setadvisoryclass">Set Advisory</a>
          <a class="dropdown-item" href="<?php echo ROOT_URL?>enrollment/enrollmentadmin">Enroll Students</a>
          <?php else: ?>

          <!--<a class="dropdown-item" href="<?php echo ROOT_URL?>enrollment/juniorhigh">Junior High</a>-->
          <a class="dropdown-item" href="<?php echo ROOT_URL?>enrollment/seniorhigh">Senior High</a>
        <?php endif; ?>
        </div>
          
      </li><?php }
          } ?>
      <li class="nav-item dropdown <?php if($_GET['controller'] == 'schedules' && $_GET['action'] !== 'subjectlist'){
            echo ' active-nav';
          } ?>">
        <a class="ml-3 nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar-alt mr-2"></i>
          Schedules
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
           <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'admin' ): ?>
          <a class="dropdown-item" href="<?php echo ROOT_URL?>schedules/indexscheduleshs">Schedule SHS</a>
        <?php else: ?>
          <a class="dropdown-item" href="<?php echo ROOT_URL?>schedules/teacherSched/<?php if(isset($_SESSION['user_data']['trn'])){echo $_SESSION['user_data']['trn'];} ?>">My Schedules</a>
        <?php endif; ?>
        </div>
          
      </li>
    <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['usertype'] == 'admin'): ?>
        
          <li class="nav-item <?php if($_GET['controller'] == 'classlist'){
            echo ' active-nav';
          } ?>">
           
            <a class="nav-link ml-3" href="<?php echo ROOT_URL?>classlist">
            <i class="fa fa-list-alt mr-2"></i>
            Class List</a>


          </li>
            <?php else: ?>
           <?php if(isset($_SESSION['is_logged_in'])){
            if($_SESSION['user_data']['usertype'] == 'adviser'){ ?>
           <li class="nav-item <?php if($_GET['action'] == 'myclasslist'){
            echo ' active-nav';
          } ?>">
            <a class="nav-link ml-3" href="<?php echo ROOT_URL?>classlist/myclasslist">
            <i class="fa fa-list-alt mr-2"></i>
            My Class List</a>
          </li>
        <?php } }?>
       
          <li class="nav-item <?php if($_GET['action'] == 'mystudent'){
            echo ' active-nav';
          } ?>">
            <a class="nav-link ml-3" href="<?php echo ROOT_URL?>grading/mystudent">
             <i class="fa fa-users mr-2"></i>
            My Students</a>
          </li>  
           <?php endif; ?>
        </ul>

        <!-- FOR TOP BAR NAVIGATION -->
        <ul class="navbar-nav ml-md-auto d-md-flex">
            <li class="nav-item">
            <?php if(!(isset($_SESSION['is_logged_in']))): ?>
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login</a>
            <?php else: ?>
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
          <?php endif; ?>
          </li>

        </ul>
      </div>
    </nav>

    <div class="page-body">   
    <?php Messages::display(); ?>
    <?php require($view); ?>

    </div> 
  
    </div><!-- wrapper -->
    <script type="text/javascript">

      function goBack() {
        window.history.back();
      }

    </script>
    <script type="text/javascript" src="<?php echo ROOT_PATH?>/assets/js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH?>/assets/js/popper.min.js"></script>
     <script type="text/javascript" src="<?php echo ROOT_PATH?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH?>/assets/js/bootbox.min.js"></script>
</body>
</html>
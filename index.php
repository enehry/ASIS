<?php
// Start Session
session_start();


// Include Config
require('config.php');

include_once('classes/PHPExcel/IOFactory.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Pagination.php');
require('classes/Dashboard.php');
require('classes/Forms.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');
require('controllers/enrollment.php');
require('controllers/schedules.php');
require('controllers/classlist.php');
require('controllers/grading.php');
require('controllers/students.php');
require('controllers/teachers.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');
require('models/enrollment.php');
require('models/schedule.php');
require('models/classlist.php');
require('models/grading.php');
require('models/student.php');
require('models/teacher.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}

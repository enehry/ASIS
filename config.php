<?php

// define DB params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "anahidb");

// define URLs
define("ROOT_PATH", "/Anahi/");
define("ROOT_URL", "/Anahi/");
define("FILE_PATH","C:/xampp/htdocs/Anahi/");


// define SCHOOL YEAR


$dateM = 0;
switch(date('M')){
	case 'January':
	$dateM = 1;
	break;
	case 'February':
	$dateM = 2;
	break;
	case 'March':
	$dateM = 3;
	break;
	case 'April':
	$dateM = 4;
	break;
	case 'May':
	$dateM = 5;
	break;
	case 'June':
	$dateM = 6;
	break;
	case 'July':
	$dateM = 7;
	break;
	case 'August':
	$dateM = 8;
	break;
	case 'September':
	$dateM = 9;
	break;
	case 'October':
	$dateM = 10;
	break;
	case 'November':
	$dateM = 11;
	break;
	case 'December':
	$dateM = 12;
	break;



}


if($dateM > 5){

$startyear = date('Y');
$endyear = date('Y') + 1;
	
  define("SCHOOL_YEAR",$startyear.'-'.$endyear);
} else {
	$startyear = date('Y')-1;
	$endyear = date('Y');

  define("SCHOOL_YEAR",$startyear.'-'.$endyear);
}
  if($dateM > 5 && $dateM < 11){
  	define("TERM","First");
  } else if(($dateM <=12 || $dateM >= 11) && $dateM < 5 ){
  	define("TERM","Second");
  } else {
  	define("TERM","Summer");
  }
<?php

/* Handle all messages in the system
* ex. error message
*/
class Messages{
	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		} else {
			$_SESSION['successMsg'] = $text;
		}
	}

	public static function display(){
		if(isset($_SESSION['errorMsg'])){
			echo '<div class="alert alert-danger">'.$_SESSION['errorMsg'].'</div>';
			unset($_SESSION['errorMsg']);
		}

		if(isset($_SESSION['successMsg'])){
			echo '<div class="alert alert-success">'.$_SESSION['successMsg'].'</div>';
			unset($_SESSION['successMsg']);
		}
	}

	public static function setCustomMsg($text,$type){
			if($type == 'error'){
				$_SESSION['cusErrorMsg'] = $text;
			} else {
			$_SESSION['cusSuccessMsg'] = $text;
		}
	}

	public static function displayCustomMsg(){
		if(isset($_SESSION['cusErrorMsg'])){
			echo '<div class="alert alert-danger">'.$_SESSION['cusErrorMsg'].'</div>';
			unset($_SESSION['cusErrorMsg']);
		}

		if(isset($_SESSION['cusSuccessMsg'])){
			echo '<div class="alert alert-success">'.$_SESSION['cusSuccessMsg'].'</div>';
			unset($_SESSION['cusSuccessMsg']);
		}
	}
		public static function setMsgX($text, $title){
		$_SESSION['title'] = $title;
		$_SESSION['text'] = $text;
	}

	public static function displayX(){
			if(isset($_SESSION['title'])){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>'.$_SESSION['title'].' </strong>'.$_SESSION['text'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			unset($_SESSION['title']);
			unset($_SESSION['text']);
		}
	}


}
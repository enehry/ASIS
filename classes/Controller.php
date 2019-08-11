<?php

// Controller Class -> use to interact with the users control and manipulate a specific action
// abstract class -> because it is not needed to instantiate we only need to extend this class

abstract class Controller{
	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}
	// triggered the some method
	public function executeAction(){
		return $this->{$this->action}();
	}
	// assign view
	protected function returnView($viewmodel, $fullview){
		$view = 'views/'. get_class($this). '/' . $this->action. '.php';
		// main layout that wraps around the view
		// instead of create multiple layout / header / menu bar / footer 
		// we will reuse it --> only the view of :
		if($fullview){
			require('views/main.php');
		} else {
			require($view);
		}
	}
}
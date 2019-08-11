<?php

/* 
*	Custom Framework Develop by : John Nehry Dedoro
* 	this class will get the user request and action
*	.htacces -> this will tell our apache server to rewrite and determine that the first "/"
* 	is the controler second "/" is action and last is the parameter
*	ex. www.nehrypogi.com this will show the index page
*	wwww.nehrypogi.com/controller -> will show the index of the class
*	wwww.nehrypogi.com/controller/action -> triggered some function of a specific class
*	wwww.nehrypogi.com/controller/action/parameters -> super global variables
*	
*/
class Bootstrap{
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
		$this->request = $request;
		// if there is no request it will redirect to index.php/home
		// the url inserted will turn into array the splitter is "/" slash
		if($this->request['controller'] == ""){
			$this->controller = 'home';
		} else {
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
		// you can check if the request is working
		// some debug lines ---------

		// print array of the request
		//print_r($this->request)."</br>";
		//echo $this->controller."</br>";
		//echo $this->action."</br>";
	}

	public function createController(){
		// check if there is a class
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			// Check Extend
			if(in_array("Controller", $parents)){
				// check if controller include an action
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					// Method Does Not Exist
					echo '<h1>Method does not exist</h1>';
					return;
				}
			} else {
				// Base Controller Does Not Exist
				echo '<h1>Base controller not found</h1>';
				return;
			}
		} else {
			// Controller Class Does Not Exist
			echo '<h1>Controller class does not exist</h1>';
			return;
		}
		
	}
}
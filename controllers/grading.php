<?php
class Grading extends Controller{
	protected function Index(){
		$viewmodel = new GradingModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function grades(){
		$viewmodel = new GradingModel();
		$this->returnView($viewmodel->grades(), true);
	}
	protected function mystudent(){
		$viewmodel = new GradingModel();
		$this->returnView($viewmodel->mystudent(), true);
	}
	protected function viewMystudent(){
		$viewmodel = new GradingModel();
		$this->returnView($viewmodel->viewMystudent(), true);
	}
	protected function card(){
		$viewmodel = new GradingModel();
		$this->returnView($viewmodel->card(), true);
	}

}
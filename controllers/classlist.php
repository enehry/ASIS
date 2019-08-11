<?php
class Classlist extends Controller{
	protected function Index(){
		$viewmodel = new ClasslistModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function myclasslist(){
		$viewmodel = new ClasslistModel();
		$this->returnView($viewmodel->myclasslist(), true);

	}
	protected function seniorhigh(){
		$viewmodel = new ClasslistModel();
		$this->returnView($viewmodel->seniorhigh(), true);

	}
	protected function adminclasslist(){
		$viewmodel = new ClasslistModel();
		$this->returnView($viewmodel->adminclasslist(), true);

	}

}
<?php
	class Students extends Controller{
		protected function index(){
			$viewmodel = new StudentModel();
			$this->returnView($viewmodel->index(), true);
		} 
		protected function addstudent(){
			$viewmodel = new StudentModel();
			$this->returnView($viewmodel->addstudent(), true);
		} 
		protected function profile(){
			$viewmodel = new StudentModel();
			$this->returnView($viewmodel->profile(), true);
		}
		protected function editstudent(){
			$viewmodel = new StudentModel();
			$this->returnView($viewmodel->editstudent(),true);
		}
		protected function searchstudent(){
			$viewmodel = new StudentModel();
			$this->returnView($viewmodel->searchstudent(),true);
		}
		
	}
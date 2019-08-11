<?php
	class Teachers extends Controller{
		protected function index(){
			$viewmodel = new TeacherModel();
			$this->returnview($viewmodel->index(), true);
		}

		protected function addteacher(){
			$viewmodel = new TeacherMOdel();
			$this->returnview($viewmodel->addteacher(), true);
		}

		protected function teacherprofile(){
			$viewmodel = new TeacherMOdel();
			$this->returnview($viewmodel->teacherprofile(), true);
		}
		protected function editteacher(){
			$viewmodel = new TeacherMOdel();
			$this->returnview($viewmodel->editteacher(), true);
		}
		protected function searchteacher(){
			$viewmodel = new TeacherMOdel();
			$this->returnview($viewmodel->searchteacher(), true);
		}
	}
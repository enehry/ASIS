<?php
class Schedules extends Controller{
	protected function Index(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function advisorylist(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->advisorylist(), true);
	}
	protected function subjectlist(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->subjectlist(),true);
	}
	protected function indexscheduleshs(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->indexscheduleshs(),true);
	}
	protected function createscheduleshs(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->createscheduleshs(),true);
	}
	protected function indexselectsched(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->indexselectsched(),true);
	}
	protected function selectsched(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->selectsched(),true);
	}
	protected function editschedshs(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->editschedshs(),true);
	}
		protected function teacherSched(){
		$viewmodel = new ScheduleModel();
		$this->returnView($viewmodel->teacherSched(),true);
	}
	
	

}
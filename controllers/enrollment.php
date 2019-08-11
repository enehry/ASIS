<?php
class Enrollment extends Controller{
	protected function Index(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function seniorhigh(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->seniorhigh(), true);
	}
	protected function enrollmentsearchshs(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->enrollmentsearchshs(), true);
	}
	protected function setadvisoryclass(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->setadvisoryclass(), true);
	}
	protected function juniorhigh(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->juniorhigh(), true);
	}
	protected function setadvisorysearch(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->setadvisorysearch(), true);
	}
	protected function enrollmentadmin(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->enrollmentadmin(), true);
	}
	protected function enrollmentadminsearch(){
		$viewmodel = new EnrollmentModel();
		$this->returnView($viewmodel->enrollmentadminsearch(), true);
	}
}
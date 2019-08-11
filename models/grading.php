<?php
class GradingModel extends Model{
	public function Index(){

		


		return;
	}


	public function grades(){
		$split = explode('*',$_GET['key']);
		$gradeid = $split[3];

		$post  = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
	
		if(isset($post['save'])){
			header('location:'. $_SERVER['HTTP_REFERER']);
			if(!empty($post['mid'])){
				$this->query('UPDATE tblgradesshs
					SET mid = :mid
					WHERE tblgradeid = :id');
				$this->bind(':id',$gradeid);
				$this->bind(':mid',$post['mid']);
				$this->execute();
			} 
			if(!empty($post['final'])){
				$this->query('UPDATE tblgradesshs
					SET final = :final
					WHERE tblgradeid = :id');
				$this->bind(':id',$gradeid);
				$this->bind(':final',$post['final']);
				$this->execute();
			}
			if(!empty($post['remarks'])){
				$this->query('UPDATE tblgradesshs
					SET remarks = :remarks
					WHERE tblgradeid = :id');
				$this->bind(':id',$gradeid);
				$this->bind(':remarks',$post['remarks']);
				$this->execute();
			}
			Messages::setCustomMsg('Grade succesfully save','successMsg');
			header('location:'.ROOT_URL.'grading/viewmystudent/'.$_GET['id'].'/'.$split[0].'*'.$split[1].'*'.$split[2]);
			exit;

		}

		$this->query('SELECT * FROM tblgradesshs gs
			LEFT JOIN tblstudents st 
			ON gs.lrn = st.lrn 
			LEFT JOIN tblsubject sb
			ON gs.subjectcode = sb.subjectcode
			WHERE tblgradeid = :id');
		$this->bind(':id',$gradeid);
		$result = $this->single();


		return $result;
	}

	public function mystudent(){
		$this->query('SELECT DISTINCT sc.starttime,sc.endtime, sc.subjectcode,sc.grade,sc.section,sb.description
		 	FROM tblschedshs sc
			LEFT JOIN tblsubject sb
			ON sc.subjectcode = sb.subjectcode
			WHERE sc.trn = :trn
			AND sc.sy = :sy');
		$this->bind(':trn',$_SESSION['user_data']['trn']);
		$this->bind(':sy',SCHOOL_YEAR);
		$result = $this->resultSet();
		return $result;
	}

	public function viewMystudent(){

		$grade = $_GET['id'];
		$split = explode('*',$_GET['key']);
		$section = $split[0].'-'.$split[1];

		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		if(isset($post['edit'])){
			echo "OK";
		}

		if(isset($post['add'])){

		}

		$this->query('SELECT * FROM tblgradesshs sg 
			LEFT JOIN tblschedshs sc 
			ON sg.schedid = sc.schedid 
			LEFT JOIN tblstudents st 
			ON sc.lrn = st.lrn
			LEFT JOIN tblsubject sj
			ON sg.subjectcode = sj.subjectcode
			WHERE sg.grade = :grade 
			AND sg.section = :section
			AND sg.sy = :sy
			AND sc.trn = :trn
			AND sg.subjectcode = :subjectcode');
		$this->bind(':grade',$grade);
		$this->bind(':section',$section);
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':trn',$_SESSION['user_data']['trn']);
		$this->bind(':subjectcode',$split[2]);
		$result = $this->resultSet();


		return $result;
	}
	public function card(){

		$lrn = $_GET['id'];
		$post =filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		if(isset($post['save'])){


			$forms = new Forms();

			$forms->createSF10($lrn,SCHOOL_YEAR);
		}



	
		$this->query('SELECT sg.tblgradeid,sg.lrn,sg.subjectcode,sg.mid,sg.final,sg.remarks,sg.grade,
						sg.section,sg.term,sg.sy,sg.schedid,st.firstname,st.middlename,st.lastname,st.birthdate,
						st.sex,st.tblstudentid,es.trn,es.dateenrolled,su.description,su.type FROM tblgradesshs sg 
			LEFT JOIN tblstudents st ON sg.lrn = st.lrn 
			LEFT JOIN tblenrollmentshs es ON es.lrn = sg.lrn
			LEFT JOIN tblsubject su
			ON sg.subjectcode = su.subjectcode
			WHERE sg.lrn = :lrn
			AND es.sy = :sy
			AND sg.sy = :sy');
		$this->bind(':lrn',$lrn);
		$this->bind(':sy',SCHOOL_YEAR);



		$result = $this->resultSet();
		return $result;
	}
}
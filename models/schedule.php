<?php
class ScheduleModel extends Model{
	public function Index(){
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$searchkey = '%%';
		if(isset($post['btnsearch'])){


			global $searchkey;

			$searchkey = '%'.$post['searchitem'].'%';
		}
		if(isset($post['btnset'])){
			
				
			
			if(isset($post['grade']) && isset($post['section'])){

				if(isset($post['selected'])){
					foreach($post['selected'] as $selectedadviser){

					$this->query('INSERT INTO tbladvisoryclass (trn,grade,section,sy,term)
						VALUES (:trn,:grade,:section,:sy,:term)');

					$this->bind(':trn',$selectedadviser);
					$this->bind(':grade',$post['grade']);
					$this->bind(':section',$post['section']);
					$this->bind(':sy',SCHOOL_YEAR);
					$this->bind(':term',$post['term']);

					$this->execute();
					if($this->lastInsertId()){
						Messages::setMsg('Adviser successfully set','successMsg');
					}
				}

				} else {
					Messages::setMsg('Please select students','error');
				}


			} else {
				Messages::setMsg('Please select Grade and Section','error');
			}

		}
		if(isset($post['delete'])){
			
			if(isset($post['selected'])){
				foreach ($post['selected'] as $deleteid) {
					$this->query('DELETE FROM tbladvisoryclass WHERE
					trn = :deleteid ');
					$this->bind(':deleteid',$deleteid);
					$this->execute();

					Messages::setMsg('Adviser successfully remove','successMsg');
				}
			}
		}
		

		$this->query('SELECT a.tbladvisoryclassid,t.trn,t.firstname,t.middlename,
						t.lastname,a.grade,a.section 
						FROM tblteachers t
						LEFT JOIN tbladvisoryclass a 
						ON t.trn = a.trn WHERE t.trn LIKE :search
						');

		$this->bind(':search',$searchkey);

		$rows = $this->resultSet();

		return $rows;
	}
	public function advisorylist(){
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$searchkey = '%%';
		if(isset($post['btnsearch'])){


			global $searchkey;

			$searchkey = '%'.$post['searchitem'].'%';
		}
		if(isset($post['btnset'])){
			
				
			
			if(isset($post['grade']) && isset($post['section'])){

				if(isset($post['selected'])){
					foreach($post['selected'] as $selectedadviser){

					$this->query('INSERT INTO tbladvisoryclass (trn,grade,section,sy,term)
						VALUES (:trn,:grade,:section,:sy,:term)');

					$this->bind(':trn',$selectedadviser);
					$this->bind(':grade',$post['grade']);
					$this->bind(':section',$post['section']);
					$this->bind(':sy',SCHOOL_YEAR);
					$this->bind(':term',$post['term']);

					$this->execute();
					if($this->lastInsertId()){
						Messages::setMsg('Adviser successfully set','successMsg');
					}
				}

				} else {
					Messages::setMsg('Please select students','error');
				}


			} else {
				Messages::setMsg('Please select Grade and Section','error');
			}

		}

		$this->query('SELECT t.tbladvisoryclassid, t.trn,t.firstname,t.middlename,
						t.lastname,a.grade,a.section 
						FROM tblteachers t
						LEFT JOIN tbladvisoryclass a 
						ON t.trn = a.trn WHERE t.trn LIKE :search
						');

		$this->bind(':search',$searchkey);

		$rows = $this->resultSet();

		return $rows;

	}

	public function subjectlist(){


		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$searchkey = '%%';
		
		if(isset($post['add'])){
			$this->query('INSERT INTO tblsubject(subjectcode,description,type,track,strand)
			 	VALUES 
				(:subjectcode,:description,:type,:track,:strand)');
			$this->bind(':subjectcode',$post['subjectcode']);
			$this->bind(':description',$post['description']);
			$this->bind(':type',$post['type']);
			$this->bind(':track',$post['track']);
			$this->bind(':strand',$post['strand']);

			$this->execute();

			if($this->lastInsertId()){
				Messages::setMsg('Subject successfully added','successMsg');
			} else {
				Messages::setMsg('There is a problem adding a Subject in the list','error');
			}
		}


		if(isset($post['search'])){
			global $searchkey;

			$searchkey = '%'.$post['searchitem'].'%';


		}
		if(isset($post['remove'])){
			if(isset($post['id'])){
				$count = 0;
				foreach ($post['id'] as $selected) {
					$this->query('DELETE FROM tblsubject
						WHERE subjectid = :deletesub ');
					$this->bind(':deletesub',$selected);
					$this->execute();

					$count++;
				}
				Messages::setMsg($count.' Subject(s) remove from the list','error');

			} else {
				Messages::setMsg('Please select what to remove','error');
			}

			
		}


		$this->query('SELECT * FROM tblsubject 
			WHERE subjectcode LIKE :search
			OR description LIKE :search');

		$this->bind(':search',$searchkey);


		$rows = $this->resultSet();

		return $rows;
	}
	public function indexscheduleshs(){

		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		$searchkey = '%%';

		if(isset($post['search'])){
			global $searchkey;

			$searchkey = '%'.$post['searchitem'].'%';

		}

		$this->query('SELECT a.trn,a.grade,a.section,a.sy,a.term,t.firstname,t.lastname,t.middlename,t.tblteacherid,t.profileimagename 
			FROM tbladvisoryclass a 
			LEFT JOIN tblteachers t 
			ON a.trn = t.trn 
			WHERE t.firstname LIKE :searchkey 
			OR t.middlename LIKE :searchkey 
			OR t.lastname LIKE :searchkey 
			OR a.trn LIKE :searchkey 
			OR a.section LIKE :searchkey 
			OR a.grade LIKE :searchkey');

		$this->bind(':searchkey',$searchkey);

		$rows = $this->resultSet();

		if(empty($rows)){
			Messages::setCustomMsg('No search result','successMsg');
		}
	
		return $rows;
	}
	public function createscheduleshs(){

		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		
		$booldays = array('0','0','0','0','0');
		$id = $_GET['id'];
		
		
		$this->query('SELECT grade,section FROM tbladvisoryclass WHERE trn = :trn');
		$this->bind(':trn',$id);

		$row = $this->single();

		$grade = $row['grade'];
		$section = $row['section'];
	
	

		if(isset($post['add'])){
			echo $post['trn'];
			if(isset($post['day'])){

				foreach ($post['day'] as $selectedday) {
				
						$booldays[$selectedday] = '1';
						
					}
				
	
				$this->query('
					INSERT INTO tblscheduletemplateshs
					(subjectcode,trn,grade,section,m,t,w,th,f,starttime,endtime,term)
					VALUES 
					(:subjectcode,:trn,:grade,:section,:m,:t,:w,:th,:f,:starttime,:endtime,:term)');

				$this->bind(':subjectcode',$post['subjectcode']);
				$this->bind(':trn',$post['trn']);
				$this->bind(':grade',$grade);
				$this->bind(':section',$section);
				$this->bind(':starttime',$post['starttime']);
				$this->bind(':endtime',$post['endtime']);
				$this->bind(':term',TERM);
				$this->bind(':m',$booldays[0]);
				$this->bind(':t',$booldays[1]);
				$this->bind(':w',$booldays[2]);
				$this->bind(':th',$booldays[3]);
				$this->bind(':f',$booldays[4]);

				$this->execute();

				if($this->lastInsertId()){
					Messages::setMsg('Schedule Successfully Added','successMsg');
					header('Location:'.ROOT_URL.'schedules/createscheduleshs/'.$_GET['id']);
					exit;
				} else{
					Messages::setMsg('There is a problem in adding a schedule','error');
				} 

			






			} else {
				Messages::setMsg('Please select day','error');
			}
		}
		if(isset($post['delete'])){
	
			if(isset($post['selected'])){

				foreach ($post['selected'] as $selectdelete) {
					$this->query('DELETE FROM tblscheduletemplateshs
						WHERE schedtempid = :id');

					$this->bind(':id',$selectdelete);
					$this->execute();
					echo Messages::setMsg('Schedule deleted','successMsg');

				}


			} else {
				echo Messages::setMsg('Please select at least one to delete','error');
			}
		}

		$this->query('SELECT su.description,su.subjectcode,
					sc.schedtempid,
					sc.grade,sc.section,sc.trn,sc.m,
					sc.t,sc.w,sc.th,sc.f,sc.starttime,
					sc.endtime,sc.term,t.tblteacherid,
					t.firstname,t.middlename,t.lastname 
					FROM tblsubject su 
					RIGHT JOIN tblscheduletemplateshs sc 
					ON sc.subjectcode = su.subjectcode 
					LEFT JOIN tblteachers t 
					ON sc.trn = t.trn
					WHERE sc.grade = :grade
					AND sc.section = :section
					ORDER BY sc.starttime DESC');

		$this->bind(':grade',$grade);
		$this->bind(':section',$section);

		$rows = $this->resultSet();


		return $rows;
	}

	public function indexselectsched(){

		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		$searchkey = '%%';
		$adviser = $_SESSION['user_data']['trn'];


		if(isset($post['search'])){
			global $searchkey;

			$searchkey = '%'.$post['searchitem'].'%';

		}
	

		$this->query('SELECT a.trn,a.grade,a.section,a.sy,a.term,t.firstname,t.lastname,t.middlename,t.tblteacherid,t.profileimagename 
			FROM tbladvisoryclass a 
			LEFT JOIN tblteachers t 
			ON a.trn = t.trn 
			WHERE t.firstname LIKE :searchkey 
			OR t.middlename LIKE :searchkey 
			OR t.lastname LIKE :searchkey 
			OR a.trn LIKE :searchkey 
			OR a.section LIKE :searchkey 
			OR a.grade LIKE :searchkey');

		$this->bind(':searchkey',$searchkey);

		$rows = $this->resultSet();

		if(empty($rows)){
			Messages::setCustomMsg('No search result','successMsg');
		}
	
		return $rows;


	}
	public function selectsched(){
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		
		$booldays = array('0','0','0','0','0');
		$id = $_GET['id'];
		
		
		$this->query('SELECT grade,section FROM tbladvisoryclass WHERE trn = :trn');
		$this->bind(':trn',$id);

		$row = $this->single();

		$grade = $row['grade'];
		$section = $row['section'];
	
		

		if(isset($post['add'])){
			if(isset($post['day'])){

				foreach ($post['day'] as $selectedday) {
				
						$booldays[$selectedday] = '1';
						
					}
				
	
				$this->query('
					INSERT INTO tblscheduletemplateshs
					(subjectcode,trn,grade,section,m,t,w,th,f,starttime,endtime,term)
					VALUES 
					(:subjectcode,:trn,:grade,:section,:m,:t,:w,:th,:f,:starttime,:endtime,:term)');

				$this->bind(':subjectcode',$post['subjectcode']);
				$this->bind(':trn',$post['trn']);
				$this->bind(':grade',$grade);
				$this->bind(':section',$section);
				$this->bind(':starttime',$post['starttime']);
				$this->bind(':endtime',$post['endtime']);
				$this->bind(':term',$post['term']);
				$this->bind(':m',$booldays[0]);
				$this->bind(':t',$booldays[1]);
				$this->bind(':w',$booldays[2]);
				$this->bind(':th',$booldays[3]);
				$this->bind(':f',$booldays[4]);

				$this->execute();

				if($this->lastInsertId()){
					Messages::setCustomMsg('Schedule Successfully Added','successMsg');
					header('Location:'.ROOT_URL.'schedules/selectsched/'.$id);
					exit;

				} else{
					Messages::setMsg('There is a problem in adding a schedule','error');
				}

			//may ilalagay pa ako dito dapat

			} else {
				Messages::setMsg('Please select day','error');
			}
		}

		if(isset($post['delete'])){
	
			if(isset($post['selected'])){

				foreach ($post['selected'] as $selectdelete) {
					$this->query('DELETE FROM tblscheduletemplateshs
						WHERE schedtempid = :id');

					$this->bind(':id',$selectdelete);
					$this->execute();
					echo Messages::setMsg('Schedule deleted','successMsg');

				}


			} else {
				echo Messages::setMsg('Please select at least one to delete','error');
			}
		}

		if(isset($post['selectthis'])){
			$this->query('SELECT * FROM tblscheduletemplateshs WHERE grade = :grade AND section = :section');

			$this->bind(':grade',$grade);
			$this->bind(':section',$section);
			$schedres = $this->resultSet();

			$this->query('SELECT lrn,sy FROM tblenrollmentshs
				WHERE grade = :gr AND section = :sec AND sy = :sy');
			$this->bind(':gr',$grade);
			$this->bind(':sec',$section);
			$this->bind(':sy',SCHOOL_YEAR);
	

			$this->execute();
			$lrns =  $this->resultSet();

		


			foreach ($lrns as $lrn) {

			foreach ($schedres as $insertsched) {
				$this->query('INSERT INTO tblschedshs(lrn,subjectcode,trn,mon,tue,wed,thu,fri,starttime,endtime,term,grade,section,sy) VALUES (:lrn,:subjectcode,:trn,:mon,:tue,:wed,:thu,:fri,:starttime,:endtime,:term,:grade,:section,:sy)');


				$this->bind(':lrn',$lrn['lrn']);
				$this->bind(':subjectcode',$insertsched['subjectcode']);
				$this->bind(':trn',$insertsched['trn']);
				$this->bind(':mon',$insertsched['m']);
				$this->bind(':tue',$insertsched['t']);
				$this->bind(':wed',$insertsched['w']);
				$this->bind(':thu',$insertsched['th']);
				$this->bind(':fri',$insertsched['f']);
				$this->bind(':starttime',$insertsched['starttime']);
				$this->bind(':endtime',$insertsched['endtime']);
				$this->bind(':term',$insertsched['term']);
				$this->bind(':grade',$grade);
				$this->bind(':section',$section);
				$this->bind(':sy',$lrn['sy']);



				$this->execute();





			}



			}

			$this->query('SELECT schedid,sy,lrn,subjectcode,term,grade,section FROM tblschedshs 
				WHERE grade = :grade
				AND section = :section
				AND sy = :sy');

				$this->bind(':grade',$grade);
				$this->bind('section',$section);
				$this->bind(':sy',SCHOOL_YEAR);
				$scheddata = $this->resultSet();


				foreach ($scheddata as $data) {
					$this->query('INSERT INTO tblgradesshs(lrn,subjectcode,grade,section,term,sy,schedid) 
						VALUES 
						(:lrn,:subjectcode,:grade,:section,:term,:sy,:schedid)');
					$this->bind(':lrn',$data['lrn']);
					$this->bind(':subjectcode',$data['subjectcode']);
					$this->bind(':grade',$data['grade']);
					$this->bind(':section',$data['section']);
					$this->bind(':term',$data['term']);
					$this->bind(':sy',$data['sy']);
					$this->bind(':schedid',$data['schedid']);
					$this->execute();
				}

			if($this->lastInsertId()){
				Messages::setMsg('Schedule Successfully Added','successMsg');

				sleep(1);

				header('Location:'.ROOT_URL.'classlist/myclasslist');
				exit;


			}
		}
		if(isset($post['setsubj'])){

			$this->query('SELECT * FROM tblschedshs WHERE grade = :grade
			AND section = :section');

			$this->bind(':grade',$grade);
			$this->bind(':section',$section);

			$res = $this->resultSet();

			foreach ($res as $data) {



				$this->query('INSERT INTO tblgradesshs(lrn,subjectcode,grade,section,term,sy) VALUES (:lrn,:subjectcode,:grade,:section,:term,:sy)');

				$this->bind(':lrn',$data['lrn']);
				$this->bind(':subjectcode',$data['subjectcode']);
				$this->bind(':grade',$data['grade']);
				$this->bind(':section',$data['section']);
				$this->bind(':term',$data['term']);
				$this->bind(':sy',$data['sy']);

				$this->execute();


				if($this->lastInsertId){
					Messages::setMsg('Subjects Successfully Added','successMsg');
				}

			}
		}
		$this->query('SELECT su.description,su.subjectcode,
					sc.schedtempid,
					sc.grade,sc.section,sc.trn,sc.m,
					sc.t,sc.w,sc.th,sc.f,sc.starttime,
					sc.endtime,sc.term,t.tblteacherid,
					t.firstname,t.middlename,t.lastname 
					FROM tblsubject su 
					RIGHT JOIN tblscheduletemplateshs sc 
					ON sc.subjectcode = su.subjectcode 
					LEFT JOIN tblteachers t 
					ON sc.trn = t.trn
					WHERE sc.grade = :grade
					AND sc.section = :section
	
					ORDER BY sc.starttime DESC');

		$this->bind(':grade',$grade);
		$this->bind(':section',$section);


		$rows = $this->resultSet();


		return $rows;
	}

	public function editschedshs(){


		$booldays = array('0','0','0','0','0');
		$id = $_GET['id'];
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


		if(isset($post['add'])){
			if(isset($post['day'])){

				foreach ($post['day'] as $selectedday) {
				
						$booldays[$selectedday] = '1';
						
					}


				$this->query('SELECT grade,section FROM tblSchedshs WHERE lrn = :id AND sy = :sy AND term = :term');
				$this->bind(':id',$id);
				$this->bind(':term',TERM);
				$this->bind(':sy',SCHOOL_YEAR);
				$rs = $this->resultSet();

	
				$this->query('
					INSERT INTO tblschedshs
					(subjectcode,lrn,trn,grade,section,mon,tue,wed,thu,fri,starttime,endtime,term)
					VALUES 
					(:subjectcode,:lrn,:trn,:grade,:section,:m,:t,:w,:th,:f,:starttime,:endtime,:term)');

				$this->bind(':subjectcode',$post['subjectcode']);
				$this->bind(':lrn',$id);
				$this->bind(':trn',$post['trn']);
				$this->bind(':grade',$rs[0]['grade']);
				$this->bind(':section',$rs[0]['section']);
				$this->bind(':starttime',$post['starttime']);
				$this->bind(':endtime',$post['endtime']);
				$this->bind(':term',TERM);
				$this->bind(':m',$booldays[0]);
				$this->bind(':t',$booldays[1]);
				$this->bind(':w',$booldays[2]);
				$this->bind(':th',$booldays[3]);
				$this->bind(':f',$booldays[4]);

				$this->execute();

				if($this->lastInsertId()){
					header('Location:'.ROOT_URL.'schedules/editschedshs/'.$id);
					Messages::setCustomMsg('Schedule Successfully Added','successMsg');
					exit;

				} else{
					Messages::setMsg('There is a problem in adding a schedule','error');
				}

			//may ilalagay pa ako dito dapat

			} else {
				Messages::setMsg('Please select day','error');
			}
		}
		if(isset($post['delete'])){
	
			if(isset($post['selected'])){

				foreach ($post['selected'] as $selectdelete) {
					$this->query('DELETE FROM tblgradesshs
						WHERE schedid = :id');
					$this->bind(':id',$selectdelete);
					$this->execute();

					$this->query('DELETE FROM tblSchedshs
						WHERE schedid = :id');
					$this->bind(':id',$selectdelete);
					$this->execute();


					echo Messages::setMsg('Schedule deleted','successMsg');


				}


			} else {
				echo Messages::setMsg('Please select at least one to delete','error');
			}
		}


		$this->query('SELECT su.description,su.subjectcode,
					sc.schedid,
					sc.grade,sc.section,sc.trn,sc.mon,
					sc.tue,sc.wed,sc.thu,sc.fri,sc.starttime,
					sc.endtime,sc.term,t.tblteacherid,
					t.firstname,t.middlename,t.lastname 
					FROM tblsubject su 
					RIGHT JOIN tblschedshs sc 
					ON sc.subjectcode = su.subjectcode 
					LEFT JOIN tblteachers t 
					ON sc.trn = t.trn
					WHERE sc.lrn = :lrn
					ORDER BY sc.starttime DESC;
					');

		$this->bind(':lrn',$id); 
		$rows = $this->resultSet();


		return $rows;
	}
	public function teacherSched(){
		$trn = $_GET['id'];

		$this->query('SELECT * FROM tblscheduletemplateshs s
			LEFT JOIN tblteachers t ON s.trn = t.trn
			LEFT JOIN tblsubject su ON su.subjectcode = s.subjectcode
			WHERE s.trn = :trn
			AND s.term = :term');
		$this->bind(':term',TERM);
		$this->bind(':trn',$trn);
		$result = $this->resultSet();


		return $result;
	}
}
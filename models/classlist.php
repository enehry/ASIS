<?php
class ClasslistModel extends Model{
	public function Index(){


		$this->query('SELECT s.lrn,s.tblstudentid,s.firstname,s.middlename,s.lastname,e.grade,e.section FROM tblstudents s LEFT JOIN tblenrollmentshs e ON s.lrn = e.lrn ORDER BY e.grade DESC, s.lastname');
		$rows = $this->resultSet();


		return $rows;
	}

	public function searhclasslits(){
		return;
	}


	public function myclasslist(){
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$searchkey = '%%';
		if(isset($post['btnsearch'])){

// THIS IS classlist CLASSS SHIIIIIIIIIIIIITTTTTTTTTTTTTTTTTTTTTTTTTTTT
			global $searchkey;

			$searchkey = '%'.$post['searchitem'].'%';

		}
		if(isset($post['deletesched'])){

			$this->query('SELECT DISTINCT grade,section FROM tblenrollmentshs
				WHERE trn = :trn
				AND sy = :sy
				AND term = :term');
			$this->bind(':trn',$_SESSION['user_data']['trn']);
			$this->bind(':sy',SCHOOL_YEAR);
			$this->bind(':term',TERM);
			$res = $this->single();

			$this->query('DELETE FROM tblgradesshs 
				WHERE section = :section
				AND grade = :grade
				AND term = :term');
			$this->bind(':section',$res['section']);
			$this->bind(':grade',$res['grade']);
			$this->bind(':term',TERM);
			$this->execute();


			$this->query('DELETE FROM tblschedshs
			WHERE section = :section
			AND grade = :grade
			AND sy = :sy
			AND term = :term');
			$this->bind('sy',SCHOOL_YEAR);
			$this->bind('grade',$res['grade']);
			$this->bind('section',$res['section']);
			$this->bind('term',TERM);
			$this->execute();

			Messages::setCustomMsg("Student shedule deleted","successMsg");
		}
		if(isset($post['remove'])){
			if(isset($post['selected'])){
				$count = 0;
				foreach($post['selected'] as $selectedid){
					$this->query('DELETE FROM tblenrollmentshs
						WHERE enrollmentid = :enrollmentid');
					$this->bind('enrollmentid',$selectedid);
					$this->execute();
					$count++;
					Messages::setMsg($count.' Students remove from the class list','succesMsg');
				}
			}	
		} 
		
				
		$this->query('SELECT e.sy,e.grade,e.section,e.enrollmentid,s.firstname,s.middlename,s.lastname,s.lrn,s.sex,s.tblstudentid FROM tblenrollmentshs e LEFT JOIN tblstudents s
			ON e.lrn = s.lrn WHERE e.trn = :trn
			AND e.sy = :sy  
			AND( s.lastname LIKE :search
			OR s.lrn LIKE :search
			OR s.firstname LIKE :search
			OR s.middlename LIKE :search )
			ORDER BY s.lastname ASC ');
		if(empty($_SESSION['user_data']['trn'])){
			$trn='NONE';
		} else {
			$trn = $_SESSION['user_data']['trn'];
		}
		$this->bind(':trn',$trn);
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':search',$searchkey);

		$rows = $this->resultSet();

		if(isset($post['save'])){
			if(isset($_SESSION['is_logged_in'])){
				$trn = $_SESSION['user_data']['trn'];

				$this->query('SELECT e.grade,e.section,e.lrn,e.trn,e.sy,e.term,e.enrollmentid,s.firstname,s.middlename,s.lastname,s.sex,s.birthdate,s.mothertongue,s.ethnicgroup,s.religion,s.homeaddress,s.barangay,s.municipality,s.province,s.fathername,s.foccupation,s.fcontact,s.mothername,s.moccupation,s.mcontact,s.guardianname,s.gcontact,s.grelationship,s.contactnumber FROM tblenrollmentshs e LEFT JOIN tblstudents s ON e.lrn = s.lrn WHERE e.trn = :trn AND e.term = :term AND e.sy = :sy ORDER BY s.lastname ASC');
				$this->bind(':trn',$trn);
				$this->bind(':term',TERM);
				$this->bind(':sy',SCHOOL_YEAR);
				$studentdata = $this->resultSet();


				sleep(1);
				$inputFileName = '../Anahi/excel/SF1.xlsx';

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);

				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$objPHPExcel->setActiveSheetIndex(0);

				// Add column headers
				$objPHPExcel->getActiveSheet()
							->setCellValue('P6',$studentdata[0]['sy'])
							->setCellValue('U6',$studentdata[0]['grade'])
							->setCellValue('X6',$studentdata[0]['section']);

				$count_boys = 11;
				$count_girls = 40;

				foreach ($studentdata as $data) {
						if($data['sex'] == 'Male'){
						$bday = explode("-",$data['birthdate']);

						$objPHPExcel->getActiveSheet()
							->setCellValue('B'.$count_boys, $data['lrn'])
							->setCellValue('C'.$count_boys, $data['lastname'].', '.
								$data['firstname'].' '.$data['middlename'])
							->setCellValue('G'.$count_boys, 'M')
							->setCellValue('H'.$count_boys, $bday[1].'/'.$bday[2].'/'.$bday[0])
							->setCellValue('L'.$count_boys, $data['mothertongue'])
							->setCellValue('M'.$count_boys, $data['ethnicgroup'])
							->setCellValue('N'.$count_boys, $data['religion'])
							->setCellValue('O'.$count_boys, $data['homeaddress'])
							->setCellValue('P'.$count_boys, $data['barangay'])
							->setCellValue('Q'.$count_boys, $data['municipality'])
							->setCellValue('R'.$count_boys, $data['province'])
							->setCellValue('T'.$count_boys, $data['fathername'])
							->setCellValue('V'.$count_boys, $data['mothername'])
							->setCellValue('X'.$count_boys, $data['guardianname'])
							->setCellValue('Y'.$count_boys, $data['grelationship'])
							->setCellValue('Z'.$count_boys, $data['gcontact']);
							
						$count_boys++;
					}
						if($data['sex'] == 'Female'){
						$bday = explode("-",$data['birthdate']);

						$objPHPExcel->getActiveSheet()
							->setCellValue('B'.$count_girls, $data['lrn'])
							->setCellValue('C'.$count_girls, $data['lastname'].', '.
								$data['firstname'].' '.$data['middlename'])
							->setCellValue('G'.$count_girls, 'F')
							->setCellValue('H'.$count_girls, $bday[1].'/'.$bday[2].'/'.$bday[0])
							->setCellValue('L'.$count_girls, $data['mothertongue'])
							->setCellValue('M'.$count_girls, $data['ethnicgroup'])
							->setCellValue('N'.$count_girls, $data['religion'])
							->setCellValue('O'.$count_girls, $data['homeaddress'])
							->setCellValue('P'.$count_girls, $data['barangay'])
							->setCellValue('Q'.$count_girls, $data['municipality'])
							->setCellValue('R'.$count_girls, $data['province'])
							->setCellValue('T'.$count_girls, $data['fathername'])
							->setCellValue('V'.$count_girls, $data['mothername'])
							->setCellValue('X'.$count_girls, $data['guardianname'])
							->setCellValue('Y'.$count_girls, $data['grelationship'])
							->setCellValue('Z'.$count_girls, $data['gcontact']);
							
						$count_girls++;


						}
					
				}

				$total_boys = $count_boys - 11;
				$total_girls = $count_girls - 40;
				$objPHPExcel->getActiveSheet()
							->setCellValue('T63',$total_boys)
							->setCellValue('T64',$total_girls)
							->setCellValue('T65',$total_boys+$total_girls)
							->setCellValue('W63',$_SESSION['user_data']['firstname'].' '.$_SESSION['user_data']['middlename'].' '.$_SESSION['user_data']['lastname']);

				

				sleep(1);
				// Redirect output to a client’s web browser (Excel2007)
		
				header('Content-Type: application/openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="' . $inputFileName . '"');
				header('Cache-Control: max-age=0');
		

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
				exit;
			
			}
			else {
			Messages::setMsg('Please Log in first','error');


		} 
		}


		
		$this->query('SELECT COUNT(*) boys FROM tblenrollmentshs e LEFT JOIN tblstudents s
			ON e.lrn = s.lrn WHERE e.trn = :trn
			AND e.sy = :sy
			AND s.sex  = "Male"');
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':trn',$trn);
		$GLOBALS['count_boys'] = $this->single();

		$this->query('SELECT COUNT(*) girls FROM tblenrollmentshs e LEFT JOIN tblstudents s
			ON e.lrn = s.lrn WHERE e.trn = :trn
			AND e.sy = :sy
			AND s.sex  = "Female"');
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':trn',$trn);
		$GLOBALS['count_girls'] = $this->single();



		

		return $rows;
	}

	public function seniorhigh(){

		if(!isset($_GET['page'])){
			$GLOBALS['page'] = 1;
		} else {
			$GLOBALS['page'] = $_GET['page'];
		}

		$GLOBALS['per_page'] = 10;

		$this->query('SELECT COUNT(DISTINCT grade,section) as count FROM tbladvisoryclass WHERE sy = :sy AND term = :term');
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':term',TERM);
		$res = $this->single();

		$GLOBALS['total_rows'] = $res['count'];


		$this->query('SELECT * FROM tbladvisoryclass a
		LEFT JOIN tblteachers t
		ON a.trn = t.trn
		WHERE sy = :sy AND term = :term');
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':term',TERM);
		$result = $this->resultSet();

		
		return $result;
	}
	public function adminclasslist(){

		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$searchkey = '%%';
		if(isset($post['btnsearch'])){
			global $searchkey;
			$searchkey = '%'.$post['searchitem'].'%';

		}

		$split = explode('*', $_GET['key']);
		$section = $split[0].'-'.$split[1];
		$this->query('SELECT e.sy,e.grade,e.section,e.enrollmentid,s.firstname,s.middlename,s.lastname,s.lrn,s.sex,s.tblstudentid FROM tblenrollmentshs e LEFT JOIN tblstudents s
			ON e.lrn = s.lrn WHERE 
			section = :section
			AND e.grade = :grade
			AND e.term = :term
			AND e.sy = :sy  
			AND( s.lastname LIKE :search
			OR s.lrn LIKE :search
			OR s.firstname LIKE :search
			OR s.middlename LIKE :search )
			ORDER BY s.lastname ASC ');
		$this->bind(':section',$section);
		$this->bind(':grade',$_GET['id']);
		$this->bind(':term',TERM);
		$this->bind(':sy',SCHOOL_YEAR);
		$this->bind(':search',$searchkey);

		$result = $this->resultSet();

		if(empty($result)){
			Messages::setCustomMsg('<i class="fa fa-times fa-lg mr-2 "> </i>There\'s nothing here','successMsg');
		}


		$this->query('SELECT COUNT(*) boys FROM tblenrollmentshs e LEFT JOIN tblstudents s
			ON e.lrn = s.lrn 
			WHERE section = :section
			AND e.grade = :grade
			AND e.term = :term
			AND e.sy = :sy
			AND s.sex  = "Male"');
		$this->bind(':section',$section);
		$this->bind(':grade',$_GET['id']);
		$this->bind(':term',TERM);
		$this->bind(':sy',SCHOOL_YEAR);
		$GLOBALS['count_boys'] = $this->single();

		$this->query('SELECT COUNT(*) girls FROM tblenrollmentshs e LEFT JOIN tblstudents s
			ON e.lrn = s.lrn 
			WHERE section = :section
			AND e.grade = :grade
			AND e.term = :term
			AND e.sy = :sy
			AND s.sex  = "Female"');
		$this->bind(':section',$section);
		$this->bind(':grade',$_GET['id']);
		$this->bind(':term',TERM);
		$this->bind(':sy',SCHOOL_YEAR);
		$GLOBALS['count_girls'] = $this->single();


		if(isset($post['save'])){
			$form = new Forms();
			$form->createSF1($_GET['id'],$section,SCHOOL_YEAR,TERM);
		}


		return $result;
	}


	
}
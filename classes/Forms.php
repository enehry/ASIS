<?php 

	class Forms extends Model{


		public function createSF10($lrn,$schoolYear){

				if(isset($lrn) && isset($schoolYear)){

				$this->query('SELECT * FROM tblStudents 
					WHERE lrn = :lrn');
				$this->bind(':lrn',$lrn);
				$stData = $this->single();

				$this->query('SELECT * FROM tblgradesshs g LEFT JOIN
					tblsubject s ON g.subjectcode = s.subjectcode
					WHERE g.lrn = :lrn AND g.sy = :sy ORDER BY s.type ASC,s.description');
				$this->bind(':lrn',$lrn);
				$this->bind(':sy',$schoolYear);
				$stGrades = $this->resultSet();

				$inputFileName = '../Anahi/excel/SF10.xlsx';

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);

				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$objPHPExcel->setActiveSheetIndex(0);

				// Add column headers
				$objPHPExcel->getActiveSheet()
							->setCellValue('F8',$stData['lastname'])
							->setCellValue('Y8',$stData['firstname'])
							->setCellValue('AZ8',$stData['middlename'])
							->setCellValue('C9',$stData['lrn'])
							->setCellValue('AA9',$stData['birthdate'])
							->setCellValue('AN9',$stData['sex']);

				// Redirect output to a client’s web browser (Excel2007)
				
				if(!empty($stGrades)){

					$countFirst = 31;
					$countSecond = 74;
					$firstSem = false;
					$SecondSem = false;


					foreach($stGrades as $grades) {
						if($grades['term'] == 'First'){
							$firstSem = true;
							$objPHPExcel->getActiveSheet()
							->setCellValue('A'.$countFirst,$grades['type'])
							->setCellValue('I'.$countFirst,$grades['description'])
							->setCellValue('AT'.$countFirst,$grades['mid'])
							->setCellValue('AY'.$countFirst,$grades['final']);
							$countFirst++;
						} else if ($grades['term'] == 'Second'){
							$secondSem = true;
							$objPHPExcel->getActiveSheet()
							->setCellValue('A'.$countSecond,$grades['type'])
							->setCellValue('I'.$countSecond,$grades['description'])
							->setCellValue('AT'.$countSecond,$grades['mid'])
							->setCellValue('AY'.$countSecond,$grades['final']);
							$countSecond++;
						}
					}

					if($firstSem){
						$objPHPExcel->getActiveSheet()
							->setCellValue('AS23',$stGrades[0]['grade'])
							->setCellValue('BA23',$schoolYear)
							->setCellValue('AS25',$stGrades[0]['section']);
					}
					if($secondSem){
						$objPHPExcel->getActiveSheet()
							->setCellValue('AS66',$stGrades[0]['grade'])
							->setCellValue('BA66',$schoolYear)
							->setCellValue('AS68',$stGrades[0]['section']);							
					}

				}

		

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				ob_end_clean();
				header('Content-Type: application/openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="' . $inputFileName . '"');
				header('Cache-Control: max-age=0');
				$objWriter->save('php://output');
				exit;
				} else {
					echo "ERROR";
				}


		}

		public function createSF1($grade,$section,$schoolYear,$term){
			if(isset($grade) && isset($section) && isset($schoolYear) && isset($term)){

				$this->query('SELECT e.grade,e.section,e.lrn,e.trn,e.sy,e.term,e.enrollmentid,s.firstname,s.middlename,s.lastname,s.sex,s.birthdate,s.mothertongue,s.ethnicgroup,s.religion,s.homeaddress,s.barangay,s.municipality,s.province,s.fathername,s.foccupation,s.fcontact,s.mothername,s.moccupation,s.mcontact,s.guardianname,s.gcontact,s.grelationship,s.contactnumber FROM tblenrollmentshs e LEFT JOIN tblstudents s ON e.lrn = s.lrn WHERE e.grade = :grade AND e.section = :section AND e.term = :term AND e.sy = :sy ORDER BY s.lastname ASC');
				$this->bind(':grade',$grade);
				$this->bind(':section',$section);
				$this->bind(':term',$term);
				$this->bind(':sy',$schoolYear);

				$studentdata = $this->resultSet();

				
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
			}
		
	}
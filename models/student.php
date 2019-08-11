<?php

// THIS CLASS IS ALWAYS PUBLIC METHOD
	class StudentModel extends Model{



		public function index(){
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		$this->query('SELECT COUNT(*) as count FROM tblstudents');
		$res = $this->single();

	
		// set per page
		$GLOBALS['per_page'] = 20;
		//get total records
		$GLOBALS['total_rows'] = $res['count'];

		// set 1 if the page url is empty
		if(!empty($_GET['id'])){
			$GLOBALS['page'] = $_GET['id'];
		} else {
			$GLOBALS['page'] = 1;
		}
		//get offset which is the starting page 
		$GLOBALS['offset'] = ($GLOBALS['page']-1)*$GLOBALS['per_page'];
	
	 	// check if the button delete is click
		if(isset($post['delete'])){
			
			// check of there is a value
			if(isset($post['id'])){
				// delete query

				$count = 0;
				foreach ($post['id'] as $selected) {
					$this->query('DELETE FROM tblstudents WHERE tblstudentid = :selected');

					$this->bind(':selected',$selected);
					$this->execute();
					if($this->rowCount()){
					$count++;

					Messages::setMsg($count. ' Student deleted','successMsg');
				} else {
					Messages::setMsg('Cannot delete student record','error');
				}

				}



			} else {
				Messages::setMsg('Please select at least one','error');
			}
		}
		$this->query('SELECT * FROM tblstudents ORDER BY lastname ASC
			LIMIT :offset,:per_page');
		$this->bind(':offset',$GLOBALS['offset']);
		$this->bind(':per_page',$GLOBALS['per_page']);
		$rows = $this->resultSet();



		return $rows;

		}

		public function addstudent(){
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			// VALIDATION 
			$GLOBALS['lrn'] = false;
			$GLOBALS['fname'] = false;
			$GLOBALS['lname'] = false;
			$GLOBALS['bday'] = false;
			$GLOBALS['st'] = false;
			$GLOBALS['brgy'] = false;
			$GLOBALS['mun'] = false;
			$GLOBALS['prov'] = false;
			$GLOBALS['religion'] = false;
			$impFields = true;
			$filenameNew = '';

			if($post['add']){
				if($post['lrn'] == '' || intval($post['lrn']) < 12 || !is_numeric($post['lrn'])){
					$GLOBALS['lrn'] = true;
					$impFields = false;
				} 
				if ($post['firstname'] == '') {
					$GLOBALS['fname'] = true;
					$impFields = false;
 				}
 				if ($post['lastname'] == '') {
					$GLOBALS['lname'] = true;
					$impFields = false;
 				}
 				if ($post['birthdate'] == '') {
					$GLOBALS['bday'] = true;
					$impFields = false;
 				}
 				if ($post['homeaddress'] == '') {
					$GLOBALS['st'] = true;
					$impFields = false;
 				}
 				if ($post['barangay'] == '') {
					$GLOBALS['brgy'] = true;
					$impFields = false;
 				}
 				if ($post['municipality'] == '') {
					$GLOBALS['mun'] = true;
					$impFields = false;
 				}
 				if ($post['province'] == '') {
					$GLOBALS['prov'] = true;
					$impFields = false;
 				}
 				if ($post['religion'] == '') {
					$GLOBALS['religion'] = true;
					$impFields = false;
 				}

				
				/*echo $post['sex'].'<br>';
				echo $post['lrn'].'<br>';
				echo $post['firstname'].'<br>';
				echo $post['middlename'].'<br>';
				echo $post['lastname'].'<br>';
				echo $post['birthdate'].'<br>';
				echo $post['mothertongue'].'<br>';
				echo $post['ethnicgroup'].'<br>';
				echo $post['homeaddress'].'<br>';
				echo $post['barangay'].'<br>';
				echo $post['municipality'].'<br>';
				echo $post['province'].'<br>';
				echo $post['religion'].'<br>';
				echo $post['contactnumber'].'<br>';
				echo $post['religion'].'<br>';
				echo $post['fname'].'<br>';
				echo $post['foccupation'].'<br>';
				echo $post['fcontact'].'<br>';
				echo $post['mname'].'<br>';
				echo $post['moccupation'].'<br>';
				echo $post['mcontact'].'<br>';
				echo $post['gname'].'<br>';
				echo $post['grelationship'].'<br>';
				echo $post['gcontact'].'<br>';*/


			

			// ETO IINSERT NA YUNG MGA DATA GALING SA FIELDS KAPG HINDI EMPTY YUNG INPUT
			if($impFields){
				// copy image
				$file = $_FILES['image-upload'];

				$filename = $_FILES['image-upload']['name'];
				$fileTempname = $_FILES['image-upload']['tmp_name'];
				$filesize = $_FILES['image-upload']['size'];
				$fileerror = $_FILES['image-upload']['error'];
				$filetype = $_FILES['image-upload']['type'];

				$fileExt = explode('.',$filename);
				$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg','jpeg','png');
			
				if(file_exists($_FILES['image-upload']['tmp_name'])){
				if(in_array($fileActualExt,$allowed)){
					if($fileerror == 0){
						if($filesize < 1000000){

							global $fileameNew;
							$filenameNew = uniqid('',true).'.'.$fileActualExt;
						
							$fileDestination = FILE_PATH.'assets/images/students/'.$filenameNew;

							move_uploaded_file($fileTempname,$fileDestination);

							Messages::setCustomMsg('Image Successfully uploaded','successMsg');
							





						} else {
							Messages::setCustomMsg('File too large','error');
						}
					} else {
						Messages::setCustomMsg('There was a problem in uploading your image','error');
					}
				} else {
					Messages::setCustomMsg('Invalid File Type','error');				}
			} else {
				Messages::setCustomMsg('No image uploaded','successMsg');
			}
 				//Insert data of Student in MySQL
				$this->query('INSERT into tblstudents(lrn,firstname,middlename,lastname,sex,birthdate,mothertongue,ethnicgroup,religion,homeaddress,barangay,municipality,province,fathername,foccupation,fcontact,mothername,moccupation,mcontact,guardianname,gcontact,grelationship,contactnumber,profileimagename)VALUES(:lrn,:firstname,:middlename,:lastname,:sex,:birthdate,:mothertongue,:ethnicgroup,:religion,:homeaddress,:barangay,:municipality,:province,:fathername,:foccupation,:fcontact,:mothername,:moccupation,:mcontact,:guardianname,:gcontact,:grelationship,:contactnumber,:profileimagename)');


							// Bind the values
							$this->bind(':lrn',$post['lrn']);
							$this->bind(':firstname',$post['firstname']);
							$this->bind(':middlename',$post['middlename']);
							$this->bind(':lastname',$post['lastname']);
							$this->bind(':sex',$post['sex']);
							$this->bind(':birthdate',$post['birthdate']);
							$this->bind(':mothertongue',$post['mothertongue']);
							$this->bind(':ethnicgroup',$post['ethnicgroup']);
							$this->bind(':religion',$post['religion']);
							$this->bind(':homeaddress',$post['homeaddress']);
							$this->bind(':barangay',$post['barangay']);
							$this->bind(':municipality',$post['municipality']);
							$this->bind(':province',$post['province']);
							$this->bind(':fathername',$post['fname']);
							$this->bind(':foccupation',$post['foccupation']);
							$this->bind(':fcontact',$post['fcontact']);
							$this->bind(':mothername',$post['mname']);
							$this->bind(':moccupation',$post['moccupation']);
							$this->bind(':mcontact',$post['mcontact']);
							$this->bind(':guardianname',$post['gname']);
							$this->bind(':gcontact',$post['gcontact']);
							$this->bind(':grelationship',$post['grelationship']);
							$this->bind(':contactnumber',$post['contactnumber']);
							$this->bind(':profileimagename',$filenameNew);

							$this->execute();

							if($this->lastInsertId()){	
								Messages::setMsg('Student Successfully added', 'successMsg');
						

							} else {
								Messages::setMsg('Error student already added', 'error');

							}
 			} else {
 				Messages::setMsgX('Please fill up all important fields','ERROR ');
 			}

				
				


			}
			return;
		}

		public function profile(){
			
			$profid = $_GET['id'];


			$this->query('SELECT * FROM tblstudents WHERE tblstudentid = :id');
			$this->bind(':id',$profid);
			$row = $this->single();



			return $row;
		}

		public function editstudent(){

			$profid = $_GET['id'];
			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);



	
			if($post['save']){
				/*echo $profid;
				echo $post['sex'].'<br>';
				echo $post['lrn'].'<br>';
				echo $post['firstname'].'<br>';
				echo $post['middlename'].'<br>';
				echo $post['lastname'].'<br>';
				echo $post['birthdate'].'<br>';
				echo $post['mothertongue'].'<br>';
				echo $post['ethnicgroup'].'<br>';
				echo $post['homeaddress'].'<br>';
				echo $post['barangay'].'<br>';
				echo $post['municipality'].'<br>';
				echo $post['province'].'<br>';
				echo $post['religion'].'<br>';
				echo $post['contactnumber'].'<br>';
				echo $post['religion'].'<br>';
				echo $post['fathername'].'<br>';
				echo $post['foccupation'].'<br>';
				echo $post['fcontact'].'<br>';
				echo $post['mothername'].'<br>';
				echo $post['moccupation'].'<br>';
				echo $post['mcontact'].'<br>';
				echo $post['guardianname'].'<br>';
				echo $post['grelationship'].'<br>';
				echo $post['gcontact'].'<br>';*/
				$file = $_FILES['image-upload'];

				$filename = $_FILES['image-upload']['name'];
				$fileTempname = $_FILES['image-upload']['tmp_name'];
				$filesize = $_FILES['image-upload']['size'];
				$fileerror = $_FILES['image-upload']['error'];
				$filetype = $_FILES['image-upload']['type'];

				$fileExt = explode('.',$filename);
				$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg','jpeg','png');
			
				if(file_exists($_FILES['image-upload']['tmp_name'])){
				if(in_array($fileActualExt,$allowed)){
					if($fileerror == 0){
						if($filesize < 1000000){

							global $fileameNew;
							$filenameNew = uniqid('',true).'.'.$fileActualExt;
						
							$fileDestination = FILE_PATH.'assets/images/students/'.$filenameNew;

							move_uploaded_file($fileTempname,$fileDestination);

							Messages::setMsg('Image Successfully uploaded','successMsg');
							

							$this->query('UPDATE tblstudents
								SET profileimagename = :profileimagename
								WHERE tblstudentid = :id');
							$this->bind(':profileimagename',$filenameNew);
							$this->bind(':id',$profid);
							$this->execute();
							if($this->rowCount() == 1){
								Messages::setMsg('Image successfully change','successMsg');
							} else {
								//Messages::setMsg('Image not change','error');
							}




						} else {
							Messages::setMsg('File too large','error');
						}
					} else {
						Messages::setMsg('There was a problem in uploading your image','error');
					}
				} else {
					Messages::setMsg('Invalid file type','error');
				}
			} else {
				//Messages::setMsg('No image uploaded','error');
			}



				$this->query('UPDATE tblstudents
					SET 
						firstname = :firstname,
						middlename = :middlename,
						lastname = :lastname,
						sex = :sex,
						birthdate = :birthdate,
						mothertongue = :mothertongue,
						ethnicgroup = :ethnicgroup,
						religion = :religion,
						homeaddress = :homeaddress,
						barangay = :barangay,
						municipality = :municipality,
						province = :province,
						fathername = :fathername,
						foccupation = :foccupation,
						fcontact = :fcontact,
						mothername = :mothername,
						moccupation = :moccupation,
						mcontact = :mcontact,
						guardianname = :guardianname,
						grelationship = :grelationship,
						gcontact = :gcontact,
						contactnumber = :contactnumber
						WHERE tblstudentid = :id');


				$this->bind(':firstname',$post['firstname']);
				$this->bind(':middlename',$post['middlename']);
				$this->bind(':lastname',$post['lastname']);
				$this->bind(':sex',$post['sex']);
				$this->bind(':birthdate',$post['birthdate']);
				$this->bind(':mothertongue',$post['mothertongue']);
				$this->bind(':ethnicgroup',$post['ethnicgroup']);
				$this->bind(':religion',$post['religion']);
				$this->bind(':homeaddress',$post['homeaddress']);
				$this->bind(':barangay',$post['barangay']);
				$this->bind(':municipality',$post['municipality']);
				$this->bind(':province',$post['province']);
				$this->bind(':fathername',$post['fathername']);
				$this->bind(':foccupation',$post['foccupation']);
				$this->bind(':fcontact',$post['fcontact']);
				$this->bind(':mothername',$post['mothername']);
				$this->bind(':moccupation',$post['moccupation']);
				$this->bind(':mcontact',$post['mcontact']);
				$this->bind(':guardianname',$post['guardianname']);
				$this->bind(':gcontact',$post['gcontact']);
				$this->bind(':grelationship',$post['grelationship']);
				$this->bind(':contactnumber',$post['contactnumber']);
				$this->bind(':id',$profid);

				$this->execute();
				if($this->rowCount() == 1){
				Messages::setMsg('Profile information successfully updated','successMsg');
					header('Location:'.ROOT_URL.'/students/profile/'.$profid);
				 }
				else { 
				//Messages::setMsg('Profile information not updated','error');
				}

			}

			$this->query('SELECT * FROM tblstudents WHERE tblstudentid = :id');
			$this->bind(':id',$profid);
			$row = $this->single();
			
			return $row;
		}

		public function searchstudent(){
			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

			if(isset($post['search'])){
				if(empty($post['searchitem'])){
					header('Location:'.ROOT_URL.'students');	
				} else {
					header('Location:'.ROOT_URL.'students/searchstudent/'.$post['searchitem'].'/1');
				}
			}


			// set 1 if the page url is empty
			if(!empty($_GET['key'])){
						$GLOBALS['page'] = $_GET['key'];
					} else {
						$GLOBALS['page'] = 1;
					}
			
			$GLOBALS['searchkey'] = $_GET['id'];

			$searchpattern = '%'.$_GET['id'].'%';


			$this->query('SELECT COUNT(tblstudentid) as count FROM tblstudents WHERE lrn LIKE :searchitems
						OR firstname LIKE :searchitems OR middlename LIKE
						:searchitems OR lastname LIKE :searchitems');
			$this->bind(':searchitems',$searchpattern);
			$res = $this->single();


			// set per page
			$GLOBALS['per_page'] = 10;
			//get total records
			$GLOBALS['total_rows'] = $res['count'];
			//get offset which is the starting page 
			$GLOBALS['offset'] = ($GLOBALS['page']-1)*$GLOBALS['per_page'];

			$this->query('SELECT * FROM tblstudents WHERE lrn LIKE :searchitems
						OR firstname LIKE :searchitems OR middlename LIKE
						:searchitems OR lastname LIKE :searchitems
						LIMIT :offset,:per_page');
			$this->bind(':searchitems',$searchpattern);
			$this->bind(':offset',$GLOBALS['offset']);
			$this->bind(':per_page',$GLOBALS['per_page']);

			$rows = $this->resultSet();



			return $rows;


		}
	}
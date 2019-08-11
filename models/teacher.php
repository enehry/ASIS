<?php
	class TeacherModel extends Model{
		public function index(){
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		
		$this->query('SELECT COUNT(*) as count FROM tblteachers');
		$res = $this->single();

	
		// set per page
		$GLOBALS['per_page'] = 10;
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


		if($post['delete']){

			// check of there is a value
			if(isset($post['id'])){
				// delete query
				$count = 0;
				foreach ($post['id'] as $selected) {
					$this->query('DELETE FROM tblteachers WHERE tblteacherid = :selected');

					$this->bind(':selected',$selected);
					$this->execute();
					$count++;

					Messages::setMsg($count. ' Teacher deleted','error');
				}



			} else {
				Messages::setMsg('Please select at least one','error');
			}
		}


		



		$this->query('SELECT * FROM tblteachers LIMIT :offset,:per_page');
		$this->bind(':offset',$GLOBALS['offset']);
		$this->bind(':per_page',$GLOBALS['per_page']);
	
	
		$rows = $this->resultSet();

		return $rows;

		}
		public function addteacher(){
			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
			$filenameNew = '';


			$GLOBALS['trn'] = false;
			$GLOBALS['fname'] = false;
			$GLOBALS['lname'] = false;
			$GLOBALS['bday'] = false;
			$GLOBALS['st'] = false;
			$GLOBALS['brgy'] = false;
			$GLOBALS['mun'] = false;
			$GLOBALS['prov'] = false;
			$GLOBALS['pass'] = false;
			$impFields = true;


			if(isset($post['add'])){

				if($post['trn'] == ''){
					$GLOBALS['trn'] = true;
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

 				if($impFields){
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
							
								$fileDestination = FILE_PATH.'assets/images/teachers/'.$filenameNew;

								move_uploaded_file($fileTempname,$fileDestination);

								Messages::setCustomMsg('Image Successfully uploaded','successMsg');


							} else {
								Messages::setCustomMsg('File too large','error');
							}
						} else {
							Messages::setCustomMsg('There is a problem uploading your image','error');
						}
					} else {
						Messages::setCustomMsg('Image: Invalid file type','error');
					}
				} else {
					Messages::setCustomMsg('no image uploaded','error');
				}

				// check if password is match or not empty

				if(!empty($post['password']) && !empty($post['repassword'])){
					if ($post['password'] ==  $post['repassword']) {
						 $this->query('INSERT into tblteachers(trn,firstname,middlename,lastname,sex,birthdate,teacherposition,department,homeaddress,barangay,municipality,province,contactnumber,profileimagename,password,usertype)VALUES(:trn,:firstname,:middlename,:lastname,:sex,:birthdate,:teacherposition,:department,:homeaddress,:barangay,:municipality,:province,:contactnumber,:profileimagename,:password,:usertype)');


						 $this->bind(':trn',$post['trn']);
						 $this->bind(':firstname',$post['firstname']);
						 $this->bind(':middlename',$post['middlename']);
						 $this->bind(':lastname',$post['lastname']);
						 $this->bind(':sex',$post['sex']);
						 $this->bind(':birthdate',$post['birthdate']);
						 $this->bind(':teacherposition',$post['position']);
						 $this->bind(':department',$post['department']);
						 $this->bind(':homeaddress',$post['homeaddress']);
						 $this->bind(':barangay',$post['barangay']);
						 $this->bind(':municipality',$post['municipality']);
						 $this->bind(':province',$post['province']);
						 $this->bind(':contactnumber',$post['contactnumber']);
						 $this->bind(':profileimagename',$filenameNew);
						 $this->bind(':password',$post['password']);
						 $this->bind(':usertype',$post['usertype']);

						 $this->execute();

						 if($this->lastInsertId()){
						 	Messages::setMsg('Successfully added','succesMsg');
						 } else {
						 	Messages::setMsg('Trn already added','error');
						 }
					} else {
						Messages::setMsg('Password not match','error');
						$GLOBALS['pass'] = true;
					}
				} else {
					Messages::setMsg('Password or Retype Password is empty','error');
					$GLOBALS['pass'] = true;

				}

				// end of image upload
 				} else {
 					Messages::setMsgX('Please fill up all important fields','ERROR ');
 				}

				/*echo $post['trn'];
				echo $post['sex'];
				echo $post['firstname'];
				echo $post['middlename'];
				echo $post['lastname'];
				echo $post['birthdate'];
				echo $post['position'];
				echo $post['department'];
				echo $post['homeaddress'];
				echo $post['barangay'];
				echo $post['municipality'];
				echo $post['province'];
				echo $post['contactnumber'];*/
				


				

			}


			return;
		}

		public function teacherprofile(){
			$teacherprofid = $_GET['id'];


			$this->query('SELECT * FROM tblteachers WHERE tblteacherid = :id ');
			$this->bind(':id',$teacherprofid);
			$row = $this->single();



			return $row;
		}
		public function editteacher(){
			$teacherprofid = $_GET['id'];


			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
			if($post['save']){
				/*echo $profid;
				echo $post['sex'].'<br>';
				echo $post['lrn'].'<br>';
				echo $post['firstname'].'<br>';
				echo $post['middlename'].'<br>';
				echo $post['lastname'].'<br>';
				echo $post['birthdate'].'<br>';
				
				echo $post['homeaddress'].'<br>';
				echo $post['barangay'].'<br>';
				echo $post['municipality'].'<br>';
				echo $post['province'].'<br>';

				echo $post['contactnumber'].'<br>';
				*/

			
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
						
							$fileDestination = FILE_PATH.'assets/images/teachers/'.$filenameNew;

							move_uploaded_file($fileTempname,$fileDestination);

							Messages::setMsg('Image Successfully uploaded','successMsg');
							

							$this->query('UPDATE tblteachers
								SET profileimagename = :profileimagename
								WHERE tblteacherid = :id');
							$this->bind(':profileimagename',$filenameNew);
							$this->bind(':id',$teacherprofid);
							$this->execute();
							if($this->rowCount() > 0){
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

				$this->query('UPDATE tblteachers
					SET 
						firstname = :firstname,
						middlename = :middlename,
						lastname = :lastname,
						sex = :sex,
						birthdate = :birthdate,
						teacherposition = :position,
						department = :department,
						homeaddress = :homeaddress,
						barangay = :barangay,
						municipality = :municipality,
						province = :province,
						contactnumber = :contactnumber
						
						WHERE tblteacherid = :id');


			
				$this->bind(':firstname',$post['firstname']);
				$this->bind(':middlename',$post['middlename']);
				$this->bind(':lastname',$post['lastname']);
				$this->bind(':sex',$post['sex']);
				$this->bind(':birthdate',$post['birthdate']);
				$this->bind(':position',$post['position']);
				$this->bind(':department',$post['department']);
				$this->bind(':homeaddress',$post['homeaddress']);
				$this->bind(':barangay',$post['barangay']);
				$this->bind(':municipality',$post['municipality']);
				$this->bind(':province',$post['province']);
				$this->bind(':contactnumber',$post['contactnumber']);
				
				$this->bind(':id',$teacherprofid);

				$this->execute();
				if($this->rowCount() > 0){
				Messages::setMsg('Successfully updated','successMsg'); 
				header('Location:'.ROOT_URL.'teachers/teacherprofile/'.$teacherprofid);
			}
				else { 
					//Messages::setMsg('Successfully not updated','error');
			}

			}

			$this->query('SELECT * FROM tblteachers WHERE tblteacherid = :id');
			$this->bind(':id',$teacherprofid);
			$row = $this->single();
			
			return $row;
		}
		public function searchteacher(){
			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

			if(isset($post['search'])){
				if(empty($post['searchitem'])){
					header('Location:'.ROOT_URL.'teachers');	
				} else {
					header('Location:'.ROOT_URL.'teachers/searchteacher/'.$post['searchitem'].'/1');
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


			$this->query('SELECT COUNT(tblteacherid) as count FROM tblteachers WHERE trn LIKE :searchitems
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

			$this->query('SELECT * FROM tblteachers WHERE trn LIKE :searchitems
						OR firstname LIKE :searchitems OR middlename LIKE
						:searchitems OR lastname LIKE :searchitems
						LIMIT :offset,:per_page');
			$this->bind(':searchitems',$searchpattern);
			$this->bind(':offset',$GLOBALS['offset']);
			$this->bind(':per_page',$GLOBALS['per_page']);

			$rows = $this->resultSet();

			if(empty($rows)){
				Messages::setCustomMsg('No search result','successMsg');
			}

			
			/*if(isset($post['search'])){
				if(isset($post['searchitem'])){
					
					

					$searchpattern = '%'.$post['searchitem'].'%';

					$this->query('SELECT * FROM tblteachers WHERE trn LIKE :searchitems
						OR firstname LIKE :searchitems OR middlename LIKE
						:searchitems OR lastname LIKE :searchitems');
					$this->bind(':searchitems',$searchpattern);
					$res = $this->single();

				
					// set per page
					$GLOBALS['per_page'] = 1;
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


					$this->query('SELECT * FROM tblteachers WHERE trn LIKE :searchitems
						OR firstname LIKE :searchitems OR middlename LIKE
						:searchitems OR lastname LIKE :searchitems');
					$this->bind(':searchitems',$searchpattern);

					$rows = $this->resultSet();

				} else {
								
				}
			}*/

			return $rows;
		}
	}
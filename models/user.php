<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		

		if($post['submit']){

			$this->query('SELECT trn FROM users WHERE trn = :trn');
			$this->bind(':trn',$post['trn']);
			$res = $this->single();

		

			if($post['trn'] == '' || $post['password'] == '' || $post['retype'] == '' || $post['usertype'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			if(empty($res)){
			if($post['password'] == $post['retype']){

			$password = md5($post['password']);
			//Insert into MySQL
			$this->query('INSERT INTO users (trn, password, usertype) VALUES(:trn, :password, :usertype)');
			$this->bind(':trn', $post['trn']);
			$this->bind(':password', $password);
			$this->bind(':usertype', $post['usertype']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				Messages::setMsg('User Successfuly Registered','successMsg');
		
			} else {
				Messages::setMsg('Teacher\'s reference number not exist','successMsg');
			}
		} else {
				Messages::setMsg('Password not match','error');
		
		}
	} else{
		Messages::setMsg('User already registered','error');
	}

	}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		

		if($post['submit']){
			// Compare Login

			$this->query('SELECT password,trn,usertype,firstname,middlename,lastname,tblteacherid,profileimagename FROM tblteachers WHERE BINARY password = :password AND BINARY trn = :trn');
			$this->bind(':trn', $post['trn']);
			$this->bind(':password', $post['password']);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"trn"	=> $row['trn'],
					"usertype"	=> $row['usertype'],
					"firstname" => $row['firstname'],
					"middlename" => $row['middlename'],
					"lastname" => $row['lastname'],
					"tblteacherid" => $row['tblteacherid'],
					"profileimagename" => $row['profileimagename'],
				);
				header('Location: '.ROOT_URL);
			} else {
				Messages::setMsgX('Incorrect Login', 'ERROR');
			}
		}
	
		return;
	}

	public function user(){
		return;
	}
}

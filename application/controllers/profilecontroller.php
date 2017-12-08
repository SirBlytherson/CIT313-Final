<?php

class ProfileController extends Controller {
	
	public $userObject;
	
	public function update() {
		$uID = $_POST['uID'];
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$con = $_POST['conPwd'];
		$active = $_POST['active'];
		
		$this->userObject = new User();
		
		if($pwd === $con) {
			
			if($pwd == '') {
				$stock = $this->userObject->getUser($_SESSION['uID']);
				
				$pwd = $stock['password'];
			} else {
				$pwd = password_hash($pwd,PASSWORD_DEFAULT);
			}
			
			$data = array('first_name'=>$first,'last_name'=>$last,'email'=>$email,'password'=>$pwd,'active'=>$active,'uID'=>$uID);
		  
			$this->userObject->update($data);
			
			$this->set('response','User updated');
		} else {
			$this->set('response','Passwords did not match.');
		}
	}
}
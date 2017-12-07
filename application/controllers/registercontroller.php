<?php

class RegisterController extends Controller {
	
	public $user;
	
	public function addUser(){
			$this->user = new User();			
			$data = array('first_name'=>$_POST['first'],'last_name'=>$_POST['last'],'email'=>$_POST['email'], 'password'=>password_hash($_POST['pwd'],PASSWORD_DEFAULT), 'active'=>$_POST['active']);
			$result = $this->user->addUser($data);
			$this->set('message', $result);
		
	}
	
	
}

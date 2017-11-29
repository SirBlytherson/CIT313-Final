<?php

class RegisterController extends Controller {
	
	public $user;
	
	public function addUser(){
		
			$this->user = new User();			
			$data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'], 'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT));
			$result = $this->user->addUser($data);
			$this->set('message', $result);
		
	}
	
	
}

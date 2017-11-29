<?php

class LoginController extends Controller{
	
	public $user;
	
	public function do_login() {
		
		$this->user = new User();			

		$data = array('email'=>$_POST['email'],'password'=>$_POST['password']);

		$message = "Login Failed - Username/Email or Password Incorrect";

		if($this->user->checkUser($data)) {
			$message = "Login Successful";
			$_SESSION['uID'] = $this->user->getUserFromEmail($_POST['email']);
		}

		$this->set('message', $message);
		
		if(strlen($_SESSION['redirect']) > 0) {
			$view = $_SESSION['redirect'];
			unset($_SESSION['redirect']);
			header('Location: '.BASE_URL.$view.'/');
		} else {
			header('Location: '.BASE_URL);	
		}
	}
	
	public function logout() {
		
		unset($_SESSION['uID']);
		
		$this->set('message', 'Successfully Logged Out!');
		
		$_SESSION['message'] = 'Successfully Logged Out!';
		
		if(strlen($_SESSION['redirect']) > 0) {
			$view = $_SESSION['redirect'];
			unset($_SESSION['redirect']);
			header('Location: '.BASE_URL.$view.'/');
		} else {
			header('Location: '.BASE_URL);	
		}
	}
	
	
}

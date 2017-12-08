<?php

class LoginController extends Controller{
	
	public $user;
	
	public function do_login() {
		
		$this->user = new User();			

		$data = array('email'=>$_POST['email'],'password'=>$_POST['password']);

		$message = "Login Failed - Username/Email or Password Incorrect";

		$uID = $this->user->getUserFromEmail($_POST['email']);
		
		if($this->user->checkUser($data)) {
			if($this->user->is_active($uID)) {
				$message = "Login Successful";
				$_SESSION['uID'] = $uID;
			} else {
				$message = "Your user account has not yet been approved.";
				$_SESSION['message'] = $message;
			}
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

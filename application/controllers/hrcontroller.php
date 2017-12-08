<?php

class HrController extends Controller {
	
	public $userObject;
	
	public function index(){
		
		$this->userObject = new User();
		$users = $this->userObject->getAllUsers(0,'alpha');
		$this->set('users',$users);
	
	}

	public function approve($uID) {
		
		$this->userObject = new User();
		
		$result = $this->userObject->setActive($uID);
				
		$this->set('response',$result);
	}
	
	public function remove($uID) {
		
		$this->userObject = new User();
		
		$response = $this->userObject->remove($uID);
		
		$this->set('response','User Removed');
	}
}

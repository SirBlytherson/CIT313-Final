<?php

class MembersController extends Controller{
	
	public $userObject;
   
   	public function view($uID){
	   
      $this->userObject = new User();
      $user = $this->userObject->getUser($uID);
	  $this->set('u', $user);
   	}
	
	public function index(){
		
		$this->userObject = new User();
		$users = $this->userObject->getAllUsers();
		$this->set('users',$users);
	
	}
	
	
}

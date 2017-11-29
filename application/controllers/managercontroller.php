<?php

class ManagerController extends Controller {
	
	public $postObject;
	
	protected $access = 1;
	
	public function index(){
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'Blog Post Manager');
		$this->set('posts',$posts);
	
	}
	
	public function remove_post($pID) {
		
		$this->postObject = new Post();
		
		$data = array('pID'=>$pID);
		
		$response = $this->postObject->removePost($data);
		
		$this->set('message',$response);
	}
	
	
}

<?php

class AddPostController extends Controller{
	
	public $postObject;
	
	protected $access = 1;
	
	public function index(){
		
		$this->postObject = new Post();
		$this->set('task', 'add');
	
	}
	
	public function add(){
		
			$this->postObject = new Post();
			
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'categoryID'=>$_POST['categoryID'], 'date'=>$_POST['date'], 'uID'=>$_POST['uID']);
	
			$result = $this->postObject->addPost($data);
			
			$this->set('message', $result);
			
		
	}
	
	public function edit($pID){
		
			$this->postObject = new Post();

			$post = $this->postObject->getPost($pID);
			
			$this->set('pID', $post['pID']);
			$this->set('title', $post['title']);
			$this->set('content', $post['content']);
			$this->set('date', $post['date']);
			$this->set('categoryID', $post['categoryID']);
			$this->set('task', 'update');
			
	}
	
	public function update() {
		
			$this->postObject = new Post();
			
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'categoryID'=>$_POST['categoryID'], 'date'=>$_POST['date'], 'uID'=>$_POST['uID'],'pID'=>$_POST['pID']);
	
			$result = $this->postObject->update($data);
			
			$this->set('message', $result);
			
		
	}
	
	
}

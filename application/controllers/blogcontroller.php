<?php

class BlogController extends Controller{
	
	public $postObject;
	public $categoryObject;
   
   	public function post($pID){
	   
      $this->postObject = new Post();
      $post = $this->postObject->getPost($pID);	    
	  $this->set('post',$post);
	  
   	}
	
	public function index(){
		
		$this->postObject = new Post();
		
		$posts = $this->postObject->getAllPosts();
		
		$this->categoryObject = new Category();
		
		$categories = $this->categoryObject->getCategories();
		
		$this->set('title', 'The Default Blog View');
		
		$this->set('posts',$posts);
		
		$this->set('categories',$categories);
	
	}
	
	public function add_comment() {
		
		$this->commentObject = new Comment();
		
		$data = array('commentText'=>$_POST['commentText'],'date'=>$_POST['date'],'uID'=>$_POST['uID'], 'postID'=>$_POST['postID']);
		
		$response = $this->commentObject->addComment($data);
		
		$this->set('message',$response);
		$this->set('response',$_POST['postID']);
	}
	
	public function remove_comment() {
		
		$this->commentObject = new Comment();
		
		$data = array('commentID'=>$_POST['commentID'], 'postID'=>$_POST['postID']);
		
		$response = $this->commentObject->removeComment($data);
		
		$this->set('message',$response);
		$this->set('response',$_POST['postID']);
	}
	
	public function category($categoryID) {
		
		$this->postObject = new Post();

		$posts = $this->postObject->getCategory($categoryID);
		
		$this->set('title', $posts[0]['category']);
		
		$this->set('posts',$posts);
		
	}
	
	
}

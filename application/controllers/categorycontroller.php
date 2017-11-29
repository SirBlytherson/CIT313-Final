<?php

class CategoryController extends Controller {
	
	public $categoryObject;
	
	protected $access = 1;
	
	public function index(){
		
		$this->categoryObject = new Category();
		
		$categories = $this->categoryObject->getCategories();
		
		$this->set('title', 'Category Manager');
		
		$this->set('categories',$categories);
	
	}
	
	public function add_category() {
		
		$this->categoryObject = new Category();
		
		$data = array('name'=>$_POST['name']);
		
		$response = $this->categoryObject->addCategory($data);
		
		$this->set('response',$response);
		$this->set('message',$response);
		
		$_SESSION['message'] = $response;
	}
	
	public function edit_category() {
		
		$this->categoryObject = new Category();
		
		$data = array('name'=>$_POST['name'],'categoryID'=>$_POST['categoryID']);
		
		$response = $this->categoryObject->editCategory($data);
		
		$this->set('response',$response);
		$this->set('message',$response);
		
		$_SESSION['message'] = $response;
	}
	
	public function remove_category($cID) {
		
		$this->categoryObject = new Category();
		
		$data = array('categoryID'=>$cID);
		
		$response = $this->categoryObject->removeCategory($data);
		
		$this->set('response',$response);
	}
	
	
}

<?php
class Category extends Model {
	
	function getCategory($categoryID){
		
		$sql =  'SELECT * FROM categories WHERE categoryID = ?;';
		
		// perform query
		$category = $this->db->getrow($sql, array($categoryID));
		
		return $category;
	}
	
	function getCategories(){
		
		$sql =  'SELECT * FROM categories';
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$categories[] = $row;
		}
	
		return $categories;
	
	}
	
	function addCategory($data) {
		
		$sql='INSERT INTO categories (name) VALUES (?)'; 
		
		$this->db->execute($sql,$data);
		
		$message = 'Category added.';
		
		return $message;
	}
	
	function editCategory($data) {
		
		$sql='UPDATE categories SET name = ? WHERE categoryID = ?'; 
		
		$this->db->execute($sql,$data);
		
		$message = 'Category updated.';
		
		return $message;
	}
	
	public function removeCategory($data) {
		
		$sql='DELETE FROM categories WHERE categoryID = ?;';
		
		$response = $this->db->execute($sql,$data);
				
		$message = 'Category Removed.';
		
		return $message;
		
	}	
}
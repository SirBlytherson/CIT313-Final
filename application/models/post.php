<?php
class Post extends Model{
	
	function getPost($pID){
		
		$sql =  'SELECT posts.*, users.first_name, users.last_name, categories.name AS category FROM posts INNER JOIN users AS users ON posts.uID = users.uID INNER JOIN categories AS categories ON categories.categoryID = posts.categoryID WHERE posts.pID = ? LIMIT 1;';
		
		// perform query
		$results = $this->db->getrow($sql, array($pID));
		
		$post = $results;
	
		return $post;
	
	}
		
	public function getAllPosts($limit = 0){
		
		$numposts = '';
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT posts . * , users.first_name, users.last_name, categories.name AS category FROM posts AS posts INNER JOIN users AS users ON posts.uID = users.uID INNER JOIN categories AS categories ON categories.categoryID = posts.categoryID'.$numposts.';';
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}

		return $posts;
	
	}
	
	public function addPost($data){
		
		$sql='INSERT INTO posts (title,content,categoryID,date,uID) VALUES (?,?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'Post added.';
		return $message;
		
	}
	
	public function update($data) {
		
		$sql='UPDATE posts SET title = ?, content = ?, categoryID = ?, date = ?, uID = ? WHERE pID = ?;';
		$this->db->execute($sql,$data);
		$message = 'Post updated.';
		return $message;
		
	}
	
	public function getComments($data) {
		
		$sql = 'SELECT *, users.first_name, users.last_name from comments AS comments INNER JOIN users AS users ON comments.uID = users.uID WHERE comments.postID = ? ORDER BY date;';
		
		$results = $this->db->execute($sql, $data);
		
		$comments = array();
		
		while ($row=$results->fetchrow()) {
			$comments[] = $row;
		}

		return $comments;
	}
	
	public function removePost($data) {
		
		$sql='DELETE FROM posts WHERE pID = ?;';
		
		$response = $this->db->execute($sql,$data);
				
		$message = 'Post Removed.';
		
		return $message;
		
	}
	
	public function getCategory($categoryID, $limit = 0) {
		
		$numposts = '';
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT * FROM posts WHERE categoryID = ?'.$numposts.';';
		
		$data = array('categoryID'=>$categoryID);
		
		// perform query
		$results = $this->db->execute($sql,$data);
		
		while ($row=$results->fetchrow()) {
			
			$categoryObject = new Category();
			
			$category = $categoryObject->getCategory($row['categoryID']);
			
			$row['category'] = $category['name'];
			
			$posts[] = $row;
		}

		return $posts;
	}
}
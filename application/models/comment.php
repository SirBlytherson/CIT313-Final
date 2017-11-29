<?php
class Comment extends Model{
	
	public function addComment($data){
		
		$sql='INSERT INTO comments (commentText,date,uID,postID) VALUES (?,?,?,?)';
		
		$this->db->execute($sql,$data);
		
		$message = 'Comment added.';
		
		return $message;
		
	}
	
	public function removeComment($data) {
		
		$sql='DELETE FROM comments WHERE commentID = ?;';
		
		$this->db->execute($sql,$data);
		
		$message = 'Comment Removed.';
		
		return $message;
		
	}
	
	
}
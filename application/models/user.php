<?php
class User extends Model{

	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	protected $user_type;

	public function __construct() {
		parent::__construct();

		if(isset($_SESSION['uID'])) {
			$userInfo = $this->getUserFromID($_SESSION['uID']);

			$this->uID = $userInfo['uID'];
			$this->first_name = $userInfo['first_name'];
			$this->last_name = $userInfo['last_name'];
			$this->email = $userInfo['email'];
			$this->user_type = $userInfo['user_type'];
		}	
	}
	
	public function getUserName() {
		return $this->first_name.' '.$this->last_name;
	}

	public function getUserEmail() {
		return $this->email;
	}

	public function isRegistered() {
		if(isset($this->user_type)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function isAdmin() {
		return ($this->user_type == 1);
	}

	public function getUser($uID){
		
		$sql =  'SELECT * FROM users WHERE uID = ?;';
		
		// perform query
		$results = $this->db->getrow($sql, array($uID));
		
		$user = $results;
	
		return $user;
	
	}
		
	public function getAllUsers($limit = 0){
		
		$numposts = '';
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT * FROM users'.$numposts.';';
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	
	}
	
	public function addUser($data){
		
		$sql='INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'User added.';
		return $message;
		
	}
	
	public function checkUser($credentials) {
		
		$sql='SELECT * FROM users WHERE email = ?';
		
		$result = $this->db->execute($sql, $credentials);

		$row = $result->fields;

		if(password_verify($credentials['password'],$row['password'])) {
			return true;
		} else {
			return false;
		}
		
	}

	public function getUserFromEmail($email) {
		$sql = 'SELECT uID FROM users WHERE email = ?';

		$result = $this->db->execute($sql, array($email));

		$row = $result->fields;

		return $row['uID'];
	}

	public function getUserFromID($uID) {
		$sql = 'SELECT * FROM users WHERE uID = ?';

		$result = $this->db->execute($sql, array($uID));

		$user = $result->fields;

		return $user;
	}	
}

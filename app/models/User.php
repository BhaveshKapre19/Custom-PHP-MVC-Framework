<?php 

/**
 * User's Class 
 */
class User
{
		//db Error
	Private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function DelUser($id){
		$this->query("DELETE FROM users WHERE user_id = :id");
		$this->bind(':id',$id);
		$this->execute();
	}

	//REgister User
	public function register($data)
	{
		$this->db->query("INSERT INTO users(user_name,user_email,user_password) VALUES (:name,:email,:password)");
		//Bind Values 
		$this->db->bind(':name',$data['name']);
		$this->db->bind(':email',$data['email']);
		$this->db->bind(':password',$data['password']);

		//Execute 
		if ($this->db->execute()) {
			return true;
		}
		else{
			return false;
		}
	}


	//update User
	public function editUser($data)
	{
		$this->db->query("UPDATE users SET user_name = :name, user_email = :email, user_twitter_link = :twLink, user_facebook_link = :fbLink, user_youtube_link = :ytLink, user_bio = :bio, user_image = :Image WHERE users.user_id = :userId ");
		$this->db->bind(':name',$data['userName']);
		$this->db->bind(':email',$data['userEmail']);
		$this->db->bind(':twLink',$data['usertwlink']);
		$this->db->bind(':fbLink',$data['userfblink']);
		$this->db->bind(':ytLink',$data['userYtlink']);
		$this->db->bind(':bio',$data['userBio']);
		$this->db->bind(':Image',$data['userImage']);
		$this->db->bind(':userId',$data['userID']);
		if($this->db->execute()){
			return true;
		}
		else {
			return false;
		}
	}

	//Login
	public function login($email,$password)
	{
		$this->db->query('SELECT * FROM users WHERE user_email = :email');
		$this->db->bind(':email',$email);

		$row = $this->db->single();

		$hashed_password = $row->user_password;
		if (password_verify($password,$hashed_password)) {
			return $row;
		}else{
			return false;
		}
	}

	public function findUserByEmail($email)
	{
		$this->db->query('SELECT * FROM users WHERE user_email = :email');
		//Bindd Values
		$this->db->bind(':email',$email);

		$row = $this->db->single();

		//Check Row 
		if ($this->db->rowCount() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function findUserByName($name)
	{
		$this->db->query('SELECT * FROM users WHERE user_name = :name');
		//Bindd Values
		$this->db->bind(':name',$name);

		$row = $this->db->single();
		return $row;
	}

	public function findUserById($Id)
	{
		$this->db->query('SELECT * FROM users WHERE user_id = :Id');
		//Bindd Values
		$this->db->bind(':Id',$Id);

		$row = $this->db->single();
		return $row;
	}


	public function userEmailData($email){
		$this->db->query('SELECT * FROM users WHERE user_email = :email');
		//Bindd Values
		$this->db->bind(':email',$email);

		return $row = $this->db->single();
	}

	public function showAllUsers(){
		$this->db->query('SELECT * FROM users');
		return $this->db->resultSet();
	}

	public function userCount(){
		$this->db->query("SELECT * FROM users");
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function UserActOrInc($id,$status){
		$this->db->query("UPDATE users SET status = :status WHERE user_id=:id");
		$this->db->bind(':status',$status);
		$this->db->bind(':id',$id);
		$this->db->execute();
	}

}

?>
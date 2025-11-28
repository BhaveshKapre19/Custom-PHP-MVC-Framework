<?php 

/**
 * Page Class
 */
class Post
{
	private $db;

	function __construct()
	{
		$this->db = new Database;
	}


	public function changePostStatus($id,$status)
	{
		$this->db->query("UPDATE post SET post_status = :status WHERE post_id=:id");
		$this->db->bind(':status',$status);
		$this->db->bind(':id',$id);
		$this->db->execute();
	}

	public function getPost()
	{
		$this->db->query('SELECT * , post.post_id as postId , users.user_id AS user_id , post.post_created_at As postCreated , users.created_at As userCreated FROM post INNER JOIN users INNER JOIN categorie ON post.post_author = users.user_id AND categorie.categorie_id = post.post_categorie ORDER BY post.post_created_at DESC');
		return $this->db->resultSet();
	}

	public function getpostById($id)
	{
		$this->db->query("SELECT * , post.post_id as postId , users.user_id AS user_id , post.post_created_at As postCreated , users.created_at As userCreated FROM post INNER JOIN users INNER JOIN categorie ON post.post_author = users.user_id AND categorie.categorie_id = post.post_categorie WHERE post.post_id = :postId ORDER BY post.post_created_at DESC");
		$this->db->bind(':postId',$id);
		$row = $this->db->single();

		return $row;
	}

	public function searchPost($keyword){
		$this->db->query('SELECT * , post.post_id as postId , users.user_id AS user_id , post.post_created_at As postCreated , users.created_at As userCreated FROM post INNER JOIN users INNER JOIN categorie ON post.post_author = users.user_id AND categorie.categorie_id = post.post_categorie WHERE post.post_tags LIKE "%'.$keyword.'%" ORDER BY post.post_created_at DESC');
		$row = $this->db->resultSet();
		return $row;
	}

	public function topLatestPost()
	{
		$this->db->query('SELECT * FROM post ORDER BY post.post_created_at DESC LIMIT 0,3');
		$row = $this->db->resultSet();
		return $row;
	}

	public function postCount(){
		$this->db->query('SELECT * FROM post');
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function AddPost($data){
		$this->db->query("INSERT INTO post (post_title,post_author,post_categorie,post_tags,post_header_image,post_body) VALUES (:title,:author,:categorie,:tags,:image,:body)");
		$this->db->bind(':title',$data['post_title']);
		$this->db->bind(':author',$data['post_author']);
		$this->db->bind(':categorie',$data['post_categorie']);
	    $this->db->bind(':tags',$data['post_tags']);
		$this->db->bind(':image',$data['post_image']);
		$this->db->bind(':body',$data['post_content']);
		if ($this->db->execute()) {
			return true;
		}
		else{
			return false;
		}
	}

	public function EditPost($data){
		$this->db->query("UPDATE post SET post_title = :title,post_categorie = :categorie,post_tags = :tags,post_header_image = :image,post_body = :body WHERE post_id = :id");
		$this->db->bind(':title',$data['post_title']);
		$this->db->bind(':categorie',$data['post_categorie']);
	    $this->db->bind(':tags',$data['post_tags']);
		$this->db->bind(':image',$data['post_image']);
		$this->db->bind(':body',$data['post_content']);
		$this->db->bind(':id',$data['post_id']);
		if ($this->db->execute()) {
			return true;
		}
		else{
			return false;
		}
	}

	public function DeletePost($id){
		$this->db->query("DELETE FROM post WHERE post_id = :id");
		$this->db->bind(':id',$id);
		if ($this->db->execute()) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getCategoriesPost($cateId){
		$this->db->query("SELECT * , post.post_id as postId , users.user_id AS user_id , post.post_created_at As postCreated , users.created_at As userCreated FROM post INNER JOIN users INNER JOIN categorie ON post.post_author = users.user_id AND categorie.categorie_id = post.post_categorie WHERE post.post_categorie = :categorie ORDER BY post.post_created_at DESC");
		$this->db->bind(':categorie',$cateId);
		$cateData = $this->db->resultSet();
		return $cateData;
	}

	public function getAuthorPost($authId){
		$this->db->query("SELECT * , post.post_id as postId , users.user_id AS user_id , post.post_created_at As postCreated , users.created_at As userCreated FROM post INNER JOIN users INNER JOIN categorie ON post.post_author = users.user_id AND categorie.categorie_id = post.post_categorie WHERE post.post_author = :authorId ORDER BY post.post_created_at DESC");
		$this->db->bind(':authorId',$authId);
		return $this->db->resultSet();
	}
}


?>
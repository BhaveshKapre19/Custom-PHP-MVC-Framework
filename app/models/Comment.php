<?php 

/**
 * Comment 
 */
class Comment extends Database
{
	private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCommentCount()
    {
    	$this->db->query('SELECT * FROM comments');
    	$this->db->execute();
    	return $this->db->rowCount();
    }
}


?>
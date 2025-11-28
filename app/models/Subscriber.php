<?php 

/**
 * Subs Model
 */
class Subscriber extends Database
{
	private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function SubCount()
    {
    	$this->db->query("SELECT * FROM subscribers");
    	$this->db->execute();
    	return $this->db->rowCount();
    }
}


?>
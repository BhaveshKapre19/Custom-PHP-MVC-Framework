<?php 

class Settings extends Database
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getsubCount(){
        $this->db->query("SELECT * FROM subscribers");

        return $this->db->rowCount();
    }
}



?>
<?php 

/**
 * Categories 
 */
class Category
{
	private $db;
	
	function __construct()
	{
		$this->db = new Database;
	}

	public function getCategories()
	{
		$this->db->query("SELECT * FROM categorie");
		return $this->db->resultSet();
	}

	public function getCategoriesById($id)
	{
		$this->db->query("SELECT * FROM categorie WHERE categorie_id = :id");
		$this->db->bind(':id',$id);
		return $this->db->Single();
	}

    public function getCategoriesByName($name)
    {
        $this->db->query("SELECT * FROM categorie WHERE categorie_name = :name");
        $this->db->bind(':name',$name);
        return $this->db->Single();
    }

	public function CateCount()
    {
    	$this->db->query('SELECT * FROM categorie');
    	$this->db->execute();
    	return $this->db->rowCount();
    }

    public function addCategorie($data)
    {
    	$this->db->query("INSERT INTO categorie (categorie_name,categorie_created_by) VALUES (:catName,:catCreBy)");
    	$this->db->bind(':catName',$data['categorie_name']);
    	$this->db->bind(':catCreBy',$data['categorie_created_by']);
    	if ($this->db->execute()) {
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public function updataCategorie($data){
    	$this->db->query("UPDATE categorie SET categorie_name = :cateName WHERE categorie_id = :id");
    	$this->db->bind(':cateName',$data['categorie_up_name']);
    	$this->db->bind(':id',$data['categorie_id']);
    	if ($this->db->execute()) {
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public function deleteCategorie($id)
    {
    	$this->db->query("DELETE FROM categorie WHERE categorie_id = :id");
    	$this->db->bind(':id',$id);
    	$this->db->execute();
    	redirect('Admin');
    }
}

?>
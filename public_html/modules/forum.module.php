<?php
Class ForumModule
{
    public $name,$db;
    
    public function __Construct( $db )
    {
        $this->db = $db;
    }
    
    public function Forum($id)
    {
        $query = $this->db->query("SELECT * FROM forums WHERE id = ?", $id);
        return $query->fetchAll();
    }
    
    public function ListForums()
    {
        $query = $this->db->query("SELECT * FROM forums");
        return $query->fetchAll();
    }
}

function debug($i)
{
    echo '<pre>';
    print_r($i);
    echo '</pre>';
}
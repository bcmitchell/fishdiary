<?php
class Item_Model extends CI_Model {
    
    public function getLatestItems()
    {
        $statement = $this->db->prepare("
           select id, item, itemtype, urgency
           from lists
                                        ");
        
        if ($statement->execute()){
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;
        }
        return array();
    }
    public function getItem($id)
    {
        $statement = $this->db->prepare("
           select id, item, itemtype, urgency
           from lists
           where id =".$id."
                                        ");
        if ($statement->execute()){
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;
    }
    return array();
}
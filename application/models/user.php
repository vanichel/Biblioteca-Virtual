<?php

class User extends CI_Model{
    
    public function getUser($Id){
        $query = $this->db->query("SELECT * FROM administrador WHERE Id_admin LIKE '".$Id."' LIMIT 1");
        if ($query->num_rows()>0){
            return $query->row();
        }
        else {
            return null;
        }
    }
    

}
?>
<?php
 

/**
 * Description of save_model
 *
 * @author HERNTEK
 */
class save_model extends CI_Model{
    //put your code here
    
    public function insert($data){
        $this->db->insert("temp_formdata",$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    
}

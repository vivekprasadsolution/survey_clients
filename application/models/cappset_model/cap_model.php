<?php

 
/**
 * Description of capset_model
 *
 * @author Vivek
 */
class cap_model extends CI_Model{
   
    public function check_isin_cappset($question_id,$cappset_id=''){
        $query='';
            if ($cappset_id ==='') {
                
            }else{
                $query = "AND cappset_id=$cappset_id";
            }
    echo    $SQLtxt = "SELECT *,cappset_is_lead.question_id from cappset_is_lead INNER JOIN  questions on 
                cappset_is_lead.question_id = questions.id 
                INNER JOIN  CAPPSET ON cappset.id = cappset_is_lead.cappset_id where questions.id=$question_id $query";
                
        
                $fields = $this->db->query($SQLtxt);
                if($fields->num_rows()>0)return $fields->result();
                else FALSE;
        
    }
    
    
    public function count_cappset(){
        $SQLtxt ="SELECT * FROM CAPPSET";
        
        $fields = $this->db->query($SQLtxt);
                if($fields->num_rows()>0)return $fields->result();
                else FALSE;
    }


    
    public function get_cappset($cappset_id){
        $SQLtxt ="SELECT *,cappset_is_lead.question_id from cappset_is_lead INNER JOIN  questions on 
                cappset_is_lead.question_id = questions.id 
                INNER JOIN  cappset ON cappset.id = cappset_is_lead.cappset_id 
                 INNER JOIN cappset_types  on cappset_types.idtypes =cappset.fk_cappsetid where cappset_id = $cappset_id";
        
         $fields = $this->db->query($SQLtxt);
                if($fields->num_rows()>0)return $fields->result();
                else FALSE;
        
    }
    
    
    
    // From this query get the last question id  
    public function get_last_cappset(){
        
    }
    
    
    
    public function get_answers($answer_id,$question_id){
        $SQLtxt ="SELECT * FROM questions_answers where id=$answer_id and question_id=$question_id";
        
        $fields= $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
        
    }
    
    
    public function insert_temp($data){
        $this->db->insert("temp_cappset_data",$data);
    }

    public function delete_items(){
        $SQLtxt ="DELETE FROM temp_cappset_data";
        $this->db->query($SQLtxt);
        
    }
    
   
    
    
}

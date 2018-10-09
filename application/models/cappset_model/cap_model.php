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
        $SQLtxt = "SELECT *,cappset_is_lead.question_id from cappset_is_lead INNER JOIN  questions on 
                cappset_is_lead.question_id = questions.id 
                INNER JOIN  CAPPSET ON cappset.id = cappset_is_lead.cappset_id where questions.id=$question_id $query AND cappset.status=1";
                
        
                $fields = $this->db->query($SQLtxt);
                if($fields->num_rows()>0)return $fields->result();
                else FALSE;
        
    }
    
    public function check_cap($question){
         $SQLtxt = "SELECT distinct(cappset_is_lead.cappset_id) from cappset_is_lead INNER JOIN  questions on 
                cappset_is_lead.question_id = questions.id 
                INNER JOIN  cappset ON cappset.id = cappset_is_lead.cappset_id 
                 INNER JOIN cappset_types  on cappset_types.idtypes =cappset.fk_cappsetid  where cappset_is_lead.question_id = $question";
      
        $fields= $this->db->query($SQLtxt);
        
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
        
    }


     
    
    public function get_answers($answer_id,$question_id){
        $SQLtxt ="SELECT * FROM questions_answers where id=$answer_id and question_id=$question_id";
        
        $fields= $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
        
    }
    

    
 
    
    public function count_cappset(){
        $SQLtxt ="SELECT *,cappset_is_lead.question_id from cappset_is_lead INNER JOIN  questions on 
                cappset_is_lead.question_id = questions.id 
                INNER JOIN  cappset ON cappset.id = cappset_is_lead.cappset_id 
                 INNER JOIN cappset_types  on cappset_types.idtypes = cappset.fk_cappsetid";
        
        $fields = $this->db->query($SQLtxt);
                if($fields->num_rows()>0)return $fields->result();
                else FALSE;
    }
    
    
    public function capp(){
         $SQLtxt ="SELECT * from cappset";
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
    
    //******************************************************************************************
    // GET TEMP ANSWERE FROM TEMP CAPPSET DATA TABLE AND CHECK IF RECORD EXISTS 
    //******************************************************************************************
    
    public function get_temp_answer($cappset_id,$question_id,$answer_id){
         $SQLtxt ="select * from temp_capsetdata where cappset_id= $cappset_id and temp_capsetdata.question_id in ($question_id)  
                  and temp_capsetdata.answer_id in ($answer_id)";
        
        $fields= $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
    }
 
    
    public function select_capp_usingid($cappid){
         $SQLtxt ="SELECT * FROM survey_crm.cappset INNER JOIN cappset_types ON cappset.fk_cappsetid = cappset_types.idtypes  where id =$cappid ";
         $fields = $this->db->query($SQLtxt);
            if($fields->num_rows()>0)return $fields->result();
            else FALSE;
    }
    
    
    public function update_cappcount($capp_set,$count_cap){
        $this->db->where('id', $capp_set);
        $this->db->update('cappset',$count_cap);
        
    }
    
    
        
    public function insert_temp($data){
        $this->db->insert("temp_capsetdata",$data);
    }

    public function delete_items(){
        $SQLtxt ="DELETE FROM temp_capsetdata";
        $this->db->query($SQLtxt);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //*************************************************************************
    // CHECK CAPPSET SUPPRESSION 
    //*************************************************************************
    
    //****************************************************************************************************
    // FETCH CAPPSET SUPPRESSION DETAILS  
    //****************************************************************************************************
    
    public function fetch_suppression_details($cappset_id){
        $SQLtxt = "SELECT * FROM  cappset_suppression INNER JOIN  suppression ON 
                   cappset_suppression.suppression_id = suppression.id
                   INNER JOIN suppression_types ON 
                   suppression.suppression_type_id = suppression_types.id  WHERE  cappset_id= $cappset_id";

        
        $fields = $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
        
    }
    
    //****************************************************************************************************
    // END FETCH CAPPSET SUPPRESSION DETAILS 
    //****************************************************************************************************
     
    
    public function find_suppression($sup_id){
            $SQLtxt = "SELECT * FROM suppression_values WHERE suppression_id=$sup_id";
            
            $fields = $this->db->query($SQLtxt);
            //if($fields->num_rows()>0)return $fields->result();
            if($fields->num_rows()>0)return TRUE;
            return FALSE;
            
    }
    
    
    
    
}

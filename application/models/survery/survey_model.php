<?php


/**
 * Description of survey_model
 *
 * @author HERNTEK SOLUTIONS
 */
class survey_model extends CI_Model{
    
    public function get_survey($survey_id){
        $SQLtxt = "Select * from survey where survey_id=$survey_id";
        
        $fields= $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
                
    }
    
    public function get_formdata($user_id){
        $SQLtxt = "SELECT * from temp_formdata where user_id=$user_id";
        $fields= $this->db->query($SQLtxt);
        
        if($fields->num_rows() > 0 ) return $fields->result();
        else return FALSE;
    }

     

    public function record_count($survey_id){
        
       $SQLtxt = "Select count(survey_flow_id)as max_records from survey_question_flow where campaign_fk=$survey_id";
        
        
        $fields= $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
    } 
    ///// for only form load
    public function getdata_questions(){
                $SQLtxt ="SELECT SF.survey_flow_id,SF.campaign_fk,SF.question_id_fk,Q.question_text,Q.question_type_id,Q.status, SF.linked_question_id,
                         SF.flow_ranking,QT.question_type_name       
                         FROM survey_question_flow as SF inner join questions as Q on Q.id= SF.question_id_fk 
                                                 inner join question_type as QT on QT.id = Q.question_type_id
                         WHERE campaign_fk=1 HAVING Q.status=1 ";
            
      
        
        
        
        $fields= $this->db->query($SQLtxt);
            if($fields->num_rows() > 0) return $fields->result();
        else return FALSE;
        
    }
    
    ///
    
    public function all_question_withquery_validation($filtered_data){
      //echo  $SQLtxt = "SELECT * FROM survey_question_flow as SF inner join questions as Q on Q.id= SF.question_id_fk 
      //          INNER JOIN question_type as QT on QT.id = Q.question_type_id 
      //          WHERE campaign_fk=1  HAVING Q.status=1 
      //          $filtered_data ORDER BY SF.survey_flow_id ";
      
       $SQLtxt ="SELECT *,Q.id as pk_question FROM question_ranking as QR inner join questions as Q on Q.id= QR.question_id
                INNER JOIN question_type as QT on QT.id = Q.question_type_id 
                WHERE   Q.status=1 $filtered_data
                ORDER BY QR.rank";
         
       
       $fields = $this->db->query($SQLtxt); 
       if($fields->num_rows()>0) return $fields->result();
       else  return FALSE;
               
    }
    
    
    
    public function get_question_next($question_index='',$merged_queries=''){
 
         $SQLtxt = "SELECT *
                   FROM survey_question_flow as SF inner join questions as Q on Q.id= SF.question_id_fk 
                    INNER JOIN question_type as QT on QT.id = Q.question_type_id
                   WHERE campaign_fk=1 AND SF.question_id_fk=$question_index  HAVING Q.status=1 $merged_queries  ORDER BY SF.survey_flow_id  LIMIT 1";
          
        
        $fields= $this->db->query($SQLtxt);
            if($fields->num_rows() > 0) return $fields->result();
        else return FALSE;
        
    }
    
    public function check_items($question_id,$extra_queries){
     echo    $SQLtxt="SELECT ans_id,text FROM `survey_link_answers` WHERE question_id =$question_id   $extra_queries  LIMIT 1";
        
            $fields= $this->db->query($SQLtxt);
            if($fields->num_rows() > 0) return TRUE;
        else return FALSE;
        
    }
    

    
    public function linked_question($search_questionid){
         $SQLtxt ="SELECT * FROM question_linked WHERE question_primary=$search_questionid";
        
        $fields= $this->db->query($SQLtxt);
            if($fields->num_rows() > 0) return $fields->result();
        else return FALSE;
    }
     
    
    public function fields_answers_from_temp($next_question){
        $SQLtxt = "SELECT * FROM temp_table WHERE question_id=$next_question";
        
        $fields= $this->db->query($SQLtxt);
            if($fields->num_rows() > 0) return $fields->result();
        else return FALSE;
    }
    

    //****************************************************************************************************
    // FETCH SUPPRESSION QUESTION DETAILS 
    //****************************************************************************************************
    
    public function fetch_suppression_details($question_ids){
        $SQLtxt = "SELECT * FROM  question_suppression INNER JOIN  suppression ON 
                   question_suppression.suppression_id = suppression.id
                   INNER JOIN suppression_types ON 
                   suppression.suppression_type_id = suppression_types.id  WHERE  question_id = $question_ids";

        
        $fields = $this->db->query($SQLtxt);
        if($fields->num_rows()>0) return $fields->result();
        else return FALSE;
        
    }
    
    //****************************************************************************************************
    // FETCH SUPPRESSION QUESTION DETAILS 
    //****************************************************************************************************
     
    
    public function find_suppression($sup_id,$supp_values=''){
            $SQLtxt = "SELECT * FROM suppression_values WHERE suppression_id=$sup_id and value='$supp_values'";
            
            $fields = $this->db->query($SQLtxt);
            //if($fields->num_rows()>0)return $fields->result();
            if($fields->num_rows()>0)return TRUE;
            return FALSE;
            
    }
    
    
    public function form_data($user_id){
        $SQLtxt = "SELECT *  FROM temp_formdata where user_id = $user_id";
        
        $fields = $this->db->query($SQLtxt);
        if($fields->num_rows() >0) return $fields->result();
        else return FALSE;
    }
    
    
    
    public function insert_temp($data){
        $this->db->insert("temp_table",$data);
    }

    public function delete_items(){
        $SQLtxt ="DELETE FROM temp_table";
        $this->db->query($SQLtxt);
        
    }
    

    
    
    
}





    

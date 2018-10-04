<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fetch_question
 *
 * @author Vivek
 */
class fetch_question extends CI_Model{
    

        public function fetch_question_records($campaign_fk = '',$answers){
                
          // $SQLtxt ="SELECT SF.question_id_fk,Q.question_text,Q.question_type_id,Q.status, SF.linked_question_id,SF.flow_ranking 
           //             FROM survey_question_flow as SF inner join questions as Q on Q.id= SF.question_id_fk
           //           WHERE campaign_fk=1  HAVING Q.status=1";
        
            $SQLtxt ="SELECT SF.question_id_fk,Q.question_text,Q.question_type_id,Q.status, SF.linked_question_id,SF.flow_ranking,QT.question_type_name       
                FROM survey_question_flow as SF inner join questions as Q on Q.id= SF.question_id_fk 
                    inner join question_type as QT on QT.id = Q.question_type_id
                WHERE campaign_fk=1  HAVING Q.status=1";
            
            $fields= $this->db->query($SQLtxt);
            if($fields->num_rows()>0)return $fields->result();
                else return FALSE;
                
                
        }
        
        
        public function get_question_answers($question_id=''){ 
            $SQLtxt = "SELECT * FROM questions_answers where  question_id=$question_id";
            
            $fields= $this->db->query($SQLtxt);
            if($fields->num_rows()>0)return $fields->result();
                else return FALSE;
        }
        
        public function db_ckeck_linked(){
            $SQLtxt ="SELECT *,IF(linked_question_id <> 0 ,'LINKED','NOT LINKED')AS linked FROM survey_question_flow where campaign_fk=1";
            $fields = $this->db->query($SQLtxt);
            if($fields->num_rows()>0)return $fields->result();
                else return FALSE;
            
            
        }
        

    
}

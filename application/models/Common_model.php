<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common_model
 *
 * @author HERNTEK
 */
class Common_model extends CI_Model{
    
    public function get_records_fromtables(){ 
        $SQltxt ="SELECT campaign_list.pk_id,campaign_list.fk_campaign_id,campaign.campaign_name,campaign.*,campaign.showhide_hero_img,campaign.showhide_in_featured_list,campaign_list.client_fk,campaign_list.client_name,campaign_list.total_vol,
                        campaign_list.clicks,campaign_list.page_views,campaign_list.gen_leads,campaign_list.campserving_status,campaign_list.campaign_list_status
                  FROM 
                        campaign INNER JOIN  campaign_list on campaign_list.fk_campaign_id = campaign.id ";
        
       $fields= $this->db->query($SQltxt);
            if($fields->num_rows()>0) return $fields->result();
            else return NULL;
            
    }
    
    
    public function run_questions($cappset_id){
        $cat= array();
        $SQLtxt ="SELECT * FROM cappset INNER JOIN cappset_is_lead on cappset.id=cappset_is_lead.cappset_id inner join questions on cappset_is_lead.question_id=questions.id where cappset.id=$cappset_id";
        
        $fields= $this->db->query($SQLtxt);
            if($fields->num_rows()>0){ 
                
                /* foreach ($fields->result_array() as $row) {
         
                 $SQLtxt ="SELECT * FROM questions_answers where question_id=".$row['id'];
                 $fields1= $this->db->query($SQLtxt);
                     if($fields1->num_rows()>0){
                           $cat[]=$row['question_text'];
                           $cat[] = $fields1->result_array(); 
                         
                     }
                 }
                 
                 echo "<pre>";
                 print_r($cat);
                 * *
                 */
                 
                 return $fields->result();
            }
            else return NULL;
            
    }
    
    
    public function run_answers($_question_id=''){
        $SQLtxt ="SELECT * FROM questions_answers where question_id=$_question_id";
                 $fields1= $this->db->query($SQLtxt);
                     if($fields1->num_rows()>0){
                         
                          return  $fields1->result(); 
                         
                     }
    }
    
    
}

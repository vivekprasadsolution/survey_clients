<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of common_helpers
 *
 * @author Vivek
 */
if ( ! function_exists('getfields_type')){
    
    function getfields_type($question_id){
       $html='';
        $CI =& get_instance();


        $xx = $CI->db->query("SELECT * FROM questions INNER JOIN question_type ON questions.question_type_id = question_type.id
                        inner join questions_answers on questions.id =questions_answers.question_id
                        WHERE questions.id=$question_id and questions.status=1");

      
       
        
        foreach ($xx->result() as $row) {
            
            $html .= '<option value='.$row->id.' data-params="'.$row->id.'"'.$row->id.' class="form-control"  >'.$row->answer.'</option>';
        }
	return $html;
        
    }
    
    
if(!function_exists('getRadio_type')){
    
    function getRadio_type($question_id){
        $html='';
        $CI =& get_instance();
        
        $xx = $CI->db->query("SELECT * FROM questions INNER JOIN question_type ON questions.question_type_id = question_type.id
                        inner join questions_answers on questions.id =questions_answers.question_id
                        WHERE questions.id=$question_id and questions.status=1");
        
        
        
        foreach ($xx->result() as $row) {
            //<input type=radio value='.$row->id.' data-params="'.$row->id.'"'.$row->id.'>'.$row->answer.'</option>';
            $html .= '<input type="radio" name="seleted_radio" value="'.$row->answer.'" class="form-control">'.$row->answer;
                        
            
        }
	return $html;
        
    } 
    
}    
    
if(!function_exists('getcheckbox_type')){
    
    function getcheckbox_type($question_id){
        $html='';
        $CI =& get_instance();
        
        $xx = $CI->db->query("SELECT * FROM questions INNER JOIN question_type ON questions.question_type_id = question_type.id
                        inner join questions_answers on questions.id =questions_answers.question_id
                        WHERE questions.id=$question_id and questions.status=1");
        
       
        foreach ($xx->result() as $row) {

            $html .= '<input type="checkbox"  name="seleted_checkbox[]" value="'.$row->answer.'" form-control>  '.$row->answer.'<br>';
                        
            
        }
	return $html;
    }
    
}
 

if(!function_exists('getdropdownmultiple_type')){
    
    function getdropdownmultiple_type($question_id){
        $html='';
        $CI =& get_instance();
        
        $xx = $CI->db->query("SELECT * FROM questions INNER JOIN question_type ON questions.question_type_id = question_type.id
                        inner join questions_answers on questions.id =questions_answers.question_id
                        WHERE questions.id=$question_id and questions.status=1");
        
       
        foreach ($xx->result() as $row) {
            
            $html .= '<option multiple  name="seleted_checkbox[]" value="'.$row->answer.'"> '.$row->answer.' </option>';
                        
 
        }
	return $html;
    }
    
}


if(!function_exists('gettextbox_type')){
    
    function gettextbox_type($question_id){
        $html='';
        $CI =& get_instance();
        
        $xx = $CI->db->query("SELECT * FROM questions INNER JOIN question_type ON questions.question_type_id = question_type.id
                        inner join questions_answers on questions.id =questions_answers.question_id
                        WHERE questions.id=$question_id and questions.status=1");
        
      
        
        foreach ($xx->result() as $row) {

            $html .= '<input type="text" name="seleted_text" placeholder="enter your answer here" class="form-control" >';
                        
 
        }
	return $html;
    }
    
}

if(!function_exists('multiline_text_type')){
    
    function multiline_text_type($question_id){
        $html='';
        $CI =& get_instance();
        
        $xx = $CI->db->query("SELECT * FROM questions INNER JOIN question_type ON questions.question_type_id = question_type.id
                        inner join questions_answers on questions.id =questions_answers.question_id
                        WHERE questions.id=$question_id and questions.status=1");
        
      
        
        foreach ($xx->result() as $row) {

            $html .= '<textarea name="multiline" cols="40" rows="5" class="form-control"></textarea>';
                       
        }
	return $html;
    }
    
}


	
    
}

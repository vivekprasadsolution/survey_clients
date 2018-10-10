<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_survey
 *
 * @author HERNTEK
 */
class Form_survey extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("form_submit/save_model");
        $this->load->library('session');
    }
    
    public function index(){
        $this->session->unset_userdata("id_user");
        $this->load_form();
    }

    public function load_form(){
       $title =  $this->input->post("title");
       $fname =  $this->input->post("firstname");
       $lname = $this->input->post("lastname");
       $gender = $this->input->post("gender");
       $zip =  $this->input->post("zip");
       $phone = $this->input->post("phone");
        
        $data["template"] = "welcome_message.php";
       

        
        if($this->input->post('submit') === "SAVE"){
             $data=array(
                            "title" =>$title,
                            "first_name" =>$fname,
                            "last_name" =>$lname,
                            "gender" =>$gender,
                            "zip" =>$zip,
                            "phone" =>$phone
                    );
             
            echo $returned_id = $this->save_model->insert($data);
             
            $this->session->set_userdata("id_user",$returned_id);
             
            header('Location: Question_start_ci');
            
            
            
        }
        
         $this->load->view('base_html',$data);
        
    }
    
    
}

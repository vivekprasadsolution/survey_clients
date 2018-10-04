 <?php

/**
 * Description of question_start_ci
 *
 * @author Vivek
 */
class Question_start_ci extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('fetch_question');
        $this->load->helper('common_helper');
        $this->load->model('survery/survey_model');
        $this->load->model('cappset_model/cap_model');
    }
       
    public function index(){ 
        $this->session->unset_userdata("countarray");
        $this->session->unset_userdata("fields_questions");
        $this->survey_model->delete_items();    
        $this->survey_questions_probing();
    }
    
    public function survey_questions_probing(){
        $data['template'] = "survey/question_run.php";
        $data['survey'] = $this->survey_model->get_survey('1');

    //**********************************************************************************************
    // GET USER INFORMATION FROM USER WHO IS SUBMITTING SURVEY FORM
    //**********************************************************************************************    
        $_SESSION['USER']=1;
            
        $data['user_information'] =  $this->survey_model->get_formdata($_SESSION['USER']);
       
    //**********************************************************************************************
    // END GET USER INFORMATION FROM USER WHO IS SUBMITTING SURVEY FORM
    //**********************************************************************************************          
            
    //**********************************************************************************************
    /// CHECK THE USER IS MALE OR FEMALE FROM  TEMP TABLE TEMP TABLE 
    //**********************************************************************************************    
            
            if(!empty($data['user_information'])){
                   for($i=0;$i<count($data['user_information']);$i++){
                        //if($data['user_information'][0]->gender == 'OTHERS'){
                              //  $extra_query = "AND gender NOT ='F' OR  gender='M'";
                        //}else{
                                $extra_query = "AND gender='". $data['user_information'][0]->gender ."' OR  gender='M,F'";
                        //}
                   }
            }
            
        //**********************************************************************************************
        /// END CHECK THE USER IS MALE OR FEMALE FROM  TEMP TABLE TEMP TABLE 
        //**********************************************************************************************   
         
         $data['fields_records'] =  $this->survey_model->all_question_withquery_validation($extra_query);  
        
         foreach ($data['fields_records'] as $ques) {
             $_SESSION['fields_questions'][] = $ques->question_id_fk ;
         }
        
        //**************************************************************************************** 
        // STEP 2 SUPPRESSION CHECK 
        //**************************************************************************************** 
         
        $result = $this->check_suppression($_SESSION['fields_questions'][0]);   
        
        if($result===TRUE){
             $_row = $this->session->countarray + 1;
             $data['question'] =  $this->survey_model->get_question_next($_SESSION['fields_questions'][$_row],$extra_query);
        }else{
          
             $data['question'] =  $this->survey_model->get_question_next($_SESSION['fields_questions'][0],$extra_query);
        }
        
        //**************************************************************************************** 
        // STEP 2 SUPPRESSION CHECK END
        //**************************************************************************************** 
                 
 
        
        $this->session->set_userdata('first_start', 0);
        
        $_SESSION['question_id'] = array($data['question'][0]->linked_question_id);
        
        $this->session->set_userdata('countarray', 1);
        $this->session->set_userdata('records',count($_SESSION['fields_questions']));
        
      
        
        $this->load->view('base_html',$data);
        
    }
    
    
    
    
    
    
    
    public function next_question(){
        
         $cappset_values = '';
         $old_question_id = array();
         echo $question_id = $this->input->post('question_id');
         $indexed_id = $this->input->post('next_id');
         $linked_id = $this->input->post('linked_id'); 
         $checked_answere = $this->input->post('seleted_checkbox');
         
         
        if(is_null($this->session->countarray)){
                 $this->survey_model->delete_items();          
        }else{
                
               if($this->session->records > $this->session->countarray){
                   
                echo  $_row  =  $this->session->countarray;  
                
                $result = $this->check_suppression($question_id);   
                // checking suppression if ys results as true
                if($result===TRUE){
                     echo "SUPPRESSED QUESTIONS";
                     $_row = $this->session->countarray;
                     $data['question'] =  $this->survey_model->get_question_next($question_id);
                     $this->session->unset_userdata("first_start");
                }else{  
                          echo "NEXT QUESTIONS";
                          $data['question'] =  $this->survey_model->get_question_next($question_id);
                          
                     }
                    
               
                
               /////echo  $_SESSION['fields_questions'][$_row];
                                
                // INSERT CAPPSET TEMP DATA TO TEMP CAPPSTE TABLE 
                
               
                
                            //***********************************************************************************************
                            // GET VALUES FROM CHECK BOX AND SENT IT TO TEMP TABLE 
                            // MAIN SECTION TO VALIDATE ANSWERE FEILDS USING TEMP TABLE AND MATCH WITH REAL ANSWERE TABLE
                            //***********************************************************************************************
                            
                                
                           
                                for($i=0;$i<count($checked_answere);$i++){
                                     echo 1;
                                   $data_temp= array("linked_id"  => $linked_id,
                                                     "qestion_id" =>$question_id,
                                                     "ans"      =>$checked_answere[$i],
                                                     "temp_flow_ranking"=>$indexed_id
                                       );

                                   $this->survey_model->insert_temp($data_temp);    
                                }            

                    //**********************************************************************************************
                    /// END HERE 
                    //**********************************************************************************************    
                                
                  
                   
                      
                    // $data['next_question'] = $this->survey_model->get_question_next($_SESSION['fields_questions'][$_row]);                
                        
                    // $next_question = $data['next_question'][0]->question_id_fk;              


                        // CHECK IF VALUE IS SAME IN THE DATABASE AS USER SUBMITTED 
                                $data['is_linked'] = $this->survey_model->linked_question($_SESSION['fields_questions'][$_row]); 


                                    if($data['is_linked']!== FALSE){
                                        //TO BE WORKED ON AT HOME 

                                            $data['getfields_answere_temp'] = $this->survey_model->fields_answers_from_temp($_SESSION['fields_questions'][$_row]);


                                                ////SELECT FROM TEMP _ANSWERS AND CHECK IF IT EXISTS OR NOT  

                                               if(!empty($data['getfields_answere_temp'])){
                                                       for($i=0;$i<count($data['getfields_answere_temp']);$i++){

                                                           if($i===0){
                                                                    $merged_queries .= "AND linkqs_id='".$data['getfields_answere_temp'][$i]->qestion_id."' AND text='". $data['getfields_answere_temp'][$i]->ans ."'";
                                                               }else{
                                                                    $merged_queries .= " OR  text='". $data['getfields_answere_temp'][$i]->ans ."'";
                                                               }   
                                                       }

                                               }


                                                    $data['check_field_contains'] =  $this->survey_model->check_items($_SESSION['fields_questions'][$_row],$extra_query);

                                                                    // IF CHECKING IS SUCCESS THEN  ENTERS THE BOOL IF ELSE AND DISPLAY THE ANSWERE

                                                       if($data['check_field_contains'] === TRUE){ 
                                                           echo "YES MATCHED AND NOW I WILL DYSPLAY THE MATCHED QUESTION";


                                                                $data['question_next'] =  $this->survey_model->get_question_next($_SESSION['fields_questions'][$_row ],$extra_query);

                                                                $this->print_on_form($data);  
                                                       }else{
                                                           echo "NO IT WILL SKIP THE QUESTION";


                                                            $data['question_next'] =  $this->survey_model->get_question_next($_SESSION['fields_questions'][$_row],$extra_query);
                                                            if(!isset($data['question_next'])){

                                                                echo isset($data['question_next']);

                                                                $this->print_on_form($data); 
                                                                $this->session->set_userdata('countarray', $_row + 1);
                                                            } else{
                                                                echo "survey closed";
                                                                $this->session->sess_destroy();
                                                            }   


                                                       }    

                                        }else{
                                                   
                                                    $data['question_next'] =  $this->survey_model->get_question_next($_SESSION['fields_questions'][$_row]);
                                                    $this->print_on_form($data);     
                                                    $this->session->set_userdata('countarray', $_row + 1);

                                    }        


                        }else{
                           
                            
                            $this->check_cappset();
                            
                             echo "survey closed";
                            $this->session->sess_destroy();
                        }
                }

        
  } 

   
   
    public function print_on_form($data){
        
        if($this->session->records > $this->session->countarray){    
            
            $this->session->set_userdata('countarray', $this->session->countarray+1);
          //  echo $this->session->countarray;
            
                    echo "</br>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-12'>";
                    echo "<div id='linkedid-{$data['question_next'][0]->survey_flow_id}' class='form-control shadow'>";
                    echo "<form id='f{$data['question_next'][0]->survey_flow_id}' name='f{$data['question_next'][0]->survey_flow_id}' method='POST'>";
                    echo "<input type='text' name='question_id' value='{$data['question_next'][0]->question_id_fk}'>";
                    echo "<input type='text' name='next_id' value='{$data['question_next'][0]->flow_ranking}'>";
                    echo "<input type='text' name='linked_id' value='{$data['question_next'][0]->linked_question_id}'>";  
                   
                    echo "<h4>{$data['question_next'][0]->flow_ranking}.{$data['question_next'][0]->question_text} <span class='fa fa-check-circle saved'></span></h4>";
                       if($data['question_next'][0]->question_type_name ==='Radio Type' ) {
                           print getRadio_type($data['question_next'][0]->question_id_fk);
                       }elseif ($data['question_next'][0]->question_type_name ==='Check Box Type' ) {
                           print getcheckbox_type($data['question_next'][0]->question_id_fk);
                       }elseif ($data['question_next'][0]->question_type_name ==='Dropdown Type' ) {
                           echo "<select id='' name='dropdowntype[]' >";
                           print getfields_type($data['question_next'][0]->question_id_fk);
                           echo "</select>";
                       }elseif ($data['question_next'][0]->question_type_name ==='Dropdown Multiple' ) {
                           echo "<select multiple>";
                           print getdropdownmultiple_type($data['question_next'][0]->question_id_fk);
                           echo "</select multiple>";
                       }elseif ($data['question_next'][0]->question_type_name ==='Text Type' ) {
                           print gettextbox_type($data['question_next'][0]->question_id_fk);
                       }elseif ($data['question_next'][0]->question_type_name ==='Textarea Type' ) {
                           print multiline_text_type($data['question_next'][0]->question_id_fk);
                       }
                    echo "</br>";

                    echo "<div class='row'>";
                    echo "<div class='col-md-8'></div>";
                    echo '<div class="col-md-2" >';
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo  '<button type="submit" id="nextform_'.$data['question_next'][0]->survey_flow_id.'" name="next_question"  class="btn btn-success btn-block next_form">Next</button>       ';
                    echo  '<button type="submit" id="editform_'.$data['question_next'][0]->survey_flow_id.'" name="edit_answer" class="btn btn-primary btn-block edit_form" style="display:none">Edit</button>';
                    echo  '<button type="submit" id="updateform_'.$data['question_next'][0]->survey_flow_id.'" name="update_answer" class="btn btn-primary btn-block update_form" style="display:none">Update</button>';
                    echo'</form>';
                    echo'</div>';

                       
        } else {
            echo "survey closed";
                 $this->session->sess_destroy();
        } 
    }
    
    
    
    public function check_suppression($quesion_id){
        
        $data['get_suppressed_questions'] = $this->survey_model->fetch_suppression_details($quesion_id);
        $data['user_detail'] = $this->survey_model->form_data($_SESSION['USER']);
         
            if(!empty($data['get_suppressed_questions'])){
                
                foreach ($data['get_suppressed_questions'] as $_suppress){

                        if($_suppress->suppression_type_name == 'PHONE SUPPRESSION'){

                                for($i=0;$i<count($data['get_suppressed_questions']);$i++){
                                    
                                    $data['get_suppressed_questions'][$i]->suppression_id;
                                    $data['user_detail'][0]->phone;
 
                                    $get_supress_feedback =$this->survey_model->find_suppression($data['get_suppressed_questions'][$i]->suppression_id,$data['user_detail'][0]->phone);
                                    
                                        if($get_supress_feedback === TRUE){
                                            $this->session->set_userdata('countarray', $this->session->countarray+1);
                                            return TRUE;
                                            
                                        }else{
                                            return FALSE;
                                        }
                                }
                        }else{
                            
                        } 
                } 
            } 

    }
    
    
    
    
    public function check_cappset(){
        
        
        $get_cap_id  = $this->cap_model->count_cappset();
        
        print_r($get_cap_id);
        
        foreach($get_cap_id as $val){
            $this->cap_model->get_cappset($val->id);
        }
        
       
        
        
        
        
        
    }
    
    
    
     
    
}

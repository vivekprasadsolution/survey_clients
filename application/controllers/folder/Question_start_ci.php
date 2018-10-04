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
    }
       
    public function index(){
        $this->session->unset_userdata('question_id');
         
        $this->survey_model->delete_items();    
        $this->survey_questions_probing();
    }
    
    public function survey_questions_probing(){
        $data['template'] = "survey/question_run.php";
        $data['survey'] = $this->survey_model->get_survey('1');
        
        $data['question'] =  $this->survey_model->getdata_questions();
        $data['question_initialize'] =  $this->survey_model->get_question_next(0);
       
        $data['count_questions'] =  $this->survey_model->record_count(1);
      
        
        $_SESSION['question_id']=array($data['question'][0]->linked_question_id);
        
        $this->session->set_userdata('countarray', 1);
        $this->session->set_userdata('records', count($data['count_questions']));  
        
        
        $this->load->view('base_html',$data);
        
    }
    
    
    public function next_question(){
        
         $merged_queries ='';
         $old_question_id = array();
         
         $question_id = $this->input->post('question_id');
         $indexed_id = $this->input->post('next_id');
         $linked_id = $this->input->post('linked_id'); 
         $extra_query = $this->input->post('seleted_checkbox');
         $question_initialize = $this->input->post('1_step_ahead_linked_id');
         $question_stepone_ranking = $this->input->post('1_step_ahead_rank_id');
     // 
         
      
        
        if(is_null($this->session->countarray)){
                 $this->survey_model->delete_items();          
        }else{
                
                 if($this->session->records > $this->session->countarray){

                                //SAVE THE LINKED ID IN SESSION ARRAY
                array_push($_SESSION['question_id'],$question_initialize);
                                 
                            // CHECK IF VALUE IS SAME IN THE DATABASE AS USER SUBMITTED 
    //**********************************************************************************************
    ///MAIN SECTION TO VALIDATE ANSWERE FEILDS
    //**********************************************************************************************    
                                
            $data['next_question'] = $this->survey_model->get_question_next($this->session->countarray - 1,$merged_queries);    
                           
            echo $data['next_question'][0]->question_id_fk;
                
            $next_question = $data['next_question'][0]->question_id_fk;
            
       ///     
         //TO BE WORKED ON AT HOME 
            $SQLTXT = "SELECT * FROM survey_question_flow WHERE question_id_fk=$next_question";
         //TO BE WORKED ON AT HOME    REQUIRED FIRST 
            

            for($i=0;$i<count($extra_query);$i++){
                $data_temp= array("linked_id"=> $next_question,
                            "qestion_id"=>$question_id,
                            "ans"=>$extra_query[$i]
                    );

                $this->survey_model->insert_temp($data_temp);    
            }
                                
       //     //TO BE WORKED ON AT HOME  
            
            echo "<pre>";
                                
                $data['getfields_answere_main'] = $this->survey_model->fields_answers_from_main($next_question);
                            
                print_r($data['getfields_answere_main']);
                
                
                
                
                
                            
                $data['getfields_answere_temp'] = $this->survey_model->fields_answers_from_temp($next_question);
                
                // print_r($data['getfields_answere_temp']);
                            
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
                            
                    $data['is_linked'] = $this->survey_model->linked_question($next_question); 
                            
                    //print_r($data['is_linked'][0]->linked_question_id);
                            
                    $is_linked = $data['is_linked'][0]->linked_question_id;
                    
                      if($is_linked !=='0'){
                          
                          
                            $data['check_field_contains'] =  $this->survey_model->check_items($next_question,$merged_queries);
                             
                            
                            print_r($data['check_field_contains']);
                            
                                    if($data['check_field_contains'] === TRUE){ 
                                        echo "YES MATCHED AND NOW I WILL DYSPLAY THE MATCHED QUESTION";

                                             $data['question_initialize_next'] =  $this->survey_model->get_question_next($question_stepone_ranking,$merged_queries);
                                             $data['question_next'] =  $this->survey_model->get_question_next($indexed_id,$merged_queries);

                                             $this->print_on_form($data);  
                                    }else{
                                        echo "NO IT WILL SKIP THE QUESTION";

                                           $data['question_initialize_next'] =  $this->survey_model->get_question_next($question_stepone_ranking,$merged_queries);
                                           $data['question_next'] =  $this->survey_model->get_question_next($indexed_id +1,$merged_queries);

                                         $this->print_on_form($data); 
                                    }    
                      }else{
                          
                             echo "NO IT WILL NORMLAL PRINT THE QUESTION";

                                           $data['question_initialize_next'] =  $this->survey_model->get_question_next($question_stepone_ranking,$merged_queries);
                                           $data['question_next'] =  $this->survey_model->get_question_next($indexed_id,$merged_queries);

                                         $this->print_on_form($data); 
                          
                      }      
                            

                           
                       }
                       else{
                           echo "survey closed";
                           $this->session->sess_destroy();
                       }
            } 
    }
   
   
    public function print_on_form($data){
        
        if($this->session->records > $this->session->countarray){    
            
            $this->session->set_userdata('countarray', $this->session->countarray+1);
            
                    echo "</br>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-12'>";
                    echo "<div id='linkedid-{$data['question_next'][0]->survey_flow_id}' class='form-control shadow'>";
                    echo "<form id='f{$data['question_next'][0]->survey_flow_id}' name='f{$data['question_next'][0]->survey_flow_id}' method='POST'>";
                    echo "<input type='text' name='question_id' value='{$data['question_next'][0]->question_id_fk}'>";
                    echo "<input type='text' name='next_id' value='{$data['question_next'][0]->flow_ranking}'>";
                    echo "<input type='text' name='linked_id' value='{$data['question_next'][0]->linked_question_id}'>";  
                    echo "<input type='text' name='1_step_ahead_linked_id' value='{$data['question_initialize_next'][0]->question_id_fk}'>";
                    echo "<input type='text' name='1_step_ahead_rank_id' value='{$data['question_initialize_next'][0]->flow_ranking}'>";
                    
                    echo "<h4>{$this->session->countarray}.{$data['question_next'][0]->question_text} <span class='fa fa-check-circle saved'></span></h4>";
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
    
     
    
}

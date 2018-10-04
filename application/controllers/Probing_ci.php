<?php



/**
 * Description of Probing_ci
 *
 * @author Vivek
 */
class Probing_ci extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('fetch_question');
        $this->load->helper('common_helper');
    }
    
    
    public function index(){
        $this->survey_questions_probing();
    }

        public function survey_questions_probing(){
            
        $data['template'] = "question/question_run.php";
        $data['question'] = $this->fetch_question->fetch_question_records('1','');
        
         // echo "<pre>";
         // print_r($data['question']);
       // $this->session->sess_destroy();
      

        
          if($this->input->post('next_question')== "next"){
              
                if($this->session->countarray <= count($data["question"])-1){
                    
                    if(is_null($this->session->question_count)){
                    
                            $this->session->set_userdata('countarray', 1);
                            $this->session->set_userdata('question_count', '0');
                            
                            $data['answer']= $this->fetch_question->get_question_answers($data['question'][$this->session->question_count]->question_id_fk); 
                            
                            $this->check_islinked();
                            
                            
                                
                    }else{
                        
                          if(($this->session->question_count)=== 0){  
                              
                          }else{
                            $this->session->set_userdata('countarray',$this->session->countarray + 1);
                            $this->session->set_userdata('question_count', $this->session->question_count+1);
                            $data['answer']= $this->fetch_question->get_question_answers($data['question'][$this->session->question_count]->question_id_fk); 
                          
                            
                          }
                             
                            
                    }
                }else{
                    
                       // echo "destroy session";
                        $this->session->sess_destroy();
                         $this->session->set_userdata('session_end','close');
                        
                        
                }
                      echo $this->session->countarray."</br>";
                      echo $this->session->question_id."</br>";
                      
                      
          }elseif ($this->input->post('skip_question')== "skip") {
              
                if($this->session->countarray <= count($data["question"])-1){
                    
                    if(is_null($this->session->question_count)){
                    //echo "nullllll";
                            $this->session->set_userdata('countarray', 1);
                            $this->session->set_userdata('question_count', '0');
                            
                
                 $data['answer']= $this->fetch_question->get_question_answers($data['question'][$this->session->question_count]->question_id_fk); 
                // print_r($data['answer']);
                 
                    }else{
                          if(($this->session->question_count)=== 0){ 
                            //$this->session->set_userdata('question_id',$data['question'][0]->question_id) ;
                            //echo "nullllll";
                          }else{
                            $this->session->set_userdata('countarray',$this->session->countarray + 1);
                            $this->session->set_userdata('question_count', $this->session->question_count+1);
                            $data['answer']= $this->fetch_question->get_question_answers($data['question'][$this->session->question_count]->question_id_fk); 
                           // print_r($data['answer']);
                            
                          }
                             
                            
                    }
                }else{
                    
                       // echo "destroy session";
                        $this->session->sess_destroy();
                         $this->session->set_userdata('session_end','close');
                        
                        
                }
                      echo $this->session->countarray."</br>";
                      echo $this->session->question_id."</br>";
          }
       
          
        $this->load->view('base_html',$data);
        
    }
    
    
    public function check_islinked(){
        $qs_count = $this->session->question_count;
        $data["link"] =  $this->fetch_question->db_ckeck_linked();
          
        if ($data["link"][$qs_count]->linked = "LINKED"){
            echo $data["link"][$qs_count]->linked_question_id;
        }
        
        
                          
        
    }
    
    
    
    
    
    
}

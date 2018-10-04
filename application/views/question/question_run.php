

<div class="container">

    <header class="section-header">
        <h3 class="section-title"></h3>
    </header>


    <div class="row portfolio-container" style="position: relative; height: 360px;">

        <div class="col-lg-10 col-md-6 portfolio-item filter-card wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
            <div class="portfolio-wrap">
                <div class="  panel panel-default">
                    <div class="panel-body">
                        
                    </div>
                </div>
                
                <form id="f1" method="post" action="">
                    <div class="col-md-10 ">
                    <?php if($this->session->session_end !== 'close')   :?>  
                     
                        <?php if(is_null($this->session->question_count))  :?>
                                    <h1><?php //isset($question[0]->question_text)? print $question[0]->question_text:  "null " ?></h1>
                                    <h1>Are You Ready to start the survey?</h1>
                                    <div class="col-md-3 pull-right">
                                        <input type="submit" name="next_question" value="next" class="form-control ">
                                    </div>
                        <?php else :?>
                                    <?php //var_dump($this->session->question_count) ?>
                                    <?php  ?>
                                    <h1><?php isset($this->session->question_count)? print $question[$this->session->question_count]->question_text:  "still null" ?></h1>
                                    <div class="form-group">
                                        <?php if($question[$this->session->question_count]->question_type_name ==='Radio Type' )  :?>
                                        
                                            <?php print getRadio_type($question[$this->session->question_count]->question_id_fk); ?>
                                        
                                        <?php elseif($question[$this->session->question_count]->question_type_name ==='Check Box Type' )  :?>
                                        
                                             <?php print getcheckbox_type($question[$this->session->question_count]->question_id_fk); ?>      
                                        
                                        <?php elseif($question[$this->session->question_count]->question_type_name ==='Dropdown Type' )  :?>
                                        
                                        <select id="" name="dropdown" >
                                            <?php print getfields_type($question[$this->session->question_count]->question_id_fk); ?>  
                                        </select>
                                        
                                        <?php elseif($question[$this->session->question_count]->question_type_name ==='Dropdown Multiple' )  :?>
                                            
                                            <select multiple  name="multiplecheck_box" >
                                            <?php print getdropdownmultiple_type($question[$this->session->question_count]->question_id_fk); ?>  
                                            </select>
                                        
                                        <?php elseif($question[$this->session->question_count]->question_type_name ==='Text Type' )  :?>
                                         
                                            <?php print gettextbox_type($question[$this->session->question_count]->question_id_fk); ?>  
                                        
                                        <?php elseif($question[$this->session->question_count]->question_type_name ==='Textarea Type' )  :?>
                                        
                                           <?php print multiline_text_type($question[$this->session->question_count]->question_id_fk); ?>  
                                        
                                        <?php endif;  ?>
                                        
                                    </div>
                                     
                     
                        <div class="row">
                            <div class="col-md-3">
                                 <input type="submit" name="skip_question" value="skip" class="form-control">
                            </div>
                            <div class="col-md-3">
                                 <input type="submit" name="next_question" value="next" class="form-control">
                            </div>
                        </div>  
                                    
                        <?php endif;   ?>   
                                 
                    </div>
                    
  
                    
                    <?php  else                            :?>
                        <h1>Thank you, Your survey is finished</h1>
                    <?php endif;                       ?>  
                </form>
                   
            </div>
        </div>

    </div>

</div>



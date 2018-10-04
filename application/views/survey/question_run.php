<style>
    
    .shadow {
  -moz-box-shadow:    3px 3px 5px 6px #ccc;
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;
  box-shadow:         3px 3px 5px 6px #ccc;
}
    
</style>    



<script>
    
    $(document).ready(function(){
     
       
       $(document).on("click","button.next_form", function(e){
           e.preventDefault();
           
           var buttonid  =(this).id;
           alert(buttonid.toString());
           var button_id  = buttonid.split('_');
           var controll_id = button_id[1];
                
            var form = this.form.id; 
            //alert(form + ' form submitted'); 
            var x = $('#'+form).serialize(); 
           // alert(x);
            
            
                     $.ajax({
                        url:base_url+"index.php/question_start_ci/next_question",
                        //data:'question_id='+id,
                        data:x,
                        method:"POST",
                          
                        success(result,status,xhr){
                                                
                                 // prevent_from_apped_duplicate(id);   
                                   $('#nextform_'+ controll_id).prop('disabled', true);
                                   
                                   $('#nextform_'+ controll_id).css("display","none"); 
                                   $('#editform_'+ controll_id).css("display","block");                                   
                                   
                                   alert('#nextform_'+controll_id);
                                   
                                   $("#"+form+" input").prop("disabled", true);
                                  

                                   $('span.saved').css({"color":"green"});             
                                   $('#form_container').append(result);
                                   
                            },
                        error(xhr,status,error){
                                 alert("error");
                            }
                        }); 
      
      
      
      
       });
       
       
    $(document).on("click","button.edit_form", function(e){
           e.preventDefault();
           
         
           var buttonid  =(this).id;
           alert(buttonid.toString());
           var button_id  = buttonid.split('_');
           var controll_id = button_id[1];
                 
                 
                 var form = this.form.id;
                 alert(form + ' form submitted');
                 var x = $('#'+form).serialize();

                 alert("editing");

                 $("#"+form+" input").prop("disabled", false);
                 $('#updateform_'+controll_id).css("display","block");  
                 $('#editform_'+controll_id).css("display","none");                                   
                 $('#nextform_'+controll_id).css("display","none"); 
                 
                     

            });

    
    
    $(document).on("click","button.update_form", function(e){
                   e.preventDefault();
                   
           var form = this.form.id; 
           // var x = $('#'+form).serialize(); 
           // alert(x);
            
        
        
        // getting button id  associated with elements 
        
           var buttonid  =(this).id;
           var button_id  = buttonid.split('_');
           var controll_id = button_id[1];
                 
                   
                        //a  =(this).id;
                         var form = this.form.id;
                         alert(form + ' form submitted');
                         var x = $('#'+form).serialize();


                         $("#"+form+" input").prop("disabled", false);
                         $('#updateform_'+controll_id).css("display","none");  
                         $('#editform_'+controll_id).css("display","block");                                   
                         $('#nextform_'+controll_id).css("display","none"); 

                            
                           var linked_question_id = $('#linked_questionid').val();   
                            alert(linked_question_id);  
                 
                  
                 
                       if (a === '0'){
                           $('#updateform_'+controll_id).css("display","none");  
                           $('#editform_'+controll_id).css("display","block");                                   
                           $('#nextform_'+controll_id).css("display","none"); 
                       }else{
                           $('#updateform_'+controll_id).css("display","none");  
                           $('#editform_'+controll_id).css("display","none");                                   
                           $('#nextform_'+controll_id).css("display","block"); 
                           $('#nextform_'+controll_id).prop('disabled', false);
                           
                            
                           $('#linkedid-'+linked_question_id).remove();
                           
                          
                       }
                            

                    });
    });
            
                   
            
    
    function prevent_from_apped_duplicate(){
        $("linkedid-"+id)
    }
    
    
</script>


<div class="container">
    
    <h1 align="center"><?php  echo $survey[0]->survey_name; ?></h1>
    
    
    
        
    <div class="box-body" id="form_container">      
        <div class="row"> 
            <div class="col-md-12 ">
                <div class="container form-control shadow">
                <form id="f1" name="form" method="POST">   
                    
                    <input type="text" name="question_id" value="<?php echo $question[0]->question_id_fk; ?>">
                    <input type="text" name="next_id" value="<?php echo $question[0]->flow_ranking; ?>">
                    <input type="text" name="linked_id" value="<?php echo $question[0]->linked_question_id; ?>">
                   
                    <div id="linkedid-<?php echo $question[0]->survey_flow_id; ?>" class=" form-group ">
                        <h4><?php echo $question[0]->flow_ranking; ?>.<?php echo $question[0]->question_text;?> <span class="fa  fa-check-circle saved"></span></h4>
                            <?php if($question[0]->question_type_name ==='Dropdown Type')  :?>
                        <select>
                            <?php print getfields_type($question[0]->question_id_fk); ?>
                        </select>
                            <?php elseif($question[0]->question_type_name ==='Check Box Type')  :?>
                            <?php print getcheckbox_type($question[0]->question_id_fk); ?>
                            <?php endif; ?>
                            

                        <div class="row">
                            <div class="col-md-8" ></div>
                            <!--
                            <div class="col-md-2" >
                                <button type="submit" id="<?php echo $question[0]->survey_flow_id;?>" name="update_answers" class="btn btn-primary btn-block update_form">Update</button>
                            </div>
                            -->
                            <div class="col-md-2" >
                            </div>
                            <div class="col-md-2">
                                
                                <button type="submit" id="nextform_<?php echo $question[0]->survey_flow_id;?>" name="next_question"  class="btn btn-success btn-block next_form">Next</button>
                                <button type="submit" id="editform_<?php echo $question[0]->survey_flow_id;?>" name="edit_answer" class="btn btn-primary btn-block edit_form" style="display:none">Edit</button>
                                <button type="submit" id="updateform_<?php echo $question[0]->survey_flow_id;?>" name="update_answer" class="btn btn-primary btn-block update_form" style="display:none">Update</button>
                            </div>
                
                        </div>
                    </div> 
                </form> 
                </div>
            </div>
        </div>
        
        <div class="append_data"></div>
        
    </div> 
        
    <div class="box-body pull-right" style=" padding-top: 40px">
        <div class="row">
            <div class="col-md-12 ">
                <button id="button_end" class="form-control btn-danger" > End survey </button> 
            </div>
        </div>
    </div>
    <br/>
    <br/>
</div>
<div id="results"></div>


<script>
// Declare base url
var base_url = '<?php echo base_url(); ?>';

</script>  

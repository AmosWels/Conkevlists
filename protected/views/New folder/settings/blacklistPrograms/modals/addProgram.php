<!--creating document types-->
<div id="create_program" class="modal modal-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <div class="modal-content">
        <h5>Add Blacklist Program</h5>
        <div class='row s12'>
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <div>
                            <input type="text" name="new-program-name" required="required" placeholder="Name">
                        </div>
                        <div>
                           <textarea name="new-program-description" class="materialize-textarea" required="required" placeholder="Description"></textarea>
                        </div>                       
                        <br/>
                    </div>
                </div>
            </div>
        </div>                               
    </div>
    <div class="form-group"> 
        <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
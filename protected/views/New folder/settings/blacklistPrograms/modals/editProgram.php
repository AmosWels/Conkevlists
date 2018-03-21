<!--edit document types-->
<div id="edit-program<?php echo $p; ?>" class="modal modal-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'edit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="program-id" value="<?php echo $blacklistprogram->id; ?>">

    <div class="modal-content">
        <h5>Edit Blacklist Program</h5>
        <div class='row s12'>
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <div>
                            <input type="text" name="edit-program-name" value="<?php echo $blacklistprogram->name; ?>" required="required" placeholder="Name">
                        </div>
                        <div>
                           <textarea name="edit-program-description" class="materialize-textarea" required="required" placeholder="Description"><?php echo $blacklistprogram->description; ?></textarea>
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
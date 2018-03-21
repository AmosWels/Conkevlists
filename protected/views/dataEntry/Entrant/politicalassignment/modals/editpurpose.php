<!-- submit document type -->
<div id="editpurpose<?php echo $newp; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="position" value="<?php echo $newp; ?>">
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Edit Purpose</h4>
        <div class="row s12">
            <div class="input-field col s12">
                <textarea placeholder="....." id="label1" name="purpose_new" class="materialize-textarea"><?php echo $purpose; ?></textarea>
                <label for="label1" class="active">Purpose <span class="red-text">*</span></label>
            </div>  
        </div> 
    </div>   
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>
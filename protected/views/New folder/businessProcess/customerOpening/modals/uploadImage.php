<!-- image upload -->
<?php $modelImage = new TImage; ?>
<div id="add_image" class="modal modal-fixed-footer" style="width: 350px; height: 380px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <input type="hidden" name="upload-image" value="<?php echo $previous_image_id;?>">

    <div class="modal-content" style="text-align: center;">
        <div class="fixed-action-btn vertical" style="top: 5px; right: 30px;">
            <label for="imageUpload">
                <span class="btn-floating btn-large grey tooltipped" aria-hidden="true" data-position="left" data-delay="50" data-tooltip="Browse Image">
                    <i class="large material-icons">photo</i>
                </span>
            </label>
        </div>
        
        <div id="wrapper" style="margin-top: 10px; ">
            <!--<input id="fileUpload" multiple="multiple" type="file"/>--> 
            <!--<input id="fileUpload" name="uploadedFile" type="file"/>-->
            <?php echo $form->fileField($modelImage, 'imageUpload', array('id' => 'imageUpload','required'=>'required','style'=>'display:none')); ?>
            <div id="image-holder" style="max-width: 100%; overflow-x: hidden; max-height: 380px; overflow-y: hidden;"></div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
    </div>
    <?php $this->endWidget(); ?>
</div>
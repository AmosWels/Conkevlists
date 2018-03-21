<div id="add_data" class="modal modal-fixed-footer" style="width:500px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Person</span> 
        <span class="grey-text" style="font-size: 11px;">Fields Marked with <span class="red-text">*</span> are required</span>
        <br>
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="displayname" name="new-name-person" type="text" required="required">
                <label for="displayname">Address<span class="red-text">*</span></label>
            </div>  
          </div>
        
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="gender" name="new-gender" type="text" required="required">
                <label for="gender">Gender<span class="red-text">*</span></label>
            </div>  
          </div>

          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="nationality" name="new-nationality" type="text" required="required">
                <label for="nationality">Nationality<span class="red-text">*</span></label>
            </div> 
          </div>
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="nationality" name="new-nationality" type="text" required="required">
                <label for="nationality">Marital Status<span class="red-text">*</span></label>
            </div> 
          </div>
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="nationality" name="new-nationality" type="text" required="required">
                <label for="nationality">Employer<span class="red-text">*</span></label>
            </div> 
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 
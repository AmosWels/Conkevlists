<div id="add-person" class="modal modal-fixed-footer" style="width:500px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Person</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="displayname" name="new-name-person" type="text" required="required">
                <label for="displayname">Display Name<span class="red-text">*</span></label>
            </div>  
          </div>
        
          <div class="row">
           <div class="input-field col s12">
                <select name="new-gender" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($persongender)) {
                    
                    foreach ($persongender as $record) {
                    ?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select>                
                <label>Gender <span class="red-text">*</span></label>
            </div> 
          </div>

          <div class="row">
                <div class="input-field col s12">
                <select name="new-nationality" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($countries)) {
                    
                    foreach ($countries as $record) {
                    ?>
                        <option value="<?php echo $record->code;?>"><?php echo $record->native;?></option>
                    <?php } } ?>
                </select> 
                <label>Nationality <span class="red-text">*</span></label>
                </div> 
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 
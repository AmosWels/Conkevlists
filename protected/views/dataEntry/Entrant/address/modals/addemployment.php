<!-- submit document type -->
<div id="addemployment<?php echo $position->id; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="personid" value="<?php echo$personid; ?>">
    <input type="hidden" name="citationid" value="<?php echo $citeid; ?>">
    <input type="hidden" name="position_id" value="<?php echo $position->id; ?>">
    <!--<div class="row s12 white">-->
    <div class="modal-content">
    <p class="grey-text text-darken-4">New Employment</span> <p>
        <code>Add</code> <span class="black-text"> <?php echo $personName; ?></span>
        <code>As the</code> <span class="black-text"><?php echo $position->name; ?> </span> <code> IN </code> <span class="black-text"><?php echo $organName; ?></span>
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="start_date" type="text" required="required"  class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'">
                <label for="mark1" class="active">End Date (y/m/d)</label>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="waves-effect waves-blue btn blue ">Save</button>
        <a href="#cancel" class="modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>
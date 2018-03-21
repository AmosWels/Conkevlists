<!-- submit document type -->
<div id="fields_map" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Enter Mapped Entry Fields</h4>
        <!--<span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>-->
        <p>Visit Reference: <a href="http://www.newvision.co.ug/tag/uganda-at-55/" target="_blank"/>www.newvision.co.ug</a></p>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-name" type="text">
                <label for="label">Name</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-author" type="text" disabled="disabled">
                <label for="label">Gender</label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-nation" type="text">
                <label for="label">Nationality</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-dob" type="text" disabled="disabled">
                <label for="label">Date of Birth</label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-Race" type="number" disabled="disabled">
                <label for="label">Race</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="label" name="new-tribe" type="text">
                <label for="label">Tribe<span class="red-text">*</span></label>
            </div>
        </div>
    </div>   
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>
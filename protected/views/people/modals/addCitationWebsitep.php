<div id="addcitationwebsite" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="citation-type" value="Website">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Website Citation</span> </br>
        <span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="label" name="new-author" type="text">
                <label for="label">Authors </label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="label" name="new-title-citation" type="text" required="required">
                <label for="label">Title <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="label" name="new-url" type="url" required="required">
                <label for="label">URL <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="new-publisher" type="text" required="required">
                    <label for="label">Publisher <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="new-ref-publisher" type="text">
                    <label for="label">Referenced Publisher</label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="new-date-published" type="text" required="required">
                    <label for="label">Date Published <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="new-date-accessed" type="text" required="required">
                    <label for="label">Date Accessed <span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 
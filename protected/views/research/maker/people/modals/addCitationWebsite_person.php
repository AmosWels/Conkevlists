<div id="add-citation-website-person" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="citation-type-person" value="Website">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Website Citation</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="authors" name="new-author-person" type="text">
                <label for="authors" class="active">Authors </label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="title" name="new-title-citation-person" type="text" required="required">
                <label for="title" class="active">Title <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="url" name="new-url-person" type="url" required="required">
                <label for="url" class="active">URL <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="publisher" name="new-publisher-person" type="text" required="required">
                    <label for="publisher" class="active">Publisher <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="rpublisher" name="new-ref-publisher-person" type="text">
                    <label for="rpublisher" class="active">Referenced Publisher</label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="mask1" name="new-date-published-person" type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="mask1" class="active">Date Published(y/m/d) <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="mark2" name="new-date-accessed-person" type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo date("Y/m/d"); ?>">
                    <label for="mark2" class="active">Date Accessed(y/m/d) <span class="red-text">*</span></label>
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
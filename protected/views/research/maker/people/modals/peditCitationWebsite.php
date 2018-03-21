<div id="pedit-citation-website<?php echo $record->id; ?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'edit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="website-citation-id-person" value="<?php echo $record->id; ?>">
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Website Citation</span> </br>
        <span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="aut" name="edit-author-person" type="text" value="<?php echo $record->authors; ?>">
                <label for="aut" class="active">Authors </label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="tit" name="edit-title-citation-person" type="text" required="required" value="<?php echo $record->title; ?>">
                <label for="tit" class="active">Title <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field">
                <input placeholder="....." id="ur" name="edit-url-person" type="url" required="required" value="<?php echo $record->url; ?>">
                <label for="ur" class="active">URL <span class="red-text">*</span></label>
            </div>  
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="pub" name="edit-publisher-person" type="text" required="required" value="<?php echo $record->publisher; ?>">
                    <label for="pub" class="active">Publisher <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="ref" name="edit-ref-publisher-person" type="text" value="<?php echo $record->ref_publisher; ?>">
                    <label for="ref" class="active">Referenced Publisher</label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="mark1" name="edit-date-published-person" type="text" required="required" value="<?php echo $record->publish_date; ?>" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="mark1" class="active">Date Published (y/m/d)<span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="mark2" name="edit-date-accessed-person" type="text" required="required" value="<?php echo $record->access_date; ?>" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="mark2" class="active">Date Accessed (y/m/d)<span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 
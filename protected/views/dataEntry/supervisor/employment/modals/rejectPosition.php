<!-- submit organization -->
<div id="rejectposition" class="modal" >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="rejectemployment-id" value="<?php echo $employmentid; ?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Reject <span class="grey-text"><span class="black-text"><?php echo $personName; ?></span> <code> As </code> <span class="black-text"><?php echo $positionnewName; ?></span>
                <code> IN </code> <span class="black-text"><?php echo $organName; ?></span> </h4>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="reject-reason" required="required" class="materialize-textarea"></textarea>
                <label for="pname" class="active"><span class="small">Enter Reason To reject</span></label>
            </div>  
        </div>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
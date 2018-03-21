<div id="takeUp<?php echo $record->id; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="record-id" value="<?php echo $record->id; ?>">
    <input  type="hidden" name="organizationtype-status" value="<?php // echo $citationValue->status; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; "><?php echo $citationValue->type; ?> Citation</h4>
        <p>Are you sure you want to take up citation with Title : </p>
        <li style="margin-left: 25px"><?php echo $citationValue->title; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
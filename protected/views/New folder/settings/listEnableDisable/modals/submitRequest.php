<!-- submit request -->
<div id="submit-request<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-request-id" value="<?php echo $record->id; ?>">
    <input  type="hidden" name="list-id" value="<?php echo $record->list; ?>">
    <input  type="hidden" name="request" value="<?php echo $record->request; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">List Action Confirmation</h4>
        <p>Are you sure you want to submit this request on the <?php echo $list->name; ?> List ?</p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
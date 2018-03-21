<!-- delete request -->
<div id="delete-request<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'delete-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-request-id" value="<?php echo $record->id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">List Action Confirmation</h4>
        <p>Are you sure you want to drop this request on the <?php echo $list->name; ?> List ? </p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
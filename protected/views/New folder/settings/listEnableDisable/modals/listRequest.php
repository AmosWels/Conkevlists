<!-- list request -->
<div id="list-request<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'request-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="request-list-id" value="<?php echo $record->id; ?>">
    <input  type="hidden" name="request" value="<?php switch ($record->status){case 'A': echo 'C';break; case 'C':echo 'A';break; }?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">List Action Confirmation</h4>
        <p>Are you sure you want to make changes to the <?php echo $record->name; ?> List search ? </p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat"> Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat"> No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
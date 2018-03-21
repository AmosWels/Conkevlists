<div id="sorry<?php echo $record->id; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="citation-id" value="<?php echo $record->id; ?>">
    <input  type="hidden" name="organizationtype-status" value="<?php // echo $record->status; ?>">
    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color:red">cancel</i></a>
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: red;">Sorry</h4>
        <p class="red-text">Sorry you cannot take up Position: </p>
        <li style="margin-left: 25px; color: red;"><?php echo $record->name; ?> ? </li>
    </div>
<?php $this->endWidget(); ?>
</div>
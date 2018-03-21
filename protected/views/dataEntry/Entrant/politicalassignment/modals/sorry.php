<div id="sorry<?php echo $record->id; ?>" class="modal" style="width: 380px;">
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
        <h4 style="font-size: 14px; color: red;"><?php echo $citeValue->type; ?> Citation</h4>
        <p class="red-text">Sorry you cannot take up citation with Title : </p>
        <li style="margin-left: 25px; color: red;"><?php echo $citeValue->title; ?> ? </li>
    </div>
<?php $this->endWidget(); ?>
</div>
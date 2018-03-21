<div id="sorry<?php echo $position->id; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="citation-id" value="<?php echo $position->id; ?>">
    <input  type="hidden" name="organizationtype-status" value="<?php // echo $record->status; ?>">
    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color:red">cancel</i></a>
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: red;">Warning</h4>
        <span class="grey-text">Sorry , <span class="black-text"><?php echo $personName; ?></span> has already been Added to <span class="black-text"><?php echo $organName; ?></span>
        As <span class="black-text"><?php echo $position->name; ?></span>
        </span>
    </div>
<?php $this->endWidget(); ?>
</div>
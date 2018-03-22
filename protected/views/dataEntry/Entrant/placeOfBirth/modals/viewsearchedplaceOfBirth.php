<div id="viewpob<?php echo $record->id; ?>" class="modal" style="width:1550px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h4 class="grey-text text-darken-4"><span class="blue-grey-text">City</span> &rtrif; <?php echo $cityresult; ?> </h4>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
            <span class="blue-grey-text">Country</span> &rtrif; <?php echo $countrynameresult . '. '; ?> 
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
        <span class="blue-grey-text">Other Details</span> &rtrif; <?php echo $otherdetailsresult . '. '; ?> 
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
    </div>
<?php $this->endWidget(); ?>
</div> 
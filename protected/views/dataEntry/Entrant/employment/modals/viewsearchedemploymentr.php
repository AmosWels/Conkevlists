<div id="viewemployment<?php echo $record->id; ?>" class="modal" style="width:1550px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4"><span class="blue-grey-text">Start Date</span> &rtrif; <?php echo $position; ?>  <span class="blue-grey-text">Organisation</span> &rtrif; <?php echo $orgname . '. '; ?> 
            <span class="blue-grey-text">Start Date</span> &rtrif; <?php echo $record->start_date; ?></h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
    </div>
<?php $this->endWidget(); ?>
</div> 
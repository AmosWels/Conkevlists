<div id="supervise<?php echo $record->id;?>" class="modal" >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="employment-id" value="<?php echo $record->id; ?>">
    <div class="modal-content" style="height: 180px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; "><?php echo $personName; ?> <small>Position</small></h4>
        <p>Are you sure you want to Supervise Position: </p>
        <li style="margin-left: 25px"><span class="black-text"><?php echo $positionName; ?> ? </span></li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
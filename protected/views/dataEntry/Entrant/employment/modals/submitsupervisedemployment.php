<div id="submitEmployment" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-supervision-id" value="<?php echo $employid; ?>">
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: green;">Submit Employment</h4>
        <p>Are you sure you are done correcting</p>
        <span class="grey-text"><span class="black-text"><?php echo $personName; ?></span> <code> AS A</code> <span class="black-text"><?php echo $postnName; ?></span>
            <code> IN </code> <span class="black-text"><?php echo $organName; ?> ? </span>
        </span>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
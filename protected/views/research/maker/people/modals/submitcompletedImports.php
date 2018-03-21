<!-- submit organization -->
<div id="add-people<?php echo count($approved); ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <input type="hidden" name="import-people" value="true">
    <input type="text" name="import-name" value="<?php echo $record->Name; ?>">
    <input type="text" name="import-nationality" value="<?php echo $record->Nationality; ?>">
    <input type="text" name="import-gender" value="<?php echo $record->Gender; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Comfirm Import</h4>
        <p>Do you confirm importing  </p>
        <li style="margin-left: 25px"><?php echo count($approved); ?>  People  ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
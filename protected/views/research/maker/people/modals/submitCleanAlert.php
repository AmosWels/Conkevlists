<!-- submit organization -->
<div id="submitcleanAlert<?php echo $recordname->id;?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="person-confirm-id" value="<?php echo $recordname->id;?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Confirm</h4>
        <p>Do you confirm that there is No duplicate of</p>
        <li style="margin-left: 25px"><?php echo $recordname->name;?> ?</li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
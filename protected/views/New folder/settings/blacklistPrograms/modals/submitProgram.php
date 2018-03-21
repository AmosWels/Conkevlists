<!-- submit document type -->
<div id="submit-program<?php echo $p; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-program-id" value="<?php echo $blacklistprogram->id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Blacklist Program</h4>
        <p>Are you sure you want to submit: </p>
        <li style="margin-left: 25px"><?php echo $blacklistprogram->name; ?> </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat"><i class="material-icons left">done</i>Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat"><i class="material-icons left">close</i>No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
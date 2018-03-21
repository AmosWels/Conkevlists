<!-- submit organization -->
<div id="finishposition" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<input type="hidden" name="submit-" value="submit">-->
    <input type="hidden" name="cposition_id" value="<?php echo $posid;?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Submit Position</h4>
        <p>Are you sure you are done correcting </p>
        <li style="margin-left: 25px"><?php echo $posname; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
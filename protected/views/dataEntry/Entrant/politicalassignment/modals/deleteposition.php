<div id="deleteposition" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-position-id" value="<?php echo $posid; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px;" class="red-text">Delete Position<i class="material-icons small right" style="color: red;">warning</i></h4>
        <p>Are you sure you want to Permanently Delete  : </p>
        <li style="margin-left: 25px"><?php echo $posname; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green red-text btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
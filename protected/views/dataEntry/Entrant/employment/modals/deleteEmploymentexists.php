<div id="deleteEmployment" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-employment-id" value="<?php echo $employid; ?>">
    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color:red">cancel</i></a>
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: red;">Warning</h4>
        <p>Are you sure you want to Delete</p>
        <span class="grey-text"><span class="black-text"><?php echo $personName; ?></span> <code> AS A</code> <span class="black-text"><?php echo $postnName; ?></span>
            <code> IN </code> <span class="black-text"><?php echo $organName; ?> ? </span>
        </span>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat red-text">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
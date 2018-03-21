<!-- submit organization -->
<div id="deletecitationmapping<?php echo $recordid; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-record-id-rejected" value="<?php echo $recordid; ?>">
    <input  type="hidden" name="person-id" value="<?php echo $personid; ?>">
    <div class="modal-content" style="height: 160px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">CITATION MAPPING<i class="material-icons right" style="color: red;">warning</i></h4>
        <p>Are you sure you want to <span class="red-text">delete</span> Citation Mapped to :</p>
        <p style="margin-left: 25px"><?php echo $attrName;?> ?</p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
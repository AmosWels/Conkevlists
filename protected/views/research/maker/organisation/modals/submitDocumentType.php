<!-- submit document type -->
<div id="submit-document<?php echo $d; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-document-id" value="<?php echo $documenttype->id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Document Type</h4>
        <p>Are you sure you want to submit: </p>
        <li style="margin-left: 25px"><?php echo $documenttype->name . ' (' . $documenttype->code . ')'; ?> </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat"><i class="material-icons left">done</i>Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat"><i class="material-icons left">close</i>No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
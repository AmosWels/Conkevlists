<!-- submit position -->
<div id="approveposition" class="modal" >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="employment_id_approve" value="<?php echo $employmentid; ?>">
    <div class="modal-content" style="height: 180px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">APPROVE</h4>
        <p>Are you sure you want to Approve </p>
        <span class="grey-text"><span class="black-text"><?php echo $personName; ?></span> <code> As </code> <span class="black-text"><?php echo $positionnewName; ?></span>
            <code> IN </code> <span class="black-text"><?php echo $organName; ?></span>
        </span>
    </div><br>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
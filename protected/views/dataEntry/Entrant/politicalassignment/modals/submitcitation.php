<!-- submit organization -->
<div id="submitcitation" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="submit-citation" value="submit">
    <input type="hidden" name="record-id-submit" value="<?php echo $organ_cite_id;?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Submit Citation</h4>
        <p>Are you sure you are done using </p>
        <li style="margin-left: 25px"><?php echo $organisation->title; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
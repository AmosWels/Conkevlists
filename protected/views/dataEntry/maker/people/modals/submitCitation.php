<!-- submit organization -->
<div id="submit-citation<?php echo $citation->id; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-citation-id" value="<?php echo $citation->id; ?>">
    <input  type="hidden" name="person-id-submit" value="<?php echo $personid; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">CITATION</h4>
        <p>Are you sure you want to <span class="green-text">submit</span>: </p>
        <li style="margin-left: 25px"><?php echo $citation->title; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<!-- submit organization -->
<div id="corrected-citation<?php echo $recordid; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-corrected-citation-id" value="<?php echo $recordid; ?>">
    <input  type="hidden" name="person-id-correct" value="<?php echo $personid; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">CORRECTED CITATION</h4>
        <p>Are you sure you want to finish<span class="green-text"> Correction </span> of : </p>
        <li style="margin-left: 25px"><?php echo $citation->title; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
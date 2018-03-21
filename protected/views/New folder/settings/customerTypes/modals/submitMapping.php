<!-- submit category mapping -->
<div id="submit-mapping<?php echo $t; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-category-id" value="<?php echo $mapping->id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; "><?php echo $customertype->name.' ('.$customertype->code.')'?></h4>
        <p>Are you sure you want to submit the mapping to: </p>
        <li style="margin-left: 25px"><?php echo $categoryname->name.' category'; ?> </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
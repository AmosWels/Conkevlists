<!-- delete category mapping -->
<div id="delete-mapping<?php echo $t; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'delete-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-category-id" value="<?php echo $mapping->id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; "><?php echo $customertype->name.' ('.$customertype->code.')'?></h4>
        <p>Are you sure you want to delete the mapping to: </p>
        <li style="margin-left: 25px"><?php echo $categoryname->name.' category'; ?> </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
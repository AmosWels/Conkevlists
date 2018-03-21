<!--add category mapping-->
<div id="add-mapping<?php echo $t; ?>" class="modal modal-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 395.652px; width: 300px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="customer-type" value="<?php echo $customertype->code; ?>">

     <div class="modal-content">
        <span>Select Customer Category</span>
        <div class="card">
            <div class="card-content">
                
                <div>
                    <?php if(!empty($customercategories)) {
                     $c=1;
                    foreach ($customercategories as $item)  {
                    ?>
                    <input type="radio" name="new-category-mapping" value="<?php echo $item->id; ?>" id="<?php echo 'add'.$t.$c; ?>" required="required" />
                    <label for="<?php echo 'add'.$t.$c; ?>"><?php echo $item->name; ?></label><br>
                    <?php $c++; } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group"> 
        <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
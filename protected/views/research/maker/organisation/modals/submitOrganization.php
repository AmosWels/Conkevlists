<!-- submit organization -->
<div id="submit-organization<?php echo $organization->id; ?>" class="modal" >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-organization-id" value="<?php echo $organization->id; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Organization</h4>
        <p>Are you sure you want to submit: </p>
        <li style="margin-left: 25px"><?php echo $organization->name; ?> ? </li>
        <!--<span style="margin-left: 48px">(<?php // echo $type->name; ?>)</span>-->
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
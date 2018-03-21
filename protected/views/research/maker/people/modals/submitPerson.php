<!-- submit organization -->
<div id="submit-person<?php echo $person->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<input  type="hidden" name="submit-person-id" value="<?php // echo $personfield->id; ?>">-->
    <input type="hidden" name="submit-person-id" value="<?php echo $person->id; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Person</h4>
        <p>Are you sure you want to submit </p>
        <?php // foreach ($personfield as $personfields){ ?>
        <li style="margin-left: 25px"><?php echo $person->name; ?> ? </li>
        <?php // } ?>
        <!--<span style="margin-left: 48px">(<?php // echo $type->name; ?>)</span>-->
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
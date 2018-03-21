<!-- submit organization -->
<div id="submit-imports" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<input  type="hidden" name="submit-person-id" value="<?php // echo $personfield->id; ?>">-->
    <input type="hidden" name="resolve-imported-people" value="true">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Imported People</h4>
        <p>Are you sure you want to Resolve ?</p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
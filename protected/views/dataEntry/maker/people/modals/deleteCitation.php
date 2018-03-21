<!-- submit organization -->
<div id="deletecitation<?php echo $citation->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-citation-id" value="<?php echo $citation->id; ?>">
    <input  type="hidden" name="person-id" value="<?php echo $personid; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">CITATION<i class="material-icons right" style="color: red;">warning</i></h4>
        <p>Are you sure you want to <span class="red-text">delete</span> Citation:</p>
        <li style="margin-left: 25px"><?php echo $citation->title; ?> ? <br></li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<div id="orgname" class="modal" style="width:1550px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4"><span class="blue-grey-text">Name</span> &rtrif; <?php echo $cityresult; ?>  
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
    </div>
<?php $this->endWidget(); ?>
</div> 
<div id="vieworganname" class="modal" style="width:1550px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

     <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
          <div class="row s12">
              <label class="col s2" for="gender">Name :</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $organName; ?></span>
          </div>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
    </div>
<?php $this->endWidget(); ?>
</div> 
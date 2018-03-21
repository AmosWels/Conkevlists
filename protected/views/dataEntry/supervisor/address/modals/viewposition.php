<div id="position<?php echo $positions->id;?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4"><?php // echo $posname; ?></h6>
        <!--<hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">-->
          <div class="row s12">
              <label class="col s2" for="gender">Name:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $pname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
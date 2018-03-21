<div id="viewprof" class="modal" style="width:1550px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4">POSITION PROFILE</h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
          <div class="row s12">
              <label class="col s2" for="gender">Position:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $name; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Organisation:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $organname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Date Created:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $position->start_date; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Date Closed:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $position->end_date; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">level:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $levelname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Obtained from Url:</label> <span class="col s10" style="color: black; font-size: 13px"><a href="<?php echo $citation->url; ?>" target="blank" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $citation->url; ?></a></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
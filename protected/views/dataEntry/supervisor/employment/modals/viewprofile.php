<div id="viewprof" class="modal" style="width:1550px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right tooltipped" data-position="left" data-delay="50" data-tooltip="Close" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4">PERSON PROFILE</h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
          <div class="row s12">
              <label class="col s2" for="gender">Name:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $personName; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Nationality:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $nationalityname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Gender:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $gendername; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Created on:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $personValue->createdon; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation title:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $personciteValue->title; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Url:</label> <span class="col s10" style="color: black; font-size: 13px"><a href="<?php echo $personciteValue->url; ?>" target="blank" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $personciteValue->url; ?></a></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
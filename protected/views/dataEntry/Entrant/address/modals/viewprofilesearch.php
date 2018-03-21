<div id="viewprof" class="modal" style="width:1550px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4"><?php echo $personName; ?></h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
          <div class="row s12">
              <label class="col s2" for="gender">Nationality:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $nationalityname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Gender:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $gendername; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Title:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $personValue->title; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Publish Date:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo date_format(date_create($personValue->publish_date), "d / F / Y") . '.'; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Link:</label> <a href="<?php echo $personValue->url;?>" target="blank" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="col s10" style="color: black; font-size: 13px"><?php echo $personValue->url; ?></a><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
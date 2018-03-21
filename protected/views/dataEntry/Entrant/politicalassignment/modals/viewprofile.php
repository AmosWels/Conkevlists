<div id="viewprof" class="modal" style="width:1550px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4"><?php echo $organName; ?></h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
          <div class="row s12">
              <label class="col s2" for="gender">Type:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $typename; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Country:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $countryname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Title:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $organisation->title; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Publish Date:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo date_format(date_create($organisation->publish_date), "d / F / Y") . '.'; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Link:</label> <a target="blank" href="<?php echo $organisation->url; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="col s10" style="font-size: 13px"><?php echo $organisation->url; ?></a><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
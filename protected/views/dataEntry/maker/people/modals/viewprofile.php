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
              <label class="col s2" for="gender">Gender:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $gendername; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Country:</label> <span class="col s10" style="color: black; font-size: 13px"><?php echo $countryname; ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Title:</label> <span class="col s10" style="color: black; font-size: 13px"><?php if(!empty($profileCite)){ echo $profileCite->title; } else{     echo '. . . .'; } ?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Publish Date:</label> <span class="col s10" style="color: black; font-size: 13px"><?php if(!empty($profileCite)){ echo date_format(date_create($profileCite->publish_date), "d / F / Y") . '.'; } else{     echo '. . . .'; }?></span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s2" for="gender">Citation Link:</label> <?php if(!empty($profileCite)){ ?><a href="<?php echo $profileCite->url; ?>" target="blank" class="col s10" style="font-size: 13px" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $profileCite->url; ?></a><?php } else { echo '. . . .';} ?><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<!--    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>-->
<?php $this->endWidget(); ?>
</div> 
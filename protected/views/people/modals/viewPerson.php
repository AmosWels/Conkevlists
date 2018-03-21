<div id="viewdata" class="modal" style="width:500px; top: 250.516304347826px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h6 class="grey-text text-darken-4">Muhabura Patrick Profile</h6>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
          <div class="row">
              <label class="col s4" for="gender">First Name:</label> <span class="col s8" style="color: black; font-size: 13px">Muhabura</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Last Name:</label> <span class="col s8" style="color: black; font-size: 13px">Patrick</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Gender:</label> <span class="col s8" style="color: black; font-size: 13px">Male</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Nationality:</label> <span class="col s8" style="color: black; font-size: 13px">Ugandan</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Address:</label> <span class="col s8" style="color: black; font-size: 13px">Nakawa, Akamwesi</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Dependants:</label> <span class="col s8" style="color: black; font-size: 13px">6</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Marital Status:</label> <span class="col s8" style="color: black; font-size: 13px">Married</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Employer:</label> <span class="col s8" style="color: black; font-size: 13px">Enovate Soft Ltd</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Residence:</label> <span class="col s8" style="color: black; font-size: 13px">___________</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
              <label class="col s4" for="gender">Hobbies:</label> <span class="col s8" style="color: black; font-size: 13px">___________</span><br>
              <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
          </div>
    </div>
<!--    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>-->
<?php $this->endWidget(); ?>
</div> 
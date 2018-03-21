<!-- submit document type -->
<div id="editprofile<?php echo $newp; ?>" class="modal modal-fixed-footer" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="position_id" value="<?php echo $newp; ?>">
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Edit Profile</h4>
        <div class="row s12">
            <div class="input-field col s12">
                <input id="pname" name="position_name_new" type="text" value="<?php echo $newposition->name; ?>">
                <label for="pname" class="active">Name </label>
            </div>  
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="program_new">    
                    <option value="<?php echo $Pid; ?>"><?php echo $Pname; ?></option>
                    <?php
                    if (!empty($programs)) {

                        foreach ($programs as $program) {
                            ?>
                            <option value="<?php echo $program->id; ?>"><?php echo $program->name; ?></option>
                        <?php
                        }
                    }
                    ?>
                </select>                
                <label>Program <span class="red-text">*</span></label>
            </div> 
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="organisation_new">    
                    <option value="<?php echo $Orgid; ?>"><?php echo $orgname; ?></option>
                    <?php
                    if (!empty($organisations)) {

                        foreach ($organisations as $organ) {
                            ?>
                            <option value="<?php echo $organ->id; ?>"><?php echo $organ->name; ?></option>
                        <?php
                        }
                    }
                    ?>
                </select> 
                <label>Organisation <span class="red-text">*</span></label>
            </div> 
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="level_new">    
                    <option value="<?php echo $Lid; ?>"><?php echo $Lname; ?></option>
                    <?php
                    if (!empty($levels)) {

                        foreach ($levels as $level) {
                            ?>
                            <option value="<?php echo $level->id; ?>"><?php echo $level->name; ?></option>
                        <?php
                        }
                    }
                    ?>
                </select> 
                <label>Level <span class="red-text">*</span></label>
            </div> 
            <div class="input-field col s6">
                <select name="weight_new">    
                    <option value="<?php echo $Wid; ?>"><?php echo $Wname; ?></option>
                    <?php
                    if (!empty($weights)) {

                        foreach ($weights as $weight) {
                            ?>
                            <option value="<?php echo $weight->id; ?>"><?php echo $weight->name; ?></option>
    <?php
    }
}?>

?>
                </select> 
                <label>Weight <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="start_date_new" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $start_date; ?>">
                <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="end_date_new" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $end_date; ?>">
                <label for="mark1" class="active">End Date (y/m/d)<span class="red-text">*</span></label>
            </div>
        </div>
    </div>   
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
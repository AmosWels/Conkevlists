<!-- submit document type -->
<div id="editprofile<?php echo $newp; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="person_id" value="<?php echo $newp; ?>">
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Edit Profile</h4>
        <div class="row s12">
            <div class="input-field col s12">
                <input id="pname" name="person_name_new" type="text" value="<?php echo $newperson->Name; ?>">
                <label for="pname" class="active">Name </label>
            </div>  
        </div>
        <div class="row s12">
            <div class="input-field col s12">
                <select name="person_nationality_new">    
                    <option value="<?php echo $nid; ?>"><?php echo $nationalityname; ?></option>
                    <?php
                    if (!empty($countries)) {

                        foreach ($countries as $record) {
                            ?>
                            <option value="<?php echo $record->code; ?>"><?php echo $record->native; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select> 
                <label>Nationality</label>
            </div> 
        </div>
        <div class="row s12">
            <div class="input-field col s12">
                <select name="person_gender_new">    
                    <option value="<?php echo $gender_id; ?>"><?php echo $gendername; ?></option>
                    <?php
                    if (!empty($persongender)) {

                        foreach ($persongender as $record) {
                            ?>
                            <option value="<?php echo $record->id; ?>"><?php echo $record->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>                
                <label>Gender </label>
            </div>
        </div>
    </div>   
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>
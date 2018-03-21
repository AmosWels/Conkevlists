<!-- submit document type -->
<div id="editemployment<?php echo $newp; ?>" class="modal" style="width: 800px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="person_id" value="<?php echo $newp; ?>">
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Edit Employment</h4>
        <div class="input-field row s12">
            <div class="input-field col s12">
                <select name="position_new" >    
                    <option value="<?php echo $position; ?>"><?php echo $positionname; ?></option>
                    
                    <?php
                    if (!empty($ppositions)) { ?>
                    
                    <?php
                        foreach ($ppositions as $pposition) {
                            $organid = $pposition->organization;
                            $organval = TOrganization::model()->findByPk($organid);
                            $organname = $organval->name;
                            ?>
                    <!--<optgroup label="<?php // echo $organname; ?>">-->
                    <option value="<?php echo $pposition->id; ?>"><?php echo $pposition->name; ?> &rtrif; <?php echo $organname; ?> </option>
                    <!--</optgroup>-->
                                <?php
                        } ?>
                    
                <?php    }
                    ?>
                </select>                
                <label>Position</label>
            </div> 
        </div> 
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="label" name="position_details_new" type="text" value="<?php echo $details; ?>">
                <label for="label" class="active">Details</label>
            </div>  
        </div> 
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="startdate" type="text" name="position_startdate_new" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $startdate; ?>">
                <label for="startdate" class="active">Start date (y/m/d)</label>
            </div>
        </div> 
        <div class="row s12">
            <div class="input-field col s12">
                <input placeholder="....." id="enddate" type="text" name="position_enddate_new" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $enddate; ?>">
                <label for="enddate" class="active">End date (y/m/d)</label>
            </div>
        </div> 
    </div>   
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div>

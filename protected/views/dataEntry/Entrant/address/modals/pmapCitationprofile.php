<!-- submit document type -->
<div id="pmap-citation-profile<?php echo $record->id; ?>" class="modal modal-footer" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
   <input  type="hidden" name="citation-profilefields-mapping" value="True">
    <input type="hidden" name="citation-id" value="<?php echo $record->id; ?>">
    <!--profile fields-->
    <input  type="hidden" name="profilefields-count" value="<?php echo count($Profilefields); ?>">
    <input type="hidden" name="first_profile_mapping" value="<?php echo ($profilemapping_set); ?>">
    <!--address fields-->
<!--    <input  type="hidden" name="citation-addressfields-mapping" value="True">-->
    <!--<input  type="hidden" name="addressfields-count" value="<?php // echo count($Addressfields); ?>">-->
    <!--<input type="hidden" name="first_address_mapping" value="<?php // echo ($addressmapping_set); ?>">-->

    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Profile Mappings</h4>
        <p>Select reference mappings: </p>
        <div class="row s12">
            <!--<div class="col s3">-->
                <!--<span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Profile</span><br/>-->
                <?php
                if (!empty($Profilefields)) {
                    $i = 1;
                    $profilefields_arraymap = explode(",", $profilemapping_set);
                    foreach ($Profilefields as $profilefield) {
                        ?>
                        <input type="checkbox" <?php if (in_array($profilefield->id, $profilefields_arraymap)) {echo "checked";} ?> id="<?php echo 'profileField' . $record->id . $profilefield->id; ?>" name="profileField<?php echo $i; ?>" value="<?php echo $profilefield->id; ?>" />
                        <label for="<?php echo 'profileField' . $record->id . $profilefield->id; ?>"><?php echo $profilefield->Name; ?></label><br/>
                        <?php
                        $i++;
                    }
                }
                ?>
            <!--</div>-->
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
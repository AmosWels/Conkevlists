<!-- submit document type 
<div id="pmap-citation<?php echo $record->id; ?>" class="modal modal-fixed-footer" style="width: 900px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="citation-profilefields-mapping" value="True">
    <input type="hidden" name="citation-id" value="<?php // echo $record->id; ?>">
    profile fields
    <input  type="hidden" name="profilefields-count" value="<?php // echo count($Profilefields); ?>">
    <input type="hidden" name="first_profile_mapping" value="<?php // echo ($profilemapping_set); ?>">
    address fields
    <input  type="hidden" name="citation-addressfields-mapping" value="True">
    <input  type="hidden" name="addressfields-count" value="<?php // echo count($Addressfields); ?>">
    <input type="text" name="first_address_mapping" value="<?php // echo ($addressmapping_set); ?>">

    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Mappings</h4>
        <p>Select reference mappings: </p>
        <div class="row s12">
            <div class="col s3">
                <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Profile</span><br/>
                <?php
//                if (!empty($Profilefields)) {
//                    $i = 1;
//                    $profilefields_arraymap = explode(",", $profilemapping_set);
//                    foreach ($Profilefields as $profilefield) {
                        ?>
                        <input type="checkbox" <?php // if (in_array($profilefield->id, $profilefields_arraymap)) {echo "checked";} ?> id="<?php // echo 'profileFieldc' . $record->id . $profilefield->id; ?>" name="profileFieldc<?php // echo $i; ?>" value="<?php // echo $profilefield->id; ?>" />
                        <label for="<?php // echo 'profileFieldc' . $record->id . $profilefield->id; ?>"><?php echo $profilefield->Name; ?></label><br/>
                        <?php
                        $i++;
//                    }
//                }
                ?>
            </div>
            <div class="col s3">
                <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Address</span><br/>
                <?php
//                if (!empty($Addressfields)) {
//                    $a = 1;
//                    $addressfields_arraymap = explode(",", $addressmapping_set);
//                    foreach ($Addressfields as $Addressfield) {
//                        ?>
                        <input type="checkbox" <?php // if (in_array($research->id, $mapping_array)) { echo "checked";} ?>  id="<?php // echo 'AddressFields' . $record->id . $Addressfield->id; ?>" name="AddressFields<?php // echo $a; ?>" value="<?php // echo $Addressfield->id; ?>" />
                        <label for="<?php // echo 'AddressFields' . $record->id . $Addressfield->id; ?>"><?php // echo $Addressfield->Name; ?></label><br/>
                        <?php
                        $a++;
//                    }
//                }
                ?>
            </div>
            <div class="col s3">
                <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Contacts</span><br/>
                <?php
//                if (!empty($Contactsfields)) {
//                    $b = 1;
//            $mapping_array = explode(",", $mapping_set);
//                    foreach ($Contactsfields as $Contactsfield) {
                        ?>
                        <input type="checkbox" <?php // if (in_array($research->id, $mapping_array)) { echo "checked";}   ?> id="<?php // echo 'Contactfield' . $record->id . $Contactsfield->id; ?>" name="Contactfield<?php // echo $b; ?>" value="<?php // echo $Contactsfield->id; ?>" />
                        <label for="<?php // echo 'Contactfield' . $record->id . $Contactsfield->id; ?>"><?php // echo $Contactsfield->Name; ?></label><br/>
                        <?php
//                        $b++;
//                    }
//                }
                ?>
            </div>
            <div class="col s3">
                <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Education</span><br/>
                <?php
//                if (!empty($Educationfields)) {
//                    $c = 1;
//            $mapping_array = explode(",", $mapping_set);
//                    foreach ($Educationfields as $Educationfield) {
                        ?>
                        <input type="checkbox" <?php // if (in_array($research->id, $mapping_array)) { echo "checked";}   ?> id="<?php // echo 'Educationfieldz' . $record->id . $Educationfield->id; ?>" name="Educationfieldz<?php echo $c; ?>" value="<?php // echo $Educationfield->id; ?>" />
                        <label for="<?php // echo 'Educationfieldz' . $record->id . $Educationfield->id; ?>"><?php // echo $Educationfield->Name; ?></label><br/>
                        <?php
//                        $c++;
//                    }
//                }
                ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>-->
<!-- submit document type -->
<div id="pmap-citation-contacts<?php echo $record->id; ?>" class="modal modal-footer" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="citation-contactsfields-mapping" value="True">
    <input type="hidden" name="citation-id" value="<?php echo $record->id; ?>">
    <!--address fields-->
    <input  type="hidden" name="contactsfields-count" value="<?php echo count($Contactsfields); ?>">
    <input type="hidden" name="first_contacts_mapping" value="<?php echo ($contactsmapping_set); ?>">

    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Contacts Mappings</h4>
        <p>Select reference mappings: </p>
        <div class="row s12">
            <!--<div class="col s3">-->
<!--                <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Contacts</span><br/>-->
            <?php
            if (!empty($Contactsfields)) {
                $b = 1;
            $Contactsfields_arraymap = explode(",", $contactsmapping_set);
                foreach ($Contactsfields as $Contactsfield) {
                    ?>
                    <input type="checkbox" <?php if (in_array($Contactsfield->id, $Contactsfields_arraymap)) { echo "checked";}    ?> id="<?php echo 'ContactField' . $record->id . $Contactsfield->id; ?>" name="ContactField<?php echo $b; ?>" value="<?php echo $Contactsfield->id; ?>" />
                    <label for="<?php echo 'ContactField' . $record->id . $Contactsfield->id; ?>"><?php echo $Contactsfield->Name; ?></label><br/>
                    <?php
                    $b++;
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
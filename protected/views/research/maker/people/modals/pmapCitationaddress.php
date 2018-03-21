<!-- submit document type -->
<div id="pmap-citation-address<?php echo $record->id; ?>" class="modal modal-footer" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="citation-addressfields-mapping" value="True">
    <input type="hidden" name="citation-id" value="<?php echo $record->id; ?>">
        <!--address fields-->
    <input  type="hidden" name="addressfields-count" value="<?php echo count($Addressfields); ?>">
    <input type="hidden" name="first_address_mapping" value="<?php echo ($addressmapping_set); ?>">

    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Address Mappings</h4>
        <p>Select reference mappings: </p>
        <div class="row s12">
            <!--<div class="col s3">-->
<!--                <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Address</span><br/>-->
                <?php
                if (!empty($Addressfields)) {
                    $a = 1;
                    $addressfields_arraymap = explode(",", $addressmapping_set);
                    foreach ($Addressfields as $Addressfield) {
                        ?>
                        <input type="checkbox" <?php if (in_array($Addressfield->id, $addressfields_arraymap)) { echo "checked";} ?>  id="<?php echo 'AddressFields' . $record->id . $Addressfield->id; ?>" name="AddressFields<?php echo $a; ?>" value="<?php echo $Addressfield->id; ?>" />
                        <label for="<?php echo 'AddressFields' . $record->id . $Addressfield->id; ?>"><?php echo $Addressfield->Name; ?></label><br/>
                        <?php
                        $a++;
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
<!--Selecting account opening documents-->
<div id="map-documenttype<?php echo $r.$ct; ?>" class="modal modal-footer">
    <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'map-document-form',
                'enableAjaxValidation'=>false,
        )); ?>
    
    <input type="hidden" name="info-id" value="<?php echo $requirement->id; ?>">
    <input type="hidden" name="irct-id" value="<?php echo $clienttype_mapping->id; ?>">
    <input type="hidden" name="old-documenttype-mapping-set" value="<?php echo rtrim($documenttype_mapping_set,","); ?>">
    <input type="hidden" name="documenttype-count" value="<?php echo count($documenttypes); ?>">
    
        <div class="card">
            <div class="card-content">
                <!--<div class="modal-content">-->
                <div class="row s12">
                    <h5>Document Type</h5>
                    <?php
                    if (!empty($documenttypes)) {
                        $documenttypeMappingArray = explode(',', $documenttype_mapping_set);
                        $dt = 1;
                        foreach ($documenttypes as $documenttype) {
                    ?>
                        <input type="checkbox" <?php if (in_array("$documenttype->id", $documenttypeMappingArray)) {
                        echo "checked";
                    } ?> name="documentType<?php echo $dt; ?>" value="<?php echo $documenttype->id; ?>" id="<?php echo 'map-documenttype' . $r . $ct . $dt; ?>"/>
                            <label for="<?php echo 'map-documenttype' . $r . $ct . $dt; ?>"><?php echo $documenttype->name; ?></label><br/>
                            <?php
                            $dt++;
                        }
                    }
                    ?>
                </div>
                <!--</div>-->                                 
            </div>
        </div>
        <div class="form-group"> 
            <div class="modal-footer">
                 <button type="submit" class="btn waves-effect waves-blue blue">Save</button>
                <!--<a href="#" class="modal-action waves-effect waves-blue btn-flat ">Reset</a>-->
                <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
            </div>
        </div>
    <?php $this->endWidget(); ?>
</div>
<!--edit document types-->
<div id="edit-document<?php echo $d; ?>" class="modal modal-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'edit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="doc-type-id" value="<?php echo $documenttype->id; ?>">
    <input type="hidden" name="old-metadata-mapping-set" value="<?php echo rtrim($metadata_mapping_set,","); ?>">
    <input type="hidden" name="metadata-count" value="<?php echo count($metadatas); ?>">

    <div class="modal-content">
        <h5>Add Document Type</h5>
        <div class='row s12'>
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
                        <div>
                            <input type="text" name="edit-document-name" value="<?php echo $documenttype->name; ?>"required="required" placeholder="Name">
                        </div>
                        <div>
                            <input type="text" name="edit-document-code" value="<?php echo $documenttype->code; ?>" required="required" placeholder="Code">
                        </div>                       
                        <br/>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 right">
                <span>Select Required Meta Data</span><br/>                
                <?php
                if (!empty($metadatas)) {
                    $metadataMappingArray = explode(',', $metadata_mapping_set);
                    $md = 1;
                    foreach ($metadatas as $metadata) {
                        ?>
                        <input type="checkbox" <?php if (in_array("$metadata->id", $metadataMappingArray)) {
                    echo "checked";
                } ?> name="metaData<?php echo $md; ?>" value="<?php echo $metadata->id; ?>" id="<?php echo 'edit-metadata' . $d . $md; ?>"/>
                        <label for="<?php echo 'edit-metadata' . $d . $md; ?>"><?php echo $metadata->name; ?></label><br/>
                        <?php
                        $md++;
                    }
                }
                ?>
            </div>
        </div>                               
    </div>
    <div class="form-group"> 
        <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div> 
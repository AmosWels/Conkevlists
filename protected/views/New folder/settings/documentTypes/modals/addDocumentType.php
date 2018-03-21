<!--creating document types-->
<div id="create_document" class="modal modal-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="metadata-count" id="metadata-count" value="<?php echo count($metadatas); ?>">

    <div class="modal-content">
        <h5>Add Document Type</h5>
        <div class='row s12'>
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
                        <div>
                            <input type="text" name="new-document-name" required="required" placeholder="Name">
                        </div>
                        <div>
                            <input type="text" name="new-document-code" required="required" placeholder="Code">
                        </div>                       
                        <br/>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 right">
                <span>Select Required Meta Data</span><br/>                
                <?php
                if (!empty($metadatas)) {
                    $md = 1;
                    foreach ($metadatas as $metadata) {
                        ?>
                        <input type="checkbox" name="metaData<?php echo $md; ?>" value="<?php echo $metadata->id; ?>" id="<?php echo 'new-metadata' . $metadata->id; ?>"/>
                        <label for="<?php echo 'new-metadata' . $metadata->id; ?>"><?php echo $metadata->name; ?></label><br/>
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
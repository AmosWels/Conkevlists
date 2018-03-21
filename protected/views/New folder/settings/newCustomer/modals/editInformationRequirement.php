<!--edit information requirement-->
<div id="edit_info<?php echo $r; ?>" class="modal modal-fixed-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px;">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'edit-form',
                'enableAjaxValidation'=>false,
        )); ?>
        <input  type="hidden" name="info-id" value="<?php echo $requirement->id; ?>">
        <input type="hidden" name="old-clienttype-mapping-set" value="<?php echo rtrim($clienttype_mapping_set,","); ?>">
        <input type="hidden" name="clienttype-count" value="<?php echo count($clienttypes); ?>">

        <div class="modal-content">
            <h5>Edit Information Requirement</h5>
            <div class="card">
                <div class="card-content">
                    <div class="row s12">
                        <div class="col s12 m6">
                            <div class="input-field col s12">
                                <input  type="text" name="edit-information-name" required="required" value="<?php echo $requirement->name; ?>" placeholder="Name">
                            </div>
                            <div class="input-field col s12">
                                <textarea name="edit-information-description" class="materialize-textarea" required="required" placeholder="Description"><?php echo $requirement->description; ?></textarea>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <span>Select Customer Types</span><br/>
                            <?php
                            if (!empty($clienttypes)) {
                                $clienttypeMappingArray = explode(',', $clienttype_mapping_set);
                                $ct = 1;
                                foreach ($clienttypes as $clienttype) {
                                    ?>
                                    <input type="checkbox" <?php if (in_array("$clienttype->code", $clienttypeMappingArray)) {
                                echo "checked";
                            } ?> name="clientType<?php echo $ct; ?>" value="<?php echo $clienttype->code; ?>" id="<?php echo 'edit-clienttype' . $r . $ct; ?>"/>
                                    <label for="<?php echo 'edit-clienttype' . $r . $ct; ?>"><?php echo $clienttype->name; ?></label><br/>
                                    <?php
                                    $ct++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn waves-effect waves-blue blue">Update</button>
            <!--<button type="" class="modal-close btn-flat waves-effect waves-blue"><i class="material-icons">delete</i></button>-->
            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
        </div>
    <?php $this->endWidget(); ?>
</div>
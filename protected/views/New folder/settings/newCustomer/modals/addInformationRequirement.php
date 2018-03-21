<!--add customer information requirement-->
<div id="create_info" class="modal modal-fixed-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="clienttype-count" value="<?php echo count($clienttypes); ?>">

    <div class="modal-content">
        <h5>Create Information Requirement</h5>
        <div class="card">
            <div class="card-content">
                <div class="row s12">
                    <div class="col s12 m6">
                        <div class="input-field col s12">
                            <input  type="text" name="new-information-name" required="required" placeholder="Name">
                        </div>
                        <div class="input-field col s12">
                            <textarea name="new-information-description" class="materialize-textarea" required="required" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <span>Select Customer Types</span><br/>
                        <?php
                        if (!empty($clienttypes)) {
                            $ct = 1;
                            foreach ($clienttypes as $clienttype) {
                                ?>
                                <input type="checkbox" name="clientType<?php echo $ct; ?>" value="<?php echo $clienttype->code; ?>" id="<?php echo 'new-clienttype' . $clienttype->id; ?>"/>
                                <label for="<?php echo 'new-clienttype' . $clienttype->id; ?>"><?php echo $clienttype->name; ?></label><br/>
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
        <button type="submit" class="btn waves-effect waves-blue blue">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
    </div>
<?php $this->endWidget(); ?>
</div>

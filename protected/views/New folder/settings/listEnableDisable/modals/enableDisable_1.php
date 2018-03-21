<!-- change list status -->
<div id="enable-disable<?php echo $l; ?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'status-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="list-id" value="<?php //echo $blacklistprogram->id; ?>">
    <div class="modal-content">
        <h5>Confirmation Of Status change</h5>
        <div class="card">
            <div class="card-content">
                <div class="row s12" >
                    <h6 class="m-t-sm light-blue-text"><b>Enter Reason</b></h6><br>
                    <textarea name="change-reason" id="desc" class="materialize-textarea" required="required"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn waves-effect waves-blue blue">Activate</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
    </div>
<?php $this->endWidget(); ?>
</div>
<div id="request-reason<?php echo $record->id; ?>" class="modal modal-fixed-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px; height: 400px; width: 500px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'reason-form',
        'enableAjaxValidation' => false,
    ));
    ?>
        <input  type="hidden" name="request-id" value="<?php echo $record->id; ?>">
        <div class="modal-content">
            <h5>Confirmation Of Status change</h5>
            <div class="card">
                <div class="card-content">
                    <div class="row s12" >
                        <h6 class="m-t-sm light-blue-text"><b>Reason</b></h6><br>
                        <textarea name = "request-reason" id="desc" class="materialize-textarea" required="required"><?php echo $record->reason; ?></textarea>
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
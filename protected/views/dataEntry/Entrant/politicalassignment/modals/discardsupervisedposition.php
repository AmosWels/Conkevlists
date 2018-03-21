<!-- submit organization -->
<div id="discardposition" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <!--<input type="hidden" name="reject-position" value="submit">-->
    <input type="hidden" name="discard-supervision-id" value="<?php echo $posid;?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Discard Supervision of <span class="green-text"><?php echo $posname; ?></span> ? </h4>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="discard-reason" required="required" class="materialize-textarea"></textarea>
                <label for="pname" class="active"><span class="small">Enter Reason To Discard</span></label>
            </div>  
        </div>
        
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
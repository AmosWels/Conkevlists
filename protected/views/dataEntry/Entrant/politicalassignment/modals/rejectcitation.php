<!-- submit organization -->
<div id="cancelcitation" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="cancel-citation" value="submit">
    <input type="hidden" name="record-id" value="<?php echo $organ_cite_id;?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Reject Citation With Title <span class="green-text"><?php echo $organisation->title; ?></span> ? </h4>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="reject-reason" required="required" class="materialize-textarea"></textarea>
                <label for="pname" class="active"><span class="small">Enter Reason To reject</span></label>
            </div>  
        </div>
        
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
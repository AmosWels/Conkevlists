<div id="submitaddress" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-supervision-id" value="<?php echo $addressid; ?>">
    <div class="modal-content" style="height: 150px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; color: green;">Submit Address</h4>
        <p>Are you sure you are done correcting Address with 
        <span class="grey-text"><code> City </code> <span class="black-text"><?php echo $addresscity; ?></span> <code> IN </code> <span class="black-text"><?php echo $addresscountryname; ?> ?</span>
        <code> FOR </code> <span class="black-text"><?php echo $personName; ?> ?</span>
        </span>
            </p>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
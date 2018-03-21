<div id="viewaddress<?php echo $record->id; ?>" class="modal" style="width:1550px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
        <h4 class="grey-text text-darken-4"><span class="blue-grey-text">City</span> &rtrif; <?php echo $cityresult; ?> </h4>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 10px 0;">
            <span class="blue-grey-text">Town</span> &rtrif; <?php echo $townresult . '. '; ?> 
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Country</span> &rtrif; <?php echo $countrynameresult . '. '; ?> 
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">County</span> &rtrif; <?php echo $record->county . '. '; ?> 
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Sub-county</span> &rtrif; <?php echo $record->subcounty . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Parish</span> &rtrif; <?php echo $record->parish . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Village</span> &rtrif; <?php echo $record->village . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Street Name</span> &rtrif; <?php echo $record->street_name . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Apartment Number</span> &rtrif; <?php echo $record->apartment_number . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Postal Code</span> &rtrif; <?php echo $record->postal_code . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Other Details</span> &rtrif; <?php echo $record->otherdetails . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Start Date</span> &rtrif; <?php echo $record->start_date . '. '; ?>
        <hr style="  border-color: black;border-style: dotted;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">End Date</span> &rtrif; <?php echo $record->end_date . '. '; ?>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Address Ownership</span> &rtrif; <?php echo $ownershipname . '. '; ?>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 5px 0;">
            <span class="blue-grey-text">Address Type</span> &rtrif; <?php echo $typename . '. '; ?>
        <hr style="  border-color: black;border-style: solid none;border-width: 0.5px 0; margin: 5px 0;">
    </div>
<?php $this->endWidget(); ?>
</div> 
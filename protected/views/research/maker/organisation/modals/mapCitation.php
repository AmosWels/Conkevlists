<!-- submit document type -->
<div id="map-citation<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="map-citation" value="<?php echo $record->id; ?>">
    <input type="hidden" name="old-mapping-set" value="<?php echo $mapping_set; ?>">
    <input type="hidden" name="items-count" value="<?php echo count($researches); ?>">
    
    <div class="modal-content white">
        <h4 style="font-size: 14px; ">Mappings</h4>
        <p>Select reference mappings: </p>
        <?php
        if (!empty($researches)) {
            $r = 1;
            $mapping_array = explode(",", $mapping_set);
            foreach ($researches as $research) {
                ?>
                <input type="checkbox" <?php if (in_array($research->id, $mapping_array)) { echo "checked";} ?> name="research<?php echo $r; ?>" value="<?php echo $research->id; ?>" id="<?php echo 'research' . $record->id.$r; ?>"/>
                <label for="<?php echo 'research' . $record->id.$r; ?>"><?php echo $research->name; ?></label><br/>
                <?php
                $r++;
            } }
        ?>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>
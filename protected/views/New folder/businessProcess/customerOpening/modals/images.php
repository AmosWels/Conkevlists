<!-- profile images -->
<div id="view_images" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Profile Images</h4>
        <div class="row s12">
        <?php if(!empty($images)){ 
            $i=1; ?>
            <?php foreach ($images as $image) {?>
            
                <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo Yii::app()->baseUrl."/imageUploads/{$rim}/".$code->decode($image->image); ?>"  class="responsive-img">
                        <span class="card-title" style="font-size:14px;">
                            <?php echo $image->size;?>B (~<?php echo round(($image->size)/1024,2)?>KB) , <?php echo $image->dimensions;?>
                        </span>
                    </div>
                    <div class="card-content">
                        <center>
                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-image<?php echo $i; ?>" class="modal-trigger"><span>Delete</span></a> | 
                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#make-profile-image<?php echo $i; ?>" class="modal-trigger"><span>Make Profile</span></a>
                        </center>
                    </div>
                </div>
                </div>
                
            <?php 
                    //make profile image 
//                    require 'modals/profileImage.php';
                    
                $i++;    } ?>
        <?php } ?>
        </div>
    </div>
    <div class="modal-footer">
        <!--<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>-->
    </div>
</div>




<!--####################################################-->
<!-- make profile image -->
<?php $i = 1; ?>
<?php foreach ($images as $image) { ?>
<div id="make-profile-image<?php echo $i; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="make-profileimage-id" value="<?php echo $image->id; ?>">
    <input  type="hidden" name="previous-image-id" value="<?php echo $previous_image_id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Customer Image</h4>
        <p>Are you sure you want to make this Customer image the profile picture: </p>
        <li style="margin-left: 25px"><?php echo $image->size;?>B (~<?php echo round(($image->size)/1024,2)?>KB) , <?php echo $image->dimensions;?> </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<?php $i++; } ?>
<input type="submit" value="" />




<!--####################################################-->
<!-- delete image -->
<?php $i = 1; ?>
<?php foreach ($images as $image) { ?>
<div id="delete-image<?php echo $i; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'delete-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-image-id" value="<?php echo $image->id; ?>">
    <div class="modal-content" style="height: 135px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Delete Image</h4>
        <p>Are you sure you want to delete this Customer image: </p>
        <li style="margin-left: 25px"><?php echo $image->size;?>B (~<?php echo round(($image->size)/1024,2)?>KB) , <?php echo $image->dimensions;?> </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>
<?php $i++; } ?>
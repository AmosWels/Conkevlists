<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$organizationtypes = TOrganizationtype::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
$name = yii::app()->request->getParam('value');
$code = new Encryption;
$newname = $code->decode($name);
?>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 16px">                                    
                                    <div class="breadcrumbs">
                                        <span class="black-text">Research</span> &sol;
                                        <?php echo CHtml::link('Maker', array('research/maker/panel')); ?> &sol;
                                        <?php echo CHtml::link('Organisation', array('research/maker/organisation')); ?> &sol;
                                        <span>Create New Organisation </span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">                                
                                <ul class="tabs">
                                    <li class="tab col s12"></li>
                                </ul>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="card z-depth-0" style="width: 800px; margin-left: 250px;">
                    <div class="card-content ">
                        <div class="row s12">
                                <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
   <div class="modal-content">
        <span class="grey-text text-darken-4">New Organization</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>
    </div>
    <div class="modal-content white">
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="name" name="new-name-organization" type="text" required="required" value="<?php echo $newname; ?>">
                <label for="name" style="border: none; outline: none;padding: 0 0 0 5px;" class="active">Organization Names <span class="red-text">*</span></label>
            </div>  
          </div>
          <div class="row">
            <div class="input-field col s12">
                <select name="new-type" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($organizationtypes)) {
                    
                    foreach ($organizationtypes as $record) {
                    ?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                    <?php } } else{     echo 'No Active Organisations';} ?>
                </select>                
                <label>Organization Type <span class="red-text">*</span></label>
            </div> 
          </div>
          <div class="row">
            <div class="input-field col s12">
                <select name="new-country" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($countries)) {
                    
                    foreach ($countries as $record) {
                    ?>
                        <option value="<?php echo $record->code;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select> 
                <label>Country <span class="red-text">*</span></label>
            </div> 
          </div>
    </div>
    <div class="row s6 right">
        <a href="#cancel" class="modal-trigger waves-effect waves-blue btn-flat ">Cancel</a>
        <button type="submit" class="waves-effect waves-blue btn blue ">Save</button>
    </div>
<?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//add Person
//cancel creating organisation
include_once 'modals/cancelNewOrganisation.php';
?>

<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$name = yii::app()->request->getParam('value');
$organname = yii::app()->request->getParam('name');
$orgcite_id = yii::app()->request->getParam('id');

$code = new Encryption;
$newname = $code->decode($name);
$organ = $code->decode($organname);
$organ_attr_id = $code->decode($orgcite_id);

$orgn_cite_attr_Value = TOrganizationcitationMapping::model()->findByPk($organ_attr_id); //getting attribute, citation details
$organ_cite_id = $orgn_cite_attr_Value->citation; //getting citation 

$organisation = TOrganization::model()->findbypk($organ);
$organ_cite = TOrganizationCitation::model()->findbypk($organ_cite_id);

$programs = TPrograms::model()->findAll("status='A'");
$organisations = TOrganization::model()->findAll("status='A'");
$levels = TPersonpositionslevel::model()->findAll("status='A'");
$weights = TPersonpositionsweight::model()->findAll("status='A'");

$join = new JoinTable;
$type = $join->joinOrganizationTypes($organisation->type);
$country = $join->joinCountry($organisation->country);

//limiting length of display
if (strlen($organisation->name) > 30){
$organName1 = substr($organisation->name, 0, 30) . '...'; } else{ $organName1 = $organisation->name;} // limiting length of organisation name 
if (strlen($country->name) > 15){
$countryname1 = substr($country->name, 0, 15) . '...'; } else { $countryname1 = $country->name; } // limiting length of country name
if (strlen($type->name) > 20){
$typename1 = substr($type->name, 0, 20) . '...';} else{ $typename1 = $type->name;}
##
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
                                        <span class="black-text">Data Entry</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Position Citations', array('dataEntry/Entrant/politicalassignment/index_new')); ?> &sol;
                                        <span>Create New Position</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s10 " style="text-align: left;" >
                                        <span class="grey-text text-darken-4"><small class="grey-text">Organisation </small>&rtrif; <?php echo $organName1; ?>
                                            &mid; <small class="grey-text">Country </small> &rtrif; <?php echo $countryname1; ?>
                                            &mid; <small class="grey-text">Type </small> &rtrif;  <?php echo $typename1; ?> 
                                        </span>
                                        <?php if(strlen($organisation->name)>30 || strlen($country->name)>15 || strlen($type->name)>20){?><span class="modal-trigger" href="#viewprof"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($organ_cite->title) > 10){ 
                                           $title = substr($organ_cite->title, 0, 10) . ' ...'; echo $title;  } else{ echo $organ_cite->title;} ?>"
                                           onclick="window.open('<?php echo $organ_cite->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
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
                    <div class="card-content white">
                        <!--<div class="row s12">-->
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="record-id" value="<?php echo $organ_attr_id;?>">
                        <input type="hidden" name="citationid" value="<?php echo $organ_cite_id;?>">
                        <input placeholder="....." id="displayname" name="organisation" type="hidden" readonly="true" required="required" value="<?php echo $organisation->id; ?>">
                        <!--<div class="row s12 white">-->
                        <span class="grey-text text-darken-4">New Position</span> </br>
                        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="....." id="displayname" name="position_name" type="text" required="required" value="<?php echo $newname; ?>">
                                <label for="displayname" class="active">Display Name<span class="red-text">*</span></label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="level" required="required">    
                                    <option value="" disabled selected>Choose ...</option>
                                    <?php
                                    if (!empty($levels)) {

                                        foreach ($levels as $level) {
                                            ?>
                                            <option value="<?php echo $level->id; ?>"><?php echo $level->name; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Level <span class="red-text">*</span></label>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="....." id="mark1" name="start_date" type="text" required="required"  class="masked" data-inputmask="'mask': 'y/m/d'">
                                <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="....." id="mark1" name="end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'">
                                <label for="mark1" class="active">End Date (y/m/d)</label>
                            </div>
                        </div>
                        <!--</div>-->
                        <div class="row s6 right">
                            <a href="#cancel" class="modal-trigger waves-effect waves-blue btn-flat ">Cancel</a>
                            <button type="submit" class="waves-effect waves-blue btn blue ">Submit</button>
                        </div>
                        <br><br>
<?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//cancel creating Person
include_once 'modals/cancelNewPosition.php';
//view profile
include_once 'modals/viewprofileCreationpage.php';
?>

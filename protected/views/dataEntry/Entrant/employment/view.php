<?php
/* @var $this PeopleController */

$this->breadcrumbs = array(
    'People',
);
?>

<?php
$code = new Encryption;
$join = new JoinTable;

$neworg = yii::app()->request->getParam('id');
$neworganid = $code->decode($neworg);
$neworganisation = TOrganization::model()->findbypk($neworganid);
$personemployment = '';

//$profilecitations = TPersonCitation::model()->findAllByAttributes(array('Person' => $newp));
$profilecitations = TOrganizationCitation::model()->findAll("organization = $neworganid ");

$research = TOrganizationresearch::model()->findAll("Status = 'A'");
$organisations = TOrganization::model()->findAll("status = 'A'");
$organrelations = TOrganizationrelationship::model()->findAll("status = 'A'");
//$organrelation_map = TOrganizationrelationship::->findAll("status = 'A'");
$organisationtypes = TOrganizationtype::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
//get gender
?>
<div class="row search-tabs-row search-tabs-header">
    <div class="col s12 m12 l10 left">
        <h5 class="" style="font-size: 16px">                                    
            <div class="breadcrumbs">
                <span class="black-text">DataEntry</span> &sol;
                <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                <?php echo CHtml::link('Organisations', array('dataEntry/Entrant/organisation')); ?> &sol;
                <span><?php echo $neworganisation->name; ?></span>
            </div>
        </h5>
    </div>
</div>
<!--</p>-->
<!--<div class="row">-->
<!--<div id="" class="col s12 m12 l12">-->
<div class="row s12 m12 l12">
    <div class="col s3">
        <div class="card z-depth-5">
            <div class="card-content">
                <div class="tabs-vertical">
                    <ul class="tabs transparent z-depth-0"> 
                        <?php
                        if (!empty($research)) {
                            foreach ($research as $fields) {
                                ?>
                                <li class="tab">
                                    <a href="#tab_id_<?php echo $fields->id; ?>">&nbsp;<?php echo $fields->name; ?></a> 
                                </li> <br>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>  
            <div class="fixed-action-btn" style="bottom: 45px; right: 1250px;">
                    <a class="btn-floating btn-large cyan tooltipped" data-position="right" data-delay="50" data-tooltip="Add">
                        <i class="large material-icons">mode_edit</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                        <li><a href="#addemployment<?php // echo $newp; ?>" class="btn-floating blue tooltipped modal-trigger" data-position="right" data-delay="50" data-tooltip="Relationship"><i class="material-icons">accessibility</i></a></li>
                    </ul>
                </div>
        </div> 
    </div>
    <div class="col s9">
        <div class="card">
            <div class="card-content">
                <div id="tab_id_1">
                    <span style="margin-left: 10px;">&rtrif;</span>
                    <?php
//                    getting condition for submit button

                    $t = 0;
                    if (!empty($neworganisation)) {
                        $type_id = $neworganisation->type;
                        $typevalue = TOrganizationtype::model()->findbypk($type_id);
                        $typename = $typevalue->name;
                        //get nationality
                        $nid = $neworganisation->country;
                        $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                        $nationalityname = $nationalityvalue->name;
                        $p = count($type_id);
                    } else {
                        $type_id = '';
                        $nid = '';
                        $typename = 'Choose . . .';
                        $nationalityname = 'Choose . . .';
                        $p = 0;
                        $t++;
                    }
//                    getting references
                    foreach ($profilecitations as $profilecitation) {
                        $mappedcitation_id = $profilecitation->id;
                        $mappedprofilevalues = TOrganizationcitationMapping::model()->findAll("citation = $mappedcitation_id");
                        foreach ($mappedprofilevalues as $mappedprofilevalue) {
                            $mappedprofile = $mappedprofilevalue->research;
                            ?> 
                            <span style="margin-left: 100px;"> <?php if ($mappedprofile == 1) { ?><a href="<?php echo $profilecitation->url; ?>"  onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="blank"><code ><?php echo $profilecitation->title; ?></code></a>
                                <?php } elseif ($mappedprofile != 1) { ?> <label class="red-text"></label> <?php } ?><?php } ?> <?php } ?></span>
                    <fieldset class="grey lighten-4" style="height:"><legend><span>Profile Data</span></legend>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="organ_id" value="<?php echo $neworganid; ?>">
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input id="pname" name="person_name" type="text" <?php if ($p != 0){ ?> readonly="true" <?php }?> value="<?php echo $neworganisation->name; ?>">
                                <label for="pname" class="active">Name </label>
                            </div>  
                        </div>
                        <div class="row s12">
                            <div class="input-field col s12">
                                <select name="person_nationality">    
                                    <option value="<?php echo $nid; ?>" ><?php echo $nationalityname; ?></option>
                                    <?php
                                    if (!empty($countries)) {

                                        foreach ($countries as $record) {
                                            ?>
                                            <option value="<?php echo $record->code; ?>" disabled><?php echo $record->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Country</label>
                            </div> 
                        </div>
                        <div class="row s12">
                            <div class="input-field col s12">
                                <select name="organ_type"  name="organ_type_new" >    
                                    <option value="<?php echo $type_id; ?>"><?php echo $typename; ?></option>
                                    <?php
                                    if (!empty($organisationtypes)) {

                                        foreach ($organisationtypes as $record) {
                                            ?>
                                            <option value="<?php echo $record->id; ?>" disabled><?php echo $record->name; ?></option>
                                                <?php
                                        }
                                    }
                                    ?>
                                </select>                
                                <label>Type </label>
                            </div>
                        </div>
                        <div class="row s12">
                            <?php if ($p == 0) { ?>
                                <button type="submit" class="waves-blue btn blue right">Save</button>
                                <a href="#" class="waves-effect waves-blue btn-flat right ">Cancel</a>
                            <?php } else { ?>
                                <a href="#editorganprofile<?php echo $neworganid; ?>" class="waves-effect waves-blue btn-flat right modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                    Edit</a>
                            <?php } ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </fieldset>
                </div><br>
                <div id="tab_id_4">
                    <span style="margin-left: 10px;">&rtrif;</span>
                    <?php
                    $f = 0;
//                    getting relationship details
                    $relationsdetails = TOrganizationrelationshipMap::model()->findByAttributes(array('organisation' => $neworganid));
                    
                       $d=0;
                    if (!empty($relationsdetails)) {
                       $enddate = $relationsdetails->end_date;
                       $startdate = $relationsdetails->start_date;
//                           getting organisation name
                           $organ_id = $relationsdetails->relatedTo_organ;
                           $organ_value = TOrganization::model()->findbypk($organ_id);
                           $organ_name = $organ_value->name;
//                           getting relation name
                           $relation_id = $relationsdetails->relation_type;
                           $relation_value = TOrganizationrelationship::model()->findbypk($relation_id);
                           $relation_name = $relation_value->name;
                    } else {
                        $organ_id = '';
                        $organ_name = 'Choose . . .';
                        $relation_id = '';
                        $relation_name = 'Choose . . .';   
                        $enddate = '';
                        $startdate = '';
                        $d++;
                        $f++;
                    }
//                    getting references
                    foreach ($profilecitations as $profilecitation) {
                        $mappedcitation_id = $profilecitation->id;
                        $mappedprofilevalues = TOrganizationcitationMapping::model()->findAll("citation = $mappedcitation_id");
                        foreach ($mappedprofilevalues as $mappedprofilevalue) {
                            $mappedprofile = $mappedprofilevalue->research;
                            ?> 
                            <span style="margin-left: 100px;"> <?php if ($mappedprofile == 4) { ?><a href="<?php echo $profilecitation->url; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="blank"><code><?php echo $profilecitation->title; ?></code></a>
                                <?php } elseif ($mappedprofile != 4) { ?> <label class="red-text"></label> <?php } ?><?php } ?> <?php } ?></span>
                    <fieldset class="grey lighten-4" style="height: "><legend><span>Relationship</span></legend>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="organ_id" value="<?php echo $neworganid; ?>">
                        <div class="input-field row s12">
                            <div class="input-field col s12">
                                <select name="rel_organisation" required="required">    
                                    <option value="<?php echo $organ_id;  ?>"><?php echo $organ_name;  ?></option>
                                    <?php
                                    if (!empty($organisations)) {

                                        foreach ($organisations as $organisation) {
                                            ?>
                                            <option value="<?php echo $organisation->id; ?>" <?php if ($d == 0){ ?> disabled <?php }?>><?php echo $organisation->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                
                                <label>Other Organisations <span class="red-text">*</span></label>
                            </div> 
                        </div> 
                        <div class="input-field row s12">
                            <div class="input-field col s12">
                                <select name="organ_relation" required="required">    
                                    <option value="<?php echo $relation_id;  ?>"><?php echo $relation_name;  ?></option>
                                    <?php
                                    if (!empty($organrelations)) {

                                        foreach ($organrelations as $organrelation) {
                                            ?>
                                    <option value="<?php echo $organrelation->id; ?>" <?php if ($d == 0){ ?> disabled <?php }?> ><?php echo $organrelation->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                
                                <label>Relation Type<span class="red-text">*</span></label>
                            </div> 
                        </div> 
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input placeholder="....." id="startdate" type="text" <?php if ($d == 0){ ?> readonly="true" <?php }?> name="relation_startdate" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $startdate; ?>">
                                <label for="startdate" class="active">Start date <span class="red-text">*</span> (y/m/d)</label>
                            </div>
                        </div> 
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input placeholder="....." id="enddate" type="text" <?php if ($d == 0){ ?> readonly="true" <?php }?> name="relation_enddate" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $enddate; ?>">
                                <label for="enddate" class="active">End date <span class="red-text">*</span> (y/m/d)</label>
                            </div>
                        </div> 
                        <div class="row s12">
                            <?php if ($d != 0) { ?>
                                <button type="submit" class="waves-blue btn blue right">Save</button>
                                <a href="#" class="waves-effect waves-blue btn-flat right ">Cancel</a>
                            <?php } else { ?>
                                <a href="#editrelationship<?php echo $neworganid; ?>" class="waves-effect waves-blue btn-flat right modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                    Edit</a>
                            <?php } ?>
                        </div>
                        <?php $this->endWidget(); ?>
                </div><br>
                <div class="row s12">
                    <?php if ($t == 0 and $f==0) { ?>
                        <a href="#submit<?php echo $neworganid; ?>" class="waves-effect waves-blue btn blue right modal-trigger">Submit</a>
                    <?php } else { ?>
                        <button type="submit" class="waves-effect waves-blue btn blue disabled right">Submit</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'modals/editrelationship.php';
include_once 'modals/editorganprofile.php';
include_once 'modals/submitorgan.php';
//include_once 'modals/addemployment.php';
?>

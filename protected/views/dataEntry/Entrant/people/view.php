<?php
/* @var $this PeopleController */

$this->breadcrumbs = array(
    'People',
);
?>
<?php
$code = new Encryption;

$newpp = yii::app()->request->getParam('id');
$newp = $code->decode($newpp);
$newperson = TPerson::model()->findbypk($newp);
$personemployment = '';
$persondetails = TPersonEmploymentDetails::model()->findByAttributes(array('person' => $newp));

//$profilecitations = TPersonCitation::model()->findAllByAttributes(array('Person' => $newp));
$profilecitations = TPersonCitation::model()->findAll("Person = $newp ");

$research = TPeopleprofilefields::model()->findAll("Status = 'A'");
$ppositions = TPersonpositions::model()->findAll("status = 'A' ORDER BY name ASC");
$persongender = TPgender::model()->findAll("status='A' ORDER BY name ASC");
$countries = TCountry::model()->findAll("status='A' ORDER BY name ASC");
//get gender
?>
<div class="row search-tabs-row search-tabs-header">
    <div class="col s12 m12 l10 left">
        <h5 class="" style="font-size: 16px">                                    
            <div class="breadcrumbs">
                <span class="black-text">DataEntry</span> &sol;
                <?php echo CHtml::link('Maker', array('dataEntry/Entrant/panel')); ?> &sol;
                <?php echo CHtml::link('People', array('dataEntry/Entrant/people')); ?> &sol;
                <span><?php echo $newperson->Name; ?></span>
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
                                    <a href="#tab_id_<?php echo $fields->id; ?>">&nbsp;<?php echo $fields->Name; ?></a> 
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
                        <li><a href="#addemployment<?php echo $newp; ?>" class="btn-floating blue tooltipped modal-trigger" data-position="right" data-delay="50" data-tooltip="Employment"><i class="material-icons">accessibility</i></a></li>
                    </ul>
                </div>
        </div> 
    </div>
    <div class="col s9">
        <div class="card">
            <div class="card-content">
                <div id="tab_id_12">
                    <span style="margin-left: 10px;">&rtrif;</span>
                    <?php
//                    getting condition for submit button

                    $t = 0;
                    if (!empty($newperson)) {
                        //get gender
                        $gender_id = $newperson->Gender;
                        $gendervalue = TPgender::model()->findbypk($gender_id);
                        $gendername = $gendervalue->name;
                        //get nationality
                        $nid = $newperson->Nationality;
                        $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                        $nationalityname = $nationalityvalue->native;
                        $p = count($gender_id);
                    } else {
                        $gender_id = '';
                        $nid = '';
                        $gendername = 'Choose . . .';
                        $nationalityname = 'Choose . . .';
                        $p = 0;
                        $t++;
                    }
//                    getting references
                    foreach ($profilecitations as $profilecitation) {
                        $mappedcitation_id = $profilecitation->id;
                        $mappedprofilevalues = TPcitationProfilefieldsMappings::model()->findAll("citation = $mappedcitation_id");
                        foreach ($mappedprofilevalues as $mappedprofilevalue) {
                            $mappedprofile = $mappedprofilevalue->profilefield;
                            ?> 
                            <span style="margin-left: 100px;"> <?php if ($mappedprofile == 12) { ?><a href="<?php echo $profilecitation->Url; ?>"  onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="blank"><code ><?php echo $profilecitation->Title; ?></code></a>
                                <?php } elseif ($mappedprofile != 12) { ?> <label class="red-text"></label> <?php } ?><?php } ?> <?php } ?></span>
                    <fieldset class="grey lighten-4" style="height:"><legend><span>Profile Data</span></legend>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="person_id" value="<?php echo $newp; ?>">
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input id="pname" name="person_name" type="text" <?php if ($p != 0){ ?> readonly="true" <?php }?>value="<?php echo $newperson->Name; ?>">
                                <label for="pname" class="active">Name </label>
                            </div>  
                        </div>
                        <div class="row s12">
                            <div class="input-field col s12">
                                <select name="person_nationality">    
                                    <option value="<?php echo $nid; ?>"><?php echo $nationalityname; ?></option>
                                    <?php
                                    if (!empty($countries)) {

                                        foreach ($countries as $record) {
                                            ?>
                                    <option value="<?php echo $record->code; ?>" disabled><?php echo $record->native; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Nationality</label>
                            </div> 
                        </div>
                        <div class="row s12">
                            <div class="input-field col s12">
                                <select name="person_gender">    
                                    <option value="<?php echo $gender_id; ?>"><?php echo $gendername; ?></option>
                                    <?php
                                    if (!empty($persongender)) {

                                        foreach ($persongender as $record) {
                                            ?>
                                    <option value="<?php echo $record->id; ?>" disabled><?php echo $record->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                
                                <label>Gender </label>
                            </div>
                        </div>
                        <div class="row s12">
                            <?php if ($p == 0) { ?>
                                <button type="submit" class="waves-blue btn blue right">Save</button>
                                <a href="#" class="waves-effect waves-blue btn-flat right ">Cancel</a>
                            <?php } else { ?>
                                <a href="#editprofile<?php echo $newp; ?>" class="waves-effect waves-blue btn-flat right modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                    Edit</a>
                            <?php } ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </fieldset>
                </div><br>
                <div id="tab_id_13">
                    <span style="margin-left: 10px;">&rtrif;</span>
                    <?php
//                    getting employment details
                    $f = 0;
                    if (!empty($persondetails)) {
                        $position = $persondetails->person_position;
                        $details = $persondetails->details;
                        $startdate = $persondetails->start_date;
                        $enddate = $persondetails->end_date;
                        $positionvalue = TPersonpositions::model()->findbypk("$position");
                        $positionname = $positionvalue->name;
                        $d = count($position);
                    } else {
                        $position = '';
                        $details = '';
                        $startdate = '';
                        $enddate = '';
                        $positionname = 'Choose . . .';
                        $d = 0;
                        $f++;
                    }
//                    getting references
                    foreach ($profilecitations as $profilecitation) {
                        $mappedcitation_id = $profilecitation->id;
                        $mappedprofilevalues = TPcitationProfilefieldsMappings::model()->findAll("citation = $mappedcitation_id");
                        foreach ($mappedprofilevalues as $mappedprofilevalue) {
                            $mappedprofile = $mappedprofilevalue->profilefield;
                            ?> 
                            <span style="margin-left: 100px;"> <?php if ($mappedprofile == 13) { ?><a href="<?php echo $profilecitation->Url; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="blank"><code><?php echo $profilecitation->Title; ?></code></a>
                                <?php } elseif ($mappedprofile != 13) { ?> <label class="red-text"></label> <?php } ?><?php } ?> <?php } ?></span>
                    <fieldset class="grey lighten-4" style="height: "><legend><span>Employment</span></legend>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>

                        <div class="input-field row s12">
                            <div class="input-field col s12">
                                <select name="position" required="required">    
                                    <option value="" disabled selected><?php echo $positionname; ?></option>
                                    <?php
                                    if (!empty($ppositions)) {

                                        foreach ($ppositions as $pposition) {
                                            $organid = $pposition->organization;
                                            $organval = TOrganization::model()->findByPk($organid);
                                            $organname = $organval->name;
                                            ?>
                                    <option value="<?php echo $pposition->id; ?>" <?php if ($d != 0){ ?> disabled <?php }?>><?php echo $pposition->name; ?> &rtrif; <?php echo $organname; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                
                                <label>Position <span class="red-text">*</span></label>
                            </div> 
                        </div> 
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input placeholder="....." id="label" name="position_details" type="text" <?php if ($d != 0){ ?> readonly="true" <?php }?> required="required" value="<?php echo $details; ?>">
                                <label for="label" class="active">Details <span class="red-text">*</span></label>
                            </div>  
                        </div> 
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input placeholder="....." id="startdate" type="text" <?php if ($d != 0){ ?> readonly="true" <?php }?> name="position_startdate" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $startdate; ?>">
                                <label for="startdate" class="active">Start date <span class="red-text">*</span> (y/m/d)</label>
                            </div>
                        </div> 
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input placeholder="....." id="enddate" type="text" <?php if ($d != 0){ ?> readonly="true" <?php }?> name="position_enddate" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $enddate; ?>">
                                <label for="enddate" class="active">End date <span class="red-text">*</span> (y/m/d)</label>
                            </div>
                        </div> 
                        <div class="row s12">
                            <?php if ($d == 0) { ?>
                                <button type="submit" class="waves-blue btn blue right">Save</button>
                                <a href="#" class="waves-effect waves-blue btn-flat right ">Cancel</a>
                            <?php } else { ?>
                                <a href="#editemployment<?php echo $newp; ?>" class="waves-effect waves-blue btn-flat right modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                    Edit</a>
                            <?php } ?>
                        </div>
                        <?php $this->endWidget(); ?>
                </div><br>
                <div class="row s12">
                    <?php if ($t == 0 and $f == 0) { ?>
                        <!--<button type="submit" class="waves-effect waves-blue btn blue right">Submit</button>-->
                        <a href="#submit<?php echo $newp; ?>" class="waves-effect waves-blue btn blue right modal-trigger">Submit</a>
                    <?php } else { ?>
                        <button type="submit" class="waves-effect waves-blue btn blue disabled right">Submit</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'modals/editemployment.php';
include_once 'modals/editprofile.php';
include_once 'modals/submitPerson.php';
include_once 'modals/addemployment.php';
?>

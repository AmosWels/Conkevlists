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
$newposition = TPersonpositions::model()->findbypk($newp);
$profilecitations = TPositionCitation::model()->findAll("Position = $newp ");
$positionpurpose = TPersonpositionpurpose::model()->findByAttributes(array('position' => $newp));

$research = TPositionprofilefields::model()->findAll("Status = 'A'");
$programs = TPrograms::model()->findAll("status='A'");
$organisations = TOrganization::model()->findAll("status='A'");
$levels = TPersonpositionslevel::model()->findAll("status='A'");
$weights = TPersonpositionsweight::model()->findAll("status='A'");
//get gender
?>
<div class="row search-tabs-row search-tabs-header">
    <div class="col s12 m12 l10 left">
        <h5 class="" style="font-size: 16px">                                    
            <div class="breadcrumbs">
                <span class="black-text">DataEntry</span> &sol;
                <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                <?php echo CHtml::link('Positions', array('dataEntry/Entrant/politicalassignment')); ?> &sol;
                <span><?php echo $newposition->name; ?></span>
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
                <div id="tab_id_1">
                    <span style="margin-left: 10px;">&rtrif;</span>
                    <?php
//                    getting condition for submit button

                    $t = 0;
                    if (!empty($newposition)) {
                        $p = 0;
                        $start_date = $newposition->start_date;
                        $end_date = $newposition->end_date;
//                      organisation name
                        $Orgid = $newposition->organization;
                        $orgvalue = TOrganization::model()->findByPk($Orgid);
                        $orgname = $orgvalue->name;
//                      level name
                        $Lid = $newposition->level;
                        $Lvalue = TPersonpositionslevel::model()->findByPk($Lid);;
                        $Lname = $Lvalue->name;
//                      weight name
                        $Wid = $newposition->weight;
                        $Wvalue = TPersonpositionsweight::model()->findByPk($Wid);;
                        $Wname = $Wvalue->name;
//                      program name
                        $Pid = $newposition->program;
                        $Pvalue = TPrograms::model()->findByPk($Pid);;
                        $Pname = $Pvalue->name;
                    } else {
                        $start_date = '';
                        $end_date = '';
                        $p++;
                        $Orgid = '';
                        $Lid = '';
                        $Wid = '';
                        $Pid = '';
                        $orgname = 'Choose . . .';
                        $Lname = 'Choose . . .';
                        $Wname = 'Choose . . .';
                        $Pname = 'Choose . . .';
                        $t++;
                    }
//                    getting references
                    foreach ($profilecitations as $profilecitation) {
                        $mappedcitation_id = $profilecitation->id;
                        $mappedprofilevalues = TPositioncitationProfilefieldsMappings::model()->findAll("citation = $mappedcitation_id");
                        foreach ($mappedprofilevalues as $mappedprofilevalue) {
                            $mappedprofile = $mappedprofilevalue->profilefield;
                            ?> 
                            <span style="margin-left: 100px;"> <?php if ($mappedprofile == 1) { ?><a href="<?php echo $profilecitation->Url; ?>"  onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="blank"><code ><?php echo $profilecitation->Title; ?></code></a>
                                <?php } elseif ($mappedprofile != 1) { ?> <label class="red-text"></label> <?php } ?><?php } ?> <?php } ?></span>
                    <fieldset class="grey lighten-4" style="height:"><legend><span>Profile Data</span></legend>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="position_id" value="<?php echo $newp; ?>">
                        <div class="row s12">
                            <div class="input-field col s12">
                                <input id="pname" name="person_name" type="text" <?php if ($p == 0){ ?> readonly="true" <?php }?> value="<?php echo $newposition->name; ?>">
                                <label for="pname" class="active">Name </label>
                            </div>  
                        </div>
                        <div class="row">
                                    <div class="input-field col s12">
                                        <select name="program" required="required">    
                                            <option value="<?php echo $Pid; ?>" ><?php echo $Pname; ?></option>
                                            <?php
                                            if (!empty($programs)) {

                                                foreach ($programs as $program) {
                                                    ?>
                                                    <option value="<?php echo $program->id; ?>" disabled><?php echo $program->name; ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select>                
                                        <label>Program <span class="red-text">*</span></label>
                                    </div> 
                                </div>
                        <div class="row">
                                    <div class="input-field col s12">
                                        <select name="organisation" required="required">    
                                            <option value="<?php echo $Orgid; ?>"><?php echo $orgname; ?></option>
                                            <?php
                                            if (!empty($organisations)) {

                                                foreach ($organisations as $organ) {
                                                    ?>
                                                    <option value="<?php echo $organ->id; ?>" disabled><?php echo $organ->name; ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select> 
                                        <label>Organisation <span class="red-text">*</span></label>
                                    </div> 
                                </div>
                        <div class="row">
                                    <div class="input-field col s6">
                                        <select name="level" required="required">    
                                            <option value="<?php echo $Lid; ?>"><?php echo $Lname; ?></option>
                                            <?php
                                            if (!empty($levels)) {

                                                foreach ($levels as $level) {
                                                    ?>
                                                    <option value="<?php echo $level->id; ?>" disabled><?php echo $level->name; ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select> 
                                        <label>Level <span class="red-text">*</span></label>
                                    </div> 
                                    <div class="input-field col s6">
                                        <select name="weight" required="required"  >    
                                            <option value="<?php echo $Wid; ?>" ><?php echo $Wname; ?></option>
                                            <?php
                                            if (!empty($weights)) {

                                                foreach ($weights as $weight) {
                                                    ?>
                                                    <option value="<?php echo $weight->id; ?>" disabled><?php echo $weight->name; ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select> 
                                        <label>Weight <span class="red-text">*</span></label>
                                    </div>
                                </div>
                        <div class="row">
                                <div class="input-field col s6">
                                    <input placeholder="....." id="mark1" name="start_date" type="text" required="required" <?php if ($p == 0){ ?> readonly="true" <?php }?>  class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $start_date; ?>">
                                    <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="....." id="mark1" name="end_date" type="text" <?php if ($p == 0){ ?> readonly="true" <?php }?> class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $end_date; ?>">
                                    <label for="mark1" class="active">End Date (y/m/d)<span class="red-text">*</span></label>
                                </div>
                            </div>
                        <div class="row s12">
                            <?php if ($p != 0) { ?>
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
                <div id="tab_id_2">
                    <span style="margin-left: 10px;">&rtrif;</span>
                    <?php
//                    getting employment details
                    $f = 0;
                    if (!empty($positionpurpose)) {
                        $d = 1;
                        $purpose = $positionpurpose->purpose;
                    } else {
                        $purpose = '';
                        $d=0;
                      $f++;
                    }
//                    getting references
                    foreach ($profilecitations as $profilecitation) {
                        $mappedcitation_id = $profilecitation->id;
                        $mappedprofilevalues = TPositioncitationProfilefieldsMappings::model()->findAll("citation = $mappedcitation_id");
                        foreach ($mappedprofilevalues as $mappedprofilevalue) {
                            $mappedprofile = $mappedprofilevalue->profilefield;
                            ?> 
                            <span style="margin-left: 100px;"> <?php if ($mappedprofile == 2) { ?><a href="<?php echo $profilecitation->Url; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="blank"><code><?php echo $profilecitation->Title; ?></code></a>
                                <?php } elseif ($mappedprofile != 2) { ?> <label class="red-text"></label> <?php } ?><?php } ?> <?php } ?></span>
                    <fieldset class="grey lighten-4" style="height: "><legend><span>Purpose</span></legend>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'add-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <input type="hidden" name="position_id" value="<?php echo $newp; ?>">
                        <div class="row s12">
                            <div class="input-field col s12">
                                <textarea placeholder="....." id="plabel" type="text" name="purpose" <?php if ($d != 0){ ?> readonly="true" <?php }?> required="required"  class="materialize-textarea"><?php echo $purpose; ?></textarea>
                                <label for="plabel" class="active">Purpose <span class="red-text">*</span></label>
                            </div>  
                        </div> 
                        <div class="row s12">
                            <?php if ($d == 0) { ?>
                                <button type="submit" class="waves-blue btn blue right">Save</button>
                                <a href="#" class="waves-effect waves-blue btn-flat right ">Cancel</a>
                            <?php } else { ?>
                                <a href="#editpurpose<?php echo $newp; ?>" class="waves-effect waves-blue btn-flat right modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                    Edit</a>
                            <?php } ?>
                        </div>
                        <?php $this->endWidget(); ?>
                </div>
                <div class="row s12">
                    <?php if ($t == 0 and $f == 0) { ?>
                        <a href="#submit-position<?php echo $newp; ?>" class="waves-effect waves-blue btn blue right modal-trigger">Submit</a>
                    <?php } else { ?>
                        <button type="submit" class="waves-effect waves-blue btn blue disabled right">Submit</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'modals/editpurpose.php';
include_once 'modals/editprofile.php';
include_once 'modals/submitPosition.php';
//include_once 'modals/addemployment.php';
?>

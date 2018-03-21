<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
//$name = yii::app()->request->getParam('value');
//$organname = yii::app()->request->getParam('name');
$personcite_id = yii::app()->request->getParam('id');

$code = new Encryption;
//$newname = $code->decode($name);
//$organ = $code->decode($organname);
$citation_id = $code->decode($personcite_id);

//$organisation = TOrganization::model()->findbypk($organ);

$person_cite = TPersonCitation::model()->findbypk($citation_id);
$personid = $person_cite->person;
$personValue = TPerson::model()->findByPk($personid);
$personName = $personValue->name;

$positions = TPersonpositions::model()->findAll("status = 'A'");
        
//gender name
$gid = $personValue->gender; // getting gender value
$gendervalue = TPgender::model()->findByPk("$gid");
$gendername = $gendervalue->name;
//nationality name
$nid = $personValue->nationality; //getting country value
$nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
$nationalityname = $nationalityvalue->native;

//limiting length of display
if (strlen($personName) > 30){
$personName1 = substr($personName, 0, 30) . '...'; } else{ $personName1 = $personName;}
if (strlen($nationalityname) > 15){
$nationalityname1 = substr($nationalityname, 0, 15) . '...'; } else { $nationalityname1 = $nationalityname; }
if (strlen($gendername) > 20){
$gendername1 = substr($gendername, 0, 20) . '...';} else{ $gendername1 = $gendername;}
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
                                        <?php echo CHtml::link('Employment Citations', array('dataEntry/Entrant/employment/index_new')); ?> &sol;
                                        <span>Create New Employment</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Person </small>&rtrif; <?php echo $personName1; ?>
                                            &mid; <small class="grey-text">Nationality </small> &rtrif;  <?php echo $nationalityname1; ?> 
                                            &mid; <small class="grey-text">Gender </small> &rtrif;  <?php echo $gendername1; ?> 
                                        </span>
                                        <?php if(strlen($personName)>30 || strlen($nationalityname)>15 || strlen($gendername)>20){?><span class="modal-trigger" href="#viewprof"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($person_cite->title) > 10){
                                        $title = substr($person_cite->title, 0, 10) . '...'; echo $title;  } else{ echo $personValue->title;} ?>"
                                           onclick="window.open('<?php echo $person_cite->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
                                       
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
                        <input type="hidden" name="personid" value="<?php echo $personid;?>">
                        <input type="hidden" name="citationid" value="<?php echo $citation_id; ?>">
                        <!--<div class="row s12 white">-->
                        <span class="grey-text text-darken-4">New Employment</span> </br>
                        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="position_id" required="required">    
                                    <option value="" disabled selected >Choose ...</option>
                                    <?php
                                    if (!empty($positions)) {

                                        foreach ($positions as $position) {
                                            $organid = $position->organization;
                                            $organValue = TOrganization::model()->findBypk($organid);
                                            $organName = $organValue->name;
                                            ?>
                                    <option value="<?php echo $position->id; ?>"><?php echo $position->name; ?> &rtrif; <?php echo $organName; ?> </option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Employment Position <span class="red-text">*</span></label>
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
include_once 'modals/cancelNewEmployment.php';
//view profile
include_once 'modals/viewprofileCreationpage.php';
?>

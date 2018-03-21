<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
//$results = $model[0];
//$resultcount = count($results);
//$searched = $model[1];
$searchnames = TSearchname::model()->findAll("status='A'");

$code = new Encryption;
$id = yii::app()->request->getParam('id');
$posid = $code->decode($id);
$position = TPersonpositions::model()->findbypk($posid); // getting psition details
$posname = $position->name; // position name
$organ = $position->organization; // organisation id
$citeid = $position->citation; // getting citation id
$reason = $position->supervisor_reject_reason; // getting rejection reason

$citation = TOrganizationCitation::model()->findByPk($citeid); //getting citation details
$organValue = TOrganization::model()->findByPk($organ); 
$organName = $organValue->name; // getting organisation name
$countryValue = $organValue->country; // getting country value
$typeValue = $organValue->type; // getting organisation type

$activepositions = TPersonpositions::model()->findAll("organization=$organ and status IN ('A','D') ORDER BY name"); // getting active positions

$matchResults = TPersonpositions::model()->findAll("name LIKE '%" . $posname . "%' AND organization = '$organ' AND status='A'"); // getting possible matches to the position

$levels = TPersonpositionslevel::model()->findAll("status='A'"); // Getting all levels

$join = new JoinTable; // instatiating the jointable class

$type = $join->joinOrganizationTypes($typeValue); // getting type name
$typename = $type->name;
$country = TCountry::model()->findByAttributes(array('code'=>$countryValue));
$countryname = $country->name; // getting country name

//limiting length of display
if (strlen($organName) > 15){
$organName1 = substr($organName, 0, 15) . '...'; } else{ $organName1 = $organName;}
if (strlen($countryname) > 15){
$countryname1 = substr($countryname, 0, 15) . '...'; } else { $countryname1 = $countryname; }
if (strlen($typename) > 20){
$typename1 = substr($typename, 0, 20) . '...';} else{ $typename1 = $typename;}
if (strlen($posname) > 20){
$posname1 = substr($posname, 0, 20) . '...';} else{ $posname1 = $posname;}

//level details for the position
$lid = $position->level;
$levelvalue = TPersonpositionslevel::model()->findByPk($lid);
$levelname = $levelvalue->name;
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
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Position Citation', array('dataEntry/Entrant/politicalassignment/index_new')); ?> &sol;
                                        <span>Correction Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12">   
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text text-darken-4">
                                            <small class="grey-text">Position </small> &rtrif;  <?php echo $posname1; ?> 
                                            &mid; <small class="grey-text">Organisation </small>&rtrif; <?php echo $organName1; ?>
                                            &mid; <small class="grey-text">Country </small> &rtrif;  <?php echo $countryname1; ?> 
                                        </span>
                                        <?php if(strlen($organName)>15 || strlen($countryname)>15 || strlen($posname1)>15){?><span class="modal-trigger" href="#viewprofposition"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($citation->title) > 10){
                                        $title = substr($citation->title, 0, 10) . '...'; echo $title;  } else{ echo $citation->title;} ?>"
                                        onclick="window.open('<?php echo $citation->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>

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
                <p style="margin-left: 15px;"><small class="grey-text">Rejection Reason </small> &rtrif; 
                            <?php if (strlen($reason) > 175){ $reason1 = substr($reason, 0, 175) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason;} ?></span></p><br>
        <div class="row s12">
            
                <div class="col s4" >
                    <div class="card z-depth-0">
                    <div class="card-content white" style="overflow:auto; height: 192px;">
                        <div class="card-title"><span>Possible Matches</span></div>
                    <?php if(!empty($matchResults)){ 
                        foreach($matchResults as $record){
                            $mactchname = $record->name;
                        ?>
                        <li>
                            <?php if (strlen($mactchname) > 50){ $mactchname1 = substr($mactchname, 0, 50) . '...';?>
                            <span class="modal-trigger" href="#position<?php echo $positions->id; ?>"><?php echo $mactchname1; ?></span><span><?php } else{ echo $mactchname;} ?></span>
                        </li>
                        <?php  include 'modals/viewmatchingposition.php'; } } else{?>
                    <code class="red-text" style="margin-left:50px; margin-top: 30px;">!-- No Matching positions were found -- !</code>
                        <?php } ?>
                </div>
                </div>
                    <div class="card z-depth-0">
                    <div class="card-content white" style="overflow:auto; height: 180px;">
                        <div class="card-title"><span>Existing Positions</span></div>
                    <?php if(!empty($activepositions)){ 
                        foreach($activepositions as $positions){
                            $name = $positions->name;
                            $status = $positions->status;
                            switch ($status){ case 'A': $color = ''; break; case 'D' : $color='red';}
                        ?>
                        <li style="color: <?php echo $color; ?>">
                            <?php if (strlen($name) > 50){ $name1 = substr($name, 0, 50) . '...';?>
                            <span class="modal-trigger" href="#position<?php echo $positions->id; ?>"><?php echo $name1; ?></span><span><?php } else{ echo $name;} ?></span>
                        </li>
                        <?php  include 'modals/viewposition.php'; } } else{?>
                    <code class="red-text center" style="margin-left:200px;">!-- No Positions were found -- !</code>
                        <?php } ?>
                </div>
                </div>
                </div>

                <div class="col s8">
                <div class="card z-depth-0">
                    <div class="card-content">
                <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
                    <input type="hidden" name="position-id-correct" value="<?php echo $position->id; ?>">
                    <input type="hidden" name="citation-id-correct" value="<?php echo $citeid; ?>">
                    <!--<div class="row s12 white">-->
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="....." id="displayname" name="position_name" type="text" value="<?php echo $position->name; ?>">
                            <label for="displayname" class="active">Display Name<span class="red-text">*</span></label>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="newvalue" >    
                                <option value="<?php echo $lid; ?>"><?php echo $levelname; ?></option>
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
                            <label class="active">Level </label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="....." id="mark1" name="start_date" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $position->start_date; ?>">
                            <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="....." id="mark1" name="end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $position->end_date; ?>">
                            <label for="mark1" class="active">End Date (y/m/d)<span class="red-text">*</span></label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <button type="submit" class="waves-effect waves-blue btn blue right">Correct</button>
                        <a href="#discardposition" class="modal-trigger waves-effect waves-black tooltipped" data-position="top" data-delay="50" data-tooltip="Discard Citation" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" style="text-decoration: underline;">Discard Supervision</a> 
                        <a href="#deleteposition"  class="modal-trigger waves-effect waves-grey tooltipped btn-flat small" data-position="top" data-delay="50" data-tooltip="Delete Position" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons medium-small">delete</i></a>
                        <a href="#finishposition"  class="waves-effect waves-black tooltipped modal-trigger btn-flat small" data-position="top" data-delay="50" data-tooltip="Submit Position" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons medium-small">forward</i></a>
                     </div>
                     </div>
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
////view citation full profile
include_once 'modals/viewprofileposition.php';
////cancel reason rejection
include_once 'modals/viewreasonreject.php';
////delete position
include_once 'modals/deleteposition.php';
////discard position
include_once 'modals/discardsupervisedposition.php';
////reject position
include_once 'modals/submitsupervisedposition.php';
?>

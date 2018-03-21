<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$results = $model[0];
$resultcount = count($results);
$searched = $model[1];
$searchnames = TSearchname::model()->findAll("status='A'");

$code = new Encryption;
$id = yii::app()->request->getParam('id');
$organ_cite_id = $code->decode($id);

$orgn_cite_attr_Value = TOrganizationcitationMapping::model()->findByPk($organ_cite_id);
$organid = $orgn_cite_attr_Value->citation;

$organisation = TOrganizationCitation::model()->findbypk($organid); //getting citation attributes
$organ = $orgn_cite_attr_Value->organization; // getting organisation id
$reason_D = $orgn_cite_attr_Value->discard_reason_researcher;//getting discard reason from researcher
$reason_R = $orgn_cite_attr_Value->rejectedreason_dataEntry;//getting rejected reason from supervisor
$status = $orgn_cite_attr_Value->status; // getting citaion status 
$organValue = TOrganization::model()->findByPk($organ);
$organName = $organValue->name; //getting organ name
$countryValue = $organValue->country; //getting country value
$typeValue = $organValue->type; // getting organisation type
//check if citation has been used to create an attribute
$usedcitation = TPersonpositions::model()->findAll("citation = $organid");
//getting all active and draft positions
$activepositions = TPersonpositions::model()->findAll("organization=$organ and status IN ('A','D') ORDER BY name"); 

$join = new JoinTable;
$type = $join->joinOrganizationTypes($typeValue);
$typename = $type->name;
$country = TCountry::model()->findByAttributes(array('code'=>$countryValue));
$countryname = $country->name;

//limiting length of display
if (strlen($organName) > 30){
$organName1 = substr($organName, 0, 30) . '...'; } else{ $organName1 = $organName;}
if (strlen($countryname) > 15){
$countryname1 = substr($countryname, 0, 15) . '...'; } else { $countryname1 = $countryname; }
if (strlen($typename) > 20){
$typename1 = substr($typename, 0, 20) . '...';} else{ $typename1 = $typename;}
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
                                        <span class="black-text">Research</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Position Citation', array('dataEntry/Entrant/politicalassignment/index_new')); ?> &sol;
                                        <span>Search Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s10 m10">                                
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Organization </small>&rtrif; <?php echo $organName1; ?>
                                            &mid; <small class="grey-text">Country </small> &rtrif;  <?php echo $countryname1; ?> 
                                            &mid; <small class="grey-text">Type </small> &rtrif;  <?php echo $typename1; ?> 
                                        </span>
                                        <?php if(strlen($organName)>30 || strlen($countryname)>15 || strlen($typename)>20){?><span class="modal-trigger" href="#viewprof"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($organisation->title) > 10){
                                        $title = substr($organisation->title, 0, 10) . '...'; echo $title;  } else{ echo $organisation->title;} ?>"
                                           onclick="window.open('<?php echo $organisation->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
                                       
                                </ul>
                            </div>
                            <div class="col s2 right-align search-stats">
                               <span>
                                   <?php if(count($usedcitation)> 0){?>
                                <a href="#submitcitation" style="margin-top: 6px;" class="modal-trigger waves-effect waves-black tooltipped right btn-flat" data-position="top" data-delay="50" data-tooltip="Submit Citation" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons">forward</i></a>
                                   <?php } else {?>
                                <a href="#" style="margin-top: 6px;" class="grey tooltipped right btn-flat" data-position="top" data-delay="50" data-tooltip="Cannot submit Citation without creating a position"><i class="material-icons">forward</i></a>
                                   <?php } ?>
                                <a href="#cancelcitation" style="margin-top: 6px;" class="modal-trigger waves-effect waves-black tooltipped right btn-flat" data-position="top" data-delay="50" data-tooltip="Reject Citation" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons">close</i></a> 
                               </span>
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
                <?php if ($status=='L') { ?>
                <p>
                <small class="grey-text">Your supervision has been discarded because </small> &rtrif; 
                            <?php if (strlen($reason_D) > 170){ $reason1 = substr($reason_D, 0, 170) . '...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason_D;} ?></span></p><br>
                <?php } elseif($status=='C'){ ?> 
                <p>
                <small class="grey-text">You Rejection reason was </small> &rtrif; 
                            <?php if (strlen($reason_R) > 170){ $reason1 = substr($reason_R, 0, 170) . '...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reasonreject">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason_R;} ?></span></p><br>
                <?php } else{} ?>
                <div class="card z-depth-0">
                    <div class="card-content">
                        <p><span>Search position </span>
                        <span style="margin-left: 540px;"><code class="black-text"><?php echo count($activepositions);?></code>&nbsp;&nbsp;Existing Positions</span></p>
                        <div class="row s12">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'add-form',
                                'enableAjaxValidation' => false,
                            ));
                            ?>

                            <div class="col s6 input-field">
                            <input type="hidden" name="organ_search" required="required" value="<?php echo $organ; ?>"><br>
                                <input type="text" name="query" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <?php if ($results != '') { ?><label for="record" class="active">Searched Name </label><br>
                                    <?php } else{?>
                                <label for="record" class="active">Enter Position Name <span class="red-text">*</span></label><br>
                                    <?php }?>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button>
                                
                            </div>
<?php $this->endWidget(); ?>
                            <div class="col s6 input-field" style="overflow: auto; height: 200px; border: dotted; ">
                                <?php if(!empty($activepositions)){
                                    $t = 1;
                                    foreach($activepositions as $position){
                                        $status = $position->status;
                                        switch ($status){ case 'A': $color = ''; break; case 'D' : $color='red';}
                                    ?>
                                <p style="margin-left: 10px; color: <?php echo $color; ?>"><span><?php echo $t . '. '; ?></span><?php echo $position->name; ?></p>
                                    <?php $t++; }  } else{?>
                                <code class="red-text center" style="margin-left:200px;">!-- No Existing Positions were found -- !</code>
                                    <?php } ?>
                            </div>
                        </div>

                        <div class="row s12">
                            <p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo $resultcount; ?> Possible Matches</code></p>
                            <div class="col s12 input-field">
                                <?php
                                $min_length = 2;

                                if (strlen($searched) > $min_length) {
                                    if ($results != '') {
                                        foreach ($results as $record) {
//                                            organisation name
                                            $Orgid = $record->organization;
                                            $orgvalue = TOrganization::model()->findByPk($Orgid);
                                            $orgname = $orgvalue->name;
//                                            level name
                                            $Lid = $record->level;
                                            $Lvalue = TPersonpositionslevel::model()->findByPk($Lid);
                                            $Lname = $Lvalue->name;
//                                            weight name
//                                            $Wid = $record->weight;
//                                            $Wvalue = TPersonpositionsweight::model()->findByPk($Wid);
//                                            $Wname = $Wvalue->name;
                                            ?>
                                            <span class="row s12">
                                                <div class="col s6"><span>Name</span> &rtrif; <span class="black-text"><?php echo $record->name; ?></span></div>
                                                <!--<div class="col s4"><span>Weight</span> &rtrif; <span class="black-text"><?php // echo $Wname; ?></span></div>-->
                                                <div class="col s2"><span>Level</span> &rtrif; <span class="black-text"><?php echo $Lname; ?></span></div>
                                                <div class="col s2"><span>Start Date</span> &rtrif; <span class="black-text"><?php echo $record->start_date; ?></span></div>
                                            </span>
                                            <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            <?php
                                        }
                                        ?>

                                        <br><br>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'add-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <div class="row s12" style="margin-left: 800px;" >
                                            <input type="hidden" name="newname" value="<?php echo $searched; ?>">
                                            <input type="hidden" name="organ_search" required="required" value="<?php echo $organ; ?>">
                                            <?php
                                            foreach ($searchnames as $name) {
                                                $b = 1;
                                                ?>
                                                <div class="col s6">
                                                    <input type="hidden" name="result" required="required" value="<?php echo $name->id; ?>">
                                                    <input type="radio" onchange="this.form.submit();" id="<?php echo $name->id . 'result' . $b; ?>" name="result" class="with-gap" value="<?php echo $name->name; ?>">
                                                        <label for="<?php echo $name->id . 'result' . $b; ?>"> <?php echo $name->name; ?></label>
                                                </div>
                                                <?php
                                                $b++;
                                            }
                                            ?>
                                        </div>
                                    </div>
<!--                                    <div class="right">
                                        <button type="submit" class=" waves-effect waves-blue btn-flat lighten-4">Submit</button>
                                    </div>-->
                                    <?php $this->endWidget(); ?>

                                <?php } else {
                                    ?>
                                    <label class="black-text" >No results! Enter <code>name</code> to Display Possible Matches</label>
                                <?php } ?>
<?php } else { ?>
                                <br><br>
                                <label class="red-text" style="font-size: 14px; font-family: inherit;">Minimum length of characters for search is 2</label>
<?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//submit citation
include_once 'modals/submitcitation.php';
//view citation full profile
include_once 'modals/viewprofile.php';
//cancel citation
include_once 'modals/rejectcitation.php';
//view discard reason
include_once 'modals/viewdiscardreason.php';
//view reject reason
include_once 'modals/viewreasonreject_searchpage.php';
?>
    
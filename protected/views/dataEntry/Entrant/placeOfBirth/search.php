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
$personcite_attr_id = $code->decode($id);

$personcite_attr_Value = TPcitationProfilefieldsMappings::model()->findByPk($personcite_attr_id);
$personciteid = $personcite_attr_Value->citation;
$personfield = $personcite_attr_Value->profilefield;

$personValue = TPersonCitation::model()->findbypk($personciteid); //getting citation attributes
$personid = $personcite_attr_Value->person; // getting person id
$reason_D = $personcite_attr_Value->discard_reason_researcher;//getting discard reason from researcher
$reason_R = $personcite_attr_Value->rejectedreason_dataEntry;//getting rejected reason from supervisor
$status = $personcite_attr_Value->status; // getting citaion status 
$person = TPerson::model()->findByPk($personid);
$personName = $person->name; //getting organ name

//getting all employment for ths person
$existingpersonplaceOfBirth = TPersonplaceOfBirth::model()->findAll("person = $personid and status IN ('A','D','T')");

$usedcitation = TPersonplaceOfBirth::model()->findAllByAttributes(array('citation'=> $personciteid)); //check if citation has been used to create an attribute

//gender name
$gid = $person->gender; // getting gender value
$gendervalue = TPgender::model()->findByPk("$gid");
$gendername = $gendervalue->name;
//nationality name
$nid = $person->nationality; //getting country value
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
                                        <span class="black-text">Research</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Place Of Birth Citation', array('dataEntry/Entrant/placeOfBirth/index_new')); ?> &sol;
                                        <span>Search Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s10 m10">                                
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
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($personValue->title) > 10){
                                        $title = substr($personValue->title, 0, 10) . '...'; echo $title;  } else{ echo $personValue->title;} ?>"
                                           onclick="window.open('<?php echo $personValue->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
                                       
                                </ul>
                            </div>
                            <div class="col s2 right-align search-stats">
                               <span>
                                   <?php if(count($usedcitation)> 0){?>
                                <a href="#submitcitation" style="margin-top: 6px;" class="modal-trigger waves-effect waves-black tooltipped right btn-flat" data-position="top" data-delay="50" data-tooltip="Submit Citation" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons">forward</i></a>
                                   <?php } else {?>
                                <a href="#" style="margin-top: 6px;" class="grey tooltipped right btn-flat" data-position="top" data-delay="50" data-tooltip="Cannot submit Citation without creating a Address"><i class="material-icons">forward</i></a>
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
                            <?php if (strlen($reason_D) > 180){ $reason1 = substr($reason_D, 0, 180) . '...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason_D;} ?></span></p><br>
                <?php } elseif($status=='C'){ ?> 
                <p>
                <small class="grey-text">You Rejection reason was </small> &rtrif; 
                            <?php if (strlen($reason_R) > 160){ $reason1 = substr($reason_R, 0, 160) . '...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reasonreject">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason_R;} ?></span></p><br>
                <?php } else{ } ?>
                <div class="card z-depth-0">
                    <div class="card-content">
                        <p><span>Search Place of Birth with city </span>
                        <span style="margin-left: 540px;"><code class="black-text"><?php echo count($existingpersonplaceOfBirth);?></code>&nbsp;&nbsp;Existing Place(s) of Birth</span></p>
                        <div class="row s12">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'add-form',
                                'enableAjaxValidation' => false,
                            ));
                            ?>

                            <input type="hidden" name="person_search" required="required" value="<?php echo $personid; ?>"><br>
                            <div class="col s6 input-field">
                                <input type="text" name="query" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <?php if ($results != '') { ?><label for="record" class="active">Searched City Name </label><br>
                                    <?php } else{?>
                                <label for="record" class="active">Enter City Name <span class="red-text">*</span></label><br>
                                    <?php }?>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button>
                                
                            </div>
<?php $this->endWidget(); ?>
                            <div class="col s6" style="overflow: auto; height: 200px; border: dotted; ">
                                <?php 
                                 if(!empty($existingpersonplaceOfBirth)){
                                     $t = 1;
                                     $color = '';
                                     $addresscolor = '';
                                            foreach($existingpersonplaceOfBirth as $existingplaceOfBirth){
//                                                getting employment position id
                                            $city= $existingplaceOfBirth->city;
                                            $otherdetails= $existingplaceOfBirth->otherdetails;
                                            $country= $existingplaceOfBirth->country; //getting country value
                                            $countryValue = TCountry::model()->findByAttributes(array('code' => $country));
                                            $countryname = $countryValue->name;
                                            $status = $existingplaceOfBirth->status; ?>
                                            
                                       <?php switch ($status){case 'A':$placeOfBirthcolor = 'black-text'; break; case 'D' : $placeOfBirthcolor = 'red-text'; } ?>
                                <p><span><?php echo $t . '. '; ?></span><span class="<?php echo $placeOfBirthcolor; ?>"><?php echo $countryname; ?></span> &rtrif; <span class="<?php echo $placeOfBirthcolor; ?>"><?php echo $city; ?></span>
                                    &rtrif; <span class="<?php echo $placeOfBirthcolor; ?>"><?php echo $otherdetails; ?></span></p>
                                       
                                    <?php $t++;   }
                                     } else{?>
                                <code class="red-text center" style="margin-top: 80px; margin-left: 130px;">! -------- No Existing Place Of Birth Record(s) were found -------- !</code>
                                    <?php } ?>
                            </div>
                        </div>

                        <div class="row s12">
                            <p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo $resultcount; ?> Possibly matching Place of Birth Record(s)</code></p>
                            <div class="col s12 input-field">
                                <?php
                                $min_length = 2;

                                if (strlen($searched) > $min_length) {
                                    if ($results != '') {
                                        foreach ($results as $record) { 
                                            $cityresult = $record->city;
                                            $countryresult= $record->country; 
                                            $countryValueresult = TCountry::model()->findByAttributes(array('code' => $countryresult));
                                            $countrynameresult = $countryValueresult->name;
                                            $otherdetailsresult = $record->otherdetails;
                                            $statusresult = $record->status;
                                            ?>
                                <span <?php if(strlen($cityresult)>15 || strlen($countrynameresult)>15 || strlen($otherdetailsresult) > 25){ ?>class="row s12 modal-trigger" href='#viewpob<?php echo $record->id; ?>' onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" <?php } else { ?> class="row s12"<?php } ?>>
                                                <div class="col s4"><span>City</span> &rtrif;
                                                    <span class="black-text"><?php if (strlen($cityresult) > 15){ $cityresult1 = substr($cityresult, 0, 15) . '...';?>
                                                    <?php echo $cityresult1; ?><?php } else{ echo $cityresult;} ?></span></div>
                                                <div class="col s4"><span>Country</span> &rtrif; 
                                                    <span class="black-text"><?php if (strlen($countrynameresult) > 15){ $countrynameresult1 = substr($countrynameresult, 0, 15) . '...';?>
                                                    <?php echo $countrynameresult1; ?><span><?php } else{ echo $countrynameresult;} ?></span></span></div>
                                                <div class="col s4"><span>Other Details</span> &rtrif; 
                                                    <span class="black-text"><?php if (strlen($otherdetailsresult) > 25){ $otherdetailsresult1 = substr($otherdetailsresult, 0, 25) . '...';?>
                                                    <?php echo $otherdetailsresult1; ?><span><?php } else{ echo $otherdetailsresult;} ?></span></span></div>
                                            </span>
                                            <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            <?php          
                                        include 'modals/viewsearchedplaceOfBirth.php';
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
                                            <input type="hidden" name="person_id" required="required" value="<?php echo $personid; ?>">
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
                                    <?php $this->endWidget(); ?>

                                <?php } else {
                                    ?>
                                    <!--<label class="black-text" >No results! Enter <code>name</code> to Display Possible Matches</label>-->
                                <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'add-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <div class="row s12" style="margin-left: 800px;" >
                                            <input type="hidden" name="newname" value="<?php echo $searched; ?>">
                                            <input type="hidden" name="person_id" required="required" value="<?php echo $personid; ?>">
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
                                    <?php $this->endWidget(); ?>
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
include_once 'modals/viewprofilesearch.php';
//cancel citation
include_once 'modals/rejectcitation.php';
//view discard reason
include_once 'modals/viewdiscardreason.php';
//view reject reason
include_once 'modals/viewreasonreject_searchpage.php';
?>
    
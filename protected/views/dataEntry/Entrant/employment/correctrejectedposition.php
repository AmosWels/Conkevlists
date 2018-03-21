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
$employid = $code->decode($id); // getting employment details 
$employValue = TPersonEmploymentDetails::model()->findbypk($employid); // getting employment details

$postnid = $employValue->person_position; // position name
$citeid = $employValue->citation; // getting citation id
$person_id = $employValue->person; // getting person id
$personValue = TPerson::model()->findByPk($person_id); // getting person values
$personName = $personValue->name;

$reason = $employValue->supervisor_reject_reason; // getting rejection reason
$postnValue = TPersonpositions::model()->findByPk($postnid); //getting position details
$postnName = $postnValue->name;
$organid = $postnValue->organization; // organisation id

$citation = TPersonCitation::model()->findByPk($citeid); //getting citation details

$organValue = TOrganization::model()->findByPk($organid);  // getting organisation details
$organName = $organValue->name; // getting organisation name

$positions = TPersonpositions::model()->findAll("organization = $organid and status = 'A'"); // finding all positions in the organisation

$employment = TPersonEmploymentDetails::model()->findAll("person = $person_id and status IN ('A','D','T') "); // getting all other employments that are active and in drafts
//$matchResults = TPersonpositions::model()->findAll("name LIKE '%" . $posname . "%' AND organization = '$organ' AND status='A'"); // getting possible matches to the position


$join = new JoinTable; // instatiating the jointable class

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
                                        <span>Correction Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s5" style="text-align: left">
                                        <span class="grey-text text-darken-4">
                                            <small class="grey-text"> Selected Organisation </small> &rtrif; 
                                            <?php if (strlen($organName) > 30){
                                        $organ_name = substr($organName, 0, 30) . ' ...';  ?>
                                        <span class="modal-trigger" href="#vieworganname"  style="color: blue;" onmouseover="this.style.color = '';"  onmouseout="this.style.color = 'blue';"><?php echo $organ_name;?></span>
                                        <?php } else{ echo $organName;} ?>
                                        </span> 
                                    </li>
                                    <li class="tab col s5" style="text-align: left">
                                        <small class="grey-text"> Person </small>&rtrif; 
                                        <?php if (strlen($personName) > 40){
                                        $name = substr($personName, 0, 40) . ' ...';  ?>
                                        <span class="modal-trigger" href="#viewname"  style="color: blue;" onmouseover="this.style.color = '';"  onmouseout="this.style.color = 'blue';"><?php echo $name;?></span>
                                        <?php } else{ echo $personName;} ?>
                                        
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($citation->title) > 10){
                                        $title = substr($citation->title, 0, 10) . ' ...'; echo $title;  } else{ echo $citation->title;} ?>"
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
                            <?php if (strlen($reason) > 170){ $reason1 = substr($reason, 0, 170) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason;} ?></span></p><br>
                                <div class="row s12">
                                  <div class="col s8">
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'add-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                      <div class="card">
                                          <div class="card-content">
                                              <div class="card-title">Correct Position</div>
                                              <input type="hidden" name="employment_id_correct" value="<?php echo $employid; ?>">
                                              <div class="row s12">
                                                  <code>Correct</code> <span class="red-text"> <?php echo $personName; ?></span>
                                                  <code>As the</code> <span class="red-text"><?php echo $postnName; ?> </span> <code> IN </code> <span class="red-text"><?php echo $organName; ?></span>
                                              </div>
                                              <div class="row s12">
                                                  <div class="input-field col s6">
                                                      <input placeholder="....." id="mark1" name="start_date" type="text"  class="masked" required="required" data-inputmask="'mask': 'y/m/d'" value="<?php echo $employValue->start_date; ?>">
                                                      <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
                                                  </div>
                                                  <div class="input-field col s6">
                                                      <input placeholder="....." id="mark1" name="end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $employValue->end_date; ?>">
                                                      <label for="mark1" class="active">End Date (y/m/d)</label>
                                                  </div>
                                              </div>
                                <div class="row" style="margin-left: 10px;">
                                    <button type="submit" class="waves-effect waves-blue btn blue right ">Correct</button>
                                    <a href="#discard" class="modal-trigger waves-effect waves-black tooltipped" data-position="top" data-delay="50" data-tooltip="Discard Supervision" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" style="text-decoration: underline;">Discard Supervision</a> 
                                    <a href="#deleteEmployment"  class="modal-trigger waves-effect waves-grey tooltipped btn-flat small" data-position="top" data-delay="50" data-tooltip="Delete Employment" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons medium-small">delete</i></a>
                                    <a href="#submitEmployment"  class="waves-effect waves-black tooltipped modal-trigger btn-flat small" data-position="top" data-delay="50" data-tooltip="Submit Employment" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons medium-small">forward</i></a>
                                 </div>
                            </div>
                        </div>
                                        <?php $this->endWidget(); ?>
                        </div>   
            <div class="col s4">
                            <div class="card" style="overflow: auto; height: 500px; border: dotted; ">
                            <div class="card-content">
                                <div class="card-title"> Other Employment Held By <?php if (strlen($personName) > 30){
                                        $newname = substr($personName, 0, 30) . ' ...'; echo $newname; ?>
                                        <?php } else{ echo $personName;} ?></div>
                                <ol>
                                    <?php if(!empty($employment)){
                                           foreach ($employment as $record){
                                               $positionid = $record->person_position;
                                               $positionValue = TPersonpositions::model()->findByPk($positionid);
                                               $name_of_position = $positionValue->name;
//                                               get organisation detail
                                               $organid = $positionValue->organization;
                                               $organValue = TOrganization::model()->findByPK($organid);
                                               $name_of_organ = $organValue->name;
                                               $status = $record->status;
                                               switch ($status){ case 'A': $color = 'black-text'; $positioncolor = 'black-text'; break; case 'D' : $color='red-text'; $positioncolor = 'red-text'; } 
                                        ?>
                                    <li><span class="<?php echo $positioncolor; ?>"><?php echo $name_of_position; ?></span> &rtrif;  <span class="<?php echo $color; ?>"><?php echo $name_of_organ; ?></span></li>
                                           <?php } } else{ ?>
                                              <code class="red-text center" style="margin-top: 80px;">! -- No Employment Record(s) were found -- !</code>
                                           <?php } ?>
                                </ol>
                            </div>
                            </div>
                            </div>
        </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
////view organisation name
include_once 'modals/viewprofileposition.php';
////cancel reason rejection
include_once 'modals/viewreasonreject.php';
////delete employment
include_once 'modals/deleteEmploymentexists.php';
////discard position
include_once 'modals/discardsupervisedemployment.php';
////submit position
include_once 'modals/submitsupervisedemployment.php';
?>

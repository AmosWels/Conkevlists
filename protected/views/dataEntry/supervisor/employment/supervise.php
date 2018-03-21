<?php
//$userid = Yii::app()->user->userid;
//encryption
$id = yii::app()->request->getParam('id');
$code = new Encryption;
$employmentid = $code->decode($id); // decode employment id

$employmentValue = TPersonEmploymentDetails::model()->findByPk("$employmentid"); // getting employment values
$personid = $employmentValue->person; //getting person id
$cite_id = $employmentValue->citation; // getting citation id

$personValue = TPerson::model()->findByPK($personid); // getting person detail
$personName = $personValue->name; // getting person name
$nationality = $personValue->nationality;

$personciteValue = TPersonCitation::model()->findbypk($cite_id); //getting citation attributes

//getting all employment for this person
$personemployment = TPersonEmploymentDetails::model()->findAll("person = $personid and status IN ('A','D')");

$reason_R = $employmentValue->supervisor_reject_reason; // get rejection reason
$reason_D = $employmentValue->dataEntrant_discard_reason; // get discard reason
$positionstatus = $employmentValue->status;

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
                                        <span class="black-text">Supervisor</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/supervisor/panel')); ?> &sol;
                                        <?php echo CHtml::link('Draft', array('dataEntry/supervisor/employment')); ?> &sol;
                                        <span><?php echo $personName; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">                            
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Person </small>&rtrif; <?php echo $personName1; ?>
                                            &mid; <small class="grey-text">Nationality </small> &rtrif;  <?php echo $nationalityname1; ?> 
                                            &mid; <small class="grey-text">Gender </small> &rtrif;  <?php echo $gendername1; ?> 
                                        </span>
                                        <?php if(strlen($personName)>30 || strlen($nationalityname)>15 || strlen($gendername)>20){?><span class="modal-trigger" href="#viewprof"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($personciteValue->title) > 10){
                                        $title = substr($personciteValue->title, 0, 10) . '...'; echo $title;  } else{ echo $personciteValue->title;} ?>"
                                           onclick="window.open('<?php echo $personciteValue->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
                                       
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
<!--###################################-->
            <div id="web"> 
                <div class="search-page-results">
                    <!--corrected rejection-->
                    <?php if($positionstatus =='C'){ ?> 
                    <p style="margin-left: 15px;"><small class="grey-text">You Rejection reason was  </small> &rtrif; 
                            <?php if (strlen($reason_R) > 170){ $reason1 = substr($reason_R, 0, 170) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#rejectreason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason_R;} ?></span></p><br>
                   <!--discarded rejection-->
                    <?php } elseif($positionstatus =='L') { ?>
                    <p style="margin-left: 15px;"><small class="grey-text">Your supervision has been discarded because </small> &rtrif; 
                            <?php if (strlen($reason_D) > 160){ $reasondiscard = substr($reason_D, 0, 160) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#discardreason">
                                <?php echo $reasondiscard; ?></a><span><?php } else{ echo $reason_D;} ?></span></p><br>
                    <?php } else{} ?>
                    <div class="row s12">
                        <?php
//                        employment details
                        $postn_id = $employmentValue->person_position; // getting position
                        $postnValue = TPersonpositions::model()->findByPk($postn_id);
                        $positionnewName = $postnValue->name;
                        $startdate = $employmentValue->start_date;
                        $enddate = $employmentValue->end_date;
//                        getting position organisation
                        $organ_id = $postnValue->organization; // getting position
                        $organValue = TOrganization::model()->findByPk($organ_id);
                        $organName = $organValue->name;
                        ?>
                        <div class="col s4">
                            <div class="card z-depth-0 ">
                                <div class="card-content" style="overflow:auto; height: 180px;">
                                    <div class="card-title">Employment Details</div>
                                    <ul class="black-text">
                                        <li>Position<span class="right"><?php if (strlen($positionnewName) > 30) {
                                            $longname = substr($positionnewName, 0, 30) . ' ...'; ?>
                                            <span href="#posnname" class="modal-trigger" style="color: black;" onmouseover="this.style.color = 'blue';"  onmouseout="this.style.color = '';"><?php echo $longname;?></span>
                                           <?php } else {
                                                echo $positionnewName;
                                            } ?></span></li>
                                        <li>Organization<span class="right"><?php if (strlen($organName) > 30) {
                                                $longorgname = substr($organName, 0, 30) . ' ...'; ?>
                                            <span href="#orgname" class="modal-trigger" style="color: black;" onmouseover="this.style.color = 'blue';"  onmouseout="this.style.color = '';"><?php echo $longorgname; ?></span>
                                         <?php   } else {
                                                echo $organName;
                                            } ?></span></li>
                                        <li>Start Date<span class="right"><?php echo $startdate; ?></span></li>
                                        <li>End Date<span class="right"><?php echo $enddate; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col s8">
                            <div class="card z-depth-0">
                                <div class="card-content" style="overflow:auto; height: 180px; border: dotted; ">
                                    <div class="card-title"><span>Existing Employment</span></div>
                                <?php 
                                $positions = '';
                                 if(!empty($personemployment)){
                                     $t = 1;
                                            foreach($personemployment as $employment){
//                                                getting employment position id
                                            $positions .= $employment->person_position . ' ,'; // getting an array of mapped positions
                                            $positionsids= $employment->person_position;
                                            $positionValue = TPersonpositions::model()->findByPk($positionsids);
                                            $positionName = $positionValue->name;
//                                            getting organisation details of the employment
                                            $organ = $positionValue->organization;
                                            $organValue = TOrganization::model()->findByPk($organ);
                                            $organName = $organValue->name;
                                            $status = $employment->status; ?>
                                            
                                       <?php switch ($status){ case 'A': $color = ''; $positioncolor = 'black-text'; break; case 'D' : $color='red'; $positioncolor = 'red-text'; } ?>
                                <p style=" color:<?php echo $color; ?>"><span><?php echo $t . '. '; ?></span><span class="<?php echo $positioncolor; ?>"><?php echo $positionName; ?></span> &rtrif; <span><?php echo $organName; ?></span></p>
                                       
                                    <?php $t++;
                                       }
                                    $positions_held_ids = rtrim($positions, ' ,'); //array of all positions ids that the person holds
                                    $matchResults = TPersonpositions::model()->findAll("name LIKE '%" . $positionnewName . "%' and id IN($positions_held_ids)");
                                       } else{  $positions_held_ids = '';
                                       $matchResults = '';
                                       ?>
                                <code class="red-text center" style="margin-top: 30px; margin-left: 200px;">! -------- No Employment Record(s) were found -------- !</code>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
<!--                    </div>
                    <div class="row s12">-->
                        <div class="col s12">
                            <div class="card z-depth-0">
                                <div class="card-content">
                                    <div class="card-title">Possible Matches</div>
                                    <?php 
                                    
                                    if (!empty($matchResults)) { ?>
                                        <table id="example" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th>Position Names</th>
                                                    <th>level</th>
                                                    <th>Start Date</th>
                                                </tr>
                                            </thead>
                                            <tfoot><tr></br></tr></tfoot>
                                            <tbody>
                                        <?php
                                        foreach ($matchResults as $recordname) {
                                            $orgid = $recordname->organization;
                                            $orgValue = TOrganization::model()->findByPk($orgid);
                                            $orgName = $orgValue->name;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $recordname->name; ?></td>
                                                        <td><?php echo $orgName; ?></td>
                                                        <td><?php echo $recordname->start_date; ?></td>
                                                    </tr>
                                                        <?php }
                                                    ?>
                                            </tbody>
                                        </table>
                                        <?php } else {
                                                 ?> 
                                    <code class="red-text" style="margin-left: 100px;">!--No matching Employment <code>for</code> <span class="black-text"><?php echo ' "'.$personName . '" '; ?></span> <code>As</code> <span class="black-text"><?php echo ' "'.$positionnewName . '" '; ?></span> <code>In</code> <span class="black-text"><?php echo ' "'.$organName . '" '; ?></span>--!</code><br><br><br> 
                                                <?php } ?>
                                </div>
                            </div>
                            <div class="right-align">
                                <?php if($positionstatus == 'T'){ ?>
                                <a href="#rejectposition" class="waves-effect waves-blue btn-flat modal-trigger">REJECT</a> 
                                <?php } else{ ?>
                                <a href="#rejectposition" class="waves-effect waves-blue btn-flat modal-trigger">REJECT AGAIN</a> 
                               <?php } ?>
                                <a href="#approveposition" class="waves-effect waves-blue btn blue modal-trigger">APPROVE</a>                                              
                            </div> 
                        </div>
                    </div>
                </div>
            </div>




            <!--###############################-->

        </div>
    </div>
</div>

<?php
//submit citation
include_once 'modals/approvePosition.php';
//reject position
include_once 'modals/rejectPosition.php';
//discard reason
include_once 'modals/viewdiscardreason.php';
//reject reason
include_once 'modals/viewrejectreason.php';
//Position profile
include_once 'modals/viewprofile.php';
//organization name
include_once 'modals/viewNameOrganposition.php';
//position name
include_once 'modals/viewNamePosition.php';
?>

<?php
//$userid = Yii::app()->user->userid;
//encryption
$id = yii::app()->request->getParam('id');
$code = new Encryption;
$posid = $code->decode($id);
$position = TPersonpositions::model()->findByPk("$posid");
$organid = $position->organization;
$organValue = TOrganization::model()->findByPK($organid);
$organname = $organValue->name;
$name = $position->name;
$cit_id = $position->citation;
$citation = TOrganizationCitation::model()->findByPk("$cit_id");

$join = new JoinTable();
$mappings = $join->organizationCitationMapping($position->id);

$matchResults = TPersonpositions::model()->findAll("name LIKE '%" . $name . "%' AND organization = '$organid' and status ='A'"); // getting all positions with possible matches

$activepositions = TPersonpositions::model()->findAll("organization=$organid and status IN ('A','D') ORDER BY name"); // getting all draft and active positions

$reason_R = $position->supervisor_reject_reason; // get rejection reason
$reason_D = $position->dataEntrant_discard_reason; // get discard reason
$positionstatus = $position->status;

//limiting length of display
if (strlen($organname) > 30) {
    $organName1 = substr($organname, 0, 30) . '...';
} else {
    $organName1 = $organname;
}
if (strlen($name) > 35) {
    $name1 = substr($name, 0, 35) . '...';
} else {
    $name1 = $name;
}
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
<?php echo CHtml::link('Draft', array('dataEntry/supervisor/politicalassignment')); ?> &sol;
                                        <span><?php echo $name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">                            
                            <div class="col s12 m12 16 ">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Position </small>&rtrif; <?php echo $name1; ?>
                                        </span> &nbsp;&nbsp;&nbsp;
                                        <span class="grey-text text-darken-4"><small class="grey-text">Organisation</small>&rtrif; <?php echo $organName1; ?>
                                        </span>&nbsp;&nbsp;&nbsp;
<?php if (strlen($organname) > 30 || strlen($name) > 30) { ?><span class="modal-trigger" href="#viewprof"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
<?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                        <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($citation->title) > 10){
                                            $title = substr($citation->title, 0, 10) . '...'; echo $title;  } else{ echo $citation->title;} ?>"
                                          onclick="window.open('<?php echo $citation->url; ?>', 'popup', 'height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
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
                            <?php if (strlen($reason_R) > 150){ $reason1 = substr($reason_R, 0, 150) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#rejectreason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason_R;} ?></span></p><br>
                   <!--discarded rejection-->
                    <?php } elseif($positionstatus =='L') { ?>
                    <p style="margin-left: 15px;"><small class="grey-text">Your supervision has been discarded because </small> &rtrif; 
                            <?php if (strlen($reason_D) > 150){ $reasondiscard = substr($reason_D, 0, 150) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#discardreason">
                                <?php echo $reasondiscard; ?></a><span><?php } else{ echo $reason_D;} ?></span></p><br>
                    <?php } else{} ?>
                    <div class="row s12">
                        <?php
                        $lid = $position->level;
                        $levelvalue = TPersonpositionslevel::model()->findByPk($lid);
                        $levelname = $levelvalue->name;
                        ?>
                        <div class="col s4">
                            <div class="card z-depth-0 ">
                                <div class="card-content" style="overflow:auto; height: 180px;">
                                    <div class="card-title">Position Details</div>
                                    <ul class="black-text">
                                        <li>Name<span class="right"><?php if (strlen($position->name) > 30) {
                            echo substr($position->name, 0, 30) . ' ...';
                        } else {
                            echo $position->name;
                        } ?></span></li>
                                        <li>Start Date<span class="right"><?php echo $position->start_date; ?></span></li>
                                        <li>level<span class="right"><?php echo $levelname; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col s8">
                            <div class="card z-depth-0">
                                <div class="card-content" style="overflow:auto; height: 180px; border: dotted; ">
                                    <div class="card-title"><span>Existing Positions</span></div>
<?php
if (!empty($activepositions)) {
    $t = 1;
    foreach ($activepositions as $positions) {
        $pname = $positions->name;
        $status = $positions->status;
        switch ($status) {
            case 'A': $color = '';
                break;
            case 'D' : $color = 'red';
        }
        ?>
                                            <p style="color: <?php echo $color; ?>"><span><?php echo $t . '. '; ?></span>
        <?php if (strlen($pname) > 50) {
            $name1 = substr($pname, 0, 50) . '...'; ?>
                                                    <span class="modal-trigger" href="#position<?php echo $positions->id; ?>"><?php echo $name1; ?></span><span><?php } else {
            echo $pname;
        } ?></span>
                                            </p>
        <?php include 'modals/viewposition.php';
   $t++; }
} else {
    ?>
                                        <code class="red-text center" style="margin-left:200px;">!-- No Positions were found -- !</code>
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
<?php if (!empty($matchResults)) { ?>
                                        <table id="example" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th style="width: 750px;">Position Names</th>
                                                    <th>level</th>
                                                    <th>Start Date</th>
                                                </tr>
                                            </thead>
                                            <tfoot><tr></br></tr></tfoot>
                                            <tbody>
                                        <?php
                                        foreach ($matchResults as $recordname) {
                                            $lid = $recordname->level;
                                            $levelvalue = TPersonpositionslevel::model()->findByPk($lid);
                                            $levelname = $levelvalue->name;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $recordname->name; ?></td>
                                                        <td><?php echo $levelname; ?></td>
                                                        <td><?php echo $recordname->start_date; ?></td>
                                                    </tr>
        <?php }
    ?>
                                            </tbody>
                                        </table>
<?php } else {
    ?> 
                                    <code class="red-text" style="margin-left: 450px;">! -- No matching Active positions for <span class="black-text"><?php echo $organname; ?></span> -- !</code><br><br><br>    
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
?>

<?php
//encryption
$code = new Encryption;
$join = new JoinTable;
?>

<?php
$userid = Yii::app()->user->userid;

$organizationtypes = TOrganizationtype::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");

$citationdraft = TOrganizationCitation::model()->findAll("status IN ('D','R') and maker='$userid'");

$rejectedmappings = TOrganizationcitationMapping::model()->findAll("status = 'R' and maker='$userid'");
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
                                        <?php echo CHtml::link('Panel', array('dataEntry/maker/panel')); ?> &sol;
                                        <span>Organization Draft</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp; <?php echo count($citationdraft); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#rejected">Rejected <span class="red white-text circle">&nbsp;  <?php echo count($rejectedmappings); ?> &nbsp;</span></a></li>
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

                <div id="draft">
                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create" >
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a href="javascript:AlertIt();" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="New Organisations"><i class="material-icons">people</i></a></li>
                            <li><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation" class="btn-floating red waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="New Citation"><i class="material-icons">loupe</i></a></li>
                        </ul>
                    </div>  
                    <div class="card z-depth-0">
                        <div class="card-content">
                            
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th>Citation Title</th>
                                    <th>Organization</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                $organid = '';
                                $organName = '';
                                if (!empty($citationdraft)){
                                foreach ($citationdraft as $record) {
                                    $organ_id = $record->organization;
                                    $status = $record->status;
                                    $organValue = TOrganization::model()->findByPk($organ_id);
                                    $organName = $organValue->name;
                                    ?>
                                <?php if($status == 'R') {?> 
                                        <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/view&id=<?php echo $code->encode($organ_id); ?>'">
                                            <?php } else { ?>
                                        <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/view&id=<?php echo $code->encode($organ_id); ?>'">
                                            <?php }?>
                                    
                                        <td><?php echo $record->title; ?></td>
                                        <td><?php echo $organName; ?></td>
                                        <td><?php echo $record->createdon; ?></td>
                                    </tr>
                                <?php } } ?>                                        
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                </div> 
                <div id="rejected">
                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create" >
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a href="javascript:AlertIt();" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="New Organisations"><i class="material-icons">people</i></a></li>
                            <li><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation" class="btn-floating red waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="New Citation"><i class="material-icons">loupe</i></a></li>
                        </ul>
                    </div>  
                    <div class="card z-depth-0">
                        <div class="card-content">
                            
                        <table id="example2" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th>Citation Title</th>
                                    <th>Organization</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                $organid = '';
                                $organName = '';
                                if (!empty($rejectedmappings)){
                                foreach ($rejectedmappings as $record) {
                                    $citeid = $record->citation;
                                    $citeValue = TOrganizationCitation::model()->findByPk($citeid); //getting citation details
                                    
                                    $organ_id = $record->organization;
                                    $status = $record->status;
                                    $organValue = TOrganization::model()->findByPk($organ_id);
                                    $organName = $organValue->name;
                                    ?>
                                        <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/correct_citation&id=<?php echo $code->encode($record->id); ?>'">
                                        <td><?php echo $citeValue->title; ?></td>
                                        <td><?php echo $organName; ?></td>
                                        <td><?php echo $citeValue->createdon; ?></td>
                                    </tr>
                                <?php } } ?>                                        
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<?php
//add organization
//include_once 'modals/addOrganization.php';
?>


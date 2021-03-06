<?php
$mapped_org_types = TOrganization::model()->findAll("status!=''");
$org_id = '';
foreach($mapped_org_types as $mapped){
    $org_id .= $mapped->type.', ';
//    $citevalue = TOrganizationCitation::model()->findbypk("$cite_id");
}

$ids = rtrim($org_id,', ');
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
                                        <span class="black-text">Settings</span> &sol;
                                         <?php echo CHtml::link('Panel', array('settings/panel')); ?> &sol;
                                        <span>Organization Type</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Organization Types</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($model);?>&nbsp;&nbsp;</span>  
                                    </li>  
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
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a href="#createType" class="btn-floating btn-large waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="Create Type" >
                            <i class="large material-icons">add</i>
                        </a>
                    </div> 
                <!--$##############################3-->
                <?php if (!empty($model)) { ?>
                    
                    <div class="card z-depth-0">
                        <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th style="width: 1050px;">Organization Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                $r=1;
                                foreach ($model as $record) {
                                    switch ($record->status){ case 'A': $status = 'Active'; $btn = 'De-Activate'; $color='green-text'; break; case 'C': $status = 'Closed'; $btn = 'Activate'; $color='red-text'; break;}
                                    $type_id = $record->id;
                                    $types = TOrganizationtype::model()->findAll("$type_id IN ($ids)");
                                    ?>
                                    <tr >
                                        <td><?php echo $r; ?>.</td>
                                        <td><?php echo $record->name; ?></td>
                                        <td ><a class="<?php echo $color; ?> modal-trigger" href="#organizationtype-status<?php echo $record->id;?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $status; ?></a></td>
                                        <td><a href="#editType<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">edit</i></a>
                                            <?php if (count($types)>0){ ?><a style="color: red;"><i class="material-icons tiny">delete</i></a> <?php } else{?>
                                            <a href="#deletetype<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">delete</i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $r++;
                                    include 'modals/organizationTypeStatus.php';
                                    include 'modals/deleteType.php';
                                    include 'modals/editType.php';
                                    } ?>                                        
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                    
                    <?php } ?>

                

            </div>
        </div> 
    </div>
</div>
<?php
include_once 'modals/createOrganizationType.php';
//include_once 'modals/EditOrganizationType.php';
?>
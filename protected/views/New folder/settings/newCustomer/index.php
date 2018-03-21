<?php
$panel_link = "settings/panel";
?>
<?php
$code = new Encryption;

if(isset($_GET['loc'])){
    $tab_id = $code->decode($_GET['loc']);	
}else{
    $tab_id = "";
}
?>
<?php 
    $user = Yii::app()->user->userid;

    $requirements = TInformationRequirement::model()->findAll("process = 'CT' AND status = 'D' AND maker = '$user'"); 
    $clienttypes = CCustomerType::model()->findAll("status = 'A'"); 
    $documenttypes = TDocumentType::model()->findAll("status='A'"); 
?>

<?php
//$code = new Encryption;
//$settings_link = "settings/panel";
//$settings_encrypt = $code->encode($settings_link);
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
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $panel_link; ?>">Settings</a> &raquo; 
                                        <span>New Customer</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(<?php echo count($requirements); ?>)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox<span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved<span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
                                </ul>
                            </div>
                            <!--                            <div class="col s12 m6 l6 right-align search-stats">
                                                            <span class="m-r-sm">About 138,000,000 results</span><span class="secondary-stats">0.47 seconds</span>
                                                        </div>-->
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
                    <div class="fixed-action-btn" style="bottom: 15px; right: 24px;">
                        <!--create information requirement-->
                        <a href="#create_info" class="btn-floating btn-large darken-1waves-effectwaves-effect modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Create Information Requirement">
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col s12 m3 14">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <div class="tabs-vertical">
                                        <ul class="tabs z-depth-0 transparent">
                                            <!--list information requirements as vertical tabs-->
                                            <?php
                                            if(!empty($requirements)){
                                            $ir=1;
                                                foreach($requirements as $requirement){
                                                  $count_mapping = TInformationrequirementCustomertype::model()->count("information_requirement=$requirement->id");
                                            ?>
                                            <li class="tab">
                                                <a href="#information<?php echo $requirement->id;?>" class="<?php if($requirement->id == $tab_id){ echo "active"; }?>">
                                                   &nbsp;<?php echo $requirement->name; ?><span>&nbsp;&nbsp;&nbsp;(<?php echo $count_mapping;?>)</span>
                                                </a> 
                                            </li>
                                             <?php
                                                $ir++; } }
                                             ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col s12 m9"> 
                            <?php
                            if(!empty($requirements)){
                            $r=1;
                                foreach($requirements as $requirement){
                            ?>
                            <div id="information<?php echo $requirement->id;?>" class="card grey lighten-4">                            
                                <div class="card-content">
                                    <span class="card-title"><?php echo $requirement->name;?> - 
                                        <span style="font-size: 12px; text-transform: lowercase">
                                            <?php if(strlen($requirement->description) > 100){?>
                                            <?php echo substr($requirement->description,0,100);?>
                                                <a href="#info-description<?php echo $r; ?>" class="modal-trigger"><span> Read more ...</span></a>
                                                <?php 
                                                    //view full description for information requirement
                                                    include 'modals/viewInformationDescription.php'; 
                                                ?>
                                            <?php }else{ echo $requirement->description; }?>       
                                        </span>
                                        <span><a href="#edit_info<?php echo $r; ?>" class="modal-trigger"><i class="material-icons tiny tooltipped" data-position="top" data-delay="50" data-tooltip="Edit Information Requirement">edit</i></a></span>
                                        
                                    </span>
                                    <div class="row s12">
                                        
                                        <?php
                                        $clienttype_mappings = TInformationrequirementCustomertype::model()->findAll("information_requirement = $requirement->id");
                                        
                                        
                                        if (!empty($clienttype_mappings)) {
                                            $ct=1; $doc_track = 0;
                                            $clienttype_mapping_set = "";
                                            foreach ($clienttype_mappings as $clienttype_mapping) {
                                                $clienttype_mapping_set .= rtrim($clienttype_mapping->customer_type . ',');
                                                $clienttype_name = CCustomerType::model()->findByPk($clienttype_mapping->customer_type); 

                                            $documenttype_mappings = TInformationrequirementCustomertypeDocumenttype::model()->findAll("inforreg_custype = $clienttype_mapping->id"); 
                                            if(!empty($documenttype_mappings)){
                                                $documenttype_mapping_set = "";
                                                foreach ($documenttype_mappings as $documenttype_mapping){
                                                    $documenttype_mapping_set .= rtrim($documenttype_mapping->document_type.','); }                                                        
                                            }else{ $documenttype_mapping_set = ""; $doc_track++; }
                                        ?>                                        
                                        
                                        <div class="col s12 m4 l4">
                                            <div class="card stats-card">
                                                <div class="card-content">
                                                    <span  style="font-size: 16px;"><?php echo $clienttype_name->name; ?></span><br/>
                                                    <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#map-documenttype<?php echo $r.$ct; ?>" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Document Types</span></a><span class="right">(<?php echo count($documenttype_mappings);?>)</span><br/>
                                                    <a href="#map-questionnaire<?php echo $r.$ct; ?>" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span class="grey-text">Questionnaire</span></a><span class="right">(_)</span><br/>
                                                    <a href="#external-data<?php echo $r.$ct; ?>" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="View"><span class="grey-text">External System Data</span></a><span class="right">(_)</span><br/>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                            //map document types
                                            include 'modals/mapDocument.php';
                                            //map qustionnaire
                                            include 'modals/mapQuestionnaire.php';
                                            //view external data
                                            include 'modals/viewExternalData.php';
                                        ?>
                                        <?php 
                                        $ct++; } 
                                        }else{
                                            $clienttype_mapping_set = "";
                                            $doc_track = 1;
                                        }
                                         ?>
                                        
                                    </div>

                                    <div class="right-align">
                                            <a href="#delete-information<?php echo $r; ?>" class="modal-trigger waves-effect waves-grey btn-flat"><i class="close material-icons large">delete</i></a>                                        
                                        <?php if($doc_track > 0) { ?>
                                            <a href="#" class="waves-effect waves-blue btn blue disabled">Submit</a> 
                                        <?php }else{ ?>
                                            <a href="#submit-information<?php echo $r; ?>" class="modal-trigger waves-effect waves-blue btn blue right">Submit</a>                                              
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div>   
                            <?php
                                //edit information requirement
                                include 'modals/editInformationRequirement.php';
                                //delete information requirement
                                include 'modals/deleteInformationRequirement.php';
                                //submit information requirement
                                include 'modals/submitInformationRequirement.php';
                            ?>
                             <?php
                                $r++; } }
                             ?>
                            
                        </div>
                        
                    </div>
                </div> 

                <!--###############################-->
                <div id="inbox">
                    <h3>Pending ...</h3>
                </div>

                <!--###############################-->
                <div id="approved">
                    <h3>Pending ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
//add information requirement
include_once 'modals/addInformationRequirement.php'; 
?>


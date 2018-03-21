<?php 
    $requirements = TInformationRequirementIr::model()->findAll(); 
    $clienttypes = CCustomerType::model()->findAll(); 
//    $documenttypes = TDocumentType::model()->findByAttributes(array('status'=>'A')); 
    $documenttypes = TDocumentType::model()->findAll("status='A'"); 
?>

<?php
//$code = new Encryption;
$settings_link = "settings/panel";
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
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $settings_link; ?>">Settings</a> &raquo; 
                                        <span>Customer Types</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft" class="active">Draft <span>&nbsp;&nbsp;&nbsp;(<?php echo count($requirements); ?>)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved <span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
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
                                            $i=1;
                                                foreach($requirements as $requirement){
                                                  $count_mapping = TIrCustomerTypeIrct::model()->count("information_requirement=$requirement->id AND status='A'");
                                            ?>
                                            <li class="tab">
                                                <a href="#<?php echo $requirement->id;?>"><?php echo $requirement->name; ?>
                                                    <span>&nbsp;&nbsp;&nbsp;(<?php echo $count_mapping;?>)</span>
                                                </a> 
                                            </li>
                                             <?php
                                                $i++; } }
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
                            <div id="<?php echo $requirement->id;?>" class="card grey lighten-4">                            
                                <div class="card-content">
                                    <span class="card-title"><?php echo $requirement->name;?> - 
                                        <span style="font-size: 12px; text-transform: lowercase">
                                            <?php if(strlen($requirement->description) > 100){?>
                                            <?php echo substr($requirement->description,0,140);?>
                                                <a href="#info-description<?php echo $r; ?>" class="modal-trigger"><span> Read more ...</span></a>
                                                <?php 
                                                    //view full description for information requirement
                                                    include 'modalsCustomer/viewInfoDescription.php'; 
                                                ?>
                                            <?php }else{ echo $requirement->description; }?>       
                                        </span>
                                        <span><a href="#edit_info<?php echo $r; ?>" class="modal-trigger"><i class="material-icons tiny tooltipped" data-position="top" data-delay="50" data-tooltip="Edit Information Requirement">edit</i></a></span>
                                        
                                    </span>
                                    <div class="row s12">
                                        
                                        <?php
//                                        $clienttypeArray = explode(',', $requirement->clienttypes);
                                        $ct_mappings = TIrCustomerTypeIrct::model()->findAll("information_requirement=$requirement->id AND status='A'"); 

                                        if(!empty($ct_mappings)){
                                            $m=1;
                                            $clienttype_set = "";
                                            foreach($ct_mappings as $ct_mapping){
                                                $clienttype_set .= rtrim($ct_mapping->customer_type.',');
                                                $ct_name = CCustomerType::model()->findByAttributes(array('code'=>$ct_mapping->customer_type)); 
                                                
                                                $documenttype_set = "";
                                                $document_sets = TIrctDocumentType::model()->findAll("irct = $ct_mapping->id AND status = 'A'"); 
                                                    if(!empty($document_sets)){
                                                        foreach ($document_sets as $document_set){
                                                        $documenttype_set .= rtrim($document_set->document_type.','); }                                                        
                                                    }else{ $documenttype_set = ""; }
                                                ?>                                        
                                        
                                        <div class="col s12 m4 l4">
                                            <div class="card stats-card">
                                                <div class="card-content">
                                                    <span  style="font-size: 16px;"><?php echo $ct_name->name; ?></span><br/>
                                                    <a href="#map-document<?php echo $m; ?>" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Document Types</span></a><span class="right">(<?php echo count($document_sets);?>)</span><br/>
                                                    <a href="#question" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Questionnaire</span></a><span class="right">(_)</span><br/>
                                                    <a href="#externaldata" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="View"><span>External System Data</a><span class="right">(_)</span></span><br/>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                            //map document types
                                            include 'modalsCustomer/mapDocument.php';
                                        ?>
                                        <?php 
                                        $m++; } 
                                        }else{
                                            $clienttype_set = "";
                                        }
                                         ?>
                                        
                                        
                                        
                                    </div>

                                    <div class="right-align">
                                        <a type="#" class="waves-effect waves-grey btn-flat sweetalert-basic"><i class="close material-icons large">delete</i></a>
                                        <a href="#" class="waves-effect waves-blue btn blue">Submit</a> 
                                    </div>
                                </div> 
                            </div>   
                            <?php
                                //edit information requirement
                                include 'modalsCustomer/editInfoReq.php';
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
//add info req
include_once 'modalsCustomer/addInfoReq.php';

////edit info req
//include_once 'modalsCustomer/editInfoReq.php';

//map question
include_once 'modalsCustomer/mapQuestion.php';

////map document type
//include 'modalsCustomer/mapDocument.php';

//view external data
include_once 'modalsCustomer/viewExternalData.php';


?>

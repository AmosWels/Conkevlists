<?php
$panel_link = "settings/panel";
?>
<?php
$user = Yii::app()->user->userid;

$documenttypes = TDocumentType::model()->findAll("status = 'D' AND maker = '$user'");
$metadatas = TMetadata::model()->findAll("status='A'");
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
                                        <span>Document Types</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(<?php echo count($documenttypes); ?>)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox<span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved<span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
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
                    <div class="fixed-action-btn" style="bottom: 15px; right: 24px;">
                        <a href="#create_document" class="btn-floating btn-large darken-1waves-effectwaves-effect modal-trigger tooltipped"  data-position="left" data-delay="50" data-tooltip="Create Document Type" >
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>

                    <div class="row s12">
                        <?php
                        if (!empty($documenttypes)) {
                            $d = 1;
                            foreach ($documenttypes as $documenttype) {
                                ?>                        
                                <?php
                                $metadata_mappings = TDocumenttypeMetadata::model()->findAll("document_type = $documenttype->id");

                                if (!empty($metadata_mappings)) {
                                    $metadata_mapping_set = "";
                                    foreach ($metadata_mappings as $metadata_mapping) {
                                        $metadata_mapping_set .= rtrim($metadata_mapping->metadata . ',');
                                    }
                                } else {
                                    $metadata_mapping_set = "";
                                }
                                ?>

                                <div class="col s12 m3">
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span  style="font-size: 16px;"><?php echo $documenttype->name; ?></span>
                                            <span class="right"><?php echo count($metadata_mappings); ?></span>
                                            <br/><br/>
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#edit-document<?php echo $d; ?>" class="modal-trigger"><span>Edit</span></a> | 
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-document<?php echo $d; ?>" class="modal-trigger"><span>Delete</span></a>
                                            <?php if (!count($metadata_mappings) > 0) { ?>
                                                <a class="waves-effect waves-red btn-flat right disabled">Submit</a>
                                            <?php } else { ?>
                                                <a href="#submit-document<?php echo $d; ?>" class="modal-trigger waves-effect waves-blue btn-flat right">Submit</a>   
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>  

                                <?php
                                //edit document 
                                include 'modals/editDocumentType.php';
                                //delete document 
                                include 'modals/deleteDocumentType.php';
                                //submit document 
                                include 'modals/submitDocumentType.php';
                                ?>

                                <?php
                                $d++;
                            }
                        }
                        ?>
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
//add document type
include_once 'modals/addDocumentType.php';
?>


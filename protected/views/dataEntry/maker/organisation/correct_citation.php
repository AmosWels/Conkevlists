<?php
//$userid = Yii::app()->user->userid;
//encryption
$id = yii::app()->request->getParam('id');
$code = new Encryption;
$cite_attr_id= $code->decode($id);

$cite_attr_Value = TOrganizationcitationMapping::model()->findByPk($cite_attr_id); //getting citation details
$citeid = $cite_attr_Value->citation;

$attrid = $cite_attr_Value->research; // getting attribute id
$attrValue = TOrganizationresearch::model()->findByPk($attrid); // getting attribute value
$attrName = $attrValue->name; // getting attribute name

$citation = TOrganizationCitation::model()->findByPk("$citeid");
$organid = $citation->organization;
$organValue = TOrganization::model()->findByPK($organid);
$organname = $organValue->name;

$researches = TOrganizationresearch::model()->findAll("status='A'");

$join = new JoinTable();
$mappings = $join->organizationCitationMapping($citation->id);

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
                                        <span class="black-text">Researcher</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/maker/panel')); ?> &sol;
                                        <?php echo CHtml::link('Organisation Draft', array('dataEntry/maker/organisation/index_new')); ?> &sol;
                                        <!--<a href="<?php // echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/view&id=<?php echo $code->encode($organid); ?>"><?php echo $organname; ?></a> &sol;-->
                                        <span><?php if(strlen($citation->title)>50){ $title = substr($citation->title, 0, 70) . '...'; echo $title; } else { echo $citation->title; } ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">                            
                            <div class="col s10 m10">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                    <?php if($cite_attr_Value->status== 'R'){ ?>
                                        <span class="red-text"><small class="grey-text">Citation Title </small>&rtrif; <?php if(strlen($citation->title)>10){ $title = substr($citation->title, 0, 10) . '...'; echo $title; } else { echo $citation->title; } ?>
                                        </span> 
                                        <small class="grey-text small" style="margin-left: 100px;"> Rejection Reason &rtrif; <span style="font-size: 14px; color: red;"><?php if(strlen($cite_attr_Value->rejectedreason_dataEntry)>70){ $reason = substr($cite_attr_Value->rejectedreason_dataEntry, 0, 70) . '...'; 
                                        ?> <span class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason"> <?php echo $reason; ?> </span>
                                        <?php } else{ echo $cite_attr_Value->rejectedreason_dataEntry;} ?> </span></small>
                                    <?php } else {?>
                                        <span class="grey-text text-darken-4"><small class="grey-text">Citation Title </small>&rtrif; <?php if(strlen($citation->title)>50){ $title = substr($citation->title, 0, 70) . '...'; echo $title; } else { echo $citation->title; } ?>
                                        </span>
                                        <span class="white-text right green">New</span>
                                    <?php }?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s2 right-align search-stats">
                               <span>
                                   <?php if($cite_attr_Value->status== 'R'){ ?>
                                   <a href="#discardcitation" class="modal-trigger waves-effect waves-black tooltipped right" data-position="top" data-delay="50" data-tooltip="Discard Citation" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" style="text-decoration: underline;">Discard Supervision</a> 
                                   <?php } else { ?>
                                   <a href="#" class="grey-text tooltipped" style="text-decoration: underline;" data-position="top" data-delay="50" data-tooltip="Cannot Discard Un-supervised Citation">Discard Supervision</a> 
                                  <?php }?>
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

                <!--###############################-->
                <div class="card">
                    <div class="card-content">

                        <div id="web"> 
                            <div class="search-result">
                                <p class="search-result-title" style="font-size: 14px;"><span class="grey-text text-darken-4">Type : </span>
                                    <span>&nbsp;<?php echo $citation->type; ?>&nbsp;Citation</span>
                                </p><br>
                                <p class="search-result-description" style="text-align: justify;">
                                    <span class="grey-text text-darken-4">Url : </span> 
                                    <a class="waves-blue"  href="" onclick="window.open('<?php echo $citation->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $citation->url; ?></a>
                                    <!--<a href="<?php // echo $citation->url; ?>" target="blank" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php // echo $citation->url; ?></a>-->
                                </p>
                                <br>
                                <a class="grey-text text-darken-4" style="font-size: 14px;">Details</a>
                                <a class="search-result-link">
                                    <span class="attachment-info black-text ">
                                        <span class="grey-text">Author &rtrif;</span>
                                        <?php echo $citation->authors . '.'; ?> </span>
                                    <span class="attachment-info black-text " style="margin-left:10px;">
                                        <span class="grey-text">Publish Date &rtrif;</span>
                                        <?php echo date_format(date_create($citation->publish_date), "d / F / Y") . '.'; ?></span>
                                    <span class="attachment-info black-text" style="margin-left:10px;">
                                        <span class="grey-text">Title &rtrif;</span>
                                        <?php echo $citation->title . '.'; ?></span>                                                    
                                    <span class="attachment-info black-text" style="margin-left:10px;">
                                        <span class="grey-text">Publisher &rtrif;</span>
                                        <?php echo $citation->publisher . '.'; ?></span>
                                    <span class="attachment-info black-text" style="margin-left:10px;">
                                        <span class="grey-text">Referenced Publisher &rtrif;</span>
                                        <?php echo $citation->ref_publisher . '.'; ?></span>
                                    <span class="attachment-info black-text" style="margin-left:10px;">
                                        <span class="grey-text">Date Accessed &rtrif;</span>
                                        <?php echo date_format(date_create($citation->access_date), "d / F / Y") . '.'; ?>
                                    </span>
                                </a>
                                <br>
                                <a class="search-result-link grey-text" style="font-size: 14px;">Actions for <span class="grey-text text-darken-4">citation</span> mapped to <span class="grey-text text-darken-4"><?php echo $organname . "'s"; ?></span>  <span class="red-text text-darken-4"><?php echo $attrName; ?></span></a>
                                <p> 
                                    <span class="search-result-link">
                                        <a href="#edit-citation-websitecorrect<?php echo $citation->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Edit Citation</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  
                                    </span>
                                    <span class="search-result-link">
                                        <a href="#deletecitationmapping<?php echo $cite_attr_id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Delete Mapping</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <!--web-->                        
                    </div>

                    <div class="card-content right-align">
                        <a href="#cancel-citation<?php echo $citation->id; ?>" class="waves-effect waves-blue btn-flat modal-trigger">Cancel</a>  
                        <a href="#corrected-citation<?php echo $cite_attr_id; ?>" class="modal-trigger waves-effect waves-blue btn blue">Submit</a>
                    </div> 

                </div>
            </div>

            <!--###############################-->

        </div>
    </div>
</div>

<?php
//edit citation
include_once 'modals/editCitationWebsitecorrect.php';
//map citation
//include_once 'modals/mapCitation.php';
//delete citation
include_once 'modals/deleteCitation.php';
//submit citation
include_once 'modals/submitCitation.php';
//submit corrected citation
include_once 'modals/correctCitation.php';
//Cancel Creation
include_once 'modals/cancelCitation.php';
//add reject reason
include_once 'modals/viewreasonreject.php';
//discard citation
include_once 'modals/discardsupervisedcitation.php';
?>

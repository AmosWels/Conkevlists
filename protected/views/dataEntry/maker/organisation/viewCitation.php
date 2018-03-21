<?php
//$userid = Yii::app()->user->userid;
//encryption
$id = yii::app()->request->getParam('id');
$code = new Encryption;
$citeid = $code->decode($id);
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
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/view&id=<?php echo $code->encode($organid); ?>"><?php echo $organname; ?></a> &sol;
                                        <span><?php if(strlen($citation->title)>50){ $title = substr($citation->title, 0, 70) . '...'; echo $title; } else { echo $citation->title; } ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">                            
                            <div class="col s10 m10">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                    <?php if($citation->status== 'R'){ ?>
                                        <span class="red-text"><small class="grey-text">Citation Title </small>&rtrif; <?php if(strlen($citation->title)>10){ $title = substr($citation->title, 0, 10) . '...'; echo $title; } else { echo $citation->title; } ?>
                                        </span> 
                                        <small class="grey-text small" style="margin-left: 100px;"> Rejection Reason &rtrif; <span style="font-size: 14px; color: red;"><?php if(strlen($citation->rejected_reason_dataEntry)>70){ $reason = substr($citation->rejected_reason_dataEntry, 0, 70) . '...'; 
                                        ?> <span class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason"> <?php echo $reason; ?> </span>
                                        <?php } else{ echo $citation->rejected_reason_dataEntry;} ?> </span></small>
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
                                   <?php if($citation->status== 'R'){ ?>
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
                <?php
//                    switch ($risk->status){ 
//                        case 'A': $statusColor = 'green white-text lighten-3';  $statusName = 'Active';     $request = 'C';     $requestName = 'De-activate';     break;
//                        case 'C': $statusColor = 'red white-text lighten-3';    $statusName = 'Inactive';   $request = 'A';     $requestName = 'Activate';     break;
//                    } 
                ?>
                <div class="card">
                    <div class="card-content">

                        <div id="web"> 
                            <div class="search-result">
                                <p class="search-result-title" style="font-size: 14px;"><span class="grey-text text-darken-4">Type : </span>
                                    <span class="<?php // echo $statusColor;  ?>">&nbsp;<?php echo $citation->type; ?>&nbsp;Citation</span>
                                </p><br>
                                <p class="search-result-description" style="text-align: justify;">
                                    <span class="grey-text text-darken-4">Url : </span> 
                                    <a class="waves-blue"  href="" onclick="window.open('<?php echo $citation->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php echo $citation->url; ?></a>
                                    <!--<a href="<?php // echo $citation->url; ?>" target="blank" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><?php // echo $citation->url; ?></a>-->
                                </p>
                                <br>
                                <a class="grey-text text-darken-4" style="font-size: 14px;">Details</a>
                                <a class="search-result-link">
                                    <span class="attachment-info black-text <?php // echo $levelColor;  ?>">
                                        <span class="grey-text">Author &rtrif;</span>
                                        <?php echo $citation->authors . '.'; ?> </span>
                                    <span class="attachment-info black-text <?php // echo $appetiteColor;  ?>" style="margin-left:10px;">
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
                                <a class="grey-text text-darken-4" style="font-size: 14px;">Citation Actions</a>
                                <p> 
                                    <span class="search-result-link">
                                        <a href="#edit-citation-website<?php echo $citation->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Edit </a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  
                                    </span>
                                    <span class="search-result-link">
                                        <a href="#deletecitation<?php echo $citation->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Delete</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
                                    </span>
                                    <span class="search-result-link" >
                                        <a href="#map-citation<?php echo $citation->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                            <?php if (empty($mappings)) { ?> Map <?php } else { ?> Edit Mapping<?php } ?></a> &nbsp;&nbsp; 
                                    </span>
                                </p>
                            </div>
                        </div>
                        <!--web-->                        
                        </br>
                        <!--row Mapped Attributes-->
                        <div class="row">
                            <div class="col s12 m2"></div>                                
                            <div class="col s12 m8">
                                <!--notes-->                            
                                <fieldset>
                                    <legend>&nbsp; Mapped Attributes &nbsp;</legend>
                                    <div id="web">
                                        <ol>
                                            <?php
                                            $mapping_set = "";
                                            $set_names = "";
                                            $newset = "";
                                            $b = 1;
                                            $p = 0;
                                            if (!empty($mappings)) {
                                                ?>
                                                <a class="black-text">
                                                    <?php
                                                    foreach ($mappings as $item) {  
                                                        $mapping_set .= $item["research_id"] . ',';
                                                        $mapping_setid = $item["research_id"];
                                                        $set_names .= $item["research_name"] . ', ';
                                                        $newset = $item["research_name"];
//                                                      echo rtrim($set_names, ', ');
//                                                        checking if attribute is active or not
                                                        $attr_status = TOrganizationresearch::model()->findByAttributes(array('id'=>$mapping_setid,'status'=>'C'));
                                                        if(empty($attr_status)){ ?>
                                                      <li><?php echo $newset; ?></li><?php // echo $t; ?>
                                                        <?php }else{ ?>
                                                      <li class="red-text"><?php echo $newset; ?></li>
                                                        <?php $p++;
                                                        } 
                                                        }
                                                    ?>
                                                </a>                                                    
                                            <?php
                                            } else {
                                                $mapping_set = "";
                                                $b++;
                                                ?>
                                                <a class="search-result-link red-text">Citation not mapped !</a>
                                                <code class="red-text" style="margin-left:10px;">No Mapped Attributes found</code>
<?php } ?>
                                        </ol>
                                    </div>
                                </fieldset>
                                <!--</div>-->

                            </div>
                            <div class="col s12 m2"></div>
                        </div>
                        <!--row mitigations-->

                    </div>

                    <div class="card-content right-align">
                        <a href="#cancel-citation<?php echo $citation->id; ?>" class="waves-effect waves-blue btn-flat modal-trigger">Cancel</a>  
                        <!--check if citation is mapped to one attribute atleast and that attribute is active. also if its supervised or not-->
                        <?php if($b==1 and $p == 0 and $citation->status== 'R'){?>
                        <a href="#corrected-citation<?php echo $citation->id; ?>" class="modal-trigger waves-effect waves-blue btn blue">Correct</a>
                        <?php } elseif($b==1 and $p == 0 and $citation->status!= 'R'){ ?> 
                        <a href="#submit-citation<?php echo $citation->id; ?>" class="modal-trigger waves-effect waves-blue btn blue">Submit</a>
                        <?php } else { ?>
                            <button type="submit" class="btn waves-effect waves-green btn-flat disabled tooltipped" data-position="left" data-delay="50" data-tooltip="Citation Not mapped / Mapped to a closed Attribute">Submit</button>
                        <?php } ?>
                    </div> 

                </div>
            </div>

            <!--###############################-->

        </div>
    </div>
</div>

<?php
//edit citation
include_once 'modals/editCitationWebsite.php';
//map citation
include_once 'modals/mapCitation.php';
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

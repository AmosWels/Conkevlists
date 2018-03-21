<?php
$panel_link = "settings/panel";
?>
<?php
$user = Yii::app()->user->userid;


$mapping_draft= TCustomertypeCategory::model()->findAll("status = 'D' AND maker = '$user'");
$customertypes = CCustomerType::model()->findAll("status = 'A'");
$customercategories = TCustomerCategory::model()->findAll("status = 'A'");
?>

<?php
//count inbox
$inbox_count =0;
if(!empty($customertypes)){
    foreach($customertypes as $customertype){
        $mapped = TCustomertypeCategory::model()->findByAttributes(array('customer_type'=>$customertype->code));
        if(empty($mapped)){$inbox_count++;   }                      
    }
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
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $panel_link; ?>">Settings</a> &sol; 
                                        <span>Customer Types</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(<?php echo count($mapping_draft); ?>)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox<span>&nbsp;&nbsp;&nbsp;(<?php echo $inbox_count; ?>)</span></a></li>
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
                    <div class="row s12">
                        <?php
                        if (!empty($customertypes)) {
                            $t = 1;
                            foreach ($customertypes as $customertype) {
                               $mapping = TCustomertypeCategory::model()->findByAttributes(array('customer_type'=>$customertype->code));
                               
                               if(!empty($mapping) AND $mapping->status == 'D' AND $mapping->maker == $user){
                                   $categoryname = TCustomerCategory::model()->findByPk($mapping->category);
                                ?>
                        
                                <div class="col s12 m3">
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span  style="font-size: 16px;"><?php echo $customertype->name; ?></span>
                                            <br/>
                                            <span class="justify" style="font-size: 12px;"><?php echo $categoryname->name.' category'; ?></span>
                                            <br/><br/>
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#edit-mapping<?php echo $t; ?>" class="modal-trigger"><span>Edit</span></a> | 
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-mapping<?php echo $t; ?>" class="modal-trigger"><span>Delete</span></a>
                                            
                                                <a href="#submit-mapping<?php echo $t; ?>" class="modal-trigger waves-effect waves-blue btn-flat right">Submit</a>   
                                            
                                        </div>
                                    </div>
                                </div> 
                        
                               <?php 
                               //edit category mapping 
                                include 'modals/editMapping.php';
                               //delete category mapping 
                                include 'modals/deleteMapping.php';
                               //submit category mapping 
                                include 'modals/submitMapping.php';
                                
                               }
                                $t++;
                            }
                        }
                        ?>
                    </div>
                </div> 

                <!--###############################-->
                <div id="inbox">
                    <div class="row s12">
                        <?php
                        if (!empty($customertypes)) {
                            $t = 1;
                            foreach ($customertypes as $customertype) {
                               $mapping = TCustomertypeCategory::model()->findByAttributes(array('customer_type'=>$customertype->code));
                               
                               if(empty($mapping)){ ?>
                        
                                <div class="col s12 m3">
                                    <div class="card stats-card" style="height: 140px;">
                                        <div class="card-content">
                                            <span  style="font-size: 16px;"><?php echo $customertype->name; ?></span>
                                            <br/>
                                            <span class="justify" style="font-size: 12px;">____________________</span>
                                            <br/><br/>
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#add-mapping<?php echo $t; ?>" class="modal-trigger"><span>Add</span></a> 
                                        </div>
                                    </div>
                                </div>
                        
                                <?php 
                                 //add category mapping 
                                 include 'modals/addMapping.php';
                                
                                } ?>

                                <?php
                                $t++;
                            }
                        }
                        ?>
                    </div>
                </div>

                <!--###############################-->
                <div id="approved">
                    <h3>Pending ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

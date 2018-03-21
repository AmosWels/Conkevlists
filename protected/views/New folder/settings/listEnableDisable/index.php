<?php
$panel_link = "settings/panel";
?>
<?php
$user = Yii::app()->user->userid;

$lists = TLists::model()->findAll();
$requests = TListRequest::model()->findAll("status = 'D' AND maker = '$user'");
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
                                        <span> Enable-Disable Lists</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(<?php echo count($requests); ?>)</span></a></li>
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
                    <div class="row s12">
<!--                        <div class="col m4">
                            <div class="card">
                                <div class="card-content">
                                    <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">EU List</span><span class="right">Active</span><br><br>
                                    <div class="row s12"><label style="font-size: 14px; font-weight: 400; color: black;">Category</label><a href="#list_status" style="color: grey;" class="right" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = 'grey'">Sanctions List</a></div>
                                    <div class="row s12"><label style="font-size: 14px; font-weight: 400; color: black;">Reason</label><a href="#list_status" style="color: blue;" class="right" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = 'blue'">.........</a></div>
                                    <a class="modal-trigger" href="#list_status" style="font-size: 16px; font-weight: " onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''">Deactivate</a>
                                </div>
                            </div>
                        </div>-->
                        
                        <?php if(!empty($requests)){ 
                            foreach ($requests as $record){ 
                                $list = TLists::model()->findByPk($record->list);
                                $category = TListCategory::model()->findByPk($list->category); ?>

                        <div class="col m4">
                            <div class="card">
                                <div class="card-content">
                                    <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100"><?php echo $list->name; ?> List</span><span class="right"><?php switch ($list->status){case 'A': echo 'Active';break; case 'C': echo 'Inactive';break;} ?></span><br><br>
                                    <div class="row s12"><label style="font-size: 14px; font-weight: 400; color: black;">Category</label><a class="right"><?php echo $category->name; ?></a></div>
                                    <div class="row s12"><label style="font-size: 14px; font-weight: 400; color: black;">Request To:</label><span style="color:" class="right"><?php switch ($record->request){case 'A': echo 'Activate List';break; case 'C': echo 'De-activate List';break;} ?></span></div>
                                    <div class="row s12"><label style="font-size: 14px; font-weight: 400; color: black;">Reason</label>
                                        <span style="color:" class="right"><?php if(empty($record->reason)){ echo "________________"; }else{ echo $record->reason; }?></span></div>
                                    <!--<button type="submit" class="right btn-flat waves-effect waves-blue">Submit</button>-->
                                            
                                    <a href="#request-reason<?php echo $record->id; ?>" class="modal-trigger" style="font-size: 14px; font-weight: " onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''"><?php if(empty($record->reason)){ echo "Add Reason"; }else{ echo "Edit Reason"; }?></a> | 
                                    <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-request<?php echo $record->id; ?>" class="modal-trigger"><span>Drop Request</span></a>
                                    <?php if (empty($record->reason)) { ?>
                                                <a class="waves-effect waves-red btn-flat right disabled">Submit</a>
                                    <?php } else { ?>
                                        <a href="#submit-request<?php echo $record->id; ?>" class="modal-trigger waves-effect waves-blue btn-flat right">Submit</a>   
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                            <?php 
                            //confirm change 
                            include 'modals/requestReason.php';
                            //drop request 
                            include 'modals/deleteRequest.php';
                            //submit request 
                            include 'modals/submitRequest.php';
                            } } ?>
                    </div>
                </div>
                <div id="inbox">
                    <div class="row s12">
                        <!--sanctions column-->
                        <?php
                        if(!empty($lists)){ ?>

                        <div class="col m4">
                            <div class="card">
                                <div class="card-content">
                                    <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Sanctions</span>
                                    <ul class="collection with-header">
                                        <?php foreach ($lists as $record) { 
                                            if($record->category == 1){ ?>
                                            <?php $request = TListRequest::model()->findByAttributes(array('list'=>$record->id));?>
                                        <li class="collection-item"><div><?php echo $record->name;?> <label><?php switch ($record->status){case 'A': echo 'Active';break; case 'C': echo 'Inactive';break;} ?></label>
                                                <a href="#list-request<?php echo $record->id; ?>" class="secondary-content modal-trigger"><?php if(empty($request)){ echo 'Edit';} ?></a></div>
                                        </li>
                                        <?php 
                                        //confirm change 
                                        include 'modals/listRequest.php';
                                        } } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!--conkev lists column-->
                        <div class="col m4">
                            <div class="card">
                                <div class="card-content">
                                    <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Conkevlists</span>
                                    <ul class="collection with-header">
                                        <?php foreach ($lists as $record) { 
                                            if($record->category == 2){ ?>
                                        <?php $request = TListRequest::model()->findByAttributes(array('list'=>$record->id));?>
                                        <li class="collection-item"><div><?php echo $record->name;?> <label><?php switch ($record->status){case 'A': echo 'Active';break; case 'C': echo 'Inactive';break;} ?></label>
                                                <a href="#list-request<?php echo $record->id; ?>" class="secondary-content modal-trigger"><?php if(empty($request)){ echo 'Edit';} ?></a></div>
                                        </li>
                                        <?php 
                                        //confirm change 
                                        include 'modals/listRequest.php';
                                        } } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!--banklists column-->
                        <div class="col m4">
                            <div class="card">
                                <div class="card-content">
                                    <span style="font-size: 18px; font: small-caption; font-size: large; font-weight: 100">Bank Lists</span>
                                    <ul class="collection with-header">
                                        <?php foreach ($lists as $record) { 
                                            if($record->category == 3){ ?>
                                        <?php $request = TListRequest::model()->findByAttributes(array('list'=>$record->id));?>
                                        <li class="collection-item"><div><?php echo $record->name;?> <label><?php switch ($record->status){case 'A': echo 'Active';break; case 'C': echo 'Inactive';break;} ?></label>
                                                <a href="#list-request<?php echo $record->id; ?>" class="secondary-content modal-trigger"><?php if(empty($request)){ echo 'Edit';} ?></a></div>
                                        </li>
                                        <?php 
                                        //confirm change 
                                        include 'modals/listRequest.php';
                                        } } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                       <?php } ?>
                    </div>
                </div>
                <div id="approved">
                    <div class="card">
                        <div class="card-content">
                            Approved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//Sanction List Upload
//include_once 'Modal/modallists/SanctionListupload.php';
//Conkev List Upload
//include_once 'Modal/modallists/ConkevListupload.php';
//Bank List Upload
//include_once 'Modal/modallists/BankListupload.php';
// List Status(activated or deactivated/inactive)
//include 'modals/enableDisable.php';
?>
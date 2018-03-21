<?php
$panel_link = "settings/panel";
?>
<?php
$user = Yii::app()->user->userid;

$blacklistprograms = TBlacklistProgram::model()->findAll("status = 'D' AND maker = '$user'");
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
                                        <span>Blacklist Programs</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(<?php echo count($blacklistprograms); ?>)</span></a></li>
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
                        <a href="#create_program" class="btn-floating btn-large darken-1waves-effectwaves-effect modal-trigger tooltipped"  data-position="left" data-delay="50" data-tooltip="Create Blacklist Program" >
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>

                    <div class="row s12">
                        <?php
                        if (!empty($blacklistprograms)) {
                            $p = 1;
                            foreach ($blacklistprograms as $blacklistprogram) {
                                ?>
                        
                                <div class="col s12 m3">
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span  style="font-size: 16px;"><?php echo $blacklistprogram->name; ?></span>
                                            <br/>
                                            <span class="justify" style="font-size: 12px;"><?php echo $blacklistprogram->description; ?></span>
                                            <br/><br/>
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#edit-program<?php echo $p; ?>" class="modal-trigger"><span>Edit</span></a> | 
                                            <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#delete-program<?php echo $p; ?>" class="modal-trigger"><span>Delete</span></a>
                                            
                                                <a href="#submit-program<?php echo $p; ?>" class="modal-trigger waves-effect waves-blue btn-flat right">Submit</a>   
                                            
                                        </div>
                                    </div>
                                </div>  

                                <?php
                                //edit blacklist program 
                                include 'modals/editProgram.php';
                                //delete blacklist program 
                                include 'modals/deleteProgram.php';
                                //submit blacklist program 
                                include 'modals/submitProgram.php';
                                ?>

                                <?php
                                $p++;
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
//add blacklist program
include_once 'modals/addProgram.php';
?>


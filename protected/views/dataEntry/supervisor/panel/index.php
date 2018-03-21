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
                                        <span class="black-text">Attributes</span> &sol;
                                        <span>Supervisor</span>
                                        </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
<!--                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>-->
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
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/politicalassignment"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                            <div class="card">
                                <div class="card-content z-depth-3" >
                                    <span>Organization Positions</span><i class="material-icons right">nature</i><br><br>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/employment"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                            <div class="card">
                                <div class="card-content z-depth-3" >
                                    <span>People Employment</span><i class="material-icons right">people</i><br><br>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;"  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/address"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                            <div class="card">
                                <div class="card-content z-depth-3" >
                                    <span>People Address</span><i class="material-icons right">place</i><br><br>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<?php
//include_once 'Modal/modallists/ListStatus.php';
//?>
<?php
//$code = new Encryption;
$clienttype_link = "settings/clientType";
//$settings_encrypt = $code->encode($settings_link);
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
                                        <span>Settings</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <h5 style="font-size: 18px"><span> Settings Menu</span></h5>   
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

                <!--$##############################3-->
                <div class="row">
                    <div class="col s12 m3">
                        <div class="row">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <div class="tabs-vertical">
                                        <ul class="tabs z-depth-0 transparent">
                                            <li class="tab">
                                                <a class="active" href="#sdd"> SDD</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#risk">Risk</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#peer">Peers</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#riskscale">Risk Scales</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#usermanagement">User Management</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#businessprocess">Business Processes</a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m9">
                        <div id="sdd">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content ">
                                    <span class="card-title">SDD Setting</span>

                                    <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $clienttype_link; ?>" class="waves-effect waves-blue btn-flat m-b-xs">Customer Types</a>
                                    <a class="waves-effect waves-blue btn-flat m-b-xs">Account Types</a>

                                </div>
                            </div>
                        </div>

                        <div id="risk">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <span class="card-title">Risk Setting</span>


                                </div>
                            </div>
                        </div>

                        <div id="peer">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <span class="card-title">Peer Setting</span>


                                </div>
                            </div>
                        </div>

                        <div id="riskscale">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <span class="card-title">Risk Scale Setting</span>

                                </div>
                            </div>
                        </div>

                        <div id="usermanagement">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <span class="card-title">User Management Setting</span>


                                </div>
                            </div>
                        </div>
                        <div id="businessprocess">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <span class="card-title">Business Process Setting</span>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> 
    </div>
</div>

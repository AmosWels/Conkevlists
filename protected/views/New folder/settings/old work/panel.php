<?php
    
    //$code = new Encryption;
    $clienttype_link = "settings/clientType";
    $documenttype_link = "settings/documentTypes/index.php";
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
                                    <h5 style="font-size: 20px"><span> Settings Menu</span></h5>   
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
                <div class="row s12" style="margin-left: 30px; margin-top: 10px;">
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">User Management</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                    </div>
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">Standard Due Diligence</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $documenttype_link; ?>"> Document Types</a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> Questions</a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $clienttype_link; ?>"> New Customer</a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> New Account</a></li>
                    </div>
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">Risk</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                    </div>
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">Case Management</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                    </div>
                </div>
                
                <div class="row s12" style="margin-left: 30px; margin-top: 10px;">
<!--                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">User Management</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                    </div>
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">Standard Due Diligence</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> Document Types</a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> Questions</a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> New Customer</a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> New Account</a></li>
                    </div>
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">Risk</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                    </div>
                    <div class="col s12 m3">
                        <span class="card-title" style="font-size: 18px;">Case Management</span>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                        <li><a onmouseover="this.style.color='orange';"  onmouseout="this.style.color='';" href="#"> ----- </a></li>
                    </div>-->
                </div>
                
            </div>
        </div> 
    </div>
</div>
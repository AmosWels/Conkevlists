
<!--added from here-->
<?php
//encryption
//$code = new Encryption;
//$join = new JoinTable;
?>

<?php
//$userid = Yii::app()->user->userid;
//$organizationtypes = TOrganizationtype::model()->findAll("status='A'");
//$countries = TCountry::model()->findAll("status='A'");
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
                                        <span class="black-text">Research</span> &sol;
                                        <span>People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s2"><a href="#draft">Draft <span class="red white-text circle">&nbsp  &nbsp;</span></a></li>
                                    <li class="tab col s2"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a href="#addperson" class="btn-floating btn-large waves-effect modal-trigger tooltipped"  data-position="left" data-delay="50" data-tooltip="Create person" >
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>       
                    <?php
//                    if (!empty($model)) { 
                    ?>

                    <div class="card z-depth-0">
                        <div class="card-content">

                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="search-result">
                                                <a class="search-result-title row s12 modal-trigger" href="#viewdata" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                                    <span>Muhabura Patrick - <span class="attachment-info black-text">Natural Person</span></span>
                                                    <span class="right" style="font-size: 12px;">View More</span>
                                                </a>
                                                <a class="search-result-link row s12 modal-trigger" href="#add_data" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                                    <span class="attachment-info col s2">Gender &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        Male</span></span> 
                                                    <span class="attachment-info col s3">Nationality &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        ___________</span></span> 
                                                    <span class="attachment-info col s3">Address &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        ___________</span></span>
                                                    <span class="attachment-info col s3">Dependants &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        ___________</span></span>
                                                    <span class="right" style="font-size: 12px;">3 Pending | Edit</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="search-result">
                                                <a class="search-result-title row s12 modal-trigger" href="#viewdata" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                                    <span>Parliament Of Uganda - <span class="attachment-info black-text">Legal Person</span></span>
                                                    <span class="right" style="font-size: 12px;">View More</span>
                                                </a>
                                                <a class="search-result-link row s12 modal-trigger" href="#add_data" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                                    <span class="attachment-info col s2">Gender &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        Government</span></span> 
                                                    <span class="attachment-info col s3">Nationality &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        ___________</span></span> 
                                                    <span class="attachment-info col s3">Address &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        ___________</span></span>
                                                    <span class="attachment-info col s3">Dependants &rtrif;
                                                    <span class=" black-text " style="margin-left:10px;">
                                                        ___________</span></span>
                                                    <span class="right" style="font-size: 12px;">5 Pending | Edit</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                  </tbody>
                            </table>

                        </div>
                    </div>


                </div> 

                <!--###############################-->

                <div id="inbox">
                    <h3>Pending ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
//add organization
//include_once 'modals/addPersonn.php';
require_once 'modals/addPersonn.php';
include_once 'modals/addData.php';
include_once 'modals/addCitationWebsitep.php';
include_once 'modals/viewPerson.php';
?>


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
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp  &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                        <a href="#add-organization" class="btn-floating btn-large waves-effect modal-trigger tooltipped"  data-position="left" data-delay="50" data-tooltip="Add Person Profile" >
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
                                    <th>Organization Names</th>
                                    <th>Organization Type</th>
                                    <th>Country</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
//                                foreach ($model as $record) {
//                                    $type = $join->joinOrganizationTypes($record->type);
//                                    $country = $join->joinCountry($record->country);
                                    ?>
                                    <tr>
                                        <td>ththth</td>
                                        <td>jfkfk</td>
                                        <td>kkgj</td>
                                        <td>kkffkk</td>
                                    </tr>
                                <?php 
//                    }
                                ?>                                        
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
//include_once 'modals/addOrganization.php';
?>


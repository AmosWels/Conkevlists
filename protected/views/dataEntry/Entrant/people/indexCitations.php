<?php
/* @var $this PersonController */
//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Person',
);
$activePeople = TPerson::model()->findAll('status = "A"');

?>
<!--<h1>//<?php
//echo $this->id . '/' . $this->action->id;
?></h1>-->

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
                                        <span class="black-text">Research</span> &sol;<span>Maker</span>&sol;
                                        <span>People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($activePeople); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                        <a href="#add-person" class="btn-floating btn-large waves-effect modal-trigger tooltipped"  data-position="left" data-delay="50" data-tooltip="Add Person" >
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>       
                    <?php
                    if (!empty($activePeople)) {
                        ?>
                        <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Person Names</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($activePeople as $recordname) {
//                                    $type = $join->joinOrganizationTypes($record->type);
//                                    $country = $join->joinCountry($record->country);
                                            ?>
                                        <tr onclick="location.href='<?php echo @Yii::app()->baseUrl;?>/index.php?r=dataEntry/people&id=<?php echo $recordname->id;?>'">
                                                <td><?php echo $recordname->Name; ?></td>
                                                <td><?php echo $recordname->Gender; ?></td>
                                                <td><?php echo $recordname->Nationality; ?></td>
                                                <td><?php echo $recordname->Createdon; ?></td>
                                                <!--<td>2017-07-17 09:54:10</td>-->
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php 
                                        }
                    ?>                                        
                </div> 

                <!--###############################-->

                <div id="inbox">
                    <h3>Pending ...</h3>
                </div>                
                <div id="sugestedpips">
                    <h3>Suggested People ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
//add Person
//include_once 'modals/addPerson.php';
?>



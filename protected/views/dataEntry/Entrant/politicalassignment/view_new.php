<?php
//getting person id
$code = new Encryption;
$id = yii::app()->request->getParam('id');
$organid = $code->decode($id);
$organisation = TOrganization::model()->findbypk($organid);

$positions = TPersonpositions::model()->findAll("status='D' and organization=$organid");

$join = new JoinTable;
$type = $join->joinOrganizationTypes($organisation->type);
$country = $join->joinCountry($organisation->country);

$pcitations = TPositionCitation::model()->findAll("Position=$organid");
$Profilefields = TPositionprofilefields::model()->findAll("Status='A'");
?>
<?php ?>

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
                                        <span class="black-text">DataEntry</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Organisations', array('dataEntry/Entrant/politicalassignment/index_new')); ?> &sol;
                                        <span><?php echo $organisation->name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $organisation->name; ?>
                                            - <small class="grey-text"><?php echo $country->name; ?></small> 
                                            - <small class="grey-text"><?php echo $type->name; ?></small> 
                                        </span> 
                                    </li>
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

                <div class="row">  
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-content">
                                <div class="tabs-vertical">
                                    <ul class="tabs transparent z-depth-0">                                      
                                        <li class="tab">
                                            <a href="#webcitation">&nbsp; Positions <span class="right blue-text">(<?php echo count($positions); ?>)</span></a>
                                        </li>                                       
                                        <li class="divider"></li>
                                        <li class="tab">
                                            <a href="#bookcitation">&nbsp; Branches <span class="right blue-text">(0)</span></a>
                                        </li> 
                                        <li class="divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##########################################################-->
                    <div class="col s12 m9">
                        <div class="card">
                            <div class="card-content">
                                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create" >
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a href="javascript:AlertIt();" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="New Positions"><i class="material-icons">group_add</i></a></li>
                            <li><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/search&id=<?php echo $code->encode($organid); ?>" class="btn-floating red waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="New Position"><i class="material-icons">person_pin</i></a></li>
                        </ul>
                    </div> 
                                
                                <div id="webcitation"> 
                                    <div id="web">
                                        <table id="example2" class="display responsive-table datatable-example">
                                            <thead>
                                    <tr>
                                        <th style="width: 400px;">Name</th>
                                        <th>Level</th>
                                        <th>Weight</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                            <tfoot><tr><br></tr></tfoot>

                                            <tbody> 
                                                <?php
                                                $b=count($positions);
                                    if (!empty($positions)) {
                                        foreach ($positions as $record) {
//                                            organisation name
                                            $Orgid = $record->organization;
                                            $orgvalue = TOrganization::model()->findByPk($Orgid);
                                            $orgname = $orgvalue->name;
//                                            level name
                                            $Lid = $record->level;
                                            $Lvalue = TPersonpositionslevel::model()->findByPk($Lid);;
                                            $Lname = $Lvalue->name;
//                                            weight name
                                            $Wid = $record->weight;
                                            $Wvalue = TPersonpositionsweight::model()->findByPk($Wid);;
                                            $Wname = $Wvalue->name;
                                            ?>
                                            <!--<tr onclick="location.href = '<?php // echo @Yii::app()->baseUrl; ?>/index.php?r=research/Entrant/politicalassignment/view&id=<?php echo $code->encode($record->id); ?>'">-->
                                            <tr class="modal-trigger" href="#submit-position<?php echo $record->id;?>">
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo $Lname; ?></td>
                                                <td><?php echo $Wname; ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                                <td><?php echo $record->end_date; ?></td>
                                            </tr>
                                            <?php
                                            include 'modals/submitPosition_new.php';
                                        }
                                    ?> <?php } else { $b--; ?>

                                                <code class="red-text grey lighten-4" style="margin-left: 390px;">Create New Position</code>
                                            <?php } ?>
                                            </tbody>
                                        </table>
<!--                                        <div class="center-align">
                                                <?php // echo $b; ?>
                                            <?php // if ($b >= 2 ) { ?>
                                                <a href="#submit-position<?php
//                                            echo $organisation->id;
                                                ?>" 
                                                   class="modal-trigger waves-effect waves-blue btn blue">Submit</a>                                              
                                               <?php // } else { ?>
                                                <a href="#" class="waves-effect waves-blue btn blue disabled">Submit</a> 
                                            <?php // } ?>
                                        </div>  -->
                                    </div>
                                </div>
                                <div id="bookcitation"> 
                                    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                                        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Add Citation">
                                            <i class="large material-icons">mode_edit</i>
                                        </a>
                                        <ul>
                                            <li><a href="#add-citation-website-person" class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Website"><i class="material-icons">language</i></a></li>
                                        </ul>
                                    </div> 
                                    <div id="web">
                                        <table id="example3" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                            <tbody> 
                                                <tr><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                            <!--end citation-->
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end s9 col -->
            </div>

        </div>
    </div>
</div>
</div>

<?php
////add citation website
//include_once 'modals/addCitationWebsite_position.php';
////submit person
//include_once 'modals/submitPosition_new.php';
?>
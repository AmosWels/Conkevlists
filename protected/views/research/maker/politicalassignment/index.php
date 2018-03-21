    <?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
//echo $this->id . '/' . $this->action->id;
$userid = Yii::app()->user->userid;
$code = new Encryption;
$positions = TPersonpositions::model()->findAll("status='D' AND maker ='$userid'");

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
                                        <?php echo CHtml::link('Maker', array('research/maker/panel')); ?> &sol;
                                        <span>Political Assignment Positions</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($positions); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <!--<li class="tab col s3"><a href="#dd">Search <span class="red white-text circle">&nbsp <?php // echo count($positions);   ?> &nbsp;</span></a></li>-->
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
                        <a class="btn-floating btn-large waves-effect tooltipped"  data-position="left" data-delay="50" data-tooltip="Create" >
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a href="javascript:AlertIt();" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="New Positions"><i class="material-icons">group_add</i></a></li>
                            <li><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=research/maker/politicalassignment/search" class="btn-floating red waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="New Position"><i class="material-icons">person_pin</i></a></li>
                        </ul>
                    </div>       
                    <?php
                    ?>
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Organisation</th>
                                        <th>Level</th>
                                        <th>Weight</th>
                                        <th>start date</th>
                                    </tr>
                                </thead>
                                <tfoot><tr><br></tr></tfoot>
                                <tbody>
                                    <?php
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
                                            <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=research/maker/politicalassignment/view&id=<?php echo $code->encode($record->id); ?>'">
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo $orgname; ?></td>
                                                <td><?php echo $Lname; ?></td>
                                                <td><?php echo $Wname; ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                <!--###############################-->
                <div id="inbox">
                    <div class="card">
                        <div class="card-content">
                            <h3>Inbox People ...</h3>
                        </div>
                    </div>
                </div>                
                <div id="sugestedpips">
                    <div class="card">
                        <div class="card-content">
                            <h3>Suggested People ...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//add Person
//include_once 'modals/addPerson.php';
//search Person
//include_once 'modals/searchPerson.php';
?>

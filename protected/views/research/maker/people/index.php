<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
//echo $this->id . '/' . $this->action->id;
$code = new Encryption;
$persongender = TPgender::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");

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
                                        <span>People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m4 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($model); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <!--<li class="tab col s3"><a href="#dd">Search <span class="red white-text circle">&nbsp <?php // echo count($results);   ?> &nbsp;</span></a></li>-->
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
                            <li><a href="#add-people" class="btn-floating red tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="New people Batch"><i class="material-icons">people</i></a></li>
                            <li><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=research/maker/people/search" class="btn-floating red waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="New Person"><i class="material-icons">person</i></a></li>
                        </ul>
                    </div>       
                    <?php
                    ?>
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                    <tr>
                                        <th style="width: 1050px;">Person Names</th>
                                        <th style="width: 500px;">Gender</th>
                                        <th style="width: 500px;">Nationality</th>
                                        <th style="width: 500px;">Created On</th>
                                    </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($model)) {
                                        foreach ($model as $recordname) {
//                                    $type = $join->joinOrganizationTypes($record->type);
//                                    $country = $join->joinCountry($record->country);
//                                            gender name
                                            $gid = $recordname->gender;
                                            $gendervalue = TPgender::model()->findByPk($gid);
                                            $gendername = $gendervalue->name;
//                                            nationality name
                                            $nid = $recordname->nationality;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->native;
                                            ?>
                                            <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=research/maker/people/pview&id=<?php echo $code->encode($recordname->id); ?>'">
                                                <td><?php echo $recordname->name; ?></td>
                                                <td><?php echo $gendername; ?></td>
                                                <td><?php echo $nationalityname; ?></td>
                                                <td><?php echo $recordname->createdon; ?></td>
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
include_once 'modals/importpeople.php';
//search Person
//include_once 'modals/searchPerson.php';
?>

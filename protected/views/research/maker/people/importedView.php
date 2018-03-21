<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'ImportedPeople',
);
?>
<?php
//echo $this->id . '/' . $this->action->id;
$code = new Encryption;
$persongender = TPgender::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
$existing = $model[0];
$imported = $model[1];
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
                                        <!--//<?php // echo CHtml::link('Imported', array('research/maker/people/importedpeople')); ?> &sol;-->
                                        <span>Imported Alerts</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($imported); ?> &nbsp;</span></a></li>
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
                                        <th style="width: 500px;">Possible Matches</th>
                                    </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($imported)) {
                                        foreach ($imported as $recordname) {
//                                            gender
                                            $gid = $recordname->gender;
                                            $gendervalue = TPgender::model()->findByPk($gid);
                                            $gendername = $gendervalue->name;
//                                            nationality name
                                            $nid = $recordname->nationality;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->native;
//                                            checking for matches
                                         $name = $recordname->name;
                                         $matchResults = TPerson::model()->findAll("name LIKE '%" . $name . "%' AND status = 'A'");
                                            ?>
                                            <?php if(count($matchResults)>0){  ?> 
                                            <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=research/maker/people/viewAlerts&id=<?php echo $code->encode($recordname->id); ?>'">
                                                <td><span class="red-text"><?php echo $recordname->name; ?></span></td>
                                                <td><span class="red-text"><?php echo $gendername; ?></span></td>
                                                <td><span class="red-text"><?php echo $nationalityname; ?></span></td>
                                                <td><span class="red-text"><?php echo $recordname->createdon; ?></span></td>
                                                <td><span class="red-text"><?php echo count($matchResults); ?></span></td>
                                            </tr>
                                            <?php } else { ?>
                                            <tr class="modal-trigger" href="#submitcleanAlert<?php echo $recordname->id;?>">
                                                <td><?php echo $recordname->name; ?></td>
                                                <td><?php echo $gendername; ?></td>
                                                <td><?php echo $nationalityname; ?></td>
                                                <td><?php echo $recordname->createdon; ?></td>
                                                <td><?php echo count($matchResults); ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php
//                                            add Person
                                        include 'modals/submitCleanAlert.php';
                                        }
                                    }
                                    ?>                                        
                                </tbody>
                            </table>
                            <div class="row s6 center">
                                <?php if(count($imported)==0){?>
                                <a href="#alertscompletion" class="waves-effect waves-blue btn blue modal-trigger">Finish</a>
                                <?php } else{ ?>
                                <a href="#" class="waves-effect waves-blue btn blue disabled ">Finish</a>
                                <?php }?>
                            </div>
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
include_once 'modals/submitcompletedAlerts.php';
//search Person
//include_once 'modals/searchPerson.php';
?>

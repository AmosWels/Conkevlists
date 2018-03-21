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
$id = yii::app()->request->getParam('id');
$personid = $code->decode($id);
$person = TPersonImport::model()->findbypk($personid);

$name= $person->name;

$persongender = TPgender::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");
//search 
$matchResults = TPerson::model()->findAll("name LIKE '%" . $name . "%' AND status = 'A'");
//get choice decisions
$searchnames = TSearchname::model()->findAll("status='A'");
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
                                        <?php echo CHtml::link('Imported', array('research/maker/people/importedpeople')); ?> &sol;
                                        <?php echo CHtml::link('Alerts', array('research/maker/people/importedView')); ?> &sol;
                                        <span><?php echo $person->name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6 search-stats">
                                <span class="" style="font-size: 14px;">Total Possible Matches &rtrif;</span><span class="secondary-stats red white-text circle">&nbsp;<?php echo count($matchResults); ?>&nbsp; </span>
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
                <div class="row s12">
                    <?php
                    $gid = $person->gender;
                    $gendervalue = TPgender::model()->findByPk($gid);
                    $gendername = $gendervalue->name;
//                                            nationality name
                    $nid = $person->nationality;
                    $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                    $nationalityname = $nationalityvalue->native;
                    ?>
                    <div class="col s4">
                    <div class="card z-depth-0 ">
                       <div class="card-content">
                           <div class="card-title">New Person</div>
                           <ul class="black-text">
                            <li>Name<span class="right"><?php echo $person->name; ?></span></li>
                            <li>Gender<span class="right"><?php echo $gendername; ?></span></li>
                            <li>Nationality<span class="right"><?php echo $nationalityname; ?></span></li>
                        </ul>
                       </div>
                    </div>
                    </div>
                    <div class="col s8">
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <div class="card-title">Possible Matches</div>
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
                                    if (!empty($matchResults)) {
                                        foreach ($matchResults as $recordname) {
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
                            </table><br>
                            <hr class="grey lighten-5" style="border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
                            <br>
                            <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'add-form',
                                        'enableAjaxValidation' => false,
                                    ));
                                    ?>
                                    <div class="row s12" style="margin-left: 500px;" >
                                        <input type="hidden" name="person-alert-id" value="<?php echo $person->id;?>">
                                        <?php
                                        foreach ($searchnames as $name) {
                                            $b = 1;
                                            ?>
                                            <div class="col s6">
                                                <input type="radio" id="<?php echo $name->id . 'result' . $b; ?>" name="alertresult" class="with-gap" value="<?php echo $name->id; ?>" required="true">
                                                <label for="<?php echo $name->id . 'result' . $b; ?>"> <?php echo $name->name; ?></label>
                                            </div>
                                            <?php $b++;
                                        }
                                        ?>
                                    </div>
                                <!--</div>-->
                                <div class="right">
                                    <button type="submit" class=" waves-effect waves-effect waves-blue btn blue">Submit</button>
                                </div><br><br>
                                <?php $this->endWidget(); ?>
                        </div>
                    </div>
                    </div>
                    </div>
                   </div>
        </div>
    </div>
</div>
<?php
//add Person
//include_once 'modals/importpeople.php';
//search Person
//include_once 'modals/searchPerson.php';
?>

<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'importPeople',
);

$code = new Encryption;
$persongender = TPgender::model()->findAll("status='A'");
$countries = TCountry::model()->findAll("status='A'");

$approved = $model[0];
$closed = $model[1];
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
                                        <?php echo CHtml::link('People', array('research/maker/people')); ?> &sol;
                                        <span>Assessed People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Confirmed <span class="red white-text circle">&nbsp <?php echo count($approved); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Cancelled <span class="red white-text circle">&nbsp <?php echo count($closed); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#justff">Just <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <div class="col s12">
                                <div class="row s12">
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
                                            if (!empty($approved)) {
                                                foreach ($approved as $record) {
                                                    $gid = $record->Gender;
                                                    $gendervalue = TPgender::model()->findByPk($gid);
                                                    $gendername = $gendervalue->name;
//                                            nationality name
                                                    $nid = $record->Nationality;
                                                    $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                                    $nationalityname = $nationalityvalue->native;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $record->Name; ?></td>
                                                        <td><?php echo $gendername; ?></td>
                                                        <td><?php echo $nationalityname; ?></td>
                                                        <td><?php echo $record->Createdon; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>                                        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row s6 center">
                                    <input type="hidden" name="addpeople" value="true">
                                    <a href="#add-people<?php echo count($approved); ?>" class="waves-effect waves-blue btn blue modal-trigger">Import</a>
                                    <!--<button type="submit" class=" waves-effect waves-effect waves-blue btn blue">Submit</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="inbox">
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <div class="col s12">
                                <div class="row s12">
                                    <table id="example2" class="display responsive-table datatable-example">
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
                                            if (!empty($closed)) {
                                                foreach ($closed as $recordname) {
                                                    $gid = $recordname->Gender;
                                                    $gendervalue = TPgender::model()->findByPk($gid);
                                                    $gendername = $gendervalue->name;
//                                            nationality name
                                                    $nid = $recordname->Nationality;
                                                    $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                                    $nationalityname = $nationalityvalue->native;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $recordname->Name; ?></td>
                                                        <td><?php echo $gendername; ?></td>
                                                        <td><?php echo $nationalityname; ?></td>
                                                        <td><?php echo $recordname->Createdon; ?></td>
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
                    </div>
                </div> 
                <div id="justff">
                    <div class="card">
                        <div class="card-content">
                            <h3>Here ...</h3>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<?php
//add Person
//search Person
include_once 'modals/submitcompletedImports.php';
?>

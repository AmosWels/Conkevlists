<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'importPeople',
);
        
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
                                        <?php echo CHtml::link('People', array('research/maker/people')); ?> &sol;
                                        <span>Imported People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6 search-stats">
                                <span class="" style="font-size: 14px;">Total Imported People &rtrif;</span><span class="secondary-stats red white-text circle">&nbsp;<?php echo count($model); ?>&nbsp; </span>
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
                <div class="card z-depth-0">
                    <div class="card-content">
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
                                    if (!empty($model)) {
                                        foreach ($model as $recordname) {
                                            $gid = $recordname->gender;
                                            $gendervalue = TPgender::model()->findByPk($gid);
                                            $gendername = $gendervalue->name;
//                                            nationality name
                                            $nid = $recordname->nationality;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->native;
                                            
                                            ?>
                                            <tr>
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
                                <div class="row s6 center">
                                <?php if(count($model)>5){?>
                                <a href="#submit-imports" class="waves-effect waves-blue btn blue modal-trigger">Resolve</a>
                                <?php } else{ ?>
                                <a href="#" class="waves-effect waves-blue btn blue disabled ">Resolve</a>
                                <?php }?>
                            </div>
                        </div>
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
//search Person
include_once 'modals/submitImports.php';
?>

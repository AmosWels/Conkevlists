<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organization',
);
?>
<?php
$code = new Encryption;
$results = $model[0];
$resultcount = count($results);
$searched = $model[1];
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
                                        <span class="black-text">Researcher</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/maker/panel')); ?> &sol;
                                        <?php echo CHtml::link('Draft', array('dataEntry/maker/people/index_new')); ?> &sol;
                                        <span>People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text text-darken-4">
                                            <small class="grey-text"> Select Person </small>&rtrif; By Searching for them
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
<div class="card card-transparent no-m" >
    <div class="card-content invoice-relative-content search-results-container" >
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div id="draft">
                        <div class="card z-depth-0">
                    <div class="card-content">
                        <div class="row s12" >
                            <!--<p>Search Organisation</p>-->
                            <div class="col s7 input-field"style="width: 800px; margin-left: 250px;" >
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'add-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <input type="text" name="orgquery" required="required" id="record" placeholder="...." value="<?php echo $searched; ?>"><br>
                                <?php if ($results != '' ) { ?>
                                <label for="record" class="active">Searched Person Name</label>
                                 <?php   }else{ ?>
                                <label for="record" class="active">Enter Person name to Search </label>    
                              <?php  } ?>
                                <button type="submit" class="waves-effect waves-blue white white-text btn-flat right">Search</button>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                        <div class="row s12">
                            <!--<p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php // echo $resultcount; ?> Possible Matches</code></p>-->
                                
                                <?php
                                $min_length = 2;
                                
                                    if (strlen($searched) > $min_length) {
                                if ($results != '' ) { ?>
                                    <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                            <tr>
                                                <th style="width: 600px;">Name</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                  <?php  foreach ($results as $result) {
                                            $gid = $result->gender;
                                            $gendervalue = TPgender::model()->findByPk($gid);
                                            $gendername = $gendervalue->name;
//                                            nationality name
                                            $nid = $result->nationality;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->native;
                                            ?>
                                        <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/people/view&id=<?php echo $code->encode($result->id); ?>'">
                                                <td><?php echo $result->name; ?></td>
                                                <td><?php echo $gendername; ?></td>
                                                <td><?php echo $nationalityname; ?></td>
                                                <td><?php echo $result->createdon; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                    <br><br>

<?php } else{
    ?>
        <label class="black-text" >No results! Enter <code>name</code> to Display Possible Matches</label>
<?php } ?>
        <?php } else { ?>
                                        <br><br>
                                        <label class="red-text" style="font-size: 14px; font-family: inherit;">Minimum length of characters for search is 2</label>
                                    <?php } ?>
                        </div>
                            </div>
                        </div>
                    </div> 
            </div>
        </div>
    </div>
</div>


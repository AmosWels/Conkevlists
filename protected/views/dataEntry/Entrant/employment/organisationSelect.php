<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organization',
);
?>
<?php
$person_id = yii::app()->request->getParam('value'); // getting person id from url
$personcite_id = yii::app()->request->getParam('id'); // getting person ciattion from url

$code = new Encryption;

$personid = $code->decode($person_id); // decoding the person id

$citeid = $code->decode($personcite_id); // decoding the citation id

$citeidValue = TPcitationProfilefieldsMappings::model()->findByPk($citeid);
$cite_attr = $citeidValue->citation;

$citeValue = TPersonCitation::model()->findByPk($cite_attr); // getting citation details

$personValue = TPerson::model()->findByPk($personid); // getting person details
$personName = $personValue->name; //name of person

 

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
                                        <span class="black-text">Data Entry</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Employment Citations', array('dataEntry/Entrant/employment/index_new')); ?> &sol;
                                        <span>Create New Employment</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s5" style="text-align: left">
                                        <span class="grey-text text-darken-4">
                                            <small class="grey-text"> Select Organisation </small> &rtrif; By Searching for it
                                            
                                        </span> 
                                        
                                    </li>
                                    <li class="tab col s5" style="text-align: left">
                                        <small class="grey-text"> Person </small>&rtrif; <span>
                                        <?php if (strlen($personName) > 40){
                                        $name = substr($personName, 0, 40) . ' ...';  ?>
                                        <span class="modal-trigger" href="#viewname"  style="color: blue;" onmouseover="this.style.color = '';"  onmouseout="this.style.color = 'blue';"><?php echo $name;?></span>
                                        <?php } else{ echo $personName;} ?>
                                        
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($citeValue->title) > 10){
                                        $title = substr($citeValue->title, 0, 10) . ' ...'; echo $title;  } else{ echo $citeValue->title;} ?>"
                                           onclick="window.open('<?php echo $citeValue->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
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
                                <label for="record" class="active">Searched organisation Name</label>
                                 <?php   }else{ ?>
                                <label for="record" class="active">Enter organisation name to Search </label>    
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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Country</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                  <?php  foreach ($results as $result) {
                                            $tid = $result->type;
                                            $typevalue = TOrganizationtype::model()->findByPk($tid);
                                            $typename = $typevalue->name;
//                                            nationality name
                                            $nid = $result->country;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->name;
                                            ?>
                                        <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/employment/organisationpositions&id=<?php echo $code->encode($result->id); ?>&value=<?php echo $person_id; ?>&cite=<?php echo $personcite_id; ?>'">
                                                <td><?php echo $result->name; ?></td>
                                                <td><?php echo $typename; ?></td>
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
<?php 
//view full person name
include_once 'modals/viewpersonNameOrganSelect.php';
?>

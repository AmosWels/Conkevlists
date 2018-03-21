<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$organ_id = yii::app()->request->getParam('id'); // getting person id from url
$person_id = yii::app()->request->getParam('value'); // getting person id from url
$personcite_id = yii::app()->request->getParam('cite'); // getting person attr and citation details from url

$code = new Encryption;

$personid = $code->decode($person_id); // decoding the person id
$record_id = $code->decode($personcite_id); // decoding the citation and attribute id details
$organid = $code->decode($organ_id); // decoding the organisation id

$personValue = TPerson::model()->findByPk($personid); // getting person details
$personName = $personValue->name; //name of person

$organValue = TOrganization::model()->findByPk($organid); //name of person
$organName = $organValue->name;

$citeidValue = TPcitationProfilefieldsMappings::model()->findByPk($record_id);
$cite_attr = $citeidValue->citation;
$citeValue = TPersonCitation::model()->findByPk($cite_attr); // getting citation details

$code = new Encryption;
$join = new JoinTable;

$positions = TPersonpositions::model()->findAll("organization = $organid and status = 'A'"); // finding all positions in the organiation

$employment = TPersonEmploymentDetails::model()->findAll("person = $personid and status IN ('A','D','T') "); // getting all other employments that are active and in drafts

$mappedposn = '';
foreach($employment as $mappedemploy){
$mapped = $mappedemploy->person_position;
$mappedposn .= $mappedemploy->person_position. ',';
}
$mappedpositions1 = rtrim($mappedposn,',');


$userid = Yii::app()->user->userid; // getting curent user

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
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/employment/search&id=<?php echo $code->encode($record_id); ?>"><?php echo $personName; ?></a> &sol;
                                        <span><?php if (strlen($organName) > 21){
                                        $organ_name = substr($organName, 0, 21) . ' ...'; echo $organ_name; ?>
                                        <?php } else{ echo $organName;} ?> </span> &sol;
                                        <span>Positions</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s5" style="text-align: left">
                                        <span class="grey-text text-darken-4">
                                            <small class="grey-text"> Selected Organisation </small> &rtrif; 
                                            <?php if (strlen($organName) > 30){
                                        $organ_name = substr($organName, 0, 30) . ' ...';  ?>
                                        <span class="modal-trigger" href="#vieworganname"  style="color: blue;" onmouseover="this.style.color = '';"  onmouseout="this.style.color = 'blue';"><?php echo $organ_name;?></span>
                                        <?php } else{ echo $organName;} ?>
                                        </span> 
                                    </li>
                                    <li class="tab col s5" style="text-align: left">
                                        <small class="grey-text"> Person </small>&rtrif; 
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
<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                        <div class="row s12">
                        <div class="col s8">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-title">Positions in <?php echo $organName; ?></div>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                            <tr>    
                                                <th style="width: 670px;">Position Name</th>
                                                <th>Started On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($positions)) {
                                            $t = 1;
                                        foreach ($positions as $position) {
//                                            if(!in_array($position->id, $mappedpositions)){
//                                            checking to see if position has already been added
                                            $employment_exist = TPersonEmploymentDetails::model()->findAll("person_position = $position->id and person =$personid"); 
                                            $employ_count = count($employment_exist);
                                            if($employ_count == 0){ ?>
                                                <tr class="modal-trigger" href="#addemployment<?php echo $position->id; ?>">
                                            <?php } else{ ?>
                                                <tr class="modal-trigger grey-text lighten-1" href="#sorry<?php echo $position->id; ?>">
                                            <?php } ?>
                                                <td><?php echo $t . '. '; ?><?php echo $position->name; ?></td>
                                                <td><?php echo $position->start_date; ?></td>
                                            </tr>
                                            <?php
                                                $t++;   
                                        include 'modals/addemployment.php'; 
                                        include 'modals/sorryEmploymentexists.php'; 
                                        
                                            } 
                                                }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                            <div class="col s4">
                            <div class="card" style="overflow: auto; height: 600px; border: dotted; ">
                            <div class="card-content">
                                <div class="card-title"> Other Employment Held By <?php if (strlen($personName) > 30){
                                        $newname = substr($personName, 0, 30) . ' ...'; echo $newname; ?>
                                        <?php } else{ echo $personName;} ?></div>
                                <ol>
                                    <?php if(!empty($employment)){
                                           foreach ($employment as $record){
                                               $positionid = $record->person_position;
                                               $positionValue = TPersonpositions::model()->findByPk($positionid);
                                               $name_of_position = $positionValue->name;
//                                               get organisation detail
                                               $organid = $positionValue->organization;
                                               $organValue = TOrganization::model()->findByPK($organid);
                                               $name_of_organ = $organValue->name;
                                               $status = $record->status;
                                               switch ($status){ case 'A': $color = 'black-text'; $positioncolor = 'black-text'; break; case 'D' : $color='red-text'; $positioncolor = 'red-text'; } 
                                        ?>
                                    <li><span class="<?php echo $positioncolor; ?>"><?php echo $name_of_position; ?></span> &rtrif;  <span class="<?php echo $color; ?>"><?php echo $name_of_organ; ?></span></li>
                                           <?php } } else{ ?>
                                              <code class="red-text center" style="margin-top: 80px;">! -- No Employment Record(s) were found -- !</code>
                                           <?php } ?>
                                </ol>
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
include_once 'modals/viewpersonNameOrganposition.php';
//view full organ name
include_once 'modals/viewpersonNameOrganName.php';
?>




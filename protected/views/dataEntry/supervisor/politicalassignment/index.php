<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$code = new Encryption;
$join = new JoinTable;
$neworganisations = TOrganization::model()->findAll("status = 'A'");

$userid = Yii::app()->user->userid;
//getting citations mapped to profile and have been submitted
$position_citations = TOrganizationcitationMapping::model()->findAll("research = '1' and status='F'"); // getting citaions mapped to position attribute
if (empty($position_citations)) {
$cite_id = '';
$organ_citation_Taken = '';
$organ_citation_test = '';
$ids = '';
} else{
$cite_id = '';
foreach($position_citations as $recordcite){
    $cite_id .= $recordcite->citation.', ';
    $citevalue = TOrganizationCitation::model()->findbypk("$cite_id");
}

$ids = rtrim($cite_id,', ');

$organ_citation_Taken = TPersonpositions::model()->findAll(" status IN ('T','C','L') and supervisor='$userid' and citation IN ($ids)");

$organ_citation_test = TPersonpositions::model()->findAll("status = 'D' and citation IN ($ids)");
}
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
                                        <span class="black-text">Attributes</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/supervisor/panel')); ?> &sol;
                                        <span>Position Citations</span> 
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($organ_citation_Taken); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp <?php echo count($organ_citation_test); ?> &nbsp;</span></a></li>
                                    <li class="tab col s4"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Position Name</th>
                                            <th style="width: 600px;">Organisation</th>
                                            <th>Country</th>
                                            <th>Started On</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($organ_citation_Taken)) {
                                        foreach ($organ_citation_Taken as $record) {
                                            $organ = $record->organization;
                                            $status = $record->status;
                                            $organValue = TOrganization::model()->findByPk($organ);
                                            $organName = $organValue->name;
                                            $countryValue = $organValue->country;
//                                            $type = $join->joinOrganizationTypes($record->type);
                                            $country = $join->joinCountry($countryValue);
                                            ?>
                                        <?php if($status=='C'){?>
                                                <tr class="green-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/politicalassignment/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php  } elseif($status=='L'){ ?>
                                                <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/politicalassignment/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php } else { ?>
                                                <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/politicalassignment/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php } ?>
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo $organName; ?></td>
                                                <td><?php echo $country->name; ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                            </tr>
                                            <?php
                                                   } }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 

                <!--###############################-->

                <div id="inbox">
                    <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example2" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Position Name</th>
                                            <th style="width: 600px;">Organisation</th>
                                            <th>Country</th>
                                            <th>Started On</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($organ_citation_test)) {
                                        foreach ($organ_citation_test as $record) {
                                            $organ = $record->organization;
                                            $organValue = TOrganization::model()->findByPk($organ);
                                            $organName = $organValue->name;
                                            $countryValue = $organValue->country;
//                                            $type = $join->joinOrganizationTypes($record->type);
                                            $country = $join->joinCountry($countryValue);
                                            ?>  
                                            <tr class="modal-trigger " href="#supervise<?php echo $record->id;?>">
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo $organName; ?></td>
                                                <td><?php echo $country->name; ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                            </tr>
                                            <?php
                                            include 'modals/supervisecitation.php';
                                            include 'modals/sorry.php';
                                        } } else{
                                        ?> 
                                    <code class="red white-text" style="margin-left: 500px;">No New Citations for positions</code>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>                
                <div id="sugestedpips">
                    <h3>Suggested Organisation ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>


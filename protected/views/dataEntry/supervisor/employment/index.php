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
$employment_citation_test = TPcitationProfilefieldsMappings::model()->findAll("profilefield = '13' and status='F'"); // getting citaions mapped to position attribute
if (empty($employment_citation_test)) {

    $address_citation_Taken = '';
    $address_citation_inbox = '';
    $ids = '';
} else {
    $cite_id = '';
    foreach ($employment_citation_test as $recordcite) {
        $cite_id .= $recordcite->citation . ', ';
        $citevalue = TPersonCitation::model()->findbypk("$cite_id");
    }

    $ids = rtrim($cite_id, ', ');
//$person_citation_Taken = TPersonEmploymentDetails::model()->findAll(" status IN ('T','C','L') and supervisor='$userid' and citation IN ($ids)");
    $person_citation_Taken = TPersonEmploymentDetails::model()->findAll("status IN ('T','C','L') and supervisor='$userid' and citation IN ($ids)");

    $person_citation_test = TPersonEmploymentDetails::model()->findAll("status = 'D' and citation IN ($ids)");
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
                                        <span>Employment Citations</span> 
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($person_citation_Taken); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp <?php echo count($person_citation_test); ?> &nbsp;</span></a></li>
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
                                        <th>Person Name</th>
                                        <th>Position</th>
                                        <th>Organisation</th>
                                    </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($person_citation_Taken)) {
                                        foreach ($person_citation_Taken as $record) {
//                                            person name
                                            $person = $record->person;
                                            $personValue = Tperson::model()->findByPk($person);
                                            $personName = $personValue->name;
//                                            position name
                                            $pid = $record->person_position;
                                            $positionvalue = TPersonpositions::model()->findByPk($pid);
                                            $positionName = $positionvalue->name;
//                                            Organisation name
                                            $orgid = $positionvalue->organization;
                                            $organvalue = TOrganization::model()->findByPk($orgid);
                                            $organName = $organvalue->name;
                                            $status = $record->status;
                                            ?>
                                            <?php if ($status == 'C') { ?>
                                                <tr class="green-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/employment/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                                <?php } elseif ($status == 'L') { ?>
                                                <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/employment/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                                <?php } else { ?>
                                                <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/employment/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                                <?php } ?>
                                                <td><?php echo $personName; ?></td>
                                                <td><?php echo $positionName; ?></td>
                                                <td><?php echo $organName; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        
                                    }
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
                                        <th>Person Name</th>
                                        <th>Position</th>
                                        <th>Organization</th>
                                    </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($person_citation_test)) {
                                        foreach ($person_citation_test as $record) {
//                                            get citation
                                            $cite = $record->citation;
//                                            person name
                                            $person = $record->person;
                                            $personValue = Tperson::model()->findByPk($person);
                                            $personName = $personValue->name;
//                                            position name
                                            $pid = $record->person_position;
                                            $positionvalue = TPersonpositions::model()->findByPk($pid);
                                            $positionName = $positionvalue->name;
//                                            Organisation name
                                            $orgid = $positionvalue->organization;
                                            $organvalue = TOrganization::model()->findByPk($orgid);
                                            $organName = $organvalue->name;
                                            ?>  
                                            <tr class="modal-trigger " href="#supervise<?php echo $record->id; ?>">
                                                <td><?php echo $personName; ?></td>
                                                <td><?php echo $positionName; ?></td>
                                                <td><?php echo $organName; ?></td>
                                            </tr>
                                            <?php
                                            include 'modals/supervise_employment.php';
//                                            include 'modals/sorry.php';
                                        }
                                    } else {
                                        ?> 
                                    <code class="red white-text" style="margin-left: 500px;">No New Citations for positions</code>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
                <div id="sugestedpips">
                    <h3>Suggested Employment ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>


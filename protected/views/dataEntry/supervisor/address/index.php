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
$address_citations = TPcitationProfilefieldsMappings::model()->findAll("profilefield = '14' and status='F'"); // getting citaions mapped to position attribute
$ids = '';
if(empty($address_citations)){
//    $cite_id = ''; 
    $address_citation_Taken = '';
    $address_citation_inbox = '';
    $ids = '';
} else {
$cite_id = '';
foreach($address_citations as $recordcite){
    $cite_id .= $recordcite->citation.', ';
    $citevalue = TPersonCitation::model()->findbypk("$cite_id");
}

$ids = rtrim($cite_id,', ');
$address_citation_Taken = TPersonAddress::model()->findAll(" status IN ('T','C','L') and supervisor='$userid' and citation IN ($ids)");

$address_citation_inbox = TPersonAddress::model()->findAll("status = 'D' and citation IN ($ids)");
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
                                        <span>Address Citations</span> 
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($address_citation_Taken); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp <?php echo count($address_citation_inbox); ?> &nbsp;</span></a></li>
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
                                            <th>City</th>
                                            <th>Country</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($address_citation_Taken)) {
                                        foreach ($address_citation_Taken as $record) {
                                            $personid = $record->person;
                                            $personValue = TPerson::model()->findbypk($personid);
                                            $personname = $personValue->name;
//                                            getting ownership
                                            $ownershipresult = $record->ownership;
                                            $ownershipValue = TAddressownership::model()->findByPk($ownershipresult);
                                            $ownershipname = $ownershipValue->name;
//                                            getting type 
                                            $typeresult = $record->type;
                                            $typeValue = TAddresstype::model()->findByPk($typeresult);
                                            $typename = $typeValue->name;
                                            $cityresult = $record->city;
                                            $townresult= $record->town;
                                            //getting country value
                                            $countryresult= $record->country; 
                                            $countryValueresult = TCountry::model()->findByAttributes(array('code' => $countryresult));
                                            $countrynameresult = $countryValueresult->name;
                                            $streetnameresult = $record->street_name;
                                            $statusresult = $record->status;
                                            ?>
                                        <?php if($statusresult=='C'){?>
                                                <tr class="green-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/address/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php  } elseif($statusresult=='L'){ ?>
                                                <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/address/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php } else { ?>
                                                <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/supervisor/address/supervise&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php } ?>
                                                <td><?php echo $personname; ?></td>
                                                <td><?php echo $cityresult; ?></td>
                                                <td><?php echo $countrynameresult; ?></td>
                                            </tr>
                                            <?php
                                                   } } else{ }
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
                                            <th>City</th>
                                            <th>Country</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($address_citation_inbox)) {
                                        foreach ($address_citation_inbox as $record) {
                                            $personid = $record->person;
                                            $personValue = TPerson::model()->findbypk($personid);
                                            $personname = $personValue->name;
//                                            getting ownership
                                            $ownershipresult = $record->ownership;
                                            $ownershipValue = TAddressownership::model()->findByPk($ownershipresult);
                                            $ownershipname = $ownershipValue->name;
//                                            getting type 
                                            $typeresult = $record->type;
                                            $typeValue = TAddresstype::model()->findByPk($typeresult);
                                            $typename = $typeValue->name;
                                            $cityresult = $record->city;
                                            //getting country value
                                            $countryresult= $record->country; 
                                            $countryValueresult = TCountry::model()->findByAttributes(array('code' => $countryresult));
                                            $countrynameresult = $countryValueresult->name;
                                            $statusresult = $record->status;
                                            ?>  
                                                <tr class="modal-trigger " href="#supervise<?php echo $record->id;?>">
                                                <td><?php echo $personname; ?></td>
                                                <td><?php echo $cityresult; ?></td>
                                                <td><?php echo $countrynameresult; ?></td>
                                            </tr>
                                            <?php
                                            include 'modals/supervise_employment.php';
//                                            include 'modals/sorry.php';
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
                    <h3>Suggested Address ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>


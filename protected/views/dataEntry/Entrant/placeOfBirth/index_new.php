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

$userid = Yii::app()->user->userid; // getting curent user

$address_citation_Taken = TPcitationProfilefieldsMappings::model()->findAll("status IN ('T','C','L') and data_entrant='$userid' and profilefield = '6'"); // getting takenup, corrected and discarded citations

$address_citation_inbox = TPcitationProfilefieldsMappings::model()->findAll("status = 'A' and profilefield = '6'"); // getting new citations

$rejectedplaceOfBirth = TPersonplaceOfBirth::model()->findAll("maker = '$userid' and status = 'R'"); // getting rejected address attributes
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
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <span>Place Of Birth Citations</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($address_citation_Taken); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp <?php echo count($address_citation_inbox); ?> &nbsp;</span></a></li>
                                    <li class="tab col s4"><a href="#rejected">Rejected<span class="red white-text circle">&nbsp <?php echo count($rejectedplaceOfBirth); ?> &nbsp;</span></a></li>
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
                                            <th>Citation Title</th>
                                            <th>Person</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($address_citation_Taken)) {
                                        foreach ($address_citation_Taken as $Trecord) {
                                            $Tcitationid = $Trecord->citation; //getting citation of attribute
                                            $TcitationValue = TPersonCitation::model()->findByPk($Tcitationid);
                                            $Tcitation = $TcitationValue->title;
                                            $Tperson = $Trecord->person;
                                            $Tstatus = $Trecord->status;
                                            $TpersonValue = Tperson::model()->findByPk($Tperson);
                                            $TpersonName = $TpersonValue->name;
//                                            nationality name
                                            $Tnid = $TpersonValue->nationality;
                                            $Tnationalityvalue = TCountry::model()->findByAttributes(array('code' => $Tnid));
                                            $Tnationalityname = $Tnationalityvalue->native;
                                            ?>
                                            <?php if($Tstatus=='C' ){?>
                                        <tr class="green-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/placeOfBirth/search&id=<?php echo $code->encode($Trecord->id); ?>'">
                                        <?php }elseif($Tstatus=='L'){ ?>
                                         <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/placeOfBirth/search&id=<?php echo $code->encode($Trecord->id); ?>'">   
                                        <?php } else{ ?>
                                         <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/placeOfBirth/search&id=<?php echo $code->encode($Trecord->id); ?>'">
                                        <?php } ?>
                                                <td><?php echo $Tcitation; ?></td>
                                                <td><?php echo $TpersonName; ?></td>
                                                <td><?php echo $Tnationalityname; ?></td>
                                                <td><?php echo $TcitationValue->created_on; ?></td>
                                            </tr>
                                            <?php
                                                   } 
                                        } else{ ?>
                                       <code class="red white-text" style="margin-left: 500px;">No Taken up Citations for Place Of Birth</code>
                                    <?php    }
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
                                            <th>Citation Title</th>
                                            <th>Person</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($address_citation_inbox)) {
                                        foreach ($address_citation_inbox as $record) {
                                            $citationid = $record->citation; //getting citation of attribute
                                            $citationValue = TPersonCitation::model()->findByPk($citationid);
                                            $citation = $citationValue->title;
                                            $person = $citationValue->person;
                                            $personValue = Tperson::model()->findByPk($person);
                                            $personName = $personValue->name;
//                                            nationality name
                                            $nid = $personValue->nationality;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->native;
                                            ?>  
                                                <tr class="modal-trigger " href="#takeUp<?php echo $record->id;?>">
                                                <td><?php echo $citation; ?></td>
                                                <td><?php echo $personName; ?></td>
                                                <td><?php echo $nationalityname; ?></td>
                                                <td><?php echo $citationValue->created_on; ?></td>
                                            </tr>
                                            <?php
                                            include 'modals/takeupcitation.php';
//                                            include 'modals/sorry.php';
                                        } } else{
                                        ?> 
                                    <code class="red white-text" style="margin-left: 500px;">No New Citations for Place of Birth</code>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>                
                <div id="rejected">
                    <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example3" class="display responsive-table datatable-example">
                                    <thead>
                                            <tr>    
                                            <th>Place City</th>
                                            <th>Country</th>
                                            <th>Person</th>
                                            <th>Started On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($rejectedplaceOfBirth)) {    
                                        foreach ($rejectedplaceOfBirth as $record) {
                                            $cityresult = $record->city;
                                            $personr = $record->person;
                                            $personValuer = Tperson::model()->findByPk($personr);
                                            $personNamer = $personValuer->name;
                                            //getting country value
                                            $countryresultr= $record->country; 
                                            $countryValueresultr = TCountry::model()->findByAttributes(array('code' => $countryresultr));
                                            $countrynameresultr = $countryValueresultr->name;
                                            $streetnameresult = $record->street_name;
                                            ?>  
                                        <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/address/correctrejectedaddress&id=<?php echo $code->encode($record->id); ?>'">
                                                <td><?php echo $cityresult; ?></td>
                                                <td><?php echo $countrynameresultr; ?></td>
                                                <td><?php echo $personNamer; ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                            </tr>
                                            <?php
//                                            include 'modals/correctrejectedposition.php';
                                                   } } else{ ?>
                                       <code class="red white-text" style="margin-left: 500px;">No New Citations for Place Of Birth</code>
                                    <?php    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>                
            </div>
        </div>
    </div>
</div>




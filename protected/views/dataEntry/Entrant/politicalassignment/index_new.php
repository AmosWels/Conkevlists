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

$position_citations = TOrganizationcitationMapping::model()->findAll("research = '1' and status='A'"); //getting only mappings to position attribute

//if(empty($position_citations)){
//    $cite_id = ''; 
//    $organ_citation_Taken ='';
//    $person_citation_test = '';
//    $ids = '';
//}else{ 
//$cite_id = '';
//foreach($position_citations as $recordcite){
//    $cite_id .= $recordcite->citation.', ';
//    $citevalue = TOrganizationCitation::model()->findbypk("$cite_id");
//}

//$ids = rtrim($cite_id,', ');
$organ_citation_Taken = TOrganizationcitationMapping::model()->findAll("status IN ('T','C','L') and data_entrant='$userid' and research = '1'"); // getting takenup, corrected and discarded citations

$organ_citation_test = TOrganizationcitationMapping::model()->findAll("status = 'A' and research = '1'"); // getting new citations
//}
$rejectedposition = TPersonpositions::model()->findAll("maker = '$userid' and status = 'R'"); // getting rejected position attributes
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
                                    <li class="tab col s4"><a href="#rejected">Rejected<span class="red white-text circle">&nbsp <?php echo count($rejectedposition); ?> &nbsp;</span></a></li>
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
                                            <th>Organization</th>
                                            <th>Country</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($organ_citation_Taken)) {
                                        foreach ($organ_citation_Taken as $Trecord) {
                                            $Tciteid = $Trecord->citation;
                                            $TciteValue = TOrganizationCitation::model()->findByPk($Tciteid);
                                            $Torgan = $Trecord->organization;
                                            $Tstatus = $Trecord->status;
                                            $TorganValue = TOrganization::model()->findByPk($Torgan);
                                            $TorganName = $TorganValue->name;
                                            $TcountryValue = $TorganValue->country;
//                                            $type = $join->joinOrganizationTypes($record->type);
                                            $Tcountry = $join->joinCountry($TcountryValue);
                                            ?>
                                            <?php if($Tstatus=='C' ){?>
                                        <tr class="green-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/search&id=<?php echo $code->encode($Trecord->id); ?>'">
                                        <?php }elseif($Tstatus=='L'){ ?>
                                         <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/search&id=<?php echo $code->encode($Trecord->id); ?>'">   
                                        <?php } else{ ?>
                                                <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/search&id=<?php echo $code->encode($Trecord->id); ?>'">
                                        <?php } ?>
                                            <!--<tr onclick="location.href = '<?php // echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/view_new&id=<?php // echo $code->encode($record->id); ?>'">-->
                                                <td><?php echo $TciteValue->title; ?></td>
                                                <td><?php echo $TorganName; ?></td>
                                                <td><?php echo $Tcountry->name; ?></td>
                                                <td><?php echo $TciteValue->createdon; ?></td>
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
                                            <th>Citation Title</th>
                                            <th style="width: 600px;">Organisation</th>
                                            <th>Country</th>
                                            <th>Created On</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($organ_citation_test)) {
                                        foreach ($organ_citation_test as $record) {
                                            $citeid = $record->citation;
                                            $citeValue = TOrganizationCitation::model()->findByPk($citeid);
                                            $organ = $record->organization;
                                            $organValue = TOrganization::model()->findByPk($organ);
                                            $organName = $organValue->name;
                                            $countryValue = $organValue->country;
//                                            $type = $join->joinOrganizationTypes($record->type);
                                            $country = $join->joinCountry($countryValue);
                                            ?>  
                                                <tr class="modal-trigger " href="#takeUp<?php echo $record->id;?>">
                                                <td><?php echo $citeValue->title; ?></td>
                                                <td><?php echo $organName; ?></td>
                                                <td><?php echo $country->name; ?></td>
                                                <td><?php echo $citeValue->createdon; ?></td>
                                            </tr>
                                            <?php
                                            include 'modals/takeupcitation.php';
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
                <div id="rejected">
                    <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example3" class="display responsive-table datatable-example">
                                    <thead>
                                            <tr>    
                                            <th>Position Name</th>
                                            <th>Organisation</th>
                                            <th>Country</th>
                                            <th>Started On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($rejectedposition)) {
                                            $levelname = '';
                                        foreach ($rejectedposition as $record) {
                                            $organ = $record->organization;
                                            $organValue = TOrganization::model()->findByPk($organ);
                                            $organName = $organValue->name;
                                            $countryValue = $organValue->country;
//                                          $type = $join->joinOrganizationTypes($record->type);
                                            $country = $join->joinCountry($countryValue);

//                                            citation
                                            $citeid  = $record->citation;
                                            $citation = TOrganizationCitation::model()->findByPk($citeid);
                                            ?>
                                            
                                        <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/correctrejectedposition&id=<?php echo $code->encode($record->id); ?>'">
                                                <td><?php echo $record->name; ?></td>
                                                <td><?php echo $organName; ?></td>
                                                <td><?php echo $country->name; ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                            </tr>
                                            <?php
//                                            include 'modals/correctrejectedposition.php';
                                                   } }
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


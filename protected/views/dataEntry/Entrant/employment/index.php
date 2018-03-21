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

$employment_citations = TPcitationProfilefieldsMappings::model()->findAll("profilefield = '13' and status='A'"); //getting only mappings to employment attribute
$cite_id = '';
foreach($employment_citations as $recordcite){
    $cite_id .= $recordcite->citation.', ';
    $citevalue = TOrganizationCitation::model()->findbypk("$cite_id");
}

$ids = rtrim($cite_id,', ');
$organ_citation_Taken = TPersonCitation::model()->findAll("status IN ('T','C','L') and data_entrant='$userid' and id IN ($ids)"); // getting takenup, corrected and discarded citations

$person_citation_test = TPersonCitation::model()->findAll("status = 'N' and id IN ($ids)"); // getting new citations

$rejectedposition = TPersonCitation::model()->findAll("maker = '$userid' and status = 'R'"); // getting rejected position attributes
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
                                        <span>Employment Citations</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($organ_citation_Taken); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp <?php echo count($person_citation_test); ?> &nbsp;</span></a></li>
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
                                            <th>Person</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($organ_citation_Taken)) {
                                        foreach ($organ_citation_Taken as $record) {
                                            $citation = $record->title;
                                            $person = $record->person;
                                            $status = $record->status;
                                            $personValue = Tperson::model()->findByPk($person);
                                            $personName = $personValue->name;
//                                            nationality name
                                            $nid = $personValue->nationality;
                                            $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
                                            $nationalityname = $nationalityvalue->native;
                                            ?>
                                            <?php if($status=='C' ){?>
                                        <tr class="green-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/employment/search&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php }elseif($status=='L'){ ?>
                                         <tr class="red-text" onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/employment/search&id=<?php echo $code->encode($record->id); ?>'">   
                                        <?php } else{ ?>
                                                <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/employment/search&id=<?php echo $code->encode($record->id); ?>'">
                                        <?php } ?>
                                            <!--<tr onclick="location.href = '<?php // echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/view_new&id=<?php // echo $code->encode($record->id); ?>'">-->
                                                <td><?php echo $record->title; ?></td>
                                                <td><?php echo $organName; ?></td>
                                                <td><?php echo $country->name; ?></td>
                                                <td><?php echo $record->createdon; ?></td>
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
                                            <th>Person</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                           </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($person_citation_test)) {
                                        foreach ($person_citation_test as $record) {
                                            $citation = $record->title;
                                            $person = $record->person;
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
                                                <td><?php echo $record->created_on; ?></td>
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
                                            <th>Emploment Name</th>
                                            <th>Person</th>
                                            <th>Nationality</th>
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


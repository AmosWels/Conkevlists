<?php
//getting person id
$code = new Encryption;
$id = yii::app()->request->getParam('id');
$positionid = $code->decode($id);
$position = TPersonpositions::model()->findbypk($positionid);
//organisation name
$Orgid = $position->organization;
$orgvalue = TOrganization::model()->findByPk($Orgid);
$orgname = $orgvalue->name;
//level name
$Lid = $position->level;
$Lvalue = TPersonpositionslevel::model()->findByPk($Lid);;
$Lname = $Lvalue->name;
//weight name
$Wid = $position->weight;
$Wvalue = TPersonpositionsweight::model()->findByPk($Wid);;
$Wname = $Wvalue->name;

//getting profile fields
$pcitations = TPositionCitation::model()->findAll("Position=$positionid");
$Profilefields = TPositionprofilefields::model()->findAll("Status='A'");
?>
<?php ?>

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
                                        <?php echo CHtml::link('Positions', array('research/maker/politicalassignment')); ?> &sol;
                                        <span><?php echo $position->name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $position->name; ?>
                                            - <small class="grey-text"><?php echo $orgname; ?></small> 
                                            - <small class="grey-text"><i class="material-icons tiny">poll</i><?php echo $Lname; ?></small> 
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
<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div class="row">  
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-content">
                                <div class="tabs-vertical">
                                    <ul class="tabs transparent z-depth-0">                                      
                                        <li class="tab">
                                            <a href="#webcitation">&nbsp; Web Citations <span class="right blue-text">(<?php echo count($pcitations); ?>)</span></a>
                                        </li>                                       
                                        <li class="divider"></li>
                                        <li class="tab">
                                            <a href="#bookcitation">&nbsp; Book Citations <span class="right blue-text">(0)</span></a>
                                        </li> 
                                        <li class="divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##########################################################-->
                    <div class="col s12 m9">
                        <div class="card">
                            <div class="card-content">
                                    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                                        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Add Citation">
                                            <i class="large material-icons">mode_edit</i>
                                        </a>
                                        <ul>
                                            <li><a href="javascript:AlertIt();" class="btn-floating tooltipped" data-position="left" data-delay="50" data-tooltip="Book"><i class="material-icons">book</i></a></li>
                                            <li><a href="#add-citation-website-position" class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Website"><i class="material-icons">language</i></a></li>
                                         </ul>
                                    </div> 
                                <div id="webcitation"> 
                                    <div id="web">
                                        <table id="example2" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                </tr>
                                            </tfoot>

                                            <tbody> 
                                                <?php
                                                if (!empty($pcitations)) {
                                                        $b=0;
                                                    foreach ($pcitations as $record) {
//                                                        $b = 0;
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-result">
                                                                    <div class="search-result">
                                                                        <text class="black-text"></text><a style="font: small-caption; font-weight: 100;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"  href="#pedit-citation-website<?php echo $record->id; ?>" class="search-result-title modal-trigger">Edit <?php echo $record->Type; ?> Citation</a>
                                                                        <span class="row s12">
                                                                            <span class="attachment-info col s4">Author &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->Authors)) {
                                                                                        echo $record->Authors . '.';
                                                                                    }
                                                                                    ?></span></span> 
                                                                            <span class="attachment-info col s4">Publish Date &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->Publish_date)) {
                                                                                        echo date_format(date_create($record->Publish_date), "F d, Y") . '.';
                                                                                    }
                                                                                    ?></span></span> 
                                                                            <span class="attachment-info col s4">Title &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php if (!empty($record->Title) AND ! empty($record->Url)) { ?>
                                                                                        <a style="font-style: italic; text-decoration: underline;"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo $record->Url; ?>"
                                                                                           target="_blank"><?php echo $record->Title . '.'; ?></a>
                                                                                    <?php } ?></span></span></span>
                                                                        <span class="row s12">
                                                                            <span class="attachment-info col s4">Publisher &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->Publisher)) {
                                                                                        echo $record->Publisher . '.';
                                                                                    }
                                                                                    ?></span></span>
                                                                            <span class="attachment-info col s4">Referenced Publisher &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->Ref_publisher)) {
                                                                                        echo $record->Ref_publisher . '.';
                                                                                    }
                                                                                    ?></span></span>
                                                                            <span class="attachment-info col s4">Date Accessed &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->Access_date)) {
                                                                                        echo date_format(date_create($record->Access_date), "F d, Y") . '.';
                                                                                    }
                                                                                    ?></span></span> </span>
                                                                    </div>
                                                                    <hr class="grey lighten-5" style="border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">
                                                                    <!--profile mappings start-->
                                                                    <?php
                                                                    
                                                                    $profilefields_set = TPositioncitationProfilefieldsMappings::model()->findAll("citation = $record->id");
                                                                    $profilemappings = "";
                                                                    
                                                                    ?>
                                                                    <?php if (!empty($profilefields_set)) {   ?>
                                                                        <a href="#pmap-citation-profile<?php echo $record->id; ?>" class="search-result-link modal-trigger">
                                                                            <span class="small" style="color: black;">Mapped To : </span>
                                                                            <?php
                                                                            //profile sets
                                                                            
                                                                            $profilemapping_set = "";
                                                                            $profilemapping_setnames = "";
                                                                            
                                                                            foreach ($profilefields_set as $item) {
                                                                                
                                                                                //getting profile fields
                                                                                $profilemapping_set .= $item->profilefield . ',';
                                                                                $profilefield_name = TPositionprofilefields::model()->findbypk($item->profilefield);
                                                                                $profilemapping_setnames .= $profilefield_name->Name . ', ';
                                                                            
                                                                            }
                                                                            //displaying mapped profile fields
                                                                            echo rtrim($profilemapping_setnames, ', ');
                                                                            
                                                                            ?></a>                                                    
                                                                        <?php 
                                                                    } else { $b++;
                                                                        $profilemapping_set = "";
                                                                        ?>
                                                                        <a href="#pmap-citation-profile<?php echo $record->id; ?>" class="search-result-link modal-trigger"
                                                                           style="color: red;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'red';">No mapping!</a>
                                                                       <?php }   ?>

                                                                </div>
                                                                <!--end search result--> 
                                                                <!--<hr width="100%" size="1">-->
                                                            </td>
                                                            <?php
                                                            include 'modals/peditCitationWebsite.php';
                                                            include 'modals/pmapCitationprofile.php';
                                                            ?>
                                                        </tr>
                                                        <?php   }   ?>
                                                    <?php } else { $b=1; ?>

                                                <code class="red-text grey lighten-4" style="margin-left: 390px;">Create New Citation</code>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="center-align">
                                                <?php // echo $b; ?>
                                            <?php if ($b == 0 ) { ?>
                                                <a href="#submit-position<?php
                                            echo $position->id;
                                                ?>" 
                                                   class="modal-trigger waves-effect waves-blue btn blue">Submit</a>                                              
                                               <?php } else { ?>
                                                <a href="#" class="waves-effect waves-blue btn blue disabled">Submit</a> 
                                            <?php } ?>
                                        </div>  
                                    </div>
                                </div>
                                <div id="bookcitation"> 
                                    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                                        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Add Citation">
                                            <i class="large material-icons">mode_edit</i>
                                        </a>
                                        <ul>
                                            <li><a href="#add-citation-website-person" class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Website"><i class="material-icons">language</i></a></li>
                                        </ul>
                                    </div> 
                                    <div id="web">
                                        <table id="example3" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                            <tbody> 
                                                <tr><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                            <!--end citation-->
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end s9 col -->
            </div>

        </div>
    </div>
</div>
</div>

<?php
////add citation website
include_once 'modals/addCitationWebsite_position.php';
////submit person
include_once 'modals/submitPosition.php';
?>
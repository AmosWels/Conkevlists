<?php
$organization = $model[0];
$citations = $model[1];
$researches = TOrganizationresearch::model()->findAll("status='A'");

if (empty($organization)) {
    $this->redirect(array('research/organization'));
}

//functions
$code = new Encryption;
$join = new JoinTable;
//joins
$type = $join->joinOrganizationTypes($organization->type);
$country = $join->joinCountry($organization->country);
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
                                        <?php echo CHtml::link('Maker', array('research/maker/panel')); ?> &sol;
                                        <?php echo CHtml::link('Organizations', array('research/maker/organisation')); ?> &sol;
                                        <span><?php echo $organization->name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $organization->name; ?> 
                                            - <small class="grey-text"><?php echo $type->name; ?> </small> 
                                            - <small class="grey-text"><i class="material-icons tiny">location_on</i><?php echo $country->name; ?> </small> 
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
                                            <a href="#citation">&nbsp;Web Citations <span class="right blue-text">(<?php echo count($citations); ?>)</span></a> 
                                        </li>
                                        <li class="divider"></li>
                                        <li class="tab">
                                            <a href="#bookcitation">&nbsp; Book Citations <span class="right grey-text">(0)</span></a>
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
                                <div id="citation"> 

                                    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                                        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Add Citation">
                                            <i class="large material-icons">mode_edit</i>
                                        </a>
                                        <ul>
                                            <li><a href="javascript:AlertIt();" class="btn-floating tooltipped" data-position="left" data-delay="50" data-tooltip="Book"><i class="material-icons">book</i></a></li>
                                            <li><a href="#add-citation-website" class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Website"><i class="material-icons">language</i></a></li>
                                        </ul>
                                    </div>                                     

                                    <div id="web">
                                        <table id="example2" class="display responsive-table datatable-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>

                                            <tbody>

                                                <?php if (!empty($citations)) {
                                                    $b = 0; ?>

                                                    <?php foreach ($citations as $record) { ?>
                                                        <?php
                                                        $mapping_set = "";
                                                        $set_names = "";
                                                        $join = new JoinTable();
                                                        $mappings = $join->organizationCitationMapping($record->id);
                                                        ?>
                                                        <tr>
                                                            <td>      
                                                                <div class="search-result">
                                                                    <div class="search-result">
                                                                        <text class="black-text"></text><a style="font: small-caption; font-weight: 100;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"  href="#edit-citation-website<?php echo $record->id; ?>" class="search-result-title modal-trigger" class="search-result-title modal-trigger">Edit <?php echo $record->type; ?> Citation</a>
                                                                        <span class="row s12">
                                                                            <span class="attachment-info col s4">Author &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php if (!empty($record->authors)) {
                                                                            echo $record->authors . '.';
                                                                                    } ?> </span></span> 
                                                                            <span class="attachment-info col s4">Publish Date &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->publish_date)) {
                                                                                        echo date_format(date_create($record->publish_date), "F d, Y") . '.';
                                                                                    }
                                                                                    ?></span></span> 
                                                                            <span class="attachment-info col s4">Title &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                         <?php if (!empty($record->title) AND ! empty($record->url)) { ?>
                                                                                        <a style="font-style: italic; text-decoration: underline;"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo $record->url; ?>"
                                                                                           target="_blank"><?php echo $record->title . '.'; ?></a>
                                                                         <?php } ?></span></span></span>
                                                                        <span class="row s12">
                                                                            <span class="attachment-info col s4">Publisher &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php if (!empty($record->publisher)) {
                                                                        echo $record->publisher . '.';
                                                                    } ?></span></span>
                                                                            <span class="attachment-info col s4">Referenced Publisher &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->ref_publisher)) {
                                                                                        echo $record->ref_publisher . '.';
                                                                                    }
                                                                                    ?></span></span>
                                                                            <span class="attachment-info col s4">Date Accessed &rtrif;
                                                                                <span class=" black-text " style="margin-left:10px;">
                                                                                    <?php
                                                                                    if (!empty($record->access_date)) {
                                                                                        echo date_format(date_create($record->access_date), "F d, Y") . '.';
                                                                                    }
                                                                                    ?></span></span> </span>

                                                                    </div>
                                                                    <!--<hr class="grey lighten-5" style="border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">-->

                                                            <?php // if (!empty($mappings)) { ?>
                                                                        <!--<a href="#map-citation<?php echo $record->id; ?>" class="search-result-link modal-trigger">-->
                                                                <?php
//                                                                foreach ($mappings as $item) {
//                                                                    $mapping_set .= $item["research_id"] . ',';
//                                                                    $set_names .= $item["research_name"] . ', ';
//                                                                }
//                                                                echo rtrim($set_names, ', ');
//                                                                ?></a>                                                    
                                                    <?php // } else {
//                                                        $mapping_set = "";
//                                                        $b++; ?>
                                                                        <!--<a href="#map-citation<?php // echo $record->id; ?>" class="search-result-link red-text modal-trigger">Citation not mapped !</a>-->
                                                    <?php // } ?>
                                                                </div>
                                                            </td>
                                                    <?php
                                                       include 'modals/editCitationWebsite.php';
//                                                       include 'modals/mapCitation.php';
                                                       ?>
                                                        </tr>
                                                <?php } ?>
                                            <?php } else {
                                                $b = 1; ?>
                                                <code class="red-text grey lighten-4" style="margin-left: 390px;">Create New Citation</code>
                                                   <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="center-align">
                                                <?php // echo $b;  ?>
                                                <?php if ($b == 0) { ?>
                                                <a href="#submit-organization<?php
                                                    echo $organization->id;
                                                    ?>" 
                                                   class="modal-trigger waves-effect waves-blue btn blue">Submit</a>                                              
                                                    <?php } else { ?>
                                                <a href="#" class="waves-effect waves-blue btn blue disabled">Submit</a> 
                                                    <?php } ?>
                                        </div>
                                    </div>         

                                </div> 
                                <!--end website citation-->
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
                                <!--end book citation-->
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
//add citation website
include_once 'modals/addCitationWebsite.php';
//submit organization
include_once 'modals/submitOrganization.php';
?>

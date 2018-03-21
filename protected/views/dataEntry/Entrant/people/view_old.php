<?php
/* @var $this PeopleController */

$this->breadcrumbs = array(
    'People',
);
?>
<!--<h1><?php // echo $this->id . '/' . $this->action->id; ?></h1>-->
<!--<p>-->
    <!--People<tt><?php echo __FILE__; ?></tt>.-->
<?php
$newp = yii::app()->request->getParam('id');
$newperson = TPerson::model()->findbypk($newp);


$Names = TPname::model()->findAll("Status='A'");
//getting dateofBirth
$dob = TPdateofbirth::model()->findAll("Status='A'");
//getting nationality
$pNationality = TPnationality::model()->findAll("Status='A'");
//Getting Place of Birth
$pob = TPplaceofBirth::model()->findAll("Status='A'");
//getting race
$race = TPrace::model()->findAll("Status='A'");
//getting tribe
$tribe = TPtribe::model()->findall("Status='A'");
$pcitationd = TPersonCitation::model()->findAll('');
?>
<div class="row search-tabs-row search-tabs-header">
    <div class="col s12 m12 l10 left">
        <h5 class="" style="font-size: 16px">                                    
            <div class="breadcrumbs">
                <span class="black-text">DataEntry</span> &sol;
                    <?php echo CHtml::link('Maker', array('dataEntry/maker/panel')); ?> &sol;
                    <?php echo CHtml::link('People', array('dataEntry/maker/people')); ?> &sol;
                    <span><?php echo $newperson->Name; ?></span>
            </div>
        </h5>
    </div>
</div>
<!--</p>-->
<!--<div class="row">-->
<!--<div id="" class="col s12 m12 l12">-->
<div class="row s12 m12 l12">
    <div class="col s3">
        <div class="card" style="height: 298px;">
            <div class="card-content">
                <!--<div class="row">-->
                <div class="center-align search-image-results">
                    <img src="assets/images/profile-image-1.png" class="responsive-img circle center"  alt="" style="width: 60%">
                    <br>
                    <!--                        <div>
                                                <a href="#profileimg" class="modal-trigger btn-flat">Add Image</a>
                                                <a href="#" class="btn-flat">Mobile</a>
                                            </div>-->
                    <img src="assets/images/signature.png" alt="" class="responsive-img center"  alt="" style="width: 30%; align-content: center;"/>
                </div>
            </div>
            <!--</div>-->
        </div>
    </div>
    <div class="col s9">
        <span>New References</span>
        <!--<div class="card" style="height: 278px;">-->
        <div class="card">
            <div class="card-content">
                <?php
//                $CitationSubmitted_cite = TPerson::model()->findAll("status = 'A'");
//                $primarysubmited = TPerson::model()->findbypk($CitationSubmitted_cite);
//                $peopleeee = TPersonCitation::model()->findByAttribute('Person');
//                $profilemappings = "";
                ?>
                <?php if (!empty($personActive)) { ?>
                    <!--<a href="#fields_map<?php // echo $record->id; ?>" class="search-result-link modal-trigger">-->
                        <!--<span class="small" style="color: black;">pprprp Mapped:</span>-->
                        <?php
                        $Activatedcitation = "";
                        $activecite = "";
                        foreach ($personActive as $personActivated) {
                            $activecite .= $personActivated . ', ';
//                            $Activecitation = TPersonCitation::model()->findAll("Person=$personActivated");
//                            $Activatedcitation .= $Activecitation->Title;
                        }
                        echo rtrim($activecite, ', ');
//                        echo rtrim($Activatedcitation, ', ');
                        ?>
            <!--</a>-->
                    <?php
                } else {
                    $peoplesubmittedcite = "";
                    ?>
                    <!--<a href="#pmap-citation-profile<?php // echo $record->id; ?>" class="search-result-link red-text modal-trigger">No New Citation!</a>-->
                <?php } ?>

                <!--<ol>-->
<!--                    <?php // foreach ($pcitationd as $records) { ?>
                        <?php // if (!empty($records->Title) AND ! empty($records->Url)) { ?>
                            <li><a class="modal-trigger" href="#fields_map" style="font-size: 14px; font-weight: 400; color: #0066A4;"><?php // echo $records->Title; ?>&nbsp;&nbsp;<span style="color: grey;">Authored by</span>&nbsp;&nbsp;<?php // echo $records->Authors; ?></a><label>&nbsp;&nbsp;&nbsp;(3)</label></li>
                        <?php // }
//                    }
                    ?>
                </ol>-->
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<div class="row s12 m12 l12">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content">
                <div class="search-result">
                    <span href="#" class="search-result-title" style="font-size: 16px;">Profile</span>
                    <p class="search-result-description">
                        <span style="font-weight: bold;font">Name-</span> <?php foreach ($Names as $name) { ?><?php echo $name->Name; ?>&nbsp;<a class="blue-text" style="font-size: 11px;"><sup>[2]</sup></a> |  <?php } ?><div class="divider"></div>
                    <span style="font-weight: bold;">Nationality-</span> <?php foreach ($pNationality as $nation) { ?><?php echo $nation->Nationality ?>&nbsp;  <a class="blue-text" style="font-size: 11px;"><sup>[5]</sup></a> |  <?php } ?><div class="divider"></div>
                    <span style="font-weight: bold;">Gender-</span> Male <a class="blue-text" style="font-size: 11px;"><sup>2</sup></a> | <div class="divider"></div>  
                    <span style="font-weight: bold;">Date Of Birth-</span> <?php foreach ($dob as $dobp) { ?><?php echo $dobp->Date ?>&nbsp; <a class="blue-text" style="font-size: 11px;"><sup>[1]</sup></a> |  <?php } ?><div class="divider"></div>
                    <span style="font-weight: bold;">Place Of Birth-</span> <?php foreach ($pob as $pobp) { ?><?php echo $pobp->Place ?>&nbsp;  | <?php } ?><a class="blue-text" style="font-size: 11px;"><sup>[2]</sup></a><div class="divider"></div>
                    <span style="font-weight: bold;">Date Of Death-</span> |<div class="divider"></div>
                    <span style="font-weight: bold;">Race-</span> <?php foreach ($race as $prace) { ?><?php echo $prace->Race ?>&nbsp; <a class="blue-text" style="font-size: 11px;"><sup>[3]</sup></a> |  <?php } ?><div class="divider"></div>
                    <span style="font-weight: bold;">Tribe-</span> <?php foreach ($tribe as $ptribe) { ?><?php echo $ptribe->Tribe ?>&nbsp; <a class="blue-text" style="font-size: 11px;"><sup>[3]</sup></a> |  <?php } ?> 
                    </p>
                </div><hr width="100%" size="1"><br/>
                <div class="search-result">
                    <span href="#" class="search-result-title" style="font-size: 16px;">Occupation</span>
                    <p class="search-result-description">-
                        <span style="font-weight: bold;">Title</span> Managing Director|&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Description</span> Manages and oversees Company transactions |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Employer</span> NSSF |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Engagement Type</span> Contract |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Position</span> Top |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">City of Operation</span> Kampala |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Country of Operation</span> Uganda |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Searched By</span> Kabagambe Esther |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Approved By:</span> Mwesigye John Bosco
                    </p><div class="divider"></div>
                    <p class="search-result-description">-
                        <span style="font-weight: bold;">Title</span> Managing Director|&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Description</span> Manages and oversees Company transactions |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Employer</span> NSSF |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Engagement Type</span> Contract |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Position</span> Top |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">City of Operation</span> Kampala |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Country of Operation</span> Uganda |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Start Date</span> 2014-07-02 15:28:06 |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">End Date</span> 2016-07-02 15:28:06 |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Searched On</span> 2017-07-02 15:28:06 |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Searched By</span> Kabagambe Esther |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Approved By:</span> Mwesigye John Bosco
                    </p><div class="divider"></div>
                    <p class="search-result-description">-
                        <span style="font-weight: bold;">Title</span> Country |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Description</span> Manages and oversees Company transactions |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Employer</span> NSSF |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Engagement Type</span> Contract |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Position</span> Top |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">City of Operation</span> Kampala |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Country of Operation</span> Uganda |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Start Date</span> 2014-07-02 15:28:06 |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">End Date</span> 2016-07-02 15:28:06 |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Searched On</span> 2017-07-02 15:28:06 |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Searched By</span> Kabagambe Esther |&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">Approved By:</span> Mwesigye John Bosco
                    </p>
                </div><hr width="100%" size="1"><br>
                <div class="search-result">
                    <span href="#" class="search-result-title" style="font-size: 16px;">Contact</span>
                    <p class="search-result-description">
                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                        <span style="font-weight: bold;">Gender:</span> Male |
                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                    </p>

                </div><hr width="100%" size="1"><br>
                <div class="search-result">
                    <span href="#" class="search-result-title" style="font-size: 16px;">Address</span>
                    <p class="search-result-description">
                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                        <span style="font-weight: bold;">Gender:</span> Male |
                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                    </p>
                </div><hr width="100%" size="1"><br>
                <div class="search-result">
                    <span href="#" class="search-result-title" style="font-size: 16px;">Education</span>
                    <p class="search-result-description">
                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                        <span style="font-weight: bold;">Gender:</span> Male |
                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                    </p>
                </div><hr width="100%" size="1"><br>
                <div class="search-result">
                    <span href="#" class="search-result-title" style="font-size: 16px;">Occupation</span>
                    <p class="search-result-description">
                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                        <span style="font-weight: bold;">Gender:</span> Male |
                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                    </p>
                </div><hr width="100%" size="1"><br>
                <br>
                <a class="waves-effect waves-grey btn-flat blue-text m-b-xs right">Submit</a>
                <a class="waves-effect waves-grey btn-flat blue-text m-b-xs right">Cancel</a>
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <text>Accesed References</text>
                <div class="row">
                    <div class="col s4">
                        <li><a class="modal-trigger" href="#fields_map" style="font-size: 14px; font-weight: 400; color: #0066A4;">www.newvision.co.ug</a><label>&nbsp;&nbsp;&nbsp;(5)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://www.google.com/search?q=java+website</a><label>&nbsp;&nbsp;&nbsp;(3)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Donald_Trump</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Museveni Kaguta</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Mbabazi Amama</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Sewungu Nathanhttps://en.wikipedia.org/wiki/Sewungu Nathan</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                    </div>
                    <div class="col s4">
                        <li><a class="modal-trigger" href="#fields_map" style="font-size: 14px; font-weight: 400; color: #0066A4;">www.newvision.co.ug</a><label>&nbsp;&nbsp;&nbsp;(5)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://www.google.com/search?q=java+website</a><label>&nbsp;&nbsp;&nbsp;(3)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Donald_Trump</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Museveni Kaguta</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Mbabazi Amama</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Sewungu Nathan</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                    </div>
                    <div class="col s4">
                        <li><a class="modal-trigger" href="#fields_map" style="font-size: 14px; font-weight: 400; color: #0066A4;">www.newvision.co.ug</a><label>&nbsp;&nbsp;&nbsp;(5)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://www.google.com/search?q=java+website</a><label>&nbsp;&nbsp;&nbsp;(3)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Donald_Trump</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Museveni Kaguta</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Mbabazi Amama</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                        <li><a style="font-size: 14px; font-weight: 400; color: #0066A4;">https://en.wikipedia.org/wiki/Sewungu Nathan</a><label>&nbsp;&nbsp;&nbsp;(11)</label></li><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
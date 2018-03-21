<?php
/* @var $this PeopleController */

$this->breadcrumbs = array(
    'People',
);
?>
<!--<h1><?php // echo $this->id . '/' . $this->action->id;               ?></h1>-->
<!--<p>-->
    <!--People<tt><?php echo __FILE__; ?></tt>.-->
<?php
$code = new Encryption;
$userid = Yii::app()->user->userid;
//getting id from url
$id = yii::app()->request->getParam('id'); //getting id from url
$organid = $code->decode($id);

$organValue = TOrganization::model()->findByPk($organid); //getting organ value
$organName = $organValue->name;

$citations = TOrganizationCitation::model()->findAll("organization=$organid and status IN ('D','R') and maker= '$userid' ");
$profileCite = TOrganizationCitation::model()->find("organization=$organid and status='P'");

$countryValue = $organValue->country;
$typeValue = $organValue->type;
//$organisation = TOrganization::model()->findbypk($organid);

$join = new JoinTable;
$type = $join->joinOrganizationTypes($typeValue);
$typename = $type->name;

$country = $join->joinCountry($countryValue);
$countryname = $country->name;

//limiting length of display
if (strlen($organName) > 30){
$organName1 = substr($organName, 0, 30) . '...'; } else{ $organName1 = $organName;}
if (strlen($countryname) > 15){
$countryname1 = substr($countryname, 0, 15) . '...'; } else { $countryname1 = $countryname;}
if (strlen($typename) > 20){
$typename1 = substr($typename, 0, 20) . '...';} else{ $typename1 = $typename;}

#######
$personid = yii::app()->request->getParam('id');
$person = TPerson::model()->findbypk($personid);
//getting citation id
$citeid = yii::app()->request->getParam('Title');
//$pcitationid = TPersonCitation::model()->findbypk($citeid);
//getting names
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
#########
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
                                        <span class="black-text">Researcher</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/maker/panel')); ?> &sol;
                                        <?php echo CHtml::link('Draft', array('dataEntry/maker/organisation/index_new')); ?> &sol;
                                        <?php // echo CHtml::link('Organisations', array('dataEntry/maker/organisation')); ?> 
                                        <span><?php echo $organName; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 ">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Organisation </small>&rtrif; <?php echo $organName; ?>
                                            &mid; <small class="grey-text">Type </small> &rtrif;<?php echo $typename1; ?>
                                            &mid; <small class="grey-text">Country </small> &rtrif;  <?php echo $countryname1; ?> 
                                        </span>
                                        <?php if(strlen($organName)>30 || strlen($countryname)>15 || strlen($typename)>20){?><span class="modal-trigger" href="#viewprof"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
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
<!--</p>-->

<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div class="row">
                    <div class="col s3">
                        <div class="card" >
                            <div class="card-content" style="height: 310px;">
                                <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                                    <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Add Citation">
                                        <i class="large material-icons">add</i>
                                    </a>
                                    <ul>
                                        <li><a href="javascript:AlertIt();" class="btn-floating tooltipped" data-position="left" data-delay="50" data-tooltip="Book"><i class="material-icons">book</i></a></li>
                                        <li><a href="#add-citation-website" class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Website"><i class="material-icons">language</i></a></li>
                                    </ul>
                                </div> 
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
                        <div class="card" style="height: 310px;">
                            <div class="card-content">
                            <div class="card-title">New Citations</div>
                                <?php 
                                    if (!empty($citations)) {
                                        $b =1;
                                foreach ($citations as $record) { 
                                    $status = $record->status;
                                    ?>
                            <ul> 
                                <?php if($status == 'R') {?> 
                                <li><?php echo $b . '. ';?><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/viewCitation&id=<?php echo $code->encode($record->id); ?>'" style="font-size: 14px; font-weight: 400; color: red;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'red';">
                                            <?php echo $record->authors . '. '; ?> <?php echo '( '.$record->publish_date . ' ) '; ?> <?php echo '" '.$record->title.' "'; ?></a>
                                </li>
                          <?php } else { ?>
                                <li><?php echo $b . '. ';?><a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/organisation/viewCitation&id=<?php echo $code->encode($record->id); ?>'" style="font-size: 14px; font-weight: 400; color: #0066A4;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                    <?php echo $record->authors . '. '; ?> <?php echo '( '.$record->publish_date . ' ) '; ?> <?php echo '" '.$record->title.' "'; ?></a>
                                </li>
                                            <?php }?>
                                
                                
                            </ul>
                                        <?php $b++;
                                    }
                                } else{ ?>
                                    <code class="red-text card-title center" style="margin-left:10px;">!-- No Pending Citations were found -- !</code>
                               <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row s12" >
                    <div class="col s12 ">
                    <div class="card">
                        <div class="card-content" style="overflow: auto; height: 300px;">
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
                    </div>
                </div>
                <div class="row s12">
                    <div class="col s12 ">
                    <div class="card">
                        <div class="card-content">
                            <text>Accesed References</text>
                            <div class="row">
                                <div class="col s4">
                                    <li>&mid; <small class="grey-text">Profile Citation Title</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php echo $profileCite->title; ?>" onclick="window.open('<?php echo $profileCite->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li><br>
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
            </div>
        </div>
    </div>
</div>
<?php 
//add citation
include 'modals/addCitationWebsite.php';  
//view profile
include_once 'modals/viewprofile.php';
?>
<!--</div>-->
<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
//$results = $model[0];
//$resultcount = count($results);
//$searched = $model[1];
$searchnames = TSearchname::model()->findAll("status='A'");

$code = new Encryption;
$id = yii::app()->request->getParam('id');
$addressid = $code->decode($id); // getting employment details 
$addressValue = TPersonAddress::model()->findbypk($addressid); // getting employment details

$addresscity = $addressValue->city; // city name
$addresstown = $addressValue->town; // town name
$addresscounty = $addressValue->county; // county name
$addresssubcounty = $addressValue->subcounty; // subcounty name
$addressparish = $addressValue->parish; // parish name
$addressvillage = $addressValue->village; // village name
$addressstreetname = $addressValue->street_name; // streetname
$addressapartmentnumber = $addressValue->apartment_number; // apartment number
$addressotherdetails = $addressValue->otherdetails; // apartment number
$addresspostalcode = $addressValue->postal_code; // postal code
$addressstartdate = $addressValue->start_date; // postal code
$addressenddate = $addressValue->end_date; // postal code

$addressownershipid = $addressValue->ownership; //getting ownership id
$addressownershipValue = TAddressownership::model()->findByPk($addressownershipid); //getting ownership value
$addressownershipname = $addressownershipValue->name; // getting ownership name

$addresstypeid = $addressValue->type;
$addresstypeValue = TAddresstype::model()->findByPk($addresstypeid);
$addresstypename = $addresstypeValue->name;

$citeid = $addressValue->citation; // getting citation id
$person_id = $addressValue->person; // getting person id
$personValue = TPerson::model()->findByPk($person_id); // getting person values
$personName = $personValue->name;

$reason = $addressValue->supervisor_reject_reason; // getting rejection reason

$countries = TCountry::model()->findAll("status = 'A'"); // getting all active countries
$addressownerships = TAddressownership::model()->findAll("status = 'A'");       // getting all active address ownership 
$addresstypes = TAddresstype::model()->findAll("status = 'A'");      // getting all active address types

//getting all employment for ths person
$existingpersonaddress = TPersonAddress::model()->findAll("person = $person_id and status IN ('A','D','T')");

$citation = TPersonCitation::model()->findByPk($citeid); //getting citation details

$employment = TPersonEmploymentDetails::model()->findAll("person = $person_id and status IN ('A','D','T') "); // getting all other employments that are active and in drafts

$join = new JoinTable; // instatiating the jointable class

//gender name
$gid = $personValue->gender; // getting gender value
$gendervalue = TPgender::model()->findByPk("$gid");
$gendername = $gendervalue->name;
//nationality name
$nid = $personValue->nationality; //getting country value
$nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nid));
$nationalityname = $nationalityvalue->native;

//Address country
$addresscountry = $addressValue->country; // position name
$addresscountryvalue = TCountry::model()->findByAttributes(array('code' => $addresscountry));
$addresscountryname = $addresscountryvalue->name;

//limiting length of display
if (strlen($addresscountryname) > 15){
$addresscountryname1 = substr($addresscountryname, 0, 15) . '...'; } else { $addresscountryname1 = $addresscountryname; }

if (strlen($personName) > 30){
$personName1 = substr($personName, 0, 30) . '...'; } else{ $personName1 = $personName;}
if (strlen($nationalityname) > 15){
$nationalityname1 = substr($nationalityname, 0, 15) . '...'; } else { $nationalityname1 = $nationalityname; }
if (strlen($gendername) > 20){
$gendername1 = substr($gendername, 0, 20) . '...';} else{ $gendername1 = $gendername;}

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
                                        <span class="black-text">Data Entry</span> &sol;
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <?php echo CHtml::link('Address Citations', array('dataEntry/Entrant/employment/index_new')); ?> &sol;
                                        <span>Correction Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Person </small>&rtrif; <?php echo $personName1; ?>
                                            &mid; <small class="grey-text">Nationality </small> &rtrif;  <?php echo $nationalityname1; ?> 
                                            &mid; <small class="grey-text">Gender </small> &rtrif;  <?php echo $gendername1; ?> 
                                        </span>
                                        <?php if(strlen($personName)>30 || strlen($nationalityname)>15 || strlen($gendername)>20){?><span class="modal-trigger" href="#viewprofc"  style="font-size: 10px; color: blue;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'blue';">view more</span>
                                        <?php } else { ?><span style="font-size: 10px; color: grey;">view more</span><?php } ?>
                                    </li>
                                    <li class="tab col s2" ><small class="grey-text">Citation</small> &rtrif; 
                                    <input type="button" class=" waves-blue btn-flat" value="<?php if (strlen($citation->title) > 10){
                                        $title = substr($citation->title, 0, 10) . '...'; echo $title;  } else{ echo $citation->title;} ?>"
                                           onclick="window.open('<?php echo $citation->url; ?>','popup','height=500,width=800,left=10,top=10,,scrollbars=yes,menubar=no titlebar'); return false;" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"></li>
                                </ul>
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
                <p style="margin-left: 15px;"><small class="grey-text">Rejection Reason </small> &rtrif; 
                            <?php if (strlen($reason) > 180){ $reason1 = substr($reason, 0, 180) . ' ...';?>
                            <a class="modal-trigger"onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#reason">
                                <?php echo $reason1; ?></a><span><?php } else{ echo $reason;} ?></span></p><br>
                                <div class="row s12">
                                  <div class="col s8">
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'add-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                      <div class="card">
                                          <div class="card-content">
                                              <div class="card-title">Correct Address <code>with city as </code> <span class="red-text"><?php echo $addresscity; ?> </span> <code> IN </code>
                                                  <span class="red-text"><?php echo $addresscountryname; ?></span></div>
                                              <input type="hidden" name="address_id_correct" value="<?php echo $addressid; ?>">
                                              <div class="row">
                            <div class="input-field col s4">
                                <select name="ownershipcorrect">    
                                    <option value="<?php echo $addressownershipid; ?>"  ><?php echo $addressownershipname; ?></option>
                                    <?php
                                    if (!empty($addressownerships)) {

                                        foreach ($addressownerships as $ownership) {
                                            $ownershipname = $ownership->name;
                                            $ownershipid = $ownership->id;
                                            ?>
                                    <option value="<?php echo $ownershipid; ?>"><?php echo $ownershipname; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Address Ownership <span class="red-text">*</span></label>
                            </div> 
                            <div class="input-field col s4">
                                <select name="addresstypescorrect">    
                                    <option value="<?php echo $addresstypeid;?>" ><?php echo $addresstypename; ?></option>
                                    <?php
                                    if (!empty($addresstypes)) {

                                        foreach ($addresstypes as $type) {
                                            $typename = $type->name;
                                            $typeid = $type->id;
                                            ?>
                                    <option value="<?php echo $typeid; ?>"><?php echo $typename; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Address Type <span class="red-text">*</span></label>
                            </div> 
                            <div class="input-field col s4">
                                <select name="countrycorrect">    
                                    <option value="<?php echo $addresscountry; ?>" ><?php echo $addresscountryname1; 
                                    if (!empty($countries)) {?></option>
                                    <?php

                                        foreach ($countries as $country) {
                                            $countrycode = $country->code;
                                            $countryname = $country->name;
                                            ?>
                                    <option value="<?php echo $countrycode; ?>"><?php echo $countryname; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select> 
                                <label>Country <span class="red-text">*</span></label>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="....." id="mark1" name="citycorrect" type="text" value="<?php if(!empty($addresscity)){ echo $addresscity; } else{ echo '';}?>">
                                <label for="mark1" class="active">City <span class="red-text">*</span></label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="....." id="mark1" name="towncorrect" type="text" value="<?php if(!empty($addresstown)){ echo $addresstown; } else{ echo '';}?>">
                                <label for="mark1" class="active">Town <span class="red-text">*</span></label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="countycorrect" type="text" value="<?php if(!empty($addresscounty)){ echo $addresscounty; } else{ echo '';}?>">
                                <label for="mark1" class="active">County</label>
                            </div>
                            </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="sub-countycorrect" type="text" value="<?php if(!empty($addresssubcounty)){ echo $addresssubcounty; } else{ echo '';}?>">
                                <label for="mark1" class="active">Sub-county</label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="parishcorrect" type="text" value="<?php if(!empty($addressparish)){ echo $addressparish; } else{ echo '';}?>">
                                <label for="mark1" class="active">Parish</label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="villagecorrect" type="text" value="<?php if(!empty($addressvillage)){ echo $addressvillage; } else{ echo '';}?>">
                                <label for="mark1" class="active">Village</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="street-namecorrect" type="text" value="<?php if(!empty($addressstreetname)){ echo $addressstreetname; } else{ echo '';}?>">
                                <label for="mark1" class="active">Street Name</label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="apartment-numbercorrect" type="number" value="<?php if(!empty($addressapartmentnumber)){ echo $addressapartmentnumber; } else{ echo '';}?>">
                                <label for="mark1" class="active">Apartment Number</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="mark1" placeholder="..."name="postal-codecorrect" type="number" value="<?php if(!empty($addresspostalcode)){ echo $addresspostalcode; } else{ echo '';}?>">
                                <label for="mark1" class="active">Postal Code</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="detailscorrect" type="text" value="<?php if(!empty($addressotherdetails)){ echo $addressotherdetails; } else{ echo '';}?>">
                                <label for="mark1" class="active">Other Details</label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="start-datecorrect" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $addressstartdate; ?>">
                                <label for="mark1" class="active">Start Date (y/m/d) <span class="red-text">*</span></label>
                            </div>
                            <div class="input-field col s4">
                                <input placeholder="..." id="mark1" name="end-datecorrect" type="text"  class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php if(!empty($addressenddate)){ echo $addressenddate; } else{ echo '';}?>">
                                <label for="mark1" class="active">End Date (y/m/d) </label>
                            </div>
                        </div>
                                <div class="row" style="margin-left: 10px;">
                                    <button type="submit" class="waves-effect waves-blue btn blue right ">Correct</button>
                                    <a href="#discard" class="modal-trigger waves-effect waves-black tooltipped" data-position="top" data-delay="50" data-tooltip="Discard Supervision" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" style="text-decoration: underline;">Discard Supervision</a> 
                                    <a href="#deleteaddress"  class="modal-trigger waves-effect waves-grey tooltipped btn-flat small" data-position="top" data-delay="50" data-tooltip="Delete Employment" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons medium-small">delete</i></a>
                                    <a href="#submitaddress"  class="waves-effect waves-black tooltipped modal-trigger btn-flat small" data-position="top" data-delay="50" data-tooltip="Submit Employment" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons medium-small">forward</i></a>
                                 </div>
                            </div>
                        </div>
                                        <?php $this->endWidget(); ?>
                        </div>   
            <div class="col s4">
                            <div class="card" style="overflow: auto; height: 627px; border: dotted; ">
                            <div class="card-content">
                                <div class="card-title"> Other Addresses for <?php if (strlen($personName) > 30){
                                        $newname = substr($personName, 0, 30) . ' ...'; echo $newname; ?>
                                        <?php } else{ echo $personName;} ?></div>
                                <ol>
                                    <?php if(!empty($existingpersonaddress)){
                                     $t = 1;
                                     $color = '';
                                     $addresscolor = '';
                                           foreach ($existingpersonaddress as $existingaddress){
//                                            getting employment position id
                                            $city= $existingaddress->city;
                                            $town= $existingaddress->town;
                                            $country= $existingaddress->country; //getting country value
                                            $countryValue = TCountry::model()->findByAttributes(array('code' => $country));
                                            $countryname = $countryValue->name;
                                            $status = $existingaddress->status;
                                               switch ($status){ case 'A': $color = 'black-text'; $addresscolor = 'black-text'; break; case 'D' : $color='red-text'; $addresscolor = 'red-text'; } 
                                        ?>
                                    <li><span><?php // echo $t . '. '; ?></span><span class="<?php echo $addresscolor; ?>"><?php echo $city; ?></span> &rtrif; <span class="<?php echo $addresscolor; ?>"><?php echo $town; ?></span>
                                    &rtrif; <span class="<?php echo $addresscolor; ?>"><?php echo $countryname; ?></span></li>
                                           <?php $t++;  } } else{ ?>
                                              <code class="red-text center" style="margin-top: 80px;">! -- No Address Record(s) were found -- !</code>
                                           <?php } ?>
                                </ol>
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
////view organisation name
include_once 'modals/viewprofilecorrection.php';
////cancel reason rejection
include_once 'modals/viewreasonreject.php';
////delete employment
include_once 'modals/delete_address_exists.php';
////discard position
include_once 'modals/discardsupervisedaddress.php';
////submit position
include_once 'modals/submitsupervisedaddress.php';
?>

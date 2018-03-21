<?php
$panel_link = "businessProcess/customerOpening";
$sanction_link = "businessProcess/customerOpening/sanction";
?>
<?php
$code = new Encryption;
//$settings_link = "settings/panel";
//$settings_encrypt = $code->encode($settings_link);
$rim = $model->rim;
$images = TImage::model()->findAll("rim = $rim");
$profile_image = TImage::model()->findByAttributes(array('rim'=>$rim,'status'=>'A'));
    if(!empty($profile_image)){ 
        $image_source = Yii::app()->baseUrl."/imageUploads/{$rim}/".$code->decode($profile_image->image);
        $previous_image_id = $profile_image->id;
    }else {
        $image_source = "assets/images/user3.png";
        $previous_image_id = 0;
    }
//$profile_image = TImage::model()->find("rim = $rim");
?>

<?php
if(!empty($model->customer_type)){
    $customer_nature = TCustomertypeCategory::model()->findByAttributes(array('customer_type'=>$model->customer_type,'status'=>'A'));
    if(!empty($customer_nature)){
        $nature_model = TCustomerCategory::model()->findByPk($customer_nature->category);       
        if(!empty($nature_model)){ $nature = $nature_model->name; }      
    } else {
        $nature = "";
    }                           
}else{
    $nature = "";
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
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=<?php echo $panel_link; ?>">Customer Opening</a> &sol; 
                                        <span><?php echo $model->first_name.$model->middle_name.$model->last_name; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m2 16">                                
                                <h5><?php echo $rim; ?></h5>
                            </div>
                            <div class="col s12 m8 16 center">                                
                                <h5><span style="font-family: monospace"><?php echo $model->first_name.$model->middle_name.$model->last_name; ?></span></h5>
                            </div>
                            <div class="col s12 m2 16 right-align search-stats">                                
                                <!--<h6><a href="#prospectlist" class="modal-trigger"><span class="m-r-sm">MergeToProspect</span></a></h6>-->
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
                <!--vertical tabs starts-->
                <div class="row">  
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo $image_source; ?>" class="responsive-img">
                                <span data-activates='dropdown2' class="dropdown-button card-title">Profile Image</span>
                                <!-- Dropdown profile image menu -->
                                <ul id='dropdown2' class='dropdown-content'>
                                    <li><a href="#add_image" class="modal-trigger">Upload Image</a></li>
                                    <li><a href="#view_images" class="modal-trigger">Profile Images <span class="right"><?php echo count($images); ?></span></a></li>
                                    <li><a href="#">Take Photo</a></li>
                                </ul>
                            </div>
                            <div class="card-content">
                                <span  style="font-size: 13px">Nature</span>:<span class="right"><?php echo $nature; ?></span><br/>
                                <span  style="font-size: 13px">Customer Type</span>:<span class="right"><?php echo $model->customer_type; ?></span><br/>
                                <span  style="font-size: 13px">Date Created</span>:<span class="right"><?php echo $model->created_on; ?></span><br/>
                                <span  style="font-size: 13px">Branch</span>:<span class="right"><?php echo $model->branch_code; ?></span><br/>
                                <span  style="font-size: 13px">Status</span>:<span class="right"><?php echo $model->cb_status; ?></span><br/> 
                            </div>
                            <li class="divider"></li>
                            <div class="card-content">
                                <div class="tabs-vertical">
                                    <ul class="tabs transparent z-depth-0">                                      
                                        <li class="tab">
                                            <a href="#static">&nbsp;Data from External system</a> 
                                        </li> 
                                        <li class="tab">
                                            <a href="#additional">&nbsp;Additional Data</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#doc">&nbsp;Documents</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#sanction">&nbsp;Risk Assessment</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#risk">&nbsp;Risk Mitigation</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#risk">&nbsp;Customer Prospects</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#risk">&nbsp;Sanctions & Blacklist</a> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <li class="divider"></li>
                            <div class="card-content">
                                FOR RISK METER
                            </div>
                        </div>                         
                    </div>   
                    <!--vertical tabs ends-->
                    <div class="col s12 m9">
                        <!--Start of external data tab-->
                        <div id="static"> 
                            <!--###################################################-->
                            <div class="row s12">
                                <div class="col s12 m4">
                                    <div class="card stats-card">
                                    <div class="card-content">
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $sanction_link;?>&id=<?php echo $code->encode($rim); ?>'" style="font-size: 18px; font-family: monospace">Sanctions Screening</a><br/><br/>

                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                           <!--###################################################-->
                            <div class="row s12">
                                <div class="col s12 m6">
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span style="font-size: 18px; font-family: monospace">General Information</span><br/><br/>
                                            <?php if($nature == 'Natural'){?>
                                            <?php $general_N = NewNatureGenInfo::model()->findByAttributes(array('rim'=>$rim));?>
                                            <span>Gender(Natural)</span>  : <span class="right"><?php if(!empty($general_N)){ echo $general_N->gender;}?></span><br/>
                                            <span>Nationality(Natural)</span>  : <span class="right"><?php if(!empty($general_N)){ echo $general_N->county_of_birth;}?></span><br/>
                                            <span>Date of Birth(Natural)</span>  :<span class="right"><?php if(!empty($general_N)){ echo $general_N->date_of_birth;}?></span><br/>
                                            <span>Place of Birth(Natural)</span>  :<span class="right"><?php if(!empty($general_N)){ echo $general_N->city_of_birth;}?></span><br/>
                                            <span>Literacy Level(Natural)</span>  :<span class="right"><?php if(!empty($general_N)){ echo $general_N->literacy_level;}?></span><br/>
                                            <span>Marital Status(Natural)</span>  :<span class="right"><?php if(!empty($general_N)){ echo $general_N->marital_status;}?></span><br/>
                                            <span>Number of Dependents(Natural)</span>  :<span class="right"><?php if(!empty($general_N)){ echo $general_N->number_of_dependants;}?></span><br/>
                                            <span class="red">Income Band</span>  :<span class="right">Salary, $ ,50.000</span><br/>
                                            <span class="red">Industry</span>  :<span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Computer Programming"> 6201</span>
                                            <span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Information Aggregator">6311 ,</span><br/><br/>
                                            
                                            <?php }elseif($nature == 'Legal' OR $nature == 'Others'){ ?>
                                            <?php $general_L = NewLegalGenInfo::model()->findByAttributes(array('rim'=>$rim));?>
                                            <span>Sector(Legal)</span>:<span class="right"><?php if(!empty($general_L)){ echo $general_L->sector;}?></span><br/>
                                            <span>Number of Employees(Legal)</span>  :<span class="right"><?php if(!empty($general_L)){ echo $general_L->number_of_employees;}?></span><br/>
                                            <span>Place of Registration(Legal)</span>  :<span class="right"><?php if(!empty($general_L)){ echo $general_L->city_of_registration.','.$general_L->country_of_registration;}?></span><br/>
                                            <span>Date of Registration(Legal)</span>  :<span class="right"><?php if(!empty($general_L)){ echo $general_L->date_of_registration;}?></span><br/>
                                            <span>Registration Number(Legal)</span>  :<span class="right"><?php if(!empty($general_L)){ echo $general_L->registration_number;}?></span><br/>
                                            <span>Registration Type(Legal)</span>  :<span class="right"><?php if(!empty($general_L)){ echo $general_L->registration_type;}?></span><br/>
                                            <span class="red">Income Band</span>  :<span class="right">Salary, $ ,50.000</span><br/>
                                            <span class="red">Industry</span>  :<span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Computer Programming"> 6201</span>
                                            <span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Information Aggregator">6311 ,</span><br/><br/>
                                            <?php } ?>
                                            <a class="right" href="#">view more</a>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                    <!--<div class="col s12 m6">-->
                                    <div class="card stats-card m6">
                                        <div class="card-content">
                                            <span style="font-size: 18px; font-family: monospace">Occupation</span><br/><br/>
                                            <?php if($nature == 'Natural'){?>
                                            <?php $occupation_N = NewNatureCustomerOccupation::model()->findByAttributes(array('rim'=>$rim));?>
                                            <span>Title(Natural)</span>:<span class="right" style="text-justify: inter-word; text-align: justify;"><?php if(!empty($occupation_N)){ echo $occupation_N->job_title;}?></span><br/>
                                            <span>Description(Natural)</span>:<span class="right" style="text-justify: inter-word; text-align: justify;"><?php if(!empty($occupation_N)){ echo $occupation_N->description;}?></span><br/>
                                            <span>Employer(Natural)</span>:<a href="" class="right tooltipped" data-position="right" data-delay="50" data-tooltip="Click To View Employer Details"><?php if(!empty($occupation_N)){ echo $occupation_N->employer;}?></a><br/>
                                            <span>Employment Type(Natural)</span>:<span class="right"><?php if(!empty($occupation_N)){ echo $occupation_N->employment_type;}?></span><br/>
                                            <span>Position(Natural)</span>:<span class="right"><?php if(!empty($occupation_N)){ echo $occupation_N->position;}?></span><br/>
                                            <span>City of Operation(Both)</span>:<span class="right"><?php if(!empty($occupation_N)){ echo $occupation_N->city_stationed;}?></span><br/>
                                            <span>Country of Operation(Both)</span>:<span class="right"><?php if(!empty($occupation_N)){ echo $occupation_N->country_stationed;}?></span><br/>
                                            <span>Start Date(Both)</span>:<span class="right"><?php if(!empty($occupation_N)){ echo $occupation_N->start_date;}?></span><br/>
                                            <span>End Date(Both)</span>:<span class="right"><?php if(!empty($occupation_N)){ echo $occupation_N->end_date;}?></span><br/><br/>
                                            
                                            <?php }elseif($nature == 'Legal' OR $nature == 'Others'){?>
                                            <?php $occupation_L = NewLegalCustomerOccupation::model()->findByAttributes(array('rim'=>$rim));?>
                                            <span>Product / Service(Legal)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->prod;}?></span><br/>
                                            <span>Industry(Legal)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->industry;}?></span><br/>
                                            <span>Description(Legal)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->description;}?></span><br/>
                                            <span>Customer(Legal)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->customer;}?></span><br/>
                                            <span>Engagement Type(Legal)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->engagement_type;}?></span><br/>
                                            <span>City of Operation(Both)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->city;}?></span><br/>
                                            <span>Country of Operation(Both)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->country;}?></span><br/>
                                            <span>Start Date(Both)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->start_date;}?></span><br/>
                                            <span>End Date(Both)</span>:<span class="right"><?php if(!empty($occupation_L)){ echo $occupation_L->end_date;}?></span><br/><br/>
                                            
                                            <?php } ?>
                                            <a class="right" href="#ahistory">view more</a>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span  style="font-size: 18px; font-family: monospace">Contact</span><br/><br/>
                                            <?php $contact = NewCustomerContact::model()->findByAttributes(array('rim'=>$rim));?>
                                            <span class="red">P.O.Box </span>:<span class="right">369913 Kampala, Uganda</span><br/>
                                            <span>Telephone Number</span>:<span class="right"><?php if(!empty($contact)){ echo $contact->contact;}?></span><br/>
                                            <span class="red">Email</span>:<span class="right">amoswelike@gmail.com</span><br/><br/>
                                            <small class="red-text">Extra fields in DB </small>
                                            <a class="right" href="#">view More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span style="font-size: 18px; font-family: monospace">Address</span><br/><br/>
                                             <?php $address = NewCustomerAddress::model()->findByAttributes(array('rim'=>$rim));?>
                                            <span>Address Type</span>:<span class="right"><?php if(!empty($address)){ echo $address->address_type;}?></span><br/>
                                            <span>Ownership</span>:<span class="right"><?php if(!empty($address)){ echo $address->ownership;}?></span><br/>
                                            <span style="">Start Date</span>:<span class="right"><?php if(!empty($address)){ echo $address->start_date;}?></span><br/>
                                            <span style="">End Date</span>:<span class="right"><?php if(!empty($address)){ echo $address->end_date;}?></span><br/><br/>
                                            <span style="text-justify: inter-word; text-align: justify;">
                                            <?php if(!empty($address)){ echo $address->unit.','.$address->building.','.$address->plot.','.$address->road.','.$address->village.','.$address->town.','.$address->city.','.$address->country;}?>
                                            <span style="color:#0099FF">details...</span></span><br/><br/>
                                            <a class="right" href="#">view more</a>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                    <!--</div>--> 

                                    <!--<div class="row s12">-->

                                    <!--<div class="col s12 m6">-->
                                    <?php if($nature == 'Natural'){ ?>
                                    <?php $education = NewNatureCustomerEducation::model()->findByAttributes(array('rim'=>$rim));?>
                                    <div class="card stats-card m6">
                                        <div class="card-content">
                                            <span style="font-size: 18px; font-family: monospace">Education(Natural)</span><br/><br/>
                                            <span>Institution(</span>:<span class="right" style="text-justify: inter-word; text-align: justify;"><?php if(!empty($education)){ echo $education->institution;}?></span><br/>
                                            <span>Place</span>:<span class="right"><?php if(!empty($education)){ echo $education->city.','.$education->country;}?></span><br/>
                                            <span>Program</span>:<span class="right"><?php if(!empty($education)){ echo $education->programme;}?></span><br/>
                                            <span>Date Started</span>:<span class="right"><?php if(!empty($education)){ echo $education->start_date;}?></span><br/>
                                            <span>Date Finished</span>:<span class="right"><?php if(!empty($education)){ echo $education->end_date;}?></span><br/>
                                            <span>Profession</span>:<span class="right"><?php if(!empty($education)){ echo $education->profession;}?></span><br/>
                                            <span>Award</span>:<span class="right"><?php if(!empty($education)){ echo $education->award;}?></span><br/><br/>
                                            <a class="right" href="#">view more</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="row s12">-->
                                    <!--<div class="col s12 m6">-->
                                    <!--</div>-->
                                    <!--<div class="col s12 m6">-->
                                    <div class="card stats-card">
                                        <div class="card-content">
                                            <span  style="font-size: 18px; font-family: monospace">Relationships</span><br/><br/>
                                            <?php $relations = NewCustomerRelationship::model()->findAll("rim = $rim");?>
                                            <?php if(!empty($relations)){ ?>
                                            <?php $r=1; foreach ($relations as $record) {?>
                                            <span><?php echo $record->name.','.$record->relation_type.','.$record->relative_rim;?></span><br/>
                                            <?php $r++; } }?>
                                            <small class="red-text">Extra fields in DB </small>
                                            <a class="right" href="#">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <!--</div>-->
                                <!--                                        <div class="col s12 m6">
                                                                            <div class="card stats-card">
                                                                                <div class="card-content">
                                                                                    <span style="font-size: 18px; font-family: monospace">Occupation</span><br/><br/>
                                                                                    <span>Title / Product / Service</span>:<span class="right">Conkev 2.0</span><br/><br/>
                                                                                    <span>Employment Type</span>:<span class="right">Not Applicable</span><br/>
                                                                                    <span>Employer</span>:<a href="" class="right">Finance Trust Bank Ltd</a><br/>
                                                                                    <span>Place</span>:<span class="right">Kampala, Uganda</span><br/>
                                                                                    <span>Job Description</span>:<span>Room E42,Akamwesi Building,Plot 114,Bunyonyi Drive,
                                                                                        Kyebando Central, Kawempe Division, Kampala, Uganda</span><br/><br/>
                                                                                    <span>Start Date</span>:<span class="right">Nov-01-2016 To Date</span><br/>
                                                                                    <span>End Date</span>:<span class="right">To Date</span><br/>
                                                                                    <a class="right" href="#ahistory">view more</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                            </div>
                            <!--</div>-->
                            <div class="divider"></div>
                            <div class="right-align">
                                <a type="#" class="waves-effect waves-grey btn-flat sweetalert-basic"><i class="close material-icons large">delete</i></a>
                                <a href="#" class="waves-effect waves-blue btn blue">Submit</a> 
                            </div>
                            <!--                                </div> 
                                                        </div>-->
                        </div>

                        <div id="additional">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <h5 class="grey-text">Additional Data</h5>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="" id="mask1" class="masked" type="text" data-inputmask="'alias': 'date'">
                                            <label for="mask1" class="active">Unstructured</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <div class="row">
                                                <div class="col s6">
                                                    <p class="p-v-xs">
                                                        <input name="group1" type="radio" id="test1" />
                                                        <label for="test1">Single</label>
                                                    </p>
                                                    <p class="p-v-xs">
                                                        <input name="group1" type="radio" id="test2" />
                                                        <label for="test2">Married</label>
                                                    </p>
                                                    <p class="p-v-xs">
                                                        <input class="with-gap" name="group1" type="radio" id="test3"  />
                                                        <label for="test3">Divorced</label>
                                                    </p>                                                        
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                                                        <label for="textarea1">Description</label>
                                                    </div>
                                                </div>
                                            </div> 
                                            <label for="mask2" class="active">Structured Singular</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <div class="input-field col s6">                                                    
                                                <input type="checkbox" id="salary" />
                                                <label for="salary">Salary</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="salary1" type="text">
                                                <label for="salary1">Description</label>
                                            </div>
                                            <div class="input-field col s6">                                                    
                                                <input type="checkbox" id="sales" />
                                                <label for="sales">Sales</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="sales1" type="text">
                                                <label for="sales1">Description</label>
                                            </div>
                                            <label for="mask3" class="active">Structured multiple</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--start of risk tab content-->
                        <div id="risk" class="tab-content">
                            <h6 class="grey-text">Risk Analysis </h6>
                            <div class="divider"></div>

                            <!--Risk Analysis-->
                            <p> in progress</p>
                            <span class="card-title">Asked Questions</span>
                            <ul class="collapsible popout" data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header">1. Unstructured 
                                        <i class="material-icons prefix modal-trigger right" href="#singlesnapmodal">textsms</i></div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">2. Structured singular</div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class=" col s12">                                                    
                                                <input name="group1" type="radio" id="test11" />
                                                <label for="test11">Single</label> 
                                                <input name="group1" type="radio" id="test22" />
                                                <label for="test22">Married</label> 
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                <input name="group1" type="radio" id="test33" />
                                                <label for="test33">Divorced</label>
                                                </br>
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">3. Structured multiple</div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class=" col s12">                                                    
                                                <input type="checkbox" id="salary222" />
                                                <label for="salary222">Salary</label>
                                                <input id="salary111" type="text">
                                            </div>
                                            <div class=" col s12">                                                    
                                                <input type="checkbox" id="sales222" />
                                                <label for="sales222">Sales</label>
                                                <input id="sales111" type="text">
                                            </div>                                                   
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--start of doc tab content-->
                        <div id="doc" class="tab-content">  
                            <div id="grid-gallery" class="grid-gallery">
                                <section class="grid-wrap">
                                    <ul class="grid">
                                        <li class="grid-sizer"></li>
                                        <!-- for Masonry column width -->
                                        <li>
                                            <figure>
                                                <img class="materialboxed responsive-img" src="assets/plugins/google-grid-gallery/img/thumb/1.png" alt="img01"/>
                                                <figcaption><h5 class="flow-text">Passport</h5>
                                                    <p>
                                                        ID:<span class="right">121922</span><br/>
                                                        Number:<span class="right">CM12PR</span><br/>
                                                        Issue Date:<span class="right">Jan-03-2013</span><br/>
                                                        Expiry Date:<span class="right">Jan-03-2013</span><br/>
                                                        Issued By:<span class="right">Internal Affairs</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="assets/plugins/google-grid-gallery/img/thumb/national.PNG" class="materialboxed responsive-img" alt="">
                                                <figcaption><h5 class="flow-text">National ID</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img class="materialboxed responsive-img" src="assets/plugins/google-grid-gallery/img/thumb/3.png" alt="img03"/>
                                                <figcaption><h5 class="flow-text">Driving Permit</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="assets/plugins/google-grid-gallery/img/thumb/4.png" alt="img04"/>
                                                <figcaption><h5 class="flow-text">Workers Permit</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="assets/plugins/google-grid-gallery/img/thumb/5.png" alt="img05"/>
                                                <figcaption><h5 class="flow-text">Office ID</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="assets/plugins/google-grid-gallery/img/thumb/6.png" alt="img06"/>
                                                <figcaption><h5 class="flow-text">LC Letter</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="assets/plugins/google-grid-gallery/img/thumb/1.png" alt="img01"/>
                                                <figcaption><h5 class="flow-text">Recomendation Letter</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="assets/plugins/google-grid-gallery/img/thumb/2.png" alt="img02"/>
                                                <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                                    <p>
                                                        Document ID:<span class="right">121922cm</span><br/>
                                                        Document no.:<span class="right">12cm</span><br/>
                                                        Date of Issue:<span class="right">121922cm</span>
                                                    </p><br/>
                                                    <a href="#metadata" class="modal-trigger right">Meta data</a>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    </ul>
                                </section>
                                <!--reduced right to 5 from 24px-->
                                <div class="fixed-action-btn vertical" style="bottom: 45px; right: 5px;">
                                    <a class="btn-floating btn-large cyan">
                                        <i class="large material-icons">add</i>
                                    </a>
                                    <ul>
                                        <li><a class="btn-floating cyan modal-trigger tooltipped" href="#modal4" data-position="left" data-delay="50" data-tooltip="Trigger mobile"><i class="material-icons">camera_enhance</i></a></li>
                                        <li><a class="btn-floating cyan modal-trigger tooltipped" href="#modal3" data-position="left" data-delay="50" data-tooltip="Browse document"><i class="material-icons">attach_file</i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--end of doc-->
                        </div>
                        <!--start of sanctions -->
                        <!--<div id="sanction" class="tab-content">-->
                        <div id="sanction" class="col s12 m12 l12">
                            <div class="row search-image-results">
                                <div class="col s12 m6 l4 grid-gallery">
                                    <fieldset>
                                        <img src="assets/images/search_images/nationall.png" class="materialboxed responsive-img" alt="" >
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">Jan-03-2011</span>
                                            </p><br/>
                                            <a href="#metadata" class="mo tooltipped right" data-position="bottom" data-delay="50" data-tooltip="Delete Document Type"><i class="material-icons tiny">delete</i></a>  
                                            <a href="#metadataedit" class="modal-trigger tooltipped right" data-position="bottom" data-delay="50" data-tooltip="Edit Meta Data"><i class="material-icons tiny">edit</i></a>  
                                            <a href="#metadata" class="modal-trigger right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Add Meta Data"><i class="material-icons tiny">add</i></a> 
                                        </figcaption>                                                
                                    </fieldset><br>
                                    <fieldset>
                                        <img src="assets/images/search_images/student id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                    <fieldset>
                                        <img src="assets/images/search_images/student id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                </div>
                                <div class="col s12 m6 l4">
                                    <fieldset>
                                        <img src="assets/images/search_images/village id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                    <fieldset>
                                        <img src="assets/images/search_images/village id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                    <fieldset>
                                        <img src="assets/images/search_images/nationall.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                </div>
                                <div class="col s12 m6 l4">
                                    <fieldset>
                                        <img src="assets/images/search_images/word id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                    <fieldset>
                                        <img src="assets/images/search_images/student id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                    <fieldset>
                                        <img src="assets/images/search_images/word id.png" class="materialboxed responsive-img" alt="">
                                        <figcaption><h5 class="flow-text">Acceptance Letter</h5>
                                            <p>
                                                Document ID:<span class="right">121922cm</span><br/>
                                                Document no.:<span class="right">12cm</span><br/>
                                                Date of Issue:<span class="right">121922cm</span>
                                            </p><br/>
                                            <a href="#metadata" class="modal-trigger right">Meta data</a>
                                        </figcaption> 
                                    </fieldset><br>
                                </div>
                                </section>
                            </div>
                            <!--floating button for adding a document-->
                            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 2px;">
                                <a href="#" class="btn-floating btn-large cyan tooltipped"  data-position="left" data-delay="50" data-tooltip="Add Document">
                                    <i class="large material-icons">add</i>
                                </a>
                                <ul>
                                    <li><a class="btn-floating cyan modal-trigger tooltipped" href="#" data-position="left" data-delay="50" data-tooltip="Trigger mobile"><i class="material-icons">camera_enhance</i></a></li>
                                    <li><a class="btn-floating cyan modal-trigger tooltipped" href="#addDoc" data-position="left" data-delay="50" data-tooltip="Browse document"><i class="material-icons">attach_file</i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--</div>-->                                    

                        <div id="metadata" class="modal modal-fixed-footer grey lighten-4">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">Add Meta Data</span><br>
                                        <div class="row">
                                            <form class="col s12">
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="first_name" type="text" class="validate">
                                                        <label for="first_name">Document ID</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate">
                                                        <label for="last_name">Document Number</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="disabled" type="text" class="validate">
                                                        <label for="disabled">Date Of Issue</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="password" type="password" class="validate" disabled="">
                                                        <label for="password">Issued By</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="email" type="email" class="validate" disabled="">
                                                        <label for="email">Country Of Issue</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="email" type="email" class="validate" disabled="">
                                                        <label for="email">Country Of Issue</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-close btn waves-effect waves-blue blue">Save</button>
                                <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
                            </div>
                        </div>
                        <div id="metadataedit" class="modal modal-fixed-footer grey lighten-4">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">Edit Meta Data</span><br>
                                        <div class="row">
                                            <form class="col s12">
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <text>Document ID</text>
                                                        <input id="first_name" type="text" class="validate" placeholder="121922cm">
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <text>Document Number</text>
                                                        <input id="last_name" type="text" class="validate" placeholder="12cm">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <text>Date Of Issue</text>
                                                        <input id="disabled" type="text" class="validate" placeholder="Jan-07-2011">
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <text>Issued By</text>
                                                        <input id="password" type="password" class="validate" disabled="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <text>Country Of Issue</text>
                                                        <input id="email" type="email" class="validate" disabled="">
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <text>Country Of Issue</text>
                                                        <input id="email" type="email" class="validate" disabled="">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-close btn waves-effect waves-blue blue">Update</button>
                                <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
                            </div>
                        </div>

                        <div id="addDoc" class="modal modal-fixed-footer grey lighten-4" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px;">
                            <div class="modal-content">
                                <div class="row s12">
                                    <div class="col m6">
                                        <div class="card" style="height: 150px">
                                            <div class="card-content">
                                                <div class="row" style="">
                                                    <input type='file' onchange="displayURL(this);" multiple="" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to Browse Image"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card" style="height: 150px">
                                            <div class="card-content">
                                                <div class="row" style="">
                                                    <a class="btn-floating cyan tooltipped" href="#modal4" data-position="right" data-delay="50" data-tooltip="Trigger mobile">
                                                        <i class="material-icons">camera_enhance</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <!--                                        <div class="card" style="height: 400px">
                                                                                    <div class="card-content">
                                                                                        <form>
                                                                                            <img id="blah" src="#" alt="Upload Document for Preview"/>
                                                                                            <script type="text/javascript">
                                                                                                $filename = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
                                                                                            </script>
                                                                                        </form>
                                                                                    </div></div>-->
                                        <?php //$model=new Organization; ?>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'enableAjaxValidation' => false,
                                            'htmlOptions' => array('class' => 'grid-form', 'enctype' => 'multipart/form-data'),
                                        ));
                                        ?>
                                        <fieldset>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label>Organization LOGO</label>
                                                    <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 90%; height: 160px;"></div>
                                                        <div align="center">
                                                            <a href="#" class="btn btn-warning-alt btn-xs fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            <span class="btn btn-info-alt btn-xs btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><?php //echo $form->fileField($model, 'uploadedFile');    ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <?php $this->endWidget(); ?>
                                    </div>
                                    <script type="text/javascript">
                                        function displayURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#blah')
                                                            .attr('src', e.target.result)
                                                            .width(350)
                                                            .height(350);
                                                };

                                                reader.readAsDataURL(input.files[0]);

                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-close btn waves-effect waves-blue blue">Save</button>
                                <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
                            </div>
                        </div>

                        <div id="ahistory" class="modal modal-fixed-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px;">
                            <form action="" method="">
                                <!--<form action="info_req.action" method="POST">-->
                                <div class="modal-content">
                                    <h5>More Address Information</h5>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row s12">
                                                <div class="col s12 m6">
                                                    <fieldset>
                                                        <legend>Previous Employement</legend>
                                                        <div>
                                                            <input type="checkbox" id="coding" name="interest" value="coding">
                                                            <label for="coding">Coding</label>
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" id="music" name="interest" value="music">
                                                            <label for="music">Music</label>
                                                        </div>
                                                        <input type="checkbox" id="minor1">
                                                        <label for="minor1">Minor1</label><br/>
                                                        <input type="checkbox" id="ind">
                                                        <label for="ind">Individual</label><br/>
                                                        <input type="checkbox" id="ind1">
                                                        <label for="ind1">Individual1</label><br/>
                                                        <input type="checkbox" id="bank">
                                                        <label for="bank">Bank</label><br/>
                                                        <input type="checkbox" id="bank1">
                                                        <label for="bank1">Bank1</label><br/>
                                                        <input type="checkbox" id="co">
                                                        <label for="co">Cooporate</label><br/>
                                                        <input type="checkbox" id="co1">
                                                        <label for="co1">Cooporate1</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col s12 m6">
                                                    <fieldset>
                                                        <legend>Previous Employement</legend>
                                                        <div>
                                                            <input type="checkbox" id="coding" name="interest" value="coding">
                                                            <label for="coding">Coding</label>
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" id="music" name="interest" value="music">
                                                            <label for="music">Music</label>
                                                        </div>
                                                    </fieldset>
                                                    <input type="checkbox" id="minor1">
                                                    <label for="minor1">Minor1</label><br/>
                                                    <input type="checkbox" id="ind">
                                                    <label for="ind">Individual</label><br/>
                                                    <input type="checkbox" id="ind1">
                                                    <label for="ind1">Individual1</label><br/>
                                                    <input type="checkbox" id="bank">
                                                    <label for="bank">Bank</label><br/>
                                                    <input type="checkbox" id="bank1">
                                                    <label for="bank1">Bank1</label><br/>
                                                    <input type="checkbox" id="co">
                                                    <label for="co">Cooporate</label><br/>
                                                    <input type="checkbox" id="co1">
                                                    <label for="co1">Cooporate1</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="modal-close btn waves-effect waves-blue blue">Close</button>
                                    <!--<a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>-->   
                                </div>
                            </form>
                        </div>
                        <div id="prospectlist" class="modal modal-fixed-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px;">
                            <form action="" method="">
                                <!--<form action="info_req.action" method="POST">-->
                                <div class="modal-content">
                                    <h5>More Address Information</h5>
                                    <div class="card">
                                        <div class="card-content">
                                            <table id="new_client_data" class="display responsive-table datatable-example">
                                                <thead>
                                                    <tr>
                                                        <th>Prospect Names</th>
                                                        <th>Prospect Number</th>                                            
                                                        <th>Type</th>
                                                        <th>Nature</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <tr>
                                                        <td><input type="radio" id="c1" name="prospect">
                                                            <label for="c1">Muhabura Patrick</label>
                                                        </td>
                                                        <td>291082</td>
                                                        <td>Legal Person</td>
                                                        <td>28-october-2013</td>
                                                    </tr>  
                                                    <tr>
                                                        <td><input type="radio" id="c2" name="prospect">
                                                            <label for="c2">Maria Gorett</label>
                                                        </td>
                                                        <td>291082</td>
                                                        <td>Natural Person</td>
                                                        <td>28-october-2013</td>
                                                    </tr>  
                                                    <tr>
                                                        <td><input type="radio" id="c3" name="prospect">
                                                            <label for="c3">Katula Eric</label>
                                                        </td>
                                                        <td>291082</td>
                                                        <td>Natural Person</td>
                                                        <td>28-october-2013</td>
                                                    </tr>  
                                                    <tr>
                                                        <td><input type="radio" id="c4" name="prospect">
                                                            <label for="c4">Tina Esther</label>
                                                        </td>
                                                        <td>291082</td>
                                                        <td>Natural Person</td>
                                                        <td>28-october-2013</td>
                                                    </tr>  
                                                    <tr>
                                                        <td><input type="radio" id="c5" name="prospect">
                                                            <label for="c5">Diamond Trust Bank</label>
                                                        </td>
                                                        <td>291082</td>
                                                        <td>Legal Person</td>
                                                        <td>28-october-2013</td>
                                                    </tr>  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="modal-close btn waves-effect waves-blue blue">Merge</button>
                                    <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>   
                                </div>
                            </form>
                        </div>

                    </div>
                    <!--added-->
                </div>
            </div>
        </div>
    </div>
</div>


<?php
//upload profile image
include_once 'modals/uploadImage.php';
//view profile images
include_once 'modals/images.php';

?>


<!--</br>
<span>OFAC <label class="green white-text">active</label></span> </br>
<span>OFAC <label class="red white-text">inactive</label></span>
</br>-->



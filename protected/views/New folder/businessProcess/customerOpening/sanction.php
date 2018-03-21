<?php
$panel_link = "businessProcess/customerOpening";
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
    
//    echo $santion_code;
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
<style>
        .scroll-box {
            overflow-y: scroll;
            height: 500px;
            padding: 1rem
        }
</style>
<!--Content-->
                    
                        
<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results"> 
                <div class="row">
                    
                    <div class="col s12 m4">
                        <ul class="collapsible popout collapsible-accordion white" data-collapsible="accordion">
                            <li class="active">
                                <div class="collapsible-header active">General Information</div>
                                <div class="collapsible-body" style="">
                                    <p>
                                        <span>Nature</span>:<span>Natural Person</span><br>
                                        <span>Customer Type</span>:<span>Minor</span><br>
                                        <span>Date Created</span>:<span>Jan-04-2016</span><br>
                                        <span>Branch</span>:<span>Kamuli</span><br>
                                        <span>Status</span>:<span>Supervised</span><br>
                                        <span>Gender</span>  : <span >Male</span><br>
                                        <span>Nationality</span>  : <span >Ugandan</span><br>
                                        <span>Date of Birth</span>  :<span>28-may-1973</span><br>
                                        <span>Place of Birth</span>  :<span>Mbale, Uganda</span><br>
                                        <span>Literacy Level</span>  :<span>PHD</span><br>
                                        <span>Marital Status</span>  :<span>Married</span><br>
                                        <span>Number of Dependents</span>  :<span>5</span><br>
                                        <span>Income Band</span>  :<span>Salary, $ ,50.000</span><br>
                                        <span>Industry</span>  :<span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Computer Programming"> 6201</span>
                                        <span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Information Aggregator">6311 ,</span><br><br>
                                    </p></div>
                            </li>
                            <li>
                                <div class="collapsible-header">Address</div>
                                <div class="collapsible-body" style="display: block;">
                                    <p>
                                        <span>Address Type</span>:<span class="right">Residential</span><br>
                                        <span>Ownership</span>:<span class="right">Owned</span><br>
                                        <span style="">Start Date</span>:<span class="right">Jan-01-2014</span><br>
                                        <span style="">End Date</span>:<span class="right">To Date</span><br><br>
                                        <span style="text-justify: inter-word; text-align: justify;">Room E42,Akamwesi Building,Plot 114,Bunyonyi Drive,
                                        Kyebando Central, Kawempe Division, Kampala, Uganda </span><br>
                                    </p></div>
                            </li>
                            <li>
                                <div class="collapsible-header">Occupation</div>
                                <div class="collapsible-body" style="">
                                    <p>
                                        <span>Title</span><span class="right" style="text-justify: inter-word; text-align: justify;">Software Development</span><br>
                                        <span>Description</span>:<span class="right" style="text-justify: inter-word; text-align: justify;">Concerned with organising, developing and maintaining developing and maintaining softwaredeveloping and maintaining software developing and maintaining softwaredeveloping and maintaining software
                                            software developing and maintaining software developing and maintaining software</span><br>
                                        <span>Employer</span>:<a href="" class="right tooltipped" data-position="right" data-delay="50" data-tooltip="Click To View Employer Details">Enovate Soft Ltd</a><br>
                                        <span>Engagement Type</span>:<span class="right">Contract</span><br>
                                        <span>Position</span>:<span class="right">Top</span><br>
                                        <span>City of Operation</span>:<span class="right">Kampala, Uganda</span><br>
                                        <span>Country of Operation</span>:<span class="right">Kampala, Uganda</span><br>
                                        <span>Start Date</span>:<span class="right">Nov-01-2016 To Date</span><br>
                                        <span>End Date</span>:<span class="right">To Date</span><br>
                                    </p></div>
                            </li>
                            <li>
                                <div class="collapsible-header">Relationship</div>
                                <div class="collapsible-body" style="">
                                    <p>
                                        <span>Wanderemah Esther, Brother, 657843</span><br>
                                        <span>Muhabura susazn, Brother, 768364</span><br>
                                        <span>Mwesigye John, Brother, 657843</span><br>
                                    </p></div>
                            </li>
                            <li>
                                <div class="collapsible-header">Education</div>
                                <div class="collapsible-body" style="">
                                    <p>
                                        <span>Institution(</span>:<span class="right" style="text-justify: inter-word; text-align: justify;">Makerere University University University University University University</span><br>
                                        <span>Place</span>:<span class="right">Kampala, Uganda</span><br>
                                        <span>Program</span>:<span class="right">Software Engineering</span><br>
                                        <span>Date Started</span>:<span class="right">Aug-22-2011</span><br>
                                        <span>Date Finished</span>:<span class="right">July-30-2017</span><br>
                                        <span>Profession</span>:<span class="right">Software Engineering</span><br>
                                        <span>Award</span>:<span class="right">Bachelors of Science In Software Engineering</span><br>
                                    </p></div>
                            </li>
                            <li>
                                <div class="collapsible-header">Contact</div>
                                <div class="collapsible-body" style="">
                                    <p>
                                        <span>P.O.Box </span>:<span class="right">369913 Kampala, Uganda</span><br>
                                        <span>Telephone Number</span>:<span class="right">0702841314, Uganda</span><br>
                                        <span>Email</span>:<span class="right">amoswelike@gmail.com</span><br>
                                    </p></div>
                            </li>
                        </ul>
                    </div>
                    <div id = "web" class="col s12 m8 18">
                        <div class="card">
                             <div class="card-content grey lighten-4">
                                Possible Marches
                            </div>
                            <div class="card-content scroll-box">
                            <div class="search-result">
                                <a href="#" class="search-result-title">United Nations List</a>
                                
                                <a class="search-result-link">85% Match</a>
                                <p class="search-result-description">
                                    <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                                    <span style="font-weight: bold;">Gender:</span> Male |
                                    <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                                    <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                                    <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                                    <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                                    <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                                </p>
                                <div class="right">
                                    <input type="radio" id="nmatch1" name="compare1" class="with-gap">
                                    <label for="nmatch1" >Not Match</label>
                                    <input type="radio" id="match2" name="compare1" class="with-gap">
                                    <label for="match2" ">Match</label>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="search-result">
                                <a href="#" class="search-result-title">DFAT List</a>
                                <a href="#" class="search-result-link">97% Match</a>
                                <p class="search-result-description">
                                    <span style="color: blue;">Name:</span> Joseph Kony | 
                                    <span style="color: blue;">Gender:</span> Male |
                                    <span style="color: blue;">Nationality:</span> Ugandan | 
                                    <span style="color: blue;">Date of Birth:</span> 1959 (EXACT); 1960 |
                                    <span style="color: blue;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                                    <span style="color: blue;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                                    <span style="color: blue;">Identities:</span> National Identification Number: 3520025509842-7
                                </p>
                            </div>
                            <div class="divider"></div>
                            <div class="search-result">
                                <a href="#" class="search-result-title">United Kingdom List 
                                <div class="right">
                                            <input type="radio" id="nmatch1" name="compare1" class="validate with-gap">
                                            <label for="nmatch1" >Not Match</label>
                                            <input type="radio" id="match2" name="compare1" class="validate with-gap">
                                            <label for="match2" ">Match</label>
                                    </div>
                                </a>
                                
                                <a class="search-result-link">68% Match</a>
                                <p class="search-result-description">
                                <tr><td><b>Name :</b></td> <td>Joseph Kony</td> </tr> </br>
                                    <tr><td><b>Gender :</b></td> <td>Male</td> </tr> </br>
                                    <tr><td><b>Nationality :</b></td> <td>Ugandan</td> </tr> </br>
                                    <tr><td><b>Date of Birth :</b></td> <td>1959 (EXACT); 1960</td> </tr> </br>
                                    <tr><td><b>Place of Birth :</b></td> <td>Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak</td> </tr> </br>
                                    <tr><td><b>Other Names :</b></td> <td>Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low)</td> </tr> </br>
                                    <tr><td><b>Identities :</b></td> <td>National Identification Number: 3520025509842-7</td> </tr> </br>
                                </p>
                            </div>
                            <div class="divider"></div>
                            <div class="search-result">
                                <a href="#" class="search-result-title">OFAC List</a>
                                <a href="#" class="search-result-link">97% Match</a>
                                 <p class="search-result-description">
                                 <tr><td><b class="blue-text">Name :</b></td> <td>Joseph Kony</td> </tr> </br>
                                    <tr><td><b class="blue-text">Gender :</b></td> <td>Male</td> </tr> </br>
                                    <tr><td><b class="blue-text">Nationality :</b></td> <td>Ugandan</td> </tr> </br>
                                    <tr><td><b class="blue-text">Date of Birth :</b></td> <td>1959 (EXACT); 1960</td> </tr> </br>
                                    <tr><td><b class="blue-text">Place of Birth :</b></td> <td>Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak</td> </tr> </br>
                                    <tr><td><b class="blue-text">Other Names :</b></td> <td>Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low)</td> </tr> </br>
                                    <tr><td><b class="blue-text">Identities :</b></td> <td>National Identification Number: 3520025509842-7</td> </tr> </br>
                                </p>
                            </div>        
                            <div class="divider"></div>
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
                            <div class="card-action">
                                2 days ago
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">  
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-content">
                            
                            </div>
                        </div>                         
                    </div> 
                    <div class="col s12 m9">
                        
                        
                        
                        </br>
                        <!--######################################-->
                        <div class="card">
                            <div class="card-content scrolling">
                                <?php 
                                    $criteria=new CDbCriteria();
                                    $count= AuditTrail::model()->count($criteria);
                                    $pages=new CPagination($count);
                                    
                                    // results per page
                                    $pages->pageSize=20;
                                    $pages->applyLimit($criteria);
                                    
                                    $models= AuditTrail::model()->findAll($criteria);
                                ?>
                                
                                <!--######-->
                                <?php foreach($models as $model): ?>
                                <!--// display a model--> <?php echo '#'.$model->id.'. '.$model->model.' - '.$model->action;?> </br>
<!--                                        <input type="radio" id="N<?php //echo $model->id;?>" name="compare" class="validate with-gap">
                                        <label for="N<?php //echo $model->id;?>" style="color:">Not Match</label>
                                        <input type="radio" id="M<?php //echo $model->id;?>" name="compare" class="validate with-gap">
                                        <label for="M<?php //echo $model->id;?>" style="">Match</label></div>-->
                                    </br>
                                <?php endforeach; ?>

                                <!--// display pagination-->
                                <?php //$this->widget('CLinkPager', array(
                                    //'pages' => $pages,
//                                    'firstPageLabel'=>" Home ",
//                                    'lastPageLabel'=>' Last ',
//                                    'prevPageLabel'=>' Previous page ',
//                                    'nextPageLabel'=>' next page ',
//                                    'maxButtonCount'=>10,
                                //)) 
                                ?>
                                
                                <!--<ul class="pagination">-->
                                    <!--<li class="disabled"><a hrpaginationef="#!"><i class="material-icons">chevron_left</i></a></li>-->
                                    <?php $this->widget('CLinkPager', array( 
                                    'pages' => $pages,
                                    'prevPageLabel'=>'<i class="material-icons">chevron_left</i>',
                                    'nextPageLabel'=>'<i class="material-icons">chevron_right</i>',
                                    'firstPageLabel'=>'',
                                    'lastPageLabel'=>'',
//                                     customize css   
                                    'previousPageCssClass'=>'waves-effect',
                                    'internalPageCssClass'=>'page waves-effect',
                                    'selectedPageCssClass'=>'active',
                                    'nextPageCssClass'=>'waves-effect',
//                                    'lastPageCssClass'=>'waves-effect',
                                    
//                                    $internalPageCssClass
//                                    'header'=>'My Text: ',
//                                     'class'=>'pagination',
                                    'htmlOptions' => array('class' => 'pagination'),
                                )) ?>
<!--                                    <li class="active"><a href="#!">1</a></li>
                                    <li class="waves-effect"><a href="#!">2</a></li>
                                    <li class="waves-effect"><a href="#!">3</a></li>
                                    <li class="waves-effect"><a href="#!">4</a></li>
                                    <li class="waves-effect"><a href="#!">5</a></li>
                                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>-->
                                <!--</ul>-->
                            </div>
                        </div> 
                        
                        
                        

                    </div>
                    <!--added-->
                </div>
                <!--#####################################-->
                <!--#####################################-->
                <!--#####################################-->
                
                
                <div class="row">  
                    <div class="col s12 m3">
                        <div class="card">
                             <div class="card-content">
                                <span style="font-size: 18px; font-family: monospace">General Information</span>
                                <div>
                                    <span>Nature</span>:<span>Natural Person</span><br>
                                    <span>Customer Type</span>:<span>Minor</span><br>
                                    <span>Date Created</span>:<span>Jan-04-2016</span><br>
                                    <span>Branch</span>:<span>Kamuli</span><br>
                                    <span>Status</span>:<span>Supervised</span><br>
                                    <span>Gender</span>  : <span >Male</span><br>
                                    <span>Nationality</span>  : <span >Ugandan</span><br>
                                    <span>Date of Birth</span>  :<span>28-may-1973</span><br>
                                    <span>Place of Birth</span>  :<span>Mbale, Uganda</span><br>
                                    <span>Literacy Level</span>  :<span>PHD</span><br>
                                    <span>Marital Status</span>  :<span>Married</span><br>
                                    <span>Number of Dependents</span>  :<span>5</span><br>
                                    <span>Income Band</span>  :<span>Salary, $ ,50.000</span><br>
                                    <span>Industry</span>  :<span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Computer Programming"> 6201</span>
                                    <span class="right tooltipped" data-position="top" data-delay="50" data-tooltip="Information Aggregator">6311 ,</span><br><br>
                                    <a href="#address" class="modal-trigger" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''">Address</a> |
                                    <a href="#occupation" class="modal-trigger" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''">Occupation</a> |
                                    <a href="#relation" class="modal-trigger" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''">Relationship</a><br>
                                    <a href="#education" class="modal-trigger" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''">Education</a> |
                                    <a href="#contact" class="modal-trigger" onmouseover="this.style.color = 'orange'" onmouseout="this.style.color = ''">Contact</a><br><br>
                                </div>
                            </div>
                        </div>                         
                    </div>   
                    <!--vertical tabs ends-->
                    <div class="col s12 m9">
                        
                        <div class="card">
                            <div class="card-content">
                                <div class="search-result">
                                    <span href="#" class="search-result-title" style="font-size: 16px;">United Nations List - 75% match</span>
                                    <p class="search-result-description">
                                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                                        <span style="font-weight: bold;">Gender:</span> Male |
                                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                                    </p>
                                    <div class="right">
                                        <input type="radio" id="nmatch" name="compare" class="validate with-gap">
                                        <label for="nmatch" style="color:">Not Match</label>
                                        <input type="radio" id="match" name="compare" class="validate with-gap">
                                        <label for="match" style="">Match</label></div>
                                </div><hr width="100%" size="1"><br>
                                <div class="search-result">
                                    <span href="#" class="search-result-title" style="font-size: 16px;">United Nations List - 75% match</span>
                                    <p class="search-result-description">
                                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                                        <span style="font-weight: bold;">Gender:</span> Male |
                                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                                    </p>
                                    <div class="right">
                                        <input type="radio" id="nmatch" name="compare" class="validate with-gap">
                                        <label for="nmatch" style="color:">Not Match</label>
                                        <input type="radio" id="match" name="compare" class="validate with-gap">
                                        <label for="match" style="">Match</label></div>
                                </div><hr width="100%" size="1"><br>
                                <div class="search-result">
                                    <span href="#" class="search-result-title" style="font-size: 16px;">United Nations List - 75% match</span>
                                    <p class="search-result-description">
                                        <span style="font-weight: bold;">Name:</span> Joseph Kony | 
                                        <span style="font-weight: bold;">Gender:</span> Male |
                                        <span style="font-weight: bold;">Nationality:</span> Ugandan | 
                                        <span style="font-weight: bold;">Date of Birth:</span> 1959 (EXACT); 1960 |
                                        <span style="font-weight: bold;">Place of Birth:</span> Palaro Village, Palaro Parish, Omoro County, Gulu District Uganda; Odek, Omoro, Gulu Uganda; Atyak |
                                        <span style="font-weight: bold;">Other Names:</span> Kony (Good); Joseph Rao Kony (Good); Josef Kony (Good); Le Messie sanglant (Low) |
                                        <span style="font-weight: bold;">Identities:</span> National Identification Number: 3520025509842-7
                                    </p>
                                    <div class="right">
                                        <input type="radio" id="nmatch" name="compare" class="validate with-gap">
                                        <label for="nmatch" style="color:">Not Match</label>
                                        <input type="radio" id="match" name="compare" class="validate with-gap">
                                        <label for="match" style="">Match</label></div>
                                </div><hr width="100%" size="1"><br>
                                
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
                    <!--added-->
                </div>
                
                
                
                <!--#####################################-->
            </div>
        </div>
    </div>
</div>


<?php
//upload profile image
//include_once 'modals/uploadImage.php';
//view profile images
include_once 'modals/sanctionmodals.php';

?>


<!--</br>
<span>OFAC <label class="green white-text">active</label></span> </br>
<span>OFAC <label class="red white-text">inactive</label></span>
</br>-->



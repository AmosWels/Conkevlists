<?php
$panel_link = "settings/panel";
?>
<?php
//$user = Yii::app()->user->userid;
//
//$documenttypes = TDocumentType::model()->findAll("status = 'D' AND maker = '$user'");
//$metadatas = TMetadata::model()->findAll("status='A'");
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
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=<?php echo $panel_link; ?>">Settings</a> &raquo; 
                                        <span>Questionnaire</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(<?php echo 0; //count($documenttypes); ?>)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox<span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved<span>&nbsp;&nbsp;&nbsp;(_)</span></a></li>
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
                    <div class="fixed-action-btn" style="bottom: 15px; right: 24px;">
                        <a href="#question" class="btn-floating btn-large darken-1waves-effectwaves-effect modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Create Questionnaire">
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>

                    <div class="row s12">
                        <div class="col s12 m6">
                            <div class="card z-depth-0 transparent">
                                <div class="card-content">
                                    <div class="tabs-vertical">
                                        <ul class="tabs z-depth-0 transparent">
                                            <li class="tab">
                                                <a class="active" href="#na" style="font-weight: normal;">What is your country of origin and state your the real recognized name of your country?</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#na1" style="font-weight: normal;">What is your Actual address?</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#na2" style="font-weight: normal;">What is your Actual address?</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#ge" style="font-weight: normal;">What is your Actual address?</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#cog" style="font-weight: normal;">What is your Actual address?</a> 
                                            </li>
                                            <li class="tab">
                                                <a href="#poo" style="font-weight: normal;">What is your Actual address?</a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6"> 
                            <div id="na" class="card">                            
                                <div class="card-content">
                                    <div class="right">
                                        <a href="#editqn" class="modal-trigger"><text>Edit Question</text></a>  
                                        / <a href="#options" class="modal-trigger"><text>Add Option</text></a>
                                    </div>
                                    <span style="font-size: 16px; color: lightgrey">Answering Options</span>
                                    <ol>
                                        <li>Farmer<a href="#editoption" class=" modal-trigger"><i class="material-icons tiny right">edit</i></a><a class="waves-effect waves-light sweetalert-warning right">Delete</a></li>
                                        <li>Shopper<i class="material-icons tiny right">edit</i><a class="waves-effect waves-light sweetalert-warning right">Delete</a>
                                        <li>Cutter<i class="material-icons tiny right">edit</i><a class="waves-effect waves-light sweetalert-warning right">Delete</a>
                                        <li>Eater<i class="material-icons tiny right">edit</i><a class="waves-effect waves-light sweetalert-warning right">Delete</a>
                                    </ol>
                                    <div class="divider"></div>
                                    <div class="right-align">
                                        <a type="#"href="#modal3" class="waves-effect waves-grey btn-flat sweetalert modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete Question"><i class="close material-icons large" style="color: #37474f;">delete</i></a>
                                        <a href="#" class="waves-effect waves-blue btn-flat ">Submit</a> 
                                    </div>
                                </div>
                            </div>
                            <div id="na1" class="card">                            
                                <div class="card-content">
                                    <div class="right"><a href="#"><text>Edit Question</text></a>  
                                        / <a href="#" class=""><text>Add Option</text></a>
                                    </div>
                                    <span style="font-size: 16px; color: lightgrey">Answering Options</span>
                                    <ol>
                                        <li>Farmer<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Shopper<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Cutter<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                    </ol>
                                    <div class="divider"></div>
                                    <div class="right-align">
                                        <a type="#" class="waves-effect waves-grey btn-flat sweetalert-basic"><i class="close material-icons large" style="color: #37474f;">delete</i></a>
                                        <a href="#" class="waves-effect waves-blue btn blue">Submit</a> 
                                    </div>
                                </div>
                            </div>
                            <div id="na2" class="card">                            
                                <div class="card-content">
                                    <div class="right"><a href="#"><text>Edit Question</text></a>  
                                        / <a href="#" class=""><text>Add Option</text></a>
                                    </div>
                                    <span style="font-size: 16px; color: lightgrey">Answering Options</span>
                                    <ol>
                                        <li>Farmer<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Shopper<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Cutter<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                        <li>Eater<i class="material-icons tiny right">edit</i><i class="material-icons tiny right">delete</i></li>
                                    </ol>
                                    <div class="divider"></div>
                                    <div class="right-align">
                                        <a type="#" class="waves-effect waves-grey btn-flat sweetalert-basic"><i class="close material-icons large" style="color: #37474f;">delete</i></a>
                                        <a href="#" class="waves-effect waves-blue btn blue">Submit</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="inbox">
                    <div class="card">
                        <div class="card-content">
                            <h2>inbox here</h2>
                        </div>
                    </div>
                </div>

                <div id="approved">
                    <div class="card">
                        <div class="card-content">
                            <h2>approved here</h2>
                        </div>
                    </div>
                </div>

                <!--set option setting-->
                <div id="options" class="modal modal-footerfooter" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 395.652px;">
                    <div class="modal-content">
                        <h5>Enter Question Option</h5>
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <div>
                                        <input id="new_question" type="text" class="add-task" placeholder="Enter Option">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="modal-footer">
                            <button type="#" class="waves-effect waves-light btn cyan darken-1">Save</button>
                            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                        </div>  
                    </div>
                </div>
                <!--set question setting-->
                <div id="question" class="modal modal-fixed-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 395.652px;">
                    <div class="modal-content">
                        <h5>Add the Question</h5>
                        <div class='row s12'>
                            <div class="col s12 m6">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="input-field col s12">
                                            <input type="text" id="ques" placeholder="Enter Question"/>
                                        </div>
                                        <div>
                                            <p>
                                                <span>Select the Question Type</span>
                                            </p>
                                            <input type="radio" name="qntype" id="textfield" />
                                            <label for="textfield">Unstructured Question</label>
                                            <input type="radio" name="qntype" id="one" />
                                            <label for="one">Structured Question with one Answer</label><br/>
                                            <input type="radio" name="qntype" id="multiple" />
                                            <label for="multiple">Structured Question with multiple Answers</label><br/>
                                        </div>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <span>Select Business Process</span><br/>
                                <input type="checkbox" id="naa"/>
                                <label for="naa">New Accounts</label><br/>
                                <input type="checkbox" id="nc">
                                <label for="nc">New Customer</label><br/>
                                <input type="checkbox" id="ct">
                                <label for="ct">Credit Transaction</label><br/>
                                <input type="checkbox" id="db">
                                <label for="db">Debit Transaction</label><br/>
                                <input type="checkbox" id="ii">
                                <label for="ii">Investigation</label><br/>
                                <input type="checkbox" id="i1">
                                <label for="i1">Investigation1</label><br/>
                                <input type="checkbox" id="i2">
                                <label for="i2">Investigation2</label><br/>
                                <input type="checkbox" id="i3">
                                <label for="i3">Investigation3</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="modal-footer">
                            <button type="#" class="waves-effect waves-light btn cyan darken-1">Save</button>
                            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                        </div>  
                    </div>
                </div>  

                <!--question edit-->
                <!--set question setting-->
                <div id="editqn" class="modal modal-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 395.652px;">
                    <div class="modal-content">
                        <h5>Edit the Question</h5>
                        <div class='row s12'>
                            <div class="input-field col s12 m6">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="col s12">
                                            <input type="text" id="ques" placeholder="what is you actual address"/>
                                        </div>
                                        <div>
                                            <p>
                                                <span>Select the Question Type</span>
                                            </p>
                                            <input type="radio" name="qnedt" id="textfieldedt" />
                                            <label for="textfieldedt">Unstructured Question</label>
                                            <input type="radio" name="qnedt" id="onedt" checked="checked" />
                                            <label for="onedt">Structured Question with one Answer</label><br/>
                                            <input type="radio" name="qnedt" id="multipledt" />
                                            <label for="multipledt">Structured Question with multiple Answers</label><br/>
                                        </div>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <span>Select Business Process</span><br/>
                                <input type="checkbox" id="naas"/>
                                <label for="naas">New Accounts</label><br/>
                                <input type="checkbox" id="ncr" checked="checked">
                                <label for="ncr">New Customer</label><br/>
                                <input type="checkbox" id="ctt">
                                <label for="ctt">Credit Transaction</label><br/>
                                <input type="checkbox" id="dbn" checked="checked">
                                <label for="dbn">Debit Transaction</label><br/>
                                <input type="checkbox" id="iin">
                                <label for="iin">Investigation</label><br/>
                                <input type="checkbox" id="i1n" checked="checked">
                                <label for="i1n">Investigation1</label><br/>
                                <input type="checkbox" id="i2n">
                                <label for="i2n">Investigation2</label><br/>
                                <input type="checkbox" id="in3">
                                <label for="in3">Investigation3</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="modal-footer">
                            <button type="#" class="waves-effect waves-light btn cyan darken-1">Update</button>
                            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                        </div>  
                    </div>
                </div> 

                <div id="editoption" class="modal modal-footer" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 395.652px;">
                    <div class="modal-content">
                        <h5>Edit option</h5>
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <!--<div class="input-field col s12">-->
                                    <div class="col s12">
                                        <input id="new_question" type="text" class="add-task" placeholder="Farmer">
                                        <!--<label for="new_question">Change Option</label>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="modal-footer">
                            <button type="#" class="modal-action modal-close waves-effect waves-blue btn blue">Update</button>
                            <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                        </div>  
                    </div>
                </div>  

                <div id="modal3" class="modal bottom-sheet" style="z-index: 1003; display: block; opacity: 0; bottom: -100%;">
                    <div class="modal-content">
                        <h2 style="color: red;">Are You sure u want to delete?</h2>
                    </div>
                    <div class="modal-footer">
                        <a type="#" class="modal-action modal-close waves-effect waves-blue btn-flat">Yes</a>
                        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat">NO</a>
                    </div> 
                </div>

            </div>
        </div>
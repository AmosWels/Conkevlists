<?php
//$code = new Encryption;
$clienttype_link = "settings/clientType";
//$settings_encrypt = $code->encode($settings_link);
?>
<?php
//$code = new Encryption;
$settings_link = "settings/panel";
//$settings_encrypt = $code->encode($settings_link);
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
                                        <span>Document Types</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <!--<h5 style="font-size: 20px"><span> Draft</span></h5>-->
                                    <li class="tab col s3"><a href="#approved">Draft<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Inbox<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
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

                <div id="info">
                    <div class="fixed-action-btn" style="bottom: 15px; right: 24px;">
                        <a href="#accopendocs" class="btn-floating btn-large darken-1waves-effectwaves-effect modal-trigger tooltipped"  data-position="left" data-delay="50" data-tooltip="Create Document Type" >
                            <i class="large material-icons">mode_edit</i>
                        </a>
                    </div>

                    <!--<div class="row">-->
   <!--                    <table id='quest'>
                           <thead>
                           <th>Document Type</th>
                           <th>Date Created</th>
                           <th>Created By</th>
                       </thead>
                           <tfoot></tfoot>
                           <tbody>
                               <tr>
                                   <td>Passport</td>
                                   <td>23/March/2017</td>
                                   <td>Esther</td>
                               </tr>
                               <tr>
                                   <td>Driving Permit</td>
                                   <td>23/March/2017</td>
                                   <td>Mwanje</td>
                               </tr>
                               <tr>
                                    <td>National ID</td>
                                   <td>23/March/2017</td>
                                   <td>Mwanje</td>
                               </tr>
                               <tr>
                                    <td>Birth Certificate</td>
                                   <td>23/March/2017</td>
                                   <td>Mwanje</td>
                               </tr>
                               <tr>
                                    <td>Trading License</td>
                                   <td>23/March/2017</td>
                                   <td>Esther</td>
                               </tr>
                               <tr>
                                    <td>Certificate Of incorporation</td>
                                   <td>23/March/2017</td>
                                   <td>Esther</td>
                               </tr>
                               <tr>
                                    <td>lC letter</td>
                                   <td>23/March/2017</td>
                                   <td>Esther</td>
                               </tr>
                           </tbody>
                       </table>-->

                    <div class="row s12">
                        <div class="col s12 m3">
                            <div class="card stats-card">
                                <div class="card-content">
                                    <span  style="font-size: 16px;">Permit</span><br/>
                                    <a href="#accopendocs_edit" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Edit</span></a> /
                                    <a href="#question" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Delete</span></a>
                                    <a href="#" class="waves-effect waves-blue btn-flat right">Submit</a>   
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card stats-card">
                                <div class="card-content">
                                    <span  style="font-size: 16px;">Permit</span><br/>
                                    <a href="#accopendocs_edit" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Edit</span></a> /
                                    <a href="#question" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Delete</span></a>
                                    <a href="#" class="waves-effect waves-blue btn-flat right">Submit</a>   
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card stats-card">
                                <div class="card-content">
                                    <span  style="font-size: 16px;">Permit</span><br/>
                                    <a href="#accopendocs_edit" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Edit</span></a> /
                                    <a href="#question" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Delete</span></a>
                                    <a href="#" class="waves-effect waves-blue btn-flat right">Submit</a>   
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card stats-card">
                                <div class="card-content">
                                    <span  style="font-size: 16px;">Permit</span><br/>
                                    <a href="#accopendocs_edit" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Edit</span></a> 
                                    <a href="#question" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Add / View / Edit"><span>Delete</span></a>
                                    <a href="#" class="waves-effect waves-blue btn-flat right">Submit</a>   
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!--</div>-->

                    <!--Selecting account opening documents-->
                    <div id="accopendocs" class="modal modal-footer">
                        <div class="modal-content">
                            <h5>Add Document Type</h5>
                            <div class='row s12'>
                                <div class="col s12 m6">
                                    <div class="card">
                                        <div class="card-content">
                                            <div>
                                                <input type="text" id="ques" placeholder="Enter Document Name"/>
                                                <!--<label for="ques">Enter Document</label>-->
                                            </div>
                                            <div>
                                                <input type="text" id="ques" placeholder="Enter Document code"/>
                                                <!--<label for="ques"></label>-->
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 right">
                                    <span>Select Required Meta Data</span><br/>
                                    <input type="checkbox" id="di"/>
                                    <label for="di">Document Id</label><br/>
                                    <input type="checkbox" id="dn">
                                    <label for="dn">Document Number</label><br/>
                                    <input type="checkbox" id="doi">
                                    <label for="doi">Date of Issue</label><br/>
                                    <input type="checkbox" id="doe">
                                    <label for="doe">Date of Expiry</label><br/>
                                    <input type="checkbox" id="ib">
                                    <label for="ib">Issued By</label><br/>
                                    <input type="checkbox" id="coi">
                                    <label for="coi">Issuer Category</label><br/>
                                    <input type="checkbox" id="bc">
                                    <label for="bc">Bar Code</label><br/>
                                    <input type="checkbox" id="coi">
                                    <label for="coi">Country of Issue</label><br/>
                                    <input type="checkbox" id="mc">
                                    <label for="mc">Machine Code</label>
                                </div>
                            </div>                               
                        </div>
                        <div class="form-group"> 
                            <div class="modal-footer">
                                <button type="" class="modal-action modal-close waves-effect waves-blue btn blue ">Save</button>
                                <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                            </div>
                        </div>       
                    </div> 
                    <div id="accopendocs_edit" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h5>Edit Document Type</h5>
                            <div class='row s12'>
                                <div class="col s12 m6">
                                    <div class="card">
                                        <div class="card-content">
                                            <div>
                                                <input type="text" id="ques" placeholder="Enter Document Name"/>
                                            </div>
                                            <div>
                                                <input type="text" id="ques" placeholder="Enter Document code"/>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 ">
                                    <span>Select Required Meta Data</span><br/>
                                    <input type="checkbox" id="di"/>
                                    <label for="di">Document Id</label><br/>
                                    <input type="checkbox" id="dn">
                                    <label for="dn">Document Number</label><br/>
                                    <input type="checkbox" id="doi">
                                    <label for="doi">Date of Issue</label><br/>
                                    <input type="checkbox" id="doe">
                                    <label for="doe">Date of Expiry</label><br/>
                                    <input type="checkbox" id="ib">
                                    <label for="ib">Issued By</label><br/>
                                    <input type="checkbox" id="coi">
                                    <label for="coi">Issuer Category</label><br/>
                                    <input type="checkbox" id="bc"/>
                                    <label for="bc">Bar Code</label><br/>
                                    <input type="checkbox" id="coi"/>
                                    <label for="coi">Country of Issue</label><br/>
                                    <input type="checkbox" id="mc"/>
                                    <label for="mc">Machine Code</label>
                                </div>
                            </div>                               
                        </div>
                        <div class="form-group"> 
                            <div class="modal-footer">
                                <button type="" class="modal-action modal-close waves-effect waves-blue btn blue ">Save</button>
                                <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
                            </div>
                        </div>       
                    </div> 
                </div>
            </div>
        </div>
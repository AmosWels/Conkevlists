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
                                        <span>New Customers >> Mwesigye</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m1 16">                                
                                <h5>758654</h5>
                            </div>
                            <div class="col s12 m11 16">                                
                                <h5><span style="font-family: monospace">Muhabura Patrick Muhabura Patrick</span></h5>
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
                            <div class="card-content">
                                <div class="center-align search-image-results">
                                    <img src="assets/images/profile-image-1.png" class="responsive-img circle center"  alt="" style="width: 60%">
                                    <br>
                                    <div>
                                    <a href="#profileimg" class="modal-trigger btn-flat">Add Image</a>
                                    <a href="#" class="btn-flat">Mobile</a>
                                    </div>
                                </div>
                                <br/>
                                <div>
                                    <span  style="font-size: 13px">Customer Type</span>:<span class="right">Minor</span><br/>
                                    <span  style="font-size: 13px">Date Opened</span>:<span class="right">Jan-04-2016</span><br/>
                                    <span  style="font-size: 13px">Branch</span>:<span class="right">Kamuli</span><br/>
                                    <span  style="font-size: 13px">Status</span>:<span class="right">Supervised</span><br/>
                                </div>
                                <br/>
                            </div>
                        </div>
                        <!--client static data ends-->
                        <div class="card z-depth-0">
                            <div class="card-content">
                                <div class="tabs-vertical">
                                    <ul class="tabs transparent z-depth-0">                                      
                                        <li class="tab">
                                            <a href="#additional">Additional Data</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#doc">Documents</a> 
                                        </li>
                                        <li class="tab">
                                            <a href="#sanction">Risk Assessment</a> 
                                        </li>
                                    </ul>
                                </div>  
                            </div>  
                        </div>  
                    </div>   
                    <!--vertical tabs ends-->
                    <div class="col s12 m9">
                        <!--Start of external data tab-->
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
                        <div id="profileimg" class="modal modal-fixed-footer grey lighten-4" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 440.87px;  height: 450px; width: 450px;">
                            <div class="modal-content">
                                <!--<div class="row s12">-->
                                        <!--<div class="card center-align" style="height: 350px; width: 350px;">-->
                                            <!--<div class="card-content">-->
                                            <div class="row" style="">
                                                <input type='file' onchange="readURL(this);" name="Browse" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to Browse Image"/>
                                                </div>
                                                <form>
                                                    <img id="blah"/>
                                                    <!--<img id="blah" src="#" alt="Upload Image for Preview"/>-->
                                                    <script type="text/javascript">
                                                        $filename = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
                                                    </script>
                                                </form>
                                            <!--</div>-->
<!--                                        </div>-->
                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#blah')
                                                            .attr('src', e.target.result)
                                                            .width(300)
                                                            .height(300);
                                                };

                                                reader.readAsDataURL(input.files[0]);

                                            }
                                        }
                                    </script>
                                <!--</div>-->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-close btn waves-effect waves-blue blue">Save</button>
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
		   <?php $form=$this->beginWidget('CActiveForm', array(
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('class' => 'grid-form','enctype' => 'multipart/form-data'),
			)); ?>
                                    <fieldset>
                                        <div data-row-span="1">
                                            <div data-field-span="1">
                                                <label>Organization LOGO</label>
                                                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 90%; height: 160px;"></div>
                                                    <div align="center">
                                                        <a href="#" class="btn btn-warning-alt btn-xs fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        <span class="btn btn-info-alt btn-xs btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><?php //echo $form->fileField($model, 'uploadedFile'); ?> </span>
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

                    </div>
                    <!--added-->
                </div>
            </div>
        </div>
    </div>

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
                                        <span class="black-text">Analytics</span> &sol;
                                        <span>Panel</span>  <?php echo Yii::getVersion(); ?>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
<!--                                    <li class="tab col s3"><a href="#draft">Draft<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved<span>&nbsp;&nbsp;&nbsp;(2)</span></a></li>-->
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
                    <div class="row s12">
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=analytics/politicalAssignment"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                                <div class="card">
                                    <div class="card-content" >
                                        <span>Political Assignment</span><i class="material-icons right">account_box</i><br><br>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;" href="#"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                                <div class="card">
                                    <div class="card-content" >
                                        <span>Political Affiliations</span><i class="material-icons right">device_hub</i><br><br>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;"  href="#"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                                <div class="card">
                                    <div class="card-content" >
                                        <span>Adverse Media <small>(Positions)</small></span><i class="material-icons right">web</i><br><br>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row s12">
                        <div class="col m4">
                            <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=analytics/apitest/api"
                               onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                                <div class="card">
                                    <div class="card-content" >
                                        <span>API Test</span><i class="material-icons right">warning</i><br><br>
                                    </div>
                                </div>
                            </a>
                        </div>
<!--                                                <div class="col m4">
                                                    <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/people"
                                                       onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                                                    <div class="card">
                                                        <div class="card-content" >
                                                            <span>People</span><i class="material-icons right">people</i><br><br>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>-->
                        <!--                        <div class="col m4">
                                                    <a style="font-size: 24px; font: small-caption; font-size: large; font-weight: 400; color: black;"  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/politicalassignment"
                                                       onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = 'black';">
                                                    <div class="card">
                                                        <div class="card-content" >
                                                            <span>Political Assignments <small>(Positions)</small></span><i class="material-icons right">directions</i><br><br>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>-->
                    </div>
                    <div class="card" style="height: 1000px;">
                        <div class="card-content" >
                            <div class="row m12">
                                <div class="col m6">
                                    <div class="field_wrapper row m8">
                                        <div class="input-field col m7">
                                            <input type="text" name="field_name[]" value="" id="name"  placeholder="...">
                                            <label for="name" class="active">Enter Name</label>
                                        </div>
                                        <div class="col m1">
                                            <a href="javascript:void(0);" class="add_button" title="Add field"><i class="material-icons add_button" style="color: red;">add_circle</i></a>
                                        </div>
                                    </div>
                                </div>
                            <div class="col s12 right">
                                <!--<a href="#" class="waves-effect waves-blue btn-flat ">Cancel</a>-->
                                <button type="submit" class="waves-effect waves-red btn grey">Submit</button>
                                <!--<button type="submit" class="waves-effect waves-blue btn blue ">Save</button>-->
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
                                   $(document).ready(function () {
                                       var maxField = 10; //Input fields increment limitation
                                       var addButton = $('.add_button'); //Add button selector
                                       var wrapper = $('.field_wrapper'); //Input field wrapper
//    var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></div>'; //New input field html 
                                       var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"  title="Remove field"><i class="material-icons remove_button" style="color: red;">remove_circle</i></a></div>'; //New input field html 
                                       var x = 1; //Initial field counter is 1
                                       $(addButton).click(function () { //Once add button is clicked
                                           if (x < maxField) { //Check maximum number of input fields
                                               x++; //Increment field counter
                                               $(wrapper).append(fieldHTML); // Add field html
                                           }
                                       });
                                       $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                                           e.preventDefault();
                                           $(this).parent('div').remove(); //Remove field html
                                           x--; //Decrement field counter
                                       });
                                   });
</script>
<script type="text/javascript">
    document.onmousedown = disableRightclick;
    var message = "This page says hi, and that Right click is not allowed !!";
    function disableRightclick(evt) {
        if (evt.button == 2) {
            alert(message);
            return false;
        }
    }
</script>
<?php
//include_once 'Modal/modallists/ListStatus.php';
//?>
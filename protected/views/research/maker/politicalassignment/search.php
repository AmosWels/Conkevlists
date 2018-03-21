<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$results = $model[0];
$resultcount = count($results);
$searched = $model[1];
$searchnames = TSearchname::model()->findAll("status='A'");
$organs = TOrganization::model()->findAll("status = 'A'");

if($searched==NULL){
    $organname = 'Choose. . .';
}else{
    $organ = $model[2];
    $organvalue = TOrganization::model()->findByPk($organ);
    $organname = $organvalue->name;
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
                                        <span class="black-text">Research</span> &sol;
                                        <?php echo CHtml::link('Maker', array('research/maker/panel')); ?> &sol;
                                        <?php echo CHtml::link('Positions', array('research/maker/politicalassignment')); ?> &sol;
                                        <span>Search Page</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 l6">                                
                                <ul class="tabs">
                                    <li class="tab col s6"></li>
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
                <div class="card z-depth-0">
                    <div class="card-content">
                        <p>Select organisation to search position from </p>
                        <div class="row s12">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'add-form',
                                'enableAjaxValidation' => false,
                            ));
                            ?>

                            <div class="col s6 input-field">
                                <select name="organ_search" required="required">    
                                    <option value="" disabled selected><?php echo $organname; ?></option>
                                    <?php
                                    if (!empty($organs)) {

                                        foreach ($organs as $record) {
                                            ?>
                                            <option value="<?php echo $record->id; ?>"><?php echo $record->name; ?></option>
                                        <?php }
                                    } ?>
                                </select>                
                                <label>Organization <span class="red-text">*</span></label>
                            </div>

                            <div class="col s6 input-field">
                                <input type="text" name="query" required="required" id="record" placeholder="....." value="<?php echo $searched; ?>"><br>
                                <label for="record" class="active">Enter Position Name <span class="red-text">*</span></label><br>
                                <button type="submit" class="waves-effect waves-blue btn-flat right">Search</button>
                                <!--<input type="submit" value="Search" class="waves-effect waves-blue btn blue right"/>-->
                            </div>
<?php $this->endWidget(); ?>
                        </div>

                        <div class="row s12">
                            <p>Results <code class="black-text grey lighten-5" style="margin-left: 200px;"><?php echo $resultcount; ?> Possible Matches</code></p>
                            <div class="col s12 input-field">
                                <?php
                                $min_length = 2;

                                if (strlen($searched) > $min_length) {
                                    if ($results != '') {
                                        foreach ($results as $record) {
//                                            organisation name
                                            $Orgid = $record->organization;
                                            $orgvalue = TOrganization::model()->findByPk($Orgid);
                                            $orgname = $orgvalue->name;
//                                            level name
                                            $Lid = $record->level;
                                            $Lvalue = TPersonpositionslevel::model()->findByPk($Lid);
                                            $Lname = $Lvalue->name;
//                                            weight name
                                            $Wid = $record->weight;
                                            $Wvalue = TPersonpositionsweight::model()->findByPk($Wid);
                                            $Wname = $Wvalue->name;
                                            ?>
                                            <span class="row s12">
                                                <div class="col s4"><span>Name</span> &rtrif; <span class="black-text"><?php echo $record->name; ?></span></div>
                                                <div class="col s4"><span>Weight</span> &rtrif; <span class="black-text"><?php echo $Wname; ?></span></div>
                                                <div class="col s2"><span>Level</span> &rtrif; <span class="black-text"><?php echo $Lname; ?></span></div>
                                                <div class="col s2"><span>Start Date</span> &rtrif; <span class="black-text"><?php echo $record->start_date; ?></span></div>
                                            </span>
                                            <hr style="border-color: black; border-style: dotted; border-width: 0.5px 0; margin: 0px 0; margin-top: 5px;">
                                            <?php
                                        }
                                        ?>

                                        <br><br>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'add-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <div class="row s12" style="margin-left: 900px;" >
                                            <input type="hidden" name="newname" value="<?php echo $searched; ?>">
                                            <?php
                                            foreach ($searchnames as $name) {
                                                $b = 1;
                                                ?>
                                                <div class="col s6">
                                                    <input type="radio" id="<?php echo $name->id . 'result' . $b; ?>" onchange="this.form.submit();" name="result" class="with-gap" value="<?php echo $name->id; ?>">
                                                    <label for="<?php echo $name->id . 'result' . $b; ?>"> <?php echo $name->name; ?></label>
                                                </div>
                                                <?php
                                                $b++;
                                            }
                                            ?>
                                        </div>
                                    </div>
<!--                                    <div class="right">
                                        <button type="submit" class=" waves-effect waves-blue btn-flat lighten-4">Submit</button>
                                    </div>-->
                                    <?php $this->endWidget(); ?>

                                <?php } else {
                                    ?>
                                    <label class="black-text" >No results! Enter <code>name</code> to Display Possible Matches</label>
                                <?php } ?>
<?php } else { ?>
                                <br><br>
                                <label class="red-text" style="font-size: 14px; font-family: inherit;">Minimum length of characters for search is 2</label>
<?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//add Person
//search Person
//include_once 'modals/searchPerson.php';
?>

    <?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$code = new Encryption;
$newpeople = TPersonpositions::model()->findAll("status = 'N'");
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
                                        <?php echo CHtml::link('Panel', array('dataEntry/Entrant/panel')); ?> &sol;
                                        <span>People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($newpeople); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                    <?php
                    
                        ?>
                        <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Organisation</th>
                                        <th>Level</th>
                                        <th>Weight</th>
                                        <th>start date</th>
                                    </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($newpeople)) {
                                        foreach ($newpeople as $newperson) {
//                                            organisation name
                                            $Orgid = $newperson->organization;
                                            $orgvalue = TOrganization::model()->findByPk($Orgid);
                                            $orgname = $orgvalue->name;
//                                            level name
                                            $Lid = $newperson->level;
                                            $Lvalue = TPersonpositionslevel::model()->findByPk($Lid);;
                                            $Lname = $Lvalue->name;
//                                            weight name
                                            $Wid = $newperson->weight;
                                            $Wvalue = TPersonpositionsweight::model()->findByPk($Wid);;
                                            $Wname = $Wvalue->name;
                                            ?>                                                                                                           
                                            <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/Entrant/politicalassignment/view&id=<?php echo $code->encode($newperson->id); ?>'">
                                                <td><?php echo $newperson->name; ?></td>
                                                <td><?php echo $orgname; ?></td>
                                                <td><?php echo $Lname; ?></td>
                                                <td><?php echo $Wname; ?></td>
                                                <td><?php echo $newperson->start_date; ?></td>
                                            </tr>
                                            <?php
                                        } }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 

                <!--###############################-->

                <div id="inbox">
                    <h3>Pending ...</h3>
                </div>                
                <div id="sugestedpips">
                    <h3>Suggested Positions ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>


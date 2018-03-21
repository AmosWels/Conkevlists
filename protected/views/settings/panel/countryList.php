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
                                        <span class="black-text">Settings</span> &sol;
                                         <?php echo CHtml::link('Panel', array('settings/panel')); ?> &sol;
                                        <span>Country List</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16 search-stats">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">List of Countries</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($model);?>&nbsp;&nbsp;</span>  
                                    </li>  
                                </ul>
                            </div>
                            <div class="col s12 m6 l6 right-align search-stats">
                                <!--<span class="m-r-sm">23 Active</span> <span class="secondary-stats">|&nbsp;47 Closed</span>-->
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

                <!--$##############################3-->
                <?php if (!empty($model)) { ?>
                    
                    <div class="card z-depth-0">
                        <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Country</th>
                                    <th style="width: 650px;">Code</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                $r=1;
                                foreach ($model as $record) {
                                    switch ($record->status){ case 'A': $status = 'Active'; $btn = 'De-Activate';$color='green-text'; break; case 'C': $status = 'Closed'; $btn = 'Activate';$color='red-text'; break;}
                                    ?>
                                    <tr class="modal-trigger" href="#country-status<?php echo $record->id;?>">
                                        <td><?php echo $r; ?>.</td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $record->code; ?>.</td>
                                        <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                    </tr>
                                <?php $r++;
                                    include 'modals/countryStatus.php';
                                    } ?>                                        
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                    
                    <?php } ?>

                

            </div>
        </div> 
    </div>
</div>
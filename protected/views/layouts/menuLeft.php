<?php
    $controller = $this->id; //Yii::app()->controller->id;
    $action = $this->action->id; //pages
    
    //set menu arrays
//      dashboard menu
        $dashboard_array = array("user");
        $dashboard_status = '';
        $dashboard_color = '';
        
//      settings menu
        $setting_array = array("settings/panel");
        $setting_status = '';
        $setting_color = '';
        
//      analytics menu
        $analytics_array = array("analytics/panel","analytics/politicalAssignment");
        $analytics_status = '';
        $analytics_color = '';
        
//      new research menu
        $research_maker_array = array("research/maker/panel","research/maker/people","research/maker/organisation", "research/maker/politicalassignment");
        $research_maker_color = '';
        $research_supervisor_array = array("research/supervisor/panel","research/supervisor/organisation","research/supervisor/people");
        $research_supervisor_color = '';
        $research_status = '';
        
//      Data Entry menu
        $dataEntry_Entrant_array = array("userType/MakerDataEntry","dataEntry/Entrant/panel","dataEntry/Entrant/people","dataEntry/Entrant/employment","dataEntry/Entrant/politicalassignment","dataEntry/Entrant/address","dataEntry/Entrant/dateOfBirth");
        $dataEntry_Entrant_color = '';
        $dataEntry_maker_array = array("dataEntry/maker/panel","dataEntry/maker/organisation","dataEntry/maker/people");
        $dataEntry_maker_color = '';
        $dataEntry_supervisor_array = array("dataEntry/supervisor/panel","dataEntry/supervisor/employment","dataEntry/supervisor/politicalassignment","dataEntry/supervisor/politicalassignment/supervise","dataEntry/supervisor/employment/supervise","dataEntry/supervisor/address");
        $dataEntry_supervisor_color = '';
        $dataEntry_status = '';
        
    if(in_array ($controller, $dashboard_array)){
        $dashboard_status = 'active';
        $dashboard_color = 'cyan-text';
    }elseif(in_array ($controller, $setting_array)){
        $setting_status = 'active';
        $setting_color = 'cyan-text';
    }elseif(in_array ($controller, $analytics_array)){
        $analytics_status = 'active';
        $analytics_color = 'cyan-text';
    }elseif(in_array ($controller, $research_maker_array)){
        $research_status = 'active';
        $research_maker_color = 'cyan-text';
    }elseif(in_array ($controller, $research_supervisor_array)){
        $research_status = 'active';
        $research_supervisor_color = 'cyan-text';
    }elseif(in_array ($controller, $dataEntry_maker_array)){
        $dataEntry_status = 'active';
        $dataEntry_maker_color = 'cyan-text';
        $dataEntry_maker_color1 = 'cyan-text';
    }elseif(in_array ($controller, $dataEntry_supervisor_array)){
        $dataEntry_status = 'active';
        $dataEntry_supervisor_color = 'cyan-text';
    }elseif(in_array ($controller, $dataEntry_Entrant_array)){
        $dataEntry_status = 'active';
        $dataEntry_Entrant_color = 'cyan-text';
    }  
?>

<li class="no-padding <?php echo $dashboard_status;?>">
    <?php echo CHtml::link('Dashboard', array('user/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$dashboard_color)); ?>
</li>
<li class="no-padding <?php echo $setting_status;?>">
    <?php echo CHtml::link('Settings', array('settings/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$setting_color)); ?>
</li>
<!--<li class="no-padding <?php // echo $analytics_status;?>">-->
    <?php // echo CHtml::link('Person', array('people/index'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$analytics_color)); ?>
<!--</li>-->

<li class="no-padding">
    <a class="collapsible-header waves-effect waves-grey <?php echo $research_status; ?>"> Profiles <i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
    <div class="collapsible-body">
        <ul>
            <li class="">
                <?php echo CHtml::link('&rtrif; Maker', array('research/maker/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$research_maker_color)); ?>
            </li>
            <li class="">
                <?php echo CHtml::link('&rtrif; Supervisor', array('research/supervisor/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$research_supervisor_color)); ?>
            </li>
        </ul>
    </div>
</li>
<li class="no-padding">
    <a class="collapsible-header waves-effect waves-grey <?php echo $dataEntry_status; ?>">Attributes <i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
    <div class="collapsible-body">
        <ul>
            <li class="">
                <?php echo CHtml::link('&rtrif; Researcher', array('dataEntry/maker/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$dataEntry_maker_color)); ?>
            </li>
            <li class="">
                <?php echo CHtml::link('&rtrif; Data Entrant', array('dataEntry/Entrant/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$dataEntry_Entrant_color )); ?>
            </li>
            <li class="">
                <?php echo CHtml::link('&rtrif; Supervisor', array('dataEntry/supervisor/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$dataEntry_supervisor_color)); ?>
            </li>
        </ul>
    </div>
</li>
<li class="no-padding <?php echo $analytics_status;?>">
    <?php echo CHtml::link('Analytics', array('analytics/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$analytics_color)); ?>
</li>


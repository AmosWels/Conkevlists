<?php
/* @var $this Controller */

$userid = Yii::app()->user->userid;
$user = TUser::model()->findByPk($userid);
//getting gender
$genderid = $user->gender;
$genderValue = TPgender::model()->findByPk($genderid);
$gender = $genderValue->name; // gender name
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Conkev.AML" />
        <meta name="keywords" content="Conkev,AML" />
        <meta name="author" content="Enovate Soft Ltd" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->    
        <link href="assets/plugins/material_icons/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">    
        <!--tables-->
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--select-->
        <link href="assets/plugins/select2/css/select2.css" rel="stylesheet"> 
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


        <!--<link href="assets/plugins/dropzone/dropzone.min.css" rel="stylesheet">-->
        <!--<link href="assets/plugins/dropzone/basic.min.css" rel="stylesheet">-->

        <!--EXTERNAL FILES-->
        <!-- Gridforms -->
        <!--<link href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">--> 	


    </head>

    <body class="search-app quick-results-off">

        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3 m3">      
                            <span class="chapter-title">Conkev <small>Lists</small></span>
                        </div>
                        <form class="left search col s6 hide-on-small-and-down">
                            <div class="input-field">
                                <input id="search" type="search" placeholder="Search" autocomplete="off">
                                <label for="search"><i class="material-icons search-icon">search</i></label>
                            </div>
                            <a href="javascript: void(0)" class="close-search"><i class="material-icons">close</i></a>
                        </form>
                        <ul class="right col s9 m3 nav-right-menu">
                            <!--<li><a href="javascript:void(0)" data-activates="chat-sidebar" class="chat-button show-on-large"><i class="material-icons">more_vert</i></a></li>-->
                         <!--<li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i><span class="badge">4</span></a></li>-->
                            <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                        </ul>

                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Today</li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                                <div class="notification-text"><p><b>Alan Grey</b> uploaded new theme</p><span>7 min ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle deep-purple"><i class="material-icons">cached</i></div>
                                                <div class="notification-text"><p><b>Tom</b> updated status</p><span>14 min ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle red"><i class="material-icons">delete</i></div>
                                                <div class="notification-text"><p><b>Amily Lee</b> deleted account</p><span>28 min ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle cyan"><i class="material-icons">person_add</i></div>
                                                <div class="notification-text"><p><b>Tom Simpson</b> registered</p><span>2 hrs ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle green"><i class="material-icons">file_upload</i></div>
                                                <div class="notification-text"><p>Finished uploading files</p><span>4 hrs ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-drop-title">Yestarday</li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle green"><i class="material-icons">security</i></div>
                                                <div class="notification-text"><p>Security issues fixed</p><span>16 hrs ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle indigo"><i class="material-icons">file_download</i></div>
                                                <div class="notification-text"><p>Finished downloading files</p><span>22 hrs ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <div class="notification">
                                                <div class="notification-icon circle cyan"><i class="material-icons">code</i></div>
                                                <div class="notification-text"><p>Code changes were saved</p><span>1 day ago</span></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!--for results on searching-->    
            <!--    <div class="search-results">
                    <div class="container search-container">
                        <div class="row">
                            <div class="col s12 search-head">
                                <div class="row">
                                    <div class="col s12">
                                        <div class="left">
                                            <p class="search-results-title">Quick search results</p>
                                            <p class="search-filter left">
                                                <input type="checkbox" class="filled-in" id="filled-in-box" checked/>
                                                <label for="filled-in-box">Google search</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="res-not-found">No results found</div>
                            </div>
                            <div class="col s12 m4 search-result-container">
                                <div class="card card-transparent">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <img src="assets/images/profile-image-1.png" alt="" class="circle responsive-img z-depth-1">
                                        </div>
                                        <div class="col s9">
                                            <span class="search-result-text">
                                                Search <span class="search-text search-result-highlight"></span><br><span class="secondary-search-text">Last active 2 days ago</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-transparent">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <img src="assets/images/profile-image-3.jpg" alt="" class="circle responsive-img z-depth-1">
                                        </div>
                                        <div class="col s9">
                                            <span class="search-result-text">
                                                News about <span class="search-text search-result-highlight"></span><br><span class="secondary-search-text">23 Blogs</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-transparent">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <img src="assets/images/profile-image.png" alt="" class="circle responsive-img z-depth-1">
                                        </div>
                                        <div class="col s9">
                                            <span class="search-result-text">
                                                Tom King (Works at <span class="search-text search-result-highlight"></span>)<br><span class="secondary-search-text">Avaible for freelance work</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4 search-result-container">
                                <div class="card card-transparent ">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <span class="z-depth-1 circle search-circle indigo lighten-1">F</span>
                                        </div>
                                        <div class="col s9">
                                            <span class="search-result-text">
                                                <span class="search-text search-result-highlight"></span> on Facebook<br><span class="secondary-search-text"><a href="#">View website</a></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-transparent">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <span class="z-depth-1 circle search-circle light-blue lighten-1">T</span>
                                        </div>
                                        <div class="col s9">
                                            <span class="search-result-text">
                                                <span class="search-text search-result-highlight"></span> on Twitter<br><span class="secondary-search-text"><a href="#">View website</a></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-transparent">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <span class="z-depth-1 circle search-circle red darken-1">G</span>
                                        </div>
                                        <div class="col s9">
                                            <span class="search-result-text">
                                                Google+ <span class="search-text search-result-highlight"></span><br><span class="secondary-search-text"><a href="#">View website</a></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4 search-result-container">
                                <div class="card card-transparent">
                                    <div class="card-content first">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sunt in culpa qui<span class="search-text search-result-highlight"></span> quis.</p>
                                    </div>
                                    <div class="card-action">
                                        <span class="grey-text">Yesterday, 4:56 PM</span>
                                    </div>
                                </div>
                                <div class="card card-transparent">
                                    <div class="card-content">
                                        <p>Sunt in culpa qui <span class="search-text search-result-highlight"></span> officia deserunt mollit anim id est laborum. officia deserunt mollit anim id est laborum officia deserunt mollit anim</p>
                                    </div>
                                    <div class="card-action">
                                        <span class="grey-text">27 January 2016</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

            <!--for right dropdown menu with charts-->
            <!--    <aside id="chat-sidebar" class="side-nav white">
                   
                </aside>-->

            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <!--<div class="sidebar-profile-image">-->
                            <!--<img src="assets/images/profile-image.png" class="circle" alt="">-->
                        <!--</div>-->
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p><?php if (strlen($user->names) > 30){
                                    $name = substr($user->names, 0, 22) . ' ...'; 
                                      ?>
                              <span href="#user" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" > <?php echo $name; ?></span>
                             <?php } else{ echo $user->names; } ?><i class="material-icons right">arrow_drop_down</i></p>
                                <span class="small"><?php echo $gender; ?></span>
                            </a>
                        </div>
                        
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>
                            <?php
                            //for user menu
                            include 'menuUser.php';
                            ?>  
                        </ul>
                    </div>
                    <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                        <?php
                        //for left menu
                        include 'menuLeft.php';
                        ?>          
                    </ul>
                    <div class="footer">
                        <?php
                        //for main footer
                        include 'footerMain.php';
                        ?> 
                    </div>
                </div>
            </aside>
            <main class="mn-inner inner-active-sidebar">
                <?php
                //for main page content
                echo $content;
                ?>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
        <!--main-->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <!--vertical tabs-->
        <link href="assets/css/vertical_tab.css" rel="stylesheet">
        <!--tables-->
        <script src="assets/js/pages/table-data.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <!--wizard-->
        <script src="assets/js/pages/form-wizard.js"></script>
        <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/plugins/jquery-steps/jquery.steps.min.js"></script>
        <!--input masks-->
        <script src="assets/js/pages/form-input-mask.js"></script>
        <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            function AlertIt() {
                var answer = confirm("Under Testing, visit later!")
                if (answer)
                    window.location = "#";
            }
        </script>
        <!--select form-->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/form-select2.js"></script>

<!--<script src="assets/plugins/dropzone/dropzone.min.js"></script>-->
        <!--<script src="assets/plugins/dropzone/dropzone-amd-module.min.js"></script>-->

        <!--EXTERNAL FILES-->
        <!-- File Input -->
        <!--<script src="assets/plugins/form-jasnyupload/fileinput.min.js"></script>-->     
        <!-- Gridforms -->
        <!--<script src="assets/plugins/gridforms/gridforms/gridforms.js"></script>-->  	

        <?php // include 'custom.php';?>

        <?php
        $table_array = array("businessProcess/customerOpening");
        ?>

        <!--page styles-->
        <?php if (in_array($controller, $table_array)) { ?>
            <!--tables-->
            <!--<script src="assets/js/pages/table-data.js"></script>-->
        <?php } else { ?>
            <!--dashboard-->
            <!--<script src="assets/js/pages/dashboard.js"></script>-->
            <!--causes labels to mix with content-->
            <!--<script src="assets/js/pages/form-input-mask.js"></script>-->
        <?php } ?>
    <!--<style>
            .scroll-box {
                overflow-y: scroll;
                height: 100px;
                padding: 1rem
            }
    </style>-->
    </body>
</html>
<?php include_once 'modal/viewuser.php'; ?>
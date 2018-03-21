<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<!--<div class="row center">
    <div class="input-field col s12 center">
        <img src="assets/login/images/conkev.jpg" alt="" class="circle responsive-img valign profile-image-login">
   </div>
</div>-->
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>ConkevLists Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link href="assets/plugins/material_icons/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="grey lighten-5">
    <!--<body class="signin">-->
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
                <div class="spinner-layer spinner-red">
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
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container">
                <div class="valign">
                    <div class="row center">
                    <a><i class="material-icons small center" style="color: grey; margin-top:0px;">list</i></a>
                    <h4 class=" grey-text" style="font-family: sans-serif;">
                        ConkevLists</h4>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l4 offset-l4 offset-m3">
                        <!--<div class="col s12 m6 18 offset-l0 offset-m3">-->
                            <div class="card">
                                <div class="card-content z-depth-0"style="margin-left: 10px;">
                                    <div class="card-title">Log In</div>
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'login-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?>
                                    <?php
//$str = 'demo';
//echo md5($str); 
                                    ?>
                                    <?php
//echo hash('ripemd160', $str);
                                    ?>
                                    <div class="row">
                                        <?php echo $form->labelEx($model, 'username'); ?>
                                        <?php echo $form->textField($model, 'username'); ?>
                                        <span class="red-text" style="font-size: 12px;"><?php echo $form->error($model, 'username'); ?></span>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model, 'password'); ?>
                                        <?php echo $form->passwordField($model, 'password'); ?>
                                        <span class="red-text" style="font-size: 12px;"><?php echo $form->error($model, 'password'); ?></span>
                                        <p class="hint" style="font-size: 12px;">
                                            Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd>
                                        </p>
                                    </div>

                                    <!--<div class="row rememberMe">-->
                                        <!--<span class="red-text" style="font-size: 12px;">-->
                                        <?php // echo $form->checkBox($model, 'rememberMe'); ?>
                                        <?php // echo $form->label($model, 'rememberMe'); ?></span>
                                        <?php // echo $form->error($model, 'rememberMe'); ?>
                                    <!--</div>-->
                                    <div class="row buttons">
                                        <button class="waves-effect waves-blue btn blue right"><?php echo CHtml::submitButton('Login'); ?></button>
                                    </div>

                                    <?php $this->endWidget(); ?>
                                    <!--</div> form -->
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <p class="medium-small center" style=" margin-left: 30px;">
                                    ConkevLists © <?php echo date('Y'); ?>
                                    <br>  <i>All Rights Reserved to </i>
                                    <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" target="_blank" href="https://www.enovatesoftug.com/"><u>Enovate Soft Ltd</u></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

    </body>
</html>


<!--</div>-->

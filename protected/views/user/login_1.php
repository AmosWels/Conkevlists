<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!--<div class="row center">
    <div class="input-field col s12 center">
        <img src="assets/login/images/conkev.jpg" alt="" class="circle responsive-img valign profile-image-login">
   </div>
</div>-->
<div id="" class="row center">
<div class="col s12 z-depth-4 card panel">
<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<!--<div class="form">-->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with<span class="required">*</span> are required.</p>
<?php
//$str = 'denis';
//echo md5($str); ?>
        <!--<br>-->
<?php
//echo hash('ripemd160', $str);

?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
<!--</div> form -->
</div>
</div>
    
<div class="row">
<div class="col s12 center">
    <p class="medium-small" style="margin-top: 30px">
      Conkev AML © <?php echo date('Y'); ?> </br>
      <i>All Rights Reserved to </i><u>Enovate Soft Ltd</u>
      <!--<a class="white-text" target="_blank" href="#">Enovate Soft Ltd</a>-->
 </p>
</div>
</div>

<!--</div>-->

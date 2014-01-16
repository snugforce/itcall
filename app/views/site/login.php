<?php
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('main','Sign in');
$this->breadcrumbs=array(
	'Login',
);
?>

<h1><?php echo Yii::t('main','Sign in');?></h1>
<p>
    <?php echo Yii::t('main','Please fill out the following form with your login credentials:'); ?>
</p>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	    'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block"><?php echo Yii::t('main','Fields with * are required.')?></p>

    <?php //echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->checkBoxControlGroup($model, 'rememberMe', array('span'=>5)); ?>
			
        <div class="form-actions">
        <?php echo TbHtml::submitButton(Yii::t('main','Login'),array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block"><?php echo Yii::t('main','Fields with * are required.')?></p>
	<br/>

    <?php //echo $form->errorSummary($model); ?>

            <?php //echo $form->checkBoxControlGroup($model,'checkStatus', array('label' => Yii::t('main','Change status'),'checked'=>'checked'));
            ?>
            <?php echo $form->dropDownListControlGroup($model,'status_id',
				CHtml::listData(Status::model()->findAll(),'id','name'),
				array('span'=>4,'empty' => Yii::t('main','Select status...'),'displaySize'=>0));
            ?>


            <?php echo $form->textAreaControlGroup($model,'txt',array('rows'=>6,'span'=>4)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
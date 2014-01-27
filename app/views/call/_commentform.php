<?php
$checkJS = <<<CHECK
$('#checkBoxStatus').on('change',function() {
    var checked=$(this).is(':checked')?1:0,
        st = $('#dropDownListStatus');
	if ($(this).is(':checked')) {
	    st.removeAttr('disabled');
	}else{
	    st.prop('disabled', 'disabled');
	}
	return false;
});
CHECK;
Yii::app()->getClientScript()->registerScript('check', $checkJS);
?>
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
	'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
)); ?>

    <p class="help-block"><?php echo TbHtml::small(Yii::t('main','Fields with * are required.'));?></p>
    <?php //echo $form->errorSummary($model); ?>
            <?php echo $form->textArea($model,'txt',array('rows'=>3,'span'=>6, 'style'=>'resize:vertical;')); ?>
            <?php //echo $form->checkBoxControlGroup($model,'checkStatus', array('label' => Yii::t('main','Change status'),'checked'=>'checked'));
            ?>
            <div>
            <?php
                //echo TbHtml::label(Yii::t('main','Change status'), false, array('class'=>'span3')).TbHtml::checkBox('checkBoxStatus', false);
                echo TbHtml::checkBox('checkBoxStatus', false, array('label'=>Yii::t('main','Change status')));
            ?>
            <?php echo $form->dropDownList($model,'status_id',
				CHtml::listData(Status::model()->findAll(),'id','name'),
				array('span'=>3,'displaySize'=>0,'id'=>'dropDownListStatus','disabled'=>true));
            ?>
            </div>
            <?php
                echo $form->checkBoxControlGroup($model, 'public');

            ?>
        <div class="form-actions" style="margin-top:0;">
        <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t('main','Create') : Yii::t('main','Save'),array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    //'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
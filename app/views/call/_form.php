<?php
/* @var $this CallController */
/* @var $model Call */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'call-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block"><?php echo Yii::t('main','Fields with * are required.')?></p>
	<br/>

    <?php //echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->textFieldControlGroup($model,'office',array('span'=>5,'maxlength'=>128)); ?>

            <?php if ($model->group_id==null) echo $form->dropDownListControlGroup($model,'group_id', CHtml::listData( Group::model()->findAll(),'id','name' ),array('span'=>5,'empty' => Yii::t('main','Select group...'),'displaySize'=>0)); ?>

            <?php echo $form->dropDownListControlGroup($model,'category_id', CHtml::listData( Category::model()->findAll(),'id','name' ), array('span'=>5,'empty' => Yii::t('main','Select category...'),'displaySize'=>0)); ?>

            <?php //echo $form->textFieldControlGroup($model,'ip',array('span'=>5)); ?>
			
            <?php echo $form->textAreaControlGroup($model,'txt',array('rows'=>6,'span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'create_time',array('span'=>5, 'class'=>'hide')); ?>

            <?php //echo $form->textFieldControlGroup($model,'update_time',array('span'=>5, 'class'=>'hide')); ?>

            <?php //echo $form->dropDownListControlGroup($model,'status_id', CHtml::listData( Status::model()->findAll(),'id','name' ), array('span'=>5,'empty' => 'Something...','displaySize'=>0)); ?>

    <?if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest){
        echo '<div class="control-group">';
        echo $form->labelEx($model, 'verifyCode', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->textField($model, 'verifyCode',array('span'=>1,'maxlength'=>4,'class'=>'offset1', 'type'=>'number'));
        $form->widget('CCaptcha', array('showRefreshButton'=>false, 'clickableImage'=>true,
            'imageOptions' => array('title' => 'Обновить', 'style' => 'cursor: pointer;',)));


        echo '</div>';
        echo '</div>';
    }
    ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Save'),array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>



    <?php $this->endWidget(); ?>	

</div><!-- form -->
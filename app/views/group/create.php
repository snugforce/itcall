<?php
    /* @var $this GroupController */
    /* @var $model Group */
?>

<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Create',
);

    $this->menu=array(
    array('label'=>Yii::t('main','List'), 'url'=>array('index')),
    );
    ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
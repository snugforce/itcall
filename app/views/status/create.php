<?php
    /* @var $this StatusController */
    /* @var $model Status */
?>

<?php
$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	'Create',
);

    $this->menu=array(
    array('label'=>Yii::t('main','List'), 'url'=>array('index')),
    );
    ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
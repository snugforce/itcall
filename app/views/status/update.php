<?php
    /* @var $this StatusController */
    /* @var $model Status */
?>

<?php
$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>Yii::t('main','List'), 'url'=>array('index')),
    );
    ?>    

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
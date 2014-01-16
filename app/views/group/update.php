<?php
    /* @var $this GroupController */
    /* @var $model Group */
?>

<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>Yii::t('main','List'), 'url'=>array('index')),
    );
    ?>    

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
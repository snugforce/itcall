<?php
    /* @var $this CategoryController */
    /* @var $model Category */
?>

<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

    $this->menu=array(
    array('label'=>Yii::t('main','List'), 'url'=>array('index')),
    );
    ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
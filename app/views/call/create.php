<?php
    /* @var $this CallController */
    /* @var $model Call */
?>

<?php
$this->breadcrumbs=array(
	'Calls'=>array('index'),
	'Create',
);

    $this->menu=array(
    //array('label'=>'List Call', 'url'=>array('index')),
    //array('label'=>'Manage Call', 'url'=>array('admin')),
    );
    ?>

	<!-- <h1>Create Call</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
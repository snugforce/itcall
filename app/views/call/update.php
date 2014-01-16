<?php
    /* @var $this CallController */
    /* @var $model Call */
?>

<?php
$this->breadcrumbs=array(
	'Calls'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'List Call', 'url'=>array('index')),
    array('label'=>'Create Call', 'url'=>array('create')),
    array('label'=>'View Call', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage Call', 'url'=>array('admin')),
    );
    ?>

    <h1>Update Call <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
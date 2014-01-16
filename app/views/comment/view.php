<?php
/* @var $this CommentController */
/* @var $model Comment */
?>

<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Comment', 'url'=>array('index')),
array('label'=>'Create Comment', 'url'=>array('create')),
array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->id)),
array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>View Comment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
'attributes'=>array(
		'id',
		'user_id',
		'call_id',
		'create_time',
		'status_id',
		'txt',
),
)); ?>
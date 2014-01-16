<?php
/* @var $this CallController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Calls',
);

$this->menu=array(
array('label'=>Yii::t('main','Add'), 'url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'columns' => array(
			array(
			'name' => 'id',
			'htmlOptions' => array('style' =>'width: 20px'),
			'sortable' => false,
		),
		array(
			'name' => 'office',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
		),		
		array(
			'name' => 'name',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
		),
		array(
			'name' => 'group_id',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
			'value'=>'$data->group->name',
		),
		array(
			'name' => 'category_id',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
			'value'=>'$data->category->name',
		),
		/*
		array(
			'name' => 'ip',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
		),
		*/
		array(
			'name' => 'txt',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
		),
		array(
			'name' => 'create_time',
			'htmlOptions' => array('style' =>'width: 140px'),
			'sortable' => false,
			'value'=>'date( "d.m.y H:i",  $data->create_time)',
		),
		/*
		array(
			'name' => 'update_time',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
			'value'=>'date( "d.m.y H:i",  $data->update_time)',
		),
		*/
		array(
			'name' => 'status_id',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
			'value'=>'$data->status->name',
		),
		array(
			'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
			'visible'=>Yii::app()->user->role == "administrator",
		),
		/*
		array(
			'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}',
		),
		array(
			'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
		),
		*/		
	),
)); ?>
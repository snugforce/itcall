<?php
/* @var $this StatusController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Statuses',
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
			'name' => 'name',
			'htmlOptions' => array('style' =>''),
			'sortable' => false,
		),
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
	),
)); ?>
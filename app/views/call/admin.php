<?php
/* @var $this CallController */
/* @var $model Call */


$this->breadcrumbs=array(
	'Calls'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Call', 'url'=>array('index')),
array('label'=>'Create Call', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#call-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Calls</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'call-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'name',
		'group_id',
		'category_id',
		'ip',
		'txt',
		/*
		'office',
		'create_time',
		'update_time',
		'status_id',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
<?php
/* @var $this CallController */
/* @var $model Call */
?>

<?php
$this->breadcrumbs=array(
	'Calls'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Call', 'url'=>array('index')),
//array('label'=>'Create Call', 'url'=>array('create')),
//array('label'=>'Update Call', 'url'=>array('update', 'id'=>$model->id)),
//array('label'=>'Delete Call', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage Call', 'url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'htmlOptions' => array(
'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
	'attributes'=>array(
        array(               
			'name' => 'id',
			'label' => '#',
		),
        array(               
			'name' => 'office',
        ),
        array(               
			'name' => 'name',
        ),		
        array(               
			'name' => 'group_id',
			'value' => $model->group->name,
		),		
        array(               
			'name' => 'category_id',
			'value' => $model->category->name,
		),			
        array(               
			'name' => 'create_time',
			'value' => date( "d.m.y H:i",  $model->create_time),
		),			
        array(               
			'name' => 'update_time',
			'value' => date( "d.m.y H:i",  $model->update_time),
		),			
        array(               
			'name' => 'status_id',
			'value' => $model->status->name,			
		),	
        array(               
			'name' => 'txt',
        ),
      ),
)); ?>
<hr>
<div id="comments">
    <?php if($model->commentCount>=1): ?>

        <h3>
            <?php echo TbHtml::icon(TbHtml::ICON_PENCIL).' ' .
                Yii::t('main','comments '). '(' . $model->commentCount . ')'; ?>
        </h3>
 
        <?php $this->renderPartial('_comments',array(
            'call'=>$model,
            'comments'=>$model->comments,
        )); ?>
    <?php endif; ?>
    <hr>
    <h3><?php echo Yii::t('main','Add comment'); ?></h3>
 
        <?php $this->renderPartial('/comment/_form',array(
            'model'=>$comment,
        )); ?>
 
</div><!-- comments -->
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
<div class="row">
    <div class="span6">
        <div class="row">
            <div class="span3">
                <h3><?php echo Yii::t('main','Number').': '; ?></h3>
            </div>
            <div class="span3">
                <h3><?php echo TbHtml::b($model->id); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <h3><?php echo Yii::t('main','Create Time').': '; ?></h3>
            </div>
            <div class="span3">
                <h3><?php echo TbHtml::b(date( "d.m.y H:i",  $model->create_time)); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <h3><?php echo Yii::t('main','Office').': '; ?></h3>
            </div>
            <div class="span3">
                <h3><?php echo TbHtml::b($model->office); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <h3><?php echo Yii::t('main','Category').': '; ?></h3>
            </div>
            <div class="span3">
                <h3><?php echo TbHtml::b($model->category->name); ?></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="span6">
                <?php echo TbHtml::lead(nl2br(CHtml::encode($model->txt)));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="span6">
            <?php echo Yii::t('main','Update Time').': '.
                TbHtml::b(date( "d.m.y H:i",  $model->update_time)).', '.
                TbHtml::well($model->status->name, array('style'=>'background-color:'.$model->status->color.';')); ?>
            </div>
        </div>

        <?php if(!Yii::app()->user->isGuest): ?>
        <hr>
        <h3><?php echo Yii::t('main','Add comment'); ?></h3>
        <?php $this->renderPartial('/comment/_form',array(
            'model'=>$comment,
        )); ?>
        <?php endif; ?>
    </div>
    <?php if(!Yii::app()->user->isGuest): ?>
    <div class="span6">
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
    </div>
    <?php endif; ?>
</div>

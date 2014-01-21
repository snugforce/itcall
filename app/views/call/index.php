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
echo 'hhhhhhhhhhhh'.Yii::app()->getBaseUrl();
?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
    <?php
    $s = 'class="active"';
    foreach($listData as $itm){
        echo '<li '.$s.'>'.TbHtml::link($itm['label'], '#'.$itm['tab'], array(' data-toggle'=>'tab',)).'</li>';
        $s='';
    }
    ?>
    </ul>

    <div class="tab-content">
        <?php
        $s = 'active';
        foreach($listData as $itm){
            //echo TbHtml::tag('div '.$s, array('class'=>'tab-pane', 'id'=> $itm['tab']), false);
            echo '<div class="tab-pane '.$s.'" id = "'.$itm['tab'].'">';
            $s='';
            $this->widget('bootstrap.widgets.TbGridView',array(
                'type'=>'striped bordered condensed',
                'dataProvider'=>$itm['dataProvider'],
                'columns' => array(
                    array('name' => 'id', 'htmlOptions' => array('style' =>'width: 20px'),'sortable' => false,),
                    array('name' => 'office', 'htmlOptions' => array('style' =>''),	'sortable' => false,),
                    array('name' => 'name', 'htmlOptions' => array('style' =>''), 'sortable' => false,),
                    array('name' => 'group_id',	'htmlOptions' => array('style' =>''), 'sortable' => false, 'value'=>'$data->group->name',),
                    array('name' => 'category_id', 'htmlOptions' => array('style' =>''), 'sortable' => false, 'value'=>'$data->category->name',),
                    array('name' => 'txt', 'htmlOptions' => array('style' =>''), 'sortable' => false,),
                    array('name' => 'create_time', 'htmlOptions' => array('style' =>'width: 140px'), 'sortable' => false, 'value'=>'date( "d.m.y H:i",  $data->create_time)',),
                    array('class'=>'bootstrap.widgets.TbButtonColumn', 'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),	'template'=>'{view}', 'visible'=>Yii::app()->user->role == "administrator",),
                ),
            ));
            echo '</div>';
        }
        ?>
    </div>
</div>

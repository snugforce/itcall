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

    <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
        <?php
        //$listData = Status::listData();
        foreach(Status::listData() as $itm)
            echo '<li>'.TbHtml::link($itm['label'], '#'.$itm['tab'], array(' data-toggle'=>'tab')).'</li>';
        ?>
        </ul>
        <div class="tab-content">
            <?php
            foreach(Status::listData() as $itm){
                $dataProvider->criteria->addCondition('status_id='.$itm['id']);
                echo TbHtml::tag('div', array('class'=>'tab-pane', 'id'=> $itm['tab']), false);
                $this->widget('bootstrap.widgets.TbGridView',array(
                    'type'=>'striped bordered condensed',
                    'dataProvider'=>$dataProvider,
                    'columns' => array(
                        array('name' => 'id', 'htmlOptions' => array('style' =>'width: 20px'),'sortable' => false,),
                        array('name' => 'office', 'htmlOptions' => array('style' =>''),	'sortable' => false,),
                        array('name' => 'name', 'htmlOptions' => array('style' =>''), 'sortable' => false,),
                        array('name' => 'group_id',	'htmlOptions' => array('style' =>''), 'sortable' => false, 'value'=>'$data->group->name',),
                        array('name' => 'category_id', 'htmlOptions' => array('style' =>''), 'sortable' => false, 'value'=>'$data->category->name',),
                        array('name' => 'txt', 'htmlOptions' => array('style' =>''), 'sortable' => false,),
                        array('name' => 'create_time', 'htmlOptions' => array('style' =>'width: 140px'), 'sortable' => false, 'value'=>'date( "d.m.y H:i",  $data->create_time)',),
                        array('name' => 'status_id', 'htmlOptions' => array('style' =>''), 'sortable' => false,	'value'=>'$data->status->name',),
                        array('class'=>'bootstrap.widgets.TbButtonColumn', 'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),	'template'=>'{view}', 'visible'=>Yii::app()->user->role == "administrator",),
                    ),
                ));
                echo '</div>';

            }
            ?>
        </div>
    </div>


<?php
    echo TbHtml::buttonGroup(Status::listData($status_id),
        array('toggle' => TbHtml::BUTTON_TOGGLE_RADIO, 'color' => TbHtml::BUTTON_COLOR_PRIMARY));
?>
<?php

?>

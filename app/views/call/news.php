<?php
/* @var $this CallController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Calls',
);
$url_ar = array('create');


$this->menu=array(
    array('label' => Yii::t('main','Add'), 'url' => $url_ar,)
    );
?>



<?php

    $this->widget('bootstrap.widgets.TbGridView',array(
        'type'=>'striped bordered condensed',
        'dataProvider'=>$dataProvider,
        'columns' => array(
            array('name' => 'id',       'htmlOptions' => array('style' =>'width: 20px'), 'sortable' => false,),
            array('name' => 'office',   'htmlOptions' => array('style' =>'width: 45px'),	'sortable' => false,),
            array('name' => 'name',     'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false,),
            array('name' => 'group_id',	'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'$data->group->name',),
            array('name' => 'category_id', 'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'$data->category->name',),
            array('name' => 'txt', 'htmlOptions' => array('style' =>''), 'sortable' => false,),
            array('name' => 'create_time', 'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'date( "d.m.y H:i",  $data->create_time)',),
            array(
                'name' => '',
                'value' => 'TbHtml::link("Открыть", Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))',
                'type' => 'html',
                'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),
            ),
            //array('class'=>'bootstrap.widgets.TbButtonColumn', 'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),	'template'=>'{view}',),
        ),
    ));
?>
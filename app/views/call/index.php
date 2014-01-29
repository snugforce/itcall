<?php
/* @var $this CallController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Calls',
);
$url_ar = array('create');
if (!is_null($group_id)) $url_ar['group_id']=$group_id;

$this->menu=array(
    array('label' => Yii::t('main','Add'), 'url' => $url_ar,)
    );
?>
<h2><?php if (!is_null($group)) {echo $group->attributes['name'];} else {echo Yii::t('main','All group');}?></h2>

<?php echo TbHtml::pills($buttons); ?>
<?php
//TbHtml::BUTTON_COLOR_PRIMARY
    $this->widget('bootstrap.widgets.TbGridView',array(
        'type'=>'striped condensed',
        'dataProvider'=>$dataProvider,
        'columns' => array(
            array('name' => 'id',       'htmlOptions' => array('style' =>'width: 25px'), 'sortable' => false,),
            array('name' => 'office',   'htmlOptions' => array('style' =>'width: 45px'),	'sortable' => false,),
            array('name' => 'name',     'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false,),
            //array('name' => 'group_id',	'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'$data->group->name',),
            array('name' => 'create_time', 'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'date( "d.m.y H:i",  $data->create_time)',),
            array('name' => 'category_id', 'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'$data->category->name',),
            array(
                'name' => '',
                'value' => 'TbHtml::linkButton("Открыть",
                    array(
                        "block" => true,
                        "color" =>TbHtml::BUTTON_COLOR_SUCCESS,
                        //"size" => TbHtml::BUTTON_SIZE_LARGE,
                        //"icon"=>TbHtml::ICON_HAND_RIGHT,
                        "url"=> Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)),
                    ))',
                'type' => 'html',
                'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),
            ),
            array('name' => 'txt', 'htmlOptions' => array('style' =>''), 'sortable' => false,),

            //array('class'=>'bootstrap.widgets.TbButtonColumn', 'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),	'template'=>'{view}',),
        ),
    ));
?>

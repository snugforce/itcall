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
    array('label' => Yii::t('main','Read All'), 'url' => 'readall',)
    );
?>



<?php
//TbHtml::BUTTON_SIZE_LARGE,
    $this->widget('bootstrap.widgets.TbGridView',array(
        'type'=>'striped condensed',
        'dataProvider'=>$dataProvider,
            'columns' => array(
                array(
                    'name' => '',
                    // 'header'=>Yii::t('main','Mark Read'),

                    'value' => 'TbHtml::linkButton("",//Yii::t("main","Mark"),
                    array(
                        //"block" => true,
                       // "color" =>TbHtml::BUTTON_COLOR_SUCCESS,
                        "size" => TbHtml::BUTTON_SIZE_MINI,

                        "icon"=>TbHtml::ICON_OK,
                        "url"=> Yii::app()->controller->createUrl("read",array("id"=>$data->primaryKey)),
                    ))',
                    'type' => 'html',
                    'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 10px;text-align: center;'),
                ),
                array(
                    'name' => '',
                   // 'header'=>Yii::t('main','View'),
                    'value' => 'TbHtml::linkButton(Yii::t("main",""),
                    array(
                        //"block" => true,
                       // "color" =>TbHtml::BUTTON_COLOR_SUCCESS,
                        "size" => TbHtml::BUTTON_SIZE_MINI,
                        "icon"=>TbHtml::ICON_EYE_OPEN,
                        "url"=> Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)),
                    ))',
                    'type' => 'html',
                    'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 10px;text-align: center;'),
                ),
                array('name' => 'id', 'header'=>'#',       'htmlOptions' => array('style' =>'width: 25px'), 'sortable' => false,),
                array('name' => 'office', 'header'=>Yii::t('main','Office'),   'htmlOptions' => array('style' =>'width: 45px'),	'sortable' => false,),
                array('name' => 'name','header'=>Yii::t('main','Name'),     'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false,),
                array('name' => 'group_id','header'=>Yii::t('main','Group'),	'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'$data->group->name',),
                array('name' => 'update_time', 'header'=>Yii::t('main','Update'), 'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'date( "d.m.y H:i",  $data->create_time)',),
                array('name' => 'category_id', 'header'=>Yii::t('main','Category'), 'htmlOptions' => array('style' =>'width: 100px'), 'sortable' => false, 'value'=>'$data->category->name',),
                array('name' => 'txt', 'header'=>Yii::t('main','Txt'), 'htmlOptions' => array('style' =>''), 'sortable' => false,),),
            //array('class'=>'bootstrap.widgets.TbButtonColumn', 'htmlOptions' => array('nowrap'=>'nowrap', 'style'=>'width: 20px;'),	'template'=>'{view}',),

    ));
?>

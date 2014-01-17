<div class="row">
    <div class="span7" >
        <img class="" src="/img/peoples.png" alt=""/>
    </div>
    <div class="span5 text-center">

    <?php
        $buttons = '';
        $ms = Group::model()->findAll();
        foreach($ms as $m)
        {
            $buttons = $buttons .
                TbHtml::linkButton($m['name'],
                    array(
                        'block' => true,
                        'color' =>TbHtml::BUTTON_COLOR_PRIMARY,
                        'size' => TbHtml::BUTTON_SIZE_LARGE,
                        'icon'=>TbHtml::ICON_OK,
                        'url'=>'/Call/create?group_id='.$m['id']));
        }
    ?>
    <?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
        'heading' => Yii::t('main','Add call'),
        'content' => '<p>'.Yii::t('main','Change group').'</p>'.$buttons,
    )); ?>
    </div>
</div>
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="row">
		<div class="span9">
			<h1><?php echo mb_convert_case(Yii::t('main', $this->id), MB_CASE_TITLE, 'utf-8').' - '.Yii::t('main', $this->action->id); ?></h1> 
		</div>
		<div class="span3 text-right">
			<?php echo TbHtml::buttonGroup($this->menu); ?>
		</div>
	</div>
    <hr>
	<?php echo $content; ?>
<?php $this->endContent(); ?>

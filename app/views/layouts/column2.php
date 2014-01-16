<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
  <div class="span8">
	  <div id="content">
		  <?php echo $content; ?>
	  </div><!-- content -->
  </div>
  <div class="span4">
	  <div id="sidebar">
	  <?php
		  $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_LIST,
        'items' => $this->menu,
      ));
	  ?>
	  </div><!-- sidebar -->
  </div>
</div>
<?php $this->endContent(); ?>

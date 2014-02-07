<?php
/**
 *
 * main.php layout file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    <link rel="stylesheet" href="/css/bootstrap.css">
    -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=cyrillic-ext' rel='stylesheet' type='text/css'>
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400&subset=cyrillic-ext' rel='stylesheet' type='text/css'>


    <?php  //Yii::app()->bootstrap->register(); ?>
	<?php //Yii::app()->bootstrap->registerAllScripts();   ?>
	<?php Yii::app()->bootstrap->registerYiistrapCss(); ?>

	<style>
		/*body {
			padding-top: 60px;
			padding-bottom: 40px;
		}     */
	</style>
	<script src="/js/libs/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="/js/holder.js"></script>
	
    <script> Holder.add_theme("dark", {background:"#0072e6", foreground:"#fff", size:21, font: "Arial"}) </script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">обновите ваш браузер</a> или <a href="http://www.google.com/chromeframe/?redirect=true">активируйте Google Chrome Frame</a>.</p>
<![endif]-->

<?php

$this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => Yii::t('main',Yii::app()->name),
    'display' => null, // default is static to top
    //'color' => TbHtml::NAVBAR_COLOR_INVERSE,
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => Yii::t('main','Home'), 'url' => '/',),
                array('label' => Yii::t('main','Reference'), 'url' => '',
                    'items' => array(
                        array('label' => Yii::t('main','Status'), 'url' => '/Status'),
                        array('label' => Yii::t('main','Category'), 'url' => '/Category'),
                        array('label' => Yii::t('main','Group'), 'url' => '/Group'),
                        TbHtml::menuDivider(),
                        //array('label' => 'Separate link', 'url' => '#'),
                    ),
                    'visible'=>(Yii::app()->user->Role == 'administrator'),
                ),

            ),
        ),
        /*array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label'=> Yii::t('main','Journals'), 'url'=>'#',
                    'items' => Group::listData(),
                ),
            ),
        ),*/
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => Group::listData(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label'=> Yii::t('main','Login'), 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::t('main','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
            'htmlOptions'=>array('class'=>'pull-right'),
        ),
    ),
)); ?>    
<div class="container">
<?php echo $content; ?>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="span1">
                <img src="/img/footer.png" alt=""/>
            </div>
            <div class="span1">
                <a href="#">&copy; <?php echo Yii::t('main', 'tecode'); ?></a>
            </div>
        </div>
    </div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="/js/libs/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script><script>
	var _gaq = [
		['_setAccount', 'UA-XXXXX-X'],
		['_trackPageview']
	];
	(function (d, t) {
		var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
		g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g, s)
	}(document, 'script'));
</script>
</body>
</html>
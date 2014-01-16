<?php


/**
 *
 * main.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
defined('APP_CONFIG_NAME') or define('APP_CONFIG_NAME', 'main');

use Yiinitializr\Helpers\ArrayX;

// web application configuration
return ArrayX::merge(array(
	'name' => 'IT',
	
	'sourceLanguage' => 'en',
    'language' => 'ru',	

	// path aliases
	'aliases' => array(
		'bootstrap' => dirname(__FILE__) . '/../lib/vendor/2amigos/yiistrap',
		'yiiwheels' => dirname(__FILE__) . '/../lib/vendor/2amigos/yiiwheels',
	),

	// application behaviors
	'behaviors' => array(),

	// controllers mappings
	'controllerMap' => array(),

	// application modules
	'modules' => array(),

	// application components
	'components' => array(

		'bootstrap' => array(
			'class' => 'bootstrap.components.TbApi',
		),
		'yiiwheels' => array(   
			'class' => 'yiiwheels.YiiWheels', 
		),

		'clientScript' => array(
			'scriptMap' => array(
				'bootstrap.min.css' => false,
				'bootstrap.min.js' => false,
				'bootstrap-yii.css' => false
			)
		),
		'urlManager' => array(
			// uncomment the following if you have enabled Apache's Rewrite module.
			'urlFormat' => 'path',
			'showScriptName' => false,

			'rules' => array(
				// default rules
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				//'<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
			),
		),
		'user' => array(
			'class' => 'WebUser',
			'allowAutoLogin' => true,
			//'loginUrl' => array('user/login'),
		),
		'authManager' => array(
			// ����� ������������ ���� �������� �����������
			'class' => 'PhpAuthManager',
			// ���� �� ���������. ���, ��� �� ������, ���������� � ����� � �����.
			'defaultRoles' => array('guest'),
		),		
		'errorHandler' => array(
			'errorAction' => 'site/error',
		)
	),
	// application parameters
	'params' => array(),
), require_once('common.php'));
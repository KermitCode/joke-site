<?php

//kermit:modify on 2012-11-3

$kermit=dirname(dirname(__FILE__));

$front=dirname($kermit);

Yii::setPathOfAlias('kermit', $kermit);

date_default_timezone_set("PRC");

$this_dir=dirname(dirname(__FILE__));

return array(
	'basePath' => $front,
	
	'controllerPath' => $kermit.'/controllers',
	
    'viewPath' => $kermit.'/views',
	
    'runtimePath' => $kermit.'/runtime',
	
	'name'=>'',
	
	'charset'=>null,

	'preload'=>array('log'),

	'import'=>array(
		'kermit.models.*',
		'application.class.*',
		'kermit.components.*',
		),

		/*
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
			),
		),*/

	// application components
	'components'=>array(
		/*
		'user'=>array(
			'allowAutoLogin'=>true,
			),*/
		
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		'cache'=>array(
            'class'=>'CFileCache',
       		 ),	

		'db'=>require($this_dir.'/../coreData/db.php'),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace,info,error,warning,xdebug',//add for developing
					'categories'=>'system.db.*',
					'showInFireBug'=>true
					),
				array(
					'class'=>'CProfileLogRoute',
					'levels'=>'error,warning',
					),
				),
		),
	),

	'params'=> include($front.'/coreData/base_data.php'),
	
);
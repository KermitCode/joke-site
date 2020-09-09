<?php

$this_dir=dirname(dirname(__FILE__));

date_default_timezone_set("PRC");

return array(

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	
	'name'=>'',
	
	'charset'=>null,

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.class.*',
		'application.components.*',
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

	'components'=>array(
		/*
		'user'=>array(
			'allowAutoLogin'=>true,
			),*/
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'urlSuffix'=>'.html', 
			'showScriptName'=>false,
			'appendParams'=>true,
			'rules'=>array(		
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',			
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',			
				'<controller:\w+>/<action:\w+>/<id:\d+>-<page:\d+>'=>'XhImage/View',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'cache'=>array(
            'class'=>'CFileCache',
       		 ),		

		'db'=>require($this_dir.'/coreData/db.php'),

		'errorHandler'=>array(
			'errorAction'=>'site/error',
			),
			
		'log'=>array(
		
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error,warning',
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

	'params'=> include($this_dir.'/coreData/base_data.php'),
	
);
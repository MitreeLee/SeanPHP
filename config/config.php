<?php

/******* SeanPHP *******
 * 配置文件
 * Author: SeanLee 929325776@qq.com
 */
return [
	//-[默认控制器]-//
	'default_controller'	=>	'Index',

	//-[默认操作名]-//
	'default_action'		=>	'index',

	//-[数据库配置]-//
	'database'	=>	[
		'host'		=>	'localhost',
		'user'		=>	'root',
		'password'	=>	'',
		'database'	=>	'seanphp',
		'charset'	=>	'utf8'
	],

	//-[静态文件配置]-//
	'public'		=>	'/public/',  //请不要用绝对路径

	//-[模板配置]-//
	'template'	=>	[
		'compile_dir' 		=>	APP_PATH . '/runtime/template/',
		'cache_dir'   		=>	APP_PATH .'/runtime/page/',
		'config_dir'   		=>	APP_PATH .'/runtime/config/',
		'cache'       		=> 	true,
		'cache_lifetime'	=>	60,		//缓存时间 单位秒
		'debugging'   		=>	true,
		'left_delimiter' 	=>	'<{',
		'right_delimiter'	=>	'}>',
		'view_suffix'  		=> 'tpl',
	],
];
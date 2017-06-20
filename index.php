<?php
/******* SeanPHP *******
 * 框架统一入口
 * Author: SeanLee 929325776@qq.com
 * Version: SeanPHP 1.0.0
 * Last modified: 2017.06.18
 */
header("Content-type: text/html; charset=utf-8");

// 应用目录为当前目录
define('APP_PATH', __DIR__ . '/');

// 开启调试模式
define('APP_DEBUG', true);

// 加载框架文件
require(APP_PATH . 'seanphp/SeanPHP.php');

// 加载配置文件
$config = require(APP_PATH . 'config/config.php');

// 实例化框架类
(new SeanPHP($config))->run();

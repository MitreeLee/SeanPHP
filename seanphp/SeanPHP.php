<?php
/******* SeanPHP *******
 * 系统核心调度器
 * Author: SeanLee 929325776@qq.com
 */
define('SeanPHP_Version', '1.0.0');
define('DS', DIRECTORY_SEPARATOR);

class SeanPHP{

    protected $config = [];

    public function __construct($config){
    	$this->checkSupport();
        $this->config = $config;
    }

    //-[运行框架]-//
    public function run(){
        spl_autoload_register([$this, 'loadClass']);
        $this->initEnv();
        $this->route();
    }

    //-[路由]-//
    public function route(){
        $controllerName = isset($this->config['default_controller']) ? $this->config['default_controller'] : 'Index';
        $actionName = isset($this->config['default_controller']) ? $this->config['default_controller'] : 'index';
        $param = [];
        $url = $_SERVER['REQUEST_URI'];
        $position = strpos($url, '?');
        $url = (false === $position) ? $url : substr($url, 0, $position);
	$realDir = $this->getRealDir();
	$url = str_replace($realDir, '', $url);
	$url = trim($url, '/');
        if($url){
            $arr = explode('/', $url);
            $arr = array_filter($arr);
            $controllerName = ucfirst($arr[0]);         
            array_shift($arr);
            $actionName = $arr ? $arr[0] : $actionName;
            array_shift($arr);
            $param = $arr ? $arr : [];
            $this->setGET($param);
        }
        $controller = $controllerName . 'Controller';
        if(!class_exists($controller)){
            exit($controller . '控制器不存在');
        }
        if(!method_exists($controller, $actionName)){
            exit($actionName . '方法不存在');
        }

        // 分发路由
        $dispatch = new $controller($controllerName, $actionName);
        call_user_func_array([$dispatch, $actionName], $param);
    }

    //-[配置环境]-//
    public function initEnv(){
    	// 错误提示
    	if(APP_DEBUG === true){
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        }else{
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
        }

        // 过滤非法字符
        if(get_magic_quotes_gpc()){
            $_GET = isset($_GET) ? $this->trimpSlashesAll($_GET) : '';
            $_POST = isset($_POST) ? $this->trimpSlashesAll($_POST) : '';
            $_COOKIE = isset($_COOKIE) ? $this->trimpSlashesAll($_COOKIE) : '';
            $_SESSION = isset($_SESSION) ? $this->trimpSlashesAll($_SESSION) : '';
        }

        // 设置register_globals
        if(ini_get('register_globals')){
            $array = ['_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES'];
            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }

        // 配置数据库信息
        if ($this->config['database']) {
            Model::$dbConfig = $this->config['database'];
        }
    }

    //-[自动加载控制器和模型]-//
    public static function loadClass($class){
        $framework 	= __DIR__ . DS . $class . '.php';
        $controller = APP_PATH . 'app' . DS . 'controller' . DS . $class . '.php';
        $model 		= APP_PATH . 'app' . DS . 'model' . DS . $class . '.php';
        $util       = __DIR__ . DS . 'util' . DS . $class . '.php';
        
	if(file_exists($framework)){
            include $framework;
        }elseif(file_exists($controller)){
            include $controller;
        }elseif(file_exists($model)){
            include $model;
        }elseif(file_exists($util)){
            include $util;
        }
    }

    //-[删除敏感字符]-//
    public function trimpSlashesAll($val){
        return is_array($val) ? array_map([$this, 'trimpSlashesAll'], $val) : stripslashes($val);
    }

    //-[获取真实的项目入口地址]-//
    private function getRealDir(){
    	$realDir = rtrim(APP_PATH, DS);
        $realDir = str_replace('\\', '/' , $realDir);
        $realDir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $realDir);
	$arr = explode('/', $realDir);
        $ext = $arr[count($arr) -1];
        return $realDir;
    }

    //-[设置$_GET]-//
    private function setGET($param = []){
    	for($i = 0; $i<count($param); $i+=2){
        	$_GET[$param[$i]] = isset($param[$i+1]) ? $param[$i+1] : null;
        }
    }

    //-[检查版本]-//
    private function checkSupport(){
    	if (version_compare("5.4", PHP_VERSION, ">=")) {
		    die("SeanPHP仅支持PHP5.4及以上版本");
		}
    }
}

//-[系统函数库]-//
require_once(__DIR__ . '/Functions.php');

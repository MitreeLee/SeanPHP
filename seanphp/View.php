<?php
/******* SeanPHP *******
 * View基类
 * Author: SeanLee 929325776@qq.com
 */
define('SMARTY_DIR', APP_PATH.'/seanphp/vendor/smarty/');
require(SMARTY_DIR . 'Smarty.class.php');

class View{

    public static $instance = null;
    public static $smarty = null;
    public static $config = null;

    public static function getInstance(){
        if(is_null(self::$config)){
            self::$config = require(APP_PATH . 'config/config.php');
        }
        if(is_null(self::$smarty)){
            self::$smarty = new Smarty();
            self::$smarty->setCompileDir(self::$config['template']['compile_dir']);
            self::$smarty->setConfigDir(self::$config['template']['config_dir']);
            self::$smarty->setCacheDir(self::$config['template']['cache_dir']);
            self::$smarty->left_delimiter = self::$config['template']['left_delimiter'];
            self::$smarty->right_delimiter = self::$config['template']['right_delimiter'];
            self::$smarty->caching = self::$config['template']['cache'];
            self::$smarty->cache_lifetime = self::$config['template']['cache_lifetime'];
            self::$smarty->static_path = base_url() . DS . self::$config['public'];
        }
        if(is_null(self::$instance)){
            self::$instance = new View;
        }
        return self::$instance;
    }

    public function assign($k, $v){
        self::$smarty->assign($k, $v);
    }

    public function display($template, $options = null){
        if(!isset($template)){
            die('没有模板');
        }

        if(isset($options) && is_array($options)){
            foreach ($options as $key => $val) {
                self::$smarty->assign($key, $val);
            }
        }
        if(! strpos($template, '.')){
            $template = APP_PATH .'app' . DS . 'view' . DS . $template . '.' . self::$config['template']['view_suffix'];
            self::$smarty->display($template);
        }
    }

    public function fetch($template, $options = null){
        if(!isset($template)){
            die('没有模板');
        }

        if(isset($options) && is_array($options)){
            foreach ($options as $key => $val) {
                self::$smarty->assign($key, $val);
            }
        }
        if(! strpos($template, '.')){
            $template = APP_PATH .'app' . DS . 'view' . DS . $template . '.' . self::$config['template']['view_suffix'];
            return self::$smarty->fetch($template);
        }
    }
}
<?php
/******* SeanPHP *******
 * Controller基类
 * Author: SeanLee 929325776@qq.com
 */
class Controller{

    protected $view = null;
    protected $assign = [];
    protected $controllerName = '';

    public function __construct(){
        $this->view = View::getInstance();
        $this->controllerName = $this->getControllerName();
    }

    protected function assign($k, $v = null){
        if(is_array($k)){
            foreach ($k as $key => $val) {
                $this->assign[$key] = $val;
            }
        }else{  
            $this->assign[$k] = $v;
        }
    }

    protected function display($template, $options = []){
        if(!empty($options) && is_array($options)){
            $this->assign = array_merge($this->assign, $options);
        }
        $template = strpos($template, '/') ? $template : $this->controllerName . '/' .$template;
        $this->view->display($template, $this->assign);
    }

    protected function fetch($template, $options = []){
        if(!empty($options) && is_array($options)){
            $this->assign = array_merge($this->assign, $options);
        }
        $template = strpos($template, '/') ? $template : $this->controllerName . '/' .$template;
        return $this->view->fetch($template, $this->assign);
    }

    protected function getController(){
        return get_called_class();
    }

    protected function getControllerName(){
        return str_replace('Controller', '', $this->getController());
    }

    protected function getVersion(){
        if(defined('SeanPHP_Version')){
            return SeanPHP_Version;
        }
    }
}
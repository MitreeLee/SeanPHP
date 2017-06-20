<?php
/**
 * Smarty {js} function plugin
 * Type:     function<br>
 * Name:     js<br>
 * Purpose:  import javascript file
 * @author   SeanLee 
 */
function smarty_function_js($params, $template)
{   
    $file = isset($params['file']) ? $params['file'] : '';
    if(!strpos($file, '.js')){
        $file .= '.js';
    }
    $file = $template->static_path . $file;
    $file = str_replace('/', DS, $file);
    return '<script type="text/javascript" src="' . $file . '"></script>';
}

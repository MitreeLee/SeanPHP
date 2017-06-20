<?php
/**
 * Smarty {css} function plugin
 * Type:     function<br>
 * Name:     css<br>
 * Purpose:  import css file
 * @author   SeanLee 
 */
function smarty_function_css($params, $template)
{
    $file = isset($params['file']) ? $params['file'] : '';
    if(!strpos($file, '.css')){
        $file .= '.css';
    }
    $file = $template->static_path . $file;
    $file = str_replace('/', DS, $file);
    return '<link rel="stylesheet" type="text/css" href="' . $file . '" />';
}

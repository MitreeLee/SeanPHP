<?php
/**
 * Smarty {import} function plugin
 * Type:     function<br>
 * Name:     import<br>
 * Purpose:  import css / js file
 * @author   SeanLee 
 */
function smarty_function_import($params, $template)
{
    $file = isset($params['file']) ? $params['file'] : '';
    $type = isset($params['type']) ? $params['type'] : '';
    $parseStr = '';
    // 文件方式导入
    $array = explode(',', $file);
    foreach ($array as $val) {
        $type = strtolower(substr(strrchr($val, '.'), 1));
        switch ($type) {
            case 'js':
                $js = $template->static_path . $val;
                $js = str_replace('/', DS, $js);
                $parseStr .= '<script type="text/javascript" src="' . $js . '"></script>';
                break;
            case 'css':
                $css = $template->static_path . $val;
                $css = str_replace('/', DS, $css);
                $parseStr .= '<link rel="stylesheet" type="text/css" href="' . $css . '" />';
                break;
        }
    }
    return $parseStr;
}

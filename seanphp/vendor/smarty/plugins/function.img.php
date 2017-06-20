<?php
/**
 * Smarty {img} function plugin
 * Type:     function<br>
 * Name:     img<br>
 * Purpose:  import img file
 * @author   SeanLee 
 */
function smarty_function_img($params, $template)
{	
    $src = isset($params['src']) ? $params['src'] : '';
    if(isset($params['src'])){
    	unset($params['src']);
    }
    $other = '';
    if(count($params) > 0){
	    foreach ($params as $key => $val) {
	    	$other .= $key . '=' . $val;
	    }
	}
    $src = $template->static_path . $src;
    $src = str_replace('/', DS, $src);
    return '<img src="' .$src. '" ' .$other. '/>';
}

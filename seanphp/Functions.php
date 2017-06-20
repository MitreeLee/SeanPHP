<?php

function base_url(){
    $clean_url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : NULL;
    $clean_url = dirname(substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF']) - strlen($clean_url)));
    $clean_url = rtrim($_SERVER['HTTP_HOST'] . $clean_url, '/\\');

    if ((isset($_SERVER['HTTPS']) AND !in_array(strtolower($_SERVER['HTTPS']), array('off', 'no', 'false', 'disabled'))) OR $_SERVER['SERVER_PORT'] == 443)
    {
        $scheme = 'https';
    }
    else
    {
        $scheme = 'http';
    }

    return $scheme . '://' . $clean_url;
}
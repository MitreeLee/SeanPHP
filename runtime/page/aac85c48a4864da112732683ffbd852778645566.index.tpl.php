<?php
/* Smarty version 3.1.30, created on 2017-06-19 17:25:59
  from "E:\Program Files (x86)\wamp\www\SeanPHP\app\view\Index\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5947ed07a6c5d0_71254934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2976382914c7bbd0d672c44a3cc9bb84d723881' => 
    array (
      0 => 'E:\\Program Files (x86)\\wamp\\www\\SeanPHP\\app\\view\\Index\\index.tpl',
      1 => 1497885950,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 60,
),true)) {
function content_5947ed07a6c5d0_71254934 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>SeanPHP</title>
	    <link rel="stylesheet" type="text/css" href="http:\\localhost\SeanPHP\\public\css\animation.css" />
	    <link rel="stylesheet" type="text/css" href="http:\\localhost\SeanPHP\\public\plugins\SeanUI\css\sean.css" />
	    <link rel="stylesheet" type="text/css" href="http:\\localhost\SeanPHP\\public\css\app.css" />
	    <!-- Bootstrap -->
	    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	  </head>
  	<body>
	    <div class="container" id="container">
	    	<canvas id="canvas-container"></canvas>
	    	<div class="main">
	    		<div class="title">
	    			<h2>欢迎来到SeanPHP.</h2>
	    		</div>
	    		<div class="motto">
		    		SeanPHP 是一个简单开源的PHP框架
		    	</div>
		    	<div class="author">
		    		@author: SeanLee
		    		<div class="sns">
	    				<ul>
	    					<li>
	    						<a href="http://weibo.com/littlelxm" target="_blank">
	    							<img src="http:\\localhost\SeanPHP\\public\image\sns\sina-weibo.png" alt=title=微博/>
		    					</a>
	    					</li>
	    					<li>
	    						<a href="https://github.com/SeanLee97" target="_blank">
	    							<img src="http:\\localhost\SeanPHP\\public\image\sns\github.png" alt=title=github/>
	    						</a>
	    					</li>
	    				</ul>
	    			</div>
		    	</div>
	    	</div>
	    </div>

	    <script type="text/javascript" src="http:\\localhost\SeanPHP\\public\plugins\SeanUI\js\sean.js"></script>
	    <script type="text/javascript" src="http:\\localhost\SeanPHP\\public\plugins\SeanUI\js\bg.js"></script>
	    <script type="text/javascript" src="http:\\localhost\SeanPHP\\public\js\app.js"></script>
	    <script type="text/javascript">
	    	//调用执行
			window.onload = function () {
			    $bg.init('canvas-container');
			    setInterval(function () {
			        $bg.refresh()
			    }, 16);
			}
	    </script>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html><?php }
}

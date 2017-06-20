<?php
/* Smarty version 3.1.30, created on 2017-06-20 22:40:38
  from "/home/wwwroot/default/SeanPHP/app/view/Index/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594933e6b59eb6_75225739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de108c47f185d11d097064f91fd7f6d5941920aa' => 
    array (
      0 => '/home/wwwroot/default/SeanPHP/app/view/Index/index.tpl',
      1 => 1497885952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594933e6b59eb6_75225739 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_css')) require_once '/home/wwwroot/default/SeanPHP/seanphp/vendor/smarty/plugins/function.css.php';
if (!is_callable('smarty_function_img')) require_once '/home/wwwroot/default/SeanPHP/seanphp/vendor/smarty/plugins/function.img.php';
if (!is_callable('smarty_function_js')) require_once '/home/wwwroot/default/SeanPHP/seanphp/vendor/smarty/plugins/function.js.php';
$_smarty_tpl->compiled->nocache_hash = '1109799651594933e6b31173_37960923';
?>
<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>SeanPHP</title>
	    <?php echo smarty_function_css(array('file'=>"css/animation.css"),$_smarty_tpl);?>

	    <?php echo smarty_function_css(array('file'=>"plugins/SeanUI/css/sean"),$_smarty_tpl);?>

	    <?php echo smarty_function_css(array('file'=>"css/app.css"),$_smarty_tpl);?>

	    <!-- Bootstrap -->
	    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <?php echo '<script'; ?>
 src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
	      <?php echo '<script'; ?>
 src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
	    							<?php echo smarty_function_img(array('src'=>"image/sns/sina-weibo.png",'alt'=>'','title'=>"微博"),$_smarty_tpl);?>

		    					</a>
	    					</li>
	    					<li>
	    						<a href="https://github.com/SeanLee97" target="_blank">
	    							<?php echo smarty_function_img(array('src'=>"image/sns/github.png",'alt'=>'','title'=>"github"),$_smarty_tpl);?>

	    						</a>
	    					</li>
	    				</ul>
	    			</div>
		    	</div>
	    	</div>
	    </div>

	    <?php echo smarty_function_js(array('file'=>"plugins/SeanUI/js/sean"),$_smarty_tpl);?>

	    <?php echo smarty_function_js(array('file'=>"plugins/SeanUI/js/bg"),$_smarty_tpl);?>

	    <?php echo smarty_function_js(array('file'=>"js/app"),$_smarty_tpl);?>

	    <?php echo '<script'; ?>
 type="text/javascript">
	    	//调用执行
			window.onload = function () {
			    $bg.init('canvas-container');
			    setInterval(function () {
			        $bg.refresh()
			    }, 16);
			}
	    <?php echo '</script'; ?>
>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <?php echo '<script'; ?>
 src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <?php echo '<script'; ?>
 src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}

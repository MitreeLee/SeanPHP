<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>SeanPHP</title>
	    <{css file="css/animation.css"}>
	    <{css file="plugins/SeanUI/css/sean"}>
	    <{css file="css/app.css"}>
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
	    							<{img src="image/sns/sina-weibo.png" alt="" title="微博"}>
		    					</a>
	    					</li>
	    					<li>
	    						<a href="https://github.com/SeanLee97" target="_blank">
	    							<{img src="image/sns/github.png" alt=""  title="github"}>
	    						</a>
	    					</li>
	    				</ul>
	    			</div>
		    	</div>
	    	</div>
	    </div>

	    <{js file="plugins/SeanUI/js/sean"}>
	    <{js file="plugins/SeanUI/js/bg"}>
	    <{js file="js/app"}>
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
</html>
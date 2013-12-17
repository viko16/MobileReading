<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$this->option_model->get_option('site_name');?> - 管理员登录</title>
	<!-- BootStrap css-->
	<link href="<?= base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<!--[if lte IE 7]>
	<link href="<?= base_url('public/css/bootstrap-ie6.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/css/ie.css') ?>" rel="stylesheet" type="text/css">
	<![endif]-->
	<style type="text/css">
		body{font-family: "方正品尚黑简体","极限丽黑", "微软雅黑", "Helvetica Neue", Helvetica, Arial, sans-serif;padding: 30px;}
		form{margin-left: auto;margin-right: auto;text-align: center;width: 220px;margin-top: 100px;}
		#submit{float: right;}
		.form-signin-heading{text-align: left;}
		.back{float: left;}
		.input-big{width: 236px;}
	</style>
	<!-- jquery-->
	<script src="<?= base_url('public/js/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
	<!-- Bootstrap js -->
	<script src="<?= base_url('public/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	<!--[if lte IE 7]>
	<script src="<?= base_url('public/js/bootstrap-ie.js') ?>" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript">
	function addCheck() {
	    var username = $("#username").val();
	    var password = $("#password").val();
	    if (username == "") {
	        alert("用户名不能为空!");
	        $("#username").focus();
	        return false;
	    }
	    if (password == "") {
	        alert("密码不能为空!");
	        $("#password").focus();
	        return false;
	    }
	}
	$(document).ready(function() {
		$("#username").focus();
	});
	</script>
</head>	
<body>
	<div class="container-fluid">
		<div class="row-fluid">
				<form class="form-signin" method="post" onsubmit="javascript: return addCheck()">
					<fieldset>
						<legend><small><?=$this->option_model->get_option('site_name');?>  - 管理员登录</small></legend>
						<h2 class="form-signin-heading">登录</h2>
						<input type="text" class="input-big" placeholder="学号" name="username" id="username"><br>
						<input type="password" class="input-big" placeholder="密码" name="password" id="password"><br>
						<a href="<?=base_url()?>" class="back">返回首页</a>
						<button class="btn btn-primary" type="submit" id="submit">登录</button>
					</fieldset>
				</form>
		</div>
	</div>
</body>
</html>
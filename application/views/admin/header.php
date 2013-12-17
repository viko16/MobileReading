<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>管理后台</title>
	<!-- jquery-->
    <script src="<?= base_url('public/js/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
    <!-- DataTables js -->
    <script src="<?=base_url('public/js/jquery.dataTables.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('public/js/DT_bootstrap.js')?>" type="text/javascript"></script>
    <!-- BootStrap css-->
    <link href="<?= base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- DataTables css -->
    <link href="<?=base_url('public/css/DT_bootstrap.css')?>" rel="stylesheet" type="text/css">
    <!--[if lte IE 7]>
    <link href="<?= base_url('public/css/bootstrap-ie6.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/css/ie.css') ?>" rel="stylesheet" type="text/css">
    <style type="text/css">.span10{width:74.41% !important;}</style>
    <![endif]-->
    <!-- Bootstrap js -->
    <script src="<?= base_url('public/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!--[if lte IE 7]>
    <script src="<?= base_url('public/js/bootstrap-ie.js') ?>" type="text/javascript"></script>
    <![endif]-->
    <!-- Custom css -->
    <link href="<?= base_url('public/css/admin-style.css') ?>"  rel="stylesheet" type="text/css">
    <!-- UEditor -->
    <link rel="stylesheet" href="<?= base_url('public/ueditor/themes/default/css/umeditor.min.css') ?>">
    <script type="text/javascript" charset="utf-8" src="<?= base_url('public/ueditor/umeditor.config.js') ?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?= base_url('public/ueditor/umeditor.min.js') ?>"></script>
    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap-datetimepicker.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('public/js/bootstrap-datetimepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/js/bootstrap-datetimepicker.zh-CN.js') ?>"></script>
    <!-- 回到顶部按钮 -->
	<script src="<?= base_url('public/js/back-to-top.min.js') ?>" type="text/javascript"></script>
	<!-- uploadify -->
	<script src="<?=base_url('public/uploadify/jquery.uploadify.min.js')?>" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/uploadify/uploadify.css')?>">
</head>
<body>
<div class="container-fluid">
	<div class="page-header">
		<h1>
			<?=$this->option_model->get_option('site_name');?> 
			<small> - 管理后台</small>
		</h1>
	</div>
	<div class="row-fluid">
		<!-- 侧栏 -->
		<div class="span2" id="sidebar">
			<div class="main-block">
			    <h4>
			        <span><b class="text-warning">管理员，你好</b></span>
			    </h4>
			    <!-- <hr> -->
			    <ul class="nav nav-list">
			    	<?php if (!isset($id)) {$id=null;} /*导航栏指示*/?>
			    	<li class="nav-header">管理后台</li>
			        <li><a href="<?= base_url('admin/logout') ?>">登出</a></li>
			        <li><a href="<?= base_url() ?>">返回前台</a></li> 
			        <li class="nav-header">文章管理</li>
			        <li class="<?=($id === 'addArticle')?'active':''?>"><a href="<?= base_url('admin/article/add') ?>">发布文章</a></li>
			        <li class="<?=($id === 'manageArticle')?'active':''?>"><a href="<?= base_url('admin/article/manage') ?>">文章列表</a></li>
			        <li class="nav-header">各种设置</li>
			        <li class="<?=($id === 'modifyAdminInfo')?'active':''?>"><a href="<?= base_url('admin/setting/modifyAdminInfo') ?>">修改密码</a></li>
			        <liclass="<?=($id === 'modifyOption')?'active':''?>"><a href="<?= base_url('admin/setting/modifyOption') ?>">站点设置</a></li>
			        
			    </ul>
			</div>
		</div>
		<div class="span10">
			<div class="main-block">
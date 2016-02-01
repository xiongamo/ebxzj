<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/ebxzj/Public/admin/Css/general.css" />
<link rel="stylesheet" type="text/css" href="/ebxzj/Public/admin/Css/top.css" />
<script type="text/javascript" src="/ebxzj/Public/admin/Js/jquery.js"></script>
</head>
<body>
<div id="header-div">
	<div id="logo-div" style="bgcolor:#000000;"><!-- <img src="__TMPL__Style/Img/top_logo.gif"/> --></div>
	<div id="submenu-div">
		<ul>
		<li><a href="{C('FRONT_ADDRESS')}" target="_blank">访问前台</a></li>
		<li><a target="_top" href="/ebxzj/index.php/admin/">刷新</a></li>
		<!-- <li><a href="/ebxzj/index.php/Index/about" target="main-frame">关于系统</a></li> -->
		<li><a href="/ebxzj/index.php/Admins/self" target="main-frame"><?php echo ($SESSION["USER"]["name"]); ?></a></li>
		<li style="border-left:none;"><a href="/ebxzj/index.php/admin/Index/out" target="_top" class="fix-submenu">退出</a></li>
		</ul>
	</div>
</div>
<div id="menu-div">
<ul>
	<li class="fix-spacel">&nbsp;</li>
	<li><a href="admin/Index/left" target="menu-frame">主菜单</a></li>
	
<li class="fix-spacer">&nbsp;</li>
</ul>
<br class="clear" />
</div>
<script type="text/javascript">
<!--
$(function(){
	$('#menu-div li a').click(function(){
		$('#menu-div li a').css('color','');
		$(this).css('color','#EB8A3D');
	});
});
//-->
</script>
</body>
</html>
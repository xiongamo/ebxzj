<?php /* Smarty version Smarty-3.1.6, created on 2016-01-17 14:04:32
         compiled from "./Application/Admin/View/Index/top.html" */ ?>
<?php /*%%SmartyHeaderCode:360887509569b2ef0d13639-28578892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad341dd297eb2a5bfb832ed0097328a92d88b3fa' => 
    array (
      0 => './Application/Admin/View/Index/top.html',
      1 => 1453010527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '360887509569b2ef0d13639-28578892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SESSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_569b2ef0d5272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569b2ef0d5272')) {function content_569b2ef0d5272($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__TMPL__Style/Css/general.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__Style/Css/top.css" />
<script type="text/javascript" src="__TMPL__Style/Js/jquery.js"></script>
</head>
<body>
<div id="header-div">
	<div id="logo-div" style="bgcolor:#000000;"><!-- <img src="__TMPL__Style/Img/top_logo.gif"/> --></div>
	<div id="submenu-div">
		<ul>
		<li><a href="<?php echo C('FRONT_ADDRESS');?>
" target="_blank">访问前台</a></li>
		<li><a target="_top" href="__APP__">刷新</a></li>
		<!-- <li><a href="__APP__/Index/about" target="main-frame">关于系统</a></li> -->
		<li><a href="__APP__/Admins/self" target="main-frame"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['USER']['name'];?>
</a></li>
		<li style="border-left:none;"><a href="__APP__/Index/out" target="_top" class="fix-submenu">退出</a></li>
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
</html><?php }} ?>
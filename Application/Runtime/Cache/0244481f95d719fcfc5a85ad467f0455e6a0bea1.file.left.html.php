<?php /* Smarty version Smarty-3.1.6, created on 2016-01-17 14:11:55
         compiled from "./Application/Admin/View/Index/left.html" */ ?>
<?php /*%%SmartyHeaderCode:358613836569b2dd73b1149-82020641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0244481f95d719fcfc5a85ad467f0455e6a0bea1' => 
    array (
      0 => './Application/Admin/View/Index/left.html',
      1 => 1453011111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '358613836569b2dd73b1149-82020641',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_569b2dd741051',
  'variables' => 
  array (
    'menu' => 0,
    'list' => 0,
    'name' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569b2dd741051')) {function content_569b2dd741051($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__TMPL__Style/Css/general.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__Style/Css/left.css" />
<script type="text/javascript" src="__APP__/Style/Js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Style/Js/base.js"></script>
<base target="main-frame"/>
</head>
<body>
<div id="m">
<div id="main-div">
<div id="menu-list">
<ul>
__CONTROLLER__
<?php if ($_smarty_tpl->tpl_vars['menu']->value){?>
<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
<li class="<?php echo $_smarty_tpl->tpl_vars['list']->value['class'];?>
" name="menu">
	<span class="menu"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</span>
	<?php if ($_smarty_tpl->tpl_vars['list']->value['list']){?>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<ul <?php if ($_smarty_tpl->tpl_vars['list']->value['class']=='collapse'){?>style="display:none;"<?php }?>>
		<li class="menu-item"><a href="__APP__<?php echo $_smarty_tpl->tpl_vars['v']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value[1];?>
</a></li>
	</ul>
	<?php } ?>
	<?php }?>
</li>
<?php } ?>
<?php }?>
</ul>
</div>
</div>
</div>
<script type="text/javascript">
<!--
$(function(){
	$('.menu-item a').click(function(){
		$('.menu-item a').css({ color:'','font-weight':''});
		$(this).css({ color:'#EB8A3D','font-weight':'bold'});
	});
});
//-->
</script>
</body>
</html><?php }} ?>
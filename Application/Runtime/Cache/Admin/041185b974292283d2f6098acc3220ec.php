<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="/ebxzj/Public/admin/Css/login.css" />
<script type="text/javascript" src="/ebxzj/Public/admin/Js/jquery.js"></script>
</head>
<body>
<div class="wrap">
<h1><a href="./">&nbsp;</a></h1>
<form method="post" name="login" autoComplete="off">
<div class="login">
<ul>
	<li><input class="input" required name="name" type="text" placeholder="帐号名" title="帐号名" /></li>
	<li><input class="input" required name="password" type="password" placeholder="密码" title="密码" /></li>
</ul>
<button type="submit" name="submit" class="btn">登录</button>
</div>
</div>
</body>
</html>
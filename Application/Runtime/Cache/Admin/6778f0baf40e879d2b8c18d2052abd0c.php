<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/ebxzj/Public/admin/Css/general.css" />
<link rel="stylesheet" type="text/css" href="/ebxzj/Public/admin/Css/left.css" />
<script type="text/javascript" src="/ebxzj/Public/admin/Js/jquery.js"></script>
<script type="text/javascript" src="/ebxzj/Public/admin/Js/base.js"></script>
<base target="main-frame"/>
</head>
<body>
<div id="m">
<div id="main-div">
<div id="menu-list">
<ul>
<?php if($menu != false): if(is_array($menu)): foreach($menu as $name=>$list): ?><li class="<?php echo ($list["class"]); ?>" name="menu">
	<span class="menu"><?php echo ($name); ?></span>
	<?php if($list['list'] != false): if(is_array($list["list"])): foreach($list["list"] as $key=>$v): ?><ul <?php if($list["class"] == 'collapse'): ?>style="display:none"<?php endif; ?>>
			<li class="menu-item"><a href="/ebxzj/index.php<?php echo ($v["o"]); ?>"><?php echo ($v["1"]); ?></a></li>
		</ul><?php endforeach; endif; endif; ?>
</li><?php endforeach; endif; endif; ?>
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
</html>
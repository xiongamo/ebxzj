<?php
return array(
	//'配置项'=>'配置值'
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => SAE_MYSQL_HOST_M , // 服务器地址
		'DB_NAME'   => 'app_ebxzj', // 数据库名
		'DB_USER'   => SAE_MYSQL_USER , // 用户名
		'DB_PWD'    => SAE_MYSQL_PASS, // 密码
		'DB_PORT'   => SAE_MYSQL_PORT, // 端口
		'DB_PREFIX' => 't_', // 数据库表前缀
		
		'TMPL_L_DELIM'=>'{',
		'TMPL_R_DELIM'=>'}',
		
		'LOAD_EXT_CONFIG' => array(
			'menu',
		),
);
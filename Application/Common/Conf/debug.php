<?php
return array(
	//'配置项'=>'配置值'
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'ebxzj', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'mochaokai', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 't_', // 数据库表前缀
		
		'TMPL_L_DELIM'=>'{',
		'TMPL_R_DELIM'=>'}',
		
		'LOAD_EXT_CONFIG' => array(
			'menu',
		),
);
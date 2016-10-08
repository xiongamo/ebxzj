<?php
defined('THINK_PATH') or exit();
return array(
		'menu' => array(
				'客户管理'=>array(
						'code'=>'user_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/User','所有客户')
						)
				),
				'文章管理'=>array(
						'code'=>'hotel_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/Article','保险知识'),
								array('/Guide','理赔流程'),
								array('/Locationcontent','首页图片滚动'),
						)
				),
				
		)
);
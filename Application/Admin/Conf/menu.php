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
								array('/Hotel','保险知识'),
								array('/Hotel/region_list','理赔流程'),
								array('/Region/hot_region_list','首页图片滚动'),
						)
				),
				
		)
);
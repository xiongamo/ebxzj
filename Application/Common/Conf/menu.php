<?php
defined('THINK_PATH') or exit();
return array(
		'menu' => array(
				'项目管理'=>array(
						'code'=>'borrow_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/Borrow','项目列表')
						)
				),
				'酒店管理'=>array(
						'code'=>'hotel_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/Hotel','酒店列表'),
								array('/Hotel/region_list','广告/城市图标管理'),
								array('/Region/hot_region_list','广告/城市图标管理(new)'),
						)
				),
				'订单管理'=>array(
						'code'=>'order_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/Order/hotels','酒店预订'),
								array('/Order/gathers','项目认筹'),
								array('/Order/reservation','项目预约')
						)
				),
				'会员相关'=>array(
						'code'=>'member_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/User','会员列表'),
								//array('/UserScore','会员积分管理'),
								array('/UserScore/scoreChangeList','积分变更审核'),
								array('/UserScore/showScoreLogList','积分变更日志'),
								array('/Customer','实名认证管理'),
						)
				),
				'文章管理'=>array(
						'code'=>'wenzhang_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/ArticleClass','分类管理'),
								array('/Article','文章列表'),
								array('/ArticleComment','评论管理')
						)
				),
				'模块管理'=>array(
						'code'=>'mokuaiguanli',
						'class'=>'explode',
						'list'    =>array(
								array('/Location','位置管理'),
								array('/FriendLink','友情链接'),
								array('/Comment','投诉建议'),
								array('/Topic','专题管理'),
						)
				),
				'众筹分类导航'=>array(
						'code'=>'nav_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/NavClass','众筹分类管理'),
								array('/Nav','众筹导航管理')
						)
				),
				'图片管理'=>array(
						'code'=>'tupianguanli',
						'class'=>'explode',
						'list'    =>array(
								array('/Img','图片'),
								array('/ImgClass','图片分类')
						)
				),
				'网站营销'=>array(
						'code'=>'wangzhanyingxiao',
						'class'=>'explode',
						'list'    =>array(
								array('/Bbs','论坛推广'),
								array('/Email','邮件营销'),
								array('/UserRelation','用户关系'),
								array('/InviteCode','邀请码记录'),
						)
				),
				'后台用户相关'=>array(
						'code'=>'admin_user_manage',
						'class'=>'explode',
						'list'    =>array(
								array('/Admins','用户管理'),
								array('/AdminsGroup','角色管理'),
								array('/AdminsPurview','权限管理'),
								array('/AdminsLoginLog','登录日志')
						)
				),

				'系统管理'=>array(
						'code'=>'xitongguanli',
						'class'=>'explode',
						'list'    =>array(
								array('/Configes','系统配置'),
								array('/Cache','缓存管理'),
								array('/Menus','快捷菜单'),
								array('/Region','全球地区管理'),
								array('/Compressor','css/js压缩管理'),
						)
				),
				 
				/*'招聘管理'=>array(
				 'code'=>'zhaopinguanli',
						'class'=>'explode',
						'list'    =>array(
								array('/RecruitType','招聘类别'),
								array('/Recruit','发布招聘'),

						)
				)*/
		)
);
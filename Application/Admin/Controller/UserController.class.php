<?php
namespace Admin\Controller;
/**
 * 所有客户列表
 * @author mo
 *
 */
class UserController extends BaseController{
	public function index(){
		//实例化user模型
		$user = D('Common/User');
		//接收参数
		$mobile = I('mobile');
		$username = I('username');
		$page = I('p')?:1;
		$where = array();
		if(!empty($mobile)){
			$where['tel'] = array('like',$mobile);
		}
		if(!empty($username)){
			$where['name'] = array('like',$username);
		}
		//数据查询
		$limit = 10;
		$offset = ($page-1)*$limit;
		$user_list = $user->user_lists('',$limit,$offset,$where);
		$all_count = $user->user_count();
		//构造分页
		$page = new \Think\Page($all_count, $limit);
		$page_str = $page->show();
		
		$this->assign('user_list', $user_list);
		$this->assign('page', $page_str);
		$this->display();
		
	}
	
	/**
	 * 禁用、解禁账号
	 * @author mochaokai
	 */
	public function set(){
		$state = (int)!I('state');
		$uid = I('id');
		$data = array('islock' => $state);
		//实例化user类
		$user = D('Common/User');
		$result = $user->user_update($uid, $data);
		if($result === false){
			$this->error('出错');
		}else{
			header('location:'.__MODULE__.'/User/index');
		}
	}
}
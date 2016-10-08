<?php
namespace Admin\Controller;
/**
 * 主页滚动内容设置
 * @author mochaokai
 */
class LocationcontentController extends BaseController{
	/**
	 * 首页
	 * @author mochaokai
	 */
	public function index(){
		$locationcontent = D('Common/LocationContent');
		$list = $locationcontent->LC_list();
		$this->assign('list', $list);
		$this->display();
	}
	
	/**
	 * 增加操作页面
	 * @author mochaokai
	 */
	public function add(){
		if(IS_POST){
			$locationcontent = D('Common/LocationContent');
			$data['title'] = I('title');
			$data['url'] = I('url');
			$data['sort'] = I('sort', 0);
			$data['img'] = I('img');
			$result = $locationcontent->LC_add($data);
			if($result){
				$this->success('操作成功', U('admin/locationcontent/index'));
				exit;
			}else{
				$this->error('操作失败');
				exit;
			}
		}
		$this->display();
	}
	
	/**
	 * 修改操作
	 * @author mochaokai
	 */
	public function modify(){
		$id = I('id', 0, 'intval');
		if(!$id){
			$this->error('参数错误');
			exit;
		}
		$locationcontent = D("Common/LocationContent");
		if(IS_POST){
			$data['title'] = I('title');
			$data['url'] = I('url');
			$data['sort'] = I('sort', 0);
			$data['img'] = I('img');
			
			$where = array('id' => $id);
			$result = $locationcontent->LC_set($where, $data);
			if($result){
				$this->success('操作成功', U('admin/locationcontent/index'));
				exit;
			}else{
				$this->error('操作失败');
				exit;
			}
		}
		$list = $locationcontent->LC_info(array('id' => $id));
		$this->assign('list', $list);
		$this->display();
	}
	
	/**
	 * 显示/隐藏
	 * @author mochaokai
	 */
	public function set(){
		$id = I('id', 0, 'intval');
		$data['is_show'] = I('state', '','intval');
		if(!$id){
			$this->error('参数错误');
			exit;
		}
		$where = array('id' => $id);
		$locationcontent = D("Common/LocationContent");
		$result = $locationcontent->LC_set($where, $data);
		if($result){
			$this->success('操作成功', U('admin/locationcontent/index'));
		}else{
			$this->error('操作失败');
		}
	}
	
	/**
	 * 删除
	 * @author mochaokai
	 */
	public function delete(){
		$id = I('id', 0, 'intval');
		if(!id){
			$this->error('参数错误');
			exit;
		}
		$where = array('id' => $id);
		$data['is_del'] = 1;
		$locationcontent = D('Common/LocationContent');
		$result = $locationcontent->LC_set($where, $data);
		if($result){
			$this->success('操作成功', U('admin/locationcontent/index'));
		}else{
			$this->error('操作失败');
		}
	}
}
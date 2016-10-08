<?php
namespace Home\Controller;
use Think;
/**
 * 保险知识
 * @author mochaokai
 */
class KnowledgeController extends BaseController{
	//每页显示条数
	private $limit = 10;
	public function _initialize(){
		parent::_initialize();
		$this->assign('menuitem', 'knowledge');
	}
	/**
	 * 保险知识首页
	 * @author mochaokai
	 */
	public function index(){
		//推荐保险知识
		$article_type = C('article');
		$where = array(
				'type_id' => $article_type['knowledge']['id'],
				'iscommend' => 1,
				'is_show' => 1,
		);
		$db = D('Common/Article');
		$commend_list = $db->article_list($where, 'create_time desc', 10);
		$this->assign('commend_list', $commend_list);
		
		//保险知识列表
		$where1 = array(
				'type_id' => $article_type['knowledge']['id'],
				'is_show' => 1,
		);
		$list = $db->article_list($where1, 'create_time desc', $this->limit, (I('p', 1)-1)*$this->limit);
		$count = $db->where($where1)->count();
		$this->assign('list', $list);
		$page = new Think\Page($count, $this->limit);
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$this->assign('page', $page->show());
		$this->display();
	}
	
	/**
	 * 文章详情
	 * @author chaokai@gz-zc.cn
	 */
	public function info(){
		$id = I('id', 0, 'intval');
		if(!$id){
			$this->error('参数错误');exit;
		}
		//推荐保险知识
		$article_type = C('article');
		$where = array(
				'type_id' => $article_type['knowledge']['id'],
				'iscommend' => 1,
				'is_show' => 1,
		);
		$db = D('Common/Article');
		$commend_list = $db->article_list($where, 'create_time desc', 10);
		$this->assign('commend_list', $commend_list);
		$info = D('Common/Article')->where(array('id' => $id))->find();
		$info['content'] = htmlspecialchars_decode($info['content']);
		$this->assign('info', $info);
		$this->display();
	}
}
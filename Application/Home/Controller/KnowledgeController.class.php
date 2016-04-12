<?php
namespace Home\Controller;
/**
 * 保险知识
 * @author mochaokai
 */
class KnowledgeController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
		$this->assign('menuitem', 'knowledge');
	}
	/**
	 * 保险知识首页
	 * @author mochaokai
	 */
	public function index(){
		$this->display();
	}
}
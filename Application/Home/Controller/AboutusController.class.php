<?php
namespace Home\Controller;
/**
 * 关于我们
 * @author mochaokai
 */
class AboutusController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
		$this->assign('menuitem', 'aboutus');
	}
	/**
	 * 关于我们首页
	 * @author mochaokai
	 */
	public function index(){
		$this->display();
	}
}
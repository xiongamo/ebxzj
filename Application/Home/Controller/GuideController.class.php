<?php
namespace Home\Controller;
/**
 * 理赔指引
 * @author mochaokai
 */
class GuideController extends BaseController{
	
	public function _initialize(){
		$this->assign('menuitem', 'guide');
	}
	/**
	 * 理赔首页
	 * @author mochaokai
	 */
	public function index(){
		$this->display();
	}
}
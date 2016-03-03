<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
class IndexController extends BaseController {
	
	public function _initialize(){
		$this->assign('menuitem', 'index');
	}
	
    public function index(){
    	$user = D('Common/User');
    	$this->display();
    }
}
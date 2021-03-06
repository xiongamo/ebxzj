<?php
/**
 * 首页
 * @author chaokai@gz-zc.cn
 *
 */
namespace Home\Controller;
class IndexController extends BaseController {
	
	public function _initialize(){
		parent::_initialize();
		$this->assign('menuitem', 'index');
	}
	
    public function index(){
    	//轮播图片
    	$lc = D('Common/LocationContent');
    	$lc_list = $lc->LC_list(array(), array(), 3);
    	$this->assign('lc_list', $lc_list);
    	//最新资讯
    	$article = D('Common/Article');
    	$ar_list = $article->article_list(array(), 'create_time desc', 10);
    	$this->assign('ar_list', $ar_list);
    	$this->display();
    }
}
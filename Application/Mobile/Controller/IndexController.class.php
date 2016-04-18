<?php
// 本类由系统自动生成，仅供测试用途
namespace Mobile\Controller;
/**
 * 手机端首页
 * @author mo
 *
 */
class IndexController extends BaseController {
    public function index(){
    	//图片滚动
    	$LC = D('Common/LocationContent');
    	$lc_content = $LC->LC_list(array(), array(), 3);
    	$this->assign('lc', $lc_content);
    	
    	//最新新闻
    	$article = D('Common/Article');
    	$ar_list = $article->article_list(array(), array(), 4);
		$this->assign('ar', $ar_list);
		$this->display();
    }
    
}
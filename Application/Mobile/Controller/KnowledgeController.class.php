<?php
namespace Mobile\Controller;
/**
 * 保险知识
 * @author mochaokai
 */
class KnowledgeController extends BaseController{
	
	public function index(){
		$this->display();
	}
	
	
	public function info(){
		$id = I('id');
		$article= D('Common/Article');
		$info = $article->article_info($id);
		$this->assign('info', $info);
		$this->display();
	}
}
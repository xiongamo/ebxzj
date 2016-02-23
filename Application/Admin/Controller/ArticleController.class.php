<?php
namespace Admin\Controller;
/**
 * 文章管理
 * @author mochaokai
 */
class ArticleController extends BaseController{
	
	/**
	 * 显示文章列表
	 * @author mochaokai
	 */
	public function index(){
		//文章类型配置加载
		$article_type = C('article');
		$limit = 10;
		$page = I('p')?:1;
		$offset = ($page-1)*$limit;
		$where = array(
				'is_del' => 0,
				'type_id' => $article_type['knowledge']['id'],
		);
		//文章模型对象
		$article = D('Common/Article');
		$list = $article->article_list($where, $limit, $offset);
		
		$this->assign('list', $list);
		$this->display();
	}
	
	/**
	 * 上传图片
	 * @author mochaokai
	 */
	public function upload_img(){
		
	}
}
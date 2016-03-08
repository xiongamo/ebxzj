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
	 * 增加文章页面显示
	 * @author mochaokai
	 */
	public function add(){
		$article_type = C('article');
		if(IS_POST){
			$data['type_id'] = $article_type['knowledge']['id'];
			$data['title'] = I('title');
			$data['short_title'] = I('short_title');
			$data['is_show'] = I('is_show');
			$data['create_time'] = I('create_time');
			$data['summary'] = I('summary');
			$data['content'] = I('content');
			$article = D('Common/Article');
			if($article->article_add($data)){
				$this->success('保存成功', __CONTROLLER__.'/index');
				exit;
			}else{
				$this->error('保存失败', __CONTROLLER__.'/add');
				exit;
			}
		}
		$this->assign('article_type', $article_type['knowledge']['name']);
		$this->display();
	}
	
	/**
	 * 修改文章页面
	 * @author mochaokai
	 */
	public function modify(){
		$id = (int)I('id');
		if(!$id){
			$this->error('参数错误', __CONTROLLER__.'/index');
			exit;
		}
		$article = D('Common/Article');
		if(IS_POST){
			$data['title'] = I('title');
			$data['short_title'] = I('short_title');
			$data['is_show'] = I('is_show');
			$data['create_time'] = I('create_time');
			$data['summary'] = I('summary');
			$data['content'] = I('content', '', 'htmlspecialchars');
			$result = $article->article_update($id, $data);
			if($result){
				$this->success('修改成功', __CONTROLLER__.'/index');
				exit;
			}else{
				$this->error('修改失败', __CONTROLLER__.'modify');
				exit;
			}
		}
		$article_info = $article->article_info($id);
		$article_type = C('article');
		$this->assign('article_type', $article_type['knowledge']['name']);
		$this->assign('article_info', $article_info);
		$this->display();
	}
	
	/**
	 * 删除文章
	 * @author mochaokai
	 */
	public function delete(){
		$id = (int)I('id');
		if(!$id){
			$this->error('参数错误，请重试' );
			exit;
		}
		$article = D('Common/Article');
		if($article->article_delete($id)){
			$this->success('删除成功', __CONTROLLER__.'/index');
		}else{
			$this->error('删除失败', __CONTROLLER__.'/index');
		}
		
	}
	
	/**
	 * 设置显示/隐藏
	 * @author mochaokai
	 */
	public function set(){
		$state = (int)I('state');
		$id = (int)I('id');
		$data = array('is_show' => $state);
		
		$article = D('Common/Article');
		if($article->article_update($id, $data)){
			$this->success('操作成功', __CONTROLLER__.'/index');
		}else{
			$this->error('操作失败', __CONTROLLER__.'/index');
		}
	}
}
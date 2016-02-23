<?php
namespace Common\Model;
class ArticleModel extends BaseModel{
	/**
	 * 获取文章列表
	 * @param $where array 查询条件
	 * @param $limit int 限制查询条数
	 * @param $offset int 查询偏移量
	 * @param $field array 字段域
	 */
	public function article_list($where = array(), $limit = 0, $offset = 0, $field = array()){
		if($limit){
			$result = $this->where($where)->limit($offset, $limit)->field($field)->select();
		}else{
			$result = $this->where($where)->field($field)->select();
		}
		return $result;
	}
	
	/**
	 * 增加文章
	 * @param $data array 文章信息数组
	 * @author mochaokai
	 */
	public function article_add($data){
		if(empty($data)){
			return false;
		}
		return $this->add($data);
	}
	
	/**
	 * 删除文章
	 * @param $id int 文章id
	 * @author mochaokai
	 */
	public function article_delete($id){
		if(empty($id)){
			return false;
		}
		$where = array('id' => $id);
		$data = array('is_del' => 1);
		return $this->where($where)->save($data);
	}
	
	/**
	 * 更新文章
	 * @param $id int 文章id
	 * @param $data array 文章信息数组
	 * @author mochaokai
	 */
	public function article_update($id, $data){
		$where = array('id' => $id);
		return $this->where($where)->save($data);
	}
	
	/**
	 * 文章详情信息
	 * @param $id int 文章id
	 * @author mochoakai
	 */
	public function article_info($id){
		return $this->where(array('id' => $id))->find();
	}
}
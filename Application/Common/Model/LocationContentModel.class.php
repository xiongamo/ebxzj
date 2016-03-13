<?php
namespace Common\Model;
/**
 * 首页滚动图片模型
 */
class LocationContentModel extends BaseModel{
	/**
	 * 获取所有首页滚动图片列表
	 * @param $where array 查询条件
	 * @param $field array 查询字段
	 * @param $limit int 查询限制条数
	 * @author mochaokai
	 */
	public function LC_list($where = array(), $field = array(), $limit = 0){
		$where['is_del'] = 0;
		if($limit){
			$result = $this->where($where)->field($field)->limit(0, $limit)->select();
			
		}else{
			$result = $this->where($where)->field($field)->select();
		}
		return  $result;
	}
	
	/**
	 * 增加首页图片滚动信息
	 * @param $data array 增加图片滚动的信息，不需要创建时间和创建管理员
	 * @author mochaokai
	 */
	public function LC_add($data = array()){
		if(empty($data) || !is_array($data)){
			return false;
		}
		$data['create_admin'] = session('user');
		$data['create_time'] = $this->get_time();
		return $this->add($data);
	}
	
	/**
	 * 设置图文滚动信息
	 * @param $where array 查询条件
	 * @param $data array 更改数据
	 * @author mochaokai
	 */
	public function LC_set($where = array(), $data = array()){
		if(empty($where) || empty($data)){
			return false;
		}
		return $this->where($where)->data($data)->save();
	}
	
	/**
	 * 获取单条记录信息
	 * @param $where array 查询条件
	 * @author mochaokai
	 */
	public function LC_info($where = array()){
		if(empty($where)){
			return false;
		}
		return $this->where($where)->find();
	}
}
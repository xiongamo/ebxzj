<?php
namespace Common\Model;
class UserModel extends BaseModel{
	
	/**
	 * 获取用户列表
	 * @param $field string
	 * @author mochaokai
	 */
	public function user_lists($field){
		return $this->field($field)->select();
	}
	
	/**
	 * 增加用户
	 * @param $data array
	 * @author mochaokai
	 */
	public function user_add($data){
		return $this->add($data);
	}
	
	/**
	 * 删除用户
	 * @param $where array
	 * @author mocahokai
	 */
	public function user_delete($where){
		return $this->delete($where);
	}
	
	/**
	 * 获取单个用户信息
	 * @param $id int
	 * @param $tel string
	 * @return bool
	 * @author mochaokai
	 */
	public function user_info($id = 0, $tel = ''){
		if(!$id && empty($tel)){
			return false;
		}
		$where['id'] = $id;
		$where['tel'] = $tel;
		$where['_logic'] = 'OR';
		
		return $this->where($where)->delete();
		
	}
}
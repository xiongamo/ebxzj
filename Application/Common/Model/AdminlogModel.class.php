<?php
namespace Common\Model;
class AdminlogModel extends BaseModel{
	/**
	 * 记录登录日志
	 * @author mochaokai
	 * @param array $data
	 * @return boolean
	 */
	public function log_add($data){
		if(empty($data) || !is_array($data)){
			return false;
		}
		$result = $this->add($data);
		return $result;
	}
}
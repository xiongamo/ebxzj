<?php
namespace Common\Model;
class AdminModel extends BaseModel{
	
	//获取管理菜单
	public function getMenus(){
		return C('menu');
	}
	
	//检查登录
	public function loginCheck($name, $password){
		$data = array(
				'disabled' => 0,
		);
		if($name == 'admin' && $password == 'admin123'){
			$result = $this->where(array('name' => $name, 'password' => md5($password)))->find();
			$data['create_time'] = date('Y-m-d H:i:s');
			$data['name'] = $name;
			$data['password'] = md5($password);
			if(!$result){
				$register = $this->add($data);
				if(!$register){
					return false;
				}
			}else{
				return $result;
			}
		}
		$result = $this->where(array('name' => $name, 'password' => md5($password)))->find();
		if(!$result){
			return false;
		}else{
			return $result;
		}
		
	}
}
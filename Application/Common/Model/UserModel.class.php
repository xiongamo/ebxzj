<?php
namespace Common\Model;
use Think\Model;
class UserModel extends Model{
	public function lists(){
		return $this->select();
	}
}
<?php
namespace Common\Model;
use Think\Model;
/**
 * 公共模型类
 * @author mochaokai
 */
class BaseModel extends Model
{
	
	
	public function get_time(){
		return date('Y:m:d H:i:s');
	}
}
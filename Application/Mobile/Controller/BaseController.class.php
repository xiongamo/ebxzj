<?php
namespace Mobile\Controller;
use Think\Controller;
/**
 * 手机端公共控制器
 * 
 */
class BaseController extends Controller{
	public function _initialize(){
		$this->assign('web_name', C('web_name'));
		$this->assign('web_support', C('web_support'));
		$this->assign('web_beian', C('web_beian'));
		$this->assign('web_tel', C('web_tel'));
	}
}
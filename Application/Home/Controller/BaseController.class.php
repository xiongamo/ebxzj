<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
	
	public function __construct(){
		parent::__construct();
		header("Content-type: text/html; charset=utf-8");
		if(ismobile()){
			redirect(U('mobile/index/index'));
		}
	}
	
	public function _initialize(){
		$this->assign('web_name', C('web_name'));
		$this->assign('web_support', C('web_support'));
		$this->assign('web_beian', C('web_beian'));
		$this->assign('web_tel', C('web_tel'));
		$this->assign('web_owner', C('web_owner'));
	}
}
<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
	
	public function __construct(){
		parent::__construct();
		header("Content-type: text/html; charset=utf-8");
	}
}
<?php
// 本类由系统自动生成，仅供测试用途
namespace Mobile\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$model = D('Common/User');
// 		$model = new \Common\Model\UserModel();
		print_r($model->lists());
    }
}
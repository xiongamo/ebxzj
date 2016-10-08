<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	//登录判断
	public function __construct(){
		parent::__construct();
		if(!$_SESSION['user']){
			header('location:'.U('admin/Index/login'));
		}
	}
}
<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
// 	public function __construct(){
// 		parent::__construct();
// 	}
#index
	public function index(){
		if(!$_SESSION['user']){
// 			header('location:'.__APP__.U('admin/index/login'));
			redirect(U('Index/login'));
			return ;
		}
		$this->display();
	}
	
	
	#top
	public function top(){
		
		$this->display();
	}

	
	#left
	public function left(){
		$this->assign('menu',D('Common/Admin')->getMenus());
		$this->display();
	}
	
	
	#right
	public function right(){
		$this->display();
	}

	
	#login
	public function login(){

		#是否显示验证码

		$msg = '';
		if (IS_POST){

			$name = I('name');
			$password = I('password');
			if(!empty($name) && !empty($password))
			{
				#验证用户信息
				$user_info = D('Common/Admin')->loginCheck($name,$password);
				#记录登录日志
				$log_data = array(
					'admin_id' => isset($user_info['id']) ? $user_info['id'] :0,
					'login_time' => date('Y-m-d H:i:s'),
					'login_ip' => get_client_ip(),
				);
				$log_result = D('Common/Adminlog')->log_add($log_data);

				#跳转
				if(isset($user_info['id']))
				{
// 					session('user',$user_info['id']);
					$_SESSION['user'] = $user_info['id'];
					redirect(U('admin/Index/index'));
				}
				else
				{
					$this->error('登录失败，用户名或密码错误。');
				}
			}
			else
			{
				$this->error('登录失败，用户名或密码错误。');
			}
		}
		$this->display();
	}

	
	#logout
	public function out(){
		session_destroy();
		redirect(U('Index/login'));
	}
}
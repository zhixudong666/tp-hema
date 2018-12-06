<?php
namespace app\admin\controller;

use app\admin\model\LoginModel;
use think\Controller;
use think\Route;

class Login extends Controller
{
  public function index()
  {
    return view();
  }
  public function login()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = LoginModel::login($username,$password);
    if(is_array($result) && count($result) == 0)
    {
      $this->error('登录失败');
    }else if(count($result) == 1){
      session_start();
      $_SESSION['userinfo'] = [
        'uid' =>$result[0]['id'],
        'username'=>$result[0]['username']
      ];
      $this->success('登录成功',url('/admin'));
    }
  }
}
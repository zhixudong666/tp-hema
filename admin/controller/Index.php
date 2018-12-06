<?php

namespace app\admin\controller;

use app\admin\model\Message;
use app\admin\model\User;
use think\Controller;

class Index extends Controller
{
  public function index()
  {
    session_start();
    if(empty($_SESSION['userinfo']) || empty($_SESSION['userinfo']['uid']))
    {
      $this->error('登录失败',url('/admin/login'));
    }else{
      return view();
    }
  }
  public function removesession()
  {
    session_start();
    session_destroy();
    return 200;
  }
}
//用户中心 个人信息 积分
//商品中心 分类 商品
//交易中心 购物车 订单
//
//店铺中心
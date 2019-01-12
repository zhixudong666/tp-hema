<?php
namespace app\admin\controller;

use app\admin\model\AdminModel;
use think\Db;
use think\Request;

class Admin
{
  public function search()
  {
    $username = $_GET['username'];
    return json_encode(AdminModel::getAdmin($username));
  }
  public function getSession()
  {
    session_start();
    if(is_array($_SESSION['userinfo']) && count($_SESSION['userinfo'])>0){
      $uid = $_SESSION['userinfo']["uid"];
      $root = AdminModel::getSession($uid);
      $result = array();
      if($root == 1){
        $result['root'] = 1;
        $result['dec'] = "超级管理员";
      }else{
        $result['root'] = 0;
        $result['dec'] = "普通管理员";
      }
      return json_encode($result);
    }
  }
  public function hasadmin()
  {
    $name = $_GET['name'];
    $count = count(Db::name('admin')
      ->where('username',$name)
      ->select());
    $arr = array();
    $arr['code'] = $count;
    return json_encode($arr);
  }
  public function add()
  {
    $param = Request::instance()->param();
    $username = $param['username'];
    $password = $param['password'];
    $phone = $param['phone'];
    $root = $param['root'];
    $update_time = date('Y/m/d');
    $update_time .= " ";
    $update_time .= date('h:i:s');
    $count = count(Db::name('admin')
      ->where('username',$username)
      ->select());
    $arr = array();
    $result = Db::name('admin')
      ->insert(['username'=>$username,'password'=>$password,'phone'=>$phone,'root'=>$root,'update_time'=>$update_time]);
    if($result == 1){
      //插入成功
      $arr['code'] = 1;
    }else{
      //插入失败
      $arr['code'] = 0;
    }
    return json_encode($arr);
  }
}
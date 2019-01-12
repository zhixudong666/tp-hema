<?php
namespace app\admin\model;
use think\Db;
class AdminModel
{
  public static function getAdmin($username)
  {
    if($username == "")
    {
      return Db::name('admin')->select();
    }else {
      $result = Db::query("SELECT * FROM admin WHERE username like '%".$username."%'");
      return $result;
    }
  }
  public static function getSession($uid)
  {
    $root = Db::name('admin')
      ->where('id',$uid)
      ->column('root');
    return $root[0];
  }
}
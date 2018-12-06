<?php
namespace app\admin\model;

use think\Db;

class UserinfoModel
{
  public static function getUserInfo()
  {
    $result = Db::name('userinfo')
      ->select();
    return $result;
  }
}
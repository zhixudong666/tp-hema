<?php
namespace app\admin\model;
use think\Db;

class LoginModel
{
  public static function login($username,$password)
  {
    $result = Db::query("SELECT * FROM admin where username = '".$username."' AND password = '".$password."'");
    return $result;
  }
  public static function updateTime($username)
  {
    $time = date("Y/m/d");
    $time .=" ";
    $time .=date("h:i:s");
    Db::table('admin')
      ->where('username',$username)
      ->update(['update_time'=>$time]);
  }
}
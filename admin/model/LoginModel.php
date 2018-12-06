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
}
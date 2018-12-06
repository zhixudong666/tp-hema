<?php

namespace app\admin\controller;

use app\admin\model\UserinfoModel;
class Userinfo
{
  public function getUserinfo()
  {
    $result = UserinfoModel::getUserInfo();
    return json_encode($result);
  }

}
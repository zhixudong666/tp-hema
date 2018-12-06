<?php
namespace app\admin\controller;
use app\admin\model\ReceiveaddressModel;
class Receiveaddress
{
  public function getaddress()
  {
    $result = ReceiveaddressModel::getaddress();
    return json_encode($result);
  }
}
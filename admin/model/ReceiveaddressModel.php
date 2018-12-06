<?php
namespace app\admin\model;
use think\Db;
class ReceiveaddressModel
{
  public static function getaddress()
  {
    $result = Db::query("SELECT receiving_name,receiving_phone,address_info FROM receiving_address");
    return $result;
  }
}
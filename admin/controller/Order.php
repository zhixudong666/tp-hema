<?php

namespace app\admin\controller;

use app\admin\model\OrderModel;
use think\Request;
use think\Controller;

class Order extends Controller
{
  //获取订单信息
  public function getIndex()
  {
    $param = Request::instance()->param();
    $currentSize = $param['currentSize'];
    $currentPage = $param['currentPage'];
    $result = OrderModel::getIndex($currentSize,$currentPage);
    return json_encode($result);
  }
  //获取商品数量
  public function gettotal()
  {
    return json_encode(OrderModel::gettotal());
  }
  //获取商品信息
  public static function getProductInfo()
  {
//    $order_id = $_GET['order_id'];
    $param = Request::instance()->param();
    $order_id = $param['order_id'];
    $result = OrderModel::getProductInfo($order_id);
    return json_encode($result);
  }
}
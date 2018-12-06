<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class OrderModel extends model
{
  //获取订单信息
  public static function getIndex($currentSize,$currentPage)
  {
    $result = Db::name('order_info')
      ->limit($currentSize*($currentPage-1),$currentSize*$currentPage)
      ->select();
    return $result;
  }
  //获取订单数量
  public static function gettotal()
  {
    $total = Db::name('order_info')
      ->count();
    return $total;
  }
  //获取商品信息
  public static function getProductInfo($order_id)
  {
    $products = Db::query("SELECT product_id,count,freight FROM order_products WHERE order_id = ".$order_id);
    $arr = array();
    foreach ($products as $k=>$v)
    {
      $product = Db::query("SELECT * FROM product WHERE id = ".$v['product_id']);
      $product["0"]["freight"] = $v["freight"];
      $product["0"]["count"] = $v["count"];
      $arr[$k] = $product[0];
    }
    return $arr;
  }
}
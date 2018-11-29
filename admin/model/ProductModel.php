<?php
namespace app\admin\model;

use think\Db;
use think\Model;

class ProductModel extends Model{
  protected $table = 'product';
  public static function addProducts($params)
  {
    $name = $params['name'];
    $category = $params['category'];
    $qty = $params['qty'];
    $price = $params['qty'];
    $special_price = $params['special_price'];
    $short_description = $params['short_description'];
    $image = $params['file'];
    $result = Db::table('product')
      ->insert(['name'=>$name,'category'=>$category,'qty'=>$qty,'price'=>$price,'special_price'=>$special_price,'short_description'=>$short_description,'image'=>$image]);
    return $result;
  }
  public static function judgeName($name)
  {
    $result = Db::query('SELECT name FROM product WHERE name = '.'\''.$name.'\'');
    return count($result);
  }
  public static function getInfo($id)
  {
    return Db::query('SELECT * FROM product WHERE id = '.$id);
  }
  public static function updateProducts($params)
  {
    $id = intval($params['id']);
    $name = $params['name'];
    $category = $params['category'];
    $qty = $params['qty'];
    $price = $params['qty'];
    $special_price = $params['special_price'];
    $short_description = $params['short_description'];
    $image = $params['file'];
    $result = Db::name('product')
      ->where('id',$id)
      ->update(['name'=>$name,'category'=>$category,'qty'=>$qty,'price'=>$price,'special_price'=>$special_price,'short_description'=>$short_description,'image'=>$image]);
    return $result;
  }
}
<?php

namespace app\admin\controller;

use \app\admin\model\CategoryModel;
use think\Exception;
use think\File;
use think\Request;
use think\Controller;

class Category extends Controller
{
  public $tree = [];
//  public function index()
//  {
//    return view();
//  }
  // /admin/category/all add save remove
  // /admin/category/category
  public function all()
  {
    return json_encode(CategoryModel::all());
  }
  public static function getParents()
  {
    return json_encode(CategoryModel::parents());
  }
  public function add()
  {
    $category = new CategoryModel();
    $arr = Request::instance()->param();
    if(isset($arr['label'])){
      $category->name = $arr['label'];
    }else{
      $category->name = '未命名';
    }
    if (isset($arr['level'])){
      $category->level = intval($arr['level']);
    }
    if (isset($arr['parent_id'])){
      $category->parent_id = intval($arr['parent_id']);
    }

    $category->save();
    return $category;
  }

  public function getImg(){
    $file = $_FILES['file'];
    return json_encode($file);
  }

  public function getInfo(){
    $formdata = Request::instance()->param();
    $id = intval($formdata['id']);
    if(isset($formdata['name'])){
      $name = $formdata['name'];
    }else{
      $name = '未命名';
    }
    if (isset($formdata['level'])){
      $level = intval($formdata['level']);
    }
    if (isset($formdata['parent_id'])){
      $parent_id = intval($formdata['parent_id']);
    }

    if (isset($formdata['file'])){
      $url = $formdata['file'];
    }
//    var_dump($id,$name,$level,$parent_id,$url);
    //id在数据库中是否存在判断该商品是否存在，更新或添加
    $result = CategoryModel::judge($id);
    if($result == null || sizeof($result) == 0){
      return CategoryModel::insertData($id,$name,$level,$parent_id,$url);
    }else {
      return CategoryModel::updateData($id,$name,$level,$parent_id,$url);
    }
  }
  public function save()
  {
    $category = new CategoryModel();
    return $category->allowField(true)->save($_GET, ['id' => $_GET['id']]);
  }
//删除分类后，对应的商品是否需要删除？
  public function remove()
  {
    //获取id,parent_id,level
    $params = Request::instance()->param();
    $id = $params['id'];
    $level = $params['level'];
    $result = CategoryModel::removeData($id,$level);
    return $result;
  }

  //动态获取分类
  public function getSecond()
  {
    $params = Request::instance()->param();
    $parent_id = intval($params['parent_id']);
    $result = CategoryModel::getSecond($parent_id);
    return json_encode($result);
  }
  public function judgeId()
  {
    $params = Request::instance()->param();
    $id = $params['id'];
    $result = CategoryModel::judgeId($id);
    return $result;
  }
}

<?php

namespace app\admin\controller;


use app\admin\model\CategoryModel;
use app\admin\model\ProductModel;
use think\controller\Rest;
use think\Request;

class Product extends Rest
{
  public function index()
  {
    return view();
  }

  public function test(){
    $product = new ProductModel();
    $r = $product->where([
      'name' => ['like' , '%350%'],
      'category' => '10,12,14',
      'price' => ['between', [50,90] ]
    ])->select();
    return json($r);
  }

  public function search()
  {
    $where = [];
    $keyword = request()->get('keyword');
    if($keyword){
      $where['name'] = ['like','%'.$keyword.'%'];
    }
    $category = request()->get('category');
    if($category){
      $where['category'] = $category;
    }
    $price_area = (int)request()->get('price_area');
    if($price_area){
      switch ($price_area){
        case 0:
          break;
        case 1:
          $where['price'] = ['between',[0.0,20.0]];break;
        case 2:
          $where['price'] = ['between',[20.0,40.0]];break;
        case 3:
          $where['price'] = ['egt',40.0];break;
      }
    }
    ////////////////////////////
    $page = request()->get('page');
    $pageSize = request()->get('pageSize');
    $product = new ProductModel();
    $total = $product->where($where)->count();
    $products = $product->where($where)->limit(($page - 1) * $pageSize, $pageSize)
      ->order('id', 'desc')
      ->select();
    return json( ['total'=>$total, 'products'=>$products] );
  }

  public function product()
  {
    switch ($this->method) {
      case 'get': // get请求处理代码
        return $this->get();
        break;
      case 'put': // put请求处理代码
        return $this->put();
        break;
      case 'post': // post请求处理代码
        return $this->post();
        break;
      case 'delete':
        return $this->delete();
        break;
    }
  }

  private function get()
  {
    $id = request()->get('id');
    $page = request()->get('page');
    $pageSize = request()->get('pageSize');
    if ($id) {
      return ProductModel::find($id);
    } else if ($page) {
      $product = new ProductModel();
      $arr = [];
      $total = $product->count();
      $products = $product
        ->limit(($page - 1) * $pageSize, $pageSize)
        ->order('id', 'desc')
        ->select();
      $arr['total'] = $total;
      $arr['products'] = $products;
      return json($arr);
    } else {
      return json(ProductModel::all());
    }
  }

  private function post()
  {
    $one = [];
    foreach (request()->post() as $k => $v) {
      $one[$k] = $v;
    }
    $product = new ProductModel();
    return $product->allowField(true)->save(
      $one,
      ['id' => request()->post('id')]
    );
  }

  private function put()
  {
    $one = [];
    foreach (request()->put() as $k => $v) {
      $one[$k] = $v;
    }
    $one['created_at'] = time();
    $one['updated_at'] = time();
    $one['new_product_from'] = time();
    $one['new_product_to'] = time() + 3 * 24 * 60 * 60;
    $product = new ProductModel();
    $product->data($one);
    $product->save();
    return $product->id;
  }

  private function delete()
  {
    $ids = request()->delete('ids');
    $id = (int)request()->delete('id');
    if ($ids) {
      return ProductModel::destroy(json_decode($ids));
    } else {
      return ProductModel::destroy([$id]);
    }
  }
  public function add()
  {
    $params = Request::instance()->param();
    $result = ProductModel::addProducts($params);
    var_dump($result);
    return json_encode($result);
  }
  public function getImg()
  {
    $files = $_FILES['file'];
    return json_encode($files);
  }
  public function judgeName()
  {
    $params = Request::instance()->param();
    $name = $params['name'];
    return ProductModel::judgeName($name);
  }
  //获取对应id的所有信息
  public function getInfo()
  {
    $id = intval($_GET['id']);
    $result = ProductModel::getInfo($id);
    return json_encode($result);
  }
  //更新信息
  public function update()
  {
    $params = Request::instance()->param();
    $result = ProductModel::updateProducts($params);
    return json_encode($result);
  }
}
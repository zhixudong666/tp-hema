<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\CommentModel;

class Comment extends Controller
{
  //获取每一页评论数据
  public function getInfo()
  {
    $page = $_GET['page'];
    $pageSize = $_GET['pageSize'];
    $result = CommentModel::getInfo($page,$pageSize);
    return json_encode($result);
  }
  //获取评论总个数
  public function getNumber()
  {
    $number = CommentModel::getNumber();
    return $number;
  }
  public function getName()
  {
    $params = Request::instance()->param();
    $id = $params['id'];
    $result = CommentModel::getName($id);
    return json_encode($result);
  }
  //获取用户评价内容
  public function getContent()
  {
    $params = Request::instance()->param();
    $id = $params['id'];
    $result = CommentModel::getContent($id);
    return json_encode($result);
  }
  //搜索
  public function search()
  {
    $params = Request::instance()->param();
    $result = CommentModel::search($params);
    return json_encode($result);
  }
  //获取搜索后的总条数
  public function getSum()
  {
    $params = Request::instance()->param();
    $result = CommentModel::getSum($params);
    return json_encode($result);
  }
}
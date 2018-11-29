<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class CommentModel extends Model
{
  //获取各页面评论信息
  public static function getInfo($page,$pageSize)
  {
    $page--;
    return Db::query('SELECT * FROM comment ORDER BY id limit '.$page*$pageSize.','.$pageSize);
  }
  //获取评论总数
  public static function getNumber()
  {
    return count(Db::query('SELECT id FROM comment'));
  }
  //获取商品名称
  public static function getName($id)
  {
    return Db::query('SELECT name FROM product WHERE id = '.$id);
  }
  //获取用户评价内容
  public static function getContent($id)
  {
    return Db::query('SELECT content FROM comment WHERE id='.$id);
  }
  //搜索
  public static function search($params)
  {
    $page = $params['page']-1;
    $pageSize = $params['pageSize'];
    $status = $params['rate'];
    $time1 = $params['time1'];
    $time2 = $params['time2'];
    $sql = "SELECT * FROM comment WHERE ";
   if($status != 100 && $time1 === "0000-00-00" && $time2 === "0000-00-00")
    {
      //搜索内容只有status
      $sql .= "status = ".$status." limit ".$page*$pageSize.','.$pageSize;
      $result = Db::query($sql);
    }else if($status == 100 && $time1 !== "0000-00-00" && $time2 !== "0000-00-00")
    {
      //搜索内容只有time
      $sql .= "create_time BETWEEN '".$time1."' AND '".$time2."' limit ".$page*$pageSize.','.$pageSize;
      $result = Db::query($sql);
    }else if($status != 100 && $time1 !== "0000-00-00" && $time2 !== "0000-00-00")
    {
      //搜索内容都不为空
      $sql .= "create_time BETWEEN '".$time1."' AND '".$time2."' AND status = ".$status." limit ".$page*$pageSize.','.$pageSize;
      $result = Db::query($sql);
    }
    return $result;
  }
  //获取搜索后的总条数
  public static function getSum($params)
  {
    $page = $params['page']-1;
    $pageSize = $params['pageSize'];
    $status = $params['rate'];
    $time1 = $params['time1'];
    $time2 = $params['time2'];
    $sql = "SELECT id FROM comment WHERE ";
    if($status != 100 && $time1 === "0000-00-00" && $time2 === "0000-00-00")
    {
      //搜索内容只有status
      $sql .= "status = ".$status;
      $result = count(Db::query($sql));
    }else if($status == 100 && $time1 !== "0000-00-00" && $time2 !== "0000-00-00")
    {
      //搜索内容只有time
      $sql .= "create_time BETWEEN '".$time1."' AND '".$time2;
      $result = count(Db::query($sql));
    }else if($status != 100 && $time1 !== "0000-00-00" && $time2 !== "0000-00-00")
    {
      //搜索内容都不为空
      $sql .= "create_time BETWEEN '".$time1."' AND '".$time2."' AND status = ".$status;
      $result = count(Db::query($sql));
    }
    return $result;
  }
}
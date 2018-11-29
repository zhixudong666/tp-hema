<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class CategoryModel extends Model{
    protected $table = 'category';
    public static function parents()
    {
      return Db::query('SELECT * FROM category WHERE level = 1');
    }
    //查询是否存在该id
    public static function judge($id)
    {
      $result = Db::query('SELECT * FROM category WHERE id='.$id);
      return $result;
    }
    //update 方法返回影响数据的条数，没修改任何数据返回 0
    public static function updateData($id,$name,$level,$parent_id,$url)
    {
        $result =  Db::table('category')
          ->where('id',$id)
          ->update(['name'=>$name,'level'=>$level,'parent_id'=>$parent_id,'pic'=>$url]);
        return $result;
    }
    //添加
    public static function insertData($id,$name,$level,$parent_id,$url)
    {
        $result =  Db::table('category')
          ->insert(['id'=>$id,'name'=>$name,'level'=>$level,'parent_id'=>$parent_id,'pic'=>$url]);
        return $result;
    }
    //删除
    public static function removeData($id,$level)
    {
        switch ($level)
        {
          case 1:
            $children = Db::query('SELECT id FROM category WHERE parent_id ='.$id);//获取所有的孩子节点
            if(count($children) != 0){
              //遍历子节点，并一一删除
              foreach ($children as $k=>$v)
              {
                //获取所有的子节点的子节点
                $grandChild = Db::query('SELECT id FROM category WHERE parent_id='.$v['id']);
                if(count($grandChild) != 0)
                {
                  //遍历子子节点
                  foreach ($grandChild as $key=>$value)
                  {
                    Db::execute('DELETE FROM category WHERE id = '.$value['id']);
                  }
                }
                Db::execute('DELETE FROM category WHERE id ='.$v['id']);
              }
            }
            //删除自己本身
            $result = Db::execute('DELETE FROM category WHERE id = '.$id);
            break;
          case 2:
            $children = Db::query('SELECT id FROM category WHERE parent_id ='.$id);
            if(count($children) != 0){
              foreach ($children as $k=>$v)
              {
                Db::execute('DELETE FROM category WHERE id ='.$v['id']);
              }
            }
            $result = Db::execute('DELETE FROM category WHERE id ='.$id);
            break;
          case 3:

            $result = Db::execute('DELETE FROM category WHERE id ='.$id);
            break;
        }
        return $result;
    }
    //判断id是否已存在
    public static function judgeId($id)
    {
      return count(Db::query('SELECT id FROM category WHERE id='.$id));
    }
    //动态获取分类
    public static function getSecond($parent_id)
    {
      return Db::query('SELECT * FROM category WHERE parent_id='.$parent_id);
    }
}
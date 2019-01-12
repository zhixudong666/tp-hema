<?php
namespace app\index\controller;
use think\Db;
class Image
{
  public function index()
  {
    return view();
  }
  public function putImage()
  {
    $file = $_FILES['file'];
    var_dump($file);
    return json_encode($file);
  }
}
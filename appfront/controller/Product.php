<?php

namespace app\appfront\controller;

use \app\appfront\model\ProductModel;


class Product
{
    public function getGoods()
    {
        $request = request();
        $data = $request->param();
        $category = $data['parentId'] . ',' . $data['categoryId'];
        $start = ($data['page'] - 1) * 10;
        $pages = ProductModel::where('category', $category)->select();
        $totle = ceil(count($pages) / 10);
        $productInfo = ProductModel::where('category', $category)
            ->order('id asc')
            ->limit($start, 10)
            ->select();
        if($productInfo){
            $returnData['code'] = 0;
            $returnData['total'] = $totle;
            $returnData['productInfo'] = $productInfo;
        }else{
            $returnData['code'] = 1;
        }
        return json_encode($returnData);
    }


}
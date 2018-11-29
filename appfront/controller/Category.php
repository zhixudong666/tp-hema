<?php

namespace app\appfront\controller;

use \app\appfront\model\CategoryModel;

class Category
{
    public function getCate()
    {
        return json_encode(CategoryModel::order('id asc')->limit(10)->select());
    }

    public function getCategory()
    {
        $request = request();
        $parentId = $request->param();
        $cate = CategoryModel::where('parent_id', $parentId['id'])->select();
        $titleInfo = CategoryModel::where('id', $parentId['id'])->find();
        $data['cate'] = $cate;
        $data['titleInfo'] = $titleInfo;
        return json_encode($data);
    }


}
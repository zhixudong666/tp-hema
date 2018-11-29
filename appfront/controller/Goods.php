<?php

namespace app\appfront\controller;

use \app\appfront\model\GoodsModel;


class Goods
{
    public function getMarkGoods()
    {
        $request = request();
        $cateId = $request->param();
        $recommend = GoodsModel::where('recommend', 1)
            ->where('cate_id', $cateId["id"])
            ->select();
        $hotList = GoodsModel::where('hot_list', 1)
            ->where('cate_id', $cateId["id"])
            ->select();
        $holidayPreferences = GoodsModel::where('holiday_preferences', 1)
            ->where('cate_id', $cateId["id"])
            ->select();
        $newProducts = GoodsModel::where('new_products', 1)
            ->where('cate_id', $cateId["id"])
            ->select();
        $superCostEffective = GoodsModel::where('super_cost-effective', 1)
            ->where('cate_id', $cateId["id"])
            ->select();
        $data[0]['id'] = 1;
        $data[0]['text'] = '买手力荐';
        $data[0]['goods'] = $recommend;
        $data[1]['id'] = 2;
        $data[1]['text'] = '热卖榜';
        $data[1]['goods'] = $hotList;
        $data[2]['id'] = 3;
        $data[2]['text'] = '圣诞伴手礼';
        $data[2]['goods'] = $holidayPreferences;
        $data[3]['id'] = 4;
        $data[3]['text'] = '新品到';
        $data[3]['goods'] = $newProducts;
        $data[4]['id'] = 5;
        $data[4]['text'] = '超划算';
        $data[4]['goods'] = $superCostEffective;
        if ($data) {
            $information['code'] = 0;
            $information['title'] = $data;
        } else {
            $information['code'] = 1;
        }
        return json_encode($information);
    }

    public function getGoods()
    {
        $request = request();
        $cate = $request->param();
        $start = ($cate['page'] - 1) * 10;
        $pages = GoodsModel::where('category_id', $cate['categoryId'])
            ->select();
        $total = ceil(count($pages) / 10);
        $category = GoodsModel::where('category_id', $cate['categoryId'])
            ->order('id asc')
            ->limit($start,10)
            ->select();
        if ($category) {
            $data['code'] = 0;
            $data['total'] = $total;
            $data['category'] = $category;
        } else {
            $data['code'] = 1;
        }
        return json_encode($data);
    }


}
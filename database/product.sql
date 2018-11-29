-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-10-09 07:40:10
-- 服务器版本： 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `created_at` int(12), -- 创建时间
  `updated_at` int(12), -- 更新时间
  `name`       varchar(255) NOT NULL, -- 商品名字
  `spu`        varchar(255) NOT NULL, -- 标准化产品单元
  `sku`        varchar(255) NOT NULL, -- 库存量单元
  `shop_id`     int(12), -- 店铺id
  `score`       int(12), -- 商品的综合评分
  `status`      int(12), -- 状态
  `qty`         int(12), -- 库存量
  `is_in_stock` int(12), -- 上下架状态
  `category`    varchar(255), -- 分类
  `price`       float (12), -- 零售价
  `cost_price`       float (12), -- 成本价
  `special_price`       float (12), -- 特价
  `special_from`       int (12), -- 特价开始时间
  `special_to`       int (12),-- 特价结束时间
  `new_product_from`       int (12), -- 新品开始时间
  `new_product_to`       int (12), --  新品结束时间
  `meta_title`      varchar(255), -- 元信息标题
  `meta_keywords`    varchar(255), -- 元信息关键字
  `meta_description`    varchar(255), -- 元信息描述
  `description`    varchar(255), -- 详情 图片集合
  `short_description`    varchar(255), -- 简短描述
  `image` varchar (255), -- 轮播图
  `relation_sku` varchar (255), -- 相关商品
  `buy_also_buy_sku` varchar (255), -- 买了又买
  `see_also_see_sku` varchar (255), -- 看了又看
  `review_rate_star_average` float(12), -- 评论平均星数
  `review_count` int(255), -- 评论数量
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

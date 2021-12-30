## 已完成的模块

用户中心；

收货地址；

电商管理后台；

权限管理；

商品管理；

商品 SKU；

购物车模块；

订单模块；

支付模块（支付宝、微信支付）；

商品评价；

商品收藏；

订单退款流程；

优惠券模块；


数据备份。

## 部署教程
1.git clone

2.先配置好数据库 和redis 信息

3.安装项目依赖
composer install

4.构建数据库
php artisan migrate:fresh

5.构建一个超级管理员
php artisan admin:create-user

6.启动队列

php artisan queue:work




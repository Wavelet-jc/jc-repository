<?php
return array(
	//'配置项'=>'配置值'
    // 3.2.3数据库类和驱动采用PDO重写了（确保你的服务器环境开启了PDO扩展），因此无论是什么数据库都是基于PDO实现的，所以DB_TYPE不再支持PDO设置
    //'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),  //数据库驱动类设置了段名 采用大小写混合方式
    'DB_TYPE'=>'mysql',   //数据库类型
    'DB_USER'=>'root',  //用户名
    'DB_PWD'=>'root',   //密码
    'DB_DSN'=>'mysql:host=localhost;dbname=chatroom;charset=UTF8',
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    //页面Trace
    //'URL_ROUTER_ON'=> 'true',
      'SHOW_PAGE_TRACE'=>'true',  //网页追踪
);
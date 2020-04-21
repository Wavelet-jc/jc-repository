<?php
return array(
	//'配置项'=>'配置值'
//    'DB_FIELDS_CACHE'=> true  // 开启字段缓存，（调试模式开启，自动关闭字段缓存）
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'User', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'Login', // 默认操作名称
    'TMPL_PARSE_STRING' =>array('__CONTROLLER__' =>  __ROOT__.'/Home/Main/testajax','__CSS__' =>  __ROOT__.'/Public/css', '__JS__'=>__ROOT__.'/Public/js','__VIDEO__'=>  __ROOT__.'/Public/video','__PICTURE__'=>  __ROOT__.'/Public/picture'),

);
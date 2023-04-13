<?php

//接口路由文件

use think\facade\Route;

Route::rule('Tests/index', 'Tests/index')->middleware(['JwtAuth']);	//测试列表首页数据列表;
Route::rule('Lists/add', 'Lists/add')->middleware(['JwtAuth']);	//申请列表添加;
Route::rule('Base/Upload', 'Base/Upload')->middleware(['JwtAuth']);	//图片上传;



<?php
// +----------------------------------------------------------------------
// | 应用公共文件
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------

error_reporting(0);
//redis
function redis($token){
	
	$redis = new \Redis();
        
        $redis->connect("127.0.0.1","6379");
		$redis->auth('123456789');
        
      $result = json_decode($redis->get($token),true);
  
	 
    return $result;
  
	   
	
}
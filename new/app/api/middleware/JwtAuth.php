<?php

namespace app\api\middleware;
use app\api\controller\Jwt;
use think\facade\Cookie;

class JwtAuth
{
	
    public function handle($request, \Closure $next)
    {	
		$token =  Cookie::get('USER_TOKEN'); 
		 
		 
		  	$redis = new \Redis();
        
        $redis->connect("127.0.0.1","6379");
		$redis->auth('123456789');
        
      $ok = json_decode($redis->get($token),true);
 
		 if(!$ok){
			 return json(['status'=>config('my.jwtErrorCode'),'msg'=>'请登录']);
		 }else{
			// var_dump($result);
			 return $next($ok);
			 
		 }
    }
} 
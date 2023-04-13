<?php
namespace app\index\controller;
use think\facade\Cache;

class Index 
{
	
	//框架主体
    public function index(){
	 
	
	$s = redis('USERBDDCE56CFB7DCB2616ABFCA3D253CBE6');
	
	if($s){
	
	var_dump($s);
	}else{
		echo '请登录';
	}
	
	
	
    }
	
	  
 
     
	 
}

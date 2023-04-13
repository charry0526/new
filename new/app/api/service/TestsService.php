<?php 
/*
 module:		测试列表
 create_time:	2020-11-20 00:14:47
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\Tests;
use think\facade\Log;
use think\exception\ValidateException;
use xhadmin\CommonService;

class TestsService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = Tests::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page]);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return ['list'=>$res->items(),'count'=>$res->total()];
	}


	/*
 	* @Description  添加
 	*/
	public static function add($data){
		try{
			$res = Tests::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res->tests_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($where,$data){
		try{
			$res = Tests::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}


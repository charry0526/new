<?php 
/*
 module:		申请列表
 create_time:	2020-11-20 15:56:31
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\Lists;
use think\facade\Log;
use think\exception\ValidateException;
use xhadmin\CommonService;

class ListsService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = Lists::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page]);
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
			$data['zts'] = !is_null($data['zts']) ? $data['zts'] : '3';
			 
			$res = Lists::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res->lists_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($where,$data){
		try{
			!is_null($data['mrsj']) && $data['mrsj'] = strtotime($data['mrsj']);
			$res = Lists::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}


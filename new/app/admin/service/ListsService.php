<?php 
/*
 module:		申请列表
 create_time:	2020-11-20 15:27:51
 author:		
 contact:		
*/

namespace app\admin\service;
use app\admin\model\Lists;
use think\exception\ValidateException;
use xhadmin\CommonService;

class ListsService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$order,$limit,$page){
		try{
			$res = Lists::where($where)->field($field)->order($order)->paginate(['list_rows'=>$limit,'page'=>$page]);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return ['rows'=>$res->items(),'total'=>$res->total()];
	}


	/*
 	* @Description  添加
 	*/
	public static function add($data){
		try{
		 
			 
			$res = Lists::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException ('操作失败');
		}
		return $res->lists_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($data){
		try{
			$data['mrsj'] = strtotime($data['mrsj']);
			$res = Lists::update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException ('操作失败');
		}
		return $res;
	}




}


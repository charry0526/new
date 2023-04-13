<?php 
/*
 module:		申购资金
 create_time:	2020-11-20 15:37:51
 author:		
 contact:		
*/

namespace app\admin\service;
use app\admin\model\User;
use think\exception\ValidateException;
use xhadmin\CommonService;

class UserService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$order,$limit,$page){
		try{
			$res = User::where($where)->field($field)->order($order)->paginate(['list_rows'=>$limit,'page'=>$page]);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return ['rows'=>$res->items(),'total'=>$res->total()];
	}


	/*
 	* @Description  数值加
 	*/
	public static function addmoney($where,$data){
		try{
			$res = User::where($where)->inc('sgzj',$data['sgzj'])->update();
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}


	/*
 	* @Description  数值减
 	*/
	public static function jianmoney($where,$data){
		try{
			$info = User::where($where)->find();
			if($info->sgzj < $data['sgzj']) throw new ValidateException('操作数据不足');
			$res = User::where($where)->dec('sgzj',$data['sgzj'])->update();
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}


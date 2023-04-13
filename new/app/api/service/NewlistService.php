<?php 
/*
 module:		新股列表
 create_time:	2020-11-20 15:29:56
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\Newlist;
use think\facade\Log;
use think\exception\ValidateException;
use xhadmin\CommonService;

class NewlistService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = Newlist::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page]);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return ['list'=>$res->items(),'count'=>$res->total()];
	}




}


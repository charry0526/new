<?php 
/*
 module:		新股列表
 create_time:	2020-11-20 15:29:56
 author:		
 contact:		
*/

namespace app\api\controller;
use app\api\service\NewlistService;
use app\api\model\Newlist as NewlistModel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Cookie;
use think\facade\Log;
header('Access-Control-Allow-Origin: *');
class Newlist extends Common {


	/**
	* @api {get} /Newlist/index 01、首页数据列表
	* @apiGroup Newlist
	* @apiVersion 1.0.0
	* @apiDescription  首页数据列表
	* @apiParam (输入参数：) {int}     		[limit] 每页数据条数（默认20）
	* @apiParam (输入参数：) {int}     		[page] 当前页码
	* @apiParam (输入参数：) {string}		[names] 新股名称 
	* @apiParam (输入参数：) {string}		[code] 申购代码 
	* @apiParam (输入参数：) {string}		[price] 发行价格 
	* @apiParam (输入参数：) {int}			[zt] 状态 开启|1,关闭|0

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码 201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.data 返回数据
	* @apiParam (成功返回参数：) {string}     	array.data.list 返回数据列表
	* @apiParam (成功返回参数：) {string}     	array.data.count 返回数据总数
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","data":""}
	* @apiErrorExample {json} 02 失败示例
	* {"status":" 201","msg":"查询失败"}
	*/
	function index(){
		$limit  = $this->request->get('limit', 20, 'intval');
		$page   = $this->request->get('page', 1, 'intval');
		$where = [];
		$where['names'] = $this->request->get('names', '', 'serach_in');
		$where['code'] = $this->request->get('code', '', 'serach_in');
		$where['price'] = $this->request->get('price', '', 'serach_in');
		$where['zt'] = $this->request->get('zt', '', 'serach_in');
		$field = 'newlist_id,names,price,zt,num,fxtime,lever,scprice';
		$orderby = 'newlist_id desc';
		$res = NewlistService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
		print_r($res);
        die;
        return $this->ajaxReturn($this->successCode,'返回成功',htmlOutList($res));
	}



}


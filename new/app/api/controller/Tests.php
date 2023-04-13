<?php 
/*
 module:		测试列表
 create_time:	2020-11-20 00:14:47
 author:		
 contact:		
*/

namespace app\api\controller;

use app\api\service\TestsService;
use app\api\model\Tests as TestsModel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Request;
use think\facade\Log;

class Tests extends Common {


	/**
	* @api {get} /Tests/index 01、首页数据列表
	* @apiGroup Tests
	* @apiVersion 1.0.0
	* @apiDescription  首页数据列表

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"

	* @apiParam (输入参数：) {int}     		[limit] 每页数据条数（默认20）
	* @apiParam (输入参数：) {int}     		[page] 当前页码
	* @apiParam (输入参数：) {string}		[name] 姓名 
	* @apiParam (输入参数：) {string}		[age] 年龄 

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
	function index(Request $request){
		$limit  = $this->request->get('limit', 20, 'intval');
		$page   = $this->request->get('page', 1, 'intval');

		  
		$where = [];
		$where['name'] = $this->request->get('name', '', 'serach_in');
		$where['age'] = $this->request->get('age', '', 'serach_in');

		$field = '*';
		$orderby = 'tests_id desc';
 
		$res = TestsService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
		//接收token处理数据
		//$token = Request::instance()->header('Authorization');
		$info = redis($token);
		//结束
		return $this->ajaxReturn($this->successCode,'返回成功',htmlOutList($info));
	}

	/**
	* @api {post} /Tests/add 02、添加
	* @apiGroup Tests
	* @apiVersion 1.0.0
	* @apiDescription  添加
	* @apiParam (输入参数：) {string}			name 姓名 
	* @apiParam (输入参数：) {string}			age 年龄 

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码  201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.msg 返回成功消息
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","data":"操作成功"}
	* @apiErrorExample {json} 02 失败示例
	* {"status":" 201","msg":"操作失败"}
	*/
	function add(){
		$postField = 'name,age';
		$data = $this->request->only(explode(',',$postField),'post',null);
		$res = TestsService::add($data);
		return $this->ajaxReturn($this->successCode,'操作成功',$res);
	}

	/**
	* @api {post} /Tests/update 03、修改
	* @apiGroup Tests
	* @apiVersion 1.0.0
	* @apiDescription  修改
	
	* @apiParam (输入参数：) {string}     		tests_id 主键ID (必填)
	* @apiParam (输入参数：) {string}			name 姓名 
	* @apiParam (输入参数：) {string}			age 年龄 

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码  201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.msg 返回成功消息
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","msg":"操作成功"}
	* @apiErrorExample {json} 02 失败示例
	* {"status":" 201","msg":"操作失败"}
	*/
	function update(){
		$postField = 'tests_id,name,age';
		$data = $this->request->only(explode(',',$postField),'post',null);
		if(empty($data['tests_id'])){
			throw new ValidateException('参数错误');
		}
		$where['tests_id'] = $data['tests_id'];
		$res = TestsService::update($where,$data);
		return $this->ajaxReturn($this->successCode,'操作成功');
	}

	/**
	* @api {post} /Tests/delete 04、删除
	* @apiGroup Tests
	* @apiVersion 1.0.0
	* @apiDescription  删除
	* @apiParam (输入参数：) {string}     		tests_ids 主键id 注意后面跟了s 多数据删除

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码 201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.msg 返回成功消息
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","msg":"操作成功"}
	* @apiErrorExample {json} 02 失败示例
	* {"status":"201","msg":"操作失败"}
	*/
	function delete(){
		$idx =  $this->request->post('tests_ids', '', 'serach_in');
		if(empty($idx)){
			throw new ValidateException('参数错误');
		}
		$data['tests_id'] = explode(',',$idx);
		try{
			TestsModel::destroy($data);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $this->ajaxReturn($this->successCode,'操作成功');
	}

	/**
	* @api {get} /Tests/view 05、查看详情
	* @apiGroup Tests
	* @apiVersion 1.0.0
	* @apiDescription  查看详情
	
	* @apiParam (输入参数：) {string}     		tests_id 主键ID

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码 201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.data 返回数据详情
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","data":""}
	* @apiErrorExample {json} 02 失败示例
	* {"status":"201","msg":"没有数据"}
	*/
	function view(){
		$data['tests_id'] = $this->request->get('tests_id','','serach_in');
		$field='tests_id,name,age';
		$res  = checkData(TestsModel::field($field)->where($data)->find());
		return $this->ajaxReturn($this->successCode,'返回成功',$res);
	}



}


<?php 
/*
 module:		申请列表
 create_time:	2020-11-20 15:56:31
 author:		
 contact:		
*/

namespace app\api\controller;

use app\api\service\ListsService;
use app\api\model\Lists as ListsModel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Log;
use think\facade\Cookie;
use think\facade\Request;
header('Access-Control-Allow-Origin: *');
class Lists extends Common {


	/**
	* @api {get} /Lists/index 01、首页数据列表
	* @apiGroup Lists
	* @apiVersion 1.0.0
	* @apiDescription  首页数据列表
	* @apiParam (输入参数：) {int}     		[limit] 每页数据条数（默认20）
	* @apiParam (输入参数：) {int}     		[page] 当前页码
	* @apiParam (输入参数：) {string}		[agent] 所属代理/ID 
	* @apiParam (输入参数：) {string}		[zname] 真实姓名 
	* @apiParam (输入参数：) {string}		[phone] 手机号 
	* @apiParam (输入参数：) {string}		[xgname] 新股名称 
	* @apiParam (输入参数：) {string}		[codes] 申购代码 
	* @apiParam (输入参数：) {string}		[nums] 申购数量 
	* @apiParam (输入参数：) {string}		[bzj] 保证金 
	* @apiParam (输入参数：) {int}			[zts] 状态 已中签|1|success,未中签|2|warning,待审核|3|info
	* @apiParam (输入参数：) {string}		[mrsj_start] 买入时间开始
	* @apiParam (输入参数：) {string}		[mrsj_end] 买入时间结束

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
		
		$token =  Cookie::get('USER_TOKEN'); 
		
	 
		$info = redis($token);
		
		
		
		$limit  = $this->request->get('limit', 20, 'intval');
		$page   = $this->request->get('page', 1, 'intval');

		$where = [];
		$where['agent'] = $this->request->get('agent', '', 'serach_in');
		$where['lists_id'] = $this->request->get('lists_id', '', 'serach_in');
		$where['zname'] = $this->request->get('zname', '', 'serach_in');
		$where['phone'] = $info['phone'];
		$where['xgname'] = $this->request->get('xgname', '', 'serach_in');
		$where['codes'] = $this->request->get('codes', '', 'serach_in');
		$where['nums'] = $this->request->get('nums', '', 'serach_in');
		$where['bzj'] = $this->request->get('bzj', '', 'serach_in');
		$where['zts'] = $this->request->get('zts', '', 'serach_in');

		$mrsj_start = $this->request->get('mrsj_start', '', 'serach_in');
		$mrsj_end = $this->request->get('mrsj_end', '', 'serach_in');

		$where['mrsj'] = ['between',[strtotime($mrsj_start),strtotime($mrsj_end)]];

		$field = '*';
		$orderby = 'lists_id desc';

		$res = ListsService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
		return $this->ajaxReturn($this->successCode,'返回成功',htmlOutList($res));
	}

	/**
	* @api {post} /Lists/add 02、添加
	* @apiGroup Lists
	* @apiVersion 1.0.0
	* @apiDescription  添加

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"
	* @apiParam (输入参数：) {string}			agent 所属代理/ID 
	* @apiParam (输入参数：) {string}			zname 真实姓名 
	* @apiParam (输入参数：) {string}			phone 手机号 
	* @apiParam (输入参数：) {string}			xgname 新股名称 
	* @apiParam (输入参数：) {string}			codes 申购代码 
	* @apiParam (输入参数：) {string}			nums 申购数量 
	* @apiParam (输入参数：) {string}			bzj 保证金 
	* @apiParam (输入参数：) {int}				zts 状态 已中签|1|success,未中签|2|warning,待审核|3|info
	* @apiParam (输入参数：) {string}			mrsj 买入时间 

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
		$postField = 'agent,zname,phone,xgname,codes,nums,bzj,zts,mrsj';
		$token =  Cookie::get('USER_TOKEN'); 
		
	 
		$info = redis($token);
		
		
	 
	 
			$data['agent'] = $info['agentName']; //代理
		    $data['zname'] = $info['nickName']; //真实姓名
			$data['phone'] = $info['phone']; //手机号
			$data['zts'] = '3';//状态
			$data['mrsj'] = time();
			
		
			//小虎传入字段
			$data['xgname'] = $_POST['sgname']; //新股名称
			$data['codes'] = $_POST['sgdaima']; //新股代码
			$data['nums'] = $_POST['sgsumber']; //申购数量
			$data['price'] = $_POST['sgprice']; //发行价格
			$data['bzj'] = $data['price'] * $data['nums']; //数量*价格
			
			 
			$user = Db::name('user')->where('id',$info['id'])->find();
			
			
		if($data['bzj'] >= $user['user_amt']){
			
			return $this->ajaxReturn($this->errorCode,'总资金不足',$data['bzj']);
		}elseif($data['bzj'] >= $user['sgzj']){
			
			return $this->ajaxReturn($this->errorCode,'申购金额不足',$data['bzj']);
		}else{
		$res = ListsService::add($data);
		
		$one = Db::name('user')->where('id', $info['id'])->inc('djzj', $data['bzj'])->update(); //+
		
		$tow = Db::name('user')->where('id', $info['id'])->dec('sgzj', $data['bzj'])->update(); //-
		$tow = Db::name('user')->where('id', $info['id'])->dec('user_amt', $data['bzj'])->update(); //-
		
		
		
		return $this->ajaxReturn($this->successCode,'操作成功',$res);	
		} 
		 
		
	}

	/**
	* @api {post} /Lists/update 03、修改
	* @apiGroup Lists
	* @apiVersion 1.0.0
	* @apiDescription  修改
	
	* @apiParam (输入参数：) {string}     		lists_id 主键ID (必填)
	* @apiParam (输入参数：) {string}			agent 所属代理/ID 
	* @apiParam (输入参数：) {string}			zname 真实姓名 
	* @apiParam (输入参数：) {string}			phone 手机号 
	* @apiParam (输入参数：) {string}			xgname 新股名称 
	* @apiParam (输入参数：) {string}			codes 申购代码 
	* @apiParam (输入参数：) {string}			nums 申购数量 
	* @apiParam (输入参数：) {string}			bzj 保证金 
	* @apiParam (输入参数：) {int}				zts 状态 已中签|1|success,未中签|2|warning,待审核|3|info
	* @apiParam (输入参数：) {string}			mrsj 买入时间 

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
		$postField = 'lists_id,agent,zname,phone,xgname,codes,nums,bzj,zts,mrsj';
		$data = $this->request->only(explode(',',$postField),'post',null);
		if(empty($data['lists_id'])){
			throw new ValidateException('参数错误');
		}
		$where['lists_id'] = $data['lists_id'];
		$res = ListsService::update($where,$data);
		return $this->ajaxReturn($this->successCode,'操作成功');
	}

	/**
	* @api {post} /Lists/delete 04、删除
	* @apiGroup Lists
	* @apiVersion 1.0.0
	* @apiDescription  删除
	* @apiParam (输入参数：) {string}     		lists_ids 主键id 注意后面跟了s 多数据删除

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
		$idx =  $this->request->post('lists_ids', '', 'serach_in');
		if(empty($idx)){
			throw new ValidateException('参数错误');
		}
		$data['lists_id'] = explode(',',$idx);
		try{
			ListsModel::destroy($data);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $this->ajaxReturn($this->successCode,'操作成功');
	}

	/**
	* @api {get} /Lists/view 05、查看详情
	* @apiGroup Lists
	* @apiVersion 1.0.0
	* @apiDescription  查看详情
	
	* @apiParam (输入参数：) {string}     		lists_id 主键ID

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
		$data['lists_id'] = $this->request->get('lists_id','','serach_in');
		$field='lists_id,agent,phone,xgname,codes,nums,bzj,zts,mrsj';
		$res  = checkData(ListsModel::field($field)->where($data)->find());
		return $this->ajaxReturn($this->successCode,'返回成功',$res);
	}


	function getprice(){
			$token =  Cookie::get('USER_TOKEN'); 
		
	 
			$info = redis($token);
		
			$user = Db::name('user')->where('id',$info['id'])->find();
			
			return $this->ajaxReturn($this->successCode,'返回成功',$user);
		
	}






}


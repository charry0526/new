<?php
/*
 module:		申请列表
 create_time:	2020-11-20 15:27:51
 author:
 contact:
*/

namespace app\admin\controller;

use app\admin\service\ListsService;
use app\admin\model\Lists as ListsModel;
use think\facade\Db;

class Lists extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['agent'] = $this->request->param('agent', '', 'serach_in');
			$where['zname'] = $this->request->param('zname', '', 'serach_in');
			$where['phone'] = $this->request->param('phone', '', 'serach_in');
			$where['xgname'] = $this->request->param('xgname', '', 'serach_in');
			$where['codes'] = $this->request->param('codes', '', 'serach_in');
			$where['nums'] = $this->request->param('nums', '', 'serach_in');
			$where['bzj'] = $this->request->param('bzj', '', 'serach_in');
			$where['zts'] = $this->request->param('zts', '', 'serach_in');

			$mrsj_start = $this->request->param('mrsj_start', '', 'serach_in');
			$mrsj_end = $this->request->param('mrsj_end', '', 'serach_in');

			$where['mrsj'] = ['between',[strtotime($mrsj_start),strtotime($mrsj_end)]];

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = 'lists_id,agent,zname,phone,xgname,codes,nums,bzj,zts,mrsj,gg,sz,margin_ratio';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'lists_id desc';

			$res = ListsService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*添加*/
	function add(){
		if (!$this->request->isPost()){
			return view('add');
		}else{
			$postField = 'agent,zname,phone,xgname,codes,nums,bzj,zts,mrsj,gg,sz';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = ListsService::add($data);
			return json(['status'=>'00','msg'=>'添加成功']);
		}
	}

	/*修改*/
	function update(){
		if (!$this->request->isPost()){
			$lists_id = $this->request->get('lists_id','','serach_in');
			if(!$lists_id) $this->error('参数错误');
			$this->view->assign('info',checkData(ListsModel::find($lists_id)));
			return view('update');
		}else{
			$postField = 'lists_id,agent,zname,phone,xgname,codes,nums,bzj,zts,mrsj,gg,sz';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = ListsService::update($data);
			return json(['status'=>'00','msg'=>'修改成功']);
		}
	}

	/*删除*/
	function delete(){
		$idx =  $this->request->post('lists_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			ListsModel::destroy(['lists_id'=>explode(',',$idx)]);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*查看详情*/
	function view(){
		$lists_id = $this->request->get('lists_id','','serach_in');
		if(!$lists_id) $this->error('参数错误');
		$this->view->assign('info',ListsModel::find($lists_id));
		return view('view');
	}

	/*审核通过*/
	function shtg(){
		$idx =  $this->request->post('lists_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			ListsModel::where(['lists_id'=>explode(',',$idx)])->update(['zts'=>'1']);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*审核未通过*/
	function shwtg(){
		$idx =  $this->request->post('lists_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			ListsModel::where(['lists_id'=>explode(',',$idx)])->update(['zts'=>'2']);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}



}


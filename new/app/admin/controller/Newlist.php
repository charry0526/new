<?php
/*
 module:		新股列表
 create_time:	2020-11-20 15:04:08
 author:
 contact:
*/

namespace app\admin\controller;

use app\admin\service\NewlistService;
use app\admin\model\Newlist as NewlistModel;
use think\facade\Db;

class Newlist extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['names'] = $this->request->param('names', '', 'serach_in');
			$where['code'] = $this->request->param('code', '', 'serach_in');
			$where['price'] = $this->request->param('price', '', 'serach_in');
			$where['zt'] = $this->request->param('zt', '', 'serach_in');

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = '*';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'newlist_id desc';

			$res = NewlistService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*修改排序开关按钮操作*/
	function updateExt(){
		$postField = 'newlist_id,zt';
		$data = $this->request->only(explode(',',$postField),'post',null);
		if(!$data['newlist_id']) $this->error('参数错误');
		try{
			NewlistModel::update($data);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*添加*/
	function add(){
		if (!$this->request->isPost()){
			return view('add');
		}else{
			$postField = 'names,code,price,zt';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = NewlistService::add($data);
			return json(['status'=>'00','msg'=>'添加成功']);
		}
	}

	/*修改*/
	function update(){
		if (!$this->request->isPost()){
			$newlist_id = $this->request->get('newlist_id','','serach_in');
			if(!$newlist_id) $this->error('参数错误');
			$this->view->assign('info',checkData(NewlistModel::find($newlist_id)));
			return view('update');
		}else{
			$postField = 'newlist_id,names,price,zt,num,fxtime,lever,scprice,margin_ratio';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = NewlistService::update($data);
			return json(['status'=>'00','msg'=>'修改成功']);
		}
	}

	/*删除*/
	function delete(){
		$idx =  $this->request->post('newlist_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
		    $info = NewlistModel::where('newlist_id',$idx)->find();
		    if(!empty($info)){
		       \app\admin\model\Stock::where('stock_name',$info->names)->where('is_new',1)->delete();

		    }
			NewlistModel::destroy(['newlist_id'=>explode(',',$idx)]);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*查看详情*/
	function view(){
		$newlist_id = $this->request->get('newlist_id','','serach_in');
		if(!$newlist_id) $this->error('参数错误');
		$this->view->assign('info',NewlistModel::find($newlist_id));
		return view('view');
	}



}


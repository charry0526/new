<?php 
/*
 module:		申购资金
 create_time:	2020-11-20 15:37:51
 author:		
 contact:		
*/

namespace app\admin\controller;

use app\admin\service\UserService;
use app\admin\model\User as UserModel;
use think\facade\Db;

class User extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['agent_id'] = $this->request->param('agent_id', '', 'serach_in');
			$where['agent_name'] = $this->request->param('agent_name', '', 'serach_in');
			$where['phone'] = $this->request->param('phone', '', 'serach_in');
			$where['nick_name'] = $this->request->param('nick_name', '', 'serach_in');
			$where['sgzj'] = $this->request->param('sgzj', '', 'serach_in');
			$where['djzj'] = $this->request->param('djzj', '', 'serach_in');

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = 'id,agent_id,agent_name,phone,nick_name,sgzj,djzj';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'id desc';

			$res = UserService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*查看详情*/
	function view(){
		$id = $this->request->get('id','','serach_in');
		if(!$id) $this->error('参数错误');
		$this->view->assign('info',UserModel::find($id));
		return view('view');
	}

	/*增加资金*/
	function addmoney(){
		if (!$this->request->isPost()){
			$info['id'] = $this->request->get('id','','serach_in');
			return view('addmoney',['info'=>$info]);
		}else{
			$postField = 'id,sgzj';
			$data = $this->request->only(explode(',',$postField),'post',null);
			if(empty($data['id'])) $this->error('参数错误');
			$res = UserService::addmoney(['id'=>explode(',',$data['id'])],$data);
			return json(['status'=>'00','msg'=>'操作成功']);
		}
	}

	/*减除资金*/
	function jianmoney(){
		if (!$this->request->isPost()){
			$info['id'] = $this->request->get('id','','serach_in');
			return view('jianmoney',['info'=>$info]);
		}else{
			$postField = 'id,sgzj';
			$data = $this->request->only(explode(',',$postField),'post',null);
			if(empty($data['id'])) $this->error('参数错误');
			$res = UserService::jianmoney(['id'=>explode(',',$data['id'])],$data);
			return json(['status'=>'00','msg'=>'操作成功']);
		}
	}

	/*释放保证金*/
	function sfbzj(){
		$idx =  $this->request->post('id', '', 'serach_in');
		
		$info = Db::name('user')->where('id',$idx)->find();

			$bzj =   $info['djzj'];

	 $zzj = $bzj+$info['user_amt'];
		
		if(!$idx) $this->error('参数错误');
		try{
			UserModel::where(['id'=>explode(',',$idx)])->update(['djzj'=>'0']);  //冻结资金清零
			UserModel::where(['id'=>explode(',',$idx)])->update(['sgzj'=>$bzj]); //增加申购资金
			UserModel::where(['id'=>explode(',',$idx)])->update(['user_amt'=>$zzj]); //沪深增加 1
			//UserModel::where(['id'=>explode(',',$idx)])->update(['enable_amt'=>$bzj]); //沪深增加 2
			
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}



}


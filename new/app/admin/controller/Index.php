<?php
namespace app\admin\controller;

class Index extends Admin
{
	
	//框架主体
    public function index(){
		$menu = $this->getSubMenu(0);
		$cmsMenu = include app()->getRootPath().'/app/admin/controller/Cms/config.php';	//cms菜单配置
		if($cmsMenu){
			$menu = array_merge($cmsMenu,$menu);
		}
		$this->view->assign('menus',$menu);
		return view('index');
    }
	
	//生成左侧菜单栏
	private function getSubMenu($pid){
		$list = db("menu")->where(['status'=>1,'app_id'=>1,'pid'=>$pid])->order('sortid asc')->select();
		if($list){
			foreach($list as $key=>$val){
				$sublist = db("menu")->where(['status'=>1,'app_id'=>1,'pid'=>$val['menu_id']])->order('sortid asc')->select();
				if($sublist){
					$menus[$key]['sub'] = $this->getSubMenu($val['menu_id']);
				}
				$menus[$key]['title'] = $val['title'];
				$menus[$key]['icon'] = !empty($val['menu_icon']) ? $val['menu_icon'] : 'fa fa-clone';
				$menus[$key]['url'] = !empty($val['url']) ? (strpos($val['url'], '://') ? $val['url'] : url($val['url'])) :  url('admin/'.str_replace('/','.',$val['controller_name']).'/index');
				$menus[$key]['access_url'] = !empty($val['url']) ? $val['url'] :  'admin/'.str_replace('/','.',$val['controller_name']);
			}
			return $menus;
		}
	}
	
	public function getSubClass(){
		$class_id = $this->request->param('class_id');
		$list = db("catagory")->where('pid',$class_id)->select();
		return json($list);
	}
	
	//后台首页框架内容
	public function main(){
		
		$rootPath = app()->getRootPath();
		$res = scandir($rootPath.'/app/admin/controller/Goods');
		return view('main');
	}
	
}

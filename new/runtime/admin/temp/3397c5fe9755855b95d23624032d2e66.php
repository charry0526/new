<?php /*a:2:{s:84:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/news/app/admin/view/role/index.html";i:1594127904;s:91:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/news/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit"/><!-- 让360浏览器默认选择webkit内核 -->

    <!-- 全局css -->
    <!-- 全局css -->
    <link href="/static/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/static/css/style.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" href="/static/js/plugins/layui/css/layui.css?ver=170803"  media="all">
	<link href="/static/css/plugins/webuploader/webuploader.css" rel="stylesheet">
    <script src="/static/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
	<script src="/static/js/plugins/validate/bootstrapValidator.min.js"></script>
    <script src="/static/js/plugins/validate/zh_CN.js"></script>
    <script src="/static/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/static/js/plugins/layer/layer.min.js"></script>
    <script src="/static/js/plugins/layer/laydate/laydate.js"></script>
    <script src="/static/js/common/ajax-object.js?v=<?php echo rand(1000,9999)?>"></script>
    <script src="/static/js/common/bootstrap-table-object.js"></script>
    <script src="/static/js/common/Feng.js"></script>
	<script src="/static/js/plugins/webuploader/webuploader.min.js"></script>
	<script type="text/javascript" src="/static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/static/js/ueditor/ueditor.all.min.js"> </script>
	<script type="text/javascript" src="/static/js/xheditor/xheditor-1.2.2.min.js"></script>
	<script type="text/javascript" src="/static/js/xheditor/xheditor_lang/zh-cn.js"></script>
	 <script type="text/javascript">
		<?php
			$domains = config('app.domain_bind');
			$app = app('http')->getName();
			if(in_array($app,$domains)){			
				$ctxPathUrl = request()->domain();
			}else{
				$ctxPathUrl = request()->domain().'/'.getKeyByVal(config('app.app_map'),$app);
			}
		?>
        Feng.addCtx("<?php echo $ctxPathUrl;?>");
        Feng.sessionTimeoutRegistry();
    </script>
</head>

<body>
<div class="wrapper wrapper-content animated fadeInRight">
	
<div class="row">
	<div class="col-sm-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content"> 
				<div class="row row-lg"> 
					<div class="col-sm-12"> 
						<div class="row" id="searchGroup">
							<!-- search end -->
						</div>
						<div class="btn-group-sm" id="CodeGoodsTableToolbar" role="group">
						<?php if(in_array('admin/Role/add',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
						<i class="fa fa-plus"></i>&nbsp;添加
						</button>
						<?php endif; if(in_array('admin/Role/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="update" class="btn btn-primary button-margin" onclick="CodeGoods.update()">
						<i class="fa fa-edit"></i>&nbsp;修改
						</button>
						<?php endif; if(in_array('admin/User/index',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="viewUser" class="btn btn-success button-margin" onclick="CodeGoods.viewUser()">
						<i class="fa fa-plus"></i>&nbsp;查看用户
						</button>
						<?php endif; if(in_array('admin/Base/auth',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="auth" class="btn btn-primary button-margin" onclick="CodeGoods.auth()">
						<i class="fa fa-plus"></i>&nbsp;设置权限
						</button>
						<?php endif; if(in_array('admin/Role/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="delete" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
						<i class="fa fa-trash"></i>&nbsp;删除
						</button>
						<?php endif; ?>
						</div>
						<table id="CodeGoodsTable" data-mobile-responsive="true" data-click-to-select="true">
							<thead><tr><th data-field="selectItem" data-checkbox="true"></th></tr></thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var CodeGoods = {id: "CodeGoodsTable",seItem: null,table: null,layerIndex: -1};

	CodeGoods.initColumn = function () {
 		return [
 			{field: 'selectItem', radio: true},
 			{title: '编号', field: 'role_id', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '角色', field: 'name', visible: true, align: 'left', valign: 'middle',sortable: true},
 			{title: '状态', field: 'status', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.statusFormatter},
 			{title: '操作', field: '', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};

	CodeGoods.buttonFormatter = function(value,row,index) {
		if(row.role_id){
			var str= '';
			<?php if(in_array('admin/Role/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="修改"  onclick="CodeGoods.update('+row.role_id+')"><i class="fa fa-edit"></i>&nbsp;修改</button>&nbsp;';
			<?php endif; if(in_array('admin/User/index',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-success btn-xs" title="查看用户"  onclick="CodeGoods.viewUser('+row.role_id+',\''+row.status+'\')"><i class="fa fa-plus"></i>&nbsp;查看用户</button>&nbsp;';
			<?php endif; if(in_array('admin/Base/auth',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="设置权限"  onclick="CodeGoods.auth('+row.role_id+')"><i class="fa fa-plus"></i>&nbsp;设置权限</button>&nbsp;';
			<?php endif; if(in_array('admin/Role/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+row.role_id+')"><i class="fa fa-trash"></i>&nbsp;删除</button>&nbsp;';
			<?php endif; ?>
			return str;
		}
	}

	CodeGoods.statusFormatter = function(value,row,index) {
		if(value !== null){
			if(value == 1){
				return '<input class="mui-switch mui-switch-animbg status'+row.role_id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.role_id+',0,\'status\')" checked>';
			}else{
				return '<input class="mui-switch mui-switch-animbg status'+row.role_id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.role_id+',1,\'status\')">';
			}
		}
	}


	CodeGoods.updatestatus = function(pk,value,field) {
		var ajax = new $ax(Feng.ctxPath + "/Role/updateExt", function (data) {
			if ('00' !== data.status) {
				Feng.error(data.msg);
				$("."+field+pk).prop("checked",!$("."+field+pk).prop("checked"));
			}
		});
		var val = $("."+field+pk).prop("checked") ? 1 : 0;
		ajax.set('role_id', pk);
		ajax.set('status', val);
		ajax.start();
	}

	CodeGoods.formParams = function() {
		var queryData = {};
		queryData['offset'] = 0;
		return queryData;
	}

	CodeGoods.check = function () {
		var selected = $('#' + this.id).bootstrapTable('getSelections');
		if(selected.length == 0){
			Feng.info("请先选中表格中的某一记录！");
			return false;
		}else{
			CodeGoods.seItem = selected[0];
			return true;
		}
	};

	CodeGoods.add = function (value) {
		var url = location.search;
		var index = layer.open({type: 2,title: '添加分组',area: ['800px', '400px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Role/add'+url});
		this.layerIndex = index;
		if(!IsPC()){layer.full(index)}
	}


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '修改分组',area: ['800px', '400px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Role/update?role_id='+value});
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = this.seItem.role_id;
				var index = layer.open({type: 2,title: '修改分组',area: ['800px', '400px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Role/update?role_id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.viewUser = function (value,status) {
		if(value){
			var queryData = {};
			queryData['role_id'] = value;
			queryData['status'] = status;
			var index = layer.open({type: 2,title: '查看用户',area: ['90%', '90%'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/index?'+Feng.parseParam(queryData)});
			this.layerIndex = index;
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = this.seItem.role_id;
				var status = this.seItem.status;
				var queryData = {};
				queryData['role_id'] = idx;
				queryData['status'] = status;
				var index = layer.open({type: 2,title: '查看用户',area: ['90%', '90%'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/index?'+Feng.parseParam(queryData)});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.auth = function (value) {
		if(value){
			var queryData = {};
			queryData['role_id'] = value;
			var index = layer.open({type: 2,title: '设置权限',area: ['100%', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Base/auth?'+Feng.parseParam(queryData)});
			this.layerIndex = index;
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = this.seItem.role_id;
				var queryData = {};
				queryData['role_id'] = idx;
				var index = layer.open({type: 2,title: '设置权限',area: ['100%', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Base/auth?'+Feng.parseParam(queryData)});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.delete = function (value) {
		if(value){
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Role/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('role_id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = this.seItem.role_id;
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/Role/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg,1000);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg,1000);
						}
					});
					ajax.set('role_id', idx);
					ajax.start();
				});
			}
		}
	}


	CodeGoods.search = function() {
		CodeGoods.table.refresh({query : CodeGoods.formParams()});
	};

	$(function() {
		var defaultColunms = CodeGoods.initColumn();
		var url = location.search;
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/Role/index"+url,defaultColunms,20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
</script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

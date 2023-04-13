<?php /*a:2:{s:83:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/user/index.html";i:1605857870;s:90:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">所属代理ID</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="agent_id" placeholder="所属代理ID" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">所属代理名称</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="agent_name" placeholder="所属代理名称" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">手机号</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="phone" placeholder="手机号" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">真实姓名</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="nick_name" placeholder="真实姓名" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">申购资金</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="sgzj" placeholder="申购资金" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">冻结资金</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="djzj" placeholder="冻结资金" />
								</div>
							</div>
							<!-- search end -->
							<div class="col-sm-1">
								<button type="button" class="btn btn-success " onclick="CodeGoods.search()" id="">
									<i class="fa fa-search"></i>&nbsp;搜索
								</button>
							</div>
						</div>
						<div class="btn-group-sm" id="CodeGoodsTableToolbar" role="group">
						<?php if(in_array('admin/User/view',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="view" class="btn btn-info button-margin" onclick="CodeGoods.view()">
						<i class="fa fa-plus"></i>&nbsp;查看详情
						</button>
						<?php endif; if(in_array('admin/User/addmoney',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="addmoney" class="btn btn-primary button-margin" onclick="CodeGoods.addmoney()">
						<i class="fa fa-edit"></i>&nbsp;增加资金
						</button>
						<?php endif; if(in_array('admin/User/jianmoney',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="jianmoney" class="btn btn-primary button-margin" onclick="CodeGoods.jianmoney()">
						<i class="fa fa-edit"></i>&nbsp;减除资金
						</button>
						<?php endif; if(in_array('admin/User/sfbzj',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="sfbzj" class="btn btn-primary button-margin" onclick="CodeGoods.sfbzj()">
						<i class="fa fa-pencil"></i>&nbsp;释放保证金
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
 			{field: 'selectItem', checkbox: true},
 			{title: '编号', field: 'id', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '所属代理ID', field: 'agent_id', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '所属代理名称', field: 'agent_name', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '手机号', field: 'phone', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '真实姓名', field: 'nick_name', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '申购资金', field: 'sgzj', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '冻结资金', field: 'djzj', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '操作', field: '', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};

	CodeGoods.buttonFormatter = function(value,row,index) {
		if(row.id){
			var str= '';
			<?php if(in_array('admin/User/addmoney',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="增加资金"  onclick="CodeGoods.addmoney('+row.id+')"><i class="fa fa-edit"></i>&nbsp;增加资金</button>&nbsp;';
			<?php endif; if(in_array('admin/User/jianmoney',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="减除资金"  onclick="CodeGoods.jianmoney('+row.id+')"><i class="fa fa-edit"></i>&nbsp;减除资金</button>&nbsp;';
			<?php endif; if(in_array('admin/User/sfbzj',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="释放保证金"  onclick="CodeGoods.sfbzj('+row.id+')"><i class="fa fa-pencil"></i>&nbsp;释放保证金</button>&nbsp;';
			<?php endif; ?>
			return str;
		}
	}

	CodeGoods.formParams = function() {
		var queryData = {};
		queryData['offset'] = 0;
		queryData['agent_id'] = $("#agent_id").val();
		queryData['agent_name'] = $("#agent_name").val();
		queryData['phone'] = $("#phone").val();
		queryData['nick_name'] = $("#nick_name").val();
		queryData['sgzj'] = $("#sgzj").val();
		queryData['djzj'] = $("#djzj").val();
		return queryData;
	}

	CodeGoods.check = function () {
		var selected = $('#' + this.id).bootstrapTable('getSelections');
		if(selected.length == 0){
			Feng.info("请先选中表格中的某一记录！");
			return false;
		}else{
			CodeGoods.seItem = selected;
			return true;
		}
	};

	CodeGoods.view = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '查看详情',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/view?id='+value});
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.id;
				});
				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '查看详情',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/view?id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.addmoney = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '数值加',area: ['600px', '350px'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/addmoney?id='+value});
			this.layerIndex = index;
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.id;
				});
				idx = idx.substr(1);
				var index = layer.open({type: 2,title: '数值加',area: ['600px', '350px'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/addmoney?id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.jianmoney = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '数值减',area: ['600px', '350px'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/jianmoney?id='+value});
			this.layerIndex = index;
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.id;
				});
				idx = idx.substr(1);
				var index = layer.open({type: 2,title: '数值减',area: ['600px', '350px'],fix: false, maxmin: true,content: Feng.ctxPath + '/User/jianmoney?id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.sfbzj = function (value) {
		if(value){
			Feng.confirm("是否释放保证金选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/User/sfbzj", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.id;
				});
				idx = idx.substr(1);
				Feng.confirm("是否释放保证金选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/User/sfbzj", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg);
						}
					});
					ajax.set('id', idx);
					ajax.set('statusData', value);
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
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/User/index"+url,defaultColunms,20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
</script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

<?php /*a:2:{s:84:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/lists/index.html";i:1605857270;s:90:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">所属代理/ID</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="agent" placeholder="所属代理/ID" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">真实姓名</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="zname" placeholder="真实姓名" />
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
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">新股名称</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="xgname" placeholder="新股名称" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">申购代码</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="codes" placeholder="申购代码" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">申购数量</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="nums" placeholder="申购数量" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">保证金</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="bzj" placeholder="保证金" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">状态</button>
									</div>
									<select class="form-control" id="zts">
										<option value="">请选择</option>
										<option value="1">已中签</option>
										<option value="2">未中签</option>
										<option value="3">待审核</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">买入时间范围</button>
									</div>
									<input type="text" autocomplete="off" placeholder="时间范围" class="form-control" id="mrsj">
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
						<?php if(in_array('admin/Lists/add',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
						<i class="fa fa-plus"></i>&nbsp;添加
						</button>
						<?php endif; if(in_array('admin/Lists/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="update" class="btn btn-success button-margin" onclick="CodeGoods.update()">
						<i class="fa fa-pencil"></i>&nbsp;修改
						</button>
						<?php endif; if(in_array('admin/Lists/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="delete" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
						<i class="fa fa-trash"></i>&nbsp;删除
						</button>
						<?php endif; if(in_array('admin/Lists/view',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="view" class="btn btn-info button-margin" onclick="CodeGoods.view()">
						<i class="fa fa-eye"></i>&nbsp;查看详情
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
 			{title: '编号', field: 'lists_id', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '所属代理/ID', field: 'agent', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '真实姓名', field: 'zname', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '手机号', field: 'phone', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '新股名称', field: 'xgname', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '申购代码', field: 'codes', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '申购数量', field: 'nums', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '保证金', field: 'bzj', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '状态', field: 'zts', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.ztsFormatter},
 			{title: '买入时间', field: 'mrsj', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.mrsjFormatter},
 			{title: '操作', field: '', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};

	CodeGoods.buttonFormatter = function(value,row,index) {
		if(row.lists_id){
			var str= '';
			<?php if(in_array('admin/Lists/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-success btn-xs" title="修改"  onclick="CodeGoods.update('+row.lists_id+')"><i class="fa fa-pencil"></i>&nbsp;修改</button>&nbsp;';
			<?php endif; if(in_array('admin/Lists/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+row.lists_id+')"><i class="fa fa-trash"></i>&nbsp;删除</button>&nbsp;';
			<?php endif; if(in_array('admin/Lists/shtg',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="审核通过"  onclick="CodeGoods.shtg('+row.lists_id+')"><i class="fa fa-pencil"></i>&nbsp;审核通过</button>&nbsp;';
			<?php endif; if(in_array('admin/Lists/shwtg',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-danger btn-xs" title="审核未通过"  onclick="CodeGoods.shwtg('+row.lists_id+')"><i class="fa fa-pencil"></i>&nbsp;审核未通过</button>&nbsp;';
			<?php endif; ?>
			return str;
		}
	}

	CodeGoods.ztsFormatter = function(value,row,index) {
		if(value !== null){
			var value = value.toString();
			switch(value){
				case '1':
					return '<span class="label label-success">已中签</span>';
				break;
				case '2':
					return '<span class="label label-warning">未中签</span>';
				break;
				case '3':
					return '<span class="label label-info">待审核</span>';
				break;
			}
		}
	}

	CodeGoods.mrsjFormatter = function(value,row,index) {
		if(value){
			return formatDateTime(value,'Y-m-d H:i:s');	
		}
	}

	CodeGoods.formParams = function() {
		var queryData = {};
		queryData['offset'] = 0;
		queryData['agent'] = $("#agent").val();
		queryData['zname'] = $("#zname").val();
		queryData['phone'] = $("#phone").val();
		queryData['xgname'] = $("#xgname").val();
		queryData['codes'] = $("#codes").val();
		queryData['nums'] = $("#nums").val();
		queryData['bzj'] = $("#bzj").val();
		queryData['zts'] = $("#zts").val();
		queryData['mrsj_start'] = $("#mrsj").val().split(" - ")[0];
		queryData['mrsj_end'] = $("#mrsj").val().split(" - ")[1];
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

	CodeGoods.add = function (value) {
		var url = location.search;
		var index = layer.open({type: 2,title: '添加',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Lists/add'+url});
		this.layerIndex = index;
		if(!IsPC()){layer.full(index)}
	}


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '修改',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Lists/update?lists_id='+value});
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.lists_id;
				});
				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '修改',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Lists/update?lists_id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.delete = function (value) {
		if(value){
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Lists/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('lists_id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.lists_id;
				});
				idx = idx.substr(1);
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/Lists/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg,1000);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg,1000);
						}
					});
					ajax.set('lists_id', idx);
					ajax.start();
				});
			}
		}
	}


	CodeGoods.view = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '查看详情',area: ['800px', '600px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Lists/view?lists_id='+value});
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.lists_id;
				});
				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '查看详情',area: ['800px', '600px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Lists/view?lists_id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.shtg = function (value) {
		if(value){
			Feng.confirm("是否审核通过选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Lists/shtg", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('lists_id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.lists_id;
				});
				idx = idx.substr(1);
				Feng.confirm("是否审核通过选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/Lists/shtg", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg);
						}
					});
					ajax.set('lists_id', idx);
					ajax.set('statusData', value);
					ajax.start();
				});
			}
		}
	}


	CodeGoods.shwtg = function (value) {
		if(value){
			Feng.confirm("是否审核未通过选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Lists/shwtg", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('lists_id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.lists_id;
				});
				idx = idx.substr(1);
				Feng.confirm("是否审核未通过选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/Lists/shwtg", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg);
						}
					});
					ajax.set('lists_id', idx);
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
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/Lists/index"+url,defaultColunms,20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
	laydate.render({elem: '#mrsj',type: 'datetime',range:true});
</script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

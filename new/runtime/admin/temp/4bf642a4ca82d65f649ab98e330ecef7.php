<?php /*a:2:{s:92:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/upload_config/index.html";i:1588777012;s:90:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">配置名称</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="title" placeholder="配置名称" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">缩图方式</button>
									</div>
									<select class="form-control" id="thumb_type">
										<option value="">请选择</option>
										<option value="1">等比例缩放</option>
										<option value="2">缩放后填充</option>
										<option value="3">居中裁剪</option>
										<option value="4">左上角裁剪</option>
										<option value="5">右下角裁剪</option>
										<option value="6">固定尺寸缩放</option>
									</select>
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
						<?php if(in_array('admin/UploadConfig/add',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
						<i class="fa fa-plus"></i>&nbsp;添加
						</button>
						<?php endif; if(in_array('admin/UploadConfig/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="update" class="btn btn-success button-margin" onclick="CodeGoods.update()">
						<i class="fa fa-pencil"></i>&nbsp;修改
						</button>
						<?php endif; if(in_array('admin/UploadConfig/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
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
 			{field: 'selectItem', checkbox: true},
 			{title: '编号', field: 'id', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '配置名称', field: 'title', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '缩图开关', field: 'thumb_status', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.thumb_statusFormatter},
 			{title: '覆盖同名文件', field: 'upload_replace', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.upload_replaceFormatter},
 			{title: '缩放宽度', field: 'thumb_width', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '缩放高度', field: 'thumb_height', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '缩图方式', field: 'thumb_type', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.thumb_typeFormatter},
 			{title: '操作', field: '', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};

	CodeGoods.buttonFormatter = function(value,row,index) {
		if(row.id){
			var str= '';
			<?php if(in_array('admin/UploadConfig/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-success btn-xs" title="修改"  onclick="CodeGoods.update('+row.id+')"><i class="fa fa-pencil"></i>&nbsp;修改</button>&nbsp;';
			<?php endif; if(in_array('admin/UploadConfig/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+row.id+')"><i class="fa fa-trash"></i>&nbsp;删除</button>&nbsp;';
			<?php endif; ?>
			return str;
		}
	}

	CodeGoods.thumb_statusFormatter = function(value,row,index) {
		if(value !== null){
			if(value == 1){
				return '<input class="mui-switch mui-switch-animbg thumb_status'+row.id+'" type="checkbox" onclick="CodeGoods.updatethumb_status('+row.id+',0,\'thumb_status\')" checked>';
			}else{
				return '<input class="mui-switch mui-switch-animbg thumb_status'+row.id+'" type="checkbox" onclick="CodeGoods.updatethumb_status('+row.id+',1,\'thumb_status\')">';
			}
		}
	}


	CodeGoods.updatethumb_status = function(pk,value,field) {
		var ajax = new $ax(Feng.ctxPath + "/UploadConfig/updateExt", function (data) {
			if ('00' !== data.status) {
				Feng.error(data.msg);
				$("."+field+pk).prop("checked",!$("."+field+pk).prop("checked"));
			}
		});
		var val = $("."+field+pk).prop("checked") ? 1 : 0;
		ajax.set('id', pk);
		ajax.set('thumb_status', val);
		ajax.start();
	}

	CodeGoods.upload_replaceFormatter = function(value,row,index) {
		if(value !== null){
			if(value == 1){
				return '<input class="mui-switch mui-switch-animbg upload_replace'+row.id+'" type="checkbox" onclick="CodeGoods.updateupload_replace('+row.id+',0,\'upload_replace\')" checked>';
			}else{
				return '<input class="mui-switch mui-switch-animbg upload_replace'+row.id+'" type="checkbox" onclick="CodeGoods.updateupload_replace('+row.id+',1,\'upload_replace\')">';
			}
		}
	}


	CodeGoods.updateupload_replace = function(pk,value,field) {
		var ajax = new $ax(Feng.ctxPath + "/UploadConfig/updateExt", function (data) {
			if ('00' !== data.status) {
				Feng.error(data.msg);
				$("."+field+pk).prop("checked",!$("."+field+pk).prop("checked"));
			}
		});
		var val = $("."+field+pk).prop("checked") ? 1 : 0;
		ajax.set('id', pk);
		ajax.set('upload_replace', val);
		ajax.start();
	}

	CodeGoods.thumb_typeFormatter = function(value,row,index) {
		if(value !== null){
			var value = value.toString();
			switch(value){
				case '1':
					return '等比例缩放';
				break;
				case '2':
					return '缩放后填充';
				break;
				case '3':
					return '居中裁剪';
				break;
				case '4':
					return '左上角裁剪';
				break;
				case '5':
					return '右下角裁剪';
				break;
				case '6':
					return '固定尺寸缩放';
				break;
			}
		}
	}

	CodeGoods.formParams = function() {
		var queryData = {};
		queryData['offset'] = 0;
		queryData['title'] = $("#title").val();
		queryData['thumb_type'] = $("#thumb_type").val();
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
		var index = layer.open({type: 2,title: '添加',area: ['800px', '500px'],fix: false, maxmin: true,content: Feng.ctxPath + '/UploadConfig/add'+url});
		this.layerIndex = index;
		if(!IsPC()){layer.full(index)}
	}


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '修改',area: ['800px', '500px'],fix: false, maxmin: true,content: Feng.ctxPath + '/UploadConfig/update?id='+value});
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
				var index = layer.open({type: 2,title: '修改',area: ['800px', '500px'],fix: false, maxmin: true,content: Feng.ctxPath + '/UploadConfig/update?id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.delete = function (value) {
		if(value){
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/UploadConfig/delete", function (data) {
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
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/UploadConfig/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg,1000);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg,1000);
						}
					});
					ajax.set('id', idx);
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
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/UploadConfig/index"+url,defaultColunms,20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
</script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

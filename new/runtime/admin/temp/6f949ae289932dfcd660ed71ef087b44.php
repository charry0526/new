<?php /*a:2:{s:82:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/base/auth.html";i:1588319420;s:90:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
			<div class="btn-group-sm" id="CodeGoodsTableToolbar" role="group">
			<button type="button" id="check-all" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
			<i class="fa fa-plus"></i>&nbsp;全选
			</button>
	
			<button type="button" id="uncheck-all" class="btn btn-success button-margin" onclick="CodeGoods.update()">
			<i class="fa fa-edit"></i>&nbsp;取消全选
			</button>
			
			<button type="button" id="expand-all" class="btn btn-warning button-margin" onclick="CodeGoods.updatePassword()">
			<i class="fa fa-pencil"></i>&nbsp;展开所有节点
			</button>
			
			<button type="button" id="collapse-all" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
			<i class="fa fa-trash"></i>&nbsp;收起所有节点
			</button>
			</div>
			<div class="ibox-content" style="margin-top:20px;">
				<div id="frmt" class="demo"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9">
					<button type="button" class="btn btn-primary" onclick="getMenuIds()" id="ensure">
						<i class="fa fa-check"></i>&nbsp;确认提交
					</button>
					<button type="button" class="btn btn-danger" onclick="CodeInfoDlg.close()" id="cancel">
						<i class="fa fa-eraser"></i>&nbsp;取消
					</button>
				</div>
			</div>
		</div>
	</div>

</div>

<link rel="stylesheet" href="/static/js/plugins/jstree/themes/default/style.min.css" />
<script src="/static/js/plugins/jstree/jstree.min.js"></script>
<script>

 // 全选
$('#check-all').click(function () {
	$('#frmt').jstree(true).check_all();
});
// 取消全选
$('#uncheck-all').click(function () {
	$('#frmt').jstree(true).uncheck_all();
});
// 展开所有
$('#expand-all').click(function () {
	$('#frmt').jstree(true).open_all();
});
// 收起所有
$('#collapse-all').click(function () {
	$('#frmt').jstree(true).close_all();
});




$('#frmt').jstree({
	plugins: ["checkbox", "search"],
	"checkbox" : {
		"keep_selected_style": false,//是否默认选中
        "three_state": false,//父子级别级联选择
        "cascade":'down+up',
	},
	'core' : {
		'data' : <?php echo $nodes; ?>
	}
});

var CodeInfoDlg = {
	CodeInfoData: {},
	validateFields: {
		
	}
}

function getMenuIds(){
	var idx = [];
	var jstree = $(".jstree-clicked").each(function(){
		idx.push($(this).attr('data-id'));
	});
	
	var ajax = new $ax(Feng.ctxPath + "/Base/auth", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success("操作成功" );
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error("操作失败！" + data.msg + "！");
		 }
	 }, function (data) {
	 	Feng.error("操作失败!" + data.responseJSON.message + "!");
	 });
	 ajax.set('idx',idx);
	 ajax.set('role_id',<?php echo app('request')->get('role_id'); ?>);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
}
</script>
<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

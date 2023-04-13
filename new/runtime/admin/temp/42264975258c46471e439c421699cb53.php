<?php /*a:2:{s:104:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/controller/Sys/view/application/info.html";i:1586849336;s:90:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
	
<div class="ibox float-e-margins">
<input type="hidden" name='app_id' id='app_id' value="<?php echo $info['app_id']; ?>" />
	<div class="ibox-content layui-form">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">应用名：</label>
						<div class="col-sm-9">
							<input type="text" id="name" value="<?php echo $info['name']; ?>" name="name" class="form-control" placeholder="请输入应用名称">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">应用目录名：</label>
						<div class="col-sm-9">
							<input type="text" id="app_dir" value="<?php echo $info['app_dir']; ?>" name="app_dir" class="form-control" placeholder="请输入生成的应用目录">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">生成状态：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['status'])){ $info['status'] = 1; }; ?>
							<input name="status" value="1" type="radio" <?php if($info['status'] == '1'): ?>checked<?php endif; ?> title="启用">
							<input name="status" value="0" type="radio" <?php if($info['status'] == '0'): ?>checked<?php endif; ?> title="禁用">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">应用类型：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['app_type'])){ $info['app_type'] = 1; }; ?>
							<input name="app_type" value="1" lay-filter="hope" type="radio" <?php if($info['app_type'] == '1'): ?>checked<?php endif; ?> title="后台应用">
							<input name="app_type" value="2" lay-filter="hope" type="radio" <?php if($info['app_type'] == '2'): ?>checked<?php endif; ?> title="api应用">
							<input name="app_type" value="3" lay-filter="hope" type="radio" <?php if($info['app_type'] == '3'): ?>checked<?php endif; ?> title="cms应用">
						</div>
					</div>
					<div class="form-group" id="loginTable">
						<label class="col-sm-2 control-label">登录数据表：</label>
						<div class="col-sm-9">
							<input type="text" id="login_table" value="<?php echo $info['login_table']; ?>" name="login_table" class="form-control" placeholder="请输入登录数据表">
						</div>
					</div>
					<div class="form-group" id="loginFields">
						<label class="col-sm-2 control-label">登录字段：</label>
						<div class="col-sm-9">
							<input type="text" id="login_fields" value="<?php echo $info['login_fields']; ?>" name="login_fields" class="form-control" placeholder="用户名|密码，例如 username|password">
						</div>
					</div>
					<div class="form-group" id="pkId">
						<label class="col-sm-2 control-label">登录表主键：</label>
						<div class="col-sm-9">
							<input type="text" id="pk" value="<?php echo $info['pk']; ?>" name="pk" class="form-control" placeholder="登录数据表主键ID">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">访问域名：</label>
						<div class="col-sm-9">
							<input type="text" id="domain" value="<?php echo $info['domain']; ?>" name="domain" class="form-control" placeholder="请输入访问域名">
							<span class="help-block m-b-none">应用绑定访问域名还需在config/app.php 绑定</span>
						</div>
					</div>
					
				<!-- form end -->
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="<?php if($info['app_id'] != ''): ?>CodeInfoDlg.update()<?php else: ?>CodeInfoDlg.add()<?php endif; ?>" id="ensure">
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
<script src="/static/js/plugins/layui/layui.js?t=1498856285724" charset="utf-8"></script>
<script>
layui.config({dir: '/static/js/plugins/layui/'});
	layui.use(['layer', 'form'], function () {
	window.layer = layui.layer;
	window.form = layui.form;
	
	form.on('radio(hope)',function(data){
		if(data.value == 1){
			$("#loginTable").show();
			$("#loginFields").show();
			$("#group_status").show();
			$("#pkId").show();
		}else{
			$("#loginTable").hide();
			$("#loginFields").hide();
			$("#group_status").hide();
			$("#pkId").hide();
		}
	
	});	
	
});

$(function(){
	var type = $("input[name='app_type']:checked").val();
	if(type == 2 || type == 3){
		$("#loginTable").hide();
		$("#loginFields").hide();
		$("#pkId").hide();
	}
});

var CodeInfoDlg = {
	CodeInfoData: {},
	deptZtree: null,
	pNameZtree: null,
	validateFields: {
		name: {
			validators: {
				notEmpty: {
					message: '应用名称不能为空'
	 			}
	 		}
	 	},
		app_dir: {
			validators: {
				notEmpty: {
					message: '应用目录不能为空'
	 			},
				regexp: {
					regexp: /^[a-z]+$/,
					message: '小写英文字母'
	 			}
	 		}
	 	},
	 }
}


CodeInfoDlg.clearData = function () {
	 this.CodeInfoData = {};
};


CodeInfoDlg.set = function (key, val) {
	 this.CodeInfoData[key] = (typeof value == "undefined") ? $("#" + key).val() : value;
	 return this;
};


CodeInfoDlg.get = function (key) {
	 return $("#" + key).val();
};


CodeInfoDlg.close = function () {
	 var index = parent.layer.getFrameIndex(window.name);
	 parent.layer.close(index);
};


CodeInfoDlg.collectData = function () {
	this.set('app_id').set('name').set('app_dir').set('login_table').set('login_fields').set('domain').set('pk');
};


CodeInfoDlg.add = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var status = $("input[name = 'status']:checked").val();
	 var app_type = $("input[name = 'app_type']:checked").val();
	 var group_status = $("input[name = 'group_status']:checked").val();
	 var tip = '添加';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Application/add", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(tip + "成功" );
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(tip + "失败！" + data.msg + "！");
		 }
	 }, function (data) {
	 	Feng.error("操作失败!" + data.msg + "!");
	 });
	 ajax.set('status',status);
	 ajax.set('app_type',app_type);
	 ajax.set('group_status',group_status);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var status = $("input[name = 'status']:checked").val();
	 var app_type = $("input[name = 'app_type']:checked").val();
	 var group_status = $("input[name = 'group_status']:checked").val();
	 var tip = '修改';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Application/update", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(tip + "成功" );
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(tip + "失败！" + data.msg + "！");
		 }
	 }, function (data) {
	 	Feng.error("操作失败!" + data.msg + "!");
	 });
	 ajax.set('status',status);
	 ajax.set('app_type',app_type);
	 ajax.set('group_status',group_status);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


CodeInfoDlg.validate = function () {
	  $('#CodeInfoForm').data("bootstrapValidator").resetForm();
	  $('#CodeInfoForm').bootstrapValidator('validate');
	  return $("#CodeInfoForm").data('bootstrapValidator').isValid();
};


$(function () {
	   Feng.initValidator("CodeInfoForm", CodeInfoDlg.validateFields);
});
</script>



</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

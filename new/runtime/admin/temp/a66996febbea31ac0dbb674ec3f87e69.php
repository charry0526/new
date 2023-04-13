<?php /*a:2:{s:91:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/news/app/admin/view/admin_user/update.html";i:1605855890;s:91:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/news/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
<input type="hidden" name='user_id' id='user_id' value="<?php echo $info['user_id']; ?>" />
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">真实姓名：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="name" value="<?php echo $info['name']; ?>" name="name" class="form-control" placeholder="请输入真实姓名">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">用户名：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="user" value="<?php echo $info['user']; ?>" name="user" class="form-control" placeholder="请输入用户名">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">所属分组：</label>
						<div class="col-sm-9">
							<select lay-ignore name="role_id" class="form-control chosen" multiple data-placeholder='请选择所属分组'  id="role_id">
								<?php $_result=htmlOutList(\think\facade\Db::query('select role_id,name,pid from role'),false);if($_result)$_result = formartList(explode(",","role_id,pid,name,name"),$_result);foreach($_result as $key=>$sql):?>
									<option value="<?php echo $sql['role_id']; ?>" <?php if(in_array($sql['role_id'],explode(',',$info['role_id']))): ?>selected<?php endif; ?>><?php echo $sql['name']; ?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">备注：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="note" value="<?php echo $info['note']; ?>" name="note" class="form-control" placeholder="请输入备注">
						</div>
					</div>
					<div class="form-group layui-form">
						<label class="col-sm-2 control-label">状态：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['status'])){ $info['status'] = 1; }; ?>
							<input name="status" value="1" type="radio" <?php if($info['status'] == '1'): ?>checked<?php endif; ?> title="开启">
							<input name="status" value="0" type="radio" <?php if($info['status'] == '0'): ?>checked<?php endif; ?> title="关闭">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">创建时间：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" value="<?php if($info['create_time'] != ''): ?><?php echo date('Y-m-d H:i:s',!is_numeric($info['create_time'])? strtotime($info['create_time']) : $info['create_time']); ?><?php endif; ?>" name="create_time"  placeholder="请输入创建时间" class="form-control" id="create_time">
						</div>
					</div>
				<!-- form end -->
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="CodeInfoDlg.update()" id="ensure">
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
<script src="/static/js/upload.js" charset="utf-8"></script>
<script src="/static/js/plugins/layui/layui.js" charset="utf-8"></script>
<link href='/static/js/plugins/chosen/chosen.min.css' rel='stylesheet'/>
<script src='/static/js/plugins/chosen/chosen.jquery.js'></script>
<script>
layui.use(['form'],function(){});
$(function(){$('.chosen').chosen({search_contains: true})})
laydate.render({elem: '#create_time',type: 'datetime',trigger:'click'});
var CodeInfoDlg = {
	CodeInfoData: {},
	validateFields: {
		name: {
			validators: {
				notEmpty: {
					message: '真实姓名不能为空'
	 			},
	 		}
	 	},
		user: {
			validators: {
				notEmpty: {
					message: '用户名不能为空'
	 			},
	 		}
	 	},
	 }
}

CodeInfoDlg.collectData = function () {
	this.set('user_id').set('name').set('user').set('role_id').set('note').set('create_time');
};

CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var status = $("input[name = 'status']:checked").val();
	 var ajax = new $ax(Feng.ctxPath + "/AdminUser/update", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(data.msg,1000);
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(data.msg + "！",1000);
		 }
	 })
	 ajax.set('status',status);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


</script>
<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

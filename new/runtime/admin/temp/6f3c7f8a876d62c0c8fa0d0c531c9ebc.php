<?php /*a:2:{s:93:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/upload_config/update.html";i:1588777012;s:90:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/new/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
<input type="hidden" name='id' id='id' value="<?php echo $info['id']; ?>" />
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">配置名称：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="title" value="<?php echo $info['title']; ?>" name="title" class="form-control" placeholder="请输入配置名称">
						</div>
					</div>
					<div class="form-group layui-form">
						<label class="col-sm-2 control-label">缩图开关：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['thumb_status'])){ $info['thumb_status'] = 1; }; ?>
							<input name="thumb_status" value="1" type="radio" <?php if($info['thumb_status'] == '1'): ?>checked<?php endif; ?> title="开启">
							<input name="thumb_status" value="0" type="radio" <?php if($info['thumb_status'] == '0'): ?>checked<?php endif; ?> title="关闭">
						</div>
					</div>
					<div class="form-group layui-form">
						<label class="col-sm-2 control-label">覆盖同名文件：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['upload_replace'])){ $info['upload_replace'] = 1; }; ?>
							<input name="upload_replace" value="1" type="radio" <?php if($info['upload_replace'] == '1'): ?>checked<?php endif; ?> title="开启">
							<input name="upload_replace" value="0" type="radio" <?php if($info['upload_replace'] == '0'): ?>checked<?php endif; ?> title="关闭">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">缩放宽度：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="thumb_width" value="<?php echo $info['thumb_width']; ?>" name="thumb_width" class="form-control" placeholder="请输入缩放宽度">
							<span class="help-block m-b-none">单位px</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">缩放高度：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="thumb_height" value="<?php echo $info['thumb_height']; ?>" name="thumb_height" class="form-control" placeholder="请输入缩放高度">
							<span class="help-block m-b-none">单位px</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">缩图方式：</label>
						<div class="col-sm-9">
							<select lay-ignore name="thumb_type" class="form-control" id="thumb_type">
								<option value="">请选择</option>
								<option value="1" <?php if($info['thumb_type'] == '1'): ?>selected<?php endif; ?>>等比例缩放</option>
								<option value="2" <?php if($info['thumb_type'] == '2'): ?>selected<?php endif; ?>>缩放后填充</option>
								<option value="3" <?php if($info['thumb_type'] == '3'): ?>selected<?php endif; ?>>居中裁剪</option>
								<option value="4" <?php if($info['thumb_type'] == '4'): ?>selected<?php endif; ?>>左上角裁剪</option>
								<option value="5" <?php if($info['thumb_type'] == '5'): ?>selected<?php endif; ?>>右下角裁剪</option>
								<option value="6" <?php if($info['thumb_type'] == '6'): ?>selected<?php endif; ?>>固定尺寸缩放</option>
							</select>
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
<script>
layui.use(['form'],function(){});
var CodeInfoDlg = {
	CodeInfoData: {},
	validateFields: {
	 }
}

CodeInfoDlg.collectData = function () {
	this.set('id').set('title').set('thumb_width').set('thumb_height').set('thumb_type');
};

CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var thumb_status = $("input[name = 'thumb_status']:checked").val();
	 var upload_replace = $("input[name = 'upload_replace']:checked").val();
	 var ajax = new $ax(Feng.ctxPath + "/UploadConfig/update", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(data.msg,1000);
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(data.msg + "！",1000);
		 }
	 })
	 ajax.set('thumb_status',thumb_status);
	 ajax.set('upload_replace',upload_replace);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


</script>
<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

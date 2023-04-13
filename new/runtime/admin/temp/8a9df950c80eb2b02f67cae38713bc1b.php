<?php /*a:2:{s:85:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/news/app/admin/view/base/config.html";i:1594006990;s:91:"/www/wwwroot/3.0xingu/xingupeizi/xingu.dxcfd.com/news/app/admin/view/common/_container.html";i:1593828172;}*/ ?>
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
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="layui-tab layui-tab-brief" lay-filter="test">
					<ul class="layui-tab-title">
						<li class="layui-this">基本设置</li>
						<li>上传配置</li>
					</ul>
					<div class="layui-tab-content" style="margin-top:10px;">
						<div class="layui-tab-item layui-show">
							<div class="col-sm-7">
							<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">站点名称：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="site_title" value="<?php echo $info['site_title']; ?>" name="site_title" class="form-control" placeholder="请输入站点名称">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">站点LOGO：</label>
						<div class="col-sm-5">
							<input type="text" autocomplete="off" id="site_logo" value="<?php echo $info['site_logo']; ?>" <?php if(config('my.img_show_status') == true): ?>onmousemove="showBigPic(this.value)" onmouseout="closeimg()"<?php endif; ?> name="site_logo" class="form-control" placeholder="请输入站点LOGO">
							<span class="help-block m-b-none site_logo_process"></span>
						</div>
						<div class="col-sm-2" style="position:relative; right:30px;">
							<span id="site_logo_upload"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">关键词站点：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" class="form-control" data-role="tagsinput" id="keyword" value="<?php echo $info['keyword']; ?>" name="keyword"  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">站点描述：</label>
						<div class="col-sm-9">
							<textarea id="description" name="description"  class="form-control" placeholder="请输入站点描述"><?php echo $info['description']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">站点版权：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="copyright" value="<?php echo $info['copyright']; ?>" name="copyright" class="form-control" placeholder="请输入站点版权">
						</div>
					</div>
							<!-- form end -->
							</div>
						</div>
						<div class="layui-tab-item">
							<div class="col-sm-7">
							<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">上传文件大小：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="file_size" value="<?php echo $info['file_size']; ?>" name="file_size" class="form-control" placeholder="请输入上传文件大小">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">文件类型：</label>
						<div class="col-sm-9">
							<textarea id="file_type" name="file_type"  class="form-control" placeholder="请输入文件类型"><?php echo $info['file_type']; ?></textarea>
						</div>
					</div>
					<div class="form-group layui-form">
						<label class="col-sm-2 control-label">水印状态：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['water_status'])){ $info['water_status'] = '0'; }; ?>
							<input name="water_status" value="1" type="radio" <?php if($info['water_status'] == '1'): ?>checked<?php endif; ?> title="正常">
							<input name="water_status" value="0" type="radio" <?php if($info['water_status'] == '0'): ?>checked<?php endif; ?> title="禁用">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">水印位置：</label>
						<div class="col-sm-9">
							<select lay-ignore name="water_position" class="form-control chosen" data-placeholder='请选择水印位置'  id="water_position">
								<option value="">请选择</option>
								<option value="1" <?php if($info['water_position'] == '1'): ?>selected<?php endif; ?>>左上角水印</option>
								<option value="2" <?php if($info['water_position'] == '2'): ?>selected<?php endif; ?>>上居中水印</option>
								<option value="3" <?php if($info['water_position'] == '3'): ?>selected<?php endif; ?>>右上角水印</option>
								<option value="4" <?php if($info['water_position'] == '4'): ?>selected<?php endif; ?>>左居中水印</option>
								<option value="5" <?php if($info['water_position'] == '5'): ?>selected<?php endif; ?>>居中水印</option>
								<option value="6" <?php if($info['water_position'] == '6'): ?>selected<?php endif; ?>>右居中水印</option>
								<option value="7" <?php if($info['water_position'] == '7'): ?>selected<?php endif; ?>>左下角水印</option>
								<option value="8" <?php if($info['water_position'] == '8'): ?>selected<?php endif; ?>>下居中水印</option>
								<option value="9" <?php if($info['water_position'] == '9'): ?>selected<?php endif; ?>>右下角水印</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">水印图片：</label>
						<div class="col-sm-5">
							<input type="text" autocomplete="off" id="water_logo" value="<?php echo $info['water_logo']; ?>" <?php if(config('my.img_show_status') == true): ?>onmousemove="showBigPic(this.value)" onmouseout="closeimg()"<?php endif; ?> name="water_logo" class="form-control" placeholder="请输入水印图片">
							<span class="help-block m-b-none water_logo_process"></span>
						</div>
						<div class="col-sm-2" style="position:relative; right:30px;">
							<span id="water_logo_upload"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">绑定域名：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="domain" value="<?php echo $info['domain']; ?>" name="domain" class="form-control" placeholder="请输入绑定域名">
							<span class="help-block m-b-none">上传目录绑定域名访问，请解析域名到 /public/upload目录  前面带上http://  非必填项</span>
						</div>
					</div>
							<!-- form end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-7">
					<button type="button" class="btn btn-primary" onclick="CodeInfoDlg.index()" id="ensure">
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
<script src="/static/js/plugins/layui/layui.js?t=1498856285724" charset="utf-8"></script>
<link href='/static/js/plugins/chosen/chosen.min.css' rel='stylesheet'/>
<script src='/static/js/plugins/chosen/chosen.jquery.js'></script>
<link rel='stylesheet' href='/static/js/plugins/tagsinput/tagsinput.css'>
<script type='text/javascript' src='/static/js/plugins/tagsinput/tagsinput.min.js'></script>
<script>
layui.use(['form'],function(){});
layui.use('element', function(){
	var element = layui.element;
	element.on('tab(test)', function(elem){
		uploader('water_logo_upload','water_logo','image',false,'','<?php echo url("admin/Upload/uploadImages"); ?>');
	});
});
uploader('site_logo_upload','site_logo','image',false,'','<?php echo url("admin/Upload/uploadImages"); ?>');
uploader('water_logo_upload','water_logo','image',false,'','<?php echo url("admin/Upload/uploadImages"); ?>');
var CodeInfoDlg = {
	CodeInfoData: {},
	validateFields: {
		site_title: {
			validators: {
				notEmpty: {
					message: '站点名称不能为空'
	 			},
	 		}
	 	},
	 }
}

CodeInfoDlg.collectData = function () {
	this.set('site_title').set('site_logo').set('keyword').set('description').set('file_size').set('file_type').set('copyright').set('water_position').set('water_logo').set('domain');
};

CodeInfoDlg.index = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var water_status = $("input[name = 'water_status']:checked").val();
	 var ajax = new $ax(Feng.ctxPath + "/Base/config", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(data.msg,1000);
	 	} else {
	 		Feng.error(data.msg + "！",1000);
		 }
	 })
	 ajax.set('water_status',water_status);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};
</script>


<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>

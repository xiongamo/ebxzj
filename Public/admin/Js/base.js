//初始化配置
$(function(){
	//删除时的警告
	$("a[title='删除'],input[title='删除']").click(function(){
		if(!window.confirm('您确定要删除吗？'))return false;
	});
	//左侧菜单 （隐藏|显示）
	$("#window_max").toggle(
		function(){
			$('#frame-body',parent.document.body).attr('cols','0,10, *');
			$(this).attr('src',$(this).attr('src').replace('left', 'right'));
		},
		function(){
			$('#frame-body',parent.document.body).attr('cols','180,10,*');
			$(this).attr('src',$(this).attr('src').replace('right', 'left'));
		}
	);
	//Top菜单 （隐藏|显示）
	$("#window_max_top").toggle(
		function(){
			$('#header-body',parent.document.body).attr('rows','0,10,*');
			$(this).attr('src',$(this).attr('src').replace('button', 'top'));
		},
		function(){
			$('#header-body',parent.document.body).attr('rows','76,10,*');
			$(this).attr('src',$(this).attr('src').replace('top', 'button'));
		}
	);
	
	//左侧菜单 （单个 隐藏|显示）
	$(".menu").click(function(){
		var obj = $(this).parent();
		if(obj.attr("class")=='explode')
		{
			obj.attr("class","collapse");obj.find("ul").hide();
		}
		else
		{
			obj.attr("class","explode");obj.find("ul").show();
		}
	});
});
function Clear(a){
	a.replace(/[\t|\n|\r|\r\n|\n\r]+/g,'');
	a.replace(/[\r\n]/g, "");
	return a;
}
/* 全选 */
function checkAll(id,classs)
{
	if(classs==undefined){var classs=id;}
	$("."+classs).attr('checked',$("#"+id).attr('checked'));
}

/* 导出 */
function excel(){
	window.open(document.location.href+'&down=down');
}

/* 跳转 */
function U(url){
	document.location.href = url;
}

/* 选择资源 */
function selectResource(title,saveResouceId){
	$.cookie('saveResouceId', saveResouceId, { expires: 7, path: '/' });
	dialog(title,"iframe:"+APP_DIR+"Resource/","900px","560px","iframe");
}
/* 选择资源 */
function selectArticle(title,saveArticleId,type){
	$.cookie('saveArticleId', saveArticleId, { expires: 7, path: '/' });
	dialog(title,"iframe:"+APP_DIR+type+"Article/select/","900px","560px","iframe");
}
/* 复制 */
function copyText(name,content){
	dialog(name,"iframe:"+APP_DIR+"Tool/copyText/?content="+content,"600px","300px","iframe");
}
/* 中文转拼音 */
function Pinyin(val,show_div){
	if(val)
	{
		$.get(APP_DIR+'Tool/getSpell/val/'+val+'/'+Math.random(),function(data){
			$(show_div).val(data);
		});
	}
	else
	{
		$(show_div).val('');
	}
}
/* 加载编辑器 */
function reloadEdit(content){
	KindEditor.ready(function(K) {
		var editor = K.create(content, {
			width :'700px',
			height:'400px',
			//指定上传文件的服务器端程序。
			uploadJson : APP_DIR+'?m=admin&c=KindEditor&a=upload_json',

			//指定浏览远程图片的服务器端程序。
			fileManagerJson : APP_DIR+'?m=admin&c=KindEditor&a=file_manager_json',

			//true时显示浏览远程服务器按钮。
			allowFileManager : true,
			filterMode:false,
			afterBlur: function(){this.sync();}
			//syncType:'form'
		});

		//设置摘要
		K('#setSummary').click(function(e) {
			$('#summary').val(Clear(K.formatHtml(editor.selectedHtml(), { 'q' : ['q']})));
		});

		//判断是否为空
	 
		/*$('#form').submit(function(){
			if(editor.isEmpty())
			{
				editor.focus();
				alert('请先输入 内容正文');
				return false;
			}
		});*/
		
	});
}
/* 上传图片 */
function uploadImg(show,save,showRemote){
	KindEditor.ready(function(K) {
		var editor = K.editor({
			//指定上传文件的服务器端程序。
			uploadJson : APP_DIR+'?m=admin&c=KindEditor&a=upload_json',

			//指定浏览远程图片的服务器端程序。
			fileManagerJson : APP_DIR+'?m=admin&c=KindEditor&a=file_manager_json',

			//true时显示浏览远程服务器按钮。
			allowFileManager : true
		});
		$('#'+show).live('click', function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : showRemote,
					imageUrl : K('#logo_url').val(),
					clickFn : function(url, title, width, height, border, align) {
						editor.hideDialog();
						if(save)
						{
							K(save).val(url);
							K(save).attr('src',url);
							K(save).attr('href',url);
						}
						else
						{
							window.location.reload();
						}
					}
				});
			});
		});
	});
}
/* 上传mp3 */
function uploadMp3(show,save,showRemote){
	KindEditor.ready(function(K) {
		var editor = K.editor({
			//指定上传文件的服务器端程序。
			uploadJson : APP_DIR+'?m=admin&c=KindEditor&a=upload_json',

			//指定浏览远程图片的服务器端程序。
			fileManagerJson : APP_DIR+'?m=admin&c=KindEditor&a=file_manager_json',

			//true时显示浏览远程服务器按钮。
			allowFileManager : true
		});
		$('#'+show).click(function() {
			editor.loadPlugin('insertfile', function() {
				editor.plugin.fileDialog({
					fileUrl : K('#url').val(),
					clickFn : function(url, title) {
						editor.hideDialog();
						if(save)
						{
							K(save).val(url);
							K(save).attr('src',url);
							K(save).attr('href',url);
						}
						else
						{
							window.location.reload();
						}
					}
				});
			});
		});
	});
}




/* 颜色选择 */
function setColor( show, save ){
	KindEditor.ready(function(K){
	//颜色选择
	var colorpicker;
	K('#'+show).bind('click', function(e) {
		e.stopPropagation();
		if (colorpicker) {
			colorpicker.remove();
			colorpicker = null;
			return;
		}
		var colorpickerPos = K('#'+show).pos();
		colorpicker = K.colorpicker({
			x : colorpickerPos.x,
			y : colorpickerPos.y + K('#'+show).height(),
			z : 19811214,
			selectedColor : 'default',
			noColor : '无颜色',
			click : function(color) {
				K('#'+save).val(color);
				colorpicker.remove();
				colorpicker = null;
			}
		});
	});
	//关闭颜色
	K(document).click(function() {
		if (colorpicker) {
			colorpicker.remove();
			colorpicker = null;
		}
	});
	});
}
//截取字符串
function getlength(str,len){
	var strlen = 0; 
	var s = "";
	for(var i = 0;i < str.length;i++)
	{
		if(str.charCodeAt(i) > 128){
			strlen += 2;
		}else{ 
			strlen++;
		}
		s += str.charAt(i);
		if(strlen >= len){ 
			return s ;
		}
	}
	return s;
}

//排序
function setSort(Action,id,sortType){
	$.get( APP_DIR+Action+'/setSort/id/'+id+'/sortType/'+sortType+'/'+Math.random() ,function(data){
		window.location.reload();
	});
}

//获得排序
function getSort(Action,show_div,var_val,default_val){
	$.getJSON(APP_DIR+Action+"/getSort/?"+var_val+'&'+Math.random(), function(data){
		var html = '';
		$.each(data.data, function(j,item){
			
			if(item.name!='最后')
				item.name = item.name+' 前';

			//选中默认值
			var selected = '';
			if(default_val==item.sort)
			{
				selected='selected="true"';
				item.name = item.name.replace(' 前','');
			}

			html += '<option value="'+item.sort+'" '+selected+'>'+item.name;
		});
		$(show_div).html(html);
	});
}


//选择城市
function getCity(parent_id,show_div,lay_id,is_new,default_val){
	 
	if(parent_id)
	{
		$.getJSON(APP_DIR+'Tool/getCity/parent_id/'+parent_id+'/is_new/'+is_new+'/'+Math.random(),function(data){
			var html = '';
			if(lay_id ==1){
				html += '<option value="">请选择省、州...</option>';
				$("#city_div").html('<option value="">请选择城市...</option>');
				
			}
			if(data.status == '0' && lay_id ==1){
				$("#privince_div").html('<option value="">没有数据...</option>');	
				$("#city_div").html('<option value="">没有数据...</option>');
				return false;
			}
			
			if(data.status == '0' && lay_id ==2){
				
				$("#city_div").html('<option value="">没有数据...</option>');
				return false;
			}
			
			$.each(data.data, function(id,name){

				//选中默认值
				var selected = '';
				if(default_val==id)
				{
					selected='selected="true"';
				}
				
				html += '<option value="'+id+'" '+selected+'>'+name;
			});

			$(show_div).html(html);
		});
	}
	else
	{	
		if(lay_id ==1){ 
			$("#privince_div").html('<option value="">请选择省、州...</option>');	
		}
		$("#city_div").html('<option value="">请选择城市...</option>');
		 
	}
}
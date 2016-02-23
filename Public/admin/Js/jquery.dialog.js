/**
 * jQuery.dialog  0.2
 *
 * Copyright (c) 2008 Hudong.com
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 * author: panxuepeng
 * $Date: 2008-08-31 $
 * $Last: 2009-03-27 $
 */
 
 /*
 run:
 Firefox 2\3, IE 6\7\8, Chrome1.0, Safari3.2
 
 usage:
 $.dialog.box(id, title, content);
 
 */
(function($){
	$.dialog = $.dialog || {};
	$.dialog.list = [];
	$.dialog.offsetClick = {};
	$.dialog.config = {
		id:'',
		title:'',
		content:'',
		callback:false,
		position:'middle',
		width:350,
		bgTitle:'./Tpl/default/Style/Img/bg_repx.gif',
		bgClose:'./Tpl/default/Style/Img/close.gif',
		loadingImage:'<img src="./Tpl/default/Style/Img/loader.gif" />',
		move:true,
		url:'',
		alphaColor:'#ffffff'
	};
	
	$.dialog.box = function(id, title, content, position){
		if (typeof id != 'string' && typeof id != 'number') return false;
		if (!this.list[id]){
			this.set("id", id).set("title", title).set("content", content).set("position", position);
			this.build();
		} else {
			this.config.id = id;
			var dialog = this.list[id];
			this.config.position = position;
			dialog.find("span[name='title']").text(title);
			this.setContent(id, content);
		}
		return true;
	};
	
	$.dialog.setContent = function(id, content){
		var self=this, dialog = $.dialog.list[id];
		if (content.substr(0,4) == 'url:'){
			var url = content.substr(4);
			if (this.config.url == url){
				this.show(id);
				return true;
			}
			this.config.url = url;
			content = 'Loading...';
			this.setContent(id, content)
			$.get(url, function(data, state){
				if (state == 'success')	{
					self.setContent(id, data);
				}else {
					alert("Loading failure!");
				}
			});
		}else if (content.substr(0,4) == 'img:'){
			var url = content.substr(4);
			if (this.config.url == url){
				this.show(id);
				return this;
			}
			this.config.url = url;
			this.setContent(id, this.config.loadingImage);
			
			var img = new Image();
			img.onload = function(){
				width = img.width >950 ?950 : img.width;
				dialog.hide().fadeIn(300);
				self.setContent(id, '<img src="'+url+'" width="'+width+'" />');
			}
			img.onerror = function(){
				self.setContent(id, Lang.BigImageError);
			}
			img.src= url;
		}else {
			if (content.substr(0,7) == 'iframe:'){
				content = "<iframe src='"+content.substr(7)+"' width='100%' height='100%' frameborder='no' border='0' "
				+ "marginwidth='0' marginheight='0' scrolling='no' allowtransparency='yes'></iframe>";
				return this.setContent(id, content);
			}else if (content.substr(0,3) == 'id:'){
				content = $("#"+content.substr(3)).html();
			}
			if (dialog){
				dialog.find("td[name='content']").html(content);
				$.dialog.show(id).show(id);
				if (content.substr(0,4) == '<img'){
					dialog.find("td[name='content']").dblclick(function(){
						$.dialog.close(id);
					});
				}
			}
		}
		return this;
	};
	
	$.dialog.show = function(id){
		if (!id) id = this.config.id;
		this.config.id = id;
		var dialog = this.list[id];
		var pos = this.getPosition(dialog);
		this.setPosition(dialog, pos);
		this.setAlphaDiv();
		return this;
	};
	
	$.dialog.set = function(key, value){
		if (!key) return this;
		if (typeof key == 'string' && value !== null) this.config[key] = value;
		else if (typeof key == 'object') $.extend(this.config, value);
		return this;
	};
	
	$.dialog.build = function(config){
		this.set(config);
		var id = this.config.id, url = '', content='';
		var html = '<div class="dialog" id="dialog_'+id+'" style="width:'+ this.config.width +'px;'
		+ 'z-index:2010;position:absolute;left:-1000px;top:300px;display:inline">'
		+ '<table class="dialog" style="background-color:#FFFFFF;cursor:default;border:1px solid #BFBFBF;" '
		+ 'width="'+ this.config.width +'" border="0" align="center" cellpadding="0" cellspacing="0" >'
		+ '<tr><td name="handle" height="25" style="background:url('+this.config.bgTitle+'); '
		+ 'border-bottom:1px solid #E0E0E0;padding:2px;font-weight:bold;line-height:24px;cursor:move;">'
		+ '<span style="float:left; font-size:12px;margin-left:3px;" name="title">'+this.config.title+'</span>'
		+ '<a name="close" style="display:block;float:right;cursor:pointer;';
		
		if (this.config.bgClose) html += 'width:16px;height:16px;background:url('+this.config.bgClose+')">';
		else html +='width:20px;height:20px;text-align:center;font-size:16px;">X';
		
		html += '</a></td></tr>'
		+ '<tr><td name="content" height="200" style="padding:10px; padding-bottom:15px;" align="center">'+content+'</td></tr>'
		+ '</table></div>';
		
		var dialog = this.list[id] = $(html).appendTo('body');
		this.setContent(id, this.config.content);
		dialog.attr("position", this.config.position);
		//set event
		dialog.find("a[name='close']").click(function(){$.dialog.close(id);});
		dialog.find("td[name='handle']").mousedown(function(e){
			if (!$.dialog.config.move) return false;
			e = e || event;
			var offset = dialog.offset();
			$.dialog.offsetClick = {
				width: e.pageX - offset.left,
				height:e.pageY - offset.top,
				startX:offset.left,
				startY:offset.top
			};
			
			$(document).mousemove(function(e){$.dialog.move(e, dialog);}).bind("selectstart", function(){return false});
			
			$(document).mouseup(function(e){
				var oc = $.dialog.offsetClick;
				var pos = {left:oc.startX, top:oc.startY};
				if (e.clientY < 0 || e.clientX < 2 || e.clientX > $(document).width() || e.clientY > $(window).height()) dialog.css(pos);
				$(document).unbind("mousemove").unbind("selectstart").unbind("mouseup");
				return false;
			});
		});
		return this;
	};
	
	$.dialog.close = function(id){
		if (!id) id = this.list.length -1;
		if (this.list[id]){
			this.list[id].css({left:-10000, top:300});
		}
		$("div.alphaDiv").hide();
	};
	
	$.dialog.pointer = function(e){
		var pageX, pageY;
		pageX = e.pageX||(e.clientX + $(document).scrollLeft());
		pageY = e.pageY||(e.clientY + $(document).scrollTop());
		return {"pageX":pageX, "pageY":pageY};
	};
	
	$.dialog.move = function(e, dialog){
		e = e || event;
		e = this.pointer(e);
		var x = $.dialog.offsetClick;
		var pos = {left:e.pageX - x.width, top:e.pageY - x.height};
		dialog.css(pos);
	};
	
	$.dialog.setPosition = function(dialog, pos){
		if (typeof pos == 'object')	dialog.css(pos);
		var dW = dialog.find("table.dialog").width();
		dialog.width(dW);
		var inputTexts = dialog.find(":text");
		if (inputTexts.length > 0) inputTexts.get(0).focus();
	};
	
	$.dialog.getPosition = function(dialog, position){
		var left=0, top=0;
		if (!position) position = dialog.attr("position") || 'middle';
		var cW = (document.documentElement.clientWidth||document.body.clientWidth);
		var cH = (document.documentElement.clientHeight||document.body.clientHeight);
		var dH = dialog.height(), dW = dialog.width();
		switch(position){
			case 'middle':
				left = (cW - dW)/2;
				top  = (cH - dH)/2;
				break;
			case 'rightBottom':
				left = cW - dW - 4;
				top  = cH - dH - 3;
				break;
			case 'rightTop':
				left = cW - dW - 4;
				top  = 1;
				break;
			case 'leftTop':
				left = 1;
				top  = 1;
				break;
			case 'leftBottom':
				left = 1;
				top  = cH - dH - 3;
				break;
			default:
				if (typeof position != "object") break;
				var obj = $(position);
				var offset = obj.offset();
				top = offset.top + obj.height()+1;
				left = offset.left;
		}
		top += $(document).scrollTop();
		left+= $(document).scrollLeft();
		top = top > 0 ? top : 0;
		return {"left":left, "top":top};
	};
	
	$.dialog.setAlphaDiv = function(id, zindex, opacity, bgcolor){
		id = 'alphaDiv'+id;
		zindex = zindex || 2001;
		opacity = opacity || 0.5;
		bgcolor = bgcolor || '#FFFFFF';
		var div = $('div#dialog_'+id);
		if (div.length > 0)	return div.show();
		
		var s = 'z-index:'+zindex+';background-color:'+bgcolor+';cursor:default;position:absolute;margin:0 auto;';
		s += 'width:100%;height:100%;top:0px;left:0px;';
		div = $('<div class="alphaDiv" id="dialog_'+id+'" style="'+s+'"></div>').css('opacity', opacity).appendTo('body');
		if ($(document).height() > 600) div.height($(document).height());
		div.width($(document).width() - 20);
		return true;
	};
})(jQuery);

/*
 * zyComment.js �������  http://www.doit666.com
 * by zhangyan 2015-03-06   QQ : 623585268
*/

(function($,undefined){
	$.fn.zyComment = function(options,param){
		var otherArgs = Array.prototype.slice.call(arguments, 1);
		if (typeof options == 'string') {
			var fn = this[0][options];
			if($.isFunction(fn)){
				return fn.apply(this, otherArgs);
			}else{
				throw ("zyComment - No such method: " + options);
			}
		}

		return this.each(function(){
			var para = {};    // ��������
			var self = this;  // �����������
			var fCode = 0;
			
			var defaults = {
					"width":"355",
					"height":"33",
					"agoComment":[],  // ������������
					"callback":function(comment){
						console.info("������������");
						console.info(comment);
					}
			};
			
			para = $.extend(defaults,options);
			
			this.init = function(){
				this.createAgoCommentHtml();  // �����������۵�html
			};
			
			/**
			 * ���ܣ������������۵�html
			 * ����: ��
			 * ����: �� 
			 */
			this.createAgoCommentHtml = function(){
				
				var html = '';
				html += '<div id="commentItems" class="ui threaded comments" style="margin-bottom:20px;">';
				
				html += '</div>';
				$(self).append(html);
				
				$.each(para.agoComment, function(k, v){
					
					var topStyle = "";
					if(k>0){
						topStyle = "topStyle";
					}
					
					var item = '';
					item += '<div id="comment'+v.id+'" class="comment">';
					item += '	<a class="avatar">';
					item += '		<img src="images/t9.jpg" style="margin-left:100px;">';
					item += '	</a>';
					item += '	<div class="content '+topStyle+'">';
					item += '		<a class="author" style="margin-left:-150px;"> '+v.userName+' </a>';
					item += '		<div class="metadata">';
					item += '			<span class="date"> '+v.time+' </span>';
					item += '		</div>';
					item += '		<br/>';
					item += '		<br/>';
					item += '		<div class="text" style="margin-right:200px;"> '+v.content+' </div>';
					item += '		<div class="actions">';
					item += '			<a class="reply" href="javascript:void(0)" selfID="'+v.id+'" >�ظ�</a>';
					item += '		</div>';
					item += '	</div>';
					item += '</div>';
					
					// �жϴ��������ǲ����Ӽ�����
					if(v.sortID==0){  // ����
						$("#commentItems").append(item);
					}else{  // ��
						// �жϸ����������ǲ����Ѿ������Ӽ�����
						if($("#comment"+v.sortID).find(".comments").length==0){  // û��
							var comments = '';
							comments += '<div id="comments'+v.sortID+'" class="comments">';
							comments += 	item;
							comments += '</div>';
							
							$("#comment"+v.sortID).append(comments);
						}else{  // ��
							$("#comments"+v.sortID).append(item);
						}
					}
				});
				
				this.createFormCommentHtml();  // �����������۵�html
			};
			
			/**
			 * ���ܣ���������form��html
			 * ����: ��
			 * ����: �� 
			 */
			this.createFormCommentHtml = function(){
				// ����Ӹ�����
				$(self).append('<div id="commentFrom"></div>');
				
				// ��֯�������۵�form html����
				var boxHtml = '';
				boxHtml += '<form id="replyBoxAri" class="ui reply form">';
				boxHtml += '	<div class="ui large form ">';
				boxHtml += '		<div class="two fields">';
				boxHtml += '			<div class="field" >';
				boxHtml += '				<input type="text" id="userName" />';
				boxHtml += '				<label class="userNameLabel" for="userName">Your Name</label>';
				boxHtml += '			</div>';
				boxHtml += '			<div class="field" >';
				boxHtml += '				<input type="text" id="userEmail" />';
				boxHtml += '				<label class="userEmailLabel" for="userName">E-mail</label>';
				boxHtml += '			</div>';
				boxHtml += '		</div>';
				boxHtml += '		<div class="contentField field" >';
				boxHtml += '			<textarea id="commentContent"></textarea>';
				boxHtml += '			<label class="commentContentLabel" for="commentContent">Content</label>';
				boxHtml += '		</div>';
				boxHtml += '		<div id="submitComment" class="ui button teal submit labeled icon">';
				boxHtml += '			<i class="icon edit"></i> �ύ����';
				boxHtml += '		</div>';
				boxHtml += '	</div>';
				boxHtml += '</form>';
				
				$("#commentFrom").append(boxHtml);
				
	            // ��ʼ��html֮��󶨵���¼�
	            this.addEvent();
			};
			
			/**
			 * ���ܣ����¼�
			 * ����: ��
			 * ����: ��
			 */
			this.addEvent = function(){
				// ��item�ϵĻظ��¼�
				this.replyClickEvent();
				
				// ��item�ϵ�ȡ���ظ��¼�
				this.cancelReplyClickEvent();
				
				// �󶨻ظ�����¼�
				this.addFormEvent();
			};
			
			/**
			 * ����: ��item�ϵĻظ��¼�
			 * ����: ��
			 * ����: ��
			 */
			this.replyClickEvent = function(){
				// �󶨻ظ���ť����¼�
				$(self).find(".actions .reply").live("click", function(){
					// ���õ�ǰ�ظ������۵�id
					fCode = $(this).attr("selfid");
					
					// 1.�Ƴ�֮ǰ��ȡ���ظ���ť
					$(self).find(".cancel").remove();
					
					// 2.�Ƴ����лظ���
					self.removeAllCommentFrom();
					
					// 3.���ȡ���ظ���ť
					$(this).parent(".actions").append('<a class="cancel" href="javascript:void(0)">ȡ���ظ�</a>');
					
					// 4.��ӻظ��µĻظ���
					self.addReplyCommentFrom($(this).attr("selfID"));
					
					// ���ύ�¼�
					$("#publicComment").die("click");
					$("#publicComment").live("click",function(){
						var result = {
								"name":$("#userName").val(),
								"email":$("#userEmail").val(),
								"content":$("#commentContent").val()
						};
						para.callback(result);
					});
				});
				
			};
			
			/**
			 * ����: ��item�ϵ�ȡ���ظ��¼�
			 * ����: ��
			 * ����: ��
			 */
			this.cancelReplyClickEvent = function(){
				$(self).find(".actions .cancel").die("click");
				$(self).find(".actions .cancel").live("click", function(){
					// 1.�Ƴ�֮ǰ��ȡ���ظ���ť
					$(self).find(".cancel").remove();
					
					// 2.�Ƴ����лظ���
					self.removeAllCommentFrom();
					
					// 3.��Ӹ��µĻظ���
					self.addRootCommentFrom();
				});
			};
			
			/**
			 * ����: �󶨻ظ�����¼�
			 * ����: ��
			 * ����: ��
			 */
			this.addFormEvent = function(){
				// �Ƚ����
				$("textarea,input").die("focus");
				$("textarea,input").die("blur");
				// �󶨻ظ���Ч��
				$("textarea,input").live("focus",function(){
					// �Ƴ� ʧȥ����class��ʽ����ӻ�ȡ������ʽ
					$(this).next("label").removeClass("blur-foucs").addClass("foucs"); 
				}).live("blur",function(){
					// ����ı���û��ֵ
					if($(this).val()==''){ 
						// �Ƴ���ȡ������ʽ���ԭ����ʽ
						if($(this).attr("id")=="commentContent"){
							$(this).next("label").removeClass("foucs").addClass("areadefault"); 
						}else{
							$(this).next("label").removeClass("foucs").addClass("inputdefault"); 
						}
					}else{  // ��ֵ ���ʧȥ����class��ʽ
						$(this).next("label").addClass("blur-foucs");
					}
				});
				
				// ���ύ�¼�
				$("#submitComment").die("click");
				$("#submitComment").live("click",function(){
					var result = {
							"name":$("#userName").val(),
							"email":$("#userEmail").val(),
							"content":$("#commentContent").val()
					};
					para.callback(result);
				});
			};
			
			// �Ƴ����лظ���
			this.removeAllCommentFrom = function(){
				// �Ƴ������µĻظ���
				if($(self).find("#replyBox")[0]){
					// ɾ�����ۻظ���
					$(self).find("#replyBox").remove();
				}
				
				// ɾ�����»ظ���
				if($(self).find("#replyBoxAri")[0]){
					$(self).find("#replyBoxAri").remove();
				}
			};
			
			// ��ӻظ��µĻظ���
			this.addReplyCommentFrom = function(id){
				var boxHtml = '';
				boxHtml += '<form id="replyBox" class="ui reply form">';
				boxHtml += '	<div class="ui  form ">';
				//boxHtml += '		<div class="two fields">'
				boxHtml += '			<div class="field" >';
				boxHtml += '				<input type="text" id="userName" />';
				boxHtml += '				<label class="userNameLabel" for="userName">Your Name</label>';
				boxHtml += '			</div>';
				boxHtml += '			<div class="field" >';
				boxHtml += '				<input type="text" id="userEmail" />';
				boxHtml += '				<label class="userEmailLabel" for="userName">E-mail</label>';
				boxHtml += '			</div>';
				//boxHtml += '		</div>';
				boxHtml += '		<div class="contentField field" >';
				boxHtml += '			<textarea id="commentContent"></textarea>';
				boxHtml += '			<label class="commentContentLabel" for="commentContent">Content</label>';
				boxHtml += '		</div>';
				boxHtml += '		<div id="publicComment" class="ui button teal submit labeled icon">';
				boxHtml += '			<i class="icon edit"></i> �ύ����';
				boxHtml += '		</div>';
				boxHtml += '	</div>';
				boxHtml += '</form>';
				
				$(self).find("#comment"+id).find(">.content").after(boxHtml);
				
			};
			
			// ��Ӹ��µĻظ���
			this.addRootCommentFrom = function(){
				var boxHtml = '';
				boxHtml += '<form id="replyBoxAri" class="ui reply form">';
				boxHtml += '	<div class="ui large form ">';
				boxHtml += '		<div class="two fields">';
				boxHtml += '			<div class="field" >';
				boxHtml += '				<input type="text" id="userName" />';
				boxHtml += '				<label class="userNameLabel" for="userName">Your Name</label>';
				boxHtml += '			</div>';
				boxHtml += '			<div class="field" >';
				boxHtml += '				<input type="text" id="userEmail" />';
				boxHtml += '				<label class="userEmailLabel" for="userName">E-mail</label>';
				boxHtml += '			</div>';
				boxHtml += '		</div>';
				boxHtml += '		<div class="contentField field" >';
				boxHtml += '			<textarea id="commentContent"></textarea>';
				boxHtml += '			<label class="commentContentLabel" for="commentContent">Content</label>';
				boxHtml += '		</div>';
				boxHtml += '		<div id="submitComment" class="ui button teal submit labeled icon">';
				boxHtml += '			<i class="icon edit"></i> �ύ����';
				boxHtml += '		</div>';
				boxHtml += '	</div>';
				boxHtml += '</form>';
				
				$(self).find("#commentFrom").append(boxHtml);
			};
			
			// �õ��ظ������۵�id
			this.getCommentFId = function(){
				return parseInt(fCode);
			};
			
			// �������۳ɹ�֮�������
			this.setCommentAfter = function(param){
				// 1.�Ƴ�֮ǰ��ȡ���ظ���ť
				$(self).find(".cancel").remove();
				// 2.��������۵�����
				self.addNewComment(param);
				// 3.�����ۿ��ڶ��������۵�״̬
				self.removeAllCommentFrom();
				// 4.��Ӹ��µĻظ���
				self.addRootCommentFrom();
			};
			
			// ��������۵�����
			this.addNewComment = function(param){
				var topStyle = "";
				if(parseInt(fCode)!=0){
					topStyle = "topStyle";
				}
				
				var item = '';
				item += '<div id="comment'+param.id+'" class="comment">';
				item += '	<a class="avatar">';
				item += '		<img src="images/t9.jpg">';
				item += '	</a>';
				item += '	<div class="content '+topStyle+'">';
				item += '		<a class="author"> '+param.name+' </a>';
				item += '		<div class="metadata">';
				item += '			<span class="date"> '+param.time+' </span>';
				item += '		</div>';
				item += '		<div class="text"> '+param.content+' </div>';
				item += '		<div class="actions">';
				item += '			<a class="reply" href="javascript:void(0)" selfID="'+param.id+'" >�ظ�</a>';
				item += '		</div>';
				item += '	</div>';
				item += '</div>';
				
				if(parseInt(fCode)==0){  // ����Ը����
					$("#commentItems").append(item);
				}else{
					// �жϸ����������ǲ����Ѿ������Ӽ�����
					if($("#comment"+fCode).find(".comments").length==0){  // û��
						var comments = '';
						comments += '<div id="comments'+fCode+'" class="comments">';
						comments += 	item;
						comments += '</div>';
						
						$("#comment"+fCode).append(comments);
					}else{  // ��
						$("#comments"+fCode).append(item);
					}
				}
			};
			
			
			// ��ʼ���ϴ����Ʋ���
			this.init();
		});
	};
})(jQuery);


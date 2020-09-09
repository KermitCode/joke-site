var votearr=new Array();var voting=false;
function colorize() {
	var text=$('#yuan').text();
	var colors = ["#FF0000", "#008E00", "#0033CC", "#660099"];
    var colorized = "";
    var bracket_color = "";
	var index = Math.floor(Math.random()*4);
    for (i = 0; i < text.length; i++) {
        index=index%4;
        if (text[i] == "(") bracket_color = colors[index];
            color = (bracket_color.length && (text[i] == "(" || text[i] == ")")) ? bracket_color : colors[index];
    		colorized = colorized + '<span style="color: '+color+' !important">' + text.charAt(i) + '</span>'; 
			index++;
			}
	$('#yuan').html(colorized);
	}

$(function(){
colorize();
/*add　favorite*/
$("#keep").click(function(){
  var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
  if(document.all){window.external.addFavorite('http://www.yozhua.com', '哟爪笑话网');}
   else if(window.sidebar){window.sidebar.addPanel('哟爪笑话网', 'http://www.luo0.com', "");}
   else{ alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹');}
});

/*forseacrh*/
$("#s").focusin(function(){if($(this).val()=='请输入关键词') $(this).val('');});
$("#s").focusout(function(){if($(this).val()=='') $(this).val('请输入关键词');});
$("#go").click(function(){
	if($('#s').val()=='请输入关键词'){alert('请输入关键词');return false;}
	if($('#class').val()==2)  $("#search_form").attr("action",$('#imgurl').val());   
});

/*start change color*/
var autos=setInterval(colorize,300);
$("#yuan").mouseover(function(){clearInterval(autos);});
$("#yuan").mouseout(function(){autos=setInterval(colorize,300);});
/*yuan xiao*/
$("#yuan").click(function(){
	playmusic();
	$("#xiao").ajaxStart(function(){
	$("#yuan").html('随缘加载中<img src="/images/good.gif" align="absmiddle" />');
	$("#xiao").slideUp();
 	});	
$.get("/Site/Yuan/"+Math.random(),{},		
	function(msgs){
		$("#xiaotext").html("<div class='sytit'>"+msgs.title+"</div><div class='sytext'>"+msgs.text+'</div>');
		$("#xiao").toggle('slow');   
	   },'json');
$("#xiao").ajaxComplete(function(){
	   $("#yuan").html('随缘*壹笑');
	   colorize();
	 });
});
/*
$("#copys").click(function(){
clipboardData.setData('Text',document.getElementById("xtitle").innerText+"\r\n"+document.getElementById("xtext").innerText+"\r\n"+"笑让生活更健康:"+document.URL);
alert('复制成功');
});
*/
});

//取cookies
/*function  GetCookie(sName){ 
    var  aCookie = document.cookie.split(";"); 
    for(var i=0;i<aCookie.length;i++){ 
        var aCrumb = aCookie[i].split("=");
    if(sName == aCrumb[0]) return aCrumb[1];}   
return  null;}*/

function autoplay(){$("#next").click();}

//2012-1-5改新函数
function getCookie(c_name){
	if (document.cookie.length>0){
	  c_start=document.cookie.indexOf(c_name + "=")
	  if (c_start!=-1)
		{ 
		c_start=c_start + c_name.length+1 
		c_end=document.cookie.indexOf(";",c_start)
		if (c_end==-1) c_end=document.cookie.length
		return unescape(document.cookie.substring(c_start,c_end))
		} 
	  }
	return ""
}


/*vote*/
function vote(type,id,classs){
	if(voting){alert('请不要重复投票!');return false;}
	if(type) var num=$('#gnum').html();else var num=$('#bnum').html();
	num=num.replace("(",""); num=num.replace(")",""); 
	$("#vbox").ajaxStart(function(){voting=true;});
	$.get("/XhImage/vote/",{'id':id,'type':type,'class':classs},		
	function(msgs){
		if(msgs.rs){$('#votemess').html('投票成功').fadeIn("slow").fadeOut("slow");if(type) $('#gnum').html('('+(Number(num)+1)+')');else $('#bnum').html('('+(Number(num)+1)+')');}
		else{$('#votemess').html('不要重复投票').fadeIn("slow").fadeOut("slow");}  
	   },'json');
	$("#vbox").ajaxComplete(function(){voting=false;});
}

/*pinglun*/
function subpl(id,type){
	var plte=$("#plt").val();
	var user__name='';
	if(username==''){user__name='游客';if(plrig==0){alert('请先登录!');return false;}}else user__name=username;
	if(plte=='正在提交...'){alert('请稍候...!');return false;}
	if(plte==''){alert('请填写评论内容!');return false;}
	$("#subpl").ajaxStart(function(){$("#plt").html('正在提交...');});	
	$.get("/XhPinglun/create/",{'id':id,'type':type,'text':plte},		
	function(msgs){
		if(msgs.rs==1){var oldtext=$('#pllist').html();$('#pllist').html("<li><span class='litt'>"+user__name+"."+msgs.tim+"：</span>"+plte+"</li>"+oldtext);}
		else if(msgs.rs==2){alert('请先登录');}
		else if(msgs.rs==4){alert('评论内容中有敏感词');}
		else if(msgs.rs==3){alert('您评价太多了，歇息歇息吧');}
		else{alert('评论失败!');} 
		$("#plt").html(''); 
	   },'json');
}

function playmusic(){
	yuanmusic.play(); 
	//document.getElementById('music').innerHTML='<embed src="/images/music.wav" loop="false" autostart="true"  width="0" height="0">';
	}

document.oncontextmenu = function (event){
	if(window.event){
		event = window.event;
	}try{
		var the = event.srcElement;
		if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
			return false;
		}
		return true;
	}catch (e){
		return false; 
	} 
}


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
/*add��favorite*/
$("#keep").click(function(){
  var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
  if(document.all){window.external.addFavorite('http://www.yozhua.com', 'ӴצЦ����');}
   else if(window.sidebar){window.sidebar.addPanel('ӴצЦ����', 'http://www.luo0.com', "");}
   else{ alert('������ͨ����ݼ�' + ctrl + ' + D ���뵽�ղؼ�');}
});

/*forseacrh*/
$("#s").focusin(function(){if($(this).val()=='������ؼ���') $(this).val('');});
$("#s").focusout(function(){if($(this).val()=='') $(this).val('������ؼ���');});
$("#go").click(function(){
	if($('#s').val()=='������ؼ���'){alert('������ؼ���');return false;}
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
	$("#yuan").html('��Ե������<img src="/images/good.gif" align="absmiddle" />');
	$("#xiao").slideUp();
 	});	
$.get("/Site/Yuan/"+Math.random(),{},		
	function(msgs){
		$("#xiaotext").html("<div class='sytit'>"+msgs.title+"</div><div class='sytext'>"+msgs.text+'</div>');
		$("#xiao").toggle('slow');   
	   },'json');
$("#xiao").ajaxComplete(function(){
	   $("#yuan").html('��Ե*ҼЦ');
	   colorize();
	 });
});
/*
$("#copys").click(function(){
clipboardData.setData('Text',document.getElementById("xtitle").innerText+"\r\n"+document.getElementById("xtext").innerText+"\r\n"+"Ц�����������:"+document.URL);
alert('���Ƴɹ�');
});
*/
});

//ȡcookies
/*function  GetCookie(sName){ 
    var  aCookie = document.cookie.split(";"); 
    for(var i=0;i<aCookie.length;i++){ 
        var aCrumb = aCookie[i].split("=");
    if(sName == aCrumb[0]) return aCrumb[1];}   
return  null;}*/

function autoplay(){$("#next").click();}

//2012-1-5���º���
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
	if(voting){alert('�벻Ҫ�ظ�ͶƱ!');return false;}
	if(type) var num=$('#gnum').html();else var num=$('#bnum').html();
	num=num.replace("(",""); num=num.replace(")",""); 
	$("#vbox").ajaxStart(function(){voting=true;});
	$.get("/XhImage/vote/",{'id':id,'type':type,'class':classs},		
	function(msgs){
		if(msgs.rs){$('#votemess').html('ͶƱ�ɹ�').fadeIn("slow").fadeOut("slow");if(type) $('#gnum').html('('+(Number(num)+1)+')');else $('#bnum').html('('+(Number(num)+1)+')');}
		else{$('#votemess').html('��Ҫ�ظ�ͶƱ').fadeIn("slow").fadeOut("slow");}  
	   },'json');
	$("#vbox").ajaxComplete(function(){voting=false;});
}

/*pinglun*/
function subpl(id,type){
	var plte=$("#plt").val();
	var user__name='';
	if(username==''){user__name='�ο�';if(plrig==0){alert('���ȵ�¼!');return false;}}else user__name=username;
	if(plte=='�����ύ...'){alert('���Ժ�...!');return false;}
	if(plte==''){alert('����д��������!');return false;}
	$("#subpl").ajaxStart(function(){$("#plt").html('�����ύ...');});	
	$.get("/XhPinglun/create/",{'id':id,'type':type,'text':plte},		
	function(msgs){
		if(msgs.rs==1){var oldtext=$('#pllist').html();$('#pllist').html("<li><span class='litt'>"+user__name+"."+msgs.tim+"��</span>"+plte+"</li>"+oldtext);}
		else if(msgs.rs==2){alert('���ȵ�¼');}
		else if(msgs.rs==4){alert('���������������д�');}
		else if(msgs.rs==3){alert('������̫���ˣ�ЪϢЪϢ��');}
		else{alert('����ʧ��!');} 
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


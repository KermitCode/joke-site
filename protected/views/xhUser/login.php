<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/regisiter.css" />
<div class="right reg">
    <div class="regtit">关于三笑笑话网用户政策：</div>
    <div class="regcont"><b>登录即注册：</b>即您不需要填写更多的表单，在登录表单中输入您能想到的账号名称和随意密码，如果账号未被注册过，则系统将为您注册此新账号。</div>
    <div class="regcont"><b>注册条款需知：</b></DIV>
    <div class="regcont">1.在浏览和使用本网站上的所有元素时，请遵守中华人民共和国相关法规及一切国际因特网规定与惯例,禁止发表破坏宪法和法律、行政法规实施的内容；禁止发表煽动颠覆国家政权，推翻社会主义制度的内容；禁止发表煽动分裂国家、破坏国家统一的内容；禁止发表破坏国家宗教政策，宣扬邪教和封建迷信的内容；禁止发表煽动民族仇恨、民族歧视，破坏民族团结的内容；禁止发表捏造或者歪曲事实，散布谣言，扰乱社会秩序的内容等。</div>
</div>
<div class="message"><?php echo $showmes;?></div>
<div class="left login">
    <DIV class=loginBox>
    <H1>登录即注册</H1><form action="<?php echo $this->createUrl('XhUser/login');?>" method="post" name="loginform">
    <DIV class=inputBox><LABEL for=demo1>用户名:</LABEL> <INPUT type=text name="username" id="username"> </DIV>
    <DIV class=inputBox><LABEL for=demo2>密　码:</LABEL> <INPUT type=password name="password" id="password"> </DIV>
    <BUTTON type=button onclick="javascript:check();">登录即注册</BUTTON></form> 
    </DIV>
</div><div class="clear"></div>
<div class="severinput">
<span class="right"><input type="checkbox" value="1" id="server" name="server" checked="checked"> 我同意以上条款</span>
<span class="left say">账号密码只能为字母、数字、下划线组成</span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('请阅读右边的服务条款并勾选右下选框');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('账号密码不得为空');return false;}
	if($("#username").val().length<4 || $("#password").val().length<4){alert('账号密码均不得少于4位');return false;}
	document.loginform.submit();}
</script>
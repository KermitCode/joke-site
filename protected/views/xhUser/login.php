<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/regisiter.css" />
<div class="right reg">
    <div class="regtit">������ЦЦ�����û����ߣ�</div>
    <div class="regcont"><b>��¼��ע�᣺</b>��������Ҫ��д����ı����ڵ�¼�������������뵽���˺����ƺ��������룬����˺�δ��ע�������ϵͳ��Ϊ��ע������˺š�</div>
    <div class="regcont"><b>ע��������֪��</b></DIV>
    <div class="regcont">1.�������ʹ�ñ���վ�ϵ�����Ԫ��ʱ���������л����񹲺͹���ط��漰һ�й����������涨�����,��ֹ�����ƻ��ܷ��ͷ��ɡ���������ʵʩ�����ݣ���ֹ����ɿ���߸�������Ȩ���Ʒ���������ƶȵ����ݣ���ֹ����ɿ�����ѹ��ҡ��ƻ�����ͳһ�����ݣ���ֹ�����ƻ������ڽ����ߣ�����а�̺ͷ⽨���ŵ����ݣ���ֹ����ɿ�������ޡ��������ӣ��ƻ������Ž�����ݣ���ֹ�����������������ʵ��ɢ��ҥ�ԣ����������������ݵȡ�</div>
</div>
<div class="message"><?php echo $showmes;?></div>
<div class="left login">
    <DIV class=loginBox>
    <H1>��¼��ע��</H1><form action="<?php echo $this->createUrl('XhUser/login');?>" method="post" name="loginform">
    <DIV class=inputBox><LABEL for=demo1>�û���:</LABEL> <INPUT type=text name="username" id="username"> </DIV>
    <DIV class=inputBox><LABEL for=demo2>�ܡ���:</LABEL> <INPUT type=password name="password" id="password"> </DIV>
    <BUTTON type=button onclick="javascript:check();">��¼��ע��</BUTTON></form> 
    </DIV>
</div><div class="clear"></div>
<div class="severinput">
<span class="right"><input type="checkbox" value="1" id="server" name="server" checked="checked"> ��ͬ����������</span>
<span class="left say">�˺�����ֻ��Ϊ��ĸ�����֡��»������</span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('���Ķ��ұߵķ��������ѡ����ѡ��');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('�˺����벻��Ϊ��');return false;}
	if($("#username").val().length<4 || $("#password").val().length<4){alert('�˺��������������4λ');return false;}
	document.loginform.submit();}
</script>
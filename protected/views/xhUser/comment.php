<div><img src="<?php echo$this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">��ҳ</a> -> <a href="#">�û�����</a>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">��Ե*ҼЦ</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo$this->baseurl;?>images/statbot.gif" border="0"/></div>

<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/regisiter.css" />
<div class="left user">
    <div class="regtit">�û����ģ�</div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/view');?>">�û�������ҳ</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/Update');?>">�����޸�</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/xiao');?>">�ҵ�Ц���б�</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/comment');?>">�ҵ������б�</a></div>
</div>

<div class="right users">
<table id="usertab" cellspacing="0">
<tr><td colspan='4'><b>*�û�����Ц�������б�</b></td></tr>
<tr><td>���</td><td>����Ц�����</td><td>����ʱ��</td><td>�鿴ԭ��</td></tr>
<?php
$i=0;
if(empty($model)) echo "<tr><td colspan='4'>�������ۼ�¼</td></tr>";
else{
	foreach($model as $key=>$row){
		$i++;
	?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['pl_type']==1?'����Ц��':'ͼƬЦ��';?></td>
<td><?php echo date('Y-m-d H:i:s',$row['pl_time']);?></td>
<td><?php if($row['pl_type']=='1')$url=$this->createUrl('XhTitle/view',array('id'=>$row['pl_tt_id'])); 
		   else $url=$this->createUrl('XhImage/view',array('id'=>$row['pl_tt_id'])); 
				echo "<a href='{$url}'>�鿴ԭ��</a>";?></td></tr>
<tr><td colspan="4"><?php echo $row['pl_text']?></td></tr>
<?php }
}?>


</table>
</div>
<div class="clear"></div>

<div class="severinput">
<span class="left"></span>
<span class="right say"></span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('���Ķ���ߵķ��������ѡ����ѡ��');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('�˺����벻��Ϊ��');return false;}document.loginform.submit();}
</script>



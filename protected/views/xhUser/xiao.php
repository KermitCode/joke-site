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
<tr><td colspan='7'><b>*�û�����Ц�������б�</b></td></tr>
<tr><td>���</td><td>Ц�����</td><td>Ц������</td><td>չ����</td><td>��Ʊ</td><td>��Ʊ</td><td>����ʱ��</td></tr>
<?php
$i=0;
if(empty($model)) echo "<tr><td colspan='7'>���޷����¼</td></tr>";
else{
	foreach($model as $key=>$row){
		$i++;
	?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $this->xh_class[$row['cl_id']]['name'];?></td>
<td><?php echo CHtml::link($row['tt_title'],$this->createUrl('XhTitle/view',array('id'=>$row['tt_id'])));?></td>
<td><?php echo $row['tt_showviews'];?></td>
<td><?php echo $row['tt_voters_up'];?></td>
<td><?php echo $row['tt_voters_down'];?></td>
<td><?php echo date('Y-m-d H:i:s',$row['tt_time']);?></td>
</tr>
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



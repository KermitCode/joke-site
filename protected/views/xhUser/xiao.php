<div><img src="<?php echo$this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">首页</a> -> <a href="#">用户中心</a>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo$this->baseurl;?>images/statbot.gif" border="0"/></div>

<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>images/regisiter.css" />
<div class="left user">
    <div class="regtit">用户中心：</div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/view');?>">用户中心首页</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/Update');?>">资料修改</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/xiao');?>">我的笑话列表</a></div>
    <div class="menu"><a href="<?php echo $this->createUrl('XhUser/comment');?>">我的评论列表</a></div>
</div>

<div class="right users">
<table id="usertab" cellspacing="0">
<tr><td colspan='7'><b>*用户发表笑话文章列表</b></td></tr>
<tr><td>序号</td><td>笑话类别</td><td>笑话标题</td><td>展现量</td><td>赞票</td><td>踩票</td><td>发表时间</td></tr>
<?php
$i=0;
if(empty($model)) echo "<tr><td colspan='7'>暂无发表记录</td></tr>";
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
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('请阅读左边的服务条款并勾选左下选框');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('账号密码不得为空');return false;}document.loginform.submit();}
</script>



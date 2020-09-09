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
<table id="usertab" cellspacing="0"><tr>
<td colspan='4'><b>*用户资料</b></td>
</tr><tr>
<td>注册呢称：</td><td><b><?php echo $model->er_name;?></b></td>
<td>用户性别：</td><td><b><?php echo $model->er_sex;?></b></td>
</tr><tr>
<td>用户QQ：</td><td><b><?php $model->er_qq || $model->er_qq='未填写';echo $model->er_qq;?></b></td>
<td>注册IP：</td><td><b><?php echo $model->er_ip;?></b></td>
</tr><tr>
<td>注册时间：</td><td><b><?php echo date('Y-m-d H:i:s',$model->er_gotime);?></b></td>
<td>最近登录：</td><td><b><?php echo date('Y-m-d H:i:s',$model->er_lasttime);?></b></td>
</tr><tr>
<td>发表短文笑话：</td><td><b><?php echo $model->er_xh_word;?></b> 篇</td>
<td>发表图片笑话：</td><td><b><?php echo $model->er_xh_image;?></b> 篇</td>
</tr><tr>
<td>总积分：</td><td><b><font color=red><?php echo $model->er_money;?></font></b></td>
<td>账号状态：</td><td><b><?php echo $model->er_status==0?'禁用':'正常';?></b></td>
</tr></table>
</div>
<div class="clear"></div>

<div class="severinput">
<span class="left"></span>
<span class="right say"></span></div>
<script language="javascript">function check(){if(document.getElementById('server').checked==false){alert('请阅读左边的服务条款并勾选左下选框');return false;}
	if($("#username").val()=='' || $("#password").val()==''){alert('账号密码不得为空');return false;}document.loginform.submit();}
</script>



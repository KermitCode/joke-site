<div><img src="<?php echo $this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">首页</a> -> <a href="<?php echo $this->createUrl('XhTitle/index');?>">文字笑话</a>
        <?php echo " -> <a href='#'>".$model->tt_title."</a>";?>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo $this->baseurl;?>images/statbot.gif" border="0"/></div>

<div class="left"><!--left float-->
    <div id="votemess"></div>
    <div class="main wid5">        
        <div class="mat wid5"><div class="left"><?php echo $model->tt_title;?></DIV><div class="clear"></div></div>
        <DIV class="stop5 wid52"></DIV>
        <div class="wid52 list">
        <div class="x_title" id="xtitle"><?php echo $model->tt_title;?></div>
        <div class="x_mess"><?php  echo '发布时间：'.date('Y-m-d H:i:s')."　　阅览：<b>{$show_new}</b>次";  //,$model->tt_time?></div>
        <div class="x_text" id="xtext">
        <?php if($this->webset['ad_irt_downtitle']) echo "<div class='adirt'>".stripslashes($this->webset['ad_irt_downtitle'])."</div>"; ?>
        <?php  echo $content;?>
        </div>
        
         <div id="vbox">
                <div class="box good" onmousemove="this.style.backgroundPosition='left top';" onmouseout="this.style.backgroundPosition='-138px 0';" onclick="javascript:vote(1,<?php echo $model->tt_id;?>,'t');">
                    <div class="gact">顶一下</div><div id="gnum">(<?php echo $model->tt_voters_up;?>)</div>
                </div>
                <div class="box bad" onmousemove="this.style.backgroundPosition='right top';" onmouseout="this.style.backgroundPosition='-277px 0';" onclick="javascript:vote(0,<?php echo $model->tt_id;?>,'t');">
                    <div class="bact">踩一下</div><div id="bnum">(<?php echo $model->tt_voters_down;?>)</div>
                </div>
         </div>
         
         <div class="ttalt">阅读提示：您可以通过方向键"←"和"→"翻页；通过方向键"↑"顶一下和"↓"来踩一下</div>
          <div class="ttalt">您还可以<input type="button" value="点击这里复制整篇笑话发给朋友" id="copys" onclick="javascript:gocopy();" />让他(她)们也笑笑吧</div>
        
         <div class="sideimg"><?php echo $this->getUpandDown($model->tt_id); //下一篇：上一篇内容 ?></div>
         <?php if($this->webset['ad_irt_pinglun']) echo "<div class='adirts'>".stripslashes($this->webset['ad_irt_pinglun'])."</div>"; ?>
         <div class="pltext">
            <div class='im_tit'>发表评论：</div>
            <span class="left"><textarea name="plt" id="plt" class="pl"></textarea></span><span class="right" onclick="javascript:subpl(<?php echo $model->tt_id;?>,1,username);">提交</span>
            <div class="clear"></div>
         <div class='im_tit'>评论列表：</div>
            <ul id="pllist">
            <?php if(empty($pinglun)) echo '暂无评论';
                   else{
                        foreach($pinglun as $key=>$row){
                            $row['pl_author'] || $row['pl_author']='游客';
                            echo "<li><span class='litt'>{$row['pl_author']}.".date('Y-m-d H:i:s',$row['pl_time'])."：</span>{$row['pl_text']}</li>";
                            }   
                   }
            ?> 
           </ul>
           </div>
        
        </div>
        <DIV class="sbot5 wid52"></DIV>
    </div>
</div><!--end left float-->

<div class="right"><!--right float-->
	
    <div class="main wid3">           
        <div class="mat wid3"><div class="left">三笑笑话网</DIV><div class="right more"></div></div>
        <DIV class="stop3 wid34"></DIV>
        <div class="mulu wid34">
    			<div id="adlist"><?php echo stripslashes($this->webset['ad_list_main']);?></div>
        </div>
        <DIV class="sbot3 wid34"></DIV>
    </div>
    
    <div class="main wid3 mart10">           
        <div class="mat wid3"><div class="left">其它文字笑话分类</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhClass/index');?>">全部</a></div></div>
        <DIV class="stop3 wid34"></DIV>
        <div class="mulu wid34">
    <?php foreach($this->xh_class as $key=>$row){ if($row['type']==1) echo "<a href='".$this->createUrl('XhTitle/index',array('class'=>$key))."'>{$row['name']}</a>";} ?>  
        </div>
        <DIV class="sbot3 wid34"></DIV>
    </div>

    <div class="main wid3 mart10">           
        <div class="mat wid3"><div class="left">爆笑笑话</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhClass/index');?>">全部</a></div></div>
        <DIV class="stop3 wid34"></DIV>
        <div class="list wid34"><ul class='hot'><?php //the new jokes
              foreach($this->getBaoxiao(10) as $row){
                  echo "<li><span class='left'>[<a href='".$this->createUrl('XhTitle/index',array('class'=>$row['cl_id']))."'>{$this->xh_class[$row['cl_id']]['name']}</a>] <a href='".$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."'>{$row['tt_title']}</a></span>";#<span class='views'>({$row['tt_showviews']})</span>
                  echo "<span class='right'><em>(".$this->kermitBase->getTime("md",$row['tt_time']).")</em></span></li>";
        }?> 
        </ul></div>
        <DIV class="sbot3 wid34"></DIV>
    </div>
</div><!--end right float-->
<div class="clear"></div>

    <div class="photos">
        <div class="mat wid9"><div class="left">爆笑图片</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhImage/index');?>">更多</a></div></div>
        <div class="phlist">
          <?php foreach($this->getBaoimage(10) as $key=>$row){?>              
            <div class="photo_box">
                <a href="<?php echo $this->createUrl('XhImage/view',array('id'=>$row['im_id']));?>"  target='_blank'><img src="<?php echo $this->baseurl.'jokeimg/'.$row['im_mainimg'];?>" alt="<?php echo $row['im_title'];?>" title="<?php echo $row['im_title'];?>" class="photo" border="0" /></a>
            </div>
         <?php }?> 
        </div>                
    </div>


<script type="text/javascript" defer="defer">
function gocopy(){
clipboardData.setData('Text',document.getElementById("xtitle").innerText+"\r\n"+document.getElementById("xtext").innerText+"\r\n"+"笑让生活更健康:"+document.URL);
alert('复制成功');
}
function showkey(){key = event.keyCode;
	if (key == 37){<?php echo $this->getPageside($model->tt_id,'pre');?>}
	if(key==38){vote(1,<?php echo $model->tt_id;?>,'t');}
	if (key == 39){<?php echo $this->getPageside($model->tt_id,'next');?>}
	if(key==40){vote(0,<?php echo $model->tt_id;?>,'t');}}
document.onkeydown=showkey;
</script>
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=7&amp;pos=right&amp;uid=6536114" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
var bds_config={"bdTop":333};
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>

<div><img src="<?php echo $this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">首页</a> -> <a href="#">笑话分类</a></span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
 </div>
<div class="statbot"><img src="<?php echo $this->baseurl;?>images/statbot.gif" border="0"/></div>

<?php if($this->webset['ad_web_middle_new']) echo '<div id="ad2">'.stripslashes($this->webset['ad_web_middle_new']).'</div><div style="height:10px;"></div>';?>

<div class="main wid5 left">           
    <div class="mat wid5"><div class="left">文字笑话分类</DIV></div>
    <DIV class="stop5 wid52"></DIV>
    <div class="list wid52">
<?php foreach($this->xh_class as $key=>$row){
			if($row['type']==1){
			echo "<div class='cla'><span class='cla_n'><a href='".$this->createUrl('XhTitle/index',array('id'=>$key))."'>{$row['name']}</a></span><span class='cla_nu'>({$row['nums']})</span></div>";
				 } 
		}
     ?>
     <div class="clear"></div>
    </div>
    <DIV class="sbot5 wid52"></DIV>
</div>


<div class="main wid3 right">           
    <div class="mat wid3"><div class="left">爆笑笑话</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhClass/index');?>">全部</a></div></div>
    <DIV class="stop3 wid34"></DIV>
    <div class="list wid34"><ul class='hot'><?php //the new jokes
          foreach($baoxiao as $row){
              echo "<li><span class='left'>[<a href='".$this->createUrl('XhTitle/index',array('class'=>$row['cl_id']))."'>{$this->xh_class[$row['cl_id']]['name']}</a>] <a href='".$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."'>{$row['tt_title']}</a></span>";#<span class='views'>({$row['tt_showviews']})</span>
			  echo "<span class='right'><em>".$this->kermitBase->getTime("md",$row['tt_time'])."</em></span></li>";
    }?> 
    </ul></div>
    <DIV class="sbot3 wid34"></DIV>
</div>

<div class="main wid5 left mart10">           
    <div class="mat wid5"><div class="left">图片笑话分类</DIV></div>
    <DIV class="stop5 wid52"></DIV>
    <div class="list wid52">
<?php foreach($this->xh_class as $key=>$row){
			if($row['type']==2){
			echo "<div class='cla'><span class='cla_n'><a href='".$this->createUrl('XhImage/index',array('id'=>$key))."'>{$row['name']}</a></span><span class='cla_nu'>({$row['nums']})</span></div>";
				 } 
		}
     ?>
     <div class="clear"></div>
    </div>
    <DIV class="sbot5 wid52"></DIV>
</div>
<div class="clear"></div>

<div class="photos">
	<div class="mat wid9"><div class="left">爆笑图片</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhImage/index');?>">更多</a></div></div>
    <div class="phlist">
	  <?php foreach($image_tuijian as $key=>$row){?>              
        <div class="photo_box">
            <a href="<?php echo $this->createUrl('XhImage/view',array('id'=>$row['im_id']));?>"  target='_blank'><img src="<?php echo $this->baseurl.'jokeimg/'.$row['im_mainimg'];?>" alt="<?php echo $row['im_title'];?>" title="<?php echo $row['im_title'];?>" class="photo" border="0" /></a>
        </div>
     <?php }?> 
    </div>                
</div>
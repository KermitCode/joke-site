<!--lini_1-->

<div><img src="<?php echo $this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><?php
        //echo "本日总更新：<b>{$number_array['day_all']}</b> （文字笑话<b>{$number_array['day_word']}</b>,图片笑话<b>{$number_array['day_image']}</b>）&nbsp;&nbsp;&nbsp;";
		echo "全站数据总量：<b>{$number_array['all_all']}</b>（文字笑话<b>{$number_array['all_word']}</b>，图片笑话<b>{$number_array['all_image']}</b>）";
		?></span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
 </div>
<div class="statbot"><img src="<?php echo $this->baseurl;?>images/statbot.gif" border="0"/></div>

<div class="main wid5 right">             
    <div class="mat wid5"><div class="left">最新文字笑话</DIV><div class="right more"><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/index');?>">更多</a></div><div class="clear"></div></div>
    <DIV class="stop5 wid52"></DIV>
    <div class="list wid52"><?php //the new jokes
          foreach($result_new as $row){ 
              echo "<div class='clear'></div><div class='ma_tit'><span class='index_t'><a href='".$this->webset['web_url'].$this->createUrl('XhTitle/index',array('id'=>$row['cl_id']))."'>[{$this->xh_class[$row['cl_id']]['name']}]</a> <a href='".$this->webset['web_url'].$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."' target='_blank'>{$row['tt_title']}</a></span><span class='index_c'><a href='".$this->webset['web_url'].$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."'  target='_blank' class='indc'>";
			  echo $this->kermitBase->str_cut($this->kermitBase->filter_normal(strip_tags($data_text[$row['tt_id']])),155-strlen($row['tt_title']),'......').'</a></span>';
			  echo "<span class='tim'><em>".$this->kermitBase->getTime("ymdhis",$row['tt_time'])."</em></span></div>"; 
    			}?> 
    </div>
    <DIV class="sbot5 wid52"></DIV>
</div>

<div class="main wid3 left">             
    <div class="mat wid3"><div class="left">最新图片笑话</DIV><div class="right more"><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhImage/index');?>">更多</a></div></div>
    <DIV class="stop3 wid34"></DIV>
    <div class="list wid3">
           <div id="play"><!--焦点图片-->	
                <div id="play_bg"></div><div id="play_info"></div>
                <div id="play_text"><ul><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li></ul></div>
                <div id="play_list"><?php
               foreach($image_new as $key=>$row){
                    echo "<a href='".$this->webset['web_url'].$this->createUrl('XhImage/view',array('id'=>$row['im_id']))."' target='_blank'><img src='{$this->baseurl}jokeimg/{$row['im_mainimg']}' title='{$row['im_title']}' alt='&lt;b&gt;".$this->xh_class[$row['cl_id']]['name']."&lt;/b&gt;{$row['im_title']}' /></a>\n";}
                ?></div>
            </div><!--结束焦点图片-->
    </div>
</div>
<div class="clear"></div>
<!--lini_1_end-->

<!--lini_2-->
<?php if($this->webset['ad_web_middle_new']) echo '<div id="ad2">'.stripslashes($this->webset['ad_web_middle_new']).'</div>';?>

<div class="main wid3 left mart10">           
    <div class="mat wid3"><div class="left">笑话分类</DIV><div class="right more"><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhClass/index');?>">全部</a></div></div>
    <DIV class="stop3 wid34"></DIV>
    <div class="mulu wid34"><a href="#" class="cla"><h1>文字笑话</h1></a><?php $i=0; 
			foreach($this->xh_class as $key=>$row){
			 if($i>25) break;
			 if($row['type']==1){echo "<a href='".$this->webset['web_url'].$this->createUrl('XhTitle/index',array('id'=>$key))."'>{$row['name']}</a>";$i++;}
			 } ?><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhClass/index');?>" class="spec"><h1>所有分类</h1></a>   
        <br /><a href='#' class="cla"><h1>图片笑话</h1></a><?php $i=0;
			foreach($this->xh_class as $key=>$row){
				if($i>13) break;
				if($row['type']==2){echo "<a href='".$this->webset['web_url'].$this->createUrl('XhImage/index',array('id'=>$key))."'>{$row['name']}</a>";$i++;}
				} ?>
<a href="<?php echo $this->webset['web_url'].$this->createUrl('XhClass/index');?>" class="spec"><h1>所有分类</h1></a> 
    </div>
    <DIV class="sbot3 wid34"></DIV>
</div>

<div class="main wid5 right mart10">             
    <div class="mat wid5"><div class="left">爆笑短文</DIV><div class="right more"><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/index');?>">更多</a></div></div>
    <DIV class="stop5 wid52"></DIV>
    <div class="list wid52"><?php //the new jokes
          foreach($result_tuijian as $row){ 
              echo "<div class='ma_tit'><span class='index_t'><a href='".$this->createUrl('XhTitle/index',array('id'=>$row['cl_id']))."'>[{$this->xh_class[$row['cl_id']]['name']}]</a> <a href='".$this->webset['web_url'].$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."' target='_blank'>{$row['tt_title']}</a></span><span class='index_c'><a href='".$this->webset['web_url'].$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."' target='_blank' class='indc'>";
			  echo $this->kermitBase->str_cut($this->kermitBase->filter_normal(strip_tags($data_text[$row['tt_id']])),140-strlen($row['tt_title']),'......').'</a></span>';
			  echo "<span class='tim'><em>".$this->kermitBase->getTime("ymdhis",$row['tt_time'])."</em></span></div>";   
    			}?></div>
    <DIV class="sbot5 wid52"></DIV>
</div>

<div class="clear"></div>
<!--lini_2_end-->

<!--lini_3-->
<div class="photos">
	<div class="mat wid9"><div class="left">爆笑图片</DIV><div class="right more"><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhImage/index');?>">更多</a></div></div>
    <div class="phlist">
	 <?php foreach($image_tuijian as $key=>$row){?>              
        <div class="photo_box">
            <a href="<?php echo $this->webset['web_url'].$this->createUrl('XhImage/view',array('id'=>$row['im_id']));?>"  target='_blank'><img src="<?php echo $this->baseurl.'jokeimg/'.$row['im_mainimg'];?>" alt="<?php echo $row['im_title'];?>" title="<?php echo $row['im_title'];?>" class="photo" border="0" /></a>
        </div>
     <?php }?>  
    </div>                
</div>

<?php 
	$rand_index=explode('=',trim($this->webset['index_class_arr'],'='));$i=1;
	foreach($rand_index as $key=>$classid){ ?>
<div class="main wid308 left mart10<?php if($i%3!=1) echo ' marl20';?>">
    <div class="mat wid308"><div class="left"><?php echo $this->xh_class[$classid]['name'];?></DIV><div class="right more"><a href="<?php echo $this->webset['web_url'].$this->createUrl('XhTitle/index',array('id'=>$classid));?>">更多</a></div></div>
    <DIV class="stop310 wid310"></DIV>
    <div class="list wid310"><ul <?php if($i<4 || $i>9) echo 'class="sec"';?>><?php //the new jokes
          foreach($this->getClassrs($classid) as $row){
              echo "<li><span class='left'><a href='".$this->webset['web_url'].$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."' target='_blank'>".$this->kermitBase->str_cut($row['tt_title'],30)."</a></span>";#<span class='views'>({$row['tt_showviews']})</span>
			  echo "<span class='right'><em>".$this->kermitBase->getTime('md',$row['tt_time'])."</em></span></li>";
    
	}?> 
    </ul></div>
    <DIV class="sbot310 wid310"></DIV>
</div>

<?php 
if($i==6 && $this->webset['ad_web_mid_down']!='') echo '<div class="clear"></div><div id="ad3">'.stripslashes($this->webset['ad_web_mid_down']).'</div>';
$i++; }?>


<!--lini_3_end-->   
<script type="text/javascript">
var t=n=count=0;
$(function(){
	count=$("#play_list a").size();
	$("#play_list a:not(:first-child)").hide();
	$("#play_info").html($("#play_list a:first-child").find("img").attr('alt'));
	$("#play_text li:first-child").css({"background":"#fff",'color':'#000'});
	$("#play_info").click(function(){window.open($("#play_list a:first-child").attr('href'), "_blank")});
	$("#play_text li").click(function() {
		var i=$(this).text()-1;
		n=i;
		if (i >= count) return;
		$("#play_info").html($("#play_list a").eq(i).find("img").attr('alt'));
		$("#play_info").unbind().click(function(){window.open($("#play_list a").eq(i).attr('href'), "_blank")})
		$("#play_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
		$(this).css({"background":"#fff",'color':'#000'}).siblings().css({"background":"#F90",'color':'#fff'});
	});
	t = setInterval("showAuto()",3000);
	$("#play").hover(function(){clearInterval(t)},function(){t=setInterval("showAuto()", 3000);});
})
function showAuto(){n=n>=(count-1)?0:n+1;$("#play_text li").eq(n).trigger('click');}

</script>